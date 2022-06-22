-- pnumberMyAdmin SQL Dump
-- version 4.7.4
-- https://www.pnumbermyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 22, 2018 at 09:29 AM
-- Server version: 10.1.28-MariaDB
-- Pnumber Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `setyongr`
--

-- --------------------------------------------------------

--
-- Table structure for table `Biodata`
--

CREATE TABLE `Biodata` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Biodata`
--

INSERT INTO `Biodata` (`id`, `name`, `address`, `number`) VALUES
(2, 'Joni Subarjo', 'Jl. Mawar No. 29', '08767565665'),
(3, 'Jokowi', 'Jl. Kenanga No. 33', '0554454545'),
(4, 'Slamet', 'Jl. Slamet No. 1', '0765566565'),
(5, 'Mike Portnoy', 'Jl. Sidaurip No. 22', '0855665666');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
-- 

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Web Administrator', 'arifamb@gmail.com', '$2y$10$nb6otmA4BXPb6jUnF0wCJO4qqRj0NdwKXw/UdynynOvb.PHqAOG0C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Biodata`
--
ALTER TABLE `Biodata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Biodata`
--
ALTER TABLE `Biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
