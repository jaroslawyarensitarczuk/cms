<?php
namespace Core\Helpers;

class Security
{
    public function saltPassword($password)
    {
        $hash = openssl_random_pseudo_bytes(40);
        $password = hash('sha256', $password);
    }
}