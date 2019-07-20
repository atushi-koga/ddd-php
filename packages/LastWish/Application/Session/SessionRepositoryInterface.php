<?php
declare(strict_types=1);

namespace packages\LastWish\Application\Session;

interface SessionRepositoryInterface
{
    public function set($key, array $value);

    public function get($key);

    public function put($key, $value);

    public function all();

    public function has($key);

    public function clear($key);

    public function clearAll();
}