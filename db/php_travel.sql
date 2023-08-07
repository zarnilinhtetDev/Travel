-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2022 at 06:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `image`, `created_at`, `update_at`) VALUES
(19, 'Yangon', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat in deserunt autem architecto consectetur cupiditate culpa quae repellat perspiciatis quaerat, soluta eius, atque, laudantium ab dolores et recusandae numquam deleniti facere. Veritatis iusto', '633ba00a236e2pexels-photo-1137476.jpeg', '2022-10-04 02:52:58', '2022-10-04 02:52:58'),
(20, 'Mandalay', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat in deserunt autem architecto consectetur cupiditate culpa quae repellat perspiciatis quaerat, soluta eius, atque, laudantium ab dolores et recusandae numquam deleniti facere. Veritatis iusto', '633ba0845c26dpexels-photo-8002517.jpeg', '2022-10-04 02:55:00', '2022-10-04 02:55:00'),
(21, 'Bangkok', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat in deserunt autem architecto consectetur cupiditate culpa quae repellat perspiciatis quaerat, soluta eius, atque, laudantium ab dolores et recusandae numquam deleniti facere. Veritatis iusto', '633ba0aa6b3d6pexels-photo-2078254.jpeg', '2022-10-04 02:55:38', '2022-10-04 02:55:38'),
(22, 'Taunggyi', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat in deserunt autem architecto consectetur cupiditate culpa quae repellat perspiciatis quaerat, soluta eius, atque, laudantium ab dolores et recusandae numquam deleniti facere. Veritatis iusto', '633ba0ba7f243pexels-photo-3372578.jpeg', '2022-10-04 02:55:54', '2022-10-04 02:55:54'),
(23, 'Bagan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat in deserunt autem architecto consectetur cupiditate culpa quae repellat perspiciatis quaerat, soluta eius, atque, laudantium ab dolores et recusandae numquam deleniti facere. Veritatis iusto', '633ba0c4ed48aistockphoto-481873894-612x612.jpg', '2022-10-04 02:56:04', '2022-10-04 02:56:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `update_at`) VALUES
(10, 'momo', 'momo@gmail.com', '$2y$10$Wyrl6QeYN0X5ypTCDGNy5.feO3zDDYk0XJQxLLvSFMtbSL0X7s7gq', '2022-09-16 05:03:43', '2022-09-16 05:03:43'),
(11, 'mgmg', 'mgmg@gmail.com', '$2y$10$fwqhs3PfTYPgflm.WvDlM.DEU2p7fCekwiexe.//ZtmmkvucynpOK', '2022-10-04 03:41:11', '2022-10-04 03:41:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
