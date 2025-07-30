<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($full_name && $email && $password) {
        //$password_hashed = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (full_name, phone, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $full_name, $phone, $email, $password);
        //$stmt->bind_param("ssss", $full_name, $phone, $email, $password_hashed);

        if ($stmt->execute()) {
            session_start();
            header("Location: index.php");
            $_SESSION['user_name'] = $full_name;
            $_SESSION['user_id'] = $conn->insert_id;
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Invalid request.";
}
$conn->close();
?>
