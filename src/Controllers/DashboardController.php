<?php

namespace Controllers;

class DashboardController extends BaseController {
    public function index() {
        $this->view('dashboard/index', [
            'user_name' => $_SESSION['user_name']
        ]);
    }
}