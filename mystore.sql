-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2024 at 03:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_username`, `admin_email`, `admin_password`) VALUES
(1, 'lutan', 'lutan254@gmail.com', '$2y$10$YiCj2iJbYu.jB.MGni6DBu7ewCOIsJczKhA0SBf3jVKS2j2mI1y4K');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Adidas'),
(2, 'Nike'),
(3, 'Puma'),
(4, 'Fila'),
(5, 'Vans'),
(6, 'Timberland'),
(7, 'Bata');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'New Arrivals'),
(2, 'Casual Shoes'),
(3, 'Formal Shoes'),
(4, 'Boots'),
(5, 'Sandals');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `userid`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 1, 1330121318, 1, 1, 'pending'),
(2, 1, 1826127081, 1, 1, 'pending'),
(3, 1, 216207410, 2, 1, 'pending'),
(4, 1, 350142084, 2, 1, 'pending'),
(5, 1, 1521596988, 2, 1, 'pending'),
(6, 1, 1929391325, 1, 1, 'pending'),
(7, 1, 67329677, 9, 1, 'pending'),
(8, 1, 235877900, 2, 1, 'pending'),
(9, 1, 116170273, 2, 1, 'pending'),
(10, 1, 1349598879, 2, 1, 'pending'),
(11, 1, 1890771435, 3, 1, 'pending'),
(12, 1, 167006991, 0, 1, 'pending'),
(13, 1, 1527618312, 2, 1, 'pending'),
(14, 1, 935369950, 2, 1, 'pending'),
(15, 1, 962071429, 2, 1, 'pending'),
(16, 1, 859649674, 1, 1, 'pending'),
(17, 2, 450325930, 2, 1, 'pending'),
(18, 1, 44180411, 3, 1, 'pending'),
(19, 1, 78269041, 1, 2, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `Product_keyword` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `Product_keyword`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`) VALUES
(1, 'Nike Air Force 1', 'Nike Air Force 1 Custom Sneakers Blood Drip Splatter Red Black White Shoes Fresh', 'casual wear', 0, 0, 'Nike_air_force_1.jpg', 'Nike_air_force_1.jpg', 'Nike_air_force_1.jpg', '1500'),
(2, 'Nike Air Force (Black)', 'Nike Air Force 1 Black with White logo Sneaker', 'Nike Air Force', 2, 2, 'Nike_air_force_2.jpg', 'Nike_air_force_2.jpg', 'Nike_air_force_2.jpg', '2200'),
(3, 'Marco Paciotti', 'Marco Paciotti Men’s Formal Shoes City Walk LB1192', 'formal shoes', 3, 7, 'formal_shoe1.jpeg', 'formal_shoe1.jpeg', 'formal_shoe1.jpeg', '3000'),
(4, 'Timberland', 'Timberland Men\'s 6-Inch Premium Waterproof Boot', 'boots', 4, 6, 'boots.jpg', 'boots.jpg', 'boots.jpg', '4000'),
(5, 'Timberland {Black}', 'Timberland Men\'s 6-Inch Premium Waterproof Boot', 'boots', 4, 6, 'boots1.jpg', 'boots1.jpg', 'boots1.jpg', '5000'),
(6, 'Cork Sandals', 'African Print Sandals | Yellow', 'sandals', 5, 5, 'sandals1.webp', 'sandals1.webp', 'sandals1.webp', '1500'),
(7, 'Women\'s hiking sandals', 'Women\'s hiking sandals nh100', 'sandals', 5, 4, 'sandals2.avif', 'sandals2.avif', 'sandals2.avif', '1500'),
(8, 'Puma Run XX Nitro', 'Tried and tested: Puma Run XX Nitro', 'athletic', 6, 3, 'athletic2.jpeg', 'athletic2.jpeg', 'athletic2.jpeg', '3000'),
(9, 'NikeCourt Air Zoom', 'NikeCourt Air Zoom NXT Men\'s Hard Court Tennis', 'athletic', 6, 2, 'athletic1.jpeg', 'athletic1.jpeg', 'athletic1.jpeg', '4500');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(1, 1, 2200, 962071429, 1, '2024-04-05 09:47:25', 'Complete'),
(2, 1, 2000, 859649674, 1, '2024-04-03 16:09:51', 'pending'),
(3, 2, 2200, 450325930, 1, '2024-04-03 16:37:32', 'Complete'),
(4, 1, 7200, 44180411, 3, '2024-04-04 10:41:30', 'pending'),
(5, 1, 4000, 78269041, 1, '2024-04-05 09:46:57', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(1, 1, 1330121318, 2000, 'Mpesa', '2024-04-03 14:31:55'),
(2, 3, 450325930, 2200, 'Cash On Delivery', '2024-04-03 16:37:32'),
(3, 1, 962071429, 2200, 'Cash On Delivery', '2024-04-05 09:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(1, 'peter', 'wanjirupeternjihia@gmail.com', '$2y$10$BhtwxKYb/g6vHP.eSaPdV.uDGhCeetuSQhtrb8HNAYc8tGAxg.f3a', '220222_PeakyBlinders_01.webp', '::1', 'kiharu', '0742859775'),
(2, 'victor', 'victorpeter@gmail.com', '$2y$10$Ud.CyPFaFB2QtLtvJSzDIum.QbrlLc8sw6mwvX.mgvuATMB/nXCSC', 'IMG_20240319_174116.jpg', '::1', 'karura', '0732859788');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD CONSTRAINT `user_orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
