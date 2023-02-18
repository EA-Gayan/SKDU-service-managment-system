-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2023 at 03:17 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kdu_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `res_id` int(10) NOT NULL,
  `res_service` varchar(100) NOT NULL,
  `res_index` varchar(50) NOT NULL,
  `res_email` varchar(50) NOT NULL,
  `res_tel` int(15) NOT NULL,
  `res_date` date NOT NULL,
  `res_slot` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`res_id`, `res_service`, `res_index`, `res_email`, `res_tel`, `res_date`, `res_slot`) VALUES
(0, 'Library A', 'D-BIT-20-0040', '37-it-0040@kdu.ac.lk', 777444333, '2023-02-21', '09:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `user_name`, `user_rating`, `user_review`, `datetime`) VALUES
(6, 'John Smith', 4, 'Nice Product, Value for money', 1621935691),
(7, 'Peter Parker', 5, 'Nice Product with Good Feature.', 1621939888),
(8, 'Donna Hubber', 1, 'Worst Product, lost my money.', 1621940010),
(9, 'Gayan', 5, 'Good Service', 1676715687);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(32) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(1, 'Gym', 'service_category_998.png', 'Yes', 'Yes'),
(2, 'Canteen', 'service_category_209.png', 'Yes', 'Yes'),
(3, 'MI', 'service_category_793.png', 'Yes', 'Yes'),
(4, 'Library', 'service_category_813.png', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `id` int(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `otime` time NOT NULL,
  `ctime` time NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `category_id` int(50) NOT NULL,
  `featured` varchar(50) NOT NULL,
  `active` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`id`, `title`, `description`, `otime`, `ctime`, `image_name`, `category_id`, `featured`, `active`) VALUES
(1, 'Canteen 1', 'We provide delicious foods !', '05:00:00', '22:00:00', 'service_category565.jfif', 0, 'Yes', 'Yes'),
(2, 'Gym B', 'Hard work', '15:00:00', '19:30:00', 'service_category_29.png', 0, 'Yes', 'Yes'),
(3, 'Canteen 2', '', '06:30:00', '22:30:00', 'service_category_184.jfif', 2, 'Yes', 'Yes'),
(4, 'Library A', '', '09:00:00', '19:00:00', 'service_category_863.jpg', 4, 'Yes', 'Yes'),
(5, 'Main  Gym', 'The body achieves what the mind believes.', '15:30:00', '19:00:00', 'service_category_33.jfif', 0, 'Yes', 'Yes'),
(6, 'Main MI', '24 Service', '00:00:00', '00:00:00', 'service_category_579.jfif', 3, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(0, 'admin', 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
