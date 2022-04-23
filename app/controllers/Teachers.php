<?php
class Teachers extends Controller
{
    public function __construct()
    {
        // Llamar al modelo para recibir los datos en el controlador
        $this->teacherModel = $this->model('Teacher');
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        $teachers = $this->userModel->findAllTeachers();
        $data = [
            'teachers' => $teachers,
        ];

        $this->view('teachers/index', $data);
    }

    public function addTeacher()
    {

        $data = [
            'name' => '',
            'surname' => '',
            'username' => '',
            'email' => '',
            'user_type' => '',
            'telephone' => '',
            'nif' => '',
            'pass' => '',
            'confirmPass' => '',
            'nameError' => '',
            'surnameError' => '',
            'usernameError' => '',
            'emailError' => '',
            'phoneError' => '',
            'nifError' => '',
            'passError' => '',
            'confirmPassError' => '',
        ];

        /* Funcion para el formulario de registro */
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'name' => trim($_POST['name']),
                'surname' => trim($_POST['surname']),
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'user_type' => trim($_POST['user_type']),
                'telephone' => trim($_POST['telephone']),
                'nif' => trim($_POST['nif']),
                'pass' => trim($_POST['pass']),
                'confirmPass' => trim($_POST['confirmPass']),
                'nameError' => '',
                'surnameError' => '',
                'usernameError' => '',
                'emailError' => '',
                'phoneError' => '',
                'nifError' => '',
                'passError' => '',
                'confirmPassError' => '',
            ];
            $nameValidation = "/^[a-zA-Z]*$/";
            $passValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            //Validar inputs del usuario
          if (empty($data['name'])) {
            $data['nameError'] = 'Introduzca su nombre';
        }

        if (empty($data['surname'])) {
            $data['surnameError'] = 'Introduzca su apellido';
        }

        if (empty($data['username'])) {
            $data['usernameError'] = 'Introduzca un usuario';
        } elseif (!preg_match($nameValidation, $data['username'])) {
            $data['usernameError'] = 'El usuario solo puede tener letras';
        } else if ($this->userModel->findUserByName($data['username'])) {
            $data['usernameError'] = 'Este nombre de usuario ya existe';
        }

        if (empty($data['email'])) {
            $data['emailError'] = 'introduzca su email';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $data['emailError'] = 'introduce el formato correcto';
        } else {
            //Comprobar si el email existe
            if ($this->userModel->findUserByEmail($data['email'])) {
                $data['emailError'] = 'este email ya existe';
            }
        }

        if (empty($data['telephone'])) {
            $data['phoneError'] = 'Introduzca su telefono de contacto';
        }

        if (empty($data['nif'])) {
            $data['nifError'] = 'Introduzca su DNI o pasaporte';
        }

        if (empty($data['pass'])) {
            $data['passError'] = 'Introduzca una contrasena';
        } elseif (strlen($data['pass']) < 6) {
            $data['passError'] = 'La contrasena debe ser minimo de 8 caracteres';
        } elseif (preg_match($passValidation, $data['pass'])) {
            $data['passError'] = 'La contrasena debe tener como minimo un valor numerico';
        }

        if (empty($data['confirmPass'])) {
            $data['confirmPassError'] = 'Introduzca la contrasena';
        } else {
            if ($data['pass'] != $data['confirmPass']) {
                $data['confirmPassError'] = 'Las contrasenas no son iguales';
            }
        }

            // antes de crear el usuario, comprobar que no hay errores
            if (empty($data['nameError']) && empty($data['surnameError']) && empty($data['usernameError'])
              && empty($data['emailError']) && empty($data['phoneError']) && empty($data['nifError'])
              && empty($data['passError']) && empty($data['confirmPassError'])) {

                // Hash contrasena
              $data['pass'] = password_hash($data['pass'], PASSWORD_DEFAULT);

              //registrar al usuario con el modelo
              if ($this->teacherModel->addTeacher($data)) {
                  //Redirigir al login
                  header('location: ' . URLROOT . '/teachers/index');
              } else {
                  die('Algo ha ido mal, vuelvelo a intentar mas tarde');
              } 
          }else {
            $this->view('teachers/addTeacher', $data);
          }
      }
      $this->view('teachers/addTeacher', $data);
  }

    public function update($id)
    {
        $teacher = $this->userModel->findUserById($id);

        $data = [
            'teacher' => $teacher,
            'name' => '',
            'surname' => '',
            'username' => '',
            'email' => '',
            'user_type' => '',
            'telephone' => '',
            'nif' => '',
            'pass' => '',
            'confirmPass' => '',
            'nameError' => '',
            'surnameError' => '',
            'usernameError' => '',
            'emailError' => '',
            'phoneError' => '',
            'nifError' => '',
            'passError' => '',
            'confirmPassError' => '',

        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $id,
                'name' => trim($_POST['name']),
                'surname' => trim($_POST['surname']),
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'user_type' => trim($_POST['user_type']),
                'telephone' => trim($_POST['telephone']),
                'nif' => trim($_POST['nif']),
                'pass' => trim($_POST['pass']),
                'confirmPass' => trim($_POST['confirmPass']),
                'nameError' => '',
                'surnameError' => '',
                'usernameError' => '',
                'emailError' => '',
                'phoneError' => '',
                'nifError' => '',
                'passError' => '',
                'confirmPassError' => '',

            ];

            $nameValidation = "/^[a-zA-Z]*$/";
            $passValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            //Validar inputs del usuario
          if (empty($data['name'])) {
            $data['nameError'] = 'Introduzca su nombre';
        }

        if (empty($data['surname'])) {
            $data['surnameError'] = 'Introduzca su apellido';
        }

        if (empty($data['username'])) {
            $data['usernameError'] = 'Introduzca un usuario';
        } elseif (!preg_match($nameValidation, $data['username'])) {
            $data['usernameError'] = 'El usuario solo puede tener letras';
        } else if ($this->userModel->findUserByName($data['username'])) {
            $data['usernameError'] = 'Este nombre de usuario ya existe';
        }

        if (empty($data['email'])) {
            $data['emailError'] = 'introduzca su email';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $data['emailError'] = 'introduce el formato correcto';
        } else {
            //Comprobar si el email existe
            if ($this->userModel->findUserByEmail($data['email'])) {
                $data['emailError'] = 'este email ya existe';
            }
        }

        if (empty($data['telephone'])) {
            $data['phoneError'] = 'Introduzca su telefono de contacto';
        }

        if (empty($data['nif'])) {
            $data['nifError'] = 'Introduzca su DNI o pasaporte';
        }

        if (empty($data['pass'])) {
            $data['passError'] = 'Introduzca una contrasena';
        } elseif (strlen($data['pass']) < 6) {
            $data['passError'] = 'La contrasena debe ser minimo de 8 caracteres';
        } elseif (preg_match($passValidation, $data['pass'])) {
            $data['passError'] = 'La contrasena debe tener como minimo un valor numerico';
        }

        if (empty($data['confirmPass'])) {
            $data['confirmPassError'] = 'Introduzca la contrasena';
        } else {
            if ($data['pass'] != $data['confirmPass']) {
                $data['confirmPassError'] = 'Las contrasenas no son iguales';
            }
        }

            // antes de crear el usuario, comprobar que no hay errores
            if (empty($data['nameError']) && empty($data['surnameError']) && empty($data['usernameError'])
              && empty($data['emailError']) && empty($data['phoneError']) && empty($data['nifError'])
              && empty($data['passError']) && empty($data['confirmPassError'])) {

                // Hash contrasena
              $data['pass'] = password_hash($data['pass'], PASSWORD_DEFAULT);

              //registrar al usuario con el modelo
              if ($this->teacherModel->update($data)) {
                  //Redirigir al login
                  header('location: ' . URLROOT . '/teachers/index');
              } else {
                  die('Algo ha ido mal, vuelvelo a intentar mas tarde');
              } 
          }else {
            $this->view('teachers/update', $data);
          }
      }
      $this->view('teachers/update', $data);
  }

    public function delete($id)
    {
        $teacher = $this->userModel->findUserById($id);

        $data = [
            'teacher' => $teacher,
            'name' => '',
            'surname' => '',
            'username' => '',
            'email' => '',
            'user_type' => '',
            'telephone' => '',
            'nif' => '',
            'pass' => '',
            'confirmPass' => '',
            'nameError' => '',
            'surnameError' => '',
            'usernameError' => '',
            'emailError' => '',
            'phoneError' => '',
            'nifError' => '',
            'passError' => '',
            'confirmPassError' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if ($this->teacherModel->delete($id)) {
                header('location: ' . URLROOT . '/teachers/index');

            } else {
                die('Algo ha ido mal, vuelvelo a intentar mas tarde');
            }
        }
   

    }

}
