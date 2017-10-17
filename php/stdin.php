<?php
$fp = fopen("php://stdin" , "r");
$option = [];
$in = null;
// when at the end of file,the line was trim EOF, so the result would be empty string
while( $in !== ''){
   $in = trim(fgets($fp));
   var_dump($in);
}
exit();
$option[] = $in;

print_r($option);
?>

