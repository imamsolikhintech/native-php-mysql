<?php
$host = 'db';
$username = 'root';
$password = 'rootpassword';
$database = 'mydb';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
