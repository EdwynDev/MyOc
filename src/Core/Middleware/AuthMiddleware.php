<?php

namespace Core\Middleware;

class AuthMiddleware {
    public function handle() {
        if (!isset($_SESSION['user_name'])) {
            header('Location: /login');
            exit;
        }
        return true;
    }
}