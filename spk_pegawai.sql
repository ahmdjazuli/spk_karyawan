-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2019 at 12:39 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_pegawai`
--

-- --------------------------------------------------------

--
-- Table structure for table `bobotkriteria`
--

CREATE TABLE `bobotkriteria` (
  `idbotbot` int(11) NOT NULL,
  `kriteria` varchar(30) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bobotkriteria`
--

INSERT INTO `bobotkriteria` (`idbotbot`, `kriteria`, `bobot`) VALUES
(1, 'Kehadiran', 0.2),
(2, 'Perilaku', 0.3),
(3, 'Kerjasama', 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` char(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` char(12) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telepon`, `jabatan`, `status`) VALUES
('0000000000000001', 'Gerald Burron', 'Lost Mami', '1999-02-12', 'Kevoin jangan', '08971441279', 'Product Specialis', 'Outsourcing'),
('0000000000000002', 'Ahmad Jazuli', 'asem', '1111-11-11', 'Kompas', '08971441279', 'Front End Developer', 'Tetap'),
('0000000000000003', 'Alena Alexia', 'Martapura', '2019-05-31', 'Kompas', '08971441279', 'Interior Design', 'Kontrak'),
('3333333333333333', 'JOJO JOJOJOJO', 'ORAA ORAAA', '1999-12-31', 'Kevoin jangan', '092039180293', 'Chanel Management Staff', 'Kontrak');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `idpenilaian` int(11) NOT NULL,
  `nik` char(16) NOT NULL,
  `idbotbot` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`idpenilaian`, `nik`, `idbotbot`, `nilai`) VALUES
(22, '0000000000000002', 1, 80),
(23, '0000000000000002', 3, 77),
(24, '0000000000000002', 2, 88),
(25, '0000000000000003', 1, 78),
(26, '0000000000000003', 2, 90),
(27, '0000000000000003', 3, 69),
(29, '0000000000000001', 3, 88),
(34, '0000000000000001', 2, 77),
(38, '0000000000000001', 1, 66),
(39, '3333333333333333', 1, 78),
(40, '3333333333333333', 2, 89),
(41, '3333333333333333', 3, 55);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(27, 'ahmad jazuli', 'admin', '$2y$10$.bdV43a.6A3u71QUlJ9otO95uV6T75f4e/S/l8zoJ6.bGSopQ3tE2', 'admin'),
(28, 'Muhammad Adji', 'adji1', '$2y$10$z85OfPvKRPJyEyAPq5aQaegAv4cNU91VHPberOdlwEVD4w9P.r9Ni', 'karyawan'),
(30, 'Adrian Mukhtar', 'yanyan', '$2y$10$txTW3y4IeVRPoP4JREGiDOlfgqYpsoVaxtNRTylfvSrWnFqdqB/Oy', 'pimpinan'),
(31, 'cintaiakuuu', '<b>cintai</b>', '$2y$10$C9SPxATAI.oRhpc/oNnAw.N1ZJfRCJZI3WszlxUHb0AxrMF7WEqQO', 'pimpinan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobotkriteria`
--
ALTER TABLE `bobotkriteria`
  ADD PRIMARY KEY (`idbotbot`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`idpenilaian`),
  ADD KEY `idbotbot` (`idbotbot`),
  ADD KEY `nama` (`nik`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bobotkriteria`
--
ALTER TABLE `bobotkriteria`
  MODIFY `idbotbot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `idpenilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`idbotbot`) REFERENCES `bobotkriteria` (`idbotbot`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`nik`) REFERENCES `karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
