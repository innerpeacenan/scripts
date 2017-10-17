<?php
use PHPUnit\Framework\TestCase;
class TestTemplate extends TestCase{
    public function setUp(){
        parent::setUp();
    }

    public function testTmp(){
        $a = [ 1, 3, 5 ];
        $b = $a;
        $b[1] = 2;
        $this->assertEquals($a ,[ 0 => 1, 1 => 3, 2 => 5,]);

        // php array 默认的赋值类型为值赋值
        // 引用赋值,相当于统一变量的两个别名,改变其一,也改变了其他
        $a = [ 1, 3, 5 ];
        $b = &$a;
        $b[1] = 2;
        $this->assertTrue($a === [0 => 1, 1 => 2, 2 => 5,]);
    }
}





