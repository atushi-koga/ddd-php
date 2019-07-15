<?php
declare(strict_types=1);

namespace packages\LastWish\Infrastructure\Domain\Model\User\Eloquent;

use packages\LastWish\Domain\Model\User\Email;
use packages\LastWish\Domain\Model\User\User;
use packages\LastWish\Domain\Model\User\UserRepositoryInterface;
use packages\LastWish\Infrastructure\Persistence\Eloquent\EloquentUser;

class UserRepository implements UserRepositoryInterface
{
    /** @var EloquentUser */
    private $model;

    public function __construct()
    {
        $this->model = new EloquentUser();
    }

    public function ofEmail(Email $email): ?User
    {
        $user = $this->model->where('email', $email->value())
            ->first();

        if ($user) {
            return User::of(Email::of($user->email));
        }

        return null;
    }

    public function create(User $user)
    {
        $user = $this->model->create([
            'email' => $user->email()->value(),
            'password' => $user->password(),
        ]);
        dd($user);
    }

}