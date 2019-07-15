<?php
declare(strict_types=1);

namespace packages\LastWish\Domain\Model\User;

interface UserRepositoryInterface
{
    public function ofEmail(Email $email);

    public function create(User $user);
}


