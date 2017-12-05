-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 05, 2017 at 11:18 AM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.1.12-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpbasic`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `url` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `birthday`, `url`, `address`, `avatar`) VALUES
(45, 'Asian Tech', '123456', 'asiantech@gmail.com', '2013-02-03', 'http://asiantech.vn', 'Da Nang city', 'upload/HnVmB0-k.jpg'),
(47, 'Shin', '123456', 'shin@gmail.com', '2014-12-25', 'http://facebook.com/ndvduc', 'ÄÃ  Náºµng city', 'upload/1.jpg'),
(48, 'User 003', '123456', 'user@gmail.com', '2017-01-01', 'http://chicago.vn', 'Chicago', 'upload/1.jpg'),
(49, 'Class', '123456', 'class@gmail.com', '2017-11-10', 'http://fdfd.cc', 'Ä‘gdg', 'upload/1.jpg'),
(50, 'Admin', 'quai09', 'admin@gmail.com', '2017-01-01', 'http://localhst.com', 'Da Nang', 'upload/a.jpg'),
(52, 'Asian', '123456', 'asf@gmail.co', '2017-01-01', 'http://gd.c', 'dgdg', 'upload/a.jpg'),
(54, 'PHP Basic', 'quai09', 'php@gmail.com', '2017-01-01', 'http://fff.cm', 'dgkdgk', 'upload/a.jpg'),
(56, 'User', 'quai09', 'user@gmail.com', '2017-12-23', 'http://dfdf.c', 'dsds', 'upload/a.jpg'),
(57, 'Ubuntu', 'quai09', 'ubuntu@gmail.com', '2017-12-30', 'http://example.com', 'Da Nang', 'upload/a.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
