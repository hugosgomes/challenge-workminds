<?php

namespace App\Http;


class Response
{
    public function return($success, $message, $data = [])
    {
        return [
            'success'   => $success,
            'messages'  => $message,
            'data'      => $data
        ];
    }
}
