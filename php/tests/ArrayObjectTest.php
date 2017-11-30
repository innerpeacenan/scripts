<?php
use PHPUnit\Framework\TestCase;
class ArrayObjectTest extends TestCase{
    public function setUp(){
        parent::setUp();
    }

    public function testTmp(){
        $a = new ArrayObject(array());
        $a['arr'] = 'array data';
        $a->prop = 'prop data';
        $actual = print_r($a,true);
        $expected = <<<'TOP'
ArrayObject Object
(
    [prop] => prop data
    [storage:ArrayObject:private] => Array
        (
            [arr] => array data
        )

)

TOP;
        $this->assertEquals($expected, $actual);

        $a = new ArrayObject(array(), ArrayObject::ARRAY_AS_PROPS);
        $a['arr'] = 'array data';
        $a->prop = 'prop data';
        $actual = print_r($a,true);

        $expected =<<<'TOP'
ArrayObject Object
(
    [storage:ArrayObject:private] => Array
        (
            [arr] => array data
            [prop] => prop data
        )

)

TOP;

        $this->assertEquals($expected, $actual);


/*
 */
    }
}
