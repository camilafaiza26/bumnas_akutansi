-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Des 2021 pada 11.12
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bumnas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidangs`
--

CREATE TABLE `bidangs` (
  `id_bidang` bigint(20) UNSIGNED NOT NULL,
  `nama_bidang` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bidangs`
--

INSERT INTO `bidangs` (`id_bidang`, `nama_bidang`, `created_at`, `updated_at`) VALUES
(1, 'Jasa', '2021-12-21 17:00:00', '2021-12-22 17:00:00'),
(2, 'Dagang', '2021-12-22 17:00:00', '2021-12-08 17:00:00'),
(3, 'Manufaktur', '2021-12-29 17:00:00', '2021-12-15 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bungas`
--

CREATE TABLE `bungas` (
  `id_bunga` bigint(20) UNSIGNED NOT NULL,
  `bunga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bungas`
--

INSERT INTO `bungas` (`id_bunga`, `bunga`) VALUES
(1, 6),
(2, 8),
(3, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatans`
--

CREATE TABLE `kegiatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_kegiatan` int(11) NOT NULL,
  `bidang_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kegiatans`
--

INSERT INTO `kegiatans` (`id`, `nama_kegiatan`, `waktu_kegiatan`, `bidang_id`, `created_at`, `updated_at`) VALUES
(1, 'Pencak Silat', 4, 1, '2021-12-08 17:00:00', '2021-12-01 17:00:00'),
(3, 'Rengginang', 3, 2, '2021-12-05 16:38:00', '2021-12-05 16:38:00'),
(7, 'Sanjay', 3, 2, '2021-12-09 20:44:49', '2021-12-09 20:44:49'),
(9, 'Test NPV', 3, 2, '2021-12-10 02:44:04', '2021-12-10 02:44:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_09_26_202453_create_sessions_table', 1),
(7, '2021_11_26_140641_create_variables_table', 2),
(8, '2021_11_27_095255_create_tetaps_table', 3),
(9, '2021_11_27_103531_create_semis_table', 4),
(10, '2021_11_27_140213_create_variables_table', 5),
(11, '2021_11_28_084737_create_tetaps_table', 6),
(12, '2021_11_28_084816_create_semis_table', 6),
(13, '2021_11_29_071427_create_bungas_table', 7),
(14, '2021_11_29_071622_create_perhitungans_table', 8),
(15, '2021_11_29_072722_create_perhitungans_table', 9),
(16, '2021_11_29_080437_create_bungas_table', 10),
(17, '2021_11_29_080639_create_perhitungans_table', 11),
(18, '2021_11_30_083833_create_perhitungans_table', 12),
(19, '2021_12_05_195415_create_kegiatans_table', 13),
(20, '2021_12_05_200857_create_bidangs_table', 14),
(21, '2021_12_05_201054_create_bidangs_table', 15),
(22, '2021_12_05_201114_create_kegiatans_table', 15),
(23, '2021_12_05_220001_create_pendapatans_table', 16),
(24, '2021_12_05_220509_create_pendapatans_table', 17),
(25, '2021_12_05_220705_create_pendapatans_table', 18),
(26, '2021_12_06_030339_create_variables_table', 19),
(27, '2021_12_06_031652_create_semis_table', 20),
(28, '2021_12_06_031754_create_tetaps_table', 21),
(29, '2021_12_09_035651_create_perhitungans_table', 22);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendapatans`
--

CREATE TABLE `pendapatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_pendapatan` bigint(20) NOT NULL,
  `tahun_ke` int(11) NOT NULL,
  `kegiatan_id` bigint(20) UNSIGNED NOT NULL,
  `bunga_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pendapatans`
--

INSERT INTO `pendapatans` (`id`, `jumlah_pendapatan`, `tahun_ke`, `kegiatan_id`, `bunga_id`, `created_at`, `updated_at`) VALUES
(30, 45000000, 1, 1, 2, '2021-12-07 19:52:12', '2021-12-07 19:52:12'),
(31, 50000000, 2, 1, 2, '2021-12-07 19:52:12', '2021-12-07 19:52:12'),
(32, 60000000, 3, 1, 2, '2021-12-07 19:52:12', '2021-12-07 19:52:12'),
(33, 30000000, 4, 1, 2, '2021-12-07 19:52:12', '2021-12-07 19:52:12'),
(34, 450000, 1, 7, 2, '2021-12-09 20:47:32', '2021-12-09 20:47:32'),
(35, 3000000, 2, 7, 2, '2021-12-09 20:47:32', '2021-12-09 20:47:32'),
(36, 200000, 3, 7, 2, '2021-12-09 20:47:32', '2021-12-09 20:47:32'),
(40, 1, 1, 9, 3, '2021-12-10 02:44:21', '2021-12-10 02:44:21'),
(41, 2, 2, 9, 3, '2021-12-10 02:44:21', '2021-12-10 02:44:21'),
(42, 3, 3, 9, 3, '2021-12-10 02:44:21', '2021-12-10 02:44:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perhitungans`
--

CREATE TABLE `perhitungans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kegiatan_id` bigint(20) UNSIGNED NOT NULL,
  `total_pendapatan` bigint(20) NOT NULL,
  `initial_outlay` bigint(20) NOT NULL,
  `total_variable` bigint(20) NOT NULL,
  `total_semi` bigint(20) NOT NULL,
  `total_tetap` bigint(20) NOT NULL,
  `waktu` int(11) NOT NULL,
  `bunga_id` bigint(20) UNSIGNED NOT NULL,
  `npv` double NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `perhitungans`
--

INSERT INTO `perhitungans` (`id`, `kegiatan_id`, `total_pendapatan`, `initial_outlay`, `total_variable`, `total_semi`, `total_tetap`, `waktu`, `bunga_id`, `npv`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 20000000, 300000, 200, 200, 200, 3, 1, 20000, 'Rugi', '2021-12-14 17:00:00', '2021-12-22 17:00:00'),
(5, 1, 185000000, 1340000, 140000, 1000000, 200000, 4, 2, 2, 'Untung', NULL, NULL),
(6, 9, 6, 3, 1, 1, 1, 3, 3, -4.18, 'Rugi', '2021-12-10 03:23:23', NULL),
(7, 9, 6, 3, 1, 1, 1, 3, 3, -4.184, 'Rugi', '2021-12-10 03:23:57', NULL),
(8, 9, 6, 3, 1, 1, 1, 3, 3, -4.184, 'Rugi', '2021-12-10 03:25:12', NULL),
(9, 9, 6, 3, 1, 1, 1, 3, 3, -4.184, 'Rugi', '2021-12-10 07:56:19', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `semis`
--

CREATE TABLE `semis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kegiatan_id` bigint(20) UNSIGNED NOT NULL,
  `namaS` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hargaS` int(11) NOT NULL,
  `ketS` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `semis`
--

INSERT INTO `semis` (`id`, `user_id`, `kegiatan_id`, `namaS`, `hargaS`, `ketS`, `created_at`, `updated_at`) VALUES
(7, 1, 1, 'Camila', 1000000, '222', '2021-12-09 17:00:00', '2021-12-16 17:00:00'),
(8, 1, 3, 'Biaya Makan', 9000000, NULL, '2021-12-07 19:48:51', '2021-12-07 19:48:51'),
(9, 1, 7, 'Biaya Listrik ', 120000, NULL, '2021-12-09 20:50:26', '2021-12-09 20:50:26'),
(10, 1, 9, 'Test Semi', 1, NULL, '2021-12-10 02:44:53', '2021-12-10 02:44:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('OpfFnZKxbA5tc4r5zRs3iQeWMj4lMcNr9NZLUF7Q', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiM3ZwTjFIWU5Lam1iMWFWMWxtMVNndVpzV255MFRzZ2hBNGZxckxiMyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkUTRFQTZTeG5FU2tkaTNIbS5aLzFwTzNFL25YU0psOGljenNGZnFmcDY2SDI3S3FSbi83Ni4iO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJFE0RUE2U3huRVNrZGkzSG0uWi8xcE8zRS9uWFNKbDhpY3pzRmZxZnA2NkgyN0txUm4vNzYuIjt9', 1639130812);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tetaps`
--

CREATE TABLE `tetaps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kegiatan_id` bigint(20) UNSIGNED NOT NULL,
  `namaT` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hargaT` int(11) NOT NULL,
  `ketT` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tetaps`
--

INSERT INTO `tetaps` (`id`, `user_id`, `kegiatan_id`, `namaT`, `hargaT`, `ketT`, `created_at`, `updated_at`) VALUES
(2, 1, 3, 'Biaya sewa ruko/gudang', 20000000, NULL, '2021-12-07 19:48:32', '2021-12-07 19:48:32'),
(3, 1, 1, 'Tetap Biaya Pencak Silat', 200000, NULL, '2021-12-07 19:50:26', '2021-12-07 19:50:26'),
(4, 1, 7, 'Biaya Sewa Ruko', 1500000, NULL, '2021-12-09 20:52:21', '2021-12-09 20:52:21'),
(5, 1, 9, 'Test Tetap', 1, NULL, '2021-12-10 02:45:08', '2021-12-10 02:45:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Camila Faiza ', 'camilafaizam@gmail.com', NULL, '$2y$10$Q4EA6SxnESkdi3Hm.Z/1pO3E/nXSJl8iczsFfqfp66H27KqRn/76.', NULL, NULL, NULL, NULL, 'profile-photos/mEQDswsfCCjUgBWZWrwMbr3vFbDcdOe8xwMbMZQw.png', '2021-11-26 06:33:15', '2021-11-28 02:09:52'),
(3, 'bumnag', 'bumnag@gmail.com', NULL, '$2y$10$7i9h.HYYQiMVxg4HOVXKdOy6hK9SGpxiyoWds27GCoLhe4exHChZG', NULL, NULL, NULL, NULL, NULL, '2021-12-01 08:10:13', '2021-12-01 08:10:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `variables`
--

CREATE TABLE `variables` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kegiatan_id` bigint(20) UNSIGNED NOT NULL,
  `namaV` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hargaV` int(11) NOT NULL,
  `ketV` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `variables`
--

INSERT INTO `variables` (`id`, `user_id`, `kegiatan_id`, `namaV`, `hargaV`, `ketV`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'Upah/Gaji Pekerja', 140000, NULL, '2021-12-06 16:20:51', '2021-12-06 16:20:51'),
(3, 1, 3, 'Biaya Kegiatan 4', 1000000, NULL, '2021-12-06 16:22:05', '2021-12-06 16:22:26'),
(4, 1, 3, 'Variabel 3', 1300000, NULL, '2021-12-06 17:34:53', '2021-12-06 17:34:53'),
(5, 1, 7, 'Upah/Gaji Pekerja', 120000, NULL, '2021-12-09 20:48:57', '2021-12-09 20:48:57'),
(6, 1, 9, 'Test Variabel', 1, NULL, '2021-12-10 02:44:40', '2021-12-10 02:44:40');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bidangs`
--
ALTER TABLE `bidangs`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indeks untuk tabel `bungas`
--
ALTER TABLE `bungas`
  ADD PRIMARY KEY (`id_bunga`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kegiatans`
--
ALTER TABLE `kegiatans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kegiatans_bidang_id_index` (`bidang_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pendapatans`
--
ALTER TABLE `pendapatans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendapatans_kegiatan_id_index` (`kegiatan_id`),
  ADD KEY `pendapatans_bunga_id_index` (`bunga_id`);

--
-- Indeks untuk tabel `perhitungans`
--
ALTER TABLE `perhitungans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perhitungans_kegiatan_id_index` (`kegiatan_id`),
  ADD KEY `perhitungans_bunga_id_index` (`bunga_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `semis`
--
ALTER TABLE `semis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `semis_user_id_index` (`user_id`),
  ADD KEY `semis_kegiatan_id_index` (`kegiatan_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `tetaps`
--
ALTER TABLE `tetaps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tetaps_user_id_index` (`user_id`),
  ADD KEY `tetaps_kegiatan_id_index` (`kegiatan_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `variables`
--
ALTER TABLE `variables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variables_user_id_index` (`user_id`),
  ADD KEY `variables_kegiatan_id_index` (`kegiatan_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bidangs`
--
ALTER TABLE `bidangs`
  MODIFY `id_bidang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `bungas`
--
ALTER TABLE `bungas`
  MODIFY `id_bunga` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kegiatans`
--
ALTER TABLE `kegiatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `pendapatans`
--
ALTER TABLE `pendapatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `perhitungans`
--
ALTER TABLE `perhitungans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `semis`
--
ALTER TABLE `semis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tetaps`
--
ALTER TABLE `tetaps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `variables`
--
ALTER TABLE `variables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kegiatans`
--
ALTER TABLE `kegiatans`
  ADD CONSTRAINT `kegiatans_bidang_id_foreign` FOREIGN KEY (`bidang_id`) REFERENCES `bidangs` (`id_bidang`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pendapatans`
--
ALTER TABLE `pendapatans`
  ADD CONSTRAINT `pendapatans_bunga_id_foreign` FOREIGN KEY (`bunga_id`) REFERENCES `bungas` (`id_bunga`) ON DELETE CASCADE,
  ADD CONSTRAINT `pendapatans_kegiatan_id_foreign` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `perhitungans`
--
ALTER TABLE `perhitungans`
  ADD CONSTRAINT `perhitungans_bunga_id_foreign` FOREIGN KEY (`bunga_id`) REFERENCES `bungas` (`id_bunga`) ON DELETE CASCADE,
  ADD CONSTRAINT `perhitungans_kegiatan_id_foreign` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `semis`
--
ALTER TABLE `semis`
  ADD CONSTRAINT `semis_kegiatan_id_foreign` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `semis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tetaps`
--
ALTER TABLE `tetaps`
  ADD CONSTRAINT `tetaps_kegiatan_id_foreign` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tetaps_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `variables`
--
ALTER TABLE `variables`
  ADD CONSTRAINT `variables_kegiatan_id_foreign` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `variables_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
