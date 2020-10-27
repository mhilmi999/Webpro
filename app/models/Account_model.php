<?php

class Account_model extends Database {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    function createAccount($data){
        /*
        if($this->query("INSERT INTO users (username, nama, email, password) VALUES (:username, :nama, :email, :password)", $data)){
            return true;
        }*/

            $q = "INSERT INTO users (username, nama, email, password) VALUES (:username, :nama, :email, :password)";
             $this->db->query($q);
             
             $this->db->bind(':username', $data['username']);
             $this->db->bind(':nama', $data['nama']);
             $this->db->bind(':email', $data['email']);
             $this->db->bind(':password', $data['password']);
 
             
             $this->db->execute();
             return $this->db->rowCount();
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

   public function checkUsername($username){
       /*
        if($this->query("SELECT username FROM users WHERE username = '$username'")){
           if($this->rowCount() > 0){
               return false;
           }else{
               return true;
           }
       }*/

       $q = "SELECT username FROM users WHERE username = '$username'";
       $this->db->query($q);
       return $this->db->single();

   }

}