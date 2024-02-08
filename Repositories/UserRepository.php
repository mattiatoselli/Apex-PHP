<?php

namespace Repositories;
use Models\User;
use Core\Database;
use Traits\Queriable;

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

    use Queriable;

    /*
    public function all(): array
    {
        $result = array();
        $statement = $this->database->query("select * from $this->tablename");
        $statement->execute();
        $data = $statement->fetchAll();
        foreach ($data as $row) {
            $record = new User();
            foreach ($row as $column => $value) {
                $record->$column = $value;
            }
            $result[] = $record;
        }
        return $result;
    }
    */

    public function find(string $id) : ?User
    {
        $table = $this->tablename;
        $key = $this->primaryKey;
        $statement = $this->database->query("SELECT * FROM $table WHERE $key = '$id'");
        $statement->execute();
        $data = $statement->fetchAll();
        if(empty($data[0])) {
            return null;
        }
        $record = new User();
        foreach ($data[0] as $column => $value) {
            $record->$column = $value;
        }
        return $record;
    }
}