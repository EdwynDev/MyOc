<?php

namespace Controllers;

class OCController extends BaseController {
    public function index() {
        $this->view('ocs/index');
    }
    
    public function create() {
        $this->view('ocs/create');
    }
    
    public function store() {
        // Vérifier que les données sont présentes
        if (empty($_POST['name'])) {
            $_SESSION['error'] = 'Le nom de l\'OC est obligatoire.';
            $this->redirect('/ocs/create');
            return;
        }
        
        // Redirection avec message de succès (la création est gérée côté JavaScript)
        $_SESSION['success'] = 'OC créé avec succès !';
        $this->redirect('/ocs');
    }
    
    public function edit($id) {
        if (empty($id)) {
            $_SESSION['error'] = 'ID de l\'OC manquant.';
            $this->redirect('/ocs');
            return;
        }
        $this->view('ocs/edit', ['id' => $id]);
    }
    
    public function update($id) {
        if (empty($id)) {
            $_SESSION['error'] = 'ID de l\'OC manquant.';
            $this->redirect('/ocs');
            return;
        }
        
        if (empty($_POST['name'])) {
            $_SESSION['error'] = 'Le nom de l\'OC est obligatoire.';
            $this->redirect('/ocs/edit/' . $id);
            return;
        }
        
        $_SESSION['success'] = 'OC mis à jour avec succès !';
        $this->redirect('/ocs');
    }
    
    public function delete($id) {
        if (empty($id)) {
            $_SESSION['error'] = 'ID de l\'OC manquant.';
            $this->redirect('/ocs');
            return;
        }
        
        $_SESSION['success'] = 'OC supprimé avec succès !';
        $this->redirect('/ocs');
    }
}