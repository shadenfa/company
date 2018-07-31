-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2018 at 01:30 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_employees`
--

CREATE TABLE `add_employees` (
  `a_id` int(6) NOT NULL,
  `a_image` text CHARACTER SET utf8 NOT NULL,
  `fname` text CHARACTER SET utf8 NOT NULL,
  `lname` text CHARACTER SET utf8 NOT NULL,
  `EXT` int(11) NOT NULL,
  `email` text CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `k` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_employees`
--

INSERT INTO `add_employees` (`a_id`, `a_image`, `fname`, `lname`, `EXT`, `email`, `description`, `username`, `password`, `k`) VALUES
(204, 'HR.png', 'Andrew', 'Fuller', 1111, 'Andrew@gmail.com', 'sales representative.', 'Andrew', '0ff1a8b9c5d8a4e3e917038bda626cae', 2),
(205, 'HR.png', 'Steven', 'buchanan', 1112, 'steven@gmail.com', 'sales representative.', 'steven', 'd874a29e62ba45636a15260ba51451cd', 2),
(206, 'HR.png', 'Michael', 'suyama', 1113, 'michael@gmail.com', 'sales manage. ', 'michael', '9d88bc1874efa4ebae27251c74f44568', 2),
(207, 'HR.png', 'Robert', 'King', 1114, 'robert@gmail.com', 'president of sales.', 'robert', '11773243023d037e763259c890f418be', 2),
(208, 'emp.png', 'Adam', 'West', 1115, 'adam@gmail.com', 'Accounting.', 'adam', '5bffd52aa9355984690d15843df3c37a', 3),
(209, 'emp.png', 'Alex', 'Boston', 1116, 'alex@gmail.com', 'Marketing.', 'alex', 'ca5de0698e35487c73110c1a0cc80940', 3),
(210, 'emp.png', 'Danny', 'White', 1117, 'dany@gmail.com', 'manufacturing.', 'dany', 'ee82d1c8d802b78d8b5f525c6929e48c', 3),
(211, 'emp.png', 'Richard', 'West', 1118, 'richard@gmail.com', 'Marketing.', 'richard', '2531c187da8baf99a9a6b04af158fb15', 3),
(212, 'admin.png', 'john', 'Doe', 1119, 'john@gmail.com', 'manager.', 'john', '11b5ff93c69ae9fc665fb22dad5218a4', 1),
(213, 'admin.png', 'Ted', 'Morris', 1120, 'ted@gmail.com', 'Manager.', 'ted', '2f8fffba06914d639bd6e04dd04d0a6c', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(6) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'Human Resources'),
(3, 'employees');

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`) VALUES
(2, 169, 170, 'hello', '2018-07-16 05:56:27', 0),
(3, 170, 169, 'hello', '2018-07-16 06:03:36', 0),
(9, 188, 186, 'hi', '2018-07-17 10:37:36', 1),
(10, 195, 197, 'a\n', '2018-07-27 19:11:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `c_id` int(6) NOT NULL,
  `c_name` text NOT NULL,
  `c_email` text NOT NULL,
  `c_phone` int(10) NOT NULL,
  `c_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`c_id`, `c_name`, `c_email`, `c_phone`, `c_message`) VALUES
(1, 'ali', 'ali@gmail.com', 556348653, 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_type` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderNumber` int(6) NOT NULL,
  `emp_id` int(6) DEFAULT NULL,
  `HR_id` int(6) DEFAULT NULL,
  `orders` int(6) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `state_name` int(6) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `resourses`
--

CREATE TABLE `resourses` (
  `id` int(6) NOT NULL,
  `quantity` int(6) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resourses`
--

INSERT INTO `resourses` (`id`, `quantity`, `type`) VALUES
(6, 90, 'printer'),
(7, 75, 'paper'),
(8, 100, 'ink');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(6) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`) VALUES
(2, 'pending'),
(3, 'accepted'),
(4, 'cancelled');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_employees`
--
ALTER TABLE `add_employees`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `k` (`k`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderNumber`),
  ADD KEY `FK_emp` (`emp_id`),
  ADD KEY `FK_HR` (`HR_id`),
  ADD KEY `FK_state` (`state_name`),
  ADD KEY `orders` (`orders`);

--
-- Indexes for table `resourses`
--
ALTER TABLE `resourses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_employees`
--
ALTER TABLE `add_employees`
  MODIFY `a_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `c_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderNumber` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `resourses`
--
ALTER TABLE `resourses`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_employees`
--
ALTER TABLE `add_employees`
  ADD CONSTRAINT `add_employees_ibfk_1` FOREIGN KEY (`k`) REFERENCES `category` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_HR` FOREIGN KEY (`HR_id`) REFERENCES `add_employees` (`a_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_emp` FOREIGN KEY (`emp_id`) REFERENCES `add_employees` (`a_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_state` FOREIGN KEY (`state_name`) REFERENCES `state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`orders`) REFERENCES `resourses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
