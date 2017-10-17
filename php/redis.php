<?php
//连接本地的 Redis 服务
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
echo "Connection to server sucessfully";
//查看服务是否运行
echo "Server is running: " . $redis->ping();
$redis->lPush("tutorial-list", 'Redis');
$redis->lPush("tutorial-list", 'MongoDb');
$redis->lPush("tutorial-list", 'Mysql');
$arList = $redis->lRange('tutorial-list', 0, 100);
echo "Store string in redis".PHP_EOL;
var_export($arList);
echo PHP_EOL;
$arList = $redis->keys('*');
echo __LINE__;
var_export($arList);
echo PHP_EOL;
//$redis->delete('tutorial-list');
$arList = $redis->ttl('tutorial');
var_export($arList);
echo PHP_EOL;
