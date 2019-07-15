<?php

namespace Tests\Unit\LastWish\Domain\Model;

use InvalidArgumentException;
use packages\LastWish\Domain\Model\User\Password;
use Tests\TestCase;

class PasswordTest extends TestCase
{
    /**
     * @dataProvider dataOfException
     */
    public function testOfException($value, $exception, $exceptionMessage)
    {
        $this->expectException($exception);
        $this->expectExceptionMessage($exceptionMessage);

        Password::of($value);
    }

    public function dataOfException()
    {
        return [
            'null value' => [
                null,
                InvalidArgumentException::class,
                '入力してください',
            ],
            'invalid password format' => [
                '11',
                InvalidArgumentException::class,
                '半角英数字8文字以上20文字以内で入力してください',
            ],
        ];
    }

    public function testOf()
    {
        $this->assertInstanceOf(Password::class, Password::of('abcd1234'));
    }

    public function testValue()
    {
        $this->assertEquals('abcd1234', Password::of('abcd1234')->value());
    }

    /**
     * @dataProvider dataValidateFormat
     */
    public function testValidateFormat($value, $expected)
    {
        $this->assertEquals($expected, Password::validateFormat($value));
    }

    public function dataValidateFormat()
    {
        return [
            'less length' => [
                'abcd123',
                false,
            ],
            'over length' => [
                '123456789012345678901',
                false,
            ],
            'include not allowed char' => [
                'abcd1234#',
                false,
            ],
            'valid format, 8 char length' => [
                'abCD0129',
                true
            ],
            'valid format, 20 char length' => [
                'abcdeVWXYZ0123456789',
                true
            ],
        ];
    }
}
