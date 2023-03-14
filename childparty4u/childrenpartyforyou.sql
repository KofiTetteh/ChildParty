-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2017 at 09:37 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `childrenpartyforyou`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingid` int(6) UNSIGNED NOT NULL,
  `customername` varchar(30) NOT NULL,
  `Number` int(10) DEFAULT NULL,
  `BookingDate` date DEFAULT NULL,
  `PartyBooked` varchar(30) DEFAULT NULL,
  `fullcost` int(20) DEFAULT NULL,
  `amount_perchild` int(20) DEFAULT NULL,
  `reg_date` timestamp NULL DEFAULT NULL,
  `bookstatus` enum('1','0') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingid`, `customername`, `Number`, `BookingDate`, `PartyBooked`, `fullcost`, `amount_perchild`, `reg_date`, `bookstatus`) VALUES
(2, 'abena fosu', 202957173, '2017-05-05', 'Build a Bear', 4500, 50, '2017-04-30 13:47:47', '1'),
(3, 'abena fosu', 2029671173, '2017-07-02', 'Pirate', 392, 7, '2017-04-30 14:49:29', '0');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerid` int(6) UNSIGNED NOT NULL,
  `customername` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `childDateOfBirth` date NOT NULL,
  `childage` int(11) NOT NULL,
  `childgender` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `Accesslevel` varchar(30) NOT NULL DEFAULT 'user',
  `reg_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerid`, `customername`, `address`, `childDateOfBirth`, `childage`, `childgender`, `email`, `username`, `password`, `Accesslevel`, `reg_date`) VALUES
(1, 'Ernest Mangortey', 'east legon', '1997-09-26', 20, 'M', 'etmangortey4@yahoo.co.uk', 'Ernest', '12', 'Admin', '2017-04-29 22:50:21'),
(2, 'abena fosu', 'labone', '1990-07-04', 27, 'F', 'abena@gmail.com', 'abena', '34', 'user', '2017-04-29 22:54:33');

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `partyid` int(6) UNSIGNED NOT NULL,
  `partytype` varchar(30) NOT NULL,
  `partyDesc` text NOT NULL,
  `costperchild` double(9,2) DEFAULT NULL,
  `partylength` varchar(30) NOT NULL,
  `nochildattend` varchar(30) NOT NULL,
  `prodnservices` text NOT NULL,
  `reg_date` timestamp NULL DEFAULT NULL,
  `partyImg` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`partyid`, `partytype`, `partyDesc`, `costperchild`, `partylength`, `nochildattend`, `prodnservices`, `reg_date`, `partyImg`) VALUES
(6, 'Star Wars', 'This party will have a Star Wars theme', 15.00, '90', '15', 'Each child will receive a StarWars gift as their party prize', '2017-04-30 08:33:30', 'party-img-(6).jpg'),
(4, 'Pirate', 'This will be a pirate themed party and will include relevant decorations', 15.00, '90', '30', 'Pirate costumers and face painting', '2017-04-30 08:29:23', 'party-img-(1).jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`partyid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingid` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerid` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `partyid` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
