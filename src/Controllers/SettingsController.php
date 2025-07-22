<?php

namespace Controllers;

class SettingsController extends BaseController {
    public function index() {
        $this->view('settings/index');
    }
    
    public function export() {
        // L'export sera géré côté JavaScript
        $this->json(['success' => true]);
    }
    
    public function import() {
        // L'import sera géré côté JavaScript
        $this->json(['success' => true]);
    }
    
    public function customFields() {
        $_SESSION['success'] = 'Champs personnalisés mis à jour !';
        $this->redirect('/settings');
    }
}