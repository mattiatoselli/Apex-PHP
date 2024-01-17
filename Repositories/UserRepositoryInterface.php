<?php

namespace Repositories;
use Models\User;

interface UserRepositoryInterface
{
    public static function findById(string $id): ?User;
}