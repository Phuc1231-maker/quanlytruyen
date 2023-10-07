-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2023 at 05:20 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbbanhang21cntt1b`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `note`, `created_at`, `updated_at`, `status`) VALUES
(23, 30, '2023-10-02', 170000, 'COD', NULL, '2023-10-05 07:40:14', '2023-10-05 00:40:14', 1),
(24, 31, '2023-10-07', 234242000, 'ATM', NULL, '2023-10-06 20:01:41', '2023-10-06 20:01:41', NULL),
(25, 32, '2023-10-07', 234242000, 'COD', NULL, '2023-10-06 20:01:52', '2023-10-06 20:01:52', NULL),
(26, 33, '2023-10-07', 234242000, 'COD', NULL, '2023-10-06 20:03:34', '2023-10-06 20:03:34', NULL),
(27, 34, '2023-10-07', 234242000, 'COD', NULL, '2023-10-06 20:04:58', '2023-10-06 20:04:58', NULL),
(28, 35, '2023-10-07', 234242000, 'COD', NULL, '2023-10-06 20:05:32', '2023-10-06 20:05:32', NULL),
(29, 36, '2023-10-07', 234242000, 'COD', NULL, '2023-10-06 20:12:30', '2023-10-06 20:12:30', NULL),
(30, 37, '2023-10-07', 234242000, 'COD', NULL, '2023-10-06 20:13:44', '2023-10-06 20:13:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(11) NOT NULL,
  `id_bill` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(20,0) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `updated_at`, `created_at`) VALUES
(1, 17, 19, 1, '150000', '2023-06-22 16:15:30', '2023-06-22 16:15:30'),
(2, 19, 1, 1, '120000', '2023-06-23 02:39:57', '2023-06-23 02:39:57'),
(3, 20, 54, 1, '150000', '2023-06-23 03:39:34', '2023-06-23 03:39:34'),
(4, 21, 2, 1, '160000', '2023-06-23 04:29:16', '2023-06-23 04:29:16'),
(5, 22, 43, 1, '120000', '2023-06-27 09:55:54', '2023-06-27 09:55:54'),
(6, 23, 64, 1, '170000', '2023-10-02 15:45:49', '2023-10-02 15:45:49'),
(7, 30, 67, 1, '234242000', '2023-10-07 03:13:44', '2023-10-07 03:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(8, 'phuc', 'phucnguyentk196@gmail.com', '123', '2023-10-03 17:52:29', '2023-10-03 17:52:29');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(15, 'ê', 'Nữ', 'huongnguyen@gmail.com', 'e', 'e', 'e', '2017-03-24 00:14:32', '2017-03-24 00:14:32'),
(32, 'quý de', 'nam', 'phucnguyentk196@gmail.com', 'da nang', '0357468564', 'hahah', '2023-10-06 20:01:52', '2023-10-06 20:01:52'),
(33, 'quý de', 'nam', 'phucnguyentk196@gmail.com', 'da nang', '0357468564', 'hahah', '2023-10-06 20:03:34', '2023-10-06 20:03:34'),
(31, 'quý de', 'nam', 'phucnguyentk196@gmail.com', 'da nang', '0357468564', 'hahah', '2023-10-06 20:01:41', '2023-10-06 20:01:41'),
(30, 'Nguyen Xuan Phuc', 'nam', 'phucnguyentk169@gmail.com', 'fasf', '0357468564', 'SCX', '2023-10-02 08:45:49', '2023-10-02 08:45:49'),
(16, 'Nguyen Xuan Phuc', 'nam', 'phucnguyentk169@gmail.com', 'fasf', '0357468564', 'afas', '2023-06-22 09:09:05', '2023-06-22 09:09:05'),
(17, 'Nguyen Xuan Phuc', 'nam', 'phucnguyentk169@gmail.com', 'fasf', '0357468564', '124e4q4r', '2023-06-22 09:15:30', '2023-06-22 09:15:30'),
(18, 'Nguyen Xuan Phuc', 'nam', 'phucnguyentk169@gmail.com', 'fasf', '0357468564', 'fdgdh', '2023-06-22 19:37:31', '2023-06-22 19:37:31'),
(19, 'Nguyen Xuan Phuc', 'nam', 'phucnguyentk169@gmail.com', 'fasf', '0357468564', 'fdgdh', '2023-06-22 19:38:10', '2023-06-22 19:38:10'),
(20, 'Nguyen Xuan Phuc', 'nam', 'phucnguyentk169@gmail.com', 'fasf', '0357468564', 'fdgdh', '2023-06-22 19:39:57', '2023-06-22 19:39:57'),
(21, 'Nguyen Xuan Phuc', 'nam', 'phucnguyentk169@gmail.com', 'fasf', '0357468564', 'dsfsd', '2023-06-22 19:40:03', '2023-06-22 19:40:03'),
(22, 'Nguyen Xuan Phuc', 'nam', 'phucnguyentk169@gmail.com', 'fasf', '0357468564', 'dsfsd', '2023-06-22 19:41:42', '2023-06-22 19:41:42'),
(23, 'nguyenxuanphuc', 'nam', 'nguyenanhtk169@gmail.com', 'fasf', '0357468564', 'eafsf', '2023-06-22 19:42:05', '2023-06-22 19:42:05'),
(24, 'nguyenxuanphuc', 'nam', 'nguyenanhtk169@gmail.com', 'fasf', '0357468564', 'eafsf', '2023-06-22 19:42:12', '2023-06-22 19:42:12'),
(28, 'dfhbsd', 'nam', 'nguyenhuytk134@gmail.com', 'Đà Nẵng', '35345', 'df', '2023-06-22 21:29:16', '2023-06-22 21:29:16'),
(34, 'quý de', 'nam', 'phucnguyentk196@gmail.com', 'da nang', '0357468564', 'hahah', '2023-10-06 20:04:58', '2023-10-06 20:04:58'),
(35, 'quý de', 'nam', 'phucnguyentk196@gmail.com', 'da nang', '0357468564', 'hahah', '2023-10-06 20:05:32', '2023-10-06 20:05:32'),
(36, 'Baovip2', 'nam', 'phucnguyentk196@gmail.com', 'sdsadsa', '4948324832', 'sadsadsadsa', '2023-10-06 20:12:30', '2023-10-06 20:12:30'),
(37, 'Baovip2', 'nam', 'phucnguyentk196@gmail.com', 'sdsadsa', '4948324832', 'sadsadsadsa', '2023-10-06 20:13:44', '2023-10-06 20:13:44'),
(38, 'Baovip2', 'nam', 'phucnguyentk196@gmail.com', 'sdsadsa', '4948324832', 'sadsadsadsa', '2023-10-06 20:14:18', '2023-10-06 20:14:18');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `best` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `image`, `unit`, `new`, `created_at`, `updated_at`, `best`) VALUES
(66, 'Truyện Đô Rê Mon', NULL, 'Konna koto ii na iketara ii na\r\nAnna yume konna yume ippai aru kedo\r\n \r\n\r\nMinna minna minna\r\nKanaete kureru\r\nFushigina POKKE de kanaete kureru\r\nSora wo jiyuu ni tobitai na\r\n \r\n\r\n(Hai! takekoputaa!)\r\n \r\n\r\nAN AN AN\r\nTottemo daisuki DORAEMON\r\nShukudai touban shiken ni otsukai\r\nAnna koto konna koto taihen dakedo\r\n \r\n\r\nMinna minna minna\r\nTasukete kureru\r\nBenrina dougu de tasukete kureru\r\nOmocha no heitai da', 1200000, 5000000000, '1696605758_tải xuống (4).jpg', 'truyện hay lắm', 1, '2023-10-06 08:22:38', '2023-10-06 08:22:38', 0),
(67, 'Truyện Conan', NULL, 'hay', 1200000, 234242000, '1696608010_100_bd275c22338e4df3a7b01a0b8553e338_master.jpg', 'ypm', 1, '2023-10-06 09:00:10', '2023-10-06 09:00:10', 0),
(68, 'Truyện Siêu Nhân', NULL, 'hay lắm nha', 14315700000, 25200000000, '1696608196_oqs1348038639.jpg', 'afffffffffffff', 1, '2023-10-06 09:03:16', '2023-10-06 09:03:16', 0),
(69, 'Truyện Tấm Cám', NULL, 'fasdfsd', 43544800000, 3243530000, '1696608341_chuyen-co-tich-tam-cam.jpg', 'ypm', 1, '2023-10-06 09:05:41', '2023-10-06 09:05:41', 0),
(70, 'Truyện Cậu Bé Rồng', NULL, 'hay', 431414000, 45535300, '1696608530_9e63e9c8bb68ed89e33e9e954d232204_tn.jpg', 'ypm', 1, '2023-10-06 09:08:50', '2023-10-06 09:08:50', 0),
(71, 'Truyện Dragon ball', NULL, 'hAY', 1395890000, 54654600, '1696608640_tải xuống (5).jpg', 'FEADF', 1, '2023-10-06 09:10:40', '2023-10-06 09:10:40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `link`, `image`) VALUES
(1, 'Truyen Tranh', '1694055948_banner-truyện-trọn-bộ.gif'),
(2, 'ONE PICE', '1694652927_banner-7-1658743506613135356968-1658811005445-1658811005522255302315.jpg'),
(3, 'DOREMON', '1694652935_chien-binh-truyen-thuyet-launch-news-vi-banner.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(10) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `phone`, `address`, `level`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(14, 'Nguyen Xuan Phuc', 'phucnguyentk169@gmail.com', '$2y$10$snRy76eqWENYFa5/iQyDRegaJjii1InXJlQU7pBT0AaU6EuKphr3e', '12345', 'danang', 1, NULL, '2023-06-22 21:18:22', '2023-06-22 21:18:22', 0),
(15, 'dfhbsd', 'nguyenhuytk134@gmail.com', '$2y$10$MKy0D9uSF7ZKMzLV1qs0auhaeHI8J8EEMMSYIYt2.kNgcnNHf6l.q', '35345', 'Đà Nẵng', 3, NULL, '2023-06-22 21:28:50', '2023-06-22 21:28:50', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`id_customer`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
