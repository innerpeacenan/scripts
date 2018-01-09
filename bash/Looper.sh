#!/bin/sh
trap 'echo ignoring HUP ...' HUP
trap 'echo terminating on USR1 ...;exit 1' USR1
while true
do
  sleep 2
  date >/dev/null
done

