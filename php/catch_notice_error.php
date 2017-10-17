<?php
$a[1] = 'jfksjfks';
try {
      $offset = 0;
        if(isset($a[$offset]))
                $b = $a[$offset];
          else
                  throw new Exception("Notice: Undefined offset: ".$offset);
} catch (Exception $e) {
      echo $e->getMessage();
}
