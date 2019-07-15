<?php
declare(strict_types=1);

namespace packages\LastWish\Domain\Model\User;


use InvalidArgumentException;

class Password
{
    /** @var string */
    private $value;

    const ALLOW_FORMAT = '/^[0-9a-zA-Z]{8,20}$/';

    /**
     * Password constructor.
     * @param $value
     */
    public function __construct($value)
    {
        $this->setValue($value);
    }

    public static function of($value): self
    {
        return new self($value);
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->value;
    }

    /**
     * @param $value
     */
    public function setValue($value): void
    {
        self::validate($value);

        $this->value = $value;
    }

    // @todo: string型であることをvalidate
    public static function validate($value)
    {
        if(!self::validateNotEmpty($value)){
            throw new InvalidArgumentException('入力してください');
        }
        if(!self::validateFormat($value)){
            throw new InvalidArgumentException('半角英数字8文字以上20文字以内で入力してください');
        }
    }

    // @todo: 共通メソッドとして切り出す
    public static function validateNotEmpty($value): bool
    {
        return $value !== '' && !is_null($value);
    }

    public static function validateFormat($value): bool
    {
        return preg_match(self::ALLOW_FORMAT, $value) === 1;
    }
}