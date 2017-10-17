<?php
$a = new ArrayObject(array(), ArrayObject::STD_PROP_LIST | ArrayObject::STD_PROP_LIST|ArrayObject::ARRAY_AS_PROPS);
$a['arr'] = 'array data';
$a->prop = 'prop data';
print_r($a->prop);
/*
ArrayObject Object
(
    [storage:ArrayObject:private] => Array
        (
            [arr] => array data
            [prop] => prop data
        )

)

ArrayObject Object
(
    [prop] => prop data
    [storage:ArrayObject:private] => Array
        (
            [arr] => array data
        )

)
*/
