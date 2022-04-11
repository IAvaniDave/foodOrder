-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2022 at 08:09 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodorder`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_id` int(11) NOT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL COMMENT 'in gms',
  `type` int(11) DEFAULT NULL COMMENT '1=veg, 2=non-veg',
  `popular` int(11) DEFAULT NULL COMMENT '1=yes, 2=no',
  `delivery_time` int(11) DEFAULT NULL COMMENT 'in minutes',
  `restaurant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `image`, `quantity`, `type`, `popular`, `delivery_time`, `restaurant_id`) VALUES
(1, 'Rajwadi Undhiyu', 50, NULL, 500, 1, 1, 20, 1),
(2, 'Paneer Handi', 120, NULL, 500, 1, 1, 20, 1),
(3, 'Aloo matar', 50, NULL, 0, 1, 1, 20, 2),
(4, 'Bhajipav', 100, NULL, 500, 1, 1, 20, 3),
(5, 'Jain Bhaji with pav', 150, NULL, 500, 1, 1, 20, 3),
(6, 'Cheese chilli', 100, NULL, 500, 1, 1, 20, 2),
(7, 'Panjabi Thali', 170, NULL, 500, 1, 1, 20, 1),
(8, 'Vegetable cheese sandwich', 80, NULL, 0, 1, 1, 20, 2),
(9, 'Mexican sandwich', 120, NULL, 0, 1, 1, 20, 2),
(10, 'Vegetable pulav', 150, NULL, 500, 1, 1, 20, 3),
(11, 'Mahalaxmi special Bhaji', 130, NULL, 500, 1, 1, 20, 3),
(12, 'Dal Bati', 80, NULL, 500, 1, 1, 20, 4),
(13, 'Dal Bati with churma with chhas', 125, NULL, 500, 1, 1, 20, 4),
(14, 'Dal tadka with bati', 130, NULL, 500, 1, 1, 20, 4),
(15, 'Howzzat Biryani Combo', 130, NULL, 500, 1, 1, 20, 5),
(16, 'Super 4s Bucket Meal', 190, NULL, 500, 1, 1, 20, 5),
(17, '10 strips & 2 Dips Bucket', 199, NULL, 500, 1, 1, 20, 5),
(18, 'Regular chicken shawarama', 199, NULL, 500, 1, 1, 20, 6),
(19, 'Cheese chicken shawarama', 210, NULL, 500, 1, 1, 20, 6),
(20, 'Paneer Masala Toast Sandwich', 120, NULL, 500, 1, 1, 20, 7),
(21, 'Over The Top Cheese Burger', 110, NULL, 500, 1, 1, 20, 7),
(22, 'Cheese Loaded Fries', 80, NULL, 500, 1, 1, 20, 7),
(23, 'NEWtella Cheesecake Jar', 200, NULL, 500, 1, 1, 20, 8),
(24, 'Belgian Triple Chocolate Mousse Cake Jar', 230, NULL, 500, 1, 1, 20, 8),
(25, 'Dark Chocolate Walnut Brownie', 280, NULL, 500, 1, 1, 20, 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `total` double NOT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=pending,1=accepted,2=completed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` bigint(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `rating_count` int(11) DEFAULT NULL,
  `start_time` time(6) DEFAULT NULL,
  `end_time` time(6) DEFAULT NULL,
  `tax` double DEFAULT NULL,
  `delivery_fees` double DEFAULT NULL,
  `delivery_time` int(11) DEFAULT NULL COMMENT 'in minutes',
  `minimum_order` int(11) DEFAULT NULL,
  `offer_percentage` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `city`, `rating`, `rating_count`, `start_time`, `end_time`, `tax`, `delivery_fees`, `delivery_time`, `minimum_order`, `offer_percentage`, `photo`) VALUES
(1, 'Foody Buddy', 'Ahmedabad', 3, 10, '10:00:00.000000', '20:00:00.000000', 10, 100, 35, 150, 10, 'item-1.webp'),
(2, 'Shakti - The Sandwich Shop', 'Ahmedabad', 4, 100, '10:00:00.000000', '20:00:00.000000', 10, 100, 40, 200, 20, 'item-2.webp'),
(3, 'Mahalaxmi Pav Bhaji', 'Ahmedabad', 4, 200, '10:00:00.000000', '20:00:00.000000', 5, 200, 15, 250, 30, 'item-3.webp'),
(4, 'Jain Dal Bati', 'Ahmedabad', 4, NULL, '10:00:00.000000', '20:00:00.000000', 5, 10, 20, 210, 25, 'item-4.webp'),
(5, 'KFC', 'Vadodara', 4, NULL, '10:00:00.000000', '20:00:00.000000', 3, 10, 25, 220, 30, 'item-5.webp'),
(6, 'Fire on Wheels', 'Vadodara', 4, NULL, '10:00:00.000000', '20:00:00.000000', 3, 10, 15, 230, 20, 'item-6.webp'),
(7, 'I love sandwiches', 'Surat', 4, NULL, '10:00:00.000000', '20:00:00.000000', 3, 10, 15, 180, 25, 'item-7.webp'),
(8, 'SUgarless Life', 'Surat', 4, NULL, '10:00:00.000000', '20:00:00.000000', 3, 10, 25, 160, 30, 'item-8.webp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contact` int(14) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `contact`, `email`, `password`, `city`) VALUES
(1, 'Avaniiii', 0, 'avani@yopmail.com', '123456789', 'Ahmedabad'),
(2, 'Avani Dave Me', 2147483647, 'avani1@yopmail.com', '12345678', 'Ahmedabad'),
(3, 'Avani Dave', 2147483647, 'avani12@yopmail.com', '123', 'Ahmedabad'),
(4, 'Avani Dave', 2147483647, 'avani123@yopmail.com', '123456', 'Ahmedabad'),
(5, 'Avani Dave', 2147483647, 'avani15@yopmail.com', '123456', 'Ahmedabad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
