<?php

namespace app\Services;

use app\Repositories\ArticleRepository;

class ArticleService
{
    protected ArticleRepository $repository;

    public function __construct(ArticleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function allSorted(string $column, string $direction = 'ASC'): array
    {
        return $this->repository->allSorted($column, $direction);
    }

    public function find(int $id): ?array
    {
        return $this->repository->find($id);
    }

    /**
     * @throws \Exception
     */
    public function create(array $array): void
    {
        $data = $this->constructData($array);

        $this->repository->create($data);
    }

    /**
     * @throws \Exception
     */
    public function update(int $id, array $array): void
    {
        $data = $this->constructData($array);

        $this->repository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }

    /**
     * @throws \Exception
     */
    private function constructData($array): array
    {
        $data = [
            'title' => $array['title'] ?? '',
            'content' => $array['content'] ?? '',
        ];

        if (isset($array['image']) && $array['image']['error'] === UPLOAD_ERR_OK) {
            $tmpName = $array['image']['tmp_name'];
            $name = basename($array['image']['name']);
            $destination = '/uploads/' . $name;

            if (!move_uploaded_file($tmpName, PUBLIC_PATH . $destination)) {
                throw new \Exception("An error occurred while uploading a file.");
            }

            $data['image'] = $destination;
        }

        return $data;
    }
}