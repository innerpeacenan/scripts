#!/usr/bin/env python
# encoding: utf-8


import argparse

#  ArgumentParser
parser = argparse.ArgumentParser(description='Process some integers.')

parser.add_argument('integers', metavar='N', type=int, nargs='+', help='an integer for the accumulator')

parser.add_argument('--sum', dest='accumulate', action='store_const', const=sum, default=max, help='sum the integer(default:find the max)')

# In a script, parse_args() will typically be called with no arguments, and the ArgumentParser will automatically determine the command-line arguments from sys.argv.
args = parser.parse_args()
result = args.accumulate(args.integers)
print(result)
