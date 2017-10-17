<?php
use PHPUnit\Framework\TestCase;
class TestDir extends TestCase{
    public function setUp(){
        parent::setUp();
    }

    public function testDirnameReturnDotWhileWithoutSlashInPath(){
        //  If there are no slashes in path, a dot ('.') is returned, indicating the current directory
        $dir = dirname('hello');
        $this->assertEquals('.', $dir);

    }
}
