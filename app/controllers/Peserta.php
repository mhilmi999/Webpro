<?php

class Peserta extends Controller {
    public function index() {

        $this->view('common/header_peserta');
        $this->view('peserta/index');
        $this->view('common/footer_peserta');
    }
}