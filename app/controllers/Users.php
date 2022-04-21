<?php
class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        $data = [
            'name' => '',
            'surname' => '',
            'username' => '',
            'email' => '',
            'telephone' => '',
            'nif' => '',
            'password' => '',
            'confirmPassword' => '',
            'nameError' => '',
            'surnameError' => '',
            'usernameError' => '',
            'emailError' => '',
            'phoneError' => '',
            'nifError' => '',
            'passwordError' => '',
            'confirmPasswordError' => '',
        ];

        /* Funcion para el formulario de registro */
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),
                'surname' => trim($_POST['surname']),
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'telephone' => trim($_POST['telephone']),
                'nif' => trim($_POST['nif']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'nameError' => '',
                'surnameError' => '',
                'usernameError' => '',
                'emailError' => '',
                'phoneError' => '',
                'nifError' => '',
                'passwordError' => '',
                'confirmPasswordError' => '',
            ];

            $nameValidation = "/^[a-zA-Z]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            //Validar inputs del usuario
            if (empty($data['name'])) {
                $data['nameError'] = 'Introduzca su nombre';
            }

            if (empty($data['surname'])) {
                $data['surnameError'] = 'Introduzca su apellido';
            }

            if (empty($data['username'])) {
                $data['usernameError'] = 'Introduzca un usuario';
            } elseif (!preg_match($nameValidation, $data['username'])) {
                $data['usernameError'] = 'El usuario solo puede tener letras';
            } else if ($this->userModel->findUserByName($data['username'])) {
                $data['usernameError'] = 'Este nombre de usuario ya existe';
            }

            if (empty($data['email'])) {
                $data['emailError'] = 'introduzca su email';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'introduce el formato correcto';
            } else {
                //Comprobar si el email existe
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['emailError'] = 'este email ya existe';
                }
            }

            if (empty($data['telephone'])) {
                $data['phoneError'] = 'Introduzca su telefono de contacto';
            }

            if (empty($data['nif'])) {
                $data['nifError'] = 'Introduzca su DNI o pasaporte';
            }

            if (empty($data['password'])) {
                $data['passwordError'] = 'Introduzca una contrasena';
            } elseif (strlen($data['password']) < 6) {
                $data['passwordError'] = 'La contrasena debe ser minimo de 8 caracteres';
            } elseif (preg_match($passwordValidation, $data['password'])) {
                $data['passwordError'] = 'La contrasena debe tener como minimo un valor numerico';
            }

            if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Introduzca la contrasena';
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                    $data['confirmPasswordError'] = 'Las contrasenas no son iguales';
                }
            }

            // antes de crear el usuario, comprobar que no hay errores
            if (empty($data['nameError']) && empty($data['surnameError']) && empty($data['usernameError'])
                && empty($data['emailError']) && empty($data['phoneError']) && empty($data['nifError'])
                && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

                // Hash contrasena
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //registrar al usuario con el modelo
                if ($this->userModel->register($data)) {
                    //Redirigir al login
                    header('location: ' . URLROOT . '/users/login');
                } else {
                    die('Algo ha ido mal, vuelvelo a intentar mas tarde');
                }
            }
        }
        $this->view('users/register', $data);
    }

    /* Funcion para inicio de sesion */
    public function login()
    {
        $data = [
            'username' => '',
            'password' => '',
            'user_type' => '',
            'usernameError' => '',
            'passwordError' => '',
            'userTypeError' => '',
        ];

        // Comprobar que nos lleue la informacion como post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //limpiar los datos de entrada
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'user_type' => trim($_POST['user_type']),
                'usernameError' => '',
                'passwordError' => '',
                'userTypeError' => '',
            ];

            /* informar de errores en los datos introducidos */
            if (empty($data['username'])) {
                $data['usernameError'] = 'Usuario o contrasena incorrecto';
            }

            if (empty($data['password'])) {
                $data['passwordError'] = 'Usuario o contrasena incorrecto';
            }

            /* Si no hay errores, intentar hacer el login */
            if (empty($data['usernameError']) && empty($data['passwordError'])) {
                print_r($data);
                $loggedInUser = $this->userModel->login($data['username'], $data['password'], $data['user_type']);

                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['passwordError'] = 'El usuario o la contrasena son incorrectos';
                    $data['userTypeError'] = 'Comprueba que tu tipo de usuario sea correcto';
                    $this->view('users/login', $data);
                }
            }

        } else {
            $data = [
                'username' => '',
                'password' => '',
                'user_type' => '',
                'usernameError' => '',
                'passwordError' => '',
                'userTypeError' => '',
            ];
        }
        $this->view('users/login', $data);
    }

    /* Crear la sesion del usuario */
    public function createUserSession($user, )
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;
        $_SESSION['user_type'] = $user->user_type;
        /* Definir el tipo de usuario en un parametro de la sesion
        $_SESSION['user_type'] = 'admin';
         */
        /* Redireccionar al index */
        header('location:' . URLROOT . '/pages/index');
    }

    /* cerrar la sesion del usuario */
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['user_type']);
        header('location:' . URLROOT . '/users/login');
    }

}
