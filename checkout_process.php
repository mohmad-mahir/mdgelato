<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: login.html");
  exit();
}
  $user_id = $_SESSION['user_id'];
  $address = $_POST['address'] ?? '';

if (!$address) {
  echo "Address is required.";
  exit();
}

// Get cart items
$sql = "SELECT c.product_id, c.quantity, p.price 
        FROM cart c 
        JOIN products p ON c.product_id = p.id 
        WHERE c.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$total = 0;
$items = [];

while ($row = $result->fetch_assoc()) {
  $subtotal = $row['price'] * $row['quantity'];
  $total += $subtotal;
  $items[] = $row;
}

// Insert into orders table
$stmt = $conn->prepare("INSERT INTO orders (user_id, address, total_amount, status) VALUES (?, ?, ?, 'Pending')");
$stmt->bind_param("isd", $user_id, $address, $total);
$stmt->execute();
$order_id = $stmt->insert_id;

// Insert order items
$stmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
foreach ($items as $item) {
  $stmt->bind_param("iiid", $order_id, $item['product_id'], $item['quantity'], $item['price']);
  $stmt->execute();
}

// Clear cart
$stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Order Confirmation</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #fff0f5;
      font-family: 'Poppins', sans-serif;
    }

    .success-box {
      background: white;
      border-radius: 10px;
      padding: 40px;
      max-width: 600px;
      margin: 60px auto;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      text-align: center;}
    
    .success-box h1 {
      color: #ff5c8d;
      font-weight: 600;
    }
    .btn-home {
      background-color: #ff5c8d;
      color: white;
      border: none;
      padding: 10px 25px;
      border-radius: 5px;
      text-decoration: none;
      margin-top: 20px;
      display: inline-block;
    }
    .btn-home:hover {
      background-color: #e0527c;
    }
  </style>
</head>
<body>
<div class="success-box">
  <h1>Thank You for Your Order!</h1>
  <p class="lead">Your Order ID is <strong>#<?= $order_id ?></strong></p>
  <p><strong>Total Amount:</strong> ₹<?=$total ?></p>
  <p><strong>Delivery Address:</strong> <?= htmlspecialchars($address) ?></p>
  <p>Please keep the amount ready.</p>
  <p>Payment will be collected at your doorstep.</p>
  <a href="index.php" class="btn-home">Back to Home</a>
</div>
</body>
</html>
