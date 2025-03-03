<?php

namespace App\Services;

use App\Repositories\AuthRepositoryInterface;

class AuthService
{
    protected $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function login(array $credentials): bool
    {
        return $this->authRepository->login($credentials);
    }

    public function logout(): void
    {
        $this->authRepository->logout();
    }
}
