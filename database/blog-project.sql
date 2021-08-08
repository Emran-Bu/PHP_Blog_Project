-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2021 at 05:37 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(150) NOT NULL,
  `admin_pass` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(1, 'Emran', 'emran@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'Emran', 'emran@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(255) NOT NULL,
  `cat_name` varchar(60) NOT NULL,
  `cat_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_desc`) VALUES
(40, 'html', 'To save a page for later, click the Bookmark icon'),
(41, 'css', 'To save a page for later, click the Bookmark icon');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(255) NOT NULL,
  `post_title` varchar(150) NOT NULL,
  `post_content` longtext NOT NULL,
  `post_img` varchar(255) NOT NULL,
  `post_ctg` int(255) NOT NULL,
  `post_author` varchar(60) NOT NULL,
  `post_date` date NOT NULL,
  `post_comment_count` int(255) NOT NULL,
  `post_summary` varchar(200) NOT NULL,
  `post_tag` varchar(255) NOT NULL,
  `post_status` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_content`, `post_img`, `post_ctg`, `post_author`, `post_date`, `post_comment_count`, `post_summary`, `post_tag`, `post_status`) VALUES
(18, 'Bangladesh', 'The requested URL was<br>not found on this server. ', '01.jpg', 40, 'Admin', '2021-08-06', 3, 'Nullam at quam ut lacus aliquam t', 'Facebook', 1),
(19, 'Hello World', 'The requested URL was<br>not found on this server.        ', '1 (39).JPG', 40, 'Admin', '2021-08-06', 3, 'Nullam at quam ut lacus aliquam t', 'Instagram', 1),
(20, 'Emran Hasan', 'The requested URL was<br>not found on this server. ', 'bh_Ni710602.jpg', 40, 'Admin', '2021-08-06', 3, 'Nullam at quam ut lacus aliquam t', 'Facebook', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `post_with_ctg`
-- (See below for the actual view)
--
CREATE TABLE `post_with_ctg` (
`post_id` int(255)
,`post_title` varchar(150)
,`post_content` longtext
,`post_img` varchar(255)
,`post_author` varchar(60)
,`post_date` date
,`post_comment_count` int(255)
,`post_summary` varchar(200)
,`post_tag` varchar(255)
,`post_status` tinyint(3)
,`cat_id` int(255)
,`cat_name` varchar(60)
);

-- --------------------------------------------------------

--
-- Structure for view `post_with_ctg`
--
DROP TABLE IF EXISTS `post_with_ctg`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `post_with_ctg`  AS SELECT `posts`.`post_id` AS `post_id`, `posts`.`post_title` AS `post_title`, `posts`.`post_content` AS `post_content`, `posts`.`post_img` AS `post_img`, `posts`.`post_author` AS `post_author`, `posts`.`post_date` AS `post_date`, `posts`.`post_comment_count` AS `post_comment_count`, `posts`.`post_summary` AS `post_summary`, `posts`.`post_tag` AS `post_tag`, `posts`.`post_status` AS `post_status`, `category`.`cat_id` AS `cat_id`, `category`.`cat_name` AS `cat_name` FROM (`posts` join `category` on(`posts`.`post_ctg` = `category`.`cat_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
