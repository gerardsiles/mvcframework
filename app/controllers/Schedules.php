<?php
class Schedules extends Controller
{
    public function __construct()
    {
        // Llamar al modelo para recibir los datos en el controlador
        $this->scheduleModel = $this->model('Schedule');
    }

    // crear vista
    public function index()
    {
        $schedules = $this->scheduleModel->findAllCourses();
        $data = [
            'schedules' => $schedules,
        ];

        $this->view('schedules/index', $data);
    }
}
