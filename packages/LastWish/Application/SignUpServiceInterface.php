<?php
declare(strict_types=1);

namespace packages\LastWish\Application;

interface SignUpServiceInterface
{
    public function createUser(SignUpRequest $request);
}