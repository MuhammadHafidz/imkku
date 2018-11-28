-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2018 at 01:23 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kemah`
--

-- --------------------------------------------------------

--
-- Table structure for table `destinasi`
--

CREATE TABLE `destinasi` (
  `ID_DESTINASI` int(11) NOT NULL,
  `NAMA` varchar(1024) DEFAULT NULL,
  `DESKRIPSI` varchar(1024) DEFAULT NULL,
  `HARGA` int(11) DEFAULT NULL,
  `LOKASI` varchar(1024) DEFAULT NULL,
  `ALAMAT` varchar(1024) DEFAULT NULL,
  `KOTA` varchar(1024) DEFAULT NULL,
  `PROVINSI` varchar(1024) DEFAULT NULL,
  `GAMBAR` varchar(1024) DEFAULT NULL,
  `TANGGAL` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `RATE` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`ID_DESTINASI`, `NAMA`, `DESKRIPSI`, `HARGA`, `LOKASI`, `ALAMAT`, `KOTA`, `PROVINSI`, `GAMBAR`, `TANGGAL`, `RATE`) VALUES
(1, 'Gunung Bromo', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ', 150000, 'Gunung', 'Lumajang malang probolinggo', 'Lumajang', 'JAWA TIMUR', '', '2018-11-15 06:00:39', 5);

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `ID_GAMBAR` int(11) NOT NULL,
  `ID_DESTINASI` int(11) NOT NULL,
  `JUDUL_GAMBAR` varchar(1024) DEFAULT NULL,
  `LOKASI_GAMBAR` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`ID_GAMBAR`, `ID_DESTINASI`, `JUDUL_GAMBAR`, `LOKASI_GAMBAR`) VALUES
(1, 1, 'Bromo-1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `perlengkapan`
--

CREATE TABLE `perlengkapan` (
  `ID_PERLENGKAPAN` int(11) NOT NULL,
  `ID_DESTINASI` int(11) DEFAULT NULL,
  `NAMA_PERLENGKAPAN` varchar(1024) DEFAULT NULL,
  `HARGA` decimal(11,0) DEFAULT NULL,
  `GAMBAR` varchar(1024) DEFAULT NULL,
  `DESKRIPSI` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perlengkapan`
--

INSERT INTO `perlengkapan` (`ID_PERLENGKAPAN`, `ID_DESTINASI`, `NAMA_PERLENGKAPAN`, `HARGA`, `GAMBAR`, `DESKRIPSI`) VALUES
(1, NULL, 'Tenda 4x6', '12000', NULL, 'tenda 12000 per malam');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(1024) NOT NULL,
  `password` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('admin', 'admin\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`ID_DESTINASI`),
  ADD UNIQUE KEY `DESTINASI_PK` (`ID_DESTINASI`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`ID_GAMBAR`),
  ADD UNIQUE KEY `GAMBAR_PK` (`ID_GAMBAR`),
  ADD KEY `HAVE_FK` (`ID_DESTINASI`);

--
-- Indexes for table `perlengkapan`
--
ALTER TABLE `perlengkapan`
  ADD PRIMARY KEY (`ID_PERLENGKAPAN`),
  ADD UNIQUE KEY `PERLENGKAPAN_PK` (`ID_PERLENGKAPAN`),
  ADD KEY `MENYEWAKAN_FK` (`ID_DESTINASI`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destinasi`
--
ALTER TABLE `destinasi`
  MODIFY `ID_DESTINASI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `ID_GAMBAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `perlengkapan`
--
ALTER TABLE `perlengkapan`
  MODIFY `ID_PERLENGKAPAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gambar`
--
ALTER TABLE `gambar`
  ADD CONSTRAINT `FK_GAMBAR_HAVE_DESTINAS` FOREIGN KEY (`ID_DESTINASI`) REFERENCES `destinasi` (`ID_DESTINASI`);

--
-- Constraints for table `perlengkapan`
--
ALTER TABLE `perlengkapan`
  ADD CONSTRAINT `FK_PERLENGK_MENYEWAKA_DESTINAS` FOREIGN KEY (`ID_DESTINASI`) REFERENCES `destinasi` (`ID_DESTINASI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
