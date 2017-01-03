-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 03, 2017 at 08:01 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `revels17`
--

-- --------------------------------------------------------

--
-- Table structure for table `delegate`
--


CREATE TABLE `delegate` (
  `name` varchar(50) NOT NULL,
  `regno` varchar(20) NOT NULL,
  `college` varchar(100) NOT NULL,
  `email` varchar(70) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `id` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delegate`
--

INSERT INTO `delegate` (`name`, `regno`, `college`, `email`, `phone`, `gender`, `id`) VALUES
('nihar', '1509', 'MIT', 'raonihar1997@gmail.com', '8652328719', 'M', 1),
('mayur', '1509', 'MIT', 'raonihar', '878', 'M', 2),
('yamm', '153', 'MIT', 'raojio@gmail.com', '77923245678', 'M', 3),
('Nihar Rao', '150911106', 'MIT', 'raonihar1997@gmail.com', '8652328719', 'M', 4);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `name` varchar(50) NOT NULL,
  `regno` varchar(20) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `id` int(12) NOT NULL,
  `sports` varchar(100) NOT NULL,
  `teamid` int(100) NOT NULL,
  `paid` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`name`, `regno`, `gender`, `id`, `sports`, `teamid`, `paid`) VALUES
('nihar', '1509', 'M', 0, 'Football', 1, 1),
('mayur', '1509', 'M', 0, 'Football', 1, 1),
('yamm', '153', 'M', 0, 'Football', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `pass`) VALUES
('admin', 'yolo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delegate`
--
ALTER TABLE `delegate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delegate`
--
ALTER TABLE `delegate`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
