-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 05, 2022 at 07:12 AM
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
(36, 'Ups', 'ups', NULL, 'category1653885914.png', 1, '2022-05-29 22:45:14', '2022-05-29 22:45:14');

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
  `product_short_des` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `product_long_des` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
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
(16, 2, 32, 6, 'Apple MacBook Air 13.3-Inch', 'apple-macbook-air-133-inch', '629c3c1f6efb5', '109000', NULL, '107000', '<h1 itemprop=\"name\" class=\"product-name\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 5px 0px 10px; font-size: 22px; line-height: 28px; font-family: &quot;Trebuchet MS&quot;, sans-serif;\">Apple MacBook Air 13.3-Inch Retina Display 8-core Apple M1 chip with 8GB RAM, 256GB SSD (MGN63) Space Gray</h1>', '<h2 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px; font-weight: bold; font-size: 20px; line-height: 26px; color: rgb(0, 0, 0); font-family: &quot;Trebuchet MS&quot;, sans-serif;\"><span style=\"margin: 0px; padding: 0px;\">Apple MacBook Air 13.3-Inch&nbsp;Retina Display 8-core Apple M1 chip with 8GB RAM, 256GB SSD&nbsp;(MGN63) Space Gray</span></h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif; text-align: justify;\">Apple\'s thinnest, lightest notebook, completely transformed by the Apple M1 chip. CPU speeds up to 3.5x faster. GPU speeds up to 5x faster. Our most advanced Neural Engine for up to 9x faster machine learning. The longest battery life ever in a MacBook Air. And a silent, fanless design. This much power has never been this ready to go.&nbsp;Itâ€™s here. Our first chip designed specifically for Mac. Packed with an astonishing 16 billion transistors, the Apple M1 system on a chip (SoC) integrates the CPU, GPU, Neural Engine, I/O, and so much more onto a single tiny chip. With incredible performance, custom technologies, and industry-leading power efficiency,1 M1 is not just a next step for Mac â€” itâ€™s another level entirely.M1 has the fastest CPU weâ€™ve ever made. With that kind of processing speed, MacBook Air can take on new extraordinarily intensive tasks like professional-quality editing and action-packed gaming. But the 8â€‘core CPU on M1 isnâ€˜t just up to 3.5x faster than the previous generation2 â€” it balances high-performance cores with efficiency cores that can still crush everyday jobs while using just a tenth of the power.Up to 7-core GPUThe GPU in M1 puts MacBook Air in a class of its own. M1 features the worldâ€˜s fastest integrated graphics in a personal computer.8 Thatâ€™s up to 5x faster graphics performance compared with the previous generation.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif; text-align: justify;\">Incredible graphics performanceMacBook Air can take on more graphics-intensive projects than ever. For the first time, content creators can edit and seamlessly play back multiple streams of fullâ€‘quality 4K video without dropping a frame.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif; text-align: justify;\">Apps on MacBook Air can use machine learning (ML) to automatically retouch photos like a pro, make smart tools such as magic wands and audio filters more accurate at autoâ€‘detection, and so much more. Thatâ€™s not just brain power â€” thatâ€™s the power of a full stack of ML technologies.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif; text-align: justify;\">Developed to unlock the potential of the M1 chip, macOS Big Sur transforms Mac with major performance benefits and so much more. Powerful updates for apps. A beautiful new design. Industry-leading privacy features and bestâ€‘inâ€‘class security. Itâ€˜s our most powerful software ever â€” running on our most advanced hardware yet.<br style=\"margin: 0px; padding: 0px;\"></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif;\">This exclusive Apple Macbook Air (MGN63) comes with 01 year International Limited Warranty (Terms &amp; Condition Apply As Per Apple)</p>', '1654406175_2319906.jpg', '20', '1', '2022-06-04 23:16:15', '2022-06-04 23:16:15'),
(17, 2, 31, 5, 'Apple iMac 21.5-inch', 'apple-imac-215-inch', '629c3d2d443a6', '150000', NULL, '140000', '<h1 itemprop=\"name\" class=\"product-name\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 5px 0px 10px; font-size: 22px; line-height: 28px; font-family: &quot;Trebuchet MS&quot;, sans-serif;\">Apple iMac 21.5-inch 4K Retina Display, Core i3, 8GB RAM, Radeon Pro 555X 2GB Graphics (MHK23ZP/A)</h1>', '<p><br></p><h2 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px; font-weight: bold; font-size: 20px; line-height: 26px; color: rgb(0, 0, 0); font-family: &quot;Trebuchet MS&quot;, sans-serif; text-align: justify;\">Apple iMac 21.5-inch 4K Retina Display, Core i3, 8GB RAM, Radeon Pro 555X 2GB Graphics (MHK23ZP/A)<br style=\"margin: 0px; padding: 0px;\"></h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif; text-align: justify;\">The all-in-one for all. If you can dream it, you can do it on iMac. It\'s beautifully designed, incredibly intuitive, and packed with powerful tools that let you take any idea to the next level. And the new 21.5-inch model elevates the experience in every way, with faster processors and graphics, expanded memory and storage, enhanced audio and video capabilities, and an even more stunning Retina 4K display. It\'s the desktop that does it all â€” better and faster than ever.</p><div class=\"section-head\" style=\"margin: 0px; padding: 0px 0px 20px; font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px;\"><h2 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px; font-weight: bold; font-size: 20px; line-height: 26px;\">What is the price of the Apple iMac 21.5\" Radeon Pro 555X in Bangladesh?</h2></div><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif;\">The latest price of the Apple iMac 21.5\" Radeon Pro 555X in Bangladesh is 140,000৳. You can buy the Apple iMac 21.5\" Radeon Pro 555X at the best price from our website or visit any of our showrooms.</p>', '1654406445_3291171.jpg', '292', '1', '2022-06-04 23:20:45', '2022-06-04 23:20:45'),
(18, 3, 34, 14, 'Msi Optix MAG241C 23.6 Inch FHD Curved LED Gaming Monitor', 'msi-optix-mag241c-236-inch-fhd-curved-led-gaming-monitor', '629c3ded3b873', '25000', NULL, '23900', '<h1 itemprop=\"name\" class=\"product-name\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 5px 0px 10px; font-size: 22px; line-height: 28px; font-family: &quot;Trebuchet MS&quot;, sans-serif;\">Msi Optix MAG241C 23.6 Inch FHD Curved LED Gaming Monitor With 144Hz Refresh Rate</h1>', '<h2 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px; font-weight: bold; font-size: 20px; line-height: 26px; color: rgb(0, 0, 0); font-family: &quot;Trebuchet MS&quot;, sans-serif;\">Msi Optix MAG241C 23.6 Inch FHD Curved LED Gaming Monitor With 144Hz Refresh Rate</h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">Curved Led Gaming Monitor</span></p><div style=\"margin: 0px; padding: 0px; font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px; text-align: justify;\">Visualize your victory with the MSI Optix MAG241C curved gaming monitor. Equipped with a 1920x1080, 144hz Refresh rate, 1ms response time panel, the Optix MAG241C will give you the competitive edge you need to take down your opponents. Built with FreeSync technology, the MAG241C can match the displayâ€™s refresh rate with your GPU for ultra-smooth gameplay. Make sure you can hit your mark with all the latest technologies built-in the MSI Curved Gaming monitors for competitive play.</div><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">CURVED FOR YOUR VIEWING PLEASURE</span></p><div style=\"margin: 0px; padding: 0px; font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px; text-align: justify;\">MSI gaming monitors use a curved display panel that has a curvature rate of 1500R, which is the most comfortable and suitable for a wide range of applications from general computing to gaming. Curved panels also help with gameplay immersion, making you feel more connected to the entire experience.</div><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif;\"></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">144HZ REFRESH RATE + 1MS RESPONSE TIME</span></p><div style=\"margin: 0px; padding: 0px; font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px; text-align: justify;\">MSI gaming monitors are equipped with a 144hz refresh rate + 1ms response time VA LED panel which has the most benefit in fast moving game genres such as first person shooters, fighters, racing sims, real-time strategy, and sports. These type of games require very fast and precise movements, which an ultra-high refresh rate and fast response time monitor will put you ahead of your competition.</div><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">GAMING OSD APP ADVANTAGES</span></p><div style=\"margin: 0px; padding: 0px; font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px; text-align: justify;\">With the Gaming OSD (on screen display) app it is very easy to setup your gaming monitor. You donâ€™t need use the buttons on the monitor and go through all the menuâ€™s, just use your Keyboard and Mouse to configurate your monitor. The app even gives you hotkey options so you can switch settings between different games in a ease.</div><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">PERSONALIZE YOUR GAMING RIG</span></p><div style=\"margin: 0px; padding: 0px; font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px; text-align: justify;\">Customize and set up your own color scheme through the MSI GAMING APP. With MSI Mystic Light, the Optix MAG241C&nbsp;â€™s RGB lights provide a soft ambient light that can easily be synced with any other Mystic Light enabled gaming product. Select any of the colors from the palette using your smartphone or the Mystic Light App to match your system style to your taste. Or just turn on gaming echo, letting your monitor back light dance to music you play on the computer.</div><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif;\"></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif;\"></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif;\"></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">SMOOTH OUT YOUR GAMEPLAY WITH AMD FREESYNC</span></p><div style=\"margin: 0px; padding: 0px; font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px; text-align: justify;\">MSI Gaming monitors are built with AMD FreeSync technology to create the smoothest visuals for your gameplay. To do this, AMD FreeSync will sync your monitors refresh rate to your AMDÂ® GPU, which helps to eliminate screen tearing or stuttering. Enjoy the game the way it was meant to be enjoyed with ultra-smooth, lag-free visuals.</div><div style=\"margin: 0px; padding: 0px; font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px; text-align: justify;\"><br style=\"margin: 0px; padding: 0px;\"></div><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif;\"><img src=\"https://storage-asset.msi.com/global/picture/image/feature/AIO/Monitor/Optix-MAG321CQR/MAG271cqr-newBanner.jpg\" style=\"width: 1495.56px;\"><br></p>', '1654406637_8580922.jpg', '15', '1', '2022-06-04 23:23:57', '2022-06-04 23:23:57'),
(19, 2, 36, 24, 'Apollo 3kVA Online UPS', 'apollo-3kva-online-ups', '629c3e48d518f', '42350', NULL, '38500', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px;\"><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">MPN: 2300HS</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">Model: Apollo 3kVA</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">Voltage: Single Phase, 110Vac~290Vac</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">Frequency: 50Hz (60Hz on request)</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">Power Factor: &gt; 0.98% (Full Load)</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">Voltage: 220Vac</li></ul>', '<p><br></p><h2 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px; font-weight: bold; font-size: 20px; line-height: 26px; color: rgb(0, 0, 0); font-family: &quot;Trebuchet MS&quot;, sans-serif;\">Apollo 3kVA Online UPS<br style=\"margin: 0px; padding: 0px;\"></h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif;\">Apollo 3kVA Online UPS comes with Single Phase input power: from 110Vac ~ 290Vac, DSP control technology with input power factor of &gt;0.98% (Full Load). The Apollo series UPS are providing high performance power supply systems with Single Phase input and Single Phase output and galvanic isolation by high performance inverter output transformer designed to supply high-quality power on a permanent basis. In this Online UPS advanced diagnostics and unit information allow users to monitor system parameters and alarms, check the status of the battery and provide access to the history of events through the system software or multi-language screen. This new Apollo series Online UPS features with On-line UPS double conversion, Single Phase, input/ Single Phase output, DSP control technology, Galvanic insulation by output transformer, Reduced harmonic distortion, RFI filter, Acoustic and luminous signalling. This UPS Reduced harmonic distortion of output signal. This Online UPS also comes with High efficiency, Output power factor 0.8 ~1 (lagging), Software included for System Monitoring. In this online UPS, the Extended battery options available.</p>', '1654406728_3175385.jpg', '22', '1', '2022-06-04 23:25:29', '2022-06-04 23:25:29'),
(20, 2, 33, 10, 'NIKON D7500 20.9 MP WITH 18-140MM LENS 4K WI-FI BLUETOOTH', 'nikon-d7500-209-mp-with-18-140mm-lens-4k-wi-fi-bluetooth', '629c3f41ce3c6', '950000', '1000', '90000', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px;\"><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">Model: Nikon D7500</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">20.9MP DX-Format CMOS Sensor</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">EXPEED 5 Image Processor</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">3.2\" 922k-Dot Tilting Touchscreen LCD</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">4K UHD Video Recording at 30 fps</li></ul>', '<h2 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px; font-weight: bold; font-size: 20px; line-height: 26px; color: rgb(0, 0, 0); font-family: &quot;Trebuchet MS&quot;, sans-serif;\">NIKON D7500 20.9 MP WITH 18-140MM LENS 4K WI-FI BLUETOOTH TOUCHSCREEN DSLR CAMERA</h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif;\">Nikon D7500 is a DX-format DSLR offering a versatile feature-set to appeal to photographers and videographers alike. Based on a 20.9MP CMOS sensor and EXPEED 5 image processor, this multimedia maven avails an 8 fps continuous shooting rate for up to 100 consecutive JPEGS, a native sensitivity range to ISO 51,200 that can be expanded up to ISO 1,640,000, and 4K UHD video and time-lapse recording capabilities. Complementing the imaging capabilities is a 51-point Multi-CAM 3500FX II autofocus system, which features 15 cross-type points for fast performance and accurate subject tracking capabilities in a variety of lighting conditions.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif;\"></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif;\">Balancing the performance attributes, the D7500 is also characterized by its sleek profile and monocoque construction that is comfortable and easy to handle. This physical design is also fully weather-sealed to permit working in harsh environmental conditions. In addition to the pentaprism optical viewfinder, a rear 3.2\" 922k-dot touchscreen is also featured, and has a tilting design to benefit working from high and low shooting angles. Additionally, SnapBridge Bluetooth and Wi-Fi permit wireless transferring of photos and movies and remote control over the camera from linked mobile devices.This Nikon DSLR camera provides 03 Years Service Warranty (No parts warranty)</p><div class=\"section-head\" style=\"margin: 0px; padding: 0px 0px 20px; font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px;\"><h2 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px; font-weight: bold; font-size: 20px; line-height: 26px;\">What is the price of NIKON D7500 20.9 MP TOUCHSCREEN DSLR CAMERA in Bangladesh?</h2></div><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif;\">The latest price of NIKON D7500 20.9 MP TOUCHSCREEN DSLR CAMERA in Bangladesh is 99,500৳. You can buy the NIKON D7500 20.9 MP TOUCHSCREEN DSLR CAMERA at best price from our website or visit any of our showrooms.</p>', '1654406977_4733952.jpg', '10', '1', '2022-06-04 23:29:37', '2022-06-04 23:29:37'),
(21, 2, 35, 23, 'Mi 4S 65 Inch 4K UHD Android Smart TV with Netflix (Global Version)', 'mi-4s-65-inch-4k-uhd-android-smart-tv-with-netflix-global-version', '629c3fe57dc8c', '90000', NULL, '840000', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px;\"><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">MPN: L65M5-5ASP</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">Model: Mi 4S</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">65 inches (3840 x 2160), 60Hz Display</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">4K HDR resolution</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">3 x HDMI, 3 x USB</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">Bluetooth v4.2 &amp; 2.4G / 5G Wi-Fi connection</li></ul>', '<p><br></p><h2 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px; font-weight: bold; font-size: 20px; line-height: 26px; color: rgb(0, 0, 0); font-family: &quot;Trebuchet MS&quot;, sans-serif; text-align: justify;\"><span style=\"margin: 0px; padding: 0px;\">Mi 4S 65 Inch 4K UHD Android Smart TV with Netflix (Global Version)</span></h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif; text-align: justify;\">Mi 4S 65 Inch 4K UHD Android Smart TV comes with Netflix (Global Version). This is one of the most powerful and interesting resolutions of the moment, so you can enjoy everything you want on the big screen. The Mi 4S TV has a 4K HDR resolution, this is one of the resolutions that offer great clarity. The Mi 4S 65 Inch Android Smart TV featured with Cortex-A55 4-core 64-bit processor, Mali 470 MP3 Graphic, 2GB RAM, and 16GB Storage capacity. It is designed with 65 inches (3,840 x 2,160) 4K display with 60Hz Refresh rate, 178º Viewing angle, Video, and HDR with Android OS. The Sound output: 2 10W speakers, Allows DTS / Dolby Audio, Speaker Type 2CH, Multiroom Link, and Bluetooth Audio features are available in this TV. Here 3 x HDMI, 3 x USB, Network input (LAN) Yes, Digital Audio Out (Optical) 1, HDMI A / Return to Channel, Quick HDMI connection, Integrated Wi-Fi and Anynet + (HDMI-CEC), Bluetooth v4.2, 2.4G / 5G Wi-Fi with 100mbps Ethernet connectivity are available. This TV also comes with Dolby surrounding sound, Built-in Chromecast, Voice search 360° smart Bluetooth Remote. This new Mi 4S 65 Inch 4K UHD Android Smart TV has a 01-year service warranty.</p>', '1654407141_4962982.jpg', '33', '1', '2022-06-04 23:32:21', '2022-06-04 23:32:21'),
(22, 4, 32, 7, 'Arktek GeForce GT 740 4GB GDDR5 Graphics Card', 'arktek-geforce-gt-740-4gb-gddr5-graphics-card', '629c409e5aba0', '13500', NULL, '10997', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px;\"><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">MPN: AKN740D5S4GH1,GT7404G</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">Model: GeForce GT 740</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">Type: 128 Bit 4GB GDDR5</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">GPU /Boost Clock: 993MHz</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">Memory Clock:5000MHz</li><li style=\"margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;\">Connector Type: HDMI, DVI, VGA</li></ul>', '<h2 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px; font-weight: bold; font-size: 20px; line-height: 26px; color: rgb(0, 0, 0); font-family: &quot;Trebuchet MS&quot;, sans-serif;\">Arktek GeForce GT 740 4GB GDDR5 Graphics Card</h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-size: 15px; color: rgb(1, 19, 45); line-height: 26px; font-family: &quot;Trebuchet MS&quot;, sans-serif;\">Arktek GeForce GT 740 is a 4GB capacity GDDR5 128-bit HDMI,DVI and VGA Graphics Card.It has 384SP Stream Processors with an Engine Clock of 993MHz and a 5000MHz Memory Clock with a 128-Bit GDDR5 video Memory Bus. The GT 740 gives you 4X faster gaming performance than integrated graphics while delivering rock-solid reliability and stability. It has HDMI with 1080p output support. NVIDIA GeForce GT740 GPU comes with various supported features. Namely: HDMI with 1080p output, NVIDIA PureVideo HD Technology, NVIDIA PhysX, and CUDA Technology, NVIDIA Surround, NVIDIA FXAA, NVIDIA TXAA Technology, NVIDIA 3D Vision ready, etc. This Graphics card is OS Certified for Windows 7, Windows 8, Windows Vista, and XP. This graphics card is PCI-E 3.0 supported. It has NVIDIA GPU Boost which helps extract every ounce of computing power from graphics cards, maximizing frame rates in each and every game. it has NVIDIA SLI which supports multi-GPU technology for up to 4 GPUs. The NVIDIA Adaptive V-Sync support is a smarter way to render frames using NVIDIA Control Panel software. This card is NVIDIA PhysX ready which creates incredible effects and scenes filled with dynamic destruction, particle-based fluids, and life-like animation. The NVIDIA 3D Vision delivers stereoscopic 3D images for gamers, movie-lovers, and photo enthusiasts. The NVIDIA CUDA enables dramatic increases in computing performance by harnessing the power of the Graphics Processing Unit (GPU). Integrated NVIDIA PureVideo HD Technology delivers stunning picture clarity, smooth video, accurate color, and precise image scaling for movies and video. Arktek GeForce GT 740 4GB GDDR5 Graphics Card offers a 2-year Warranty.</p>', '1654407326_741293.jpg', '22', '1', '2022-06-04 23:35:26', '2022-06-04 23:35:26');

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
(9, '629539aca492c', 'PG_7035131.png', '2022-05-30 15:39:56', '2022-05-30 15:39:56'),
(10, '629539aca492c', 'PG_2233623.png', '2022-05-30 15:39:56', '2022-05-30 15:39:56'),
(11, '629539aca492c', 'PG_3547290.png', '2022-05-30 15:39:56', '2022-05-30 15:39:56'),
(16, '629c3c1f6efb5', 'PG_1556069.jpg', '2022-06-04 23:16:15', '2022-06-04 23:16:15'),
(17, '629c3f41ce3c6', 'PG_4280127.jpg', '2022-06-04 23:29:38', '2022-06-04 23:29:38'),
(18, '629c3f41ce3c6', 'PG_9396046.jpg', '2022-06-04 23:29:38', '2022-06-04 23:29:38'),
(19, '629c3fe57dc8c', 'PG_2784464.jpg', '2022-06-04 23:32:21', '2022-06-04 23:32:21'),
(20, '629c3fe57dc8c', 'PG_8869713.jpg', '2022-06-04 23:32:21', '2022-06-04 23:32:21'),
(21, '629c409e5aba0', 'PG_8392498.jpg', '2022-06-04 23:35:26', '2022-06-04 23:35:26'),
(22, '629c409e5aba0', 'PG_1698887.jpg', '2022-06-04 23:35:26', '2022-06-04 23:35:26');

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
  `social_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `name`, `email`, `role`, `address`, `phone`, `photo`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `social_id`, `social_type`) VALUES
(1, 'Admin', 'admin', 'admin@mail.com', 1, NULL, NULL, NULL, NULL, '$2y$10$xeXw7FNtG1T4cCsZKBr1G.m22DB.TjNyRk6JwcGMSJwS6q/reJVmu', NULL, '2022-05-29 21:49:44', '2022-05-29 21:49:44', NULL, NULL),
(10, 'Quinn Durham', 'Yuli Mcguire', 'muvo@mailinator.com', 1, NULL, NULL, NULL, NULL, '$2y$10$me31RTkTBFNUCmZgz3O6iOFOIsYCPKQRJRbr3TCl.MLNWUkTpVDqu', NULL, '2022-06-01 11:52:22', '2022-06-01 11:52:22', NULL, NULL),
(11, 'Jeanette Hansen', 'Boris Dale', 'jurojeriva@mailinator.com', 3, NULL, NULL, NULL, NULL, '$2y$10$NX9lwrhBrLNxExl/DHY8T.wccf.xMfjWjPzsY/djP3wfCbzcCAAaC', NULL, '2022-06-01 11:53:12', '2022-06-01 11:53:12', NULL, NULL),
(13, 'User', 'user', 'user@mail.com', 3, NULL, NULL, NULL, NULL, '$2y$10$.QKjZTUq1ThrAdbhvCKQpuPLsBUNmjYFbmC1NOoM7JE9YsK91u7Tm', NULL, '2022-06-01 12:05:42', '2022-06-01 12:05:42', NULL, NULL);

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
(2, 'Start Tech', '+1 (866) 149-2092', 'Jayme Thompson', '+1 (531) 726-3166', '45', '800', 'xynagep@mailinator.com', 'Expedita voluptate q', 'Fuga Quis aliquip e', '', '1', '2022-05-30 11:31:19', '2022-06-04 23:03:21'),
(3, 'Computer Village', '+1 (682) 798-3436', 'Whitney Burnett', '+1 (352) 694-6124', '54', '219', 'bijuxyvem@mailinator.com', 'Sunt optio consequ', 'Harum suscipit enim', '', '1', '2022-05-30 11:31:22', '2022-06-04 23:03:42'),
(4, 'Pc House', '+1 (376) 873-2568', 'Quyn Kelley', '+1 (831) 668-8593', '79', '619', 'degivuqem@mailinator.com', 'Delectus et ut et r', 'Vel in ut nihil do a', '', '1', '2022-05-30 11:31:24', '2022-06-04 23:04:11');

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
