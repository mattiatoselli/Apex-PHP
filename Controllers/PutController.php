<?php

$message = "This is the PUT controller";

$data = array("message" => $message);

http_response_code(200);
header('Content-Type: application/json');

echo json_encode($data);
exit();