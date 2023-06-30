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
(2, 'TRISNAWATI, M.PD', '0206109102', 'pengajar'),
(3, 'DANANG KUSNANDI, M.PD', '0206109103', 'pengajar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(10) NOT NULL,
  `id_dosen` int(10) NOT NULL,
  `id_matakul` int(10) NOT NULL,
  `id_semester` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `id_ruangan` int(10) NOT NULL,
  `jam_mulai` varchar(10) NOT NULL,
  `jam_selesai` varchar(10) NOT NULL,
  `hari_jadwal` varchar(100) NOT NULL,
  `status_quis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_dosen`, `id_matakul`, `id_semester`, `id_kelas`, `id_ruangan`, `jam_mulai`, `jam_selesai`, `hari_jadwal`, `status_quis`) VALUES
(1, 1, 2, 1, 1, 1, '08:00', '10:00', 'Senin', 'belum'),
(4, 2, 3, 1, 1, 1, '10:00', '12:00', 'Senin', 'belum'),
(5, 3, 1, 1, 1, 1, '13:00', '15:00', 'Senin', 'belum');

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
(8, 2, 'TIDAK SETUJU', 1),
(9, 3, 'SANGAT SETUJU', 4),
(10, 3, ' SETUJU', 3),
(11, 3, ' CUKUP SETUJU', 2),
(12, 3, 'TIDAK SETUJU', 1),
(13, 4, 'SANGAT SETUJU', 4),
(14, 4, ' SETUJU', 3),
(15, 4, ' CUKUP SETUJU', 2),
(16, 4, 'TIDAK SETUJU', 1),
(17, 5, 'SANGAT SETUJU', 4),
(18, 5, ' SETUJU', 3),
(19, 5, ' CUKUP SETUJU', 2),
(20, 5, 'TIDAK SETUJU', 1),
(21, 6, 'SANGAT SETUJU', 4),
(22, 6, ' SETUJU', 3),
(23, 6, ' CUKUP SETUJU', 2),
(24, 6, 'TIDAK SETUJU', 1),
(25, 7, 'Kompetensi Akademik: Seorang dosen perlu menjaga dan mengembangkan kompetensi akademiknya agar tetap mengikuti perkembangan di bidangnya. Ini termasuk memperbarui pengetahuan dan keahlian mereka melalui studi, riset, dan partisipasi dalam kegiatan akademik.', 4),
(26, 7, 'Kualitas Pengajaran: Dosen harus mempertahankan kualitas pengajaran yang baik. Ini mencakup penyampaian materi dengan cara yang jelas, metode pengajaran yang efektif, dan mampu memotivasi dan melibatkan mahasiswa dalam proses belajar-mengajar.', 4),
(27, 7, 'Hubungan dengan Mahasiswa: Seorang dosen harus menjaga hubungan yang baik dengan mahasiswa. Ini melibatkan mendengarkan dan memahami kebutuhan serta masalah mahasiswa, memberikan bimbingan akademik, dan memberikan umpan balik yang konstruktif.', 4),
(28, 7, 'Keberhasilan Mahasiswa: Dosen perlu mempertahankan fokus pada keberhasilan mahasiswa. Mereka harus melibatkan diri dalam membantu mahasiswa mencapai tujuan belajar mereka, memberikan panduan dan dukungan yang diperlukan, serta menilai kinerja mahasiswa secara adil dan obyektif.', 4),
(29, 7, 'Etika Profesional: Dosen harus mempertahankan etika profesional yang tinggi. Ini termasuk integritas akademik, menghormati hak kebebasan akademik, menghindari plagiarisme, dan menghargai keragaman dan perspektif yang berbeda dalam kelas.', 4),
(30, 8, 'Pengembangan Metode Pengajaran: Dosen dapat memperbaiki metode pengajaran mereka dengan mencari pendekatan baru dan inovatif yang dapat meningkatkan keterlibatan dan pemahaman mahasiswa. Ini termasuk penggunaan teknologi dalam pembelajaran, penggunaan studi kasus, diskusi kelompok, atau pengalaman praktis di lapangan.', -4),
(31, 8, 'Keterbukaan terhadap Umpan Balik: Dosen perlu menjadi lebih terbuka terhadap umpan balik dari mahasiswa mereka. Menerima masukan dan kritik konstruktif dari mahasiswa dapat membantu dosen memperbaiki kualitas pengajaran dan memahami kebutuhan individu mahasiswa.', -4),
(32, 8, 'Komunikasi Efektif: Dosen dapat meningkatkan komunikasi dengan mahasiswa dan rekan dosen. Ini mencakup kejelasan dalam menyampaikan instruksi, memberikan umpan balik yang konstruktif, dan memastikan ketersediaan untuk membantu mahasiswa ketika dibutuhkan.', -4),
(33, 8, 'Ketersediaan dan Konsistensi: Dosen perlu meningkatkan ketersediaan mereka untuk mahasiswa, baik dalam hal waktu konsultasi maupun responsabilitas terhadap pertanyaan atau masalah mahasiswa. Selain itu, konsistensi dalam memberikan materi kuliah dan penilaian juga penting agar mahasiswa mendapatkan pengalaman belajar yang terstruktur dan seimbang', -4),
(34, 8, 'Penerapan Prinsip Keadilan: Dosen perlu memastikan bahwa mereka menerapkan prinsip keadilan dalam menilai kinerja mahasiswa. Evaluasi yang adil dan obyektif akan memberikan motivasi yang sehat dan memberikan kesempatan yang sama bagi semua mahasiswa untuk berhasil.', -4),
(35, 8, 'Kolaborasi dan Jaringan: Dosen dapat memperbaiki kolaborasi mereka dengan rekan dosen, mahasiswa, dan profesional lain di bidangnya. Membangun jaringan yang kuat akan membuka peluang untuk pertukaran pengetahuan, penelitian bersama, dan meningkatkan kualitas pengajaran.', -4);

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
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(10) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'MOZILA 1'),
(2, 'MOZILA 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `nim` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email_mahasiswa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `id_kelas`, `nama_mahasiswa`, `nim`, `password`, `email_mahasiswa`) VALUES
(4, 1, 'M.SALEH', '12121212', '$2y$10$N/t2g.Pn7rpdgFZMlMXL4uV5xg2NzJT.VqPn7zX/VcZWvCHrzPX5q', 'aku@gmail.com');

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
(1, 'JARINGAN KOMPUTER'),
(2, 'PEMEROGRAMAN WEB 2'),
(3, 'SISTEM OPRASI');

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
  `nilai` text,
  `id_semester` int(10) NOT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `jawaban_nilai` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_jawaban`, `id_mahasiswa`, `id_dosen`, `id_matakul`, `nilai`, `id_semester`, `tahun`, `jawaban_nilai`) VALUES
(1, 1, 4, 3, 1, '4', 1, '2023', ''),
(2, 6, 4, 3, 1, '3', 1, '2023', ''),
(3, 9, 4, 3, 1, '4', 1, '2023', ''),
(4, 14, 4, 3, 1, '3', 1, '2023', ''),
(5, 18, 4, 3, 1, '3', 1, '2023', ''),
(6, 22, 4, 3, 1, '3', 1, '2023', ''),
(7, 25, 4, 3, 1, '4', 1, '2023', ''),
(8, 26, 4, 3, 1, '4', 1, '2023', ''),
(9, 27, 4, 3, 1, '4', 1, '2023', ''),
(10, 28, 4, 3, 1, '4', 1, '2023', ''),
(11, 29, 4, 3, 1, '4', 1, '2023', ''),
(12, 30, 4, 3, 1, '-4', 1, '2023', ''),
(13, 31, 4, 3, 1, '-4', 1, '2023', ''),
(14, 1, 4, 2, 3, '4', 1, '2023', ''),
(15, 5, 4, 2, 3, '4', 1, '2023', ''),
(16, 9, 4, 2, 3, '4', 1, '2023', ''),
(17, 13, 4, 2, 3, '4', 1, '2023', ''),
(18, 17, 4, 2, 3, '4', 1, '2023', ''),
(19, 21, 4, 2, 3, '4', 1, '2023', ''),
(20, 25, 4, 2, 3, '4', 1, '2023', ''),
(21, 26, 4, 2, 3, '4', 1, '2023', ''),
(22, 27, 4, 2, 3, '4', 1, '2023', ''),
(23, 28, 4, 2, 3, '4', 1, '2023', ''),
(24, 29, 4, 2, 3, '4', 1, '2023', ''),
(25, 30, 4, 2, 3, '-4', 1, '2023', ''),
(26, 1, 4, 1, 2, '4', 1, '2023', ''),
(27, 7, 4, 1, 2, '2', 1, '2023', ''),
(28, 10, 4, 1, 2, '3', 1, '2023', ''),
(29, 13, 4, 1, 2, '4', 1, '2023', ''),
(30, 20, 4, 1, 2, '1', 1, '2023', ''),
(31, 22, 4, 1, 2, '3', 1, '2023', ''),
(32, 25, 4, 1, 2, '4', 1, '2023', ''),
(33, 26, 4, 1, 2, '4', 1, '2023', ''),
(34, 30, 4, 1, 2, '-4', 1, '2023', ''),
(35, 32, 4, 1, 2, '-4', 1, '2023', ''),
(36, 33, 4, 1, 2, '-4', 1, '2023', ''),
(37, 34, 4, 1, 2, '-4', 1, '2023', '');

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
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(10) NOT NULL,
  `nama_ruangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`) VALUES
(1, 'LAB GOOGLE '),
(2, 'VIP');

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
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

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
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

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
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

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
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_jawaban` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jur` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `matakul`
--
ALTER TABLE `matakul`
  MODIFY `id_matakul` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id_semester` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
