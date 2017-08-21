#!/usr/bin/env python
# encoding: utf-8

'''
Let's take a problem, given a set, count how many subsets have sum of elements greater than or equal to a given value.

Algorithm is simple:

solve(set, set_size, val)
    count = 0
    for x = 0 to power(2, set_size)
        sum = 0
        for k = 0 to set_size
            if kth bit is set in x
                sum = sum + set[k]
        if sum >= val
             count = count + 1
    return count
>>> count = solve([1,2,3],3)
>>> print(count)
5
'''
# 目前结果集合里边有重复的排列，如何去除呢？
def solve (arr,val):
    set_size = len(arr)
    count = 0
    # 列举所有可能的组合情况，复杂度为指数级别
    for x in range(0, 2 ** set_size):
        sum = 0
        for k in range(0, set_size):
            # if kth bit is set in x
            if x & (1 << k):
                sum = sum + arr[k]
        # 每次内循环结束,统计结果
        if sum >= val:
            # print(sum,bin(x),bin(k))
            count += 1
    return count



if __name__ == '__main__':
   import doctest
   doctest.testmod()
