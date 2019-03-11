-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 11, 2019 at 03:43 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `wishbonetest`
--

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `experienceid` int(11) NOT NULL,
  `experiencetitle` varchar(30) NOT NULL,
  `experiencedes` text NOT NULL,
  `experiencetime` varchar(20) NOT NULL,
  `profileid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`experienceid`, `experiencetitle`, `experiencedes`, `experiencetime`, `profileid`) VALUES
(1, 'designer', ' test\r\n						', '2018.09-now', 1),
(2, 'dancer', 'Dance is a performing art form consisting of purposefully selected sequences of human movement. ', '', 2),
(8, 'hahaha', 'hahahatest1', 'hahahatest1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`experienceid`),
  ADD KEY `profileID` (`profileid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `experienceid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `experiencepk` FOREIGN KEY (`profileid`) REFERENCES `artprofile` (`profileid`);
