<?php
namespace Core;

class Request
{
    public static function input(string $key) : ?string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return $_REQUEST[$key] ?? null;
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $entityBody = file_get_contents('php://input');
            $encoded = json_encode($entityBody);
            $value = $encoded[$key] ?? null;
            return $value;
        }
        
    }

    public static function all()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $request = $_REQUEST;
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request = file_get_contents('php://input');
            $request = json_decode($request, true);
        }

        if (array_key_exists('path', $request)) {
            unset($request['path']);
        }

        return $request;
    }
}


    
