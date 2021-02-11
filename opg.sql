-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2021 at 12:27 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opg`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `id` int(11) NOT NULL,
  `naziv` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`id`, `naziv`, `created_at`, `updated_at`) VALUES
(1, 'Voće', NULL, NULL),
(2, 'Povrće', NULL, NULL),
(3, 'Med', NULL, NULL),
(4, 'vino', NULL, NULL),
(5, 'Rakije', NULL, '2021-02-05 14:39:58'),
(6, 'Ulja', NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_27_195636_create_podrums_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `opg`
--

CREATE TABLE `opg` (
  `id` bigint(30) NOT NULL,
  `naziv` varchar(30) NOT NULL,
  `telefon` varchar(30) NOT NULL,
  `adresa` varchar(50) NOT NULL,
  `Lokalitet` text NOT NULL,
  `user_id` bigint(30) UNSIGNED NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `opg`
--

INSERT INTO `opg` (`id`, `naziv`, `telefon`, `adresa`, `Lokalitet`, `user_id`, `updated_at`, `created_at`) VALUES
(1, 'Opg Šimović', '039-840-025', 'Proboj 56, Ljubuški', 'Ljubuški se nalazi u samom zapadu Hercegovine uz granicu Republike Hrvatske. \r\nUz poznati krški hercegovački reljef Ljubuški ima više plodnih polja. \r\nKlima je umjerena mediteranska s 2.300 sunčanih sati tijekom godine', 1, '2021-02-11', '2021-01-25'),
(3, 'Opg 2', '31231231', 'Ljubuški', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim vec.', 2, '2021-01-25', '2021-01-25'),
(4, 'opg 3', '036-123-123', 'Mostar bb', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim vec.', 4, '2021-01-29', '2021-01-26');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('simovic.petar99@gmail.com', '$2y$10$2NTNiTuk3U9C.sq9bFDa/.S9ySRWhtzlN8BE8LK7vvmPoVtfvx/JK', '2021-01-28 22:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `naziv` varchar(30) NOT NULL,
  `opis` text NOT NULL,
  `cijena` float NOT NULL,
  `img` text NOT NULL,
  `kategorija_id` int(11) NOT NULL,
  `opg_id` bigint(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `naziv`, `opis`, `cijena`, `img`, `kategorija_id`, `opg_id`, `created_at`, `updated_at`) VALUES
(4, 'Grožđe', 'žilavka', 6, 'fAykrISoafvgvGWbeuv3O7YPrpDv4l4KcsISibFY.jpg', 1, 1, '2021-01-26 12:33:54', '2021-01-28 21:07:27'),
(5, 'Krumpir', 'domaći', 0.5, 'gLzObjzGZaaO0hrWQUy0zyIuR6Ou7votFA0Zv4nW.jpg', 2, 1, '2021-01-26 13:15:05', '2021-01-26 13:15:05'),
(6, 'Travarica', '1l', 10, 'NXttB9z6VQp4imdDXxGc1UcoLwqGQ4GzaKwxmRky.jpg', 5, 3, '2021-01-26 13:31:43', '2021-01-26 13:31:43'),
(7, 'Maslinovo ulje', '1l ekstra djevičansko', 30, 'QEDfKmsgEDOaaUK0zROrdiL9MyODfHAm2hUVv4QI.jpg', 1, 4, '2021-01-26 13:42:50', '2021-01-28 21:58:55'),
(9, 'Med', 'kadulja', 10, 'i5maVZz97qLvK22LTXDoQ66bgtxw9qWYDRQvsFaA.png', 3, 3, '2021-01-28 21:55:52', '2021-01-28 21:55:52'),
(10, 'Loza', '1l', 5.85, 'X1QHlMmzWE1F5D9lVGh2iT4Abu0cdBmb7SEuIL2J.jpg', 1, 4, '2021-01-28 21:56:47', '2021-01-29 15:05:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(30) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'pero', 'simovic.petar99@gmail.com', NULL, '$2y$10$jMUZl5rnWvFv9wwq2gW9iOOJJqXPypum4er8ecLHdqLK3NZRrmlCq', 2, '7jTRpNVvu5fMRVTNzC3W1JLbd8suZKgMtfxKmxHH2Tua8lk2ICNJlhnTeAxA', '2021-01-25 16:50:19', '2021-01-25 16:50:19'),
(2, 'ante', 'a@a.b', NULL, '$2y$10$jZbbTDabye4DZ8/T32S/zOcjFOa4O2fYsr4dL1oF0el7gVnJ.xt3C', 0, NULL, '2021-01-26 10:47:23', '2021-01-26 10:47:23'),
(4, 'korisnik', 'user@user.com', NULL, '$2y$10$bEigzVyut7cW3qhdUDwpEuWVgsUlTW.6D/xYuQeKzN6KUN5N.BSiu', 0, NULL, '2021-01-28 23:11:49', '2021-01-28 23:12:29');

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
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opg`
--
ALTER TABLE `opg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategorija_id` (`kategorija_id`),
  ADD KEY `opg_id` (`opg_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategorije`
--
ALTER TABLE `kategorije`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `opg`
--
ALTER TABLE `opg`
  MODIFY `id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `opg`
--
ALTER TABLE `opg`
  ADD CONSTRAINT `opg_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_kategorije` FOREIGN KEY (`kategorija_id`) REFERENCES `kategorije` (`id`),
  ADD CONSTRAINT `product_opg` FOREIGN KEY (`opg_id`) REFERENCES `opg` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
