<?php

class Account_model extends Database {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    function createAccount($data, $password){
        /*
        if($this->query("INSERT INTO users (username, nama, email, password) VALUES (:username, :nama, :email, :password)", $data)){
            return true;
        }*/


            $q = "INSERT INTO users (username, nama, email, password) VALUES (:username, :nama, :email, :password)";
             $this->db->query($q);
            
            //$queryPeran = "INSERT INTO member (id_grup, id_user) VALUES (:id_grup, :id_user)";
            //$this->db->query($queryPeran);

             $this->db->bind(':username', $data['username']);
             $this->db->bind(':nama', $data['nama']);
             $this->db->bind(':email', $data['email']);
             $this->db->bind(':password', $password);

             //$this->db->bind(':id_grup', $data['id_grup']);
             //$this->db->bind(':id_user', mysqli_insert_id($q));
             
             $this->db->execute();
             return $this->db->rowCount();
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