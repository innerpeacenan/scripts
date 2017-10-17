<?php
class RequestLogReader{
    public $logpath;
    /**
     * @var array  [ 'path1' => 'int.count of the path been requested' ,...,]
     */
    public $paths;
    public function __construct()
    {
        if('cli' === PHP_SAPI ){
            if(!empty($_SERVER['argv']))
            {
                if(!isset($_SERVER['argv'][1])){
                    throw new \Exception("first argument is required as file name");
                }
                $this->logpath = $_SERVER['argv'][1];
            }else{
                throw new \Exception("argv is not enabled");
            }
        }else{
            throw new \Exception("not run by cli");
        }

        if(!file_exists($this->logpath)){
            throw new \Exception("file not exists");
        }
    }

    public function readLogLineByLine()
    {
        $file = fopen($this->logpath,'r');
        while(!feof($file)){
            $line = fgets($file);
            $this->getLineDetail($line);
        }
        fclose($file);
    }

    /**
     * 分析每行日志中包含的各个元素
     * eg:
     [2017-10-16 23:59:27] beeper_tms_openapi.request.INFO: #traceId:0 host:d1-php55-203-11.xhj.com from:0 uri:/api/v1/g7/get?source_name=yunniao_g7&from=Unknown&msgid=3474713885 clientIp:192.168.203.20 totalTime:400.66 asyncTime:0.04 dbCount:0 dbTime:0 memPeakUsage:0.5
     */
    public function getLineDetail(string $line)
    {
        if('' === trim($line)) return;
        $pieces = explode(' ', $line);
        //@todo check prefix with uri:
        $uriPart = explode(':', $pieces[6]);
        if(!isset($uriPart[1])){
            throw new \Exception('uri part is empty');
        }
        $uri = $uriPart[1];
        /*
         var_export(parse_url("/api/v1/g7/get?source_name=yunniao_g7&from=Unknown&msgid=3474713885"))
         result is:
            array (
              'path' => '/api/v1/g7/get',
              'query' => 'source_name=yunniao_g7&from=Unknown&msgid=3474713885',
            )
         */
        $info = parse_url($uri);
        if(!isset($info['path'])) return;
        $path = $info['path'];
        if(isset($this->paths[$path])){
            $this->paths[$path] ++;
        }else{
            $this->paths[$path] = 1;
        }
    }

    public function getRequestDistribution()
    {
        var_export($this->paths);
        echo PHP_EOL;
    }
}

$logReader = new RequestLogReader();
$logReader->readLogLineByLine();
$logReader->getRequestDistribution();
