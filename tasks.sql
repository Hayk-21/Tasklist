-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 07, 2021 at 07:50 PM
-- Server version: 10.1.44-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ownframe`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `task` text NOT NULL,
  `edited` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `email`, `task`, `edited`, `status`, `date`) VALUES
(2, 'first', 'asdasda@gmail.com', 'asdasdasdasda', 1, 1, '0000-00-00 00:00:00'),
(3, 'hay', 'lkasd@gmail.com', 'asd;jasdjnqaksedasdasd', 0, 1, '0000-00-00 00:00:00'),
(11, 'Hayk Sakoyan', 'sakoyanhayk@gmail.com', 'qweasdqweasdqweasd', 0, 1, '0000-00-00 00:00:00'),
(12, 'qweqweqwe', 'qweqwe@gmail.com', 'qweqweqweqwe', 0, 1, '0000-00-00 00:00:00'),
(13, 'asdasdasdasdas', 'saschabg13@gmail.com', 'sqweqweqwe', 0, 1, '0000-00-00 00:00:00'),
(15, 'error', 'sakoyanhayk@gmail.com', 'asdasdasdasdasdasdasd', 1, 1, '0000-00-00 00:00:00'),
(17, 'sasd', 'edit@gmail.conm', 'asdqwedsadsadasd\r\n', 0, 0, '0000-00-00 00:00:00'),
(18, 'asd', 'asdasda@gmail.com', 'asdasdasdasdasdasdasd', 0, 0, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
