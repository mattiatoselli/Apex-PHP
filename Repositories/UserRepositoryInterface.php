<?php

namespace Repositories;
use Repositories\RepositoryInterface;
use Models\User;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function find(string $id): ?User;
}