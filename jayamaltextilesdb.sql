-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2021 at 11:58 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jayamaltextilesdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `administor`
--

CREATE TABLE `administor` (
  `user_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categoryprice`
--

CREATE TABLE `categoryprice` (
  `c_name` varchar(25) NOT NULL,
  `size2_price` int(10) DEFAULT NULL,
  `size4_price` int(10) DEFAULT NULL,
  `size6_price` int(10) DEFAULT NULL,
  `size8_price` int(10) DEFAULT NULL,
  `size10_price` int(10) DEFAULT NULL,
  `size12_price` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `user_ID` int(10) NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`user_ID`, `firstname`, `lastname`, `address`) VALUES
(20, 'Supun', 'Siriwardhana', 'Muththettugala');

-- --------------------------------------------------------

--
-- Table structure for table `customizeduniform`
--

CREATE TABLE `customizeduniform` (
  `uniform_ID` int(10) NOT NULL,
  `color` varchar(45) NOT NULL,
  `design_image` blob NOT NULL,
  `institution` varchar(45) NOT NULL,
  `extra_note` varchar(255) NOT NULL,
  `shoulder_length` int(10) NOT NULL,
  `sleeve_length` int(10) NOT NULL,
  `sleeve_circumference` int(10) NOT NULL,
  `arm_hole` int(10) NOT NULL,
  `chest` int(10) NOT NULL,
  `waist` int(10) NOT NULL,
  `shoulder_to_waist` int(10) NOT NULL,
  `full_length` int(10) NOT NULL,
  `front_crotch` int(10) NOT NULL,
  `hip` int(10) NOT NULL,
  `bottom` int(10) NOT NULL,
  `fabric_type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fabrics`
--

CREATE TABLE `fabrics` (
  `fabric_type` varchar(45) NOT NULL,
  `fabric_info` varchar(45) DEFAULT NULL,
  `extra_cost` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_ID` int(10) NOT NULL,
  `user_ID` int(10) DEFAULT NULL,
  `f_date` date DEFAULT NULL,
  `f_description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `order_ID` int(10) NOT NULL,
  `uniform_ID` int(10) NOT NULL,
  `selected_size` int(10) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  `subTotal` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `user_ID` int(10) DEFAULT NULL,
  `order_ID` int(10) NOT NULL,
  `order_date` date DEFAULT NULL,
  `dueDate` date DEFAULT NULL,
  `delivery_address` varchar(100) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uniform`
--

CREATE TABLE `uniform` (
  `uniform_ID` int(10) NOT NULL,
  `u_description` varchar(255) DEFAULT NULL,
  `u_image` blob DEFAULT NULL,
  `u_name` varchar(45) DEFAULT NULL,
  `c_name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phonenumber` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `uType_ID` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `username`, `phonenumber`, `email`, `password`, `uType_ID`) VALUES
(1, 'Gayan', 779469179, 'mglmuthukumara@gmail.com', '12345678', 1),
(2, 'Nimmi', 767960071, 'Jayamali@gmail.com', '123456', 2),
(20, 'Supun', 714567891, 'Supun@gmail.com', '55587a910882016321201e6ebbc9f595', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `uType_ID` int(10) NOT NULL,
  `uTypeName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`uType_ID`, `uTypeName`) VALUES
(1, 'Admin'),
(2, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administor`
--
ALTER TABLE `administor`
  ADD PRIMARY KEY (`user_ID`);

--
-- Indexes for table `categoryprice`
--
ALTER TABLE `categoryprice`
  ADD PRIMARY KEY (`c_name`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_ID`);

--
-- Indexes for table `customizeduniform`
--
ALTER TABLE `customizeduniform`
  ADD PRIMARY KEY (`uniform_ID`),
  ADD KEY `fabric_type_fk` (`fabric_type`);

--
-- Indexes for table `fabrics`
--
ALTER TABLE `fabrics`
  ADD PRIMARY KEY (`fabric_type`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`order_ID`,`uniform_ID`),
  ADD KEY `uniform_ID` (`uniform_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `uniform`
--
ALTER TABLE `uniform`
  ADD PRIMARY KEY (`uniform_ID`),
  ADD KEY `c_name` (`c_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`uType_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customizeduniform`
--
ALTER TABLE `customizeduniform`
  MODIFY `uniform_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `uType_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administor`
--
ALTER TABLE `administor`
  ADD CONSTRAINT `administor_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`);

--
-- Constraints for table `customizeduniform`
--
ALTER TABLE `customizeduniform`
  ADD CONSTRAINT `fabric_type_fk` FOREIGN KEY (`fabric_type`) REFERENCES `fabrics` (`fabric_type`),
  ADD CONSTRAINT `fk_uniform_ID` FOREIGN KEY (`uniform_ID`) REFERENCES `uniform` (`uniform_ID`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`order_ID`) REFERENCES `orders` (`order_ID`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`uniform_ID`) REFERENCES `uniform` (`uniform_ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`);

--
-- Constraints for table `uniform`
--
ALTER TABLE `uniform`
  ADD CONSTRAINT `uniform_ibfk_1` FOREIGN KEY (`c_name`) REFERENCES `categoryprice` (`c_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
