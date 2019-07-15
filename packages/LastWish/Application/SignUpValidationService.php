<?php
declare(strict_types=1);

namespace packages\LastWish\Application;

use packages\LastWish\Domain\Model\User\Email;
use packages\LastWish\Domain\Model\User\Password;
use packages\LastWish\Domain\Model\User\UserRepositoryInterface;

class SignUpValidationService implements SignUpValidationServiceInterFace
{
    /** @var array */
    private $errors = [];

    /** @var string */
    private $redirectTo;

    /** @var UserRepositoryInterface */
    private $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
        $this->redirectTo = route('home');
    }

    public function validate(SignUpRequest $request): void
    {
        $this->validateEmail($request->email);
        $this->validatePassword($request->password);
    }

    public function validateEmail($email)
    {
        if (!Email::validateNotEmpty($email)) {
            $this->errors['email'][] = '入力して下さい';
            return;
        }
        if (!Email::validateFormat($email)) {
            $this->errors['email'][] = '正しく入力して下さい';
            return;
        }

        $existUser = $this->userRepo->ofEmail(Email::of($email));
        if ($existUser) {
            $this->errors['email'][] = '既に登録済みのメールアドレスです';
        }
    }

    public function validatePassword($password): void
    {
        if(!Password::validateNotEmpty($password)){
            $this->errors['password'][] = '入力してください';
            return;
        }
        if(!Password::validateFormat($password)){
            $this->errors['password'][] = '半角英数字8文字以上20文字以内で入力してください';
        }
    }

    public function hasErrors(): bool
    {
        return count($this->errors) > 0;
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function redirectTo(): string
    {
        return $this->redirectTo;
    }
}