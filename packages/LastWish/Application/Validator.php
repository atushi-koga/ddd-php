<?php
declare(strict_types=1);

namespace packages\LastWish\Application;

abstract class Validator
{
    /** @var array */
    protected $errors = [];

    /** @var string */
    protected $redirectTo;

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