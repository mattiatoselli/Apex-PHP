<?php
use Core\Response;
use Repositories\UserRepository;

$user = UserRepository::findById(1);
view('ciao', ["user" => $user]);

/*$response = new Response();
$response->status(200);
$response->jsonResponse($user);
*/