#!/usr/bin/env python
# encoding: utf-8
import gl

#先必须在主模块初始化（只在Main模块需要一次即可）
gl._init()

#定义跨模块全局变量
gl.set_value('CODE','UTF-8')
gl.set_value('PORT',80)
gl.set_value('HOST','127.0.0.1')
