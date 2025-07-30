<?php
$host = 'sql311.infinityfree.com'; // or your MySQL host
$user = 'if0_39377895';
$pass = 'Mdgelato91'; // or your MySQL password
$db = 'if0_39377895_md_gelato';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
