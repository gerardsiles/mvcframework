<?php
class Users extends controller {
    public function __construct() {
        $this->userModel = $this->model('User');
    }
    
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