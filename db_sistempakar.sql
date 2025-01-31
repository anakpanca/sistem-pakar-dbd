-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jan 2025 pada 06.13
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sistempakar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `basis_aturan`
--

CREATE TABLE `basis_aturan` (
  `id_aturan` int(225) NOT NULL,
  `id_penyakit` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `basis_aturan`
--

INSERT INTO `basis_aturan` (`id_aturan`, `id_penyakit`) VALUES
(12, 8),
(13, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_basis_aturan`
--

CREATE TABLE `detail_basis_aturan` (
  `id_aturan` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_basis_aturan`
--

INSERT INTO `detail_basis_aturan` (`id_aturan`, `id_gejala`) VALUES
(3, 9),
(3, 27),
(3, 10),
(3, 25),
(4, 6),
(4, 43),
(4, 40),
(4, 29),
(6, 13),
(6, 23),
(6, 16),
(6, 32),
(7, 18),
(7, 20),
(7, 11),
(7, 41),
(11, 21),
(11, 34),
(12, 63),
(12, 50),
(12, 46),
(12, 45),
(12, 62),
(12, 68),
(12, 70),
(12, 56),
(12, 65),
(12, 49),
(12, 52),
(12, 57),
(12, 55),
(12, 54),
(12, 47),
(12, 51),
(12, 53),
(12, 60),
(12, 48),
(13, 63),
(13, 67),
(13, 50),
(13, 46),
(13, 45),
(13, 66),
(13, 62),
(13, 68),
(13, 59),
(13, 70),
(13, 56),
(13, 65),
(13, 61),
(13, 58),
(13, 49),
(13, 52),
(13, 57),
(13, 55),
(13, 54),
(13, 64),
(13, 47),
(13, 51),
(13, 53),
(13, 69),
(13, 60),
(13, 48);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_konsultasi`
--

CREATE TABLE `detail_konsultasi` (
  `id_konsultasi` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_konsultasi`
--

INSERT INTO `detail_konsultasi` (`id_konsultasi`, `id_gejala`) VALUES
(2, 5),
(2, 33),
(3, 5),
(3, 33),
(4, 28),
(4, 30),
(4, 12),
(10, 5),
(10, 33),
(11, 5),
(11, 33),
(12, 12),
(12, 16),
(12, 32),
(13, 12),
(13, 16),
(13, 32),
(14, 12),
(14, 16),
(14, 32),
(15, 12),
(15, 16),
(16, 12),
(16, 16),
(17, 12),
(17, 16),
(18, 12),
(18, 16),
(19, 13),
(19, 23),
(19, 16),
(19, 32),
(20, 13),
(20, 23),
(20, 16),
(20, 32),
(21, 5),
(21, 33),
(21, 36),
(21, 28),
(21, 30),
(21, 18),
(21, 20),
(21, 11),
(21, 41),
(21, 31),
(21, 17),
(21, 37),
(21, 35),
(22, 5),
(22, 33),
(23, 5),
(23, 33),
(23, 36),
(23, 28),
(24, 5),
(24, 33),
(24, 36),
(24, 28),
(24, 30),
(24, 12),
(24, 13),
(24, 23),
(24, 16),
(24, 32),
(24, 22),
(24, 42),
(24, 14),
(24, 7),
(24, 18),
(24, 20),
(24, 11),
(24, 41),
(24, 9),
(24, 27),
(24, 10),
(24, 25),
(24, 38),
(24, 24),
(24, 39),
(24, 19),
(24, 31),
(24, 17),
(24, 37),
(24, 35),
(24, 26),
(24, 15),
(24, 21),
(24, 34),
(24, 8),
(24, 6),
(24, 43),
(24, 40),
(24, 29),
(25, 5),
(25, 33),
(25, 36),
(25, 28),
(25, 30),
(25, 12),
(25, 13),
(26, 21),
(26, 34),
(27, 63),
(27, 67),
(27, 50),
(27, 46),
(27, 45);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penyakit`
--

CREATE TABLE `detail_penyakit` (
  `id_konsultasi` int(11) NOT NULL,
  `id_penyakit` int(1) NOT NULL,
  `persentase` tinyint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_penyakit`
--

INSERT INTO `detail_penyakit` (`id_konsultasi`, `id_penyakit`, `persentase`) VALUES
(18, 4, 25),
(19, 4, 100),
(20, 4, 100),
(21, 7, 100),
(24, 4, 100),
(24, 6, 100),
(24, 7, 100),
(25, 4, 25),
(26, 6, 100),
(27, 8, 21),
(27, 9, 19);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `nama_gejala` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `nama_gejala`) VALUES
(45, 'Demam tinggi lebih dari 40 derajat Celcius'),
(46, 'Demam selama 2 - 7 hari'),
(47, 'Perubahan suhu dari panas ke dingin dan sebaliknya secara drastis'),
(48, 'Tidak enak badan (lesu)'),
(49, 'Nafsu makan dan minum buruk'),
(50, 'Daya tahan tubuh lemah'),
(51, 'Ruam (muncul setelah demam hari ke-4)'),
(52, 'Nyeri kepala bagian belakang'),
(53, 'Sakit kepala parah (pusing)'),
(54, 'Nyeri ulu hati'),
(55, 'Nyeri sendi'),
(56, 'Mual dan muntah'),
(57, 'Nyeri pada retro orbital (bagian belakang kepala)'),
(58, 'Muntah darah'),
(59, 'Kerusakan pada pembuluh darah dan betah bening'),
(60, 'Shock (tekanan darah sangat rendah) '),
(61, 'Mudah memar'),
(62, 'Kedinginan ekstrem'),
(63, 'Bintik - bintik merah selama 1-2 hari'),
(64, 'Pendarahan'),
(65, 'Mudah lelah'),
(66, 'Feses berwarna hitam dan lengket'),
(67, 'Darah dalam feses'),
(68, 'Keringat berlebih'),
(69, 'Sesak napas'),
(70, 'Kulit pucat dan dingin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `konsultasi`
--

INSERT INTO `konsultasi` (`id_konsultasi`, `tanggal`, `nama`) VALUES
(27, '2025-01-27', 'akmal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `nama_penyakit`, `keterangan`, `solusi`) VALUES
(8, 'Demam Berdarah Primer', 'Demam berdarah tipe awal', 'banyak istirahat, banyak minum, minum obat penurun demam, pemantauan ketat dari dokter'),
(9, 'Demam Berdarah Sekunder', 'Demam berdarah tipe lanjut (parah)', 'banyak istirahat, banyak minum, minum obat penurun demam, rawat inap dan pemantauan ketat dari dokter');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`idusers`, `username`, `pass`, `role`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(4, 'dokter', 'd22af4180eee4bd95072eb90f94930e5', 'Dokter'),
(5, 'pasien', 'f5c25a0082eb0748faedca1ecdcfb131', 'Pasien');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `basis_aturan`
--
ALTER TABLE `basis_aturan`
  ADD PRIMARY KEY (`id_aturan`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indeks untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `basis_aturan`
--
ALTER TABLE `basis_aturan`
  MODIFY `id_aturan` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
