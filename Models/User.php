<?php

namespace Models;

class User
{
    public $id;
    public $email;
    public $first_name;
    public $last_name;
    public $role;
    public $email_verify_token;
    public $email_token_date;
    public $email_verified_at;
    public $last_login;
    public $password;
    public $password_reset_token;
    public $password_reset_token_at;
    public $created_at;
    public $updated_at;

    public function getClassName()
    {
        return static::class;
    }

    public function __set($name, $value)
    {
        $className = self::getClassName();
        throw new \InvalidArgumentException("Property \"$name\" does not exists in Model $className.");
    }

    public function __get($name)
    {
        throw new \InvalidArgumentException("Property \"$name\" does not exists in Model $className.");
    }
}
