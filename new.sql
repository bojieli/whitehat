SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
CREATE TABLE IF NOT EXISTS `Loophole` (
  `id` int(11) NOT NULL auto_increment primary key,
  `domain_type` int(3) NOT NULL,
  `domain` varchar(300) COLLATE utf8_bin NOT NULL,
  `vector` varchar(100) NOT NULL,
  `title` varchar(300) COLLATE utf8_bin NOT NULL,
  `target_rank` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `detail` text COLLATE utf8_bin NOT NULL,
  `fix_method` text COLLATE utf8_bin,
  `username` varchar(80) COLLATE utf8_bin NOT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '0',
  `email` varchar(80) COLLATE utf8_bin NOT NULL,
  `phone` varchar(20) COLLATE utf8_bin NOT NULL,
  `anonymous` tinyint(1) NOT NULL DEFAULT '0',
  `submit_time` datetime NOT NULL,
  `fixed_time` datetime DEFAULT NULL,
  `fixed` tinyint(1) NOT NULL DEFAULT '0',
  `token` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `official_reply` text COLLATE utf8_bin,
  `note` text COLLATE utf8_bin,
   `verified` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

