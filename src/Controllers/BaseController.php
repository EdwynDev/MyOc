<?php

namespace Controllers;

class BaseController {
    protected function view($view, $data = []) {
        extract($data);
        include __DIR__ . '/../../views/' . $view . '.php';
    }
    
    protected function redirect($path) {
        header("Location: {$path}");
        exit;
    }
    
    protected function json($data, $status = 200) {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}