<?php
function foo(array $bar = array('baz' => ''),$che){};
$rfunc = new ReflectionFunction('foo');
$rparams = $rfunc->getParameters();
echo $rparams[0]->isDefaultValueAvailable() ? 'TRUE' : 'FALSE';
?>
