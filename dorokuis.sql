-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2022 at 02:42 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dorokuis`
--

-- --------------------------------------------------------

--
-- Table structure for table `gquiz`
--

CREATE TABLE `gquiz` (
  `id` int(4) NOT NULL,
  `ncode` int(5) NOT NULL,
  `gname` varchar(300) COLLATE armscii8_bin NOT NULL,
  `gauthor` varchar(28) COLLATE armscii8_bin NOT NULL,
  `gtime` int(6) NOT NULL,
  `gscore` int(10) NOT NULL,
  `gnum` int(3) NOT NULL,
  `gquest` varchar(255) COLLATE armscii8_bin NOT NULL,
  `opa` varchar(150) COLLATE armscii8_bin NOT NULL,
  `opb` varchar(150) COLLATE armscii8_bin NOT NULL,
  `opc` varchar(150) COLLATE armscii8_bin NOT NULL,
  `opd` varchar(150) COLLATE armscii8_bin NOT NULL,
  `gans` varchar(1) COLLATE armscii8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `gquiz`
--

INSERT INTO `gquiz` (`id`, `ncode`, `gname`, `gauthor`, `gtime`, `gscore`, `gnum`, `gquest`, `opa`, `opb`, `opc`, `opd`, `gans`) VALUES
(3, 42312, 'Matematika dasar', 'rusdifirman', 400, 200, 1, '2 x 2 = ?', '8', '6', '4', '2', 'c'),
(4, 42312, 'Matematika dasar', 'rusdifirman', 400, 200, 2, '-5 + 2 = ?', '-3', '-7', '7', '5', 'a'),
(16, 42312, '4 x 6 = ?', 'rusdifirman247', 400, 200, 3, '4 x 6 = ?', '21', '24', '48', '28', 'b'),
(19, 42312, '81 / 9 = ?', 'rusdifirman247', 400, 200, 4, '81 / 9 = ?', '7', '9', '4', '10', ''),
(20, 42312, 'sjdfjkhgd', 'rusdifirman247', 400, 200, 5, 'sjdfjkhgd', 'sjdfjkhgd', 'sjdfjkhgd', 'sjdfjkhgd', 'sjdfjkhgd', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `userccount`
--

CREATE TABLE `userccount` (
  `id` int(4) NOT NULL,
  `username` varchar(25) NOT NULL,
  `usermail` varchar(25) NOT NULL,
  `userpass` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userccount`
--

INSERT INTO `userccount` (`id`, `username`, `usermail`, `userpass`) VALUES
(1, 'rusdifirman247', 'rusdi@gmail.com', 'rusdi1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gquiz`
--
ALTER TABLE `gquiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userccount`
--
ALTER TABLE `userccount`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gquiz`
--
ALTER TABLE `gquiz`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `userccount`
--
ALTER TABLE `userccount`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
