<?php

namespace Traits;
use Models\Model;

trait ModelQueriable
{
    public function all(): array
    {
        $result = array();
        //execute the query
        $statement = $this->database->query("select * from $this->tablename");
        $statement->execute();
        $data = $statement->fetchAll();

        //instanciate and return a set of models
        foreach ($data as $row) {
            $record = new $this->model();
            foreach ($row as $column => $value) {
                $record->$column = $value;
            }
            $result[] = $record;
        }
        return $result;
    }

    public function find(string $id) : ?Model
    {
        $table = $this->tablename;
        $key = $this->primaryKey;
        $statement = $this->database->prepare("SELECT * FROM $table WHERE $key = :id");
        $statement->bindValue(':id', $id);
        $statement->execute();
        $data = $statement->fetchAll();
        if(empty($data[0])) {
            return null;
        }
        $record = new $this->model();
        foreach ($data[0] as $column => $value) {
            $record->$column = $value;
        }
        return $record;
    }

    public function findMany(array $ids): array
    {
        $table = $this->tablename;
        $key = $this->primaryKey;
        $idsString = implode(",", $ids);
        $sql = "SELECT * FROM $table WHERE $key IN ($idsString)";
        $statement = $this->database->query($sql);
        $statement->execute();
        $data = $statement->fetchAll();

        $result = array();
        foreach ($data as $row) {
            $record = new $this->model();
            foreach ($row as $column => $value) {
                $record->$column = $value;
            }
            $result[] = $record;
        }
        return $result;
    }
}