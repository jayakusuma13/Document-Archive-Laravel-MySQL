-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping structure for table demo-aplikasipos.laporan
CREATE TABLE IF NOT EXISTS `laporan` (
  `id_laporan` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_perusahaan` int(10) unsigned NOT NULL,
  `nama_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_laporan`),
  KEY `laporan_id_perusahaan_foreign` (`id_perusahaan`),
  CONSTRAINT `laporan_id_perusahaan_foreign` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaans` (`id_perusahaan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table demo-aplikasipos.laporan: ~1 rows (approximately)
/*!40000 ALTER TABLE `laporan` DISABLE KEYS */;
/*!40000 ALTER TABLE `laporan` ENABLE KEYS */;

-- Dumping structure for table demo-aplikasipos.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=199 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table demo-aplikasipos.migrations: ~5 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(194, '2014_10_12_000000_create_users_table', 1),
	(195, '2014_10_12_100000_create_password_resets_table', 1),
	(196, '2017_09_16_120937_laratrust_setup_tables', 1),
	(197, '2017_09_16_122355_create_perusahaans_table', 1),
	(198, '2017_09_17_042654_create_laporan_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table demo-aplikasipos.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table demo-aplikasipos.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table demo-aplikasipos.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table demo-aplikasipos.permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table demo-aplikasipos.permission_role
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table demo-aplikasipos.permission_role: ~0 rows (approximately)
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;

-- Dumping structure for table demo-aplikasipos.perusahaans
CREATE TABLE IF NOT EXISTS `perusahaans` (
  `id_perusahaan` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_perusahaan`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table demo-aplikasipos.perusahaans: ~6 rows (approximately)
/*!40000 ALTER TABLE `perusahaans` DISABLE KEYS */;
INSERT INTO `perusahaans` (`id_perusahaan`, `nama_perusahaan`, `alamat_perusahaan`, `no_tlp`, `jenis_perusahaan`, `created_at`, `updated_at`) VALUES
	(2, 'PT. Bharinto Eka Pratama', 'Pondok Indah Office Tower, 3 floor, Jl. Sultan Iskandar Muda Kav. V-TA, Jakarta Selatan 12310', '021-2932-8100', 'Perkebunan', '2017-10-03 06:26:20', '2017-10-04 10:55:21'),
	(3, 'PT. Kruing Lestari Jaya', 'Jl. Ahmad Yani Komplek. Cendrawasih, Gg. Baru, No. 2A, RT. 17, Kel. Termindung Permai, Samarinda', '0541-739948', 'Perkebunan', '2017-10-03 06:26:20', '2017-10-04 10:59:04'),
	(4, 'PT. PP London Sumatra Indonesia Tbk', 'Jl. Ahmad Yani, Ruko Mitra Mas 8 No. 27-28, Samarinda, Kalimantan Timur 75117', '0541-738804', 'Perkebunan', '2017-10-03 06:26:20', '2017-10-04 10:57:47'),
	(5, 'PT. Kutai Agro Lestari', 'Gedung Graha Pratama Lantai 3, Jl. MT. Haryono Kav. 15, Jakarta', '021-83793802', 'Perkebunan', '2017-10-04 01:43:17', '2017-10-04 11:00:29'),
	(6, 'PT. Trubaindo Coal Mining', 'Pondok Indah Office, 3 Floor, Jl. Sultan Iskandar Muda Kav. V-TA, Jakarta 12310', '021-29328100', 'Pertambangan', '2017-10-04 02:55:37', '2017-10-04 11:02:12'),
	(7, 'PT. Gunung Bayan Pratama Coal', 'Gedung Office 8, Lantai 36, Unit A, SCBD Lot 28, Jl. Jend. Sudirman Kav. 52-53, Jakarta Selatan', '021-2935688', 'Pertambangan', '2017-10-03 06:26:20', '2017-10-04 11:03:41');
/*!40000 ALTER TABLE `perusahaans` ENABLE KEYS */;

-- Dumping structure for table demo-aplikasipos.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table demo-aplikasipos.roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'Admin', NULL, '2017-10-03 06:26:19', '2017-10-03 06:26:19'),
	(2, 'member', 'Member', NULL, '2017-10-03 06:26:19', '2017-10-03 06:26:19');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table demo-aplikasipos.role_user
CREATE TABLE IF NOT EXISTS `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table demo-aplikasipos.role_user: ~7 rows (approximately)
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
	(1, 1),
	(2, 2),
	(3, 2),
	(4, 2),
	(5, 2),
	(6, 2),
	(7, 2);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;

-- Dumping structure for table demo-aplikasipos.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table demo-aplikasipos.users: ~8 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `level`, `id_perusahaan`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator', 'admin@gmail.com', '$2y$10$1RgCW4iFK/dA2P8KZdj96uTrdHoiZJLAgF4pUa5YiwOI0XTWSRMqO', 'admin', 0, '3LWgsqDJ1OmzpIm3gboasccv6EBY4okyp0RrLJ9VgPXQCj8cl2VgtjL8UgMu', '2017-10-03 06:26:19', '2017-10-03 06:26:19'),
	(2, 'PT. Bharinto Eka Pratama', 'member@gmail.com', '$2y$10$b8gICQZlU4IcM005J9Nr8e4.CvRoNZ7u5rrZjoBxOzcS9OuAbsELW', 'member', 2, 'skIEgZUdtUpU9uSjO2dKCNl9e1FKvPrUUkbKPZVuVtcwt2YBgm19d9fjlBCV', '2017-10-03 06:26:20', '2017-10-03 06:26:20'),
	(3, 'PT. Kruing Lestari Jaya', 'kruing1@gmail.com', '$2y$10$oBDYBhWUVv3pLXIsblxYnuKvwmIOcrelwlvllxRVlDwCQiODdwLsK', 'member', 3, '0rd1rOLe18U2sL8inEnXVTQHbZpsUnPZ2cu3L1K7ybtR2rPFCZZR9e0RRfgg', '2017-10-03 14:51:35', NULL),
	(4, 'PT. PP London Sumatra Indonesia Tbk', 'kembar@gmail.com', '$2y$10$b8gICQZlU4IcM005J9Nr8e4.CvRoNZ7u5rrZjoBxOzcS9OuAbsELW', 'member', 4, 'FXC25w63MYYCYJGc4jZQnX395bNFEDiS0mZ0kjnOB6GxqQ1UYfNHCC33FIYu', '2017-10-04 15:40:29', NULL),
	(5, 'PT. Kutai Agro Lestari', 'nasdem@gmail.com', '$2y$10$b8gICQZlU4IcM005J9Nr8e4.CvRoNZ7u5rrZjoBxOzcS9OuAbsELW', 'member', 5, 'uMtGl51LMNRugcJETQdUgFQKxyKwmelTBRslc3uK2U8wckj13YmgbvjLWJyP', '2017-10-04 15:40:36', NULL),
	(6, 'PT. Trubaindo Coal Mining', 'semoga@gmail.com', '$2y$10$ff0tAR3Hs1BYEYoLeuZSX.HY.NmTR2GOa2g8hZlydRSU9IuH6UVg.', 'member', 6, 'JrW5HeQP9z0fN0nm302FqZYkYbDgpYccdFsBlHBFLPAPhEuJ2NUz6VqAcUCt', '2017-10-04 02:55:38', '2017-10-04 02:55:38'),
	(7, 'PT. Gunung Bayan Pratama Coal', 'skl@gmail.com', '$2y$10$b8gICQZlU4IcM005J9Nr8e4.CvRoNZ7u5rrZjoBxOzcS9OuAbsELW', 'member', 7, 'lGXwAWM8l2IUXqUQ9J6KmfmugIWetnvGtunkxcDtbYViTrmi2ItmdbjPZmsF', '2017-10-04 15:40:42', NULL),
	(8, 'PT. Test', 'kaleda@gmail.com', '$2y$10$9iv9qTFgqq/qDUIkzrvCxOuzl1cKmOrTLO6GIMl5pUYnwkbYaQA5a', 'member', 8, 'u5VXahLjNMEPPJSMmoXKaZQUFUur7xYrYawJvAraVby4t6GlHb1vUIugcWOH', '2017-10-07 08:52:40', '2017-10-07 08:52:40');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
