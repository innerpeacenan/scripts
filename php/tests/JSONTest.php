<?php
use PHPUnit\Framework\TestCase;
class JSONTest extends TestCase{
    public function setUp(){
        parent::setUp();
    }

    public function testDecode(){
        $this->assertNull(json_decode("id=59&name=todo+list&fid=2"));
    }

    public function testEncode(){
        $maybeAnEmptyArray = [];
        $this->assertSame('[]', json_encode($maybeAnEmptyArray));
        $this->assertSame('{}', json_encode((object)$maybeAnEmptyArray));
    }
}
