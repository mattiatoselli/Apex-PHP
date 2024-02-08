<?php

namespace Traits;

trait Queriable
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
}