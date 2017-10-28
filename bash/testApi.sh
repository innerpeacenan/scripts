#!/bin/bash
#!/bin/bash

##
# Since the highest numeric value I can return from a bash function is 255.
##
readonly mab_MAXCID=254
readonly mab_TMPCID=255
mab_WRITABLE=(REPLACE:7 INSERT:6 UPDATE:6 CREATE:6 ALTER:5 MODIFY:6 \
		replace:7 insert:6 update:6 create:6 alter:6 modify:6)
##
# Check to see if a query writes to the database.
# Params:  $1 = query to execute
##

## 
mab_is_write(){
	for write in ${mab_WRITABLE[*]}
	do
        # REPLACE:7
		local match=${write%":"*}
        # REPLACE 字符串变量的切片功能
		local length=${write#*":"}
		local command="${1:0:$length}"
		if [ "$match" == "$command" ]; then
			return 1
		fi
        return 0;
	done
	unset match length command
	return 0
}

mab_is_write
