-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jun 2023 pada 11.15
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 5.6.37

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
(1, 6, 'DISIPLIN', 100),
(2, 6, 'CUKUP DISIPLIN', 80),
(3, 1, 'TAAT DALAM SOP', 100),
(4, 1, 'CUKUP TAAT', 80),
(5, 1, 'KURANG TAAT', 60),
(6, 6, 'KURANG DISIPLIN', 60),
(7, 2, 'BAIK SEKALI', 100),
(8, 2, 'CUKUP BAIK', 80),
(9, 2, 'KURANG BAIK', 60),
(10, 3, 'BAIK SEKALI', 100),
(11, 3, 'CUKUP BAIK', 80),
(12, 3, 'KURANG BAIK', 60),
(13, 3, 'TIDAK BAIK', 40),
(14, 4, 'BANYAK KARYA ILMIAH', 100),
(15, 4, 'CUKUP KARYA ILMIAH', 80),
(16, 4, 'KURANG DALAM KARYA ILMIAH', 60),
(17, 4, 'TIDAK PUNYA KARYA ILMIAH', 40),
(18, 5, 'BAIK SEKALI', 100),
(19, 5, 'CUKUP BAIK', 80),
(20, 5, 'KURANG BAIK', 60);

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
(1, 'STAF', 'Melayani Mahasiswa dan Dosen'),
(3, 'DOSEN', 'MENGJAR DENGAN BAIK DAN BIJAK KEPADA MAHASISWA TIDAK MEMPERSULIT MAHASISWA');

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
(12, '0206109101', 'MARDIYANTO, M.T.I', 'Pria', '3', 'ok'),
(13, '0206109102', 'JONI, M.T.I', 'Pria', '3', 'ok'),
(14, '0206109104', 'AKABEST', 'Pria', '3', 'ok');

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
(1, 'Ketaatan SOP', 'Ketaatan_SOP'),
(2, 'Kualitas Kinerja', 'Kualitas_Kinerja'),
(3, 'Pembelajaran', 'Pembelajaran'),
(4, 'Sumbang Pikir Ilmiah', 'Sumbang_Pikir_Ilmiah'),
(5, 'Integritas', 'Integritas'),
(6, 'Disiplin Kehadiran', 'Disiplin_Kehadiran');

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
(1, 1, 20),
(2, 2, 20),
(3, 3, 20),
(4, 4, 10),
(5, 5, 10),
(6, 6, 20);

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
(5, '2023-Juni', '2023 Juni', 2023, 'Juni');

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
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indeks untuk tabel `desc_kriteria`
--
ALTER TABLE `desc_kriteria`
  ADD PRIMARY KEY (`id_desc`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_kar`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD PRIMARY KEY (`id_nilai_alternatif`);

--
-- Indeks untuk tabel `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `pemberian_skor`
--
ALTER TABLE `pemberian_skor`
  ADD PRIMARY KEY (`id_pemberian`);

--
-- Indeks untuk tabel `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indeks untuk tabel `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id_temp`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `desc_kriteria`
--
ALTER TABLE `desc_kriteria`
  MODIFY `id_desc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_kar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  MODIFY `id_nilai_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pemberian_skor`
--
ALTER TABLE `pemberian_skor`
  MODIFY `id_pemberian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `temp`
--
ALTER TABLE `temp`
  MODIFY `id_temp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
