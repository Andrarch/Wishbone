-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 11, 2019 at 03:06 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `wishbonetest`
--

-- --------------------------------------------------------

--
-- Table structure for table `artprofile`
--

CREATE TABLE `artprofile` (
  `profileid` int(11) NOT NULL,
  `artistid` int(11) NOT NULL,
  `socialid` varchar(25) DEFAULT NULL,
  `shareurl` varchar(1000) DEFAULT NULL,
  `bio` varchar(200) NOT NULL,
  `urldes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artprofile`
--

INSERT INTO `artprofile` (`profileid`, `artistid`, `socialid`, `shareurl`, `bio`, `urldes`) VALUES
(1, 1, 'Hobby', 'https://www.youtube.com/watch?v=gTCrKJZyAh0&list=RD8GmYYyzT_Rs&index=12', 'i am a foodie', ' \r\n				test2		'),
(2, 2, 'Someone', 'Somewhere', '', ''),
(3, 3, 'Cat', 'Dog', '', ''),
(4, 4, 'Smart', 'Beautiful', '', ''),
(5, 5, 'Kid', 'Kids', '', ''),
(6, 6, 'PHP', 'Java', '', ''),
(7, 7, 'White', 'Black', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artprofile`
--
ALTER TABLE `artprofile`
  ADD PRIMARY KEY (`profileid`),
  ADD KEY `artistid` (`artistid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artprofile`
--
ALTER TABLE `artprofile`
  MODIFY `profileid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artprofile`
--
ALTER TABLE `artprofile`
  ADD CONSTRAINT `artprofile_ibfk_1` FOREIGN KEY (`artistid`) REFERENCES `artists` (`artistid`);
