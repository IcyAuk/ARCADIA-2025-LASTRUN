<?php

namespace App\Core;

class AJAX
{
    public function encode(bool $bool, $data, $errorString = '')
    {
        if ($bool) {
            return json_encode(
                [
                    'success' => true,
                    'data' => $data
                ]
            );
        }

        return json_encode(
            [
                'success' => false,
                'error' => $errorString
            ]
        );
        
    }

    public function returnEncode(array $queryResponse, string $errorString = '')
    {
        return $queryResponse ? $this->encode(true, $queryResponse) : $this->encode(false, [], $errorString);
    }
}