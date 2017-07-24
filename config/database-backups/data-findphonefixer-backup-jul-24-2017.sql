-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2017 at 04:06 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data-findphonefixer`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

DROP TABLE IF EXISTS `amenities`;
CREATE TABLE `amenities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `name`, `slug`, `created`, `modified`) VALUES
(1, 'Free WiFi', 'free-wifi', '2017-02-20 20:43:05', '2017-02-20 20:43:05'),
(2, 'Patio', 'patio', '2017-02-20 20:43:18', '2017-02-20 20:43:18');

-- --------------------------------------------------------

--
-- Table structure for table `amenities_venues`
--

DROP TABLE IF EXISTS `amenities_venues`;
CREATE TABLE `amenities_venues` (
  `venue_id` int(11) NOT NULL,
  `amenity_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `amenities_venues`
--

INSERT INTO `amenities_venues` (`venue_id`, `amenity_id`) VALUES
(90, 2),
(253, 1),
(1157, 2),
(1158, 1),
(1158, 2);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_bin NOT NULL,
  `date` datetime DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `excerpt` text COLLATE utf8_bin,
  `body` text COLLATE utf8_bin,
  `feature_image` text COLLATE utf8_bin,
  `created` datetime DEFAULT NULL,
  `modifed` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `created`, `modified`) VALUES
(1, 'Apple', 'apple', '2017-02-20 20:41:54', '2017-02-20 20:41:54'),
(2, 'Samsung', 'samsung', '2017-06-28 18:04:15', '2017-06-28 18:04:15');

-- --------------------------------------------------------

--
-- Table structure for table `brands_venues`
--

DROP TABLE IF EXISTS `brands_venues`;
CREATE TABLE `brands_venues` (
  `venue_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `brands_venues`
--

INSERT INTO `brands_venues` (`venue_id`, `brand_id`) VALUES
(1172, 1),
(1173, 1),
(1173, 2),
(1174, 1),
(1174, 2),
(1175, 1),
(1175, 2),
(1185, 1),
(1185, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cake_d_c_users_phinxlog`
--

DROP TABLE IF EXISTS `cake_d_c_users_phinxlog`;
CREATE TABLE `cake_d_c_users_phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cake_d_c_users_phinxlog`
--

INSERT INTO `cake_d_c_users_phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20150513201111, 'Initial', '2017-06-28 22:15:03', '2017-06-28 22:15:03', 0),
(20161031101316, 'AddSecretToUsers', '2017-06-28 22:15:03', '2017-06-28 22:15:04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `chains`
--

DROP TABLE IF EXISTS `chains`;
CREATE TABLE `chains` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `local_chain` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `chains`
--

INSERT INTO `chains` (`id`, `name`, `slug`, `local_chain`, `created`, `modified`) VALUES
(1, 'Apple Store', 'apple-store', 0, '2017-02-23 05:56:49', '2017-02-23 05:56:49'),
(2, 'Best Buy', 'best-buy', 0, '2017-02-23 05:56:58', '2017-02-23 05:56:58'),
(3, 'Cell Clinic', 'cell-clinic', 0, '2017-07-09 19:57:48', '2017-07-09 19:57:48'),
(4, 'iRepair', 'irepair', 0, '2017-07-09 19:58:15', '2017-07-09 19:58:15'),
(5, 'Fast Cell Repair', 'fast-cell-repair', 1, '2017-07-11 02:35:50', '2017-07-11 02:35:50'),
(6, 'Pacific Laptop', 'pacific-laptop', 1, '2017-07-12 03:40:57', '2017-07-12 03:40:57'),
(7, 'CellFixx', 'cellfixx', 1, '2017-07-14 05:35:38', '2017-07-14 05:35:38');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `slug` varchar(100) COLLATE utf8_bin NOT NULL,
  `display_name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `seo_title` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `seo_desc` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `image_path` text COLLATE utf8_bin,
  `image_path_city_page` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `flag_show_homepage` tinyint(1) UNSIGNED DEFAULT NULL,
  `number_venues` smallint(5) UNSIGNED DEFAULT NULL,
  `intro_text` text COLLATE utf8_bin,
  `province_id` int(10) UNSIGNED DEFAULT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `slug`, `display_name`, `seo_title`, `seo_desc`, `image_path`, `image_path_city_page`, `flag_show_homepage`, `number_venues`, `intro_text`, `province_id`, `country_id`) VALUES
(1, 'Toronto', 'toronto', NULL, 'Cell Phone Repair Toronto', 'Find places to repair your iPhone, cell phone or other mobile phone in Toronto, Canada. ', '/assets/img/city_toronto.jpg', NULL, 1, 2, 'Toronto', 1, 1),
(8, 'Montreal', 'montreal', NULL, 'Montréal, Canada', '', '/assets/img/city_montreal.jpg', NULL, 0, NULL, '', 9, 1),
(90, 'Burnaby', 'burnaby', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, 1),
(91, 'Richmond', 'richmond', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, 1),
(18, 'Calgary', 'calgary', NULL, 'Calgary, Canada', '', '/assets/img/city_calgary.jpg', NULL, 0, NULL, '', 8, 1),
(89, 'North Vancouver', 'north-vancouver', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, 1),
(88, 'Vancouver', 'vancouver', NULL, 'Cell Phone Repair Vancouver', 'Find places to repair your iPhone, cell phone or other mobile phone in Vancouver, Canada. ', '/assets/img/city_vancouver.jpg', NULL, 1, NULL, NULL, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `city_regions`
--

DROP TABLE IF EXISTS `city_regions`;
CREATE TABLE `city_regions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `display_name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `seo_title` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `seo_desc` text COLLATE utf8_bin,
  `city_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `city_regions`
--

INSERT INTO `city_regions` (`id`, `name`, `display_name`, `slug`, `seo_title`, `seo_desc`, `city_id`) VALUES
(3, 'Old Toronto', 'Downtown Toronto', 'old-toronto', NULL, NULL, 1),
(45, 'Kitsilano', NULL, 'kitsilano', NULL, NULL, 88),
(44, 'Grandview-Woodland', NULL, 'grandview-woodland', NULL, NULL, 88),
(43, 'Downtown', NULL, 'downtown', NULL, NULL, 88),
(42, 'South Vancouver', NULL, 'south-vancouver', NULL, NULL, 88),
(41, 'East Side', NULL, 'east-side', NULL, NULL, 88),
(40, 'West Side', NULL, 'west-side', NULL, NULL, 88),
(39, 'Central', NULL, 'central', NULL, NULL, 88),
(38, 'Mount Pleasant', NULL, 'mount-pleasant', NULL, NULL, 88);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `slug` varchar(100) COLLATE utf8_bin NOT NULL,
  `seo_title` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `seo_desc` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `intro_text` text COLLATE utf8_bin
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `slug`, `seo_title`, `seo_desc`, `intro_text`) VALUES
(1, 'Canada', 'canada', 'SEO Canada', 'SEO desc. Canada', 'Some text about Canada'),
(4, 'United States', 'united-states', NULL, NULL, NULL),
(5, 'United Kingdom', 'united-kingdom', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cuisines`
--

DROP TABLE IF EXISTS `cuisines`;
CREATE TABLE `cuisines` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cuisines`
--

INSERT INTO `cuisines` (`id`, `name`, `slug`, `created`, `modified`) VALUES
(1, 'Pub food', 'pub-food', '2017-02-20 20:42:14', '2017-02-20 20:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `cuisines_venues`
--

DROP TABLE IF EXISTS `cuisines_venues`;
CREATE TABLE `cuisines_venues` (
  `venue_id` int(11) NOT NULL,
  `cuisine_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `landing_pages`
--

DROP TABLE IF EXISTS `landing_pages`;
CREATE TABLE `landing_pages` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8_bin NOT NULL,
  `seo_title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `seo_desc` text COLLATE utf8_bin
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE `languages` (
  `id` smallint(6) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `native_name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `native_name`, `slug`) VALUES
(1, 'French', 'français', 'french'),
(2, 'Korean', '한국어', 'korean'),
(3, 'German', 'Deutsche', 'german'),
(4, 'Chinese', '中文', 'chinese'),
(5, 'Russian', 'русский', 'russian'),
(6, 'Spanish', 'Español', 'spanish');

-- --------------------------------------------------------

--
-- Table structure for table `languages_venues`
--

DROP TABLE IF EXISTS `languages_venues`;
CREATE TABLE `languages_venues` (
  `venue_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `malls`
--

DROP TABLE IF EXISTS `malls`;
CREATE TABLE `malls` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `slug` varchar(100) COLLATE utf8_bin NOT NULL,
  `seo_title` varchar(100) COLLATE utf8_bin NOT NULL,
  `seo_desc` varchar(100) COLLATE utf8_bin NOT NULL,
  `intro_text` text COLLATE utf8_bin NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `malls`
--

INSERT INTO `malls` (`id`, `name`, `slug`, `seo_title`, `seo_desc`, `intro_text`, `city_id`) VALUES
(1, 'Eaton Centre', 'eaton-centre', 'Eaton Centre', 'Eaton Centre', 'Eaton Centre', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `created`, `modified`) VALUES
(17, 'Battery Stores', 'battery-stores', '2017-02-21 00:38:49', '2017-02-21 00:38:49'),
(26, 'Mobile Phones', 'mobile-phones', '2017-02-21 00:38:49', '2017-02-21 00:38:49'),
(189, 'Phone Cases & Accessories', 'phone-cases-and-phone-accessories', '2017-07-07 02:41:01', '2017-07-09 19:20:24'),
(55, 'Office Equipment', 'office-equipment', '2017-02-26 22:06:42', '2017-02-26 22:06:42');

-- --------------------------------------------------------

--
-- Table structure for table `products_venues`
--

DROP TABLE IF EXISTS `products_venues`;
CREATE TABLE `products_venues` (
  `venue_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `products_venues`
--

INSERT INTO `products_venues` (`venue_id`, `product_id`) VALUES
(1173, 26),
(1175, 189),
(1177, 189),
(1178, 189),
(1179, 26),
(1180, 189),
(1185, 26),
(1189, 17),
(1190, 17),
(1191, 26),
(1191, 189),
(1192, 189),
(1193, 26),
(1193, 189),
(1195, 189),
(1196, 189),
(1200, 26),
(1200, 189),
(1201, 189),
(1203, 26);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `slug` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `seo_title` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `seo_desc` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `intro_text` text COLLATE utf8_bin,
  `country_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `slug`, `seo_title`, `seo_desc`, `intro_text`, `country_id`) VALUES
(1, 'Ontario', 'ontario', 'Ontario', 'Ontario', 'Ontario', 1),
(13, 'British Columbia', 'british-columbia', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `slug`, `created`, `modified`) VALUES
(1, 'Phone Unlocking', 'phone-unlocking', '2017-02-20 20:39:02', '2017-07-07 02:30:20'),
(26, 'Electronics', 'electronics', '2017-02-26 22:06:42', '2017-02-26 22:06:42'),
(5, 'Data Recovery', 'data-recovery', '2017-02-21 01:05:02', '2017-02-21 01:05:02'),
(6, 'Electrical Repairs', 'electrical-repairs', '2017-02-21 01:05:02', '2017-02-21 01:05:02'),
(8, 'IT Services & Computer & Laptop Repair', 'it-services-and-computer-and-laptop-repair', '2017-02-21 01:05:02', '2017-02-21 01:05:02'),
(9, 'Internet Service Providers', 'internet-service-providers', '2017-02-21 01:05:02', '2017-02-21 01:05:02'),
(11, 'Mobile Phone Repair', 'mobile-phone-repair', '2017-02-21 01:05:02', '2017-02-21 01:05:02'),
(21, 'Appliances & Repair', 'appliances-and-repair', '2017-02-26 22:06:42', '2017-02-26 22:06:42'),
(28, 'Graphic Design', 'graphic-design', '2017-02-26 22:06:42', '2017-02-26 22:06:42'),
(37, 'Printing & Photocopying', 'printing-and-photocopying', '2017-02-26 22:06:42', '2017-02-26 22:06:42'),
(38, 'Professional Services', 'professional-services', '2017-02-26 22:06:42', '2017-02-26 22:06:42'),
(41, 'TV Mounting', 'tv-mounting', '2017-02-26 22:06:42', '2017-02-26 22:06:42'),
(43, 'Telecommunications', 'telecommunications', '2017-02-26 22:06:42', '2017-02-26 22:06:42'),
(44, 'Television Service Providers', 'television-service-providers', '2017-02-26 22:06:42', '2017-02-26 22:06:42'),
(45, 'Videos & Video Game Rentals', 'videos-and-video-game-rentals', '2017-02-26 22:06:42', '2017-02-26 22:06:42'),
(46, 'Web Design', 'web-design', '2017-02-26 22:06:42', '2017-02-26 22:06:42'),
(170, 'Mail-In Repairs', 'mail-in-repairs', '2017-07-11 03:24:42', '2017-07-11 03:24:42'),
(169, 'Video Game Console Repairs', 'video-game-console-repairs', '2017-07-11 03:24:24', '2017-07-11 03:24:24'),
(168, 'Online Store', 'online-store', '2017-07-11 03:00:59', '2017-07-11 03:00:59'),
(167, 'Buy / Sell / Trade Program', 'buy-sell-trade-program', '2017-07-11 02:43:38', '2017-07-11 02:43:38'),
(166, 'Screen Repairs', 'screen-repairs', '2017-07-09 19:21:35', '2017-07-09 19:21:35'),
(165, 'iPad Repairs', 'ipad-repairs', '2017-07-09 19:21:05', '2017-07-09 19:21:05'),
(164, 'iPhone repairs', 'iphone-repairs', '2017-07-09 18:47:10', '2017-07-09 18:47:10'),
(163, 'On-Site Service', 'on-site-service', '2017-07-07 02:33:26', '2017-07-07 02:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `services_venues`
--

DROP TABLE IF EXISTS `services_venues`;
CREATE TABLE `services_venues` (
  `venue_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `services_venues`
--

INSERT INTO `services_venues` (`venue_id`, `service_id`) VALUES
(1172, 1),
(1172, 5),
(1172, 8),
(1172, 11),
(1173, 11),
(1174, 1),
(1174, 11),
(1174, 163),
(1175, 6),
(1175, 11),
(1176, 1),
(1176, 11),
(1176, 164),
(1176, 165),
(1176, 166),
(1177, 6),
(1177, 11),
(1177, 164),
(1178, 11),
(1178, 163),
(1178, 164),
(1178, 165),
(1178, 166),
(1179, 1),
(1179, 6),
(1179, 11),
(1179, 164),
(1179, 165),
(1179, 166),
(1180, 1),
(1180, 8),
(1180, 11),
(1180, 164),
(1180, 165),
(1180, 166),
(1181, 1),
(1181, 6),
(1181, 11),
(1181, 164),
(1181, 165),
(1181, 166),
(1181, 168),
(1182, 6),
(1182, 11),
(1182, 169),
(1182, 170),
(1183, 5),
(1183, 8),
(1183, 11),
(1183, 164),
(1183, 165),
(1183, 166),
(1184, 6),
(1184, 11),
(1185, 168),
(1186, 8),
(1186, 11),
(1186, 164),
(1186, 166),
(1187, 1),
(1187, 5),
(1187, 8),
(1187, 11),
(1187, 164),
(1187, 165),
(1187, 166),
(1188, 11),
(1189, 11),
(1189, 166),
(1190, 11),
(1191, 1),
(1191, 11),
(1191, 166),
(1191, 167),
(1192, 1),
(1192, 8),
(1192, 11),
(1192, 164),
(1192, 165),
(1192, 166),
(1193, 1),
(1193, 11),
(1193, 164),
(1193, 165),
(1193, 167),
(1194, 11),
(1194, 164),
(1194, 165),
(1195, 11),
(1195, 164),
(1195, 165),
(1196, 11),
(1200, 1),
(1200, 8),
(1200, 11),
(1200, 164),
(1201, 1),
(1201, 11),
(1201, 164),
(1201, 165),
(1201, 166),
(1202, 6),
(1202, 11),
(1203, 11),
(1203, 164),
(1203, 165);

-- --------------------------------------------------------

--
-- Table structure for table `social_accounts`
--

DROP TABLE IF EXISTS `social_accounts`;
CREATE TABLE `social_accounts` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `reference` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `description` text,
  `link` varchar(255) NOT NULL,
  `token` varchar(500) NOT NULL,
  `token_secret` varchar(500) DEFAULT NULL,
  `token_expires` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `data` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `token_expires` datetime DEFAULT NULL,
  `api_token` varchar(255) DEFAULT NULL,
  `activation_date` datetime DEFAULT NULL,
  `secret` varchar(32) DEFAULT NULL,
  `secret_verified` tinyint(1) DEFAULT NULL,
  `tos_date` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `is_superuser` tinyint(1) NOT NULL DEFAULT '0',
  `role` varchar(255) DEFAULT 'user',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `token`, `token_expires`, `api_token`, `activation_date`, `secret`, `secret_verified`, `tos_date`, `active`, `is_superuser`, `role`, `created`, `modified`) VALUES
('3961a507-9e24-4ce9-a2a8-fc341ca6113d', 'admin', 'zhunt@yyztech.ca', '$2y$10$pSC37xI0Q8Q9wAoiXOjrjO6yspigENsrusimL4dVMApSHF0vBiosO', 'Zoltan', 'Admin', 'd908503064d1433aae83042480257357', '2017-06-29 04:47:03', NULL, NULL, NULL, NULL, '2017-06-29 03:47:03', 1, 1, 'user', '2017-06-29 03:47:03', '2017-06-29 03:47:03'),
('dd3027a6-eb56-4234-b507-f639e7e69c0b', 'zhunt', 'zhunt@zee4.com', '$2y$10$EBdIH7aK7.ncKgqWtSm5mOj.OLOUAcXTDV5KVinX5F5FYhJGYod.2', 'Zoltan', 'Hunt', 'a0a78b510e224342aea0b04e0bf4118e', '2017-06-28 19:22:18', NULL, NULL, NULL, NULL, '2017-06-28 18:22:18', 1, 0, 'user', '2017-06-28 18:22:18', '2017-06-28 18:22:18');

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

DROP TABLE IF EXISTS `venues`;
CREATE TABLE `venues` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8_bin NOT NULL,
  `sub_name` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `slug` varchar(200) COLLATE utf8_bin NOT NULL,
  `seo_title` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `seo_desc` text COLLATE utf8_bin,
  `address` text COLLATE utf8_bin,
  `display_address` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `photos` text COLLATE utf8_bin,
  `description` text COLLATE utf8_bin,
  `hours_holiday` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `hours_mon` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `hours_tue` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `hours_wed` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `hours_thu` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `hours_fri` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `hours_sat` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `hours_sun` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `province_id` int(10) UNSIGNED DEFAULT NULL,
  `city_region_id` int(10) UNSIGNED DEFAULT NULL,
  `geo_latt` float(10,6) DEFAULT NULL,
  `geo_long` float(10,6) DEFAULT NULL,
  `admin_level_2` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `flag_is_mall` tinyint(1) UNSIGNED DEFAULT NULL,
  `mall_id` int(11) UNSIGNED DEFAULT NULL,
  `chain_id` int(10) UNSIGNED DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `flag_featured` tinyint(1) UNSIGNED DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `flag_published` tinyint(1) UNSIGNED DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`id`, `name`, `sub_name`, `slug`, `seo_title`, `seo_desc`, `address`, `display_address`, `city_id`, `phone`, `website`, `photos`, `description`, `hours_holiday`, `hours_mon`, `hours_tue`, `hours_wed`, `hours_thu`, `hours_fri`, `hours_sat`, `hours_sun`, `country_id`, `province_id`, `city_region_id`, `geo_latt`, `geo_long`, `admin_level_2`, `flag_is_mall`, `mall_id`, `chain_id`, `last_update`, `flag_featured`, `rating`, `flag_published`, `created`, `modified`) VALUES
(1203, 'BeyondScreen Cellular', '', 'beyondscreen-cellular', 'BeyondScreen Cellular cell phone repair, Vancouver, BC.', 'BeyondScreen Cellular is a cell phone repair store on Broadway in Vancouver, BC.', '1830 W Broadway Vancouver , BC V6J 1Y9 Canada', '1830 W. Broadway, Vancouver, BC', 88, '{"phone":"+1-778-713-0001"}', '{"url":"http:\\/\\/www.beyondscreen.ca"}', '', 'Established in 2008, BeyondScreen Cellular is a cell phone repair store on Broadway in Vancouver, BC. Most Repairs are done between 30-45 minutes and they use only OEM and best quality parts. Some services they offer include: iPhone/iPad/ iPod, Samsung, LG, and Cell Phone Repairs\r\n\r\n                           ', '', '10:00 - 18:00', '10:00 - 18:00', '10:00 - 18:00', '10:00 - 18:00', '10:00 - 18:00', '10:00 - 16:00', 'Closed', 1, 13, 45, 49.263527, -123.146515, '', 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-07-21 04:23:33', '2017-07-21 04:23:33'),
(1200, 'Doco-Tech', '', 'doco-tech', 'Doco-Tech cell phone repairs, Burnaby ', 'Doco-Tech is a cell phone repair store at 4500 Kingsway, Burnaby, BC.', '4500 Kingsway Unit 1693 Burnaby , BC V5H 2A9 Canada', '4500 Kingsway,Unit 1693, Burnaby, BC', 90, '{"phone":"+1-604-282-7196"}', '{"url":"http:\\/\\/www.doco-fix.com"}', '', 'Established in 2005 as Times Digitals Ltd, today Doco-Tech is a cell phone repair store at 4500 Kingsway, Burnaby, BC.\r\n\r\nDoco-Tech specializes in Cell Phone Repairs, Computer Virus Removal, Computer Repair, Laptop Fans, and Laptop Charge Ports. \r\n\r\nThey also sell Cellular Accessories, Cases, Screen Protectors, and Tempered glass protector.', '', 'Closed', '12:00 - 19:00', '12:00 - 19:00', 'Closed', '12:00 - 19:00', '12:00 - 19:00', '13:00 - 18:00', 1, 13, NULL, 49.229073, -123.007057, '', 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-07-21 03:31:14', '2017-07-21 03:44:22'),
(1201, 'Apple & Berry', '', 'apple-berry-vancouver', 'Apple & Berry iPhone repairs, Vancouver', 'Apple & Berry is iPhone and cell phone repair shop in Vancouver, BC.', '4940 Joyce Street Vancouver , BC V5R 4G6 Canada', '4940 Joyce St., Vancouver, BC', 88, '{"phone":"+1-778-889-7195"}', '{"url":"http:\\/\\/www.appleandberry.ca"}', '', 'Apple & Berry is phone repair shop in Vancouver, BC Cell Phone, Tablets, broken LCD\'s, Liquid damage, Physical damage Software Issues.', '', '9:00 - 17:00', '9:00 - 17:00', '9:00 - 17:00', '9:00 - 17:00', '9:00 - 17:00', 'Closed', 'Closed', 1, 13, 41, 49.239590, -123.030136, '', 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-07-21 03:48:36', '2017-07-21 03:48:36'),
(1202, 'TechnoElectro Smart Repair', '', 'technoelectro-smart-repair', 'TechnoElectro Smart Repair, North Vancouver ', 'TechnoElectro Smart Repair is a cell phone repair store in North Vancouver, BC.', '118 E 2nd Street Unit 102 North Vancouver , BC V7L 1C3 Canada', '118 E. 2nd St., Unit 102, North Vancouver, BC', 89, '{"phone":"1-604-770-0660"}', '{"url":"http:\\/\\/www.technoelectro.ca"}', '', 'Established in 2012, TechnoElectro Smart Repair is a cell phone and computer repair store in North Vancouver, BC. They service (iPhones, Samsungs, Blackberry, Macbooks, iMac, and other makes.', '', '10:00 - 19:00', '10:00 - 19:00', '10:00 - 19:00', '10:00 - 19:00', '10:00 - 19:00', '10:00 - 19:00', '12:00 - 17:00', 1, 13, NULL, 49.233158, -123.034515, '', 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-07-21 04:09:24', '2017-07-21 04:10:51'),
(1196, 'Fast Cell Repair', '(KingsGate Mall)', 'fast-cell-repair-kingsgate', 'Fast Cell Repair, KingsGate Mall, Vancouver', 'The Fast Cell Repair store is in the KingsGate Mall, Vancouver, BC.', 'KingsGate Mall 370 E Broadway Vancouver , BC V5T 4G5 Canada', '370 E. Broadway, Vancouver, BC', 88, '{"phone":"+1-778-788-9815"}', '{"url":"http:\\/\\/www.fastcellrepair.ca"}', '', 'Established in 2015, Fast Cell Repair specializes in iPhone, Android, iPad, tablet, gadgets, and computer repairs. Fast Cell Repair offers a life-time warranty and a lowest price guarantee, 50% off on all cell phone accessories with any repair (limited time offer).\r\n\r\nThis location is in the KingsGate Mall at 370 E. Broadway, Vancouver, BC; they also currently also have 4 more locations around Vancouver.', '', '9:30 - 19:00', '9:30 - 19:00', '9:30 - 19:00', '9:30 - 21:00', '9:30 - 21:00', '9:30 - 19:00', '11:00 - 17:00', 1, 13, 38, 49.262413, -123.098175, '', 0, NULL, 5, NULL, NULL, NULL, 1, '2017-07-20 03:33:00', '2017-07-20 03:33:00'),
(1189, 'Fixfone', '', 'fixfone', 'Fixfone, Vancouver', 'Fixfone is a  iPhone repair shop in Vancouver, BC.', 'Vancouver , BC V5V 1M4 Canada', '', 88, '{"phone":"+1-604-500-2253"}', '{"url":"http:\\/\\/Fixfone.ca"}', '', 'Fixfone is a mobile iPhone repair shop in Vancouver, BC.  Established in 2016, Fixfone delivers smartphone screen and battery replacement to you, their mobile repair lab can travel to your workplace or home to swap your screen or battery on-site.  Weekend scheduling is available by appointment only.\r\n', '', '9:00 - 18:00', '9:00 - 18:00', '9:00 - 18:00', '9:00 - 18:00', '9:00 - 18:00', 'Closed', 'Closed ', 1, 13, 41, 49.253227, -123.097321, '', 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-07-17 07:13:03', '2017-07-17 07:13:03'),
(1190, 'Ace Battery', '', 'ace-battery', 'Ace Battery, Vancouver, BC', 'Ace Battery sells batteries for laptops, cameras, and phones. They also do  iPhone repairs.', '3399 Kingsway Suite 100 Vancouver , BC V5R 5K6 Canada', '3399 Kingsway Suite 100, Vancouver, BC', 88, '{"phone":"+1-604-259-3034"}', '{"url":"http:\\/\\/www.acebattery.ca"}', '', 'Located at 3399 Kingsway, Vancouver, Ace Battery sells batteries for laptops, cameras, and phones. They also do  iPhone repairs.', '', '11:00am - 6:00pm', '11:00am - 6:00pm', '11:00am - 6:00pm', '11:00am - 6:00pm', '11:00am - 6:00pm', '11:00am - 6:00pm', 'Closed', 1, 13, 41, 49.232693, -123.032562, '', 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-07-19 04:12:50', '2017-07-19 04:12:50'),
(1191, 'Mobifix', '(International Village Mall)', 'mobifix-vancouver', 'Mobifix phone repair, International Village Mall, Burnaby, BC', 'Mobifix is a phone repair store in the International Village Mall in Burnaby, BC', '5811 Beresford St. Burnaby , BC V5J 1K1 Canada', '5811 Beresford St., Burnaby, BC', 90, '{"phone":"+1-604-700-9781"}', '{"url":"http:\\/\\/www.mobifix.ca"}', '', 'Established in 2006, Mobifix is a phone repair store in the International Village Mall in Burnaby, BC.  They repair pretty much any cell phone problems including water damage, cracked LCD screens, earphone, mic, speaker problems.  Mobifix  also buys and sell used cell phones.', '', '18:30 - 20:30', 'Closed - Closed', '15:00 - 20:30', '18:30 - 20:30', '15:00 - 20:30', '13:00 - 18:30', '13:00 - 18:30', 1, 13, NULL, 49.218498, -122.978691, '', 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-07-19 04:25:44', '2017-07-19 04:25:44'),
(1192, 'Fast Cell Repair', '(International Village Mall)', 'fast-cell-repair-international-village', 'Fast Cell Repair, International Village Mall, Vancouver', 'Fast Cell Repair is a cell phone repair store in the nternational Village Mall, Vancouver, BC.', 'International Village Mall 88 W Pender Street Vancouver , BC V6B 1R3 Canada', ' 88 W. Pender St., Vancouver, BC', 88, '{"phone":"+1-604-374-5945"}', '{"url":"http:\\/\\/www.fastcellrepair.ca"}', '', 'Established in 2015, Fast Cell Repair  specializes in iPhone, Android, iPad, tablet, gadgets, and computer repairs. Fast Cell Repair offers a life-time warranty and a lowest price guarantee, 50% off on all cell phone accessories with any repair (limited time offer).\r\n\r\nThis location is at the International Village Mall, 88 W Pender St, Shop #1139 Vancouver, they also currently also have 4 more locations around Vancouver. \r\n', '', '10:00am - 8:00pm', '10:00am - 8:00pm', '10:00am - 8:00pm', '10:00am - 8:00pm', '10:00am - 8:00pm', '10:00am - 8:00pm', '10:00am - 8:00pm', 1, 13, 43, 49.280266, -123.106712, '', 0, NULL, 5, NULL, NULL, NULL, 1, '2017-07-19 04:46:49', '2017-07-19 04:46:49'),
(1193, 'Smartcell Solutions', '', 'smartcell-solutions', 'Smartcell Solutions, Vancouver, BC', 'Smartcell Solutions at 1407 Commercial Dr.,  specializes in cell phone and tablet repairs.', '1407 Commercial Drive Vancouver , BC V5L 3X8 Canada', '1407 Commercial Dr., Vancouver, BC', 88, '{"phone":"+1-778-231-6876"}', '{"url":"http:\\/\\/smartcellsolutions.ca\\/index.html"}', '', 'Established in 2016, Smartcell Solutions at 1407 Commercial Dr.,  specializes in cell phone and tablet repairs. Smartcell Solutions does cell phone unlocking, they buy and sell and cell phone accessories for various brands.\r\n\r\nSmartcell does repairs on many models of cell phones including: Apple iPhone and iPad devices, Samsung Galaxy and Note, LG, Sony, Blackberry, Oneplus, HTC, Nexus, Motorola, and Nokia.\r\n', '', '9:00 - 21:00', '9:00 - 21:00', '9:00 - 21:00', '9:00 - 21:00', '9:00 - 21:00', '9:00 - 21:00', '9:00 - 21:00', 1, 13, 44, 49.271965, -123.069893, '', 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-07-20 03:16:55', '2017-07-20 03:16:55'),
(1194, 'Canfixit', '', 'canfixit', 'Canfixit', 'Canfixit cell phone repairs is at 2323 Quebec St., in Vancouver, BC.', '211-2323 Quebec Street Vancouver , BC V5T 1R7 Canada', '2323 Quebec St. Unit 211, Vancouver, BC', 88, '{"phone":"+1-604-500-3568"}', '{"url":"https:\\/\\/canfixit.ca\\/vancouver"}', '', 'Established in 2009, Canfixit is at 2323 Quebec St., in Vancouver, BC, and they do same-day smartphone or tablet repairs.  Their parent company is Canadian Cell Parts Inc. who are the largest wholesaler for Parts in Canada, offering the highest quality premium replacement parts for phones and tablets. ', '', '10:00 - 18:00', '10:00 - 18:00', '10:00 - 18:00', '10:00 - 18:00', '10:00 - 18:00', 'Closed', 'Closed', 1, 13, 41, 49.264290, -123.103432, '', 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-07-20 03:24:01', '2017-07-20 03:24:01'),
(1195, 'Fast Cell Repair', '(City Square Shopping Centre)', 'fast-cell-repair-city-centre', 'Fast Cell Repair, City Square Shopping Centre, Vancouver', 'This Fast Cell Repair store is located in the City Square Shopping Centre, Vancouver, BC.', 'City Square Shopping Centre 555 W 12th Avenue Vancouver , BC V5Z 3X7 Canada', '555 W. 12th Ave., Vancouver, BC', 88, '{"phone":"+1-778-386-3559"}', '{"url":"http:\\/\\/www.fastcellrepair.ca"}', '', 'Established in 2015, Fast Cell Repair specializes in iPhone, Android, iPad, tablet, gadgets, and computer repairs. Fast Cell Repair offers a life-time warranty and a lowest price guarantee, 50% off on all cell phone accessories with any repair (limited time offer).\r\n\r\nThis Fast Cell Repair store is located in the City Square Shopping Centre in Vancouver, they also currently also have 4 more locations around Vancouver.', '', '10:00 - 18:00', '10:00 - 18:00', '10:00 - 18:00', '10:00 - 20:00', '10:00 - 20:00', '10:00 - 18:00', 'Closed', 1, 13, 40, 49.260933, -123.116112, '', 0, NULL, 5, NULL, NULL, NULL, 1, '2017-07-20 03:28:42', '2017-07-20 03:31:58'),
(1186, 'phone-ER Cellular Repair Centre', '', 'phone-er-cellular-repair-centre', 'phone-ER Cellular Repair Centre, Vancouver', 'phone-ER  is located at 321 Lonsdale Ave. in North Vancouver, BC.', '321 Lonsdale Avenue North Vancouver , BC V7M 2G3 Canada', '321 Lonsdale Ave., North Vancouver, BC', 89, '{"phone":"+1-604-971-5348"}', '{"url":"http:\\/\\/phone-er.ca\\/northvancouver\\/location\\/"}', '', 'Established in November 2011, phone-ER  is located at 321 Lonsdale Ave. in North Vancouver, BC.  Their repair technicians are Certified Cellular Repair Specialists, and they  always attempt to have your device repaired within  few hours, or at minimum, repaired within the same day. \r\n\r\nOver the years, theyhave fixed thousands of cellular phones with all types of cosmetic or operational issues. \r\n\r\n As well as phone repairs, phone-ER also now provide Computer Repairs and Services; such as System Tune-Up, Malware/Virus Removal, and Data Back-Up.', '', '9:30 - 18:00', '9:30 - 18:00', '9:30 - 18:00', '9:30 - 18:00', '9:30 - 18:00', '10:00 - 16:00', 'Closed', 1, 13, NULL, 49.314007, -123.077057, '', 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-07-14 05:17:53', '2017-07-14 05:17:53'),
(1187, 'CellFixx', '', 'cellfixx', 'CellFixx Phone Repair, 6446 Fraser St., Vancouver', 'CellFixx is a phone repair store at 6446 Fraser St., in Vancouver, BC. ', '6446 Fraser Street Vancouver , BC V5W 3A4 Canada', '6446 Fraser St., Vancouver , BC ', 88, '{"phone":"+1-604-484-9376"}', '{"url":"http:\\/\\/www.cellfixx.ca\\/"}', '', 'Established in 2007, CellFixx is a phone repair store at 6446 Fraser St., in Vancouver, BC.  CellFixx  uses enuine OEM repair and replacement parts, and 100% warranted repairs and replacements.\r\n\r\nSome services they do include: Cell phone repair, Tablet repair, Ipod repair, Macbook repair, Laptop repair, Cell phone unlocking, and Data recovery.', '', '11:00 - 19:00', '11:00 - 19:00', '11:00 - 19:00', '11:00 - 19:00', '11:00 - 19:00', '12:00 - 18:00', '12:00 - 18:00', 1, 13, 42, 49.226089, -123.090378, '', 0, NULL, 7, NULL, NULL, NULL, 1, '2017-07-14 05:32:34', '2017-07-14 05:35:57'),
(1188, 'iPhone MAN Repairs', '', 'iphone-man-repairs', 'iPhone MAN Repairs, Vancouver', 'iPhone MAN Repairs is a 24-hour phone repair business located at 259 Powell St., Vancouver, BC.', '259 Powell Street Suite 301 Vancouver , BC V6A 1G3 Canada', '259 Powell St. Suite 301, Vancouver, BC', 88, '{"phone":"+1-778-926-0365"}', '{"url":"http:\\/\\/iphonemanrepairs.com\\/index_en.html"}', '', 'iPhone MAN Repairs is a 24-hour phone repair business located at 259 Powell St., Vancouver, BC. iPhone MAN Repairs has been repairing phones since 2014.', '', '7:00 - 1:00', '7:00 - 1:00', '7:00 - 1:00', '7:00 - 1:00', '7:00 - 1:00', '7:00 - 1:00', '7:00 - 1:00', 1, 13, 39, 49.283260, -123.098137, '', 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-07-17 06:58:46', '2017-07-17 06:58:46'),
(1182, 'We Repair', '', 'we-repair', 'We Repair, Vancouver', 'We Repair specializes in repairs to video game consoles, PC and Mac laptops and Apple devices including  iPhones, iPad and iPod Touch devices.', '301 - 777 West 70th Ave Vancouver , BC V6P 2X2 Canada', '777 West 70th Ave., #301, Vancouver , BC', 88, '{"phone":"+1-778-316-5344"}', '{"url":"http:\\/\\/www.werepair.ca"}', '', 'Established in 2010, We Repair specializes in repairs to video game consoles, PC and Mac laptops and Apple devices including  iPhone,s iPad and iPod Touch devices.\r\n\r\nFor video game consoles they repair Wii, Wii U, PlayStation 3 and X Box 360 and others.\r\n\r\nWe Repair also offers mail-in repairs for customers outside of Vancouver, see their website for shipping information.', '', '11:00 - 19:00', '11:00 - 19:00', '11:00 - 19:00', '11:00 - 19:00', '11:00 - 19:00', '11:00 - 16:00', 'Closed', 1, 13, 40, 49.208721, -123.123489, '', 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-07-11 03:23:50', '2017-07-11 03:23:50'),
(1183, 'Pacific Laptop', '', 'pacific-laptop', 'Pacific Laptop', 'Pacific Laptop at 1687 Nanaimo St., Vancouver, BC does laptop repairs for PC and Macs a well as iPhone, and Google Android phone repairs.', '1687 Nanaimo Street Vancouver , BC V5L 4T9 Canada', '1687 Nanaimo St., Vancouver , BC', 88, '{"phone":"+1-604-568-5778"}', '{"url":"http:\\/\\/www.pacificlaptop.com"}', '', 'Established in 2011, Pacific Laptop specializes in computer repair and maintenance as well as computer sales and support. They also do phone repairs for IPads, iPhones and other mobile devices such as Android phones and tablets, Blackberry, and Windows RT. Pacific Laptop specialize in repairing all models of iPhones and iPads. Screens, dock connectors, batteries, water damage, and stuck headphone jacks.\r\n\r\nPacific Laptop\'s estimates are free and they also have a no-fix-no-pay policy which means that if for some reason they cannot repair your device, there\'s no cost to you, also there are no extra or hidden fees or hourly rates. \r\n\r\nPacific Laptop has a second location at 22209 Dewdney Trunk Rd., Maple Ridge, BC', '', '10:00 - 18:00', '10:00 - 18:00', '10:00 - 18:00', '10:00 - 18:00', '10:00 - 18:00', '10:00 - 17:00', 'Closed', 1, 13, 41, 49.269638, -123.056847, '', 0, NULL, 6, NULL, NULL, NULL, 1, '2017-07-12 03:40:41', '2017-07-12 03:41:23'),
(1184, 'Vancam Service', '', 'vancam-service', ' VanCam Service, Vancouver, BC', 'A camera repair store for over 35 years, in recent years VanCam Service has expanded their repertoire to include the repairs of phones and tablets.', '1666 8th Avenue W Vancouver , BC V6J 1V4 Canada', '', 88, '{"phone":"+1-604-736-4113"}', '{"url":"http:\\/\\/www.vancam.com"}', '', 'Located in downtown Vancouver near Broadway and Fir Street, VanCam Service has been committed to providing the highest quality of camera service-repair work to its customers for over 35 years. In recent years VanCam Service has expanded their repertoire to include the repairs of phones and tablets.\r\n\r\nSome of the services they can perform include: screen, battery, power button, home button, speaker and charging port replacements.\r\n', '', '10:00 - 18:00', '10:00 - 18:00', '10:00 - 18:00', '10:00 - 18:00', '10:00 - 18:00', '10:00 - 14:00', 'Closed - Closed', 1, 13, 40, 49.264412, -123.142609, '', 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-07-12 03:51:22', '2017-07-12 03:51:22'),
(1185, 'Best Buy Mobile', '(Pacific Centre)', 'best-buy-mobile-pacific-centre', 'Best Buy Mobile in Pacific Centre, Vancouver', 'This Best Buy Mobile phone store is in the Pacific Centre at 701 West Georgia St., Vancouver.', '701 West Georgia St., Unit D038C Vancouver , BC V7Y 1G5 Canada', '701 West Georgia St., Unit D038C, Vancouver , BC', 88, '{"phone":"+1-604-688-3310"}', '{"url":"http:\\/\\/www.bestbuy.ca"}', '', 'This Best Buy Mobile phone store is in the Pacific Centre at 701 West Georgia St., Vancouver. They sell a range of phones from all the major carriers as well as phone accessories.\r\n\r\nBest Buy Mobile carries a large selection of phone accessories, including cases, chargers, headsets, speakers, memory cards and the latest in wearable technology.\r\n', '', '10:00 - 19:00', '10:00 - 19:00', '10:00 - 21:00', '10:00 - 21:00', '10:00 - 21:00', '10:00 - 19:00', '11:00 - 18:00', 1, 13, 39, 49.284336, -123.116531, '', 0, NULL, 2, NULL, NULL, NULL, 1, '2017-07-14 05:11:25', '2017-07-14 05:11:25'),
(1180, 'Fast Cell Repair', '(il Mercato Mall)', 'fast-cell-repair', 'Fast Cell Repair Vancouver, il Mercato Mall', 'Located at the il Mercato Mall, Fast Cell Repair Vancouver fixes iPhones, Androids, Samsungs phones, cracked screen repair, cellphone repair, iPhone LCD screen repair.', '1641 Commercial Drive Vancouver , BC V5L 3X8 Canada', '1641 Commercial Dr., Unit 175,  Vancouver, BC', 88, '{"phone":"+1-604-374-5945"}', '{"url":"http:\\/\\/www.fastcellrepair.ca\\/"}', '{"image1":"http:\\/\\/res.cloudinary.com\\/yyztech-group-media\\/image\\/upload\\/v1499741501\\/oe2l4bjdgna3qsmbgvpi.jpg"}', 'Established in 2015, Fast Cell Repair  specializes in iPhone, Android, iPad, tablet, gadgets, and computer repairs. Fast Cell Repair offers a life-time warranty and a lowest price guarantee, 50% off on all cell phone accessories with any repair (limited time offer).\r\n\r\nThis location is at 1641 Commercial Drive, Vancouver, BC in the il Mercato Mall, they also currently also have 4 more locations around Vancouver. ', '', '9:30 - 20:00', '9:30 - 20:00', '9:30 - 20:00', '8:30 - 20:00', '8:30 - 20:00', '9:30 - 20:00', '11:00 - 17:00', 1, 13, 41, 49.270004, -123.069893, '', 0, NULL, 5, NULL, NULL, NULL, 1, '2017-07-11 02:44:56', '2017-07-11 02:54:33'),
(1181, 'iPhone Doctor Samsung Repair', '', 'iphone-doctor-samsung-repair', 'iPhone Doctor Samsung Repair, Vancouver', 'iPhone Doctor Samsung Repair is located at 590 Broughton St., Vancouver', '590 Broughton Street Vancouver , BC V6G 2S3 Canada', '590 Broughton St., Vancouver , BC', 88, '{"phone":"+1-604-773-0282"}', '{"url":"http:\\/\\/www.iphonedr.ca"}', '', 'Opened in 1997 as the iPhone Doctor,  iPhone Doctor Samsung Repair specialize In Apple, Samsung, LG, HTC, and Sony cell phone repairs whether it\'s water damage, cracked screen, battery replacement, and more.\r\n\r\nThey repair any cellular device in a timely fashion, most of their repairs they are able to do on the spot while you wait, please make an appointment by text or call first. Repairs include Parts, Labour, and 60 day warranty.\r\n\r\nAs well as a cell phone repair service, they also have an online store that sells parts for Apple and Samsung devices, along with other products.', '', '9:00 - 23:00', '9:00 - 23:00', '9:00 - 23:00', '9:00 - 23:00', '9:00 - 23:00', '9:00 - 23:00', '9:00 - 23:00', 1, 13, 39, 49.289433, -123.127647, '', 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-07-11 03:08:57', '2017-07-11 03:10:22'),
(1177, 'Express Stop Iphone Repair', '(Denman Place Mall)', 'express-stop-iphone-repair', 'Express Stop Cellphone and iPhone Repair in Vancouver', 'Express Stop is an iPhone and cellphone repair stand located in downtown Vancouver, inside Denman Place Mall.', '1030 Denman Street Vancouver , BC V6G 2M6 Canada', '1030 Denman St., Vancouver (inside Denman Place Mall)', 88, '{"phone":"+1-778-323-6209"}', '{"url":"http:\\/\\/www.expressstopiphonerepair.com"}', '', 'Established in 2013, Express Stop repairs all kind of cell-phones including iPhones, iPods, iPads, Samsung, HTC, LG, Nokia, and Blackberry.  They also sell  phone parts and accessories. Express Stop are located in downtown Vancouver, inside the Denman Place Mall.', '', '10:00 - 18:00', '10:00 - 18:00', '10:00 - 18:00', '10:00 - 18:00', '10:00 - 17:00', '11:00 - 17:00', '12:00 - 16:00', 1, 13, 39, 49.288731, -123.138199, '', 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-07-09 20:12:35', '2017-07-09 20:12:35'),
(1178, 'iRepair', '(International Village Mall)', 'irepair-vancouver', 'iRepair Vancouver, 88 W Pender Street, International Village Mall', 'This iRepair location is in downtown Vancouver in the International Village Mall. They repairs iPhones, Macs, iPads, and Android devices. ', '88 W Pender Street Unit 2115 Vancouver , BC V6B 6N9 Canada', '88 W. Pender St., Unit 2115, Vancouver', 88, '{"phone":"+1-778-987-2571"}', '{"url":"https:\\/\\/irepair.ca\\/pages\\/vancouver"}', '', 'In business since 2005, this iRepair location is located in downtown Vancouver in the International Village Mall. They specialize in Apple repairs and  fix broken iPhone, iPad, iPod, or Macs. If you can\'t make it downtown,  iRepair Mobile can come to your home or office.\r\n\r\niRepair.ca started in 2004 in Toronto as a small mail-order business, since 2004 they\'ve expanded to become the  largest iPhone and iPod repair company in Canada with 7 locations in Toronto, Vancouver, and Victoria, BC.', '', '11:00 - 19:00', '11:00 - 19:00', '11:00 - 19:00', '11:00 - 19:00', '11:00 - 19:00', '11:00 - 19:00', 'Closed', 1, 13, 39, 49.280251, -123.106766, '', 0, NULL, 4, NULL, NULL, NULL, 1, '2017-07-09 20:22:29', '2017-07-09 20:24:27'),
(1179, 'VanCell', '', 'vancell', 'VanCell Phone Repairs, Vancouver B.C.', 'VanCell Phone Repairs is located  on the corner of Rupert St. and E. 29th Ave., in east Vancouver, BC.', '3292 E 29th Avenue Vancouver , BC V5R 1W6 Canada', '3292 E. 29th Ave., Vancouver', 88, '{"phone":"+1-778-859-3565"}', '{"url":"http:\\/\\/vancell.ca"}', '', 'VanCell began repairing phones for corporate clients back in 2007, and soon after expanded into a retail store with walk in repairs. Today they are located in the Renfrew-Collingwood neighbourhood, in the retail building on the corner of Rupert St. and East 29th Ave. next to the Babito Greek Cafe. There is free parking available. If you\'re taking transit, they\'re a 10 minute walk from the 29th Ave. Skytrain Station or Joyce Station.\r\n\r\nVanCell repairs many cell Phone models including iPhones, iPads, iPods, Samsung, LG, HTC, Sony, Motorola, Nokia, and Blackberry. They do all kinds of repairs from cracked screens, water damage, speakers, and housing damage. Unlocking phones is also available. They offer free estimates and technicians are certified and use original parts when servicing your smartphone.\r\n\r\nIf you choose to wait for your repair, they have a seating area with magazines and free WiFi available. ', '', '11:00 - 18:00', '11:00 - 18:00', '11:00 - 18:00', '11:00 - 18:00', '11:00 - 18:00', '10:00 - 14:00', 'Closed - Closed', 1, 13, 41, 49.244350, -123.034660, '', 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-07-09 20:51:39', '2017-07-09 20:54:00'),
(1175, 'Cell Clinic Vancouver', '', 'cell-clinic-vancouver', 'Cell Clinic Vancouver', 'Cell Clinic Vancouver & Surrey Cell Phone Repair iPhone iPad', '935 Seymour Street Vancouver , BC V6B 3M1 Canada', '935 Seymour St., Vancouver ', 88, '{"phone":"+1-604-558-2424"}', '{"url":"http:\\/\\/www.cellclinic.ca"}', '{"image1":"http:\\/\\/res.cloudinary.com\\/yyztech-group-media\\/image\\/upload\\/v1499396009\\/h7semtgzuobjonley1lj.jpg"}', 'Cell Clinic  specializes in Apple and Android cell phone repair and phone unlocking, plus screen repairs on all major cell phones and tablets and iPads. They also offer a free diagnosis on all water damaged mobile devices. \r\n\r\nCell Clinic was established in 2014 at the 935 Seymour Street location where it quickly earned a solid reputation for quality repairs. Cell Clinic opened a second store in 2017, with the addition of Cell Clinic Surrey BC. \r\n\r\nThey deliver a "small town attitude" toward customer service excellence, with a focus on providing quality repairs on cell phones and iPad tablets, plus a buy and sell mobile device program. They also offer phone unlocking for both iPhones and Android devices, as well as a wide variety of cell phone and tablet accessories. in the store showroom.\r\n', '', '9:00 - 18:00', '9:00 - 18:00', '9:00 - 18:00', '9:00 - 18:00', '9:00 - 18:00', '9:00 - 18:00', 'Closed - Closed', 1, 13, 39, 49.279202, -123.121552, '', 0, NULL, 3, NULL, NULL, NULL, 1, '2017-07-07 02:51:14', '2017-07-10 02:48:55'),
(1176, 'BK iPhone Repairs', '', 'bk-iphone-repairs', 'BK iPhone Repairs, iPhone Repair Vancouver', 'BK iPhone Repairs is an phone repair store in Vancouver, near Cambie and  Broadway, in business for over 7 years.', '500 W 10th Avenue Suite 713 Vancouver , BC V5Z 4P1 Canada', '500 W. 10th Ave., Suit 713, Vancouver', 88, '{"phone":"+1-604-338-2349"}', '{"url":"http:\\/\\/www.bkiphonerepairs.com"}', '', 'Established in 2009, BK iPhone Repairs does repairs of  iPhones, Androids (Samsung, HTC, LG and others), iPads, and Macs. They\'re located  on the corner of 10th Ave. and Cambie St, a block block south of Broadway\'s Skytrain stop.\r\n\r\nYou can call or text to get a quote over the phone. Most repairs take about 30 minutes and you can either drop your device off for pick up, or you can see your phone repaired in front of you.  In most cases same day service is available,  there are  8-10 appointments available daily, so please call to book an appointment.\r\n\r\nBK iPhone Repairs offers a large selection of original OEM parts and a 6-month warranty on repairs.', '', '9:00 - 18:00', '9:00 - 18:00', '9:00 - 18:00', 'Closed - Closed', '9:00 - 18:00', '10:00 - 15:00', '10:00 - 15:00', 1, 13, 40, 49.262035, -123.115738, '', 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-07-09 19:40:50', '2017-07-09 19:54:11'),
(1174, 'iRevive Mobile', '', 'irevive-mobile', ' iRevive Mobile, Vancouver, Canada', ' iRevive Mobile is located in Vancouver\'s Mount Pleasant neighbourhood, offers onsite service for iPhone, Android devices.', '245 W Broadway Vancouver , BC V5Y 1P5 Canada', '245 W. Broadway, Vancouver', 88, '{"phone":"+1-778-804-8743"}', '{"url":"http:\\/\\/www.irevivemobile.com"}', '{"image1":"http:\\/\\/res.cloudinary.com\\/yyztech-group-media\\/image\\/upload\\/v1499394880\\/qekpxiy5kvrpd1aciywx.jpg"}', 'Located in Vancouver\'s Mount Pleasant neighbourhood, iRevive Mobile specializes in the repair of Apple,  Android/Samsung cell phones and other touch screen devices.  Established in 2010 with the goal of providing the Greater Vancouver area with the most honest, reliable and fair-priced repairs in the city.  They are a local, home-grown operation and value their customer service above all else.\r\n\r\n\r\niRevive offers at-your-location service at no extra charge and proudly offer a 180-day guarantee on all Apple parts installed, and a 90 day guarantee on Androids devices. ', '', '10:00 - 18:00', '10:00 - 18:00', '10:00 - 18:00', '10:00 - 18:00', '10:00 - 18:00', '10:00 - 18:00', '12:00 - 17:00', 1, 13, 38, 49.263275, -123.110550, '', 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-07-07 02:33:59', '2017-07-07 02:34:43'),
(1173, 'Ming Wireless', '', 'ming-wireless', 'Ming Wireless, 250 Dundas St., Toronto', 'Ming Wireless is a one-stop shop for all your mobile device repair needs at 250 Dundas St., Toronto', '250 Dundas Street W Unit 106 Toronto , ON M5T 2Z9 Canada', '250 Dundas St. W., Unit 106, Toronto', 1, '{"phone":"1-416-979-8848"}', '{"url":"http:\\/\\/www.mingwireless.com"}', '{"image1":"http:\\/\\/res.cloudinary.com\\/yyztech-group-media\\/image\\/upload\\/v1499225384\\/fq3ck7hnw0kw79sjynel.jpg"}', 'Located at 250 Dundas St. W, in downtown Toronto, Ming Wireless is a one-stop shop for all your mobile device repair needs.  Ming Wireless has been serving Toronto since 2004. \r\n\r\nThey also offer mail-in repairs if you can not make it to their store. Shop their online stores to find great deals on the most popular phones, cases, chargers, and accessories. ', '', '10:00 - 19:00', '10:00 - 19:00', '10:00 - 19:00', '10:00 - 19:00', '10:00 - 19:00', '10:30 - 18:00', '11:00 - 18:00', 1, 1, 3, 43.654812, -79.389656, '', 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-07-05 03:07:21', '2017-07-05 03:29:47'),
(1172, 'iRepair.ca', '', 'irepair-ca', 'iRepair.ca at 494 College Street, Toronto', 'iRepair is a Apple phone repair store located at 494 College St., Toronto, near Bathurst.', '494 College Street Toronto , ON M6G 1A4 Canada', '494 College St., Toronto', 1, '{"phone":"1-416-324-2764"}', '{"url":"http:\\/\\/www.irepair.ca"}', '{"image1":"http:\\/\\/res.cloudinary.com\\/yyztech-group-media\\/image\\/upload\\/v1499225400\\/ogivitewjydpy1a8yczd.jpg"}', 'iRepair is a Apple phone repair store located at 494 College St., Toronto, near Bathurst. They specialize in repairs to iPhone, iPod, iPad and Macbooks. They service all Makes and Models and offer unlocking  of your Smartphone. \r\n\r\niRepair has been in business for over 10 years  and offer you the same great service at 8 locations now.', '', '11:00 - 19:00', '11:00 - 19:00', '11:00 - 19:00', '11:00 - 19:00', '11:00 - 19:00', '11:00 - 18:00', 'Closed - Closed', 1, 1, 3, 43.656273, -79.409821, '', 0, NULL, NULL, NULL, NULL, NULL, 1, '2017-07-05 03:02:56', '2017-07-05 03:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `venue_types`
--

DROP TABLE IF EXISTS `venue_types`;
CREATE TABLE `venue_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `venue_types`
--

INSERT INTO `venue_types` (`id`, `name`, `slug`, `created`, `modified`) VALUES
(1, 'Store', 'store', '2017-02-20 20:40:09', '2017-02-20 20:40:09'),
(2, 'Restaurant', 'restaurant', '2017-02-20 20:40:25', '2017-02-20 21:03:13'),
(3, 'Banquet hall', 'banquet-hall', '2017-02-20 20:43:50', '2017-02-20 20:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `venue_types_venues`
--

DROP TABLE IF EXISTS `venue_types_venues`;
CREATE TABLE `venue_types_venues` (
  `venue_id` int(11) NOT NULL,
  `venue_type_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `venue_types_venues`
--

INSERT INTO `venue_types_venues` (`venue_id`, `venue_type_id`) VALUES
(1172, 1),
(1173, 1),
(1174, 1),
(1175, 1),
(1176, 1),
(1177, 1),
(1178, 1),
(1179, 1),
(1180, 1),
(1181, 1),
(1182, 1),
(1183, 1),
(1184, 1),
(1185, 1),
(1186, 1),
(1187, 1),
(1188, 1),
(1189, 1),
(1190, 1),
(1191, 1),
(1192, 1),
(1193, 1),
(1194, 1),
(1195, 1),
(1196, 1),
(1200, 1),
(1201, 1),
(1202, 1),
(1203, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `amenities_venues`
--
ALTER TABLE `amenities_venues`
  ADD PRIMARY KEY (`venue_id`,`amenity_id`),
  ADD KEY `amenity_key` (`amenity_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `brands_venues`
--
ALTER TABLE `brands_venues`
  ADD PRIMARY KEY (`venue_id`,`brand_id`),
  ADD KEY `brand_key` (`brand_id`);

--
-- Indexes for table `cake_d_c_users_phinxlog`
--
ALTER TABLE `cake_d_c_users_phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `chains`
--
ALTER TABLE `chains`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_regions`
--
ALTER TABLE `city_regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cuisines`
--
ALTER TABLE `cuisines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `cuisines_venues`
--
ALTER TABLE `cuisines_venues`
  ADD PRIMARY KEY (`venue_id`,`cuisine_id`),
  ADD KEY `cuisine_key` (`cuisine_id`);

--
-- Indexes for table `landing_pages`
--
ALTER TABLE `landing_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages_venues`
--
ALTER TABLE `languages_venues`
  ADD PRIMARY KEY (`venue_id`,`language_id`),
  ADD KEY `language_key` (`language_id`);

--
-- Indexes for table `malls`
--
ALTER TABLE `malls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `products_venues`
--
ALTER TABLE `products_venues`
  ADD PRIMARY KEY (`venue_id`,`product_id`),
  ADD KEY `product_key` (`product_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `services_venues`
--
ALTER TABLE `services_venues`
  ADD PRIMARY KEY (`venue_id`,`service_id`),
  ADD KEY `service_key` (`service_id`);

--
-- Indexes for table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venue_types`
--
ALTER TABLE `venue_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `venue_types_venues`
--
ALTER TABLE `venue_types_venues`
  ADD PRIMARY KEY (`venue_id`,`venue_type_id`),
  ADD KEY `venue_type_key` (`venue_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `chains`
--
ALTER TABLE `chains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `city_regions`
--
ALTER TABLE `city_regions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cuisines`
--
ALTER TABLE `cuisines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `landing_pages`
--
ALTER TABLE `landing_pages`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `malls`
--
ALTER TABLE `malls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;
--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;
--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1204;
--
-- AUTO_INCREMENT for table `venue_types`
--
ALTER TABLE `venue_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD CONSTRAINT `social_accounts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
