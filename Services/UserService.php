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

    public static function findMany(array $ids) : array
    {
        if(self::$UserRepository == null) {
            self::initialize();
        }
        return self::$UserRepository->findMany($ids);
    }

    public static function delete(string $id) : void
    {
        if(self::$UserRepository == null) {
            self::initialize();
        }
        self::$UserRepository->delete($id);
    }

    public static function insert(User $user) : User
    {
        if(self::$UserRepository == null) {
            self::initialize();
        }
        return self::$UserRepository->insert($user);
    }
}
