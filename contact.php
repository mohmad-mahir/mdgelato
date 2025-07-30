<?php
include 'db.php'; // Include your database connection file
// Handle POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone_number = $_POST['phone_number'] ?? '';
    $message = $_POST['message'] ?? '';

    $sql = "INSERT INTO contact_form (name, email, phone_number, message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $phone_number, $message);

    if ($stmt->execute()) {
        echo "Message submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
}
$conn->close();
header("Location: index.php");
exit();
?>