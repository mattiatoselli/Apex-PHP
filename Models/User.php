<?php

namespace Models;

class User extends Model
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
}
