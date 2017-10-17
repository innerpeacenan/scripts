<?php
class Dummy {
    public static $sta = [];
    public $pub = 0;
    protected $prot = 1;
    private $priv = 2;
}
var_dump( get_object_vars(new Dummy()));
?>

