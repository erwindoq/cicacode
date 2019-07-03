-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2018 at 03:00 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cicacode`
--

-- --------------------------------------------------------

--
-- Table structure for table `activitys`
--

CREATE TABLE `activitys` (
  `activityid` int(5) NOT NULL,
  `userid` int(5) NOT NULL,
  `activity` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deletes` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activitys`
--

INSERT INTO `activitys` (`activityid`, `userid`, `activity`, `created`, `deletes`) VALUES
(1, 3, 'Anda membuat article Cara Mempercepat Pengetikan Code pada 2018-08-07 22:50:03', '2018-08-07 15:50:03', 0),
(2, 3, 'Anda mengomentari article Cara Menggunakan Bitcoin Untuk Pemula pada 2018-08-07 22:55:29', '2018-08-07 15:55:29', 0),
(3, 3, 'Anda mengomentari article Cara Menggunakan Bitcoin Untuk Pemula pada 2018-08-07 22:57:44', '2018-08-07 15:57:44', 0),
(5, 3, 'Anda membalas komentar Erwindo Sianipar pada 2018-08-07 23:22:51', '2018-08-07 16:22:51', 0),
(6, 4, 'Anda membalas komentar Erwindo Sianipar pada 2018-08-07 23:40:27', '2018-08-07 16:40:27', 0),
(7, 3, 'Anda login dari browser Google Chrome di Windows IP address ::1 pada 2018-08-07 23:49:57', '2018-08-07 16:49:57', 0),
(8, 4, 'Anda login dari browser Google Chrome di Windows dengan alamat IP: ::1 pada 2018-08-07 23:51:03', '2018-08-07 16:51:03', 0),
(9, 3, 'Anda login dari browser Google Chrome di Windows dengan alamat IP: ::1 pada 2018-08-07 23:54:50', '2018-08-07 16:54:50', 0),
(10, 3, 'Anda membalas komentar Erwindo Sianipar. &quot;ngukuk&quot; pada 2018-08-08 00:02:30', '2018-08-07 17:02:30', 0),
(11, 3, 'Anda mengomentari article Cara Menggunakan Bitcoin Untuk Pemula. &quot;$tulis komentar&quot; pada 2018-08-08 00:03:53', '2018-08-07 17:03:53', 0),
(12, 3, 'Anda mengomentari article Menjaga Hewan Peliharaan. &quot;$satu&quot; pada 2018-08-08 00:20:10', '2018-08-07 17:20:10', 0),
(13, 3, 'Anda mengomentari article Menjaga Hewan Peliharaan. &quot;$hallo&quot; pada 2018-08-08 00:20:16', '2018-08-07 17:20:16', 0),
(14, 3, 'Anda mengomentari article Cara Ngoding Dengan Sublime Text 3. &quot;$Cara Ngoding Dengan Sublime Text 3\r\ncara ngoding dengan sublime text 3 sebenarnya&quot; pada 2018-08-08 00:21:16', '2018-08-07 17:21:16', 0),
(15, 3, 'Anda mengomentari article Cara Ngoding Dengan Sublime Text 3. &quot;$komentar tidak tampil&quot; pada 2018-08-08 00:21:47', '2018-08-07 17:21:47', 0),
(16, 3, 'Anda mengomentari article Cara Ngoding Dengan Sublime Text 3. &quot;$komentar untuk sublime text&quot; pada 2018-08-08 00:27:58', '2018-08-07 17:27:58', 0),
(17, 3, 'Anda mengomentari article Cara Meretas Situs Dengan Sql Injection. &quot;$sqli inject&quot; pada 2018-08-08 00:30:08', '2018-08-07 17:30:08', 0),
(18, 3, 'Anda mengomentari article Cara Menggunakan Bitcoin Untuk Pemula. &quot;$hahaha udah pagi&quot; pada 2018-08-08 00:32:56', '2018-08-07 17:32:56', 0),
(19, 3, 'Anda login dari browser Google Chrome di Windows dengan alamat IP: ::1 pada 2018-08-10 10:33:02', '2018-08-10 03:33:02', 0),
(20, 4, 'Anda login dari browser Google Chrome di Windows dengan alamat IP: ::1 pada 2018-08-10 10:59:08', '2018-08-10 03:59:08', 0),
(21, 3, 'Anda login dari browser Google Chrome di Windows dengan alamat IP: ::1 pada 2018-08-10 11:58:15', '2018-08-10 04:58:15', 0),
(22, 4, 'Anda login dari browser Google Chrome di Windows dengan alamat IP: ::1 pada 2018-08-10 12:10:41', '2018-08-10 05:10:41', 0),
(23, 3, 'Anda login dari browser Google Chrome di Windows dengan alamat IP: ::1 pada 2018-08-10 12:44:52', '2018-08-10 05:44:52', 0),
(24, 3, 'Anda login dari browser Google Chrome di Windows dengan alamat IP: ::1 pada 2018-08-10 13:58:44', '2018-08-10 06:58:44', 0),
(25, 3, 'Anda membuat article Tambah Kategory pada 2018-08-10 13:59:41', '2018-08-10 06:59:41', 0),
(26, 3, 'Anda mengomentari article Tambah Kategory. &quot;$hai&quot; pada 2018-08-10 14:15:20', '2018-08-10 07:15:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT '0',
  `cover` varchar(255) NOT NULL DEFAULT '0',
  `regdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastlog` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `verified` int(1) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '0',
  `banned` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `email`, `password`, `username`, `name`, `avatar`, `cover`, `regdate`, `lastlog`, `verified`, `active`, `banned`) VALUES
(11, 'admin@cicacode.com', '$2y$05$budMWI3zza7mpyMnUVV6/.wcLjJlmK6/LgA0rRqSyPQKCsWoI25B6', 'administrator', 'Administrator', '0', '0', '2018-08-04 18:04:33', '2018-08-10 06:28:37', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `articleid` int(5) NOT NULL,
  `categoryid` int(5) NOT NULL DEFAULT '0',
  `userid` int(5) NOT NULL,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '0',
  `article` text NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `permission` int(1) NOT NULL DEFAULT '1',
  `deletes` int(1) NOT NULL DEFAULT '0',
  `link` varchar(255) NOT NULL,
  `shorten` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`articleid`, `categoryid`, `userid`, `created`, `modified`, `title`, `image`, `article`, `keyword`, `permission`, `deletes`, `link`, `shorten`) VALUES
(2, 5, 4, '2018-08-05 15:02:24', '2018-08-05 15:02:24', 'Menjaga Hewan Peliharaan', '1_1533481344_05082018100224_n.png', 'cara menjaga hewan peliharaan anda cukup mudah', 'hewan, peliharaan', 0, 0, 'menjaga-hewan-peliharaan', '8ksuiu'),
(3, 7, 4, '2018-08-05 15:04:15', '2018-08-05 15:04:15', 'Menjadikan Waktu Facebook Dengan Php', '2_1533481455_05082018100415_n.jpg', 'menjadikan waktu facebook dengan php dan mysql', 'php, mysql', 1, 0, 'menjadikan-waktu-facebook-dengan-php', 'oLSM4E'),
(4, 5, 4, '2018-08-05 15:07:13', '2018-08-05 15:07:13', 'Cara Menggunakan Bitcoin Untuk Pemula', '3_1533481633_05082018100713_n.jpeg', 'belakangan ini uang digital banyak di gandrungi oleh pengangguran', 'bitcoin, uang digital', 0, 0, 'cara-menggunakan-bitcoin-untuk-pemula', 'borDbJ'),
(5, 6, 4, '2018-08-05 15:14:46', '2018-08-05 15:14:46', 'Cara Meretas Situs Dengan Sql Injection', '4_1533482086_05082018101446_n.png', 'cara meretas situs dengan sql injection buat pemula', 'sql injection pemula', 0, 0, 'cara-meretas-situs-dengan-sql-injection', 'ZrU2mr'),
(6, 6, 3, '2018-08-07 15:49:09', '2018-08-07 15:49:09', 'Cara Ngoding Dengan Sublime Text 3', '4_1533656949_07082018104909_n.png', 'cara ngoding dengan sublime text 3 sebenar nya tidak jauh beda dengan text editor lainnya', 'sublime text, text editor', 0, 0, 'cara-ngoding-dengan-sublime-text-3', 'BoEDx7'),
(8, 5, 3, '2018-08-10 06:59:41', '2018-08-10 06:59:41', 'Tambah Kategory', '5_1533884381_10082018015941_n.jpg', 'ini adalah contoh artikel dengan category', 'category', 0, 0, 'tambah-kategory', 'mF5xUs');

-- --------------------------------------------------------

--
-- Table structure for table `badwords`
--

CREATE TABLE `badwords` (
  `badwordid` int(5) NOT NULL,
  `badword` varchar(20) NOT NULL,
  `cleardword` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `categoryid` int(5) NOT NULL,
  `category` varchar(50) NOT NULL,
  `categorylink` varchar(50) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletes` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`categoryid`, `category`, `categorylink`, `active`, `created`, `deletes`) VALUES
(5, 'php mysql', 'php-mysql', 0, '2018-08-10 06:47:12', 0),
(6, 'programming', 'programming', 0, '2018-08-10 06:49:30', 0),
(7, 'software', 'software', 0, '2018-08-10 06:50:13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentid` int(5) NOT NULL,
  `articleid` int(5) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comment` text NOT NULL,
  `userid` int(5) NOT NULL,
  `deletes` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentid`, `articleid`, `created`, `comment`, `userid`, `deletes`) VALUES
(1, 4, '2018-08-05 16:49:26', 'hallo bro', 3, 0),
(2, 4, '2018-08-05 17:23:24', 'post sepi', 3, 0),
(3, 4, '2018-08-05 17:23:35', 'gak gud ea', 3, 0),
(4, 4, '2018-08-06 07:24:50', 'good article', 3, 0),
(5, 4, '2018-08-06 07:38:29', 'jejak om', 4, 0),
(6, 4, '2018-08-06 09:59:13', 'lima di amankan', 3, 0),
(7, 3, '2018-08-07 09:16:50', 'hai', 3, 0),
(8, 3, '2018-08-07 10:08:33', 'recomended', 4, 0),
(9, 4, '2018-08-07 14:13:12', 'rec', 3, 0),
(10, 4, '2018-08-07 15:55:29', 'komentar', 3, 0),
(11, 4, '2018-08-07 15:57:44', 'text komentar', 3, 0),
(12, 4, '2018-08-07 17:03:53', 'tulis komentar', 3, 0),
(13, 2, '2018-08-07 17:20:10', 'satu', 3, 0),
(14, 2, '2018-08-07 17:20:16', 'hallo', 3, 0),
(15, 6, '2018-08-07 17:21:16', 'Cara Ngoding Dengan Sublime Text 3\r\ncara ngoding dengan sublime text 3 sebenarnya', 3, 0),
(16, 6, '2018-08-07 17:21:47', 'komentar tidak tampil', 3, 0),
(17, 6, '2018-08-07 17:27:58', 'komentar untuk sublime text', 3, 0),
(18, 5, '2018-08-07 17:30:08', 'sqli inject', 3, 0),
(19, 4, '2018-08-07 17:32:56', 'hahaha udah pagi', 3, 0),
(20, 8, '2018-08-10 07:15:20', 'hai', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `replys`
--

CREATE TABLE `replys` (
  `replyid` int(5) NOT NULL,
  `commentid` int(5) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reply` text NOT NULL,
  `userid` int(5) NOT NULL,
  `deletes` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replys`
--

INSERT INTO `replys` (`replyid`, `commentid`, `created`, `reply`, `userid`, `deletes`) VALUES
(1, 1, '2018-08-06 09:36:57', 'ini komentar', 3, 0),
(2, 1, '2018-08-06 09:44:17', 'ini komentar 2', 3, 0),
(3, 2, '2018-08-06 09:45:04', 'ia nih gan', 3, 0),
(4, 4, '2018-08-06 09:46:24', 'thanks', 3, 0),
(5, 3, '2018-08-06 09:56:07', 'ea mank', 3, 0),
(6, 3, '2018-08-06 09:56:19', 'submit kasih tread yah', 3, 0),
(7, 5, '2018-08-06 09:58:06', 'silahkan om', 3, 0),
(8, 5, '2018-08-06 09:58:54', 'wkwk', 3, 0),
(9, 6, '2018-08-06 09:59:56', 'aman', 3, 0),
(10, 6, '2018-08-06 09:59:58', 'aman', 3, 0),
(11, 6, '2018-08-06 10:06:43', 'sangat aman', 3, 0),
(12, 1, '2018-08-07 08:25:22', 'asdas', 3, 0),
(13, 7, '2018-08-07 09:25:36', 'balasan hai', 3, 0),
(14, 7, '2018-08-07 09:35:16', 'balasan hai 2', 3, 0),
(15, 7, '2018-08-07 09:48:33', 'balasan hai 3', 4, 0),
(16, 6, '2018-08-07 09:53:48', 'apanya yang aman', 4, 0),
(17, 5, '2018-08-07 13:40:43', 'wkwk land', 3, 0),
(18, 11, '2018-08-07 16:20:19', 'hahaha', 3, 0),
(19, 11, '2018-08-07 16:22:51', 'hahaha', 3, 0),
(20, 11, '2018-08-07 16:40:27', 'ngakak', 4, 0),
(21, 11, '2018-08-07 17:02:30', 'ngukuk', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastlog` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `bio` varchar(255) NOT NULL DEFAULT '0',
  `gender` int(1) NOT NULL DEFAULT '0',
  `born` date NOT NULL DEFAULT '0000-00-00',
  `address` varchar(50) NOT NULL DEFAULT '0',
  `verified` int(1) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '0',
  `banned` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `email`, `password`, `username`, `name`, `avatar`, `cover`, `regdate`, `lastlog`, `bio`, `gender`, `born`, `address`, `verified`, `active`, `banned`) VALUES
(3, 'erwindoq@gmail.com', '$2y$05$rJBBw66jFFJzqpLJHrLvi.tWyAZ5SV6Ef/nbzljvz/Za7Av0W986K', 'erwindoq', 'Erwindo Sianipar', '0', '0', '2018-08-04 18:01:58', '2018-08-10 06:58:44', 'Coding enthusiast. Some one who love learn something new, expecially about web programming and web design. Happy to share about knowledge and learn from other.', 0, '0000-00-00', '0', 1, 1, 0),
(4, 'ucok@gmail.com', '$2y$05$HRKFzxqdnNFMDWIF9YVsFOBV9mzSWObbgzCOPxozfK/AIC8zyWru6', 'ucoksinaga', 'Ular Python', 'two.jpg', '0', '2018-08-05 14:49:06', '2018-08-10 05:10:41', '0', 1, '2000-06-03', 'Pematangsiantar', 0, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activitys`
--
ALTER TABLE `activitys`
  ADD PRIMARY KEY (`activityid`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`articleid`);

--
-- Indexes for table `badwords`
--
ALTER TABLE `badwords`
  ADD PRIMARY KEY (`badwordid`);

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `replys`
--
ALTER TABLE `replys`
  ADD PRIMARY KEY (`replyid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activitys`
--
ALTER TABLE `activitys`
  MODIFY `activityid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `articleid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `badwords`
--
ALTER TABLE `badwords`
  MODIFY `badwordid` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `categoryid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `replys`
--
ALTER TABLE `replys`
  MODIFY `replyid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
