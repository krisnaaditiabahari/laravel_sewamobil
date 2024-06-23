-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2024 at 09:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sewamobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_06_23_063724_create_mobils_table', 1),
(6, '2024_06_23_073809_create_pinjams_table', 1),
(7, '2024_06_23_091709_create_pengembalian_mobils_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mobils`
--

CREATE TABLE `mobils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merek` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `no_plat` varchar(255) NOT NULL,
  `tarif_sewa` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mobils`
--

INSERT INTO `mobils` (`id`, `merek`, `model`, `no_plat`, `tarif_sewa`, `stok`) VALUES
(1, 'Hyundai', 'Hyundai Creta', 'D 4430 VBQ', 95000, 2),
(2, 'Hyundai', 'Hyundai Stargazer', 'D 4431 VBQ', 100000, 2),
(3, 'Toyota', 'AGYA', 'D 4432 VBQ', 110000, 2),
(4, 'Toyota', 'AVANZA', 'D 4433 VBQ', 115000, 2),
(5, 'Daihatsu', 'Ayla', 'D 4435 VBQ', 90000, 2),
(6, 'Daihatsu', 'Terios', 'D 4436 VBQ', 120000, 2),
(7, 'Honda', 'Brio', 'D 4437 VBQ', 90000, 2),
(8, 'Honda', 'CR-V', 'D 4438 VBQ', 125000, 2),
(9, 'Suzuki', 'Ertiga', 'D 4439 VBQ', 130000, 2),
(10, 'Mitsubishi', 'Xpander', 'D 4440 VBQ', 150000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian_mobils`
--

CREATE TABLE `pengembalian_mobils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Invoice_Peminjaman` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `QTY` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `lama_sewa` int(11) NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `kelebihan_hari` int(11) NOT NULL,
  `denda_keterlambatan` int(10) UNSIGNED NOT NULL,
  `total_bayar` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengembalian_mobils`
--

INSERT INTO `pengembalian_mobils` (`id`, `Invoice_Peminjaman`, `nama`, `model`, `QTY`, `tanggal_mulai`, `tanggal_selesai`, `lama_sewa`, `harga_sewa`, `tanggal_kembali`, `kelebihan_hari`, `denda_keterlambatan`, `total_bayar`) VALUES
(1, 'INV-004', 'Doni', 'Terios', 1, '2024-06-21', '2024-06-24', 4, 480000, '2024-06-25', 1, 50000, 530000),
(2, 'INV-001', 'Asep', 'Xpander', 1, '2024-06-21', '2024-06-24', 3, 450000, '2024-06-26', 2, 100000, 550000),
(3, 'INV-002', 'Bagas', 'Ertigar', 1, '2024-06-20', '2024-06-24', 4, 520000, '2024-06-30', 6, 300000, 820000),
(4, 'INV-003', 'Chika', 'Brio', 1, '2024-06-22', '2024-06-24', 2, 270000, '2024-06-28', 4, 200000, 470000);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pinjams`
--

CREATE TABLE `pinjams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Invoice_Peminjaman` varchar(255) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `QTY` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `lama_sewa` int(11) NOT NULL,
  `harga_sewa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pinjams`
--

INSERT INTO `pinjams` (`id`, `Invoice_Peminjaman`, `Nama`, `model`, `QTY`, `tanggal_mulai`, `tanggal_selesai`, `lama_sewa`, `harga_sewa`) VALUES
(1, 'INV-001', 'Asep', 'Xpander', 1, '2024-06-21', '2024-06-24', 3, 450000),
(2, 'INV-002', 'Bagas', 'Ertigar', 1, '2024-06-20', '2024-06-24', 4, 520000),
(3, 'INV-003', 'Chika', 'Brio', 1, '2024-06-22', '2024-06-24', 3, 270000),
(4, 'INV-004', 'Doni', 'Terios', 1, '2024-06-21', '2024-06-24', 4, 480000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','pengguna') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '$2y$10$RZqkMvdLwdnlipwq0Kiu1OEckhPbcDRFTuVjoOSMfbcBP38xTymuW', 'admin', NULL, '2024-06-23 05:53:54', '2024-06-23 05:53:54'),
(2, 'User', 'user', '$2y$10$tQvWv1XC4UdXtasyKTeA1e4gwgfQWy2p5R6aFjgzXONtJvWQJCPgW', 'pengguna', NULL, '2024-06-23 05:53:54', '2024-06-23 05:53:54'),
(3, 'Asep', 'asep', '$2y$10$bkUloKdM2DeJrqt2nw4BQurZEOOiuLyVbJXLYGffKmDu01clQl6om', 'pengguna', NULL, '2024-06-23 05:53:54', '2024-06-23 05:53:54'),
(4, 'Bagas', 'bagas', '$2y$10$WH7H5dquWpkdGH6avuZ2tew2cedy6nuqxe0vl/FZYfU8DVFMzHq2.', 'pengguna', NULL, '2024-06-23 05:53:55', '2024-06-23 05:53:55'),
(5, 'Chika', 'chika', '$2y$10$Q6kzAAYSdljwMfQANcqCFepRkJ/roSnpaWCoH3JbL7JnZZilUfRrq', 'pengguna', NULL, '2024-06-23 05:53:55', '2024-06-23 05:53:55'),
(6, 'Doni', 'doni', '$2y$10$JMmQp6VmtBtllBjJFjU0AuvRHMlNP1S9LyRjcJiTu.njYIw2HIMzS', 'pengguna', NULL, '2024-06-23 05:53:55', '2024-06-23 05:53:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobils`
--
ALTER TABLE `mobils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pengembalian_mobils`
--
ALTER TABLE `pengembalian_mobils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pinjams`
--
ALTER TABLE `pinjams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mobils`
--
ALTER TABLE `mobils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pengembalian_mobils`
--
ALTER TABLE `pengembalian_mobils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pinjams`
--
ALTER TABLE `pinjams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
