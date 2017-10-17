#!/bin/bash

########################################################################################################
# We want to produce a report that sorts the names
# by state and lists the name of the state followed by the name of each person residing in that state.
#The script looks at the first field of
#each record (the state) to determine if it is the same as in the previous record. If it is not the same, the
#name of the state is printed followed by the person's name. If it is the same, then only the person's name
#is printed.
########################################################################################################

# treat unset variable as an error
set -o nounset

# get base directory
BASEDIR=$(dirname $0)
DATA_DIR="${BASEDIR}/data"

# check if the source data and the sed instruction file exists
if [ ! -e "$DATA_DIR/city.sed"  -o ! -e "$DATA_DIR/2.2.2_sed_subsute.txt" ]
then
echo "the input data or sed instruction file does not exist!"
exit 1
fi

# subsute abbreviation of city to its fullname and insert comma between city and state
# the file must contain instruction only (can's not use sed option -e ) and should not wapped by ''
# then result will be devided into four parts: name, address, city, province
# sed -f "$DATA_DIR/city.sed" "$DATA_DIR/2.2.2_sed_subsute.txt" > "$DATA_DIR/2.3.2.1.newlist.txt"
sed -f "$DATA_DIR/city.sed" "$DATA_DIR/2.2.2_sed_subsute.txt" |

# print the stats name and save it to file
# the whitespace alse be printed
awk -F, ' {print $4 "," $1;}' $* |
sort |

# Count unique sorted records (the counted word will be left column of the output words)
# uniq -c

#引入一个自定义变量, LastState, awk 语法中变量可直接使用,`LastState = $1` 是给变量赋值
awk -F, '
$1 == LastState {
      print "\t" $2;
}
$1 != LastState {
      LastState = $1;
      print $1 "\n\t" $2;
}
';

# print 中间的所有字符都会被打印出来,类似HTML里边的<pre>标签都会被打印出来


