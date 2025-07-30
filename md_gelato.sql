-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2025 at 05:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `md_gelato`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `name`, `email`, `phone_number`, `message`, `created_at`) VALUES
(1, 'mahir', 'mahirbca@gmail.com', '74586848', 'hetjrynjryh', '2025-06-30 16:06:07'),
(4, 'mahir', 'mahirbca@gmail.com', '74586848', 'yrehethj', '2025-06-30 16:26:54');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address` text NOT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('Pending','Ready','Completed','Cancelled') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address`, `total_amount`, `created_at`, `status`) VALUES
(1, 1, '', 500.00, '2025-07-02 13:55:26', 'Completed'),
(3, 16, '', 520.00, '2025-07-02 15:53:50', 'Pending'),
(4, 16, '', 250.00, '2025-07-02 16:00:29', 'Pending'),
(5, 16, '', 290.00, '2025-07-03 15:05:14', 'Pending'),
(6, 22, '', 250.00, '2025-07-03 15:55:39', 'Pending'),
(7, 22, '', 250.00, '2025-07-03 15:57:27', 'Pending'),
(8, 16, '', 250.00, '2025-07-07 15:42:04', 'Pending'),
(9, 3, '', 130.00, '2025-07-09 15:51:16', 'Pending'),
(10, 4, '', 830.00, '2025-07-09 16:09:19', 'Pending'),
(11, 5, '', 290.00, '2025-07-10 01:35:07', 'Pending'),
(12, 4, '', 200.00, '2025-07-14 06:47:27', 'Completed'),
(13, 6, '', 200.00, '2025-07-17 18:22:24', 'Pending'),
(14, 2, '', 350.00, '2025-07-18 13:48:19', 'Completed'),
(15, 2, '', 170.00, '2025-07-18 14:13:18', 'Pending'),
(16, 2, '', 2500.00, '2025-07-18 14:35:32', 'Cancelled'),
(17, 2, '', 200.00, '2025-07-18 15:28:59', 'Pending'),
(18, 2, '', 120.00, '2025-07-18 15:35:36', 'Pending'),
(19, 2, '', 0.00, '2025-07-18 15:36:32', 'Pending'),
(20, 2, '', 0.00, '2025-07-18 15:37:25', 'Pending'),
(21, 2, 'shankar tekri jamnagar', 250.00, '2025-07-18 15:38:12', 'Pending'),
(22, 2, 'shankar tekri jamnagar', 0.00, '2025-07-18 15:44:32', 'Pending'),
(23, 2, 'shankar tekri jamnagar', 0.00, '2025-07-18 15:45:25', 'Pending'),
(24, 2, 'rajkot', 150.00, '2025-07-18 15:45:39', 'Pending'),
(25, 2, 'rajkot', 0.00, '2025-07-18 15:46:39', 'Pending'),
(26, 2, 'dkv collage jamnagar', 660.00, '2025-07-18 15:48:11', 'Ready'),
(27, 2, 'HJ Doshi clg Jamnagar', 210.00, '2025-07-18 15:59:20', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 2, 2, 250.00),
(2, 3, 1, 1, 290.00),
(3, 3, 5, 1, 130.00),
(4, 3, 11, 1, 100.00),
(5, 4, 2, 1, 250.00),
(6, 5, 1, 1, 290.00),
(7, 6, 2, 1, 250.00),
(8, 7, 2, 1, 250.00),
(9, 8, 2, 1, 250.00),
(10, 9, 5, 1, 130.00),
(11, 10, 1, 2, 290.00),
(12, 10, 2, 1, 250.00),
(13, 11, 1, 1, 290.00),
(14, 12, 4, 1, 200.00),
(15, 13, 4, 1, 200.00),
(16, 14, 1, 1, 350.00),
(17, 15, 5, 1, 170.00),
(18, 16, 2, 10, 250.00),
(19, 17, 4, 1, 200.00),
(20, 18, 16, 1, 120.00),
(21, 21, 3, 1, 250.00),
(22, 24, 12, 1, 150.00),
(23, 26, 6, 2, 200.00),
(24, 26, 19, 2, 130.00),
(25, 27, 7, 3, 70.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(1, 'Mix Ice Cream Platter', 350.00, 'images/img1(3).webp'),
(2, 'Belgian Chocolate Sundae', 250.00, 'images/img2(2).webp'),
(3, 'Nutty Sundae', 250.00, 'images/img3.webp'),
(4, 'Brownie Sundae', 200.00, 'images/img4(2).webp'),
(5, 'Oreo Sundae', 170.00, 'images/img5(1).webp'),
(6, 'Strawberry Sundae', 200.00, 'images/img6(1).webp'),
(7, 'Strawberry Ice Cream', 70.00, 'images/img7(2).webp'),
(8, 'Chocolate Ice Cream', 70.00, 'images/img8.webp'),
(9, 'Coffee Ice Cream', 110.00, 'images/img9(2).webp'),
(10, 'Mint Ice Cream', 90.00, 'images/img10(1).webp'),
(12, 'Mango Sundae', 150.00, 'images/img12.webp'),
(13, 'Caramel Thick Shake', 120.00, 'images/img13.webp'),
(14, 'Vanilla Thick Shake', 100.00, 'images/img14.webp'),
(15, 'Orange Ice Cream', 80.00, 'images/img15.webp'),
(16, 'Double Scoop Cone', 120.00, 'images/img16.webp'),
(18, 'Chocolate Cone', 100.00, 'images/img18.webp'),
(19, 'Blueberry Cone', 130.00, 'images/img19.webp'),
(20, 'Choco Chip Cone', 130.00, 'images/img20.webp'),
(21, 'Pineapple Ice Cream', 90.00, 'images/1752071670_pineapple.webp'),
(22, 'Blueberry Ice cream', 90.00, 'images/1752072730_blueberry.webp'),
(23, 'Pistachio', 90.00, 'images/1752072779_pistacho.webp'),
(24, 'Strawberry Cone', 100.00, 'images/1752072913_cherry_cone.webp'),
(25, 'Vanilla Cone ', 90.00, 'images/1752072952_vanila_cone.webp'),
(26, 'Pistachio Cone', 130.00, 'images/1752073030_pistachio_cone.webp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_isact` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `phone`, `email`, `password`, `created_at`, `user_isact`) VALUES
(1, 'mahir', '8511188515', 'mahirbca@gmail.com', 'mahir1234', '2025-07-02 15:53:08', 1),
(2, 'abc', '8511188516', 'abc@gmail.com', 'abc1234', '2025-07-03 15:54:39', 1),
(3, 'Mahir Sumra', '8173839263', 'mahir@gmail.com', 'mahir5393', '2025-07-09 15:50:51', 1),
(4, 'Daksh', '9016721414', 'dakshrajput10@gmail.com', '1012', '2025-07-09 16:08:52', 1),
(5, 'Shivaji Rayapati', '+918008559757', 'shivajirayapati03@gmail.com', 'Shivaji123?@', '2025-07-10 01:34:39', 1),
(6, 'Zoro', '9361615379', 'zoro94081@gmail.com', '12345', '2025-07-17 18:21:52', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
