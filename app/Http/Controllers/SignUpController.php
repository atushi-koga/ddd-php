<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use packages\LastWish\Application\SignUpRequest;
use packages\LastWish\Application\SignUpServiceInterface;
use packages\LastWish\Application\SignUpValidationServiceInterFace;

class SignUpController extends Controller
{
    /** @var SignUpServiceInterface */
    private $signUpService;

    /** @var SignUpValidationServiceInterFace */
    private $validationService;

    public function __construct(
        SignUpServiceInterface $signUpService,
        SignUpValidationServiceInterFace $signUpValidationService
    ) {
        $this->signUpService = $signUpService;
        $this->validationService = $signUpValidationService;
    }

    public function signUp(Request $request)
    {
        $signUpReq = new SignUpRequest(
            $request->input('email'),
            $request->input('password')
        );

        $this->validationService->validate($signUpReq);
        if ($this->validationService->hasErrors()) {
            return redirect($this->validationService->redirectTo())
                ->withErrors($this->validationService->errors());
        }

        $this->signUpService->createUser($signUpReq);
    }
}
