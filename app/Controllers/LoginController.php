<?php

namespace app\Controllers;

use app\Repositories\UserRepository;
use app\Services\AuthService;
use core\Controller;

class LoginController extends Controller {

    protected AuthService $service;

    public function __construct()
    {
        $this->service = new AuthService(new UserRepository());
    }

    public function index(): void
    {
        $this->view('auth/login');
    }

    public function store(): void
    {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        try {
            $this->service->login($username, $password);
        } catch (\Exception $e) {
            $this->view('auth/login', ['error' => $e->getMessage()]);
            exit();
        }

        $this->redirect('/dashboard');
    }

    public function destroy(): void
    {
        session_destroy();

        $this->redirect('/login');
    }
}