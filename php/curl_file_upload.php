<?php
$file_name_with_full_path = 'https://www.baidu.com/img/bd_logo1.png';

$target_url = 'localhost:8899/data/first.jpg';
if (function_exists('curl_file_create')) { // php 5.5+
      $cFile = curl_file_create($file_name_with_full_path);
} else { //
      $cFile = '@' . realpath($file_name_with_full_path);
}
$post = array('extra_info' => '123456','file_contents'=> $cFile);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$target_url);
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
$result = curl_exec($ch);
if(false === $result){
    $error = 'Request return false...' .
                    ' Http Code is [' . curl_getinfo($ch, CURLINFO_HTTP_CODE) .']'.
                    ' Errno is [' . curl_errno($ch) . ']' .
                    ' Error is [' . curl_error($ch) . ']';
    var_dump($error);die();
}
curl_close ($ch);
echo var_dump($result);
