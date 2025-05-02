<?php
include_once("models/DB.class.php");

class Students extends DB
{
    function __construct($host, $user, $pass, $name)
    {
        parent::__construct($host, $user, $pass, $name);
    }

    function getStudents()
    {
        $query = "SELECT s.id, s.name, s.nim, s.phone, s.join_date, 
                 p.tingkat_prestasi, a.status_akademik
                 FROM students s
                 LEFT JOIN prestasi p ON s.id_prestasi = p.id_prestasi
                 LEFT JOIN akademik a ON s.id_akademik = a.id_akademik";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];
        $nim = $data['nim'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $id_prestasi = $data['id_prestasi'];
        $id_akademik = $data['id_akademik'];

        $query = "INSERT INTO students (name, nim, phone, join_date, id_prestasi, id_akademik) 
                 VALUES ('$name', '$nim', '$phone', '$join_date', '$id_prestasi', '$id_akademik')";
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM students WHERE id = '$id'";
        return $this->execute($query);
    }

    function getById($id)
    {
        $query = "SELECT * FROM students WHERE id = '$id'";
        return $this->execute($query);
    }

    function update($id, $data)
    {
        $name = $data['name'];
        $nim = $data['nim'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $id_prestasi = $data['id_prestasi'];
        $id_akademik = $data['id_akademik'];

        $query = "UPDATE students SET 
                 name = '$name', 
                 nim = '$nim', 
                 phone = '$phone', 
                 join_date = '$join_date',
                 id_prestasi = '$id_prestasi',
                 id_akademik = '$id_akademik'
                 WHERE id = '$id'";
        return $this->execute($query);
    }

    public function getPrestasiOptions()
    {
        $query = "SELECT id_prestasi, tingkat_prestasi FROM prestasi";
        return $this->execute($query);
    }

    public function getAkademikOptions()
    {
        $query = "SELECT id_akademik, status_akademik FROM akademik";
        return $this->execute($query);
    }
}