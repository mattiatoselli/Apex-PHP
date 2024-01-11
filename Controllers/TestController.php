<?php
use Core\Request;
use Core\Response;

$input = Request::all();

$response = new Response();

$data = array("test" => $input);
$response->status(200);
$response->jsonResponse($data);