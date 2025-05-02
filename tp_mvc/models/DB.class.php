<?php
class DB {
    private $host;
    private $user;
    private $pass;
    private $dbname;
    private $conn;

    function __construct($host, $user, $pass, $name) {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->dbname = $name;
    }

    function open() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    function execute($query) {
        return $this->conn->query($query);
    }

    function fetch($result) {
        return $result->fetch_assoc();
    }

    function close() {
        $this->conn->close();
    }

    function getAffectedRows() {
        return $this->conn->affected_rows;
    }
}