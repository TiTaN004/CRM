-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2024 at 08:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `lead`
--

CREATE TABLE `lead` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `state` varchar(50) NOT NULL,
  `source` varchar(50) NOT NULL,
  `Inquiry` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lead`
--

INSERT INTO `lead` (`id`, `fname`, `lname`, `email`, `phone`, `state`, `source`, `Inquiry`, `status`) VALUES
(1, 'manan ', 'rathod', 'mananrathod45@gmail.com', 123456789, 'gujarat', 'whatsapp', 'iphone', 'Not interested'),
(2, 'jeet', 'ramoliya', 'jeet@gmail.com', 123456788, 'gujarat', 'indiamart', 'watch', 'Ordered'),
(3, 'vatsal', 'solanki', 'vatsal@gmail.com', 123456789, 'daman', 'indiamart', 'mac book', 'Hold'),
(4, 'harshil', 'shingala', 'harshil1@gmail.com', 123456789, 'gujarat', 'website', 'iphone', 'Interested'),
(5, 'divyesh', 'sarapdadia', 'divyesh@gmail.com', 123456789, 'gujarat', 'indiamart', 'iphone', 'Ordered'),
(6, 'shashank', 'sidpara', 'shashank@gmail.com', 123456789, 'gujarat', 'website', 'mac book', 'inquiry');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img_url` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `img_url`, `description`) VALUES
(1, 'Iphone', 'iphone.jpg', 'iphone 15 pro, black color, 128gb storage'),
(2, 'Ipad', 'ipad.jpg', 'Ipad 10th Gen, color blue, 64gb'),
(3, 'MacBook Pro', 'macbook pro.jpg', 'MacBook Pro Max, color space gray, 512gb ssd'),
(4, 'watch', 'watch.jpg', 'apple watch ultra 2, orange strap');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `no` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `num` int(10) NOT NULL,
  `count` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`no`, `uname`, `email`, `pass`, `num`, `count`) VALUES
(1, 'manan rathod', 'manan@gmail.com', '$2y$10$NigT7m5//5QUIvLbR12WU.o7fbXm64rVaREq7N.uk45fr0vZzFRUe', 123456789, 'india'),
(2, 'manan', 'mananrathod45@gmail.com', '$2y$10$Q2xJruxrGlnl034RPdBdXOQnKyf2/mzJYqA1mSLv3KbAy1h17Oa/6', 123456, 'india');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lead`
--
ALTER TABLE `lead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lead`
--
ALTER TABLE `lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
