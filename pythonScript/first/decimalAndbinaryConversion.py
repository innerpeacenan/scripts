#!/usr/bin/env python
# encoding: utf-8
'''
二进制和十进制之前的转化，暂时就写道这里
后期需要考虑小数的情况
'''

# 二进制到十进制转化
def bd(number):
    '''
    >>> a = bd(10)
    >>> print(a)
    2
    '''
    if number < 0:
        return None
    result = 0
    while(number > 0):
        return bd(number // 2) + number % 2
    return result


# 十进制到二进制转化
def db(number):
    '''
    >>> a = db(6)
    >>> print(a)
    110
    '''
    if number < 0:
        return None
    result = 0
    while(number > 0):
        return db(number // 2) * 10 + number % 2
    return result


if __name__ == '__main__':
   import doctest
   doctest.testmod()
