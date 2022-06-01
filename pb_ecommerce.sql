-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 01, 2022 at 09:05 PM
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
-- Database: `pb_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `category_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(36, 'Ups', 'ups', NULL, 'category1653885914.png', 1, '2022-05-29 22:45:14', '2022-05-29 22:45:14'),
(37, 'Toy', 'toy', NULL, '', 1, '2022-05-31 14:39:20', '2022-05-31 14:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
(9, '2022_05_29_174533_create_vendors_table', 1),
(10, '2022_05_30_063421_create_product_galleries_table', 2),
(11, '2022_06_01_193749_add_social_login_field', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
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
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_discount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_discount_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_short_des` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_long_des` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_thumbnails` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `vendor_id`, `category_id`, `sub_category_id`, `product_name`, `product_slug`, `product_code`, `product_price`, `product_discount`, `product_discount_price`, `product_short_des`, `product_long_des`, `product_thumbnails`, `product_quantity`, `product_status`, `created_at`, `updated_at`) VALUES
(10, 3, 31, 1, 'Lane Reid working', 'lane-reid-working', '629526c7637f4', '73575', '1855555', '677', 'Sed veniam consequa', 'Dolor sit modi dolo', '1654023643_8290438.png', '590', '1', '2022-05-30 14:19:19', '2022-05-31 13:02:55'),
(12, 4, 31, 1, 'Paloma Wallace', 'paloma-wallace', '629664f267a0a', '7', '54', '722', 'Nulla aliquam sint', 'Voluptatem in proide', '1653946796_1035138.png', '956', '1', '2022-05-30 15:39:56', '2022-05-31 12:56:50'),
(13, 3, 33, 1, 'Zephania Aguirre', 'zephania-aguirre', '62961a258d403', '147', '94', '489', 'Velit debitis qui f', 'Labore et ad quod ve', '1654004261_6440309.png', '905', '1', '2022-05-31 07:37:41', '2022-05-31 07:37:41'),
(14, 4, 35, 22, 'Trevor Ayers', 'trevor-ayers', '62961e4fddba9', '704', '30', '983', NULL, NULL, '1654005327_3352361.jpg', '903', '1', '2022-05-31 07:55:27', '2022-05-31 07:55:27'),
(15, 3, 34, 17, 'Ryan Sampson', 'ryan-sampson', '62961ec325c44', '206', '12', '75', 'Cumque beatae archit.', 'Placeat, mollit eum .', '1654005443_7744870.jpg', '142', '1', '2022-05-31 07:57:23', '2022-05-31 07:57:28');

-- --------------------------------------------------------

--
-- Table structure for table `product_galleries`
--

CREATE TABLE `product_galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `product_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_galleries`
--

INSERT INTO `product_galleries` (`id`, `product_code`, `image`, `created_at`, `updated_at`) VALUES
(7, '629526c7637f4', 'PG_9439481.jpg', '2022-05-30 14:19:19', '2022-05-30 14:19:19'),
(8, '629526c7637f4', 'PG_4613328.jpg', '2022-05-30 14:19:19', '2022-05-30 14:19:19'),
(9, '629539aca492c', 'PG_7035131.png', '2022-05-30 15:39:56', '2022-05-30 15:39:56'),
(10, '629539aca492c', 'PG_2233623.png', '2022-05-30 15:39:56', '2022-05-30 15:39:56'),
(11, '629539aca492c', 'PG_3547290.png', '2022-05-30 15:39:56', '2022-05-30 15:39:56'),
(14, '62961a258d403', 'PG_4411903.png', '2022-05-31 07:37:41', '2022-05-31 07:37:41'),
(15, '629526c7637f4', 'PG_9778361.png', '2022-05-31 13:00:56', '2022-05-31 13:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `slider_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `slider_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `sub_category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `full_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `social_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `name`, `email`, `role`, `address`, `phone`, `photo`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `social_id`, `social_type`) VALUES
(1, 'Admin', 'admin', 'admin@mail.com', 1, NULL, NULL, NULL, NULL, '$2y$10$xeXw7FNtG1T4cCsZKBr1G.m22DB.TjNyRk6JwcGMSJwS6q/reJVmu', NULL, '2022-05-29 21:49:44', '2022-05-29 21:49:44', NULL, NULL),
(10, 'Quinn Durham', 'Yuli Mcguire', 'muvo@mailinator.com', 1, NULL, NULL, NULL, NULL, '$2y$10$me31RTkTBFNUCmZgz3O6iOFOIsYCPKQRJRbr3TCl.MLNWUkTpVDqu', NULL, '2022-06-01 11:52:22', '2022-06-01 11:52:22', NULL, NULL),
(11, 'Jeanette Hansen', 'Boris Dale', 'jurojeriva@mailinator.com', 3, NULL, NULL, NULL, NULL, '$2y$10$NX9lwrhBrLNxExl/DHY8T.wccf.xMfjWjPzsY/djP3wfCbzcCAAaC', NULL, '2022-06-01 11:53:12', '2022-06-01 11:53:12', NULL, NULL),
(13, 'User', 'user', 'user@mail.com', 3, NULL, NULL, NULL, NULL, '$2y$10$.QKjZTUq1ThrAdbhvCKQpuPLsBUNmjYFbmC1NOoM7JE9YsK91u7Tm', NULL, '2022-06-01 12:05:42', '2022-06-01 12:05:42', NULL, NULL),
(15, 'Khayrul Shanto', 'Khayrul Shanto', 'khayrulshanto@gmail.com', 3, NULL, NULL, NULL, NULL, 'eyJpdiI6InBNdklKbVRpZlZRZFE3RnA1LzBtdmc9PSIsInZhbHVlIjoiSmkya0M3VXJBT2xrZFVQZitwRnhlZz09IiwibWFjIjoiNTExYWEwN2QyNGZlMWJiYTdiNGY1NjRkYThiZTcyZmE0NTlhYTVmZTgxYzRlZTA5MzNhOWY2MTk4NjM1NDZiMiIsInRhZyI6IiJ9', NULL, '2022-06-01 14:34:48', '2022-06-01 14:34:48', '7554523647954748', 'facebook'),
(16, 'Khayrul Islam Shanto', 'Khayrul Islam Shanto', 'coderkhayrul@gmail.com', 3, NULL, NULL, NULL, NULL, 'eyJpdiI6Ii8rVW8wWXZhaU9iTk5qUXFDSGN4c2c9PSIsInZhbHVlIjoiV1JlVzZmQVRzdCt3VklLWHVrdXB2UT09IiwibWFjIjoiM2MyZTFhZTM2ZjlmYWM4MDQ1Y2RmNzdiN2JiZTllMWY4YjZjMGViN2NhZTQwNDc4NzNlNjQxMTFhM2QzNjIzMiIsInRhZyI6IiJ9', NULL, '2022-06-01 15:02:49', '2022-06-01 15:02:49', 'RDUvVyOlmS', 'linkedin');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint UNSIGNED NOT NULL,
  `vendor_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_operator_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_operator_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_tin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_tread_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `vendor_office_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `vendor_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `vendor_name`, `vendor_phone`, `vendor_operator_name`, `vendor_operator_phone`, `vendor_tin`, `vendor_tread_number`, `vendor_email`, `vendor_description`, `vendor_office_address`, `vendor_image`, `vendor_status`, `created_at`, `updated_at`) VALUES
(2, 'Benedict Rocha', '+1 (866) 149-2092', 'Jayme Thompson', '+1 (531) 726-3166', '45', '800', 'xynagep@mailinator.com', 'Expedita voluptate q', 'Fuga Quis aliquip e', '', '1', '2022-05-30 11:31:19', '2022-05-30 11:31:19'),
(3, 'Anika Saunders', '+1 (682) 798-3436', 'Whitney Burnett', '+1 (352) 694-6124', '54', '219', 'bijuxyvem@mailinator.com', 'Sunt optio consequ', 'Harum suscipit enim', '', '1', '2022-05-30 11:31:22', '2022-05-30 11:31:22'),
(4, 'Keefe Mathis', '+1 (376) 873-2568', 'Quyn Kelley', '+1 (831) 668-8593', '79', '619', 'degivuqem@mailinator.com', 'Delectus et ut et r', 'Vel in ut nihil do a', '', '1', '2022-05-30 11:31:24', '2022-05-30 11:31:24');

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
-- Indexes for table `product_galleries`
--
ALTER TABLE `product_galleries`
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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
