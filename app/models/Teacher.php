<?php
Class Teacher {

private $db;

   public function __construct() {
      $this->db = new Database;
   }

        public function getTeachers(){
        $this->db->query("SELECT * FROM teachers");

        $results = $this->db->resultSet();

        return $results;
        }


        // Metodo para comprobar si un id_course de curso existe en la base de datos
        public function findTeacherById($id_teacher) {
            // Preparar query para la base de datos
            $this->db->query('SELECT * FROM teachers WHERE id_teacher = :id_teacher');

            // agregamos el parametro de id_course a la variable
            $this->db->bind(':id_teacher', $id_teacher);


            $row = $this->db->single();

            return $row;

        }

        // Metodo para comprobar si un name de curso existe en la base de datos
        public function findTeacherByEmail($email) {
            // Preparar query para la base de datos
            $this->db->query('SELECT * FROM teachers WHERE email = :email');

            // agregamos el parametro de name a la variable
            $this->db->bind(':email', $email);

            // comprobar si el email existe
            if($this->db->rowCount() > 0){ // comprobar si los resultados recibidos tienen algun match
                return true;
            } else {
                return false;
            }
        }



        public function addTeacher($data) {
            $this->db->query('INSERT INTO teachers (name, surname, telephone, nif, email, user_type) VALUES (:name, :surname, :telephone, :nif, :email, :user_type)');

            $this->db->bind(':name', $data['name']);
            $this->db->bind(':surname', $data['surname']);
            $this->db->bind(':telephone', $data['telephone']);
            $this->db->bind(':nif', $data['nif']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':user_type', $data['user_type']);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }


        public function update($data) {
            $this->db->query('UPDATE teachers SET name = :name, surname = :surname, telephone = :telephone, nif =:nif, email = :email, user_type = :user_type  WHERE id_teacher = :id_teacher');
            
            $this->db->bind(':id_teacher', $data['id_teacher']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':surname', $data['surname']);
            $this->db->bind(':telephone', $data['telephone']);
            $this->db->bind(':nif', $data['nif']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':user_type', $data['user_type']);
    
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }


        public function delete($id_teacher){

            $this->db->query('DELETE FROM teachers WHERE id_teacher = :id_teacher');

            $this->db->bind(':id_teacher', $id_teacher);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        


}