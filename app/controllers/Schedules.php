<?php
class Schedules extends Controller
{
    public function __construct()
    {
        // Llamar al modelo para recibir los datos en el controlador
        $this->scheduleModel = $this->model('Schedule');
        $this->claseModel = $this->model('Clase');
    }

    // crear vista
    public function index()
    {
        $schedules = $this->scheduleModel->findAllSchedules();

        $data = [
            'schedules' => $schedules,

        ];

        $this->view('schedules/index', $data);
    }

    public function addSchedule()
    {

        $data = [
            'id_class' => '',
            'time_start' => '',
            'time_end' => '',
            'day' => '',
            'id_classError' => '',
            'time_startError' => '',
            'time_endError' => '',
            'dayError' => '',
        ];

        /* Funcion para el formulario de registro */
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id_class' => trim($_POST['id_class']),
                'time_start' => trim($_POST['time_start']),
                'time_end' => trim($_POST['time_end']),
                'day' => trim($_POST['day']),
                'id_classError' => '',
                'time_startError' => '',
                'time_endError' => '',
                'dayError' => '',
            ];


            //Validar inputs del usuario
            if (empty($data['id_class'])) {
                $data['id_classError'] = 'Introduzca el id de la clase';
            } else if (!$this->claseModel->findClaseById($data['id'])) {
                $data['id_classError'] = 'Esta clase no existe';
            }

            if (empty($data['time_start'])) {
                $data['time_startError'] = 'Introduzca la hora de inicio';
            }

            if (empty($data['time_end'])) {
                $data['time_endError'] = 'Introduzca la hora de fin';
            }

            if (empty($data['day'])) {
                $data['dayError'] = 'Introduzca el dia de la clase';
            }


            // antes de crear el usuario, comprobar que no hay errores
            if (empty($data['id_classError']) && empty($data['time_startError']) 
             && empty($data['time_endError']) && empty($data['dayError'])) {

                //registrar al usuario con el modelo
                if ($this->scheduleModel->addSchedule($data)) {
                    //Redirigir al index de cursos
                    header('location: ' . URLROOT . '/schedules/index');
                } else {
                    die('Algo ha ido mal, vuelvelo a intentar mas tarde');
                }
            } else {
                $this->view('schedules/addSchedule', $data);
            }
        }
        $this->view('schedules/addSchedule', $data);

    }


    public function update($id_schedule)
    {
        $schedule = $this->scheduleModel->findScheduleById($id_schedule);

        $data = [
            'schedule' => $schedule,
            'id_class' => '',
            'time_start' => '',
            'time_end' => '',
            'day' => '',
            'id_classError' => '',
            'time_startError' => '',
            'time_endError' => '',
            'dayError' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id_schedule' => $id_schedule,
                'id_class' => trim($_POST['id_class']),
                'time_start' => trim($_POST['time_start']),
                'time_end' => trim($_POST['time_end']),
                'day' => trim($_POST['day']),
                'id_classError' => '',
                'time_startError' => '',
                'time_endError' => '',
                'dayError' => '',
            ];

            //Validar inputs del usuario
            if (empty($data['id_class'])) {
                $data['id_classError'] = 'Introduzca el id de la clase';
            } else if (!$this->claseModel->findClaseById($data['id'])) {
                $data['id_classError'] = 'Esta clase no existe';
            }

            if (empty($data['time_start'])) {
                $data['time_startError'] = 'Introduzca la hora de inicio';
            }

            if (empty($data['time_end'])) {
                $data['time_endError'] = 'Introduzca la hora de fin';
            }

            if (empty($data['day'])) {
                $data['dayError'] = 'Introduzca el dia de la clase';
            }

            // antes de crear el usuario, comprobar que no hay errores
            if (empty($data['id_classError']) && empty($data['time_startError']) 
             && empty($data['time_endError']) && empty($data['dayError'])) {

                //registrar al usuario con el modelo
                if ($this->scheduleModel->update($data)) {
                    //Redirigir al index de cursos
                    header('location: ' . URLROOT . '/schedules/index');
                } else {
                    die('Algo ha ido mal, vuelvelo a intentar mas tarde');
                }
            } else {
                $this->view('schedules/update', $data);
            }
        }
        $this->view('schedules/update', $data);
    }

    public function delete($id_schedule)
    {
        $schedule = $this->scheduleModel->findClaseById($id_schedule);

        $data = [
            'schedule' => $schedule,
            'id_class' => '',
            'time_start' => '',
            'time_end' => '',
            'day' => '',
            'id_classError' => '',
            'time_startError' => '',
            'time_endError' => '',
            'dayError' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if ($this->scheduleModel->delete($id_schedule)) {
                header('location: ' . URLROOT . '/schedules/index');

            } else {
                die('Algo ha ido mal, vuelvelo a intentar mas tarde');
            }
        }
    }







}
