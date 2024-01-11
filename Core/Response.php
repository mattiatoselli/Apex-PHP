<?php
namespace Core;

class Response 
{
    public function status($statusCode)
    {
        http_response_code($statusCode);
    }

    public function jsonResponse($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}

