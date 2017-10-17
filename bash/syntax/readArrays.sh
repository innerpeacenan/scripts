#!/bin/bash - 
set -o nounset                              # Treat unset variables as an error
IFS=":"
BASEDIR=$(dirname $0 )
if [ ! -s "$BASEDIR/data/infile.txt" ]
then
echo "the input file does not exists!"
exit 1
fi

declare infile="$BASEDIR/data/infile.txt"

# declare an arry varible named part
declare -a part

# read a line once a time into array and counts its members
while read -a part ;
do
    echo ${#part[*]}
done < "$infile"

