<?php
$trans = array("h" => "-", "hello" => "hi", "hi" => "hello");
echo strtr("hi all, Ih said hello", $trans);

/*
hello all, I- said hi
 */
