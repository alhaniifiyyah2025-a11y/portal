-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jul 2020 pada 08.11
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendaftaran-santri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pendaftar`
--

CREATE TABLE `detail_pendaftar` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  `nama_ayah` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `tempat_lahir_ayah` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `tanggal_lahir_ayah` date DEFAULT NULL,
  `pendidikan_terakhir_ayah` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `pekerjaan_ayah` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `nama_ibu` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `tempat_lahir_ibu` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `tanggal_lahir_ibu` date DEFAULT NULL,
  `pendidikan_terakhir_ibu` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `pekerjaan_ibu` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `alamat_ortu` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `telepon_ortu` varchar(100) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_pendaftar`
--

INSERT INTO `detail_pendaftar` (`id`, `users_id`, `tanggal_daftar`, `nama_ayah`, `tempat_lahir_ayah`, `tanggal_lahir_ayah`, `pendidikan_terakhir_ayah`, `pekerjaan_ayah`, `nama_ibu`, `tempat_lahir_ibu`, `tanggal_lahir_ibu`, `pendidikan_terakhir_ibu`, `pekerjaan_ibu`, `alamat_ortu`, `telepon_ortu`) VALUES
(0, 11, '2020-07-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, '2020-07-18', 'Test1', 'Test', '2020-07-18', 'Test', 'Test', 'Test', 'Test', '2020-07-18', 'Test', 'Test', 'Test', '08888');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `tmpt_lahir` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 DEFAULT NULL,
  `jk` enum('L','P') CHARACTER SET latin1 DEFAULT NULL,
  `anak_ke` int(5) DEFAULT NULL,
  `jml_saudara` int(5) DEFAULT NULL,
  `asal_sekolah` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `jenis_program` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `telepon` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET latin1 NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `email` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `status_pendaftar` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `status_pembayaran` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `upload_kk` varchar(255) CHARACTER SET latin1 NOT NULL,
  `upload_bukti` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaftar`
--

INSERT INTO `pendaftar` (`id`, `nama`, `tmpt_lahir`, `tgl_lahir`, `alamat`, `jk`, `anak_ke`, `jml_saudara`, `asal_sekolah`, `jenis_program`, `telepon`, `foto`, `users_id`, `email`, `status_pendaftar`, `status_pembayaran`, `upload_kk`, `upload_bukti`) VALUES
(2, 'Habib', 'Wonosobo', '0000-00-00', 'Wonosobo', 'L', 2, 3, 'Wonosobo', 'Bahasa Arab', '088888', 'Habib.png', 2, 'Habib@test', '1', '2', 'Habib.png', 'Habib.png'),
(11, 'Wulan', 'Wonosobo', '2020-07-29', 'Wonosobo', 'P', 2, 3, 'SMA Muhammadiyah 1 Wonosobo', 'Bahasa Arab', '08122785555', '', 11, 'wulan@gmail.com', '0', '0', '', ''),
(12, 'Rosyid', 'Wonosobo', '1999-08-12', 'Wonosobo', 'L', 2, 3, 'SMK Muhammadiyah 1 Wonosobo', 'Bahasa Inggris', '08122785555', '', 12, 'rosyid@gmail.com', '0', '0', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `username` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `level` varchar(45) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Admin', 'Admin@Test', '$2y$10$v1CYtT/uZVw8pXftqcJ.m.cQdvdljRpy4NqmpebocSTLUI7ZZ392u', 'admin'),
(2, 'Habib', 'Habib@test', '$2y$10$v1CYtT/uZVw8pXftqcJ.m.cQdvdljRpy4NqmpebocSTLUI7ZZ392u', 'santri'),
(11, 'Wulan', 'wulan@gmail.com', '$2y$10$GW5H7dJATeB5Y0ljztHoE.E84oFzIQ2BLBf9TX5muQA5zUP3cUqO2', 'santri'),
(12, 'Rosyid', 'rosyid@gmail.com', '$2y$10$g93p4CMkcs5WVfzWxip7/uV7blv5NXgO./fRdy7Ul6Yw7L53GCmxy', 'santri');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_pendaftar`
--
ALTER TABLE `detail_pendaftar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`users_id`);

--
-- Indeks untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`users_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
