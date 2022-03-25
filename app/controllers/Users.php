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

            // comprobamos si recibimos un metodo post para hacer el login
            if($_SERVER['REQUEST_METHOD'] == $_POST) {
                // sanitaze los datos por seguridad
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITAZE_STRING);

                // una vez limpiados los datos, lo agregamos a la array
                $data = [
                    'username' => trim($d_POST['username']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirmPassword' => trim($_POST['confirmPassword']),
                    'nameError' => '',
                    'surnameError' => '',
                    'usernameError' => '',
                    'emailError' => '',
                    'phoneError' => '',
                    'passwordError' => '',
                    'confirmPasswordError' => ''
                ];

                // Validar datos
                // Los nombres de los estudiantes solo deberian ser sus nombres formales, sin caracteres especiales ni numeros
                $nameValidation = "/^[a-zA-Z]*$"; // esto es un regex que valida solamente caracteres
                $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i"; // regex para validar contrasena con numeros
                $phoneValidation = "/^d{9}";
                $nifValidation = ""; //TODO

                // comprobar que el nombre no este vacio
                if(empty($data['name'])){
                    $data['nameError'] = 'El nombre no puede estar vacio';
                }

                // comprobar que el apellido no este vacio
                if(empty($data['surname'])) {
                    $data['surnameError'] = 'El apellido no puede estar vacio';
                }

                // comprobar el nombre de usuario
                if(empty($data['username'])) { // comprobamos si el nombre de usuario esta vacio
                    $data['usernameError'] = 'El nombre de usuario no puede estar vacio';
                } elseif(!preg_match($nameValidation, $data['username'])) {
                    $data['usernameError'] = 'El nombre solo puede contener letras';
                } // podrian existir dos estudiantes con el mismo nombre, no comprobamos si ya existe

                // Validar el email
                if(empty($data['email'])) {
                    $data['emailError'] = 'Introduzca un email';
                } elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) { // flitrar el email introducido y comprobar
                    $data['emailError'] = 'Introduzca un email en un formato correcto';
                } else {
                    if (this->userModel->findUserByEmail($data['email'])) {
                    $data['emailError'] = 'Este email ya existe';
                    }
                }

                // validar telefono
                if(empty($data['phone'])) {
                    $data['phoneError'] = 'El numero de telefono no puede estar vacio';
                }

                // validar nif
                if(empty($data['nif'])) {
                    $data['nifError'] = 'El nif no puede estar vacio';
                }

                // validar la contrasena, minimo de longitud y valores numericos
                if(empty($data['password'])) {
                    $data['passwordError'] = 'Introduzca una contrasena';
                } else if(strlen($data['password'] < 6)) {
                    $data['passwordError'] = 'La contrasena debe ser de 8 caracteres minimo';
                } else if(!preg_match($passwordValidation, $data['password'])) {
                    $data['passwordError'] = "La contrasena debe tener como nimimo 1 caracter numerico";
                }

                // Validar confirmar contrasena
                if(empty($data['password'])) {
                    $data['passwordError'] = 'Introduzca una contrasena';
                } else {
                    if ($data['password'] != $data['confirmPassword']) {
                        $data['passwordError'] = 'las contrasenas deben ser iguales';
                    }
                }

                // comprobar que no hay errores antes de crear el usuario
                if (empty($data['usernameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {
                    // encriptar contrasena
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Registrar usuario
                    if ($this->userModel->register($data)) {
                        // redirigin a login
                        header('location: ' . URLROOT . '/users/login');
                    } else {
                        die('algo ha fallado, intentalo otra vez');
                    }
                }
            }

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