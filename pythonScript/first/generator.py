#!/usr/bin/env python
# encoding: utf-8


'''
>>> l = [ m*n for m in [1,2,3] for n in [2, 4, 6]]
>>> print(l)
[2, 4, 6, 4, 8, 12, 6, 12, 18]
'''

if __name__ == '__main__':
   import doctest
   doctest.testmod()
