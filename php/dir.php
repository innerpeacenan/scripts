<?php
$handle = opendir(__DIR__);
while (false != ($file = readdir($handle))){
    // readdir 每次返回一个字符串,代表一个文件名称 注意.该文件名称不包括目录名称
    if(in_array($file, ['.','..'])){
        continue;
    }
    $_FILES[] = $file;
}
closedir($handle);
if(basename(__FILE__) == $_SERVER['argv'][0]){
    // write test codes here
    var_export($_FILES);
}
