#!/usr/bin/env python
# encoding: utf-8

#coding:utf-8

# integration test framework for yn tester
# author cyr
# first version on 2015-12-2
import os
import json
import sys
import time
import httplib,urllib
from BaseHTTPServer  import BaseHTTPRequestHandler,HTTPServer
from SimpleHTTPServer import SimpleHTTPRequestHandler
import urlparse
class TestHTTPHandle(BaseHTTPRequestHandler):

    def do_GET(self):

        #self.send_head()
        self.send_response(200)
        parsed_path = urlparse.urlparse(self.path)

        result = {"code":200,"msg":"","info":""}

        resultJson = json.dumps(result,sort_keys=True)

        self.protocal_version = "HTTP/1.1"

        cur_time = time.time()
        curTime = time.strftime('%Y-%m-%d %H:%M:%S',time.localtime(cur_time))

        sys.stderr.write("Time is %s\n"%curTime)
        sys.stderr.write("The query string %s\n"%parsed_path.query)


        self.wfile.write(resultJson)

def test(HandlerClass = TestHTTPHandle,ServerClass = HTTPServer):

    Protocol = "HTTP/1.0"

    if sys.argv[1:]:
        port = int(sys.argv[1])
    else:
        port = 8003
    server_address = ('172.17.55.222', port)

    HandlerClass.protocol_version = Protocol

    try:
        httpd = HTTPServer(server_address, HandlerClass)
        sa = httpd.socket.getsockname()


        print "Serving HTTP on", sa[0], "port", sa[1], "..."

        httpd.serve_forever() #设置一直监听并接收请求

    except KeyboardInterrupt:

        httpd.socket.close()

    pass


if __name__ == '__main__':
    test()

