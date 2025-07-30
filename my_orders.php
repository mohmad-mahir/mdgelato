<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: login.html");
  exit();
}
$user_id = $_SESSION['user_id'];
$sql = "SELECT o.id, o.total_amount, o.created_at, o.status, p.name, oi.quantity, oi.price 
        FROM orders o
        JOIN order_items oi ON o.id = oi.order_id
        JOIN products p ON oi.product_id = p.id
        WHERE o.user_id = ?
        ORDER BY o.created_at DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$orders = [];
while ($row = $result->fetch_assoc()) {
  $orders[$row['id']]['info'] = [
  'total' => $row['total_amount'],
  'created' => $row['created_at'],
  'status' => $row['status']

  ];
    $orders[$row['id']]['items'][] = [
        'name' => $row['name'],
        'quantity' => $row['quantity'],
        'price' => $row['price']
    ];
}


?>

<!DOCTYPE html>
<html>
<head>
  <title>My Orders</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="container mt-5">
  <h2>My Previous Orders</h2>
  <?php if (empty($orders)): ?>
    <p>No orders yet.</p>
  <?php else: ?>
    <?php foreach ($orders as $id => $order): ?>
      <div class="card mb-3">
        <div class="card-header">
          Order #<?= $id ?> | Status: <?= $order['info']['status'] ?>  
| Date: <?= $order['info']['created'] ?>  
| Total: ₹<?= $order['info']['total'] ?>
        </div>
        <ul class="list-group list-group-flush">
          <?php foreach ($order['items'] as $item): ?>
            <li class="list-group-item">
              <?= $item['name'] ?> - <?= $item['quantity'] ?> x ₹<?= $item['price'] ?>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</body>
</html>