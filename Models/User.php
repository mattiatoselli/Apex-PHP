<?php

namespace Models;

class User extends Model
{
    public $id;
    public $email;
    public $name;
    public $email_verified_at;
    public $password;
    public $remember_token;
    public $created_at;
    public $updated_at;
}
