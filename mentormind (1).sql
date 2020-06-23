-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2020 at 07:44 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mentormind`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `admin_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`, `admin_name`) VALUES
(1, 'shelgesridhar14@gmail.com', '941585385d447dabb0cbea73e0079dd8', 'sridhar');

-- --------------------------------------------------------

--
-- Table structure for table `bookingdetails`
--

CREATE TABLE `bookingdetails` (
  `d_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `timeslot` varchar(20) DEFAULT NULL,
  `delivery_details` varchar(100) DEFAULT NULL,
  `booking_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookingdetails`
--

INSERT INTO `bookingdetails` (`d_id`, `user_id`, `name`, `contact`, `address`, `date`, `timeslot`, `delivery_details`, `booking_id`) VALUES
(24, 1, 'sridhar', '7013272201', 'asdfghj', '2020-05-07', 'afternoon', 'asdfghjk', '5c15cab85a4feb90eac46e19bc2ae3fb'),
(25, 4, 'hanuman', '7013272201', 'asdfghjkl', '2020-05-23', 'afternoon', 'asdfghjk', '8a2631573ae88eaf3f1c4f3421c14d63'),
(26, 4, 'hanuman', '7013272201', 'asdfghj', '2020-05-08', 'afternoon', 'asdfghj', 'fd5a17e7b71616359d28693fc5324319'),
(27, 1, 'sridhar', '7013272201', 'asdfgh', '2020-05-04', 'afternoon', 'asdfgh', 'bf56a758dadae6834d669e3442a66cf3'),
(28, 1, 'Sridhar shelge', '7013272201', 'Audi gajab', '2020-05-10', 'morning', 'Adnan\r\nAnd', 'a634222f1bcbe537f6f19faf8befa80b'),
(29, 1, 'hanuman', '7013272201', 'asdfghjkl', '2020-05-20', 'afternoon', 'asdfgh', '9216129b0e4c75e4c21789d01e0b862f'),
(30, 1, 'Sridhar shelge', '7013272201', 'Django', '2020-05-11', 'morning', 'Shanghai ', '27cf559cb31e71fbf1487973f6637450'),
(31, 5, 'sai', '234354567', 'fghjh', '2020-06-03', 'morning', 'fvnbmn', '6de3596d8a1ae9ac41b5e09eff01d561');

-- --------------------------------------------------------

--
-- Table structure for table `bookingpage`
--

CREATE TABLE `bookingpage` (
  `book_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `test` varchar(50) DEFAULT NULL,
  `prescription` varchar(100) DEFAULT NULL,
  `lab` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookingpage`
--

INSERT INTO `bookingpage` (`book_id`, `user_id`, `test`, `prescription`, `lab`) VALUES
(24, 1, 'test1', '', 'lab1'),
(25, 4, 'test1', 'CPU.gif', 'lab1'),
(26, 4, 'test1', '', 'lab1'),
(27, 1, 'test1', '', 'lab1'),
(28, 1, 'test1', '', 'lab1'),
(29, 1, 'test1', 'typesofcloudcomputing.jpg', 'lab1'),
(30, 1, 'test2', '', 'lab2'),
(31, 5, 'test2', '', 'lab2');

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `list_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `booking_id` varchar(50) DEFAULT NULL,
  `slot` varchar(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `lab` varchar(40) DEFAULT NULL,
  `test` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`list_id`, `user_id`, `name`, `contact`, `address`, `booking_id`, `slot`, `status`, `lab`, `test`) VALUES
(3, 1, 'sridhar', '7013272201', 'asdfghj', '5c15cab85a4feb90eac46e19bc2ae3fb', 'afternoon', NULL, 'lab1', 'test1'),
(4, 4, 'hanuman', '7013272201', 'asdfghjkl', '8a2631573ae88eaf3f1c4f3421c14d63', 'afternoon', NULL, 'lab1', 'test1'),
(5, 4, 'hanuman', '7013272201', 'asdfghj', 'fd5a17e7b71616359d28693fc5324319', 'afternoon', NULL, 'lab1', 'test1'),
(6, 1, 'sridhar', '7013272201', 'asdfgh', 'bf56a758dadae6834d669e3442a66cf3', 'afternoon', NULL, 'lab1', 'test1'),
(7, 1, 'Sridhar shelge', '7013272201', 'Audi gajab', 'a634222f1bcbe537f6f19faf8befa80b', 'morning', NULL, 'lab1', 'test1'),
(8, 1, 'hanuman', '7013272201', 'asdfghjkl', '9216129b0e4c75e4c21789d01e0b862f', 'afternoon', NULL, 'lab1', 'test1'),
(9, 1, 'Sridhar shelge', '7013272201', 'Django', '27cf559cb31e71fbf1487973f6637450', 'morning', NULL, 'lab2', 'test2'),
(10, 5, 'sai', '234354567', 'fghjh', '6de3596d8a1ae9ac41b5e09eff01d561', 'morning', NULL, 'lab2', 'test2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `name`) VALUES
(1, 'shelgesridhar14@gmail.com', '136803d04f13ac5064fa2e1f17759f81', 'sridhar7'),
(4, 'hanuman@gmail.com', '941585385d447dabb0cbea73e0079dd8', 'hanuman'),
(5, 'saikumarkaleru56@gmail.com', '922805ceb221a64e7cb173b420613407', 'sai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bookingdetails`
--
ALTER TABLE `bookingdetails`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `bookingpage`
--
ALTER TABLE `bookingpage`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`list_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookingdetails`
--
ALTER TABLE `bookingdetails`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `bookingpage`
--
ALTER TABLE `bookingpage`
  MODIFY `book_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookingdetails`
--
ALTER TABLE `bookingdetails`
  ADD CONSTRAINT `bookingdetails_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `bookingpage`
--
ALTER TABLE `bookingpage`
  ADD CONSTRAINT `bookingpage_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `list`
--
ALTER TABLE `list`
  ADD CONSTRAINT `list_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
