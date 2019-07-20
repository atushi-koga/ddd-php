<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use packages\LastWish\Application\AuthServiceInterface;
use packages\LastWish\Application\SignInRequest;
use packages\LastWish\Application\SignInServiceInterface;
use packages\LastWish\Application\SignInValidationServiceInterface;
use packages\LastWish\Domain\Model\User\Email;
use packages\LastWish\Domain\Model\User\Password;

class AuthController extends Controller
{
//    /** @var SignInServiceInterface */
//    private $signInService;

    /** @var SignInValidationServiceInterFace */
    private $validationService;

    private $authService;

    public function __construct(
//        SignInServiceInterface $signInService,
        SignInValidationServiceInterFace $signInValidationService,
        AuthServiceInterface $authService
    ) {
//        $this->signInService = $signInService;
        $this->validationService = $signInValidationService;
        $this->authService = $authService;
    }


    public function showSignInForm()
    {
        return view('sign_in');
    }

    public function signIn(Request $request)
    {
        $signInReq = new SignInRequest(
            $request->input('email'),
            $request->input('password')
        );

        $this->validationService->validate($signInReq);
        if ($this->validationService->hasErrors()) {
            return redirect($this->validationService->redirectTo())
                ->withErrors($this->validationService->errors());
        }

        $this->authService->authenticate(
            Email::of($signInReq->email),
            Password::of($signInReq->password)
        );

        return redirect(route('dashboard'));
    }
}
