-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2019 at 07:19 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zomato`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `user_id`, `address_text`) VALUES
(8, 3, 'ADAMAS UNIVERSITY KOL- 81'),
(10, 4, 'BIRATI ,WEST BENGAL,INDIA, KOL-81'),
(11, 3, 'SALT LAKE , NEAR RDB'),
(12, 6, 'DUM DUM');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_price` int(11) NOT NULL,
  `menu_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `r_id`, `menu_name`, `menu_price`, `menu_type`) VALUES
(1, 1, 'CHICKEN BURGER', 150, 1),
(2, 1, 'VEG BIRIYANI', 300, 0),
(3, 2, 'BLACK COFFEE', 150, 0),
(4, 2, 'EXTRA LARGE BLACK TEA', 350, 0),
(5, 3, 'VEG PIZZA', 200, 0),
(6, 3, 'CHICKEN MUSHROOM PIZZA', 500, 1),
(7, 4, 'VEG PIZZA', 200, 0),
(8, 4, 'CHICKEN CHEESE PIZZA', 300, 1),
(9, 5, 'CHICKEN DEVIL', 200, 1),
(10, 5, 'ZINGER BOX (COMBO)', 300, 1),
(11, 6, 'VEG CHEESE PIZZA', 150, 0),
(12, 6, 'VEG PAN FRIED PIZZA', 200, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `price_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `r_id`, `price_value`) VALUES
(1, 3, 1, 150),
(2, 3, 1, 300),
(3, 3, 2, 150),
(4, 3, 1, 150),
(5, 3, 2, 300),
(7, 3, 1, 600),
(10, 4, 1, 150),
(11, 4, 1, 300),
(12, 4, 3, 500),
(13, 4, 2, 150),
(14, 4, 1, 150),
(15, 4, 1, 450),
(16, 6, 6, 150),
(17, 3, 6, 150),
(18, 3, 5, 200);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `r_id` int(11) NOT NULL,
  `r_name` varchar(255) NOT NULL,
  `r_bg` varchar(255) NOT NULL,
  `r_address` text NOT NULL,
  `r_rating` float NOT NULL,
  `r_menu` text NOT NULL,
  `r_cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`r_id`, `r_name`, `r_bg`, `r_address`, `r_rating`, `r_menu`, `r_cost`) VALUES
(1, 'BARBEQUE NATION LIMITED', 'bbq.png', 'SECTOR 5 , NEAR RDB kol-1', 4.7, 'INDIAN,ITALIAN', 500),
(2, 'CCD', 'img1.png', 'BIRATI INDIA KOL - 81', 3.5, 'COFFEE,PASTRY', 400),
(3, 'SUBWAY', 'img2.png', 'BARASAT , NEAR CHAMPADALI , kol -01', 2.7, 'BURGER , PIZZA', 150),
(4, 'DOMINOS', 'dm.png', 'CC2 , NEWTOWN', 3.7, 'PIZZA ALL TYPES ', 200),
(5, 'KFC', 'kfc.jpg', 'DIAMOND PLAZA, JESSORE ROAD,NEAR DUM-DUM PARK', 4.2, 'CHICKEN ITEMS', 300),
(6, 'PIZZA HUT', 'pz.png', 'DUM DUM, NEAR NAGER BAZAR', 3.6, 'PIZZA', 200);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `rev_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `rev_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`rev_id`, `user_id`, `r_id`, `rev_text`) VALUES
(1, 3, 1, 'GREAT'),
(7, 4, 1, 'GOOD FOOD MUST TRY... :)'),
(8, 4, 3, 'VERY GOOD..'),
(9, 4, 2, 'great..'),
(10, 4, 2, 'great..'),
(13, 4, 1, 'good food'),
(14, 3, 1, 'LOVED IT :)'),
(15, 6, 2, 'GOOD1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passsword` varchar(255) NOT NULL,
  `dp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `passsword`, `dp`) VALUES
(3, 'Debabrata Paul', 'dpaul9806@gmail.com', '1234', '10446554_1419541715024620_5613360861932617128_n(5).jpg'),
(4, 'debz', 'dpaul9909@gmail.com', '1234', '10446554_1419541715024620_5613360861932617128_n(5).jpg'),
(5, 'Varun', 'd@webgmail.info', '1234', '10446554_1419541715024620_5613360861932617128_n(5).jpg'),
(6, 'Varun', 'vivek@gmail.com', '1234', '10446554_1419541715024620_5613360861932617128_n(5).jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`rev_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `rev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
