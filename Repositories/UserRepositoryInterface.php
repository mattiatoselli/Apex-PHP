<?php

namespace Repositories;
use Repositories\RepositoryInterface;
use Models\Model;


interface UserRepositoryInterface extends RepositoryInterface
{
    //public function insert(Model $model) : Model;
    public function all() : array;
    public function find(string $value) : ?Model;
    public function findMany(array $value) : array;
    public function delete(string $id) : void;
    public function update(Model $model) : void;
}

