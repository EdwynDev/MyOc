<?php

namespace Controllers;

class SettingsController extends BaseController {
    public function index() {
        $this->view('settings/index');
    }
    
    public function export() {
        // L'export est géré côté JavaScript, mais on peut ajouter une validation
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $_SESSION['error'] = 'Méthode non autorisée.';
            $this->redirect('/settings');
            return;
        }
        
        $this->json(['success' => true, 'message' => 'Export initié côté client']);
    }
    
    public function import() {
        // L'import est géré côté JavaScript, mais on peut ajouter une validation
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $_SESSION['error'] = 'Méthode non autorisée.';
            $this->redirect('/settings');
            return;
        }
        
        $this->json(['success' => true, 'message' => 'Import traité côté client']);
    }
    
    public function customFields() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $_SESSION['error'] = 'Méthode non autorisée.';
            $this->redirect('/settings');
            return;
        }
        
        $_SESSION['success'] = 'Champs personnalisés mis à jour !';
        $this->redirect('/settings');
    }
}