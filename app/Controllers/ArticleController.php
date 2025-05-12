<?php

namespace app\Controllers;

use app\Repositories\ArticleRepository;
use app\Services\ArticleService;
use core\Controller;

class ArticleController extends Controller
{
    protected ArticleService $service;

    public function __construct()
    {
        $this->service = new ArticleService(new ArticleRepository());
    }

    public function index(): void
    {
        $this->view('admin/articles/view', [
            'articles' => $this->service->allSorted('title'),
        ], 'admin');
    }

    public function create(): void
    {
        $this->view('admin/articles/create',[], 'admin');
    }

    /**
     * @throws \Exception
     */
    public function store(): void
    {
        try {
            $this->service->create(array_merge($_POST, $_FILES));
        } catch (\Exception $e) {
            $this->view('admin/articles/create', [
                'error' => $e->getMessage(),
            ], 'admin');
            exit();
        }

        $this->redirect('/articles');
    }

    public function edit(int $id): void
    {
        $this->view('admin/articles/edit', [
            'article' => $this->service->find($id),
        ], 'admin');
    }

    /**
     * @throws \Exception
     */
    public function update(int $id): void
    {
        try {
            $this->service->update($id, array_merge($_POST, $_FILES));
        } catch (\Exception $e) {
            $this->view('admin/articles/edit', [
                'article' => $this->service->find($id),
                'error' => $e->getMessage(),
            ], 'admin');
            exit();
        }

        $this->redirect('/articles');
    }

    public function destroy($id): void
    {
        $this->service->delete($id);

        $this->redirect('/articles');
    }
}