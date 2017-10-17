# test how does shift works
# note that there must be some space between "[" and "$" ,so as the space between "0" and ]
if [ $# -eq 0 ] ;
then
echo "at least one parameter was needed!"
exit 1
fi

until [ $# -eq 0 ]
do
    echo "the first param is:$1 and the number of params are:$#"
    shift
done


