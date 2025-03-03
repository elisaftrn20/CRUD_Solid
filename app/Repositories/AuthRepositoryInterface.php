<?php

namespace App\Repositories;

interface AuthRepositoryInterface
{
    public function login(array $credentials): bool;
    public function logout(): void;
}
