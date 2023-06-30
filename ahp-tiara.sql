-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30 Jun 2023 pada 15.04
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahp-tiara`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `NIP` varchar(20) NOT NULL,
  `periode` varchar(30) NOT NULL,
  `lihat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `desc_kriteria`
--

CREATE TABLE `desc_kriteria` (
  `id_desc` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `desc_kriteria`
--

INSERT INTO `desc_kriteria` (`id_desc`, `id_kriteria`, `deskripsi`, `nilai`) VALUES
(1, 1, 'Mengajar 15-16 kali pertemuan', 50),
(2, 1, 'Mengajar 13-14 kali pertemuan', 40),
(3, 1, 'Mengajar 11-12 kali pertemuan', 30),
(4, 1, 'Mengajar < 10 kali pertemuan', 20),
(5, 2, 'Aktif mengikuti semua rapat, pertemuan dan seminar serta  berperan aktif', 50),
(6, 2, 'Aktif mengikuti semua rapat, pertemuan dan seminar tapi pasif', 40),
(7, 2, 'Sering tidak hadir dalam mengikuti rapat, pertemuan dan seminar', 30),
(8, 3, 'tepat waktu', 50),
(9, 3, ' terlambat 1-3 hari', 40),
(10, 3, ' terlambat 4-7 hari', 30),
(11, 3, 'terlambat > 7 hari', 20),
(12, 3, 'Terlambat > 7 hari dan DNS telah dibagikan', 10),
(13, 4, 'tepat waktu dalam menyerahkan RPS', 50),
(14, 4, 'terlambat 1-7 hari dari waktu yang ditentukan', 40),
(15, 4, ' terlambat 8-14 hari dari waktu yang ditentukan', 30),
(16, 4, 'terlambat > 14 har', 20),
(17, 4, 'terlambat > 14 hari dan UTS telah dilakukan', 10),
(18, 5, 'menggunakan Buku Ajar atau Media Pembelajaran (beningan, slide,  alat peraga, power point) lengkap untuk 14 kali pertemuan.', 50),
(19, 5, 'hanya menggunakan Media Pembelajaran (beningan, slide, alat  peraga, power point)', 40),
(20, 5, 'menggunakan Text Book', 30),
(21, 5, 'Tidak mempunyai buku pegangan', 20),
(22, 6, 'rata-rata kesesuain waktu mengajar 90%-100% dengan jumlah sks ', 50),
(23, 6, 'rata-rata kesesuain waktu mengajar 80%-90% dengan jumlah sks ', 40),
(24, 6, 'rata-rata kesesuain waktu mengajar 70%-80% dengan jumlah sks ', 30),
(25, 6, 'rata-rata kesesuain waktu mengajar 60%-70% dengan jumlah sks ', 20),
(26, 6, 'rata-rata kesesuain waktu mengajar 50%-60% dengan jumlah sks ', 10),
(27, 7, 'tepat waktu dalam menyerahkan Arsip Quis, UTS, UAS dan Lengkap', 50),
(28, 7, 'tepat waktu dalam menyerahkan Arsip Quis, UTS, UAS dan tidak  Lengkap', 40),
(29, 7, 'terlambat 8-14 hari dari waktu yang ditentukan', 30),
(30, 7, ' terlambat > 14 hari', 20),
(31, 7, 'terlambat > 14 hari dan DNS telah dibagikan.', 10),
(32, 8, 'Ketua', 50),
(33, 8, 'Anggota', 30),
(34, 8, 'tidak ada kegiatan', 0),
(35, 9, 'ada pengapdian', 50),
(36, 9, 'tidak ada pengapdian', 0),
(37, 10, 'Sebagai panitia wisuda (Koordinator )', 40),
(38, 10, 'Sebagai panitia wisuda  (Anggota)', 30),
(39, 10, ' Sebagai panitia SPMB', 30),
(40, 10, 'Koordinator Ories aktif ', 40),
(41, 10, 'Anggota Ories aktif ', 30),
(42, 10, 'Sebagai panitia QA', 20),
(43, 10, 'Sebagai panitia pelaksanaan seminar, lokakarya dan workshop', 20),
(44, 10, 'Sebagai panitia atau anggota segala kegiatan yang dilakukan oleh  IBN', 20),
(45, 10, 'Koordinator penyusunan proposal Hibah', 40),
(46, 10, 'Anggota penyusunan proposal Hibah', 30),
(47, 10, 'Menjadi PIC atau Pejabat pengelola proyek hibah', 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(30) NOT NULL,
  `nama_jabatan` varchar(40) NOT NULL,
  `job_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama_jabatan`, `job_desc`) VALUES
(1, 'DOSEN', 'MENGAJAR DAN TRIDARMA PEGURUAN TINGGI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_kar` int(11) NOT NULL,
  `NIP` varchar(40) NOT NULL,
  `nama_karyawan` varchar(125) NOT NULL,
  `JK` varchar(50) DEFAULT NULL,
  `Jabatan` varchar(50) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_kar`, `NIP`, `nama_karyawan`, `JK`, `Jabatan`, `status`) VALUES
(1, '0206109101', 'MARDIYANTO, M.T.I', 'Pria', '1', 'ok'),
(2, '0206109102', 'TRISNAWATI, M.Pd', 'Wanita', '1', 'ok'),
(3, '0206109103', 'DANANG KUSNANDI, M.Pd', 'Pria', '1', 'ok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kriteria` varchar(125) NOT NULL,
  `seo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kriteria`, `seo`) VALUES
(1, 'Kehadiran mengajar dosen (HM)', 'Kehadiran_mengajar_dosen_(HM)'),
(2, 'Kehadiran mengikuti rapat, pertemuan, dan seminar (HR)', 'Kehadiran_mengikuti_rapat,_pertemuan,_dan_seminar_'),
(3, 'Ketepatan menyerahkan nilai ujian', 'Ketepatan_menyerahkan_nilai_ujian'),
(4, 'Ketepatan menyerahkan RPS', 'Ketepatan_menyerahkan_RPS'),
(5, 'Media pembelajaran (beningan, slide, alat peraga, power point, dll) (MP)', 'Media_pembelajaran_(beningan,_slide,_alat_peraga,_'),
(6, 'Kesesuaian waktu mengajar dengan jumlah sks', 'Kesesuaian_waktu_mengajar_dengan_jumlah_sks'),
(7, 'Arsip soal quis, UTS, UAS (AU)', 'Arsip_soal_quis,_UTS,_UAS_(AU)'),
(8, 'Kegiatan dosen dalam Penelitian', 'Kegiatan_dosen_dalam_Penelitian'),
(9, 'Kegiatan Dosen Dalam Pengabdian Masyarakat', 'Kegiatan_Dosen_Dalam_Pengabdian_Masyarakat'),
(10, 'Keterlibatan dosen dalam kegiatan di IBN (KD)', 'Keterlibatan_dosen_dalam_kegiatan_di_IBN_(KD)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_alternatif`
--

CREATE TABLE `nilai_alternatif` (
  `id_nilai_alternatif` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `periode` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_kriteria`
--

CREATE TABLE `nilai_kriteria` (
  `id_nilai` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_kriteria`
--

INSERT INTO `nilai_kriteria` (`id_nilai`, `id_kriteria`, `nilai`) VALUES
(1, 1, 10),
(2, 2, 10),
(3, 3, 10),
(4, 4, 10),
(5, 5, 10),
(6, 6, 10),
(7, 7, 10),
(8, 8, 10),
(9, 9, 10),
(10, 10, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemberian_skor`
--

CREATE TABLE `pemberian_skor` (
  `id_pemberian` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `data_awal` varchar(225) NOT NULL,
  `konversi` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `periode`
--

CREATE TABLE `periode` (
  `id_periode` int(5) NOT NULL,
  `periode` varchar(30) NOT NULL,
  `label` varchar(30) NOT NULL,
  `tahun` int(5) NOT NULL,
  `bulan` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `periode`
--

INSERT INTO `periode` (`id_periode`, `periode`, `label`, `tahun`, `bulan`) VALUES
(1, '2023-Juni', '2023 Juni', 2023, 'Juni');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp`
--

CREATE TABLE `temp` (
  `id_temp` int(11) NOT NULL,
  `NIP` varchar(40) NOT NULL,
  `nama_dosen` varchar(40) NOT NULL,
  `Pengajaran` int(5) DEFAULT NULL,
  `Penelitian_n_Publikasi` int(5) DEFAULT NULL,
  `Pengabdian_Masyarakat` int(5) DEFAULT NULL,
  `Penunjang` int(5) DEFAULT NULL,
  `creator` varchar(20) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `periode` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'operator', 'operator', 'operator', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `desc_kriteria`
--
ALTER TABLE `desc_kriteria`
  ADD PRIMARY KEY (`id_desc`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_kar`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD PRIMARY KEY (`id_nilai_alternatif`);

--
-- Indexes for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `pemberian_skor`
--
ALTER TABLE `pemberian_skor`
  ADD PRIMARY KEY (`id_pemberian`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id_temp`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `desc_kriteria`
--
ALTER TABLE `desc_kriteria`
  MODIFY `id_desc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_kar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  MODIFY `id_nilai_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pemberian_skor`
--
ALTER TABLE `pemberian_skor`
  MODIFY `id_pemberian` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id_temp` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
