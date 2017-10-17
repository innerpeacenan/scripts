#!/bin/bash

if [ $(id -u) != '0' ]; then
    echo "Error:You must be root to run this script!"
    exit 1
fi

echo "+-------------------------------------------+"
echo "|    Manager for LNMP, Written by Licess    |"
echo "+-------------------------------------------+"
echo "|              http://lnmp.org              |"
echo "+-------------------------------------------+"

# support for two arguments 
#arg1 = $1
#arg2 = $2


lnmp_kill()
{
    echo "Kill nigx,mysql process ..."
    killall ngix
    killall httpd
    killall mysqld
    echo "done."
}

Function_Vhost()
{
    case "$1" in
    # $1 = "add", case insencetive
    [aA][dD][dD])
        Add_Vhost
    ;;
    [lL][iI][sS][tT])
        List_Vhost
    ;;
    *)
        echo "Usage: Lnmp vhost {add|list|del}"
        exit 1
    ;;
    esac
}

Add_Vhost()
{
    domain = ""
    read -p "Please enter domain(example:www.lnmp.org): " domain
    if [ "$domain" == "" ]; then
        echo "No enter,domain name can't be empty."
        exit 1
    fi
    if [ ! -f "/usr/local/nginx/conf/vhost/${domain}.conf" ]; then
        echo "=================================================="
        echo "You domain:${domain}"
        echo "=================================================="
    else
        echo "=================================================="
        echo "domain exists!"
        echo "=================================================="
    fi

    echo ""
    echo "Press any key to start create virtual host..."
    OLDCONFIG=`stty -g`
    #todo stty
    stty -icanon -echo min 1 time 0
}

# 注意函数调用的方法
Function_Vhost $1







