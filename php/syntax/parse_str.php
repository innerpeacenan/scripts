<?php
$str = "first=value&arr[]=foo+bar&arr[]=baz";
// Recommended
parse_str($str, $output);
echo $output['first'];  // value
echo $output['arr'][0]; // foo bar
echo $output['arr'][1]; // baz
echo "\n";
?>
