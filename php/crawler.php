<?php
// 这种方式有缺陷
libxml_use_internal_errors(true);
$source ="http://php.net/manual/en/langref.php";
//$source = "http://stackoverflow.com/";
$doc = new DOMDocument();
// @todo difference between from html file and html
$doc->loadHTMLFile($source);
//$aside = $doc->getElementsByTagName('aside');
$xpath = new DOMXPath($doc);
$ul = $xpath->query('//*[@id="layout"]/aside/ul/li/ul');
//$childNodes = $aside->item(0)->childNodes;
//$firstChild = $childNodes->item(0)->getNodePath();
var_dump($ul->item(0)->childNodes->item(0)->attributes->);

