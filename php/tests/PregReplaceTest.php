<?php
use PHPUnit\Framework\TestCase;
class PregReplaceTest extends TestCase{
    public function setUp(){
        parent::setUp();
    }

    public function testTmp(){
        $a = "HelloWorldControllerFrameWorkTestCase";
        // 用 - 链接各个部分
        $b = preg_replace('/([a-z])([A-Z])/','${1}-${2}',$a);
        $b = strtolower($b);
        $this->assertSame("hello-world-controller-frame-work-test-case", $b);
    }
}
?>
