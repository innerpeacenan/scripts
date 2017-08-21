#!/usr/bin/env python
# encoding: utf-8
'''
>>> elems = [ 1, 5, 9, 7,2 ,8]
>>> heap_sort(elems)
>>> print_r(elems)
[ 9,8,7,5,2,1 ]
'''
def heap_sort(elems):
    def siftdown(elems, e, begin, end):
        i, j = begin, begin*2 +1;
        while j < end:
            if j+1 < end and elems[j+1] < elems[j]:
                j += 1
            if e < elems[j]:
                break
            elems[i] = elems[j]
            i , j = j, j * 2 + 1
        elems[i] = e


    end = len(elems)
    # 初次建堆
    for i in range(end//2, -1, -1):
        siftdown(elems, elems[i], i, end)
    # 每次取出一个元素，维护堆
    for i in range((end - 1), 0, -1):
        e = elems[i];
        elems[i] = elems[0]
        siftdown(elems, e, 0, i)

def print_r(elems):
    print("[",end = " ")
    for i in range(0,len(elems) - 1, 1):
        print(elems[i], end = ',')
    print(elems[-1], end = '')
    print(" ]")


if __name__ == '__main__':
   import doctest
   doctest.testmod()
