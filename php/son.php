<?php

/**
 * Class father
 */
class father
{
    public function __construct()
    {
        $this->init();
    }

    /**
     * @access
     * @return void
     * Created by: xiaoning nan
     * Last Modify: xiaoning nan
     *
     *
     *
     *
     */
    public function init()
    {
        echo "father\n";
    }
}

/**
 * Class son
 */
class son extends father
{
    /**
     * @access
     * @return void
     * Created by: xiaoning nan
     * Last Modify: xiaoning nan
     *
     *
     *
     */
    public function init()
    {
        echo "son\n";
    }
}

$son = new son();
$son->init();
