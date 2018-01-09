<?php
$readcontents = fopen("http://www.phpres.com/index.html", "rb");
$contents = stream_get_contents($readcontents);
fclose($readcontents);
echo $contents;
echo file_get_contents("http://www.phpres.com/index.html");
