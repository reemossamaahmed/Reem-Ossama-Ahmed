-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2022 at 03:05 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `street` varchar(32) NOT NULL,
  `building` int(11) NOT NULL,
  `flat` int(11) NOT NULL,
  `flot` int(11) NOT NULL,
  `note` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `phone` varchar(11) NOT NULL,
  `phone_verified_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=>active,0=>not active',
  `code` int(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(32) NOT NULL,
  `name_ar` varchar(32) DEFAULT NULL,
  `image` varchar(32) DEFAULT 'default.png',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=>active,0=>not active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name_en`, `name_ar`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Apple', NULL, 'apple.jpg', 1, '2022-05-26 14:10:58', '2022-05-26 21:53:46'),
(2, 'Samsung', NULL, 'samsung.png', 1, '2022-05-26 14:10:58', '2022-05-26 21:54:13'),
(3, 'Oppo', NULL, 'oppo.jpg', 1, '2022-05-26 14:11:27', '2022-05-26 21:54:30'),
(4, 'Hp', NULL, 'hp.png', 1, '2022-05-26 14:11:27', '2022-05-26 21:54:51'),
(5, 'Zara', NULL, 'zara.jpg', 1, '2022-05-26 14:11:40', '2022-05-26 21:55:10');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(32) NOT NULL,
  `name_ar` varchar(32) DEFAULT NULL,
  `image` varchar(32) DEFAULT 'default.png',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=>active,0=>not active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_en`, `name_ar`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Foods', NULL, 'default.png', 1, '2022-05-26 14:05:20', '2022-05-26 18:59:36'),
(2, 'Electronics', NULL, 'default.png', 1, '2022-05-26 14:05:20', '2022-05-26 14:07:21'),
(3, 'Clothes', NULL, 'default.png', 1, '2022-05-26 14:05:20', '2022-05-26 14:07:21');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(32) NOT NULL,
  `name_ar` varchar(32) NOT NULL,
  `latitude` int(11) DEFAULT NULL,
  `longitude` int(11) DEFAULT NULL,
  `distance` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=>active,0=>not active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `complains_replies`
--

CREATE TABLE `complains_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `messege` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reply_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` int(6) NOT NULL,
  `discount` decimal(10,0) NOT NULL,
  `discount_type` tinyint(1) NOT NULL DEFAULT 1,
  `min_order_price` decimal(10,0) NOT NULL,
  `max_discount_value` decimal(10,0) NOT NULL,
  `max_number_of_usage` int(11) NOT NULL,
  `max_number_of_usage_per_user` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=>active,0=>not active',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favs`
--

CREATE TABLE `favs` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` varchar(32) NOT NULL,
  `title_ar` varchar(32) NOT NULL,
  `image` varchar(32) DEFAULT 'default.png',
  `discount` decimal(10,0) NOT NULL,
  `discount_type` tinyint(1) NOT NULL DEFAULT 1,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1=>active,0=>not active',
  `total_price` decimal(10,0) DEFAULT NULL,
  `delivered_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `payment_method` tinyint(1) DEFAULT 1,
  `address_id` bigint(20) UNSIGNED DEFAULT NULL,
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `status`, `total_price`, `delivered_at`, `payment_method`, `address_id`, `coupon_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '200', NULL, 1, NULL, NULL, '2022-05-27 23:17:01', NULL),
(2, 2, 1, '300', NULL, 1, NULL, NULL, '2022-05-27 23:18:02', NULL),
(3, 3, 1, '500', NULL, 1, NULL, NULL, '2022-05-27 23:18:22', NULL),
(4, 4, 1, '450', NULL, 1, NULL, NULL, '2022-05-27 23:18:40', NULL),
(5, 5, 1, '750', NULL, 1, NULL, NULL, '2022-05-27 23:19:12', NULL),
(6, 6, 1, '900', NULL, 1, NULL, NULL, '2022-05-27 23:19:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`order_id`, `product_id`, `price`, `quantity`) VALUES
(1, 2, NULL, NULL),
(1, 7, NULL, NULL),
(1, 8, NULL, NULL),
(1, 9, NULL, NULL),
(1, 12, NULL, 5),
(2, 2, NULL, NULL),
(2, 9, NULL, 10),
(2, 12, NULL, 2),
(2, 14, NULL, 7),
(3, 2, NULL, NULL),
(3, 5, NULL, NULL),
(3, 9, NULL, NULL),
(3, 12, NULL, NULL),
(4, 2, NULL, NULL),
(4, 7, NULL, NULL),
(4, 14, NULL, 2),
(5, 2, NULL, NULL),
(5, 12, NULL, NULL),
(5, 14, NULL, NULL),
(6, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(32) NOT NULL,
  `name_ar` varchar(32) DEFAULT NULL,
  `details_en` text DEFAULT NULL,
  `details_ar` text DEFAULT NULL,
  `code` int(6) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '"1=>active""0=>not active"',
  `price` decimal(10,0) NOT NULL,
  `image` varchar(32) NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_en`, `name_ar`, `details_en`, `details_ar`, `code`, `quantity`, `status`, `price`, `image`, `subcategory_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(2, 'Labtop-apple-selver', NULL, 'Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, NULL, 1, '10000', 'lab-7.jpg', 1, 1, '2021-05-28 14:25:55', '2022-05-28 00:43:58'),
(3, 'Laptop-hp-rose', NULL, 'Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, NULL, 1, '9000', 'lab-4.jpg', 1, 4, '2022-05-26 14:31:09', '2022-05-26 18:34:47'),
(4, 'Labtop-apple-rose', NULL, 'Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, NULL, 1, '20000', 'lab-11.jpg', 1, 1, '2022-05-26 14:31:09', '2022-05-26 18:34:50'),
(5, 'Labtop-hp-blue', NULL, 'Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, NULL, 1, '8000', 'lab-6.jpg', 1, 4, '2022-05-26 14:32:01', '2022-05-26 18:34:53'),
(6, 'T-shirt-black', NULL, 'Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, NULL, 1, '250', 't-shirt-7.jpg', NULL, 5, '2022-05-26 14:37:07', '2022-05-26 18:34:56'),
(7, 'T-shirt-white', NULL, 'Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, NULL, 1, '300', 't-shirt-1.jpg', NULL, 5, '2022-05-26 14:37:07', '2022-05-26 18:34:58'),
(8, 'T-shirt-move', NULL, 'Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, NULL, 1, '200', 't-shirt-9.jpg', NULL, 5, '2022-05-26 14:38:08', '2022-05-26 18:35:01'),
(9, 'T-shirt-green', NULL, 'Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, 3, 1, '150', 't-shirt-3.jpg', NULL, 5, '2022-05-26 17:38:57', '2022-05-27 22:22:10'),
(10, 'Iphone-selver', NULL, 'Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, NULL, 1, '8000', 'phone-8.jpg', 2, 1, '2022-05-26 14:42:49', '2022-05-26 18:35:07'),
(11, 'Oppo- phone-blue', NULL, 'Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, NULL, 1, '6000', 'phone-10.jpg', 2, 3, '2022-05-26 14:42:49', '2022-05-26 18:35:16'),
(12, 'Samsung-Gold', NULL, 'Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, NULL, 1, '5000', 'phone-1.jpg', 2, 2, '2021-05-26 14:42:49', '2022-05-27 22:17:59'),
(13, 'Charger-bink', NULL, 'Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, NULL, 0, '10000', 'charger-1.jpg', NULL, 1, '2022-05-26 14:45:07', '2022-05-26 19:01:27'),
(14, 'One cooky ', NULL, 'Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, NULL, 1, '80', 'cooky-2.jpg', 4, NULL, '2022-05-27 14:47:22', '2022-05-27 22:21:40'),
(15, 'Cookies-with-wafel', NULL, 'Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, NULL, 1, '100', 'cooky-1.jpg', 4, NULL, '2022-05-26 14:47:22', '2022-05-26 18:35:28'),
(16, 'Sandwitch-with-chesse', NULL, 'Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, NULL, 1, '100', 'sandwitch-2.jpg', 3, NULL, '2022-05-26 15:49:15', '2022-05-27 22:23:16'),
(17, 'Meat-shandwitch', NULL, 'Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, NULL, 1, '90', 'sandwitch-3.jpg', 3, NULL, '2022-05-26 14:49:15', '2022-05-26 18:35:32'),
(18, 'pantalon move', NULL, 'move pantalon large ant tall', NULL, NULL, 5, 1, '250', 'pantalon_1.jpg', NULL, 5, '2022-05-28 00:41:04', '2022-05-28 00:41:43'),
(19, 'Move Dress', NULL, 'short dress move small', NULL, NULL, 2, 1, '350', 'dress_1.jpg', NULL, 5, '2022-05-28 00:46:18', '2022-05-28 00:48:40'),
(20, 'full suit ', NULL, 'full suit big xl', NULL, NULL, 2, 1, '400', 'full_suit.jpg', NULL, NULL, '2022-05-28 00:51:11', NULL),
(21, 'pantalon jense', NULL, 'pantalon jense skiny', NULL, NULL, 6, 1, '340', 'pantalon_2.jpg', NULL, NULL, '2022-05-28 00:53:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_offers`
--

CREATE TABLE `products_offers` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `offer_id` bigint(20) UNSIGNED NOT NULL,
  `price_after_discount` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products_specs`
--

CREATE TABLE `products_specs` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `spec_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_specs`
--

INSERT INTO `products_specs` (`product_id`, `spec_id`, `value`) VALUES
(6, 1, 'Black'),
(9, 1, 'green'),
(9, 6, '150 cm'),
(9, 9, 'cotton'),
(11, 1, 'blue'),
(11, 2, '50 g'),
(11, 5, 'China'),
(11, 7, 'HD'),
(19, 8, '150 cm');

-- --------------------------------------------------------

--
-- Stand-in structure for view `product_details`
-- (See below for the actual view)
--
CREATE TABLE `product_details` (
`id` bigint(20) unsigned
,`name_en` varchar(32)
,`name_ar` varchar(32)
,`details_en` text
,`details_ar` text
,`code` int(6)
,`quantity` int(11)
,`status` tinyint(4)
,`price` decimal(10,0)
,`image` varchar(32)
,`subcategory_id` bigint(20) unsigned
,`brand_id` bigint(20) unsigned
,`created_at` timestamp
,`updated_at` timestamp
,`categories_name_en` varchar(32)
,`categories_id` bigint(20) unsigned
,`subcategories_name_en` varchar(32)
,`brands_name_en` varchar(32)
,`reviews_count` bigint(21)
,`reviews_avg` decimal(5,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(32) NOT NULL,
  `name_ar` varchar(32) NOT NULL,
  `latitude` int(11) DEFAULT NULL,
  `longitude` int(11) DEFAULT NULL,
  `distance` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=>active,0=>not active',
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rate` tinyint(5) DEFAULT 0,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`product_id`, `user_id`, `rate`, `comment`, `created_at`, `updated_at`) VALUES
(9, 2, 4, 'good', '2022-05-27 12:37:44', NULL),
(9, 10, 2, 'not bad', '2022-05-27 12:37:07', NULL),
(10, 3, 4, 'very good it\'s speed is so far', '2022-05-28 01:02:57', NULL),
(14, 10, 5, 'good', '2022-05-27 12:37:07', NULL),
(15, 4, 3, 'very delicious and  big', '2022-05-28 01:03:29', NULL),
(20, 10, 5, 'Very beautiful and it\'s very comfotable', '2022-05-28 01:02:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `specs`
--

CREATE TABLE `specs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specs`
--

INSERT INTO `specs` (`id`, `name`) VALUES
(1, 'Color'),
(2, 'Weight'),
(3, 'Ram'),
(4, 'Storage'),
(5, 'Made In'),
(6, 'Width'),
(7, 'Screen'),
(8, 'length'),
(9, 'Made Of');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(32) NOT NULL,
  `name_ar` varchar(32) DEFAULT NULL,
  `image` varchar(32) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '"1=>active""0=>not active"',
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name_en`, `name_ar`, `image`, `status`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Laptops', NULL, NULL, 1, 2, '2022-05-26 15:02:02', NULL),
(2, 'Mobiles', NULL, NULL, 1, 2, '2022-05-26 15:02:02', NULL),
(3, 'Sandwitches', NULL, NULL, 1, 1, '2022-05-26 15:06:35', NULL),
(4, 'Cookies', NULL, NULL, 1, 1, '2022-05-26 15:06:35', '2022-05-26 21:29:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(80) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `phone` varchar(11) NOT NULL,
  `phone_verified_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `image` varchar(32) DEFAULT 'default.png',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=>active,0=>block',
  `password` varchar(255) NOT NULL,
  `gender` enum('f','m') NOT NULL,
  `code` int(6) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `phone`, `phone_verified_at`, `image`, `status`, `password`, `gender`, `code`, `birth_date`, `created_at`, `updated_at`) VALUES
(2, 'karim', 'karim@gmail.com', NULL, '01216568015', NULL, 'default.png', 1, '$2y$10$lBNyvsgp8oikOhE6psqJHuxCuwM4Oo9C5/EAIS59CmshMkceeDXqW', 'm', 475748, NULL, '2022-05-25 17:38:21', '2022-05-24 01:05:34'),
(3, 'mohamed', 'mohamed@gmail.com', NULL, '01516568015', NULL, 'default.png', 1, '$2y$10$SoXf2F5OQN8e7ZSk3tHh5OWSulxu1OahEwhTQIQ2LR/ong.wwx6s.', 'm', 218705, NULL, '2022-05-25 17:38:21', '2022-05-24 01:21:43'),
(4, 'sara', 'sara@gmail.com', NULL, '01016568016', NULL, 'default.png', 1, '$2y$10$HXhdc4CADSTlui3zOA8hy.VXxd3uBNoTWfP8laNj3jAuV3Hft3BvC', 'f', 641579, NULL, '2022-05-25 17:38:21', '2022-05-24 18:25:58'),
(10, 'reem', 'reemhelmy28@gmail.com', '2022-05-27 12:45:22', '01016568015', '2022-05-27 12:45:22', '6290c7e250b17.png', 1, '$2y$10$RbY49mlhf1FhidEKfxZ1..k58NpvFMq/rTv1MV5UrIya1iQEnSHdy', 'f', 200818, NULL, '2022-05-27 12:45:22', '2022-05-25 02:39:50');

-- --------------------------------------------------------

--
-- Structure for view `product_details`
--
DROP TABLE IF EXISTS `product_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_details`  AS SELECT `products`.`id` AS `id`, `products`.`name_en` AS `name_en`, `products`.`name_ar` AS `name_ar`, `products`.`details_en` AS `details_en`, `products`.`details_ar` AS `details_ar`, `products`.`code` AS `code`, `products`.`quantity` AS `quantity`, `products`.`status` AS `status`, `products`.`price` AS `price`, `products`.`image` AS `image`, `products`.`subcategory_id` AS `subcategory_id`, `products`.`brand_id` AS `brand_id`, `products`.`created_at` AS `created_at`, `products`.`updated_at` AS `updated_at`, `categories`.`name_en` AS `categories_name_en`, `categories`.`id` AS `categories_id`, `subcategories`.`name_en` AS `subcategories_name_en`, `brands`.`name_en` AS `brands_name_en`, count(`reviews`.`product_id`) AS `reviews_count`, round(if(avg(`reviews`.`rate`) is null,0,avg(`reviews`.`rate`)),0) AS `reviews_avg` FROM ((((`products` left join `brands` on(`brands`.`id` = `products`.`brand_id`)) left join `subcategories` on(`subcategories`.`id` = `products`.`subcategory_id`)) left join `categories` on(`categories`.`id` = `subcategories`.`category_id`)) left join `reviews` on(`reviews`.`product_id` = `products`.`id`)) GROUP BY `products`.`id` ORDER BY `products`.`price` ASC, `products`.`name_en` ASC  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_addresses` (`user_id`),
  ADD KEY `regions_addresses` (`region_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`product_id`,`user_id`),
  ADD KEY `carts_user` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complains_replies`
--
ALTER TABLE `complains_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complaints_users` (`user_id`),
  ADD KEY `complaints_replies` (`reply_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `favs`
--
ALTER TABLE `favs`
  ADD PRIMARY KEY (`product_id`,`user_id`),
  ADD KEY `favs_users` (`user_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_number` (`order_number`),
  ADD KEY `orders_addresses` (`address_id`),
  ADD KEY `orders_coupons` (`coupon_id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `products_subcategories` (`subcategory_id`),
  ADD KEY `products_brands` (`brand_id`);

--
-- Indexes for table `products_offers`
--
ALTER TABLE `products_offers`
  ADD PRIMARY KEY (`product_id`,`offer_id`),
  ADD KEY `offer_id` (`offer_id`);

--
-- Indexes for table `products_specs`
--
ALTER TABLE `products_specs`
  ADD PRIMARY KEY (`product_id`,`spec_id`),
  ADD KEY `spec_id` (`spec_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_regions` (`city_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`product_id`,`user_id`),
  ADD KEY `reviews_users` (`user_id`);

--
-- Indexes for table `specs`
--
ALTER TABLE `specs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_categories` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complains_replies`
--
ALTER TABLE `complains_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specs`
--
ALTER TABLE `specs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `regions_addresses` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`),
  ADD CONSTRAINT `users_addresses` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `complains_replies`
--
ALTER TABLE `complains_replies`
  ADD CONSTRAINT `complaints_replies` FOREIGN KEY (`reply_id`) REFERENCES `complains_replies` (`id`),
  ADD CONSTRAINT `complaints_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `favs`
--
ALTER TABLE `favs`
  ADD CONSTRAINT `favs_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `favs_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_addresses` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `orders_coupons` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`);

--
-- Constraints for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `orders_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orders_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brands` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_subcategories` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`);

--
-- Constraints for table `products_offers`
--
ALTER TABLE `products_offers`
  ADD CONSTRAINT `products_offers_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `products_offers_ibfk_2` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`);

--
-- Constraints for table `products_specs`
--
ALTER TABLE `products_specs`
  ADD CONSTRAINT `products_specs_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `products_specs_ibfk_2` FOREIGN KEY (`spec_id`) REFERENCES `specs` (`id`);

--
-- Constraints for table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `cities_regions` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `reviews_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
