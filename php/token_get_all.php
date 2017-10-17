<?php
$code =<<<'PHP_CODE'
<?php
$str = "Hello, Tipi\n";
echo $str;
PHP_CODE;
var_export(token_get_all($code));
