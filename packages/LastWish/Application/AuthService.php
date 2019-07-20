<?php
declare(strict_types=1);

namespace packages\LastWish\Application;

use Hash;
use packages\LastWish\Application\Session\SessionRepositoryInterface;
use packages\LastWish\Domain\Model\User\Email;
use packages\LastWish\Domain\Model\User\Password;
use packages\LastWish\Domain\Model\User\User;
use packages\LastWish\Domain\Model\User\UserRepositoryInterface;

class AuthService implements AuthServiceInterface
{
    /** @var SessionRepositoryInterface */
    private $sessionRepo;

    /** @var UserRepositoryInterface */
    private $userRepo;

    public function __construct(
        SessionRepositoryInterface $sessionRepo,
        UserRepositoryInterface $userRepo
    ) {
        $this->sessionRepo = $sessionRepo;
        $this->userRepo = $userRepo;
    }

    public function authenticate(Email $email, Password $password)
    {
        if ($this->isAlreadyAuthenticated()) {
            return true;
        }

        /** @var null|User $user */
        $user = $this->userRepo->ofEmail($email);
        if (is_null($user)) {
            return false;
        }

        // @todo: Hash処理は切り出す
        if (!Hash::check($password->value(), $user->password())) {
            return false;
        }

        $this->persistAuthentication($user);

        return true;
    }

    public function persistAuthentication(User $user)
    {
        $this->sessionRepo->set('user', [
            'id' => $user->id(),
            'email' => $user->email()->value(),
        ]);
    }

    public function logout()
    {
        // TODO: Implement logout() method.
    }

    public function isAlreadyAuthenticated(): bool
    {
        return $this->sessionRepo->has('user');
    }
}