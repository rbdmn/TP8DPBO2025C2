<?php
class Conf
{
    static public $db_host = "localhost";
    static public $db_user = "root";
    static public $db_pass = "";
    static public $db_name = "tp_mvc";
}

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "tp_mvc";

$conn = new mysqli($servername, $username, $password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "";

?>