<?php
class Courses extends Controller {
        public function __construct() {
            // Llamar al modelo para recibir los datos en el controlador
            $this->courseModel = $this->model('Course');
        }

    public function index() {
           $courses = $this->courseModel->getCourses();
            $data = [
                'courses' => $courses
            ];

            $this->view('courses/index', $data);
    }


    public function addCourse() {

        $data = [
            'name' => '',
            'description' => '',
            'date_start' => '',
            'date-end' => '',
            'active' => '',
            'nameError' => '',
            'descriptionError' => '',
            'date_startError' => '',
            'date_endError' => '',
            'activeError' => ''
        ];

                   /* Funcion para el formulario de registro */
              if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    // Process form
                    // Sanitize POST data
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                    $data = [
                                            'name' => trim($_POST['name']),
                                            'description' => trim($_POST['description']),
                                            'date_start' => trim($_POST['date_start']),
                                            'date_end' => trim($_POST['date_end']),
                                            'active' => trim($_POST['active']),
                                            'nameError' => '',
                                            'descriptionError' => '',
                                            'date_startError' => '',
                                            'date_endError' => '',
                                            'activeError' => ''
                                        ];
                                    $nameValidation = "/^[a-zA-Z]*$/";
                                    $dataValidation = "/^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/";
                                    $activeValidation = "/^[0-1]$/";

                                       //Validar inputs del usuario
                                    if (empty($data['name'])) {
                                        $data['nameError'] = 'Introduzca el nombre del curso';
                                    }elseif(!preg_match($nameValidation, $data['name'])){
                                        $data['nameError'] = 'El curso solo puede tener letras';
                                    }else if($this->courseModel->findCourseByName($data['name'])){
                                        $data['nameError'] = 'Este nombre de curso ya existe';
                                    }

                                    if (empty($data['description'])) {
                                        $data['descriptionError'] = 'Introduzca la descripcion del curso';
                                    }

                                    if (empty($data['date_start'])) {
                                        $data['date_startError'] = 'Introduzca la fecha de inicio de curso';
                                    }elseif(!preg_match($dateValidation, $data['date_start'])){
                                        $data['date_startError'] = 'Utilice el siguiente formato: AAAA-MM-DD. Fecha inicio';
                                    }

                                    if (empty($data['date_end'])) {
                                        $data['date_endError'] = 'Introduzca la fecha de fin de curso';
                                    }elseif(!preg_match($dateValidation, $data['date_end'])){
                                        $data['date_endError'] = 'Utilice el siguiente formato: AAAA-MM-DD. Fecha fin.';
                                    }

                                        if (empty($data['active'])) {
                                        $data['activeError'] = 'Introduzca si el curso está activo';
                                    }elseif(!preg_match($activeValidation, $data['active'])){
                                        $data['activeError'] = 'Escriba 1 o 0.';
                                    }

                                                    // antes de crear el usuario, comprobar que no hay errores
                                                    if (empty($data['nameError']) && empty($data['descriptionError']) &&empty($data['date_startError'])
                                                    && empty($data['date_endError']) && empty($data['activeError'])) {


                                                        //registrar al usuario con el modelo
                                                        if ($this->courseModel->addCourse($data)) {
                                                            //Redirigir al index de cursos
                                                            header('location: ' . URLROOT . '/courses/index');
                                                        } else {
                                                            die('Algo ha ido mal, vuelvelo a intentar mas tarde');
                                                        }
                                                    }
              }
                        $this->view('courses/addCourse', $data);
    }

}