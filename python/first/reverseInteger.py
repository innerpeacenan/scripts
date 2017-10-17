#!/usr/bin/env python
# encoding: utf-8

class Solution ():
    '''
    >>> x = Solution()
    >>> result = x.reverse(123)
    >>> print(result)
    321

    >>> result = x.reverse(-123)
    >>> print(result)
    -321

    >>> result = x.reverse(1534236469)
    >>> print(result)
    9646324351
    '''

    def reverse (self,x):
        '''
        :type x: int
        :rtype int
        '''
        #python 三目运算符比较接近自然语言
        sign = 1 if x > 0 else -1
        x = abs(x);
        result = 0
        while x != 0 :
            result = result * 10 + x % 10
            #print(x);
            # // 表示取整数部分，这一点 python 与其他语言不同
            x = x // 10
        return sign * result



if __name__ == '__main__':
   import doctest
   doctest.testmod()




