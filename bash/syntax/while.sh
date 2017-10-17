#!/bin/bash
while [ "$yn" != "yes" ] && [ "$yn" != "YES" ]
do 
	read -p "Please input yes/YES to stop this program: " yn
done
