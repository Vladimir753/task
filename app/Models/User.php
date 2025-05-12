<?php

namespace app\Models;

class User extends AbstractModel
{
    protected string $table = 'users';

    protected array $columns = [
        'username',
        'password',
        'email',
        'created_at',
    ];

    public function findByUsername($username) {
        $stmt = $this->db->prepare("SELECT * FROM $this->table WHERE username = :username LIMIT 1");
        $stmt->execute(['username' => $username]);

        return $stmt->fetch();
    }
}