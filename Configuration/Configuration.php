<?php

namespace Configuration;

class Configuration
{

    public function get()
    {
        return [
            "database" => [
                "username" => getenv('DB_USERNAME') ?: 'wamp',
                "port" => getenv('DB_PORT') ?: 3306,
                "password" => getenv('DB_PASSWORD') ?: '',
                "host" => getenv('DB_HOST') ?: '127.0.0.1',
                "db_name" => getenv("DB_NAME") ?: "il-mio-medico-2",
            ]
        ];
    }
}