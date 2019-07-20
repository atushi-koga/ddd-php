<?php
declare(strict_types=1);

namespace packages\LastWish\Application;

use Hash;
use packages\LastWish\Domain\Model\User\Email;
use packages\LastWish\Domain\Model\User\Password;
use packages\LastWish\Domain\Model\User\User;
use packages\LastWish\Domain\Model\User\UserRepositoryInterface;

class SignInValidationService extends Validator implements SignInValidationServiceInterface
{
    /** @var UserRepositoryInterface */
    private $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
        $this->redirectTo = route('showSignInForm');
    }

    public function validate(SignInRequest $request): void
    {
        $this->validateEmail($request->email);
        $this->validatePassword($request->password);
        if($this->hasErrors()){
            return;
        }

        $this->validateAuth($request->email, $request->password);
    }

    public function validateEmail($email)
    {
        if (!Email::validateNotEmpty($email)) {
            $this->errors['signIn'] = '入力して下さい';
        }
        if (!Email::validateFormat($email)) {
            $this->errors['signIn'] = '正しく入力して下さい';
            return;
        }
    }

    public function validatePassword($password): void
    {
        if (!Password::validateNotEmpty($password)) {
            $this->errors['signIn'] = '入力してください';
        }
    }

    public function validateAuth($email, $password)
    {
        /** @var User $existUser */
        $existUser = $this->userRepo->ofEmail(Email::of($email));

        if (is_null($existUser)) {
            $this->errors['signIn'] = '正しく入力してください';
            return;
        }

        // @todo: Email equalTo()に置き換え
        // @todo: Hash処理を切り出す
        if ($existUser->email()->value() === $email
            && Hash::check($password, $existUser->password())) {
            return;
        }

        $this->errors['signIn'] = '正しく入力してください';
    }
}