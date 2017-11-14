<?php
use PHPUnit\Framework\TestCase;
class ExplodeTest extends TestCase{
    public function setUp(){
        parent::setUp();
    }

    public function testDelimiterWithMOreThanOneCharacter(){
        $str = 'one||two||three|four';
        // positive limit
        $this->assertEquals(['one', 'two', 'three|four' ], explode('||',$str ));
        $actual = serialize(explode('||', $str ));
        $expect = 'a:3:{i:0;s:3:"one";i:1;s:3:"two";i:2;s:10:"three|four";}';
        $this->assertSame($expect, $actual);
    }
}
?>
