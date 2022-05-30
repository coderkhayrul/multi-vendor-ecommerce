-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 30, 2022 at 06:47 AM
-- Server version: 8.0.29-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pb_ecommarce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` text COLLATE utf8mb4_unicode_ci,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `category_description`, `category_image`, `category_status`, `created_at`, `updated_at`) VALUES
(31, 'Desktop', 'desktop', NULL, 'category1653885640.png', 1, '2022-05-29 22:40:40', '2022-05-29 22:40:40'),
(32, 'Laptop', 'laptop', NULL, 'category1653885721.png', 1, '2022-05-29 22:42:01', '2022-05-29 22:42:01'),
(33, 'Camera', 'camera', NULL, 'category1653885890.jpg', 1, '2022-05-29 22:44:50', '2022-05-29 22:44:50'),
(34, 'Monitor', 'monitor', NULL, 'category1653885901.png', 1, '2022-05-29 22:45:01', '2022-05-29 22:45:01'),
(35, 'Tv', 'tv', NULL, 'category1653885908.png', 1, '2022-05-29 22:45:08', '2022-05-29 22:45:08'),
(36, 'Ups', 'ups', NULL, 'category1653885914.png', 1, '2022-05-29 22:45:14', '2022-05-29 22:45:14');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_27_184338_create_categories_table', 1),
(6, '2022_05_28_190228_create_sub_categories_table', 1),
(7, '2022_05_28_202827_create_sliders_table', 1),
(8, '2022_05_29_170227_create_products_table', 1),
(9, '2022_05_29_174533_create_vendors_table', 1);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `vendor_id` int NOT NULL,
  `category_id` int NOT NULL,
  `sub_category_id` int NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_discount_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_short_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_long_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thumbnails` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `slider_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_description` text COLLATE utf8mb4_unicode_ci,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` int NOT NULL,
  `sub_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_category_status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `sub_category_name`, `sub_category_slug`, `sub_category_image`, `sub_category_status`, `created_at`, `updated_at`) VALUES
(1, 31, 'Spacial Pc', 'spacial-pc', '', 1, '2022-05-29 22:45:52', '2022-05-29 22:45:52'),
(2, 31, 'Star Pc', 'star-pc', '', 1, '2022-05-29 22:46:02', '2022-05-29 22:46:02'),
(3, 31, 'Gaming Pc', 'gaming-pc', '', 1, '2022-05-29 22:46:14', '2022-05-29 22:46:14'),
(4, 31, 'Brand Pc', 'brand-pc', '', 1, '2022-05-29 22:46:21', '2022-05-29 22:46:21'),
(5, 31, 'Apple iMac', 'apple-imac', '', 1, '2022-05-29 22:46:45', '2022-05-29 22:46:45'),
(6, 32, 'All Laptop', 'all-laptop', '', 1, '2022-05-29 22:48:56', '2022-05-29 22:48:56'),
(7, 32, 'External Graphics Enclosure', 'external-graphics-enclosure', '', 1, '2022-05-29 22:49:04', '2022-05-29 22:49:04'),
(8, 32, 'Gaming Laptop', 'gaming-laptop', '', 1, '2022-05-29 22:49:29', '2022-05-29 22:49:42'),
(9, 32, 'Laptop Bag', 'laptop-bag', '', 1, '2022-05-29 22:50:06', '2022-05-29 22:50:06'),
(10, 33, 'Dslr', 'dslr', '', 1, '2022-05-29 22:50:33', '2022-05-29 22:50:33'),
(11, 33, 'Digital Camera', 'digital-camera', '', 1, '2022-05-29 22:50:44', '2022-05-29 22:50:44'),
(12, 33, 'Video Camera', 'video-camera', '', 1, '2022-05-29 22:50:56', '2022-05-29 22:50:56'),
(13, 33, 'Camera Flash', 'camera-flash', '', 1, '2022-05-29 22:51:10', '2022-05-29 22:51:10'),
(14, 34, 'Gaming Monitor', 'gaming-monitor', '', 1, '2022-05-29 23:28:50', '2022-05-29 23:28:50'),
(15, 34, 'Touch', 'touch', '', 1, '2022-05-29 23:29:02', '2022-05-29 23:29:02'),
(16, 34, 'Curve', 'curve', '', 1, '2022-05-29 23:29:13', '2022-05-29 23:29:13'),
(17, 34, 'Free Sync', 'free-sync', '', 1, '2022-05-29 23:29:29', '2022-05-29 23:29:29'),
(18, 34, 'G-Sync', 'g-sync', '', 1, '2022-05-29 23:29:40', '2022-05-29 23:29:40'),
(19, 35, 'All Tv', 'all-tv', '', 1, '2022-05-29 23:30:09', '2022-05-29 23:30:09'),
(20, 35, 'LED Tv', 'led-tv', '', 1, '2022-05-29 23:30:19', '2022-05-29 23:30:19'),
(21, 35, 'Smart Tv', 'smart-tv', '', 1, '2022-05-29 23:30:28', '2022-05-29 23:30:28'),
(22, 35, 'Android Tv', 'android-tv', '', 1, '2022-05-29 23:30:41', '2022-05-29 23:30:41'),
(23, 35, '4K Tv', '4k-tv', '', 1, '2022-05-29 23:31:49', '2022-05-29 23:31:49'),
(24, 36, 'Online Ups', 'online-ups', '', 1, '2022-05-29 23:32:04', '2022-05-29 23:32:04'),
(25, 36, 'Offline Ups', 'offline-ups', '', 1, '2022-05-29 23:32:23', '2022-05-29 23:32:23'),
(26, 36, 'Battery Ups', 'battery-ups', '', 1, '2022-05-29 23:32:35', '2022-05-29 23:32:35'),
(27, 36, 'Ips', 'ips', '', 1, '2022-05-29 23:32:53', '2022-05-29 23:32:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `name`, `email`, `role`, `address`, `phone`, `photo`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Khayrul Shanto', 'Admin', 'admin@mail.com', 1, NULL, NULL, NULL, NULL, '$2y$10$xeXw7FNtG1T4cCsZKBr1G.m22DB.TjNyRk6JwcGMSJwS6q/reJVmu', NULL, '2022-05-29 21:49:44', '2022-05-29 21:49:44'),
(2, 'Berk Garrison', 'Uma Baxter', 'balo@mailinator.com', 2, NULL, NULL, NULL, NULL, '$2y$10$WCg7B6tHvfaaUCfkOtQwfOrGEJqtioVRijUHo4F4mLoZ/Iir1LV4K', NULL, '2022-05-29 22:02:04', '2022-05-29 22:02:04'),
(3, 'Courtney Thomas', 'Tate Christensen', 'fyzesyd@mailinator.com', 3, NULL, NULL, NULL, NULL, '$2y$10$MuvMYAcDuO0i1TerPChRJuk43o/PH3aMdE9Njmj8Rp0Dj2Oeia82W', NULL, '2022-05-29 22:02:14', '2022-05-29 22:02:14');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint UNSIGNED NOT NULL,
  `vendor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_operator_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_operator_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_tin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_tread_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_description` text COLLATE utf8mb4_unicode_ci,
  `vendor_office_address` text COLLATE utf8mb4_unicode_ci,
  `vendor_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
