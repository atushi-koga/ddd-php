<?php
declare(strict_types=1);

namespace packages\LastWish\Application;

use packages\LastWish\Domain\Model\User\Email;
use packages\LastWish\Domain\Model\User\Password;
use packages\LastWish\Domain\Model\User\User;

interface AuthServiceInterface
{
    public function authenticate(Email $email, Password $password);

    public function persistAuthentication(User $user);

    public function logout();

    public function isAlreadyAuthenticated();
}