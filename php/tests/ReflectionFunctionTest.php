<?php
use PHPUnit\Framework\TestCase;

function foo(array $bar = array('baz' => ''),$che){};

class ReflectionFunctionTest extends TestCase{
    public function setUp(){
        parent::setUp();
    }

    public function testDefaultValue(){
        $rfunc = new ReflectionFunction('foo');
        $rparams = $rfunc->getParameters();
        $yes = $rparams[0]->isDefaultValueAvailable() ? 'TRUE' : 'FALSE';
        $this->assertSame('TRUE', $yes);
    }
}
?>
