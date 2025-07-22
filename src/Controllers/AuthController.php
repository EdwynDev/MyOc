<?php

namespace Controllers;

class AuthController extends BaseController {
    public function login() {
        // error_log('AuthController::login called');
        if (isset($_SESSION['user_name'])) {
            $this->redirect('/dashboard');
        }
        $this->view('auth/login');
    }
    
    public function authenticate() {
        $name = trim($_POST['name'] ?? '');
        
        if (empty($name)) {
            $_SESSION['error'] = 'Veuillez renseigner votre nom.';
            $this->redirect('/login');
        }
        
        $_SESSION['user_name'] = $name;
        $_SESSION['login_time'] = time();
        $_SESSION['success'] = 'Bienvenue ' . $name . ' !';
        
        $this->redirect('/dashboard');
    }
    
    public function logout() {
        session_destroy();
        $this->redirect('/');
    }
}