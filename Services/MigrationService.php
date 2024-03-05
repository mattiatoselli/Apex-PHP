<?php

namespace Services;
use Models\Migration;
use Repositories\MigrationRepository;

final class MigrationService
{
    protected static $MigrationRepository;

    protected static function initialize()
    {
        self::$MigrationRepository = new MigrationRepository();
    }

    public static function find(string $id): ?User
    {
        if(self::$MigrationRepository == null) {
            self::initialize();
        }
        return self::$MigrationRepository->find($id);
    }

    public static function all(): array
    {
        if(self::$MigrationRepository == null) {
            self::initialize();
        }
        return self::$MigrationRepository->all();
    }

    public static function findMany(array $ids) : array
    {
        if(self::$MigrationRepository == null) {
            self::initialize();
        }
        return self::$MigrationRepository->findMany($ids);
    }

    public static function delete(string $id) : void
    {
        if(self::$MigrationRepository == null) {
            self::initialize();
        }
        return self::$MigrationRepository->delete($id);
    }
}
