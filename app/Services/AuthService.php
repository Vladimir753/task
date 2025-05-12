<?php

namespace app\Services;

use app\Repositories\UserRepository;

class AuthService
{
    protected UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @throws \Exception
     */
    public function login($username, $password): void
    {
        $user = $this->repository->findByUsername($username);

        if (!($user && password_verify($password, $user['password']))) {
            throw new \Exception('Invalid username or password');
        }

        $_SESSION['user'] = $user;
    }
}