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
   <title>Md Gelato</title>
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
   <div class="header_section">
      <div class="container" style="height: 80px;">
         <?php session_start();
         $cart_count = 0;
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
         <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="index.php">
               <img src="images/logo3.webp" style="width: 100px; height:30px;">
            </a>
   
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
               aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
   
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                     <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#about">About</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#services">Services</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#icecream">Icecreams</a>
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
                     <a class="nav-link" href="#contact">Contact Us</a>
                  </li>
               </ul>
            </div>
         </nav>
      </div>
      <!-- banner section start -->
      <div class="banner_section layout_padding">
         <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
               <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">01</li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1">02</li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2">03</li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="3">04</li>
               </ol>
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="row">
                        <div class="col-sm-6">
                           <h1 class="banner_taital">Strawberry Ice Cream</h1>
                           <p class="banner_text">Delight in our rich and creamy strawberry ice cream, crafted with real strawberry chunks and served with fresh fruit on a silky sauce—pure indulgence in every scoop!</p>
                        </div>
                        <div class="col-sm-6">
                           <div class="banner_img"><img src="images/banner-img.webp"></div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-6">
                           <h1 class="banner_taital">Tropical Ice Cream</h1>
                           <p class="banner_text">Tropical mango-pineapple ice cream scoops with juicy fruit bits, crowned with fresh mango slices & pineapple chunks. A refreshing treat bursting with sunny flavors.</p>
                        </div>
                        <div class="col-sm-6">
                           <div class="banner_img"><img src="images/banner-img2.webp"></div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-6">
                           <h1 class="banner_taital">Chikoo Ice Cream</h1>
                           <p class="banner_text">Rich and creamy Chikoo (Sapodilla) ice cream scoops, infused with real fruit bits, served with fresh chikoo slices. A nostalgic tropical delight full of natural sweetness and smooth texture.</p>
                        </div>
                        <div class="col-sm-6">
                           <div class="banner_img"><img src="images/banner-img3.webp"></div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-6">
                           <h1 class="banner_taital">Fig Ice Cream</h1>
                           <p class="banner_text">Rich fig ice cream scoops loaded with fruity chunks and nuts, topped with fresh fig slices and a tangy red drizzle. A luxurious burst of nature's finest flavors.</p>
                        </div>
                        <div class="col-sm-6">
                           <div class="banner_img"><img src="images/banner-img4.webp"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- banner section end -->
   </div>
   <!-- header section end -->
   <!-- about sectuion start -->
   <div class="about_section layout_padding" id="about">
      <div class="container">
         <div class="row">
            <div class="col-md-6">
               <div class="about_img"><img src="images/about-img.png"></div>
            </div>
            <div class="col-md-6">
               <h1 class="about_taital">About MD Gelato</h1>
               <p class="about_text">Welcome to MD Gelato, your destination for handcrafted ice cream made with love, creativity, and the finest ingredients. At MD Gelato, we believe ice cream isn't just a treat—it's an experience. Every scoop we serve is rich in flavor, smooth in texture, and crafted to bring a smile to your face.
                  From classic favorites to bold new creations, our menu is filled with indulgent choices including creamy gelatos, refreshing sorbets, thick shakes, and crunchy cones. Whether you're looking to cool off on a sunny day or celebrate a special moment, MD Gelato is the perfect stop for sweet happiness.
                  Come taste the magic—we're scooping joy daily!</p>
               <div class="read_bt_1"></div>
            </div>
         </div>
      </div>
   </div>
   <!-- about sectuion end -->
   <!-- cream sectuion start -->
   <?php
   include 'db.php'; // connection to DB
   $sql = "SELECT * FROM products limit 6";
   $result = $conn->query($sql);
   ?>

   <div class="cream_section layout_padding" id="icecream">
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
      <div class="seemore_bt"><a href="icecream.php">See More</a></div>
   </div>

   <!-- cream sectuion end -->
   <!-- services section start -->
   <div class="services_section layout_padding" id="services">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <h1 class="services_taital">Our Ice Cream Services</h1>
               <p class="services_text">“Delicious, delightful, and delivered — explore our cool offerings.”</p>
            </div>
         </div>
         <div class="services_section_2">
            <div class="row">
               <div class="col-md-4">
                  <div class="services_box">
                     <h5 class="tasty_text"><span class="icon_img"><img src="images/icon-1.png"></span>Order Online</h5>
                     <p class="lorem_text">Order your favorite treats fast! Choose from our <a href="icecream.php">Menu</a> and enjoy delicious ice cream & more..</p>
                     <p class="lorem_text"> We are delivering on <a href="http://zomato.com">Zomato</a> & <a href="http://swiggy.com">Swiggy</a></p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="services_box">
                     <h5 class="tasty_text"><span class="icon_img"><img src="images/icon-2.png"></span>Shop Hours</h5>
                     <p class="lorem_text">We're here when you need a scoop of happiness!</p>
                     <p class="lorem_text">Monday-Sunday: 11:00 AM To 11:00 PM </p>
                     <p class="lorem_text">Extended hours on Holidays & Festivals.</p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="services_box">
                     <h5 class="tasty_text"><span class="icon_img"><img src="images/icon-1.png"></span>Catering</h5>
                     <p class="lorem_text">Hosting a party or event? We'll bring the ice cream fun to you! From live scooping to mobile carts—we make every occasion extra sweet. </p>
                  </div>
               </div>
            </div>
         </div>
         <div class="seemore_bt"></div>
      </div>
   </div>
   <!-- services section end -->
   <!-- testimonial section start -->

   <!-- testimonial section end -->
   <!-- contact section start -->
   <div class="contact_section layout_padding" id="contact">
      <div class="container">
         <div class="row">
            <div class="col-md-4">
               <div class="contact_main">
                  <h1 class="contact_taital">Contact Us</h1>
                  <form action="contact.php" method="post">
                     <div class="form-group">
                        <input type="text" class="email-bt" placeholder="Name" name="name" required>
                     </div>
                     <div class="form-group">
                        <input type="text" class="email-bt" placeholder="Email" name="email" required>
                     </div>
                     <div class="form-group">
                        <input type="text" class="email-bt" placeholder="Phone Number" name="phone_number" required>
                     </div>
                     <div class="form-group">
                        <textarea class="massage-bt" placeholder="Message" rows="5" id="comment" name="message" required></textarea>
                     </div>
                     <button type="submit" class="btn btn-pink w-100">SEND</button>
                  </form>

               </div>
            </div>
            <div class="col-md-8">
               <div class="location_text">
                  <ul>
                     <li>
                        <a href="#">
                           <span class="padding_left_10 active"><i class="fa fa-map-marker" aria-hidden="true"></i></span>Shop no:9, Crystal mall, Khodiyar Colony, Jamnagar, Gujarat 361006</a>
                     </li>
                     <li>
                        <a href="#">
                           <span class="padding_left_10"><i class="fa fa-phone" aria-hidden="true"></i></span>Call : +91 12345 67890
                        </a>
                     </li>
                     <li>
                        <a href="#">
                           <span class="padding_left_10"><i class="fa fa-envelope" aria-hidden="true"></i></span>Email : Mdlgelato@gmail.com
                        </a>
                     </li>
                  </ul>
               </div>
               <div class="container text-center">
                  <p>Locate our shop here</p>
                  <div class="map-container" style="max-width:600px; margin: 0 auto;">
                     <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3686.869022714028!2d70.04639867435003!3d22.471555736667955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39571552a19f15a1%3A0x78b4d5c144397196!2sCrystal%20Mall!5e0!3m2!1sen!2sin!4v1751558743551!5m2!1sen!2sin"
                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                     </iframe>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- contact section end -->
   <!-- copyright section start -->
   <div class="copyright_section">
      <div class="container">
         <p class="copyright_text">Copyright © 2025 All Rights Reserved by <a href="index.php">Mdgelato</a> Developed by: Mahir & Daksh</p>
      </div>
   </div>
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