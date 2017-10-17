<?php
// the lead 0 for the second param indict that it's octal number
// the third param tells where create directory recursively
//mkdir('/home/ffz/phpcript/syntax',0777,true);
//$exsists = is_dir('/home/ffz/phpscript/functions');

namespace test;
/**
 * Class FileOperation
 * @package test
 */
class FileOperation {
    /**
     * @param string $pathname
     * @param int $mode
     * @return bool
     */
    public static function mkdir ($pathname, $mode=0777){
     // 注意其实位置包含 delimiter 的情况
    $dir_strs = explode('/',$pathname);
//    print_r($dir_strs);exit();
    $dir_name = '';
    foreach ( $dir_strs as $dir_str ){
        //don'nt forget '/' ,execute step by step by youself is a goods habit before execute by machine
        $dir_name .= $dir_str.'/';
        if ( !is_dir( $dir_name ) ) {
            $is_created = mkdir($dir_name,$mode);
            if($is_created === false){
                return false;
            }
        }
    }
    return true;
}
}
//the function name is file_get_contents
//执行一次,文件指针向前移动一次,一次一行
//STIIN should not contain single quotes or double quotes, anything includeing `"` or `'` was treated as string
//   /home/ffz/d1/d2/d3
$dir_name = fgets(STDIN);
fclose(STDIN);
//注意运算符优先级 new 的对象要用括号括起来
$is_created = \test\FileOperation::mkdir($dir_name);
var_dump($is_created);
?>
