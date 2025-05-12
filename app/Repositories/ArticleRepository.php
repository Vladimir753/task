<?php

namespace app\Repositories;

use app\Models\Article;

class ArticleRepository
{
    public function allSorted(string $column, string $direction = 'ASC'): array
    {
        return (new Article)->allSorted($column, $direction);
    }

    public function create(array $array): void
    {
        (new Article)->create($array);
    }

    public function find(int $id): ?array
    {
        return (new Article)->find($id);
    }

    public function update(int $id, array $data): bool
    {
        return (new Article)->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return (new Article)->delete($id);
    }
}