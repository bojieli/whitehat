-- phpMyAdmin SQL Dump
-- version 4.4.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-04-29 13:49:13
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
CREATE DATABASE IF NOT EXISTS `whitehat` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `whitehat`;

-- --------------------------------------------------------

--
-- 表的结构 `Loophole`
--

DROP TABLE IF EXISTS `Loophole`;
CREATE TABLE IF NOT EXISTS `Loophole` (
  `id` int(11) NOT NULL,
  `username` varchar(10) COLLATE utf8_bin NOT NULL,
  `studentnumber` varchar(20) COLLATE utf8_bin NOT NULL,
  `anonymous` tinyint(1) NOT NULL DEFAULT '0',
  `gender` int(5) NOT NULL DEFAULT '0',
  `phone` varchar(20) COLLATE utf8_bin NOT NULL,
  `qq` varchar(10) COLLATE utf8_bin NOT NULL,
  `email` varchar(15) COLLATE utf8_bin NOT NULL,
  `submit_time` int(11) NOT NULL DEFAULT '0',
  `domain` varchar(300) COLLATE utf8_bin NOT NULL,
  `title` varchar(300) COLLATE utf8_bin NOT NULL,
  `abstract` text COLLATE utf8_bin NOT NULL,
  `rank` int(11) NOT NULL,
  `detail` text COLLATE utf8_bin NOT NULL,
  `type` text COLLATE utf8_bin NOT NULL,
  `fix_method` text COLLATE utf8_bin,
  `fixed_time` int(11) NOT NULL DEFAULT '0',
  `fixed` tinyint(1) NOT NULL DEFAULT '0',
  `score` int(11) NOT NULL DEFAULT '0',
  `token` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `official_reply` text COLLATE utf8_bin,
  `note` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 插入之前先把表清空（truncate） `Loophole`
--

TRUNCATE TABLE `Loophole`;
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
