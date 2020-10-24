<?php

class Account_model{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

   function insertNewuser($data){
       //$roles = $this->input->post('roles');

       
       //Daftarkan user di tabel users
       $q = "INSERT INTO users (nama, username, password, email)
            VALUES (:nama, :username, :password, :email)";
        $this->db->query($q);
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':email', $data['email']);
        
        $this->db->execute();
   }

   function login($username, $password){
    /*   
    echo 'ini halaman login';
       var_dump($username);
       var_dump($password);
       die;*/

       $this->db->query("SELECT * FROM users WHERE username = :username");
       $this->db->bind(':username', $username);
       


       $row = $this->db->singleOBJ();


       
        $hashedPassword = $row->password;

        if (password_verify($password, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
       
   }

}