<?php

namespace Controllers;

use Models\User;

class CommunityAuthController extends BaseController {
    private $userModel;
    
    public function __construct() {
        $this->userModel = new User();
    }
    
    // Page de connexion communautaire
    public function login() {
        if (isset($_SESSION['community_user_id'])) {
            $this->redirect('/community');
            return;
        }
        
        $this->view('community/auth/login');
    }
    
    // Page d'inscription communautaire
    public function register() {
        if (isset($_SESSION['community_user_id'])) {
            $this->redirect('/community');
            return;
        }
        
        $this->view('community/auth/register');
    }
    
    // Traitement de l'inscription
    public function handleRegister() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/community/register');
            return;
        }
        
        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';
        $bio = trim($_POST['bio'] ?? '');
        
        // Validation
        $errors = [];
        
        if (empty($username) || strlen($username) < 3) {
            $errors[] = 'Le nom d\'utilisateur doit contenir au moins 3 caractères.';
        }
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Adresse email invalide.';
        }
        
        if (strlen($password) < 6) {
            $errors[] = 'Le mot de passe doit contenir au moins 6 caractères.';
        }
        
        if ($password !== $confirmPassword) {
            $errors[] = 'Les mots de passe ne correspondent pas.';
        }
        
        // Vérifier l'unicité
        if ($this->userModel->findByUsername($username)) {
            $errors[] = 'Ce nom d\'utilisateur est déjà pris.';
        }
        
        if ($this->userModel->findByEmail($email)) {
            $errors[] = 'Cette adresse email est déjà utilisée.';
        }
        
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['form_data'] = $_POST;
            $this->redirect('/community/register');
            return;
        }
        
        // Créer l'utilisateur
        $userData = [
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'bio' => $bio,
            'status' => 'active',
            'email_verified' => true // Auto-vérifié pour l'instant
        ];
        
        $user = $this->userModel->createUser($userData);
        
        if ($user) {
            $_SESSION['community_user_id'] = $user['id'];
            $_SESSION['community_username'] = $user['username'];
            $_SESSION['success'] = 'Compte créé avec succès ! Bienvenue dans la communauté YOC.';
            $this->redirect('/community');
        } else {
            $_SESSION['error'] = 'Erreur lors de la création du compte.';
            $this->redirect('/community/register');
        }
    }
    
    // Traitement de la connexion
    public function handleLogin() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/community/login');
            return;
        }
        
        $login = trim($_POST['login'] ?? ''); // username ou email
        $password = $_POST['password'] ?? '';
        
        if (empty($login) || empty($password)) {
            $_SESSION['error'] = 'Veuillez remplir tous les champs.';
            $this->redirect('/community/login');
            return;
        }
        
        // Chercher par username ou email
        $user = $this->userModel->findByUsername($login);
        if (!$user) {
            $user = $this->userModel->findByEmail($login);
        }
        
        if (!$user || !$this->userModel->verifyPassword($password, $user['password'])) {
            $_SESSION['error'] = 'Identifiants incorrects.';
            $this->redirect('/community/login');
            return;
        }
        
        if ($user['status'] !== 'active') {
            $_SESSION['error'] = 'Votre compte est désactivé.';
            $this->redirect('/community/login');
            return;
        }
        
        // Connexion réussie
        $_SESSION['community_user_id'] = $user['id'];
        $_SESSION['community_username'] = $user['username'];
        
        // Mettre à jour le dernier login
        $this->userModel->updateLastLogin($user['id']);
        
        $_SESSION['success'] = 'Connexion réussie ! Bienvenue ' . $user['username'] . '.';
        $this->redirect('/community');
    }
    
    // Déconnexion communautaire
    public function logout() {
        unset($_SESSION['community_user_id']);
        unset($_SESSION['community_username']);
        $_SESSION['success'] = 'Vous avez été déconnecté de la communauté.';
        $this->redirect('/community');
    }
    
    // Profil utilisateur (édition)
    public function profile() {
        if (!isset($_SESSION['community_user_id'])) {
            $_SESSION['error'] = 'Connexion requise.';
            $this->redirect('/community/login');
            return;
        }
        
        $user = $this->userModel->find($_SESSION['community_user_id']);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bio = trim($_POST['bio'] ?? '');
            $avatar = trim($_POST['avatar'] ?? '');
            
            $updates = [
                'bio' => $bio,
                'avatar' => $avatar
            ];
            
            $updatedUser = $this->userModel->update($user['id'], $updates);
            
            if ($updatedUser) {
                $_SESSION['success'] = 'Profil mis à jour avec succès !';
                $user = $updatedUser;
            } else {
                $_SESSION['error'] = 'Erreur lors de la mise à jour.';
            }
        }
        
        $this->view('community/auth/profile', ['user' => $user]);
    }
}