<?php

class UtilController
{
    public static function json_response($code, $message){
        header_remove();
        http_response_code($code);
        header('Content-Type: application/json');
        return json_encode(array(
            'message' => $message
            ));
    }
}

?>