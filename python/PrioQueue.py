#!/usr/bin/env python
# encoding: utf-8

class PrioQueueError(ValueError) :
    pass

class PrioQue:

    '''
一个类的文档测试要放到类里边
>>> queue = PrioQue([123])
>>> print(queue.peek())
123
>>> queue.enqueue(2)
>>> print(queue.peek())
2
>>> last = queue.dequeue()
>>> print(last)
2

'''
    def __init__(self, elist = ()):
        self._elems = list(elist)
        self._elems.sort(reverse = True)

    def enqueue(self, e):
        i = len(self._elems) - 1
        while(i >= 0):
            if self._elems[i] <= e:
                i -= 1;
            else:
                break
        #end while
        self._elems.insert(i+1, e)

    # 用于查找最后一个元素，但是不删除
    def peek(self):
        if self.is_empty():
            raise PrioQueueError("in top")
        return self._elems[-1]

    def dequeue(self):
        if self.is_empty():
            raise PrioQueueError("in pop")
        return self._elems.pop()

    def is_empty(self):
        return not self._elems


if __name__ == '__main__':
    import doctest
    doctest.testmod()
