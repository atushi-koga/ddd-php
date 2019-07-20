<?php
declare(strict_types=1);

namespace packages\LastWish\Domain\Model\User;

use Hash;

class User
{
    private $id;

    /** @var Email */
    private $email;

    /** @var string */
    private $password;

    private function __construct(Email $email)
    {
        $this->setEmail($email);
    }

    public static function of($email)
    {
        return new self($email);
    }

    public function id(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function email(): Email
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function setEmail(Email $email): void
    {
        $this->email = $email;
    }

    // @todo: Hash化処理を切り出す
    public function setPassword(Password $password): void
    {
        $this->password = Hash::make($password->value());
    }

    public function setHashPassword(string $password): void
    {
        $this->password = $password;
    }
}