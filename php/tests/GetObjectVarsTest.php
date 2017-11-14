<?php
use PHPUnit\Framework\TestCase;

class Dummy {
    public static $sta = [];
    public $pub = 0;
    protected $prot = 1;
    private $priv = 2;
}

class GetObjectVarsTest extends TestCase{
    public function setUp(){
        parent::setUp();
    }

    public function testTmp(){
        $arr = get_object_vars(new Dummy());
        $this->assertEquals(['pub' => 0], $arr);
    }
}
?>

