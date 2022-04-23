<?php
  class User {
    private $db;

    public function __construct() {
      // conectar a la clase con la base de datos
      $this->db = new Database;
    }


    public function register($data) {
      $this->db->query('INSERT INTO users (username, pass, email, name, surname, telephone, nif, date_registered) VALUES (:username, :pass, :email, :name, :surname, :telephone, :nif, :date_registered)');

      // juntar los valores
      $this->db->bind(':username', $data['username']);
      $this->db->bind(':pass', $data['password']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':surname', $data['surname']);
      $this->db->bind(':telephone', $data['telephone']);
      $this->db->bind(':nif', $data['nif']);
      $this->db->bind(':date_registered', date('Y-m-d H:i:s'));

      // ejecutar instruccion
      if ($this->db->execute()) {
          return true;
      } else {
          return false;
      }
    }

    public function login($username, $password) {

      $this->db->query('SELECT * FROM users  WHERE username = :username');
      $this->db->bind(':username', $username);

      $row = $this->db->single();

      /* Comprobar la contrasena hashed si hace match */
      $hashedPassword = $row->pass;


      if (password_verify($password, $hashedPassword)) {
          return $row;
      } else {
          return false;
      }


    }

    // Metodo para comprobar si un email xiste en la base de datos
    public function findUserByEmail($email) {
      // Preparar query para la base de datos
      // solamente los estudiantes pueden hacer el registro, admins y profesores son introducidos manualmente
      $this->db->query('SELECT * FROM students WHERE email = :email');

      // agregamos el parametro de email a la variable
      $this->db->bind(':email', $email);

      // comprobar si el email existe
      if($this->db->rowCount() > 0){ // comprobar si los resultados recibidos tienen algun match
          return true;
      } else {
          return false;
      }
    }


     /* Encontrar a un usuario en la base de datos con su nombre de usuario */
     public function findUserByName($name) {
      $this->db->query('SELECT * FROM users WHERE name = :name');

      $this->db->bind(':name', $name);

      if($this->db->rowCount() > 0){ // comprobar si los resultados recibidos tienen algun match
          return true;
      } else {
          return false;
      }
    }


     /* Encontrar a un usuario en la base de datos con su nombre de usuario */
      public function findUserById($id) {
       $this->db->query('SELECT * FROM users WHERE id = :id');
        
       $this->db->bind(':id', $id);
        
        $row = $this->db->single();

        return $row;
      }        



     /* public function comprobarTipoUsuario($id){
       $this->db->query('SELECT * FROM users WHERE id = :id AND user_type = "student"');
            
       $this->db->bind(':id', $id);
            
       echo ($id);
       var_dump($this->db->query('SELECT * FROM users WHERE id = 1 AND user_type = "student"'));

       if($this->db->rowCount() > 0){ // comprobar si los resultados recibidos tienen algun match
          return true;
         } else {
           return false;
         }
            
            

    /* Cambiar el nombre de usuario */
    public function changeUsername($data) {

      $this->db->query('UPDATE users SET username = :newName WHERE username = :name');
      $this->db->bind(':newName', $data['newUsername']);
      $this->db->bind(':name', $data['username']);

      if ($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }

    /* Cambiar el email del usuario */
    public function changeEmail($data) {
      $this->db->query('UPDATE users SET email = :newEmail WHERE username = :name');
      $this->db->bind(':newEmail', $data['newEmail']);
      $this->db->bind(':name', $data['username']);

      if ($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }

    /* Cambiar la contrasena del usuario */
    public function changePassword($data) {
      /* hashear la password de entrada */
      $data['newPassword'] = password_hash($data['newPassword'], PASSWORD_DEFAULT);

      $this->db->query('UPDATE users SET pass = :newPassword WHERE username = :user');
      $this->db->bind(':newPassword', $data['newPassword']);
      $this->db->bind(':user', $data['username']);

      if ($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }


  }
