#!/bin/bash
echo "this program will try to calculate how many days about you demobilization date ..."
read -p "please input you demobilization date (YYYYMMDD ex>20050401): " userDate
# test if the input value is valid ,we can use grep mandatory
# there must be no space between varible and value,otherwise , the varible will be recognize as a mandatory
date_d=`echo $userDate | grep '[0-9]\{8\}'`

#exit 0 mean the program is well perform and other exit number tells user there is something wrong
if [ "$date_d" == "" ] ; then
	echo "You input the wrong format of date .... "
	exit 1
fi

# -i means date_dem was declared as integer 
declare -i date_dem=`date --date="$userDate" "+%s"`
declare -i date_now=`date "+%s"`
declare -i seconds_interval=$[ $date_dem - $date_now ]
declare -i date_d=$[ ${seconds_interval}/60/60/24 ]


if [ "$date_d " -lt 0 ] ; then
	echo "You had been demobilizated before: " $[ -1*$date_d ] " ago"
else
    #there must be no space between varible and value,otherwise , the varible or '=value' will be recognize as a mandatory
    #and will throw an  error like "=20" not a command
	declare -i date_h=$[ $[ $seconds_interval - $date_d*60*60*24 ]/60/60 ]
    echo "you will be demobilized after $date_d and $date_h hours."
fi
