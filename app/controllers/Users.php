<?php
class Users extends controller {
    public function __construct() {
        $this->userModel = $this->model('User');
    }
    
    // Funcion para validar el registro
    public function register() {
        $data = [
            'username' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'usernameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
        ];

        $this->view('users/register', $data);
    }

    // funcion para validar el login
    public function login() {
        $data = [
            'title' => 'Login',
            'usernameError' => '',
            'passwordError' => ''
        ];

        // cargar la vista de login
        $this->view('users/login', $data);
    }

}