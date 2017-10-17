#!/bin/bash - 
#===============================================================================
#
#          FILE: function.sh
# 
#         USAGE: ./function.sh 
# 
#   DESCRIPTION: remeber user choice{only one,two,three can be selected}, translate it to uper case and print it,
# 
#       OPTIONS: ---
#  REQUIREMENTS: ---
#          BUGS: ---
#         NOTES: ---
#        AUTHOR: YOUR NAME (), 
#  ORGANIZATION: 
#       CREATED: 12/21/2016 18:35
#      REVISION:  ---
#===============================================================================

#set -o nounset                              # Treat unset variables as an error
function printit (){
    echo  "Your choice is $1"   | tr 'a-z' "A-Z"
}

echo "this program will print you selection"
case $1 in 
    "one")
        printit $1 ;  
        ;;
    "two")
        printit; 
        ;;
    "three")
        printit;
        ;;
    *)
        echo "Usage {one|two|three}"
        ;;
esac


