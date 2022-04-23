<?php
class Classes extends Controller
{
    public function __construct()
    {
        // Llamar al modelo para recibir los datos en el controlador
        $this->claseModel = $this->model('Clase');
        $this->userModel = $this->model('User');
        $this->courseModel = $this->model('Course');
        $this->scheduleModel = $this->model('Schedule');
    }

    public function index()
    {
        $classes = $this->claseModel->findAllClasses();


        $data = [
            'classes' => $classes,

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
                'id' => trim($_POST['id']),
                'id_course' => trim($_POST['id_course']),
                'id_schedule' => trim($_POST['id_schedule']),
                'name' => trim($_POST['name']),
                'color' => trim($_POST['color']),
                'idError' => '',
                'id_courseError' => '',
                'id_scheduleError' => '',
                'nameError' => '',
                'colorError' => '',
            ];


            //Validar inputs del usuario
            if (empty($data['id'])) {
                $data['idError'] = 'Introduzca el id del profesor';
            } else if (!$this->userModel->findUserById($data['id'])) {
                $data['idError'] = 'Este usuario no existe';
            } /*elseif (!$this->userModel->comprobarTipoUsuario($data['id'])) {
                $data['idError'] = 'El usuario que ha seleccionado no es un profesor';
            }*/

            if (empty($data['id_course'])) {
                $data['id_courseError'] = 'Introduzca el id del curso';
            } else if (!$this->courseModel->findCourseById($data['id_course'])) {
                $data['id_courseError'] = 'Este curso no existe';
            }

            if (empty($data['id_schedule'])) {
                $data['id_scheduleError'] = 'Introduzca el id del horario de la clase';
            } else if (!$this->scheduleModel->findScheduleById($data['id_schedule'])) {
                $data['id_scheduleError'] = 'Este horario no existe';
            }

            if (empty($data['name'])) {
                $data['nameError'] = 'Introduzca el nombre de la clase';
            }

            if (empty($data['color'])) {
                $data['colorError'] = 'Introduzca el color de la clase';
            }

            // antes de crear el usuario, comprobar que no hay errores
            if (empty($data['idError']) && empty($data['id_courseError']) && empty($data['id_scheduleError'])
             && empty($data['nameError']) && empty($data['colorError'])) {

                //registrar al usuario con el modelo
                if ($this->claseModel->addClass($data)) {
                    //Redirigir al index de cursos
                    header('location: ' . URLROOT . '/classes/index');
                } else {
                    die('Algo ha ido mal, vuelvelo a intentar mas tarde');
                }
            } else {
                $this->view('classes/addClass', $data);
            }
        }
        $this->view('classes/addClass', $data);

    }


    public function update($id_class)
    {
        $clase = $this->claseModel->findClassById($id_class);

        $data = [
            'clase' => $clase,
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

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id_class' => $id_class,
                'id' => trim($_POST['id']),
                'id_course' => trim($_POST['id_course']),
                'id_schedule' => trim($_POST['id_schedule']),
                'name' => trim($_POST['name']),
                'color' => trim($_POST['color']),
                'idError' => '',
                'id_courseError' => '',
                'id_scheduleError' => '',
                'nameError' => '',
                'colorError' => '',
            ];

            //Validar inputs del usuario
            if (empty($data['id'])) {
                $data['idError'] = 'Introduzca el nombre del profesor';
            } else if (!$this->userModel->findUserById($data['id'])) {
                $data['idError'] = 'Este usuario no existe';
            } /*elseif ($this->userModel->comprobarTipoUsuario($data['id']) == 'teacher') {
                $data['idError'] = 'El usuario que ha seleccionado no es un profesor';
            }*/

            if (empty($data['id_course'])) {
                $data['id_courseError'] = 'Introduzca el id del curso';
            } else if (!$this->courseModel->findCourseById($data['id_course'])) {
                $data['id_courseError'] = 'Este curso no existe';
            }

            if (empty($data['id_schedule'])) {
                $data['id_scheduleError'] = 'Introduzca el id del curso';
            } else if (!$this->scheduleModel->findScheduleById($data['id_schedule'])) {
                $data['id_scheduleError'] = 'Este curso no existe';
            }

            if (empty($data['name'])) {
                $data['nameError'] = 'Introduzca el nombre de la clase';
            }

            if (empty($data['color'])) {
                $data['colorError'] = 'Introduzca el color de la clase';
            }

            // antes de crear el usuario, comprobar que no hay errores
            if (empty($data['idError']) && empty($data['id_courseError']) && empty($data['id_scheduleError'])
                && empty($data['nameError']) && empty($data['colorError'])) {

                //registrar al usuario con el modelo
                if ($this->claseModel->update($data)) {
                    //Redirigir al index de cursos
                    header('location: ' . URLROOT . '/classes/index');
                } else {
                    die('Algo ha ido mal, vuelvelo a intentar mas tarde');
                }
            } else {
                $this->view('classes/update', $data);
            }
        }
        $this->view('classes/update', $data);
    }


    public function delete($id_class)
    {
        $clase = $this->claseModel->findClassById($id_class);

        $data = [
            'clase' => $clase,
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

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if ($this->claseModel->delete($id_class)) {
                header('location: ' . URLROOT . '/classes/index');

            } else {
                die('Algo ha ido mal, vuelvelo a intentar mas tarde');
            }
        }
    }



}
