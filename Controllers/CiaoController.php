<?php
use Core\Response;
use Services\UserService;
use Core\Password;
use Models\User;
$user = new User();
$user->id = 14;
$user->name = "test_update";
$user->email = "new_email";
$user->password = "test";

$string = UserService::update($user);

$response = new Response();
$response->status(200);
$response->jsonResponse(["user" => $string]);
