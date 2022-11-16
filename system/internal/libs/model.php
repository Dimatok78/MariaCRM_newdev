<?php

namespace System\Internal\Libs;

use System\Internal\Config\Database;
use System\Internal\Core\Sessions;

class Model
{
    /**
     * @var object содержит данные о сессиях
     */
    public $sessions;

    /**
     * @var object содержит информацию для подключения к БД
     */
    protected $dbConn;

    function __construct(){
        $this->dbConn = new Database();
        $this->sessions = new Sessions();
    }

    public function createTable()
    {

    }

}