-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2023 at 02:11 PM
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
-- Database: `laravelfyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cluster_supervisor`
--

CREATE TABLE `cluster_supervisor` (
  `id` int(11) NOT NULL,
  `cluster_id` varchar(255) DEFAULT NULL,
  `supervisor_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_29_025416_create_semesters_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notification` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `notification`, `status`, `created_at`, `updated_at`) VALUES
(1, '6', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(2, '7', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(3, '8', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(4, '9', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(5, '10', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(6, '11', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(7, '12', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(8, '13', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(9, '14', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(10, '15', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(11, '16', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(12, '17', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(13, '18', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(14, '19', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(15, '20', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(16, '21', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(17, '22', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(18, '23', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(19, '24', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(20, '25', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(21, '26', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(22, '27', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(23, '28', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(24, '29', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(25, '30', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(26, '31', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(27, '32', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(28, '33', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(29, '34', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(30, '35', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(31, '36', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(32, '37', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(33, '38', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(34, '39', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(35, '6', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(36, '7', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(37, '8', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(38, '9', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(39, '10', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(40, '11', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(41, '12', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(42, '13', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(43, '14', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(44, '15', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(45, '16', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(46, '17', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(47, '18', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(48, '19', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(49, '20', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(50, '21', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(51, '22', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(52, '23', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(53, '24', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(54, '25', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(55, '26', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(56, '27', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(57, '28', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(58, '29', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(59, '30', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(60, '31', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(61, '32', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(62, '33', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(63, '34', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(64, '35', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(65, '36', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(66, '37', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(67, '38', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(68, '39', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(69, '64', 'fypcoordinator approved FAUDZI AHMAD as your supervisor', 'new', '2023-01-23 04:44:57', NULL),
(70, '40', 'TS. MARLIZA ABDUL MALIK approved proposal asdasd', 'new', '2023-02-11 05:36:33', NULL),
(71, '40', 'TS. MARLIZA ABDUL MALIK approved proposal asdasd', 'new', '2023-02-11 06:28:39', NULL),
(72, '6', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(73, '7', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(74, '8', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(75, '9', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(76, '10', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(77, '11', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(78, '12', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(79, '13', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(80, '14', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(81, '15', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(82, '16', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(83, '17', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(84, '18', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(85, '19', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(86, '20', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(87, '21', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(88, '22', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(89, '23', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(90, '24', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(91, '25', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(92, '26', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(93, '27', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(94, '28', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(95, '29', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(96, '30', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(97, '31', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(98, '32', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(99, '33', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(100, '34', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(101, '35', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(102, '36', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(103, '37', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(104, '38', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(105, '39', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(106, '6', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(107, '7', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(108, '8', 'Student student1 has created fyp proposals, please review the proposals!', 'read', NULL, NULL),
(109, '9', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(110, '10', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(111, '11', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(112, '12', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(113, '13', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(114, '14', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(115, '15', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(116, '16', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(117, '17', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(118, '18', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(119, '19', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(120, '20', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(121, '21', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(122, '22', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(123, '23', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(124, '24', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(125, '25', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(126, '26', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(127, '27', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(128, '28', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(129, '29', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(130, '30', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(131, '31', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(132, '32', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(133, '33', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(134, '34', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(135, '35', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(136, '36', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(137, '37', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(138, '38', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(139, '39', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(140, '6', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(141, '7', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(142, '8', 'Student student1 has created fyp proposals, please review the proposals!', 'read', NULL, NULL),
(143, '9', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(144, '10', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(145, '11', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(146, '12', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(147, '13', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(148, '14', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(149, '15', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(150, '16', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(151, '17', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(152, '18', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(153, '19', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(154, '20', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(155, '21', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(156, '22', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(157, '23', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(158, '24', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(159, '25', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(160, '26', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(161, '27', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(162, '28', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(163, '29', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(164, '30', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(165, '31', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(166, '32', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(167, '33', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(168, '34', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(169, '35', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(170, '36', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(171, '37', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(172, '38', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(173, '39', 'Student student1 has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(174, '40', 'TS. MARLIZA ABDUL MALIK approved proposal sadasds', 'new', '2023-02-11 20:40:10', NULL),
(175, '40', 'TS. MARLIZA ABDUL MALIK approved proposal sdfdf', 'new', '2023-02-11 20:40:55', NULL),
(176, '40', 'TS. MARLIZA ABDUL MALIK rejected proposal sdsd', 'new', '2023-02-11 20:41:01', NULL),
(177, '8', 'Cluster cluster has approved supervisor, please finalize the supervisors!', 'new', NULL, NULL),
(178, '8', 'Cluster cluster has approved supervisor, please finalize the supervisors!', 'new', NULL, NULL);

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE `proposals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submission_date` datetime DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `supervisor_id` bigint(20) DEFAULT NULL,
  `supervisor_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fyp_coordinator_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cluster_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proposals`
--

INSERT INTO `proposals` (`id`, `title`, `submission_date`, `status`, `user_id`, `supervisor_id`, `supervisor_status`, `fyp_coordinator_status`, `cluster_status`, `attachment`, `attachment_name`, `reason`) VALUES
(3, 'sdsd', '2023-02-11 00:00:00', 'pending', 40, 7, 'approved', 'rejected', 'approved', NULL, NULL, 'asdasd'),
(4, 'sdfdf', '2023-02-14 00:00:00', 'pending', 40, 8, 'approved', 'approved', 'rejected', NULL, NULL, 'fgfg'),
(5, 'sadasds', '2023-02-17 00:00:00', 'pending', 40, 7, 'approved', 'approved', 'approved', NULL, NULL, 'sdsd');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '12234', NULL, NULL),
(2, '22234', NULL, NULL),
(3, '32234', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fypcoordinator_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cluster_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cluster_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `user_id`, `roles`, `staff_id`, `department`, `fypcoordinator_status`, `cluster_status`, `status`, `created_at`, `updated_at`, `cluster_id`) VALUES
(1, 2, 'cluster', '1', 'multimedia', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 3, 'cluster', '1', 'computer_science', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 4, 'cluster', '1', 'information_system', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 5, 'hod', '1', 'multimedia', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 6, 'fyp_coordinator', '1', 'multimedia', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 7, 'supervisor', '1', 'multimedia', NULL, NULL, NULL, NULL, NULL, '2'),
(7, 8, 'supervisor', '1', 'multimedia', NULL, NULL, NULL, NULL, NULL, '2'),
(8, 9, 'supervisor', '1', 'multimedia', NULL, NULL, NULL, NULL, NULL, '2'),
(9, 10, 'supervisor', '1', 'multimedia', NULL, NULL, NULL, NULL, NULL, '2'),
(10, 11, 'supervisor', '1', 'information_system', NULL, NULL, NULL, NULL, NULL, '4'),
(11, 12, 'supervisor', '1', 'information_system', NULL, NULL, NULL, NULL, NULL, '4'),
(12, 13, 'supervisor', '1', 'information_system', NULL, NULL, NULL, NULL, NULL, '4'),
(13, 14, 'supervisor', '1', 'information_system', NULL, NULL, NULL, NULL, NULL, '4'),
(14, 15, 'supervisor', '1', 'information_system', NULL, NULL, NULL, NULL, NULL, '4'),
(15, 16, 'supervisor', '1', 'information_system', NULL, NULL, NULL, NULL, NULL, '4'),
(16, 17, 'supervisor', '1', 'information_system', NULL, NULL, NULL, NULL, NULL, '4'),
(17, 18, 'supervisor', '1', 'information_system', NULL, NULL, NULL, NULL, NULL, '4'),
(18, 19, 'supervisor', '1', 'information_system', NULL, NULL, NULL, NULL, NULL, '4'),
(19, 20, 'supervisor', '1', 'information_system', NULL, NULL, NULL, NULL, NULL, '4'),
(20, 21, 'supervisor', '1', 'information_system', NULL, NULL, NULL, NULL, NULL, '4'),
(21, 22, 'supervisor', '1', 'information_system', NULL, NULL, NULL, NULL, NULL, '4'),
(22, 23, 'supervisor', '1', 'information_system', NULL, NULL, NULL, NULL, NULL, '4'),
(23, 24, 'supervisor', '1', 'information_system', NULL, NULL, NULL, NULL, NULL, '4'),
(24, 25, 'supervisor', '1', 'information_system', NULL, NULL, NULL, NULL, NULL, '4'),
(25, 26, 'supervisor', '1', 'computer_science', NULL, NULL, NULL, NULL, NULL, '3'),
(26, 27, 'supervisor', '1', 'computer_science', NULL, NULL, NULL, NULL, NULL, '3'),
(27, 28, 'supervisor', '1', 'computer_science', NULL, NULL, NULL, NULL, NULL, '3'),
(28, 29, 'supervisor', '1', 'computer_science', NULL, NULL, NULL, NULL, NULL, '3'),
(29, 30, 'supervisor', '1', 'computer_science', NULL, NULL, NULL, NULL, NULL, '3'),
(30, 31, 'supervisor', '1', 'computer_science', NULL, NULL, NULL, NULL, NULL, '3'),
(31, 32, 'supervisor', '1', 'computer_science', NULL, NULL, NULL, NULL, NULL, '3'),
(32, 33, 'supervisor', '1', 'computer_science', NULL, NULL, NULL, NULL, NULL, '3'),
(33, 34, 'supervisor', '1', 'computer_science', NULL, NULL, NULL, NULL, NULL, '3'),
(34, 35, 'supervisor', '1', 'computer_science', NULL, NULL, NULL, NULL, NULL, '3'),
(35, 36, 'supervisor', '1', 'computer_science', NULL, NULL, NULL, NULL, NULL, '3'),
(36, 37, 'supervisor', '1', 'computer_science', NULL, NULL, NULL, NULL, NULL, '3'),
(37, 38, 'supervisor', '1', 'computer_science', NULL, NULL, NULL, NULL, NULL, '3'),
(38, 39, 'supervisor', '1', 'computer_science', NULL, NULL, NULL, NULL, NULL, '3');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `matric_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `programmes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supervisor_id` bigint(20) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `matric_number`, `programmes`, `supervisor_id`, `status`, `semester`, `created_at`, `updated_at`) VALUES
(1, 40, '1', 'multimedia', 8, 'pending', '32234', NULL, NULL),
(2, 41, '2', 'multimedia', 7, 'pending', NULL, NULL, NULL),
(3, 42, '3', 'multimedia', NULL, NULL, NULL, NULL, NULL),
(4, 43, '4', 'multimedia', NULL, NULL, NULL, NULL, NULL),
(5, 45, '6', 'information_system', NULL, NULL, NULL, NULL, NULL),
(6, 46, '7', 'information_system', NULL, NULL, NULL, NULL, NULL),
(7, 47, '8', 'information_system', NULL, NULL, NULL, NULL, NULL),
(8, 48, '9', 'information_system', NULL, NULL, NULL, NULL, NULL),
(9, 49, '10', 'information_system', NULL, NULL, NULL, NULL, NULL),
(10, 50, '11', 'information_system', NULL, NULL, NULL, NULL, NULL),
(11, 51, '12', 'information_system', NULL, NULL, NULL, NULL, NULL),
(12, 52, '13', 'information_system', NULL, NULL, NULL, NULL, NULL),
(13, 53, '14', 'information_system', NULL, NULL, NULL, NULL, NULL),
(14, 54, '15', 'information_system', NULL, NULL, NULL, NULL, NULL),
(15, 55, '16', 'information_system', NULL, NULL, NULL, NULL, NULL),
(16, 56, '17', 'information_system', NULL, NULL, NULL, NULL, NULL),
(17, 57, '18', 'information_system', NULL, NULL, NULL, NULL, NULL),
(18, 58, '19', 'information_system', NULL, NULL, NULL, NULL, NULL),
(19, 60, '21', 'computer_science', NULL, NULL, NULL, NULL, NULL),
(20, 61, '22', 'computer_science', NULL, NULL, NULL, NULL, NULL),
(21, 62, '23', 'computer_science', 26, 'pending', NULL, NULL, NULL),
(22, 63, '24', 'computer_science', NULL, NULL, NULL, NULL, NULL),
(23, 64, '25', 'computer_science', 26, 'approved', NULL, NULL, NULL),
(24, 65, '26', 'computer_science', NULL, NULL, NULL, NULL, NULL),
(25, 66, '27', 'computer_science', NULL, NULL, NULL, NULL, NULL),
(26, 67, '28', 'computer_science', NULL, NULL, NULL, NULL, NULL),
(27, 68, '29', 'computer_science', NULL, NULL, NULL, NULL, NULL),
(28, 69, '30', 'computer_science', NULL, NULL, NULL, NULL, NULL),
(29, 70, '31', 'computer_science', NULL, NULL, NULL, NULL, NULL),
(30, 71, '32', 'computer_science', NULL, NULL, NULL, NULL, NULL),
(31, 74, '123', '12234', NULL, NULL, '123', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `handphone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `handphone`, `roles`, `password`, `image`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, 'admin', 'Abc123!', NULL, NULL, NULL),
(2, 'cluster', 'cluster@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(3, 'cluster2', 'cluster2@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(4, 'cluster3', 'cluster3@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(5, 'hod', 'hod@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(6, 'fypcoordinator', 'fypcoordinator@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(7, 'SUHAIMI MOHD NOOR', 'supervisor0@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(8, 'TS. MARLIZA ABDUL MALIK', 'supervisor1@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(9, 'TS. ROSNITA A.RAHMAN', 'supervisor2@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(10, 'AP. DR. SALYANI OSMAN', 'supervisor3@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(11, 'TS. SITI FATIMAH OMAR', 'supervisor4@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(12, 'DR. IRNY SUZILA ISHAK', 'supervisor5@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(13, 'SHIREEN MUHAMMAD', 'supervisor6@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(14, 'TS. NORHAWANI TERIDI', 'supervisor7@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(15, 'AZHAR HAMID', 'supervisor8@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(16, 'ZAHRUL AZWAN ABSL KAMARUL ADZHAR', 'supervisor9@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(17, 'RAHAYU HANDAN', 'supervisor10@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(18, 'AP. DR. HASLINDA SUTAN AHMAD NAWI', 'supervisor11@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(19, 'AP. DR. NUR SYUFIZA AHMAD SHUKOR', 'supervisor12@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(20, 'AP. DR WAN AZLAN WAN HASSAN @ WAN HARUN', 'supervisor13@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(21, 'TS. NIK NORDIANA N AB RAHMAN', 'supervisor14@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(22, 'TS. ZURAIDY ADNAN', 'supervisor15@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(23, 'DR. AZLINDA ABDUL AZIZ', 'supervisor16@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(24, 'TS. ABDULLAH RAMLI', 'supervisor17@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(25, 'MOHD NOOR RIZAL ARBAIN', 'supervisor18@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(26, 'FAUDZI AHMAD', 'supervisor19@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(27, 'MUHAMMAD HASHIM', 'supervisor20@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(28, 'TS. ROHAYA ABU HASSAN', 'supervisor21@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(29, 'TS. ROZIYANI SETIK', 'supervisor22@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(30, 'TS. IZWAN SUHADAK ISHAK', 'supervisor23@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(31, 'TS. RASIDAH MOHD SARDI', 'supervisor24@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(32, 'TS. AZALIZA ZAINAL', 'supervisor25@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(33, 'DR. KAMSIAH MOHAMED', 'supervisor26@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(34, 'TS. MARINA HASSAN', 'supervisor27@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(35, 'TS. NUR RAZIA MOHD SURADI', 'supervisor28@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(36, 'TS. MOHD FAIRUZ ABDUL RAUF', 'supervisor29@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(37, 'TS. KHAIRUL ANUAR ABDULLAH', 'supervisor30@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(38, 'DR. NUR AMLYA ABDUL MAJID', 'supervisor31@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(39, 'AP.  DR. SETYAWAN WIDYARTO', 'supervisor32@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(40, 'student1', 'student1@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(41, 'student2', 'student2@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(42, 'student3', 'student3@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(43, 'student4', 'student4@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(44, 'student5', 'student5@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(45, 'student6', 'student6@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(46, 'student7', 'student7@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(47, 'student8', 'student8@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(48, 'student9', 'student9@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(49, 'student10', 'student10@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(50, 'student11', 'student11@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(51, 'student12', 'student12@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(52, 'student13', 'student13@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(53, 'student14', 'student14@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(54, 'student15', 'student15@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(55, 'student16', 'student16@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(56, 'student17', 'student17@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(57, 'student18', 'student18@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(58, 'student19', 'student19@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(59, 'student20', 'student20@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(60, 'student21', 'student21@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(61, 'student22', 'student22@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(62, 'student23', 'student23@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(63, 'student24', 'student24@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(64, 'student25', 'student25@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(65, 'student26', 'student26@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(66, 'student27', 'student27@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(67, 'student28', 'student28@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(68, 'student29', 'student29@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(69, 'student30', 'student30@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(70, 'student31', 'student31@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(71, 'student32', 'student32@gmail.com', '123', 'student', 'Abc123!', NULL, NULL, NULL),
(72, 'TES1', 'TES1', 'test@gmail.com', 'student', 'Abc123!', NULL, NULL, NULL),
(73, 'TES1', 'TES1', 'test@gmail.com', 'student', 'Abc123!', NULL, NULL, NULL),
(74, 'TES1', 'TES1', 'test@gmail.com', 'student', 'Abc123!', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cluster_supervisor`
--
ALTER TABLE `cluster_supervisor`
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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
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
-- Indexes for table `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cluster_supervisor`
--
ALTER TABLE `cluster_supervisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
