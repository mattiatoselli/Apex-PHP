<?php
use Core\Response;
use Services\UserService;
use Core\Password;

$users = UserService::all();
//view('ciao', ["user" => $user]);

$response = new Response();
$response->status(200);
$response->jsonResponse($users);
