-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 09, 2017 at 04:04 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `huynd006`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_acc`
--

CREATE TABLE `tbl_acc` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_acc` int(11) UNSIGNED NOT NULL,
  `username` varchar(500) NOT NULL,
  `fullname` varchar(700) NOT NULL,
  `email` varchar(700) NOT NULL,
  `intro` text,
  `phone` varchar(20) NOT NULL,
  `img` varchar(1200) DEFAULT NULL,
  `pass` varchar(700) NOT NULL,
  `j_day` date NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(100) NOT NULL,
  `refer` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_acc`
--

INSERT INTO `tbl_acc` (`id`, `id_acc`, `username`, `fullname`, `email`, `intro`, `phone`, `img`, `pass`, `j_day`, `birthday`, `gender`, `refer`) VALUES
(1, 1, 'huynguyenptit', 'Nguyễn Đức Huy', 'huynguyenptit97@gmail.com', 'just i like it!', '0961514896', 'public/upload/img_profile/1488791760Huy 1.jpg', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', '1997-12-22', 'Male', NULL),
(57, 3, 'nguyenduc', 'abc', 'huynguyenptit97@gmail.com.vn.n', NULL, '09615148967', ' ', '202cb962ac59075b964b07152d234b70', '2017-03-09', NULL, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_acc`
--
ALTER TABLE `tbl_acc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_acc`
--
ALTER TABLE `tbl_acc`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
