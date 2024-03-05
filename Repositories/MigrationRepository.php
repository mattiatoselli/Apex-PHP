<?php

namespace Repositories;
use Models\User;
use Core\Database;
use Traits\ModelQueriable;
use Traits\Deletable;

class MigrationRepository implements MigrationRepositoryInterface
{
    protected $tablename = "migrations";
    protected $primaryKey = "id";
    protected $model = "Models\Migration";
    protected $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    use ModelQueriable;
    use Deletable;
}

