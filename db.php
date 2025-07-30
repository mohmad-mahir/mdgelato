<?php
$host = 'localhost'; // or your MySQL host
$user = 'root';
$pass = ''; // or your MySQL password
$db = 'md_gelato';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
