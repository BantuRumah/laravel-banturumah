-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 11:09 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banturumah`
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
(81, '2014_10_12_100000_create_password_resets_table', 1),
(82, '2019_08_19_000000_create_failed_jobs_table', 1),
(83, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(84, '2023_10_22_053136_create_mitra_table', 1),
(85, '2023_10_22_131714_create_roles_table', 1),
(86, '2023_10_22_132344_create_users_table', 1),
(87, '2023_11_02_045920_create_transaksi_table', 1),
(88, '2023_12_14_140320_create_ratings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `layanan` longtext DEFAULT NULL,
  `umur` bigint(20) NOT NULL,
  `radius` varchar(255) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `mobilitas` varchar(255) DEFAULT NULL,
  `status` enum('menunggu','tersedia','tidak tersedia') NOT NULL DEFAULT 'tersedia',
  `harga` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`id`, `name`, `layanan`, `umur`, `radius`, `pekerjaan`, `mobilitas`, `status`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'Nengah Yastrini', 'Asisten Rumah Tangga', 32, 'Pandaan', '1. Menyapu \n2. Mengepel \n3. Menjaga Rumah \n4. Cuci Baju \n5. Mengelap', 'Pulang Pergi', 'tersedia', 38500, '2023-12-14 10:08:21', '2023-12-14 10:08:21'),
(2, 'Ainur Rohman', 'Driver', 35, 'Jawa Timur', 'Mengantar kedalam kota maupun luar kota', 'Pulang Pergi', 'tersedia', 125000, '2023-12-14 10:08:21', '2023-12-14 10:08:21');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaksi_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` enum('admin','mitra','user') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2023-12-14 10:08:21', '2023-12-14 10:08:21'),
(2, 'mitra', '2023-12-14 10:08:21', '2023-12-14 10:08:21'),
(3, 'user', '2023-12-14 10:08:21', '2023-12-14 10:08:21');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_sewa` enum('harian','mingguan','bulanan') NOT NULL,
  `tanggal_sewa` date NOT NULL,
  `tanggal_berakhir` date NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `waktu_transaksi` time NOT NULL,
  `jumlah_harga` varchar(255) DEFAULT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `status` enum('payyed','success','failed','finished') NOT NULL DEFAULT 'payyed',
  `mitra_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `telephone` bigint(20) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `mitra_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `profile_picture`, `name`, `email`, `email_verified_at`, `password`, `role`, `telephone`, `alamat`, `mitra_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Admin BantuRumah', 'banturumah4@gmail.com', NULL, '$2y$10$u3irGgyJx1LBt4IzdxBAbuub2zFNgINkZ2sM3ETZe..bRdX4d6X3.', 'admin', 82313568127, 'Jl. Soekarno Hatta No.9, Jatimulyo, Kec.Lowokwaru, Kota Malang, Jawa Timur 65141', NULL, NULL, '2023-12-14 10:08:21', '2023-12-14 10:08:21'),
(2, NULL, 'Nengah Yastrini', 'nengahyas@gmail.com', NULL, '$2y$10$7FDMK0H9eMfNdW/r.Y.WWuZocfvynIr7mKvX74ukS90Lde.Shrxf6', 'mitra', 85159094231, 'Jl. Soekarno Hatta No.9, Jatimulyo, Kec.Lowokwaru, Kota Malang, Jawa Timur 65141', 1, NULL, '2023-12-14 10:08:21', '2023-12-14 10:08:21'),
(3, NULL, 'Ainur Rohman', 'arohman@gmail.com', NULL, '$2y$10$VxRMoJuhvZd3aQTWefMZBOuox6aEDBT7np6l0LWBF5Pgt/i39qFZ.', 'mitra', 85159094232, 'Jl. Soekarno Hatta No.9, Jatimulyo, Kec.Lowokwaru, Kota Malang, Jawa Timur 65141', 2, NULL, '2023-12-14 10:08:21', '2023-12-14 10:08:21'),
(4, NULL, 'Devi Oktarina', 'devioktarina86@gmail.com', NULL, '$2y$10$22HVhZdOjWy8SOd7g7UQqOd89d/nwTI/G0rAJxjXuxyKdPkXlE86m', 'user', NULL, NULL, NULL, NULL, '2023-12-14 10:08:21', '2023-12-14 10:08:21'),
(5, NULL, 'Hanifah', 'hanifahs21@gmail.com', NULL, '$2y$10$z2oG.mphWm3V0jJG2nTIHeoXKLzYPgFHgYRnvCQLhzTozMklf2Sz2', 'user', NULL, NULL, NULL, NULL, '2023-12-14 10:08:21', '2023-12-14 10:08:21'),
(6, NULL, 'User BantuRumah', 'user@gmail.com', NULL, '$2y$10$c7FSARAH.ZamC06XPzQyp.b/5iAYfqYLokxTOxr04ns8vbcVnTkbK', 'user', NULL, NULL, NULL, NULL, '2023-12-14 10:08:21', '2023-12-14 10:08:21');

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
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_transaksi_id_foreign` (`transaksi_id`),
  ADD KEY `ratings_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_user_id_foreign` (`user_id`),
  ADD KEY `transaksi_mitra_id_foreign` (`mitra_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_mitra_id_foreign` (`mitra_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_transaksi_id_foreign` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_mitra_id_foreign` FOREIGN KEY (`mitra_id`) REFERENCES `mitra` (`id`),
  ADD CONSTRAINT `transaksi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_mitra_id_foreign` FOREIGN KEY (`mitra_id`) REFERENCES `mitra` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
