<?php

namespace Core;
use Configuration\Configuration;

class Database
{
    protected static $connection;

    public function __construct()
    {
        if(static::$connection === null) {
            $config = new Configuration();
            $config = $config->get();
            $username = $config['database']['username'];
            $password = $config['database']['password'];
            $host = $config['database']['host'];
            $port = $config['database']['port'];
            $db_name = $config['database']['db_name'];
            
            $dsn = "mysql:host=$host;port=$port;dbname=$db_name";
            
            $options = [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            ];
            static::$connection = new \PDO($dsn, $username, $password, $options);
        }
    }

    public function query($queryString)
    {
        $statement = static::$connection->query($queryString);
        $statement->execute();
        return $statement->fetchAll();
    }
}