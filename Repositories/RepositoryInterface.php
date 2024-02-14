<?php

namespace Repositories;
use Models\Model;

interface RepositoryInterface
{
    public function all() : array;
    public function find(string $value) : ?Model;
    public function findMany(array $value) : array;
}
