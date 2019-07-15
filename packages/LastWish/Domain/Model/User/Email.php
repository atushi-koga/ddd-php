<?php
declare(strict_types=1);

namespace packages\LastWish\Domain\Model\User;

use Psr\Log\InvalidArgumentException;

class Email
{
    /** @var  string */
    private $value;

    private function __construct($value)
    {
        $this->setValue($value);
    }

    public static function of($value): self
    {
        return new self($value);
    }

    public function value(): string
    {
        return $this->value;
    }

    public function setValue($value): void
    {
        self::validate($value);

        $this->value = $value;
    }

    public static function validate($value)
    {
        // @todo: string型であることをvalidate
        if (!self::validateNotEmpty($value)) {
            throw new InvalidArgumentException('入力してください');
        }
        if (!self::validateFormat($value)) {
            throw new InvalidArgumentException('正しく入力してください');
        }
    }

    public static function validateNotEmpty($value): bool
    {
        return $value !== '' && !is_null($value);
    }

    public static function validateFormat($value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }
}