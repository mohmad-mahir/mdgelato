<?php
include 'db.php';
session_start();

$identifier = $_POST['identifier'];
$password = $_POST['password'];
$sql = "SELECT * FROM users WHERE email = ? OR phone = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $identifier, $identifier);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    if ($password == $user['password']) {
        $_SESSION['user_name'] = $user['full_name'];
        $_SESSION['user_id'] = $user['id'];
        header("Location: index.php");
        exit();
    } else {
         header("Location: login.html?error=wrongpass");
        exit();
    }
} else {
    header("Location: login.html?error=notfound");
    exit();
}
$conn->close();
?>
