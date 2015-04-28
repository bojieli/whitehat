-- phpMyAdmin SQL Dump
-- version 4.4.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-04-28 07:45:59
-- 服务器版本： 10.0.17-MariaDB-log
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `whitehat`
--

-- --------------------------------------------------------

--
-- 表的结构 `Loophole`
--

CREATE TABLE IF NOT EXISTS `Loophole` (
  `id` int(11) NOT NULL,
  `username` varchar(10) COLLATE utf8_bin NOT NULL,
  `studentnumber` varchar(20) COLLATE utf8_bin NOT NULL,
  `phone` varchar(20) COLLATE utf8_bin NOT NULL,
  `QQ` varchar(10) COLLATE utf8_bin NOT NULL,
  `email` varchar(15) COLLATE utf8_bin NOT NULL,
  `timestamp` int(11) NOT NULL,
  `url` varchar(300) COLLATE utf8_bin NOT NULL,
  `title` varchar(300) COLLATE utf8_bin NOT NULL,
  `abstract` text COLLATE utf8_bin NOT NULL,
  `rank` int(11) NOT NULL,
  `detail` text COLLATE utf8_bin NOT NULL,
  `type` text COLLATE utf8_bin NOT NULL,
  `fixmethod` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Loophole`
--
ALTER TABLE `Loophole`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Loophole`
--
ALTER TABLE `Loophole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
