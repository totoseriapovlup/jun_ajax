<?php


namespace app\core;


class Response
{
    public function json(array $data = []){
        $json = json_encode($data);
        header('Content-Type: application/json');
        echo $json;
    }

    public function status(int $status){
        http_response_code($status);
    }

}