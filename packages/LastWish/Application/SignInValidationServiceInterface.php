<?php
declare(strict_types=1);

namespace packages\LastWish\Application;

interface SignInValidationServiceInterface
{
    public function validate(SignInRequest $request);

    public function hasErrors();

    public function errors();

    public function redirectTo();
}