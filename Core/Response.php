<?php
namespace Core;

class Response 
{
    // Set the HTTP response code
    public function status($statusCode)
    {
        http_response_code($statusCode);
    }

    // Set the response header as JSON and print the data as JSON
    public function jsonResponse($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    // Set the response header as CSV and print the data as CSV
    public function csvResponse($data, $includeHeaders = false)
    {
        header('Content-Type: text/csv');
        if ($includeHeaders) {
            $headers = array_keys($data[0]);
            $output = fopen('php://output', 'w');
            fputcsv($output, $headers);
            foreach ($data as $row) {
                fputcsv($output, $row);
            }
            fclose($output);
        } else {
            $output = fopen('php://output', 'w');
            foreach ($data as $row) {
                fputcsv($output, $row);
            }
            fclose($output);
        }
    }
}