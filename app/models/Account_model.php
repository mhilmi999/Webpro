<?php

class Account_model{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function register($data)
    {
        $this->db->query('INSERT INTO users (username, email, password) VALUES(:username, :email, :password)');

        //Bind values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        //Execute function 
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function login($username, $password)
    {
        $this->db->query('SELECT * FROM users WHERE username = :username');

        //Bind Value
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        $hashedPassword = $row->passsord;

        if(password_verify($password, $hashedPassword))
        {
            return $row;
        }else{
            return false;
        }
    }

    public function findUserByEmail($email)
    {
        //cek email
        $this->db->query('SELECT * FROM users WHERE email = :email');
        
        //parameter email akan di binded dengan variable email
        $this->db->bind(':email', $email);

        //Jika email terdaftar maka
        if($this->db->rowCount() > 0)
        {
            return true;
        }
        else{
            return false;
        }
    }

}