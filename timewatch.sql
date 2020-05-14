-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2020 at 11:45 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timewatch`
--

-- --------------------------------------------------------

--
-- Table structure for table `time_entry_data`
--

CREATE TABLE `time_entry_data` (
  `t_id` int(11) NOT NULL,
  `entry_date` date NOT NULL,
  `slot_id` int(11) NOT NULL,
  `slot_name` varchar(150) NOT NULL,
  `work_detail` text NOT NULL,
  `usage_detail` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time_entry_data`
--

INSERT INTO `time_entry_data` (`t_id`, `entry_date`, `slot_id`, `slot_name`, `work_detail`, `usage_detail`) VALUES
(1, '2020-05-05', 1, '00:00 - 00:30', 'Sleeping well', 'Relaxing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `time_entry_data`
--
ALTER TABLE `time_entry_data`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `time_entry_data`
--
ALTER TABLE `time_entry_data`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
