#!/bin/bash

################################################################################
#                      The MySQL API For Bash
#		      Copyright (c) 2006 John Anderson 
#		   Author: <John Anderson> johnha@ccbill.com
# Notice:
# 
# The MySQL API for Bash (MAB) is free software; you can redistribute 
# it and/or modify it under the terms of the GNU General Public License 
# as published by the Free Software Foundation; either version 2, or 
# (at your option) any later version.
#
# MAB is distributed in the hope that it will be useful, but WITHOUT ANY
# WARRANTY; without even the implied warranty of MERCHANTABILITY or
# FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License
# for more details.
#
# You should should already know what the GPL is.  If you don't, then
# drop by GNU's website at http://www.gnu.org.  If can't get there or
# don't know what the internet is or something, then feel free to snail
# mail them at Free Software Foundation, 59 Temple Place - Suite 330, 
# Boston, MA 02111-1307, USA.
##############################################################################


##
# Since the highest numeric value I can return from a bash function is 255.
##
readonly mab_MAXCID=254
readonly mab_TMPCID=255
mab_WRITABLE=(REPLACE:7 INSERT:6 UPDATE:6 CREATE:6 ALTER:5 MODIFY:6 \
		replace:7 insert:6 update:6 create:6 alter:6 modify:6)
mab_NEXTCID=0
mab_ERRNO=()
mab_ERR=()
mab_CONS_HOST=()
mab_CONS_USER=()
mab_CONS_PASS=()
mab_CONS_DB=()
mab_CONS_SOCK=()
mab_CONS_PORT=()
mab_RES=()
mab_RES_LOCK=()
mab_ROW=()
mab_RES_CURSOR=()
mab_RES_CUR_MAX=()
mab_RES_CUR_MIN=()
mab_OUTPUT=()
mysql_num_rows=()
mysql_affected_rows=()


##
# Open for business.
##


##
# Check to see if a query writes to the database.
# Params:  $1 = query to execute
# [字符串截取](http://www.cnblogs.com/fengbohello/p/5954895.html)
##
mab_is_write(){
	for write in ${mab_WRITABLE[*]}
	do
		local match=${write%":"*}
		local length=${write#*":"}
		# 输入的参数从, 从头开始匹配
		local command="${1:0:$length}"
		if [ "$match" == "$command" ]; then
			return 1
		fi
	done
	unset match length command
	return 0
}
	
##
# Stores mysql credentials for use in passing to the mysql binary
# Params: $1 = host : $2 = user : $3 = pass : $4 = db : $5 = socket : $6 = port
##
mysql_connect(){
	##
	# No, we are not really going to "connect".  I'll give a quarter to
	# anyone who shows me how to make a persistent connection in bash 
	# using only builtins.
	##
	mysql_close $mab_TMPCID
	local thisCid=$(( $mab_NEXTCID + 1 ))
	if [ $thisCid -gt $mab_MAXCID ] ; then
		mab_ERRNO[$mab_TMPCID]=-1
		mab_ERR[$mab_TMPCID]="All connections used up."
		return $mab_TMPCID
	fi
	mab_NEXTCID=$thisCid
	# Bash has no multi-dimensional arrays and simulating them is too much trouble #
	if [ "X$1" == "X" ] ; then
		mab_CONS_HOST[$mab_TMPCID]="-h localhost"
	else
		mab_CONS_HOST[$mab_TMPCID]="-h $1"
	fi
	if [ "X$2" != "X" ] ; then
		mab_CONS_USER[$mab_TMPCID]="-u $2"
	fi
	if [ "X$3" != "X" ] ; then
		mab_CONS_PASS[$mab_TMPCID]="-p$3"
	else
		unset ${mab_CONS_PASS[$mab_TMPCID]}
	fi
	if [ "X$4" == "X" ] ; then
		mab_ERRNO[$mab_TMPCID]=-1
		mab_ERR[$mab_TMPCID]="No database specified"
		return $mab_TMPCID
	else
		mab_CONS_DB[$mab_TMPCID]="$4"
	fi
	if [ "X$5" != "X" ] ; then
		mab_CONS_SOCK[$mab_TMPCID]="--socket=$5"
	else
		unset ${mab_CONS_SOCK[$mab_TMPCID]}
	fi
	if [ "X$6" != "X" ] ; then
		mab_CONS_PORT[$mab_TMPCID]="--port=$6"
	else
		unset ${mab_CONS_SOCK[$mab_TMPCID]}
	fi
	mysql_query $mab_TMPCID "SHOW DATABASES"
	if [ $? != 0 ] ; then
		return $mab_TMPCID
	fi
	mab_CONS_HOST[$thisCid]="${mab_CONS_HOST[$mab_TMPCID]}"
	mab_CONS_USER[$thisCid]=${mab_CONS_USER[$mab_TMPCID]}
	mab_CONS_PASS[$thisCid]="${mab_CONS_PASS[$mab_TMPCID]}"
	mab_CONS_DB[$thisCid]="${mab_CONS_DB[$mab_TMPCID]}"
	mab_CONS_PORT[$thisCid]="${mab_CONS_PORT[$mab_TMPCID]}"
	mab_CONS_SOCK[$thisCid]="${mab_CONS_SOCK[$mab_TMPCID]}"
	return $thisCid;
}
##
# Actually performs a query
# Params: $1 = connection id : $2 = query (must be quoted)
##
mysql_query(){
	local extra=
	local write=
	if [ ! -z ${mab_RES_LOCK[$1]} ] && [ ${mab_RES_LOCK[$1]} -gt 1 ] ; then
		mab_ERRNO[$1]=-1
		mab_ERR[$1]="Query attempted with a stored result result set.  Result set must be freed first."
		return 1
	fi
	if [ "X$2" == "X" ] ; then
		mab_ERRNO[$1]=-1
		mab_ERR[$1]="No query specified"
		return 1
	fi
	mab_is_write "$2" && extra="" || extra="-vv"
	# if returned data contains weird chars like double quotes, I hope it's escaped properly.
	mab_OUTPUT[$1]="`echo "$2" | mysql $extra ${mab_CONS_USER[$1]} ${mab_CONS_PASS[$1]} ${mab_CONS_SOCK[$1]} \
	${mab_CONS_PORT[$1]} ${mab_CONS_DB[$1]} ${mab_CONS_HOST[$1]} 2>&1 | sed -re 's@\\t()\\t@\\\t\\\t@g' -e 's@\\\t@\\t""\\t@g'`"
	# Hopefully no on will have a table who's first column name starts with ERROR 
	check="${mab_OUTPUT[$1]:0:6}"
	if [ "$check" == "ERROR " ] ; then
		retval="${mab_OUTPUT[$1]:6:4}"
		mab_ERRNO[$1]=$retval
		local text=`perror $retval 2>&1`
		mab_ERR[$1]=${text%%":"*}
		mab_ERR[$1]="${mab_ERR[$1]} : ${mab_OUTPUT[$1]}"
		return 1
	fi
	if [ "$extra" == "-vv" ] ; then
		mysql_affected_rows[$1]=`echo ${mab_OUTPUT[$1]} |  sed -re 's@.*Query OK,[[:space:]]([0-9]{1,}).*@\\1@g'`
	fi
	unset extra write
	return 0
}

##
# Store a result set for retrieval
# Params: $1 = connection id
##
mysql_store_result(){
	# find out where we can safely start writing to the mab_RES array #
	if [ ! -z ${mab_RES_LOCK[$1]} ] && [ ${mab_RES_LOCK[$1]} -gt 1 ] ; then
		mab_ERRNO[$1]=-1
		mab_ERR[$1]="A result set is already stored for this connection, another cannot be stored until this one is freed."
		return 1
	fi
	local end=256
	local i=0
	while ( [ $i -lt 255 ] )
	do
		local boundary=${mab_RES[$i]}
		if [ ! -z $boundary ] ; then
			local start=${boundary%":"*}
			local length=${boundary#*":"}
			local end=$(( $length + $end ))
			unset boundary start length
		fi
		i=$(( $i + 1 ))

	done
	unset i
	#start writing at $end
	local tmp=$end
	local length=0
	TMP_IFS=$IFS
	IFS=$'\n' #set IFS to newline
	for line in ${mab_OUTPUT[$1]}
	do
		mab_RES[$end]="$line"
		end=$(( $end + 1 ))
		length=$(( $length + 1 ))
	done 
	IFS=$TMP_IFS
	mab_RES[$1]="$tmp:$length" # Set the start and end of each result #
	mab_RES_LOCK[$1]=1
	mab_RES_CUR_MIN[$1]=$tmp
	mab_RES_CUR_MAX[$1]=$(( $tmp + $length ))
	mab_RES_CURSOR[$1]=$tmp
	mysql_num_rows[$1]=$length
	return 0
}
##
# Free a stored result set
# Params:  $1 = connection id
##
mysql_free_result(){
	local boundary=${mab_RES[$1]}
	local start=${boundary%":"*}
	local length=${boundary#*":"}
	local end=$(( $start + $length ))
	while (( start < end ))
	do
		unset mab_RES[$start]
		start=$(( $start + 1 ))
	done
	unset mab_RES[$1] mab_RES_HEAD[$1] mab_RES_CUR_MIN[$1] mab_RES_CUR_MAX[$1] boundary length start end mab_RES_CURSOR[$1] mysql_num_rows[$1]
	mab_RES_LOCK[$1]=0
}
##
# Fetch the next row of a result set relative to cursor position
# Params: $1 = connection id
##
mysql_fetch_row(){
	if [ ! -z ${mab_RES_LOCK[$1]} ] && [ ${mab_RES_LOCK[$1]} -lt 1 ] ; then
		mab_ERRNO[$1]=-1
		mab_ERR[$1]="There is no result set stored, use mysql_store_result first."
		return -1
	fi
	mab_RES_CURSOR[$1]=$(( ${mab_RES_CURSOR[$1]} + 1 ))
	if [ ${mab_RES_CURSOR[$1]} -lt ${mab_RES_CUR_MAX[$1]} ] ; then
		mab_ROW[$1]=${mab_RES[${mab_RES_CURSOR[$1]}]}
		return 0
	fi
		return 1
	
	
}
		
##
# Fetch the column names from a stored result set.
# Params: $1 = connection id
##
mysql_column_headings(){
	if [ ! -z ${mab_RES_LOCK[$1]} ] && [ ${mab_RES_LOCK[$1]} -gt 1 ] ; then
		mab_ERRNO[$1]=-1
		mab_ERR[$1]="There is no result set stored, use mysql_store_result first."
		return -1
	fi
	mab_ROW[$1]=${mab_RES[${mab_RES_CUR_MIN[$1]}]}
	return 0
}
##
# Clear error conditions
# Prams: $1 = connection id
##
mysql_clear_error(){
	unset mab_ERRNO[$1] mab_ERR[$1]
	return 0
}
##
#  Move the cursor position of a stored result set to the one position before the top of the list.
#  Params: $1 = connection id
##
mysql_res_beforefirst(){
	if [ ! -z ${mab_RES_LOCK[$1]} ] && [ ${mab_RES_LOCK[$1]} -gt 1 ] ; then
		mab_ERRNO[$1]=-1
		mab_ERR[$1]="There is no result set stored, use mysql_store_result first."
		return -1
	fi
	mab_RES_CURSOR[$1]=${mab_RES_CUR_MIN[$1]}
	return 0
}
##
# Move the cursor position to a specified position in a stored result set.
# Param $1 = connection id : $2 = position
##
mysql_field_seek(){
	if [ ! -z ${mab_RES_LOCK[$1]} ] && [ ${mab_RES_LOCK[$1]} -gt 1 ] ; then
		mab_ERRNO[$1]=-1
		mab_ERR[$1]="There is no result set stored, use mysql_store_result first."
		return -1
	fi
	mab_RES_CURSOR[$1]=$(( ${mab_RES_CUR_MIN[$1]} + $2 ))
	if [ ${mab_RES_CURSOR[$1]} -gt ${mab_RES_CUR_MAX[$1]} ] ; then
		mab_ERRNO[$1]=-1
		mab_ERR[$1]="Cursor position out of range for result set."
		return 1
	fi
	return 0
}
	
##
# clear all data for a specified stored result set.
# Params $1 = connection id
##
mysql_close(){
	if [ ! -z ${mab_RES[$1]} ] ; then
		mysql_free_result $1
	fi
	unset mab_CONS_HOST[$1] \
	mab_CONS_USER[$1] \
	mab_CONS_PASS[$1] \
	mab_CONS_DB[$1] \
	mab_CONS_SOCK[$1] \
	mab_CONS_PORT[$1] \
	mab_RES[$1] \
	mab_RES_CURSOR[$1] \
	mab_RES_CURSOR_MAX[$1] 
	return 0
}
