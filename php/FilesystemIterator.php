<?php
$iterator = new FilesystemIterator(dirname(__FILE__));
$file_extentions = [];
while($iterator->valid()){
    // use get file name to get the file name of the FilesystemIterator
    echo $iterator->getFilename().PHP_EOL;
    $extension = $iterator->getExtension();
    // 注意有一些文件可能没有扩展名称
    if($extension !== ''){
        if(isset($file_extentions[$extension])) {
            $file_extentions[$extension] += 1;
        }else{
            $file_extentions[$extension] = 1;
        }

    }
    $iterator->next();
}

var_export($file_extentions);
echo PHP_EOL;
/**
dirname.php
http.php
test_15.php
explode.php
var_export.php
dir.php
and.php
getopt.php
strlen.php
test_1.php
stream_resolve_include_path.php
object_foreach.php
syntax
mail
get_defined_vars.php
not.php
test.php
mkdir.php
stdin.php
test_11.php
array_walk_recursive.php
dot.php
fsockopen.php
date.php
email.php
a.php
son.php
mailersoft
debug_backtrace.php
test_13.php
test_2.php
post.php
array_slice.php
test_5.php
FilesystemIterator.php
 */
