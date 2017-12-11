<?php
$json = <<<EOF
[
    {
        "date": "2017-11-23"
    },
    {
        "date": "2017-11-24"
    }
]
EOF;
$arr = json_decode ($json, true);
var_export($arr);
echo PHP_EOL;
