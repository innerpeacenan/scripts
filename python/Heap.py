#!/usr/bin/env python
# encoding: utf-8
class PrioQueueError(ValueError):
    pass
class PrioQueue:
    '''
    Implementing priority queues using heaps
    '''

    def __init__(self, elist = []):
        self._elems = list(elist)
        if elist:
            buildheap()

    def is_empty(self):
        return not self._elems

    def peak(self):
        if self.is_empty():
            raise PrioQueueError("In peak");
        return self._elems[0]

    def siftup(self, e, last):
        elems, i, j = self._elems, last, (last - 1)//2
        print(j)
        while i > 0 and e < elems[j]:
        while i > 0 and e < elems[j]:
            elems[i] = elems[j]
            i, j = j, (j - 1)//2
        elems[i] = e

    def siftdown(self, e, begin, end):
        # 这种写法类似于 php 中的 list(a,b) = [ b, a ]
        elems, i , j = self._elems, begin, begin*2 +1
        while j < end:
            if j + 1 < end and elem[j+1] < elems[j]:
                j += 1 # elems[j] 不大于其兄弟节点的数据
            if e < elems[j]: # e 在三者中最小，找到位置了
                break;
            elems[i] = elems[j] # elems[j] 在三者中最小，上移
            i, j = j, 2*j + 1 # 下一一层
            elems[i] = e

    def enqueue(self, e):
        self._elems.append(None) #add a dumpy element
        self.siftup(e, len(self._elems) - 1)

    def dequeue(self, e):
        if self.is_empty():
            raise PrioQueueError("in edqueue")
        elems = self._elems
        e0 = elems[0]
        e = elems.pop()
        if len(elems.pop()) > 0:
            self.siftdown(e, 0, len(elems))
        return e0

    def buildheap(self):
        end = len(self._elems)
        for i in range(end//2, -1, -1):
            self.siftdown(self._elems[i], i, end)








