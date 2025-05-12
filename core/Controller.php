<?php

namespace core;

class Controller {

    public function view(string $view, array $data = [], string $layout = 'main'): void
    {
        extract($data);

        ob_start();
        require_once __DIR__ . '/../resources/views/' . $view . '.php';
        $content = ob_get_clean();

        require_once __DIR__ . "/../resources/views/layouts/{$layout}.php";
    }

    public function redirect($location): void
    {
        header("Location: $location");
    }
}

