-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2016 at 09:20 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gp`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `phoneName` varchar(40) NOT NULL,
  `phoneNumber` varchar(40) NOT NULL,
  `timeOfCall` date NOT NULL,
  `notes` varchar(40) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `phoneName`, `phoneNumber`, `timeOfCall`, `notes`, `userID`) VALUES
(43, 'Erik Pieters', '0682627587', '2016-05-01', 'Left Back for Stoke City', 6),
(44, 'Robin van Persie', '0654253875', '2016-05-03', 'Center Forward for Fenerbache', 6),
(45, 'Dirk Kuyt', '0678625827', '2016-05-07', 'Center Forward for Feyenoord', 6),
(46, 'Daley Blind', '0678263752', '2016-05-13', 'Center Back for Manchester United', 6),
(47, 'Arjen Robben', '0789273826', '2016-05-27', 'Right Winger for Bayern Munich', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `email`, `password`) VALUES
(1, 'adityaastono', 'aditya.astono@gmail.com', '$2y$10$R7ZFb8eBC8BbNuAzY2moz.b6rE9lnAL0Abct3thVU4Rc/3pBTmuya'),
(6, 'admin', 'admin@admin.com', '$2y$10$RlDQ3sd/UL4FTBy7MlE0GOLD8tasIEwgVXgxRLwqk0iRRHFZWYz2e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
