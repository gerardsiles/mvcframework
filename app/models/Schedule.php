<?php
class Schedule
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function findAllSchedules()
    {
        $this->db->query('SELECT * FROM schedule');

        $results = $this->db->resultSet();

        return $results;
    }

    public function findSchedulesByClass($id_class)
    {
        $this->db->query('SELECT * FROM schedule
        WHERE id_class = :id_class');

        $results = $this->db->resultSet();

        return $results;
    }

    public function findScheduleById($id_schedule)
    {
        $this->db->query('SELECT * FROM schedule
        WHERE id_schedule = :id_schedule');

        $this->db->bind(':id_schedule', $id_schedule);

        $row = $this->db->single();

        return $row;
    }

    public function addSchedule($data)
    {
        $this->db->query('INSERT INTO schedule (id_class, time_start, time_end, day)
        VALUES (:id_class, :time_start, :time_end, :day)');

        $this->db->bind(':id_class', $data['classes']->id_class);
        $this->db->bind(':time_start', $data['time_start']);
        $this->db->bind(':time_end', $data['time_end']);
        $this->db->bind(':day', $data['day']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($data)
    {
        $this->db->query('UPDATE schedule SET id_class = :id_class, time_start = :time_start,
        time_end = :time_end, day = :day WHERE id_schedule = :id_schedule');

        $this->db->bind(':id_class', $data['classes']->id_class);
        $this->db->bind(':time_start', $data['time_start']);
        $this->db->bind(':time_end', $data['time_end']);
        this->db->bind(':day', $data['day']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id_schedule)
    {
        $this->db->query('DELETE FROM schedule WHERE id_schedule = :id_schedule');

        $this->db->bind(':id_schedule', $id_schedule);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
