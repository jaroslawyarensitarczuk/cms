<?php
namespace Core\Helpers;

class Security
{
    public function hash($dataToEncode)
    {
        $encodedData = hash('sha256', $dataToEncode);
        return $encodedData;
    }

    public function generateRandomString()
    {
        return openssl_random_pseudo_bytes(40);
    }
}