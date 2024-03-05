<?php

namespace Traits;
use Models\Model;

trait Insertable
{
    public function insert(Model $model) : Model
    {
        $table = $this->tablename;

        $attributes = get_object_vars($model);
        $columns = implode(", ", array_keys($attributes));
        $values = ":" . implode(", :", array_keys($attributes));

        $data = array();
        foreach ($attributes as $key => $value) {
            $data[$key] = $value;
        }
        
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";

        $statement = $this->database->prepare($sql);
        $statement->execute($data);

        $id = $this->database->lastInsertId();
        $data[$this->primaryKey] = $id;
        foreach ($data as $key => $value) {
            $model->$key = $value;
        }

        return $model;
    }
}

