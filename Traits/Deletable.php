<?php

namespace Traits;
use Models\Model;

trait Deletable
{
    public function delete(string $id): void
    {
        $table = $this->tablename;
        $key = $this->primaryKey;
        $sql = "DELETE FROM $table WHERE $key = :id";
        $statement = $this->database->prepare($sql);
        $statement->bindValue(":id", $id);
        $statement->execute();
    }
}