-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2024 at 09:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_absensi`
--
CREATE DATABASE IF NOT EXISTS `sistem_absensi` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `sistem_absensi`;

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `id_jadwal` int(11) DEFAULT NULL,
  `tgl_masuk` date NOT NULL,
  `waktu_hadir` time DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `nim` char(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `id_jadwal`, `tgl_masuk`, `waktu_hadir`, `status`, `keterangan`, `nim`) VALUES
(7, 9, '2024-05-05', '11:42:51', 1, NULL, '0903138227177'),
(9, 9, '2024-05-05', '12:21:10', 1, NULL, '0903138227177'),
(11, 9, '2024-05-05', '13:07:36', 1, NULL, '0903138227177'),
(12, 9, '2024-05-05', '14:05:25', 1, NULL, '0903138227177');

-- --------------------------------------------------------

--
-- Table structure for table `admin_access`
--

CREATE TABLE `admin_access` (
  `id` int(11) NOT NULL,
  `id_access` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_access`
--

INSERT INTO `admin_access` (`id`, `id_access`) VALUES
(1, 'admin'),
(1, 'dosen'),
(1, 'mahasiswa'),
(2, 'dosen'),
(3, 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `NIP` char(18) NOT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`NIP`, `nama`, `user_id`) VALUES
('111907286166661789', 'Rudi Sanjaya, S.Kom, M.Kom.', 2),
('123456789012345678', 'Dr. Ermatita, M.Kom.', NULL),
('129748032756938420', 'Endang Lestari Ruskan, M.Kom.', NULL),
('278312639834758324', 'Apriyansyah Putra, M.Kom.', NULL),
('412316714104032800', 'Nabila Rizky Oktadini, M.Kom.', NULL),
('543124635879867832', 'Dinda Lestarini, M.Kom.', NULL),
('562347901078264812', 'Putri Eka Sevtiyuni, M.Kom.', NULL),
('624986916198878109', 'Purwita Sari, S.SI., M.Kom.', NULL),
('672346812894712700', 'Mgs. Afriyan Firdaus, M.Kom.', NULL),
('920174012701248732', 'Allsela Meiriza, M.Kom', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `nip` char(18) DEFAULT NULL,
  `id_mk` char(5) DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `hari` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_kelas`, `nip`, `id_mk`, `jam_masuk`, `jam_keluar`, `hari`) VALUES
(9, 3, '111907286166661789', 'SI001', '12:00:00', '14:00:00', 'Senin'),
(11, 3, '412316714104032800', 'SI232', '07:00:00', '09:00:00', 'Senin');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(3, 'SIREG 4A'),
(4, 'SIREG 4B'),
(5, 'SIREG 4C');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` char(14) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `nama`, `id_kelas`, `user_id`) VALUES
('0903138227177', 'Adzka Fahmi', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `master_access`
--

CREATE TABLE `master_access` (
  `id_access` varchar(10) NOT NULL,
  `nama` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `master_access`
--

INSERT INTO `master_access` (`id_access`, `nama`) VALUES
('admin', 'admin_acc'),
('dosen', 'dosen_acc'),
('mahasiswa', 'mhs_acc');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` char(5) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `nip` char(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `nama`, `nip`) VALUES
('SI001', 'Praktikum Basis Data', '111907286166661789'),
('SI085', 'Literasi Digital', '111907286166661789'),
('SI124', 'Basis Data II', '123456789012345678'),
('SI232', 'Pengantar User Experince', '412316714104032800'),
('SI345', 'Manajemen Strategis', '278312639834758324'),
('SI398', 'Analisis dan Perancangan Siste', '672346812894712700'),
('SI456', 'Konsep Sistem Informasi', '129748032756938420'),
('SI954', 'Algoritma dan Struktur Data La', '412316714104032800');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'dosen1', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'Mahasiswa', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indexes for table `admin_access`
--
ALTER TABLE `admin_access`
  ADD KEY `admin_access_ibfk_1` (`id_access`),
  ADD KEY `admin_access_ibfk_2` (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `dosen_ibfk_1` (`user_id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `jadwal_ibfk_1` (`id_kelas`),
  ADD KEY `jadwal_ibfk_2` (`nip`),
  ADD KEY `jadwal_ibfk_3` (`id_mk`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD UNIQUE KEY `nama_kelas` (`nama_kelas`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `mahasiswa_ibfk_1` (`id_kelas`);

--
-- Indexes for table `master_access`
--
ALTER TABLE `master_access`
  ADD PRIMARY KEY (`id_access`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matakuliah_ibfk_1` (`nip`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin_access`
--
ALTER TABLE `admin_access`
  ADD CONSTRAINT `admin_access_ibfk_1` FOREIGN KEY (`id_access`) REFERENCES `master_access` (`id_access`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_access_ibfk_2` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `dosen` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`id_mk`) REFERENCES `matakuliah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD CONSTRAINT `matakuliah_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `dosen` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
