<?php

namespace Controllers;

class RaceController extends BaseController {
    public function index() {
        $this->view('races/index');
    }
    
    public function create() {
        $this->view('races/create');
    }
    
    public function store() {
        $_SESSION['success'] = 'Race créée avec succès !';
        $this->redirect('/races');
    }
    
    public function edit($id) {
        $this->view('races/edit', ['id' => $id]);
    }
    
    public function update($id) {
        $_SESSION['success'] = 'Race mise à jour avec succès !';
        $this->redirect('/races');
    }
    
    public function delete($id) {
        $_SESSION['success'] = 'Race supprimée avec succès !';
        $this->redirect('/races');
    }
}