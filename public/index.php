<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../app/Controllers/HomeController.php';
require_once __DIR__ . '/../app/Controllers/ArticleController.php';
require_once __DIR__ . '/../app/Controllers/LoginController.php';
require_once __DIR__ . '/../app/Controllers/DashboardController.php';
require_once __DIR__ . '/../app/Models/AbstractModel.php';
require_once __DIR__ . '/../app/Models/User.php';
require_once __DIR__ . '/../app/Models/Article.php';
require_once __DIR__ . '/../app/Services/ArticleService.php';
require_once __DIR__ . '/../app/Services/AuthService.php';
require_once __DIR__ . '/../app/Repositories/ArticleRepository.php';
require_once __DIR__ . '/../app/Repositories/UserRepository.php';

session_start();

use app\Controllers\ArticleController;
use app\Controllers\DashboardController;
use app\Controllers\HomeController;
use app\Controllers\LoginController;
use core\Router;

$router = new Router();

$router->get('/', [HomeController::class, 'index']);
$router->get('/login', [LoginController::class, 'index']);
$router->post('/login', [LoginController::class, 'store']);

$router->get('/articles', [ArticleController::class, 'index'], true);
$router->get('/articles/create', [ArticleController::class, 'create'], true);
$router->get('/articles/{id}/edit', [ArticleController::class, 'edit'], true);
$router->post('/articles/store', [ArticleController::class, 'store'], true);
$router->post('/articles/{id}/update', [ArticleController::class, 'update'], true);
$router->post('/articles/{id}/delete', [ArticleController::class, 'destroy'], true);
$router->get('/dashboard', [DashboardController::class, 'index'], true);
$router->post('/logout', [LoginController::class, 'destroy'], true);

echo $router->resolve();
