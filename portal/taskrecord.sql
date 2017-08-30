-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2017 at 08:02 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `taskrecord`
--

CREATE TABLE `taskrecord` (
  `id` int(100) NOT NULL,
  `Prof_id` int(100) NOT NULL,
  `Stud_id` int(100) NOT NULL,
  `Task_id` int(100) NOT NULL,
  `Task_desc` varchar(255) NOT NULL,
  `Status` int(10) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taskrecord`
--

INSERT INTO `taskrecord` (`id`, `Prof_id`, `Stud_id`, `Task_id`, `Task_desc`, `Status`, `time_stamp`) VALUES
(12, 5, 3, 0, 'do some chnges', 1, '2017-08-30 17:47:58'),
(13, 5, 3, 0, 'do it now\n', 1, '2017-08-30 17:50:32'),
(14, 5, 3, 0, 'errth', 1, '2017-08-30 17:54:28'),
(15, 5, 3, 0, 'do it', 1, '2017-08-30 17:55:30'),
(16, 5, 3, 0, 'ok man', 1, '2017-08-30 17:59:16'),
(17, 5, 3, 0, 'l;jkbhkdfjsbdcnksmc', 1, '2017-08-30 18:00:45'),
(18, 5, 3, 0, 'kjlbhjg;kjihgvhcf', 0, '2017-08-30 18:00:55'),
(19, 5, 6, 0, '', 0, '2017-08-30 18:01:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `taskrecord`
--
ALTER TABLE `taskrecord`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `taskrecord`
--
ALTER TABLE `taskrecord`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
