-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08 Jun 2023 pada 18.58
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
-- Database: `dbkuesioner`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(10) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `nidn` varchar(100) NOT NULL,
  `status_dos` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nama_dosen`, `nidn`, `status_dos`) VALUES
(1, 'MARDIYANTO,M.T.I', '0206109101', 'pengajar'),
(2, 'WIDIANTO', '0206109102', 'tetap'),
(3, 'JUMANTO', '0206109103', 'pengajar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban`
--

CREATE TABLE `jawaban` (
  `id_jawaban` int(10) NOT NULL,
  `id_pertanyaan` int(10) NOT NULL,
  `nama_jawaban` text NOT NULL,
  `nilai_jawaban` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jawaban`
--

INSERT INTO `jawaban` (`id_jawaban`, `id_pertanyaan`, `nama_jawaban`, `nilai_jawaban`) VALUES
(1, 1, 'SANGAT SETUJU', 4),
(2, 1, ' SETUJU', 3),
(3, 1, ' CUKUP SETUJU', 2),
(4, 1, 'TIDAK SETUJU', 1),
(5, 2, 'SANGAT SETUJU', 4),
(6, 2, ' SETUJU', 3),
(7, 2, ' CUKUP SETUJU', 2),
(8, 2, 'TIDAK SETUJU', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jur` int(10) NOT NULL,
  `nama_jur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jur`, `nama_jur`) VALUES
(1, 'SISTEM INFORMASI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(10) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `nim` varchar(100) NOT NULL,
  `email_mahasiswa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama_mahasiswa`, `nim`, `email_mahasiswa`) VALUES
(1, 'akabest', '2030409', 'akabest@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakul`
--

CREATE TABLE `matakul` (
  `id_matakul` int(10) NOT NULL,
  `nama_matakul` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `matakul`
--

INSERT INTO `matakul` (`id_matakul`, `nama_matakul`) VALUES
(1, 'JARINGAN KOMPUTER');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajar`
--

CREATE TABLE `pengajar` (
  `id_pengajar` int(10) NOT NULL,
  `id_dosen` int(10) NOT NULL,
  `id_matakul` int(10) NOT NULL,
  `id_semester` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(10) NOT NULL,
  `id_jawaban` int(10) NOT NULL,
  `id_mahasiswa` int(10) NOT NULL,
  `id_dosen` int(10) NOT NULL,
  `id_matakul` int(10) NOT NULL,
  `nilai` int(1) DEFAULT NULL,
  `id_semester` int(10) NOT NULL,
  `tahun` varchar(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int(10) NOT NULL,
  `nama_pertanyaan` text NOT NULL,
  `status_pertanyaan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `nama_pertanyaan`, `status_pertanyaan`) VALUES
(1, 'Apakah Dosen Menguasai materi dengan  Baik dan bisa mejelakan dengan baik ?', 'pilihan'),
(2, 'Apakah Metode mengajar yang digunakan dosen baik dan terstruktur ?', 'pilihan'),
(3, 'Apakah Kemimpinan dosen di dalam kelas sangat baik ?', 'pilihan'),
(4, 'Dosen Menerima pendapat,ide  dan kritik dari mahasiswa', 'pilihan'),
(5, 'Dosen menggunakan waktu kuliah seefektif dan seoptimal mungkin', 'pilihan'),
(6, 'Dosen memberi feedback/umpan balik berdasarkan nilai tugas maupun ujian yang diberikan', 'pilihan'),
(7, 'Hal yang perlu dipertahankan dosen yang bersangkutan:', 'jawaban'),
(8, 'Hal yang perlu diperbaiki dosen yang bersangkutan:', 'jawaban');

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `id_semester` int(10) NOT NULL,
  `nama_semester` varchar(100) NOT NULL,
  `tahun_semester` varchar(100) NOT NULL,
  `status_semester` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `semester`
--

INSERT INTO `semester` (`id_semester`, `nama_semester`, `tahun_semester`, `status_semester`) VALUES
(1, 'GANJIL', '2022/2023', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jur`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `matakul`
--
ALTER TABLE `matakul`
  ADD PRIMARY KEY (`id_matakul`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id_pengajar`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_jawaban` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jur` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `matakul`
--
ALTER TABLE `matakul`
  MODIFY `id_matakul` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id_pengajar` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id_semester` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
