<?php
$host = '127.0.0.1';
$user = 'root';
$pass = ''; // or your MySQL password
$dbname = 'database'; // your DB name

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
