-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2023 at 05:35 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `activityID` bigint(20) UNSIGNED NOT NULL,
  `activityName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activityDescription` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activityStatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `startTime` time DEFAULT NULL,
  `endTime` time DEFAULT NULL,
  `activityVenue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grantAmount` double(8,2) NOT NULL,
  `proposalUrl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posterUrl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`activityID`, `activityName`, `activityDescription`, `activityStatus`, `startDate`, `endDate`, `startTime`, `endTime`, `activityVenue`, `grantAmount`, `proposalUrl`, `posterUrl`) VALUES
(1, 'Student Development Programmes (SDP): Series 1 - Introduction to IoT', 'Dear students,\n\nWe would like to welcome all UMP’s student to join “Student Development Programmes (SDP): UPSKILLING WORKSHOPS FROM STUDENT TO STUDENTS.” \n\nSeries #1- Introduction to Internet of Things\nRegistration link - https://forms.gle/rt7wJ9V6bNbADRy28\n\nWe are looking forward to your participation', 'Up-Coming', '2023-10-09', '2023-10-09', '08:45:00', '17:00:00', 'Microsoft Team (Online)', 100.00, 'Student Development Programmes (SDP)', '1673274672.jpg'),
(2, 'Student Development Programmes (SDP): Series 2 - Web Development Using Laravel', 'Dear students,\n\nWe would like to welcome all UMP’s student to join “Student Development Programmes (SDP): UPSKILLING WORKSHOPS FROM STUDENT TO STUDENTS.” \n\nSeries #2- Web Development Using Laravel Framework for beginners\nRegistration link - https://forms.gle/rt7wJ9V6bNbADRy28\n\nWe are looking forward to your participation', 'Up-Coming', '2023-10-22', '2023-10-23', '08:45:00', '17:00:00', 'Cloud Computing Lab', 200.00, 'Student Development Programmes (SDP)', '1673274913.jpg'),
(3, 'Student Development Programmes (SDP): Series 3 - Web Development Using Laravel for Intermediate', 'Dear students,\n\nWe would like to welcome all UMP’s student to join “Student Development Programmes (SDP): UPSKILLING WORKSHOPS FROM STUDENT TO STUDENTS.” \n\nSeries #3- Web Development using Laravel Framework for Intermediates\nRegistration link - https://forms.gle/rt7wJ9V6bNbADRy28\n\nWe are looking forward to your participation', 'Up-Coming', '2023-10-29', '2023-10-30', '08:45:00', '17:00:00', 'Cloud Computing Lab', 1000.00, 'Student Development Programmes (SDP)', '1673274998.jpg'),
(4, 'Student Development Programmes (SDP): Series 4 - Mobile Application and Development', 'Dear students,\n\nWe would like to welcome all UMP’s student to join “Student Development Programmes (SDP): UPSKILLING WORKSHOPS FROM STUDENT TO STUDENTS.” \n\nSeries #4- Mobile Application Development\nRegistration link - https://forms.gle/rt7wJ9V6bNbADRy28\n\nWe are looking forward to your participation', 'Up-Coming', '2023-11-05', '2023-11-06', '08:45:00', '17:00:00', 'Cloud Computing Lab', 1000.00, 'Student Development Programmes (SDP)', '1673275096.jpg'),
(5, 'Student Development Programmes (SDP): Series 5 - API Development', 'Dear students,\n\nWe would like to welcome all UMP’s student to join “Student Development Programmes (SDP): UPSKILLING WORKSHOPS FROM STUDENT TO STUDENTS.” \n\nSeries #5- API Development\nRegistration link - https://forms.gle/rt7wJ9V6bNbADRy28\n\nWe are looking forward to your participation', 'Up-Coming', '2023-11-12', '2023-11-13', '08:45:00', '17:00:00', 'Cloud Computing Lab', 1000.00, 'Student Development Programmes (SDP)', '1673275159.jpg'),
(6, 'Student Development Programmes (SDP): Series 6 - Visual Design Using Adobe Illustrator', 'Dear students,\n\nWe would like to welcome all UMP’s student to join “Student Development Programmes (SDP): UPSKILLING WORKSHOPS FROM STUDENT TO STUDENTS.” \n\nSeries #6- Visual Design using Adobe Illustrator (Road to ACP Malaysia 2023)\nRegistration link - https://forms.gle/rt7wJ9V6bNbADRy28\n\nWe are looking forward to your participation', 'Up-Coming', '2023-11-19', '2023-11-20', '08:45:00', '17:00:00', 'Cloud Computing Lab', 1000.00, 'Student Development Programmes (SDP)', '1673275234.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bulletins`
--

CREATE TABLE `bulletins` (
  `bulletinID` bigint(20) UNSIGNED NOT NULL,
  `bulletinTitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bulletinDescription` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bulletinDate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `calendarYear` int(11) NOT NULL,
  `activityID` int(11) NOT NULL,
  `calendarDate` date NOT NULL,
  `activityDetInfo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `activityUrl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `elections`
--

CREATE TABLE `elections` (
  `electionID` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manifesto` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `filePath` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approveStatus` tinyint(1) DEFAULT NULL,
  `rejectReason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vote` int(11) DEFAULT NULL,
  `positionStatus` tinyint(1) DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(6, '2022_12_20_120927_add_vote_to_users_table', 2),
(7, '2014_09_31_030145_create_students_table', 3),
(8, '2023_01_06_150739_create_elections_table', 4),
(9, '2023_01_08_053200_create_calendar_table', 5),
(10, '2023_01_09_063346_create_proposal_table', 5),
(12, '2022_12_18_074251_create_activities_table', 6),
(13, '2023_01_12_064433_create_bulletins_table', 7);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE `proposals` (
  `proposalID` bigint(20) UNSIGNED NOT NULL,
  `proposalTitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `proposalDescription` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proposalUrl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneNumber` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentID` bigint(20) UNSIGNED NOT NULL,
  `studentName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stdaddress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `studentPhone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stdemail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stdyear` int(11) NOT NULL,
  `stdsupervisor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stdpsmtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `psmType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `industry_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unassigned'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Student',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vote_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `user_id`, `email_verified_at`, `password`, `option`, `remember_token`, `created_at`, `updated_at`, `vote_status`) VALUES
(1, 'lee', 'lee@email.com', 'cb19092', NULL, '$2y$10$k0hGhfeftkNhF6.9vf4tDulJ1g2CC0VDQKVxn6BpzWbpLz14zL8QS', 'coordinator', 'SwZiuNzwWsHMWF6M6NT9wayAvjG5TPpSX2oaD56ILWnBIVBE7FpPNDUN1oaG', '2022-12-19 05:42:03', '2022-12-19 21:40:05', 0),
(2, 'lim', 'lim@email.com', 'cb19019', NULL, '$2y$10$xx8eQNDuDJo1pwsANhFN7.DoVP/.B7EmrcuiiClbAacRxKz1hJFq6', 'HOD', NULL, '2022-12-19 07:24:20', '2022-12-19 21:59:45', 0),
(3, 'alex', 'alex@example.com', 'cb19059', NULL, '$2y$10$gp9NsvcMpg4msIc2N3IZUO7YP2A5Wkx0Nlfjj1Z8kHeS7e7IdC4Fu', 'commitee', NULL, '2022-12-19 07:52:43', '2022-12-19 07:52:43', 0),
(4, 'toh', 'toh@example.com', 'cb19201', NULL, '$2y$10$00KQOXEtm2TlIz1HMQkLoe3ThBIxvTATpGolJV1GgA9sNEYW9XKna', 'lecturer', NULL, '2022-12-19 07:55:31', '2022-12-19 07:55:31', 0),
(5, 'din', 'din@example.com', 'cd19205', NULL, '$2y$10$34Sk6.VCTrmhDh1H3Pqr4egVDeyCKBbxLaR0IxAZ4FykLztM7K2um', 'dean', NULL, '2022-12-19 07:56:35', '2022-12-19 21:59:55', 0),
(6, 'sue', 'sue@email.com', 'cd19014', NULL, '$2y$10$34Sk6.VCTrmhDh1H3Pqr4egVDeyCKBbxLaR0IxAZ4FykLztM7K2um', 'student', NULL, NULL, '2022-12-19 22:03:52', 0),
(7, 'Lye Eng', 'lyeeng99@gmail.com', '12398', NULL, '$2y$10$bh9RR6xWlWpc0BN.kLDsBuYzU/6GZIZMnMBM0t98q4ey9dVW7k2ym', 'student', NULL, '2023-01-03 05:08:18', '2023-01-03 05:08:18', 0),
(9, 'Lye Eng', 'lyeeng991@gmail.com', 'cb190921', NULL, '$2y$10$fHtF6KHPujsIPhdeMkPcfuCcKyGlOt8w8kziYfjqaDsc41Ase1dzm', 'student', NULL, '2023-01-15 22:30:47', '2023-01-15 22:30:47', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`activityID`);

--
-- Indexes for table `bulletins`
--
ALTER TABLE `bulletins`
  ADD PRIMARY KEY (`bulletinID`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elections`
--
ALTER TABLE `elections`
  ADD PRIMARY KEY (`electionID`);

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
-- Indexes for table `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`proposalID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_user_id_unique` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `activityID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bulletins`
--
ALTER TABLE `bulletins`
  MODIFY `bulletinID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `elections`
--
ALTER TABLE `elections`
  MODIFY `electionID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `proposalID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
