<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "your database name";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
