<?php
include_once("models/DB.class.php");

class Prestasi extends DB
{
    function __construct($host, $user, $pass, $name)
    {
        parent::__construct($host, $user, $pass, $name);
    }

    function getPrestasi()
    {
        $query = "SELECT * FROM prestasi";
        return $this->execute($query);
    }

    function add($data)
    {
        $tingkat = $data['tingkat_prestasi'];

        $query = "INSERT INTO prestasi (tingkat_prestasi) 
                 VALUES ('$tingkat')";
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM prestasi WHERE id_prestasi = '$id'";
        return $this->execute($query);
    }

    function getById($id)
    {
        $query = "SELECT * FROM prestasi WHERE id_prestasi = '$id'";
        return $this->execute($query);
    }

    function update($id, $data)
    {
        $tingkat = $data['tingkat_prestasi'];

        $query = "UPDATE prestasi SET 
                 tingkat_prestasi = '$tingkat' 
                 WHERE id_prestasi = '$id'";
        return $this->execute($query);
    }
}