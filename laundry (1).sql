-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 14, 2025 at 06:59 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_layanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` decimal(15,2) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id`, `nama_layanan`, `harga`, `deskripsi`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cuci Kering', '10000.00', 'Layanan cuci pakaian tanpa setrika.', 'active', '2025-12-12 03:43:16', '2025-12-12 03:43:16'),
(2, 'Cuci Basah', '8000.00', 'Layanan cuci pakaian tanpa pengeringan.', 'active', '2025-12-12 03:43:16', '2025-12-12 03:43:16'),
(3, 'Cuci + Setrika', '15000.00', 'Layanan cuci dan setrika pakaian.', 'active', '2025-12-12 03:43:16', '2025-12-12 03:43:16'),
(4, 'Setrika Saja', '7000.00', 'Layanan setrika pakaian saja.', 'active', '2025-12-12 03:43:16', '2025-12-12 03:43:16'),
(5, 'Dry Clean', '30000.00', 'Layanan dry clean untuk bahan khusus.', 'active', '2025-12-12 03:43:16', '2025-12-12 03:43:16'),
(6, 'Cuci Selimut', '25000.00', 'Layanan cuci selimut ukuran besar.', 'active', '2025-12-12 03:43:16', '2025-12-12 03:43:16'),
(7, 'Cuci Bed Cover', '30000.00', 'Layanan cuci bed cover berbagai ukuran.', 'active', '2025-12-12 03:43:16', '2025-12-12 03:43:16'),
(8, 'Cuci Karpet', '35000.00', 'Layanan cuci karpet rumah atau kantor.', 'active', '2025-12-12 03:43:16', '2025-12-12 03:43:16'),
(9, 'Cuci Sepatu', '20000.00', 'Layanan cuci sepatu harian dan premium.', 'active', '2025-12-12 03:43:16', '2025-12-12 03:43:16'),
(10, 'Cuci Tas', '25000.00', 'Layanan cuci tas kain dan tas fashion.', 'active', '2025-12-12 03:43:16', '2025-12-12 03:43:16'),
(21, 'Cuci Kering', '5000.00', NULL, 'active', '2025-12-12 06:16:12', '2025-12-12 06:16:12'),
(22, 'Cuci Basah', '4000.00', NULL, 'active', '2025-12-12 06:16:12', '2025-12-12 06:16:12'),
(23, 'Cuci Setrika', '8000.00', NULL, 'active', '2025-12-12 06:16:12', '2025-12-12 06:16:12'),
(24, 'Setrika Saja', '3000.00', NULL, 'active', '2025-12-12 06:16:12', '2025-12-12 06:16:12'),
(25, 'Dry Cleaning', '15000.00', NULL, 'active', '2025-12-12 06:16:12', '2025-12-12 06:16:12'),
(26, 'Cuci Karpet', '25000.00', NULL, 'active', '2025-12-12 06:16:12', '2025-12-12 06:16:12'),
(27, 'Cuci Sepatu', '12000.00', NULL, 'active', '2025-12-12 06:16:12', '2025-12-12 06:16:12'),
(28, 'Cuci Helm', '10000.00', NULL, 'active', '2025-12-12 06:16:12', '2025-12-12 06:16:12'),
(29, 'Cuci Boneka', '7000.00', NULL, 'active', '2025-12-12 06:16:12', '2025-12-12 06:16:12'),
(30, 'Cuci Jas', '20000.00', NULL, 'active', '2025-12-12 06:16:12', '2025-12-12 06:16:12'),
(31, 'Cuci Bed Cover', '18000.00', NULL, 'active', '2025-12-12 06:16:12', '2025-12-12 06:16:12'),
(32, 'Cuci Gorden', '22000.00', NULL, 'active', '2025-12-12 06:16:12', '2025-12-12 06:16:12'),
(33, 'Cuci Sprei', '6000.00', NULL, 'active', '2025-12-12 06:16:12', '2025-12-12 06:16:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_user_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_11_06_062508_create_pelanggan_table', 1),
(6, '2025_12_12_011333_create_layanan_table', 1),
(7, '2025_12_13_064043_create_transaksi_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Andi Pratama', '081234567801', 'Jl. Melati No. 12, Jakarta', '2025-12-12 03:45:33', '2025-12-12 03:45:33'),
(2, 'Budi Santoso', '081234567802', 'Jl. Kenanga No. 5, Jakarta', '2025-12-12 03:45:33', '2025-12-12 03:45:33'),
(3, 'Citra Lestari', '081234567803', 'Jl. Mawar No. 8, Jakarta', '2025-12-12 03:45:33', '2025-12-12 03:45:33'),
(4, 'Dewi Anggraini', '081234567804', 'Jl. Dahlia No. 3, Jakarta', '2025-12-12 03:45:33', '2025-12-12 03:45:33'),
(5, 'Eko Saputra', '081234567805', 'Jl. Flamboyan No. 10, Jakarta', '2025-12-12 03:45:33', '2025-12-12 03:45:33'),
(6, 'Fajar Hidayat', '081234567806', 'Jl. Cendana No. 21, Jakarta', '2025-12-12 03:45:33', '2025-12-12 03:45:33'),
(7, 'Gita Maharani', '081234567807', 'Jl. Cemara No. 7, Jakarta', '2025-12-12 03:45:33', '2025-12-12 03:45:33'),
(8, 'Hendra Wijaya', '081234567808', 'Jl. Anggrek No. 15, Jakarta', '2025-12-12 03:45:33', '2025-12-12 03:45:33'),
(9, 'Indah Permata', '081234567809', 'Jl. Teratai No. 9, Jakarta', '2025-12-12 03:45:33', '2025-12-12 03:45:33'),
(10, 'Joko Prabowo', '081234567810', 'Jl. Kamboja No. 4, Jakarta', '2025-12-12 03:45:33', '2025-12-12 03:45:33'),
(11, 'Kirana Putri', '081234567811', 'Jl. Pinang No. 18, Jakarta', '2025-12-12 03:45:33', '2025-12-12 03:45:33'),
(12, 'Lukman Hakim', '081234567812', 'Jl. Beringin No. 2, Jakarta', '2025-12-12 03:45:33', '2025-12-12 03:45:33'),
(13, 'Maya Sari', '081234567813', 'Jl. Randu No. 6, Jakarta', '2025-12-12 03:45:33', '2025-12-12 03:45:33'),
(14, 'Nanda Kusuma', '081234567814', 'Jl. Jati No. 11, Jakarta', '2025-12-12 03:45:33', '2025-12-12 03:45:33'),
(15, 'Oki Firmansyah', '081234567815', 'Jl. Ketapang No. 20, Jakarta', '2025-12-12 03:45:33', '2025-12-12 03:45:33'),
(16, 'Putri Amelia', '081234567816', 'Jl. Mangga No. 14, Jakarta', '2025-12-12 03:45:33', '2025-12-12 03:45:33'),
(17, 'Qori Rahma', '081234567817', 'Jl. Durian No. 22, Jakarta', '2025-12-12 03:45:33', '2025-12-12 03:45:33'),
(18, 'Rizky Maulana', '081234567818', 'Jl. Nangka No. 17, Jakarta', '2025-12-12 03:45:33', '2025-12-12 03:45:33'),
(19, 'Sinta Ayu', '081234567819', 'Jl. Rambutan No. 13, Jakarta', '2025-12-12 03:45:33', '2025-12-12 03:45:33'),
(21, 'Ayu Dewi', '08128382848', 'Jl udin udon no 8 Jakarta Barat', '2025-12-11 20:48:15', '2025-12-11 20:48:15'),
(22, 'Huni Gumelar', '08512345677', 'jl agung', '2025-12-12 05:49:01', '2025-12-12 05:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint UNSIGNED NOT NULL,
  `pelanggan_id` bigint UNSIGNED NOT NULL,
  `layanan_id` bigint UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `berat` double(8,2) NOT NULL,
  `total_harga` int NOT NULL,
  `status` enum('masuk','proses','selesai','diambil') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'masuk',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `pelanggan_id`, `layanan_id`, `tanggal`, `berat`, `total_harga`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-12-10', 2.00, 30000, 'masuk', '2025-12-10 01:10:00', '2025-12-10 01:10:00'),
(2, 2, 2, '2025-12-10', 3.50, 52500, 'proses', '2025-12-10 02:00:00', '2025-12-10 02:20:00'),
(3, 3, 3, '2025-12-11', 1.00, 20000, 'selesai', '2025-12-11 00:45:00', '2025-12-11 03:00:00'),
(4, 4, 4, '2025-12-11', 5.00, 100000, 'masuk', '2025-12-11 04:00:00', '2025-12-11 04:00:00'),
(5, 5, 5, '2025-12-12', 4.00, 80000, 'proses', '2025-12-12 01:30:00', '2025-12-12 02:00:00'),
(6, 6, 6, '2025-12-12', 2.50, 50000, 'selesai', '2025-12-12 03:15:00', '2025-12-12 05:00:00'),
(7, 7, 7, '2025-12-13', 6.00, 120000, 'masuk', '2025-12-13 02:10:00', '2025-12-13 02:20:00'),
(8, 8, 8, '2025-12-13', 3.00, 60000, 'masuk', '2025-12-13 06:00:00', '2025-12-13 06:00:00'),
(9, 9, 9, '2025-12-14', 7.50, 150000, 'proses', '2025-12-14 03:00:00', '2025-12-14 03:30:00'),
(10, 10, 10, '2025-12-14', 5.00, 100000, 'selesai', '2025-12-14 04:20:00', '2025-12-14 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint NOT NULL DEFAULT '1',
  `status` tinyint NOT NULL DEFAULT '1',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `hp`, `role`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ibmu Muzaki', 'ibnu@gmail.com', '0812345678901', 1, 1, '$2y$12$soYZrqiV7EUJrIxMiPf1Qud9/I5xvN4pv3QFDXeqskNnTh/uH8FIq', NULL, '2025-12-11 20:20:12', '2025-12-11 20:20:12'),
(2, 'Sopian Aji', 'sopian4ji@gmail.com', '081234567892', 0, 1, '$2y$12$ws6ovELVzkQ5KA2j2lK5qeZyJATdMG6LXWomrEYbzSIaLx4oVXCye', NULL, '2025-12-11 20:20:12', '2025-12-11 20:20:12');

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
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_pelanggan_id_foreign` (`pelanggan_id`),
  ADD KEY `transaksi_layanan_id_foreign` (`layanan_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_layanan_id_foreign` FOREIGN KEY (`layanan_id`) REFERENCES `layanan` (`id`),
  ADD CONSTRAINT `transaksi_pelanggan_id_foreign` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
