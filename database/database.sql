-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 19, 2024 at 06:07 AM
-- Server version: 8.3.0
-- PHP Version: 8.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `landlord_saas`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint UNSIGNED NOT NULL,
  `main_title` text COLLATE utf8mb4_unicode_ci,
  `hero_desc` text COLLATE utf8mb4_unicode_ci,
  `title_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_one` longtext COLLATE utf8mb4_unicode_ci,
  `image_id_one` bigint UNSIGNED NOT NULL,
  `title_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_two` longtext COLLATE utf8mb4_unicode_ci,
  `image_id_two` bigint UNSIGNED NOT NULL,
  `title_three` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_three` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_three` longtext COLLATE utf8mb4_unicode_ci,
  `image_id_three` bigint UNSIGNED NOT NULL,
  `title_four` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_four` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_four` longtext COLLATE utf8mb4_unicode_ci,
  `image_id_four` bigint UNSIGNED NOT NULL,
  `title_five` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_five` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_five` longtext COLLATE utf8mb4_unicode_ci,
  `download_app_link` longtext COLLATE utf8mb4_unicode_ci,
  `image_id_five` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `main_title`, `hero_desc`, `title_one`, `subtitle_one`, `desc_one`, `image_id_one`, `title_two`, `subtitle_two`, `desc_two`, `image_id_two`, `title_three`, `subtitle_three`, `desc_three`, `image_id_three`, `title_four`, `subtitle_four`, `desc_four`, `image_id_four`, `title_five`, `subtitle_five`, `desc_five`, `download_app_link`, `image_id_five`, `created_at`, `updated_at`) VALUES
(1, 'Search <span class=\"text-primary text-capitalize font-800 title-border\">properties</span> for sale and for rent in World', 'We are a team of dedicated professionals whose goal is to provide high-end real estate services to our clients. Our company’s goal is to offer personalized solutions that meet the unique requirements of each customer. Whether you are looking to buy, sell, or rent a property, we are present to help you through every step of the way.\n                    Our highly experienced agents have an in-depth understanding of the local real estate market and are geared with the late', 'ABOUT US', 'Welcome to our nestkeeper!', '<p class=\"mb_15\">We are a team of dedicated professionals whose goal is to provide high-end real estate services to our clients. Our company’s goal is to offer personalized solutions that meet the unique requirements of each customer. Whether you are looking to buy, sell, or rent a property, we are present to help you through every step of the way.</p>\n                <p class=\"mb_15\">Our highly experienced agents have an in-depth understanding of the local real estate market and are geared with the latest tools and technology to guarantee that you get the best possible product. We pride ourselves on our cordial customer service and try our absolute best to make each and every transaction a seamless experience.</p>\n                <p class=\"mb_15\">At our Real Estate Company, we trust that integrity, empathy and transparency are key ingredients to building robust and long-lasting relationships with our clients. We are fully committed to providing open communication and full transparency throughout the entire procedure to ensure that you are well informed and empowered to make the best decisions for your unique situation.</p>\n                <p class=\"mb_15\">Our clients\' trust is precious to us and we understand that buying or selling a property is a significant decision. That\'s why we take sufficient time to listen diligently to your needs and goals, and we work relentlessly to exceed your expectations.</p>\n                <p>Thank you for choosing nestkeeper as your Real Estate Company. We look forward to providing top-notch service and building the foundation to achieve your real estate goals.</p>', 33, 'OUR MISSION', 'Our mission is to Build a Strong Foundation For Your Life.', '<p class=\"mb_15\">Our mission is to provide the best real estate services to our clients, tuned to meet the specifications of each client. We are more than just committed to establishing  a smooth and stress-free experience for our beloved clients, whether they are buying, selling, or renting a property.</p>\n                <p class=\"mb_15\">We aim to be the go-to partner for all of our clients\' real estate needs, providing professional advice, guidance, and support through each and every step of the way. Our intention is to be the most reputed and reliable Real Estate Company out there. </p>', 34, 'Our vision', 'Our vision is to establish ourselves as the most trusted and reliable Real Estate Company. ', '<p class=\"mb_15\">We eagerly believe that every client is unique and deserves personalized solutions catered to meet their specifications and demands. Additionally, we intend to continue to innovate and stay ahead of the curve in the ever-evolving real estate industry, providing the latest technology and tools to boost our clients\' experience. </p>', 35, 'Easy And Simple', 'And these are our principles', '<ul>\n                <li>Client-centric approach: We put our clients\' needs first and strive to provide them with personalized solutions that meet their unique requirements.</li>\n                <li>Professionalism: We conduct ourselves with the highest level of professionalism, treating our clients, colleagues, and partners with respect and integrity.</li>\n                <li>Communication: We believe that open communication is key to building solid and long-lasting relationships with our clients. We keep our clients informed every step of the way, ensuring that they are empowered to make rational decisions.</li>\n                <li>Transparency: We are transparent in our business practices, providing our clients with full disclosure of all relevant information related to their transactions.</li>\n                <li>Efficiency: We understand that our clients\' time is valuable, and we strive to provide them with efficient and effective services, minimizing delays and maximizing results.</li>\n                <li>Continuous improvement: We are committed to continuous learning and improvement, staying up-to-date with the latest industry trends and technologies, and continuously enhancing our skills and knowledge to better serve our clients.</li>\n                <li>Community involvement: We believe in giving back to the community, and we actively participate in charitable activities and organizations that align with our values and mission.</li>\n                   </ul>\n                   <p>In summary, our Real Estate Company\'s principles are client-centric approach, professionalism, communication, transparency, efficiency, continuous improvement, and community involvement.</p>\n                   ', 36, 'DOWNLOAD APP', 'Find your property solution anytime, anywhere', 'Explore your future home with detailed videos', '#', 37, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `account_category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` decimal(8,2) NOT NULL DEFAULT '0.00',
  `is_default` tinyint NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_by` bigint UNSIGNED NOT NULL,
  `updated_by` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_categories`
--

CREATE TABLE `account_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('debit','credit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_by` bigint UNSIGNED NOT NULL,
  `updated_by` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `property_creator_id` bigint UNSIGNED DEFAULT NULL,
  `advertisement_type` tinyint NOT NULL DEFAULT '1' COMMENT '1:Rent;2:Sell;3:mortgage;4:Lease;5:caretaker;',
  `booking_amount` double DEFAULT NULL,
  `rent_amount` double DEFAULT NULL,
  `rent_type` tinyint DEFAULT NULL COMMENT '1 for monthly, 2 for yearly',
  `rent_start_date` date DEFAULT NULL,
  `rent_end_date` date DEFAULT NULL,
  `max_member` int DEFAULT NULL,
  `mortgage_amount` decimal(8,2) DEFAULT NULL,
  `mortgage_duration` int DEFAULT NULL,
  `lease_amount` decimal(8,2) DEFAULT NULL,
  `lease_duration` int DEFAULT NULL,
  `caretaker_duration` int DEFAULT NULL,
  `sell_amount` double DEFAULT NULL,
  `sell_start_date` date DEFAULT NULL,
  `negotiable` tinyint NOT NULL DEFAULT '1' COMMENT '1 for negotiable, 0 for not negotiable',
  `status` tinyint NOT NULL DEFAULT '1',
  `approval_status` tinyint NOT NULL DEFAULT '2',
  `approved_by` bigint UNSIGNED DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `terms_condition` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_type` enum('letting','sales') COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `backup_logs`
--

CREATE TABLE `backup_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `balances`
--

CREATE TABLE `balances` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `billing_addresses`
--

CREATE TABLE `billing_addresses` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint UNSIGNED DEFAULT NULL,
  `postal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` bigint UNSIGNED DEFAULT NULL,
  `district_id` bigint UNSIGNED DEFAULT NULL,
  `upazila_id` bigint UNSIGNED DEFAULT NULL,
  `terms_and_condition` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `tenant_id` bigint UNSIGNED NOT NULL,
  `due_date` date NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `payment_status` enum('pending','paid','unpaid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `status` tinyint NOT NULL DEFAULT '1',
  `fine_amount` decimal(8,2) DEFAULT '0.00',
  `total_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `created_by` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `case_study_id` bigint UNSIGNED DEFAULT NULL,
  `image_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_reviews`
--

CREATE TABLE `blog_reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `blog_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ratings` int NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_models`
--

CREATE TABLE `business_models` (
  `id` bigint UNSIGNED NOT NULL,
  `keypoint` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` bigint UNSIGNED DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `tenant_id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `advertisement_id` bigint UNSIGNED NOT NULL,
  `discount_amount` decimal(16,0) DEFAULT NULL,
  `amount` decimal(16,0) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `type` tinyint DEFAULT NULL,
  `durations` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `case_studies`
--

CREATE TABLE `case_studies` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_id` bigint UNSIGNED NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('income','expense') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` bigint UNSIGNED DEFAULT NULL,
  `icon_id` bigint UNSIGNED DEFAULT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `subtitle`, `type`, `slug`, `image_id`, `icon_id`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Full-time', 'Salary', 'income', 'full-time', NULL, NULL, NULL, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(2, 'Part-time', 'Salary', 'income', 'part-time', NULL, NULL, NULL, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(3, 'Writing', 'Freelance', 'income', 'writing', NULL, NULL, NULL, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(4, 'Graphic design', 'Freelance', 'income', 'graphic-design', NULL, NULL, NULL, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(5, 'Stocks', 'Investment', 'income', 'stocks', NULL, NULL, NULL, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(6, 'Real estate', 'Investment', 'income', 'real-estate', NULL, NULL, NULL, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(7, 'Food', NULL, 'expense', 'food', NULL, NULL, NULL, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(8, 'Groceries', 'Food', 'expense', 'groceries', NULL, NULL, 7, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(9, 'Eating Out', 'Food', 'expense', 'eating-out', NULL, NULL, 7, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(10, 'Transportation', NULL, 'expense', 'transportation', NULL, NULL, NULL, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(11, 'Gas', 'Transportation', 'expense', 'gas', NULL, NULL, 10, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(12, 'Public Transportation', 'Transportation', 'expense', 'public-transportation', NULL, NULL, 10, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(13, 'Car Maintenance', 'Transportation', 'expense', 'car-maintenance', NULL, NULL, 10, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(14, 'Housing', NULL, 'expense', 'housing', NULL, NULL, NULL, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(15, 'Rent', 'Housing', 'expense', 'rent', NULL, NULL, 14, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(16, 'Mortgage', 'Housing', 'expense', 'mortgage', NULL, NULL, 14, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(17, 'Utilities', 'Housing', 'expense', 'utilities', NULL, NULL, 14, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(18, 'Entertainment', NULL, 'expense', 'entertainment', NULL, NULL, NULL, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(19, 'Movies', 'Entertainment', 'expense', 'movies', NULL, NULL, 18, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(20, 'Concerts', 'Entertainment', 'expense', 'concerts', NULL, NULL, 18, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(21, 'Sports', 'Entertainment', 'expense', 'sports', NULL, NULL, 18, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(22, 'Personal Care', NULL, 'expense', 'personal-care', NULL, NULL, NULL, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(23, 'Haircut', 'Personal Care', 'expense', 'haircut', NULL, NULL, 22, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(24, 'Toiletries', 'Personal Care', 'expense', 'toiletries', NULL, NULL, 22, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `category_wise_document_templates`
--

CREATE TABLE `category_wise_document_templates` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placeholder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'image',
  `category_id` int DEFAULT NULL,
  `is_required` tinyint(1) NOT NULL DEFAULT '1',
  `active_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint NOT NULL,
  `favorite_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_messages`
--

CREATE TABLE `ch_messages` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint NOT NULL,
  `to_id` bigint NOT NULL,
  `body` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` bigint UNSIGNED NOT NULL,
  `state_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint UNSIGNED NOT NULL,
  `country_code` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `flag` tinyint NOT NULL DEFAULT '1',
  `wikiDataId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Rapid API GeoDB Cities'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `state_id`, `state_code`, `country_id`, `country_code`, `latitude`, `longitude`, `created_at`, `updated_at`, `flag`, `wikiDataId`) VALUES
(57, 'B─ümy─ün', 3872, 'BAM', 1, 'AF', 34.82156000, 67.82734000, '2019-10-01 17:58:06', '2023-09-01 10:03:11', 1, NULL),
(70, 'Gereshk', 3873, 'HEL', 1, 'AF', 31.82089000, 64.57005000, '2019-10-01 17:58:06', '2023-09-01 10:03:11', 1, NULL),
(71, 'Ghazni', 3870, 'GHA', 1, 'AF', 33.55391000, 68.42096000, '2019-10-01 17:58:06', '2023-09-01 10:03:11', 1, NULL),
(72, 'Ghormach', 3871, 'BDG', 1, 'AF', 35.73062000, 63.78264000, '2019-10-01 17:58:06', '2023-09-01 10:03:11', 1, NULL),
(93, 'Lashkar G─üh', 3873, 'HEL', 1, 'AF', 31.59382000, 64.37161000, '2019-10-01 17:58:06', '2023-09-01 10:03:11', 1, NULL),
(95, 'Markaz-e ß©¿uk┼½mat-e Darw─ôsh─ün', 3873, 'HEL', 1, 'AF', 31.13231000, 64.19340000, '2019-10-01 17:58:06', '2023-09-01 10:03:11', 1, NULL),
(104, 'Panj─üb', 3872, 'BAM', 1, 'AF', 34.38795000, 67.02327000, '2019-10-01 17:58:06', '2023-09-01 10:03:11', 1, NULL),
(108, 'Qala i Naw', 3871, 'BDG', 1, 'AF', 34.98735000, 63.12891000, '2019-10-01 17:58:06', '2023-09-01 10:03:11', 1, NULL),
(118, 'Sang─½n', 3873, 'HEL', 1, 'AF', 32.07275000, 64.83590000, '2019-10-01 17:58:06', '2023-09-01 10:03:11', 1, NULL),
(141, 'ÔÇÿAl─üqahd─ür─½ D─½sh┼½', 3873, 'HEL', 1, 'AF', 30.43206000, 63.29802000, '2019-10-01 17:58:06', '2023-09-01 10:03:11', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `committees`
--

CREATE TABLE `committees` (
  `id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_member` int DEFAULT '0',
  `total_admin` int DEFAULT '0',
  `logo_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `committee_members`
--

CREATE TABLE `committee_members` (
  `id` bigint UNSIGNED NOT NULL,
  `committee_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `member_type` enum('is_president','is_admin','is_manager','is_general') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'is_general',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso3` char(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numeric_code` char(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso2` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonecode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capital` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tld` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `native` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subregion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezones` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `translations` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `emoji` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emojiU` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `flag` tinyint NOT NULL DEFAULT '1',
  `status` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `iso3`, `numeric_code`, `iso2`, `phonecode`, `capital`, `currency`, `currency_name`, `currency_symbol`, `tld`, `native`, `region`, `subregion`, `timezones`, `translations`, `latitude`, `longitude`, `emoji`, `emojiU`, `created_at`, `updated_at`, `flag`, `status`) VALUES
(1, 'American Samoa', 'ASM', '016', 'AS', '+1-684', 'Pago Pago', 'USD', 'US Dollar', '$', '.as', 'American Samoa', 'Oceania', 'Polynesia', '[{\"zoneName\":\"Pacific/Pago_Pago\",\"gmtOffset\":-39600,\"gmtOffsetName\":\"UTC-11:00\",\"abbreviation\":\"SST\",\"tzName\":\"Samoa Standard Time\"}]', '{\"kr\":\"아메리칸사모아\",\"pt-BR\":\"Samoa Americana\",\"pt\":\"Samoa Americana\",\"nl\":\"Amerikaans Samoa\",\"hr\":\"Američka Samoa\",\"fa\":\"ساموآی آمریکا\",\"de\":\"Amerikanisch-Samoa\",\"es\":\"Samoa Americana\",\"fr\":\"Samoa américaines\",\"ja\":\"アメリカ領サモア\",\"it\":\"Samoa Americane\",\"cn\":\"美属萨摩亚\",\"tr\":\"Amerikan Samoasi\"}', -14.33333333, -170.00000000, '🇦🇸', 'U+1F1E6 U+1F1F8', '2018-07-20 13:11:03', '2022-05-21 03:06:00', 1, 1),
(2, 'Aland Islands', 'ALA', '248', 'AX', '+358-18', 'Mariehamn', 'EUR', 'Euro', '€', '.ax', 'Åland', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Europe/Mariehamn\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"올란드 제도\",\"pt-BR\":\"Ilhas de Aland\",\"pt\":\"Ilhas de Aland\",\"nl\":\"Ålandeilanden\",\"hr\":\"Ålandski otoci\",\"fa\":\"جزایر الند\",\"de\":\"Åland\",\"es\":\"Alandia\",\"fr\":\"Åland\",\"ja\":\"オーランド諸島\",\"it\":\"Isole Aland\",\"cn\":\"奥兰群岛\",\"tr\":\"Åland Adalari\"}', 60.11666700, 19.90000000, '🇦🇽', 'U+1F1E6 U+1F1FD', '2018-07-20 13:11:03', '2022-05-21 03:06:00', 1, 1),
(3, 'Albania', 'ALB', '008', 'AL', '355', 'Tirana', 'ALL', 'Albanian lek', 'Lek', '.al', 'Shqipëria', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Europe/Tirane\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"알바니아\",\"pt-BR\":\"Albânia\",\"pt\":\"Albânia\",\"nl\":\"Albanië\",\"hr\":\"Albanija\",\"fa\":\"آلبانی\",\"de\":\"Albanien\",\"es\":\"Albania\",\"fr\":\"Albanie\",\"ja\":\"アルバニア\",\"it\":\"Albania\",\"cn\":\"阿尔巴尼亚\",\"tr\":\"Arnavutluk\"}', 41.00000000, 20.00000000, '🇦🇱', 'U+1F1E6 U+1F1F1', '2018-07-20 13:11:03', '2022-05-21 03:06:00', 1, 1),
(4, 'Algeria', 'DZA', '012', 'DZ', '213', 'Algiers', 'DZD', 'Algerian dinar', 'دج', '.dz', 'الجزائر', 'Africa', 'Northern Africa', '[{\"zoneName\":\"Africa/Algiers\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"알제리\",\"pt-BR\":\"Argélia\",\"pt\":\"Argélia\",\"nl\":\"Algerije\",\"hr\":\"Alžir\",\"fa\":\"الجزایر\",\"de\":\"Algerien\",\"es\":\"Argelia\",\"fr\":\"Algérie\",\"ja\":\"アルジェリア\",\"it\":\"Algeria\",\"cn\":\"阿尔及利亚\",\"tr\":\"Cezayir\"}', 28.00000000, 3.00000000, '🇩🇿', 'U+1F1E9 U+1F1FF', '2018-07-20 13:11:03', '2022-05-21 03:06:00', 1, 1),
(5, 'Afghanistan', 'AFG', '004', 'AF', '93', 'Kabul', 'AFN', 'Afghan afghani', '؋', '.af', 'افغانستان', 'Asia', 'Southern Asia', '[{\"zoneName\":\"Asia/Kabul\",\"gmtOffset\":16200,\"gmtOffsetName\":\"UTC+04:30\",\"abbreviation\":\"AFT\",\"tzName\":\"Afghanistan Time\"}]', '{\"kr\":\"아프가니스탄\",\"pt-BR\":\"Afeganistão\",\"pt\":\"Afeganistão\",\"nl\":\"Afghanistan\",\"hr\":\"Afganistan\",\"fa\":\"افغانستان\",\"de\":\"Afghanistan\",\"es\":\"Afganistán\",\"fr\":\"Afghanistan\",\"ja\":\"アフガニスタン\",\"it\":\"Afghanistan\",\"cn\":\"阿富汗\",\"tr\":\"Afganistan\"}', 33.00000000, 65.00000000, '🇦🇫', 'U+1F1E6 U+1F1EB', '2018-07-20 13:11:03', '2022-05-21 03:06:00', 1, 1),
(6, 'Andorra', 'AND', '020', 'AD', '376', 'Andorra la Vella', 'EUR', 'Euro', '€', '.ad', 'Andorra', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Europe/Andorra\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"안도라\",\"pt-BR\":\"Andorra\",\"pt\":\"Andorra\",\"nl\":\"Andorra\",\"hr\":\"Andora\",\"fa\":\"آندورا\",\"de\":\"Andorra\",\"es\":\"Andorra\",\"fr\":\"Andorre\",\"ja\":\"アンドラ\",\"it\":\"Andorra\",\"cn\":\"安道尔\",\"tr\":\"Andorra\"}', 42.50000000, 1.50000000, '🇦🇩', 'U+1F1E6 U+1F1E9', '2018-07-20 13:11:03', '2022-05-21 03:06:00', 1, 1),
(7, 'Angola', 'AGO', '024', 'AO', '244', 'Luanda', 'AOA', 'Angolan kwanza', 'Kz', '.ao', 'Angola', 'Africa', 'Middle Africa', '[{\"zoneName\":\"Africa/Luanda\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"WAT\",\"tzName\":\"West Africa Time\"}]', '{\"kr\":\"앙골라\",\"pt-BR\":\"Angola\",\"pt\":\"Angola\",\"nl\":\"Angola\",\"hr\":\"Angola\",\"fa\":\"آنگولا\",\"de\":\"Angola\",\"es\":\"Angola\",\"fr\":\"Angola\",\"ja\":\"アンゴラ\",\"it\":\"Angola\",\"cn\":\"安哥拉\",\"tr\":\"Angola\"}', -12.50000000, 18.50000000, '🇦🇴', 'U+1F1E6 U+1F1F4', '2018-07-20 13:11:03', '2022-05-21 03:06:00', 1, 1),
(8, 'Anguilla', 'AIA', '660', 'AI', '+1-264', 'The Valley', 'XCD', 'East Caribbean dollar', '$', '.ai', 'Anguilla', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Anguilla\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"앵귈라\",\"pt-BR\":\"Anguila\",\"pt\":\"Anguila\",\"nl\":\"Anguilla\",\"hr\":\"Angvila\",\"fa\":\"آنگویلا\",\"de\":\"Anguilla\",\"es\":\"Anguilla\",\"fr\":\"Anguilla\",\"ja\":\"アンギラ\",\"it\":\"Anguilla\",\"cn\":\"安圭拉\",\"tr\":\"Anguilla\"}', 18.25000000, -63.16666666, '🇦🇮', 'U+1F1E6 U+1F1EE', '2018-07-20 13:11:03', '2022-05-21 03:06:00', 1, 1),
(9, 'Antarctica', 'ATA', '010', 'AQ', '672', '', 'AAD', 'Antarctican dollar', '$', '.aq', 'Antarctica', 'Polar', '', '[{\"zoneName\":\"Antarctica/Casey\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"AWST\",\"tzName\":\"Australian Western Standard Time\"},{\"zoneName\":\"Antarctica/Davis\",\"gmtOffset\":25200,\"gmtOffsetName\":\"UTC+07:00\",\"abbreviation\":\"DAVT\",\"tzName\":\"Davis Time\"},{\"zoneName\":\"Antarctica/DumontDUrville\",\"gmtOffset\":36000,\"gmtOffsetName\":\"UTC+10:00\",\"abbreviation\":\"DDUT\",\"tzName\":\"Dumont d\'Urville Time\"},{\"zoneName\":\"Antarctica/Mawson\",\"gmtOffset\":18000,\"gmtOffsetName\":\"UTC+05:00\",\"abbreviation\":\"MAWT\",\"tzName\":\"Mawson Station Time\"},{\"zoneName\":\"Antarctica/McMurdo\",\"gmtOffset\":46800,\"gmtOffsetName\":\"UTC+13:00\",\"abbreviation\":\"NZDT\",\"tzName\":\"New Zealand Daylight Time\"},{\"zoneName\":\"Antarctica/Palmer\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"CLST\",\"tzName\":\"Chile Summer Time\"},{\"zoneName\":\"Antarctica/Rothera\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"ROTT\",\"tzName\":\"Rothera Research Station Time\"},{\"zoneName\":\"Antarctica/Syowa\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"SYOT\",\"tzName\":\"Showa Station Time\"},{\"zoneName\":\"Antarctica/Troll\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"},{\"zoneName\":\"Antarctica/Vostok\",\"gmtOffset\":21600,\"gmtOffsetName\":\"UTC+06:00\",\"abbreviation\":\"VOST\",\"tzName\":\"Vostok Station Time\"}]', '{\"kr\":\"남극\",\"pt-BR\":\"Antártida\",\"pt\":\"Antárctida\",\"nl\":\"Antarctica\",\"hr\":\"Antarktika\",\"fa\":\"جنوبگان\",\"de\":\"Antarktika\",\"es\":\"Antártida\",\"fr\":\"Antarctique\",\"ja\":\"南極大陸\",\"it\":\"Antartide\",\"cn\":\"南极洲\",\"tr\":\"Antartika\"}', -74.65000000, 4.48000000, '🇦🇶', 'U+1F1E6 U+1F1F6', '2018-07-20 13:11:03', '2022-05-21 03:06:00', 1, 1),
(10, 'Antigua And Barbuda', 'ATG', '028', 'AG', '+1-268', 'St. John\'s', 'XCD', 'Eastern Caribbean dollar', '$', '.ag', 'Antigua and Barbuda', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Antigua\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"앤티가 바부다\",\"pt-BR\":\"Antígua e Barbuda\",\"pt\":\"Antígua e Barbuda\",\"nl\":\"Antigua en Barbuda\",\"hr\":\"Antigva i Barbuda\",\"fa\":\"آنتیگوا و باربودا\",\"de\":\"Antigua und Barbuda\",\"es\":\"Antigua y Barbuda\",\"fr\":\"Antigua-et-Barbuda\",\"ja\":\"アンティグア・バーブーダ\",\"it\":\"Antigua e Barbuda\",\"cn\":\"安提瓜和巴布达\",\"tr\":\"Antigua Ve Barbuda\"}', 17.05000000, -61.80000000, '🇦🇬', 'U+1F1E6 U+1F1EC', '2018-07-20 13:11:03', '2022-05-21 03:06:00', 1, 1),
(11, 'Argentina', 'ARG', '032', 'AR', '54', 'Buenos Aires', 'ARS', 'Argentine peso', '$', '.ar', 'Argentina', 'Americas', 'South America', '[{\"zoneName\":\"America/Argentina/Buenos_Aires\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"ART\",\"tzName\":\"Argentina Time\"},{\"zoneName\":\"America/Argentina/Catamarca\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"ART\",\"tzName\":\"Argentina Time\"},{\"zoneName\":\"America/Argentina/Cordoba\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"ART\",\"tzName\":\"Argentina Time\"},{\"zoneName\":\"America/Argentina/Jujuy\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"ART\",\"tzName\":\"Argentina Time\"},{\"zoneName\":\"America/Argentina/La_Rioja\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"ART\",\"tzName\":\"Argentina Time\"},{\"zoneName\":\"America/Argentina/Mendoza\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"ART\",\"tzName\":\"Argentina Time\"},{\"zoneName\":\"America/Argentina/Rio_Gallegos\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"ART\",\"tzName\":\"Argentina Time\"},{\"zoneName\":\"America/Argentina/Salta\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"ART\",\"tzName\":\"Argentina Time\"},{\"zoneName\":\"America/Argentina/San_Juan\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"ART\",\"tzName\":\"Argentina Time\"},{\"zoneName\":\"America/Argentina/San_Luis\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"ART\",\"tzName\":\"Argentina Time\"},{\"zoneName\":\"America/Argentina/Tucuman\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"ART\",\"tzName\":\"Argentina Time\"},{\"zoneName\":\"America/Argentina/Ushuaia\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"ART\",\"tzName\":\"Argentina Time\"}]', '{\"kr\":\"아르헨티나\",\"pt-BR\":\"Argentina\",\"pt\":\"Argentina\",\"nl\":\"Argentinië\",\"hr\":\"Argentina\",\"fa\":\"آرژانتین\",\"de\":\"Argentinien\",\"es\":\"Argentina\",\"fr\":\"Argentine\",\"ja\":\"アルゼンチン\",\"it\":\"Argentina\",\"cn\":\"阿根廷\",\"tr\":\"Arjantin\"}', -34.00000000, -64.00000000, '🇦🇷', 'U+1F1E6 U+1F1F7', '2018-07-20 13:11:03', '2022-05-21 03:06:00', 1, 1),
(12, 'Armenia', 'ARM', '051', 'AM', '374', 'Yerevan', 'AMD', 'Armenian dram', '֏', '.am', 'Հայաստան', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Yerevan\",\"gmtOffset\":14400,\"gmtOffsetName\":\"UTC+04:00\",\"abbreviation\":\"AMT\",\"tzName\":\"Armenia Time\"}]', '{\"kr\":\"아르메니아\",\"pt-BR\":\"Armênia\",\"pt\":\"Arménia\",\"nl\":\"Armenië\",\"hr\":\"Armenija\",\"fa\":\"ارمنستان\",\"de\":\"Armenien\",\"es\":\"Armenia\",\"fr\":\"Arménie\",\"ja\":\"アルメニア\",\"it\":\"Armenia\",\"cn\":\"亚美尼亚\",\"tr\":\"Ermenistan\"}', 40.00000000, 45.00000000, '🇦🇲', 'U+1F1E6 U+1F1F2', '2018-07-20 13:11:03', '2022-05-21 03:06:00', 1, 1),
(13, 'Aruba', 'ABW', '533', 'AW', '297', 'Oranjestad', 'AWG', 'Aruban florin', 'ƒ', '.aw', 'Aruba', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Aruba\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"아루바\",\"pt-BR\":\"Aruba\",\"pt\":\"Aruba\",\"nl\":\"Aruba\",\"hr\":\"Aruba\",\"fa\":\"آروبا\",\"de\":\"Aruba\",\"es\":\"Aruba\",\"fr\":\"Aruba\",\"ja\":\"アルバ\",\"it\":\"Aruba\",\"cn\":\"阿鲁巴\",\"tr\":\"Aruba\"}', 12.50000000, -69.96666666, '🇦🇼', 'U+1F1E6 U+1F1FC', '2018-07-20 13:11:03', '2022-05-21 03:06:00', 1, 1),
(14, 'Australia', 'AUS', '036', 'AU', '61', 'Canberra', 'AUD', 'Australian dollar', '$', '.au', 'Australia', 'Oceania', 'Australia and New Zealand', '[{\"zoneName\":\"Antarctica/Macquarie\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"MIST\",\"tzName\":\"Macquarie Island Station Time\"},{\"zoneName\":\"Australia/Adelaide\",\"gmtOffset\":37800,\"gmtOffsetName\":\"UTC+10:30\",\"abbreviation\":\"ACDT\",\"tzName\":\"Australian Central Daylight Saving Time\"},{\"zoneName\":\"Australia/Brisbane\",\"gmtOffset\":36000,\"gmtOffsetName\":\"UTC+10:00\",\"abbreviation\":\"AEST\",\"tzName\":\"Australian Eastern Standard Time\"},{\"zoneName\":\"Australia/Broken_Hill\",\"gmtOffset\":37800,\"gmtOffsetName\":\"UTC+10:30\",\"abbreviation\":\"ACDT\",\"tzName\":\"Australian Central Daylight Saving Time\"},{\"zoneName\":\"Australia/Currie\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"AEDT\",\"tzName\":\"Australian Eastern Daylight Saving Time\"},{\"zoneName\":\"Australia/Darwin\",\"gmtOffset\":34200,\"gmtOffsetName\":\"UTC+09:30\",\"abbreviation\":\"ACST\",\"tzName\":\"Australian Central Standard Time\"},{\"zoneName\":\"Australia/Eucla\",\"gmtOffset\":31500,\"gmtOffsetName\":\"UTC+08:45\",\"abbreviation\":\"ACWST\",\"tzName\":\"Australian Central Western Standard Time (Unofficial)\"},{\"zoneName\":\"Australia/Hobart\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"AEDT\",\"tzName\":\"Australian Eastern Daylight Saving Time\"},{\"zoneName\":\"Australia/Lindeman\",\"gmtOffset\":36000,\"gmtOffsetName\":\"UTC+10:00\",\"abbreviation\":\"AEST\",\"tzName\":\"Australian Eastern Standard Time\"},{\"zoneName\":\"Australia/Lord_Howe\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"LHST\",\"tzName\":\"Lord Howe Summer Time\"},{\"zoneName\":\"Australia/Melbourne\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"AEDT\",\"tzName\":\"Australian Eastern Daylight Saving Time\"},{\"zoneName\":\"Australia/Perth\",\"gmtOffset\":28800,\"gmtOffsetName\":\"UTC+08:00\",\"abbreviation\":\"AWST\",\"tzName\":\"Australian Western Standard Time\"},{\"zoneName\":\"Australia/Sydney\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"AEDT\",\"tzName\":\"Australian Eastern Daylight Saving Time\"}]', '{\"kr\":\"호주\",\"pt-BR\":\"Austrália\",\"pt\":\"Austrália\",\"nl\":\"Australië\",\"hr\":\"Australija\",\"fa\":\"استرالیا\",\"de\":\"Australien\",\"es\":\"Australia\",\"fr\":\"Australie\",\"ja\":\"オーストラリア\",\"it\":\"Australia\",\"cn\":\"澳大利亚\",\"tr\":\"Avustralya\"}', -27.00000000, 133.00000000, '🇦🇺', 'U+1F1E6 U+1F1FA', '2018-07-20 13:11:03', '2022-05-21 03:06:00', 1, 1),
(15, 'Austria', 'AUT', '040', 'AT', '43', 'Vienna', 'EUR', 'Euro', '€', '.at', 'Österreich', 'Europe', 'Western Europe', '[{\"zoneName\":\"Europe/Vienna\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"오스트리아\",\"pt-BR\":\"áustria\",\"pt\":\"áustria\",\"nl\":\"Oostenrijk\",\"hr\":\"Austrija\",\"fa\":\"اتریش\",\"de\":\"Österreich\",\"es\":\"Austria\",\"fr\":\"Autriche\",\"ja\":\"オーストリア\",\"it\":\"Austria\",\"cn\":\"奥地利\",\"tr\":\"Avusturya\"}', 47.33333333, 13.33333333, '🇦🇹', 'U+1F1E6 U+1F1F9', '2018-07-20 13:11:03', '2022-05-21 03:06:00', 1, 1),
(16, 'Azerbaijan', 'AZE', '031', 'AZ', '994', 'Baku', 'AZN', 'Azerbaijani manat', 'm', '.az', 'Azərbaycan', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Baku\",\"gmtOffset\":14400,\"gmtOffsetName\":\"UTC+04:00\",\"abbreviation\":\"AZT\",\"tzName\":\"Azerbaijan Time\"}]', '{\"kr\":\"아제르바이잔\",\"pt-BR\":\"Azerbaijão\",\"pt\":\"Azerbaijão\",\"nl\":\"Azerbeidzjan\",\"hr\":\"Azerbajdžan\",\"fa\":\"آذربایجان\",\"de\":\"Aserbaidschan\",\"es\":\"Azerbaiyán\",\"fr\":\"Azerbaïdjan\",\"ja\":\"アゼルバイジャン\",\"it\":\"Azerbaijan\",\"cn\":\"阿塞拜疆\",\"tr\":\"Azerbaycan\"}', 40.50000000, 47.50000000, '🇦🇿', 'U+1F1E6 U+1F1FF', '2018-07-20 13:11:03', '2022-05-21 03:06:00', 1, 1),
(17, 'The Bahamas', 'BHS', '044', 'BS', '+1-242', 'Nassau', 'BSD', 'Bahamian dollar', 'B$', '.bs', 'Bahamas', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Nassau\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America)\"}]', '{\"kr\":\"바하마\",\"pt-BR\":\"Bahamas\",\"pt\":\"Baamas\",\"nl\":\"Bahama’s\",\"hr\":\"Bahami\",\"fa\":\"باهاما\",\"de\":\"Bahamas\",\"es\":\"Bahamas\",\"fr\":\"Bahamas\",\"ja\":\"バハマ\",\"it\":\"Bahamas\",\"cn\":\"巴哈马\",\"tr\":\"Bahamalar\"}', 24.25000000, -76.00000000, '🇧🇸', 'U+1F1E7 U+1F1F8', '2018-07-20 13:11:03', '2022-05-21 03:06:00', 1, 1),
(18, 'Bahrain', 'BHR', '048', 'BH', '973', 'Manama', 'BHD', 'Bahraini dinar', '.د.ب', '.bh', '‏البحرين', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Bahrain\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"AST\",\"tzName\":\"Arabia Standard Time\"}]', '{\"kr\":\"바레인\",\"pt-BR\":\"Bahrein\",\"pt\":\"Barém\",\"nl\":\"Bahrein\",\"hr\":\"Bahrein\",\"fa\":\"بحرین\",\"de\":\"Bahrain\",\"es\":\"Bahrein\",\"fr\":\"Bahreïn\",\"ja\":\"バーレーン\",\"it\":\"Bahrein\",\"cn\":\"巴林\",\"tr\":\"Bahreyn\"}', 26.00000000, 50.55000000, '🇧🇭', 'U+1F1E7 U+1F1ED', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(19, 'Bangladesh', 'BGD', '050', 'BD', '880', 'Dhaka', 'BDT', 'Bangladeshi taka', '৳', '.bd', 'Bangladesh', 'Asia', 'Southern Asia', '[{\"zoneName\":\"Asia/Dhaka\",\"gmtOffset\":21600,\"gmtOffsetName\":\"UTC+06:00\",\"abbreviation\":\"BDT\",\"tzName\":\"Bangladesh Standard Time\"}]', '{\"kr\":\"방글라데시\",\"pt-BR\":\"Bangladesh\",\"pt\":\"Bangladeche\",\"nl\":\"Bangladesh\",\"hr\":\"Bangladeš\",\"fa\":\"بنگلادش\",\"de\":\"Bangladesch\",\"es\":\"Bangladesh\",\"fr\":\"Bangladesh\",\"ja\":\"バングラデシュ\",\"it\":\"Bangladesh\",\"cn\":\"孟加拉\",\"tr\":\"Bangladeş\"}', 24.00000000, 90.00000000, '🇧🇩', 'U+1F1E7 U+1F1E9', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(20, 'Barbados', 'BRB', '052', 'BB', '+1-246', 'Bridgetown', 'BBD', 'Barbadian dollar', 'Bds$', '.bb', 'Barbados', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Barbados\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"바베이도스\",\"pt-BR\":\"Barbados\",\"pt\":\"Barbados\",\"nl\":\"Barbados\",\"hr\":\"Barbados\",\"fa\":\"باربادوس\",\"de\":\"Barbados\",\"es\":\"Barbados\",\"fr\":\"Barbade\",\"ja\":\"バルバドス\",\"it\":\"Barbados\",\"cn\":\"巴巴多斯\",\"tr\":\"Barbados\"}', 13.16666666, -59.53333333, '🇧🇧', 'U+1F1E7 U+1F1E7', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(21, 'Belarus', 'BLR', '112', 'BY', '375', 'Minsk', 'BYN', 'Belarusian ruble', 'Br', '.by', 'Белару́сь', 'Europe', 'Eastern Europe', '[{\"zoneName\":\"Europe/Minsk\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"MSK\",\"tzName\":\"Moscow Time\"}]', '{\"kr\":\"벨라루스\",\"pt-BR\":\"Bielorrússia\",\"pt\":\"Bielorrússia\",\"nl\":\"Wit-Rusland\",\"hr\":\"Bjelorusija\",\"fa\":\"بلاروس\",\"de\":\"Weißrussland\",\"es\":\"Bielorrusia\",\"fr\":\"Biélorussie\",\"ja\":\"ベラルーシ\",\"it\":\"Bielorussia\",\"cn\":\"白俄罗斯\",\"tr\":\"Belarus\"}', 53.00000000, 28.00000000, '🇧🇾', 'U+1F1E7 U+1F1FE', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(22, 'Belgium', 'BEL', '056', 'BE', '32', 'Brussels', 'EUR', 'Euro', '€', '.be', 'België', 'Europe', 'Western Europe', '[{\"zoneName\":\"Europe/Brussels\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"벨기에\",\"pt-BR\":\"Bélgica\",\"pt\":\"Bélgica\",\"nl\":\"België\",\"hr\":\"Belgija\",\"fa\":\"بلژیک\",\"de\":\"Belgien\",\"es\":\"Bélgica\",\"fr\":\"Belgique\",\"ja\":\"ベルギー\",\"it\":\"Belgio\",\"cn\":\"比利时\",\"tr\":\"Belçika\"}', 50.83333333, 4.00000000, '🇧🇪', 'U+1F1E7 U+1F1EA', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(23, 'Belize', 'BLZ', '084', 'BZ', '501', 'Belmopan', 'BZD', 'Belize dollar', '$', '.bz', 'Belize', 'Americas', 'Central America', '[{\"zoneName\":\"America/Belize\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America)\"}]', '{\"kr\":\"벨리즈\",\"pt-BR\":\"Belize\",\"pt\":\"Belize\",\"nl\":\"Belize\",\"hr\":\"Belize\",\"fa\":\"بلیز\",\"de\":\"Belize\",\"es\":\"Belice\",\"fr\":\"Belize\",\"ja\":\"ベリーズ\",\"it\":\"Belize\",\"cn\":\"伯利兹\",\"tr\":\"Belize\"}', 17.25000000, -88.75000000, '🇧🇿', 'U+1F1E7 U+1F1FF', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(24, 'Benin', 'BEN', '204', 'BJ', '229', 'Porto-Novo', 'XOF', 'West African CFA franc', 'CFA', '.bj', 'Bénin', 'Africa', 'Western Africa', '[{\"zoneName\":\"Africa/Porto-Novo\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"WAT\",\"tzName\":\"West Africa Time\"}]', '{\"kr\":\"베냉\",\"pt-BR\":\"Benin\",\"pt\":\"Benim\",\"nl\":\"Benin\",\"hr\":\"Benin\",\"fa\":\"بنین\",\"de\":\"Benin\",\"es\":\"Benín\",\"fr\":\"Bénin\",\"ja\":\"ベナン\",\"it\":\"Benin\",\"cn\":\"贝宁\",\"tr\":\"Benin\"}', 9.50000000, 2.25000000, '🇧🇯', 'U+1F1E7 U+1F1EF', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(25, 'Bermuda', 'BMU', '060', 'BM', '+1-441', 'Hamilton', 'BMD', 'Bermudian dollar', '$', '.bm', 'Bermuda', 'Americas', 'Northern America', '[{\"zoneName\":\"Atlantic/Bermuda\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"버뮤다\",\"pt-BR\":\"Bermudas\",\"pt\":\"Bermudas\",\"nl\":\"Bermuda\",\"hr\":\"Bermudi\",\"fa\":\"برمودا\",\"de\":\"Bermuda\",\"es\":\"Bermudas\",\"fr\":\"Bermudes\",\"ja\":\"バミューダ\",\"it\":\"Bermuda\",\"cn\":\"百慕大\",\"tr\":\"Bermuda\"}', 32.33333333, -64.75000000, '🇧🇲', 'U+1F1E7 U+1F1F2', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(26, 'Bhutan', 'BTN', '064', 'BT', '975', 'Thimphu', 'BTN', 'Bhutanese ngultrum', 'Nu.', '.bt', 'ʼbrug-yul', 'Asia', 'Southern Asia', '[{\"zoneName\":\"Asia/Thimphu\",\"gmtOffset\":21600,\"gmtOffsetName\":\"UTC+06:00\",\"abbreviation\":\"BTT\",\"tzName\":\"Bhutan Time\"}]', '{\"kr\":\"부탄\",\"pt-BR\":\"Butão\",\"pt\":\"Butão\",\"nl\":\"Bhutan\",\"hr\":\"Butan\",\"fa\":\"بوتان\",\"de\":\"Bhutan\",\"es\":\"Bután\",\"fr\":\"Bhoutan\",\"ja\":\"ブータン\",\"it\":\"Bhutan\",\"cn\":\"不丹\",\"tr\":\"Butan\"}', 27.50000000, 90.50000000, '🇧🇹', 'U+1F1E7 U+1F1F9', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(27, 'Bolivia', 'BOL', '068', 'BO', '591', 'Sucre', 'BOB', 'Bolivian boliviano', 'Bs.', '.bo', 'Bolivia', 'Americas', 'South America', '[{\"zoneName\":\"America/La_Paz\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"BOT\",\"tzName\":\"Bolivia Time\"}]', '{\"kr\":\"볼리비아\",\"pt-BR\":\"Bolívia\",\"pt\":\"Bolívia\",\"nl\":\"Bolivia\",\"hr\":\"Bolivija\",\"fa\":\"بولیوی\",\"de\":\"Bolivien\",\"es\":\"Bolivia\",\"fr\":\"Bolivie\",\"ja\":\"ボリビア多民族国\",\"it\":\"Bolivia\",\"cn\":\"玻利维亚\",\"tr\":\"Bolivya\"}', -17.00000000, -65.00000000, '🇧🇴', 'U+1F1E7 U+1F1F4', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(28, 'Bosnia and Herzegovina', 'BIH', '070', 'BA', '387', 'Sarajevo', 'BAM', 'Bosnia and Herzegovina convertible mark', 'KM', '.ba', 'Bosna i Hercegovina', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Europe/Sarajevo\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"보스니아 헤르체고비나\",\"pt-BR\":\"Bósnia e Herzegovina\",\"pt\":\"Bósnia e Herzegovina\",\"nl\":\"Bosnië en Herzegovina\",\"hr\":\"Bosna i Hercegovina\",\"fa\":\"بوسنی و هرزگوین\",\"de\":\"Bosnien und Herzegowina\",\"es\":\"Bosnia y Herzegovina\",\"fr\":\"Bosnie-Herzégovine\",\"ja\":\"ボスニア・ヘルツェゴビナ\",\"it\":\"Bosnia ed Erzegovina\",\"cn\":\"波斯尼亚和黑塞哥维那\",\"tr\":\"Bosna Hersek\"}', 44.00000000, 18.00000000, '🇧🇦', 'U+1F1E7 U+1F1E6', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(29, 'Botswana', 'BWA', '072', 'BW', '267', 'Gaborone', 'BWP', 'Botswana pula', 'P', '.bw', 'Botswana', 'Africa', 'Southern Africa', '[{\"zoneName\":\"Africa/Gaborone\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"CAT\",\"tzName\":\"Central Africa Time\"}]', '{\"kr\":\"보츠와나\",\"pt-BR\":\"Botsuana\",\"pt\":\"Botsuana\",\"nl\":\"Botswana\",\"hr\":\"Bocvana\",\"fa\":\"بوتسوانا\",\"de\":\"Botswana\",\"es\":\"Botswana\",\"fr\":\"Botswana\",\"ja\":\"ボツワナ\",\"it\":\"Botswana\",\"cn\":\"博茨瓦纳\",\"tr\":\"Botsvana\"}', -22.00000000, 24.00000000, '🇧🇼', 'U+1F1E7 U+1F1FC', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(30, 'Bouvet Island', 'BVT', '074', 'BV', '0055', '', 'NOK', 'Norwegian Krone', 'kr', '.bv', 'Bouvetøya', '', '', '[{\"zoneName\":\"Europe/Oslo\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"부벳 섬\",\"pt-BR\":\"Ilha Bouvet\",\"pt\":\"Ilha Bouvet\",\"nl\":\"Bouveteiland\",\"hr\":\"Otok Bouvet\",\"fa\":\"جزیره بووه\",\"de\":\"Bouvetinsel\",\"es\":\"Isla Bouvet\",\"fr\":\"Île Bouvet\",\"ja\":\"ブーベ島\",\"it\":\"Isola Bouvet\",\"cn\":\"布维岛\",\"tr\":\"Bouvet Adasi\"}', -54.43333333, 3.40000000, '🇧🇻', 'U+1F1E7 U+1F1FB', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(31, 'Brazil', 'BRA', '076', 'BR', '55', 'Brasilia', 'BRL', 'Brazilian real', 'R$', '.br', 'Brasil', 'Americas', 'South America', '[{\"zoneName\":\"America/Araguaina\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"BRT\",\"tzName\":\"Brasília Time\"},{\"zoneName\":\"America/Bahia\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"BRT\",\"tzName\":\"Brasília Time\"},{\"zoneName\":\"America/Belem\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"BRT\",\"tzName\":\"Brasília Time\"},{\"zoneName\":\"America/Boa_Vista\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AMT\",\"tzName\":\"Amazon Time (Brazil)[3\"},{\"zoneName\":\"America/Campo_Grande\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AMT\",\"tzName\":\"Amazon Time (Brazil)[3\"},{\"zoneName\":\"America/Cuiaba\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"BRT\",\"tzName\":\"Brasilia Time\"},{\"zoneName\":\"America/Eirunepe\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"ACT\",\"tzName\":\"Acre Time\"},{\"zoneName\":\"America/Fortaleza\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"BRT\",\"tzName\":\"Brasília Time\"},{\"zoneName\":\"America/Maceio\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"BRT\",\"tzName\":\"Brasília Time\"},{\"zoneName\":\"America/Manaus\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AMT\",\"tzName\":\"Amazon Time (Brazil)\"},{\"zoneName\":\"America/Noronha\",\"gmtOffset\":-7200,\"gmtOffsetName\":\"UTC-02:00\",\"abbreviation\":\"FNT\",\"tzName\":\"Fernando de Noronha Time\"},{\"zoneName\":\"America/Porto_Velho\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AMT\",\"tzName\":\"Amazon Time (Brazil)[3\"},{\"zoneName\":\"America/Recife\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"BRT\",\"tzName\":\"Brasília Time\"},{\"zoneName\":\"America/Rio_Branco\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"ACT\",\"tzName\":\"Acre Time\"},{\"zoneName\":\"America/Santarem\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"BRT\",\"tzName\":\"Brasília Time\"},{\"zoneName\":\"America/Sao_Paulo\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"BRT\",\"tzName\":\"Brasília Time\"}]', '{\"kr\":\"브라질\",\"pt-BR\":\"Brasil\",\"pt\":\"Brasil\",\"nl\":\"Brazilië\",\"hr\":\"Brazil\",\"fa\":\"برزیل\",\"de\":\"Brasilien\",\"es\":\"Brasil\",\"fr\":\"Brésil\",\"ja\":\"ブラジル\",\"it\":\"Brasile\",\"cn\":\"巴西\",\"tr\":\"Brezilya\"}', -10.00000000, -55.00000000, '🇧🇷', 'U+1F1E7 U+1F1F7', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(32, 'British Indian Ocean Territory', 'IOT', '086', 'IO', '246', 'Diego Garcia', 'USD', 'United States dollar', '$', '.io', 'British Indian Ocean Territory', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Indian/Chagos\",\"gmtOffset\":21600,\"gmtOffsetName\":\"UTC+06:00\",\"abbreviation\":\"IOT\",\"tzName\":\"Indian Ocean Time\"}]', '{\"kr\":\"영국령 인도양 지역\",\"pt-BR\":\"Território Britânico do Oceano íÍdico\",\"pt\":\"Território Britânico do Oceano Índico\",\"nl\":\"Britse Gebieden in de Indische Oceaan\",\"hr\":\"Britanski Indijskooceanski teritorij\",\"fa\":\"قلمرو بریتانیا در اقیانوس هند\",\"de\":\"Britisches Territorium im Indischen Ozean\",\"es\":\"Territorio Británico del Océano Índico\",\"fr\":\"Territoire britannique de l\'océan Indien\",\"ja\":\"イギリス領インド洋地域\",\"it\":\"Territorio britannico dell\'oceano indiano\",\"cn\":\"英属印度洋领地\",\"tr\":\"Britanya Hint Okyanusu Topraklari\"}', -6.00000000, 71.50000000, '🇮🇴', 'U+1F1EE U+1F1F4', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(33, 'Brunei', 'BRN', '096', 'BN', '673', 'Bandar Seri Begawan', 'BND', 'Brunei dollar', 'B$', '.bn', 'Negara Brunei Darussalam', 'Asia', 'South-Eastern Asia', '[{\"zoneName\":\"Asia/Brunei\",\"gmtOffset\":28800,\"gmtOffsetName\":\"UTC+08:00\",\"abbreviation\":\"BNT\",\"tzName\":\"Brunei Darussalam Time\"}]', '{\"kr\":\"브루나이\",\"pt-BR\":\"Brunei\",\"pt\":\"Brunei\",\"nl\":\"Brunei\",\"hr\":\"Brunej\",\"fa\":\"برونئی\",\"de\":\"Brunei\",\"es\":\"Brunei\",\"fr\":\"Brunei\",\"ja\":\"ブルネイ・ダルサラーム\",\"it\":\"Brunei\",\"cn\":\"文莱\",\"tr\":\"Brunei\"}', 4.50000000, 114.66666666, '🇧🇳', 'U+1F1E7 U+1F1F3', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(34, 'Bulgaria', 'BGR', '100', 'BG', '359', 'Sofia', 'BGN', 'Bulgarian lev', 'Лв.', '.bg', 'България', 'Europe', 'Eastern Europe', '[{\"zoneName\":\"Europe/Sofia\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"불가리아\",\"pt-BR\":\"Bulgária\",\"pt\":\"Bulgária\",\"nl\":\"Bulgarije\",\"hr\":\"Bugarska\",\"fa\":\"بلغارستان\",\"de\":\"Bulgarien\",\"es\":\"Bulgaria\",\"fr\":\"Bulgarie\",\"ja\":\"ブルガリア\",\"it\":\"Bulgaria\",\"cn\":\"保加利亚\",\"tr\":\"Bulgaristan\"}', 43.00000000, 25.00000000, '🇧🇬', 'U+1F1E7 U+1F1EC', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(35, 'Burkina Faso', 'BFA', '854', 'BF', '226', 'Ouagadougou', 'XOF', 'West African CFA franc', 'CFA', '.bf', 'Burkina Faso', 'Africa', 'Western Africa', '[{\"zoneName\":\"Africa/Ouagadougou\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"부르키나 파소\",\"pt-BR\":\"Burkina Faso\",\"pt\":\"Burquina Faso\",\"nl\":\"Burkina Faso\",\"hr\":\"Burkina Faso\",\"fa\":\"بورکینافاسو\",\"de\":\"Burkina Faso\",\"es\":\"Burkina Faso\",\"fr\":\"Burkina Faso\",\"ja\":\"ブルキナファソ\",\"it\":\"Burkina Faso\",\"cn\":\"布基纳法索\",\"tr\":\"Burkina Faso\"}', 13.00000000, -2.00000000, '🇧🇫', 'U+1F1E7 U+1F1EB', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(36, 'Burundi', 'BDI', '108', 'BI', '257', 'Bujumbura', 'BIF', 'Burundian franc', 'FBu', '.bi', 'Burundi', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Africa/Bujumbura\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"CAT\",\"tzName\":\"Central Africa Time\"}]', '{\"kr\":\"부룬디\",\"pt-BR\":\"Burundi\",\"pt\":\"Burúndi\",\"nl\":\"Burundi\",\"hr\":\"Burundi\",\"fa\":\"بوروندی\",\"de\":\"Burundi\",\"es\":\"Burundi\",\"fr\":\"Burundi\",\"ja\":\"ブルンジ\",\"it\":\"Burundi\",\"cn\":\"布隆迪\",\"tr\":\"Burundi\"}', -3.50000000, 30.00000000, '🇧🇮', 'U+1F1E7 U+1F1EE', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(37, 'Cambodia', 'KHM', '116', 'KH', '855', 'Phnom Penh', 'KHR', 'Cambodian riel', 'KHR', '.kh', 'Kâmpŭchéa', 'Asia', 'South-Eastern Asia', '[{\"zoneName\":\"Asia/Phnom_Penh\",\"gmtOffset\":25200,\"gmtOffsetName\":\"UTC+07:00\",\"abbreviation\":\"ICT\",\"tzName\":\"Indochina Time\"}]', '{\"kr\":\"캄보디아\",\"pt-BR\":\"Camboja\",\"pt\":\"Camboja\",\"nl\":\"Cambodja\",\"hr\":\"Kambodža\",\"fa\":\"کامبوج\",\"de\":\"Kambodscha\",\"es\":\"Camboya\",\"fr\":\"Cambodge\",\"ja\":\"カンボジア\",\"it\":\"Cambogia\",\"cn\":\"柬埔寨\",\"tr\":\"Kamboçya\"}', 13.00000000, 105.00000000, '🇰🇭', 'U+1F1F0 U+1F1ED', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(38, 'Cameroon', 'CMR', '120', 'CM', '237', 'Yaounde', 'XAF', 'Central African CFA franc', 'FCFA', '.cm', 'Cameroon', 'Africa', 'Middle Africa', '[{\"zoneName\":\"Africa/Douala\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"WAT\",\"tzName\":\"West Africa Time\"}]', '{\"kr\":\"카메룬\",\"pt-BR\":\"Camarões\",\"pt\":\"Camarões\",\"nl\":\"Kameroen\",\"hr\":\"Kamerun\",\"fa\":\"کامرون\",\"de\":\"Kamerun\",\"es\":\"Camerún\",\"fr\":\"Cameroun\",\"ja\":\"カメルーン\",\"it\":\"Camerun\",\"cn\":\"喀麦隆\",\"tr\":\"Kamerun\"}', 6.00000000, 12.00000000, '🇨🇲', 'U+1F1E8 U+1F1F2', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(39, 'Canada', 'CAN', '124', 'CA', '1', 'Ottawa', 'CAD', 'Canadian dollar', '$', '.ca', 'Canada', 'Americas', 'Northern America', '[{\"zoneName\":\"America/Atikokan\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America)\"},{\"zoneName\":\"America/Blanc-Sablon\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"},{\"zoneName\":\"America/Cambridge_Bay\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America)\"},{\"zoneName\":\"America/Creston\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America)\"},{\"zoneName\":\"America/Dawson\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America)\"},{\"zoneName\":\"America/Dawson_Creek\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America)\"},{\"zoneName\":\"America/Edmonton\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America)\"},{\"zoneName\":\"America/Fort_Nelson\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America)\"},{\"zoneName\":\"America/Glace_Bay\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"},{\"zoneName\":\"America/Goose_Bay\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"},{\"zoneName\":\"America/Halifax\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"},{\"zoneName\":\"America/Inuvik\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America\"},{\"zoneName\":\"America/Iqaluit\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Moncton\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"},{\"zoneName\":\"America/Nipigon\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Pangnirtung\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Rainy_River\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/Rankin_Inlet\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/Regina\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/Resolute\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/St_Johns\",\"gmtOffset\":-12600,\"gmtOffsetName\":\"UTC-03:30\",\"abbreviation\":\"NST\",\"tzName\":\"Newfoundland Standard Time\"},{\"zoneName\":\"America/Swift_Current\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/Thunder_Bay\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Toronto\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Vancouver\",\"gmtOffset\":-28800,\"gmtOffsetName\":\"UTC-08:00\",\"abbreviation\":\"PST\",\"tzName\":\"Pacific Standard Time (North America\"},{\"zoneName\":\"America/Whitehorse\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America\"},{\"zoneName\":\"America/Winnipeg\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/Yellowknife\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America\"}]', '{\"kr\":\"캐나다\",\"pt-BR\":\"Canadá\",\"pt\":\"Canadá\",\"nl\":\"Canada\",\"hr\":\"Kanada\",\"fa\":\"کانادا\",\"de\":\"Kanada\",\"es\":\"Canadá\",\"fr\":\"Canada\",\"ja\":\"カナダ\",\"it\":\"Canada\",\"cn\":\"加拿大\",\"tr\":\"Kanada\"}', 60.00000000, -95.00000000, '🇨🇦', 'U+1F1E8 U+1F1E6', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(40, 'Cape Verde', 'CPV', '132', 'CV', '238', 'Praia', 'CVE', 'Cape Verdean escudo', '$', '.cv', 'Cabo Verde', 'Africa', 'Western Africa', '[{\"zoneName\":\"Atlantic/Cape_Verde\",\"gmtOffset\":-3600,\"gmtOffsetName\":\"UTC-01:00\",\"abbreviation\":\"CVT\",\"tzName\":\"Cape Verde Time\"}]', '{\"kr\":\"카보베르데\",\"pt-BR\":\"Cabo Verde\",\"pt\":\"Cabo Verde\",\"nl\":\"Kaapverdië\",\"hr\":\"Zelenortska Republika\",\"fa\":\"کیپ ورد\",\"de\":\"Kap Verde\",\"es\":\"Cabo Verde\",\"fr\":\"Cap Vert\",\"ja\":\"カーボベルデ\",\"it\":\"Capo Verde\",\"cn\":\"佛得角\",\"tr\":\"Cabo Verde\"}', 16.00000000, -24.00000000, '🇨🇻', 'U+1F1E8 U+1F1FB', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(41, 'Cayman Islands', 'CYM', '136', 'KY', '+1-345', 'George Town', 'KYD', 'Cayman Islands dollar', '$', '.ky', 'Cayman Islands', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Cayman\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"}]', '{\"kr\":\"케이먼 제도\",\"pt-BR\":\"Ilhas Cayman\",\"pt\":\"Ilhas Caimão\",\"nl\":\"Caymaneilanden\",\"hr\":\"Kajmanski otoci\",\"fa\":\"جزایر کیمن\",\"de\":\"Kaimaninseln\",\"es\":\"Islas Caimán\",\"fr\":\"Îles Caïmans\",\"ja\":\"ケイマン諸島\",\"it\":\"Isole Cayman\",\"cn\":\"开曼群岛\",\"tr\":\"Cayman Adalari\"}', 19.50000000, -80.50000000, '🇰🇾', 'U+1F1F0 U+1F1FE', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(42, 'Central African Republic', 'CAF', '140', 'CF', '236', 'Bangui', 'XAF', 'Central African CFA franc', 'FCFA', '.cf', 'Ködörösêse tî Bêafrîka', 'Africa', 'Middle Africa', '[{\"zoneName\":\"Africa/Bangui\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"WAT\",\"tzName\":\"West Africa Time\"}]', '{\"kr\":\"중앙아프리카 공화국\",\"pt-BR\":\"República Centro-Africana\",\"pt\":\"República Centro-Africana\",\"nl\":\"Centraal-Afrikaanse Republiek\",\"hr\":\"Srednjoafrička Republika\",\"fa\":\"جمهوری آفریقای مرکزی\",\"de\":\"Zentralafrikanische Republik\",\"es\":\"República Centroafricana\",\"fr\":\"République centrafricaine\",\"ja\":\"中央アフリカ共和国\",\"it\":\"Repubblica Centrafricana\",\"cn\":\"中非\",\"tr\":\"Orta Afrika Cumhuriyeti\"}', 7.00000000, 21.00000000, '🇨🇫', 'U+1F1E8 U+1F1EB', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(43, 'Chad', 'TCD', '148', 'TD', '235', 'N\'Djamena', 'XAF', 'Central African CFA franc', 'FCFA', '.td', 'Tchad', 'Africa', 'Middle Africa', '[{\"zoneName\":\"Africa/Ndjamena\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"WAT\",\"tzName\":\"West Africa Time\"}]', '{\"kr\":\"차드\",\"pt-BR\":\"Chade\",\"pt\":\"Chade\",\"nl\":\"Tsjaad\",\"hr\":\"Čad\",\"fa\":\"چاد\",\"de\":\"Tschad\",\"es\":\"Chad\",\"fr\":\"Tchad\",\"ja\":\"チャド\",\"it\":\"Ciad\",\"cn\":\"乍得\",\"tr\":\"Çad\"}', 15.00000000, 19.00000000, '🇹🇩', 'U+1F1F9 U+1F1E9', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(44, 'Chile', 'CHL', '152', 'CL', '56', 'Santiago', 'CLP', 'Chilean peso', '$', '.cl', 'Chile', 'Americas', 'South America', '[{\"zoneName\":\"America/Punta_Arenas\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"CLST\",\"tzName\":\"Chile Summer Time\"},{\"zoneName\":\"America/Santiago\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"CLST\",\"tzName\":\"Chile Summer Time\"},{\"zoneName\":\"Pacific/Easter\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EASST\",\"tzName\":\"Easter Island Summer Time\"}]', '{\"kr\":\"칠리\",\"pt-BR\":\"Chile\",\"pt\":\"Chile\",\"nl\":\"Chili\",\"hr\":\"Čile\",\"fa\":\"شیلی\",\"de\":\"Chile\",\"es\":\"Chile\",\"fr\":\"Chili\",\"ja\":\"チリ\",\"it\":\"Cile\",\"cn\":\"智利\",\"tr\":\"Şili\"}', -30.00000000, -71.00000000, '🇨🇱', 'U+1F1E8 U+1F1F1', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(45, 'China', 'CHN', '156', 'CN', '86', 'Beijing', 'CNY', 'Chinese yuan', '¥', '.cn', '中国', 'Asia', 'Eastern Asia', '[{\"zoneName\":\"Asia/Shanghai\",\"gmtOffset\":28800,\"gmtOffsetName\":\"UTC+08:00\",\"abbreviation\":\"CST\",\"tzName\":\"China Standard Time\"},{\"zoneName\":\"Asia/Urumqi\",\"gmtOffset\":21600,\"gmtOffsetName\":\"UTC+06:00\",\"abbreviation\":\"XJT\",\"tzName\":\"China Standard Time\"}]', '{\"kr\":\"중국\",\"pt-BR\":\"China\",\"pt\":\"China\",\"nl\":\"China\",\"hr\":\"Kina\",\"fa\":\"چین\",\"de\":\"China\",\"es\":\"China\",\"fr\":\"Chine\",\"ja\":\"中国\",\"it\":\"Cina\",\"cn\":\"中国\",\"tr\":\"Çin\"}', 35.00000000, 105.00000000, '🇨🇳', 'U+1F1E8 U+1F1F3', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(46, 'Christmas Island', 'CXR', '162', 'CX', '61', 'Flying Fish Cove', 'AUD', 'Australian dollar', '$', '.cx', 'Christmas Island', 'Oceania', 'Australia and New Zealand', '[{\"zoneName\":\"Indian/Christmas\",\"gmtOffset\":25200,\"gmtOffsetName\":\"UTC+07:00\",\"abbreviation\":\"CXT\",\"tzName\":\"Christmas Island Time\"}]', '{\"kr\":\"크리스마스 섬\",\"pt-BR\":\"Ilha Christmas\",\"pt\":\"Ilha do Natal\",\"nl\":\"Christmaseiland\",\"hr\":\"Božićni otok\",\"fa\":\"جزیره کریسمس\",\"de\":\"Weihnachtsinsel\",\"es\":\"Isla de Navidad\",\"fr\":\"Île Christmas\",\"ja\":\"クリスマス島\",\"it\":\"Isola di Natale\",\"cn\":\"圣诞岛\",\"tr\":\"Christmas Adasi\"}', -10.50000000, 105.66666666, '🇨🇽', 'U+1F1E8 U+1F1FD', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(47, 'Cocos (Keeling) Islands', 'CCK', '166', 'CC', '61', 'West Island', 'AUD', 'Australian dollar', '$', '.cc', 'Cocos (Keeling) Islands', 'Oceania', 'Australia and New Zealand', '[{\"zoneName\":\"Indian/Cocos\",\"gmtOffset\":23400,\"gmtOffsetName\":\"UTC+06:30\",\"abbreviation\":\"CCT\",\"tzName\":\"Cocos Islands Time\"}]', '{\"kr\":\"코코스 제도\",\"pt-BR\":\"Ilhas Cocos\",\"pt\":\"Ilhas dos Cocos\",\"nl\":\"Cocoseilanden\",\"hr\":\"Kokosovi Otoci\",\"fa\":\"جزایر کوکوس\",\"de\":\"Kokosinseln\",\"es\":\"Islas Cocos o Islas Keeling\",\"fr\":\"Îles Cocos\",\"ja\":\"ココス（キーリング）諸島\",\"it\":\"Isole Cocos e Keeling\",\"cn\":\"科科斯（基林）群岛\",\"tr\":\"Cocos Adalari\"}', -12.50000000, 96.83333333, '🇨🇨', 'U+1F1E8 U+1F1E8', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(48, 'Colombia', 'COL', '170', 'CO', '57', 'Bogotá', 'COP', 'Colombian peso', '$', '.co', 'Colombia', 'Americas', 'South America', '[{\"zoneName\":\"America/Bogota\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"COT\",\"tzName\":\"Colombia Time\"}]', '{\"kr\":\"콜롬비아\",\"pt-BR\":\"Colômbia\",\"pt\":\"Colômbia\",\"nl\":\"Colombia\",\"hr\":\"Kolumbija\",\"fa\":\"کلمبیا\",\"de\":\"Kolumbien\",\"es\":\"Colombia\",\"fr\":\"Colombie\",\"ja\":\"コロンビア\",\"it\":\"Colombia\",\"cn\":\"哥伦比亚\",\"tr\":\"Kolombiya\"}', 4.00000000, -72.00000000, '🇨🇴', 'U+1F1E8 U+1F1F4', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(49, 'Comoros', 'COM', '174', 'KM', '269', 'Moroni', 'KMF', 'Comorian franc', 'CF', '.km', 'Komori', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Indian/Comoro\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"EAT\",\"tzName\":\"East Africa Time\"}]', '{\"kr\":\"코모로\",\"pt-BR\":\"Comores\",\"pt\":\"Comores\",\"nl\":\"Comoren\",\"hr\":\"Komori\",\"fa\":\"کومور\",\"de\":\"Union der Komoren\",\"es\":\"Comoras\",\"fr\":\"Comores\",\"ja\":\"コモロ\",\"it\":\"Comore\",\"cn\":\"科摩罗\",\"tr\":\"Komorlar\"}', -12.16666666, 44.25000000, '🇰🇲', 'U+1F1F0 U+1F1F2', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(50, 'Congo', 'COG', '178', 'CG', '242', 'Brazzaville', 'XAF', 'Central African CFA franc', 'FC', '.cg', 'République du Congo', 'Africa', 'Middle Africa', '[{\"zoneName\":\"Africa/Brazzaville\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"WAT\",\"tzName\":\"West Africa Time\"}]', '{\"kr\":\"콩고\",\"pt-BR\":\"Congo\",\"pt\":\"Congo\",\"nl\":\"Congo [Republiek]\",\"hr\":\"Kongo\",\"fa\":\"کنگو\",\"de\":\"Kongo\",\"es\":\"Congo\",\"fr\":\"Congo\",\"ja\":\"コンゴ共和国\",\"it\":\"Congo\",\"cn\":\"刚果\",\"tr\":\"Kongo\"}', -1.00000000, 15.00000000, '🇨🇬', 'U+1F1E8 U+1F1EC', '2018-07-20 13:11:03', '2022-05-21 03:11:20', 1, 1),
(51, 'Democratic Republic of the Congo', 'COD', '180', 'CD', '243', 'Kinshasa', 'CDF', 'Congolese Franc', 'FC', '.cd', 'République démocratique du Congo', 'Africa', 'Middle Africa', '[{\"zoneName\":\"Africa/Kinshasa\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"WAT\",\"tzName\":\"West Africa Time\"},{\"zoneName\":\"Africa/Lubumbashi\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"CAT\",\"tzName\":\"Central Africa Time\"}]', '{\"kr\":\"콩고 민주 공화국\",\"pt-BR\":\"RD Congo\",\"pt\":\"RD Congo\",\"nl\":\"Congo [DRC]\",\"hr\":\"Kongo, Demokratska Republika\",\"fa\":\"جمهوری کنگو\",\"de\":\"Kongo (Dem. Rep.)\",\"es\":\"Congo (Rep. Dem.)\",\"fr\":\"Congo (Rép. dém.)\",\"ja\":\"コンゴ民主共和国\",\"it\":\"Congo (Rep. Dem.)\",\"cn\":\"刚果（金）\",\"tr\":\"Kongo Demokratik Cumhuriyeti\"}', 0.00000000, 25.00000000, '🇨🇩', 'U+1F1E8 U+1F1E9', '2018-07-20 13:11:03', '2022-05-21 03:13:35', 1, 1),
(52, 'Cook Islands', 'COK', '184', 'CK', '682', 'Avarua', 'NZD', 'Cook Islands dollar', '$', '.ck', 'Cook Islands', 'Oceania', 'Polynesia', '[{\"zoneName\":\"Pacific/Rarotonga\",\"gmtOffset\":-36000,\"gmtOffsetName\":\"UTC-10:00\",\"abbreviation\":\"CKT\",\"tzName\":\"Cook Island Time\"}]', '{\"kr\":\"쿡 제도\",\"pt-BR\":\"Ilhas Cook\",\"pt\":\"Ilhas Cook\",\"nl\":\"Cookeilanden\",\"hr\":\"Cookovo Otočje\",\"fa\":\"جزایر کوک\",\"de\":\"Cookinseln\",\"es\":\"Islas Cook\",\"fr\":\"Îles Cook\",\"ja\":\"クック諸島\",\"it\":\"Isole Cook\",\"cn\":\"库克群岛\",\"tr\":\"Cook Adalari\"}', -21.23333333, -159.76666666, '🇨🇰', 'U+1F1E8 U+1F1F0', '2018-07-20 13:11:03', '2022-05-21 03:13:35', 1, 1),
(53, 'Costa Rica', 'CRI', '188', 'CR', '506', 'San Jose', 'CRC', 'Costa Rican colón', '₡', '.cr', 'Costa Rica', 'Americas', 'Central America', '[{\"zoneName\":\"America/Costa_Rica\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"}]', '{\"kr\":\"코스타리카\",\"pt-BR\":\"Costa Rica\",\"pt\":\"Costa Rica\",\"nl\":\"Costa Rica\",\"hr\":\"Kostarika\",\"fa\":\"کاستاریکا\",\"de\":\"Costa Rica\",\"es\":\"Costa Rica\",\"fr\":\"Costa Rica\",\"ja\":\"コスタリカ\",\"it\":\"Costa Rica\",\"cn\":\"哥斯达黎加\",\"tr\":\"Kosta Rika\"}', 10.00000000, -84.00000000, '🇨🇷', 'U+1F1E8 U+1F1F7', '2018-07-20 13:11:03', '2022-05-21 03:13:35', 1, 1),
(54, 'Cote D\'Ivoire (Ivory Coast)', 'CIV', '384', 'CI', '225', 'Yamoussoukro', 'XOF', 'West African CFA franc', 'CFA', '.ci', NULL, 'Africa', 'Western Africa', '[{\"zoneName\":\"Africa/Abidjan\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"코트디부아르\",\"pt-BR\":\"Costa do Marfim\",\"pt\":\"Costa do Marfim\",\"nl\":\"Ivoorkust\",\"hr\":\"Obala Bjelokosti\",\"fa\":\"ساحل عاج\",\"de\":\"Elfenbeinküste\",\"es\":\"Costa de Marfil\",\"fr\":\"Côte d\'Ivoire\",\"ja\":\"コートジボワール\",\"it\":\"Costa D\'Avorio\",\"cn\":\"科特迪瓦\",\"tr\":\"Kotdivuar\"}', 8.00000000, -5.00000000, '🇨🇮', 'U+1F1E8 U+1F1EE', '2018-07-20 13:11:03', '2022-05-21 03:13:35', 1, 1),
(55, 'Croatia', 'HRV', '191', 'HR', '385', 'Zagreb', 'HRK', 'Croatian kuna', 'kn', '.hr', 'Hrvatska', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Europe/Zagreb\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"크로아티아\",\"pt-BR\":\"Croácia\",\"pt\":\"Croácia\",\"nl\":\"Kroatië\",\"hr\":\"Hrvatska\",\"fa\":\"کرواسی\",\"de\":\"Kroatien\",\"es\":\"Croacia\",\"fr\":\"Croatie\",\"ja\":\"クロアチア\",\"it\":\"Croazia\",\"cn\":\"克罗地亚\",\"tr\":\"Hirvatistan\"}', 45.16666666, 15.50000000, '🇭🇷', 'U+1F1ED U+1F1F7', '2018-07-20 13:11:03', '2022-05-21 03:13:35', 1, 1);
INSERT INTO `countries` (`id`, `name`, `iso3`, `numeric_code`, `iso2`, `phonecode`, `capital`, `currency`, `currency_name`, `currency_symbol`, `tld`, `native`, `region`, `subregion`, `timezones`, `translations`, `latitude`, `longitude`, `emoji`, `emojiU`, `created_at`, `updated_at`, `flag`, `status`) VALUES
(56, 'Cuba', 'CUB', '192', 'CU', '53', 'Havana', 'CUP', 'Cuban peso', '$', '.cu', 'Cuba', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Havana\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"CST\",\"tzName\":\"Cuba Standard Time\"}]', '{\"kr\":\"쿠바\",\"pt-BR\":\"Cuba\",\"pt\":\"Cuba\",\"nl\":\"Cuba\",\"hr\":\"Kuba\",\"fa\":\"کوبا\",\"de\":\"Kuba\",\"es\":\"Cuba\",\"fr\":\"Cuba\",\"ja\":\"キューバ\",\"it\":\"Cuba\",\"cn\":\"古巴\",\"tr\":\"Küba\"}', 21.50000000, -80.00000000, '🇨🇺', 'U+1F1E8 U+1F1FA', '2018-07-20 13:11:03', '2022-05-21 03:13:35', 1, 1),
(57, 'Cyprus', 'CYP', '196', 'CY', '357', 'Nicosia', 'EUR', 'Euro', '€', '.cy', 'Κύπρος', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Asia/Famagusta\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"},{\"zoneName\":\"Asia/Nicosia\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"키프로스\",\"pt-BR\":\"Chipre\",\"pt\":\"Chipre\",\"nl\":\"Cyprus\",\"hr\":\"Cipar\",\"fa\":\"قبرس\",\"de\":\"Zypern\",\"es\":\"Chipre\",\"fr\":\"Chypre\",\"ja\":\"キプロス\",\"it\":\"Cipro\",\"cn\":\"塞浦路斯\",\"tr\":\"Kuzey Kıbrıs Türk Cumhuriyeti\"}', 35.00000000, 33.00000000, '🇨🇾', 'U+1F1E8 U+1F1FE', '2018-07-20 13:11:03', '2022-05-21 03:13:35', 1, 1),
(58, 'Czech Republic', 'CZE', '203', 'CZ', '420', 'Prague', 'CZK', 'Czech koruna', 'Kč', '.cz', 'Česká republika', 'Europe', 'Eastern Europe', '[{\"zoneName\":\"Europe/Prague\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"체코\",\"pt-BR\":\"República Tcheca\",\"pt\":\"República Checa\",\"nl\":\"Tsjechië\",\"hr\":\"Češka\",\"fa\":\"جمهوری چک\",\"de\":\"Tschechische Republik\",\"es\":\"República Checa\",\"fr\":\"République tchèque\",\"ja\":\"チェコ\",\"it\":\"Repubblica Ceca\",\"cn\":\"捷克\",\"tr\":\"Çekya\"}', 49.75000000, 15.50000000, '🇨🇿', 'U+1F1E8 U+1F1FF', '2018-07-20 13:11:03', '2022-05-21 03:13:35', 1, 1),
(59, 'Denmark', 'DNK', '208', 'DK', '45', 'Copenhagen', 'DKK', 'Danish krone', 'Kr.', '.dk', 'Danmark', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Europe/Copenhagen\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"덴마크\",\"pt-BR\":\"Dinamarca\",\"pt\":\"Dinamarca\",\"nl\":\"Denemarken\",\"hr\":\"Danska\",\"fa\":\"دانمارک\",\"de\":\"Dänemark\",\"es\":\"Dinamarca\",\"fr\":\"Danemark\",\"ja\":\"デンマーク\",\"it\":\"Danimarca\",\"cn\":\"丹麦\",\"tr\":\"Danimarka\"}', 56.00000000, 10.00000000, '🇩🇰', 'U+1F1E9 U+1F1F0', '2018-07-20 13:11:03', '2022-05-21 03:13:35', 1, 1),
(60, 'Djibouti', 'DJI', '262', 'DJ', '253', 'Djibouti', 'DJF', 'Djiboutian franc', 'Fdj', '.dj', 'Djibouti', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Africa/Djibouti\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"EAT\",\"tzName\":\"East Africa Time\"}]', '{\"kr\":\"지부티\",\"pt-BR\":\"Djibuti\",\"pt\":\"Djibuti\",\"nl\":\"Djibouti\",\"hr\":\"Džibuti\",\"fa\":\"جیبوتی\",\"de\":\"Dschibuti\",\"es\":\"Yibuti\",\"fr\":\"Djibouti\",\"ja\":\"ジブチ\",\"it\":\"Gibuti\",\"cn\":\"吉布提\",\"tr\":\"Cibuti\"}', 11.50000000, 43.00000000, '🇩🇯', 'U+1F1E9 U+1F1EF', '2018-07-20 13:11:03', '2022-05-21 03:17:53', 1, 1),
(61, 'Dominica', 'DMA', '212', 'DM', '+1-767', 'Roseau', 'XCD', 'Eastern Caribbean dollar', '$', '.dm', 'Dominica', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Dominica\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"도미니카 연방\",\"pt-BR\":\"Dominica\",\"pt\":\"Dominica\",\"nl\":\"Dominica\",\"hr\":\"Dominika\",\"fa\":\"دومینیکا\",\"de\":\"Dominica\",\"es\":\"Dominica\",\"fr\":\"Dominique\",\"ja\":\"ドミニカ国\",\"it\":\"Dominica\",\"cn\":\"多米尼加\",\"tr\":\"Dominika\"}', 15.41666666, -61.33333333, '🇩🇲', 'U+1F1E9 U+1F1F2', '2018-07-20 13:11:03', '2022-05-21 03:17:53', 1, 1),
(62, 'Dominican Republic', 'DOM', '214', 'DO', '+1-809 and 1-829', 'Santo Domingo', 'DOP', 'Dominican peso', '$', '.do', 'República Dominicana', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Santo_Domingo\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"도미니카 공화국\",\"pt-BR\":\"República Dominicana\",\"pt\":\"República Dominicana\",\"nl\":\"Dominicaanse Republiek\",\"hr\":\"Dominikanska Republika\",\"fa\":\"جمهوری دومینیکن\",\"de\":\"Dominikanische Republik\",\"es\":\"República Dominicana\",\"fr\":\"République dominicaine\",\"ja\":\"ドミニカ共和国\",\"it\":\"Repubblica Dominicana\",\"cn\":\"多明尼加共和国\",\"tr\":\"Dominik Cumhuriyeti\"}', 19.00000000, -70.66666666, '🇩🇴', 'U+1F1E9 U+1F1F4', '2018-07-20 13:11:03', '2022-05-21 03:17:53', 1, 1),
(63, 'East Timor', 'TLS', '626', 'TL', '670', 'Dili', 'USD', 'United States dollar', '$', '.tl', 'Timor-Leste', 'Asia', 'South-Eastern Asia', '[{\"zoneName\":\"Asia/Dili\",\"gmtOffset\":32400,\"gmtOffsetName\":\"UTC+09:00\",\"abbreviation\":\"TLT\",\"tzName\":\"Timor Leste Time\"}]', '{\"kr\":\"동티모르\",\"pt-BR\":\"Timor Leste\",\"pt\":\"Timor Leste\",\"nl\":\"Oost-Timor\",\"hr\":\"Istočni Timor\",\"fa\":\"تیمور شرقی\",\"de\":\"Timor-Leste\",\"es\":\"Timor Oriental\",\"fr\":\"Timor oriental\",\"ja\":\"東ティモール\",\"it\":\"Timor Est\",\"cn\":\"东帝汶\",\"tr\":\"Doğu Timor\"}', -8.83333333, 125.91666666, '🇹🇱', 'U+1F1F9 U+1F1F1', '2018-07-20 13:11:03', '2022-05-21 03:17:53', 1, 1),
(64, 'Ecuador', 'ECU', '218', 'EC', '593', 'Quito', 'USD', 'United States dollar', '$', '.ec', 'Ecuador', 'Americas', 'South America', '[{\"zoneName\":\"America/Guayaquil\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"ECT\",\"tzName\":\"Ecuador Time\"},{\"zoneName\":\"Pacific/Galapagos\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"GALT\",\"tzName\":\"Galápagos Time\"}]', '{\"kr\":\"에콰도르\",\"pt-BR\":\"Equador\",\"pt\":\"Equador\",\"nl\":\"Ecuador\",\"hr\":\"Ekvador\",\"fa\":\"اکوادور\",\"de\":\"Ecuador\",\"es\":\"Ecuador\",\"fr\":\"Équateur\",\"ja\":\"エクアドル\",\"it\":\"Ecuador\",\"cn\":\"厄瓜多尔\",\"tr\":\"Ekvator\"}', -2.00000000, -77.50000000, '🇪🇨', 'U+1F1EA U+1F1E8', '2018-07-20 13:11:03', '2022-05-21 03:17:53', 1, 1),
(65, 'Egypt', 'EGY', '818', 'EG', '20', 'Cairo', 'EGP', 'Egyptian pound', 'ج.م', '.eg', 'مصر‎', 'Africa', 'Northern Africa', '[{\"zoneName\":\"Africa/Cairo\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"이집트\",\"pt-BR\":\"Egito\",\"pt\":\"Egipto\",\"nl\":\"Egypte\",\"hr\":\"Egipat\",\"fa\":\"مصر\",\"de\":\"Ägypten\",\"es\":\"Egipto\",\"fr\":\"Égypte\",\"ja\":\"エジプト\",\"it\":\"Egitto\",\"cn\":\"埃及\",\"tr\":\"Mısır\"}', 27.00000000, 30.00000000, '🇪🇬', 'U+1F1EA U+1F1EC', '2018-07-20 13:11:03', '2022-05-21 03:17:53', 1, 1),
(66, 'El Salvador', 'SLV', '222', 'SV', '503', 'San Salvador', 'USD', 'United States dollar', '$', '.sv', 'El Salvador', 'Americas', 'Central America', '[{\"zoneName\":\"America/El_Salvador\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"}]', '{\"kr\":\"엘살바도르\",\"pt-BR\":\"El Salvador\",\"pt\":\"El Salvador\",\"nl\":\"El Salvador\",\"hr\":\"Salvador\",\"fa\":\"السالوادور\",\"de\":\"El Salvador\",\"es\":\"El Salvador\",\"fr\":\"Salvador\",\"ja\":\"エルサルバドル\",\"it\":\"El Salvador\",\"cn\":\"萨尔瓦多\",\"tr\":\"El Salvador\"}', 13.83333333, -88.91666666, '🇸🇻', 'U+1F1F8 U+1F1FB', '2018-07-20 13:11:03', '2022-05-21 03:17:53', 1, 1),
(67, 'Equatorial Guinea', 'GNQ', '226', 'GQ', '240', 'Malabo', 'XAF', 'Central African CFA franc', 'FCFA', '.gq', 'Guinea Ecuatorial', 'Africa', 'Middle Africa', '[{\"zoneName\":\"Africa/Malabo\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"WAT\",\"tzName\":\"West Africa Time\"}]', '{\"kr\":\"적도 기니\",\"pt-BR\":\"Guiné Equatorial\",\"pt\":\"Guiné Equatorial\",\"nl\":\"Equatoriaal-Guinea\",\"hr\":\"Ekvatorijalna Gvineja\",\"fa\":\"گینه استوایی\",\"de\":\"Äquatorial-Guinea\",\"es\":\"Guinea Ecuatorial\",\"fr\":\"Guinée-Équatoriale\",\"ja\":\"赤道ギニア\",\"it\":\"Guinea Equatoriale\",\"cn\":\"赤道几内亚\",\"tr\":\"Ekvator Ginesi\"}', 2.00000000, 10.00000000, '🇬🇶', 'U+1F1EC U+1F1F6', '2018-07-20 13:11:03', '2022-05-21 03:17:53', 1, 1),
(68, 'Eritrea', 'ERI', '232', 'ER', '291', 'Asmara', 'ERN', 'Eritrean nakfa', 'Nfk', '.er', 'ኤርትራ', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Africa/Asmara\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"EAT\",\"tzName\":\"East Africa Time\"}]', '{\"kr\":\"에리트레아\",\"pt-BR\":\"Eritreia\",\"pt\":\"Eritreia\",\"nl\":\"Eritrea\",\"hr\":\"Eritreja\",\"fa\":\"اریتره\",\"de\":\"Eritrea\",\"es\":\"Eritrea\",\"fr\":\"Érythrée\",\"ja\":\"エリトリア\",\"it\":\"Eritrea\",\"cn\":\"厄立特里亚\",\"tr\":\"Eritre\"}', 15.00000000, 39.00000000, '🇪🇷', 'U+1F1EA U+1F1F7', '2018-07-20 13:11:03', '2022-05-21 03:17:53', 1, 1),
(69, 'Estonia', 'EST', '233', 'EE', '372', 'Tallinn', 'EUR', 'Euro', '€', '.ee', 'Eesti', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Europe/Tallinn\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"에스토니아\",\"pt-BR\":\"Estônia\",\"pt\":\"Estónia\",\"nl\":\"Estland\",\"hr\":\"Estonija\",\"fa\":\"استونی\",\"de\":\"Estland\",\"es\":\"Estonia\",\"fr\":\"Estonie\",\"ja\":\"エストニア\",\"it\":\"Estonia\",\"cn\":\"爱沙尼亚\",\"tr\":\"Estonya\"}', 59.00000000, 26.00000000, '🇪🇪', 'U+1F1EA U+1F1EA', '2018-07-20 13:11:03', '2022-05-21 03:17:53', 1, 1),
(70, 'Ethiopia', 'ETH', '231', 'ET', '251', 'Addis Ababa', 'ETB', 'Ethiopian birr', 'Nkf', '.et', 'ኢትዮጵያ', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Africa/Addis_Ababa\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"EAT\",\"tzName\":\"East Africa Time\"}]', '{\"kr\":\"에티오피아\",\"pt-BR\":\"Etiópia\",\"pt\":\"Etiópia\",\"nl\":\"Ethiopië\",\"hr\":\"Etiopija\",\"fa\":\"اتیوپی\",\"de\":\"Äthiopien\",\"es\":\"Etiopía\",\"fr\":\"Éthiopie\",\"ja\":\"エチオピア\",\"it\":\"Etiopia\",\"cn\":\"埃塞俄比亚\",\"tr\":\"Etiyopya\"}', 8.00000000, 38.00000000, '🇪🇹', 'U+1F1EA U+1F1F9', '2018-07-20 13:11:03', '2022-05-21 03:20:25', 1, 1),
(71, 'Falkland Islands', 'FLK', '238', 'FK', '500', 'Stanley', 'FKP', 'Falkland Islands pound', '£', '.fk', 'Falkland Islands', 'Americas', 'South America', '[{\"zoneName\":\"Atlantic/Stanley\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"FKST\",\"tzName\":\"Falkland Islands Summer Time\"}]', '{\"kr\":\"포클랜드 제도\",\"pt-BR\":\"Ilhas Malvinas\",\"pt\":\"Ilhas Falkland\",\"nl\":\"Falklandeilanden [Islas Malvinas]\",\"hr\":\"Falklandski Otoci\",\"fa\":\"جزایر فالکلند\",\"de\":\"Falklandinseln\",\"es\":\"Islas Malvinas\",\"fr\":\"Îles Malouines\",\"ja\":\"フォークランド（マルビナス）諸島\",\"it\":\"Isole Falkland o Isole Malvine\",\"cn\":\"福克兰群岛\",\"tr\":\"Falkland Adalari\"}', -51.75000000, -59.00000000, '🇫🇰', 'U+1F1EB U+1F1F0', '2018-07-20 13:11:03', '2022-05-21 03:20:25', 1, 1),
(72, 'Faroe Islands', 'FRO', '234', 'FO', '298', 'Torshavn', 'DKK', 'Danish krone', 'Kr.', '.fo', 'Føroyar', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Atlantic/Faroe\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"WET\",\"tzName\":\"Western European Time\"}]', '{\"kr\":\"페로 제도\",\"pt-BR\":\"Ilhas Faroé\",\"pt\":\"Ilhas Faroé\",\"nl\":\"Faeröer\",\"hr\":\"Farski Otoci\",\"fa\":\"جزایر فارو\",\"de\":\"Färöer-Inseln\",\"es\":\"Islas Faroe\",\"fr\":\"Îles Féroé\",\"ja\":\"フェロー諸島\",\"it\":\"Isole Far Oer\",\"cn\":\"法罗群岛\",\"tr\":\"Faroe Adalari\"}', 62.00000000, -7.00000000, '🇫🇴', 'U+1F1EB U+1F1F4', '2018-07-20 13:11:03', '2022-05-21 03:20:25', 1, 1),
(73, 'Fiji Islands', 'FJI', '242', 'FJ', '679', 'Suva', 'FJD', 'Fijian dollar', 'FJ$', '.fj', 'Fiji', 'Oceania', 'Melanesia', '[{\"zoneName\":\"Pacific/Fiji\",\"gmtOffset\":43200,\"gmtOffsetName\":\"UTC+12:00\",\"abbreviation\":\"FJT\",\"tzName\":\"Fiji Time\"}]', '{\"kr\":\"피지\",\"pt-BR\":\"Fiji\",\"pt\":\"Fiji\",\"nl\":\"Fiji\",\"hr\":\"Fiđi\",\"fa\":\"فیجی\",\"de\":\"Fidschi\",\"es\":\"Fiyi\",\"fr\":\"Fidji\",\"ja\":\"フィジー\",\"it\":\"Figi\",\"cn\":\"斐济\",\"tr\":\"Fiji\"}', -18.00000000, 175.00000000, '🇫🇯', 'U+1F1EB U+1F1EF', '2018-07-20 13:11:03', '2022-05-21 03:20:25', 1, 1),
(74, 'Finland', 'FIN', '246', 'FI', '358', 'Helsinki', 'EUR', 'Euro', '€', '.fi', 'Suomi', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Europe/Helsinki\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"핀란드\",\"pt-BR\":\"Finlândia\",\"pt\":\"Finlândia\",\"nl\":\"Finland\",\"hr\":\"Finska\",\"fa\":\"فنلاند\",\"de\":\"Finnland\",\"es\":\"Finlandia\",\"fr\":\"Finlande\",\"ja\":\"フィンランド\",\"it\":\"Finlandia\",\"cn\":\"芬兰\",\"tr\":\"Finlandiya\"}', 64.00000000, 26.00000000, '🇫🇮', 'U+1F1EB U+1F1EE', '2018-07-20 13:11:03', '2022-05-21 03:20:25', 1, 1),
(75, 'France', 'FRA', '250', 'FR', '33', 'Paris', 'EUR', 'Euro', '€', '.fr', 'France', 'Europe', 'Western Europe', '[{\"zoneName\":\"Europe/Paris\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"프랑스\",\"pt-BR\":\"França\",\"pt\":\"França\",\"nl\":\"Frankrijk\",\"hr\":\"Francuska\",\"fa\":\"فرانسه\",\"de\":\"Frankreich\",\"es\":\"Francia\",\"fr\":\"France\",\"ja\":\"フランス\",\"it\":\"Francia\",\"cn\":\"法国\",\"tr\":\"Fransa\"}', 46.00000000, 2.00000000, '🇫🇷', 'U+1F1EB U+1F1F7', '2018-07-20 13:11:03', '2022-05-21 03:20:25', 1, 1),
(76, 'French Guiana', 'GUF', '254', 'GF', '594', 'Cayenne', 'EUR', 'Euro', '€', '.gf', 'Guyane française', 'Americas', 'South America', '[{\"zoneName\":\"America/Cayenne\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"GFT\",\"tzName\":\"French Guiana Time\"}]', '{\"kr\":\"프랑스령 기아나\",\"pt-BR\":\"Guiana Francesa\",\"pt\":\"Guiana Francesa\",\"nl\":\"Frans-Guyana\",\"hr\":\"Francuska Gvajana\",\"fa\":\"گویان فرانسه\",\"de\":\"Französisch Guyana\",\"es\":\"Guayana Francesa\",\"fr\":\"Guayane\",\"ja\":\"フランス領ギアナ\",\"it\":\"Guyana francese\",\"cn\":\"法属圭亚那\",\"tr\":\"Fransiz Guyanasi\"}', 4.00000000, -53.00000000, '🇬🇫', 'U+1F1EC U+1F1EB', '2018-07-20 13:11:03', '2022-05-21 03:20:25', 1, 1),
(77, 'French Polynesia', 'PYF', '258', 'PF', '689', 'Papeete', 'XPF', 'CFP franc', '₣', '.pf', 'Polynésie française', 'Oceania', 'Polynesia', '[{\"zoneName\":\"Pacific/Gambier\",\"gmtOffset\":-32400,\"gmtOffsetName\":\"UTC-09:00\",\"abbreviation\":\"GAMT\",\"tzName\":\"Gambier Islands Time\"},{\"zoneName\":\"Pacific/Marquesas\",\"gmtOffset\":-34200,\"gmtOffsetName\":\"UTC-09:30\",\"abbreviation\":\"MART\",\"tzName\":\"Marquesas Islands Time\"},{\"zoneName\":\"Pacific/Tahiti\",\"gmtOffset\":-36000,\"gmtOffsetName\":\"UTC-10:00\",\"abbreviation\":\"TAHT\",\"tzName\":\"Tahiti Time\"}]', '{\"kr\":\"프랑스령 폴리네시아\",\"pt-BR\":\"Polinésia Francesa\",\"pt\":\"Polinésia Francesa\",\"nl\":\"Frans-Polynesië\",\"hr\":\"Francuska Polinezija\",\"fa\":\"پلی‌نزی فرانسه\",\"de\":\"Französisch-Polynesien\",\"es\":\"Polinesia Francesa\",\"fr\":\"Polynésie française\",\"ja\":\"フランス領ポリネシア\",\"it\":\"Polinesia Francese\",\"cn\":\"法属波利尼西亚\",\"tr\":\"Fransiz Polinezyasi\"}', -15.00000000, -140.00000000, '🇵🇫', 'U+1F1F5 U+1F1EB', '2018-07-20 13:11:03', '2022-05-21 03:20:25', 1, 1),
(78, 'French Southern Territories', 'ATF', '260', 'TF', '262', 'Port-aux-Francais', 'EUR', 'Euro', '€', '.tf', 'Territoire des Terres australes et antarctiques fr', 'Africa', 'Southern Africa', '[{\"zoneName\":\"Indian/Kerguelen\",\"gmtOffset\":18000,\"gmtOffsetName\":\"UTC+05:00\",\"abbreviation\":\"TFT\",\"tzName\":\"French Southern and Antarctic Time\"}]', '{\"kr\":\"프랑스령 남방 및 남극\",\"pt-BR\":\"Terras Austrais e Antárticas Francesas\",\"pt\":\"Terras Austrais e Antárticas Francesas\",\"nl\":\"Franse Gebieden in de zuidelijke Indische Oceaan\",\"hr\":\"Francuski južni i antarktički teritoriji\",\"fa\":\"سرزمین‌های جنوبی و جنوبگانی فرانسه\",\"de\":\"Französische Süd- und Antarktisgebiete\",\"es\":\"Tierras Australes y Antárticas Francesas\",\"fr\":\"Terres australes et antarctiques françaises\",\"ja\":\"フランス領南方・南極地域\",\"it\":\"Territori Francesi del Sud\",\"cn\":\"法属南部领地\",\"tr\":\"Fransiz Güney Topraklari\"}', -49.25000000, 69.16700000, '🇹🇫', 'U+1F1F9 U+1F1EB', '2018-07-20 13:11:03', '2022-05-21 03:20:25', 1, 1),
(79, 'Gabon', 'GAB', '266', 'GA', '241', 'Libreville', 'XAF', 'Central African CFA franc', 'FCFA', '.ga', 'Gabon', 'Africa', 'Middle Africa', '[{\"zoneName\":\"Africa/Libreville\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"WAT\",\"tzName\":\"West Africa Time\"}]', '{\"kr\":\"가봉\",\"pt-BR\":\"Gabão\",\"pt\":\"Gabão\",\"nl\":\"Gabon\",\"hr\":\"Gabon\",\"fa\":\"گابن\",\"de\":\"Gabun\",\"es\":\"Gabón\",\"fr\":\"Gabon\",\"ja\":\"ガボン\",\"it\":\"Gabon\",\"cn\":\"加蓬\",\"tr\":\"Gabon\"}', -1.00000000, 11.75000000, '🇬🇦', 'U+1F1EC U+1F1E6', '2018-07-20 13:11:03', '2022-05-21 03:20:25', 1, 1),
(80, 'Gambia The', 'GMB', '270', 'GM', '220', 'Banjul', 'GMD', 'Gambian dalasi', 'D', '.gm', 'Gambia', 'Africa', 'Western Africa', '[{\"zoneName\":\"Africa/Banjul\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"감비아\",\"pt-BR\":\"Gâmbia\",\"pt\":\"Gâmbia\",\"nl\":\"Gambia\",\"hr\":\"Gambija\",\"fa\":\"گامبیا\",\"de\":\"Gambia\",\"es\":\"Gambia\",\"fr\":\"Gambie\",\"ja\":\"ガンビア\",\"it\":\"Gambia\",\"cn\":\"冈比亚\",\"tr\":\"Gambiya\"}', 13.46666666, -16.56666666, '🇬🇲', 'U+1F1EC U+1F1F2', '2018-07-20 13:11:03', '2022-05-21 03:20:25', 1, 1),
(81, 'Georgia', 'GEO', '268', 'GE', '995', 'Tbilisi', 'GEL', 'Georgian lari', 'ლ', '.ge', 'საქართველო', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Tbilisi\",\"gmtOffset\":14400,\"gmtOffsetName\":\"UTC+04:00\",\"abbreviation\":\"GET\",\"tzName\":\"Georgia Standard Time\"}]', '{\"kr\":\"조지아\",\"pt-BR\":\"Geórgia\",\"pt\":\"Geórgia\",\"nl\":\"Georgië\",\"hr\":\"Gruzija\",\"fa\":\"گرجستان\",\"de\":\"Georgien\",\"es\":\"Georgia\",\"fr\":\"Géorgie\",\"ja\":\"グルジア\",\"it\":\"Georgia\",\"cn\":\"格鲁吉亚\",\"tr\":\"Gürcistan\"}', 42.00000000, 43.50000000, '🇬🇪', 'U+1F1EC U+1F1EA', '2018-07-20 13:11:03', '2022-05-21 03:20:25', 1, 1),
(82, 'Germany', 'DEU', '276', 'DE', '49', 'Berlin', 'EUR', 'Euro', '€', '.de', 'Deutschland', 'Europe', 'Western Europe', '[{\"zoneName\":\"Europe/Berlin\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"},{\"zoneName\":\"Europe/Busingen\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"독일\",\"pt-BR\":\"Alemanha\",\"pt\":\"Alemanha\",\"nl\":\"Duitsland\",\"hr\":\"Njemačka\",\"fa\":\"آلمان\",\"de\":\"Deutschland\",\"es\":\"Alemania\",\"fr\":\"Allemagne\",\"ja\":\"ドイツ\",\"it\":\"Germania\",\"cn\":\"德国\",\"tr\":\"Almanya\"}', 51.00000000, 9.00000000, '🇩🇪', 'U+1F1E9 U+1F1EA', '2018-07-20 13:11:03', '2022-05-21 03:20:25', 1, 1),
(83, 'Ghana', 'GHA', '288', 'GH', '233', 'Accra', 'GHS', 'Ghanaian cedi', 'GH₵', '.gh', 'Ghana', 'Africa', 'Western Africa', '[{\"zoneName\":\"Africa/Accra\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"가나\",\"pt-BR\":\"Gana\",\"pt\":\"Gana\",\"nl\":\"Ghana\",\"hr\":\"Gana\",\"fa\":\"غنا\",\"de\":\"Ghana\",\"es\":\"Ghana\",\"fr\":\"Ghana\",\"ja\":\"ガーナ\",\"it\":\"Ghana\",\"cn\":\"加纳\",\"tr\":\"Gana\"}', 8.00000000, -2.00000000, '🇬🇭', 'U+1F1EC U+1F1ED', '2018-07-20 13:11:03', '2022-05-21 03:20:25', 1, 1),
(84, 'Gibraltar', 'GIB', '292', 'GI', '350', 'Gibraltar', 'GIP', 'Gibraltar pound', '£', '.gi', 'Gibraltar', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Europe/Gibraltar\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"지브롤터\",\"pt-BR\":\"Gibraltar\",\"pt\":\"Gibraltar\",\"nl\":\"Gibraltar\",\"hr\":\"Gibraltar\",\"fa\":\"جبل‌طارق\",\"de\":\"Gibraltar\",\"es\":\"Gibraltar\",\"fr\":\"Gibraltar\",\"ja\":\"ジブラルタル\",\"it\":\"Gibilterra\",\"cn\":\"直布罗陀\",\"tr\":\"Cebelitarik\"}', 36.13333333, -5.35000000, '🇬🇮', 'U+1F1EC U+1F1EE', '2018-07-20 13:11:03', '2022-05-21 03:20:25', 1, 1),
(85, 'Greece', 'GRC', '300', 'GR', '30', 'Athens', 'EUR', 'Euro', '€', '.gr', 'Ελλάδα', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Europe/Athens\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"그리스\",\"pt-BR\":\"Grécia\",\"pt\":\"Grécia\",\"nl\":\"Griekenland\",\"hr\":\"Grčka\",\"fa\":\"یونان\",\"de\":\"Griechenland\",\"es\":\"Grecia\",\"fr\":\"Grèce\",\"ja\":\"ギリシャ\",\"it\":\"Grecia\",\"cn\":\"希腊\",\"tr\":\"Yunanistan\"}', 39.00000000, 22.00000000, '🇬🇷', 'U+1F1EC U+1F1F7', '2018-07-20 13:11:03', '2022-05-21 03:20:25', 1, 1),
(86, 'Greenland', 'GRL', '304', 'GL', '299', 'Nuuk', 'DKK', 'Danish krone', 'Kr.', '.gl', 'Kalaallit Nunaat', 'Americas', 'Northern America', '[{\"zoneName\":\"America/Danmarkshavn\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"},{\"zoneName\":\"America/Nuuk\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"WGT\",\"tzName\":\"West Greenland Time\"},{\"zoneName\":\"America/Scoresbysund\",\"gmtOffset\":-3600,\"gmtOffsetName\":\"UTC-01:00\",\"abbreviation\":\"EGT\",\"tzName\":\"Eastern Greenland Time\"},{\"zoneName\":\"America/Thule\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"그린란드\",\"pt-BR\":\"Groelândia\",\"pt\":\"Gronelândia\",\"nl\":\"Groenland\",\"hr\":\"Grenland\",\"fa\":\"گرینلند\",\"de\":\"Grönland\",\"es\":\"Groenlandia\",\"fr\":\"Groenland\",\"ja\":\"グリーンランド\",\"it\":\"Groenlandia\",\"cn\":\"格陵兰岛\",\"tr\":\"Grönland\"}', 72.00000000, -40.00000000, '🇬🇱', 'U+1F1EC U+1F1F1', '2018-07-20 13:11:03', '2022-05-21 03:20:25', 1, 1),
(87, 'Grenada', 'GRD', '308', 'GD', '+1-473', 'St. George\'s', 'XCD', 'Eastern Caribbean dollar', '$', '.gd', 'Grenada', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Grenada\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"그레나다\",\"pt-BR\":\"Granada\",\"pt\":\"Granada\",\"nl\":\"Grenada\",\"hr\":\"Grenada\",\"fa\":\"گرنادا\",\"de\":\"Grenada\",\"es\":\"Grenada\",\"fr\":\"Grenade\",\"ja\":\"グレナダ\",\"it\":\"Grenada\",\"cn\":\"格林纳达\",\"tr\":\"Grenada\"}', 12.11666666, -61.66666666, '🇬🇩', 'U+1F1EC U+1F1E9', '2018-07-20 13:11:03', '2022-05-21 03:20:25', 1, 1),
(88, 'Guadeloupe', 'GLP', '312', 'GP', '590', 'Basse-Terre', 'EUR', 'Euro', '€', '.gp', 'Guadeloupe', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Guadeloupe\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"과들루프\",\"pt-BR\":\"Guadalupe\",\"pt\":\"Guadalupe\",\"nl\":\"Guadeloupe\",\"hr\":\"Gvadalupa\",\"fa\":\"جزیره گوادلوپ\",\"de\":\"Guadeloupe\",\"es\":\"Guadalupe\",\"fr\":\"Guadeloupe\",\"ja\":\"グアドループ\",\"it\":\"Guadeloupa\",\"cn\":\"瓜德罗普岛\",\"tr\":\"Guadeloupe\"}', 16.25000000, -61.58333300, '🇬🇵', 'U+1F1EC U+1F1F5', '2018-07-20 13:11:03', '2022-05-21 03:20:25', 1, 1),
(89, 'Guam', 'GUM', '316', 'GU', '+1-671', 'Hagatna', 'USD', 'US Dollar', '$', '.gu', 'Guam', 'Oceania', 'Micronesia', '[{\"zoneName\":\"Pacific/Guam\",\"gmtOffset\":36000,\"gmtOffsetName\":\"UTC+10:00\",\"abbreviation\":\"CHST\",\"tzName\":\"Chamorro Standard Time\"}]', '{\"kr\":\"괌\",\"pt-BR\":\"Guam\",\"pt\":\"Guame\",\"nl\":\"Guam\",\"hr\":\"Guam\",\"fa\":\"گوام\",\"de\":\"Guam\",\"es\":\"Guam\",\"fr\":\"Guam\",\"ja\":\"グアム\",\"it\":\"Guam\",\"cn\":\"关岛\",\"tr\":\"Guam\"}', 13.46666666, 144.78333333, '🇬🇺', 'U+1F1EC U+1F1FA', '2018-07-20 13:11:03', '2022-05-21 03:20:25', 1, 1),
(90, 'Guatemala', 'GTM', '320', 'GT', '502', 'Guatemala City', 'GTQ', 'Guatemalan quetzal', 'Q', '.gt', 'Guatemala', 'Americas', 'Central America', '[{\"zoneName\":\"America/Guatemala\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"}]', '{\"kr\":\"과테말라\",\"pt-BR\":\"Guatemala\",\"pt\":\"Guatemala\",\"nl\":\"Guatemala\",\"hr\":\"Gvatemala\",\"fa\":\"گواتمالا\",\"de\":\"Guatemala\",\"es\":\"Guatemala\",\"fr\":\"Guatemala\",\"ja\":\"グアテマラ\",\"it\":\"Guatemala\",\"cn\":\"危地马拉\",\"tr\":\"Guatemala\"}', 15.50000000, -90.25000000, '🇬🇹', 'U+1F1EC U+1F1F9', '2018-07-20 13:11:03', '2022-05-21 03:20:25', 1, 1),
(91, 'Guernsey and Alderney', 'GGY', '831', 'GG', '+44-1481', 'St Peter Port', 'GBP', 'British pound', '£', '.gg', 'Guernsey', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Europe/Guernsey\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"건지, 올더니\",\"pt-BR\":\"Guernsey\",\"pt\":\"Guernsey\",\"nl\":\"Guernsey\",\"hr\":\"Guernsey\",\"fa\":\"گرنزی\",\"de\":\"Guernsey\",\"es\":\"Guernsey\",\"fr\":\"Guernesey\",\"ja\":\"ガーンジー\",\"it\":\"Guernsey\",\"cn\":\"根西岛\",\"tr\":\"Alderney\"}', 49.46666666, -2.58333333, '🇬🇬', 'U+1F1EC U+1F1EC', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(92, 'Guinea', 'GIN', '324', 'GN', '224', 'Conakry', 'GNF', 'Guinean franc', 'FG', '.gn', 'Guinée', 'Africa', 'Western Africa', '[{\"zoneName\":\"Africa/Conakry\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"기니\",\"pt-BR\":\"Guiné\",\"pt\":\"Guiné\",\"nl\":\"Guinee\",\"hr\":\"Gvineja\",\"fa\":\"گینه\",\"de\":\"Guinea\",\"es\":\"Guinea\",\"fr\":\"Guinée\",\"ja\":\"ギニア\",\"it\":\"Guinea\",\"cn\":\"几内亚\",\"tr\":\"Gine\"}', 11.00000000, -10.00000000, '🇬🇳', 'U+1F1EC U+1F1F3', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(93, 'Guinea-Bissau', 'GNB', '624', 'GW', '245', 'Bissau', 'XOF', 'West African CFA franc', 'CFA', '.gw', 'Guiné-Bissau', 'Africa', 'Western Africa', '[{\"zoneName\":\"Africa/Bissau\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"기니비사우\",\"pt-BR\":\"Guiné-Bissau\",\"pt\":\"Guiné-Bissau\",\"nl\":\"Guinee-Bissau\",\"hr\":\"Gvineja Bisau\",\"fa\":\"گینه بیسائو\",\"de\":\"Guinea-Bissau\",\"es\":\"Guinea-Bisáu\",\"fr\":\"Guinée-Bissau\",\"ja\":\"ギニアビサウ\",\"it\":\"Guinea-Bissau\",\"cn\":\"几内亚比绍\",\"tr\":\"Gine-bissau\"}', 12.00000000, -15.00000000, '🇬🇼', 'U+1F1EC U+1F1FC', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(94, 'Guyana', 'GUY', '328', 'GY', '592', 'Georgetown', 'GYD', 'Guyanese dollar', '$', '.gy', 'Guyana', 'Americas', 'South America', '[{\"zoneName\":\"America/Guyana\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"GYT\",\"tzName\":\"Guyana Time\"}]', '{\"kr\":\"가이아나\",\"pt-BR\":\"Guiana\",\"pt\":\"Guiana\",\"nl\":\"Guyana\",\"hr\":\"Gvajana\",\"fa\":\"گویان\",\"de\":\"Guyana\",\"es\":\"Guyana\",\"fr\":\"Guyane\",\"ja\":\"ガイアナ\",\"it\":\"Guyana\",\"cn\":\"圭亚那\",\"tr\":\"Guyana\"}', 5.00000000, -59.00000000, '🇬🇾', 'U+1F1EC U+1F1FE', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(95, 'Haiti', 'HTI', '332', 'HT', '509', 'Port-au-Prince', 'HTG', 'Haitian gourde', 'G', '.ht', 'Haïti', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Port-au-Prince\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"}]', '{\"kr\":\"아이티\",\"pt-BR\":\"Haiti\",\"pt\":\"Haiti\",\"nl\":\"Haïti\",\"hr\":\"Haiti\",\"fa\":\"هائیتی\",\"de\":\"Haiti\",\"es\":\"Haiti\",\"fr\":\"Haïti\",\"ja\":\"ハイチ\",\"it\":\"Haiti\",\"cn\":\"海地\",\"tr\":\"Haiti\"}', 19.00000000, -72.41666666, '🇭🇹', 'U+1F1ED U+1F1F9', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(96, 'Heard Island and McDonald Islands', 'HMD', '334', 'HM', '672', '', 'AUD', 'Australian dollar', '$', '.hm', 'Heard Island and McDonald Islands', '', '', '[{\"zoneName\":\"Indian/Kerguelen\",\"gmtOffset\":18000,\"gmtOffsetName\":\"UTC+05:00\",\"abbreviation\":\"TFT\",\"tzName\":\"French Southern and Antarctic Time\"}]', '{\"kr\":\"허드 맥도날드 제도\",\"pt-BR\":\"Ilha Heard e Ilhas McDonald\",\"pt\":\"Ilha Heard e Ilhas McDonald\",\"nl\":\"Heard- en McDonaldeilanden\",\"hr\":\"Otok Heard i otočje McDonald\",\"fa\":\"جزیره هرد و جزایر مک‌دونالد\",\"de\":\"Heard und die McDonaldinseln\",\"es\":\"Islas Heard y McDonald\",\"fr\":\"Îles Heard-et-MacDonald\",\"ja\":\"ハード島とマクドナルド諸島\",\"it\":\"Isole Heard e McDonald\",\"cn\":\"赫德·唐纳岛及麦唐纳岛\",\"tr\":\"Heard Adasi Ve Mcdonald Adalari\"}', -53.10000000, 72.51666666, '🇭🇲', 'U+1F1ED U+1F1F2', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(97, 'Honduras', 'HND', '340', 'HN', '504', 'Tegucigalpa', 'HNL', 'Honduran lempira', 'L', '.hn', 'Honduras', 'Americas', 'Central America', '[{\"zoneName\":\"America/Tegucigalpa\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"}]', '{\"kr\":\"온두라스\",\"pt-BR\":\"Honduras\",\"pt\":\"Honduras\",\"nl\":\"Honduras\",\"hr\":\"Honduras\",\"fa\":\"هندوراس\",\"de\":\"Honduras\",\"es\":\"Honduras\",\"fr\":\"Honduras\",\"ja\":\"ホンジュラス\",\"it\":\"Honduras\",\"cn\":\"洪都拉斯\",\"tr\":\"Honduras\"}', 15.00000000, -86.50000000, '🇭🇳', 'U+1F1ED U+1F1F3', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(98, 'Hong Kong S.A.R.', 'HKG', '344', 'HK', '852', 'Hong Kong', 'HKD', 'Hong Kong dollar', '$', '.hk', '香港', 'Asia', 'Eastern Asia', '[{\"zoneName\":\"Asia/Hong_Kong\",\"gmtOffset\":28800,\"gmtOffsetName\":\"UTC+08:00\",\"abbreviation\":\"HKT\",\"tzName\":\"Hong Kong Time\"}]', '{\"kr\":\"홍콩\",\"pt-BR\":\"Hong Kong\",\"pt\":\"Hong Kong\",\"nl\":\"Hongkong\",\"hr\":\"Hong Kong\",\"fa\":\"هنگ‌کنگ\",\"de\":\"Hong Kong\",\"es\":\"Hong Kong\",\"fr\":\"Hong Kong\",\"ja\":\"香港\",\"it\":\"Hong Kong\",\"cn\":\"中国香港\",\"tr\":\"Hong Kong\"}', 22.25000000, 114.16666666, '🇭🇰', 'U+1F1ED U+1F1F0', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(99, 'Hungary', 'HUN', '348', 'HU', '36', 'Budapest', 'HUF', 'Hungarian forint', 'Ft', '.hu', 'Magyarország', 'Europe', 'Eastern Europe', '[{\"zoneName\":\"Europe/Budapest\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"헝가리\",\"pt-BR\":\"Hungria\",\"pt\":\"Hungria\",\"nl\":\"Hongarije\",\"hr\":\"Mađarska\",\"fa\":\"مجارستان\",\"de\":\"Ungarn\",\"es\":\"Hungría\",\"fr\":\"Hongrie\",\"ja\":\"ハンガリー\",\"it\":\"Ungheria\",\"cn\":\"匈牙利\",\"tr\":\"Macaristan\"}', 47.00000000, 20.00000000, '🇭🇺', 'U+1F1ED U+1F1FA', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(100, 'Iceland', 'ISL', '352', 'IS', '354', 'Reykjavik', 'ISK', 'Icelandic króna', 'kr', '.is', 'Ísland', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Atlantic/Reykjavik\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"아이슬란드\",\"pt-BR\":\"Islândia\",\"pt\":\"Islândia\",\"nl\":\"IJsland\",\"hr\":\"Island\",\"fa\":\"ایسلند\",\"de\":\"Island\",\"es\":\"Islandia\",\"fr\":\"Islande\",\"ja\":\"アイスランド\",\"it\":\"Islanda\",\"cn\":\"冰岛\",\"tr\":\"İzlanda\"}', 65.00000000, -18.00000000, '🇮🇸', 'U+1F1EE U+1F1F8', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(101, 'India', 'IND', '356', 'IN', '91', 'New Delhi', 'INR', 'Indian rupee', '₹', '.in', 'भारत', 'Asia', 'Southern Asia', '[{\"zoneName\":\"Asia/Kolkata\",\"gmtOffset\":19800,\"gmtOffsetName\":\"UTC+05:30\",\"abbreviation\":\"IST\",\"tzName\":\"Indian Standard Time\"}]', '{\"kr\":\"인도\",\"pt-BR\":\"Índia\",\"pt\":\"Índia\",\"nl\":\"India\",\"hr\":\"Indija\",\"fa\":\"هند\",\"de\":\"Indien\",\"es\":\"India\",\"fr\":\"Inde\",\"ja\":\"インド\",\"it\":\"India\",\"cn\":\"印度\",\"tr\":\"Hindistan\"}', 20.00000000, 77.00000000, '🇮🇳', 'U+1F1EE U+1F1F3', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(102, 'Indonesia', 'IDN', '360', 'ID', '62', 'Jakarta', 'IDR', 'Indonesian rupiah', 'Rp', '.id', 'Indonesia', 'Asia', 'South-Eastern Asia', '[{\"zoneName\":\"Asia/Jakarta\",\"gmtOffset\":25200,\"gmtOffsetName\":\"UTC+07:00\",\"abbreviation\":\"WIB\",\"tzName\":\"Western Indonesian Time\"},{\"zoneName\":\"Asia/Jayapura\",\"gmtOffset\":32400,\"gmtOffsetName\":\"UTC+09:00\",\"abbreviation\":\"WIT\",\"tzName\":\"Eastern Indonesian Time\"},{\"zoneName\":\"Asia/Makassar\",\"gmtOffset\":28800,\"gmtOffsetName\":\"UTC+08:00\",\"abbreviation\":\"WITA\",\"tzName\":\"Central Indonesia Time\"},{\"zoneName\":\"Asia/Pontianak\",\"gmtOffset\":25200,\"gmtOffsetName\":\"UTC+07:00\",\"abbreviation\":\"WIB\",\"tzName\":\"Western Indonesian Time\"}]', '{\"kr\":\"인도네시아\",\"pt-BR\":\"Indonésia\",\"pt\":\"Indonésia\",\"nl\":\"Indonesië\",\"hr\":\"Indonezija\",\"fa\":\"اندونزی\",\"de\":\"Indonesien\",\"es\":\"Indonesia\",\"fr\":\"Indonésie\",\"ja\":\"インドネシア\",\"it\":\"Indonesia\",\"cn\":\"印度尼西亚\",\"tr\":\"Endonezya\"}', -5.00000000, 120.00000000, '🇮🇩', 'U+1F1EE U+1F1E9', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(103, 'Iran', 'IRN', '364', 'IR', '98', 'Tehran', 'IRR', 'Iranian rial', '﷼', '.ir', 'ایران', 'Asia', 'Southern Asia', '[{\"zoneName\":\"Asia/Tehran\",\"gmtOffset\":12600,\"gmtOffsetName\":\"UTC+03:30\",\"abbreviation\":\"IRDT\",\"tzName\":\"Iran Daylight Time\"}]', '{\"kr\":\"이란\",\"pt-BR\":\"Irã\",\"pt\":\"Irão\",\"nl\":\"Iran\",\"hr\":\"Iran\",\"fa\":\"ایران\",\"de\":\"Iran\",\"es\":\"Iran\",\"fr\":\"Iran\",\"ja\":\"イラン・イスラム共和国\",\"cn\":\"伊朗\",\"tr\":\"İran\"}', 32.00000000, 53.00000000, '🇮🇷', 'U+1F1EE U+1F1F7', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(104, 'Iraq', 'IRQ', '368', 'IQ', '964', 'Baghdad', 'IQD', 'Iraqi dinar', 'د.ع', '.iq', 'العراق', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Baghdad\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"AST\",\"tzName\":\"Arabia Standard Time\"}]', '{\"kr\":\"이라크\",\"pt-BR\":\"Iraque\",\"pt\":\"Iraque\",\"nl\":\"Irak\",\"hr\":\"Irak\",\"fa\":\"عراق\",\"de\":\"Irak\",\"es\":\"Irak\",\"fr\":\"Irak\",\"ja\":\"イラク\",\"it\":\"Iraq\",\"cn\":\"伊拉克\",\"tr\":\"Irak\"}', 33.00000000, 44.00000000, '🇮🇶', 'U+1F1EE U+1F1F6', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(105, 'Ireland', 'IRL', '372', 'IE', '353', 'Dublin', 'EUR', 'Euro', '€', '.ie', 'Éire', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Europe/Dublin\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"아일랜드\",\"pt-BR\":\"Irlanda\",\"pt\":\"Irlanda\",\"nl\":\"Ierland\",\"hr\":\"Irska\",\"fa\":\"ایرلند\",\"de\":\"Irland\",\"es\":\"Irlanda\",\"fr\":\"Irlande\",\"ja\":\"アイルランド\",\"it\":\"Irlanda\",\"cn\":\"爱尔兰\",\"tr\":\"İrlanda\"}', 53.00000000, -8.00000000, '🇮🇪', 'U+1F1EE U+1F1EA', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(106, 'Israel', 'ISR', '376', 'IL', '972', 'Jerusalem', 'ILS', 'Israeli new shekel', '₪', '.il', 'יִשְׂרָאֵל', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Jerusalem\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"IST\",\"tzName\":\"Israel Standard Time\"}]', '{\"kr\":\"이스라엘\",\"pt-BR\":\"Israel\",\"pt\":\"Israel\",\"nl\":\"Israël\",\"hr\":\"Izrael\",\"fa\":\"اسرائیل\",\"de\":\"Israel\",\"es\":\"Israel\",\"fr\":\"Israël\",\"ja\":\"イスラエル\",\"it\":\"Israele\",\"cn\":\"以色列\",\"tr\":\"İsrail\"}', 31.50000000, 34.75000000, '🇮🇱', 'U+1F1EE U+1F1F1', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(107, 'Italy', 'ITA', '380', 'IT', '39', 'Rome', 'EUR', 'Euro', '€', '.it', 'Italia', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Europe/Rome\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"이탈리아\",\"pt-BR\":\"Itália\",\"pt\":\"Itália\",\"nl\":\"Italië\",\"hr\":\"Italija\",\"fa\":\"ایتالیا\",\"de\":\"Italien\",\"es\":\"Italia\",\"fr\":\"Italie\",\"ja\":\"イタリア\",\"it\":\"Italia\",\"cn\":\"意大利\",\"tr\":\"İtalya\"}', 42.83333333, 12.83333333, '🇮🇹', 'U+1F1EE U+1F1F9', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(108, 'Jamaica', 'JAM', '388', 'JM', '+1-876', 'Kingston', 'JMD', 'Jamaican dollar', 'J$', '.jm', 'Jamaica', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Jamaica\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"}]', '{\"kr\":\"자메이카\",\"pt-BR\":\"Jamaica\",\"pt\":\"Jamaica\",\"nl\":\"Jamaica\",\"hr\":\"Jamajka\",\"fa\":\"جامائیکا\",\"de\":\"Jamaika\",\"es\":\"Jamaica\",\"fr\":\"Jamaïque\",\"ja\":\"ジャマイカ\",\"it\":\"Giamaica\",\"cn\":\"牙买加\",\"tr\":\"Jamaika\"}', 18.25000000, -77.50000000, '🇯🇲', 'U+1F1EF U+1F1F2', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(109, 'Japan', 'JPN', '392', 'JP', '81', 'Tokyo', 'JPY', 'Japanese yen', '¥', '.jp', '日本', 'Asia', 'Eastern Asia', '[{\"zoneName\":\"Asia/Tokyo\",\"gmtOffset\":32400,\"gmtOffsetName\":\"UTC+09:00\",\"abbreviation\":\"JST\",\"tzName\":\"Japan Standard Time\"}]', '{\"kr\":\"일본\",\"pt-BR\":\"Japão\",\"pt\":\"Japão\",\"nl\":\"Japan\",\"hr\":\"Japan\",\"fa\":\"ژاپن\",\"de\":\"Japan\",\"es\":\"Japón\",\"fr\":\"Japon\",\"ja\":\"日本\",\"it\":\"Giappone\",\"cn\":\"日本\",\"tr\":\"Japonya\"}', 36.00000000, 138.00000000, '🇯🇵', 'U+1F1EF U+1F1F5', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(110, 'Jersey', 'JEY', '832', 'JE', '+44-1534', 'Saint Helier', 'GBP', 'British pound', '£', '.je', 'Jersey', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Europe/Jersey\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"저지 섬\",\"pt-BR\":\"Jersey\",\"pt\":\"Jersey\",\"nl\":\"Jersey\",\"hr\":\"Jersey\",\"fa\":\"جرزی\",\"de\":\"Jersey\",\"es\":\"Jersey\",\"fr\":\"Jersey\",\"ja\":\"ジャージー\",\"it\":\"Isola di Jersey\",\"cn\":\"泽西岛\",\"tr\":\"Jersey\"}', 49.25000000, -2.16666666, '🇯🇪', 'U+1F1EF U+1F1EA', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(111, 'Jordan', 'JOR', '400', 'JO', '962', 'Amman', 'JOD', 'Jordanian dinar', 'ا.د', '.jo', 'الأردن', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Amman\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"요르단\",\"pt-BR\":\"Jordânia\",\"pt\":\"Jordânia\",\"nl\":\"Jordanië\",\"hr\":\"Jordan\",\"fa\":\"اردن\",\"de\":\"Jordanien\",\"es\":\"Jordania\",\"fr\":\"Jordanie\",\"ja\":\"ヨルダン\",\"it\":\"Giordania\",\"cn\":\"约旦\",\"tr\":\"Ürdün\"}', 31.00000000, 36.00000000, '🇯🇴', 'U+1F1EF U+1F1F4', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(112, 'Kazakhstan', 'KAZ', '398', 'KZ', '7', 'Astana', 'KZT', 'Kazakhstani tenge', 'лв', '.kz', 'Қазақстан', 'Asia', 'Central Asia', '[{\"zoneName\":\"Asia/Almaty\",\"gmtOffset\":21600,\"gmtOffsetName\":\"UTC+06:00\",\"abbreviation\":\"ALMT\",\"tzName\":\"Alma-Ata Time[1\"},{\"zoneName\":\"Asia/Aqtau\",\"gmtOffset\":18000,\"gmtOffsetName\":\"UTC+05:00\",\"abbreviation\":\"AQTT\",\"tzName\":\"Aqtobe Time\"},{\"zoneName\":\"Asia/Aqtobe\",\"gmtOffset\":18000,\"gmtOffsetName\":\"UTC+05:00\",\"abbreviation\":\"AQTT\",\"tzName\":\"Aqtobe Time\"},{\"zoneName\":\"Asia/Atyrau\",\"gmtOffset\":18000,\"gmtOffsetName\":\"UTC+05:00\",\"abbreviation\":\"MSD+1\",\"tzName\":\"Moscow Daylight Time+1\"},{\"zoneName\":\"Asia/Oral\",\"gmtOffset\":18000,\"gmtOffsetName\":\"UTC+05:00\",\"abbreviation\":\"ORAT\",\"tzName\":\"Oral Time\"},{\"zoneName\":\"Asia/Qostanay\",\"gmtOffset\":21600,\"gmtOffsetName\":\"UTC+06:00\",\"abbreviation\":\"QYZST\",\"tzName\":\"Qyzylorda Summer Time\"},{\"zoneName\":\"Asia/Qyzylorda\",\"gmtOffset\":18000,\"gmtOffsetName\":\"UTC+05:00\",\"abbreviation\":\"QYZT\",\"tzName\":\"Qyzylorda Summer Time\"}]', '{\"kr\":\"카자흐스탄\",\"pt-BR\":\"Cazaquistão\",\"pt\":\"Cazaquistão\",\"nl\":\"Kazachstan\",\"hr\":\"Kazahstan\",\"fa\":\"قزاقستان\",\"de\":\"Kasachstan\",\"es\":\"Kazajistán\",\"fr\":\"Kazakhstan\",\"ja\":\"カザフスタン\",\"it\":\"Kazakistan\",\"cn\":\"哈萨克斯坦\",\"tr\":\"Kazakistan\"}', 48.00000000, 68.00000000, '🇰🇿', 'U+1F1F0 U+1F1FF', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(113, 'Kenya', 'KEN', '404', 'KE', '254', 'Nairobi', 'KES', 'Kenyan shilling', 'KSh', '.ke', 'Kenya', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Africa/Nairobi\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"EAT\",\"tzName\":\"East Africa Time\"}]', '{\"kr\":\"케냐\",\"pt-BR\":\"Quênia\",\"pt\":\"Quénia\",\"nl\":\"Kenia\",\"hr\":\"Kenija\",\"fa\":\"کنیا\",\"de\":\"Kenia\",\"es\":\"Kenia\",\"fr\":\"Kenya\",\"ja\":\"ケニア\",\"it\":\"Kenya\",\"cn\":\"肯尼亚\",\"tr\":\"Kenya\"}', 1.00000000, 38.00000000, '🇰🇪', 'U+1F1F0 U+1F1EA', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(114, 'Kiribati', 'KIR', '296', 'KI', '686', 'Tarawa', 'AUD', 'Australian dollar', '$', '.ki', 'Kiribati', 'Oceania', 'Micronesia', '[{\"zoneName\":\"Pacific/Enderbury\",\"gmtOffset\":46800,\"gmtOffsetName\":\"UTC+13:00\",\"abbreviation\":\"PHOT\",\"tzName\":\"Phoenix Island Time\"},{\"zoneName\":\"Pacific/Kiritimati\",\"gmtOffset\":50400,\"gmtOffsetName\":\"UTC+14:00\",\"abbreviation\":\"LINT\",\"tzName\":\"Line Islands Time\"},{\"zoneName\":\"Pacific/Tarawa\",\"gmtOffset\":43200,\"gmtOffsetName\":\"UTC+12:00\",\"abbreviation\":\"GILT\",\"tzName\":\"Gilbert Island Time\"}]', '{\"kr\":\"키리바시\",\"pt-BR\":\"Kiribati\",\"pt\":\"Quiribáti\",\"nl\":\"Kiribati\",\"hr\":\"Kiribati\",\"fa\":\"کیریباتی\",\"de\":\"Kiribati\",\"es\":\"Kiribati\",\"fr\":\"Kiribati\",\"ja\":\"キリバス\",\"it\":\"Kiribati\",\"cn\":\"基里巴斯\",\"tr\":\"Kiribati\"}', 1.41666666, 173.00000000, '🇰🇮', 'U+1F1F0 U+1F1EE', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(115, 'North Korea', 'PRK', '408', 'KP', '850', 'Pyongyang', 'KPW', 'North Korean Won', '₩', '.kp', '북한', 'Asia', 'Eastern Asia', '[{\"zoneName\":\"Asia/Pyongyang\",\"gmtOffset\":32400,\"gmtOffsetName\":\"UTC+09:00\",\"abbreviation\":\"KST\",\"tzName\":\"Korea Standard Time\"}]', '{\"kr\":\"조선민주주의인민공화국\",\"pt-BR\":\"Coreia do Norte\",\"pt\":\"Coreia do Norte\",\"nl\":\"Noord-Korea\",\"hr\":\"Sjeverna Koreja\",\"fa\":\"کره جنوبی\",\"de\":\"Nordkorea\",\"es\":\"Corea del Norte\",\"fr\":\"Corée du Nord\",\"ja\":\"朝鮮民主主義人民共和国\",\"it\":\"Corea del Nord\",\"cn\":\"朝鲜\",\"tr\":\"Kuzey Kore\"}', 40.00000000, 127.00000000, '🇰🇵', 'U+1F1F0 U+1F1F5', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(116, 'South Korea', 'KOR', '410', 'KR', '82', 'Seoul', 'KRW', 'Won', '₩', '.kr', '대한민국', 'Asia', 'Eastern Asia', '[{\"zoneName\":\"Asia/Seoul\",\"gmtOffset\":32400,\"gmtOffsetName\":\"UTC+09:00\",\"abbreviation\":\"KST\",\"tzName\":\"Korea Standard Time\"}]', '{\"kr\":\"대한민국\",\"pt-BR\":\"Coreia do Sul\",\"pt\":\"Coreia do Sul\",\"nl\":\"Zuid-Korea\",\"hr\":\"Južna Koreja\",\"fa\":\"کره شمالی\",\"de\":\"Südkorea\",\"es\":\"Corea del Sur\",\"fr\":\"Corée du Sud\",\"ja\":\"大韓民国\",\"it\":\"Corea del Sud\",\"cn\":\"韩国\",\"tr\":\"Güney Kore\"}', 37.00000000, 127.50000000, '🇰🇷', 'U+1F1F0 U+1F1F7', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(117, 'Kuwait', 'KWT', '414', 'KW', '965', 'Kuwait City', 'KWD', 'Kuwaiti dinar', 'ك.د', '.kw', 'الكويت', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Kuwait\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"AST\",\"tzName\":\"Arabia Standard Time\"}]', '{\"kr\":\"쿠웨이트\",\"pt-BR\":\"Kuwait\",\"pt\":\"Kuwait\",\"nl\":\"Koeweit\",\"hr\":\"Kuvajt\",\"fa\":\"کویت\",\"de\":\"Kuwait\",\"es\":\"Kuwait\",\"fr\":\"Koweït\",\"ja\":\"クウェート\",\"it\":\"Kuwait\",\"cn\":\"科威特\",\"tr\":\"Kuveyt\"}', 29.50000000, 45.75000000, '🇰🇼', 'U+1F1F0 U+1F1FC', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(118, 'Kyrgyzstan', 'KGZ', '417', 'KG', '996', 'Bishkek', 'KGS', 'Kyrgyzstani som', 'лв', '.kg', 'Кыргызстан', 'Asia', 'Central Asia', '[{\"zoneName\":\"Asia/Bishkek\",\"gmtOffset\":21600,\"gmtOffsetName\":\"UTC+06:00\",\"abbreviation\":\"KGT\",\"tzName\":\"Kyrgyzstan Time\"}]', '{\"kr\":\"키르기스스탄\",\"pt-BR\":\"Quirguistão\",\"pt\":\"Quirguizistão\",\"nl\":\"Kirgizië\",\"hr\":\"Kirgistan\",\"fa\":\"قرقیزستان\",\"de\":\"Kirgisistan\",\"es\":\"Kirguizistán\",\"fr\":\"Kirghizistan\",\"ja\":\"キルギス\",\"it\":\"Kirghizistan\",\"cn\":\"吉尔吉斯斯坦\",\"tr\":\"Kirgizistan\"}', 41.00000000, 75.00000000, '🇰🇬', 'U+1F1F0 U+1F1EC', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(119, 'Laos', 'LAO', '418', 'LA', '856', 'Vientiane', 'LAK', 'Lao kip', '₭', '.la', 'ສປປລາວ', 'Asia', 'South-Eastern Asia', '[{\"zoneName\":\"Asia/Vientiane\",\"gmtOffset\":25200,\"gmtOffsetName\":\"UTC+07:00\",\"abbreviation\":\"ICT\",\"tzName\":\"Indochina Time\"}]', '{\"kr\":\"라오스\",\"pt-BR\":\"Laos\",\"pt\":\"Laos\",\"nl\":\"Laos\",\"hr\":\"Laos\",\"fa\":\"لائوس\",\"de\":\"Laos\",\"es\":\"Laos\",\"fr\":\"Laos\",\"ja\":\"ラオス人民民主共和国\",\"it\":\"Laos\",\"cn\":\"寮人民民主共和国\",\"tr\":\"Laos\"}', 18.00000000, 105.00000000, '🇱🇦', 'U+1F1F1 U+1F1E6', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(120, 'Latvia', 'LVA', '428', 'LV', '371', 'Riga', 'EUR', 'Euro', '€', '.lv', 'Latvija', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Europe/Riga\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"라트비아\",\"pt-BR\":\"Letônia\",\"pt\":\"Letónia\",\"nl\":\"Letland\",\"hr\":\"Latvija\",\"fa\":\"لتونی\",\"de\":\"Lettland\",\"es\":\"Letonia\",\"fr\":\"Lettonie\",\"ja\":\"ラトビア\",\"it\":\"Lettonia\",\"cn\":\"拉脱维亚\",\"tr\":\"Letonya\"}', 57.00000000, 25.00000000, '🇱🇻', 'U+1F1F1 U+1F1FB', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(121, 'Lebanon', 'LBN', '422', 'LB', '961', 'Beirut', 'LBP', 'Lebanese pound', '£', '.lb', 'لبنان', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Beirut\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"레바논\",\"pt-BR\":\"Líbano\",\"pt\":\"Líbano\",\"nl\":\"Libanon\",\"hr\":\"Libanon\",\"fa\":\"لبنان\",\"de\":\"Libanon\",\"es\":\"Líbano\",\"fr\":\"Liban\",\"ja\":\"レバノン\",\"it\":\"Libano\",\"cn\":\"黎巴嫩\",\"tr\":\"Lübnan\"}', 33.83333333, 35.83333333, '🇱🇧', 'U+1F1F1 U+1F1E7', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(122, 'Lesotho', 'LSO', '426', 'LS', '266', 'Maseru', 'LSL', 'Lesotho loti', 'L', '.ls', 'Lesotho', 'Africa', 'Southern Africa', '[{\"zoneName\":\"Africa/Maseru\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"SAST\",\"tzName\":\"South African Standard Time\"}]', '{\"kr\":\"레소토\",\"pt-BR\":\"Lesoto\",\"pt\":\"Lesoto\",\"nl\":\"Lesotho\",\"hr\":\"Lesoto\",\"fa\":\"لسوتو\",\"de\":\"Lesotho\",\"es\":\"Lesotho\",\"fr\":\"Lesotho\",\"ja\":\"レソト\",\"it\":\"Lesotho\",\"cn\":\"莱索托\",\"tr\":\"Lesotho\"}', -29.50000000, 28.50000000, '🇱🇸', 'U+1F1F1 U+1F1F8', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(123, 'Liberia', 'LBR', '430', 'LR', '231', 'Monrovia', 'LRD', 'Liberian dollar', '$', '.lr', 'Liberia', 'Africa', 'Western Africa', '[{\"zoneName\":\"Africa/Monrovia\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"라이베리아\",\"pt-BR\":\"Libéria\",\"pt\":\"Libéria\",\"nl\":\"Liberia\",\"hr\":\"Liberija\",\"fa\":\"لیبریا\",\"de\":\"Liberia\",\"es\":\"Liberia\",\"fr\":\"Liberia\",\"ja\":\"リベリア\",\"it\":\"Liberia\",\"cn\":\"利比里亚\",\"tr\":\"Liberya\"}', 6.50000000, -9.50000000, '🇱🇷', 'U+1F1F1 U+1F1F7', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(124, 'Libya', 'LBY', '434', 'LY', '218', 'Tripolis', 'LYD', 'Libyan dinar', 'د.ل', '.ly', '‏ليبيا', 'Africa', 'Northern Africa', '[{\"zoneName\":\"Africa/Tripoli\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"리비아\",\"pt-BR\":\"Líbia\",\"pt\":\"Líbia\",\"nl\":\"Libië\",\"hr\":\"Libija\",\"fa\":\"لیبی\",\"de\":\"Libyen\",\"es\":\"Libia\",\"fr\":\"Libye\",\"ja\":\"リビア\",\"it\":\"Libia\",\"cn\":\"利比亚\",\"tr\":\"Libya\"}', 25.00000000, 17.00000000, '🇱🇾', 'U+1F1F1 U+1F1FE', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(125, 'Liechtenstein', 'LIE', '438', 'LI', '423', 'Vaduz', 'CHF', 'Swiss franc', 'CHf', '.li', 'Liechtenstein', 'Europe', 'Western Europe', '[{\"zoneName\":\"Europe/Vaduz\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"리히텐슈타인\",\"pt-BR\":\"Liechtenstein\",\"pt\":\"Listenstaine\",\"nl\":\"Liechtenstein\",\"hr\":\"Lihtenštajn\",\"fa\":\"لیختن‌اشتاین\",\"de\":\"Liechtenstein\",\"es\":\"Liechtenstein\",\"fr\":\"Liechtenstein\",\"ja\":\"リヒテンシュタイン\",\"it\":\"Liechtenstein\",\"cn\":\"列支敦士登\",\"tr\":\"Lihtenştayn\"}', 47.26666666, 9.53333333, '🇱🇮', 'U+1F1F1 U+1F1EE', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(126, 'Lithuania', 'LTU', '440', 'LT', '370', 'Vilnius', 'EUR', 'Euro', '€', '.lt', 'Lietuva', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Europe/Vilnius\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"리투아니아\",\"pt-BR\":\"Lituânia\",\"pt\":\"Lituânia\",\"nl\":\"Litouwen\",\"hr\":\"Litva\",\"fa\":\"لیتوانی\",\"de\":\"Litauen\",\"es\":\"Lituania\",\"fr\":\"Lituanie\",\"ja\":\"リトアニア\",\"it\":\"Lituania\",\"cn\":\"立陶宛\",\"tr\":\"Litvanya\"}', 56.00000000, 24.00000000, '🇱🇹', 'U+1F1F1 U+1F1F9', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1);
INSERT INTO `countries` (`id`, `name`, `iso3`, `numeric_code`, `iso2`, `phonecode`, `capital`, `currency`, `currency_name`, `currency_symbol`, `tld`, `native`, `region`, `subregion`, `timezones`, `translations`, `latitude`, `longitude`, `emoji`, `emojiU`, `created_at`, `updated_at`, `flag`, `status`) VALUES
(127, 'Luxembourg', 'LUX', '442', 'LU', '352', 'Luxembourg', 'EUR', 'Euro', '€', '.lu', 'Luxembourg', 'Europe', 'Western Europe', '[{\"zoneName\":\"Europe/Luxembourg\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"룩셈부르크\",\"pt-BR\":\"Luxemburgo\",\"pt\":\"Luxemburgo\",\"nl\":\"Luxemburg\",\"hr\":\"Luksemburg\",\"fa\":\"لوکزامبورگ\",\"de\":\"Luxemburg\",\"es\":\"Luxemburgo\",\"fr\":\"Luxembourg\",\"ja\":\"ルクセンブルク\",\"it\":\"Lussemburgo\",\"cn\":\"卢森堡\",\"tr\":\"Lüksemburg\"}', 49.75000000, 6.16666666, '🇱🇺', 'U+1F1F1 U+1F1FA', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(128, 'Macau S.A.R.', 'MAC', '446', 'MO', '853', 'Macao', 'MOP', 'Macanese pataca', '$', '.mo', '澳門', 'Asia', 'Eastern Asia', '[{\"zoneName\":\"Asia/Macau\",\"gmtOffset\":28800,\"gmtOffsetName\":\"UTC+08:00\",\"abbreviation\":\"CST\",\"tzName\":\"China Standard Time\"}]', '{\"kr\":\"마카오\",\"pt-BR\":\"Macau\",\"pt\":\"Macau\",\"nl\":\"Macao\",\"hr\":\"Makao\",\"fa\":\"مکائو\",\"de\":\"Macao\",\"es\":\"Macao\",\"fr\":\"Macao\",\"ja\":\"マカオ\",\"it\":\"Macao\",\"cn\":\"中国澳门\",\"tr\":\"Makao\"}', 22.16666666, 113.55000000, '🇲🇴', 'U+1F1F2 U+1F1F4', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(129, 'North Macedonia', 'MKD', '807', 'MK', '389', 'Skopje', 'MKD', 'Denar', 'ден', '.mk', 'Северна Македонија', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Europe/Skopje\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"북마케도니아\",\"pt-BR\":\"Macedônia do Norte\",\"pt\":\"Macedónia do Norte\",\"nl\":\"Noord-Macedonië\",\"hr\":\"Sjeverna Makedonija\",\"fa\":\"ﻢﻗﺩﻮﻨﯿﻫ ﺶﻣﺎﻠﯾ\",\"de\":\"Nordmazedonien\",\"es\":\"Macedonia del Norte\",\"fr\":\"Macédoine du Nord\",\"ja\":\"北マケドニア\",\"it\":\"Macedonia del Nord\",\"cn\":\"北馬其頓\",\"tr\":\"Kuzey Makedonya\"}', 41.83333333, 22.00000000, '🇲🇰', 'U+1F1F2 U+1F1F0', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(130, 'Madagascar', 'MDG', '450', 'MG', '261', 'Antananarivo', 'MGA', 'Malagasy ariary', 'Ar', '.mg', 'Madagasikara', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Indian/Antananarivo\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"EAT\",\"tzName\":\"East Africa Time\"}]', '{\"kr\":\"마다가스카르\",\"pt-BR\":\"Madagascar\",\"pt\":\"Madagáscar\",\"nl\":\"Madagaskar\",\"hr\":\"Madagaskar\",\"fa\":\"ماداگاسکار\",\"de\":\"Madagaskar\",\"es\":\"Madagascar\",\"fr\":\"Madagascar\",\"ja\":\"マダガスカル\",\"it\":\"Madagascar\",\"cn\":\"马达加斯加\",\"tr\":\"Madagaskar\"}', -20.00000000, 47.00000000, '🇲🇬', 'U+1F1F2 U+1F1EC', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(131, 'Malawi', 'MWI', '454', 'MW', '265', 'Lilongwe', 'MWK', 'Malawian kwacha', 'MK', '.mw', 'Malawi', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Africa/Blantyre\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"CAT\",\"tzName\":\"Central Africa Time\"}]', '{\"kr\":\"말라위\",\"pt-BR\":\"Malawi\",\"pt\":\"Malávi\",\"nl\":\"Malawi\",\"hr\":\"Malavi\",\"fa\":\"مالاوی\",\"de\":\"Malawi\",\"es\":\"Malawi\",\"fr\":\"Malawi\",\"ja\":\"マラウイ\",\"it\":\"Malawi\",\"cn\":\"马拉维\",\"tr\":\"Malavi\"}', -13.50000000, 34.00000000, '🇲🇼', 'U+1F1F2 U+1F1FC', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(132, 'Malaysia', 'MYS', '458', 'MY', '60', 'Kuala Lumpur', 'MYR', 'Malaysian ringgit', 'RM', '.my', 'Malaysia', 'Asia', 'South-Eastern Asia', '[{\"zoneName\":\"Asia/Kuala_Lumpur\",\"gmtOffset\":28800,\"gmtOffsetName\":\"UTC+08:00\",\"abbreviation\":\"MYT\",\"tzName\":\"Malaysia Time\"},{\"zoneName\":\"Asia/Kuching\",\"gmtOffset\":28800,\"gmtOffsetName\":\"UTC+08:00\",\"abbreviation\":\"MYT\",\"tzName\":\"Malaysia Time\"}]', '{\"kr\":\"말레이시아\",\"pt-BR\":\"Malásia\",\"pt\":\"Malásia\",\"nl\":\"Maleisië\",\"hr\":\"Malezija\",\"fa\":\"مالزی\",\"de\":\"Malaysia\",\"es\":\"Malasia\",\"fr\":\"Malaisie\",\"ja\":\"マレーシア\",\"it\":\"Malesia\",\"cn\":\"马来西亚\",\"tr\":\"Malezya\"}', 2.50000000, 112.50000000, '🇲🇾', 'U+1F1F2 U+1F1FE', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(133, 'Maldives', 'MDV', '462', 'MV', '960', 'Male', 'MVR', 'Maldivian rufiyaa', 'Rf', '.mv', 'Maldives', 'Asia', 'Southern Asia', '[{\"zoneName\":\"Indian/Maldives\",\"gmtOffset\":18000,\"gmtOffsetName\":\"UTC+05:00\",\"abbreviation\":\"MVT\",\"tzName\":\"Maldives Time\"}]', '{\"kr\":\"몰디브\",\"pt-BR\":\"Maldivas\",\"pt\":\"Maldivas\",\"nl\":\"Maldiven\",\"hr\":\"Maldivi\",\"fa\":\"مالدیو\",\"de\":\"Malediven\",\"es\":\"Maldivas\",\"fr\":\"Maldives\",\"ja\":\"モルディブ\",\"it\":\"Maldive\",\"cn\":\"马尔代夫\",\"tr\":\"Maldivler\"}', 3.25000000, 73.00000000, '🇲🇻', 'U+1F1F2 U+1F1FB', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(134, 'Mali', 'MLI', '466', 'ML', '223', 'Bamako', 'XOF', 'West African CFA franc', 'CFA', '.ml', 'Mali', 'Africa', 'Western Africa', '[{\"zoneName\":\"Africa/Bamako\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"말리\",\"pt-BR\":\"Mali\",\"pt\":\"Mali\",\"nl\":\"Mali\",\"hr\":\"Mali\",\"fa\":\"مالی\",\"de\":\"Mali\",\"es\":\"Mali\",\"fr\":\"Mali\",\"ja\":\"マリ\",\"it\":\"Mali\",\"cn\":\"马里\",\"tr\":\"Mali\"}', 17.00000000, -4.00000000, '🇲🇱', 'U+1F1F2 U+1F1F1', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(135, 'Malta', 'MLT', '470', 'MT', '356', 'Valletta', 'EUR', 'Euro', '€', '.mt', 'Malta', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Europe/Malta\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"몰타\",\"pt-BR\":\"Malta\",\"pt\":\"Malta\",\"nl\":\"Malta\",\"hr\":\"Malta\",\"fa\":\"مالت\",\"de\":\"Malta\",\"es\":\"Malta\",\"fr\":\"Malte\",\"ja\":\"マルタ\",\"it\":\"Malta\",\"cn\":\"马耳他\",\"tr\":\"Malta\"}', 35.83333333, 14.58333333, '🇲🇹', 'U+1F1F2 U+1F1F9', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(136, 'Man (Isle of)', 'IMN', '833', 'IM', '+44-1624', 'Douglas, Isle of Man', 'GBP', 'British pound', '£', '.im', 'Isle of Man', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Europe/Isle_of_Man\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"맨 섬\",\"pt-BR\":\"Ilha de Man\",\"pt\":\"Ilha de Man\",\"nl\":\"Isle of Man\",\"hr\":\"Otok Man\",\"fa\":\"جزیره من\",\"de\":\"Insel Man\",\"es\":\"Isla de Man\",\"fr\":\"Île de Man\",\"ja\":\"マン島\",\"it\":\"Isola di Man\",\"cn\":\"马恩岛\",\"tr\":\"Man Adasi\"}', 54.25000000, -4.50000000, '🇮🇲', 'U+1F1EE U+1F1F2', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(137, 'Marshall Islands', 'MHL', '584', 'MH', '692', 'Majuro', 'USD', 'United States dollar', '$', '.mh', 'M̧ajeļ', 'Oceania', 'Micronesia', '[{\"zoneName\":\"Pacific/Kwajalein\",\"gmtOffset\":43200,\"gmtOffsetName\":\"UTC+12:00\",\"abbreviation\":\"MHT\",\"tzName\":\"Marshall Islands Time\"},{\"zoneName\":\"Pacific/Majuro\",\"gmtOffset\":43200,\"gmtOffsetName\":\"UTC+12:00\",\"abbreviation\":\"MHT\",\"tzName\":\"Marshall Islands Time\"}]', '{\"kr\":\"마셜 제도\",\"pt-BR\":\"Ilhas Marshall\",\"pt\":\"Ilhas Marshall\",\"nl\":\"Marshalleilanden\",\"hr\":\"Maršalovi Otoci\",\"fa\":\"جزایر مارشال\",\"de\":\"Marshallinseln\",\"es\":\"Islas Marshall\",\"fr\":\"Îles Marshall\",\"ja\":\"マーシャル諸島\",\"it\":\"Isole Marshall\",\"cn\":\"马绍尔群岛\",\"tr\":\"Marşal Adalari\"}', 9.00000000, 168.00000000, '🇲🇭', 'U+1F1F2 U+1F1ED', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(138, 'Martinique', 'MTQ', '474', 'MQ', '596', 'Fort-de-France', 'EUR', 'Euro', '€', '.mq', 'Martinique', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Martinique\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"마르티니크\",\"pt-BR\":\"Martinica\",\"pt\":\"Martinica\",\"nl\":\"Martinique\",\"hr\":\"Martinique\",\"fa\":\"مونتسرات\",\"de\":\"Martinique\",\"es\":\"Martinica\",\"fr\":\"Martinique\",\"ja\":\"マルティニーク\",\"it\":\"Martinica\",\"cn\":\"马提尼克岛\",\"tr\":\"Martinik\"}', 14.66666700, -61.00000000, '🇲🇶', 'U+1F1F2 U+1F1F6', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(139, 'Mauritania', 'MRT', '478', 'MR', '222', 'Nouakchott', 'MRO', 'Mauritanian ouguiya', 'MRU', '.mr', 'موريتانيا', 'Africa', 'Western Africa', '[{\"zoneName\":\"Africa/Nouakchott\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"모리타니\",\"pt-BR\":\"Mauritânia\",\"pt\":\"Mauritânia\",\"nl\":\"Mauritanië\",\"hr\":\"Mauritanija\",\"fa\":\"موریتانی\",\"de\":\"Mauretanien\",\"es\":\"Mauritania\",\"fr\":\"Mauritanie\",\"ja\":\"モーリタニア\",\"it\":\"Mauritania\",\"cn\":\"毛里塔尼亚\",\"tr\":\"Moritanya\"}', 20.00000000, -12.00000000, '🇲🇷', 'U+1F1F2 U+1F1F7', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(140, 'Mauritius', 'MUS', '480', 'MU', '230', 'Port Louis', 'MUR', 'Mauritian rupee', '₨', '.mu', 'Maurice', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Indian/Mauritius\",\"gmtOffset\":14400,\"gmtOffsetName\":\"UTC+04:00\",\"abbreviation\":\"MUT\",\"tzName\":\"Mauritius Time\"}]', '{\"kr\":\"모리셔스\",\"pt-BR\":\"Maurício\",\"pt\":\"Maurícia\",\"nl\":\"Mauritius\",\"hr\":\"Mauricijus\",\"fa\":\"موریس\",\"de\":\"Mauritius\",\"es\":\"Mauricio\",\"fr\":\"Île Maurice\",\"ja\":\"モーリシャス\",\"it\":\"Mauritius\",\"cn\":\"毛里求斯\",\"tr\":\"Morityus\"}', -20.28333333, 57.55000000, '🇲🇺', 'U+1F1F2 U+1F1FA', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(141, 'Mayotte', 'MYT', '175', 'YT', '262', 'Mamoudzou', 'EUR', 'Euro', '€', '.yt', 'Mayotte', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Indian/Mayotte\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"EAT\",\"tzName\":\"East Africa Time\"}]', '{\"kr\":\"마요트\",\"pt-BR\":\"Mayotte\",\"pt\":\"Mayotte\",\"nl\":\"Mayotte\",\"hr\":\"Mayotte\",\"fa\":\"مایوت\",\"de\":\"Mayotte\",\"es\":\"Mayotte\",\"fr\":\"Mayotte\",\"ja\":\"マヨット\",\"it\":\"Mayotte\",\"cn\":\"马约特\",\"tr\":\"Mayotte\"}', -12.83333333, 45.16666666, '🇾🇹', 'U+1F1FE U+1F1F9', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(142, 'Mexico', 'MEX', '484', 'MX', '52', 'Ciudad de México', 'MXN', 'Mexican peso', '$', '.mx', 'México', 'Americas', 'Central America', '[{\"zoneName\":\"America/Bahia_Banderas\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/Cancun\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Chihuahua\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America\"},{\"zoneName\":\"America/Hermosillo\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America\"},{\"zoneName\":\"America/Matamoros\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/Mazatlan\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America\"},{\"zoneName\":\"America/Merida\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/Mexico_City\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/Monterrey\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/Ojinaga\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America\"},{\"zoneName\":\"America/Tijuana\",\"gmtOffset\":-28800,\"gmtOffsetName\":\"UTC-08:00\",\"abbreviation\":\"PST\",\"tzName\":\"Pacific Standard Time (North America\"}]', '{\"kr\":\"멕시코\",\"pt-BR\":\"México\",\"pt\":\"México\",\"nl\":\"Mexico\",\"hr\":\"Meksiko\",\"fa\":\"مکزیک\",\"de\":\"Mexiko\",\"es\":\"México\",\"fr\":\"Mexique\",\"ja\":\"メキシコ\",\"it\":\"Messico\",\"cn\":\"墨西哥\",\"tr\":\"Meksika\"}', 23.00000000, -102.00000000, '🇲🇽', 'U+1F1F2 U+1F1FD', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(143, 'Micronesia', 'FSM', '583', 'FM', '691', 'Palikir', 'USD', 'United States dollar', '$', '.fm', 'Micronesia', 'Oceania', 'Micronesia', '[{\"zoneName\":\"Pacific/Chuuk\",\"gmtOffset\":36000,\"gmtOffsetName\":\"UTC+10:00\",\"abbreviation\":\"CHUT\",\"tzName\":\"Chuuk Time\"},{\"zoneName\":\"Pacific/Kosrae\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"KOST\",\"tzName\":\"Kosrae Time\"},{\"zoneName\":\"Pacific/Pohnpei\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"PONT\",\"tzName\":\"Pohnpei Standard Time\"}]', '{\"kr\":\"미크로네시아 연방\",\"pt-BR\":\"Micronésia\",\"pt\":\"Micronésia\",\"nl\":\"Micronesië\",\"hr\":\"Mikronezija\",\"fa\":\"ایالات فدرال میکرونزی\",\"de\":\"Mikronesien\",\"es\":\"Micronesia\",\"fr\":\"Micronésie\",\"ja\":\"ミクロネシア連邦\",\"it\":\"Micronesia\",\"cn\":\"密克罗尼西亚\",\"tr\":\"Mikronezya\"}', 6.91666666, 158.25000000, '🇫🇲', 'U+1F1EB U+1F1F2', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(144, 'Moldova', 'MDA', '498', 'MD', '373', 'Chisinau', 'MDL', 'Moldovan leu', 'L', '.md', 'Moldova', 'Europe', 'Eastern Europe', '[{\"zoneName\":\"Europe/Chisinau\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"몰도바\",\"pt-BR\":\"Moldávia\",\"pt\":\"Moldávia\",\"nl\":\"Moldavië\",\"hr\":\"Moldova\",\"fa\":\"مولداوی\",\"de\":\"Moldawie\",\"es\":\"Moldavia\",\"fr\":\"Moldavie\",\"ja\":\"モルドバ共和国\",\"it\":\"Moldavia\",\"cn\":\"摩尔多瓦\",\"tr\":\"Moldova\"}', 47.00000000, 29.00000000, '🇲🇩', 'U+1F1F2 U+1F1E9', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(145, 'Monaco', 'MCO', '492', 'MC', '377', 'Monaco', 'EUR', 'Euro', '€', '.mc', 'Monaco', 'Europe', 'Western Europe', '[{\"zoneName\":\"Europe/Monaco\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"모나코\",\"pt-BR\":\"Mônaco\",\"pt\":\"Mónaco\",\"nl\":\"Monaco\",\"hr\":\"Monako\",\"fa\":\"موناکو\",\"de\":\"Monaco\",\"es\":\"Mónaco\",\"fr\":\"Monaco\",\"ja\":\"モナコ\",\"it\":\"Principato di Monaco\",\"cn\":\"摩纳哥\",\"tr\":\"Monako\"}', 43.73333333, 7.40000000, '🇲🇨', 'U+1F1F2 U+1F1E8', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(146, 'Mongolia', 'MNG', '496', 'MN', '976', 'Ulan Bator', 'MNT', 'Mongolian tögrög', '₮', '.mn', 'Монгол улс', 'Asia', 'Eastern Asia', '[{\"zoneName\":\"Asia/Choibalsan\",\"gmtOffset\":28800,\"gmtOffsetName\":\"UTC+08:00\",\"abbreviation\":\"CHOT\",\"tzName\":\"Choibalsan Standard Time\"},{\"zoneName\":\"Asia/Hovd\",\"gmtOffset\":25200,\"gmtOffsetName\":\"UTC+07:00\",\"abbreviation\":\"HOVT\",\"tzName\":\"Hovd Time\"},{\"zoneName\":\"Asia/Ulaanbaatar\",\"gmtOffset\":28800,\"gmtOffsetName\":\"UTC+08:00\",\"abbreviation\":\"ULAT\",\"tzName\":\"Ulaanbaatar Standard Time\"}]', '{\"kr\":\"몽골\",\"pt-BR\":\"Mongólia\",\"pt\":\"Mongólia\",\"nl\":\"Mongolië\",\"hr\":\"Mongolija\",\"fa\":\"مغولستان\",\"de\":\"Mongolei\",\"es\":\"Mongolia\",\"fr\":\"Mongolie\",\"ja\":\"モンゴル\",\"it\":\"Mongolia\",\"cn\":\"蒙古\",\"tr\":\"Moğolistan\"}', 46.00000000, 105.00000000, '🇲🇳', 'U+1F1F2 U+1F1F3', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(147, 'Montenegro', 'MNE', '499', 'ME', '382', 'Podgorica', 'EUR', 'Euro', '€', '.me', 'Црна Гора', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Europe/Podgorica\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"몬테네그로\",\"pt-BR\":\"Montenegro\",\"pt\":\"Montenegro\",\"nl\":\"Montenegro\",\"hr\":\"Crna Gora\",\"fa\":\"مونته‌نگرو\",\"de\":\"Montenegro\",\"es\":\"Montenegro\",\"fr\":\"Monténégro\",\"ja\":\"モンテネグロ\",\"it\":\"Montenegro\",\"cn\":\"黑山\",\"tr\":\"Karadağ\"}', 42.50000000, 19.30000000, '🇲🇪', 'U+1F1F2 U+1F1EA', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(148, 'Montserrat', 'MSR', '500', 'MS', '+1-664', 'Plymouth', 'XCD', 'Eastern Caribbean dollar', '$', '.ms', 'Montserrat', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Montserrat\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"몬트세랫\",\"pt-BR\":\"Montserrat\",\"pt\":\"Monserrate\",\"nl\":\"Montserrat\",\"hr\":\"Montserrat\",\"fa\":\"مایوت\",\"de\":\"Montserrat\",\"es\":\"Montserrat\",\"fr\":\"Montserrat\",\"ja\":\"モントセラト\",\"it\":\"Montserrat\",\"cn\":\"蒙特塞拉特\",\"tr\":\"Montserrat\"}', 16.75000000, -62.20000000, '🇲🇸', 'U+1F1F2 U+1F1F8', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(149, 'Morocco', 'MAR', '504', 'MA', '212', 'Rabat', 'MAD', 'Moroccan dirham', 'DH', '.ma', 'المغرب', 'Africa', 'Northern Africa', '[{\"zoneName\":\"Africa/Casablanca\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"WEST\",\"tzName\":\"Western European Summer Time\"}]', '{\"kr\":\"모로코\",\"pt-BR\":\"Marrocos\",\"pt\":\"Marrocos\",\"nl\":\"Marokko\",\"hr\":\"Maroko\",\"fa\":\"مراکش\",\"de\":\"Marokko\",\"es\":\"Marruecos\",\"fr\":\"Maroc\",\"ja\":\"モロッコ\",\"it\":\"Marocco\",\"cn\":\"摩洛哥\",\"tr\":\"Fas\"}', 32.00000000, -5.00000000, '🇲🇦', 'U+1F1F2 U+1F1E6', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(150, 'Mozambique', 'MOZ', '508', 'MZ', '258', 'Maputo', 'MZN', 'Mozambican metical', 'MT', '.mz', 'Moçambique', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Africa/Maputo\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"CAT\",\"tzName\":\"Central Africa Time\"}]', '{\"kr\":\"모잠비크\",\"pt-BR\":\"Moçambique\",\"pt\":\"Moçambique\",\"nl\":\"Mozambique\",\"hr\":\"Mozambik\",\"fa\":\"موزامبیک\",\"de\":\"Mosambik\",\"es\":\"Mozambique\",\"fr\":\"Mozambique\",\"ja\":\"モザンビーク\",\"it\":\"Mozambico\",\"cn\":\"莫桑比克\",\"tr\":\"Mozambik\"}', -18.25000000, 35.00000000, '🇲🇿', 'U+1F1F2 U+1F1FF', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(151, 'Myanmar', 'MMR', '104', 'MM', '95', 'Nay Pyi Taw', 'MMK', 'Burmese kyat', 'K', '.mm', 'မြန်မာ', 'Asia', 'South-Eastern Asia', '[{\"zoneName\":\"Asia/Yangon\",\"gmtOffset\":23400,\"gmtOffsetName\":\"UTC+06:30\",\"abbreviation\":\"MMT\",\"tzName\":\"Myanmar Standard Time\"}]', '{\"kr\":\"미얀마\",\"pt-BR\":\"Myanmar\",\"pt\":\"Myanmar\",\"nl\":\"Myanmar\",\"hr\":\"Mijanmar\",\"fa\":\"میانمار\",\"de\":\"Myanmar\",\"es\":\"Myanmar\",\"fr\":\"Myanmar\",\"ja\":\"ミャンマー\",\"it\":\"Birmania\",\"cn\":\"缅甸\",\"tr\":\"Myanmar\"}', 22.00000000, 98.00000000, '🇲🇲', 'U+1F1F2 U+1F1F2', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(152, 'Namibia', 'NAM', '516', 'NA', '264', 'Windhoek', 'NAD', 'Namibian dollar', '$', '.na', 'Namibia', 'Africa', 'Southern Africa', '[{\"zoneName\":\"Africa/Windhoek\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"WAST\",\"tzName\":\"West Africa Summer Time\"}]', '{\"kr\":\"나미비아\",\"pt-BR\":\"Namíbia\",\"pt\":\"Namíbia\",\"nl\":\"Namibië\",\"hr\":\"Namibija\",\"fa\":\"نامیبیا\",\"de\":\"Namibia\",\"es\":\"Namibia\",\"fr\":\"Namibie\",\"ja\":\"ナミビア\",\"it\":\"Namibia\",\"cn\":\"纳米比亚\",\"tr\":\"Namibya\"}', -22.00000000, 17.00000000, '🇳🇦', 'U+1F1F3 U+1F1E6', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(153, 'Nauru', 'NRU', '520', 'NR', '674', 'Yaren', 'AUD', 'Australian dollar', '$', '.nr', 'Nauru', 'Oceania', 'Micronesia', '[{\"zoneName\":\"Pacific/Nauru\",\"gmtOffset\":43200,\"gmtOffsetName\":\"UTC+12:00\",\"abbreviation\":\"NRT\",\"tzName\":\"Nauru Time\"}]', '{\"kr\":\"나우루\",\"pt-BR\":\"Nauru\",\"pt\":\"Nauru\",\"nl\":\"Nauru\",\"hr\":\"Nauru\",\"fa\":\"نائورو\",\"de\":\"Nauru\",\"es\":\"Nauru\",\"fr\":\"Nauru\",\"ja\":\"ナウル\",\"it\":\"Nauru\",\"cn\":\"瑙鲁\",\"tr\":\"Nauru\"}', -0.53333333, 166.91666666, '🇳🇷', 'U+1F1F3 U+1F1F7', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(154, 'Nepal', 'NPL', '524', 'NP', '977', 'Kathmandu', 'NPR', 'Nepalese rupee', '₨', '.np', 'नपल', 'Asia', 'Southern Asia', '[{\"zoneName\":\"Asia/Kathmandu\",\"gmtOffset\":20700,\"gmtOffsetName\":\"UTC+05:45\",\"abbreviation\":\"NPT\",\"tzName\":\"Nepal Time\"}]', '{\"kr\":\"네팔\",\"pt-BR\":\"Nepal\",\"pt\":\"Nepal\",\"nl\":\"Nepal\",\"hr\":\"Nepal\",\"fa\":\"نپال\",\"de\":\"Népal\",\"es\":\"Nepal\",\"fr\":\"Népal\",\"ja\":\"ネパール\",\"it\":\"Nepal\",\"cn\":\"尼泊尔\",\"tr\":\"Nepal\"}', 28.00000000, 84.00000000, '🇳🇵', 'U+1F1F3 U+1F1F5', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(155, 'Bonaire, Sint Eustatius and Saba', 'BES', '535', 'BQ', '599', 'Kralendijk', 'USD', 'United States dollar', '$', '.an', 'Caribisch Nederland', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Anguilla\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"보네르 섬\",\"pt-BR\":\"Bonaire\",\"pt\":\"Bonaire\",\"fa\":\"بونیر\",\"de\":\"Bonaire, Sint Eustatius und Saba\",\"fr\":\"Bonaire, Saint-Eustache et Saba\",\"it\":\"Bonaire, Saint-Eustache e Saba\",\"cn\":\"博内尔岛、圣尤斯特歇斯和萨巴岛\",\"tr\":\"Karayip Hollandasi\"}', 12.15000000, -68.26666700, '🇧🇶', 'U+1F1E7 U+1F1F6', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(156, 'Netherlands', 'NLD', '528', 'NL', '31', 'Amsterdam', 'EUR', 'Euro', '€', '.nl', 'Nederland', 'Europe', 'Western Europe', '[{\"zoneName\":\"Europe/Amsterdam\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"네덜란드 \",\"pt-BR\":\"Holanda\",\"pt\":\"Países Baixos\",\"nl\":\"Nederland\",\"hr\":\"Nizozemska\",\"fa\":\"پادشاهی هلند\",\"de\":\"Niederlande\",\"es\":\"Países Bajos\",\"fr\":\"Pays-Bas\",\"ja\":\"オランダ\",\"it\":\"Paesi Bassi\",\"cn\":\"荷兰\",\"tr\":\"Hollanda\"}', 52.50000000, 5.75000000, '🇳🇱', 'U+1F1F3 U+1F1F1', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(157, 'New Caledonia', 'NCL', '540', 'NC', '687', 'Noumea', 'XPF', 'CFP franc', '₣', '.nc', 'Nouvelle-Calédonie', 'Oceania', 'Melanesia', '[{\"zoneName\":\"Pacific/Noumea\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"NCT\",\"tzName\":\"New Caledonia Time\"}]', '{\"kr\":\"누벨칼레도니\",\"pt-BR\":\"Nova Caledônia\",\"pt\":\"Nova Caledónia\",\"nl\":\"Nieuw-Caledonië\",\"hr\":\"Nova Kaledonija\",\"fa\":\"کالدونیای جدید\",\"de\":\"Neukaledonien\",\"es\":\"Nueva Caledonia\",\"fr\":\"Nouvelle-Calédonie\",\"ja\":\"ニューカレドニア\",\"it\":\"Nuova Caledonia\",\"cn\":\"新喀里多尼亚\",\"tr\":\"Yeni Kaledonya\"}', -21.50000000, 165.50000000, '🇳🇨', 'U+1F1F3 U+1F1E8', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(158, 'New Zealand', 'NZL', '554', 'NZ', '64', 'Wellington', 'NZD', 'New Zealand dollar', '$', '.nz', 'New Zealand', 'Oceania', 'Australia and New Zealand', '[{\"zoneName\":\"Pacific/Auckland\",\"gmtOffset\":46800,\"gmtOffsetName\":\"UTC+13:00\",\"abbreviation\":\"NZDT\",\"tzName\":\"New Zealand Daylight Time\"},{\"zoneName\":\"Pacific/Chatham\",\"gmtOffset\":49500,\"gmtOffsetName\":\"UTC+13:45\",\"abbreviation\":\"CHAST\",\"tzName\":\"Chatham Standard Time\"}]', '{\"kr\":\"뉴질랜드\",\"pt-BR\":\"Nova Zelândia\",\"pt\":\"Nova Zelândia\",\"nl\":\"Nieuw-Zeeland\",\"hr\":\"Novi Zeland\",\"fa\":\"نیوزیلند\",\"de\":\"Neuseeland\",\"es\":\"Nueva Zelanda\",\"fr\":\"Nouvelle-Zélande\",\"ja\":\"ニュージーランド\",\"it\":\"Nuova Zelanda\",\"cn\":\"新西兰\",\"tr\":\"Yeni Zelanda\"}', -41.00000000, 174.00000000, '🇳🇿', 'U+1F1F3 U+1F1FF', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(159, 'Nicaragua', 'NIC', '558', 'NI', '505', 'Managua', 'NIO', 'Nicaraguan córdoba', 'C$', '.ni', 'Nicaragua', 'Americas', 'Central America', '[{\"zoneName\":\"America/Managua\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"}]', '{\"kr\":\"니카라과\",\"pt-BR\":\"Nicarágua\",\"pt\":\"Nicarágua\",\"nl\":\"Nicaragua\",\"hr\":\"Nikaragva\",\"fa\":\"نیکاراگوئه\",\"de\":\"Nicaragua\",\"es\":\"Nicaragua\",\"fr\":\"Nicaragua\",\"ja\":\"ニカラグア\",\"it\":\"Nicaragua\",\"cn\":\"尼加拉瓜\",\"tr\":\"Nikaragua\"}', 13.00000000, -85.00000000, '🇳🇮', 'U+1F1F3 U+1F1EE', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(160, 'Niger', 'NER', '562', 'NE', '227', 'Niamey', 'XOF', 'West African CFA franc', 'CFA', '.ne', 'Niger', 'Africa', 'Western Africa', '[{\"zoneName\":\"Africa/Niamey\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"WAT\",\"tzName\":\"West Africa Time\"}]', '{\"kr\":\"니제르\",\"pt-BR\":\"Níger\",\"pt\":\"Níger\",\"nl\":\"Niger\",\"hr\":\"Niger\",\"fa\":\"نیجر\",\"de\":\"Niger\",\"es\":\"Níger\",\"fr\":\"Niger\",\"ja\":\"ニジェール\",\"it\":\"Niger\",\"cn\":\"尼日尔\",\"tr\":\"Nijer\"}', 16.00000000, 8.00000000, '🇳🇪', 'U+1F1F3 U+1F1EA', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(161, 'Nigeria', 'NGA', '566', 'NG', '234', 'Abuja', 'NGN', 'Nigerian naira', '₦', '.ng', 'Nigeria', 'Africa', 'Western Africa', '[{\"zoneName\":\"Africa/Lagos\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"WAT\",\"tzName\":\"West Africa Time\"}]', '{\"kr\":\"나이지리아\",\"pt-BR\":\"Nigéria\",\"pt\":\"Nigéria\",\"nl\":\"Nigeria\",\"hr\":\"Nigerija\",\"fa\":\"نیجریه\",\"de\":\"Nigeria\",\"es\":\"Nigeria\",\"fr\":\"Nigéria\",\"ja\":\"ナイジェリア\",\"it\":\"Nigeria\",\"cn\":\"尼日利亚\",\"tr\":\"Nijerya\"}', 10.00000000, 8.00000000, '🇳🇬', 'U+1F1F3 U+1F1EC', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(162, 'Niue', 'NIU', '570', 'NU', '683', 'Alofi', 'NZD', 'New Zealand dollar', '$', '.nu', 'Niuē', 'Oceania', 'Polynesia', '[{\"zoneName\":\"Pacific/Niue\",\"gmtOffset\":-39600,\"gmtOffsetName\":\"UTC-11:00\",\"abbreviation\":\"NUT\",\"tzName\":\"Niue Time\"}]', '{\"kr\":\"니우에\",\"pt-BR\":\"Niue\",\"pt\":\"Niue\",\"nl\":\"Niue\",\"hr\":\"Niue\",\"fa\":\"نیووی\",\"de\":\"Niue\",\"es\":\"Niue\",\"fr\":\"Niue\",\"ja\":\"ニウエ\",\"it\":\"Niue\",\"cn\":\"纽埃\",\"tr\":\"Niue\"}', -19.03333333, -169.86666666, '🇳🇺', 'U+1F1F3 U+1F1FA', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(163, 'Norfolk Island', 'NFK', '574', 'NF', '672', 'Kingston', 'AUD', 'Australian dollar', '$', '.nf', 'Norfolk Island', 'Oceania', 'Australia and New Zealand', '[{\"zoneName\":\"Pacific/Norfolk\",\"gmtOffset\":43200,\"gmtOffsetName\":\"UTC+12:00\",\"abbreviation\":\"NFT\",\"tzName\":\"Norfolk Time\"}]', '{\"kr\":\"노퍽 섬\",\"pt-BR\":\"Ilha Norfolk\",\"pt\":\"Ilha Norfolk\",\"nl\":\"Norfolkeiland\",\"hr\":\"Otok Norfolk\",\"fa\":\"جزیره نورفک\",\"de\":\"Norfolkinsel\",\"es\":\"Isla de Norfolk\",\"fr\":\"Île de Norfolk\",\"ja\":\"ノーフォーク島\",\"it\":\"Isola Norfolk\",\"cn\":\"诺福克岛\",\"tr\":\"Norfolk Adasi\"}', -29.03333333, 167.95000000, '🇳🇫', 'U+1F1F3 U+1F1EB', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(164, 'Northern Mariana Islands', 'MNP', '580', 'MP', '+1-670', 'Saipan', 'USD', 'United States dollar', '$', '.mp', 'Northern Mariana Islands', 'Oceania', 'Micronesia', '[{\"zoneName\":\"Pacific/Saipan\",\"gmtOffset\":36000,\"gmtOffsetName\":\"UTC+10:00\",\"abbreviation\":\"ChST\",\"tzName\":\"Chamorro Standard Time\"}]', '{\"kr\":\"북마리아나 제도\",\"pt-BR\":\"Ilhas Marianas\",\"pt\":\"Ilhas Marianas\",\"nl\":\"Noordelijke Marianeneilanden\",\"hr\":\"Sjevernomarijanski otoci\",\"fa\":\"جزایر ماریانای شمالی\",\"de\":\"Nördliche Marianen\",\"es\":\"Islas Marianas del Norte\",\"fr\":\"Îles Mariannes du Nord\",\"ja\":\"北マリアナ諸島\",\"it\":\"Isole Marianne Settentrionali\",\"cn\":\"北马里亚纳群岛\",\"tr\":\"Kuzey Mariana Adalari\"}', 15.20000000, 145.75000000, '🇲🇵', 'U+1F1F2 U+1F1F5', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(165, 'Norway', 'NOR', '578', 'NO', '47', 'Oslo', 'NOK', 'Norwegian krone', 'kr', '.no', 'Norge', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Europe/Oslo\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"노르웨이\",\"pt-BR\":\"Noruega\",\"pt\":\"Noruega\",\"nl\":\"Noorwegen\",\"hr\":\"Norveška\",\"fa\":\"نروژ\",\"de\":\"Norwegen\",\"es\":\"Noruega\",\"fr\":\"Norvège\",\"ja\":\"ノルウェー\",\"it\":\"Norvegia\",\"cn\":\"挪威\",\"tr\":\"Norveç\"}', 62.00000000, 10.00000000, '🇳🇴', 'U+1F1F3 U+1F1F4', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(166, 'Oman', 'OMN', '512', 'OM', '968', 'Muscat', 'OMR', 'Omani rial', '.ع.ر', '.om', 'عمان', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Muscat\",\"gmtOffset\":14400,\"gmtOffsetName\":\"UTC+04:00\",\"abbreviation\":\"GST\",\"tzName\":\"Gulf Standard Time\"}]', '{\"kr\":\"오만\",\"pt-BR\":\"Omã\",\"pt\":\"Omã\",\"nl\":\"Oman\",\"hr\":\"Oman\",\"fa\":\"عمان\",\"de\":\"Oman\",\"es\":\"Omán\",\"fr\":\"Oman\",\"ja\":\"オマーン\",\"it\":\"oman\",\"cn\":\"阿曼\",\"tr\":\"Umman\"}', 21.00000000, 57.00000000, '🇴🇲', 'U+1F1F4 U+1F1F2', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(167, 'Pakistan', 'PAK', '586', 'PK', '92', 'Islamabad', 'PKR', 'Pakistani rupee', '₨', '.pk', 'Pakistan', 'Asia', 'Southern Asia', '[{\"zoneName\":\"Asia/Karachi\",\"gmtOffset\":18000,\"gmtOffsetName\":\"UTC+05:00\",\"abbreviation\":\"PKT\",\"tzName\":\"Pakistan Standard Time\"}]', '{\"kr\":\"파키스탄\",\"pt-BR\":\"Paquistão\",\"pt\":\"Paquistão\",\"nl\":\"Pakistan\",\"hr\":\"Pakistan\",\"fa\":\"پاکستان\",\"de\":\"Pakistan\",\"es\":\"Pakistán\",\"fr\":\"Pakistan\",\"ja\":\"パキスタン\",\"it\":\"Pakistan\",\"cn\":\"巴基斯坦\",\"tr\":\"Pakistan\"}', 30.00000000, 70.00000000, '🇵🇰', 'U+1F1F5 U+1F1F0', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(168, 'Palau', 'PLW', '585', 'PW', '680', 'Melekeok', 'USD', 'United States dollar', '$', '.pw', 'Palau', 'Oceania', 'Micronesia', '[{\"zoneName\":\"Pacific/Palau\",\"gmtOffset\":32400,\"gmtOffsetName\":\"UTC+09:00\",\"abbreviation\":\"PWT\",\"tzName\":\"Palau Time\"}]', '{\"kr\":\"팔라우\",\"pt-BR\":\"Palau\",\"pt\":\"Palau\",\"nl\":\"Palau\",\"hr\":\"Palau\",\"fa\":\"پالائو\",\"de\":\"Palau\",\"es\":\"Palau\",\"fr\":\"Palaos\",\"ja\":\"パラオ\",\"it\":\"Palau\",\"cn\":\"帕劳\",\"tr\":\"Palau\"}', 7.50000000, 134.50000000, '🇵🇼', 'U+1F1F5 U+1F1FC', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(169, 'Palestinian Territory Occupied', 'PSE', '275', 'PS', '970', 'East Jerusalem', 'ILS', 'Israeli new shekel', '₪', '.ps', 'فلسطين', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Gaza\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"},{\"zoneName\":\"Asia/Hebron\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"팔레스타인 영토\",\"pt-BR\":\"Palestina\",\"pt\":\"Palestina\",\"nl\":\"Palestijnse gebieden\",\"hr\":\"Palestina\",\"fa\":\"فلسطین\",\"de\":\"Palästina\",\"es\":\"Palestina\",\"fr\":\"Palestine\",\"ja\":\"パレスチナ\",\"it\":\"Palestina\",\"cn\":\"巴勒斯坦\",\"tr\":\"Filistin\"}', 31.90000000, 35.20000000, '🇵🇸', 'U+1F1F5 U+1F1F8', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(170, 'Panama', 'PAN', '591', 'PA', '507', 'Panama City', 'PAB', 'Panamanian balboa', 'B/.', '.pa', 'Panamá', 'Americas', 'Central America', '[{\"zoneName\":\"America/Panama\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"}]', '{\"kr\":\"파나마\",\"pt-BR\":\"Panamá\",\"pt\":\"Panamá\",\"nl\":\"Panama\",\"hr\":\"Panama\",\"fa\":\"پاناما\",\"de\":\"Panama\",\"es\":\"Panamá\",\"fr\":\"Panama\",\"ja\":\"パナマ\",\"it\":\"Panama\",\"cn\":\"巴拿马\",\"tr\":\"Panama\"}', 9.00000000, -80.00000000, '🇵🇦', 'U+1F1F5 U+1F1E6', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(171, 'Papua new Guinea', 'PNG', '598', 'PG', '675', 'Port Moresby', 'PGK', 'Papua New Guinean kina', 'K', '.pg', 'Papua Niugini', 'Oceania', 'Melanesia', '[{\"zoneName\":\"Pacific/Bougainville\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"BST\",\"tzName\":\"Bougainville Standard Time[6\"},{\"zoneName\":\"Pacific/Port_Moresby\",\"gmtOffset\":36000,\"gmtOffsetName\":\"UTC+10:00\",\"abbreviation\":\"PGT\",\"tzName\":\"Papua New Guinea Time\"}]', '{\"kr\":\"파푸아뉴기니\",\"pt-BR\":\"Papua Nova Guiné\",\"pt\":\"Papua Nova Guiné\",\"nl\":\"Papoea-Nieuw-Guinea\",\"hr\":\"Papua Nova Gvineja\",\"fa\":\"پاپوآ گینه نو\",\"de\":\"Papua-Neuguinea\",\"es\":\"Papúa Nueva Guinea\",\"fr\":\"Papouasie-Nouvelle-Guinée\",\"ja\":\"パプアニューギニア\",\"it\":\"Papua Nuova Guinea\",\"cn\":\"巴布亚新几内亚\",\"tr\":\"Papua Yeni Gine\"}', -6.00000000, 147.00000000, '🇵🇬', 'U+1F1F5 U+1F1EC', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(172, 'Paraguay', 'PRY', '600', 'PY', '595', 'Asuncion', 'PYG', 'Paraguayan guarani', '₲', '.py', 'Paraguay', 'Americas', 'South America', '[{\"zoneName\":\"America/Asuncion\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"PYST\",\"tzName\":\"Paraguay Summer Time\"}]', '{\"kr\":\"파라과이\",\"pt-BR\":\"Paraguai\",\"pt\":\"Paraguai\",\"nl\":\"Paraguay\",\"hr\":\"Paragvaj\",\"fa\":\"پاراگوئه\",\"de\":\"Paraguay\",\"es\":\"Paraguay\",\"fr\":\"Paraguay\",\"ja\":\"パラグアイ\",\"it\":\"Paraguay\",\"cn\":\"巴拉圭\",\"tr\":\"Paraguay\"}', -23.00000000, -58.00000000, '🇵🇾', 'U+1F1F5 U+1F1FE', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(173, 'Peru', 'PER', '604', 'PE', '51', 'Lima', 'PEN', 'Peruvian sol', 'S/.', '.pe', 'Perú', 'Americas', 'South America', '[{\"zoneName\":\"America/Lima\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"PET\",\"tzName\":\"Peru Time\"}]', '{\"kr\":\"페루\",\"pt-BR\":\"Peru\",\"pt\":\"Peru\",\"nl\":\"Peru\",\"hr\":\"Peru\",\"fa\":\"پرو\",\"de\":\"Peru\",\"es\":\"Perú\",\"fr\":\"Pérou\",\"ja\":\"ペルー\",\"it\":\"Perù\",\"cn\":\"秘鲁\",\"tr\":\"Peru\"}', -10.00000000, -76.00000000, '🇵🇪', 'U+1F1F5 U+1F1EA', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(174, 'Philippines', 'PHL', '608', 'PH', '63', 'Manila', 'PHP', 'Philippine peso', '₱', '.ph', 'Pilipinas', 'Asia', 'South-Eastern Asia', '[{\"zoneName\":\"Asia/Manila\",\"gmtOffset\":28800,\"gmtOffsetName\":\"UTC+08:00\",\"abbreviation\":\"PHT\",\"tzName\":\"Philippine Time\"}]', '{\"kr\":\"필리핀\",\"pt-BR\":\"Filipinas\",\"pt\":\"Filipinas\",\"nl\":\"Filipijnen\",\"hr\":\"Filipini\",\"fa\":\"جزایر الندفیلیپین\",\"de\":\"Philippinen\",\"es\":\"Filipinas\",\"fr\":\"Philippines\",\"ja\":\"フィリピン\",\"it\":\"Filippine\",\"cn\":\"菲律宾\",\"tr\":\"Filipinler\"}', 13.00000000, 122.00000000, '🇵🇭', 'U+1F1F5 U+1F1ED', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(175, 'Pitcairn Island', 'PCN', '612', 'PN', '870', 'Adamstown', 'NZD', 'New Zealand dollar', '$', '.pn', 'Pitcairn Islands', 'Oceania', 'Polynesia', '[{\"zoneName\":\"Pacific/Pitcairn\",\"gmtOffset\":-28800,\"gmtOffsetName\":\"UTC-08:00\",\"abbreviation\":\"PST\",\"tzName\":\"Pacific Standard Time (North America\"}]', '{\"kr\":\"핏케언 제도\",\"pt-BR\":\"Ilhas Pitcairn\",\"pt\":\"Ilhas Picárnia\",\"nl\":\"Pitcairneilanden\",\"hr\":\"Pitcairnovo otočje\",\"fa\":\"پیتکرن\",\"de\":\"Pitcairn\",\"es\":\"Islas Pitcairn\",\"fr\":\"Îles Pitcairn\",\"ja\":\"ピトケアン\",\"it\":\"Isole Pitcairn\",\"cn\":\"皮特凯恩群岛\",\"tr\":\"Pitcairn Adalari\"}', -25.06666666, -130.10000000, '🇵🇳', 'U+1F1F5 U+1F1F3', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(176, 'Poland', 'POL', '616', 'PL', '48', 'Warsaw', 'PLN', 'Polish złoty', 'zł', '.pl', 'Polska', 'Europe', 'Eastern Europe', '[{\"zoneName\":\"Europe/Warsaw\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"폴란드\",\"pt-BR\":\"Polônia\",\"pt\":\"Polónia\",\"nl\":\"Polen\",\"hr\":\"Poljska\",\"fa\":\"لهستان\",\"de\":\"Polen\",\"es\":\"Polonia\",\"fr\":\"Pologne\",\"ja\":\"ポーランド\",\"it\":\"Polonia\",\"cn\":\"波兰\",\"tr\":\"Polonya\"}', 52.00000000, 20.00000000, '🇵🇱', 'U+1F1F5 U+1F1F1', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(177, 'Portugal', 'PRT', '620', 'PT', '351', 'Lisbon', 'EUR', 'Euro', '€', '.pt', 'Portugal', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Atlantic/Azores\",\"gmtOffset\":-3600,\"gmtOffsetName\":\"UTC-01:00\",\"abbreviation\":\"AZOT\",\"tzName\":\"Azores Standard Time\"},{\"zoneName\":\"Atlantic/Madeira\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"WET\",\"tzName\":\"Western European Time\"},{\"zoneName\":\"Europe/Lisbon\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"WET\",\"tzName\":\"Western European Time\"}]', '{\"kr\":\"포르투갈\",\"pt-BR\":\"Portugal\",\"pt\":\"Portugal\",\"nl\":\"Portugal\",\"hr\":\"Portugal\",\"fa\":\"پرتغال\",\"de\":\"Portugal\",\"es\":\"Portugal\",\"fr\":\"Portugal\",\"ja\":\"ポルトガル\",\"it\":\"Portogallo\",\"cn\":\"葡萄牙\",\"tr\":\"Portekiz\"}', 39.50000000, -8.00000000, '🇵🇹', 'U+1F1F5 U+1F1F9', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(178, 'Puerto Rico', 'PRI', '630', 'PR', '+1-787 and 1-939', 'San Juan', 'USD', 'United States dollar', '$', '.pr', 'Puerto Rico', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Puerto_Rico\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"푸에르토리코\",\"pt-BR\":\"Porto Rico\",\"pt\":\"Porto Rico\",\"nl\":\"Puerto Rico\",\"hr\":\"Portoriko\",\"fa\":\"پورتو ریکو\",\"de\":\"Puerto Rico\",\"es\":\"Puerto Rico\",\"fr\":\"Porto Rico\",\"ja\":\"プエルトリコ\",\"it\":\"Porto Rico\",\"cn\":\"波多黎各\",\"tr\":\"Porto Riko\"}', 18.25000000, -66.50000000, '🇵🇷', 'U+1F1F5 U+1F1F7', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(179, 'Qatar', 'QAT', '634', 'QA', '974', 'Doha', 'QAR', 'Qatari riyal', 'ق.ر', '.qa', 'قطر', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Qatar\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"AST\",\"tzName\":\"Arabia Standard Time\"}]', '{\"kr\":\"카타르\",\"pt-BR\":\"Catar\",\"pt\":\"Catar\",\"nl\":\"Qatar\",\"hr\":\"Katar\",\"fa\":\"قطر\",\"de\":\"Katar\",\"es\":\"Catar\",\"fr\":\"Qatar\",\"ja\":\"カタール\",\"it\":\"Qatar\",\"cn\":\"卡塔尔\",\"tr\":\"Katar\"}', 25.50000000, 51.25000000, '🇶🇦', 'U+1F1F6 U+1F1E6', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(180, 'Reunion', 'REU', '638', 'RE', '262', 'Saint-Denis', 'EUR', 'Euro', '€', '.re', 'La Réunion', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Indian/Reunion\",\"gmtOffset\":14400,\"gmtOffsetName\":\"UTC+04:00\",\"abbreviation\":\"RET\",\"tzName\":\"Réunion Time\"}]', '{\"kr\":\"레위니옹\",\"pt-BR\":\"Reunião\",\"pt\":\"Reunião\",\"nl\":\"Réunion\",\"hr\":\"Réunion\",\"fa\":\"رئونیون\",\"de\":\"Réunion\",\"es\":\"Reunión\",\"fr\":\"Réunion\",\"ja\":\"レユニオン\",\"it\":\"Riunione\",\"cn\":\"留尼汪岛\",\"tr\":\"Réunion\"}', -21.15000000, 55.50000000, '🇷🇪', 'U+1F1F7 U+1F1EA', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(181, 'Romania', 'ROU', '642', 'RO', '40', 'Bucharest', 'RON', 'Romanian leu', 'lei', '.ro', 'România', 'Europe', 'Eastern Europe', '[{\"zoneName\":\"Europe/Bucharest\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"루마니아\",\"pt-BR\":\"Romênia\",\"pt\":\"Roménia\",\"nl\":\"Roemenië\",\"hr\":\"Rumunjska\",\"fa\":\"رومانی\",\"de\":\"Rumänien\",\"es\":\"Rumania\",\"fr\":\"Roumanie\",\"ja\":\"ルーマニア\",\"it\":\"Romania\",\"cn\":\"罗马尼亚\",\"tr\":\"Romanya\"}', 46.00000000, 25.00000000, '🇷🇴', 'U+1F1F7 U+1F1F4', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(182, 'Russia', 'RUS', '643', 'RU', '7', 'Moscow', 'RUB', 'Russian ruble', '₽', '.ru', 'Россия', 'Europe', 'Eastern Europe', '[{\"zoneName\":\"Asia/Anadyr\",\"gmtOffset\":43200,\"gmtOffsetName\":\"UTC+12:00\",\"abbreviation\":\"ANAT\",\"tzName\":\"Anadyr Time[4\"},{\"zoneName\":\"Asia/Barnaul\",\"gmtOffset\":25200,\"gmtOffsetName\":\"UTC+07:00\",\"abbreviation\":\"KRAT\",\"tzName\":\"Krasnoyarsk Time\"},{\"zoneName\":\"Asia/Chita\",\"gmtOffset\":32400,\"gmtOffsetName\":\"UTC+09:00\",\"abbreviation\":\"YAKT\",\"tzName\":\"Yakutsk Time\"},{\"zoneName\":\"Asia/Irkutsk\",\"gmtOffset\":28800,\"gmtOffsetName\":\"UTC+08:00\",\"abbreviation\":\"IRKT\",\"tzName\":\"Irkutsk Time\"},{\"zoneName\":\"Asia/Kamchatka\",\"gmtOffset\":43200,\"gmtOffsetName\":\"UTC+12:00\",\"abbreviation\":\"PETT\",\"tzName\":\"Kamchatka Time\"},{\"zoneName\":\"Asia/Khandyga\",\"gmtOffset\":32400,\"gmtOffsetName\":\"UTC+09:00\",\"abbreviation\":\"YAKT\",\"tzName\":\"Yakutsk Time\"},{\"zoneName\":\"Asia/Krasnoyarsk\",\"gmtOffset\":25200,\"gmtOffsetName\":\"UTC+07:00\",\"abbreviation\":\"KRAT\",\"tzName\":\"Krasnoyarsk Time\"},{\"zoneName\":\"Asia/Magadan\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"MAGT\",\"tzName\":\"Magadan Time\"},{\"zoneName\":\"Asia/Novokuznetsk\",\"gmtOffset\":25200,\"gmtOffsetName\":\"UTC+07:00\",\"abbreviation\":\"KRAT\",\"tzName\":\"Krasnoyarsk Time\"},{\"zoneName\":\"Asia/Novosibirsk\",\"gmtOffset\":25200,\"gmtOffsetName\":\"UTC+07:00\",\"abbreviation\":\"NOVT\",\"tzName\":\"Novosibirsk Time\"},{\"zoneName\":\"Asia/Omsk\",\"gmtOffset\":21600,\"gmtOffsetName\":\"UTC+06:00\",\"abbreviation\":\"OMST\",\"tzName\":\"Omsk Time\"},{\"zoneName\":\"Asia/Sakhalin\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"SAKT\",\"tzName\":\"Sakhalin Island Time\"},{\"zoneName\":\"Asia/Srednekolymsk\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"SRET\",\"tzName\":\"Srednekolymsk Time\"},{\"zoneName\":\"Asia/Tomsk\",\"gmtOffset\":25200,\"gmtOffsetName\":\"UTC+07:00\",\"abbreviation\":\"MSD+3\",\"tzName\":\"Moscow Daylight Time+3\"},{\"zoneName\":\"Asia/Ust-Nera\",\"gmtOffset\":36000,\"gmtOffsetName\":\"UTC+10:00\",\"abbreviation\":\"VLAT\",\"tzName\":\"Vladivostok Time\"},{\"zoneName\":\"Asia/Vladivostok\",\"gmtOffset\":36000,\"gmtOffsetName\":\"UTC+10:00\",\"abbreviation\":\"VLAT\",\"tzName\":\"Vladivostok Time\"},{\"zoneName\":\"Asia/Yakutsk\",\"gmtOffset\":32400,\"gmtOffsetName\":\"UTC+09:00\",\"abbreviation\":\"YAKT\",\"tzName\":\"Yakutsk Time\"},{\"zoneName\":\"Asia/Yekaterinburg\",\"gmtOffset\":18000,\"gmtOffsetName\":\"UTC+05:00\",\"abbreviation\":\"YEKT\",\"tzName\":\"Yekaterinburg Time\"},{\"zoneName\":\"Europe/Astrakhan\",\"gmtOffset\":14400,\"gmtOffsetName\":\"UTC+04:00\",\"abbreviation\":\"SAMT\",\"tzName\":\"Samara Time\"},{\"zoneName\":\"Europe/Kaliningrad\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"},{\"zoneName\":\"Europe/Kirov\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"MSK\",\"tzName\":\"Moscow Time\"},{\"zoneName\":\"Europe/Moscow\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"MSK\",\"tzName\":\"Moscow Time\"},{\"zoneName\":\"Europe/Samara\",\"gmtOffset\":14400,\"gmtOffsetName\":\"UTC+04:00\",\"abbreviation\":\"SAMT\",\"tzName\":\"Samara Time\"},{\"zoneName\":\"Europe/Saratov\",\"gmtOffset\":14400,\"gmtOffsetName\":\"UTC+04:00\",\"abbreviation\":\"MSD\",\"tzName\":\"Moscow Daylight Time+4\"},{\"zoneName\":\"Europe/Ulyanovsk\",\"gmtOffset\":14400,\"gmtOffsetName\":\"UTC+04:00\",\"abbreviation\":\"SAMT\",\"tzName\":\"Samara Time\"},{\"zoneName\":\"Europe/Volgograd\",\"gmtOffset\":14400,\"gmtOffsetName\":\"UTC+04:00\",\"abbreviation\":\"MSK\",\"tzName\":\"Moscow Standard Time\"}]', '{\"kr\":\"러시아\",\"pt-BR\":\"Rússia\",\"pt\":\"Rússia\",\"nl\":\"Rusland\",\"hr\":\"Rusija\",\"fa\":\"روسیه\",\"de\":\"Russland\",\"es\":\"Rusia\",\"fr\":\"Russie\",\"ja\":\"ロシア連邦\",\"it\":\"Russia\",\"cn\":\"俄罗斯联邦\",\"tr\":\"Rusya\"}', 60.00000000, 100.00000000, '🇷🇺', 'U+1F1F7 U+1F1FA', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(183, 'Rwanda', 'RWA', '646', 'RW', '250', 'Kigali', 'RWF', 'Rwandan franc', 'FRw', '.rw', 'Rwanda', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Africa/Kigali\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"CAT\",\"tzName\":\"Central Africa Time\"}]', '{\"kr\":\"르완다\",\"pt-BR\":\"Ruanda\",\"pt\":\"Ruanda\",\"nl\":\"Rwanda\",\"hr\":\"Ruanda\",\"fa\":\"رواندا\",\"de\":\"Ruanda\",\"es\":\"Ruanda\",\"fr\":\"Rwanda\",\"ja\":\"ルワンダ\",\"it\":\"Ruanda\",\"cn\":\"卢旺达\",\"tr\":\"Ruanda\"}', -2.00000000, 30.00000000, '🇷🇼', 'U+1F1F7 U+1F1FC', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(184, 'Saint Helena', 'SHN', '654', 'SH', '290', 'Jamestown', 'SHP', 'Saint Helena pound', '£', '.sh', 'Saint Helena', 'Africa', 'Western Africa', '[{\"zoneName\":\"Atlantic/St_Helena\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"세인트헬레나\",\"pt-BR\":\"Santa Helena\",\"pt\":\"Santa Helena\",\"nl\":\"Sint-Helena\",\"hr\":\"Sveta Helena\",\"fa\":\"سنت هلنا، اسنشن و تریستان دا کونا\",\"de\":\"Sankt Helena\",\"es\":\"Santa Helena\",\"fr\":\"Sainte-Hélène\",\"ja\":\"セントヘレナ・アセンションおよびトリスタンダクーニャ\",\"it\":\"Sant\'Elena\",\"cn\":\"圣赫勒拿\",\"tr\":\"Saint Helena\"}', -15.95000000, -5.70000000, '🇸🇭', 'U+1F1F8 U+1F1ED', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(185, 'Saint Kitts And Nevis', 'KNA', '659', 'KN', '+1-869', 'Basseterre', 'XCD', 'Eastern Caribbean dollar', '$', '.kn', 'Saint Kitts and Nevis', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/St_Kitts\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"세인트키츠 네비스\",\"pt-BR\":\"São Cristóvão e Neves\",\"pt\":\"São Cristóvão e Neves\",\"nl\":\"Saint Kitts en Nevis\",\"hr\":\"Sveti Kristof i Nevis\",\"fa\":\"سنت کیتس و نویس\",\"de\":\"St. Kitts und Nevis\",\"es\":\"San Cristóbal y Nieves\",\"fr\":\"Saint-Christophe-et-Niévès\",\"ja\":\"セントクリストファー・ネイビス\",\"it\":\"Saint Kitts e Nevis\",\"cn\":\"圣基茨和尼维斯\",\"tr\":\"Saint Kitts Ve Nevis\"}', 17.33333333, -62.75000000, '🇰🇳', 'U+1F1F0 U+1F1F3', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(186, 'Saint Lucia', 'LCA', '662', 'LC', '+1-758', 'Castries', 'XCD', 'Eastern Caribbean dollar', '$', '.lc', 'Saint Lucia', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/St_Lucia\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"세인트루시아\",\"pt-BR\":\"Santa Lúcia\",\"pt\":\"Santa Lúcia\",\"nl\":\"Saint Lucia\",\"hr\":\"Sveta Lucija\",\"fa\":\"سنت لوسیا\",\"de\":\"Saint Lucia\",\"es\":\"Santa Lucía\",\"fr\":\"Saint-Lucie\",\"ja\":\"セントルシア\",\"it\":\"Santa Lucia\",\"cn\":\"圣卢西亚\",\"tr\":\"Saint Lucia\"}', 13.88333333, -60.96666666, '🇱🇨', 'U+1F1F1 U+1F1E8', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(187, 'Saint Pierre and Miquelon', 'SPM', '666', 'PM', '508', 'Saint-Pierre', 'EUR', 'Euro', '€', '.pm', 'Saint-Pierre-et-Miquelon', 'Americas', 'Northern America', '[{\"zoneName\":\"America/Miquelon\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"PMDT\",\"tzName\":\"Pierre & Miquelon Daylight Time\"}]', '{\"kr\":\"생피에르 미클롱\",\"pt-BR\":\"Saint-Pierre e Miquelon\",\"pt\":\"São Pedro e Miquelon\",\"nl\":\"Saint Pierre en Miquelon\",\"hr\":\"Sveti Petar i Mikelon\",\"fa\":\"سن پیر و میکلن\",\"de\":\"Saint-Pierre und Miquelon\",\"es\":\"San Pedro y Miquelón\",\"fr\":\"Saint-Pierre-et-Miquelon\",\"ja\":\"サンピエール島・ミクロン島\",\"it\":\"Saint-Pierre e Miquelon\",\"cn\":\"圣皮埃尔和密克隆\",\"tr\":\"Saint Pierre Ve Miquelon\"}', 46.83333333, -56.33333333, '🇵🇲', 'U+1F1F5 U+1F1F2', '2018-07-20 13:11:03', '2022-05-21 03:32:07', 1, 1),
(188, 'Saint Vincent And The Grenadines', 'VCT', '670', 'VC', '+1-784', 'Kingstown', 'XCD', 'Eastern Caribbean dollar', '$', '.vc', 'Saint Vincent and the Grenadines', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/St_Vincent\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"세인트빈센트 그레나딘\",\"pt-BR\":\"São Vicente e Granadinas\",\"pt\":\"São Vicente e Granadinas\",\"nl\":\"Saint Vincent en de Grenadines\",\"hr\":\"Sveti Vincent i Grenadini\",\"fa\":\"سنت وینسنت و گرنادین‌ها\",\"de\":\"Saint Vincent und die Grenadinen\",\"es\":\"San Vicente y Granadinas\",\"fr\":\"Saint-Vincent-et-les-Grenadines\",\"ja\":\"セントビンセントおよびグレナディーン諸島\",\"it\":\"Saint Vincent e Grenadine\",\"cn\":\"圣文森特和格林纳丁斯\",\"tr\":\"Saint Vincent Ve Grenadinler\"}', 13.25000000, -61.20000000, '🇻🇨', 'U+1F1FB U+1F1E8', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(189, 'Saint-Barthelemy', 'BLM', '652', 'BL', '590', 'Gustavia', 'EUR', 'Euro', '€', '.bl', 'Saint-Barthélemy', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/St_Barthelemy\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"생바르텔레미\",\"pt-BR\":\"São Bartolomeu\",\"pt\":\"São Bartolomeu\",\"nl\":\"Saint Barthélemy\",\"hr\":\"Saint Barthélemy\",\"fa\":\"سن-بارتلمی\",\"de\":\"Saint-Barthélemy\",\"es\":\"San Bartolomé\",\"fr\":\"Saint-Barthélemy\",\"ja\":\"サン・バルテルミー\",\"it\":\"Antille Francesi\",\"cn\":\"圣巴泰勒米\",\"tr\":\"Saint Barthélemy\"}', 18.50000000, -63.41666666, '🇧🇱', 'U+1F1E7 U+1F1F1', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(190, 'Saint-Martin (French part)', 'MAF', '663', 'MF', '590', 'Marigot', 'EUR', 'Euro', '€', '.mf', 'Saint-Martin', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Marigot\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"세인트마틴 섬\",\"pt-BR\":\"Saint Martin\",\"pt\":\"Ilha São Martinho\",\"nl\":\"Saint-Martin\",\"hr\":\"Sveti Martin\",\"fa\":\"سینت مارتن\",\"de\":\"Saint Martin\",\"es\":\"Saint Martin\",\"fr\":\"Saint-Martin\",\"ja\":\"サン・マルタン（フランス領）\",\"it\":\"Saint Martin\",\"cn\":\"密克罗尼西亚\",\"tr\":\"Saint Martin\"}', 18.08333333, -63.95000000, '🇲🇫', 'U+1F1F2 U+1F1EB', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1);
INSERT INTO `countries` (`id`, `name`, `iso3`, `numeric_code`, `iso2`, `phonecode`, `capital`, `currency`, `currency_name`, `currency_symbol`, `tld`, `native`, `region`, `subregion`, `timezones`, `translations`, `latitude`, `longitude`, `emoji`, `emojiU`, `created_at`, `updated_at`, `flag`, `status`) VALUES
(191, 'Samoa', 'WSM', '882', 'WS', '685', 'Apia', 'WST', 'Samoan tālā', 'SAT', '.ws', 'Samoa', 'Oceania', 'Polynesia', '[{\"zoneName\":\"Pacific/Apia\",\"gmtOffset\":50400,\"gmtOffsetName\":\"UTC+14:00\",\"abbreviation\":\"WST\",\"tzName\":\"West Samoa Time\"}]', '{\"kr\":\"사모아\",\"pt-BR\":\"Samoa\",\"pt\":\"Samoa\",\"nl\":\"Samoa\",\"hr\":\"Samoa\",\"fa\":\"ساموآ\",\"de\":\"Samoa\",\"es\":\"Samoa\",\"fr\":\"Samoa\",\"ja\":\"サモア\",\"it\":\"Samoa\",\"cn\":\"萨摩亚\",\"tr\":\"Samoa\"}', -13.58333333, -172.33333333, '🇼🇸', 'U+1F1FC U+1F1F8', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(192, 'San Marino', 'SMR', '674', 'SM', '378', 'San Marino', 'EUR', 'Euro', '€', '.sm', 'San Marino', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Europe/San_Marino\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"산마리노\",\"pt-BR\":\"San Marino\",\"pt\":\"São Marinho\",\"nl\":\"San Marino\",\"hr\":\"San Marino\",\"fa\":\"سان مارینو\",\"de\":\"San Marino\",\"es\":\"San Marino\",\"fr\":\"Saint-Marin\",\"ja\":\"サンマリノ\",\"it\":\"San Marino\",\"cn\":\"圣马力诺\",\"tr\":\"San Marino\"}', 43.76666666, 12.41666666, '🇸🇲', 'U+1F1F8 U+1F1F2', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(193, 'Sao Tome and Principe', 'STP', '678', 'ST', '239', 'Sao Tome', 'STD', 'Dobra', 'Db', '.st', 'São Tomé e Príncipe', 'Africa', 'Middle Africa', '[{\"zoneName\":\"Africa/Sao_Tome\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"상투메 프린시페\",\"pt-BR\":\"São Tomé e Príncipe\",\"pt\":\"São Tomé e Príncipe\",\"nl\":\"Sao Tomé en Principe\",\"hr\":\"Sveti Toma i Princip\",\"fa\":\"کواترو دو فرویرو\",\"de\":\"São Tomé und Príncipe\",\"es\":\"Santo Tomé y Príncipe\",\"fr\":\"Sao Tomé-et-Principe\",\"ja\":\"サントメ・プリンシペ\",\"it\":\"São Tomé e Príncipe\",\"cn\":\"圣多美和普林西比\",\"tr\":\"Sao Tome Ve Prinsipe\"}', 1.00000000, 7.00000000, '🇸🇹', 'U+1F1F8 U+1F1F9', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(194, 'Saudi Arabia', 'SAU', '682', 'SA', '966', 'Riyadh', 'SAR', 'Saudi riyal', '﷼', '.sa', 'المملكة العربية السعودية', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Riyadh\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"AST\",\"tzName\":\"Arabia Standard Time\"}]', '{\"kr\":\"사우디아라비아\",\"pt-BR\":\"Arábia Saudita\",\"pt\":\"Arábia Saudita\",\"nl\":\"Saoedi-Arabië\",\"hr\":\"Saudijska Arabija\",\"fa\":\"عربستان سعودی\",\"de\":\"Saudi-Arabien\",\"es\":\"Arabia Saudí\",\"fr\":\"Arabie Saoudite\",\"ja\":\"サウジアラビア\",\"it\":\"Arabia Saudita\",\"cn\":\"沙特阿拉伯\",\"tr\":\"Suudi Arabistan\"}', 25.00000000, 45.00000000, '🇸🇦', 'U+1F1F8 U+1F1E6', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(195, 'Senegal', 'SEN', '686', 'SN', '221', 'Dakar', 'XOF', 'West African CFA franc', 'CFA', '.sn', 'Sénégal', 'Africa', 'Western Africa', '[{\"zoneName\":\"Africa/Dakar\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"세네갈\",\"pt-BR\":\"Senegal\",\"pt\":\"Senegal\",\"nl\":\"Senegal\",\"hr\":\"Senegal\",\"fa\":\"سنگال\",\"de\":\"Senegal\",\"es\":\"Senegal\",\"fr\":\"Sénégal\",\"ja\":\"セネガル\",\"it\":\"Senegal\",\"cn\":\"塞内加尔\",\"tr\":\"Senegal\"}', 14.00000000, -14.00000000, '🇸🇳', 'U+1F1F8 U+1F1F3', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(196, 'Serbia', 'SRB', '688', 'RS', '381', 'Belgrade', 'RSD', 'Serbian dinar', 'din', '.rs', 'Србија', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Europe/Belgrade\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"세르비아\",\"pt-BR\":\"Sérvia\",\"pt\":\"Sérvia\",\"nl\":\"Servië\",\"hr\":\"Srbija\",\"fa\":\"صربستان\",\"de\":\"Serbien\",\"es\":\"Serbia\",\"fr\":\"Serbie\",\"ja\":\"セルビア\",\"it\":\"Serbia\",\"cn\":\"塞尔维亚\",\"tr\":\"Sirbistan\"}', 44.00000000, 21.00000000, '🇷🇸', 'U+1F1F7 U+1F1F8', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(197, 'Seychelles', 'SYC', '690', 'SC', '248', 'Victoria', 'SCR', 'Seychellois rupee', 'SRe', '.sc', 'Seychelles', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Indian/Mahe\",\"gmtOffset\":14400,\"gmtOffsetName\":\"UTC+04:00\",\"abbreviation\":\"SCT\",\"tzName\":\"Seychelles Time\"}]', '{\"kr\":\"세이셸\",\"pt-BR\":\"Seicheles\",\"pt\":\"Seicheles\",\"nl\":\"Seychellen\",\"hr\":\"Sejšeli\",\"fa\":\"سیشل\",\"de\":\"Seychellen\",\"es\":\"Seychelles\",\"fr\":\"Seychelles\",\"ja\":\"セーシェル\",\"it\":\"Seychelles\",\"cn\":\"塞舌尔\",\"tr\":\"Seyşeller\"}', -4.58333333, 55.66666666, '🇸🇨', 'U+1F1F8 U+1F1E8', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(198, 'Sierra Leone', 'SLE', '694', 'SL', '232', 'Freetown', 'SLL', 'Sierra Leonean leone', 'Le', '.sl', 'Sierra Leone', 'Africa', 'Western Africa', '[{\"zoneName\":\"Africa/Freetown\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"시에라리온\",\"pt-BR\":\"Serra Leoa\",\"pt\":\"Serra Leoa\",\"nl\":\"Sierra Leone\",\"hr\":\"Sijera Leone\",\"fa\":\"سیرالئون\",\"de\":\"Sierra Leone\",\"es\":\"Sierra Leone\",\"fr\":\"Sierra Leone\",\"ja\":\"シエラレオネ\",\"it\":\"Sierra Leone\",\"cn\":\"塞拉利昂\",\"tr\":\"Sierra Leone\"}', 8.50000000, -11.50000000, '🇸🇱', 'U+1F1F8 U+1F1F1', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(199, 'Singapore', 'SGP', '702', 'SG', '65', 'Singapur', 'SGD', 'Singapore dollar', '$', '.sg', 'Singapore', 'Asia', 'South-Eastern Asia', '[{\"zoneName\":\"Asia/Singapore\",\"gmtOffset\":28800,\"gmtOffsetName\":\"UTC+08:00\",\"abbreviation\":\"SGT\",\"tzName\":\"Singapore Time\"}]', '{\"kr\":\"싱가포르\",\"pt-BR\":\"Singapura\",\"pt\":\"Singapura\",\"nl\":\"Singapore\",\"hr\":\"Singapur\",\"fa\":\"سنگاپور\",\"de\":\"Singapur\",\"es\":\"Singapur\",\"fr\":\"Singapour\",\"ja\":\"シンガポール\",\"it\":\"Singapore\",\"cn\":\"新加坡\",\"tr\":\"Singapur\"}', 1.36666666, 103.80000000, '🇸🇬', 'U+1F1F8 U+1F1EC', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(200, 'Slovakia', 'SVK', '703', 'SK', '421', 'Bratislava', 'EUR', 'Euro', '€', '.sk', 'Slovensko', 'Europe', 'Eastern Europe', '[{\"zoneName\":\"Europe/Bratislava\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"슬로바키아\",\"pt-BR\":\"Eslováquia\",\"pt\":\"Eslováquia\",\"nl\":\"Slowakije\",\"hr\":\"Slovačka\",\"fa\":\"اسلواکی\",\"de\":\"Slowakei\",\"es\":\"República Eslovaca\",\"fr\":\"Slovaquie\",\"ja\":\"スロバキア\",\"it\":\"Slovacchia\",\"cn\":\"斯洛伐克\",\"tr\":\"Slovakya\"}', 48.66666666, 19.50000000, '🇸🇰', 'U+1F1F8 U+1F1F0', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(201, 'Slovenia', 'SVN', '705', 'SI', '386', 'Ljubljana', 'EUR', 'Euro', '€', '.si', 'Slovenija', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Europe/Ljubljana\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"슬로베니아\",\"pt-BR\":\"Eslovênia\",\"pt\":\"Eslovénia\",\"nl\":\"Slovenië\",\"hr\":\"Slovenija\",\"fa\":\"اسلوونی\",\"de\":\"Slowenien\",\"es\":\"Eslovenia\",\"fr\":\"Slovénie\",\"ja\":\"スロベニア\",\"it\":\"Slovenia\",\"cn\":\"斯洛文尼亚\",\"tr\":\"Slovenya\"}', 46.11666666, 14.81666666, '🇸🇮', 'U+1F1F8 U+1F1EE', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(202, 'Solomon Islands', 'SLB', '090', 'SB', '677', 'Honiara', 'SBD', 'Solomon Islands dollar', 'Si$', '.sb', 'Solomon Islands', 'Oceania', 'Melanesia', '[{\"zoneName\":\"Pacific/Guadalcanal\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"SBT\",\"tzName\":\"Solomon Islands Time\"}]', '{\"kr\":\"솔로몬 제도\",\"pt-BR\":\"Ilhas Salomão\",\"pt\":\"Ilhas Salomão\",\"nl\":\"Salomonseilanden\",\"hr\":\"Solomonski Otoci\",\"fa\":\"جزایر سلیمان\",\"de\":\"Salomonen\",\"es\":\"Islas Salomón\",\"fr\":\"Îles Salomon\",\"ja\":\"ソロモン諸島\",\"it\":\"Isole Salomone\",\"cn\":\"所罗门群岛\",\"tr\":\"Solomon Adalari\"}', -8.00000000, 159.00000000, '🇸🇧', 'U+1F1F8 U+1F1E7', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(203, 'Somalia', 'SOM', '706', 'SO', '252', 'Mogadishu', 'SOS', 'Somali shilling', 'Sh.so.', '.so', 'Soomaaliya', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Africa/Mogadishu\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"EAT\",\"tzName\":\"East Africa Time\"}]', '{\"kr\":\"소말리아\",\"pt-BR\":\"Somália\",\"pt\":\"Somália\",\"nl\":\"Somalië\",\"hr\":\"Somalija\",\"fa\":\"سومالی\",\"de\":\"Somalia\",\"es\":\"Somalia\",\"fr\":\"Somalie\",\"ja\":\"ソマリア\",\"it\":\"Somalia\",\"cn\":\"索马里\",\"tr\":\"Somali\"}', 10.00000000, 49.00000000, '🇸🇴', 'U+1F1F8 U+1F1F4', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(204, 'South Africa', 'ZAF', '710', 'ZA', '27', 'Pretoria', 'ZAR', 'South African rand', 'R', '.za', 'South Africa', 'Africa', 'Southern Africa', '[{\"zoneName\":\"Africa/Johannesburg\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"SAST\",\"tzName\":\"South African Standard Time\"}]', '{\"kr\":\"남아프리카 공화국\",\"pt-BR\":\"República Sul-Africana\",\"pt\":\"República Sul-Africana\",\"nl\":\"Zuid-Afrika\",\"hr\":\"Južnoafrička Republika\",\"fa\":\"آفریقای جنوبی\",\"de\":\"Republik Südafrika\",\"es\":\"República de Sudáfrica\",\"fr\":\"Afrique du Sud\",\"ja\":\"南アフリカ\",\"it\":\"Sud Africa\",\"cn\":\"南非\",\"tr\":\"Güney Afrika Cumhuriyeti\"}', -29.00000000, 24.00000000, '🇿🇦', 'U+1F1FF U+1F1E6', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(205, 'South Georgia', 'SGS', '239', 'GS', '500', 'Grytviken', 'GBP', 'British pound', '£', '.gs', 'South Georgia', 'Americas', 'South America', '[{\"zoneName\":\"Atlantic/South_Georgia\",\"gmtOffset\":-7200,\"gmtOffsetName\":\"UTC-02:00\",\"abbreviation\":\"GST\",\"tzName\":\"South Georgia and the South Sandwich Islands Time\"}]', '{\"kr\":\"사우스조지아\",\"pt-BR\":\"Ilhas Geórgias do Sul e Sandwich do Sul\",\"pt\":\"Ilhas Geórgia do Sul e Sanduíche do Sul\",\"nl\":\"Zuid-Georgia en Zuidelijke Sandwicheilanden\",\"hr\":\"Južna Georgija i otočje Južni Sandwich\",\"fa\":\"جزایر جورجیای جنوبی و ساندویچ جنوبی\",\"de\":\"Südgeorgien und die Südlichen Sandwichinseln\",\"es\":\"Islas Georgias del Sur y Sandwich del Sur\",\"fr\":\"Géorgie du Sud-et-les Îles Sandwich du Sud\",\"ja\":\"サウスジョージア・サウスサンドウィッチ諸島\",\"it\":\"Georgia del Sud e Isole Sandwich Meridionali\",\"cn\":\"南乔治亚\",\"tr\":\"Güney Georgia\"}', -54.50000000, -37.00000000, '🇬🇸', 'U+1F1EC U+1F1F8', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(206, 'South Sudan', 'SSD', '728', 'SS', '211', 'Juba', 'SSP', 'South Sudanese pound', '£', '.ss', 'South Sudan', 'Africa', 'Middle Africa', '[{\"zoneName\":\"Africa/Juba\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"EAT\",\"tzName\":\"East Africa Time\"}]', '{\"kr\":\"남수단\",\"pt-BR\":\"Sudão do Sul\",\"pt\":\"Sudão do Sul\",\"nl\":\"Zuid-Soedan\",\"hr\":\"Južni Sudan\",\"fa\":\"سودان جنوبی\",\"de\":\"Südsudan\",\"es\":\"Sudán del Sur\",\"fr\":\"Soudan du Sud\",\"ja\":\"南スーダン\",\"it\":\"Sudan del sud\",\"cn\":\"南苏丹\",\"tr\":\"Güney Sudan\"}', 7.00000000, 30.00000000, '🇸🇸', 'U+1F1F8 U+1F1F8', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(207, 'Spain', 'ESP', '724', 'ES', '34', 'Madrid', 'EUR', 'Euro', '€', '.es', 'España', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Africa/Ceuta\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"},{\"zoneName\":\"Atlantic/Canary\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"WET\",\"tzName\":\"Western European Time\"},{\"zoneName\":\"Europe/Madrid\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"스페인\",\"pt-BR\":\"Espanha\",\"pt\":\"Espanha\",\"nl\":\"Spanje\",\"hr\":\"Španjolska\",\"fa\":\"اسپانیا\",\"de\":\"Spanien\",\"es\":\"España\",\"fr\":\"Espagne\",\"ja\":\"スペイン\",\"it\":\"Spagna\",\"cn\":\"西班牙\",\"tr\":\"İspanya\"}', 40.00000000, -4.00000000, '🇪🇸', 'U+1F1EA U+1F1F8', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(208, 'Sri Lanka', 'LKA', '144', 'LK', '94', 'Colombo', 'LKR', 'Sri Lankan rupee', 'Rs', '.lk', 'śrī laṃkāva', 'Asia', 'Southern Asia', '[{\"zoneName\":\"Asia/Colombo\",\"gmtOffset\":19800,\"gmtOffsetName\":\"UTC+05:30\",\"abbreviation\":\"IST\",\"tzName\":\"Indian Standard Time\"}]', '{\"kr\":\"스리랑카\",\"pt-BR\":\"Sri Lanka\",\"pt\":\"Sri Lanka\",\"nl\":\"Sri Lanka\",\"hr\":\"Šri Lanka\",\"fa\":\"سری‌لانکا\",\"de\":\"Sri Lanka\",\"es\":\"Sri Lanka\",\"fr\":\"Sri Lanka\",\"ja\":\"スリランカ\",\"it\":\"Sri Lanka\",\"cn\":\"斯里兰卡\",\"tr\":\"Sri Lanka\"}', 7.00000000, 81.00000000, '🇱🇰', 'U+1F1F1 U+1F1F0', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(209, 'Sudan', 'SDN', '729', 'SD', '249', 'Khartoum', 'SDG', 'Sudanese pound', '.س.ج', '.sd', 'السودان', 'Africa', 'Northern Africa', '[{\"zoneName\":\"Africa/Khartoum\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EAT\",\"tzName\":\"Eastern African Time\"}]', '{\"kr\":\"수단\",\"pt-BR\":\"Sudão\",\"pt\":\"Sudão\",\"nl\":\"Soedan\",\"hr\":\"Sudan\",\"fa\":\"سودان\",\"de\":\"Sudan\",\"es\":\"Sudán\",\"fr\":\"Soudan\",\"ja\":\"スーダン\",\"it\":\"Sudan\",\"cn\":\"苏丹\",\"tr\":\"Sudan\"}', 15.00000000, 30.00000000, '🇸🇩', 'U+1F1F8 U+1F1E9', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(210, 'Suriname', 'SUR', '740', 'SR', '597', 'Paramaribo', 'SRD', 'Surinamese dollar', '$', '.sr', 'Suriname', 'Americas', 'South America', '[{\"zoneName\":\"America/Paramaribo\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"SRT\",\"tzName\":\"Suriname Time\"}]', '{\"kr\":\"수리남\",\"pt-BR\":\"Suriname\",\"pt\":\"Suriname\",\"nl\":\"Suriname\",\"hr\":\"Surinam\",\"fa\":\"سورینام\",\"de\":\"Suriname\",\"es\":\"Surinam\",\"fr\":\"Surinam\",\"ja\":\"スリナム\",\"it\":\"Suriname\",\"cn\":\"苏里南\",\"tr\":\"Surinam\"}', 4.00000000, -56.00000000, '🇸🇷', 'U+1F1F8 U+1F1F7', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(211, 'Svalbard And Jan Mayen Islands', 'SJM', '744', 'SJ', '47', 'Longyearbyen', 'NOK', 'Norwegian Krone', 'kr', '.sj', 'Svalbard og Jan Mayen', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Arctic/Longyearbyen\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"스발바르 얀마옌 제도\",\"pt-BR\":\"Svalbard\",\"pt\":\"Svalbard\",\"nl\":\"Svalbard en Jan Mayen\",\"hr\":\"Svalbard i Jan Mayen\",\"fa\":\"سوالبارد و یان ماین\",\"de\":\"Svalbard und Jan Mayen\",\"es\":\"Islas Svalbard y Jan Mayen\",\"fr\":\"Svalbard et Jan Mayen\",\"ja\":\"スヴァールバル諸島およびヤンマイエン島\",\"it\":\"Svalbard e Jan Mayen\",\"cn\":\"斯瓦尔巴和扬马延群岛\",\"tr\":\"Svalbard Ve Jan Mayen\"}', 78.00000000, 20.00000000, '🇸🇯', 'U+1F1F8 U+1F1EF', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(212, 'Swaziland', 'SWZ', '748', 'SZ', '268', 'Mbabane', 'SZL', 'Lilangeni', 'E', '.sz', 'Swaziland', 'Africa', 'Southern Africa', '[{\"zoneName\":\"Africa/Mbabane\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"SAST\",\"tzName\":\"South African Standard Time\"}]', '{\"kr\":\"에스와티니\",\"pt-BR\":\"Suazilândia\",\"pt\":\"Suazilândia\",\"nl\":\"Swaziland\",\"hr\":\"Svazi\",\"fa\":\"سوازیلند\",\"de\":\"Swasiland\",\"es\":\"Suazilandia\",\"fr\":\"Swaziland\",\"ja\":\"スワジランド\",\"it\":\"Swaziland\",\"cn\":\"斯威士兰\",\"tr\":\"Esvatini\"}', -26.50000000, 31.50000000, '🇸🇿', 'U+1F1F8 U+1F1FF', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(213, 'Sweden', 'SWE', '752', 'SE', '46', 'Stockholm', 'SEK', 'Swedish krona', 'kr', '.se', 'Sverige', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Europe/Stockholm\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"스웨덴\",\"pt-BR\":\"Suécia\",\"pt\":\"Suécia\",\"nl\":\"Zweden\",\"hr\":\"Švedska\",\"fa\":\"سوئد\",\"de\":\"Schweden\",\"es\":\"Suecia\",\"fr\":\"Suède\",\"ja\":\"スウェーデン\",\"it\":\"Svezia\",\"cn\":\"瑞典\",\"tr\":\"İsveç\"}', 62.00000000, 15.00000000, '🇸🇪', 'U+1F1F8 U+1F1EA', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(214, 'Switzerland', 'CHE', '756', 'CH', '41', 'Bern', 'CHF', 'Swiss franc', 'CHf', '.ch', 'Schweiz', 'Europe', 'Western Europe', '[{\"zoneName\":\"Europe/Zurich\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"스위스\",\"pt-BR\":\"Suíça\",\"pt\":\"Suíça\",\"nl\":\"Zwitserland\",\"hr\":\"Švicarska\",\"fa\":\"سوئیس\",\"de\":\"Schweiz\",\"es\":\"Suiza\",\"fr\":\"Suisse\",\"ja\":\"スイス\",\"it\":\"Svizzera\",\"cn\":\"瑞士\",\"tr\":\"İsviçre\"}', 47.00000000, 8.00000000, '🇨🇭', 'U+1F1E8 U+1F1ED', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(215, 'Syria', 'SYR', '760', 'SY', '963', 'Damascus', 'SYP', 'Syrian pound', 'LS', '.sy', 'سوريا', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Damascus\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"시리아\",\"pt-BR\":\"Síria\",\"pt\":\"Síria\",\"nl\":\"Syrië\",\"hr\":\"Sirija\",\"fa\":\"سوریه\",\"de\":\"Syrien\",\"es\":\"Siria\",\"fr\":\"Syrie\",\"ja\":\"シリア・アラブ共和国\",\"it\":\"Siria\",\"cn\":\"叙利亚\",\"tr\":\"Suriye\"}', 35.00000000, 38.00000000, '🇸🇾', 'U+1F1F8 U+1F1FE', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(216, 'Taiwan', 'TWN', '158', 'TW', '886', 'Taipei', 'TWD', 'New Taiwan dollar', '$', '.tw', '臺灣', 'Asia', 'Eastern Asia', '[{\"zoneName\":\"Asia/Taipei\",\"gmtOffset\":28800,\"gmtOffsetName\":\"UTC+08:00\",\"abbreviation\":\"CST\",\"tzName\":\"China Standard Time\"}]', '{\"kr\":\"대만\",\"pt-BR\":\"Taiwan\",\"pt\":\"Taiwan\",\"nl\":\"Taiwan\",\"hr\":\"Tajvan\",\"fa\":\"تایوان\",\"de\":\"Taiwan\",\"es\":\"Taiwán\",\"fr\":\"Taïwan\",\"ja\":\"台湾（中華民国）\",\"it\":\"Taiwan\",\"cn\":\"中国台湾\",\"tr\":\"Tayvan\"}', 23.50000000, 121.00000000, '🇹🇼', 'U+1F1F9 U+1F1FC', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(217, 'Tajikistan', 'TJK', '762', 'TJ', '992', 'Dushanbe', 'TJS', 'Tajikistani somoni', 'SM', '.tj', 'Тоҷикистон', 'Asia', 'Central Asia', '[{\"zoneName\":\"Asia/Dushanbe\",\"gmtOffset\":18000,\"gmtOffsetName\":\"UTC+05:00\",\"abbreviation\":\"TJT\",\"tzName\":\"Tajikistan Time\"}]', '{\"kr\":\"타지키스탄\",\"pt-BR\":\"Tajiquistão\",\"pt\":\"Tajiquistão\",\"nl\":\"Tadzjikistan\",\"hr\":\"Tađikistan\",\"fa\":\"تاجیکستان\",\"de\":\"Tadschikistan\",\"es\":\"Tayikistán\",\"fr\":\"Tadjikistan\",\"ja\":\"タジキスタン\",\"it\":\"Tagikistan\",\"cn\":\"塔吉克斯坦\",\"tr\":\"Tacikistan\"}', 39.00000000, 71.00000000, '🇹🇯', 'U+1F1F9 U+1F1EF', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(218, 'Tanzania', 'TZA', '834', 'TZ', '255', 'Dodoma', 'TZS', 'Tanzanian shilling', 'TSh', '.tz', 'Tanzania', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Africa/Dar_es_Salaam\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"EAT\",\"tzName\":\"East Africa Time\"}]', '{\"kr\":\"탄자니아\",\"pt-BR\":\"Tanzânia\",\"pt\":\"Tanzânia\",\"nl\":\"Tanzania\",\"hr\":\"Tanzanija\",\"fa\":\"تانزانیا\",\"de\":\"Tansania\",\"es\":\"Tanzania\",\"fr\":\"Tanzanie\",\"ja\":\"タンザニア\",\"it\":\"Tanzania\",\"cn\":\"坦桑尼亚\",\"tr\":\"Tanzanya\"}', -6.00000000, 35.00000000, '🇹🇿', 'U+1F1F9 U+1F1FF', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(219, 'Thailand', 'THA', '764', 'TH', '66', 'Bangkok', 'THB', 'Thai baht', '฿', '.th', 'ประเทศไทย', 'Asia', 'South-Eastern Asia', '[{\"zoneName\":\"Asia/Bangkok\",\"gmtOffset\":25200,\"gmtOffsetName\":\"UTC+07:00\",\"abbreviation\":\"ICT\",\"tzName\":\"Indochina Time\"}]', '{\"kr\":\"태국\",\"pt-BR\":\"Tailândia\",\"pt\":\"Tailândia\",\"nl\":\"Thailand\",\"hr\":\"Tajland\",\"fa\":\"تایلند\",\"de\":\"Thailand\",\"es\":\"Tailandia\",\"fr\":\"Thaïlande\",\"ja\":\"タイ\",\"it\":\"Tailandia\",\"cn\":\"泰国\",\"tr\":\"Tayland\"}', 15.00000000, 100.00000000, '🇹🇭', 'U+1F1F9 U+1F1ED', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(220, 'Togo', 'TGO', '768', 'TG', '228', 'Lome', 'XOF', 'West African CFA franc', 'CFA', '.tg', 'Togo', 'Africa', 'Western Africa', '[{\"zoneName\":\"Africa/Lome\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"토고\",\"pt-BR\":\"Togo\",\"pt\":\"Togo\",\"nl\":\"Togo\",\"hr\":\"Togo\",\"fa\":\"توگو\",\"de\":\"Togo\",\"es\":\"Togo\",\"fr\":\"Togo\",\"ja\":\"トーゴ\",\"it\":\"Togo\",\"cn\":\"多哥\",\"tr\":\"Togo\"}', 8.00000000, 1.16666666, '🇹🇬', 'U+1F1F9 U+1F1EC', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(221, 'Tokelau', 'TKL', '772', 'TK', '690', '', 'NZD', 'New Zealand dollar', '$', '.tk', 'Tokelau', 'Oceania', 'Polynesia', '[{\"zoneName\":\"Pacific/Fakaofo\",\"gmtOffset\":46800,\"gmtOffsetName\":\"UTC+13:00\",\"abbreviation\":\"TKT\",\"tzName\":\"Tokelau Time\"}]', '{\"kr\":\"토켈라우\",\"pt-BR\":\"Tokelau\",\"pt\":\"Toquelau\",\"nl\":\"Tokelau\",\"hr\":\"Tokelau\",\"fa\":\"توکلائو\",\"de\":\"Tokelau\",\"es\":\"Islas Tokelau\",\"fr\":\"Tokelau\",\"ja\":\"トケラウ\",\"it\":\"Isole Tokelau\",\"cn\":\"托克劳\",\"tr\":\"Tokelau\"}', -9.00000000, -172.00000000, '🇹🇰', 'U+1F1F9 U+1F1F0', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(222, 'Tonga', 'TON', '776', 'TO', '676', 'Nuku\'alofa', 'TOP', 'Tongan paʻanga', '$', '.to', 'Tonga', 'Oceania', 'Polynesia', '[{\"zoneName\":\"Pacific/Tongatapu\",\"gmtOffset\":46800,\"gmtOffsetName\":\"UTC+13:00\",\"abbreviation\":\"TOT\",\"tzName\":\"Tonga Time\"}]', '{\"kr\":\"통가\",\"pt-BR\":\"Tonga\",\"pt\":\"Tonga\",\"nl\":\"Tonga\",\"hr\":\"Tonga\",\"fa\":\"تونگا\",\"de\":\"Tonga\",\"es\":\"Tonga\",\"fr\":\"Tonga\",\"ja\":\"トンガ\",\"it\":\"Tonga\",\"cn\":\"汤加\",\"tr\":\"Tonga\"}', -20.00000000, -175.00000000, '🇹🇴', 'U+1F1F9 U+1F1F4', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(223, 'Trinidad And Tobago', 'TTO', '780', 'TT', '+1-868', 'Port of Spain', 'TTD', 'Trinidad and Tobago dollar', '$', '.tt', 'Trinidad and Tobago', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Port_of_Spain\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"트리니다드 토바고\",\"pt-BR\":\"Trinidad e Tobago\",\"pt\":\"Trindade e Tobago\",\"nl\":\"Trinidad en Tobago\",\"hr\":\"Trinidad i Tobago\",\"fa\":\"ترینیداد و توباگو\",\"de\":\"Trinidad und Tobago\",\"es\":\"Trinidad y Tobago\",\"fr\":\"Trinité et Tobago\",\"ja\":\"トリニダード・トバゴ\",\"it\":\"Trinidad e Tobago\",\"cn\":\"特立尼达和多巴哥\",\"tr\":\"Trinidad Ve Tobago\"}', 11.00000000, -61.00000000, '🇹🇹', 'U+1F1F9 U+1F1F9', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(224, 'Tunisia', 'TUN', '788', 'TN', '216', 'Tunis', 'TND', 'Tunisian dinar', 'ت.د', '.tn', 'تونس', 'Africa', 'Northern Africa', '[{\"zoneName\":\"Africa/Tunis\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"튀니지\",\"pt-BR\":\"Tunísia\",\"pt\":\"Tunísia\",\"nl\":\"Tunesië\",\"hr\":\"Tunis\",\"fa\":\"تونس\",\"de\":\"Tunesien\",\"es\":\"Túnez\",\"fr\":\"Tunisie\",\"ja\":\"チュニジア\",\"it\":\"Tunisia\",\"cn\":\"突尼斯\",\"tr\":\"Tunus\"}', 34.00000000, 9.00000000, '🇹🇳', 'U+1F1F9 U+1F1F3', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(225, 'Turkey', 'TUR', '792', 'TR', '90', 'Ankara', 'TRY', 'Turkish lira', '₺', '.tr', 'Türkiye', 'Asia', 'Western Asia', '[{\"zoneName\":\"Europe/Istanbul\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"터키\",\"pt-BR\":\"Turquia\",\"pt\":\"Turquia\",\"nl\":\"Turkije\",\"hr\":\"Turska\",\"fa\":\"ترکیه\",\"de\":\"Türkei\",\"es\":\"Turquía\",\"fr\":\"Turquie\",\"ja\":\"トルコ\",\"it\":\"Turchia\",\"cn\":\"土耳其\",\"tr\":\"Türkiye\"}', 39.00000000, 35.00000000, '🇹🇷', 'U+1F1F9 U+1F1F7', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(226, 'Turkmenistan', 'TKM', '795', 'TM', '993', 'Ashgabat', 'TMT', 'Turkmenistan manat', 'T', '.tm', 'Türkmenistan', 'Asia', 'Central Asia', '[{\"zoneName\":\"Asia/Ashgabat\",\"gmtOffset\":18000,\"gmtOffsetName\":\"UTC+05:00\",\"abbreviation\":\"TMT\",\"tzName\":\"Turkmenistan Time\"}]', '{\"kr\":\"투르크메니스탄\",\"pt-BR\":\"Turcomenistão\",\"pt\":\"Turquemenistão\",\"nl\":\"Turkmenistan\",\"hr\":\"Turkmenistan\",\"fa\":\"ترکمنستان\",\"de\":\"Turkmenistan\",\"es\":\"Turkmenistán\",\"fr\":\"Turkménistan\",\"ja\":\"トルクメニスタン\",\"it\":\"Turkmenistan\",\"cn\":\"土库曼斯坦\",\"tr\":\"Türkmenistan\"}', 40.00000000, 60.00000000, '🇹🇲', 'U+1F1F9 U+1F1F2', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(227, 'Turks And Caicos Islands', 'TCA', '796', 'TC', '+1-649', 'Cockburn Town', 'USD', 'United States dollar', '$', '.tc', 'Turks and Caicos Islands', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Grand_Turk\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"}]', '{\"kr\":\"터크스 케이커스 제도\",\"pt-BR\":\"Ilhas Turcas e Caicos\",\"pt\":\"Ilhas Turcas e Caicos\",\"nl\":\"Turks- en Caicoseilanden\",\"hr\":\"Otoci Turks i Caicos\",\"fa\":\"جزایر تورکس و کایکوس\",\"de\":\"Turks- und Caicosinseln\",\"es\":\"Islas Turks y Caicos\",\"fr\":\"Îles Turques-et-Caïques\",\"ja\":\"タークス・カイコス諸島\",\"it\":\"Isole Turks e Caicos\",\"cn\":\"特克斯和凯科斯群岛\",\"tr\":\"Turks Ve Caicos Adalari\"}', 21.75000000, -71.58333333, '🇹🇨', 'U+1F1F9 U+1F1E8', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(228, 'Tuvalu', 'TUV', '798', 'TV', '688', 'Funafuti', 'AUD', 'Australian dollar', '$', '.tv', 'Tuvalu', 'Oceania', 'Polynesia', '[{\"zoneName\":\"Pacific/Funafuti\",\"gmtOffset\":43200,\"gmtOffsetName\":\"UTC+12:00\",\"abbreviation\":\"TVT\",\"tzName\":\"Tuvalu Time\"}]', '{\"kr\":\"투발루\",\"pt-BR\":\"Tuvalu\",\"pt\":\"Tuvalu\",\"nl\":\"Tuvalu\",\"hr\":\"Tuvalu\",\"fa\":\"تووالو\",\"de\":\"Tuvalu\",\"es\":\"Tuvalu\",\"fr\":\"Tuvalu\",\"ja\":\"ツバル\",\"it\":\"Tuvalu\",\"cn\":\"图瓦卢\",\"tr\":\"Tuvalu\"}', -8.00000000, 178.00000000, '🇹🇻', 'U+1F1F9 U+1F1FB', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(229, 'Uganda', 'UGA', '800', 'UG', '256', 'Kampala', 'UGX', 'Ugandan shilling', 'USh', '.ug', 'Uganda', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Africa/Kampala\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"EAT\",\"tzName\":\"East Africa Time\"}]', '{\"kr\":\"우간다\",\"pt-BR\":\"Uganda\",\"pt\":\"Uganda\",\"nl\":\"Oeganda\",\"hr\":\"Uganda\",\"fa\":\"اوگاندا\",\"de\":\"Uganda\",\"es\":\"Uganda\",\"fr\":\"Uganda\",\"ja\":\"ウガンダ\",\"it\":\"Uganda\",\"cn\":\"乌干达\",\"tr\":\"Uganda\"}', 1.00000000, 32.00000000, '🇺🇬', 'U+1F1FA U+1F1EC', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(230, 'Ukraine', 'UKR', '804', 'UA', '380', 'Kiev', 'UAH', 'Ukrainian hryvnia', '₴', '.ua', 'Україна', 'Europe', 'Eastern Europe', '[{\"zoneName\":\"Europe/Kiev\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"},{\"zoneName\":\"Europe/Simferopol\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"MSK\",\"tzName\":\"Moscow Time\"},{\"zoneName\":\"Europe/Uzhgorod\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"},{\"zoneName\":\"Europe/Zaporozhye\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"우크라이나\",\"pt-BR\":\"Ucrânia\",\"pt\":\"Ucrânia\",\"nl\":\"Oekraïne\",\"hr\":\"Ukrajina\",\"fa\":\"وکراین\",\"de\":\"Ukraine\",\"es\":\"Ucrania\",\"fr\":\"Ukraine\",\"ja\":\"ウクライナ\",\"it\":\"Ucraina\",\"cn\":\"乌克兰\",\"tr\":\"Ukrayna\"}', 49.00000000, 32.00000000, '🇺🇦', 'U+1F1FA U+1F1E6', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(231, 'United Arab Emirates', 'ARE', '784', 'AE', '971', 'Abu Dhabi', 'AED', 'United Arab Emirates dirham', 'إ.د', '.ae', 'دولة الإمارات العربية المتحدة', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Dubai\",\"gmtOffset\":14400,\"gmtOffsetName\":\"UTC+04:00\",\"abbreviation\":\"GST\",\"tzName\":\"Gulf Standard Time\"}]', '{\"kr\":\"아랍에미리트\",\"pt-BR\":\"Emirados árabes Unidos\",\"pt\":\"Emirados árabes Unidos\",\"nl\":\"Verenigde Arabische Emiraten\",\"hr\":\"Ujedinjeni Arapski Emirati\",\"fa\":\"امارات متحده عربی\",\"de\":\"Vereinigte Arabische Emirate\",\"es\":\"Emiratos Árabes Unidos\",\"fr\":\"Émirats arabes unis\",\"ja\":\"アラブ首長国連邦\",\"it\":\"Emirati Arabi Uniti\",\"cn\":\"阿拉伯联合酋长国\",\"tr\":\"Birleşik Arap Emirlikleri\"}', 24.00000000, 54.00000000, '🇦🇪', 'U+1F1E6 U+1F1EA', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(232, 'United Kingdom', 'GBR', '826', 'GB', '44', 'London', 'GBP', 'British pound', '£', '.uk', 'United Kingdom', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Europe/London\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"영국\",\"pt-BR\":\"Reino Unido\",\"pt\":\"Reino Unido\",\"nl\":\"Verenigd Koninkrijk\",\"hr\":\"Ujedinjeno Kraljevstvo\",\"fa\":\"بریتانیای کبیر و ایرلند شمالی\",\"de\":\"Vereinigtes Königreich\",\"es\":\"Reino Unido\",\"fr\":\"Royaume-Uni\",\"ja\":\"イギリス\",\"it\":\"Regno Unito\",\"cn\":\"英国\",\"tr\":\"Birleşik Krallik\"}', 54.00000000, -2.00000000, '🇬🇧', 'U+1F1EC U+1F1E7', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(233, 'United States', 'USA', '840', 'US', '1', 'Washington', 'USD', 'United States dollar', '$', '.us', 'United States', 'Americas', 'Northern America', '[{\"zoneName\":\"America/Adak\",\"gmtOffset\":-36000,\"gmtOffsetName\":\"UTC-10:00\",\"abbreviation\":\"HST\",\"tzName\":\"Hawaii–Aleutian Standard Time\"},{\"zoneName\":\"America/Anchorage\",\"gmtOffset\":-32400,\"gmtOffsetName\":\"UTC-09:00\",\"abbreviation\":\"AKST\",\"tzName\":\"Alaska Standard Time\"},{\"zoneName\":\"America/Boise\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America\"},{\"zoneName\":\"America/Chicago\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/Denver\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America\"},{\"zoneName\":\"America/Detroit\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Indiana/Indianapolis\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Indiana/Knox\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/Indiana/Marengo\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Indiana/Petersburg\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Indiana/Tell_City\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/Indiana/Vevay\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Indiana/Vincennes\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Indiana/Winamac\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Juneau\",\"gmtOffset\":-32400,\"gmtOffsetName\":\"UTC-09:00\",\"abbreviation\":\"AKST\",\"tzName\":\"Alaska Standard Time\"},{\"zoneName\":\"America/Kentucky/Louisville\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Kentucky/Monticello\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Los_Angeles\",\"gmtOffset\":-28800,\"gmtOffsetName\":\"UTC-08:00\",\"abbreviation\":\"PST\",\"tzName\":\"Pacific Standard Time (North America\"},{\"zoneName\":\"America/Menominee\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/Metlakatla\",\"gmtOffset\":-32400,\"gmtOffsetName\":\"UTC-09:00\",\"abbreviation\":\"AKST\",\"tzName\":\"Alaska Standard Time\"},{\"zoneName\":\"America/New_York\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Nome\",\"gmtOffset\":-32400,\"gmtOffsetName\":\"UTC-09:00\",\"abbreviation\":\"AKST\",\"tzName\":\"Alaska Standard Time\"},{\"zoneName\":\"America/North_Dakota/Beulah\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/North_Dakota/Center\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/North_Dakota/New_Salem\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/Phoenix\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America\"},{\"zoneName\":\"America/Sitka\",\"gmtOffset\":-32400,\"gmtOffsetName\":\"UTC-09:00\",\"abbreviation\":\"AKST\",\"tzName\":\"Alaska Standard Time\"},{\"zoneName\":\"America/Yakutat\",\"gmtOffset\":-32400,\"gmtOffsetName\":\"UTC-09:00\",\"abbreviation\":\"AKST\",\"tzName\":\"Alaska Standard Time\"},{\"zoneName\":\"Pacific/Honolulu\",\"gmtOffset\":-36000,\"gmtOffsetName\":\"UTC-10:00\",\"abbreviation\":\"HST\",\"tzName\":\"Hawaii–Aleutian Standard Time\"}]', '{\"kr\":\"미국\",\"pt-BR\":\"Estados Unidos\",\"pt\":\"Estados Unidos\",\"nl\":\"Verenigde Staten\",\"hr\":\"Sjedinjene Američke Države\",\"fa\":\"ایالات متحده آمریکا\",\"de\":\"Vereinigte Staaten von Amerika\",\"es\":\"Estados Unidos\",\"fr\":\"États-Unis\",\"ja\":\"アメリカ合衆国\",\"it\":\"Stati Uniti D\'America\",\"cn\":\"美国\",\"tr\":\"Amerika\"}', 38.00000000, -97.00000000, '🇺🇸', 'U+1F1FA U+1F1F8', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(234, 'United States Minor Outlying Islands', 'UMI', '581', 'UM', '1', '', 'USD', 'United States dollar', '$', '.us', 'United States Minor Outlying Islands', 'Americas', 'Northern America', '[{\"zoneName\":\"Pacific/Midway\",\"gmtOffset\":-39600,\"gmtOffsetName\":\"UTC-11:00\",\"abbreviation\":\"SST\",\"tzName\":\"Samoa Standard Time\"},{\"zoneName\":\"Pacific/Wake\",\"gmtOffset\":43200,\"gmtOffsetName\":\"UTC+12:00\",\"abbreviation\":\"WAKT\",\"tzName\":\"Wake Island Time\"}]', '{\"kr\":\"미국령 군소 제도\",\"pt-BR\":\"Ilhas Menores Distantes dos Estados Unidos\",\"pt\":\"Ilhas Menores Distantes dos Estados Unidos\",\"nl\":\"Kleine afgelegen eilanden van de Verenigde Staten\",\"hr\":\"Mali udaljeni otoci SAD-a\",\"fa\":\"جزایر کوچک حاشیه‌ای ایالات متحده آمریکا\",\"de\":\"Kleinere Inselbesitzungen der Vereinigten Staaten\",\"es\":\"Islas Ultramarinas Menores de Estados Unidos\",\"fr\":\"Îles mineures éloignées des États-Unis\",\"ja\":\"合衆国領有小離島\",\"it\":\"Isole minori esterne degli Stati Uniti d\'America\",\"cn\":\"美国本土外小岛屿\",\"tr\":\"Abd Küçük Harici Adalari\"}', 0.00000000, 0.00000000, '🇺🇲', 'U+1F1FA U+1F1F2', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(235, 'Uruguay', 'URY', '858', 'UY', '598', 'Montevideo', 'UYU', 'Uruguayan peso', '$', '.uy', 'Uruguay', 'Americas', 'South America', '[{\"zoneName\":\"America/Montevideo\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"UYT\",\"tzName\":\"Uruguay Standard Time\"}]', '{\"kr\":\"우루과이\",\"pt-BR\":\"Uruguai\",\"pt\":\"Uruguai\",\"nl\":\"Uruguay\",\"hr\":\"Urugvaj\",\"fa\":\"اروگوئه\",\"de\":\"Uruguay\",\"es\":\"Uruguay\",\"fr\":\"Uruguay\",\"ja\":\"ウルグアイ\",\"it\":\"Uruguay\",\"cn\":\"乌拉圭\",\"tr\":\"Uruguay\"}', -33.00000000, -56.00000000, '🇺🇾', 'U+1F1FA U+1F1FE', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(236, 'Uzbekistan', 'UZB', '860', 'UZ', '998', 'Tashkent', 'UZS', 'Uzbekistani soʻm', 'лв', '.uz', 'O‘zbekiston', 'Asia', 'Central Asia', '[{\"zoneName\":\"Asia/Samarkand\",\"gmtOffset\":18000,\"gmtOffsetName\":\"UTC+05:00\",\"abbreviation\":\"UZT\",\"tzName\":\"Uzbekistan Time\"},{\"zoneName\":\"Asia/Tashkent\",\"gmtOffset\":18000,\"gmtOffsetName\":\"UTC+05:00\",\"abbreviation\":\"UZT\",\"tzName\":\"Uzbekistan Time\"}]', '{\"kr\":\"우즈베키스탄\",\"pt-BR\":\"Uzbequistão\",\"pt\":\"Usbequistão\",\"nl\":\"Oezbekistan\",\"hr\":\"Uzbekistan\",\"fa\":\"ازبکستان\",\"de\":\"Usbekistan\",\"es\":\"Uzbekistán\",\"fr\":\"Ouzbékistan\",\"ja\":\"ウズベキスタン\",\"it\":\"Uzbekistan\",\"cn\":\"乌兹别克斯坦\",\"tr\":\"Özbekistan\"}', 41.00000000, 64.00000000, '🇺🇿', 'U+1F1FA U+1F1FF', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(237, 'Vanuatu', 'VUT', '548', 'VU', '678', 'Port Vila', 'VUV', 'Vanuatu vatu', 'VT', '.vu', 'Vanuatu', 'Oceania', 'Melanesia', '[{\"zoneName\":\"Pacific/Efate\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"VUT\",\"tzName\":\"Vanuatu Time\"}]', '{\"kr\":\"바누아투\",\"pt-BR\":\"Vanuatu\",\"pt\":\"Vanuatu\",\"nl\":\"Vanuatu\",\"hr\":\"Vanuatu\",\"fa\":\"وانواتو\",\"de\":\"Vanuatu\",\"es\":\"Vanuatu\",\"fr\":\"Vanuatu\",\"ja\":\"バヌアツ\",\"it\":\"Vanuatu\",\"cn\":\"瓦努阿图\",\"tr\":\"Vanuatu\"}', -16.00000000, 167.00000000, '🇻🇺', 'U+1F1FB U+1F1FA', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(238, 'Vatican City State (Holy See)', 'VAT', '336', 'VA', '379', 'Vatican City', 'EUR', 'Euro', '€', '.va', 'Vaticano', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Europe/Vatican\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"바티칸 시국\",\"pt-BR\":\"Vaticano\",\"pt\":\"Vaticano\",\"nl\":\"Heilige Stoel\",\"hr\":\"Sveta Stolica\",\"fa\":\"سریر مقدس\",\"de\":\"Heiliger Stuhl\",\"es\":\"Santa Sede\",\"fr\":\"voir Saint\",\"ja\":\"聖座\",\"it\":\"Santa Sede\",\"cn\":\"梵蒂冈\",\"tr\":\"Vatikan\"}', 41.90000000, 12.45000000, '🇻🇦', 'U+1F1FB U+1F1E6', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(239, 'Venezuela', 'VEN', '862', 'VE', '58', 'Caracas', 'VEF', 'Bolívar', 'Bs', '.ve', 'Venezuela', 'Americas', 'South America', '[{\"zoneName\":\"America/Caracas\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"VET\",\"tzName\":\"Venezuelan Standard Time\"}]', '{\"kr\":\"베네수엘라\",\"pt-BR\":\"Venezuela\",\"pt\":\"Venezuela\",\"nl\":\"Venezuela\",\"hr\":\"Venezuela\",\"fa\":\"ونزوئلا\",\"de\":\"Venezuela\",\"es\":\"Venezuela\",\"fr\":\"Venezuela\",\"ja\":\"ベネズエラ・ボリバル共和国\",\"it\":\"Venezuela\",\"cn\":\"委内瑞拉\",\"tr\":\"Venezuela\"}', 8.00000000, -66.00000000, '🇻🇪', 'U+1F1FB U+1F1EA', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(240, 'Vietnam', 'VNM', '704', 'VN', '84', 'Hanoi', 'VND', 'Vietnamese đồng', '₫', '.vn', 'Việt Nam', 'Asia', 'South-Eastern Asia', '[{\"zoneName\":\"Asia/Ho_Chi_Minh\",\"gmtOffset\":25200,\"gmtOffsetName\":\"UTC+07:00\",\"abbreviation\":\"ICT\",\"tzName\":\"Indochina Time\"}]', '{\"kr\":\"베트남\",\"pt-BR\":\"Vietnã\",\"pt\":\"Vietname\",\"nl\":\"Vietnam\",\"hr\":\"Vijetnam\",\"fa\":\"ویتنام\",\"de\":\"Vietnam\",\"es\":\"Vietnam\",\"fr\":\"Viêt Nam\",\"ja\":\"ベトナム\",\"it\":\"Vietnam\",\"cn\":\"越南\",\"tr\":\"Vietnam\"}', 16.16666666, 107.83333333, '🇻🇳', 'U+1F1FB U+1F1F3', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(241, 'Virgin Islands (British)', 'VGB', '092', 'VG', '+1-284', 'Road Town', 'USD', 'United States dollar', '$', '.vg', 'British Virgin Islands', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Tortola\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"영국령 버진아일랜드\",\"pt-BR\":\"Ilhas Virgens Britânicas\",\"pt\":\"Ilhas Virgens Britânicas\",\"nl\":\"Britse Maagdeneilanden\",\"hr\":\"Britanski Djevičanski Otoci\",\"fa\":\"جزایر ویرجین بریتانیا\",\"de\":\"Britische Jungferninseln\",\"es\":\"Islas Vírgenes del Reino Unido\",\"fr\":\"Îles Vierges britanniques\",\"ja\":\"イギリス領ヴァージン諸島\",\"it\":\"Isole Vergini Britanniche\",\"cn\":\"圣文森特和格林纳丁斯\",\"tr\":\"Britanya Virjin Adalari\"}', 18.43138300, -64.62305000, '🇻🇬', 'U+1F1FB U+1F1EC', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(242, 'Virgin Islands (US)', 'VIR', '850', 'VI', '+1-340', 'Charlotte Amalie', 'USD', 'United States dollar', '$', '.vi', 'United States Virgin Islands', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/St_Thomas\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"미국령 버진아일랜드\",\"pt-BR\":\"Ilhas Virgens Americanas\",\"pt\":\"Ilhas Virgens Americanas\",\"nl\":\"Verenigde Staten Maagdeneilanden\",\"fa\":\"جزایر ویرجین آمریکا\",\"de\":\"Amerikanische Jungferninseln\",\"es\":\"Islas Vírgenes de los Estados Unidos\",\"fr\":\"Îles Vierges des États-Unis\",\"ja\":\"アメリカ領ヴァージン諸島\",\"it\":\"Isole Vergini americane\",\"cn\":\"维尔京群岛（美国）\",\"tr\":\"Abd Virjin Adalari\"}', 18.34000000, -64.93000000, '🇻🇮', 'U+1F1FB U+1F1EE', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(243, 'Wallis And Futuna Islands', 'WLF', '876', 'WF', '681', 'Mata Utu', 'XPF', 'CFP franc', '₣', '.wf', 'Wallis et Futuna', 'Oceania', 'Polynesia', '[{\"zoneName\":\"Pacific/Wallis\",\"gmtOffset\":43200,\"gmtOffsetName\":\"UTC+12:00\",\"abbreviation\":\"WFT\",\"tzName\":\"Wallis & Futuna Time\"}]', '{\"kr\":\"왈리스 푸투나\",\"pt-BR\":\"Wallis e Futuna\",\"pt\":\"Wallis e Futuna\",\"nl\":\"Wallis en Futuna\",\"hr\":\"Wallis i Fortuna\",\"fa\":\"والیس و فوتونا\",\"de\":\"Wallis und Futuna\",\"es\":\"Wallis y Futuna\",\"fr\":\"Wallis-et-Futuna\",\"ja\":\"ウォリス・フツナ\",\"it\":\"Wallis e Futuna\",\"cn\":\"瓦利斯群岛和富图纳群岛\",\"tr\":\"Wallis Ve Futuna\"}', -13.30000000, -176.20000000, '🇼🇫', 'U+1F1FC U+1F1EB', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(244, 'Western Sahara', 'ESH', '732', 'EH', '212', 'El-Aaiun', 'MAD', 'Moroccan Dirham', 'MAD', '.eh', 'الصحراء الغربية', 'Africa', 'Northern Africa', '[{\"zoneName\":\"Africa/El_Aaiun\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"WEST\",\"tzName\":\"Western European Summer Time\"}]', '{\"kr\":\"서사하라\",\"pt-BR\":\"Saara Ocidental\",\"pt\":\"Saara Ocidental\",\"nl\":\"Westelijke Sahara\",\"hr\":\"Zapadna Sahara\",\"fa\":\"جمهوری دموکراتیک عربی صحرا\",\"de\":\"Westsahara\",\"es\":\"Sahara Occidental\",\"fr\":\"Sahara Occidental\",\"ja\":\"西サハラ\",\"it\":\"Sahara Occidentale\",\"cn\":\"西撒哈拉\",\"tr\":\"Bati Sahra\"}', 24.50000000, -13.00000000, '🇪🇭', 'U+1F1EA U+1F1ED', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(245, 'Yemen', 'YEM', '887', 'YE', '967', 'Sanaa', 'YER', 'Yemeni rial', '﷼', '.ye', 'اليَمَن', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Aden\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"AST\",\"tzName\":\"Arabia Standard Time\"}]', '{\"kr\":\"예멘\",\"pt-BR\":\"Iêmen\",\"pt\":\"Iémen\",\"nl\":\"Jemen\",\"hr\":\"Jemen\",\"fa\":\"یمن\",\"de\":\"Jemen\",\"es\":\"Yemen\",\"fr\":\"Yémen\",\"ja\":\"イエメン\",\"it\":\"Yemen\",\"cn\":\"也门\",\"tr\":\"Yemen\"}', 15.00000000, 48.00000000, '🇾🇪', 'U+1F1FE U+1F1EA', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(246, 'Zambia', 'ZMB', '894', 'ZM', '260', 'Lusaka', 'ZMW', 'Zambian kwacha', 'ZK', '.zm', 'Zambia', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Africa/Lusaka\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"CAT\",\"tzName\":\"Central Africa Time\"}]', '{\"kr\":\"잠비아\",\"pt-BR\":\"Zâmbia\",\"pt\":\"Zâmbia\",\"nl\":\"Zambia\",\"hr\":\"Zambija\",\"fa\":\"زامبیا\",\"de\":\"Sambia\",\"es\":\"Zambia\",\"fr\":\"Zambie\",\"ja\":\"ザンビア\",\"it\":\"Zambia\",\"cn\":\"赞比亚\",\"tr\":\"Zambiya\"}', -15.00000000, 30.00000000, '🇿🇲', 'U+1F1FF U+1F1F2', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(247, 'Zimbabwe', 'ZWE', '716', 'ZW', '263', 'Harare', 'ZWL', 'Zimbabwe Dollar', '$', '.zw', 'Zimbabwe', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Africa/Harare\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"CAT\",\"tzName\":\"Central Africa Time\"}]', '{\"kr\":\"짐바브웨\",\"pt-BR\":\"Zimbabwe\",\"pt\":\"Zimbabué\",\"nl\":\"Zimbabwe\",\"hr\":\"Zimbabve\",\"fa\":\"زیمباوه\",\"de\":\"Simbabwe\",\"es\":\"Zimbabue\",\"fr\":\"Zimbabwe\",\"ja\":\"ジンバブエ\",\"it\":\"Zimbabwe\",\"cn\":\"津巴布韦\",\"tr\":\"Zimbabve\"}', -20.00000000, 30.00000000, '🇿🇼', 'U+1F1FF U+1F1FC', '2018-07-20 13:11:03', '2022-05-21 03:39:27', 1, 1),
(248, 'Kosovo', 'XKX', '926', 'XK', '383', 'Pristina', 'EUR', 'Euro', '€', '.xk', 'Republika e Kosovës', 'Europe', 'Eastern Europe', '[{\"zoneName\":\"Europe/Belgrade\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"코소보\",\"cn\":\"科索沃\",\"tr\":\"Kosova\"}', 42.56129090, 20.34030350, '🇽🇰', 'U+1F1FD U+1F1F0', '2020-08-15 08:33:50', '2022-05-21 03:39:27', 1, 1),
(249, 'Curaçao', 'CUW', '531', 'CW', '599', 'Willemstad', 'ANG', 'Netherlands Antillean guilder', 'ƒ', '.cw', 'Curaçao', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Curacao\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"퀴라소\",\"pt-BR\":\"Curaçao\",\"pt\":\"Curaçao\",\"nl\":\"Curaçao\",\"fa\":\"کوراسائو\",\"de\":\"Curaçao\",\"fr\":\"Curaçao\",\"it\":\"Curaçao\",\"cn\":\"库拉索\",\"tr\":\"Curaçao\"}', 12.11666700, -68.93333300, '🇨🇼', 'U+1F1E8 U+1F1FC', '2020-10-25 07:54:20', '2022-05-21 03:39:27', 1, 1),
(250, 'Sint Maarten (Dutch part)', 'SXM', '534', 'SX', '1721', 'Philipsburg', 'ANG', 'Netherlands Antillean guilder', 'ƒ', '.sx', 'Sint Maarten', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Anguilla\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"신트마르턴\",\"pt-BR\":\"Sint Maarten\",\"pt\":\"São Martinho\",\"nl\":\"Sint Maarten\",\"fa\":\"سینت مارتن\",\"de\":\"Sint Maarten (niederl. Teil)\",\"fr\":\"Saint Martin (partie néerlandaise)\",\"it\":\"Saint Martin (parte olandese)\",\"cn\":\"圣马丁岛（荷兰部分）\",\"tr\":\"Sint Maarten\"}', 18.03333300, -63.05000000, '🇸🇽', 'U+1F1F8 U+1F1FD', '2020-12-05 06:03:39', '2022-05-21 03:39:27', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symbol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `code`, `symbol`, `created_at`, `updated_at`) VALUES
(1, 'Leke', 'ALL', 'Lek', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(2, 'Dollars', 'USD', '$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(3, 'Afghanis', 'AFN', '؋', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(4, 'Pesos', 'ARS', '$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(5, 'Guilders', 'AWG', 'ƒ', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(6, 'Dollars', 'AUD', '$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(7, 'New Manats', 'AZN', 'ман', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(8, 'Dollars', 'BSD', '$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(9, 'Dollars', 'BBD', '$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(10, 'Rubles', 'BYR', 'p.', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(11, 'Euro', 'EUR', '€', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(12, 'Dollars', 'BZD', 'BZ$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(13, 'Dollars', 'BMD', '$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(14, 'Bolivianos', 'BOB', '$b', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(15, 'Convertible Marka', 'BAM', 'KM', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(16, 'Pula', 'BWP', 'P', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(17, 'Leva', 'BGN', 'лв', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(18, 'Reais', 'BRL', 'R$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(19, 'Pounds', 'GBP', '£', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(20, 'Dollars', 'BND', '$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(21, 'Riels', 'KHR', '៛', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(22, 'Dollars', 'CAD', '$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(23, 'Dollars', 'KYD', '$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(24, 'Pesos', 'CLP', '$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(25, 'Yuan Renminbi', 'CNY', '¥', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(26, 'Pesos', 'COP', '$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(27, 'Colón', 'CRC', '₡', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(28, 'Kuna', 'HRK', 'kn', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(29, 'Pesos', 'CUP', '₱', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(30, 'Koruny', 'CZK', 'Kč', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(31, 'Kroner', 'DKK', 'kr', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(32, 'Pesos', 'DOP ', 'RD$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(33, 'Dollars', 'XCD', '$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(34, 'Pounds', 'EGP', '£', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(35, 'Colones', 'SVC', '$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(36, 'Pounds', 'FKP', '£', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(37, 'Dollars', 'FJD', '$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(38, 'Cedis', 'GHC', '¢', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(39, 'Pounds', 'GIP', '£', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(40, 'Quetzales', 'GTQ', 'Q', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(41, 'Pounds', 'GGP', '£', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(42, 'Dollars', 'GYD', '$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(43, 'Lempiras', 'HNL', 'L', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(44, 'Dollars', 'HKD', '$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(45, 'Forint', 'HUF', 'Ft', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(46, 'Kronur', 'ISK', 'kr', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(47, 'Rupees', 'INR', '₹', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(48, 'Rupiahs', 'IDR', 'Rp', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(49, 'Rials', 'IRR', '﷼', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(50, 'Pounds', 'IMP', '£', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(51, 'New Shekels', 'ILS', '₪', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(52, 'Dollars', 'JMD', 'J$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(53, 'Yen', 'JPY', '¥', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(54, 'Pounds', 'JEP', '£', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(55, 'Tenge', 'KZT', 'лв', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(56, 'Won', 'KPW', '₩', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(57, 'Won', 'KRW', '₩', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(58, 'Soms', 'KGS', 'лв', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(59, 'Kips', 'LAK', '₭', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(60, 'Lati', 'LVL', 'Ls', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(61, 'Pounds', 'LBP', '£', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(62, 'Dollars', 'LRD', '$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(63, 'Switzerland Francs', 'CHF', 'CHF', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(64, 'Litai', 'LTL', 'Lt', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(65, 'Denars', 'MKD', 'ден', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(66, 'Ringgits', 'MYR', 'RM', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(67, 'Rupees', 'MUR', '₨', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(68, 'Pesos', 'MXN', '$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(69, 'Tugriks', 'MNT', '₮', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(70, 'Meticais', 'MZN', 'MT', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(71, 'Dollars', 'NAD', '$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(72, 'Rupees', 'NPR', '₨', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(73, 'Guilders', 'ANG', 'ƒ', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(74, 'Dollars', 'NZD', '$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(75, 'Cordobas', 'NIO', 'C$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(76, 'Nairas', 'NGN', '₦', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(77, 'Krone', 'NOK', 'kr', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(78, 'Rials', 'OMR', '﷼', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(79, 'Rupees', 'PKR', '₨', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(80, 'Balboa', 'PAB', 'B/.', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(81, 'Guarani', 'PYG', 'Gs', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(82, 'Nuevos Soles', 'PEN', 'S/.', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(83, 'Pesos', 'PHP', 'Php', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(84, 'Zlotych', 'PLN', 'zł', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(85, 'Rials', 'QAR', '﷼', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(86, 'New Lei', 'RON', 'lei', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(87, 'Rubles', 'RUB', 'руб', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(88, 'Pounds', 'SHP', '£', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(89, 'Riyals', 'SAR', '﷼', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(90, 'Dinars', 'RSD', 'Дин.', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(91, 'Rupees', 'SCR', '₨', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(92, 'Dollars', 'SGD', '$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(93, 'Dollars', 'SBD', '$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(94, 'Shillings', 'SOS', 'S', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(95, 'Rand', 'ZAR', 'R', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(96, 'Rupees', 'LKR', '₨', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(97, 'Kronor', 'SEK', 'kr', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(98, 'Dollars', 'SRD', '$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(99, 'Pounds', 'SYP', '£', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(100, 'New Dollars', 'TWD', 'NT$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(101, 'Baht', 'THB', '฿', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(102, 'Dollars', 'TTD', 'TT$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(103, 'Lira', 'TRY', 'TL', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(104, 'Liras', 'TRL', '£', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(105, 'Dollars', 'TVD', '$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(106, 'Hryvnia', 'UAH', '₴', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(107, 'Pesos', 'UYU', '$U', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(108, 'Sums', 'UZS', 'лв', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(109, 'Bolivares Fuertes', 'VEF', 'Bs', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(110, 'Dong', 'VND', '₫', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(111, 'Rials', 'YER', '﷼', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(112, 'Taka', 'BDT', '৳', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(113, 'Zimbabwe Dollars', 'ZWD', 'Z$', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(114, 'Kenya', 'KES', 'KSh', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(115, 'Nigeria', 'naira', '₦', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(116, 'Ghana', 'GHS', 'GH₵', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(117, 'Ethiopian', 'ETB', 'Br', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(118, 'Tanzania', 'TZS', 'TSh', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(119, 'Uganda', 'UGX', 'USh', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(120, 'Rwandan', 'FRW', 'FRw', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(121, 'UAE Dirham', 'AED', 'د.إ', '2024-04-18 23:47:40', '2024-04-18 23:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'HRM', 'active', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(2, 'Admin', 'active', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(3, 'Accounts', 'active', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(4, 'Development', 'active', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(5, 'Software', 'active', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(6, 'Land Lord', 'active', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(7, 'Tenant', 'active', '2024-04-18 23:47:39', '2024-04-18 23:47:39');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint UNSIGNED NOT NULL,
  `country_id` bigint UNSIGNED DEFAULT '1',
  `division_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bn_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lon` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint UNSIGNED NOT NULL,
  `country_id` bigint UNSIGNED DEFAULT '1',
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bn_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `country_id`, `name`, `bn_name`, `url`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dhaka', '', '', 1, '2021-07-19 01:53:07', '2021-07-19 01:53:07'),
(2, 1, 'Mymensingh', '', '', 1, '2021-07-19 01:53:10', '2021-07-19 01:53:10'),
(3, 1, 'Khulna', '', '', 1, '2021-07-19 01:53:10', '2021-07-19 01:53:10'),
(4, 1, 'Rajshahi', '', '', 1, '2021-07-19 01:53:11', '2021-07-19 01:53:11'),
(5, 1, 'Sylhet', '', '', 1, '2021-07-19 01:53:12', '2021-07-19 01:53:12'),
(6, 1, 'Barisal', '', '', 1, '2021-07-19 01:53:12', '2021-07-19 01:53:12'),
(7, 1, 'Chittagong', '', '', 1, '2021-07-19 01:53:12', '2021-07-19 01:53:12'),
(8, 1, 'Rangpur', '', '', 1, '2021-07-19 01:53:13', '2021-07-19 01:53:13');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint UNSIGNED NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` decimal(8,2) DEFAULT '0.00',
  `attachment_table` enum('property','tenant','landlord','user') COLLATE utf8mb4_unicode_ci DEFAULT 'property',
  `attachment_table_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `attachment_id` bigint UNSIGNED NOT NULL,
  `attachment_type` enum('normal','agreement','contract','invoice','receipt','complain') COLLATE utf8mb4_unicode_ci DEFAULT 'normal',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `due_payments`
--

CREATE TABLE `due_payments` (
  `id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `tenant_id` bigint UNSIGNED NOT NULL,
  `landlord_id` bigint UNSIGNED NOT NULL,
  `sourceable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sourceable_id` bigint UNSIGNED NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `paid_amount` double NOT NULL DEFAULT '0',
  `due_amount` double NOT NULL DEFAULT '0',
  `payment_status` enum('paid','due','partial') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'due',
  `created_by` bigint UNSIGNED NOT NULL,
  `updated_by` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contacts`
--

CREATE TABLE `emergency_contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupied` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('Emergency','Reference') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_id` bigint UNSIGNED DEFAULT NULL,
  `property_tenant_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `account_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `date` date NOT NULL,
  `reference` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `attachment_id` bigint UNSIGNED DEFAULT NULL,
  `created_by` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `family_members`
--

CREATE TABLE `family_members` (
  `id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `tenant_id` bigint UNSIGNED NOT NULL,
  `order_details_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_id` bigint UNSIGNED DEFAULT NULL,
  `document_id` bigint UNSIGNED DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `icon_id` bigint UNSIGNED DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flag_icons`
--

CREATE TABLE `flag_icons` (
  `id` bigint UNSIGNED NOT NULL,
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flag_icons`
--

INSERT INTO `flag_icons` (`id`, `icon_class`, `title`, `created_at`, `updated_at`) VALUES
(1, 'flag-icon flag-icon-ad', 'ad', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(2, 'flag-icon flag-icon-ae', 'ae', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(3, 'flag-icon flag-icon-af', 'af', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(4, 'flag-icon flag-icon-ag', 'ag', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(5, 'flag-icon flag-icon-ai', 'ai', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(6, 'flag-icon flag-icon-al', 'al', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(7, 'flag-icon flag-icon-am', 'am', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(8, 'flag-icon flag-icon-ao', 'ao', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(9, 'flag-icon flag-icon-aq', 'aq', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(10, 'flag-icon flag-icon-ar', 'ar', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(11, 'flag-icon flag-icon-as', 'as', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(12, 'flag-icon flag-icon-at', 'at', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(13, 'flag-icon flag-icon-au', 'au', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(14, 'flag-icon flag-icon-aw', 'aw', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(15, 'flag-icon flag-icon-ax', 'ax', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(16, 'flag-icon flag-icon-az', 'az', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(17, 'flag-icon flag-icon-ba', 'ba', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(18, 'flag-icon flag-icon-bb', 'bb', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(19, 'flag-icon flag-icon-bd', 'bd', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(20, 'flag-icon flag-icon-be', 'be', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(21, 'flag-icon flag-icon-bf', 'bf', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(22, 'flag-icon flag-icon-bg', 'bg', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(23, 'flag-icon flag-icon-bh', 'bh', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(24, 'flag-icon flag-icon-bi', 'bi', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(25, 'flag-icon flag-icon-bj', 'bj', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(26, 'flag-icon flag-icon-bl', 'bl', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(27, 'flag-icon flag-icon-bm', 'bm', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(28, 'flag-icon flag-icon-bn', 'bn', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(29, 'flag-icon flag-icon-bo', 'bo', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(30, 'flag-icon flag-icon-bq', 'bq', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(31, 'flag-icon flag-icon-br', 'br', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(32, 'flag-icon flag-icon-bs', 'bs', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(33, 'flag-icon flag-icon-bt', 'bt', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(34, 'flag-icon flag-icon-bv', 'bv', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(35, 'flag-icon flag-icon-bw', 'bw', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(36, 'flag-icon flag-icon-by', 'by', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(37, 'flag-icon flag-icon-bz', 'bz', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(38, 'flag-icon flag-icon-ca', 'ca', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(39, 'flag-icon flag-icon-cc', 'cc', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(40, 'flag-icon flag-icon-cd', 'cd', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(41, 'flag-icon flag-icon-cf', 'cf', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(42, 'flag-icon flag-icon-cg', 'cg', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(43, 'flag-icon flag-icon-ch', 'ch', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(44, 'flag-icon flag-icon-ci', 'ci', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(45, 'flag-icon flag-icon-ck', 'ck', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(46, 'flag-icon flag-icon-cl', 'cl', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(47, 'flag-icon flag-icon-cm', 'cm', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(48, 'flag-icon flag-icon-cn', 'cn', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(49, 'flag-icon flag-icon-co', 'co', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(50, 'flag-icon flag-icon-cr', 'cr', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(51, 'flag-icon flag-icon-cu', 'cu', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(52, 'flag-icon flag-icon-cv', 'cv', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(53, 'flag-icon flag-icon-cw', 'cw', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(54, 'flag-icon flag-icon-cx', 'cx', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(55, 'flag-icon flag-icon-cy', 'cy', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(56, 'flag-icon flag-icon-cz', 'cz', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(57, 'flag-icon flag-icon-de', 'de', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(58, 'flag-icon flag-icon-dj', 'dj', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(59, 'flag-icon flag-icon-dk', 'dk', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(60, 'flag-icon flag-icon-dm', 'dm', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(61, 'flag-icon flag-icon-do', 'do', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(62, 'flag-icon flag-icon-dz', 'dz', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(63, 'flag-icon flag-icon-ec', 'ec', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(64, 'flag-icon flag-icon-ee', 'ee', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(65, 'flag-icon flag-icon-eg', 'eg', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(66, 'flag-icon flag-icon-eh', 'eh', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(67, 'flag-icon flag-icon-er', 'er', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(68, 'flag-icon flag-icon-es', 'es', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(69, 'flag-icon flag-icon-et', 'et', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(70, 'flag-icon flag-icon-fi', 'fi', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(71, 'flag-icon flag-icon-fj', 'fj', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(72, 'flag-icon flag-icon-fk', 'fk', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(73, 'flag-icon flag-icon-fm', 'fm', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(74, 'flag-icon flag-icon-fo', 'fo', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(75, 'flag-icon flag-icon-fr', 'fr', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(76, 'flag-icon flag-icon-ga', 'ga', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(77, 'flag-icon flag-icon-gb', 'gb', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(78, 'flag-icon flag-icon-gd', 'gd', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(79, 'flag-icon flag-icon-ge', 'ge', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(80, 'flag-icon flag-icon-gf', 'gf', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(81, 'flag-icon flag-icon-gg', 'gg', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(82, 'flag-icon flag-icon-gh', 'gh', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(83, 'flag-icon flag-icon-gi', 'gi', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(84, 'flag-icon flag-icon-gl', 'gl', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(85, 'flag-icon flag-icon-gm', 'gm', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(86, 'flag-icon flag-icon-gn', 'gn', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(87, 'flag-icon flag-icon-gp', 'gp', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(88, 'flag-icon flag-icon-gq', 'gq', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(89, 'flag-icon flag-icon-gr', 'gr', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(90, 'flag-icon flag-icon-gs', 'gs', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(91, 'flag-icon flag-icon-gt', 'gt', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(92, 'flag-icon flag-icon-gu', 'gu', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(93, 'flag-icon flag-icon-gw', 'gw', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(94, 'flag-icon flag-icon-gy', 'gy', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(95, 'flag-icon flag-icon-hk', 'hk', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(96, 'flag-icon flag-icon-hm', 'hm', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(97, 'flag-icon flag-icon-hn', 'hn', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(98, 'flag-icon flag-icon-hr', 'hr', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(99, 'flag-icon flag-icon-ht', 'ht', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(100, 'flag-icon flag-icon-hu', 'hu', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(101, 'flag-icon flag-icon-id', 'id', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(102, 'flag-icon flag-icon-ie', 'ie', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(103, 'flag-icon flag-icon-il', 'il', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(104, 'flag-icon flag-icon-im', 'im', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(105, 'flag-icon flag-icon-in', 'in', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(106, 'flag-icon flag-icon-io', 'io', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(107, 'flag-icon flag-icon-iq', 'iq', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(108, 'flag-icon flag-icon-ir', 'ir', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(109, 'flag-icon flag-icon-is', 'is', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(110, 'flag-icon flag-icon-it', 'it', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(111, 'flag-icon flag-icon-je', 'je', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(112, 'flag-icon flag-icon-jm', 'jm', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(113, 'flag-icon flag-icon-jo', 'jo', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(114, 'flag-icon flag-icon-jp', 'jp', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(115, 'flag-icon flag-icon-ke', 'ke', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(116, 'flag-icon flag-icon-kg', 'kg', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(117, 'flag-icon flag-icon-kh', 'kh', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(118, 'flag-icon flag-icon-ki', 'ki', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(119, 'flag-icon flag-icon-km', 'km', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(120, 'flag-icon flag-icon-kn', 'kn', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(121, 'flag-icon flag-icon-kp', 'kp', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(122, 'flag-icon flag-icon-kr', 'kr', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(123, 'flag-icon flag-icon-kw', 'kw', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(124, 'flag-icon flag-icon-ky', 'ky', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(125, 'flag-icon flag-icon-kz', 'kz', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(126, 'flag-icon flag-icon-la', 'la', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(127, 'flag-icon flag-icon-lb', 'lb', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(128, 'flag-icon flag-icon-lc', 'lc', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(129, 'flag-icon flag-icon-li', 'li', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(130, 'flag-icon flag-icon-lk', 'lk', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(131, 'flag-icon flag-icon-lr', 'lr', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(132, 'flag-icon flag-icon-ls', 'ls', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(133, 'flag-icon flag-icon-lt', 'lt', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(134, 'flag-icon flag-icon-lu', 'lu', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(135, 'flag-icon flag-icon-lv', 'lv', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(136, 'flag-icon flag-icon-ly', 'ly', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(137, 'flag-icon flag-icon-ma', 'ma', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(138, 'flag-icon flag-icon-mc', 'mc', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(139, 'flag-icon flag-icon-md', 'md', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(140, 'flag-icon flag-icon-me', 'me', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(141, 'flag-icon flag-icon-mf', 'mf', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(142, 'flag-icon flag-icon-mg', 'mg', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(143, 'flag-icon flag-icon-mh', 'mh', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(144, 'flag-icon flag-icon-mk', 'mk', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(145, 'flag-icon flag-icon-ml', 'ml', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(146, 'flag-icon flag-icon-mm', 'mm', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(147, 'flag-icon flag-icon-mn', 'mn', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(148, 'flag-icon flag-icon-mo', 'mo', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(149, 'flag-icon flag-icon-mp', 'mp', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(150, 'flag-icon flag-icon-mq', 'mq', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(151, 'flag-icon flag-icon-mr', 'mr', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(152, 'flag-icon flag-icon-ms', 'ms', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(153, 'flag-icon flag-icon-mt', 'mt', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(154, 'flag-icon flag-icon-mu', 'mu', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(155, 'flag-icon flag-icon-mv', 'mv', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(156, 'flag-icon flag-icon-mw', 'mw', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(157, 'flag-icon flag-icon-mx', 'mx', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(158, 'flag-icon flag-icon-my', 'my', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(159, 'flag-icon flag-icon-mz', 'mz', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(160, 'flag-icon flag-icon-na', 'na', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(161, 'flag-icon flag-icon-nc', 'nc', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(162, 'flag-icon flag-icon-ne', 'ne', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(163, 'flag-icon flag-icon-nf', 'nf', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(164, 'flag-icon flag-icon-ng', 'ng', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(165, 'flag-icon flag-icon-ni', 'ni', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(166, 'flag-icon flag-icon-nl', 'nl', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(167, 'flag-icon flag-icon-no', 'no', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(168, 'flag-icon flag-icon-np', 'np', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(169, 'flag-icon flag-icon-nr', 'nr', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(170, 'flag-icon flag-icon-nu', 'nu', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(171, 'flag-icon flag-icon-nz', 'nz', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(172, 'flag-icon flag-icon-om', 'om', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(173, 'flag-icon flag-icon-pa', 'pa', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(174, 'flag-icon flag-icon-pe', 'pe', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(175, 'flag-icon flag-icon-pf', 'pf', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(176, 'flag-icon flag-icon-pg', 'pg', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(177, 'flag-icon flag-icon-ph', 'ph', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(178, 'flag-icon flag-icon-pk', 'pk', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(179, 'flag-icon flag-icon-pl', 'pl', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(180, 'flag-icon flag-icon-pm', 'pm', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(181, 'flag-icon flag-icon-pn', 'pn', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(182, 'flag-icon flag-icon-pr', 'pr', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(183, 'flag-icon flag-icon-ps', 'ps', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(184, 'flag-icon flag-icon-pt', 'pt', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(185, 'flag-icon flag-icon-pw', 'pw', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(186, 'flag-icon flag-icon-py', 'py', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(187, 'flag-icon flag-icon-qa', 'qa', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(188, 'flag-icon flag-icon-re', 're', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(189, 'flag-icon flag-icon-ro', 'ro', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(190, 'flag-icon flag-icon-rs', 'rs', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(191, 'flag-icon flag-icon-ru', 'ru', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(192, 'flag-icon flag-icon-rw', 'rw', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(193, 'flag-icon flag-icon-sa', 'sa', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(194, 'flag-icon flag-icon-sb', 'sb', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(195, 'flag-icon flag-icon-sc', 'sc', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(196, 'flag-icon flag-icon-sd', 'sd', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(197, 'flag-icon flag-icon-se', 'se', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(198, 'flag-icon flag-icon-sg', 'sg', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(199, 'flag-icon flag-icon-sh', 'sh', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(200, 'flag-icon flag-icon-si', 'si', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(201, 'flag-icon flag-icon-sj', 'sj', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(202, 'flag-icon flag-icon-sk', 'sk', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(203, 'flag-icon flag-icon-sl', 'sl', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(204, 'flag-icon flag-icon-sm', 'sm', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(205, 'flag-icon flag-icon-sn', 'sn', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(206, 'flag-icon flag-icon-so', 'so', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(207, 'flag-icon flag-icon-sr', 'sr', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(208, 'flag-icon flag-icon-ss', 'ss', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(209, 'flag-icon flag-icon-st', 'st', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(210, 'flag-icon flag-icon-sv', 'sv', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(211, 'flag-icon flag-icon-sx', 'sx', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(212, 'flag-icon flag-icon-sy', 'sy', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(213, 'flag-icon flag-icon-sz', 'sz', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(214, 'flag-icon flag-icon-tc', 'tc', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(215, 'flag-icon flag-icon-td', 'td', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(216, 'flag-icon flag-icon-tf', 'tf', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(217, 'flag-icon flag-icon-tg', 'tg', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(218, 'flag-icon flag-icon-th', 'th', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(219, 'flag-icon flag-icon-tj', 'tj', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(220, 'flag-icon flag-icon-tk', 'tk', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(221, 'flag-icon flag-icon-tl', 'tl', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(222, 'flag-icon flag-icon-tm', 'tm', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(223, 'flag-icon flag-icon-tn', 'tn', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(224, 'flag-icon flag-icon-to', 'to', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(225, 'flag-icon flag-icon-tr', 'tr', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(226, 'flag-icon flag-icon-tt', 'tt', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(227, 'flag-icon flag-icon-tv', 'tv', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(228, 'flag-icon flag-icon-tw', 'tw', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(229, 'flag-icon flag-icon-tz', 'tz', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(230, 'flag-icon flag-icon-ua', 'ua', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(231, 'flag-icon flag-icon-ug', 'ug', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(232, 'flag-icon flag-icon-um', 'um', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(233, 'flag-icon flag-icon-us', 'us', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(234, 'flag-icon flag-icon-uy', 'uy', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(235, 'flag-icon flag-icon-uz', 'uz', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(236, 'flag-icon flag-icon-va', 'va', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(237, 'flag-icon flag-icon-vc', 'vc', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(238, 'flag-icon flag-icon-ve', 've', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(239, 'flag-icon flag-icon-vg', 'vg', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(240, 'flag-icon flag-icon-vi', 'vi', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(241, 'flag-icon flag-icon-vn', 'vn', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(242, 'flag-icon flag-icon-vu', 'vu', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(243, 'flag-icon flag-icon-wf', 'wf', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(244, 'flag-icon flag-icon-ws', 'ws', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(245, 'flag-icon flag-icon-ye', 'ye', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(246, 'flag-icon flag-icon-yt', 'yt', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(247, 'flag-icon flag-icon-za', 'za', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(248, 'flag-icon flag-icon-zm', 'zm', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(249, 'flag-icon flag-icon-zw', 'zw', '2024-04-18 23:47:39', '2024-04-18 23:47:39');

-- --------------------------------------------------------

--
-- Table structure for table `hero_sections`
--

CREATE TABLE `hero_sections` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `highlight_title_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `highlight_title_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `btn_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` bigint UNSIGNED DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hero_sections`
--

INSERT INTO `hero_sections` (`id`, `title`, `highlight_title_one`, `highlight_title_two`, `description`, `btn_one`, `btn_two`, `image_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Welcome to Our Website', 'Find your dream home', NULL, NULL, '#', NULL, 30, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(2, 'Explore Our Featured Properties', 'Luxury Apartments', NULL, NULL, '#', NULL, 31, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(3, 'Get in Touch with Us Today', 'Need Help with Buying or Selling?', NULL, NULL, '#', NULL, 32, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_pages`
--

CREATE TABLE `home_pages` (
  `id` bigint UNSIGNED NOT NULL,
  `business_model_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_model_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_model_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `howitworks_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `howitworks_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_store_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `play_store_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonial_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonial_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blogs_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blogs_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_pages`
--

INSERT INTO `home_pages` (`id`, `business_model_title`, `business_model_description`, `business_model_link`, `feature_title`, `feature_description`, `howitworks_title`, `howitworks_description`, `app_store_link`, `play_store_link`, `testimonial_title`, `testimonial_description`, `blogs_title`, `blogs_description`, `created_at`, `updated_at`) VALUES
(1, 'Process Flow for our business model', 'A smart accounting software for rental property landlords automates rental income tracking, expense management, and reporting for rental properties.', '#', 'Grab your software with amazing features', 'Real estate refers to the buying, selling, and renting of properties, including residential, commercial, and industrial buildings and land.', 'How it works?', 'Accounting software for rental landlords streamlines financial management by automating data entry, tracking income & expenses, generating reports.', '#', '#', 'Love from out clients around the world', 'Clients say our smart accounting software saves time, improves accuracy and simplifies reporting for rental property landlords.', 'What’s New?', 'Our blog showcases the benefits of using a smart accounting software for rental property landlords, from streamlining financial management to saving time.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `how_it_works`
--

CREATE TABLE `how_it_works` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci,
  `image_id` bigint UNSIGNED DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `bgcolor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '#087c7c',
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '#fff',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

CREATE TABLE `icons` (
  `id` bigint UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `path`, `created_at`, `updated_at`) VALUES
(1, 'backend/uploads/users/user-icon-1.png', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(2, 'backend/uploads/users/user-icon-2.png', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(3, 'backend/uploads/users/user-icon-3.png', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(4, 'backend/uploads/users/user-icon-4.png', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(5, 'frontend/img/users/tenant_1.jpg', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(6, 'frontend/img/users/tenant_2.jpg', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(7, 'frontend/img/users/tenant_3.jpg', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(8, 'frontend/img/users/tenant_4.jpg', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(9, 'frontend/img/users/tenant_5.jpg', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(10, 'frontend/img/users/tenant_6.jpg', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(11, 'frontend/img/users/tenant_7.jpg', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(12, 'frontend/img/users/tenant_8.jpg', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(13, 'frontend/img/users/tenant_9.jpg', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(14, 'frontend/img/users/tenant_10.jpg', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(15, 'assets/categories/Apartment.png', '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(16, 'assets/categories/Building.png', '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(17, 'assets/categories/Office.png', '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(18, 'assets/categories/Cabin.png', '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(19, 'assets/categories/villa.png', '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(20, 'assets/categories/Land.png', '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(21, 'assets/facilities/electric.png', '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(22, 'assets/facilities/gas.png', '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(23, 'assets/facilities/internet.png', '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(24, 'assets/facilities/lift.png', '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(25, 'assets/facilities/parking.png', '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(26, 'assets/facilities/water.png', '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(27, 'assets/facilities/balcony.png', '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(28, 'assets/facilities/bath.png', '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(29, 'assets/facilities/bed.png', '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(30, 'backend/uploads/heroSections/default-slider.svg', '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(31, 'backend/uploads/heroSections/default-slider.svg', '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(32, 'backend/uploads/heroSections/default-slider.svg', '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(33, 'backend/uploads/about/default_about.png', '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(34, 'backend/uploads/about/default_about.png', '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(35, 'backend/uploads/about/default_about.png', '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(36, 'backend/uploads/about/default_about.png', '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(37, 'backend/uploads/about/default_about.png', '2024-04-19 05:47:40', '2024-04-19 05:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` bigint UNSIGNED NOT NULL,
  `account_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `date` date NOT NULL,
  `reference` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `attachment_id` bigint UNSIGNED DEFAULT NULL,
  `created_by` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `icon_class`, `direction`, `status`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 'flag-icon flag-icon-us', 'ltr', 1, '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(2, 'Bangla', 'bn', 'flag-icon flag-icon-bd', 'ltr', 1, '2024-04-18 23:47:39', '2024-04-18 23:47:39');

-- --------------------------------------------------------

--
-- Table structure for table `leaderships`
--

CREATE TABLE `leaderships` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci,
  `image_id` bigint UNSIGNED DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mailboxes`
--

CREATE TABLE `mailboxes` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('draft','sent','trash') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `is_read` tinyint NOT NULL DEFAULT '0' COMMENT '1 = true, 0 = false',
  `is_starred` tinyint NOT NULL DEFAULT '0' COMMENT '1 = true, 0 = false',
  `is_important` tinyint NOT NULL DEFAULT '0' COMMENT '1 = true, 0 = false',
  `created_by` bigint UNSIGNED NOT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mailbox_attachments`
--

CREATE TABLE `mailbox_attachments` (
  `id` bigint UNSIGNED NOT NULL,
  `mailbox_id` bigint UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mailbox_bcc`
--

CREATE TABLE `mailbox_bcc` (
  `id` bigint UNSIGNED NOT NULL,
  `mailbox_id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mailbox_cc`
--

CREATE TABLE `mailbox_cc` (
  `id` bigint UNSIGNED NOT NULL,
  `mailbox_id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mailbox_recipients`
--

CREATE TABLE `mailbox_recipients` (
  `id` bigint UNSIGNED NOT NULL,
  `mailbox_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mailbox_templates`
--

CREATE TABLE `mailbox_templates` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_public` tinyint NOT NULL DEFAULT '0' COMMENT '1 = true, 0 = false',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_orders`
--

CREATE TABLE `master_orders` (
  `id` bigint UNSIGNED NOT NULL,
  `order_date` date NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cash',
  `total_amount` double(16,2) NOT NULL DEFAULT '0.00',
  `discount_amount` double NOT NULL DEFAULT '0',
  `paid_amount` double NOT NULL DEFAULT '0',
  `due_amount` double NOT NULL DEFAULT '0',
  `billing_address_id` bigint UNSIGNED DEFAULT NULL,
  `rental_id` bigint UNSIGNED DEFAULT NULL,
  `tenant_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2013_08_03_072003_create_roles_table', 1),
(2, '2013_08_17_080223_create_images_table', 1),
(3, '2013_08_17_080225_create_icons_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2021_02_07_073522_create_countries_table', 1),
(8, '2021_03_01_072725_create_divisions_table', 1),
(9, '2021_03_01_073313_create_districts_table', 1),
(10, '2021_03_01_073657_create_upazilas_table', 1),
(11, '2021_03_01_074032_create_unions_table', 1),
(12, '2022_07_19_045514_create_flag_icons_table', 1),
(13, '2022_08_08_043550_create_permissions_table', 1),
(14, '2022_08_16_103633_create_settings_table', 1),
(15, '2022_08_17_092623_create_languages_table', 1),
(16, '2022_10_04_044255_create_searches_table', 1),
(17, '2022_10_13_064230_create_designations_table', 1),
(18, '2022_10_15_069995_create_departments_table', 1),
(19, '2022_10_15_069999_create_users_table', 1),
(20, '2023_01_23_054113_create_case_studies_table', 1),
(21, '2023_01_29_104254_create_testimonials_table', 1),
(22, '2023_01_30_050018_create_blog_categories_table', 1),
(23, '2023_01_30_065754_create_blogs_table', 1),
(24, '2023_01_30_103647_create_how_it_works_table', 1),
(25, '2023_01_31_052840_create_categories_table', 1),
(26, '2023_02_02_061120_create_home_pages_table', 1),
(27, '2023_02_02_071214_create_business_models_table', 1),
(28, '2023_02_03_052857_create_features_table', 1),
(29, '2023_02_03_091103_create_hero_sections_table', 1),
(30, '2023_02_03_093357_create_partners_table', 1),
(31, '2023_02_08_092227_create_property_categories_table', 1),
(32, '2023_02_08_093055_create_documents_table', 1),
(33, '2023_02_08_093056_create_properties_table', 1),
(34, '2023_02_16_083307_create_property_galleries_table', 1),
(35, '2023_02_16_084341_create_property_facility_types_table', 1),
(36, '2023_02_16_084832_create_property_facilities_table', 1),
(37, '2023_02_16_085740_create_property_tenants_table', 1),
(38, '2023_02_16_085741_create_rentals_table', 1),
(39, '2023_02_16_085742_create_emergency_contacts_table', 1),
(40, '2023_02_19_122901_create_account_categories_table', 1),
(41, '2023_02_20_082032_create_bank_accounts_table', 1),
(42, '2023_02_20_082033_create_accounts_table', 1),
(43, '2023_02_20_122847_create_balances_table', 1),
(44, '2023_02_20_122904_create_incomes_table', 1),
(45, '2023_02_20_122916_create_expenses_table', 1),
(46, '2023_02_23_054437_create_property_locations_table', 1),
(47, '2023_02_23_082455_create_contacts_table', 1),
(48, '2023_02_24_125754_create_request_properties_table', 1),
(49, '2023_02_24_125754_create_wishlists_table', 1),
(50, '2023_02_25_041737_create_abouts_table', 1),
(51, '2023_03_07_061033_create_advertisements_table', 1),
(52, '2023_03_07_063032_create_billing_addresses_table', 1),
(53, '2023_03_07_063033_create_master_orders_table', 1),
(54, '2023_03_07_063858_create_orders_table', 1),
(55, '2023_03_07_064703_create_order_payments_table', 1),
(56, '2023_03_20_051809_create_received_mails_table', 1),
(57, '2023_04_07_052039_create_carts_table', 1),
(58, '2023_04_07_052039_create_due_payments_table', 1),
(59, '2023_05_14_081848_create_pages_table', 1),
(60, '2023_06_21_065455_create_blog_reviews_table', 1),
(61, '2023_06_22_093133_create_property_reviews_table', 1),
(62, '2023_07_25_050355_create_notifications_table', 1),
(63, '2023_10_23_182121_create_mailboxes_table', 1),
(64, '2023_10_23_182440_create_mailbox_bcc_table', 1),
(65, '2023_10_23_182440_create_mailbox_cc_table', 1),
(66, '2023_10_23_205617_create_mailbox_attachments_table', 1),
(67, '2023_10_23_212400_create_mailbox_recipients_table', 1),
(68, '2023_11_13_182136_create_mailbox_templates_table', 1),
(69, '2023_11_28_999999_add_active_status_to_users', 1),
(70, '2023_11_28_999999_add_avatar_to_users', 1),
(71, '2023_11_28_999999_add_dark_mode_to_users', 1),
(72, '2023_11_28_999999_add_messenger_color_to_users', 1),
(73, '2023_11_28_999999_create_chatify_favorites_table', 1),
(74, '2023_11_28_999999_create_chatify_messages_table', 1),
(75, '2023_12_20_051453_create_committees_table', 1),
(76, '2023_12_20_051530_create_committee_members_table', 1),
(77, '2023_12_26_051101_create_backup_logs_table', 1),
(78, '2023_12_29_080823_create_jobs_table', 1),
(79, '2024_01_02_075113_create_order_details_table', 1),
(80, '2024_01_03_050733_create_payments_table', 1),
(81, '2024_01_03_050817_create_transactions_table', 1),
(82, '2024_01_04_062128_create_currencies_table', 1),
(83, '2024_01_08_164627_create_property_documents_table', 1),
(84, '2024_01_11_152222_create_property_statuses_table', 1),
(85, '2024_01_12_104118_create_bills_table', 1),
(86, '2024_01_18_162911_create_leave_types_table', 1),
(87, '2024_01_18_170829_create_holiday_table', 1),
(88, '2024_01_23_181820_add_new_field_property_table', 1),
(89, '2024_01_25_140544_add_owner_tin_marital_status_to_users_table', 1),
(90, '2024_01_25_153135_create_organizations_table', 1),
(91, '2024_01_29_171654_create_appointments_table', 1),
(92, '2024_02_08_121626_about_table_colum_update', 1),
(93, '2024_02_14_112800_add_billing_id_to_orders', 1),
(94, '2024_02_15_121320_bill_net_update', 1),
(95, '2024_02_15_122442_create_category_wise_document_templates_table', 1),
(96, '2024_02_20_064326_create_family_members_table', 1),
(97, '2024_02_22_114407_create_tenant_assets_table', 1),
(98, '2024_02_27_120452_add_organization_column_to_organizations_table', 1),
(99, '2024_02_29_063701_create_leaderships_table', 1),
(100, '2024_03_15_055255_add_user_id_to_account_category_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci,
  `sender_id` bigint UNSIGNED NOT NULL,
  `receiver_id` bigint UNSIGNED NOT NULL,
  `is_read` tinyint NOT NULL DEFAULT '0',
  `read_at` datetime DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenant_id` bigint UNSIGNED NOT NULL,
  `billing_address_id` bigint UNSIGNED DEFAULT NULL,
  `date` date NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `discount_amount` decimal(8,2) DEFAULT '0.00',
  `coupon_amount` decimal(8,2) DEFAULT '0.00',
  `grand_total` decimal(8,2) NOT NULL,
  `paid_amount` decimal(8,2) DEFAULT '0.00',
  `due_amount` decimal(8,2) DEFAULT '0.00',
  `created_by` bigint UNSIGNED NOT NULL,
  `updated_by` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `advertisement_id` bigint UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `is_buy` tinyint DEFAULT '0',
  `price` decimal(8,2) NOT NULL,
  `discount_amount` decimal(8,2) DEFAULT '0.00',
  `total_amount` decimal(8,2) DEFAULT '0.00',
  `payment_status` enum('paid','unpaid','partial') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `status` enum('pending','approved','cancelled','rejected','completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_payments`
--

CREATE TABLE `order_payments` (
  `id` bigint UNSIGNED NOT NULL,
  `master_order_id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `tenant_id` bigint UNSIGNED NOT NULL,
  `builder_id` int DEFAULT NULL,
  `landlord_id` int DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment_id` bigint UNSIGNED NOT NULL,
  `created_by` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tin_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `director_details` text COLLATE utf8mb4_unicode_ci,
  `incorporation_attachment_id` bigint UNSIGNED DEFAULT NULL,
  `business_attachment_id` bigint UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gis_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ghana_card_or_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `establishment_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_vat_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `digital_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_certificate_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_certificate_attachment_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `image_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `serial` int DEFAULT '0',
  `parent_id` int DEFAULT NULL,
  `show_menu` tinyint(1) DEFAULT '0',
  `show_testimonial` tinyint(1) DEFAULT '0',
  `show_leadership` tinyint(1) DEFAULT '0',
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_id` bigint UNSIGNED NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `sourcable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sourcable_id` bigint UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment_id` bigint UNSIGNED DEFAULT NULL,
  `additional_info` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `attribute` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `attribute`, `keywords`, `created_at`, `updated_at`) VALUES
(1, 'users', '{\"read\":\"user_read\",\"create\":\"user_create\",\"update\":\"user_update\",\"delete\":\"user_delete\"}', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(2, 'roles', '{\"read\":\"role_read\",\"create\":\"role_create\",\"update\":\"role_update\",\"delete\":\"role_delete\"}', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(3, 'language', '{\"read\":\"language_read\",\"create\":\"language_create\",\"update\":\"language_update\",\"update terms\":\"language_update_terms\",\"delete\":\"language_delete\"}', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(4, 'general settings', '{\"read\":\"general_settings_read\",\"update\":\"general_settings_update\"}', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(5, 'storage settings', '{\"read\":\"storage_settings_read\",\"update\":\"storage_settings_update\"}', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(6, 'recaptcha settings', '{\"read\":\"recaptcha_settings_read\",\"update\":\"recaptcha_settings_update\"}', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(7, 'email settings', '{\"read\":\"email_settings_read\",\"update\":\"email_settings_update\"}', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(8, 'categories', '{\"read\":\"category_read\",\"create\":\"category_create\",\"update\":\"category_update\",\"delete\":\"category_delete\"}', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(9, 'property categories', '{\"read\":\"property_category_read\",\"create\":\"property_category_create\",\"update\":\"property_category_update\",\"delete\":\"property_category_delete\"}', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(10, 'property facility types', '{\"read\":\"property_facility_type_read\",\"create\":\"property_facility_type_create\",\"update\":\"property_facility_type_update\",\"delete\":\"property_facility_type_delete\"}', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(11, 'how-it-works', '{\"read\":\"how-it-work_read\",\"create\":\"how-it-work_create\",\"update\":\"how-it-work_update\",\"delete\":\"how-it-work_delete\"}', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(12, 'testimonials', '{\"read\":\"testimonial_read\",\"create\":\"testimonial_create\",\"update\":\"testimonial_update\",\"delete\":\"testimonial_delete\"}', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(13, 'blogs', '{\"read\":\"blogs_read\",\"update\":\"blogs_update\",\"delete\":\"blogs_delete\"}', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(14, 'blog categories', '{\"read\":\"blog_categories_read\",\"update\":\"blog_categories_update\",\"delete\":\"blog_categories_delete\"}', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(15, 'section title', '{\"update\":\"section_titles\"}', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(16, 'partners', '{\"read\":\"partners_read\",\"update\":\"partners_update\",\"delete\":\"partners_delete\"}', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(17, 'contacts', '{\"read\":\"contact_read\",\"delete\":\"contact_delete\"}', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(18, 'about', '{\"update\":\"about_update\"}', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(19, 'Advertisement Permission', '{\"update\":\"ad_action_permission\"}', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(20, 'committee', '{\"read\":\"committee_read\",\"show\":\"committee_show\",\"create\":\"committee_create\",\"update\":\"committee_update\",\"delete\":\"committee_delete\"}', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(21, 'committee_member', '{\"read\":\"committee_member_read\",\"create\":\"committee_member_create\",\"delete\":\"committee_member_delete\"}', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(22, 'database_backup', '{\"read\":\"db_backup_read\",\"create\":\"db_backup_create\",\"delete\":\"db_backup_delete\"}', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(23, 'landlord', '{\"read\":\"landlord_read\",\"create\":\"landlord_create\",\"update\":\"landlord_update\",\"delete\":\"landlord_delete\",\"show\":\"landlord_show\"}', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(24, 'tenant', '{\"read\":\"tenant_read\",\"create\":\"tenant_create\",\"update\":\"tenant_update\",\"delete\":\"tenant_delete\",\"show\":\"tenant_show\"}', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(25, 'account', '{\"read\":\"account_read\",\"create\":\"account_create\",\"delete\":\"account_delete\"}', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(26, 'rental', '{\"read\":\"rental_read\"}', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(27, 'reports', '{\"tenant_report\":\"tenant_report\",\"room_report\":\"room_report\",\"payment_report\":\"payment_report\"}', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(28, 'order', '{\"read\":\"order_read\",\"create\":\"order_create\",\"update\":\"order_update\",\"delete\":\"order_delete\",\"show\":\"order_show\",\"order_payment\":\"order_payment\"}', '2024-04-18 23:47:39', '2024-04-18 23:47:39');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Always in Square Feet',
  `dining_combined` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bedroom` int DEFAULT NULL,
  `bathroom` int DEFAULT NULL,
  `rent_amount` int DEFAULT NULL,
  `price_range` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flat_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `vacant` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1 for vacant, 0 for not vacant',
  `completion` tinyint NOT NULL DEFAULT '2',
  `deal_type` tinyint NOT NULL DEFAULT '1',
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `type` tinyint NOT NULL DEFAULT '2',
  `total_unit` bigint DEFAULT NULL,
  `total_occupied` bigint DEFAULT NULL,
  `total_rent` bigint DEFAULT NULL,
  `total_sell` bigint DEFAULT NULL,
  `discount_type` enum('fixed','percentage') COLLATE utf8mb4_unicode_ci DEFAULT 'fixed' COMMENT 'fixed or percentage',
  `discount_amount` double DEFAULT '0',
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `default_image` bigint UNSIGNED DEFAULT NULL,
  `property_category_id` bigint UNSIGNED DEFAULT NULL,
  `video_verification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_verification_status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_trending` tinyint NOT NULL DEFAULT '0',
  `is_populer` tinyint NOT NULL DEFAULT '0',
  `is_recommended` tinyint NOT NULL DEFAULT '0',
  `is_most_populer` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_categories`
--

CREATE TABLE `property_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` bigint UNSIGNED DEFAULT NULL,
  `serial` int DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `is_featured` tinyint DEFAULT '0',
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_categories`
--

INSERT INTO `property_categories` (`id`, `name`, `slug`, `icon_class`, `image_id`, `serial`, `status`, `is_featured`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Apartment', 'apartment', 'ri-community-line', 15, NULL, 'active', 1, NULL, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(2, 'Building', 'building', 'ri-building-2-line', 16, NULL, 'active', 1, NULL, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(3, 'Office', 'office', 'ri-folder-4-line', 17, NULL, 'active', 1, NULL, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(4, 'Room', 'room', 'ri-community-line', 18, NULL, 'active', 0, NULL, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(5, 'Flat', 'flat', 'ri-cake-2-line', 19, NULL, 'active', 0, NULL, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(6, 'Land', 'land', 'ri-hotel-line', 20, NULL, 'active', 0, NULL, '2024-04-19 05:47:40', '2024-04-19 05:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `property_documents`
--

CREATE TABLE `property_documents` (
  `id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `attachment_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_by` bigint UNSIGNED NOT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `template_id` int UNSIGNED DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0=pending , 1=Approved, 2=Rejected',
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_facilities`
--

CREATE TABLE `property_facilities` (
  `id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `property_facility_type_id` bigint UNSIGNED NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_facility_types`
--

CREATE TABLE `property_facility_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'fas-fa-check',
  `image_id` bigint UNSIGNED NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_facility_types`
--

INSERT INTO `property_facility_types` (`id`, `name`, `icon`, `image_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Electricity', 'fas fa-check', 21, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(2, 'Gas', 'fas fa-check', 22, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(3, 'Internet', 'fas fa-check', 23, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(4, 'Lift', 'fas fa-check', 24, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(5, 'Parking', 'fas fa-check', 25, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(6, 'Water', 'fas fa-check', 26, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(7, 'Balcony', 'fas fa-check', 27, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(8, 'Bath', 'fas fa-check', 28, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40'),
(9, 'Bed', 'fas fa-check', 29, 1, '2024-04-19 05:47:40', '2024-04-19 05:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `property_galleries`
--

CREATE TABLE `property_galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `type` enum('gallery','floor_plan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'gallery',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'property gallery title',
  `property_id` bigint UNSIGNED NOT NULL,
  `image_id` bigint UNSIGNED NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `is_default` tinyint NOT NULL DEFAULT '0',
  `serial` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_locations`
--

CREATE TABLE `property_locations` (
  `id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `country_id` int DEFAULT NULL,
  `state_id` int DEFAULT NULL,
  `city_id` int DEFAULT NULL,
  `division_id` int DEFAULT NULL,
  `district_id` int DEFAULT NULL,
  `upazila_id` int DEFAULT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_reviews`
--

CREATE TABLE `property_reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ratings` int NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_statuses`
--

CREATE TABLE `property_statuses` (
  `id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `tenant_id` bigint UNSIGNED DEFAULT NULL,
  `sourceable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sourceable_id` bigint UNSIGNED NOT NULL,
  `status` enum('available','occupied','maintenance') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint NOT NULL DEFAULT '0',
  `created_by` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_tenants`
--

CREATE TABLE `property_tenants` (
  `id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `tenant_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landlord_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landowner_id` bigint UNSIGNED DEFAULT NULL,
  `rental_id` bigint UNSIGNED DEFAULT NULL,
  `emergency_contact_id` bigint UNSIGNED DEFAULT NULL,
  `document_id` bigint UNSIGNED DEFAULT NULL,
  `image_id` bigint UNSIGNED DEFAULT NULL,
  `default_image` bigint UNSIGNED DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `received_mails`
--

CREATE TABLE `received_mails` (
  `id` bigint UNSIGNED NOT NULL,
  `sender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint UNSIGNED NOT NULL,
  `move_in` date NOT NULL,
  `move_out` date DEFAULT NULL,
  `reminder_date` date DEFAULT NULL,
  `advance_amount` double DEFAULT NULL,
  `rent_amount` double DEFAULT NULL,
  `rent_type` enum('monthly','yearly') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'monthly',
  `rent_for` int DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '1',
  `property_tenant_id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_properties`
--

CREATE TABLE `request_properties` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `advertisement_type` tinyint DEFAULT NULL,
  `visit_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '1', '[\"user_read\",\"user_create\",\"user_update\",\"user_delete\",\"role_read\",\"role_create\",\"role_update\",\"role_delete\",\"language_read\",\"language_create\",\"language_update\",\"language_update_terms\",\"language_delete\",\"general_settings_read\",\"general_settings_update\",\"storage_settings_read\",\"storage_settings_update\",\"recaptcha_settings_read\",\"recaptcha_settings_update\",\"email_settings_read\",\"email_settings_update\",\"testimonial_read\",\"testimonial_create\",\"testimonial_update\",\"testimonial_delete\",\"blogs_read\",\"blogs_create\",\"blogs_update\",\"blogs_delete\",\"blog_categories_read\",\"blog_categories_create\",\"blog_categories_update\",\"blog_categories_delete\",\"category_read\",\"category_create\",\"category_update\",\"category_delete\",\"how-it-work_read\",\"how-it-work_create\",\"how-it-work_update\",\"how-it-work_delete\",\"business_model_create\",\"business_model_update\",\"business_model_delete\",\"section_titles_update\",\"partners_read\",\"partners_create\",\"partners_update\",\"partners_delete\",\"feature_read\",\"feature_create\",\"feature_update\",\"feature_delete\",\"hero_section_read\",\"hero_section_create\",\"hero_section_update\",\"hero_section_delete\",\"tenant_read\",\"tenant_create\",\"tenant_update\",\"tenant_delete\",\"property_read\",\"property_create\",\"property_update\",\"property_delete\",\"contact_read\",\"contact_delete\",\"mail_subscribe_read\",\"mail_subscribe_delete\",\"about_update\",\"property_category_read\",\"property_category_create\",\"property_category_update\",\"property_category_delete\",\"property_facility_type_read\",\"property_facility_type_create\",\"property_facility_type_update\",\"property_facility_type_delete\",\"ad_action_permission\",\"committee_read\",\"committee_show\",\"committee_create\",\"committee_update\",\"committee_delete\",\"committee_member_read\",\"committee_member_create\",\"committee_member_delete\",\"db_backup_read\",\"db_backup_create\",\"db_backup_delete\",\"tenant_read\",\"tenant_create\",\"tenant_delete\",\"tenant_show\",\"account_read\",\"account_create\",\"account_delete\",\"rental_read\",\"tenant_report\",\"room_report\",\"payment_report\",\"order_read\",\"order_create\",\"order_delete\",\"order_show\",\"order_payment\"]', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(2, 'Admin', '1', '[\"user_read\",\"user_create\",\"user_update\",\"user_delete\",\"role_read\",\"role_create\",\"role_update\",\"role_delete\",\"language_read\",\"language_create\",\"language_update_terms\",\"general_settings_read\",\"general_settings_update\",\"storage_settings_read\",\"storage_settings_read\",\"recaptcha_settings_update\",\"email_settings_read\",\"testimonial_read\",\"testimonial_create\",\"testimonial_update\",\"testimonial_delete\",\"blogs_read\",\"blogs_create\",\"blogs_update\",\"blogs_delete\",\"blog_categories_read\",\"blog_categories_create\",\"blog_categories_update\",\"blog_categories_delete\",\"category_read\",\"category_create\",\"category_update\",\"category_delete\",\"how-it-work_read\",\"how-it-work_create\",\"how-it-work_update\",\"how-it-work_delete\",\"business_model_create\",\"business_model_update\",\"business_model_delete\",\"section_titles_update\",\"partners_read\",\"partners_create\",\"partners_update\",\"partners_delete\",\"feature_read\",\"feature_create\",\"feature_update\",\"feature_delete\",\"hero_section_read\",\"hero_section_create\",\"hero_section_update\",\"hero_section_delete\",\"tenant_read\",\"tenant_create\",\"tenant_update\",\"tenant_delete\",\"contact_read\",\"contact_delete\",\"mail_subscribe_read\",\"mail_subscribe_delete\",\"about_update\",\"property_category_read\",\"property_category_create\",\"property_category_update\",\"property_category_delete\",\"ad_action_permission\"]', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(3, 'Land Owner', '1', '[\"property_read\",\"property_create\",\"property_update\",\"property_delete\"]', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(4, 'Land Lord', '1', '[\"property_read\",\"property_create\",\"property_update\",\"property_delete\"]', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(5, 'Tenant', '1', '[]', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(6, 'Staff', '1', '[\"user_read\",\"role_read\",\"language_read\",\"testimonial_read\",\"category_read\",\"how-it-work_read\"]', '2024-04-18 23:47:39', '2024-04-18 23:47:39');

-- --------------------------------------------------------

--
-- Table structure for table `searches`
--

CREATE TABLE `searches` (
  `id` bigint UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'application_name', 'LANDLORD', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(2, 'footer_text', '© 2024 LandLord . All Rights Reserved. Made By OnestTech.', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(3, 'file_system', 'local', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(4, 'aws_access_key_id', 'AKIA3OGN2RWSOIIG3A4J', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(5, 'aws_secret_key', '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', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(6, 'aws_region', 'ap-southeast-1', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(7, 'aws_bucket', 'onest-starter-kit', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(8, 'aws_endpoint', 'https://s3.ap-southeast-1.amazonaws.com', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(9, 'recaptcha_sitekey', '6Lfn6nQhAAAAAKYauxvLddLtcqSn1yqn-HRn_CbN', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(10, 'recaptcha_secret', '6Lfn6nQhAAAAABOzRtEjhZYB49Dd4orv41thfh02', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(11, 'recaptcha_status', '0', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(12, 'mail_drive', 'smtp', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(13, 'mail_host', 'smtp.gmail.com', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(14, 'mail_address', 'sales@onesttech.com', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(15, 'from_name', 'Onest Kit', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(16, 'mail_username', 'ya!@a+TIY3Vl&esT', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(17, 'mail_password', 'sales@onesttech.com', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(18, 'mail_port', '587', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(19, 'encryption', 'tls', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(20, 'default_langauge', 'en', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(21, 'light_logo', 'images/logo.png', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(22, 'dark_logo', 'images/logo.png', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(23, 'favicon', 'images/favicon.png', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(24, 'phone_number', '+8801959335555', '2024-04-18 23:47:39', '2024-04-18 23:47:39'),
(25, 'email', 'sales@onesttech.com', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(26, 'facebook_link', '#', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(27, 'twitter_link', '#', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(28, 'linkedin_link', '#', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(29, 'instagram_link', '#', '2024-04-18 23:47:40', '2024-04-18 23:47:40'),
(30, 'address', 'local', '2024-04-18 23:47:40', '2024-04-18 23:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint UNSIGNED NOT NULL,
  `country_code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fips_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `flag` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`, `country_code`, `fips_code`, `iso2`, `type`, `latitude`, `longitude`, `created_at`, `updated_at`, `flag`) VALUES
(3870, 'Ghazni', 1, 'AF', '08', 'GHA', NULL, 33.54505870, 68.41739720, '2019-10-05 11:18:56', '2022-08-31 03:52:51', 1),
(3871, 'Badghis', 1, 'AF', '02', 'BDG', NULL, 35.16713390, 63.76953840, '2019-10-05 11:18:56', '2022-08-31 03:52:51', 1),
(3872, 'Bamyan', 1, 'AF', '05', 'BAM', NULL, 34.81000670, 67.82121040, '2019-10-05 11:18:56', '2022-08-31 03:52:51', 1),
(3873, 'Helmand', 1, 'AF', '10', 'HEL', NULL, 39.29893610, -76.61604720, '2019-10-05 11:18:56', '2022-08-31 03:52:51', 1),
(3874, 'Zabul', 1, 'AF', '28', 'ZAB', NULL, 32.19187820, 67.18944880, '2019-10-05 11:18:56', '2022-08-31 03:52:51', 1),
(3875, 'Baghlan', 1, 'AF', '03', 'BGL', NULL, 36.17890260, 68.74530640, '2019-10-05 11:18:56', '2022-08-31 03:52:51', 1),
(3876, 'Kunar', 1, 'AF', '34', 'KNR', NULL, 34.84658930, 71.09731700, '2019-10-05 11:18:56', '2022-08-31 03:52:51', 1),
(3877, 'Paktika', 1, 'AF', '29', 'PKA', NULL, 32.26453860, 68.52471490, '2019-10-05 11:18:56', '2022-08-31 03:52:51', 1),
(3878, 'Khost', 1, 'AF', '37', 'KHO', NULL, 33.33384720, 69.93716730, '2019-10-05 11:18:56', '2022-08-31 03:52:51', 1),
(3879, 'Kapisa', 1, 'AF', '14', 'KAP', NULL, 34.98105720, 69.62145620, '2019-10-05 11:18:56', '2022-08-31 03:52:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tenant_assets`
--

CREATE TABLE `tenant_assets` (
  `id` bigint UNSIGNED NOT NULL,
  `tenant_id` bigint UNSIGNED NOT NULL,
  `order_detail_id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `serial` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `attachment_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci,
  `image_id` bigint UNSIGNED DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `account_id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `sourcable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sourcable_id` bigint UNSIGNED NOT NULL,
  `type` enum('debit','credit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `attachment_id` bigint UNSIGNED DEFAULT NULL,
  `bank_info` text COLLATE utf8mb4_unicode_ci,
  `created_by` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unions`
--

CREATE TABLE `unions` (
  `id` bigint UNSIGNED NOT NULL,
  `upazilla_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bn_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE `upazilas` (
  `id` bigint UNSIGNED NOT NULL,
  `country_id` bigint UNSIGNED DEFAULT '1',
  `division_id` bigint UNSIGNED DEFAULT NULL,
  `district_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bn_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `charge` decimal(16,2) NOT NULL DEFAULT '120.00',
  `per_kg` decimal(16,2) NOT NULL DEFAULT '30.00',
  `is_free_shipping` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL COMMENT 'if null then verifield, not null then not verified',
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Token for email/phone verification, if null then verifield, not null then not verified',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirm_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'present_country',
  `city_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'present_city',
  `state_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'present_state',
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'present_zip_code',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'present_address',
  `per_country_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'permanent_country',
  `per_city_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'permanent_city',
  `per_state_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'permanent_state',
  `per_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'permanent_zip_code',
  `per_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'permanent_address',
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_security_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_count` int DEFAULT NULL,
  `otp` int DEFAULT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '1',
  `image_id` bigint UNSIGNED DEFAULT NULL,
  `document_id` bigint UNSIGNED DEFAULT NULL,
  `role_id` bigint UNSIGNED DEFAULT NULL,
  `designation_id` bigint UNSIGNED DEFAULT NULL,
  `department_id` bigint UNSIGNED DEFAULT NULL,
  `address_verify` tinyint NOT NULL DEFAULT '0',
  `req_address_verify` tinyint NOT NULL DEFAULT '0',
  `address_details` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '0',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `dark_mode` tinyint(1) NOT NULL DEFAULT '0',
  `messenger_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_owner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tin_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `date_of_birth`, `join_date`, `gender`, `email_verified_at`, `token`, `phone`, `alt_phone`, `password`, `new_password`, `confirm_password`, `permanent_address`, `present_address`, `institution`, `country_id`, `city_id`, `state_id`, `zip_code`, `address`, `per_country_id`, `per_city_id`, `per_state_id`, `per_zip_code`, `per_address`, `occupation`, `nid`, `social_security_number`, `passport`, `nationality`, `blood_group`, `tax_certificate`, `lang`, `property_count`, `otp`, `permissions`, `status`, `image_id`, `document_id`, `role_id`, `designation_id`, `department_id`, `address_verify`, `req_address_verify`, `address_details`, `remember_token`, `created_at`, `updated_at`, `active_status`, `avatar`, `dark_mode`, `messenger_color`, `property_owner`, `tin_number`, `marital_status`, `religion`) VALUES
(1, 'Admin', 'onest125@gmail.com', '2022-09-07', NULL, NULL, '2024-04-19 05:47:40', NULL, '01811000000', '01811000027', '$2y$10$8d2yuVuqKvRgIpgN8dULru2d1wMfWliLsLsXibDb0iQcw3.gIoFom', NULL, NULL, NULL, NULL, NULL, '5', '6', '5', '213', 'malibagh 13b', NULL, NULL, NULL, NULL, NULL, 'Business Man', '6465325235', '4135325235', 'eb4153525235', 'Bangladeshi', 'A+', '3', NULL, 3, NULL, '[\"user_read\",\"user_create\",\"user_update\",\"user_delete\",\"role_read\",\"role_create\",\"role_update\",\"role_delete\",\"language_read\",\"language_create\",\"language_update\",\"language_update_terms\",\"language_delete\",\"general_settings_read\",\"general_settings_update\",\"storage_settings_read\",\"storage_settings_update\",\"recaptcha_settings_read\",\"recaptcha_settings_update\",\"email_settings_read\",\"email_settings_update\",\"testimonial_read\",\"testimonial_create\",\"testimonial_update\",\"testimonial_delete\",\"blogs_read\",\"blogs_create\",\"blogs_update\",\"blogs_delete\",\"blog_categories_read\",\"blog_categories_create\",\"blog_categories_update\",\"blog_categories_delete\",\"category_read\",\"category_create\",\"category_update\",\"category_delete\",\"how-it-work_read\",\"how-it-work_create\",\"how-it-work_update\",\"how-it-work_delete\",\"business_model_read\",\"business_model_create\",\"business_model_update\",\"business_model_delete\",\"feature_read\",\"feature_create\",\"feature_update\",\"feature_delete\",\"section_titles_update\",\"partners_read\",\"partners_create\",\"partners_update\",\"partners_delete\",\"hero_section_read\",\"hero_section_create\",\"hero_section_update\",\"hero_section_delete\",\"tenant_read\",\"tenant_create\",\"tenant_update\",\"tenant_delete\",\"contact_read\",\"contact_delete\",\"property_read\",\"property_create\",\"property_update\",\"property_delete\",\"about_update\",\"property_category_read\",\"property_category_create\",\"property_category_update\",\"property_category_delete\",\"property_facility_type_read\",\"property_facility_type_create\",\"property_facility_type_update\",\"property_facility_type_delete\",\"ad_action_permission\",\"committee_read\",\"committee_show\",\"committee_create\",\"committee_update\",\"committee_delete\",\"committee_member_read\",\"committee_member_create\",\"committee_member_delete\",\"db_backup_read\",\"db_backup_create\",\"db_backup_delete\",\"tenant_read\",\"tenant_create\",\"tenant_delete\",\"tenant_show\",\"account_read\",\"account_create\",\"account_delete\",\"rental_read\",\"tenant_report\",\"room_report\",\"payment_report\",\"order_read\",\"order_create\",\"order_delete\",\"order_show\",\"order_payment\"]', 1, 5, NULL, 1, 2, NULL, 0, 0, NULL, '9h1Ukey1RY', '2024-04-18 23:47:39', '2024-04-18 23:47:39', 0, 'avatar.png', 0, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abouts_image_id_one_foreign` (`image_id_one`),
  ADD KEY `abouts_image_id_two_foreign` (`image_id_two`),
  ADD KEY `abouts_image_id_three_foreign` (`image_id_three`),
  ADD KEY `abouts_image_id_four_foreign` (`image_id_four`),
  ADD KEY `abouts_image_id_five_foreign` (`image_id_five`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accounts_name_unique` (`name`),
  ADD KEY `accounts_user_id_foreign` (`user_id`),
  ADD KEY `accounts_account_category_id_foreign` (`account_category_id`),
  ADD KEY `accounts_created_by_foreign` (`created_by`),
  ADD KEY `accounts_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `account_categories`
--
ALTER TABLE `account_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_categories_name_unique` (`name`),
  ADD KEY `account_categories_created_by_foreign` (`created_by`),
  ADD KEY `account_categories_updated_by_foreign` (`updated_by`),
  ADD KEY `account_categories_user_id_foreign` (`user_id`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advertisements_user_id_foreign` (`user_id`),
  ADD KEY `advertisements_property_id_foreign` (`property_id`),
  ADD KEY `advertisements_property_creator_id_foreign` (`property_creator_id`),
  ADD KEY `advertisements_approved_by_foreign` (`approved_by`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `appointments_email_unique` (`email`);

--
-- Indexes for table `backup_logs`
--
ALTER TABLE `backup_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `backup_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `balances`
--
ALTER TABLE `balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_accounts_user_id_foreign` (`user_id`);

--
-- Indexes for table `billing_addresses`
--
ALTER TABLE `billing_addresses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `billing_addresses_phone_unique` (`phone`),
  ADD UNIQUE KEY `billing_addresses_email_unique` (`email`),
  ADD KEY `billing_addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_property_id_foreign` (`property_id`),
  ADD KEY `bills_tenant_id_foreign` (`tenant_id`),
  ADD KEY `bills_created_by_foreign` (`created_by`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_case_study_id_foreign` (`case_study_id`),
  ADD KEY `blogs_image_id_foreign` (`image_id`),
  ADD KEY `blogs_category_id_foreign` (`category_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_reviews`
--
ALTER TABLE `blog_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_reviews_blog_id_foreign` (`blog_id`);

--
-- Indexes for table `business_models`
--
ALTER TABLE `business_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `business_models_image_id_foreign` (`image_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_tenant_id_foreign` (`tenant_id`),
  ADD KEY `carts_property_id_foreign` (`property_id`),
  ADD KEY `carts_advertisement_id_foreign` (`advertisement_id`);

--
-- Indexes for table `case_studies`
--
ALTER TABLE `case_studies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `case_studies_image_id_foreign` (`image_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_image_id_foreign` (`image_id`),
  ADD KEY `categories_icon_id_foreign` (`icon_id`);

--
-- Indexes for table `category_wise_document_templates`
--
ALTER TABLE `category_wise_document_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_favorites`
--
ALTER TABLE `ch_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_messages`
--
ALTER TABLE `ch_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committees`
--
ALTER TABLE `committees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `committees_property_id_foreign` (`property_id`);

--
-- Indexes for table `committee_members`
--
ALTER TABLE `committee_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `committee_members_committee_id_foreign` (`committee_id`),
  ADD KEY `committee_members_user_id_foreign` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `districts_name_unique` (`name`),
  ADD KEY `districts_country_id_division_id_index` (`country_id`,`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `divisions_name_unique` (`name`),
  ADD KEY `divisions_country_id_status_index` (`country_id`,`status`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_user_id_foreign` (`user_id`),
  ADD KEY `documents_attachment_id_foreign` (`attachment_id`);

--
-- Indexes for table `due_payments`
--
ALTER TABLE `due_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `due_payments_property_id_foreign` (`property_id`),
  ADD KEY `due_payments_tenant_id_foreign` (`tenant_id`),
  ADD KEY `due_payments_landlord_id_foreign` (`landlord_id`),
  ADD KEY `due_payments_sourceable_type_sourceable_id_index` (`sourceable_type`,`sourceable_id`),
  ADD KEY `due_payments_created_by_foreign` (`created_by`),
  ADD KEY `due_payments_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emergency_contacts_image_id_foreign` (`image_id`),
  ADD KEY `emergency_contacts_property_tenant_id_foreign` (`property_tenant_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_account_id_foreign` (`account_id`),
  ADD KEY `expenses_category_id_foreign` (`category_id`),
  ADD KEY `expenses_attachment_id_foreign` (`attachment_id`),
  ADD KEY `expenses_created_by_foreign` (`created_by`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `family_members`
--
ALTER TABLE `family_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `family_members_property_id_foreign` (`property_id`),
  ADD KEY `family_members_tenant_id_foreign` (`tenant_id`),
  ADD KEY `family_members_order_details_id_foreign` (`order_details_id`),
  ADD KEY `family_members_photo_id_foreign` (`photo_id`),
  ADD KEY `family_members_document_id_foreign` (`document_id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `features_icon_id_foreign` (`icon_id`);

--
-- Indexes for table `flag_icons`
--
ALTER TABLE `flag_icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hero_sections`
--
ALTER TABLE `hero_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hero_sections_image_id_foreign` (`image_id`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_pages`
--
ALTER TABLE `home_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `how_it_works`
--
ALTER TABLE `how_it_works`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `incomes_account_id_foreign` (`account_id`),
  ADD KEY `incomes_category_id_foreign` (`category_id`),
  ADD KEY `incomes_attachment_id_foreign` (`attachment_id`),
  ADD KEY `incomes_created_by_foreign` (`created_by`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaderships`
--
ALTER TABLE `leaderships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leaderships_image_id_foreign` (`image_id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mailboxes`
--
ALTER TABLE `mailboxes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mailboxes_parent_id_foreign` (`parent_id`),
  ADD KEY `mailboxes_created_by_foreign` (`created_by`),
  ADD KEY `mailboxes_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `mailbox_attachments`
--
ALTER TABLE `mailbox_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mailbox_attachments_mailbox_id_foreign` (`mailbox_id`);

--
-- Indexes for table `mailbox_bcc`
--
ALTER TABLE `mailbox_bcc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mailbox_bcc_mailbox_id_foreign` (`mailbox_id`);

--
-- Indexes for table `mailbox_cc`
--
ALTER TABLE `mailbox_cc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mailbox_cc_mailbox_id_foreign` (`mailbox_id`);

--
-- Indexes for table `mailbox_recipients`
--
ALTER TABLE `mailbox_recipients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mailbox_recipients_mailbox_id_foreign` (`mailbox_id`),
  ADD KEY `mailbox_recipients_user_id_foreign` (`user_id`);

--
-- Indexes for table `mailbox_templates`
--
ALTER TABLE `mailbox_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mailbox_templates_title_unique` (`title`);

--
-- Indexes for table `master_orders`
--
ALTER TABLE `master_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_sender_id_foreign` (`sender_id`),
  ADD KEY `notifications_receiver_id_foreign` (`receiver_id`),
  ADD KEY `notifications_created_by_foreign` (`created_by`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_invoice_no_unique` (`invoice_no`),
  ADD KEY `orders_tenant_id_foreign` (`tenant_id`),
  ADD KEY `orders_created_by_foreign` (`created_by`),
  ADD KEY `orders_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_property_id_foreign` (`property_id`),
  ADD KEY `order_details_advertisement_id_foreign` (`advertisement_id`);

--
-- Indexes for table `order_payments`
--
ALTER TABLE `order_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_payments_master_order_id_foreign` (`master_order_id`),
  ADD KEY `order_payments_order_id_foreign` (`order_id`),
  ADD KEY `order_payments_property_id_foreign` (`property_id`),
  ADD KEY `order_payments_tenant_id_foreign` (`tenant_id`),
  ADD KEY `order_payments_attachment_id_foreign` (`attachment_id`),
  ADD KEY `order_payments_created_by_foreign` (`created_by`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organizations_user_id_foreign` (`user_id`),
  ADD KEY `organizations_incorporation_attachment_id_foreign` (`incorporation_attachment_id`),
  ADD KEY `organizations_business_attachment_id_foreign` (`business_attachment_id`),
  ADD KEY `organizations_company_certificate_attachment_id_foreign` (`company_certificate_attachment_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_user_id_foreign` (`user_id`),
  ADD KEY `pages_image_id_foreign` (`image_id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partners_image_id_foreign` (`image_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_invoice_no_unique` (`invoice_no`),
  ADD KEY `payments_sourcable_type_sourcable_id_index` (`sourcable_type`,`sourcable_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `properties_user_id_foreign` (`user_id`),
  ADD KEY `properties_default_image_foreign` (`default_image`),
  ADD KEY `properties_property_category_id_foreign` (`property_category_id`);

--
-- Indexes for table `property_categories`
--
ALTER TABLE `property_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `property_categories_slug_unique` (`slug`),
  ADD KEY `property_categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `property_documents`
--
ALTER TABLE `property_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_documents_property_id_foreign` (`property_id`),
  ADD KEY `property_documents_attachment_id_foreign` (`attachment_id`),
  ADD KEY `property_documents_created_by_foreign` (`created_by`),
  ADD KEY `property_documents_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `property_facilities`
--
ALTER TABLE `property_facilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_facilities_property_id_foreign` (`property_id`),
  ADD KEY `property_facilities_property_facility_type_id_foreign` (`property_facility_type_id`);

--
-- Indexes for table `property_facility_types`
--
ALTER TABLE `property_facility_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_facility_types_image_id_foreign` (`image_id`);

--
-- Indexes for table `property_galleries`
--
ALTER TABLE `property_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_galleries_property_id_foreign` (`property_id`),
  ADD KEY `property_galleries_image_id_foreign` (`image_id`);

--
-- Indexes for table `property_locations`
--
ALTER TABLE `property_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_locations_property_id_foreign` (`property_id`),
  ADD KEY `property_locations_user_id_foreign` (`user_id`);

--
-- Indexes for table `property_reviews`
--
ALTER TABLE `property_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_reviews_property_id_foreign` (`property_id`);

--
-- Indexes for table `property_statuses`
--
ALTER TABLE `property_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_statuses_property_id_foreign` (`property_id`),
  ADD KEY `property_statuses_tenant_id_foreign` (`tenant_id`),
  ADD KEY `property_statuses_sourceable_type_sourceable_id_index` (`sourceable_type`,`sourceable_id`),
  ADD KEY `property_statuses_created_by_foreign` (`created_by`);

--
-- Indexes for table `property_tenants`
--
ALTER TABLE `property_tenants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_tenants_property_id_foreign` (`property_id`),
  ADD KEY `property_tenants_user_id_foreign` (`user_id`);

--
-- Indexes for table `received_mails`
--
ALTER TABLE `received_mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rentals_property_tenant_id_foreign` (`property_tenant_id`),
  ADD KEY `rentals_property_id_foreign` (`property_id`);

--
-- Indexes for table `request_properties`
--
ALTER TABLE `request_properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_properties_user_id_foreign` (`user_id`),
  ADD KEY `request_properties_property_id_foreign` (`property_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `searches`
--
ALTER TABLE `searches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenant_assets`
--
ALTER TABLE `tenant_assets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenant_assets_tenant_id_foreign` (`tenant_id`),
  ADD KEY `tenant_assets_order_detail_id_foreign` (`order_detail_id`),
  ADD KEY `tenant_assets_property_id_foreign` (`property_id`),
  ADD KEY `tenant_assets_attachment_id_foreign` (`attachment_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimonials_image_id_foreign` (`image_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_account_id_foreign` (`account_id`),
  ADD KEY `transactions_sourcable_type_sourcable_id_index` (`sourcable_type`,`sourcable_id`);

--
-- Indexes for table `unions`
--
ALTER TABLE `unions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unions_upazilla_id_index` (`upazilla_id`);

--
-- Indexes for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `upazilas_country_id_division_id_district_id_index` (`country_id`,`division_id`,`district_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD KEY `users_image_id_foreign` (`image_id`),
  ADD KEY `users_document_id_foreign` (`document_id`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_designation_id_foreign` (`designation_id`),
  ADD KEY `users_department_id_foreign` (`department_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_property_id_foreign` (`property_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account_categories`
--
ALTER TABLE `account_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `backup_logs`
--
ALTER TABLE `backup_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `balances`
--
ALTER TABLE `balances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billing_addresses`
--
ALTER TABLE `billing_addresses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_reviews`
--
ALTER TABLE `blog_reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `business_models`
--
ALTER TABLE `business_models`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `case_studies`
--
ALTER TABLE `case_studies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `category_wise_document_templates`
--
ALTER TABLE `category_wise_document_templates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `committees`
--
ALTER TABLE `committees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `committee_members`
--
ALTER TABLE `committee_members`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `due_payments`
--
ALTER TABLE `due_payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `family_members`
--
ALTER TABLE `family_members`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flag_icons`
--
ALTER TABLE `flag_icons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `hero_sections`
--
ALTER TABLE `hero_sections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_pages`
--
ALTER TABLE `home_pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `how_it_works`
--
ALTER TABLE `how_it_works`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `icons`
--
ALTER TABLE `icons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leaderships`
--
ALTER TABLE `leaderships`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mailboxes`
--
ALTER TABLE `mailboxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mailbox_attachments`
--
ALTER TABLE `mailbox_attachments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mailbox_bcc`
--
ALTER TABLE `mailbox_bcc`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mailbox_cc`
--
ALTER TABLE `mailbox_cc`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mailbox_recipients`
--
ALTER TABLE `mailbox_recipients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mailbox_templates`
--
ALTER TABLE `mailbox_templates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_orders`
--
ALTER TABLE `master_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_payments`
--
ALTER TABLE `order_payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_categories`
--
ALTER TABLE `property_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `property_documents`
--
ALTER TABLE `property_documents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_facilities`
--
ALTER TABLE `property_facilities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_facility_types`
--
ALTER TABLE `property_facility_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `property_galleries`
--
ALTER TABLE `property_galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_locations`
--
ALTER TABLE `property_locations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_reviews`
--
ALTER TABLE `property_reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_statuses`
--
ALTER TABLE `property_statuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_tenants`
--
ALTER TABLE `property_tenants`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `received_mails`
--
ALTER TABLE `received_mails`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_properties`
--
ALTER TABLE `request_properties`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `searches`
--
ALTER TABLE `searches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3880;

--
-- AUTO_INCREMENT for table `tenant_assets`
--
ALTER TABLE `tenant_assets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unions`
--
ALTER TABLE `unions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upazilas`
--
ALTER TABLE `upazilas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `abouts`
--
ALTER TABLE `abouts`
  ADD CONSTRAINT `abouts_image_id_five_foreign` FOREIGN KEY (`image_id_five`) REFERENCES `images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abouts_image_id_four_foreign` FOREIGN KEY (`image_id_four`) REFERENCES `images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abouts_image_id_one_foreign` FOREIGN KEY (`image_id_one`) REFERENCES `images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abouts_image_id_three_foreign` FOREIGN KEY (`image_id_three`) REFERENCES `images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abouts_image_id_two_foreign` FOREIGN KEY (`image_id_two`) REFERENCES `images` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_account_category_id_foreign` FOREIGN KEY (`account_category_id`) REFERENCES `account_categories` (`id`),
  ADD CONSTRAINT `accounts_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `accounts_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `account_categories`
--
ALTER TABLE `account_categories`
  ADD CONSTRAINT `account_categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `account_categories_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `account_categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD CONSTRAINT `advertisements_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `advertisements_property_creator_id_foreign` FOREIGN KEY (`property_creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `advertisements_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `advertisements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `backup_logs`
--
ALTER TABLE `backup_logs`
  ADD CONSTRAINT `backup_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD CONSTRAINT `bank_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `billing_addresses`
--
ALTER TABLE `billing_addresses`
  ADD CONSTRAINT `billing_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bills_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `bills_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_case_study_id_foreign` FOREIGN KEY (`case_study_id`) REFERENCES `case_studies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blogs_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_reviews`
--
ALTER TABLE `blog_reviews`
  ADD CONSTRAINT `blog_reviews_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `business_models`
--
ALTER TABLE `business_models`
  ADD CONSTRAINT `business_models_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_advertisement_id_foreign` FOREIGN KEY (`advertisement_id`) REFERENCES `advertisements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `case_studies`
--
ALTER TABLE `case_studies`
  ADD CONSTRAINT `case_studies_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_icon_id_foreign` FOREIGN KEY (`icon_id`) REFERENCES `images` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `categories_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `committees`
--
ALTER TABLE `committees`
  ADD CONSTRAINT `committees_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`);

--
-- Constraints for table `committee_members`
--
ALTER TABLE `committee_members`
  ADD CONSTRAINT `committee_members_committee_id_foreign` FOREIGN KEY (`committee_id`) REFERENCES `committees` (`id`),
  ADD CONSTRAINT `committee_members_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_attachment_id_foreign` FOREIGN KEY (`attachment_id`) REFERENCES `images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `documents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `due_payments`
--
ALTER TABLE `due_payments`
  ADD CONSTRAINT `due_payments_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `due_payments_landlord_id_foreign` FOREIGN KEY (`landlord_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `due_payments_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `due_payments_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `due_payments_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  ADD CONSTRAINT `emergency_contacts_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `emergency_contacts_property_tenant_id_foreign` FOREIGN KEY (`property_tenant_id`) REFERENCES `property_tenants` (`id`);

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `expenses_attachment_id_foreign` FOREIGN KEY (`attachment_id`) REFERENCES `images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `expenses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `account_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `expenses_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `family_members`
--
ALTER TABLE `family_members`
  ADD CONSTRAINT `family_members_document_id_foreign` FOREIGN KEY (`document_id`) REFERENCES `images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `family_members_order_details_id_foreign` FOREIGN KEY (`order_details_id`) REFERENCES `order_details` (`id`),
  ADD CONSTRAINT `family_members_photo_id_foreign` FOREIGN KEY (`photo_id`) REFERENCES `images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `family_members_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `family_members_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `features`
--
ALTER TABLE `features`
  ADD CONSTRAINT `features_icon_id_foreign` FOREIGN KEY (`icon_id`) REFERENCES `icons` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `hero_sections`
--
ALTER TABLE `hero_sections`
  ADD CONSTRAINT `hero_sections_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `incomes`
--
ALTER TABLE `incomes`
  ADD CONSTRAINT `incomes_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `incomes_attachment_id_foreign` FOREIGN KEY (`attachment_id`) REFERENCES `images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `incomes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `account_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `incomes_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leaderships`
--
ALTER TABLE `leaderships`
  ADD CONSTRAINT `leaderships_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `mailboxes`
--
ALTER TABLE `mailboxes`
  ADD CONSTRAINT `mailboxes_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `mailboxes_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `mailboxes` (`id`),
  ADD CONSTRAINT `mailboxes_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `mailbox_attachments`
--
ALTER TABLE `mailbox_attachments`
  ADD CONSTRAINT `mailbox_attachments_mailbox_id_foreign` FOREIGN KEY (`mailbox_id`) REFERENCES `mailboxes` (`id`);

--
-- Constraints for table `mailbox_bcc`
--
ALTER TABLE `mailbox_bcc`
  ADD CONSTRAINT `mailbox_bcc_mailbox_id_foreign` FOREIGN KEY (`mailbox_id`) REFERENCES `mailboxes` (`id`);

--
-- Constraints for table `mailbox_cc`
--
ALTER TABLE `mailbox_cc`
  ADD CONSTRAINT `mailbox_cc_mailbox_id_foreign` FOREIGN KEY (`mailbox_id`) REFERENCES `mailboxes` (`id`);

--
-- Constraints for table `mailbox_recipients`
--
ALTER TABLE `mailbox_recipients`
  ADD CONSTRAINT `mailbox_recipients_mailbox_id_foreign` FOREIGN KEY (`mailbox_id`) REFERENCES `mailboxes` (`id`),
  ADD CONSTRAINT `mailbox_recipients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notifications_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notifications_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_advertisement_id_foreign` FOREIGN KEY (`advertisement_id`) REFERENCES `advertisements` (`id`),
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`);

--
-- Constraints for table `order_payments`
--
ALTER TABLE `order_payments`
  ADD CONSTRAINT `order_payments_attachment_id_foreign` FOREIGN KEY (`attachment_id`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `order_payments_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `order_payments_master_order_id_foreign` FOREIGN KEY (`master_order_id`) REFERENCES `master_orders` (`id`),
  ADD CONSTRAINT `order_payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_payments_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `order_payments_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `organizations`
--
ALTER TABLE `organizations`
  ADD CONSTRAINT `organizations_business_attachment_id_foreign` FOREIGN KEY (`business_attachment_id`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `organizations_company_certificate_attachment_id_foreign` FOREIGN KEY (`company_certificate_attachment_id`) REFERENCES `images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `organizations_incorporation_attachment_id_foreign` FOREIGN KEY (`incorporation_attachment_id`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `organizations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `partners`
--
ALTER TABLE `partners`
  ADD CONSTRAINT `partners_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_default_image_foreign` FOREIGN KEY (`default_image`) REFERENCES `images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `properties_property_category_id_foreign` FOREIGN KEY (`property_category_id`) REFERENCES `property_categories` (`id`),
  ADD CONSTRAINT `properties_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `property_categories`
--
ALTER TABLE `property_categories`
  ADD CONSTRAINT `property_categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `property_categories` (`id`);

--
-- Constraints for table `property_documents`
--
ALTER TABLE `property_documents`
  ADD CONSTRAINT `property_documents_attachment_id_foreign` FOREIGN KEY (`attachment_id`) REFERENCES `images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `property_documents_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `property_documents_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `property_documents_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `property_facilities`
--
ALTER TABLE `property_facilities`
  ADD CONSTRAINT `property_facilities_property_facility_type_id_foreign` FOREIGN KEY (`property_facility_type_id`) REFERENCES `property_facility_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `property_facilities_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_facility_types`
--
ALTER TABLE `property_facility_types`
  ADD CONSTRAINT `property_facility_types_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_galleries`
--
ALTER TABLE `property_galleries`
  ADD CONSTRAINT `property_galleries_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `property_galleries_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_locations`
--
ALTER TABLE `property_locations`
  ADD CONSTRAINT `property_locations_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `property_locations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_reviews`
--
ALTER TABLE `property_reviews`
  ADD CONSTRAINT `property_reviews_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_statuses`
--
ALTER TABLE `property_statuses`
  ADD CONSTRAINT `property_statuses_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `property_statuses_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `property_statuses_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `property_tenants`
--
ALTER TABLE `property_tenants`
  ADD CONSTRAINT `property_tenants_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `property_tenants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rentals_property_tenant_id_foreign` FOREIGN KEY (`property_tenant_id`) REFERENCES `property_tenants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `request_properties`
--
ALTER TABLE `request_properties`
  ADD CONSTRAINT `request_properties_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `request_properties_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tenant_assets`
--
ALTER TABLE `tenant_assets`
  ADD CONSTRAINT `tenant_assets_attachment_id_foreign` FOREIGN KEY (`attachment_id`) REFERENCES `images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tenant_assets_order_detail_id_foreign` FOREIGN KEY (`order_detail_id`) REFERENCES `order_details` (`id`),
  ADD CONSTRAINT `tenant_assets_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `tenant_assets_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_document_id_foreign` FOREIGN KEY (`document_id`) REFERENCES `images` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
