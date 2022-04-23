<?php
class Teacher
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getTeachers()
    {
        $this->db->query("SELECT * FROM users WHERE user_type = 'teacher'");

        $results = $this->db->resultSet();

        return $results;
    }

    // Metodo para comprobar si un id_course de curso existe en la base de datos
    public function findTeacherById($id)
    {
        // Preparar query para la base de datos
        $this->db->query('SELECT * FROM users WHERE id= :id');

        // agregamos el parametro de id_course a la variable
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;

    }

    // Metodo para comprobar si un name de curso existe en la base de datos
    public function findTeacherByEmail($email)
    {
        // Preparar query para la base de datos
        $this->db->query('SELECT * FROM users WHERE email = :email');

        // agregamos el parametro de name a la variable
        $this->db->bind(':email', $email);

        // comprobar si el email existe
        if ($this->db->rowCount() > 0) { // comprobar si los resultados recibidos tienen algun match
            return true;
        } else {
            return false;
        }
    }

    public function addTeacher($data)
    {
        $this->db->query('INSERT INTO users (username, pass, email, name, 
        user_type, surname, telephone, nif, date_registered) 
        VALUES (:username, :pass, :email, :name, :user_type, :surname, :telephone, :nif, :date_registered)');

        $this->db->bind(':username', $data['username']);
        $this->db->bind(':pass', $data['pass']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':user_type', $data['user_type']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':surname', $data['surname']);
        $this->db->bind(':telephone', $data['telephone']);
        $this->db->bind(':nif', $data['nif']);
        $this->db->bind(':date_registered', date('Y-m-d H:i:s'));

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($data)
    {
        $this->db->query('UPDATE users SET username = :username, pass = :pass, email = :email,
         user_type =:user_type, name = :name, surname = :surname, telephone = :telephone, 
         nif = :nif WHERE id = :id');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':pass', $data['pass']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':user_type', $data['user_type']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':surname', $data['surname']);
        $this->db->bind(':telephone', $data['telephone']);
        $this->db->bind(':nif', $data['nif']);
        

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {

        $this->db->query('DELETE FROM users WHERE id = :id');

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}
