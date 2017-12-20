#!/usr/bin/env python
# encoding: utf-8

from myio.Chain import Chain


path =  Chain().users('michael').repos('openapi').v1
print(path)

