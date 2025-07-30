<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: login.html");
  exit();
}
$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'] ?? 0;

// Check if product already in cart
$sql = "SELECT * FROM cart WHERE user_id = ? AND product_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $user_id, $product_id);
$stmt->execute();
$res = $stmt->get_result();

if ($res->num_rows > 0) {
  // Increase quantity
  $sql = "UPDATE cart SET quantity = quantity + 1 WHERE user_id = ? AND product_id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ii", $user_id, $product_id);
  $stmt->execute();
} else {
  // Insert new cart item
  $sql = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, 1)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ii", $user_id, $product_id);
  $stmt->execute();
}

header("Location: icecream.php");
exit();
?>
