#!/usr/bin/env python
# encoding: utf-8
'''
>>> round(sqrt(3.5),2)
1.87
>>> round(sqrt(4),2)
2.0
'''


def sqrt (x):
    y = 1.0
    while abs(y * y - x) > 1e-6:
        # 根在 y 和 x/y 之间
        y = (y + x/y)/2 # 牛顿迭代法
    return y

if __name__ == '__main__':
    import doctest
    doctest.testmod()
