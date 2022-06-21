-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 22, 2018 at 09:29 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

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
-- Table structure for table `tbBiodata`
--

CREATE TABLE `Biodata` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbBiodata`
--

INSERT INTO `tbBiodata` (`id`, `nama`, `alamat`, `hp`) VALUES
(2, 'Joni Subarjo', 'Jl. Mawar No. 29', '08767565665'),
(3, 'Jokowi', 'Jl. Kenanga No. 33', '0554454545'),
(4, 'Slamet', 'Jl. Slamet No. 1', '0765566565'),
(5, 'Mike Portnoy', 'Jl. Sidaurip No. 22', '0855665666');

-- --------------------------------------------------------

--
-- Table structure for table `tbLogin`
--

CREATE TABLE `tbLogin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbLogin`
-- 

INSERT INTO `tbLogin` (`id`, `nama`, `email`, `password`) VALUES
(1, 'Web Administrator', 'arifamb@gmail.com', '$2y$10$nb6otmA4BXPb6jUnF0wCJO4qqRj0NdwKXw/UdynynOvb.PHqAOG0C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbBiodata`
--
ALTER TABLE `tbBiodata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbLogin`
--
ALTER TABLE `tbLogin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbBiodata`
--
ALTER TABLE `tbBiodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbLogin`
--
ALTER TABLE `tbLogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
