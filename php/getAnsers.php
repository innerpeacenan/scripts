<?php

class Dingding
{
    public static $result;

    public $remoteServer = "http://www.kaoshixing.com/exam/get_question_info/";

    public $postString;

    public static $cookie;

    public function __construct(array $config = [])
    {
        if (empty($this->remoteServer)) {
            throw new \Exception('configure error, remote server is empty!');
        }
    }

    public function postData($testID = null)
    {
        if (!isset($testID)) {
            $testID = "59f04df3e630b9645b885b1f";
        }
        $arr = [
            'test_id' => $testID,
            'exam_results_id' => '3457630',
        ];
        $this->postString = $arr;
    }

    public function send($testId = null)
    {
        $this->postData($testId);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->remoteServer);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Requested-With: XMLHttpRequest'));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Origin:  http://www.kaoshixing.com'));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json, text/javascript, */*; q=0.01'));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded; charset=UTF-81'));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Cookie: gr_user_id=48482208-6c88-45d7-bd85-e6c2a21ac135; 3424876=8; 3442972=3; 3443169=1; 3443882=2; ADHOC_MEMBERSHIP_CLIENT_ID1.0=dc9f62a8-4124-b3b8-408c-5d98888edc33; Hm_lvt_0502cfa1e2a3555b1fd1668ef723940d=1508838278; Hm_lpvt_0502cfa1e2a3555b1fd1668ef723940d=1509029341; 3457546=4; gr_session_id_87d10bc8158a4ed0a2206a6f0bdd2a5c=ac3003ca-3232-4720-bb44-ef59af693878; gr_cs1_ac3003ca-3232-4720-bb44-ef59af693878=user_id%3A2832967; session=eyJfcGVybWFuZW50IjpmYWxzZSwia3N4IjoiMTczMTA0Njg0ODRAMTk0NzM6VVkzUTRHdW1sazJhSmNvVEV6Q2RxczVORndoMWZSMGoiLCJsYW5ndWFnZSI6eyIgYiI6IlkyZz0ifX0.DNQsoQ.AmuXfXvCVk_xsya7Z1Dj1XIgvCY'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->postString);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_HEADER, true);
        $data = curl_exec($ch);
        if ((curl_errno($ch)) || (200 !== curl_getinfo($ch, CURLINFO_HTTP_CODE))) {
            throw new \Exception(
                ' Http Code is [' . curl_getinfo($ch, CURLINFO_HTTP_CODE) . ']' .
                ' Errno is [' . curl_errno($ch) . ']' .
                ' Error is [' . curl_error($ch) . ']');
        } else {
            $info = json_decode($data, true);
            if (isset($info['test_id']) && (!isset(self::$result[$testId])) && (!isset($info['error'])) && ('19473' == $info['cop_id']) ) {
                $testId = $info['test_id'];
                self::$result[$testId] = $data . PHP_EOL;
                error_log($data,3,'/tmp/a3.txt');
            }else{
                echo $data.PHP_EOL;
            }
        }
        curl_close($ch);
        return true;
    }
}
$exam_results_ids = [3457636];
$a = ['a', 'b', 'c'];
$b = [1, 2, 3, 4, 5, 6, 7, 8, 9, 'a', 'b', 'c', 'd', 'e', 'f'];
$c = [1, 2, 3, 4, 5, 6, 7, 8, 9, 'a', 'b', 'c', 'd', 'e', 'f'];
//$c = [1, 2, 3, 4, 5, 6, 7, 8, 9, 'a', 'b', 'c', 'd', 'e', 'f'];

foreach ($exam_results_ids as $exam_results_id){
foreach ($a as $a1) {
    foreach ($b as $b1){
        foreach ($c as $c1){
            $testID = "59f04df3e630b9645b885" . $a1 .$b1. $c1;
            (new Dingding())->send($testID);
        }
    }
}
}
echo count(Dingding::$result) . PHP_EOL;
