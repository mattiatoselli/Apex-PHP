<?php

namespace Repositories;
use Models\User;
use Core\Database;

class UserRepository implements UserRepositoryInterface
{
    protected $tablename = "users";
    protected $primaryKey = "id";
    protected $database;

    public function __construct()
    {
        $this->database = new Database();
    }

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