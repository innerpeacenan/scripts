#!/usr/bin/env python
# encoding: utf-8

class Chain(object):

    def __init__(self, path=''):
        self._path = path

    def __getattr__(self, path):
        if path=='users' or path == 'repos':
            return lambda user: Chain('%s/%s/%s' % (self._path, path, user))
        return Chain('%s/%s' % (self._path, path))

    def __call__(self):
        print(value)

    def __str__(self):
        return self._path

    __repr__ = __str__

