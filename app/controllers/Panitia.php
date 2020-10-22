<?php

class Panitia extends Controller
{
    public function index()
    {
        $this->view('common/header_panitia');
        $this->view('panitia/index');
        $this->view('common/footer_panitia');
    }

    public function ktiMasuk(){
        
    }
}
