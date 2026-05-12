<?php
/**
 * Database connection for Scenario C
 */
$host = "localhost";
$dbname = "paper02_c";
$username = "root";
$password = "";
$port = 3307; // I use 3307, you can use your own port if needed

$conn = new mysqli($host, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>