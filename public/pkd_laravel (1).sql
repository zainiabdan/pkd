-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2019 at 02:53 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkd_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `id_instansi` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_instansi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id_instansi`, `nama_instansi`, `alamat`, `created_at`, `updated_at`) VALUES
('1', 'Biro Umum', 'Jl A Yani', NULL, NULL),
('8a1fb202e34442cab8f951f396b9815c', 'Biro Organisasi', 'Jl A Yani', '2019-10-11 03:15:40', '2019-10-11 04:39:59'),
('bacb7778b418467fb2a347a87d223716', 'Biro Hukum', 'JL A Yani', '2019-10-11 04:37:39', '2019-10-11 04:37:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_09_23_091938_create_vehicles_table', 2),
(12, '2019_09_25_082312_create_types_table', 2),
(18, '2019_09_29_173724_create_roles_table', 3),
(19, '2019_09_29_173855_create_role_user_table', 4),
(20, '2019_09_29_173999_create_roles_table', 4),
(21, '2019_10_03_052343_create_transactions_table', 5),
(22, '2019_10_11_071441_create_instansis_table', 6),
(23, '2019_10_11_141507_create_notifications_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('043b3bdc-ab1b-45c4-af37-29b4116f6245', 'App\\Notifications\\Notifikasi', 'App\\User', 0, '{\"event\":\"Pembeli telah menambahkan order baru\"}', NULL, '2019-10-11 07:36:02', '2019-10-11 07:36:02'),
('7200534b-e1e0-4da7-88ca-519adfdc3d48', 'App\\Notifications\\Notifikasi', 'App\\User', 0, '{\"event\":\"Pembeli telah menambahkan order baru\"}', NULL, '2019-10-11 07:36:33', '2019-10-11 07:36:33'),
('c52adb24-9b99-43ba-a220-19beac5baa5f', 'App\\Notifications\\Notifikasi', 'App\\User', 0, '{\"event\":\"Pembeli telah menambahkan order baru\"}', NULL, '2019-10-11 07:36:03', '2019-10-11 07:36:03');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('abdaanzz@gmail.com', '$2y$10$qVi1LF.0NuJP7ZZSzvuMaOLWeNgzF3HofwF9hDpjSZBr9ebyMznr.', '2019-10-12 05:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_role` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `name`, `created_at`, `updated_at`) VALUES
('5cd69df8-beda-4fb3-9366-67ef34fe', 'user', NULL, NULL),
('8bfdc8b1-0d4b-46ae-82eb-1c13bc8d', 'superadmin', NULL, NULL),
('9e4e5e0a-a26a-4310-b47b-3ce0b185', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id_role_user` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_role` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id_role_user`, `id_role`, `id_user`, `created_at`, `updated_at`) VALUES
('0c9e93289ab645a5a1820b6ffa9c2a3f', '5cd69df8-beda-4fb3-9366-67ef34fe', '44d69683cbf24ddbaf938da9836fc38a', '2019-10-12 06:14:53', '2019-10-12 06:14:53'),
('37cc5eb79db34e4ea95a59ff404d78ee', '9e4e5e0a-a26a-4310-b47b-3ce0b185', 'fe4d35abffeb4c7e953f677e5e7357f8', '2019-10-11 02:56:15', '2019-10-11 02:56:15');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id_transaction` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_vehicle` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_peminjam` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_admin` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keperluan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `tgl_pinjam` datetime NOT NULL,
  `tgl_kembali` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id_transaction`, `id_vehicle`, `id_peminjam`, `id_admin`, `keperluan`, `tujuan`, `status`, `tgl_pinjam`, `tgl_kembali`, `created_at`, `updated_at`) VALUES
('22a797fe78a944e69c40fb8e2b6f93d5', '20', '44d69683cbf24ddbaf938da9836fc38a', 'fe4d35abffeb4c7e953f677e5e7357f8', 's', 'a', '4', '2019-11-12 12:00:00', '2019-11-12 13:00:00', '2019-10-11 19:37:16', '2019-10-11 23:50:41'),
('26458dbd6c784ae1a1647eb62496fdf1', '17d52242a53d4de784d9b3b30ccd6e1d', 'fe4d35abffeb4c7e953f677e5e7357f8', NULL, 'asa', '131', '0', '2019-10-12 12:00:00', '2019-11-12 11:00:00', '2019-04-30 19:36:11', '2019-10-11 19:36:11'),
('3ba1d9ba867f4b20a130161f3b712503', '01be81dde641499ca4c92201936f6507', 'fe4d35abffeb4c7e953f677e5e7357f8', NULL, 'asa', 'asas', '0', '2019-10-12 20:00:00', '2019-10-24 20:00:00', '2019-10-12 05:49:45', '2019-10-12 05:49:45'),
('5073ccb820094f25a3df7ca757545aa4', '01be81dde641499ca4c92201936f6507', 'fe4d35abffeb4c7e953f677e5e7357f8', NULL, 'a', 'a', '0', '2019-10-12 12:00:00', '2019-11-12 11:00:00', '2019-10-13 19:51:24', '2019-10-11 19:51:24'),
('5073ccb820094f25a3df7ca757545aa5', '01be81dde641499ca4c92201936f6507', 'fe4d35abffeb4c7e953f677e5e7357f8', NULL, 'a', 'a', '0', '2019-10-12 12:00:00', '2019-11-12 11:00:00', '2019-10-13 19:51:24', '2019-10-11 19:51:24'),
('5073ccb820094f25a3df7ca757545aa6', '01be81dde641499ca4c92201936f6507', 'fe4d35abffeb4c7e953f677e5e7357f8', NULL, 'a', 'a', '0', '2019-10-12 12:00:00', '2019-11-12 11:00:00', '2019-10-14 19:51:24', '2019-10-11 19:51:24'),
('5e8b57af0c7044d981aab537c1083b7a', '20', 'fe4d35abffeb4c7e953f677e5e7357f8', NULL, 'asa', 'sasa', '0', '2019-10-12 20:00:00', '2019-12-11 20:20:00', '2019-10-12 06:21:01', '2019-10-12 06:21:01'),
('b80fa5bcf8724216ac91f4dd1d146cc1', '167b85ad973d4db786a03167894ebd92', 'fe4d35abffeb4c7e953f677e5e7357f8', 'fe4d35abffeb4c7e953f677e5e7357f8', 'a', 'b', '2', '2019-10-17 12:00:00', '2019-10-23 11:00:00', '2018-12-31 17:56:17', '2019-10-11 23:48:55'),
('b80fa5bcf8724216ac91f4dd1d146ccc', '167b85ad973d4db786a03167894ebd92', 'fe4d35abffeb4c7e953f677e5e7357f8', NULL, 'a', 'b', '0', '2019-10-17 12:00:00', '2019-10-23 11:00:00', '2019-10-12 17:56:17', '2019-10-11 17:56:17');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id_type` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id_type`, `name`, `created_at`, `updated_at`) VALUES
('2', 'SUV', '2019-09-26 12:48:19', '2019-10-09 08:27:06'),
('3', 'JEEP', '2019-09-26 19:31:45', '2019-09-30 18:51:56'),
('4', 'Sedan', '2019-09-30 05:24:41', '2019-10-04 18:22:49'),
('5', 'Truck', '2019-09-30 05:59:41', '2019-09-30 09:16:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_instansi` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_ktp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_profil` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `id_instansi`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `alamat`, `no_telp`, `foto_ktp`, `foto_profil`) VALUES
('44d69683cbf24ddbaf938da9836fc38a', '8a1fb202e34442cab8f951f396b9815c', 'arif', 'arif@gmail.com', NULL, '$2y$10$0/LFzhqxkS2SN4.1g3x.NeoumJkDHZYYOe9NExFXMbgTEGBM.Nuqu', NULL, '2019-10-12 06:14:53', '2019-10-12 06:14:53', 'Jl A Yani', '02123212', 'public/images/ktp/bmfWdcYXmoaRC3hrnWjjrQbGv0ra4XAljmleL6gX.jpeg', NULL),
('fe4d35abffeb4c7e953f677e5e7357f8', '1', 'Zaini Abdan', 'abdaanzz@gmail.com', NULL, '$2y$10$cCWMhnXHEwi46uZtUh74JeyzCW2LWa/eeOMIAAA9M7xPfs8g2cF1W', NULL, '2019-10-11 02:56:15', '2019-10-11 03:13:59', 'asas', '0', 'public/images/ktp/i1XNW0jjfAHNgbSG3z6kNehzI4aGbbr0crggR1yH.jpeg', 'public/images/profilepicture/KdeYVdWO0rHdCAOBZae7LdT5OupKpKsGHLFU54Zx.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id_vehicle` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_type` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nopol` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seats` int(3) NOT NULL,
  `transmission` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ac` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id_vehicle`, `id_type`, `file`, `nopol`, `name`, `seats`, `transmission`, `ac`, `created_at`, `updated_at`) VALUES
('01be81dde641499ca4c92201936f6507', '4', 'public/images/vehicles/RRffT8yLMUMLopEWkysHMUloc8seJEZs34TOEA0M.jpeg', 'da', 'inove', 2, 'otomatis', 1, '2019-10-09 00:01:35', '2019-10-10 06:28:47'),
('167b85ad973d4db786a03167894ebd92', '5', 'public/images/vehicles/LNWwIuFbVSLwmGNd5oexumeLHD7UD58NPUHhZyAp.jpeg', 'da', 'kijang', 7, 'otomatis', 1, '2019-10-08 22:39:16', '2019-10-10 06:28:59'),
('17d52242a53d4de784d9b3b30ccd6e1d', '5', 'public/images/vehicles/wEdwZ4NTjhZTLbohph6mVNuD6C6j25rBR7N3LnOB.jpeg', 'DA 7355 PO', 'Hino', 2, 'MANUAL', 1, '2019-10-10 00:06:21', '2019-10-10 06:29:11'),
('20', '3', 'public/images/vehicles/MAR8bCDTN76KEZTJ3ynZpyEnLmeIF1NABxXEIiug.jpeg', 'DA 2142 KK', 'sasas', 1, 'otomtis', 1, '2019-10-02 06:39:25', '2019-10-10 06:29:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id_role_user`),
  ADD UNIQUE KEY `user_id` (`id_user`),
  ADD KEY `role_id` (`id_role`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id_transaction`),
  ADD KEY `id_vehicle` (`id_vehicle`),
  ADD KEY `id_peminjam` (`id_peminjam`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id_instansi` (`id_instansi`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id_vehicle`),
  ADD KEY `id_type` (`id_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `role_user_ibfk_3` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`id_vehicle`) REFERENCES `vehicles` (`id_vehicle`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`id_peminjam`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `transactions_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `instansi` FOREIGN KEY (`id_instansi`) REFERENCES `instansi` (`id_instansi`);

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `types` (`id_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
