-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2024 at 11:30 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_01`
--

-- --------------------------------------------------------

--
-- Table structure for table `claims`
--

CREATE TABLE `claims` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `claim_date` date DEFAULT NULL,
  `claim_type` varchar(255) DEFAULT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hr1_applicant`
--

CREATE TABLE `hr1_applicant` (
  `applicant_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `civil_status` varchar(255) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `job_position` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hr1_applicant`
--

INSERT INTO `hr1_applicant` (`applicant_id`, `code`, `firstname`, `middlename`, `lastname`, `address`, `email`, `contact`, `civil_status`, `resume`, `image`, `age`, `gender`, `job_position`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CJWs17yw', 'gerson', 'letrodo', 'puzon', 'ako si', 'akosikupals@gmail.com', '09670234336', 'MARRIED', NULL, 'PeanutButterBananaIce.jpg', '20', 'FEMALE', NULL, NULL, '2024-11-05 23:56:20', '2024-11-05 23:58:41');

-- --------------------------------------------------------

--
-- Table structure for table `hr1_applicant_apply`
--

CREATE TABLE `hr1_applicant_apply` (
  `apply_id` bigint(20) UNSIGNED NOT NULL,
  `recruitment_id` varchar(255) DEFAULT NULL,
  `applicant_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hr1_applicant_apply`
--

INSERT INTO `hr1_applicant_apply` (`apply_id`, `recruitment_id`, `applicant_id`, `status`, `created_at`, `updated_at`) VALUES
(82, '1', 'CJWs17yw', 'Hired', '2024-11-06 17:37:00', '2024-11-06 18:16:19');

-- --------------------------------------------------------

--
-- Table structure for table `hr1_employee_info`
--

CREATE TABLE `hr1_employee_info` (
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `generate_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hr2_job_qualification`
--

CREATE TABLE `hr2_job_qualification` (
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `job_request_id` varchar(255) DEFAULT NULL,
  `description` varchar(9000) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hr2_job_qualification`
--

INSERT INTO `hr2_job_qualification` (`job_id`, `job_request_id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '<p>When you think about information technology roles, you may envision role-based technician positions, like software developer, coder, and website administrator. However, positions in the industry include much more. The list below shows that IT job titles are as varied as the types of jobs available in the industry.</p><p><i>*Note: The salary information below was sourced from Glassdoor in March 2024. Figures represent base salary and average annual additional pay. Additional pay may include commissions, bonuses, or profit-sharing.</i></p><h3>1. Applications engineer</h3><p>Average annual salary (US): $121,335</p><p>An applications engineer builds software architecture, optimizes existing systems, and supports clients using their programs.</p><h3>2. Computer programmer</h3><p>Average annual salary (US): $91,255</p><p>A <a href=\"https://www.coursera.org/articles/how-to-become-a-computer-programmer\">computer programmer</a> writes, tests, and modifies code used by computers to operate software and complete specific tasks.</p><h3>3. Computer scientist</h3><p>Average annual salary (US): $153,146</p><p>A computer scientist may take on various roles; they apply theory to develop computer systems, build databases, work with <a href=\"https://www.coursera.org/articles/what-programming-language-should-I-learn\">programming languages</a>, and more.</p>', 'pending', '2024-11-03 18:26:07', '2024-11-03 18:33:19'),
(2, '2', NULL, 'pending', '2024-11-03 18:26:35', '2024-11-03 18:26:35');

-- --------------------------------------------------------

--
-- Table structure for table `hr3_leave_management`
--

CREATE TABLE `hr3_leave_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `leave_type` varchar(255) DEFAULT NULL,
  `date_request` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hr3_shift_and_scheduling`
--

CREATE TABLE `hr3_shift_and_scheduling` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `shift_start` varchar(255) DEFAULT NULL,
  `shift_end` varchar(255) DEFAULT NULL,
  `shift_type` varchar(255) DEFAULT NULL,
  `shift_date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hr4_compensation`
--

CREATE TABLE `hr4_compensation` (
  `compensation_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `project_name` varchar(255) DEFAULT NULL,
  `compensation_type` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hr4_deduction`
--

CREATE TABLE `hr4_deduction` (
  `deduction_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `pagibig` varchar(255) DEFAULT NULL,
  `sss` varchar(255) DEFAULT NULL,
  `philhealth` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hr4_payroll`
--

CREATE TABLE `hr4_payroll` (
  `payroll_id` bigint(20) UNSIGNED NOT NULL,
  `attendance_id` varchar(255) DEFAULT NULL,
  `deduction_id` varchar(255) DEFAULT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hr4_recruitment`
--

CREATE TABLE `hr4_recruitment` (
  `recruitment_id` bigint(20) UNSIGNED NOT NULL,
  `jobrole` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hr4_recruitment`
--

INSERT INTO `hr4_recruitment` (`recruitment_id`, `jobrole`, `department`, `status`, `salary`, `time`, `Description`, `created_at`, `updated_at`) VALUES
(1, 'IT POSITION', 'Logistic Department', 'on-going', '1000', '9:00 am  to  7:00  pm', NULL, '2024-11-03 18:26:02', '2024-11-03 18:29:31'),
(2, 'HR', 'Logistic Department', 'on-going', '2000', '9:00 am  to  7:00  pm', NULL, '2024-11-03 18:26:32', '2024-11-03 18:29:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_10_05_144318_create_claims_table', 1),
(6, '2024_10_06_084303_hr3_leave_management', 1),
(7, '2024_10_08_092201_hr3_shift_and_scheduling', 1),
(8, '2024_10_13_021929_hr1_employee_info', 1),
(9, '2024_10_18_055403_create_hr1_applications_table', 1),
(10, '2024_10_19_072144_create_hr1_achievement_table', 1),
(11, '2024_10_19_075929_hr4_compensation', 1),
(12, '2024_10_21_114719_create_hr1_new_employees_table', 1),
(13, '2024_10_23_140607_hr4_deduction', 1),
(14, '2024_10_24_120435_hr4_payroll', 1),
(15, '2024_10_28_081730_hr1_applicant', 1),
(16, '2024_10_29_112809_hr2_job_qualification', 1),
(17, '2024_11_02_094848_hr4_recruitment', 1),
(18, '2024_11_03_110253_hr1_applicant_apply', 2),
(19, '2024_11_05_155229_hr1_applicant', 3);

-- --------------------------------------------------------

--
-- Table structure for table `new_employees`
--

CREATE TABLE `new_employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code_id` varchar(900) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `code_id`) VALUES
(1, 'Lucious Larson', 'agrant@example.org', '2024-11-03 17:50:09', '$2y$12$pQOKsEeytzoSGClREeTnE.AtoT.lVFd14f.m.Catc9SgPZpNvHL7O', NULL, 'IyyYCpjE3A', '2024-11-03 17:50:09', '2024-11-03 17:50:09', ''),
(2, 'Amelia Hagenes', 'kuphal.leatha@example.org', '2024-11-03 17:50:09', '$2y$12$pQOKsEeytzoSGClREeTnE.AtoT.lVFd14f.m.Catc9SgPZpNvHL7O', NULL, 'zwJ8MlQIvz', '2024-11-03 17:50:09', '2024-11-03 17:50:09', ''),
(3, 'Omari Schinner', 'alexis59@example.com', '2024-11-03 17:50:09', '$2y$12$pQOKsEeytzoSGClREeTnE.AtoT.lVFd14f.m.Catc9SgPZpNvHL7O', NULL, 'tFptsviyGb', '2024-11-03 17:50:09', '2024-11-03 17:50:09', ''),
(4, 'Art Lubowitz', 'kautzer.katharina@example.org', '2024-11-03 17:50:09', '$2y$12$pQOKsEeytzoSGClREeTnE.AtoT.lVFd14f.m.Catc9SgPZpNvHL7O', NULL, 'v0fFgm3mVv', '2024-11-03 17:50:10', '2024-11-03 17:50:10', ''),
(5, 'Katheryn Smitham', 'thyatt@example.com', '2024-11-03 17:50:09', '$2y$12$pQOKsEeytzoSGClREeTnE.AtoT.lVFd14f.m.Catc9SgPZpNvHL7O', NULL, 'ezjxbJvFTH', '2024-11-03 17:50:10', '2024-11-03 17:50:10', ''),
(6, 'Dr. Libbie Fisher', 'lafayette97@example.org', '2024-11-03 17:50:09', '$2y$12$pQOKsEeytzoSGClREeTnE.AtoT.lVFd14f.m.Catc9SgPZpNvHL7O', NULL, 'wwmniwtlJb', '2024-11-03 17:50:10', '2024-11-03 17:50:10', ''),
(7, 'Dasia Jerde', 'manley91@example.net', '2024-11-03 17:50:09', '$2y$12$pQOKsEeytzoSGClREeTnE.AtoT.lVFd14f.m.Catc9SgPZpNvHL7O', NULL, 'pgJjWWe3bg', '2024-11-03 17:50:10', '2024-11-03 17:50:10', ''),
(8, 'Erika Haley', 'udickinson@example.com', '2024-11-03 17:50:09', '$2y$12$pQOKsEeytzoSGClREeTnE.AtoT.lVFd14f.m.Catc9SgPZpNvHL7O', NULL, 'D0CCrNOjXV', '2024-11-03 17:50:10', '2024-11-03 17:50:10', ''),
(9, 'Lelia Beatty', 'upton.abdullah@example.org', '2024-11-03 17:50:09', '$2y$12$pQOKsEeytzoSGClREeTnE.AtoT.lVFd14f.m.Catc9SgPZpNvHL7O', NULL, 'P4mQJg8m5m', '2024-11-03 17:50:10', '2024-11-03 17:50:10', ''),
(11, 'Test User', 'test@example.com', '2024-11-03 17:50:11', '$2y$12$pQOKsEeytzoSGClREeTnE.AtoT.lVFd14f.m.Catc9SgPZpNvHL7O', 'admin', 'fsBxzMcH9vgujwmC5hTw19gxlM02GveFBvrPCOnc2UPisFytq5LdFdRNI0Il', '2024-11-03 17:50:11', '2024-11-03 17:50:11', ''),
(13, 'epal ka', 'jhinbae414@gmail.com', NULL, '$2y$12$4/hDZaa00/0eYEECd2xvI.nXSS.5QINWN94qIGJLPbiBEnfCKkLtu', 'customer', NULL, '2024-11-03 18:11:26', '2024-11-03 18:11:26', 'bhNc5Cp8'),
(17, 'gerson', 'akosikupal@gmail.com', NULL, '$2y$12$6c8nBCy6d/5sXppJRbcCce1.mLejjZczTV45HlH7EXVyEd4SqAWUO', 'customer', NULL, '2024-11-05 22:04:49', '2024-11-05 22:04:49', '3SnlwiYx'),
(18, 'gerson', 'akosikupals@gmail.com', NULL, '$2y$12$LxXufVgDgIskKwTnw4P9nOWk90gPaxAMg29uOVQG.Z7KR3Rf4bNma', 'customer', NULL, '2024-11-05 23:56:21', '2024-11-05 23:56:21', 'CJWs17yw');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `claims`
--
ALTER TABLE `claims`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hr1_applicant`
--
ALTER TABLE `hr1_applicant`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `hr1_applicant_apply`
--
ALTER TABLE `hr1_applicant_apply`
  ADD PRIMARY KEY (`apply_id`);

--
-- Indexes for table `hr1_employee_info`
--
ALTER TABLE `hr1_employee_info`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `hr2_job_qualification`
--
ALTER TABLE `hr2_job_qualification`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `hr3_leave_management`
--
ALTER TABLE `hr3_leave_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr3_shift_and_scheduling`
--
ALTER TABLE `hr3_shift_and_scheduling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr4_compensation`
--
ALTER TABLE `hr4_compensation`
  ADD PRIMARY KEY (`compensation_id`);

--
-- Indexes for table `hr4_deduction`
--
ALTER TABLE `hr4_deduction`
  ADD PRIMARY KEY (`deduction_id`);

--
-- Indexes for table `hr4_payroll`
--
ALTER TABLE `hr4_payroll`
  ADD PRIMARY KEY (`payroll_id`);

--
-- Indexes for table `hr4_recruitment`
--
ALTER TABLE `hr4_recruitment`
  ADD PRIMARY KEY (`recruitment_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_employees`
--
ALTER TABLE `new_employees`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `claims`
--
ALTER TABLE `claims`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr1_applicant`
--
ALTER TABLE `hr1_applicant`
  MODIFY `applicant_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hr1_applicant_apply`
--
ALTER TABLE `hr1_applicant_apply`
  MODIFY `apply_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `hr1_employee_info`
--
ALTER TABLE `hr1_employee_info`
  MODIFY `employee_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr2_job_qualification`
--
ALTER TABLE `hr2_job_qualification`
  MODIFY `job_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hr3_leave_management`
--
ALTER TABLE `hr3_leave_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr3_shift_and_scheduling`
--
ALTER TABLE `hr3_shift_and_scheduling`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr4_compensation`
--
ALTER TABLE `hr4_compensation`
  MODIFY `compensation_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr4_deduction`
--
ALTER TABLE `hr4_deduction`
  MODIFY `deduction_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr4_payroll`
--
ALTER TABLE `hr4_payroll`
  MODIFY `payroll_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr4_recruitment`
--
ALTER TABLE `hr4_recruitment`
  MODIFY `recruitment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `new_employees`
--
ALTER TABLE `new_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
