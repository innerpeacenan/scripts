#!/usr/bin/env python
# encoding: utf-8

def find_mismatch(nums):
    '''
    >>> nums = [1, 2, 2, 4]
    >>> print(find_mismatch(nums))
    [2, 3]

    >>> nums = [1]
    >>> print(find_mismatch(nums))
    []

    >>> nums = [2, 3, 4, 4]
    >>> print(find_mismatch(nums))
    [4, 5]
    '''
    length = len(nums)
    for i in range(length -1):
        if nums[i] == nums[i+1]:
            return [nums[i],nums[i] + 1]
    return []

if __name__ == '__main__':
   import doctest
   doctest.testmod()
