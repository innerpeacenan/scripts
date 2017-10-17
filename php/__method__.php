<?php
class A {
    public function a (){
       echo __method__;
    }
}

class B extends A {

}


$b = new B();
$b->a();
/**
 * @todo 为什么会输出两次呢？
A::aA::a
*/
