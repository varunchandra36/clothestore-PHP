-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2016 at 03:58 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--
CREATE DATABASE STORE;USE STORE;

CREATE TABLE `admin` (
  `ADMINID` int(11) NOT NULL,
  `PID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CARTID` int(11) NOT NULL,
  `CUSTOMERID` int(11) NOT NULL,
  `ITEMS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`CARTID`, `CUSTOMERID`, `ITEMS`) VALUES
(1, 1, 0),
(2, 5, 0),
(3, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `CARTID` int(11) NOT NULL,
  `ITEMID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`CARTID`, `ITEMID`) VALUES
(2, 17);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CUSTOMERID` int(11) NOT NULL,
  `PID` int(11) NOT NULL,
  `NEWSLETTER` tinyint(1) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CUSTOMERID`, `PID`, `NEWSLETTER`, `username`, `Password`) VALUES
(1, 109182, NULL, 'praneeth', 'abcd123456'),
(2, 109184, NULL, 'varun', 'abcd123456'),
(4, 109186, NULL, 'bharadwaz', 'abcd123456'),
(5, 109187, NULL, 'rajesh', 'abcd123456'),
(6, 109188, NULL, 'Kiran', 'abcd123456');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `DONORID` int(11) NOT NULL,
  `TYPE` varchar(10) NOT NULL,
  `PID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `ITEMID` int(11) NOT NULL,
  `ITEMCONDITION` varchar(10) NOT NULL,
  `PRICE` int(11) NOT NULL,
  `CATEGORY` varchar(30) DEFAULT NULL,
  `ADDEDDATE` date DEFAULT NULL,
  `SIZE` varchar(10) NOT NULL,
  `COLOR` varchar(10) NOT NULL,
  `FILENAME` varchar(40) NOT NULL,
  `ITEMNAME` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`ITEMID`, `ITEMCONDITION`, `PRICE`, `CATEGORY`, `ADDEDDATE`, `SIZE`, `COLOR`, `FILENAME`, `ITEMNAME`) VALUES
(17, 'Used', 100, 'Clothing', '2016-12-07', 'M', 'Grey', 'uploads/123.jpg', 'Silver Suit'),
(20, 'Used', 20, 'Clothing', '2016-12-09', 'M', 'White', 'uploads/254980_0_49.jpg', 'Women Stripe Shirt'),
(21, 'Used', 25, 'Clothing', '2016-12-06', 'L', 'Blue', 'uploads/290384_0_49.jpg', 'Women Shirt Checked'),
(22, 'Used', 50, 'Clothing', '2016-12-09', 'XS', 'Blue', 'uploads/64036352_7650.jpg', 'Women Dress'),
(23, 'Used', 40, 'Clothing', '2016-12-09', 'L', 'Blue', 'uploads/102894702_401.jpg', 'Women Formal Dress'),
(24, 'Used', 10, 'Clothing', '2016-12-09', 'XS', 'Grey', 'uploads/download.jpg', 'Kids Tshirt'),
(25, 'Used', 30, 'Clothing', '2016-12-09', 'XL', 'Blue', 'uploads/images.jpg', 'Women Polka Dot Dress'),
(26, 'Used', 30, 'Clothing', '2016-12-09', 'M', 'Grey', 'uploads/tee.jpg', 'Mens Tshirt'),
(27, 'Used', 5, 'Accessories', '2016-12-09', 'XS', 'Grey', 'uploads/Casdfas.jpg', 'Baseball Cap'),
(28, 'Used', 60, 'Clothing', '2016-12-09', 'XS', 'Grey', 'uploads/womens-dresses-1.jpg', 'Womens dress'),
(30, 'Used', 45, 'Clothing', '2016-12-09', 'M', 'Blue', 'uploads/11blue.jpg', 'blue shirt');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `PID` int(11) NOT NULL,
  `PNAME` varchar(20) NOT NULL,
  `EMAIL` varchar(40) NOT NULL,
  `STREET` varchar(40) NOT NULL,
  `CITY` varchar(20) NOT NULL,
  `STATE` varchar(2) NOT NULL,
  `ZIP` int(11) NOT NULL,
  `SSN` varchar(11) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `PHONE` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`PID`, `PNAME`, `EMAIL`, `STREET`, `CITY`, `STATE`, `ZIP`, `SSN`, `DOB`, `PHONE`) VALUES
(109181, 'BHANU', 'prakashbp2020@gmail.com', '9401 kitttansett Drive', 'charlotte', 'nc', 28262, '', '2016-05-17', 3802552564),
(109182, 'Praneeth', 'praneeth@uncc.edu', '9401 kittta Drive', 'charlotte', 'NC', 28262, NULL, NULL, 9802552564),
(109184, 'Varun', 'varun@gmail.com', '9401 Kittansett dr Apt #E', 'Charlotte', 'NC', 28262, NULL, NULL, NULL),
(109185, 'rajesh', 'rajesh@r.com', '9401 Kittansett Dr, Apt #E', 'Charlotte', 'NC', 28262, NULL, NULL, NULL),
(109186, 'bharu', 'bharu@b.com', '9401 Kittansett dr Apt #E', 'Charlotte', 'NC', 28262, NULL, NULL, NULL),
(109187, 'bhanu', 'p@b.com', '9401 Kittansett Dr, Apt #E', 'Charlotte', 'NC', 28262, NULL, NULL, NULL),
(109188, 'Kiran', 'kiran@gmail.com', '9401 Kittansett dr Apt #E', 'Charlotte', 'NC', 28262, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staffmember`
--

CREATE TABLE `staffmember` (
  `STAFFID` int(11) NOT NULL,
  `PID` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffmember`
--

INSERT INTO `staffmember` (`STAFFID`, `PID`, `username`, `password`) VALUES
(1000191, 109181, 'bhanu', 'abcd123');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `UseId` int(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`UseId`, `Password`, `username`) VALUES
(1, 'Pajmdja', 'pamiid'),
(2, 'oaoa', 'pamiiid'),
(4, 'Padmaja08*', 'pamidi'),
(5, 'Padmajaj08*', 'pamidi'),
(6, 'abcd123456', 'pamidi999');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ADMINID`),
  ADD UNIQUE KEY `ADMINID` (`ADMINID`),
  ADD UNIQUE KEY `PID` (`PID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CARTID`),
  ADD KEY `CUSTOMERID` (`CUSTOMERID`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`CARTID`,`ITEMID`),
  ADD KEY `ITEMID` (`ITEMID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CUSTOMERID`),
  ADD UNIQUE KEY `CUSTOMERID` (`CUSTOMERID`),
  ADD UNIQUE KEY `PID` (`PID`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`DONORID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ITEMID`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`PID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`),
  ADD UNIQUE KEY `SSN` (`SSN`);

--
-- Indexes for table `staffmember`
--
ALTER TABLE `staffmember`
  ADD PRIMARY KEY (`STAFFID`),
  ADD UNIQUE KEY `STAFFID` (`STAFFID`),
  ADD KEY `PID` (`PID`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`UseId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CARTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CUSTOMERID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `ITEMID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109189;
--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `UseId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `Customer1` FOREIGN KEY (`CUSTOMERID`) REFERENCES `customer` (`CUSTOMERID`);

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `Constraint13` FOREIGN KEY (`ITEMID`) REFERENCES `item` (`ITEMID`),
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`CARTID`) REFERENCES `cart` (`CARTID`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `CONSTRAINT6` FOREIGN KEY (`PID`) REFERENCES `person` (`PID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
