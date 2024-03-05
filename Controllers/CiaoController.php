<?php
use Core\Response;
use Services\UserService;
use Core\Password;
use Models\User;
$user = new User();

$user->name = "test";
$user->email = "test@test123.com";
$user->password = "test";

$string = UserService::insert($user);

$response = new Response();
$response->status(200);
$response->jsonResponse(["user" => $string]);
