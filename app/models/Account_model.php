<?php

class Account_model{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

   function insertNewuser(){
       $roles = $this->input->post('roles');

       //Daftarkan user di tabel users
       $q = "INSERT INTO users (nama, username, password, email)
            VALUES ('".$this->input->post('nama')."','"
            .$this->input->post('username')."',MD5('"
            .$this->input->post('password')."'),'"
            .$this->input->post('email')."')";
        
        $this->db->query($q);
   }

}