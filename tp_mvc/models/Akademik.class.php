<?php
include_once("models/DB.class.php");

class Akademik extends DB
{
    function __construct($host, $user, $pass, $name)
    {
        parent::__construct($host, $user, $pass, $name);
    }

    function getAkademik()
    {
        $query = "SELECT * FROM akademik";
        return $this->execute($query);
    }

    function getById($id)
    {
        $query = "SELECT * FROM akademik WHERE id_akademik = '$id'";
        return $this->execute($query);
    }

    function add($data)
    {
        $status_akademik = $data['status_akademik'];
        $query = "INSERT INTO akademik (status_akademik) VALUES ('$status_akademik')";
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM akademik WHERE id_akademik = '$id'";
        return $this->execute($query);
    }

    function update($id, $data)
    {
        $status_akademik = $data['status_akademik'];
        $query = "UPDATE akademik SET status_akademik = '$status_akademik' WHERE id_akademik = '$id'";
        return $this->execute($query);
    }
}
