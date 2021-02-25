-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 24, 2021 at 07:01 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lrg`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_announcements`
--

CREATE TABLE `tbl_announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_announcements`
--

INSERT INTO `tbl_announcements` (`id`, `title`, `body`, `date`) VALUES
(21, 'New Website!', 'Check out our new website!  Developed by Gavin and Nate.', '2021-02-23 20:56:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_content`
--

CREATE TABLE `tbl_content` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `path` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `caption` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_content`
--

INSERT INTO `tbl_content` (`id`, `name`, `path`, `date_added`, `caption`) VALUES
(7, 'junior_hero.jpg', 'junior_hero.jpg', '2021-02-24 18:19:10', 'teaching the new batch of youth referees'),
(8, 'skates_hero.jpg', 'skates_hero.jpg', '2021-02-24 18:19:33', 'Look at these cool new skates'),
(9, 'ref_training.jpg', 'ref_training.jpg', '2021-02-24 18:19:50', 'Referees always have fun together on the ice.'),
(10, 'rink.jpg', 'rink.jpg', '2021-02-24 18:20:04', 'next step is the NHL. '),
(11, 'dadbook.jpg', 'dadbook.jpg', '2021-02-24 18:20:20', 'Learning starts early. '),
(12, 'heroImg.jpg', 'heroImg.jpg', '2021-02-24 18:20:49', 'Family Fun!'),
(13, 'netskates.jpg', 'netskates.jpg', '2021-02-24 18:20:58', 'always need gear to play the game.'),
(14, 'outdoorrink.jpg', 'outdoorrink.jpg', '2021-02-24 18:21:06', 'Sometimes its good to go outside to play!'),
(15, 'speedWow.jpg', 'speedWow.jpg', '2021-02-24 18:21:13', 'Gotta keep up with the players out there. I am spe...'),
(16, 'threeRefs.jpg', 'threeRefs.jpg', '2021-02-24 18:21:20', 'Building comradery is essential to a good team. ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` mediumint(8) UNSIGNED NOT NULL,
  `user_fname` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_ip` varchar(50) NOT NULL DEFAULT 'no',
  `user_success_date` datetime NOT NULL,
  `user_attempts` int(11) NOT NULL DEFAULT '0',
  `user_total_logins` int(11) NOT NULL DEFAULT '0',
  `user_locked` tinyint(1) NOT NULL DEFAULT '0',
  `user_level` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_fname`, `user_name`, `user_pass`, `user_email`, `user_date`, `user_ip`, `user_success_date`, `user_attempts`, `user_total_logins`, `user_locked`, `user_level`) VALUES
(36, 'Admin', 'admin', 'password', 'nate@example.com', '2021-02-17 00:14:57', '127.0.0.1', '2021-02-24 16:28:12', 0, 11, 0, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_announcements`
--
ALTER TABLE `tbl_announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_content`
--
ALTER TABLE `tbl_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_announcements`
--
ALTER TABLE `tbl_announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_content`
--
ALTER TABLE `tbl_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
