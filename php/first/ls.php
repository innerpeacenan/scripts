<?php
// dirname  输出的是完整路径  /home/ffz/Desktop/move
//$dir = dirname(__dir__);
$dir = '/home/ffz/Desktop';

function  ls ($dir){
    $files = [];
    if($handel = opendir($dir)){
        while(false !== ($file = readdir($handel))){
            if(!in_array($file, ['.', '..'])){
                // readdir return filenames without full path, just ls does
                $fullPath = $dir .DIRECTORY_SEPARATOR .$file;
                if(is_dir($fullPath)){
                    // 这里比较巧妙,需要特别注意
                     $files[] = ls($fullPath);
                }else{
                    $files[] = $file;
                }
            }
        }
        closedir($handel);
    }
    return $files;
}
var_export(ls($dir));
?>
