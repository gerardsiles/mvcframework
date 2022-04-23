<?php
class Enrollments extends Controller
{
    public function __construct()
    {
        // Llamar al modelo para recibir los datos en el controlador
        $this->enrollmentModel = $this->model('Enrollment');
        $this->userModel = $this->model('User');
        $this->courseModel = $this->model('Course');
    }

    // crear vista
    public function index()
    {
        $enrollments = $this->enrollmentModel->findAllEnrollments();

        //$students = $this->userModel->findAllStudents("student");
        //$courses = $this->courseModel->getCourses();


        $data = [
            'enrollments' => $enrollments,
        ];

        $this->view('enrollments/index', $data);
    }


    public function addEnrollment()
    {

        $data = [
            'id' => '',
            'id_course' => '',
            'status' => '',

            'id_courseError' => '',
            'idError' => '',
            'statusError' => '',

        ];

        /* Funcion para el formulario de registro */
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => trim($_POST['id']),
                'id_course' => trim($_POST['id_course']),
                'status' => trim($_POST['status']),

                'id_courseError' => '',
                'idError' => '',

            ];


            //Validar inputs del usuario

            if (empty($data['id'])) {
                $data['idError'] = 'Introduzca el id del estudiante';
            } else if (!$this->userModel->findUserById($data['id'])) {
                $data['idError'] = 'Este usuario no existe';
            }elseif($this->userModel->comprobarTipoEstudiante($data['id']) != 'student'){
                $data['idError'] = 'El usuario que ha seleccionado no es un estudiante';
            }

            if (empty($data['id_course'])) {
                $data['id_courseError'] = 'Introduzca el id del curso';
            } else if (!$this->courseModel->findCourseById($data['id_course'])) {
                $data['id_courseError'] = 'Este curso no existe';
            }

            // antes de crear el usuario, comprobar que no hay errores
            if (empty($data['idError']) && empty($data['id_courseError'])) {

                //registrar al usuario con el modelo
                if ($this->enrollmentModel->addEnrollment($data)) {
                    //Redirigir al index de cursos
                    header('location: ' . URLROOT . '/enrollments/index');
                } else {
                    die('Algo ha ido mal, vuelvelo a intentar mas tarde');
                }
            } else {
                $this->view('enrollments/addEnrollment', $data);
            }
        }
        $this->view('enrollments/addEnrollment', $data);
    }

}