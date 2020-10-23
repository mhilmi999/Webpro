<?php

class Account extends Controller
{
    public function __construct(){
        $this->accountModel = $this->model('Account_model');
    }

    public function login(){
        $this->view('common/login');
    }

    public function checkingLogin(){
            
    }

}