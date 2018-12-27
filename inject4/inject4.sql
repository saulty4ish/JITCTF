-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2018-05-30 12:19:38
-- 服务器版本： 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inject4`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `uname` varchar(20) NOT NULL,
  `pwd` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`uname`, `pwd`) VALUES
('flag', 'JITCTF{b10753d4dcc9f17a}');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(5) NOT NULL,
  `smoke1` varchar(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `smoke2` varchar(4) NOT NULL,
  `smoke3` varchar(4) NOT NULL,
  `smoke4` varchar(4) NOT NULL,
  `password` varchar(40) NOT NULL,
  `smoke5` varchar(4) NOT NULL,
  `smoke6` varchar(4) NOT NULL,
  `isadmin` varchar(1) NOT NULL,
  `smoke7` int(4) NOT NULL,
  `smoke8` int(4) NOT NULL,
  `smoke9` int(4) NOT NULL,
  `smoke10` int(4) NOT NULL,
  `smoke11` int(4) NOT NULL,
  `smoke12` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `smoke1`, `username`, `smoke2`, `smoke3`, `smoke4`, `password`, `smoke5`, `smoke6`, `isadmin`, `smoke7`, `smoke8`, `smoke9`, `smoke10`, `smoke11`, `smoke12`) VALUES
(1, 'smk1', 'admin', 'smk2', 'smk3', 'smk4', 'admin@123', 'smk5', 'smk6', '1', 0, 0, 0, 0, 0, 0),
(2, 'smk1', 'user', 'smk2', 'smk3', 'smk4', 'user@456', 'smk5', 'smk6', '0', 0, 0, 0, 0, 0, 0),
(3, 'smk1', 'test', 'smk2', 'smk3', 'smk4', 'test@789', 'smk5', 'smk6', '0', 0, 0, 0, 0, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
