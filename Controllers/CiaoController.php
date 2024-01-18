<?php
use Core\Response;
use Services\UserService;
use Core\Password;

$password = "ciao";
$hash = Password::Hash($password);
var_dump(Password::verify("wewe", $hash));
die;
//$user = UserService::find(1);
//view('ciao', ["user" => $user]);

/*$response = new Response();
$response->status(200);
$response->jsonResponse($user);
*/