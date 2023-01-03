-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2023 at 01:43 PM
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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
(31, '9', 'Student aabb has created fyp proposals, please review the proposals!', 'read', NULL, NULL),
(32, '10', 'Student aabb has created fyp proposals, please review the proposals!', 'read', NULL, NULL),
(33, '11', 'Student aabb has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(34, '17', 'Student aabb has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(35, '18', 'Student aabb has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(36, '19', 'Student aabb has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(37, '9', 'Student aabb has created fyp proposals, please review the proposals!', 'read', NULL, NULL),
(38, '10', 'Student aabb has created fyp proposals, please review the proposals!', 'read', NULL, NULL),
(39, '11', 'Student aabb has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(40, '17', 'Student aabb has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(41, '18', 'Student aabb has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(42, '19', 'Student aabb has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(43, '14', 'supervisor1 approved proposal test proposal test', 'new', '2022-12-24 17:38:42', NULL),
(44, '9', 'Student sdsd has created fyp proposals, please review the proposals!', 'read', NULL, NULL),
(45, '10', 'Student sdsd has created fyp proposals, please review the proposals!', 'read', NULL, NULL),
(46, '11', 'Student sdsd has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(47, '17', 'Student sdsd has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(48, '18', 'Student sdsd has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(49, '19', 'Student sdsd has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(50, '7', 'supervisor1 approved proposal fghfgh', 'read', '2022-12-24 20:02:30', NULL),
(51, '20', 'fypcoordinator approved supervisor1 as your supervisor', 'new', '2022-12-24 20:04:50', NULL),
(52, '20', 'fypcoordinator approved supervisor1 as your supervisor', 'new', '2022-12-24 20:18:26', NULL),
(53, '14', 'fypcoordinator approved supervisor1 as your supervisor', 'new', '2022-12-24 20:18:27', NULL),
(54, '7', 'fypcoordinator approved supervisor2 as your supervisor', 'read', '2022-12-24 20:18:27', NULL),
(55, '9', 'Student sdsd has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(56, '10', 'Student sdsd has created fyp proposals, please review the proposals!', 'read', NULL, NULL),
(57, '11', 'Student sdsd has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(58, '17', 'Student sdsd has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(59, '18', 'Student sdsd has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(60, '19', 'Student sdsd has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(61, '9', 'Student sdsd has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(62, '10', 'Student sdsd has created fyp proposals, please review the proposals!', 'read', NULL, NULL),
(63, '11', 'Student sdsd has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(64, '17', 'Student sdsd has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(65, '9', 'Student sdsd has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(66, '10', 'Student sdsd has created fyp proposals, please review the proposals!', 'read', NULL, NULL),
(67, '11', 'Student sdsd has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(68, '17', 'Student sdsd has created fyp proposals, please review the proposals!', 'new', NULL, NULL),
(69, '7', 'supervisor1 approved proposal asdasda', 'new', '2023-01-01 23:06:17', NULL),
(70, '7', 'supervisor1 approved proposal asdasda', 'new', '2023-01-01 23:12:53', NULL),
(71, '7', 'supervisor1 approved proposal asdasda', 'new', '2023-01-01 23:12:55', NULL),
(72, '7', 'supervisor1 approved proposal asdasda', 'new', '2023-01-01 23:15:38', NULL),
(73, '7', 'supervisor1 approved proposal asdasda', 'new', '2023-01-01 23:15:47', NULL),
(74, '7', 'supervisor1 approved proposal asdasda', 'new', '2023-01-01 23:16:17', NULL),
(75, '7', 'asd approved proposal asdasda', 'new', '2023-01-01 23:19:59', NULL),
(76, '14', 'fypcoordinator approved proposal test proposal test', 'new', '2023-01-01 23:27:32', NULL),
(77, '25', 'fypcoordinator  supervisor1 as your supervisor', 'new', '2023-01-02 04:50:11', NULL),
(78, '26', 'fypcoordinator approved supervisor2 as your supervisor', 'new', '2023-01-02 04:50:12', NULL),
(79, '14', 'fypcoordinator approved proposal test proposal test', 'new', '2023-01-02 04:51:21', NULL),
(80, '14', 'asdasd approved proposal test proposal test', 'new', '2023-01-02 04:52:26', NULL);

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
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `supervisor_id` bigint(20) DEFAULT NULL,
  `fyp_coordinator_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proposals`
--

INSERT INTO `proposals` (`id`, `title`, `start_date`, `end_date`, `status`, `user_id`, `supervisor_id`, `fyp_coordinator_status`, `attachment`, `attachment_name`, `created_at`, `updated_at`) VALUES
(20, 'test proposal test', '2022-12-25 00:00:00', '2022-12-31 00:00:00', 'approved', 14, NULL, 'approved', '1671928696.png', 'Clow Steak.png', NULL, NULL),
(24, 'asdasda', '2023-01-05 00:00:00', '2023-01-13 00:00:00', 'approved', 7, NULL, 'approved', '1672631696.png', 'Copy of Gold Green Watercolor Thank you Card.png', NULL, NULL);

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
(3, 10, 'supervisor', '1', 'multimedia', 'allocated', 'allocated', NULL, NULL, NULL, '50'),
(4, 11, 'supervisor', '1', 'multimedia', 'allocated', 'allocated', NULL, NULL, NULL, '50'),
(5, 12, 'cluster', '1', 'multimedia', NULL, 'lead_cluster', NULL, NULL, NULL, NULL),
(8, 17, 'supervisor', '12', 'multimedia', 'allocated', NULL, NULL, NULL, NULL, '50'),
(13, 29, 'fyp_coordinator', 'asd@gmail.com', 'multimedia', NULL, NULL, NULL, NULL, NULL, NULL),
(32, 46, 'hod', 'hod2@gmail.com', 'multimedia', NULL, 'cluster', NULL, NULL, NULL, NULL),
(34, 51, 'fyp_coordinator', '11', 'multimedia', NULL, NULL, NULL, NULL, NULL, NULL),
(35, 52, 'fyp_coordinator', 'asd@gmail.com', 'multimedia', NULL, NULL, NULL, NULL, NULL, NULL),
(37, 54, 'cluster', 'asd@gmail.com', 'multimedia', NULL, 'cluster', NULL, NULL, NULL, NULL),
(38, 55, 'supervisor', 'asd@gmail.com', 'multimedia', NULL, NULL, NULL, NULL, NULL, '54');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `matric_number`, `programmes`, `supervisor_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, '1', 'multimedia', 10, 'approve', NULL, NULL),
(3, 14, '11', 'multimedia', 10, 'approved', NULL, NULL),
(6, 25, 'asdas', 'multimedia', 10, '', NULL, NULL),
(7, 26, 'asdasdasdad', 'multimedia', 11, 'approved', NULL, NULL),
(8, 25, 'fdgdgdfg', 'multimedia', 55, 'pending', NULL, NULL);

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
(7, 'sdsd', 'student@gmail.com', '1', 'student', 'Abc123!', '1671175318.jpeg', NULL, NULL),
(10, 'supervisor1', 'supervisor1@gmail.com', '1', 'staff', 'Abc123!', NULL, NULL, NULL),
(11, 'supervisor2', 'supervisor@gmail.com', '1', 'staff', 'Abc123!', NULL, NULL, NULL),
(12, 'cluster', 'leadcluster@gmail.com', '1', 'staff', 'Abc123!', NULL, NULL, NULL),
(14, 'aabb', 'student1@gmail.com', '11', 'student', 'Abc123!', '1671280270.jpeg', NULL, NULL),
(17, 'asdasd', 'supervisor17@gmail.com', '', 'staff', 'Abc123!', '1672652786.png', NULL, NULL),
(25, 'asdsad', 'asd@gmail.com', '12313', 'student', 'Abc123!', NULL, NULL, NULL),
(26, 'asdsad', 'asd@gmail.coma', '11', 'student', 'Abc123!', NULL, NULL, NULL),
(38, 'Ahmad Syaafi Hanafiah', 'assyaafi96@gmail.com', '11', 'staff', 'Abc123!', NULL, NULL, NULL),
(40, 'Ahmad Syaafi Hanafiah', 'asdgfsg@asda.com', '1', '', 'Abc123!', NULL, NULL, NULL),
(41, 'Ahmad Syaafi Hanafiah', 'asdgfsg@asda.com', '1', 'staff', 'Abc123!', NULL, NULL, NULL),
(42, 'Ahmad Syaafi Hanafiah', 'asdgfsg@asda.com', '1', 'staff', 'Abc123!', NULL, NULL, NULL),
(44, 'admin', 'admin@gmail.com', '1', 'admin', 'Abc123!', '1672563271.jpeg', NULL, NULL),
(46, 'hod22', 'hod2@gmail.com', '1', 'staff', 'Abc123!', '1672563409.jpeg', NULL, NULL),
(47, '', 'admin3@gmail.com', '1', '', 'Abc123!', NULL, NULL, NULL),
(48, '', 'admin2@gmail.com', '1', '', 'Abc123!', NULL, NULL, NULL),
(49, '', 'ggmail@gmail.com', '1', '', 'Abc123!', NULL, NULL, NULL),
(51, 'fypcoordinator', 'fypcoordinator@gmail.com', '11', 'staff', 'Abc123!', NULL, NULL, NULL),
(52, 'asdad', 'fypcoordinator2@gmail.com', '11', 'staff', 'Abc123!', NULL, NULL, NULL),
(54, 'cluster2@gmail.com', 'cluster2@gmail.com', '11', 'staff', 'Abc123!', NULL, NULL, NULL),
(55, 'asdasd', 'asda@gmail.com', '11112', 'staff', 'Abc123!', NULL, NULL, NULL);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
