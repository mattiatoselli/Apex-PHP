<?php

namespace Services;
use Models\User;
use Repositories\UserRepository;

final class UserService
{
    protected static $UserRepository;

    protected static function initialize()
    {
        self::$UserRepository = new UserRepository();
    }

    public static function find(string $id): ?User
    {
        if(self::$UserRepository == null) {
            self::initialize();
        }
        return self::$UserRepository->find($id);
    }

    public static function all(): array
    {
        if(self::$UserRepository == null) {
            self::initialize();
        }
        return self::$UserRepository->all();
    }
}
