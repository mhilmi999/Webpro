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
        $this->view('common/header_panitia');
        $this->view('panitia/baruMasuk');
        $this->view('common/footer_panitia');
    }


    public function ktiPeriksa(){
        $this->view('common/header_panitia');
        $this->view('panitia/periksaKTI');
        $this->view('common/footer_panitia');
    }

    public function ktiSelesai(){
        $this->view('common/header_panitia');
        $this->view('panitia/selesaiKTI');
        $this->view('common/footer_panitia');
    }

    public function buatSertif(){
        $this->view('common/header_panitia');
        $this->view('panitia/baruMasuk');
        $this->view('common/footer_panitia');
    }

    public function selesaiSertif(){
        $this->view('common/header_panitia');
        $this->view('panitia/selesaiSertif');
        $this->view('common/footer_panitia');
    }
}
