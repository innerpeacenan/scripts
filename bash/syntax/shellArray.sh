#!/bin/bash
# author:xiaoning nan 
# at 2016-12-03

my_array=(A B "C" D)
echo "the elements in myarray are:${my_array[*]}"
echo "the elements in myarray are:${my_array[@]}"
echo "数组元素个数为: ${#my_array[*]}"
echo "数组元素个数为: ${#my_array[@]}"


