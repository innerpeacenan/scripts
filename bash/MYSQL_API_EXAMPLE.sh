#!/bin/bash
#source the functions
. /home/wwwroot/scripts/bash/MYSQL_BASH_API.sh

die(){  # A function to cut down on the typing.
	echo -e "$1 failed with message: $3"
	exit $2
}
	

#variables
host="localhost"
user="root"
pass="1111111"
db="test"


MAN_INSER_ONE()
{
mysql_connect $host $user $pass $db "" ""  #First "connect".
cid_1=$?  #This is the connection Id for this connection
if [ $cid_1 == 255 ] ; then
	echo -e "Connect failed with error code ${mab_ERRNO[$cid_1]} and message : ${mab_ERR[$cid_1]}"
	exit 1
fi
if [ 'x' == "x${1}" ]; then
    echo 'first argument must be connection!'
    exit 1
fi
local insert="INSERT INTO man (name, url) VALUES ('$1','$2')"
#echo $insert;exit 1;
# Do an insert, again query must be quoted #
mysql_query $cid_1 "$insert" || die "Inserting" ${mab_ERRNO[$cid_1]} "${mab_ERR[$cid_1]}"
echo "Insert affected ${mysql_affected_rows[$cid_1]} rows."
mysql_close $cid_1
}


MAN_QUERY ()
{
if [ 'x' == "x${1}" ]; then
    echo 'no name to  query'
    exit 1
fi
q1="SELECT * FROM man WHERE name = '$1' LIMIT 1"
##
# Make 2 seperate "connections" to the database.
# Usage mysql_connect $host $user $pass $db $socket $port
##
mysql_connect $host $user $pass $db "" ""  #First "connect".
cid_1=$?  #This is the connection Id for this connection
if [ $cid_1 == 255 ] ; then
	echo -e "Connect failed with error code ${mab_ERRNO[$cid_1]} and message : ${mab_ERR[$cid_1]}"
	exit 1
fi

##
# Execute a query on each connection.
# Usage mysql_query $connection_id "$query_string"
# If the query string is not quoted and it contains a * or a ? bash will try to expand it.
##
mysql_query $cid_1 "$q1" || die "Query" ${mab_ERRNO[$cid_1]} "${mab_ERR[$cid_1]}"

##
# Store the output of the query for use
# Usage mysql_store_result $connection_id
##
mysql_store_result $cid_1 || die "Store result" ${mab_ERRNO[$cid_1]} "${mab_ERR[$cid_1]}"


##
# Peek at the column names
# Usage mysql_column_headings $connection_id
##
mysql_column_headings $cid_1 || die "Column headings" ${mab_ERRNO[$cid_1]} "${mab_ERR[$cid_1]}"
row=(${mab_ROW[$cid_1]})
#echo "${row[0]}  ${row[1]}  ${row[2]}"

##
# Iterate through the rows returned by the first connection's query.
# Null fields will show up as ""
# Usage mysql_fetch_row $connection_id
##
while mysql_fetch_row $cid_1
do
	row=(${mab_ROW[$cid_1]}) #Turn our text result into an array
	# 这里其实请不方便的, 有几列就等手动写输出几列
	#echo "${row[0]}  ${row[1]}  ${row[2]}"
	echo "${row[2]}"
	unset row
done

##
# Take a look at how many rows were returned
## 推荐的 bash 算数运算方式
#echo "$(( ${mysql_num_rows[$cid_1]}-1 )) rows fetched"

# Free our result sets #
mysql_free_result $cid_1
mysql_close $cid_1
}





### 调用过程
if [ "x$1" == 'xinsert' -o "X$1" == 'XINSERT' ];then
    if [ "x$2" == 'x' -o "x$3" == 'x' ]; then
        echo 'name and url needed!'
        exit 1
    else
        MAN_INSER_ONE $2 $3
    fi
elif [ "$1" == '--help' -o "$1" == 'help' ];then
    echo -e 'Usage: \n'\
                      'nman insert name url\n' \
                      'name name'
else
QUERY_RESULT=`MAN_QUERY "$1"`
#echo "${QUERY_RESULT}"
    if [ -z  "${QUERY_RESULT}" ];then
#        echo ${QUERY_RESULT}
       echo "${1} not in database"
    elif [ 0 -eq $? ];then
        echo "${QUERY_RESULT}"
    else
        firefox "${QUERY_RESULT}"&
    fi
fi



#MAN_INSER_ONE 'beeper_trans_service'  'http://192.168.200.86:12600/doc/beeper/beeper_trans_service.stable/'
# Close our "connections" (also frees any stored results)
