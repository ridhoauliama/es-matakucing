-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2022 at 07:32 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_matakucing`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Diagnosa'),
(3, 'Gejala'),
(4, 'Penyakit'),
(5, 'Pengetahuan'),
(6, 'Laporan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gejala`
--

CREATE TABLE `tbl_gejala` (
  `id_gejala` int(11) NOT NULL,
  `kode_gejala` char(3) NOT NULL,
  `nama_gejala` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gejala`
--

INSERT INTO `tbl_gejala` (`id_gejala`, `kode_gejala`, `nama_gejala`) VALUES
(1, 'G01', 'Mata kucing berair'),
(2, 'G02', 'Kucing sensitif terhadap cahaya'),
(3, 'G03', 'Mata kucing terlihat bengkak atau memerah'),
(4, 'G04', 'Nafsu makan menurun'),
(5, 'G05', 'Kucing terlihat lesu'),
(6, 'G06', 'Infeksi pernafasan seperti pilek'),
(7, 'G07', 'Mata kucing mengeluarkan kotoran');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hasil_diagnosa`
--

CREATE TABLE `tbl_hasil_diagnosa` (
  `id_hasil` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `nilaicf` float NOT NULL,
  `kode_penyakit` char(3) NOT NULL,
  `kode_gejala` varchar(256) NOT NULL,
  `nilai_gejala` varchar(256) NOT NULL,
  `waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hasil_diagnosa`
--

INSERT INTO `tbl_hasil_diagnosa` (`id_hasil`, `nama`, `alamat`, `nilaicf`, `kode_penyakit`, `kode_gejala`, `nilai_gejala`, `waktu`) VALUES
(1, 'Ridho Ganteng', 'Tanjung Morawa', 0.6328, 'P03', 'G01G02G03G04G05G06G07', '1.00.01.01.01.01.00.0', '2022-05-27'),
(2, 'Test Case 2', 'Medan', 0.6328, 'P03', 'G01G02G03G04G05G06G07', '1.00.01.01.01.01.00.0', '2022-05-27'),
(3, 'Test Case 3', 'Jln. Karya Wisata', 0.6328, 'P03', 'G01G02G03G04G05G06G07', '1.00.01.01.01.01.00.0', '2022-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengetahuan`
--

CREATE TABLE `tbl_pengetahuan` (
  `id` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL,
  `cf_gejala` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengetahuan`
--

INSERT INTO `tbl_pengetahuan` (`id`, `id_penyakit`, `id_gejala`, `cf_gejala`) VALUES
(1, 1, 1, 0.15),
(2, 1, 2, 0.03),
(3, 1, 3, 0.24),
(4, 2, 2, 0.05),
(5, 2, 4, 0.16),
(6, 2, 5, 0.12),
(7, 3, 4, 0.46),
(8, 3, 6, 0.32),
(9, 4, 1, 0.1),
(10, 3, 8, 0.6),
(11, 4, 8, 0.6),
(12, 4, 9, 0.8),
(13, 5, 10, 0.4),
(14, 5, 11, 0.6),
(15, 4, 4, 0.2),
(16, 4, 7, 0.17),
(17, 5, 1, 0.23),
(18, 5, 3, 0.3),
(19, 5, 4, 0.13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penyakit`
--

CREATE TABLE `tbl_penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `kode_penyakit` char(3) NOT NULL,
  `nama_penyakit` varchar(100) NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penyakit`
--

INSERT INTO `tbl_penyakit` (`id_penyakit`, `kode_penyakit`, `nama_penyakit`, `solusi`) VALUES
(1, 'P01', 'Konjungtivis', 'Jika disebabkan oleh bakteri maka aplikasi antibiotik pada kelopak mata sangat diwajibkan. Sedangkan jika karna alergi maka gunakan anti radang seperti hidrokortison.'),
(2, 'P02', 'Cacing Mata', 'Perlunya melakukan perawatan secara rutin sejak kucing menginjak usia tiga bulan. Sebagai langkah pencegahan pertama perlu memberikan obat cacing.'),
(3, 'P03', 'Felin Herpesvirus', 'Pencegahan penyakit ini dengan melakukan vaksinasi rutin.'),
(4, 'P04', 'Infeksi Mata', 'Infeksi mata pada kucing disebabkan oleh virus biasanya bisa sembuh dengan sendirinya atau menggunakan obat antivirus.'),
(5, 'P05', 'Glaukoma', 'Tidak ada cara untuk memulihkan kerusakan mata yang disebabkan oleh glaukoma. Deteksi dini adalah cara terbaik untuk menjaga penglihatan dan mencegah rasa sakit yang luar biasa.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `image` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `image`, `password`, `role_id`, `date_created`) VALUES
(13, 'Sahira Nasution', 'admin', 'Girl-Avatar-PNG-Download-Image.png', '$2y$10$cPPHkPQP8nboyyhLds9y4.qyqwDJiugt4OLu1NQ0DdaQwg1U83iey', 1, 1621561284);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_pengetahuan`
--

CREATE TABLE `tmp_pengetahuan` (
  `id` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL,
  `md` float NOT NULL,
  `cf_gejala` float NOT NULL,
  `cfhe` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_pengetahuan`
--

INSERT INTO `tmp_pengetahuan` (`id`, `id_penyakit`, `id_gejala`, `md`, `cf_gejala`, `cfhe`) VALUES
(1, 1, 1, 1, 0.15, 0.15),
(2, 1, 2, 0, 0.03, 0),
(3, 1, 3, 1, 0.24, 0.24),
(4, 2, 2, 0, 0.05, 0),
(5, 2, 4, 1, 0.16, 0.16),
(6, 2, 5, 1, 0.12, 0.12),
(7, 3, 4, 1, 0.46, 0.46),
(8, 3, 6, 1, 0.32, 0.32),
(9, 4, 1, 1, 0.1, 0.1),
(10, 4, 4, 1, 0.2, 0.2),
(11, 4, 7, 0, 0.17, 0),
(12, 5, 1, 1, 0.23, 0.23),
(13, 5, 3, 1, 0.3, 0.3),
(14, 5, 4, 1, 0.13, 0.13);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(8, 1, 3),
(9, 1, 4),
(10, 1, 5),
(11, 1, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gejala`
--
ALTER TABLE `tbl_gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `tbl_hasil_diagnosa`
--
ALTER TABLE `tbl_hasil_diagnosa`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `tbl_pengetahuan`
--
ALTER TABLE `tbl_pengetahuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_gejala` (`id_gejala`),
  ADD KEY `id_kerusakan` (`id_penyakit`);

--
-- Indexes for table `tbl_penyakit`
--
ALTER TABLE `tbl_penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tmp_pengetahuan`
--
ALTER TABLE `tmp_pengetahuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_gejala` (`id_gejala`),
  ADD KEY `id_kerusakan` (`id_penyakit`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_gejala`
--
ALTER TABLE `tbl_gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_hasil_diagnosa`
--
ALTER TABLE `tbl_hasil_diagnosa`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pengetahuan`
--
ALTER TABLE `tbl_pengetahuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_penyakit`
--
ALTER TABLE `tbl_penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tmp_pengetahuan`
--
ALTER TABLE `tmp_pengetahuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pengetahuan`
--
ALTER TABLE `tbl_pengetahuan`
  ADD CONSTRAINT `tbl_pengetahuan_ibfk_1` FOREIGN KEY (`id_penyakit`) REFERENCES `tbl_penyakit` (`id_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
