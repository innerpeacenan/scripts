<?php
use PHPUnit\Framework\TestCase;
class TestFalseEqualEmpty extends TestCase{
    public function setUp(){
        parent::setUp();
    }


    public function testTmp(){
        $test = false;
        $this->assertTrue(True === empty($test));
    }
}
