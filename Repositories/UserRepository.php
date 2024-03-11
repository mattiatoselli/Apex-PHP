<?php

namespace Repositories;
use Models\User;
use Core\Database;
use Traits\{ModelQueriable, Deletable, Insertable, Updatable};

class UserRepository implements UserRepositoryInterface
{
    protected $tablename = "users";
    protected $primaryKey = "id";
    protected $model = "Models\User";
    protected $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    use ModelQueriable, Deletable, Insertable, Updatable;
}

