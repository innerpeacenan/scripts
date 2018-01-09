<?php
public function var_export(&$var, $return = false)
    {
        // tokens
        $indent = '  ';
        $doubleArrow = ' => ';
        $lineEnd = ',' . PHP_EOL;
        $newLine = PHP_EOL;
        $strDelim = '\'';
        // use find and repace
        $find = [null, '\\', '\''];
        $replace = ['NULL', '\\\\', '\\\''];
        $out = '';
        // deal with value
        switch (gettype($var)) {
            // deal with all variable types, that is : [integer,double,string,boolean,array,object,null,resource]
            case 'array':
                $out = '[' . $newLine;
                foreach ($var as $k => $v) {
                    // deal with key
                    if (is_string($k)) {
                        // make string key safe
//                        $k = strtr($k, $safe);
                        for ($i = 0, $c = count($find); $i < $c; $i++) {
                            $k = str_replace($find[$i], $replace[$i], $k);
                        }
                        $k = $strDelim . $k . $strDelim;
                    }

                    if (is_array($v)) {
                        // 数组每一层,换一行
                        $export = $this->var_export($v, true);
                        $v = $newLine . $export;
                    } else {
                        $v = $this->var_export($v, true);
                    }
                    // Piece line together (输出数组中的一个键值对)
//                    中间过程一定要用 . 相互连接, 在在这个循环的过程中,中间的结果是要保留的
                    $out .= $k . $doubleArrow . $v . $lineEnd;
                }
                // 拼接数组输出结果
                $out .= ']';
                break;
            case 'string':
                /**
                 * If replace_pairs contains a key which is an empty string (""), FALSE will be returned.
                 * If the str is not a scalar then it is not typecasted into a string, instead a warning is raised and NULL is returned.
                 */
//                $var = strtr($var, $safe);
                // 因为外层规定了单引号,所以里层的所有单引号都要转义
                for ($i = 0, $c = count($find); $i < $c; $i++) {
                    $var = str_replace($find[$i], $replace[$i], $var);
                }
                $out = $strDelim . $var . $strDelim;
                break;
            // Number
            case 'integer':
//for historical reasons "double" is returned in case of a float, and not simply "float"
            case 'double' :
            $out = (string)$var;
            break;
            case 'boolean':
                $out = $var === true ? 'true' : 'false';
                break;
//            NULL 与 resource 放在一起处理 the type of null is in upercase
            case 'NULL':
            case 'resource':
                $out = 'NULL';
                break;
            case 'object':
                // Start the object export
                $out = 'class ' . get_class($var) . '{' . $newLine;
                // deal with each property
                foreach (get_object_vars($var) as $p => $ov) {
                    $out .= ' var $' . $p . ' = ';
                    if (is_array($ov)) {
                        $export = $this->var_export($ov, true);
                        $out .= $newLine . $export . ';' . $newLine;
                    } else {
                        $out .= var_export($ov, true) . ';' . $newLine;
                    }

                }
                $out .= '}';
                break;
        }
        if ($return === true) {
            return $out;
        } else {
            echo $out;
        }
}
