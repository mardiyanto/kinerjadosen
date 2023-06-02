-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2020 at 05:34 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ekinerja`
--

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

CREATE TABLE `approval` (
  `id` int(11) NOT NULL,
  `approval_kegiatan` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `atasan`
--

CREATE TABLE `atasan` (
  `id` int(11) NOT NULL,
  `nama_atasan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atasan`
--

INSERT INTO `atasan` (`id`, `nama_atasan`) VALUES
(1, 'Ir. Priyono Sanyoto'),
(3, 'Drs. Sri Wahyuni, Msi'),
(4, 'Drs Mahadhin CU, MM'),
(5, 'Moch. Asif Susanto, SH'),
(6, 'Ir. Agus Winardi ');

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id` int(11) NOT NULL,
  `nama_bidang` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id`, `nama_bidang`) VALUES
(4, 'Bidang Informasi dan Komunikasi Publik'),
(5, 'Bidang Informatika'),
(6, 'Bidang Statistik dan Persandian'),
(11, 'Bidang Fungsional');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `nama_jabatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama_jabatan`) VALUES
(2, 'kasubag'),
(3, 'kasi'),
(4, 'kadis'),
(5, 'staf'),
(6, 'admin'),
(7, 'kabid'),
(8, 'sekretaris');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `uraian` varchar(255) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `target` varchar(20) DEFAULT NULL,
  `id_pegawai` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `uraian`, `satuan`, `target`, `id_pegawai`) VALUES
(1, 'Rekap Surat', 'buah', '10', '3'),
(3, 'Kegiatan Pembuatan Website Perpustakaan Kab Blitar', 'Aplikasi', '15', '3'),
(4, 'Pembuatan Katalok Perpustakaan Keliling', 'Aplikasi', '30', '6'),
(5, 'Desain poster', 'buah', '20', '6'),
(7, 'desain logo', 'buah', '15', '9'),
(8, 'Pembuatan Website Katalok Buku Perpustakaan Kabupaten Blitar', 'Aplikasi', '15', '10'),
(9, 'Pembuatan Reklame Kabupaten Blitar', 'Lembar', '50', '11'),
(10, 'membuat laporan harian ', 'buah', '10', '15'),
(11, 'Mengarang Kata kata yang indah', 'Lembar', 'satuan', '15'),
(12, 'Pembuatan Video Interaktif edukasi Untuk usian <10 tahun', 'Buah', '30 dvd', '16'),
(13, 'Membuat Reklame Hari Pendidikan Nasional', 'Lembar', '65', '15');

-- --------------------------------------------------------

--
-- Table structure for table `kinerja`
--

CREATE TABLE `kinerja` (
  `id` int(11) NOT NULL,
  `nama_pegawai` varchar(225) DEFAULT NULL,
  `uraian_kegiatan` varchar(225) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `waktu_selesai` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kinerja`
--

INSERT INTO `kinerja` (`id`, `nama_pegawai`, `uraian_kegiatan`, `waktu`, `waktu_selesai`) VALUES
(23, '8', '5', '2018-01-01 07:00:00', '2018-01-01 11:00:00'),
(24, '9', '5', '2018-01-09 06:59:00', '2018-01-09 15:59:00'),
(25, '9', '3', '2018-01-09 12:00:00', '2018-01-10 18:09:00'),
(26, '13', '3', '2018-01-08 23:11:00', '2018-01-09 15:15:00'),
(27, '14', '5', '2018-01-08 11:11:00', '2018-01-09 11:11:00'),
(28, '12', '5', '2018-01-08 11:11:00', '2018-01-09 11:11:00'),
(29, '15', '10', '2018-01-16 07:00:00', '2018-01-16 15:00:00'),
(30, '15', '7', '2018-01-09 00:12:00', '2018-01-10 21:09:00'),
(31, '', '5', '2018-01-11 23:59:00', '2018-01-12 12:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(10) NOT NULL,
  `nip` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `atasan` varchar(100) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `detail_jabatan` varchar(100) DEFAULT NULL,
  `bidang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `nama`, `atasan`, `jabatan`, `detail_jabatan`, `bidang`) VALUES
(15, '198407132005012007', 'Wahyuni Dianasari, SE, MM', '3', '2', 'Kasubag Sungram dan Keuangan', '11'),
(16, '198106022015022001', 'Tri Widyawati Setyawaiti, S.Hut', '3', '5', 'Staf Bagian Fungsional', '11'),
(17, '5656433', 'dewi', '4', '2', 'informatika', '10'),
(19, '19751126299012008', 'Diana Faizati, ST', '3', '2', 'Kasubag Umum dan Kepegawaian', '11'),
(20, '654321', 'Nindy', '1', '2', 'desain', '4'),
(21, '196212011990031009', 'Drs. Mahadhin CU, MM', '4', '4', 'Plt. Kepala Dinas', '11'),
(22, '1985030220090211001', 'Eko Budi Santoso, SE', '3', '5', 'Staf Bagian Fungsional', '11'),
(24, '1968020319990322007', 'Dra. Sri Wahyuni, Msi', '4', '8', 'Sekretaris', '11'),
(25, '198012132003121005', 'Andik Triwahyudi, SP', '3', '5', 'Staf Bagian Fungsional', '0'),
(26, '196211161992021001', 'Ir. Priyo Sanyoto', '4', '7', 'Kepala Bidang Informasi dan Komunikasi Publik', '4'),
(27, '196510151993031012', 'Moch. Asif Susanto, SH', '4', '7', 'Kepala Bidang Informatika', '5'),
(28, '196708291997031003', 'Ir. Agus Winardi', '4', '7', 'Kepala Bidang Statistik dan Persandian', '6'),
(29, '196003181982031010', 'M. Yunus', '1', '3', 'Seksi Pengelolaan Informasi dan Opini Publik', '4');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(20) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `id_pegawai` varchar(20) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `tingkat` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `no_telp`, `blokir`, `id_session`, `level`, `tingkat`, `nama_lengkap`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '', 'N', 'qp0la1lcfulhs06crn7lp2mgb1', 'admin', NULL, 'Administrator'),
(866, 'izzamaila', '76e353e15085ce0597331e03f14f0451', 'za@gmail.com', '085784146639', 'N', 'bbcaceujtnptde9h8s9iqdcvb3', 'admin', '', NULL),
(869, 'tes123', 'b93939873fd4923043b9dec975811f66', 'tes', '', 'N', 'gp8t6bal6sluhcdvrsdesa9ml4', 'staf', '', NULL),
(874, '16', 'soni', '', '', 'N', '', '5', NULL, NULL),
(875, '445657789', '202cb962ac59075b964b07152d234b70', 'khjkhk.kj@kjkm.com', '123456', 'N', 'f1385kmh2si7qj100m2bplpc17', 'staf', NULL, NULL),
(878, '15', 'e10adc3949ba59abbe56e057f20f883e', 'hartatik@gmail.com', '051515451', 'N', '', 'user', NULL, NULL),
(879, '17', 'd41d8cd98f00b204e9800998ecf8427e', 'jkhjihjknkkj@kjkjk.com', '123', 'N', '', 'user', NULL, NULL),
(880, '9389479', '202cb962ac59075b964b07152d234b70', 'hartati@gmil.com', '849759792', 'N', 'jk3ch9aavbo0rafmqdosntcht0', 'kadis', NULL, 'Kepala Dinas'),
(881, '654321', 'c33367701511b4f6020ec61ded352059', 'nindy@gmail.com', '09824327590375327502', 'N', '9p8i4jt12nvqitsk4s7dp3qpe2', 'kasi', NULL, 'Kepegawaian'),
(884, '196212011990031009', '202cb962ac59075b964b07152d234b70', 'mahadhin@gmail.com', '085784678390', 'N', '', 'user', NULL, NULL),
(885, '198012132003121005', '0fc502878c8255bd1ffaa832fdcde0b6', 'andik@gmail.com', '508363895', 'N', '', 'user', NULL, NULL),
(886, '5656433', '202cb962ac59075b964b07152d234b70', 'dewi@gmail.com', '46894', 'N', '', 'user', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atasan`
--
ALTER TABLE `atasan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kinerja`
--
ALTER TABLE `kinerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`,`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approval`
--
ALTER TABLE `approval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `atasan`
--
ALTER TABLE `atasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kinerja`
--
ALTER TABLE `kinerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=887;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
