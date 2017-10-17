<?php
var_export(pathinfo(__FILE__));
echo PHP_EOL;
var_export(dirname(__FILE__)); // '/home/ffz/phpscript'
echo PHP_EOL;
echo __DIR__;
echo PHP_EOL;

/**
 * 根据这个理解 php 脚本的 pathinfo 种四个概念
// 注意 fopen后,用fgets 返回的值如果是当前目录的话,是 "."
// 注意区分
array (
  'dirname' => '/home/ffz/phpscript',
  'basename' => 'pathinfo.php',
  'extension' => 'php',
  'filename' => 'pathinfo',
)
 */
