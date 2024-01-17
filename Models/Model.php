<?php

namespace Models;
use Core\Database;

class Model
{
    //informations needed in every model
    protected $tablename;
    protected $primaryKey;

    //variables for this class
    protected $database;

    public function __construct()
    {
        $this->database = new DataBase();
    }

    /**
     * get all the records
     * @return array
     */
    public function all()
    {
        $statement = $this->database->query('select * from '.$this->tablename);
        $statement->execute();
        $data = $statement->fetchAll();
        $jsonString = json_encode($data);
        $stdObject = json_decode($jsonString);
        return $stdObject;
    }

    /**
     * find single record
     * @return array
     */
    public function find($id)
    {
        $table = $this->tablename;
        $key = $this->primaryKey;
        $statement = $this->database->query("SELECT * FROM $table WHERE $key = '$id'");
        $statement->execute();
        $data = $statement->fetchAll();
        $jsonString = json_encode($data);
        $stdObject = json_decode($jsonString);
        return empty($stdObject) ? null : $stdObject[0];
    }

    public function save($object)
    {
        $informations = json_encode($object);
        $informations = json_decode($informations, true);
        $id = isset($informations[$this->primaryKey]) ? $informations[$this->primaryKey] : null;

        if($id == null) {
            $id = $this->insert($object);
            return $this->find($id);
        }

        $retrievedObject = $this->find($id);

        if($retrievedObject == null) {
            $id = $this->insert($object);
            return $this->find($id);
        }

        $this->update($object);
        return $this->find($object->id);
    }

    /**
     * find massively records by id
     * @return array
     */
    public function findMany(array $ids)
    {
        $table = $this->tablename;
        $key = $this->primaryKey;
        $idsString = implode("','", $ids);
        $statement = $this->database->query("SELECT * FROM $table WHERE $key IN ('$idsString')");
        $statement->execute();
        $data = $statement->fetchAll();
        $jsonString = json_encode($data);
        $stdObject = json_decode($jsonString);
        return $stdObject;
    }

    private function insert($object) : string
    {
        $table = $this->tablename;
        $informations = json_encode($object);
        $informations = json_decode($informations, true);

        $columns = implode(', ', array_keys($informations));
        $placeholders = ':' . implode(', :', array_keys($informations));
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";

        $statement = $this->database->prepare($sql);
        $statement->execute($informations);
        
        return $this->database->lastInsertId();
    }

    /**
     * update record
     * @param string $id
     * @param array $data
     * @return bool
     */
    private function update($object)
    {
        $table = $this->tablename;
        $primaryKey = $this->primaryKey;
        $informations = json_encode($object);
        $informations = json_decode($informations, true);

        $setValues = '';
        foreach ($informations as $column => $value) {
            $setValues .= "$column = :$column, ";
        }
        $setValues = rtrim($setValues, ', ');

        $sql = "UPDATE $table SET $setValues WHERE $primaryKey = :id";

        $statement = $this->database->prepare($sql);
        $informations['id'] = $informations[$primaryKey];
        $statement->execute($informations);

        return true;
    }
}