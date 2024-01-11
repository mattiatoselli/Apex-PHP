<?php
use Core\Database;

$database = new Database();
var_dump($database->query('select * from users'));
$database = new Database();
var_dump($database->query('select * from users'));