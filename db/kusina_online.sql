-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2019 at 07:21 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kusina online`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `customer_id` int(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_initial` varchar(2) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `middle_initial`, `phone_number`, `province`, `street`, `barangay`, `city`) VALUES
(1010, 'Haziel ', 'Abogaa', 'G.', '009057935758', 'Misamis Occidental', 'P-1', 'Tuburan', 'Aloran'),
(1020, 'Erick', 'Salceda', 'o.', '09363399630', 'Misamis Occidental', 'P-6', 'Upper Loboc', 'Oroquieta City'),
(1030, 'Kenna Lou', 'Eseos', 'A.', '09503389447', 'Misamis Occidental', 'P-2', 'Lumbayao', 'Aloran'),
(1040, 'Mae Joy', 'Mocay', 'A.', '09124567891', 'Misamis Occidental', 'P-3', 'Palayan', 'Aloran');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `order_id` int(50) NOT NULL,
  `customer_id` int(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`order_id`, `customer_id`, `timestamp`) VALUES
(2211, 1020, '2018-02-21 23:24:00'),
(2213, 1010, '1998-03-11 18:11:00'),
(2215, 1040, '2019-04-02 08:01:00'),
(2217, 1030, '2019-04-11 09:02:00');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'Admin', 'e3afed0047b08059d0fada10f400c1e5');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(10) NOT NULL,
  `menu_id` varchar(50) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(100) NOT NULL,
  `unit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `price`, `description`, `unit`) VALUES
('2010', 'Chicken Letchon', '150.00', 'Masarap kahit walang sauce', 'kls'),
('2011', 'Pancit', '100.00', 'yumyum', 'grm'),
('2012', 'Fried Chicken', '200.00', 'Crispylicious', 'kls'),
('2013', 'Homba', '150.00', 'Lami siya lami', 'kls');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `hidden_id` int(11) NOT NULL,
  `order_id` int(50) NOT NULL,
  `menu_id` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`hidden_id`, `order_id`, `menu_id`, `price`, `quantity`) VALUES
(10, 2217, '2011', '130.00', '2'),
(11, 2213, '2010', '190.00', '3'),
(12, 2211, '2010', '100.00', '1'),
(13, 2215, '2013', '50.00', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_order_ibfk_1` (`customer_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`hidden_id`),
  ADD KEY `order_item_ibfk_2` (`order_id`),
  ADD KEY `order_item_ibfk_3` (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `hidden_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD CONSTRAINT `customer_order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `customer_order` (`order_id`),
  ADD CONSTRAINT `order_item_ibfk_3` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
