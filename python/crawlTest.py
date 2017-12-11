# !usr/bin/python
# -*- coding:utf-8 -*-
import requests
import json
import sys
headers = {"Content-type" : "application/json"};
def curl (url, data = "" , header = headers):
  r = requests.post(url = url, json = data, headers = headers)
  print(r.text)
  print(r.status_code)



url = "http://192.168.203.12:7510/tf/v1/event/do/multi_day_off_by_customer";
data = """
trans_tasks_id:94997
date_start:2017-12-17
date_end:2017-12-18
from:10499
comment:valid
operation_user_id:100000
"""

#print(json.dumps(str))
#curl (url, data, header)


