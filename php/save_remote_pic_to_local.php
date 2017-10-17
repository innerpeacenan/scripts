<?php
$remote = file_get_contents('https://www.baidu.com/img/bd_logo1.png');
$file = fopen('/home/ffz/phpscript/data/baidu.png','w');
fwrite($file, $remote);

