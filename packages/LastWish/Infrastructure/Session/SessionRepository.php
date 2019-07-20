<?php
declare(strict_types=1);

namespace packages\LastWish\Infrastructure\Session;

use packages\LastWish\Application\Session\SessionRepositoryInterface;

class SessionRepository implements SessionRepositoryInterface
{
    public function set($key, array $value): void
    {
        session([$key => $value]);
    }

    public function get($key)
    {
        return session($key);
    }

    public function put($key, $value): void
    {
        session()->put($key, $value);
    }

    public function all()
    {
        return session()->all();
    }

    public function has($key): bool
    {
        return session()->has($key);
    }

    public function clear($key): void
    {
        session()->forget($key);
    }

    public function clearAll(): void
    {
        session()->flush();
    }
}