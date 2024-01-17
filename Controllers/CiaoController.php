<?php
use Core\Response;
use Services\UserService;

$user = UserService::find(1);

view('ciao', ["user" => $user]);

/*$response = new Response();
$response->status(200);
$response->jsonResponse($user);
*/