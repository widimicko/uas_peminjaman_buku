-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2022 at 04:55 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuliah_web_uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `id_publisher` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `author`, `image`, `id_publisher`) VALUES
(3, 'Talk About Love', 'Raymond Carver', 'sample cover.jpeg', 1),
(4, 'Sample Book Title', 'Lorem Ipsum', 'sample cover 2.jpeg', 1),
(5, 'Bumi', 'Tere Liye', '9786020332956_Bumi-New-Cover.jpg', 1),
(6, 'Bintang', 'Tere Liye', '1.jpg', 1),
(7, 'Bulan', 'Tere Liye', 'BULAN-TERE-LIYE.jpg', 1),
(8, 'Matahari', 'Tere Liye', 'ID_GPU2016MTH07MATA_B.jpg', 1),
(9, 'Tuhan Ada Di Hatimu', 'Husein Al Hadar', 'Tuhan-Ada-di-Hatimu-1.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `id_number` varchar(255) DEFAULT NULL,
  `domicile` varchar(255) DEFAULT NULL,
  `datebirth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `id_number`, `domicile`, `datebirth`) VALUES
(2, 'Micko', '195', 'Ngawi', '2022-01-04'),
(5, 'Widi', '301', 'Madiun', '2022-01-03'),
(6, 'Jatmiko', '0011', 'Magetan', '2022-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `id_member` int(11) DEFAULT NULL,
  `id_book` int(11) DEFAULT NULL,
  `borrow_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `returned_date` date DEFAULT NULL,
  `charge` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `id_member`, `id_book`, `borrow_date`, `return_date`, `returned_date`, `charge`) VALUES
(6, 5, 3, '2022-01-05', '2022-01-12', '2022-01-05', 0),
(8, 5, 4, '0000-00-00', '0000-00-00', '2022-01-05', 2147483647),
(9, 6, 9, '2022-01-05', '2022-01-12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`id`, `name`) VALUES
(1, 'Grammedia'),
(2, 'Perpus Online'),
(3, 'Cetak Buku'),
(4, 'Karyaku'),
(6, 'Penerbit Handal');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `id`) VALUES
('admin@admin.com', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publisher` (`id_publisher`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member` (`id_member`),
  ADD KEY `book` (`id_book`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `publisher` FOREIGN KEY (`id_publisher`) REFERENCES `publisher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `book` FOREIGN KEY (`id_book`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member` FOREIGN KEY (`id_member`) REFERENCES `member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
