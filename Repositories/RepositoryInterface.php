<?php

namespace Repositories;
use Models\Model;

interface RepositoryInterface
{
    public function find(string $value) : ?Model;
}
