<?php
class My {
    public static function myfunction($value,$key)
    {
        echo "键 $key 的值是 $value 。\n";
    }
}
$a1=array("a"=>"red","b"=>"green");
$a2=array($a1,"1"=>"blue","2"=>"yellow");
array_walk_recursive($a2,function ($value, $key){
    echo var_export($value),PHP_EOL;

});
echo PHP_EOL;
?>
