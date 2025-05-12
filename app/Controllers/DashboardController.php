<?php

namespace app\Controllers;

use core\Controller;

class DashboardController extends Controller {

    public function index()
    {
        $this->view('admin/dashboard/view',[], 'admin');
    }
}