<?php
use PHPUnit\Framework\TestCase;
class TestJsonDecode extends TestCase{
    public function setUp(){
        parent::setUp();
    }

    public function testTmp(){
        echo json_encode([false, 'Successfully created account']);
    }
}
