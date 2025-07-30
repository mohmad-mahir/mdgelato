<?php
$order_id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;
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
  <p>Please pick up your order from the store.</p>
  <a href="index.php" class="btn-home">Back to Home</a>
</div>

</body>
</html>
