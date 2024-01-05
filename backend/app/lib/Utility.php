<?php

class Utility
{
    public static function sendResponse($message, $status)
    {
        http_response_code($status);
        echo json_encode(["message" => $message, "status" => $status]);
    }

    public static function validator($requiredFields = [])
    {
        
        // Validate data (you may want to add more validation)
        foreach ($requiredFields as $field) {
            if (!isset($_POST[$field])) {
                self::sendResponse("Incomplete data. Missing field: {$field}", 401);
            }
        }
    }
}
