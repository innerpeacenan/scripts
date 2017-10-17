<?php
$str = 'one||two||three|four';
// positive limit
print_r(explode('||',$str ));
echo serialize(explode('||', $str ));
echo PHP_EOL;
?>
