-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 08, 2017 at 03:29 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
--

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(10) UNSIGNED NOT NULL,
  `id_perusahaan` int(10) UNSIGNED NOT NULL,
  `nama_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(194, '2014_10_12_000000_create_users_table', 1),
(195, '2014_10_12_100000_create_password_resets_table', 1),
(196, '2017_09_16_120937_laratrust_setup_tables', 1),
(197, '2017_09_16_122355_create_perusahaans_table', 1),
(198, '2017_09_17_042654_create_laporan_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perusahaans`
--

CREATE TABLE `perusahaans` (
  `id_perusahaan` int(10) UNSIGNED NOT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perusahaans`
--

INSERT INTO `perusahaans` (`id_perusahaan`, `nama_perusahaan`, `alamat_perusahaan`, `no_tlp`, `jenis_perusahaan`, `created_at`, `updated_at`) VALUES
(2, 'PT. Bharinto Eka Pratama', 'Pondok Indah Office Tower, 3 floor, Jl. Sultan Iskandar Muda Kav. V-TA, Jakarta Selatan 12310', '021-2932-8100', 'Perkebunan', '2017-10-02 22:26:20', '2017-10-04 02:55:21'),
(3, 'PT. Kruing Lestari Jaya', 'Jl. Ahmad Yani Komplek. Cendrawasih, Gg. Baru, No. 2A, RT. 17, Kel. Termindung Permai, Samarinda', '0541-739948', 'Perkebunan', '2017-10-02 22:26:20', '2017-10-04 02:59:04'),
(4, 'PT. PP London Sumatra Indonesia Tbk', 'Jl. Ahmad Yani, Ruko Mitra Mas 8 No. 27-28, Samarinda, Kalimantan Timur 75117', '0541-738804', 'Perkebunan', '2017-10-02 22:26:20', '2017-10-04 02:57:47'),
(5, 'PT. Kutai Agro Lestari', 'Gedung Graha Pratama Lantai 3, Jl. MT. Haryono Kav. 15, Jakarta', '021-83793802', 'Perkebunan', '2017-10-03 17:43:17', '2017-10-04 03:00:29'),
(6, 'PT. Trubaindo Coal Mining', 'Pondok Indah Office, 3 Floor, Jl. Sultan Iskandar Muda Kav. V-TA, Jakarta 12310', '021-29328100', 'Pertambangan', '2017-10-03 18:55:37', '2017-10-04 03:02:12'),
(7, 'PT. Gunung Bayan Pratama Coal', 'Gedung Office 8, Lantai 36, Unit A, SCBD Lot 28, Jl. Jend. Sudirman Kav. 52-53, Jakarta Selatan', '021-2935688', 'Pertambangan', '2017-10-02 22:26:20', '2017-10-04 03:03:41'),
(8, 'PT. Test', 'test', '085250887878', 'Perkebunan', '2017-10-07 00:52:40', '2017-10-07 00:52:40');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', NULL, '2017-10-02 22:26:19', '2017-10-02 22:26:19'),
(2, 'member', 'Member', NULL, '2017-10-02 22:26:19', '2017-10-02 22:26:19');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `level`, `id_perusahaan`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@gmail.com', '$2y$10$1RgCW4iFK/dA2P8KZdj96uTrdHoiZJLAgF4pUa5YiwOI0XTWSRMqO', 'admin', 0, 'MEUUAxtSJ44Gq1kjkEJCGat7wCowIl5E05K6G0OKpMtBZamvnfV32ZEtetZI', '2017-10-02 22:26:19', '2017-10-02 22:26:19'),
(2, 'PT. Bharinto Eka Pratama', 'member@gmail.com', '$2y$10$b8gICQZlU4IcM005J9Nr8e4.CvRoNZ7u5rrZjoBxOzcS9OuAbsELW', 'member', 2, 'skIEgZUdtUpU9uSjO2dKCNl9e1FKvPrUUkbKPZVuVtcwt2YBgm19d9fjlBCV', '2017-10-02 22:26:20', '2017-10-02 22:26:20'),
(3, 'PT. Kruing Lestari Jaya', 'kruing1@gmail.com', '$2y$10$oBDYBhWUVv3pLXIsblxYnuKvwmIOcrelwlvllxRVlDwCQiODdwLsK', 'member', 3, '0rd1rOLe18U2sL8inEnXVTQHbZpsUnPZ2cu3L1K7ybtR2rPFCZZR9e0RRfgg', '2017-10-03 06:51:35', NULL),
(4, 'PT. PP London Sumatra Indonesia Tbk', 'kembar@gmail.com', '$2y$10$b8gICQZlU4IcM005J9Nr8e4.CvRoNZ7u5rrZjoBxOzcS9OuAbsELW', 'member', 4, 'FXC25w63MYYCYJGc4jZQnX395bNFEDiS0mZ0kjnOB6GxqQ1UYfNHCC33FIYu', '2017-10-04 07:40:29', NULL),
(5, 'PT. Kutai Agro Lestari', 'nasdem@gmail.com', '$2y$10$b8gICQZlU4IcM005J9Nr8e4.CvRoNZ7u5rrZjoBxOzcS9OuAbsELW', 'member', 5, 'uMtGl51LMNRugcJETQdUgFQKxyKwmelTBRslc3uK2U8wckj13YmgbvjLWJyP', '2017-10-04 07:40:36', NULL),
(6, 'PT. Trubaindo Coal Mining', 'semoga@gmail.com', '$2y$10$ff0tAR3Hs1BYEYoLeuZSX.HY.NmTR2GOa2g8hZlydRSU9IuH6UVg.', 'member', 6, 'eF1GSt7VrMbZRjP4rcrosb35d0RcyHTsdrkpSpRZE7lO7Dqo5fW70u9ZqEqO', '2017-10-03 18:55:38', '2017-10-03 18:55:38'),
(7, 'PT. Gunung Bayan Pratama Coal', 'skl@gmail.com', '$2y$10$b8gICQZlU4IcM005J9Nr8e4.CvRoNZ7u5rrZjoBxOzcS9OuAbsELW', 'member', 7, 'lGXwAWM8l2IUXqUQ9J6KmfmugIWetnvGtunkxcDtbYViTrmi2ItmdbjPZmsF', '2017-10-04 07:40:42', NULL),
(8, 'PT. Test', 'kaleda@gmail.com', '$2y$10$9iv9qTFgqq/qDUIkzrvCxOuzl1cKmOrTLO6GIMl5pUYnwkbYaQA5a', 'member', 8, 'u5VXahLjNMEPPJSMmoXKaZQUFUur7xYrYawJvAraVby4t6GlHb1vUIugcWOH', '2017-10-07 00:52:40', '2017-10-07 00:52:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `laporan_id_perusahaan_foreign` (`id_perusahaan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`);

--
-- Indexes for table `perusahaans`
--
ALTER TABLE `perusahaans`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `perusahaans`
--
ALTER TABLE `perusahaans`
  MODIFY `id_perusahaan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
