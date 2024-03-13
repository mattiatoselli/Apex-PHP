<?php

namespace Traits;
use Models\Model;

trait Updatable
{
    public function update(Model $model) :void
    {
        $table = $this->tablename;
        $key = $this->primaryKey;

        $attributes = get_object_vars($model);
        $primaryKeyValue = $attributes[$key];
        unset($attributes[$key]); // Rimuove la primaryKey dagli attributi da aggiornare
        $sets = [];
        foreach (array_keys($attributes) as $column) {
            $sets[] = "$column = :$column";
        }
        $setString = implode(", ", $sets);
        $sql = "UPDATE $table SET $setString WHERE $key = :primaryKeyValue";
        
        $statement = $this->database->prepare($sql);
        $data = array_merge($attributes, ['primaryKeyValue' => $primaryKeyValue]);
        $statement->execute($data);
    }
}