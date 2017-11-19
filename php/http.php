<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
set_error_handler('exceptions_error_handler');

function exceptions_error_handler($severity, $message, $filename, $lineno) {
    if (error_reporting() == 0) {
        return;
    }
    if (error_reporting() & $severity) {
        throw new ErrorException($message, 0, $severity, $filename, $lineno);
    }
}


try{
    $html = file_get_contents('http://www.baidu.com/');
    //print_r($http_response_header);
    $fp = fopen('http://www.baidu.com/',r);
    print_r(stream_get_meta_data($fp));
}catch(Exception $e){
    $stack = xdebug_get_function_stack();
    var_export($stack);
    echo PHP_EOL;exit();
    echo $e->getMessage();
    echo PHP_EOL. " at ";
    echo $e->getFile() . ":" . $e->getLine();
    echo PHP_EOL;
    exit();
}
