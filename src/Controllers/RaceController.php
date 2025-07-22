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
        if (empty($_POST['name'])) {
            $_SESSION['error'] = 'Le nom de la race est obligatoire.';
            $this->redirect('/races/create');
            return;
        }
        
        $_SESSION['success'] = 'Race créée avec succès !';
        $this->redirect('/races');
    }
    
    public function edit($id) {
        if (empty($id)) {
            $_SESSION['error'] = 'ID de la race manquant.';
            $this->redirect('/races');
            return;
        }
        $this->view('races/edit', ['id' => $id]);
    }
    
    public function update($id) {
        if (empty($id)) {
            $_SESSION['error'] = 'ID de la race manquant.';
            $this->redirect('/races');
            return;
        }
        
        if (empty($_POST['name'])) {
            $_SESSION['error'] = 'Le nom de la race est obligatoire.';
            $this->redirect('/races/edit/' . $id);
            return;
        }
        
        $_SESSION['success'] = 'Race mise à jour avec succès !';
        $this->redirect('/races');
    }
    
    public function delete($id) {
        if (empty($id)) {
            $_SESSION['error'] = 'ID de la race manquant.';
            $this->redirect('/races');
            return;
        }
        
        $_SESSION['success'] = 'Race supprimée avec succès !';
        $this->redirect('/races');
    }
}