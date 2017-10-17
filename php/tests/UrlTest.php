<?php
use PHPUnit\Framework\TestCase;
class TestURL extends TestCase{
    public $url = "http://www.sina.com.cn/abc/de/fg.php?id=1";
    public function setUp(){
        parent::setUp();
    }

    public function testGetExtension(){
        parse_url($this->url);
        $path = pathinfo($this->url);
        $this->assertEquals(['dirname' => 'http://www.sina.com.cn/abc/de',
            'basename' => 'fg.php?id=1',
            'extension' => 'php?id=1',
            'filename' => 'fg',
        ],$path);
        $extension = explode('?',$path['extension']);
        $this->assertEquals('php', $extension[0]);
    }

    public function testBasename(){
        $path = parse_url($this->url);
        $this->assertEquals(['scheme' => 'http',
            'host' => 'www.sina.com.cn',
            'path' => '/abc/de/fg.php',
            'query' => 'id=1',
        ],$path);
        // int strrpos ( string $haystack , string $needle [, int $offset = 0 ] )
        $pos = strrpos($path['path'], '.');
        $extension = "";
        if(false !== $pos){
            $extension = substr($path['path'],$pos + 1);
        }
        $this->assertEquals('php',$extension);
    }



}
