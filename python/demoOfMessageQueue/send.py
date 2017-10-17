#!/usr/bin/env python3
# encoding: utf-8
# pipe install pika==0.11.0
import pika

# build connection method
connection = pika.BlockingConnection(pika.ConnectionParameters('localhost'))
# create channel
channel = connection.channel()
# declare  queue
channel.queue_declare(queue='hello')
#send package from exchange to queue
channel.basic_publish(exchange='', routing_key='hello', body='Hello World!')
#yntaxError: Missing parentheses in call to 'print'
print("[x] Sent 'hello World!'")
connection.close()
