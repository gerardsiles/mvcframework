<?php
class Teachers extends Controller {
        public function __construct() {
            // Llamar al modelo para recibir los datos en el controlador
            $this->teacherModel = $this->model('Teacher');
        }

    public function index() {
           $teachers = $this->teacherModel->getTeachers();
            $data = [
                'teachers' => $teachers
            ];

            $this->view('teachers/index', $data);
    }


    public function addTeacher() {

        $data = [
            'name' => '',
            'surname' => '',
            'telephone' => '',
            'nif' => '',
            'email' => '',
            'user_type' => '',
            'nameError' => '',
            'surnameError' => '',
            'telephoneError' => '',
            'nifError' => '',
            'emailError' => '',
            'user_typeError' => ''
        ];

                   /* Funcion para el formulario de registro */
              if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    // Process form
                    // Sanitize POST data
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                    $data = [
                                            'name' => trim($_POST['name']),
                                            'surname' => trim($_POST['surname']),
                                            'telephone' => trim($_POST['telephone']),
                                            'nif' => trim($_POST['nif']),
                                            'email' => trim($_POST['email']),
                                            'user_type' => trim($_POST['user_type']),
                                            'nameError' => '',
                                            'surnameError' => '',
                                            'telephoneError' => '',
                                            'nifError' => '',
                                            'emailError' => '',
                                            'user_typeError' => ''
                                        ];
                                    $nameValidation = "/^[a-zA-Z]*$/";
                                    $telephoneValidation = "/^[0-9]*$/";
                                    


                                       //Validar inputs del usuario
                                    if (empty($data['name'])) {
                                        $data['nameError'] = 'Introduzca el nombre del profesor';
                                    }else if(!preg_match($nameValidation, $data['name'])){
                                        $data['nameError'] = 'Introduzca solo letras';
                                     }

                                    if (empty($data['surname'])) {
                                        $data['surnameError'] = 'Introduzca el apellido del profesor';
                                    }

                                    if (empty($data['telephone'])) {
                                        $data['telephoneError'] = 'Introduzca la fecha de inicio de curso';
                                    }elseif(!preg_match($telephoneValidation, $data['telephone'])){
                                       $data['telephoneError'] = 'Introduzca solo numeros';
                                    }

                                    if (empty($data['nif'])) {
                                        $data['nifError'] = 'Introduzca el nif del profesor';
                                    }

                                    if (empty($data['email'])) {
                                        $data['emailError'] = 'Introduzca el email del profesor';
                                    }elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                                        $data['emailError'] = 'Introduce el formato correcto';
                                    }


                                                    // antes de crear el usuario, comprobar que no hay errores
                                                    if (empty($data['nameError']) && empty($data['surnameError']) &&empty($data['telephoneError'])
                                                    && empty($data['nifError']) && empty($data['emailError'])) {


                                                        //registrar al usuario con el modelo
                                                        if ($this->teacherModel->addTeacher($data)) {
                                                            //Redirigir al index de cursos
                                                            header('location: ' . URLROOT . '/teachers/index');
                                                        } else {
                                                            die('Algo ha ido mal, vuelvelo a intentar mas tarde');
                                                        }
                                                    }else{
                                                        $this->view('teachers/addTeacher', $data);
                                                    }
              }
                        $this->view('teachers/addTeacher', $data);
    
}

    
    public function update($id_teacher) {
        $teacher = $this->teacherModel->findTeacherById($id_teacher);
    
         $data = [
             'teacher' => $teacher,
             'name' => '',
             'surname' => '',
             'telephone' => '',
             'nif' => '',
             'email' => '',
             'user_type' => '',
             'nameError' => '',
             'surnameError' => '',
             'telephoneError' => '',
             'nifError' => '',
             'emailError' => '',
            
         ];
 
                     
 
                     if($_SERVER['REQUEST_METHOD'] == 'POST'){
                         // Process form
                         // Sanitize POST data
                         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                         $data = [
                                     'id_teacher' => $id_teacher,
                                     'name' => trim($_POST['name']),
                                     'surname' => trim($_POST['surname']),
                                     'telephone' => trim($_POST['telephone']),
                                     'nif' => trim($_POST['nif']),
                                     'email' => trim($_POST['email']),
                                     'user_type' => trim($_POST['user_type']),
                                     'nameError' => '',
                                     'surnameError' => '',
                                     'telephoneError' => '',
                                     'nifError' => '',
                                     'emailError' => '',
                                    
                                 ];
                             
                                 $nameValidation = "/^[a-zA-Z]*$/";
                                 $telephoneValidation = "/^[0-9]*$/";
 
 
                                //Validar inputs del usuario
                                if (empty($data['name'])) {
                                 $data['nameError'] = 'Introduzca el nombre del profesor';
                             }elseif(!preg_match($nameValidation, $data['name'])){
                                 $data['nameError'] = 'Introduzca solo letras';
                              }
 
                             if (empty($data['surname'])) {
                                 $data['surnameError'] = 'Introduzca el apellido del profesor';
                             }
 
                             if (empty($data['telephone'])) {
                                 $data['telephoneError'] = 'Introduzca la fecha de inicio de curso';
                             }elseif(!preg_match($telephoneValidation, $data['telephone'])){
                                $data['telephoneError'] = 'Introduzca solo numeros';
                             }
 
                             if (empty($data['nif'])) {
                                 $data['nifError'] = 'Introduzca el nif del profesor';
                             }
 
                             if (empty($data['email'])) {
                                 $data['emailError'] = 'Introduzca el email del profesor';
                             }elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                                 $data['emailError'] = 'Introduce el formato correcto';
                             }
 

                                             // antes de crear el usuario, comprobar que no hay errores
                                             if (empty($data['nameError']) && empty($data['surnameError']) &&empty($data['telephoneError'])
                                                     && empty($data['nifError']) && empty($data['emailError'])) {
 
 
                                                 //registrar el curso en el modelo
                                                 if ($this->teacherModel->update($data)) {
                                                     //Redirigir al index de cursos
                                                     header('location: ' . URLROOT . '/teachers/index');
                                                 } else {
                                                     die('Algo ha ido mal, vuelvelo a intentar mas tarde');
                                                 }
                                             }else{
                                                 $this->view('teachers/update', $data);
                                             }
                                         }
                                         
                                         
                 $this->view('teachers/update', $data);
 
        
    }
 
     public function delete($id_teacher){
         $teacher = $this->teacherModel->findTeacherById($id_teacher);
    
         $data = [
             'teacher' => $teacher,
             'name' => '',
             'surname' => '',
             'telephone' => '',
             'nif' => '',
             'email' => '',
             'user_type' => '',
             'nameError' => '',
             'surnameError' => '',
             'telephoneError' => '',
             'nifError' => '',
             'emailError' => '',
             'user_typeError' => ''
         ];
 
 
             if($_SERVER['REQUEST_METHOD'] == 'POST'){
                 // Process form
                 // Sanitize POST data
                 $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
 
                 if($this->teacherModel->delete($id_teacher)){
                     header('location: ' . URLROOT . '/teachers/index');
 
                 } else {
                     die('Algo ha ido mal, vuelvelo a intentar mas tarde');
                 }
         }
     }
    
 
 
 
 
 
 }