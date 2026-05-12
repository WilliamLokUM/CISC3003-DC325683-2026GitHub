<?php
$host = "localhost";
$dbname = "paper02_a";
$username = "root";
$password = "";
$port = 3307;

$conn = new mysqli($host, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("fail to connect your database, check the connect.php, is the db same as your setting: " . $conn->connect_error);
}
?>