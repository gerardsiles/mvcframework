<?php
class Admins extends Controller {
        public function __construct() {
            // Llamar al modelo para recibir los datos en el controlador
            $this->adminModel = $this->model('Admin');
        }

    public function index() {
           //$admins = $this->courseAdmin->getAdmins();
            $data = [
               // 'admins' => $admins
            ];

            $this->view('admins/index', $data);
    }


}