-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2022 at 08:00 PM
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
(6, 'T-shirt-black', NULL, 'Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, NULL, 1, '250', 't-shirt-7.jpg', 6, 5, '2022-05-26 14:37:07', '2022-05-28 17:54:10'),
(7, 'T-shirt-white', NULL, 'Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, NULL, 1, '300', 't-shirt-1.jpg', 6, 5, '2022-05-26 14:37:07', '2022-05-28 17:54:20'),
(8, 'T-shirt-move', NULL, 'Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, NULL, 1, '200', 't-shirt-9.jpg', 6, 5, '2022-05-26 14:38:08', '2022-05-28 17:54:26'),
(9, 'T-shirt-green', NULL, 'Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, 3, 1, '150', 't-shirt-3.jpg', 6, 5, '2022-05-26 17:38:57', '2022-05-28 17:54:31'),
(10, 'Iphone-selver', NULL, 'Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, NULL, 1, '8000', 'phone-8.jpg', 2, 1, '2022-05-26 14:42:49', '2022-05-26 18:35:07'),
(11, 'Oppo- phone-blue', NULL, 'Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, NULL, 1, '6000', 'phone-10.jpg', 2, 3, '2022-05-26 14:42:49', '2022-05-26 18:35:16'),
(12, 'Samsung-Gold', NULL, 'Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, NULL, 1, '5000', 'phone-1.jpg', 2, 2, '2021-05-26 14:42:49', '2022-05-27 22:17:59'),
(13, 'Charger-bink', NULL, 'Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, NULL, 0, '10000', 'charger-1.jpg', NULL, 1, '2022-05-26 14:45:07', '2022-05-26 19:01:27'),
(14, 'One cooky ', NULL, 'Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, NULL, 1, '80', 'cooky-2.jpg', 4, NULL, '2022-05-27 14:47:22', '2022-05-27 22:21:40'),
(15, 'Cookies-with-wafel', NULL, 'Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, NULL, 1, '100', 'cooky-1.jpg', 4, NULL, '2022-05-26 14:47:22', '2022-05-26 18:35:28'),
(16, 'Sandwitch-with-chesse', NULL, 'Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, NULL, 1, '100', 'sandwitch-2.jpg', 3, NULL, '2022-05-26 15:49:15', '2022-05-27 22:23:16'),
(17, 'Meat-shandwitch', NULL, 'Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, NULL, 1, '90', 'sandwitch-3.jpg', 3, NULL, '2022-05-26 14:49:15', '2022-05-26 18:35:32'),
(18, 'pantalon move', NULL, 'move pantalon large ant tall', NULL, NULL, 5, 1, '250', 'pantalon_1.jpg', 7, 5, '2022-05-28 00:41:04', '2022-05-28 17:54:50'),
(19, 'Move Dress', NULL, 'short dress move small', NULL, NULL, 2, 1, '350', 'dress_1.jpg', 8, 5, '2022-05-28 00:46:18', '2022-05-28 17:55:25'),
(20, 'full suit ', NULL, 'full suit big xl', NULL, NULL, 2, 1, '400', 'full_suit.jpg', 9, NULL, '2022-05-28 00:51:11', '2022-05-28 17:55:43'),
(21, 'pantalon jense', NULL, 'pantalon jense skiny', NULL, NULL, 6, 1, '340', 'pantalon_2.jpg', 7, NULL, '2022-05-28 00:53:11', '2022-05-28 17:55:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `products_subcategories` (`subcategory_id`),
  ADD KEY `products_brands` (`brand_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brands` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_subcategories` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
