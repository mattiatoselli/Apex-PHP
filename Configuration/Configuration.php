<?php

namespace Configuration;

class Configuration
{
    public function __construct()
    {
        return [
            "database" => [
                "username" => getenv('DB_USERNAME') ?: 'root',
                "port" => getenv('DB_PORT') ?: 3306,
                "password" => getenv('DB_PASSWORD') ?: ''
            ]
        ];
    }
}