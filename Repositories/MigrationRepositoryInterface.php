<?php

namespace Repositories;
use Repositories\RepositoryInterface;
use Models\Model;


interface MigrationRepositoryInterface extends RepositoryInterface
{
    public function all() : array;
    public function find(string $value) : ?Model;
    public function findMany(array $value) : array;
    public function delete(string $id) : void;
}