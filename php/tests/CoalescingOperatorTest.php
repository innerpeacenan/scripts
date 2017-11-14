<?php
use PHPUnit\Framework\TestCase;
class CoalescingOperatorTest extends TestCase{
    public function testCoalescingOperator (){
        $this->assertSame(1, $a = $a ?? 1);
    }
}
