<?php
declare(strict_types=1);

namespace packages\LastWish\Application;

class SignUpRequest
{
    public $email;

    public $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }
}