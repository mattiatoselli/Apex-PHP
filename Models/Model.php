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
     * @return 
     */
    public function all()
    {
        $data = $this->database->query('select * from '.$this->tablename);
        $jsonString = json_encode($data);
        $stdObject = json_decode($jsonString);
        return $stdObject;
    }

    public function find(string $id)
    {
        $table = $this->tablename;
        $key = $this->primaryKey;
        $data = $this->database->query("SELECT * FROM $table WHERE $key = '$id'");
        $jsonString = json_encode($data);
        $stdObject = json_decode($jsonString);
        return $stdObject;
    }
}