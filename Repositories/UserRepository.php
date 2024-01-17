<?php

namespace Repositories;
use Models\User;
use Core\Database;

class UserRepository implements UserRepositoryInterface
{
    protected const TABLENAME = "users";
    protected const PRIMARY_KEY = "id";

    public static function findById(string $id) : ?User
    {
        $table = self::TABLENAME;
        $key = self::PRIMARY_KEY;
        $database = new DataBase();
        $statement = $database->query("SELECT * FROM $table WHERE $key = '$id'");
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