<?php
use Core\Response;

// crea un array di anagrafiche
$data = array(
    array("nome" => "Mario", "cognome" => "Rossi", "età" => 30),
    array("nome" => "Anna", "cognome" => "Verdi", "età" => 25),
    array("nome" => "Luca", "cognome" => "Bianchi", "età" => 28)
);

$response = new Response();
$response->status(200);
$response->jsonResponse($data);
exit();