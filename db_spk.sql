-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2023 at 06:07 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `bobot`
--

CREATE TABLE `bobot` (
  `id_bobot` int(11) NOT NULL,
  `tingkat_kepentingan` varchar(120) NOT NULL,
  `nilai_bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bobot`
--

INSERT INTO `bobot` (`id_bobot`, `tingkat_kepentingan`, `nilai_bobot`) VALUES
(1, 'sangan baik', 5),
(2, 'baik', 4),
(3, 'cukup', 3),
(4, 'kurang baiik', 2),
(5, 'sangat kurang', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `rekomendasi_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `tanggal`, `id_user`, `rekomendasi_jurusan`) VALUES
(1, '2023-10-16 05:07:30', '6', 'Teknik Jaringan Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_alternatif` int(11) NOT NULL,
  `kode_jurusan` varchar(50) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_alternatif`, `kode_jurusan`, `jurusan`) VALUES
(1, 'A1', 'Teknik Jaringan Komputer'),
(2, 'A2', 'Rekayasa Perangkat Lunak'),
(3, 'A3', 'Multimedia'),
(6, 'A6', 'Administrasi Perkantoran'),
(7, 'A7', 'Pemasaran'),
(8, 'A8', 'Akuntansi');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `bobot_preferensi` varchar(5) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `tipe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `bobot_preferensi`, `nama_kriteria`, `tipe`) VALUES
(1, 'c1', 'Bahasa Inggris (C1)', 'Benefit'),
(2, 'c2', 'Bahasa Indonesia (C2)', 'Benefit'),
(3, 'c3', 'Matematika (C3)', 'Benefit'),
(4, 'c4', 'IPA (C4)', 'Benefit'),
(5, 'c5', 'Rekayasa Perangkat Lunak (C5)', 'benefit'),
(6, 'c6', 'Teknik Komputer Jaringan (C6)', 'benefit'),
(7, 'c7', 'Multimedia (C7)', 'benefit'),
(8, 'c8', 'Administrasi Perkantoran (C8)', 'benefit'),
(9, 'c9', 'Akuntansi (C9)', 'benefit'),
(10, 'c10', 'Pemasaran (C10)', 'benefit');

-- --------------------------------------------------------

--
-- Table structure for table `proses_hitung`
--

CREATE TABLE `proses_hitung` (
  `id_proses_hitung` int(11) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `kode_jurusan` varchar(50) NOT NULL,
  `w1` varchar(10) NOT NULL,
  `w2` varchar(10) NOT NULL,
  `w3` varchar(10) NOT NULL,
  `w4` varchar(10) NOT NULL,
  `w5` varchar(5) NOT NULL,
  `w6` varchar(5) NOT NULL,
  `w7` varchar(5) NOT NULL,
  `w8` varchar(5) NOT NULL,
  `w9` varchar(5) NOT NULL,
  `w10` varchar(5) NOT NULL,
  `s` varchar(10) NOT NULL,
  `v` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL,
  `kode_jurusan` varchar(10) NOT NULL,
  `c1` varchar(5) NOT NULL,
  `c2` varchar(5) NOT NULL,
  `c3` varchar(5) NOT NULL,
  `c4` varchar(5) NOT NULL,
  `c5` varchar(5) NOT NULL,
  `c6` varchar(5) NOT NULL,
  `c7` varchar(5) NOT NULL,
  `c8` varchar(5) NOT NULL,
  `c9` varchar(5) NOT NULL,
  `c10` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_sub_kriteria`, `kode_jurusan`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `c7`, `c8`, `c9`, `c10`) VALUES
(1, 'A1', '3', '4', '4', '5', '0', '100', '0', '0', '0', '0'),
(2, 'A2', '3', '5', '3', '5', '100', '0', '0', '0', '0', '0'),
(3, 'A3', '3', '5', '4', '3', '0', '0', '100', '0', '0', '0'),
(5, 'A6', '5', '5', '2', '1', '0', '0', '0', '100', '0', '0'),
(7, 'A8', '5', '3', '2', '5', '0', '0', '0', '0', '100', '0'),
(8, 'A7', '5', '5', '2', '3', '0', '0', '0', '0', '0', '100');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(5, 'Fahmi andrian', 'fahmi@gmail.com', 'default.jpg', '$2y$10$DdIximdSILjuA7blwvmjz.Vru0/R9eTQLEyvPXhOu2ZFED6t9pCCW', 1, 1, 1683012271),
(6, 'Wahyu', 'Wahyu@gmail.com', 'default.jpg', '$2y$10$azhbP39o3JX54CyrzLRmCeoo3G1dJ7VdM.y1qPaNDblScUwuamQJu', 2, 1, 1683114604),
(7, 'marfel crisly', 'marfel@gmail.com', 'default.jpg', '$2y$10$E0yTsYnzA.rjK6Ez1C7o..1Knp./xRb6ueje9HwV6EUF.NprhmKvW', 3, 1, 1683700354),
(8, 'Arief Maulana', 'arief@gmail.com', 'default.jpg', '$2y$10$JBimcGRs6XDSHxD.8CEifu8T8TuLIPY8LkqnYPd9psq9b0L1ryssy', 3, 1, 1683705104),
(9, 'firmansyah', 'firman@gmail.com', 'default.jpg', '$2y$10$lB8ScQ.qZPc8qw0dYNKCle9QvDha/NNR3RA4gut6Xvtd/YZ3OJrMu', 2, 1, 1686541872);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(5, 1, 3),
(25, 1, 4),
(27, 2, 4),
(29, 1, 5),
(30, 3, 5),
(31, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Admin SPK'),
(5, 'SPK');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Developer'),
(2, 'Admin'),
(3, 'Users');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 0),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-th', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open ', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(12, 4, 'Alternatif', 'controlleralternatif', 'fas fa-hamburger', 1),
(13, 4, 'Kriteria', 'kriteria', 'fas fa-warehouse', 1),
(14, 4, 'Bobot', 'controllerbobot', 'fas fa-stream', 1),
(15, 4, 'SubKriteria', 'controllersubkriteria', 'fas fa-hamburger', 1),
(16, 5, 'Hasil', 'controllerhasil', 'fas fa-poll-h', 1),
(18, 4, 'Dashboard', 'controlleradmin', 'fas fa-fw fa-tachometer-alt', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id_bobot`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `proses_hitung`
--
ALTER TABLE `proses_hitung`
  ADD PRIMARY KEY (`id_proses_hitung`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bobot`
--
ALTER TABLE `bobot`
  MODIFY `id_bobot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `proses_hitung`
--
ALTER TABLE `proses_hitung`
  MODIFY `id_proses_hitung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
