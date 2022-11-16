<?php

namespace System\Internal\Config;
use PDO;

/**
 * Класс работы с базой данных, содержащий подключение и основные запросы к БД,
 * расширяет базовый класс PDO
 */

class Database extends PDO
{

    /**
     * переменная для класса PDO
     * @var PDO
     */
    protected $db;

    /**
     * Основная строка для подключения к БД
     * @var string
     */
    protected $dsn;

    /**
     * Настройки системы
     * @var array
     */
    protected $config;

    /**
     * Переменная для возможных возвращаемых данных
     * @var array|string|int|void
     */
    protected $result;

    public function __construct()
    {
        $this->getConfig();
        $this->dsn = $this->config['db']['driver'].':'.'host='.$this->config['db']['host'].';dname='.$this->config['db']['dbname'];
        $options = array();

        try {
            // подключаемся к серверу
            $this->db = new PDO('mysql:host='.$this->config['db']['host'].';dbname='.$this->config['db']['dbname'],$this->config['db']['dbuser'], $this->config['db']['dbpass']);
            echo "Database connection established<br/>";
        }
        catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        $cfg_class = new Config();
        $this->config = $cfg_class->getConfig();

    }

    public function setDb()
    {
    }

    public function createTable($statement, $alterStatement = false)
    {
        $sth = $this->db->query($statement);
        $sth->execute();

        if (isset($alterStatement) ) {
            foreach ($alterStatement as $value)
            {
                $sth = $this->db->query($value);
                $sth->execute();
            }
        }
    }

    /**
     * @param $statement string
     * @param $lastId bool
     * @return false|string|void
     */
    public function insert($statement, $lastId = false)
    {
        $sth = $this->db->prepare($statement);
        $sth->execute();

        if ( isset($lastId) )
        {
            return $this->db->lastInsertId();
        }
    }

    /**
     * @param $statement
     * @return mixed
     */
    public function select($statement)
    {
        $sth = $this->db->query($statement);
        $sth->execute();
        $this->result = $sth->fetch(2);
        return $this->result;
    }

}