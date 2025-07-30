<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: login.html");
  exit();
}
$user_id = $_SESSION['user_id'];

// Fetch cart items
$sql = "SELECT c.id AS cart_id, p.name, p.price, p.image, c.quantity 
        FROM cart c 
        JOIN products p ON c.product_id = p.id 
        WHERE c.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Your Cart</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #fff;
      font-family: 'Poppins', sans-serif;
    }

    .card {
      border: none;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .cart-img {
      width: 100px;
    }

    .btn-pink {
      background-color: #ff85a2;
      color: white;
    }

    .btn-pink:hover {
      background-color: #ff6e90;
    }
  </style>
</head>

<body>

  <div class="container py-5">
    <h3 class="mb-4 text-center">Your Cart</h3>
    <?php
    $total = 0;
    while ($row = $result->fetch_assoc()): $subtotal = $row['price'] * $row['quantity'];
      $total += $subtotal;
    ?>
      <div class="card mb-3">
        <div class="card-body d-flex align-items-center justify-content-between">
          <img src="<?= $row['image'] ?>" class="cart-img">
          <div>
            <h5><?= $row['name'] ?></h5>
            <form method="POST" action="update_quantity.php" class="form-inline">
              <input type="hidden" name="cart_id" value="<?= $row['cart_id'] ?>">
              <button type="submit" name="action" value="decrease" class="btn btn-outline-secondary btn-sm">-</button>
              <input type="text" name="quantity" value="<?= $row['quantity'] ?>" class="form-control form-control-sm text-center mx-1" style="width: 50px;" readonly>
              <button type="submit" name="action" value="increase" class="btn btn-outline-secondary btn-sm">+</button>
            </form>
            <p>₹<?= $row['price'] ?> x <?= $row['quantity'] ?> = ₹<?= $subtotal ?></p>

          </div>
          <form method="POST" action="remove_from_cart.php">
            <input type="hidden" name="cart_id" value="<?= $row['cart_id'] ?>">
            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
          </form>

        </div>
      </div>
    <?php endwhile; ?>

    <div class="text-right">
      <h4>Total: ₹<?= $total ?></h4>
        <form method="POST" action="checkout_process.php">
          <div class="form-group">
            <label for="address">Delivery Address</label>
            <textarea name="address" id="address" class="form-control" required placeholder="Enter your full address"></textarea>
          </div>
          <button type="submit" class="btn btn-pink">Place Order (Cash on Delivery)</button>
        </form>
    </div>
  </div>

</body>

</html>