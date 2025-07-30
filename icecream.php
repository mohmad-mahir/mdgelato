<!DOCTYPE html>
<html>

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>Icecream</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="images/logo3.webp" type="image/gif" />
   <!-- font css -->
   <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
</head>

<body>
   <div class="header_section header_bg">
      <div class="container"  style="height: 80px;">
            <?php $cart_count = 0;
            session_start();
            include 'db.php';

            if (isset($_SESSION['user_id'])) {
               $uid = $_SESSION['user_id'];
               $stmt = $conn->prepare("SELECT SUM(quantity) AS total FROM cart WHERE user_id = ?");
               $stmt->bind_param("i", $uid);
               $stmt->execute();
               $res = $stmt->get_result()->fetch_assoc();
               $cart_count = $res['total'] ?? 0;
            }
            ?>
         <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
            <a class="navbar-brand" href="index.html">
               <img src="images/logo3.webp" style="width: 100px; height:30px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                     <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="index.php#about">About</a>
                  </li>
                   <li class="nav-item">
                        <a class="nav-link" href="index.php#services">Services</a>
                     </li>
                  <li class="nav-item">
                     <a class="nav-link" href="icecream.php">Icecreams</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="cart.php">
                        Cart
                        <span class="badge badge-pill badge-danger"><?= $cart_count ?></span>
                     </a>
                  </li>
                   <?php if (isset($_SESSION['user_name'])): ?>
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                           Welcome, <?= htmlspecialchars($_SESSION['user_name']) ?>
                        </a>
                        <div class="dropdown-menu">
                           <a class="dropdown-item" href="my_orders.php">My Orders</a>
                           <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                     </li>
                  <?php else: ?>
                     <li class="nav-item">
                        <a class="nav-link" href="login.html">Login</a>
                     </li>
                  <?php endif; ?>
                  <li class="nav-item">
                     <a class="nav-link" href="index.php#contact">Contact Us</a>
                  </li>
               </ul>

            </div>
         </nav>
      </div>
   </div>
   <!-- header section end -->
   <!-- cream sectuion start -->
   <?php
   include 'db.php'; // connection to DB
   $sql = "SELECT * FROM products order by price desc";
   $result = $conn->query($sql);
   ?>

   <div class="cream_section layout_padding">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <h1 class="cream_taital">Our Featured Ice Cream</h1>
               <p class="cream_text">“Life's short-eat the ice cream. We'll handle the rest.”</p>
            </div>
         </div>
         <div class="cream_section_2">
            <div class="row">
               <?php while ($row = $result->fetch_assoc()): ?>
                  <div class="col-md-4">
                     <div class="cream_box">
                        <div class="cream_img"><img src="<?php echo $row['image']; ?>"></div>
                        <div class="price_text">₹<?php echo $row['price']; ?></div>
                        <h6 class="strawberry_text"><?php echo htmlspecialchars($row['name']); ?></h6>
                        <div class="cart_bt">
                           <form method="POST" action="add_to_cart.php">
                              <input type="hidden" name="product_id" value="<?= $row['id'] ?>">
                              <button type="submit" class="btn btn-outline-danger">Add To Cart</button>
                           </form>
                        </div>
                     </div>
                  </div>
               <?php endwhile; ?>
            </div>
         </div>
      </div>
   </div>
   <!-- cream sectuion end -->
   <!-- copyright section start -->
   <!-- copyright section end -->
   <!-- Javascript files-->
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
   <script src="js/plugin.js"></script>
   <!-- sidebar -->
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script>
   <!-- javascript -->
</body>

</html>