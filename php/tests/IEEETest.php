<?php
use PHPUnit\Framework\TestCase;
class IEEETest extends TestCase{
    public function setUp(){
        parent::setUp();
    }

    public function testIEEE(){
        $sum = 0;
        for($i = 0; $i < 10; $i ++){
            $sum += 0.1;
        }
        $this->assertSame(0, (int)$sum);
    }
}

