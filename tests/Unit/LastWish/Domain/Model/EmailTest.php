<?php

namespace Tests\Unit\LastWish\Domain\Model;

use packages\LastWish\Domain\Model\User\Email;
use InvalidArgumentException;
use Tests\TestCase;

class EmailTest extends TestCase
{
    /**
     * @dataProvider dataOfException
     */
    public function testOfException($value, $exception, $exceptionMessage)
    {
        $this->expectException($exception);
        $this->expectExceptionMessage($exceptionMessage);

        Email::of($value);
    }

    public function dataOfException()
    {
        return [
            'null value' => [
                null,
                InvalidArgumentException::class,
                '入力してください',
            ],
            'invalid email format' => [
                'invalidEmail',
                InvalidArgumentException::class,
                '正しく入力してください',
            ],
        ];
    }

    public function testOf()
    {
        $this->assertInstanceOf(Email::class, Email::of('test@example.com'));
    }

    public function testValue()
    {
        $this->assertEquals('test@example.com', Email::of('test@example.com')->value());
    }

    /**
     * @dataProvider dataValidateNotEmpty
     */
    public function testValidateNotEmpty($value, $expected)
    {
        $this->assertEquals($expected, Email::validateNotEmpty($value));
    }

    public function dataValidateNotEmpty()
    {
        return [
            'empty string' => [
                '',
                false,
            ],
            'null' => [
                null,
                false,
            ],
            'valid value' => [
                'test@example.com',
                true,
            ],
        ];
    }

    /**
     * @dataProvider dataValidateFormat
     */
    public function testValidateFormat($value, $expected)
    {
        $this->assertEquals($expected, Email::validateFormat($value));
    }

    public function dataValidateFormat()
    {
        return [
            'invalid email format' => [
                'test',
                false,
            ],
            'valid email format' => [
                'test@example.com',
                true,
            ]
        ];
    }
}
