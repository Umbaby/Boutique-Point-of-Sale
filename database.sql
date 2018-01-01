-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2017 at 03:38 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `product_number` int(11) NOT NULL,
  `product_name` varchar(80) NOT NULL,
  `price` double NOT NULL,
  `description` varchar(80) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_number` int(255) NOT NULL,
  `category_name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_number`, `category_name`) VALUES
(1, 'bags'),
(2, 'dress'),
(3, 'shoes'),
(4, 'wallet'),
(5, 'tshirt'),
(6, 'jeans'),
(7, 'socks'),
(8, 'slippers');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_number` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `product_name` varchar(80) DEFAULT NULL,
  `description` varchar(80) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `last_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_number`, `category`, `product_name`, `description`, `stock`, `price`, `last_added`) VALUES
(2, 2, 'Natasha', 'Sleeveless', 16, 900, '2017-12-19 05:52:56'),
(9, 3, 'Nike', 'Large', 16, 1350, '2017-12-19 05:56:01'),
(10, 1, 'Highland', 'Medium', 22, 1200, '2017-12-18 10:53:31'),
(11, 1, 'Jansport', 'Red, Blue, Green', 17, 1500, '2017-12-19 06:01:49'),
(12, 5, 'jag tshirt', 'red, blue', 18, 500, '2017-12-18 12:34:55'),
(13, 6, 'jag jeans', 'small, large', 11, 660, '2017-12-19 06:01:49'),
(14, 5, 'hammerhead tshirt ', 'small, large', 13, 750, '2017-12-18 12:31:38'),
(15, 4, 'bench wallet', 'brown', 14, 320, '2017-12-18 12:31:38'),
(17, 4, 'louis vuitton', 'folding wallet', 24, 2000, '2017-12-18 10:58:39'),
(18, 8, 'Havaianas', 'plain text color pink', 19, 1050, '2017-12-18 10:46:06'),
(19, 8, 'Manjaru', 'class A', 19, 850, '2017-12-18 10:46:49'),
(20, 8, 'Ipanema', 'printed cartoon characters', 0, 800, '2017-12-19 05:57:22'),
(21, 1, 'Secosana', 'sling bag', 19, 1270, '2017-12-18 10:48:41'),
(22, 1, 'Maiyet', 'hand bag', 19, 2300, '2017-12-18 10:52:18'),
(23, 7, 'darling', 'white', 20, 100, '2017-12-18 13:29:19'),
(24, 1, 'Chanel', 'Handbag', 10, 3000, '2017-12-19 06:14:26');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `customer` varchar(80) NOT NULL,
  `products` varchar(255) NOT NULL,
  `items` varchar(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `total_amount` double NOT NULL,
  `account` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `timestamp`, `customer`, `products`, `items`, `price`, `total_amount`, `account`) VALUES
(15, '2017-12-10 14:28:29', 'Pelep', 'bench wallet', '5', '1600', 1600, 'cheche'),
(16, '2017-12-10 14:27:59', 'Krestyan', 'louis vuitton', '3', '30000', 30000, 'admin'),
(17, '2017-12-10 13:46:10', '', 'Jansport', '1', '1500', 1500, 'admin'),
(18, '2017-12-17 16:28:57', 'Ritsard', 'jag tshirt<br>jag jeans', '1<br>2', '500<br>1320', 1820, 'admin'),
(20, '2017-12-17 16:29:09', '', 'Natasha<br>hammerhead tshirt ', '1<br>1', '900<br>750', 1650, 'admin'),
(21, '2017-12-17 16:29:20', 'Maykil', 'Nike<br>bench wallet', '2<br>2', '2700<br>640', 3340, 'admin'),
(22, '2017-12-10 19:54:58', 'Budz', 'bench wallet', '1', '320', 320, 'admin'),
(23, '2017-12-11 07:05:24', '', 'Nike', '1', '1350', 1350, 'admin'),
(24, '2017-12-11 07:43:36', 'Honey', 'hammerhead tshirt ', '1', '750', 750, 'admin'),
(25, '2017-12-11 07:49:31', 'Rey', 'hammerhead tshirt ', '1', '750', 750, 'admin'),
(26, '2017-12-11 07:51:50', 'Kaye', 'jag jeans', '1', '660', 660, 'admin'),
(27, '2017-12-11 07:56:23', 'George', 'jag tshirt', '1', '500', 500, 'admin'),
(28, '2017-12-11 07:58:58', 'John', 'Highland', '1', '1200', 1200, 'admin'),
(29, '2017-12-11 08:03:07', 'Nikko', 'Jansport', '1', '1500', 1500, 'admin'),
(30, '2017-12-11 08:04:18', 'Lennie', 'hammerhead tshirt ', '1', '750', 750, 'admin'),
(31, '2017-12-11 10:41:36', 'Gina', 'hammerhead tshirt ', '1', '750', 750, 'admin'),
(32, '2017-12-11 10:43:44', 'Peter', 'hammerhead tshirt ', '1', '750', 750, 'admin'),
(33, '2017-12-11 10:46:23', 'eva', 'hammerhead tshirt ', '1', '750', 750, 'admin'),
(34, '2017-12-11 10:52:56', 'Thomas', 'hammerhead tshirt ', '1', '750', 750, 'admin'),
(35, '2017-12-11 10:57:34', 'Owen', 'hammerhead tshirt ', '1', '750', 750, 'admin'),
(36, '2017-12-11 10:59:26', 'Gemma', 'hammerhead tshirt ', '1', '750', 750, 'admin'),
(37, '2017-12-11 11:01:56', 'Paula', 'hammerhead tshirt ', '1', '750', 750, 'admin'),
(38, '2017-12-11 11:03:29', 'Mikaela', 'hammerhead tshirt ', '1', '750', 750, 'admin'),
(39, '2017-12-11 11:07:40', 'Inna', 'hammerhead tshirt ', '1', '750', 750, 'admin'),
(40, '2017-12-11 11:09:22', 'Jean', 'hammerhead tshirt ', '1', '750', 750, 'admin'),
(41, '2017-12-11 11:10:49', 'Eula', 'hammerhead tshirt ', '1', '750', 750, 'admin'),
(42, '2017-12-11 11:15:37', 'David', 'hammerhead tshirt ', '1', '750', 750, 'admin'),
(43, '2017-12-11 11:17:58', 'Linda', 'hammerhead tshirt ', '1', '750', 750, 'admin'),
(44, '2017-12-17 16:29:44', 'Harry', 'jag tshirt<br>jag jeans', '1<br>1', '500<br>660', 1160, 'admin'),
(45, '2017-12-17 15:23:14', 'Jems', 'bench wallet', '1', '320', 320, 'admin'),
(46, '2017-12-18 09:17:11', 'cherry', 'Highland', '2', '2400', 2400, 'admin'),
(47, '2017-12-18 10:46:06', 'Popoy', 'Havaianas', '1', '1050', 1050, 'admin'),
(48, '2017-12-18 10:46:49', '', 'Manjaru', '1', '850', 850, 'admin'),
(49, '2017-12-18 10:48:41', 'Wayne', 'Secosana', '1', '1270', 1270, 'admin'),
(50, '2017-12-18 10:50:45', 'Karen', 'Ipanema', '1', '800', 800, 'admin'),
(51, '2017-12-18 10:52:18', 'Basha', 'Maiyet', '1', '2300', 2300, 'admin'),
(52, '2017-12-18 10:53:32', 'Louie', 'Highland', '1', '1200', 1200, 'admin'),
(53, '2017-12-18 10:58:39', 'Nena', 'louis vuitton', '1', '2000', 2000, 'admin'),
(54, '2017-12-18 11:02:17', '', 'jag tshirt', '1', '500', 500, 'admin'),
(55, '2017-12-18 11:19:55', 'Kokoy', 'hammerhead tshirt ', '1', '750', 750, 'admin'),
(56, '2017-12-18 12:31:38', 'Airhon Carlo', 'hammerhead tshirt <br>bench wallet', '3<br>2', '2250<br>640', 2890, 'syralynn'),
(57, '2017-12-18 12:34:55', 'Yook Sung Jae', 'jag tshirt<br>jag jeans<br>Ipanema', '3<br>4<br>1', '1500<br>2640<br>8000', 12140, 'syralynn'),
(58, '2017-12-18 13:26:35', '', 'Natasha', '1', '900', 900, 'admin'),
(59, '2017-12-19 05:52:56', 'Leah', 'Natasha', '2', '1800', 1800, 'admin'),
(60, '2017-12-19 05:56:01', 'Nyz', 'Nike', '1', '1350', 1350, 'admin'),
(61, '2017-12-19 05:57:22', 'Cherry', 'Ipanema', '9', '7200', 7200, 'admin'),
(62, '2017-12-19 06:01:49', 'Syra', 'Jansport<br>jag jeans', '1<br>1', '1500<br>660', 2160, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(100) NOT NULL,
  `mobile_number` varchar(100) NOT NULL,
  `gender` enum('Male','Female','Others','') NOT NULL,
  `username` varchar(80) NOT NULL,
  `user_type` enum('admin','staff','','') NOT NULL,
  `password` varchar(80) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `age`, `mobile_number`, `gender`, `username`, `user_type`, `password`, `date_created`) VALUES
(1, 'Jhon Danielle Umbay', 18, '09227810339', 'Male', 'admin', 'admin', 'adminpass', '2017-12-04 07:27:24'),
(3, 'Ysabella Marie Marcojos', 20, '09425649270', 'Female', 'bella', 'staff', 'bellapass', '2017-12-10 08:14:57'),
(4, 'Rachel Peters', 24, '09227810339', 'Female', 'rachel', 'staff', 'rachelpass', '2017-12-10 08:14:58'),
(6, 'Pia Wurtzbach', 27, '090123456876', 'Female', 'piapia', 'staff', 'pia_pass', '2017-12-10 08:14:58'),
(8, 'Cherry Majadas', 21, '09157636189', 'Female', 'cheche', 'staff', 'chechepass', '2017-12-10 08:14:58'),
(9, 'Syra Espena', 19, '09123456789', 'Female', 'syralynn', 'staff', 'syrapass', '2017-12-10 08:14:58'),
(10, 'Jobecar Federe', 18, '09902415425', 'Female', 'jobecar', 'staff', 'jobecarpass', '2017-12-10 08:14:58'),
(11, 'Frietche Canete', 21, '09872536271', 'Female', 'frietche', 'staff', 'frietchepass', '2017-12-10 08:14:58'),
(12, 'James Manny Fuentes', 19, '09339798434', 'Male', 'james', 'staff', 'jamespass', '0000-00-00 00:00:00'),
(13, 'Iris Adlawan', 22, '0924325552', 'Female', 'iris', 'staff', 'irispass', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`product_number`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_number`),
  ADD KEY `category_number` (`category_number`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_number`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `product_number` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_number` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`category_number`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
