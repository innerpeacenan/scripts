<?php
use PHPUnit\Framework\TestCase;
class TestRelativePath extends TestCase{
    public function setUp(){
        parent::setUp();
    }

    public function relativePath ($a, $b){
        $returnPath = [];
        $a = explode(DIRECTORY_SEPARATOR, $a);
        $b = explode(DIRECTORY_SEPARATOR, $b);
        // b 的后边部分加上a的后边部分
        // 注意for 循环 和 while 循环的区别
        for($n = 1, $len = count($b); $n < $len; $n++){
            if($a[$n] != $b[$n]){
                // n 未二者第一个不一样的索引位置
                break;
            }
        }
        // 记录此时 n 的值
        if($len - $n){
            $returnPath = array_fill( 0, $len - $n - 1 , '..');
        }
        // If length is given and is negative then the sequence will stop that many elements from the end of the array.
        $returnPath = array_merge($returnPath, array_slice($a, $n, -1));
        $str = join('/',$returnPath);
        return $str;
    }

    public function testRalativePath(){
        $a = '/a/b/c/d/f/e.php';
        $b = '/a/b/12/php/test/c.php';
        $this->assertEquals('../../../c/d/f', $path = $this->relativePath($a, $b));
    }
}
