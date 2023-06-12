-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 12 Haz 2023, 05:14:21
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `soccerdb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `fc__teams`
--

CREATE TABLE `fc__teams` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'ID',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'fc name',
  `power` tinyint(4) NOT NULL COMMENT 'fc power',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `fc__teams`
--

INSERT INTO `fc__teams` (`id`, `name`, `power`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Liverpool', 85, NULL, NULL, NULL),
(2, 'Manchester', 87, NULL, NULL, NULL),
(3, 'Chelsea', 83, NULL, NULL, NULL),
(4, 'Arsenal', 79, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `f__fixture_games`
--

CREATE TABLE `f__fixture_games` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'ID',
  `fixture_week_id` bigint(20) NOT NULL COMMENT 'fixture week ID',
  `status` tinyint(4) NOT NULL COMMENT 'game status',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `f__fixture_games`
--

INSERT INTO `f__fixture_games` (`id`, `fixture_week_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2023-06-11 13:41:35', '2023-06-11 20:31:28', NULL),
(2, 1, 1, '2023-06-11 13:41:35', '2023-06-11 20:31:28', NULL),
(3, 2, 1, '2023-06-11 13:41:35', '2023-06-11 20:31:31', NULL),
(4, 2, 1, '2023-06-11 13:41:35', '2023-06-11 20:31:31', NULL),
(5, 3, 1, '2023-06-11 13:41:35', '2023-06-11 20:31:33', NULL),
(6, 3, 1, '2023-06-11 13:41:35', '2023-06-11 20:31:33', NULL),
(7, 4, 0, '2023-06-11 13:41:35', '2023-06-11 16:30:18', NULL),
(8, 4, 0, '2023-06-11 13:41:35', '2023-06-11 16:30:18', NULL),
(9, 5, 0, '2023-06-11 13:41:35', '2023-06-11 16:30:18', NULL),
(10, 5, 0, '2023-06-11 13:41:35', '2023-06-11 16:30:18', NULL),
(11, 6, 0, '2023-06-11 13:41:35', '2023-06-11 16:30:18', NULL),
(12, 6, 0, '2023-06-11 13:41:35', '2023-06-11 16:30:18', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `f__fixture_weeks`
--

CREATE TABLE `f__fixture_weeks` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'ID',
  `week_of_fixture` bigint(20) NOT NULL COMMENT 'fixture week',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `f__fixture_weeks`
--

INSERT INTO `f__fixture_weeks` (`id`, `week_of_fixture`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '2023-06-11 13:41:34', '2023-06-11 13:41:34', NULL),
(2, 2, '2023-06-11 13:41:35', '2023-06-11 13:41:35', NULL),
(3, 3, '2023-06-11 13:41:35', '2023-06-11 13:41:35', NULL),
(4, 4, '2023-06-11 13:41:35', '2023-06-11 13:41:35', NULL),
(5, 5, '2023-06-11 13:41:35', '2023-06-11 13:41:35', NULL),
(6, 6, '2023-06-11 13:41:35', '2023-06-11 13:41:35', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `f__game_scores`
--

CREATE TABLE `f__game_scores` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'ID',
  `fixture_game_id` bigint(20) NOT NULL COMMENT 'fixture game ID',
  `team_id` bigint(20) NOT NULL COMMENT 'team ID',
  `is_host` tinyint(4) NOT NULL COMMENT 'is host',
  `goal` tinyint(4) NOT NULL COMMENT 'goal',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `f__game_scores`
--

INSERT INTO `f__game_scores` (`id`, `fixture_game_id`, `team_id`, `is_host`, `goal`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 4, 0, 0, '2023-06-11 13:41:35', '2023-06-11 16:30:18', NULL),
(2, 1, 1, 1, 1, '2023-06-11 13:41:35', '2023-06-11 20:31:28', NULL),
(3, 2, 2, 0, 1, '2023-06-11 13:41:35', '2023-06-11 20:31:28', NULL),
(4, 2, 3, 1, 0, '2023-06-11 13:41:35', '2023-06-11 16:30:18', NULL),
(5, 3, 2, 0, 3, '2023-06-11 13:41:35', '2023-06-11 20:31:31', NULL),
(6, 3, 4, 1, 2, '2023-06-11 13:41:35', '2023-06-11 20:31:31', NULL),
(7, 4, 3, 0, 2, '2023-06-11 13:41:35', '2023-06-11 20:31:31', NULL),
(8, 4, 1, 1, 1, '2023-06-11 13:41:35', '2023-06-11 20:31:31', NULL),
(9, 5, 4, 0, 3, '2023-06-11 13:41:35', '2023-06-11 20:31:33', NULL),
(10, 5, 3, 1, 0, '2023-06-11 13:41:35', '2023-06-11 16:30:18', NULL),
(11, 6, 1, 0, 2, '2023-06-11 13:41:35', '2023-06-11 20:31:33', NULL),
(12, 6, 2, 1, 3, '2023-06-11 13:41:35', '2023-06-11 20:31:33', NULL),
(13, 7, 1, 0, 0, '2023-06-11 13:41:35', '2023-06-11 16:30:18', NULL),
(14, 7, 4, 1, 0, '2023-06-11 13:41:35', '2023-06-11 16:30:18', NULL),
(15, 8, 3, 0, 0, '2023-06-11 13:41:35', '2023-06-11 16:30:18', NULL),
(16, 8, 2, 1, 0, '2023-06-11 13:41:35', '2023-06-11 16:30:18', NULL),
(17, 9, 4, 0, 0, '2023-06-11 13:41:35', '2023-06-11 16:30:18', NULL),
(18, 9, 2, 1, 0, '2023-06-11 13:41:35', '2023-06-11 16:30:18', NULL),
(19, 10, 1, 0, 0, '2023-06-11 13:41:35', '2023-06-11 16:30:18', NULL),
(20, 10, 3, 1, 0, '2023-06-11 13:41:35', '2023-06-11 16:30:18', NULL),
(21, 11, 3, 0, 0, '2023-06-11 13:41:35', '2023-06-11 16:30:18', NULL),
(22, 11, 4, 1, 0, '2023-06-11 13:41:35', '2023-06-11 16:30:18', NULL),
(23, 12, 2, 0, 0, '2023-06-11 13:41:35', '2023-06-11 16:30:18', NULL),
(24, 12, 1, 1, 0, '2023-06-11 13:41:35', '2023-06-11 16:30:18', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2023_06_10_231406_fc__teams', 1),
(2, '2023_06_10_231536_f__fixture_weeks', 1),
(3, '2023_06_10_231548_f__fixture_games', 1),
(4, '2023_06_10_231614_f__game_scores', 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `fc__teams`
--
ALTER TABLE `fc__teams`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `f__fixture_games`
--
ALTER TABLE `f__fixture_games`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `f__fixture_weeks`
--
ALTER TABLE `f__fixture_weeks`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `f__game_scores`
--
ALTER TABLE `f__game_scores`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `fc__teams`
--
ALTER TABLE `fc__teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `f__fixture_games`
--
ALTER TABLE `f__fixture_games`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `f__fixture_weeks`
--
ALTER TABLE `f__fixture_weeks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `f__game_scores`
--
ALTER TABLE `f__game_scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
