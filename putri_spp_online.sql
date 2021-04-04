-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2021 at 02:01 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `putri_spp_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_03_10_091315_create_putri_spp_table', 1),
(2, '2021_03_10_092721_create_putri_jurusan_table', 2),
(3, '2021_03_10_093746_create_putri_petugas_table', 3),
(4, '2021_03_10_094439_create_putri_kelas_table', 4),
(5, '2021_03_10_235858_create_putri_siswa_table', 5),
(6, '2021_03_11_003917_create_putri_siswa_table', 6),
(7, '2021_03_11_004524_create_putri_siswa_table', 7),
(8, '2021_03_11_005520_create_putri_pembayaran_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `putri_bulan`
--

CREATE TABLE `putri_bulan` (
  `id_bulan` int(11) NOT NULL,
  `nama_bulan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `putri_bulan`
--

INSERT INTO `putri_bulan` (`id_bulan`, `nama_bulan`) VALUES
(1, 'Juli'),
(2, 'Agusutus'),
(3, 'September'),
(4, 'Oktober'),
(5, 'November'),
(6, 'Desember'),
(7, 'Januari'),
(8, 'Febuari'),
(9, 'Maret '),
(10, 'April'),
(11, 'Mei'),
(12, 'Juni');

-- --------------------------------------------------------

--
-- Table structure for table `putri_detail_pembayaran`
--

CREATE TABLE `putri_detail_pembayaran` (
  `id_detail_pembayaran` int(11) NOT NULL,
  `pembayaran_id_pembayaran` bigint(20) UNSIGNED NOT NULL,
  `bulan_id` int(11) NOT NULL,
  `harga_spp` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `putri_jurusan`
--

CREATE TABLE `putri_jurusan` (
  `id_jurusan` bigint(20) UNSIGNED NOT NULL,
  `nama_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `putri_jurusan`
--

INSERT INTO `putri_jurusan` (`id_jurusan`, `nama_jurusan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 'Mekatronika A', '2021-03-28 21:32:24', '2021-03-28 21:32:24', NULL),
(11, 'Mekatronika B', '2021-03-28 21:32:34', '2021-03-28 21:32:34', NULL),
(12, 'Mekatronika C', '2021-03-28 21:32:46', '2021-03-28 21:32:46', NULL),
(13, 'Rekayasa Perangkat Lunak A', '2021-03-28 21:32:54', '2021-03-28 21:32:54', NULL),
(14, 'Rekayasa Perangkat Lunak B', '2021-03-28 21:33:05', '2021-03-28 21:33:17', NULL),
(15, 'Rekayasa Perangkat Lunak C', '2021-03-28 21:33:28', '2021-03-28 21:33:28', NULL),
(16, 'Multimedia A', '2021-03-28 21:33:39', '2021-03-28 21:33:39', NULL),
(17, 'Multimedia B', '2021-03-28 21:36:53', '2021-03-28 21:36:53', NULL),
(18, 'Multimedia C', '2021-03-28 21:37:05', '2021-03-28 21:37:05', NULL),
(19, 'Animasi A', '2021-03-28 21:37:29', '2021-03-28 21:37:29', NULL),
(20, 'Animasi B', '2021-03-28 21:37:42', '2021-03-28 21:37:42', NULL),
(21, 'Animasi C', '2021-03-28 21:38:08', '2021-03-28 21:38:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `putri_kelas`
--

CREATE TABLE `putri_kelas` (
  `id_kelas` bigint(20) UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `putri_kelas`
--

INSERT INTO `putri_kelas` (`id_kelas`, `nama_kelas`, `jurusan_id`, `created_at`, `updated_at`) VALUES
(8, '10', 10, '2021-03-28 21:45:23', '2021-03-28 21:45:23'),
(9, '10', 11, '2021-03-28 21:45:34', '2021-03-28 21:45:34'),
(10, '10', 12, '2021-03-28 21:46:00', '2021-03-28 21:46:00'),
(11, '11', 13, '2021-03-28 21:47:15', '2021-03-28 21:47:15'),
(12, '11', 14, '2021-03-28 21:47:47', '2021-03-28 21:47:47'),
(13, '11', 15, '2021-03-28 21:47:54', '2021-03-28 21:47:54'),
(14, '12', 16, '2021-03-28 21:48:09', '2021-03-28 21:48:09'),
(15, '12', 17, '2021-03-28 21:48:31', '2021-03-28 21:48:31'),
(16, '12', 18, '2021-03-28 21:48:44', '2021-03-28 21:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `putri_pembayaran`
--

CREATE TABLE `putri_pembayaran` (
  `id_pembayaran` bigint(20) UNSIGNED NOT NULL,
  `petugas_id` bigint(20) UNSIGNED NOT NULL,
  `nisn` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bulan_dibayar` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_dibayar` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spp_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `putri_petugas`
--

CREATE TABLE `putri_petugas` (
  `id_petugas` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_petugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','petugas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `putri_petugas`
--

INSERT INTO `putri_petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`, `created_at`, `updated_at`) VALUES
(2, 'putrii970', '$2y$10$MHIz/5NX4FQX23JZejI6V.c2agn2ain.hLzPSN2KrZ1TzKAOQnV0e', 'Putri Damayanti', 'admin', '2021-03-16 17:49:25', '2021-03-16 17:49:25'),
(3, 'rafa', '$2y$10$MHIz/5NX4FQX23JZejI6V.c2agn2ain.hLzPSN2KrZ1TzKAOQnV0e', 'Muhamad Syidiq Arrafa', 'petugas', '2021-03-16 17:50:30', '2021-03-16 17:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `putri_siswa`
--

CREATE TABLE `putri_siswa` (
  `nisn` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` char(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `putri_kelas_id_kelas` bigint(20) UNSIGNED NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spp_id_spp` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `putri_siswa`
--

INSERT INTO `putri_siswa` (`nisn`, `nis`, `nama`, `putri_kelas_id_kelas`, `alamat`, `no_telp`, `spp_id_spp`, `created_at`, `updated_at`) VALUES
('0040097501', '64143105', 'Nioni Artha', 9, 'ada', '08211848900', 4, '2021-04-02 21:19:34', '2021-04-02 21:19:34'),
('0040097532', '64143105', 'Fanni Febriani', 11, 'Permata', '083673211008', 3, '2021-03-29 20:42:17', '2021-03-29 20:42:17');

-- --------------------------------------------------------

--
-- Table structure for table `putri_spp`
--

CREATE TABLE `putri_spp` (
  `id_spp` bigint(20) UNSIGNED NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `putri_spp`
--

INSERT INTO `putri_spp` (`id_spp`, `tahun`, `nominal`, `created_at`, `updated_at`) VALUES
(3, '2016', 175000, '2021-03-20 10:11:02', '2021-04-01 09:16:08'),
(4, '2017', 180000, '2021-03-28 22:09:13', '2021-03-28 22:09:13'),
(5, '2018', 185000, '2021-03-28 22:09:26', '2021-03-28 22:09:26'),
(6, '2019', 190000, '2021-04-01 09:09:54', '2021-04-01 09:09:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `putri_bulan`
--
ALTER TABLE `putri_bulan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- Indexes for table `putri_detail_pembayaran`
--
ALTER TABLE `putri_detail_pembayaran`
  ADD PRIMARY KEY (`id_detail_pembayaran`),
  ADD KEY `pembayaran_id` (`pembayaran_id_pembayaran`),
  ADD KEY `bulan_id` (`bulan_id`),
  ADD KEY `pembayaran_id_pembayaran` (`pembayaran_id_pembayaran`);

--
-- Indexes for table `putri_jurusan`
--
ALTER TABLE `putri_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `putri_kelas`
--
ALTER TABLE `putri_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `putri_kelas_jurusan_id_foreign` (`jurusan_id`);

--
-- Indexes for table `putri_pembayaran`
--
ALTER TABLE `putri_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `putri_pembayaran_petugas_id_foreign` (`petugas_id`),
  ADD KEY `putri_pembayaran_nisn_foreign` (`nisn`),
  ADD KEY `putri_pembayaran_spp_id_foreign` (`spp_id`);

--
-- Indexes for table `putri_petugas`
--
ALTER TABLE `putri_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `putri_siswa`
--
ALTER TABLE `putri_siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `putri_siswa_kelas_id_foreign` (`putri_kelas_id_kelas`),
  ADD KEY `putri_siswa_spp_id_foreign` (`spp_id_spp`);

--
-- Indexes for table `putri_spp`
--
ALTER TABLE `putri_spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `putri_detail_pembayaran`
--
ALTER TABLE `putri_detail_pembayaran`
  MODIFY `id_detail_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `putri_jurusan`
--
ALTER TABLE `putri_jurusan`
  MODIFY `id_jurusan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `putri_kelas`
--
ALTER TABLE `putri_kelas`
  MODIFY `id_kelas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `putri_pembayaran`
--
ALTER TABLE `putri_pembayaran`
  MODIFY `id_pembayaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `putri_petugas`
--
ALTER TABLE `putri_petugas`
  MODIFY `id_petugas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `putri_spp`
--
ALTER TABLE `putri_spp`
  MODIFY `id_spp` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `putri_detail_pembayaran`
--
ALTER TABLE `putri_detail_pembayaran`
  ADD CONSTRAINT `putri_detail_pembayaran_ibfk_1` FOREIGN KEY (`bulan_id`) REFERENCES `putri_bulan` (`id_bulan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `putri_detail_pembayaran_ibfk_2` FOREIGN KEY (`pembayaran_id_pembayaran`) REFERENCES `putri_pembayaran` (`id_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `putri_kelas`
--
ALTER TABLE `putri_kelas`
  ADD CONSTRAINT `putri_kelas_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `putri_jurusan` (`id_jurusan`) ON DELETE CASCADE;

--
-- Constraints for table `putri_pembayaran`
--
ALTER TABLE `putri_pembayaran`
  ADD CONSTRAINT `putri_pembayaran_nisn_foreign` FOREIGN KEY (`nisn`) REFERENCES `putri_siswa` (`nisn`) ON DELETE CASCADE,
  ADD CONSTRAINT `putri_pembayaran_petugas_id_foreign` FOREIGN KEY (`petugas_id`) REFERENCES `putri_petugas` (`id_petugas`) ON DELETE CASCADE,
  ADD CONSTRAINT `putri_pembayaran_spp_id_foreign` FOREIGN KEY (`spp_id`) REFERENCES `putri_siswa` (`spp_id_spp`) ON DELETE CASCADE;

--
-- Constraints for table `putri_siswa`
--
ALTER TABLE `putri_siswa`
  ADD CONSTRAINT `putri_siswa_kelas_id_foreign` FOREIGN KEY (`putri_kelas_id_kelas`) REFERENCES `putri_kelas` (`id_kelas`) ON DELETE CASCADE,
  ADD CONSTRAINT `putri_siswa_spp_id_foreign` FOREIGN KEY (`spp_id_spp`) REFERENCES `putri_spp` (`id_spp`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
