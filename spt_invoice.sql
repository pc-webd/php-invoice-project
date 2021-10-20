-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2021 at 01:37 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spt_invoice_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice_data`
--

CREATE TABLE `invoice_data` (
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `party_name` varchar(200) NOT NULL,
  `gstin` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `state_code` varchar(20) NOT NULL,
  `invoice_no` varchar(200) NOT NULL,
  `invoice_dt` date NOT NULL,
  `grandtotal` decimal(10,2) NOT NULL,
  `gst_type1` varchar(20) NOT NULL,
  `gst_type2` varchar(20) NOT NULL,
  `gst_rate1` varchar(20) NOT NULL,
  `gst_rate2` varchar(20) NOT NULL,
  `total_1` varchar(50) NOT NULL,
  `total_2` varchar(50) NOT NULL,
  `finaltotal` varchar(200) NOT NULL,
  `inwords` varchar(1000) NOT NULL,
  `notes` varchar(1000) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `ifsc` varchar(30) NOT NULL,
  `account` varchar(100) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `sign` varchar(200) NOT NULL,
  `created_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_item`
--

CREATE TABLE `invoice_item` (
  `item_id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `particular` varchar(50) NOT NULL,
  `hsnSac` varchar(30) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `b_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `gstin` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `scheme` varchar(20) NOT NULL,
  `created_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice_data`
--
ALTER TABLE `invoice_data`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `invoice_item`
--
ALTER TABLE `invoice_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice_data`
--
ALTER TABLE `invoice_data`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `invoice_item`
--
ALTER TABLE `invoice_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
