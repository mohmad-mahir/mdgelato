<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: login.html");
  exit();
}
// Get cart ID from POST request

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cart_id'])) {
  $cart_id = $_POST['cart_id'];
  $user_id = $_SESSION['user_id'];

  // Delete item only if it belongs to the logged-in user
  $sql = "DELETE FROM cart WHERE id = ? AND user_id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ii", $cart_id, $user_id);
  $stmt->execute();

  header("Location: cart.php");
  exit();
}
?>
