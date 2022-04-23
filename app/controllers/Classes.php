<?php
class Classes extends Controller
{
    public function __construct()
    {
        // Llamar al modelo para recibir los datos en el controlador
        $this->classModel = $this->model('Class');
    }

    public function index()
    {
        $classes = $this->classModel->getClasses();
        //$users = $this->userModel->getTeachers();
        //$courses = $this->courseModel->getCourses();
        //$schedules = $this->scheduleModel->getSchedules();

        $data = [
            'classes' => $classes,
            //'users' => $users,
            //'courses' => $courses,
            //'schedules' => $schedules,
        ];

        $this->view('classes/index', $data);
    }

    public function addClass()
    {

        $data = [
            'id' => '',
            'id_course' => '',
            'id_schedule' => '',
            'name' => '',
            'color' => '',
            'idError' => '',
            'id_courseError' => '',
            'id_scheduleError' => '',
            'nameError' => '',
            'colorError' => '',
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

}
