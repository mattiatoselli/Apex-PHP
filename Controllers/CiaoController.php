<?php
use Core\Response;
use Models\User;

$userRepository = new User();
$data = $userRepository->findMany([]);
$response = new Response();
$response->status(200);

$response->jsonResponse($data);
