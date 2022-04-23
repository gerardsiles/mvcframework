<?php
class Clase
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function findAllClasses()
    {
        $this->db->query('SELECT * FROM class');

        $results = $this->db->resultSet();

        return $results;
    }

    public function findClassById($id_class)
    {
        $this->db->query('SELECT * FROM class
        WHERE id_class = :id_class');

        $this->db->bind(':id_class', $id_class);

        $row = $this->db->single();

        return $row;
    }

    public function findClassesByTeacher($id)
    {
        $this->db->query('SELECT * FROM class
        WHERE $id = :id');

        $results = $this->db->resultSet();

        return $results;
    }

    public function findClassesByCourse($id_course)
    {
        $this->db->query('SELECT * FROM class
        WHERE $id_course = :id_course');

        $results = $this->db->resultSet();

        return $results;
    }

    public function findClassesBySchedule($id_schedule)
    {
        $this->db->query('SELECT * FROM class
        WHERE id_schedule = :id_schedule');

        $results = $this->db->resultSet();

        return $results;
    }

    public function addClass($data)
    {
        $this->db->query('INSERT INTO class (id, id_course, id_schedule, name, color)
        VALUES (:id, :id_course, :id_schedule, :name, :color)');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':id_course', $data['id_course']);
        $this->db->bind(':id_schedule', $data['id_schedule']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':color', $data['color']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($data)
    {
        $this->db->query('UPDATE class SET id = :id, id_course = :id_course,
        id_schedule = :id_schedule, name = :name, color = :color
        WHERE id_class = :id_class');

        $this->db->bind(':id_class', $data['id_class']);
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':id_course', $data['id_course']);
        $this->db->bind(':id_schedule', $data['id_schedule']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':color', $data['color']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id_class)
    {
        $this->db->query('DELETE FROM class WHERE id_class = :id_class');

        $this->db->bind(':id_class', $id_class);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
