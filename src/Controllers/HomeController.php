<?php

namespace Controllers;

class HomeController extends BaseController {
    public function index() {
        $this->view('home/index');
    }
    
    public function legal() {
        $this->view('home/legal');
    }
}