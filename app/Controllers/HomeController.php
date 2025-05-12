<?php

namespace app\Controllers;


use core\Controller;

class HomeController extends Controller {

    public function index(): void
    {
        $this->view('home');
    }
}