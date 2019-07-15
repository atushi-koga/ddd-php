<?php
declare(strict_types=1);

namespace packages\LastWish\Application;

use packages\LastWish\Domain\Model\User\Email;
use packages\LastWish\Domain\Model\User\Password;
use packages\LastWish\Domain\Model\User\User;
use packages\LastWish\Domain\Model\User\UserRepositoryInterface;

class SignUpService implements SignUpServiceInterface
{
    /** @var UserRepositoryInterface */
    private $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function createUser(SignUpRequest $request)
    {
        $newUser = User::of(Email::of($request->email));
        $newUser->setPassword(Password::of($request->password));
        $this->userRepo->create($newUser);
    }
}