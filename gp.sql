-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2016 at 07:26 PM
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
(4, 'another', '262482392389', '2016-05-10', 'hfbsdjfjdkfndjsfnds', 2),
(5, 'another', '262482392389', '2016-05-10', 'hfbsdjfjdkfndjsfnds', 2),
(6, 'another', '262482392389', '2016-05-10', 'hfbsdjfjdkfndjsfnds', 2),
(7, 'another', '262482392389', '2016-05-10', 'hfbsdjfjdkfndjsfnds', 2),
(8, 'another', '262482392389', '2016-05-10', 'hfbsdjfjdkfndjsfnds', 2),
(9, 'another', '262482392389', '2016-05-10', 'hfbsdjfjdkfndjsfnds', 2),
(10, 'another', '262482392389', '2016-05-10', 'hfbsdjfjdkfndjsfnds', 2),
(11, 'another', '262482392389', '2016-05-10', 'hfbsdjfjdkfndjsfnds', 2),
(12, 'another', '262482392389', '2016-05-10', 'hfbsdjfjdkfndjsfnds', 2),
(15, 'Aditya', '098237273', '2016-05-03', '                                sjdhsjka', 1),
(16, 'Aditya', '098237273', '2016-05-03', 'sdasdadsadsadsa', 1),
(17, 'Aditya', '098237273', '2016-05-03', 'sdasdadsadsadsa', 1),
(18, 'Aditya', '098237273', '2016-05-03', 'sdasdadsadsadsa', 1),
(19, 'Aditya', '098237273', '2016-05-03', 'sdasdadsadsadsa', 1),
(20, 'Aditya', '098237273', '2016-05-03', 'sdasdadsadsadsa', 1),
(26, 'dfsdfdsfsfsdf', '06862625222', '2016-05-03', 'Call him again next week!', 1),
(27, 'dfsdfdsfsfsdf', '06862625222', '2016-05-03', 'Call him again next week!', 1),
(28, 'dfsdfdsfsfsdf', '06862625222', '2016-05-03', 'Call him again next week!', 1),
(29, 'dfsdfdsfsfsdf', '06862625222', '2016-05-03', 'Call him again next week!', 1),
(31, 'another', '262482392389', '2016-05-10', 'hfbsdjfjdkfndjsfnds', 2),
(32, 'Bsbi', 'Kucing', '2016-05-27', 'dhkdhkjdfhksjsdsfdsfdsfsdfs', 1),
(33, 'Bsbi', 'Kucing', '2016-05-27', 'dhkdhkjdfhksjsdsfdsfdsfsdfs', 1),
(34, 'Bsbi', 'Kucing', '2016-05-27', 'dhkdhkjdfhksjsdsfdsfdsfsdfs', 1),
(35, 'Bsbi', 'Kucing', '2016-05-27', 'dhkdhkjdfhksjsdsfdsfdsfsdfs', 1),
(36, 'AJAX', 'AJAX', '2016-05-02', 'AJAX', 1);

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
(2, 'anotheraditya', 'aditya.astono@hotmail.com', '$2y$10$Rd1pxodqDjHH/xmcfhdk5.AngwtGXPSre2N4l9MVIs/menlqEY.pC'),
(3, 'adityaastono', 'adjdd@ajskdsdsa.com', '$2y$10$FdSvNn8o4NH.ZTmr7f6mY.YtExEeB0O5xab4ah11CrDOQmJtpuhza');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
