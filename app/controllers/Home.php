<?php

class Home extends Controller {
    public function index()
    {
        $this->view('common/header');
        $this->view('common/footer');
    }
}