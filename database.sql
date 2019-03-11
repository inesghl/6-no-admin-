-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 02, 2018 at 01:30 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `shopping_lamp`
--

-- --------------------------------------------------------

--
-- Table structure for table `Order_lamp`
--

CREATE TABLE `Order_lamp` (
  `ID` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `ID_product` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `Order_lamp`
--

INSERT INTO `Order_lamp` (`ID`, `username`, `ID_product`, `amount`) VALUES
(110, 'Julias', 1, 3),
(111, 'Julias', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `ID_product` int(11) NOT NULL,
  `title` varchar(600) COLLATE utf8_swedish_ci NOT NULL,
  `price` int(11) NOT NULL,
  `images` varchar(500) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `ID_user` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(500) COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Order_lamp`
--
ALTER TABLE `Order_lamp`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`ID_product`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`ID_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Order_lamp`
--
ALTER TABLE `Order_lamp`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
  MODIFY `ID_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
