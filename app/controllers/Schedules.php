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
        $schedules = $this->scheduleModel->findAllSchedules();
        $classes = $this->classModel->findAllClasses();
        $data = [
            'schedules' => $schedules,
            'classes' => $classes,
        ];

        $this->view('schedules/index', $data);
    }
}
