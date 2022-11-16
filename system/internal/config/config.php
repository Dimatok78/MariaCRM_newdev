<?php

namespace System\Internal\Config;

class Config
{
    protected $config = array();

    public function __construct()
    {

    }


    public function setConfig()
    {
        $this->config = array(

            'db' => array(
                'dbname' => 'dev_mariacrm',
                'dbuser' => 'mcrm_admin',
                'dbpass' => 'ala7kazam8',
                'prefix' => 'dev_',
                'driver' => 'mysql',
                'host' => 'localhost',
            ),
        );
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        $this->setConfig();
        return $this->config;
    }

}