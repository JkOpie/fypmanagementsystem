-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2023 at 02:00 PM
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
(1, 2, 'cluster', '1', 'multimedia', NULL, 'lead_cluster', NULL, NULL, NULL, NULL),
(2, 3, 'hod', '1', 'multimedia', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 4, 'fyp_coordinator', '1', 'multimedia', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 5, 'supervisor', '1', 'multimedia', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 6, 'supervisor', '1', 'multimedia', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 7, 'supervisor', '1', 'multimedia', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 8, 'supervisor', '1', 'multimedia', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 9, 'supervisor', '1', 'information_system', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 10, 'supervisor', '1', 'information_system', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 11, 'supervisor', '1', 'information_system', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 12, 'supervisor', '1', 'information_system', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 13, 'supervisor', '1', 'information_system', NULL, NULL, NULL, NULL, NULL, NULL),
(13, 14, 'supervisor', '1', 'information_system', NULL, NULL, NULL, NULL, NULL, NULL),
(14, 15, 'supervisor', '1', 'information_system', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 16, 'supervisor', '1', 'information_system', NULL, NULL, NULL, NULL, NULL, NULL),
(16, 17, 'supervisor', '1', 'information_system', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 18, 'supervisor', '1', 'information_system', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 19, 'supervisor', '1', 'information_system', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 20, 'supervisor', '1', 'information_system', NULL, NULL, NULL, NULL, NULL, NULL),
(20, 21, 'supervisor', '1', 'information_system', NULL, NULL, NULL, NULL, NULL, NULL),
(21, 22, 'supervisor', '1', 'information_system', NULL, NULL, NULL, NULL, NULL, NULL),
(22, 23, 'supervisor', '1', 'information_system', NULL, NULL, NULL, NULL, NULL, NULL),
(23, 24, 'supervisor', '1', 'computer_science', NULL, NULL, NULL, NULL, NULL, NULL),
(24, 25, 'supervisor', '1', 'computer_science', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 26, 'supervisor', '1', 'computer_science', NULL, NULL, NULL, NULL, NULL, NULL),
(26, 27, 'supervisor', '1', 'computer_science', NULL, NULL, NULL, NULL, NULL, NULL),
(27, 28, 'supervisor', '1', 'computer_science', NULL, NULL, NULL, NULL, NULL, NULL),
(28, 29, 'supervisor', '1', 'computer_science', NULL, NULL, NULL, NULL, NULL, NULL),
(29, 30, 'supervisor', '1', 'computer_science', NULL, NULL, NULL, NULL, NULL, NULL),
(30, 31, 'supervisor', '1', 'computer_science', NULL, NULL, NULL, NULL, NULL, NULL),
(31, 32, 'supervisor', '1', 'computer_science', NULL, NULL, NULL, NULL, NULL, NULL),
(32, 33, 'supervisor', '1', 'computer_science', NULL, NULL, NULL, NULL, NULL, NULL),
(33, 34, 'supervisor', '1', 'computer_science', NULL, NULL, NULL, NULL, NULL, NULL),
(34, 35, 'supervisor', '1', 'computer_science', NULL, NULL, NULL, NULL, NULL, NULL),
(35, 36, 'supervisor', '1', 'computer_science', NULL, NULL, NULL, NULL, NULL, NULL),
(36, 37, 'supervisor', '1', 'computer_science', NULL, NULL, NULL, NULL, NULL, NULL);

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
(1, 38, '1', 'multimedia', NULL, NULL, NULL, NULL),
(2, 39, '2', 'multimedia', NULL, NULL, NULL, NULL),
(3, 40, '3', 'multimedia', NULL, NULL, NULL, NULL),
(4, 41, '4', 'multimedia', NULL, NULL, NULL, NULL),
(5, 43, '6', 'information_system', NULL, NULL, NULL, NULL),
(6, 44, '7', 'information_system', NULL, NULL, NULL, NULL),
(7, 45, '8', 'information_system', NULL, NULL, NULL, NULL),
(8, 46, '9', 'information_system', NULL, NULL, NULL, NULL),
(9, 47, '10', 'information_system', NULL, NULL, NULL, NULL),
(10, 48, '11', 'information_system', NULL, NULL, NULL, NULL),
(11, 49, '12', 'information_system', NULL, NULL, NULL, NULL),
(12, 50, '13', 'information_system', NULL, NULL, NULL, NULL),
(13, 51, '14', 'information_system', NULL, NULL, NULL, NULL),
(14, 52, '15', 'information_system', NULL, NULL, NULL, NULL),
(15, 53, '16', 'information_system', NULL, NULL, NULL, NULL),
(16, 54, '17', 'information_system', NULL, NULL, NULL, NULL),
(17, 55, '18', 'information_system', NULL, NULL, NULL, NULL),
(18, 56, '19', 'information_system', NULL, NULL, NULL, NULL),
(19, 58, '21', 'computer_science', NULL, NULL, NULL, NULL),
(20, 59, '22', 'computer_science', NULL, NULL, NULL, NULL),
(21, 60, '23', 'computer_science', NULL, NULL, NULL, NULL),
(22, 61, '24', 'computer_science', NULL, NULL, NULL, NULL),
(23, 62, '25', 'computer_science', NULL, NULL, NULL, NULL),
(24, 63, '26', 'computer_science', NULL, NULL, NULL, NULL),
(25, 64, '27', 'computer_science', NULL, NULL, NULL, NULL),
(26, 65, '28', 'computer_science', NULL, NULL, NULL, NULL),
(27, 66, '29', 'computer_science', NULL, NULL, NULL, NULL),
(28, 67, '30', 'computer_science', NULL, NULL, NULL, NULL),
(29, 68, '31', 'computer_science', NULL, NULL, NULL, NULL),
(30, 69, '32', 'computer_science', NULL, NULL, NULL, NULL);

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
(3, 'hod', 'hod@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(4, 'fypcoordinator', 'fypcoordinator@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(5, 'SUHAIMI MOHD NOOR', 'supervisor0@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(6, 'TS. MARLIZA ABDUL MALIK', 'supervisor1@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(7, 'TS. ROSNITA A.RAHMAN', 'supervisor2@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(8, 'AP. DR. SALYANI OSMAN', 'supervisor3@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(9, 'TS. SITI FATIMAH OMAR', 'supervisor4@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(10, 'DR. IRNY SUZILA ISHAK', 'supervisor5@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(11, 'SHIREEN MUHAMMAD', 'supervisor6@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(12, 'TS. NORHAWANI TERIDI', 'supervisor7@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(13, 'AZHAR HAMID', 'supervisor8@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(14, 'ZAHRUL AZWAN ABSL KAMARUL ADZHAR', 'supervisor9@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(15, 'RAHAYU HANDAN', 'supervisor10@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(16, 'AP. DR. HASLINDA SUTAN AHMAD NAWI', 'supervisor11@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(17, 'AP. DR. NUR SYUFIZA AHMAD SHUKOR', 'supervisor12@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(18, 'AP. DR WAN AZLAN WAN HASSAN @ WAN HARUN', 'supervisor13@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(19, 'TS. NIK NORDIANA N AB RAHMAN', 'supervisor14@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(20, 'TS. ZURAIDY ADNAN', 'supervisor15@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(21, 'DR. AZLINDA ABDUL AZIZ', 'supervisor16@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(22, 'TS. ABDULLAH RAMLI', 'supervisor17@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(23, 'MOHD NOOR RIZAL ARBAIN', 'supervisor18@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(24, 'FAUDZI AHMAD', 'supervisor19@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(25, 'MUHAMMAD HASHIM', 'supervisor20@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(26, 'TS. ROHAYA ABU HASSAN', 'supervisor21@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(27, 'TS. ROZIYANI SETIK', 'supervisor22@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(28, 'TS. IZWAN SUHADAK ISHAK', 'supervisor23@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(29, 'TS. RASIDAH MOHD SARDI', 'supervisor24@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(30, 'TS. AZALIZA ZAINAL', 'supervisor25@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(31, 'DR. KAMSIAH MOHAMED', 'supervisor26@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(32, 'TS. MARINA HASSAN', 'supervisor27@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(33, 'TS. NUR RAZIA MOHD SURADI', 'supervisor28@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(34, 'TS. MOHD FAIRUZ ABDUL RAUF', 'supervisor29@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(35, 'TS. KHAIRUL ANUAR ABDULLAH', 'supervisor30@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(36, 'DR. NUR AMLYA ABDUL MAJID', 'supervisor31@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(37, 'AP.  DR. SETYAWAN WIDYARTO', 'supervisor32@gmail.com', '123', 'staff', 'Abc123!', NULL, NULL, NULL),
(38, 'AP.  DR. SETYAWAN WIDYARTO', 'student1@gmail.com', '123', 'student1', 'Abc123!', NULL, NULL, NULL),
(39, 'AP.  DR. SETYAWAN WIDYARTO', 'student2@gmail.com', '123', 'student2', 'Abc123!', NULL, NULL, NULL),
(40, 'AP.  DR. SETYAWAN WIDYARTO', 'student3@gmail.com', '123', 'student3', 'Abc123!', NULL, NULL, NULL),
(41, 'AP.  DR. SETYAWAN WIDYARTO', 'student4@gmail.com', '123', 'student4', 'Abc123!', NULL, NULL, NULL),
(42, 'AP.  DR. SETYAWAN WIDYARTO', 'student5@gmail.com', '123', 'student5', 'Abc123!', NULL, NULL, NULL),
(43, 'AP.  DR. SETYAWAN WIDYARTO', 'student6@gmail.com', '123', 'student6', 'Abc123!', NULL, NULL, NULL),
(44, 'AP.  DR. SETYAWAN WIDYARTO', 'student7@gmail.com', '123', 'student7', 'Abc123!', NULL, NULL, NULL),
(45, 'AP.  DR. SETYAWAN WIDYARTO', 'student8@gmail.com', '123', 'student8', 'Abc123!', NULL, NULL, NULL),
(46, 'AP.  DR. SETYAWAN WIDYARTO', 'student9@gmail.com', '123', 'student9', 'Abc123!', NULL, NULL, NULL),
(47, 'AP.  DR. SETYAWAN WIDYARTO', 'student10@gmail.com', '123', 'student10', 'Abc123!', NULL, NULL, NULL),
(48, 'AP.  DR. SETYAWAN WIDYARTO', 'student11@gmail.com', '123', 'student11', 'Abc123!', NULL, NULL, NULL),
(49, 'AP.  DR. SETYAWAN WIDYARTO', 'student12@gmail.com', '123', 'student12', 'Abc123!', NULL, NULL, NULL),
(50, 'AP.  DR. SETYAWAN WIDYARTO', 'student13@gmail.com', '123', 'student13', 'Abc123!', NULL, NULL, NULL),
(51, 'AP.  DR. SETYAWAN WIDYARTO', 'student14@gmail.com', '123', 'student14', 'Abc123!', NULL, NULL, NULL),
(52, 'AP.  DR. SETYAWAN WIDYARTO', 'student15@gmail.com', '123', 'student15', 'Abc123!', NULL, NULL, NULL),
(53, 'AP.  DR. SETYAWAN WIDYARTO', 'student16@gmail.com', '123', 'student16', 'Abc123!', NULL, NULL, NULL),
(54, 'AP.  DR. SETYAWAN WIDYARTO', 'student17@gmail.com', '123', 'student17', 'Abc123!', NULL, NULL, NULL),
(55, 'AP.  DR. SETYAWAN WIDYARTO', 'student18@gmail.com', '123', 'student18', 'Abc123!', NULL, NULL, NULL),
(56, 'AP.  DR. SETYAWAN WIDYARTO', 'student19@gmail.com', '123', 'student19', 'Abc123!', NULL, NULL, NULL),
(57, 'AP.  DR. SETYAWAN WIDYARTO', 'student20@gmail.com', '123', 'student20', 'Abc123!', NULL, NULL, NULL),
(58, 'AP.  DR. SETYAWAN WIDYARTO', 'student21@gmail.com', '123', 'student21', 'Abc123!', NULL, NULL, NULL),
(59, 'AP.  DR. SETYAWAN WIDYARTO', 'student22@gmail.com', '123', 'student22', 'Abc123!', NULL, NULL, NULL),
(60, 'AP.  DR. SETYAWAN WIDYARTO', 'student23@gmail.com', '123', 'student23', 'Abc123!', NULL, NULL, NULL),
(61, 'AP.  DR. SETYAWAN WIDYARTO', 'student24@gmail.com', '123', 'student24', 'Abc123!', NULL, NULL, NULL),
(62, 'AP.  DR. SETYAWAN WIDYARTO', 'student25@gmail.com', '123', 'student25', 'Abc123!', NULL, NULL, NULL),
(63, 'AP.  DR. SETYAWAN WIDYARTO', 'student26@gmail.com', '123', 'student26', 'Abc123!', NULL, NULL, NULL),
(64, 'AP.  DR. SETYAWAN WIDYARTO', 'student27@gmail.com', '123', 'student27', 'Abc123!', NULL, NULL, NULL),
(65, 'AP.  DR. SETYAWAN WIDYARTO', 'student28@gmail.com', '123', 'student28', 'Abc123!', NULL, NULL, NULL),
(66, 'AP.  DR. SETYAWAN WIDYARTO', 'student29@gmail.com', '123', 'student29', 'Abc123!', NULL, NULL, NULL),
(67, 'AP.  DR. SETYAWAN WIDYARTO', 'student30@gmail.com', '123', 'student30', 'Abc123!', NULL, NULL, NULL),
(68, 'AP.  DR. SETYAWAN WIDYARTO', 'student31@gmail.com', '123', 'student31', 'Abc123!', NULL, NULL, NULL),
(69, 'AP.  DR. SETYAWAN WIDYARTO', 'student32@gmail.com', '123', 'student32', 'Abc123!', NULL, NULL, NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
