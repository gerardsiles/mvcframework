<?php
class Enrollment{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function findAllEnrollments()
    {
        $this->db->query('SELECT * FROM enrollment');

        $results = $this->db->resultSet();

        return $results;
    }

    public function findEnrollmentById($id_enrollment)
    {
        $this->db->query('SELECT * FROM enrollment 
        WHERE id_enrollment = :id_enrollment');

        $this->db->bind(':id_enrollment', $id_enrollment);

        $row = $this->db->single();

        return $row;
    }

    public function findEnrollmentsByIdStudent($id)
    {
        $this->db->query('SELECT * FROM enrollment 
        WHERE id = :id');

        $results = $this->db->resultSet();

        return $results;
    }



    public function findEnrollmentsByCourse($id_course)
    {
        $this->db->query('SELECT * FROM enrollment 
        WHERE $id_course = :id_course');

        $results = $this->db->resultSet();

        return $results;
    }

    public function findCourseByEnrollment($id_enrollment)
    {
        $this->db->query('SELECT id_course FROM enrollment 
        WHERE $id_enrollment = :id_enrollment');

        $results = $this->db->resultSet();

        return $results;
    }


    public function addEnrollment($data)
    {
        $this->db->query('INSERT INTO enrollment (id, id_course, status) 
        VALUES (:id, :id_course, :status)');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':id_course', $data['id_course']);
        $this->db->bind(':status', $data['status']);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }



    public function updateEnrollment($data)
    {
        $this->db->query('UPDATE enrollment SET id = :id, id_course = :id_course, status = :status
        WHERE id_enrollment = :id_enrollment');

        $this->db->bind(':id', $data['teachers']->id);
        $this->db->bind(':id_course', $data['courses']->id_course);
        $this->db->bind(':id_course', $data['status']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteEnrollment($id_enrollment)
    {
        $this->db->query('DELETE FROM enrollment WHERE id_enrollment = :id_enrollment');

        $this->db->bind(':id_enrollment', $id_enrollment);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}