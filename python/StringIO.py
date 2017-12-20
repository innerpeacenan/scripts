#!/usr/bin/env python
# encoding: utf-8

from io import StringIO
f = StringIO()
f.write(" ")
f.write("hello world")
print(f.getvalue())
