-- phpMyAdmin SQL Dump
-- version 4.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-05-01 19:14:07
-- 服务器版本： 5.6.24-0ubuntu2
-- PHP Version: 5.6.4-4ubuntu6

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
  `anonymous` tinyint(1) NOT NULL DEFAULT '0',
  `gender` int(5) NOT NULL DEFAULT '0',
  `phone` varchar(20) COLLATE utf8_bin NOT NULL,
  `qq` varchar(10) COLLATE utf8_bin NOT NULL,
  `email` varchar(15) COLLATE utf8_bin NOT NULL,
  `submit_time` datetime NOT NULL,
  `domain` varchar(300) COLLATE utf8_bin NOT NULL,
  `title` varchar(300) COLLATE utf8_bin NOT NULL,
  `abstract` text COLLATE utf8_bin NOT NULL,
  `rank` int(11) NOT NULL,
  `detail` text COLLATE utf8_bin NOT NULL,
  `type` text COLLATE utf8_bin NOT NULL,
  `fix_method` text COLLATE utf8_bin,
  `fixed_time` text COLLATE utf8_bin NOT NULL,
  `fixed` tinyint(1) NOT NULL DEFAULT '0',
  `score` int(11) NOT NULL DEFAULT '0',
  `token` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `official_reply` text COLLATE utf8_bin,
  `note` text COLLATE utf8_bin
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `Loophole`
--

INSERT INTO `Loophole` (`id`, `username`, `studentnumber`, `anonymous`, `gender`, `phone`, `qq`, `email`, `submit_time`, `domain`, `title`, `abstract`, `rank`, `detail`, `type`, `fix_method`, `fixed_time`, `fixed`, `score`, `token`, `official_reply`, `note`) VALUES
(3, 'a', '', 0, 3, 'a', '', '', '0000-00-00 00:00:00', 'a', 'a', 'a', 0, 'a', '', 'a', '0', 0, 0, NULL, NULL, NULL),
(4, 'a', '', 0, 3, 'a', '', '', '2015-05-01 18:57:17', 'a', 'a', 'a', 0, 'a', '', 'a', '0', 0, 0, NULL, NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
