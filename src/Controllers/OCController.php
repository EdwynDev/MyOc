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
        // La création sera gérée côté JavaScript avec localStorage
        $_SESSION['success'] = 'OC créé avec succès !';
        $this->redirect('/ocs');
    }
    
    public function edit($id) {
        $this->view('ocs/edit', ['id' => $id]);
    }
    
    public function update($id) {
        $_SESSION['success'] = 'OC mis à jour avec succès !';
        $this->redirect('/ocs');
    }
    
    public function delete($id) {
        $_SESSION['success'] = 'OC supprimé avec succès !';
        $this->redirect('/ocs');
    }
}