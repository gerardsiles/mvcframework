<?php
    class User {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function register($data) {
            $this->db->query('INSERT INTO users (username, password, email, name, surname, telephone, nif, date_registered) VALUES (:username, :password, :email, :name, :surname, :telephone, :nif)');

            // juntar los valores
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':password', $data['pasword']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':surname', $data['surname']);
            $this->db->bind(':telephone', $data['telephone']);
            $this->db->bind(':nif', $data['nif']);
            $this->db->bind(':date_registered', date('Y-m-d'));

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        // Metodo para comprobar si un emaile xiste en la base de datos
        public function findUserByEmail($email) {
            // Preparar query para la base de datos
            this->db->query('SELECT * FROM users WHERE email = :email');

            // agregamos el parametro de email a la variable
            $this->db->bind(':email', $email);

            // comprobar si el email existe
            if($this->db->rowCount() > 0){ // comprobar si los resultados recibidos tienen algun match
                return true;
            } else {
                return false;
            }
        }

    }
