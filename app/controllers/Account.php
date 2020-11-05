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
        $data = [
            'title' => 'Login page',
            'username' => '',
            'password' => '',
            'usernameError' => '',
            'passwordError' => ''
        ];

        //Check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'usernameError' => '',
                'passwordError' => '',
            ];
            //Validate username
            if (empty($data['username'])) {
                $data['usernameError'] = 'Please enter a username.';
            }

            //Validate password
            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter a password.';
            }

            

            //Check if all errors are empty
            if (empty($data['usernameError']) && empty($data['passwordError'])) {
                $loggedInUser = $this->model('Account_model')->login($data['username'], $data['password']);

                //echo 'enak';
                //die;
                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['passwordError'] = 'Password or username is incorrect. Please try again.';
                    $this->view('common/login');
                    }
            }

        } else {
            $data = [
                'username' => '',
                'password' => '',
                'usernameError' => '',
                'passwordError' => ''
            ];
        }
        //$this->view('common/login');
        }

    public function register(){
        $this->view('common/register');
    }

    public function createAccount(){
        $userData = [
            'username'      => $this->input('username'),
            'nama'          => $this->input('nama'),
            'email'         => $this->input('email'),
            'password'      => $this->input('password'),
            'id_grup'         => $this->input('id_grup'),
            'usernameError' => '',
            'namaError'     => '',
            'emailError'    => '',
            'passwordError' => ''
        ];

        if(empty($userData['email'])){
            $userData['emailError'] = "Mohon inputkan email Anda";
        }

        if(empty($userData['nama'])){
            $userData['namaError'] = 'Mohon masukan nama Anda';
        }

        if(empty($userData['username'])){
            $userData['usernameError'] = 'Mohon masukan username '; 
        }else{

            $username = $this->accountModel->checkUsername($userData['username']); 
            if(!empty($username)){
               $userData['usernameError'] = "Mohon maaf username telah terdaftar";  
            }
        }

        if(empty($userData['password'])){
            $userData['passwordError'] = "Mohon masukan password karena dibutuhkan";
        }else if(strlen($userData['password'] < 6)){
            $userData['passwordError'] = "Minimal 6 karakter untuk password";
        }

        if(empty($userData['namaError']) && empty($userData['usernameError'] && empty($userData['passwordError']))){
            $password = password_hash($userData['password'], PASSWORD_DEFAULT);
            //$data = [$userData['username'], $userData['nama'], $userData['email'], $password];
            var_dump($userData, $password);
            die;

            if($this->accountModel->createAccount($userData, $password)){
               // die;
                Flasher::setFlash("Your account has been created successfully, please login","accountCreated", "success");
                header('location:' . BASEURL . '/Account/login' );
            }
        }else{
            $this->view('common/register', $userData);
        }

    }

    public function createUserSession($user) {
        
        //Melakukan set session
        $_SESSION['id_user'] = $user->id_user;
        //$_SESSION['id_grup'] = $user->id_grup;
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;
        
        $this->view('common/header_panitia');
        $this->view('panitia/index');
        $this->view('common/footer_panitia');
        /*
        if($_SESSION['id_grup'] == '1') //Redirect Ke halaman Admin
        {
            header('location:' . BASEURL . '/admin');
        } elseif ($_SESSION['id_grup'] == '2'){ //Redirect Ke halaman Pegawai
            header('location:' . BASEURL . '/pegawai');
        } else { //Redirect Ke halaman Pelanggan
            header('location:' . BASEURL . '/pelanggan');
        }*/
    }

    /*
    public function creatingAccount($id_grup){
        $data = [
            'id_grup' => '',
            'username' => '',
            'password' => '',
            'confirmPassword',
            'nama' => '',
            'email' => '',
            'usernameError' => '',
            'passwordError' => '',
            'confirmPasswordError',
            'namaError' => '',
            'emailError' =>''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                  $data = [
                    'id_grup' => $id_grup,
                    'username' => trim($_POST['username']),
                    'password' => trim($_POST['password']),
                    'confirmPassword' => trim($_POST['confirmPassword']),
                    'nama' => trim($_POST['nama']),
                    'email' => trim($_POST['email']),
                    'usernameError' => '',
                    'passwordError' => '',
                    'confirmPasswordError',
                    'namaError' => '',
                    'emailError' =>''
                ];

                $nameValidation = "/^[a-zA-Z0-9]*$/";
                $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

                //Validate username on letters/numbers
                if (empty($data['username'])) {
                    $data['usernameError'] = 'Please enter username.';
                } elseif (!preg_match($nameValidation, $data['username'])) {
                    $data['usernameError'] = 'Name can only contain letters and numbers.';
                }

                
                // Validate password on length, numeric values,
                if(empty($data['password'])){
                $data['passwordError'] = 'Please enter password.';
                } elseif(strlen($data['password']) < 6){
                $data['passwordError'] = 'Password must be at least 8 characters';
                } elseif (preg_match($passwordValidation, $data['password'])) {
                $data['passwordError'] = 'Password must be have at least one numeric value.';
                }

                //Validate confirm password
                if (empty($data['confirmPassword'])) {
                    $data['confirmPasswordError'] = 'Please enter password.';
                } else {
                    if ($data['password'] != $data['confirmPassword']) {
                    $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                    }
                }

                //Validate nama
                if (empty($data['nama'])) {
                    $data['namaError'] = 'Please enter name.';
                }
        
                //Validate email
                if (empty($data['email'])) {
                    $data['emailError'] = 'Please enter email address.';
                } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['emailError'] = 'Please enter the correct format.';
                } else {
                    //Check if email exists. (Fungsi Belum Jalan harus difix)
                    if ($this->model('User_model')->findUserByEmail($data['email'])) {
                    $data['emailError'] = 'Email is already taken.';
                    }
                }
            // Make sure that errors are empty
            if (empty($data['usernameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError']) && empty($data['namaError']) && empty($data['emailError'])) {

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register user from model function
                if ($this->model('Account_model')->insertNewUser($data)) {
                    //Redirect to the login page    
                    Flasher::setFlash('Pendaftaran', ' berhasil! Silahkan Login', 'success');
                    $this->view('templates/pelanggan/header');
                    $this->view('home/login', $data);
                    $this->view('templates/pelanggan/footer');
                } else {
                    Flasher::setFlash('Ada yang', 'salah', 'danger');
                    $this->view('templates/pelanggan/header');
                    $this->view('home/register', $data);
                    $this->view('templates/pelanggan/footer');
                    die;
                }
            }
        }
        $this->view('templates/pelanggan/header');
        $this->view('home/register', $data);
        $this->view('templates/pelanggan/footer');
    }
*/
}

