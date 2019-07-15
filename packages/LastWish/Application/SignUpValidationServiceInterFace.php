<?php
declare(strict_types=1);

namespace packages\LastWish\Application;

interface SignUpValidationServiceInterFace
{
    public function validate(SignUpRequest $request);

    public function hasErrors();

    public function errors();

    public function redirectTo();
}