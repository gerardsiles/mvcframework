<?php
class Admins extends Controller
{
    public function __construct()
    {
        // Llamar al modelo para recibir los datos en el controlador
        $this->adminModel = $this->model('Admin');
    }

    public function index()
    {
        //$admins = $this->courseAdmin->getAdmins();
        $data = [
            // 'admins' => $admins
        ];

        $this->view('admins/index', $data);
    }

    public function menu()
    {
        $admins = $this->adminModel->getAdmins();
        $data = [
            'admins' => $admins,
        ];

        $this->view('admins/menu', $data);
    }

    public function addAdmin()
    {

        $data = [
            'username' => '',
            'name' => '',
            'email' => '',
            'user_type' => '',
            'password' => '',
            'usernameError' => '',
            'nameError' => '',
            'emailError' => '',
            'user_typeError' => '',
            'passwordError' => '',
        ];

        /* Funcion para el formulario de registro */
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'username' => trim($_POST['username']),
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'user_type' => trim($_POST['user_type']),
                'password' => trim($_POST['password']),
                'usernameError' => '',
                'nameError' => '',
                'emailError' => '',
                'user_typeError' => '',
                'passwordError' => '',
            ];

            $nameValidation = "/^[a-zA-Z]*$/";
            $telephoneValidation = "/^[0-9]*$/";

            //Validar inputs del usuario
            if (empty($data['username'])) {
                $data['usernameError'] = 'Introduzca el nombre del profesor';
            } else if (!preg_match($nameValidation, $data['username'])) {
                $data['usernameError'] = 'Introduzca solo letras';
            }

            if (empty($data['name'])) {
                $data['nameError'] = 'Introduzca el apellido del profesor';
            }

            if (empty($data['email'])) {
                $data['emailError'] = 'Introduzca el email del profesor';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Introduce el formato correcto';
            }

            if (empty($data['password'])) {
                $data['passwordError'] = 'Introduzca el password';
            }

            // antes de crear el usuario, comprobar que no hay errores
            if (empty($data['usernameError']) && empty($data['nameError']) && empty($data['emailError'])
                && empty($data['passwordError'])) {

                //registrar al usuario con el modelo
                if ($this->adminModel->addAdmin($data)) {
                    //Redirigir al index de cursos
                    header('location: ' . URLROOT . '/admins/menu');
                } else {
                    die('Algo ha ido mal, vuelvelo a intentar mas tarde');
                }
            } else {
                $this->view('admins/addAdmin', $data);
            }
        }
        $this->view('admins/addAdmin', $data);

    }

    public function update($id_user_admin)
    {
        $admin = $this->adminModel->findAdminById($id_user_admin);

        $data = [
            'admin' => $admin,
            'username' => '',
            'name' => '',
            'email' => '',
            'user_type' => '',
            'password' => '',
            'usernameError' => '',
            'nameError' => '',
            'emailError' => '',
            'user_typeError' => '',
            'passwordError' => '',

        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id_user_admin' => $id_user_admin,
                'username' => trim($_POST['username']),
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'user_type' => trim($_POST['user_type']),
                'password' => trim($_POST['password']),
                'usernameError' => '',
                'nameError' => '',
                'emailError' => '',
                'user_typeError' => '',
                'passwordError' => '',

            ];

            $nameValidation = "/^[a-zA-Z]*$/";
            $telephoneValidation = "/^[0-9]*$/";

            //Validar inputs del usuario
            if (empty($data['username'])) {
                $data['usernameError'] = 'Introduzca el nombre del profesor';
            } else if (!preg_match($nameValidation, $data['username'])) {
                $data['usernameError'] = 'Introduzca solo letras';
            }

            if (empty($data['name'])) {
                $data['nameError'] = 'Introduzca el apellido del profesor';
            }

            if (empty($data['email'])) {
                $data['emailError'] = 'Introduzca el email del profesor';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Introduce el formato correcto';
            }

            if (empty($data['password'])) {
                $data['passwordError'] = 'Introduzca el password';
            }

            // antes de crear el usuario, comprobar que no hay errores
            if (empty($data['usernameError']) && empty($data['nameError']) && empty($data['emailError'])
                && empty($data['passwordError'])) {

                //registrar el curso en el modelo
                if ($this->adminModel->update($data)) {
                    //Redirigir al index de cursos
                    header('location: ' . URLROOT . '/admins/menu');
                } else {
                    die('Algo ha ido mal, vuelvelo a intentar mas tarde');
                }
            } else {
                $this->view('admins/update', $data);
            }
        }

        $this->view('admins/update', $data);

    }

    public function delete($id_user_admin)
    {
        $admin = $this->adminModel->findAdminById($id_user_admin);

        $data = [
            'admin' => $admin,
            'username' => '',
            'name' => '',
            'email' => '',
            'user_type' => '',
            'password' => '',
            'usernameError' => '',
            'nameError' => '',
            'emailError' => '',
            'user_typeError' => '',
            'passwordError' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if ($this->adminModel->delete($id_user_admin)) {
                header('location: ' . URLROOT . '/admins/menu');

            } else {
                die('Algo ha ido mal, vuelvelo a intentar mas tarde');
            }
        }
    }

}
