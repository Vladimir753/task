<?php

namespace app\Repositories;

use app\Models\User;

class UserRepository
{
    public function findByUsername(string $username)
    {
        return (new User)->findByUsername($username);
    }
}