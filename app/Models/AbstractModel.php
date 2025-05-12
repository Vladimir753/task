<?php

namespace app\Models;

use PDO;
use PDOException;

class AbstractModel
{
    private string $dbDSN = DB_DSN;
    private string $user = DB_USER;
    private string $password = DB_PASS;
    protected PDO $db;

    protected string $table;
    protected array $columns = [];

    public function __construct()
    {
        try {
            $this->db = new PDO($this->dbDSN, $this->user, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function find($id): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->execute(['id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function allSorted(string $column = 'id', string $direction = 'ASC'): array
    {
        $allowedDirections = ['ASC', 'DESC'];
        $direction = strtoupper($direction);

        if (!in_array($direction, $allowedDirections)) {
            $direction = 'ASC';
        }

        $stmt = $this->db->prepare("SELECT * FROM {$this->table} ORDER BY {$column} {$direction}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(array $data): bool
    {
        $fields = array_intersect_key($data, array_flip($this->columns));
        $placeholders = implode(', ', array_map(fn($col) => ":$col", array_keys($fields)));
        $columns = implode(', ', array_keys($fields));

        $stmt = $this->db->prepare("INSERT INTO {$this->table} ($columns) VALUES ($placeholders)");

        return $stmt->execute($fields);
    }

    public function update(int $id, array $data): bool
    {
        $fields = array_intersect_key($data, array_flip($this->columns));

        $setClause = implode(', ', array_map(fn($col) => "$col = :$col", array_keys($fields)));
        $fields['id'] = $id;

        $stmt = $this->db->prepare("UPDATE {$this->table} SET $setClause WHERE id = :id");

        return $stmt->execute($fields);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = :id");

        return $stmt->execute(['id' => $id]);
    }
}