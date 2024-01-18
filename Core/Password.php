<?php

namespace Core;

class Password
{
    public static function Hash(string $password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public static function Verify(string $password, string $hash)
    {
        return password_verify($password, $hash);
    }
}