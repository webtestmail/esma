-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 23, 2026 at 05:28 PM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matebyas_socialfox_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metadata` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `type`, `title`, `description`, `status_label`, `metadata`, `created_at`, `updated_at`) VALUES
(1, 16, 'withdrawal_request', 'Withdrawal Requested', 'Requested ₹5000 to 1', 'Pending', '{\"amount\": \"5000\"}', '2025-12-28 06:04:13', '2025-12-28 06:04:13'),
(2, 16, 'withdrawal_request', 'Withdrawal Requested', 'Requested ₹5000 to 1', 'Pending', '{\"amount\": \"5000\"}', '2025-12-28 07:41:36', '2025-12-28 07:41:36'),
(3, 16, 'withdrawal_request', 'Withdrawal Requested', 'Requested ₹5000 to 1', 'Pending', '{\"amount\": \"5000\"}', '2025-12-30 00:28:55', '2025-12-30 00:28:55'),
(4, 16, 'campagin_created', 'New Campagin Created', '{$campaign->title} campaign has been published and is now accepting applications', 'Active', '{\"budget\": \"500\"}', '2026-01-05 02:35:47', '2026-01-05 02:35:47'),
(5, 16, 'campagin_updated', 'Campagin Updated', '{$campaign->title} campaign has been updated and is now accepting applications', 'Active', '{\"budget\": \"500\"}', '2026-01-06 08:43:48', '2026-01-06 08:43:48'),
(6, 16, 'campagin_updated', 'Campagin Updated', '{$campaign->title} campaign has been updated and is now accepting applications', 'Active', '{\"budget\": \"500\"}', '2026-01-06 08:47:11', '2026-01-06 08:47:11'),
(7, 16, 'campagin_updated', 'Campagin Updated', '{$campaign->title} campaign has been updated and is now accepting applications', 'Active', '{\"budget\": \"500\"}', '2026-01-06 08:49:53', '2026-01-06 08:49:53'),
(8, 16, 'campagin_updated', 'Campagin Updated', '{$campaign->title} campaign has been updated and is now accepting applications', 'Active', '{\"budget\": \"500\"}', '2026-01-06 08:53:51', '2026-01-06 08:53:51'),
(9, 16, 'campagin_updated', 'Campagin Updated', '{$campaign->title} campaign has been updated and is now accepting applications', 'Active', '{\"budget\": \"500\"}', '2026-01-08 04:01:05', '2026-01-08 04:01:05'),
(10, 16, 'campagin_updated', 'Campagin Updated', '{$campaign->title} campaign has been updated and is now accepting applications', 'Active', '{\"budget\": \"500\"}', '2026-01-08 04:02:05', '2026-01-08 04:02:05'),
(11, 16, 'withdrawal_request', 'Withdrawal Requested', 'Requested ₹5000 to 1', 'Pending', '{\"amount\": \"5000\"}', '2026-01-09 05:12:44', '2026-01-09 05:12:44'),
(12, 16, 'campagin_updated', 'Campagin Updated', 'new campagins campaign has been updated and is now accepting applications', 'pending', '{\"budget\": \"500\"}', '2026-01-09 05:19:16', '2026-01-09 05:19:16'),
(13, 16, 'campagin_updated', 'Campagin Updated', 'new campagins campaign has been paused ', 'paused', NULL, '2026-01-27 04:49:31', '2026-01-27 04:49:31'),
(14, 16, 'campagin_updated', 'Campagin Updated', 'new campagins campaign has been paused ', 'paused', NULL, '2026-01-27 04:50:14', '2026-01-27 04:50:14'),
(15, 16, 'campagin_updated', 'Campagin Updated', 'new campagins campaign has been re startd', 'active', NULL, '2026-01-27 05:20:22', '2026-01-27 05:20:22'),
(16, 16, 'campagin_application', 'Influencer Application Approved', '@{$application->campagin->user->username} has been {$application->status} for \"{$application->campagin->title}\" campaign', 'accepted', '{\"follower\": null}', '2026-01-28 00:02:52', '2026-01-28 00:02:52'),
(17, 16, 'campagin_application', 'Influencer Application Approved', '@webtestmail has been accepted for \"new campagins\" campaign', 'approved', '{\"follower\": null}', '2026-01-28 00:09:57', '2026-01-28 00:09:57'),
(18, 16, 'campagin_application', 'Influencer Application Approved', '@webtestmail has been rejected for \"new campagins\" campaign', 'rejected', '{\"follower\": null}', '2026-01-28 00:10:27', '2026-01-28 00:10:27'),
(19, 16, 'campagin_application', 'Campagin Payout', 'Payment to @webtestmail for new campagins', 'pending', NULL, '2026-01-28 01:29:57', '2026-01-28 01:29:57'),
(20, 16, 'campagin_application', 'Campagin Payout', 'Payment to @webtestmail for new campagins', 'pending', NULL, '2026-01-28 01:36:05', '2026-01-28 01:36:05'),
(21, 16, 'campagin_application', 'Campagin Payout', 'Payment to @webtestmail for new campagins', 'pending', NULL, '2026-01-28 01:40:53', '2026-01-28 01:40:53'),
(22, 16, 'campagin_application', 'Campagin Payout', 'Payment to @webtestmail for new campagins', 'pending', NULL, '2026-01-28 01:42:52', '2026-01-28 01:42:52'),
(23, 16, 'campagin_application', 'Campagin Payout', 'Payment to @webtestmail for new campagins', 'pending', NULL, '2026-01-28 01:45:52', '2026-01-28 01:45:52'),
(24, 16, 'campagin_application', 'Campagin Payout', 'Payment to @webtestmail for new campagins', 'pending', NULL, '2026-01-28 01:53:32', '2026-01-28 01:53:32'),
(25, 16, 'campagin_application', 'Campagin Payout', 'Payment to @webtestmail for new campagins', 'pending', NULL, '2026-01-28 01:54:31', '2026-01-28 01:54:31'),
(26, 16, 'campagin_application', 'Campagin Payout', 'Payment to @webtestmail for new campagins', 'pending', NULL, '2026-01-28 01:58:55', '2026-01-28 01:58:55'),
(27, 16, 'campagin_application', 'Campagin Payout', 'Payment to @webtestmail for new campagins', 'Success', NULL, '2026-01-28 01:59:23', '2026-01-28 01:59:23'),
(28, 16, 'campagin_application', 'Influencer Application Approved', '@webtestmail has been accepted for \"new campagins\" campaign', 'approved', '{\"follower\": null}', '2026-01-28 04:23:46', '2026-01-28 04:23:46'),
(29, 16, 'campagin_application', 'Campagin Payout', 'Payment to @webtestmail for new campagins', 'pending', NULL, '2026-01-28 04:29:15', '2026-01-28 04:29:15'),
(30, 16, 'campagin_application', 'Campagin Payout', 'Payment to @webtestmail for new campagins', 'pending', NULL, '2026-01-28 04:29:26', '2026-01-28 04:29:26'),
(31, 16, 'campagin_application', 'Campagin Payout', 'Payment to @webtestmail for new campagins', 'pending', NULL, '2026-01-29 08:07:17', '2026-01-29 08:07:17'),
(32, 16, 'campagin_application', 'Campagin Payout', 'Payment to @webtestmail for new campagins', 'Success', NULL, '2026-01-29 08:08:07', '2026-01-29 08:08:07'),
(33, 16, 'campagin_application', 'Influencer Application Approved', '@webtestmail has been accepted for \"new campagins\" campaign', 'approved', '{\"follower\": null}', '2026-02-04 07:14:28', '2026-02-04 07:14:28'),
(34, 16, 'campagin_application', 'Campagin Payout', 'Payment to @webtestmail for new campagins', 'pending', NULL, '2026-02-04 07:15:59', '2026-02-04 07:15:59'),
(35, 16, 'campagin_application', 'Campagin Payout', 'Payment to @webtestmail for new campagins', 'Success', NULL, '2026-02-04 07:16:30', '2026-02-04 07:16:30'),
(36, 16, 'campagin_application', 'Influencer Application Approved', '@webtestmail has been accepted for \"new campagins\" campaign', 'approved', '{\"follower\": null}', '2026-02-06 05:15:43', '2026-02-06 05:15:43'),
(37, 16, 'campagin_application', 'Influencer Application Approved', '@webtestmail has been accepted for \"new campagins\" campaign', 'approved', '{\"follower\": null}', '2026-02-10 04:08:06', '2026-02-10 04:08:06'),
(38, 16, 'campagin_application', 'Campagin Payout', 'Payment to @webtestmail for new campagins', 'pending', NULL, '2026-02-10 04:08:30', '2026-02-10 04:08:30'),
(39, 16, 'campagin_application', 'Campagin Payout', 'Payment to @webtestmail for new campagins', 'pending', NULL, '2026-02-10 04:10:31', '2026-02-10 04:10:31'),
(40, 16, 'campagin_application', 'Campagin Payout', 'Payment to @webtestmail for new campagins', 'Success', NULL, '2026-02-10 04:11:07', '2026-02-10 04:11:07'),
(41, 16, 'campagin_application', 'Campagin Completed', 'Collaborator @webtestmail compelted new campagins', 'Completed', NULL, '2026-02-12 05:07:57', '2026-02-12 05:07:57'),
(42, 13, 'campagin_payout', 'Payout Received', 'Rs 500 has been added to your wallet from matebiz', 'Completed', NULL, '2026-02-12 05:07:57', '2026-02-12 05:07:57'),
(43, 16, 'campagin_application', 'Campagin Completed', 'Collaborator @webtestmail compeleted new campagins', 'Completed', NULL, '2026-02-12 05:17:35', '2026-02-12 05:17:35'),
(44, 13, 'campagin_payout', 'Payout Received', 'Rs 500 has been added to your wallet from matebiz', 'Completed', '{\"payout\": \"+RS500\"}', '2026-02-12 05:17:35', '2026-02-12 05:17:35'),
(45, 16, 'campagin_application', 'Campagin Completed', 'Collaborator @webtestmail compeleted new campagins', 'Completed', NULL, '2026-02-12 05:20:55', '2026-02-12 05:20:55'),
(46, 13, 'campagin_payout', 'Payout Received', 'Rs 500 has been added to your wallet from matebiz', 'Completed', '{\"payout\": \"+RS500\"}', '2026-02-12 05:20:55', '2026-02-12 05:20:55'),
(47, 16, 'campagin_application', 'Campagin Completed', 'Collaborator @webtestmail compeleted new campagins', 'Completed', NULL, '2026-02-12 05:21:47', '2026-02-12 05:21:47'),
(48, 13, 'campagin_payout', 'Payout Received', 'Rs 500 has been added to your wallet from matebiz', 'Completed', '{\"payout\": \"+RS500\"}', '2026-02-12 05:21:47', '2026-02-12 05:21:47'),
(49, 16, 'campagin_created', 'New Campagin Created', '{$campaign->title} campaign has been published and also charged 500 + 18 GST is now accepting applications', 'Pending', '{\"budget\": \"5000\"}', '2026-02-13 08:35:39', '2026-02-13 08:35:39'),
(50, 16, 'campagin_application', 'Campagin Completed', 'Collaborator @webtestmail compeleted new campagins', 'Completed', NULL, '2026-02-13 08:41:51', '2026-02-13 08:41:51'),
(51, 13, 'campagin_payout', 'Payout Received', 'Rs 500 has been added to your wallet from matebiz', 'Completed', '{\"payout\": \"+RS500\"}', '2026-02-13 08:41:51', '2026-02-13 08:41:51'),
(52, 16, 'campagin_created', 'New Campagin Created', 'PARTH AGNIHITRI campaign has been published and also charged 500 + 18 GST is now accepting applications', 'Pending', '{\"budget\": \"1100\"}', '2026-02-14 00:36:53', '2026-02-14 00:36:53'),
(53, 16, 'campagin_updated', 'Campagin Updated', 'PARTH AGNIHITRI campaign has been updated and is now accepting applications', 'active', '{\"budget\": \"1500\"}', '2026-02-14 00:45:39', '2026-02-14 00:45:39'),
(54, 16, 'campagin_updated', 'Campagin Updated', 'PARTH AGNIHITRI campaign has been paused ', 'paused', NULL, '2026-02-14 00:47:27', '2026-02-14 00:47:27'),
(55, 16, 'campagin_updated', 'Campagin Updated', 'PARTH AGNIHITRI campaign has been re startd', 'active', NULL, '2026-02-14 00:48:20', '2026-02-14 00:48:20'),
(56, 16, 'campagin_updated', 'Campagin Updated', 'PARTH AGNIHITRI campaign has been paused ', 'paused', NULL, '2026-02-14 00:48:48', '2026-02-14 00:48:48'),
(57, 16, 'campagin_updated', 'Campagin Updated', 'PARTH AGNIHITRI campaign has been re startd', 'active', NULL, '2026-02-14 00:48:53', '2026-02-14 00:48:53'),
(58, 16, 'campagin_updated', 'Campagin Updated', 'PARTH AGNIHITRI campaign has been paused ', 'paused', NULL, '2026-02-14 00:49:00', '2026-02-14 00:49:00'),
(59, 16, 'campagin_application', 'Influencer Application Approved', '@webtestmail has been accepted for \"PARTH AGNIHITRI\" campaign', 'approved', '{\"follower\": \"10k-50k\"}', '2026-02-14 00:57:19', '2026-02-14 00:57:19'),
(60, 16, 'campagin_application', 'Influencer Application Approved', '@webtestmail has been accepted for \"PARTH AGNIHITRI\" campaign', 'approved', '{\"follower\": \"50k-100k\"}', '2026-02-16 05:46:48', '2026-02-16 05:46:48'),
(61, 16, 'campagin_application', 'Campagin Payout', 'Payment to @webtestmail for PARTH AGNIHITRI', 'pending', NULL, '2026-02-16 05:46:56', '2026-02-16 05:46:56'),
(62, 16, 'campagin_application', 'Campagin Payout', 'Payment to @webtestmail for PARTH AGNIHITRI', 'Success', NULL, '2026-02-16 05:47:25', '2026-02-16 05:47:25'),
(63, 16, 'campagin_application', 'Campagin Payout', 'Payment to @webtestmail for PARTH AGNIHITRI', 'pending', NULL, '2026-02-16 05:58:46', '2026-02-16 05:58:46'),
(64, 16, 'campagin_application', 'Campagin Payout', 'Payment to @webtestmail for PARTH AGNIHITRI', 'Success', NULL, '2026-02-16 05:59:11', '2026-02-16 05:59:11'),
(65, 16, 'withdrawal_request', 'Withdrawal Requested', 'Requested ₹1000 to 1', 'Pending', '{\"amount\": \"1000\"}', '2026-03-09 05:54:01', '2026-03-09 05:54:01'),
(66, 16, 'campagin_created', 'New Campagin Created', ' campaign has been published and also charged 500 + 18 GST is now accepting applications', 'Pending', '{\"budget\": 0}', '2026-03-12 05:37:48', '2026-03-12 05:37:48'),
(67, 16, 'campagin_created', 'New Campagin Created', ' campaign has been published and also charged 500 + 18 GST is now accepting applications', 'Pending', '{\"budget\": 0}', '2026-03-12 05:39:10', '2026-03-12 05:39:10'),
(68, 16, 'campagin_created', 'New Campagin Created', ' campaign has been published and also charged 500 + 18 GST is now accepting applications', 'Pending', '{\"budget\": 0}', '2026-03-12 05:39:40', '2026-03-12 05:39:40'),
(69, 16, 'campagin_created', 'New Campagin Created', ' campaign has been published and also charged 500 + 18 GST is now accepting applications', 'Pending', '{\"budget\": 0}', '2026-03-12 07:44:19', '2026-03-12 07:44:19'),
(70, 16, 'campagin_created', 'New Campaign Created', 'Summer Fitness Launch published. Charged 12,300.00', 'Pending', '{\"budget\": \"10000\"}', '2026-03-12 08:42:25', '2026-03-12 08:42:25'),
(71, 13, 'withdrawal_request', 'Withdrawal Requested', 'Requested ₹494 to 2', 'Pending', '{\"amount\": \"494\"}', '2026-03-12 15:43:05', '2026-03-12 15:43:05'),
(72, 16, 'withdrawal_request', 'Withdrawal Requested', 'Requested ₹5000 to 1', 'Pending', '{\"amount\": \"5000\"}', '2026-03-14 04:39:20', '2026-03-14 04:39:20'),
(73, 16, 'withdrawal_request', 'Withdrawal Requested', 'Requested ₹5000 to 1', 'Pending', '{\"amount\": \"5000\"}', '2026-03-14 04:53:37', '2026-03-14 04:53:37'),
(74, 16, 'withdrawal_request', 'Withdrawal Requested', 'Requested ₹500', 'Pending', '\"{\\\"amount\\\":500}\"', '2026-03-19 02:49:43', '2026-03-19 02:49:43');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `first_name`, `last_name`, `google_id`, `phone`, `email`, `email_verified_at`, `image`, `password`, `role`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '', 'Super Admin', NULL, '10150221707571810486800', '', 'superadmin@gmail.com', NULL, NULL, '$2y$12$VflXhasHPnvzGfuLPzeRZOgKtZSMyJ6PQrSIvKKZTrFGfccGffpaa', 4, 4, 'Kri3d9uUa695MGOFApEDnd7WC0H9re0mZxR17b21651ZiRi1SW1M36PWVwQo', NULL, NULL),
(5, '', 'Admin', NULL, '101502217075718104868', '1234567890', 'webtestinglink@gmail.com', NULL, 'images/admin/1765545161_693c14c95f379.png', '$2y$12$VflXhasHPnvzGfuLPzeRZOgKtZSMyJ6PQrSIvKKZTrFGfccGffpaa', 1, 1, 'AxdIsZ02ErWbcrWMmhIh2Q4ktiQ4etrDj3o8CYjqhsSAs6eSBLSIcx3D0bxX', NULL, '2025-12-12 07:51:31'),
(6, NULL, 'Mukesh', 'Kumar', NULL, '9876543210', 'mukesh@gmail.com', NULL, NULL, '$2y$12$GXwM5D3wDmLOM7/Zy9DG2ejYqgwVR7cMre7Oq0tt31rB9pHR4cZKS', 3, 1, NULL, '2026-03-20 07:50:19', '2026-03-20 07:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `campagin_id` bigint(20) UNSIGNED NOT NULL,
  `influencer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `applications_number` bigint(20) NOT NULL DEFAULT '0',
  `portfolio_link` text COLLATE utf8mb4_unicode_ci,
  `social_media_handles` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `follower_count` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `average_engagement_rate` varchar(1500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proposed_rate` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relevent_experience` text COLLATE utf8mb4_unicode_ci,
  `content_idea` text COLLATE utf8mb4_unicode_ci,
  `availability` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agreement_signed` tinyint(1) DEFAULT '0',
  `influencer_agreement_signed` tinyint(1) DEFAULT '0',
  `influencer_signed_at` timestamp NULL DEFAULT NULL,
  `signed_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_completed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Not Completed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `campagin_id`, `influencer_id`, `applications_number`, `portfolio_link`, `social_media_handles`, `follower_count`, `average_engagement_rate`, `proposed_rate`, `relevent_experience`, `content_idea`, `availability`, `agreement_signed`, `influencer_agreement_signed`, `influencer_signed_at`, `signed_at`, `status`, `project_completed`, `created_at`, `updated_at`) VALUES
(1, 39, 13, 0, NULL, NULL, NULL, NULL, '500', NULL, NULL, NULL, 1, 1, '2026-02-10 04:09:47', '2026-02-10 04:08:23', 'accepted', 'Completed', '2026-01-23 05:14:49', '2026-02-13 08:41:51'),
(3, 44, 13, 0, 'https://socialfox.matebiz.co/influencer-campaign-detail/eyJpdiI6IjFDaGhiM1hjU1hxbDJ0NzBHNDZWV3c9PSIsInZhbHVlIjoieDhOK1hsNkxZRUJyUUxSQUZxTXAvdz09IiwibWFjIjoiMDY4ZWIxNWYwNzk3NjMyNzRkNTU0ZmIwODk1NzZmNTBiMTA0NmE5NzJhNmQ2NDhmOTczN2FjZmY2MzhkNGIxZSIsInRhZyI6IiJ9', '@matebiz', '50k-100k', '-3.1', '750', 'i can do this campagin', NULL, '30', 1, 1, '2026-02-16 05:51:14', '2026-02-16 05:46:53', 'accepted', 'Not Completed', '2026-02-16 05:46:24', '2026-02-16 05:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_holder_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifsc_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Savings',
  `set_default` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_accounts`
--

INSERT INTO `bank_accounts` (`id`, `user_id`, `bank_name`, `account_holder_name`, `account_number`, `ifsc_code`, `account_type`, `set_default`, `created_at`, `updated_at`) VALUES
(1, 16, 'Kotak Mahinda Bank', 'Mukesh', '523601250125', 'KKBK0004681', 'Savings', 0, '2025-12-29 23:53:57', '2025-12-29 23:53:57'),
(2, 13, 'Kotak', '2548515', '1154852141', 'shinb445', 'Savings', 0, '2026-02-25 02:07:16', '2026-02-25 02:07:16'),
(3, 16, 'KBC Bank', 'Rajesh Kumar', '01234567894', 'HDFC0012', 'Savings', 0, '2026-03-16 19:39:32', '2026-03-16 19:39:32');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_order` int(10) UNSIGNED NOT NULL,
  `banner_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_headline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `button_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_button_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_icons` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `position_order`, `banner_title`, `banner_headline`, `description`, `button_name`, `button_link`, `other_button_name`, `other_button_link`, `banner_image`, `banner_icons`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'The Clever Way To Connect', '<h3 class=\"hero-title\" data-aos=\"fade-up\" data-aos-delay=\"500\">The&nbsp;<span class=\"text-warning\">All-In-One Platform</span>&nbsp;For<br>Digital Content Creators</h3>', '&lt;p class=&quot;hero-description&quot; data-aos=&quot;fade-up&quot; data-aos-delay=&quot;600&quot;&gt;Lorem ipsum dolor sit consectetur adipiscing elit, sed do eiusmod tempor lorem consequat lorem tempor incididunt tempor ipsum dolor.&lt;br&gt;Lorem ipsum dolor sit consectetur adipiscing elit, sed do eiusmod tempor lorem consequat lorem tempor incididunt tempor ipsum dolor.&lt;/p&gt;', NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2025-12-04 05:55:02', '2026-02-25 00:11:42'),
(3, 2, 'The Way To Connect', 'The Platform For Digital Content Creators', '&lt;p&gt;Lorem ipsum dolor sit consectetur adipiscing elit, sed do eiusmod tempor lorem consequat lorem tempor incididunt tempor ipsum dolor.&lt;/p&gt;\r\n&lt;p&gt;Lorem ipsum dolor sit consectetur adipiscing elit, sed do eiusmod tempor lorem consequat lorem tempor incididunt tempor ipsum dolor.&lt;br&gt;Lorem ipsum dolor sit consectetur adipiscing elit, sed do eiusmod tempor lorem consequat lorem tempor incididunt tempor ipsum dolor.&lt;br&gt;Lorem ipsum dolor sit consectetur adipiscing elit, sed do eiusmod tempor lorem consequat lorem tempor incididunt tempor ipsum dolor.&lt;/p&gt;', NULL, NULL, NULL, NULL, NULL, NULL, 'deactive', '2026-02-12 04:47:01', '2026-02-12 04:50:57');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `position_order` int(10) UNSIGNED NOT NULL,
  `blog_tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_headline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `breadcrumb_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_in_categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `written_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `writer_designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `writer_description` longtext COLLATE utf8mb4_unicode_ci,
  `writer_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `writer_instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `writer_linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `writer_x` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `writer_personal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `writer_facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `writer_threads` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_date` date DEFAULT NULL,
  `is_featured` tinyint(4) NOT NULL DEFAULT '0',
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `category_id`, `position_order`, `blog_tags`, `blog_headline`, `blog_url`, `short_description`, `description`, `breadcrumb_image`, `blog_image`, `show_in_categories`, `written_by`, `writer_designation`, `writer_description`, `writer_image`, `writer_instagram`, `writer_linkedin`, `writer_x`, `writer_personal`, `writer_facebook`, `writer_threads`, `post_date`, `is_featured`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Influencer Marketing for Small Brands in India,A Complete Beginner,s Guide,2026', 'Influencer Marketing for Small Brands in India: A Complete Beginner’s Guide (2026)', 'influencer-marketing-for-small-brands-in-india-a-complete-beginner-s-guide-2026', '&lt;p&gt;Influencer marketing in India is no longer limited to big brands and celebrities&lt;/p&gt;', NULL, 'images/blogs/1765274267_6937f29b0432d.jpg', 'images/blogs/1765134078_6935cefe3a1bb.png', NULL, 'Sarah Johnson', 'AI Marketing Specialist & SocialFox Expert', '&lt;p&gt;Sarah is a leading expert in AI-driven marketing strategies with over 8 years of experience in influencer marketing. She helps brands leverage technology to create more effective campaigns.&lt;/p&gt;', 'images/blogs/writers/1765134078_6935cefe5799f.png', NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-07', 0, 'How AI is Revolutionizing Influencer Marketing in 2025', 'How AI is Revolutionizing Influencer Marketing in 2025', '&lt;p&gt;How AI is Revolutionizing Influencer Marketing in 2025&lt;/p&gt;', 'active', '2025-12-07 13:31:18', '2026-03-16 02:20:45'),
(2, 0, 2, 'How to Spot Fake Followers and Fake Engagement in Influencer Marketing', 'How to Spot Fake Followers and Fake Engagement in Influencer Marketing', 'how-to-spot-fake-followers-and-fake-engagement-in-influencer-marketing', '&lt;p&gt;Fake followers are one of the biggest threats to influencer marketing in India&lt;/p&gt;', NULL, 'images/blogs/1770893537_698db0e15b8c1.png', 'images/blogs/1770893537_698db0e15beb2.jpg', NULL, 'Sarah Johnson', 'AI Marketing Specialist & SocialFox Expert', '&lt;p&gt;I-driven marketing strategies with over 8 years of experience in influencer marketing. She helps brands leverage technology to create more effective campaigns.&lt;/p&gt;', 'images/blogs/writers/1770893537_698db0e15c05e.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2026-02-12', 0, 'How AI is Revolutionizing Influencer Marketing in 2026', 'How AI is Revolutionizing Influencer Marketing in 2026', '&lt;p&gt;How AI is Revolutionizing Influencer Marketing in 2026&lt;/p&gt;', 'active', '2026-02-12 05:22:17', '2026-03-16 02:20:48'),
(3, 0, 3, 'AI in Influencer Marketing', 'AI in Influencer Marketing: How Technology is Changing Brand–Creator Collaborations in India', 'ai-in-influencer-marketing-how-technology-is-changing-brand-creator-collaborations-in-india', '&lt;p dir=&quot;ltr&quot;&gt;Influencer marketing has evolved&lt;/p&gt;', NULL, 'images/blogs/1770893551_698db0efa365c.png', 'images/blogs/1770893551_698db0efa3a56.jpg', NULL, 'Sarah Johnson', 'AI Marketing Specialist & SocialFox Expert', '&lt;p&gt;I-driven marketing strategies with over 8 years of experience in influencer marketing. She helps brands leverage technology to create more effective campaigns.&lt;/p&gt;', 'images/blogs/writers/1770893551_698db0efa3c2a.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2026-02-12', 1, 'How AI is Revolutionizing Influencer Marketing in 2026', 'How AI is Revolutionizing Influencer Marketing in 2026', '&lt;p&gt;How AI is Revolutionizing Influencer Marketing in 2026&lt;/p&gt;', 'active', '2026-02-12 05:22:31', '2026-03-16 02:20:48'),
(12, 0, 4, 'Influencer Marketing for Small Brands in India,A Complete Beginner,s Guide,2026', 'Influencer Marketing for Small Brands in India: A Complete Beginner’s Guide (2026)', 'influencer-marketing-for-small-brands-in-india-a-complete-beginner-s-guide-2026-1', '&lt;p&gt;Influencer marketing in India is no longer limited to big brands and celebrities. Today, small businesses, startups, and local brands are leveraging micro and nano influencers to build trust, increase visibility, and drive sales.&lt;/p&gt;', NULL, NULL, NULL, NULL, 'Sarah Johnson', 'AI Marketing Specialist & SocialFox Expert', '&lt;p&gt;Sarah is a leading expert in AI-driven marketing strategies with over 8 years of experience in influencer marketing. She helps brands leverage technology to create more effective campaigns.&lt;/p&gt;', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-03-11', 0, 'How AI is Revolutionizing Influencer Marketing in 2025', 'How AI is Revolutionizing Influencer Marketing in 2025', '&lt;p&gt;How AI is Revolutionizing Influencer Marketing in 2025&lt;/p&gt;', 'deactive', '2026-03-11 00:34:17', '2026-03-11 00:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `blog_sections`
--

CREATE TABLE `blog_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` int(10) UNSIGNED NOT NULL,
  `position_order` int(10) UNSIGNED DEFAULT NULL,
  `default_section_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_headline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `section_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_sections`
--

INSERT INTO `blog_sections` (`id`, `blog_id`, `position_order`, `default_section_name`, `section_title`, `section_headline`, `description`, `section_image`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'section_1', 'Introduction', 'Introduction', '&lt;p dir=&quot;ltr&quot;&gt;Influencer marketing in India is no longer limited to big brands and celebrities. Today, small businesses, startups, and local brands are leveraging micro and nano influencers to build trust, increase visibility, and drive sales.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;But many small brands still struggle with questions like:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;How do I find the right influencer?&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;What if the influencer has fake followers?&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;How much should I pay?&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;How do I measure ROI?&lt;br&gt;&lt;br&gt;&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;In this guide, we&amp;rsquo;ll break down everything you need to know about influencer marketing for small brands in India.&lt;/p&gt;', NULL, '2025-12-07 13:42:16', '2026-03-11 00:39:11'),
(2, 1, NULL, 'section_2', 'Why Influencer Marketing Works for Small Brands', 'Why Influencer Marketing Works for Small Brands', '&lt;p dir=&quot;ltr&quot;&gt;Unlike traditional ads, influencer marketing feels authentic. When a creator recommends your product, their audience trusts them.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;For small brands, this means:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Higher engagement rates&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Better conversion rates&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Stronger brand recall&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Affordable marketing compared to agencies&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;Especially in India, where regional creators have strong local audiences, micro influencers (5k&amp;ndash;100k followers) often outperform large influencers in engagement and trust.&lt;/p&gt;', NULL, '2025-12-07 13:42:16', '2026-03-11 00:39:11'),
(3, 3, NULL, 'section_3', 'Introduction', 'Introduction', '&lt;p dir=&quot;ltr&quot;&gt;Influencer marketing has evolved.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;Earlier, brands manually searched Instagram, negotiated via DMs, and guessed performance.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;Today, Artificial Intelligence is transforming influencer marketing in India.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;Let&amp;rsquo;s explore how AI is making collaborations smarter and more transparent.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', NULL, '2026-03-11 00:10:06', '2026-03-11 00:10:06'),
(4, 3, NULL, 'section_4', '1. Smart Influencer Matching', '1. Smart Influencer Matching', '&lt;p dir=&quot;ltr&quot;&gt;Earlier:&lt;br&gt;Brands manually searched hashtags.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;Now:&lt;br&gt;AI matches influencers based on:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Audience demographics&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Location&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Interests&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Engagement quality&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Past performance&lt;br&gt;&lt;br&gt;&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;This increases campaign success rate.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', NULL, '2026-03-11 00:10:06', '2026-03-11 00:15:32'),
(5, 3, NULL, 'section_5', '2. Fraud Detection', '2. Fraud Detection', '&lt;p dir=&quot;ltr&quot;&gt;AI can:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Detect fake followers&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Identify bot engagement&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Analyze suspicious growth patterns&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Track authenticity score&lt;br&gt;&lt;br&gt;&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;This ensures brands collaborate only with genuine creators.&lt;/p&gt;', NULL, '2026-03-11 00:10:06', '2026-03-11 00:15:32'),
(6, 3, NULL, 'section_6', '3. Predicting Campaign Performance', '3. Predicting Campaign Performance', '&lt;p dir=&quot;ltr&quot;&gt;AI analyzes:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Past campaigns&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Content performance&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Audience behavior&lt;br&gt;&lt;br&gt;&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;To predict:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Estimated reach&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Expected engagement&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;ROI probability&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;This reduces risk for small brands.&lt;/p&gt;', NULL, '2026-03-11 00:10:06', '2026-03-11 00:15:32'),
(7, 3, NULL, 'section_7', '4. Fair Pricing', '4. Fair Pricing', '&lt;p dir=&quot;ltr&quot;&gt;AI tools evaluate:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Engagement rate&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Audience quality&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Industry benchmarks&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;To suggest fair pricing for collaborations.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;No more overpaying influencers.&lt;/p&gt;', NULL, '2026-03-11 00:10:06', '2026-03-11 00:15:32'),
(8, 3, NULL, 'section_8', '5. Data-Driven Growth', '5. Data-Driven Growth', '&lt;p dir=&quot;ltr&quot;&gt;AI helps brands:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Track campaign analytics&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Optimize strategy&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Improve targeting&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;This makes influencer marketing more scientific than guesswork.&lt;/p&gt;', NULL, '2026-03-11 00:10:06', '2026-03-11 00:15:32'),
(9, 3, NULL, 'section_9', 'Why AI is Important for Indian Small Brands', 'Why AI is Important for Indian Small Brands', '&lt;p dir=&quot;ltr&quot;&gt;In India:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Millions of influencers exist&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Fake engagement is common&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Budgets are tight&lt;br&gt;&lt;br&gt;&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;AI makes influencer marketing:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Affordable&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Transparent&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Efficient&lt;br&gt;&lt;br&gt;&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;', NULL, '2026-03-11 00:10:06', '2026-03-11 00:15:32'),
(10, 3, NULL, 'section_10', 'Final Thoughts', 'Final Thoughts', '&lt;p dir=&quot;ltr&quot;&gt;Influencer marketing is no longer about random DMs.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;It&amp;rsquo;s about:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Data&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Transparency&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Authenticity&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Smart matchmaking&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;AI-powered platforms are shaping the future of influencer marketing in India &amp;mdash; especially for small brands and emerging creators.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', NULL, '2026-03-11 00:10:06', '2026-03-11 00:15:32'),
(11, 2, NULL, 'section_11', 'Introduction', 'Introduction', '&lt;p dir=&quot;ltr&quot;&gt;Fake followers are one of the biggest threats to influencer marketing in India.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;Brands lose lakhs of rupees every year by collaborating with influencers who inflate their numbers using bots or engagement pods.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;If you&amp;rsquo;re a small brand, you can&amp;rsquo;t afford to waste money on fake reach.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;Here&amp;rsquo;s how to detect fake followers before collaborating.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', NULL, '2026-03-11 00:23:30', '2026-03-11 00:23:30'),
(12, 2, NULL, 'section_12', 'Why Fake Followers Exist', 'Why Fake Followers Exist', '&lt;p dir=&quot;ltr&quot;&gt;Influencers buy fake followers to:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Look popular&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Attract brand deals&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Increase perceived authority&lt;br&gt;&lt;br&gt;&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;But fake followers:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Don&amp;rsquo;t engage&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Don&amp;rsquo;t buy&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Don&amp;rsquo;t convert&lt;br&gt;&lt;br&gt;&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;Which means zero ROI for brands.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', NULL, '2026-03-11 00:23:30', '2026-03-11 00:23:30'),
(13, 2, NULL, 'section_13', '1. Check Engagement Rate', '1. Check Engagement Rate', '&lt;p dir=&quot;ltr&quot;&gt;Formula:&lt;br&gt;Engagement Rate = (Likes + Comments) &amp;divide; Followers &amp;times; 100&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;Healthy engagement rate:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Nano: 5&amp;ndash;10%&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Micro: 3&amp;ndash;6%&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Mid-tier: 2&amp;ndash;4%&lt;br&gt;&lt;br&gt;&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;If someone has 100k followers but only 300 likes, that&amp;rsquo;s a red flag.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', NULL, '2026-03-11 00:23:30', '2026-03-11 00:23:30'),
(14, 2, NULL, 'section_14', 'Analyze Comments', 'Analyze Comments', '&lt;p dir=&quot;ltr&quot;&gt;Fake engagement comments look like:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;&amp;ldquo;Nice&amp;rdquo;&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;&amp;ldquo;Awesome pic&amp;rdquo;&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Random emojis&lt;br&gt;&lt;br&gt;&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;Real engagement includes:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Questions&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Personal reactions&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;Product-specific comments&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;&lt;strong id=&quot;docs-internal-guid-ced083f3-7fff-657d-2c99-e347133b194f&quot;&gt;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;', NULL, '2026-03-11 00:23:30', '2026-03-11 00:23:30'),
(15, 2, NULL, 'section_15', '3. Sudden Follower Growth', '3. Sudden Follower Growth', '&lt;p dir=&quot;ltr&quot;&gt;If an influencer grows 20k followers in 3 days without viral content, it&amp;rsquo;s suspicious.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', NULL, '2026-03-11 00:23:30', '2026-03-11 00:23:30'),
(16, 2, NULL, 'section_16', '4. Check Audience Geography', '4. Check Audience Geography', '&lt;p dir=&quot;ltr&quot;&gt;If a Delhi-based influencer has:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;70% followers from random countries&lt;br&gt;&lt;br&gt;&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;No Indian engagement&lt;br&gt;&lt;br&gt;&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;That&amp;rsquo;s likely fake.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', NULL, '2026-03-11 00:23:30', '2026-03-11 00:23:30'),
(17, 2, NULL, 'section_17', '5. Use AI-Based Verification', '5. Use AI-Based Verification', '&lt;p dir=&quot;ltr&quot;&gt;Manual checking is time-consuming.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;AI-powered influencer platforms now detect:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Fake engagement patterns&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Bot behavior&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Suspicious activity&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Audience authenticity&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;Using verified platforms protects your marketing investment.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', NULL, '2026-03-11 00:23:30', '2026-03-11 00:23:30'),
(18, 2, NULL, 'section_18', 'Why Fraud Detection is Critical for Small Brands', 'Why Fraud Detection is Critical for Small Brands', '&lt;p dir=&quot;ltr&quot;&gt;Small brands have limited budgets.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;One wrong collaboration can:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Kill campaign ROI&lt;br&gt;&lt;br&gt;&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Damage trust&lt;br&gt;&lt;br&gt;&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Waste time&lt;br&gt;&lt;br&gt;&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;That&amp;rsquo;s why fraud detection is not optional &amp;mdash; it&amp;rsquo;s essential.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', NULL, '2026-03-11 00:23:30', '2026-03-11 00:23:30'),
(19, 2, NULL, 'section_19', 'Final Thoughts', 'Final Thoughts', '&lt;p dir=&quot;ltr&quot;&gt;Before investing in influencer marketing:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Check engagement&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Analyze comments&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Study growth patterns&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Use verified platforms&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;Don&amp;rsquo;t pay for fake numbers. Pay for real impact.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', NULL, '2026-03-11 00:23:30', '2026-03-11 00:23:30'),
(20, 12, NULL, 'section_20', 'Introduction to AI in Influencer Marketing', 'Introduction to AI in Influencer Marketing', '&lt;p class=&quot;aos-init aos-animate&quot; data-aos=&quot;fade-up&quot; data-aos-delay=&quot;100&quot;&gt;Artificial intelligence is no longer a futuristic concept&amp;mdash;it&#039;s actively reshaping the influencer marketing landscape. From&amp;nbsp;&lt;code&gt;AI-generated content&lt;/code&gt;&amp;nbsp;to sophisticated analytics platforms, technology is enabling brands to create more targeted, efficient, and measurable campaigns than ever before.&lt;/p&gt;\r\n&lt;p class=&quot;aos-init aos-animate&quot; data-aos=&quot;fade-up&quot; data-aos-delay=&quot;200&quot;&gt;The integration of AI in influencer marketing represents a paradigm shift that&#039;s transforming how brands identify, collaborate with, and measure the success of influencer partnerships. This revolution is not just about automation; it&#039;s about creating more authentic and effective connections between brands and their target audiences.&lt;/p&gt;\r\n&lt;blockquote class=&quot;aos-init aos-animate&quot; data-aos=&quot;fade-up&quot; data-aos-delay=&quot;300&quot;&gt;&quot;AI doesn&#039;t replace human creativity in influencer marketing&amp;mdash;it amplifies it, providing insights and capabilities that enable more strategic and impactful campaigns.&quot;&lt;/blockquote&gt;', NULL, '2026-03-11 00:34:17', '2026-03-11 00:34:17'),
(21, 12, NULL, 'section_21', 'The Rise of AI-Generated Creators', 'The Rise of AI-Generated Creators', '&lt;p class=&quot;aos-init aos-animate&quot; data-aos=&quot;fade-up&quot; data-aos-delay=&quot;100&quot;&gt;Virtual influencers and AI-generated personas are becoming increasingly sophisticated, with some amassing millions of followers. These digital creators offer brands unprecedented control over messaging while maintaining the authentic feel that audiences crave.&lt;/p&gt;\r\n&lt;h3 class=&quot;aos-init aos-animate&quot; data-aos=&quot;fade-up&quot; data-aos-delay=&quot;200&quot;&gt;Key Benefits of AI Creators:&lt;/h3&gt;\r\n&lt;ul class=&quot;aos-init aos-animate&quot; data-aos=&quot;fade-up&quot; data-aos-delay=&quot;300&quot;&gt;\r\n&lt;li&gt;24/7 availability for content creation and engagement&lt;/li&gt;\r\n&lt;li&gt;Consistent brand messaging without human error&lt;/li&gt;\r\n&lt;li&gt;Scalable content production across multiple platforms&lt;/li&gt;\r\n&lt;li&gt;Complete control over brand representation and values&lt;/li&gt;\r\n&lt;li&gt;Reduced costs compared to traditional influencer partnerships&lt;/li&gt;\r\n&lt;/ul&gt;', NULL, '2026-03-11 00:34:17', '2026-03-11 00:34:17'),
(22, 1, NULL, 'section_22', 'Step 1: Define Your Target Audience', 'Step 1: Define Your Target Audience', '&lt;p dir=&quot;ltr&quot;&gt;Before choosing an influencer, ask:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Who is my ideal customer?&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Age group?&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Location?&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Interests?&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Budget level?&lt;br&gt;&lt;br&gt;&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;For example:&lt;br&gt;If you sell affordable skincare products for college students, you should collaborate with student lifestyle influencers &amp;mdash; not luxury fashion creators.&lt;/p&gt;', NULL, '2026-03-11 00:39:11', '2026-03-11 00:39:11'),
(23, 1, NULL, 'section_23', 'Step 2: Choose the Right Type of Influencer', 'Step 2: Choose the Right Type of Influencer', '&lt;h4 dir=&quot;ltr&quot;&gt;Nano Influencers (1k&amp;ndash;10k followers)&lt;/h4&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;High trust&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Very affordable&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Great for local brands&lt;br&gt;&lt;br&gt;&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;h4 dir=&quot;ltr&quot;&gt;Micro Influencers (10k&amp;ndash;100k followers)&lt;/h4&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Best engagement rates&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Ideal for small businesses&lt;br&gt;&lt;br&gt;&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;h4 dir=&quot;ltr&quot;&gt;Mid-tier Influencers (100k&amp;ndash;500k)&lt;/h4&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Wider reach&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Higher cost&lt;br&gt;&lt;br&gt;&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;For most small brands in India, micro influencers are the sweet spot.&lt;/p&gt;', NULL, '2026-03-11 00:39:11', '2026-03-11 00:39:11'),
(24, 1, NULL, 'section_24', 'Step 3: Check for Fake Followers', 'Step 3: Check for Fake Followers', '&lt;p dir=&quot;ltr&quot;&gt;One of the biggest problems in influencer marketing is fake engagement.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;Red flags:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Sudden follower spikes&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Low engagement rate (below 1%)&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Random comments like &amp;ldquo;Nice pic&amp;rdquo;&lt;br&gt;&lt;br&gt;&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;Fake followers waste your marketing budget.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;This is why platforms like Social Fox use AI-powered fraud detection to ensure brands only work with real creators.&lt;/p&gt;', NULL, '2026-03-11 00:39:11', '2026-03-11 00:39:11'),
(25, 1, NULL, 'section_25', 'Step 4 : Decide Collaboration Type', 'Step 4 : Decide Collaboration Type', '&lt;p dir=&quot;ltr&quot;&gt;Popular collaboration models:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Paid post&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Affiliate commission&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Free product exchange&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Long-term brand ambassador&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;For small brands, starting with product exchange + performance-based payments can reduce risk.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', NULL, '2026-03-11 00:39:11', '2026-03-11 00:39:11'),
(26, 1, NULL, 'section_26', 'Step 5: Track ROI', 'Step 5: Track ROI', '&lt;p dir=&quot;ltr&quot;&gt;Measure:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Reach&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Engagement rate&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Website clicks&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Sales&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Coupon code usage&lt;br&gt;&lt;br&gt;&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;Influencer marketing is not just about likes. It&amp;rsquo;s about results.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', NULL, '2026-03-11 00:39:11', '2026-03-11 00:39:11'),
(27, 1, NULL, 'section_27', 'Why Small Brands Should Avoid Traditional Agencies', 'Why Small Brands Should Avoid Traditional Agencies', '&lt;p dir=&quot;ltr&quot;&gt;Many influencer marketing agencies:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Charge 20&amp;ndash;40% commission&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Focus only on big brands&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Don&amp;rsquo;t verify fake followers&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;Small brands often overpay and underperform.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;Instead, AI-powered platforms that offer subscription-based access without commission are more affordable and transparent.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', NULL, '2026-03-11 00:39:11', '2026-03-11 00:39:11'),
(28, 1, NULL, 'section_28', 'Final Thoughts', 'Final Thoughts', '&lt;p dir=&quot;ltr&quot;&gt;Influencer marketing in India is growing rapidly. But success depends on:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Choosing the right influencer&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Avoiding fake engagement&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Clear communication&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Tracking performance&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;If done correctly, influencer marketing can become your most powerful growth channel.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', NULL, '2026-03-11 00:39:11', '2026-03-11 00:39:11');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_order` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `position_order`, `brand_name`, `brand_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bohne Creek Ranch', 'images/brands/1765605357_693cffed7ddc6.png', 'active', '2025-12-13 00:25:57', '2025-12-13 00:25:57'),
(2, 2, 'Creek Ranch', 'images/brands/1770895165_698db73d53fa4.png', 'active', '2026-02-12 05:49:25', '2026-02-12 05:49:25');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-otp_21', 'i:888928;', 1770884984);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `campagins`
--

CREATE TABLE `campagins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `managed_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'self',
  `title` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` bigint(20) NOT NULL DEFAULT '0',
  `campagin_budget` bigint(20) DEFAULT '0',
  `budget_allocated` bigint(20) DEFAULT '0',
  `campagin_description` text COLLATE utf8mb4_unicode_ci,
  `campagin_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campaign_image` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campagins`
--

INSERT INTO `campagins` (`id`, `user_id`, `managed_by`, `title`, `location`, `views`, `campagin_budget`, `budget_allocated`, `campagin_description`, `campagin_type`, `campaign_image`, `status`, `is_active`, `created_at`, `updated_at`) VALUES
(39, 16, 'self', 'new campagins', 'panindia', 93, 500, 1000, 'Campagin description', 'paid', 'campaigns/DzAs3xOtlReF6f3WNRjLhCdflDYqD3OGCpo5AfhV.jpg', 'Completed', 0, '2026-01-05 02:29:56', '2026-02-13 08:41:51'),
(40, 16, 'self', 'new campagin', 'panindia', 0, 500, 0, NULL, 'paid', 'campaigns/LVDv0kFzjTnu7ICR6BUN9yVbUOneBXMvPz7Kuyf2.jpg', 'pending', 0, '2026-01-05 02:35:47', '2026-01-05 02:35:47'),
(41, 16, 'self', 'Learning comics', 'delhi', 0, 6000, 0, 'testing', 'paid', 'campaigns/H84H26UVdfh1LWk8RONoDDcgXi5kHaMgfygeSO0w.jpg', 'pending', 0, '2026-01-09 05:18:22', '2026-01-09 05:18:22'),
(42, 16, 'self', 'Purfume', 'panindia', 0, 5000, 0, 'lm', 'barter', 'campaigns/oXjlx40K22vGOoHkQnhmCt5h69CpmrWNlmzItGHS.jpg', 'pending', 0, '2026-02-13 07:11:04', '2026-02-13 07:11:04'),
(43, 16, 'self', 'Purfume', 'panindia', 0, 5000, 0, 'lm', 'barter', 'campaigns/4twcb3fzPk3hqFjzwPiwj6qwgQVqw3flM3mcYQQn.jpg', 'pending', 0, '2026-02-13 08:35:39', '2026-02-13 08:35:39'),
(44, 16, 'self', 'PARTH AGNIHITRI', 'panindia', 15, 1500, 0, 'TEST', 'barter', 'campaigns/wYVpoxyYYeUsxYa3eK226GkSyYB0BKYkwVaOkdcq.jpg', 'active', 1, '2026-02-14 00:36:52', '2026-03-18 03:53:51'),
(58, 16, 'self', 'Summer Fitness Launch', 'delhi', 0, 10000, 0, 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', 'paid', NULL, 'pending', 0, '2026-03-12 08:42:25', '2026-03-12 08:42:25');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_footer_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `get_updates_section` text COLLATE utf8mb4_unicode_ci,
  `socials_visibility` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `x_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_content_visibility` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_content` longtext COLLATE utf8mb4_unicode_ci,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternate_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternate_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_location` longtext COLLATE utf8mb4_unicode_ci,
  `location_visibility` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` longtext COLLATE utf8mb4_unicode_ci,
  `alternate_location` longtext COLLATE utf8mb4_unicode_ci,
  `map_link_visibility` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_link` longtext COLLATE utf8mb4_unicode_ci,
  `copyright` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_icon`, `company_logo`, `company_footer_logo`, `company_name`, `get_updates_section`, `socials_visibility`, `facebook_url`, `x_url`, `linkedin_url`, `youtube_url`, `instagram_url`, `footer_content_visibility`, `footer_content`, `phone`, `whatsapp_phone`, `alternate_phone`, `email`, `alternate_email`, `footer_location`, `location_visibility`, `location`, `alternate_location`, `map_link_visibility`, `map_link`, `copyright`, `created_at`, `updated_at`) VALUES
(1, 'images/company/1765537560_693bf71871a7e.jpg', 'images/company/1765537560_693bf718729eb.png', 'images/company/1765537560_693bf71872ee4.png', 'Social Fox', 'Welcome to SocialFox', NULL, 'https://www.facebook.com/', 'https://x.com/', 'https://www.linkedin.com/', 'https://www.youtube.com/', 'https://www.instagram.com/', 'yes', '<p data-start=\"377\" data-end=\"469\">India&rsquo;s trusted platform for fair, transparent, and <strong>AI-driven</strong> influencer collaborations.</p>', '91 9958328499', NULL, NULL, 'info@mysocialfox.com', 'support@mysocialfox.com', NULL, NULL, '&lt;p&gt;G-165, Sector 64, Noida 201301&lt;/p&gt;', '', 'yes', 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d28022.146785165278!2d77.36055544055431!3d28.606725520475337!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sG-165%2C%20Sector%2064%2C%20Noida%20201301!5e0!3m2!1sen!2sin!4v1773206221783!5m2!1sen!2sin', '<p>SocialFox. Design &amp; Development by <a href=\"https://matebiz.com\" target=\"_blank\" rel=\"noopener\">Matebiz</a>. All Rights Reserved.</p>', '2025-12-10 13:03:52', '2026-03-22 01:35:29');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_features`
--

CREATE TABLE `dashboard_features` (
  `id` int(10) UNSIGNED NOT NULL,
  `position_order` int(10) UNSIGNED DEFAULT NULL,
  `role` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `i_tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `feature_headline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dashboard_features`
--

INSERT INTO `dashboard_features` (`id`, `position_order`, `role`, `i_tag`, `feature_headline`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'brand', '<i class=\"fas fa-bullhorn\"></i>', 'Campaign Management', '&lt;p class=&quot;feature-description&quot;&gt;Create briefs, set selection criteria, review applications, and monitor analytics with location tracking.&lt;/p&gt;\r\n&lt;ul class=&quot;feature-list&quot;&gt;\r\n&lt;li&gt;Create campaign briefs &amp;amp; objectives&lt;/li&gt;\r\n&lt;li&gt;Set follower/engagement criteria&lt;/li&gt;\r\n&lt;li&gt;Review &amp;amp; approve applications&lt;/li&gt;\r\n&lt;li&gt;Monitor campaign analytics&lt;/li&gt;\r\n&lt;li&gt;Location-based targeting&lt;/li&gt;\r\n&lt;/ul&gt;', 'active', '2026-02-10 05:45:50', '2026-02-10 05:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `deliverables`
--

CREATE TABLE `deliverables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `campagin_id` bigint(20) UNSIGNED NOT NULL,
  `reels` bigint(20) NOT NULL DEFAULT '0',
  `posts` bigint(20) NOT NULL DEFAULT '0',
  `stories` bigint(20) NOT NULL DEFAULT '0',
  `number_of_influencers_required` bigint(20) NOT NULL DEFAULT '0',
  `cost_per_influencer` double NOT NULL DEFAULT '0',
  `minimum_engagement_rate` double NOT NULL DEFAULT '0',
  `minimum_followers_required` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deliverables`
--

INSERT INTO `deliverables` (`id`, `campagin_id`, `reels`, `posts`, `stories`, `number_of_influencers_required`, `cost_per_influencer`, `minimum_engagement_rate`, `minimum_followers_required`, `is_active`, `created_at`, `updated_at`) VALUES
(38, 39, 1, 1, 0, 5, 500, 5, '1000-5000', 0, '2026-01-05 02:29:56', '2026-01-06 08:53:51'),
(39, 40, 0, 1, 0, 5, 500, 5, NULL, 0, '2026-01-05 02:35:47', '2026-01-05 02:35:47'),
(40, 41, 0, 0, 0, 2, 10000, 5, NULL, 0, '2026-01-09 05:18:23', '2026-01-09 05:18:23'),
(41, 42, 0, 0, 0, 2, 0, 2.5, '1000-5000', 0, '2026-02-13 07:11:04', '2026-02-13 07:11:04'),
(42, 43, 0, 0, 0, 2, 0, 2.5, '1000-5000', 0, '2026-02-13 08:35:39', '2026-02-13 08:35:39'),
(43, 44, 1, 1, 1, 1, 350, 2, '1000-5000', 0, '2026-02-14 00:36:52', '2026-02-14 00:45:39'),
(53, 58, 2, 0, 2, 5, 1000, 3.5, '5000', 0, '2026-03-12 08:42:25', '2026-03-12 08:42:25');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_order` int(10) UNSIGNED NOT NULL,
  `faq_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `position_order`, `faq_type`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'pricing_page', 'Can I change plans anytime?', '&lt;p&gt;Yes, you can upgrade or downgrade your plan at any time. Changes will be reflected in your next billing cycle.&lt;/p&gt;', 'active', '2025-12-10 03:57:42', '2025-12-10 03:57:42'),
(2, 2, 'pricing_page', 'Is there a free trial?', '&lt;p&gt;We offer a 14-day free trial for all plans. No credit card required to get started.&lt;/p&gt;', 'active', '2025-12-10 03:59:27', '2025-12-10 03:59:27'),
(3, 3, 'pricing_page', 'What payment methods do you accept?', '&lt;p&gt;We accept all major credit cards, PayPal, and bank transfers for Enterprise plans.&lt;/p&gt;', 'active', '2025-12-10 03:59:54', '2025-12-10 03:59:54'),
(4, 4, 'contact_page', 'How quickly can I get started with SocialFox?', '&lt;p&gt;You can get started immediately after signing up. Our team will reach out within 24 hours to begin your onboarding process and set up your first campaign.&lt;/p&gt;', 'active', '2025-12-10 06:49:00', '2025-12-10 06:49:00'),
(5, 5, 'contact_page', 'What types of brands do you work with?', '&lt;p&gt;We work with brands across all industries, from startups to Fortune 500 companies. Our platform is designed to match influencers with brands that align with their values and audience.&lt;/p&gt;', 'active', '2025-12-10 06:50:25', '2025-12-10 06:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`, `slug`, `position_order`, `created_at`, `updated_at`) VALUES
(1, 'Up to 5 campaigns', 'up-to-5-campaigns', 1, '2026-01-20 11:42:18', '2026-02-04 04:50:23'),
(2, 'Up to 20 campaigns', 'up_to_20_campaigns', 2, '2026-01-20 13:33:47', NULL),
(3, 'Basic analytics', 'basic-analytics', 3, '2026-02-04 04:40:53', '2026-02-04 04:40:53'),
(4, 'Unlimited campaigns', 'unlimited-campaigns', 4, '2026-02-04 06:19:12', '2026-02-04 06:19:12'),
(5, 'Custom analytics', 'custom-analytics', 5, '2026-02-04 06:48:36', '2026-02-04 06:48:36'),
(6, 'Up to 3 social media accounts', 'up-to-3-social-media-accounts', 6, '2026-02-05 02:48:29', '2026-02-05 02:48:29'),
(7, 'Basic analytics dashboar', 'basic-analytics-dashboar', 7, '2026-02-05 02:48:57', '2026-02-05 02:48:57'),
(8, 'Content scheduling (10 posts/month)', 'content-scheduling-10-postsmonth', 8, '2026-02-05 02:49:12', '2026-02-05 02:49:12'),
(9, 'Email support', 'email-support', 9, '2026-02-05 02:49:25', '2026-02-05 02:49:25'),
(10, 'Brand collaboration matching', 'brand-collaboration-matching', 10, '2026-02-05 02:49:35', '2026-02-05 02:49:35'),
(11, 'Advanced analytics', 'advanced-analytics', 11, '2026-02-05 02:49:46', '2026-02-05 02:49:46'),
(12, 'Priority support', 'priority-support', 12, '2026-02-05 02:49:56', '2026-02-05 02:49:56'),
(13, 'Up to 10 social media accounts', 'up-to-10-social-media-accounts', 13, '2026-02-05 02:50:21', '2026-02-05 02:50:21'),
(14, 'Unlimited social media accounts', 'unlimited-social-media-accounts', 14, '2026-02-05 02:50:36', '2026-02-05 02:50:36'),
(15, 'Advanced analytics & insights', 'advanced-analytics-insights', 15, '2026-02-05 02:51:03', '2026-02-05 02:51:03'),
(16, 'White-label solutions', 'white-label-solutions', 16, '2026-02-05 02:51:15', '2026-02-05 02:51:15'),
(17, 'Unlimited content scheduling', 'unlimited-content-scheduling', 17, '2026-02-05 02:51:25', '2026-02-05 02:51:25'),
(18, 'Team collaboration tools', 'team-collaboration-tools', 18, '2026-02-05 02:52:32', '2026-02-05 02:52:32'),
(19, 'Priority email & chat support', 'priority-email-chat-support', 19, '2026-02-05 02:52:53', '2026-02-05 02:52:53'),
(20, '24/7 dedicated support', '247-dedicated-support', 20, '2026-02-05 02:53:07', '2026-02-05 02:53:07'),
(21, 'Campaign management tools', 'campaign-management-tools', 21, '2026-02-05 02:53:18', '2026-02-05 02:53:18'),
(22, 'Custom integrations', 'custom-integrations', 22, '2026-02-05 02:53:39', '2026-02-05 02:53:39'),
(23, 'Audience growth optimization', 'audience-growth-optimization', 23, '2026-02-05 02:53:49', '2026-02-05 02:53:49'),
(24, 'Advanced automation', 'advanced-automation', 24, '2026-02-05 02:54:00', '2026-02-05 02:54:00'),
(25, 'Custom reporting', 'custom-reporting', 25, '2026-02-05 02:54:12', '2026-02-05 02:54:12'),
(26, 'Personal account manager', 'personal-account-manager', 26, '2026-02-05 02:54:23', '2026-02-05 02:54:23'),
(27, '1 Managed Campaign per month', '1-managed-campaign-per-month', 27, '2026-03-11 01:53:27', '2026-03-11 01:53:27'),
(28, 'AI-based influencer matching', 'ai-based-influencer-matching', 28, '2026-03-11 01:53:48', '2026-03-11 01:53:48'),
(29, 'Fraud detection & authenticity check', 'fraud-detection-authenticity-check', 29, '2026-03-11 01:54:25', '2026-03-11 01:54:25'),
(30, 'Campaign strategy & content brief', 'campaign-strategy-content-brief', 30, '2026-03-11 01:54:55', '2026-03-11 01:54:55'),
(31, 'Influencer coordination', 'influencer-coordination', 31, '2026-03-11 01:55:03', '2026-03-11 01:55:03'),
(32, 'Content approval support', 'content-approval-support', 32, '2026-03-11 01:55:33', '2026-03-11 01:55:33'),
(33, 'Basic campaign performance summary', 'basic-campaign-performance-summary', 33, '2026-03-11 01:56:07', '2026-03-11 01:56:07'),
(34, 'Up to 2 Managed Campaigns per month', 'up-to-2-managed-campaigns-per-month', 34, '2026-03-11 01:57:46', '2026-03-11 01:57:46'),
(35, 'Advanced AI influencer matching', 'advanced-ai-influencer-matching', 35, '2026-03-11 01:57:56', '2026-03-11 01:57:56'),
(36, 'Deep audience authenticity verification', 'deep-audience-authenticity-verification', 36, '2026-03-11 01:58:05', '2026-03-11 01:58:05'),
(37, 'Complete campaign strategy support', 'complete-campaign-strategy-support', 37, '2026-03-11 01:58:14', '2026-03-11 01:58:14'),
(38, 'Script guidance for influencers', 'script-guidance-for-influencers', 38, '2026-03-11 01:58:23', '2026-03-11 01:58:23'),
(39, 'Dedicated campaign coordination', 'dedicated-campaign-coordination', 39, '2026-03-11 01:58:39', '2026-03-11 01:58:39'),
(40, 'Content approval & optimization', 'content-approval-optimization', 40, '2026-03-11 01:58:47', '2026-03-11 01:58:47'),
(41, 'Performance tracking & summary report', 'performance-tracking-summary-report', 41, '2026-03-11 01:59:06', '2026-03-11 01:59:06'),
(42, 'Up to 10 Managed Campaigns per month', 'up-to-10-managed-campaigns-per-month', 42, '2026-03-11 02:01:23', '2026-03-11 02:01:23'),
(43, 'Priority AI matching & premium influencer access', 'priority-ai-matching-premium-influencer-access', 43, '2026-03-11 02:01:40', '2026-03-11 02:01:40'),
(44, 'Advanced fraud detection & audience analysis', 'advanced-fraud-detection-audience-analysis', 44, '2026-03-11 02:03:55', '2026-03-11 02:03:55'),
(45, 'Full campaign planning & execution', 'full-campaign-planning-execution', 45, '2026-03-11 02:04:04', '2026-03-11 02:04:04'),
(46, 'Creative direction & script supervision', 'creative-direction-script-supervision', 46, '2026-03-11 02:04:15', '2026-03-11 02:04:15'),
(47, 'Dedicated account support', 'dedicated-account-support', 47, '2026-03-11 02:04:44', '2026-03-11 02:04:44'),
(48, 'Performance analytics & campaign insights', 'performance-analytics-campaign-insights', 48, '2026-03-11 02:05:01', '2026-03-11 02:05:01'),
(49, 'Monthly growth consultation', 'monthly-growth-consultation', 49, '2026-03-11 02:05:26', '2026-03-11 02:05:26'),
(50, 'Best for small brands starting with influencer marketing', 'best-for-small-brands-starting-with-influencer-marketing', 50, '2026-03-18 04:16:05', '2026-03-18 04:16:05'),
(54, 'Ideal for testing influencer marketing safely and affordably.', 'ideal-for-testing-influencer-marketing-safely-and-affordably', 51, '2026-03-18 04:18:57', '2026-03-18 04:18:57');

-- --------------------------------------------------------

--
-- Table structure for table `feature_plan`
--

CREATE TABLE `feature_plan` (
  `id` int(11) NOT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `feature_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feature_plan`
--

INSERT INTO `feature_plan` (`id`, `plan_id`, `feature_id`, `value`) VALUES
(1, 1, 1, '5'),
(2, 2, 2, '20'),
(3, 3, 4, NULL),
(4, 3, 5, NULL),
(14, 5, 17, NULL),
(15, 5, 19, NULL),
(19, 6, 4, NULL),
(22, 6, 20, NULL),
(26, 4, 14, NULL),
(27, 5, 20, NULL),
(28, 4, 19, NULL),
(29, 4, 20, NULL),
(30, 6, 19, NULL),
(31, 7, 27, NULL),
(32, 7, 28, NULL),
(33, 7, 29, NULL),
(34, 7, 30, NULL),
(35, 7, 31, NULL),
(36, 7, 32, NULL),
(37, 7, 33, NULL),
(38, 8, 34, NULL),
(39, 8, 35, NULL),
(40, 8, 36, NULL),
(41, 8, 37, NULL),
(42, 8, 38, NULL),
(43, 8, 39, NULL),
(44, 8, 40, NULL),
(45, 8, 41, NULL),
(46, 9, 42, NULL),
(47, 9, 43, NULL),
(48, 9, 44, NULL),
(49, 9, 45, NULL),
(50, 9, 46, NULL),
(51, 9, 47, NULL),
(52, 9, 48, NULL),
(53, 9, 49, NULL),
(54, 10, 4, NULL),
(55, 10, 19, NULL),
(56, 10, 20, NULL),
(57, 11, 4, NULL),
(58, 11, 19, NULL),
(59, 11, 20, NULL),
(60, 12, 4, NULL),
(61, 12, 19, NULL),
(62, 12, 20, NULL),
(63, 13, 27, NULL),
(64, 13, 28, NULL),
(65, 13, 30, NULL),
(66, 13, 31, NULL),
(67, 13, 32, NULL),
(68, 13, 33, NULL),
(69, 13, 50, NULL),
(70, 13, 54, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference_id` bigint(20) UNSIGNED NOT NULL,
  `reference_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `reference_id`, `reference_type`, `file_type`, `file_name`, `file_path`, `upload_date`, `status`, `created_at`, `updated_at`) VALUES
(11, 1, 'banner', 'banner_icon', '1771999216_699e8ff079762.png', 'images/banners/1771999216_699e8ff079762.png', '2026-02-25 06:00:16', 'active', '2026-02-25 00:30:16', '2026-02-25 00:30:16'),
(12, 1, 'banner', 'banner_icon', '1771999216_699e8ff079ea8.png', 'images/banners/1771999216_699e8ff079ea8.png', '2026-02-25 06:00:16', 'active', '2026-02-25 00:30:16', '2026-02-25 00:30:16'),
(13, 1, 'banner', 'banner_icon', '1771999216_699e8ff07a4bf.png', 'images/banners/1771999216_699e8ff07a4bf.png', '2026-02-25 06:00:16', 'active', '2026-02-25 00:30:16', '2026-02-25 00:30:16'),
(14, 1, 'banner', 'banner_icon', '1771999216_699e8ff07aa4d.png', 'images/banners/1771999216_699e8ff07aa4d.png', '2026-02-25 06:00:16', 'active', '2026-02-25 00:30:16', '2026-02-25 00:30:16');

-- --------------------------------------------------------

--
-- Table structure for table `instagrams`
--

CREATE TABLE `instagrams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `connection_status` tinyint(1) NOT NULL DEFAULT '0',
  `long_lived_access_token` text COLLATE utf8mb4_unicode_ci,
  `instagram_token_expires_at` timestamp NULL DEFAULT NULL,
  `instagram_account_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `followers_count` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `media_count` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `engagement_rate` float NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `metrics_last_updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instagrams`
--

INSERT INTO `instagrams` (`id`, `user_id`, `connection_status`, `long_lived_access_token`, `instagram_token_expires_at`, `instagram_account_name`, `instagram_user_id`, `followers_count`, `media_count`, `engagement_rate`, `created_at`, `updated_at`, `metrics_last_updated_at`) VALUES
(2, 16, 0, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `instagram_settings`
--

CREATE TABLE `instagram_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `instagram_id` bigint(20) UNSIGNED NOT NULL,
  `auto_sync_posts` tinyint(1) NOT NULL DEFAULT '1',
  `engagement_tracking` tinyint(1) NOT NULL DEFAULT '1',
  `story_heighlights` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instagram_settings`
--

INSERT INTO `instagram_settings` (`id`, `instagram_id`, `auto_sync_posts`, `engagement_tracking`, `story_heighlights`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 0, NULL, '2026-01-13 05:41:26');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(5, 'default', '{\"uuid\":\"363b0354-145d-488f-b67c-78ca0a96919d\",\"displayName\":\"App\\\\Jobs\\\\ProcessCampaignImages\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ProcessCampaignImages\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\ProcessCampaignImages\\\":3:{s:10:\\\"campaignId\\\";i:43;s:9:\\\"productId\\\";i:38;s:8:\\\"tmpPaths\\\";a:1:{i:0;s:48:\\\"tmp\\/DjXneMkTHIYBIVN4MkpOJRRMnNay7CGq32190oVY.jpg\\\";}}\"},\"createdAt\":1770991539,\"delay\":null}', 0, NULL, 1770991539, 1770991539),
(6, 'default', '{\"uuid\":\"6f184dae-aca5-4139-a7e1-1b7e65d404be\",\"displayName\":\"App\\\\Jobs\\\\ProcessCampaignImages\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ProcessCampaignImages\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\ProcessCampaignImages\\\":3:{s:10:\\\"campaignId\\\";i:44;s:9:\\\"productId\\\";i:39;s:8:\\\"tmpPaths\\\";a:3:{i:0;s:48:\\\"tmp\\/LSKDYqEMf8FLfrX6hA0pX8a59yHb4pY4mFtX7xG0.jpg\\\";i:1;s:48:\\\"tmp\\/Kj49LQS8uIPbp7qaHzWfHk8JN6fpAoPxsdd02TFW.jpg\\\";i:2;s:48:\\\"tmp\\/TYTn2TjO6pQazBCzvfDFw1DRBs0M66sTHYl0J5je.jpg\\\";}}\"},\"createdAt\":1771049213,\"delay\":null}', 0, NULL, 1771049213, 1771049213),
(7, 'default', '{\"uuid\":\"5e26706f-3d0e-4024-b3f6-acb3f6a36297\",\"displayName\":\"App\\\\Jobs\\\\UpdateCampaginImages\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\UpdateCampaginImages\",\"command\":\"O:29:\\\"App\\\\Jobs\\\\UpdateCampaginImages\\\":3:{s:10:\\\"campaignId\\\";i:44;s:9:\\\"productId\\\";i:39;s:8:\\\"tmpPaths\\\";a:1:{i:0;s:48:\\\"tmp\\/m53gsJZgvtjqRo6BYBJey0dMiYQu5kLn9JpD3uxI.jpg\\\";}}\"},\"createdAt\":1771049739,\"delay\":null}', 0, NULL, 1771049739, 1771049739);

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `campagin_id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `brand_message_seen` tinyint(1) NOT NULL DEFAULT '0',
  `influencer_message_seen` tinyint(1) NOT NULL DEFAULT '0',
  `payment_amount` decimal(10,2) DEFAULT NULL,
  `razorpay_order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('text','payment','submission') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `work_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `campagin_id`, `sender_id`, `receiver_id`, `message`, `brand_message_seen`, `influencer_message_seen`, `payment_amount`, `razorpay_order_id`, `type`, `payment_status`, `work_status`, `created_at`, `updated_at`) VALUES
(29, 39, 16, 13, 'hy', 0, 0, NULL, NULL, 'text', 'pending', NULL, '2026-02-10 04:09:09', '2026-02-10 04:09:09'),
(30, 39, 13, 13, 'i will update work', 0, 0, NULL, NULL, 'text', 'pending', NULL, '2026-02-10 04:10:16', '2026-02-10 04:10:16'),
(31, 39, 16, 13, 'Payment of ₹118 successful.', 0, 0, 118.00, 'order_SEOeyCln0UMgSi', 'payment', 'paid', NULL, '2026-02-10 04:11:06', '2026-02-10 04:11:06'),
(32, 39, 13, 13, '27  set', 0, 0, NULL, NULL, 'text', 'pending', NULL, '2026-02-10 04:13:38', '2026-02-10 04:13:38'),
(33, 39, 13, 16, 'https://www.google.com/search?q=google+translate&oq=google+translate&gs_lcrp=EgZjaHJvbWUyBggAEEUYOTIGCAEQRRhA0gEIMTMzOGowajeoAgCwAgA&sourceid=chrome&ie=UTF-8', 0, 0, NULL, NULL, 'submission', 'pending', 'rejected', '2026-02-10 04:14:52', '2026-02-10 04:15:15'),
(34, 39, 13, 16, 'https://www.google.com/search?q=google+translate&oq=google+translate&gs_lcrp=EgZjaHJvbWUyBggAEEUYOTIGCAEQRRhA0gEIMTMzOGowajeoAgCwAgA&sourceid=chrome&ie=UTF-8', 0, 0, NULL, NULL, 'submission', 'pending', 'approved', '2026-02-10 04:15:01', '2026-02-10 04:15:19'),
(35, 39, 16, 13, 'hello', 0, 0, NULL, NULL, 'text', 'pending', NULL, '2026-02-12 03:26:28', '2026-02-12 03:26:28'),
(36, 39, 13, 16, 'hello', 0, 0, NULL, NULL, 'text', 'pending', NULL, '2026-02-12 03:27:46', '2026-02-12 03:27:46'),
(37, 39, 13, 16, 'hello', 0, 0, NULL, NULL, 'text', 'pending', NULL, '2026-02-12 03:28:13', '2026-02-12 03:28:13'),
(38, 39, 13, 16, 'yes', 0, 0, NULL, NULL, 'text', 'pending', NULL, '2026-02-12 04:01:31', '2026-02-12 04:01:31'),
(44, 39, 13, 16, 'check', 0, 0, NULL, NULL, 'text', 'pending', NULL, '2026-02-12 15:37:33', '2026-02-12 15:37:33'),
(45, 39, 13, 16, 'influencer', 0, 0, NULL, NULL, 'text', 'pending', NULL, '2026-02-12 15:38:16', '2026-02-12 15:38:16'),
(46, 39, 16, 13, 'brand', 0, 0, NULL, NULL, 'text', 'pending', NULL, '2026-02-12 15:38:35', '2026-02-12 15:38:35'),
(55, 44, 16, 13, 'Let Start Campagin', 0, 0, NULL, NULL, 'text', 'pending', NULL, '2026-02-16 07:32:09', '2026-02-16 07:32:09'),
(56, 44, 13, 16, 'Okay', 0, 0, NULL, NULL, 'text', 'pending', NULL, '2026-02-16 07:32:35', '2026-02-16 07:32:35'),
(57, 39, 13, 13, 'hello', 0, 0, NULL, NULL, 'text', 'pending', NULL, '2026-03-11 14:37:06', '2026-03-11 14:37:06');

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
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2025_11_11_115513_create_users_table', 1),
(4, '2025_11_11_121205_create_sessions_table', 2),
(5, '2014_10_12_100000_create_password_resets_table', 3),
(6, '2025_11_20_113249_create_user_profiles_table', 3),
(7, '2025_11_26_122943_create_wallets_table', 4),
(8, '2025_11_29_103854_add_coulmn_into_users_table', 5),
(9, '2025_12_10_093851_create_instagrams_table', 6),
(10, '2025_12_12_103924_add_columns_to_users_table', 7),
(11, '2025_12_19_112941_create_campagins_table', 8),
(12, '2025_12_19_113752_create_deliverables_table', 9),
(13, '2025_12_19_114748_create_products_table', 9),
(14, '2025_12_19_115732_create_target_audiences_table', 10),
(15, '2025_12_26_101207_create_table_products', 11),
(16, '2025_12_26_112345_create_product_images_table', 12),
(17, '2025_12_26_112447_add_campaign_image_to_campaign_table', 13),
(18, '2025_12_27_124726_create_orders_table', 14),
(19, '2025_12_27_160005_create_applications_table', 15),
(20, '2025_12_28_100719_create_payment_requests_table', 16),
(21, '2025_12_28_100745_create_activity_logs_table', 16),
(22, '2025_12_28_100835_create_payment_requests_table', 17),
(23, '2025_12_30_050859_create_bank_accounts_table', 18),
(24, '2026_01_08_125542_create_instagram_settings_table', 19),
(25, '2026_01_09_130235_create_notifactions_table', 20),
(26, '2026_01_13_125142_create_plans_table', 21),
(27, '2026_01_13_125143_create_features_table', 21),
(28, '2026_01_13_125326_create_feature_plan_table', 21),
(29, '2026_01_16_111350_create_subscriptions_table', 22),
(30, '2026_01_27_111125_create_messages_table', 23),
(31, '2026_02_05_115546_create_personal_access_tokens_table', 24);

-- --------------------------------------------------------

--
-- Table structure for table `notifactions`
--

CREATE TABLE `notifactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `new_campaign_matches` tinyint(1) NOT NULL DEFAULT '1',
  `application_updates` tinyint(1) NOT NULL DEFAULT '1',
  `payment_notifications` tinyint(1) NOT NULL DEFAULT '1',
  `email_notifications` tinyint(1) NOT NULL DEFAULT '1',
  `push_notifications` tinyint(1) NOT NULL DEFAULT '0',
  `sms_notifications` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifactions`
--

INSERT INTO `notifactions` (`id`, `user_id`, `new_campaign_matches`, `application_updates`, `payment_notifications`, `email_notifications`, `push_notifications`, `sms_notifications`, `created_at`, `updated_at`) VALUES
(1, 16, 1, 1, 1, 1, 1, 0, NULL, '2026-03-14 04:34:19'),
(2, 13, 1, 1, 1, 1, 0, 0, '2026-01-13 06:38:47', '2026-01-13 06:38:47'),
(3, 20, 1, 1, 1, 1, 0, 0, '2026-02-10 01:39:27', '2026-02-10 01:39:27'),
(5, 22, 1, 1, 1, 1, 0, 0, '2026-02-12 14:29:27', '2026-02-12 14:29:27'),
(6, 23, 1, 1, 1, 1, 0, 0, '2026-02-14 04:31:04', '2026-02-14 04:31:04'),
(13, 30, 1, 1, 1, 1, 0, 0, '2026-02-24 05:44:05', '2026-02-24 05:44:05'),
(15, 32, 1, 1, 1, 1, 0, 0, '2026-02-24 06:26:30', '2026-02-24 06:26:30'),
(16, 33, 1, 1, 1, 1, 0, 0, '2026-03-06 00:59:41', '2026-03-06 00:59:41'),
(17, 34, 1, 1, 1, 1, 0, 0, '2026-03-06 01:28:37', '2026-03-06 01:28:37'),
(18, 35, 1, 1, 1, 1, 0, 0, '2026-03-06 06:35:41', '2026-03-06 06:35:41'),
(19, 36, 1, 1, 1, 1, 0, 0, '2026-03-08 23:39:03', '2026-03-08 23:39:03'),
(20, 37, 1, 1, 1, 1, 0, 0, '2026-03-08 23:58:54', '2026-03-08 23:58:54'),
(21, 39, 1, 1, 1, 1, 0, 0, '2026-03-09 00:05:30', '2026-03-09 00:05:30'),
(22, 40, 1, 1, 1, 1, 0, 0, '2026-03-09 00:10:21', '2026-03-09 00:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `campagin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `razorpay_order_id` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentId` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` bigint(20) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `campagin_id`, `user_id`, `razorpay_order_id`, `paymentId`, `amount`, `type`, `method`, `transaction_title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(7, NULL, 16, 'order_Rwuco0nxpFDSLX', NULL, 50000, 'credit', NULL, NULL, NULL, 'Pending', '2025-12-27 23:44:37', '2025-12-27 23:44:37'),
(8, NULL, 16, 'order_RwyyjFyhkAtlG4', NULL, 50000000, 'credit', NULL, NULL, NULL, 'Pending', '2025-12-28 04:00:09', '2025-12-28 04:00:09'),
(9, NULL, 16, 'order_Rwz3UoSphjPkUP', NULL, 50000000, 'credit', NULL, NULL, NULL, 'Pending', '2025-12-28 04:04:40', '2025-12-28 04:04:40'),
(10, NULL, 16, 'order_Rwz3ry4khRq0eX', NULL, 50000000, 'credit', NULL, NULL, NULL, 'Pending', '2025-12-28 04:05:01', '2025-12-28 04:05:01'),
(11, NULL, 16, 'order_Rwz6E1bhkG8DJk', NULL, 50000000, 'credit', NULL, NULL, NULL, 'Pending', '2025-12-28 04:07:15', '2025-12-28 04:07:15'),
(12, NULL, 16, 'order_Rwz7uqhNl3sxXN', NULL, 500000, 'credit', NULL, 'Wallet Topup', NULL, 'Success', '2025-12-28 04:08:51', '2025-12-28 04:09:20'),
(13, NULL, 16, 'order_RwzCbt2U7P2Ea4', 'pay_RwzCmIFJdvui8F', 1000000, 'credit', NULL, 'Wallet Topup', NULL, 'Success', '2025-12-28 04:13:17', '2025-12-28 04:13:52'),
(14, NULL, 16, 'order_RwzGOMVwwZk4Xk', NULL, 1000000, 'credit', NULL, NULL, NULL, 'Pending', '2025-12-28 04:16:52', '2025-12-28 04:16:52'),
(15, NULL, 16, NULL, NULL, 5000, 'debit', NULL, 'Withdrawal Request', 'Withdrawal Request for Rs 5000', 'Pending', '2025-12-28 07:41:36', '2025-12-28 07:41:36'),
(16, NULL, 16, 'order_RxPSbLBTQZES8q', 'pay_RxPSmNZRjNVn6i', 500000, 'credit', NULL, 'Wallet Topup', NULL, 'Completed', '2025-12-29 05:54:28', '2025-12-29 05:54:53'),
(17, NULL, 16, NULL, NULL, 500000, 'debit', NULL, 'Withdrawl Request', 'Withdrawal Request for Rs 5000', 'Pending', '2025-12-30 00:28:55', '2025-12-30 00:28:55'),
(18, NULL, 16, 'order_S07gKP3c5g4TFa', 'pay_S07gV39Ks3zHwS', 1000000, 'credit', NULL, NULL, NULL, 'Completed', '2026-01-05 02:27:59', '2026-01-05 02:28:24'),
(19, NULL, 16, 'order_S1MEgrZJqWaQVj', NULL, 500000, 'credit', NULL, NULL, NULL, 'Pending', '2026-01-08 05:21:13', '2026-01-08 05:21:13'),
(20, NULL, 16, 'order_S1kabfSKMUK8G6', 'pay_S1kaqKgbeQmxJm', 500000, 'credit', NULL, NULL, NULL, 'Completed', '2026-01-09 05:10:37', '2026-01-09 05:11:06'),
(21, NULL, 16, 'order_S1kbNDvEdx3AHj', NULL, 500000, 'credit', NULL, NULL, NULL, 'Pending', '2026-01-09 05:11:20', '2026-01-09 05:11:20'),
(22, NULL, 16, NULL, NULL, 500000, 'debit', NULL, 'Withdrawl Request', 'Withdrawal Request for Rs 5000', 'Pending', '2026-01-09 05:12:44', '2026-01-09 05:12:44'),
(23, 39, 16, 'order_S9CyDEV241DTCi', NULL, 10000, 'debit', NULL, 'Campaign Payment - new campagins', 'Payment to @webtestmail for new campagins', 'pending', '2026-01-28 01:29:23', '2026-01-28 01:29:23'),
(24, 39, 16, 'order_S9CyoHx9ocTZEZ', NULL, 10000, 'debit', NULL, 'Campaign Payment - new campagins', 'Payment to @webtestmail for new campagins', 'pending', '2026-01-28 01:29:57', '2026-01-28 01:29:57'),
(25, 39, 16, 'order_S9D5HVDFYOFH1V', NULL, 10000, 'debit', NULL, 'Campaign Payment - new campagins', 'Payment to @webtestmail for new campagins', 'pending', '2026-01-28 01:36:05', '2026-01-28 01:36:05'),
(26, 39, 16, 'order_S9DALsNgIcWT0r', NULL, 10000, 'debit', NULL, 'Campaign Payment - new campagins', 'Payment to @webtestmail for new campagins', 'pending', '2026-01-28 01:40:53', '2026-01-28 01:40:53'),
(27, 39, 16, 'order_S9DCRQXAz27yJI', NULL, 10000, 'debit', NULL, 'Campaign Payment - new campagins', 'Payment to @webtestmail for new campagins', 'pending', '2026-01-28 01:42:52', '2026-01-28 01:42:52'),
(28, 39, 16, 'order_S9DFccqnfmxi6F', NULL, 10000, 'debit', NULL, 'Campaign Payment - new campagins', 'Payment to @webtestmail for new campagins', 'pending', '2026-01-28 01:45:52', '2026-01-28 01:45:52'),
(29, 39, 16, 'order_S9DNiPskMBQcgi', NULL, 10000, 'debit', NULL, 'Campaign Payment - new campagins', 'Payment to @webtestmail for new campagins', 'pending', '2026-01-28 01:53:32', '2026-01-28 01:53:32'),
(30, 39, 16, 'order_S9DOkbt9NhmSAa', NULL, 10000, 'debit', NULL, 'Campaign Payment - new campagins', 'Payment to @webtestmail for new campagins', 'pending', '2026-01-28 01:54:31', '2026-01-28 01:54:31'),
(31, 39, 16, 'order_S9DTPPgRdAV7HE', NULL, 10000, 'debit', 'upi', 'Campaign Payment - new campagins', 'Payment to @webtestmail for new campagins', 'Success', '2026-01-28 01:58:55', '2026-01-28 01:59:23'),
(32, 39, 16, 'order_S9G2CltWBdN1GI', NULL, 14000, 'debit', NULL, 'Campaign Payment - new campagins', 'Payment to @webtestmail for new campagins', 'pending', '2026-01-28 04:29:15', '2026-01-28 04:29:15'),
(33, 39, 16, 'order_S9G2OOKlMHI26m', NULL, 14000, 'debit', NULL, 'Campaign Payment - new campagins', 'Payment to @webtestmail for new campagins', 'pending', '2026-01-28 04:29:26', '2026-01-28 04:29:26'),
(34, 39, 16, 'order_S9iHdkQxzkJT9d', NULL, 11800, 'debit', 'upi', 'Campaign Payment - new campagins', 'Payment to @webtestmail for new campagins', 'Success', '2026-01-29 08:07:17', '2026-01-29 08:08:07'),
(35, 39, 16, 'order_SC4cAMMO4v1Q0S', NULL, 11800, 'debit', 'upi', 'Campaign Payment - new campagins', 'Payment to @webtestmail for new campagins', 'Success', '2026-02-04 07:15:59', '2026-02-04 07:16:30'),
(36, NULL, 16, 'order_SC4gEbwavLbNUk', 'pay_SC4gVh90uGDFA6', 500000, 'credit', NULL, NULL, NULL, 'Completed', '2026-02-04 07:19:50', '2026-02-04 07:20:21'),
(37, 39, 16, 'order_SEOcqvNNTe1YOl', NULL, 11800, 'debit', NULL, 'Campaign Payment - new campagins', 'Payment to @webtestmail for new campagins', 'pending', '2026-02-10 04:08:30', '2026-02-10 04:08:30'),
(38, 39, 16, 'order_SEOeyCln0UMgSi', NULL, 11800, 'debit', 'upi', 'Campaign Payment - new campagins', 'Payment to @webtestmail for new campagins', 'Success', '2026-02-10 04:10:31', '2026-02-10 04:11:07'),
(39, NULL, 16, 'order_SFvDOZixBbo9YU', 'pay_SFvEMY6nRoigr5', 500000, 'credit', NULL, NULL, NULL, 'Completed', '2026-02-14 00:40:18', '2026-02-14 00:41:28'),
(40, NULL, 16, 'order_SFvWzGwPMW0LFo', 'pay_SFvXFy7ipzkaGl', 1000000, 'credit', NULL, NULL, NULL, 'Completed', '2026-02-14 00:58:50', '2026-02-14 00:59:23'),
(41, 44, 16, 'order_SGnVYAf6kvWogg', NULL, 88500, 'debit', 'upi', 'Campaign Payment - PARTH AGNIHITRI', 'Payment to @webtestmail for PARTH AGNIHITRI', 'pending', '2026-02-16 05:46:56', '2026-02-16 05:47:25'),
(42, 44, 16, 'order_SGni35MXtlaoUR', NULL, 88500, 'debit', 'upi', 'Campaign Payment - PARTH AGNIHITRI', 'Payment to @webtestmail for PARTH AGNIHITRI', 'pending', '2026-02-16 05:58:46', '2026-02-16 05:59:11'),
(43, NULL, 16, 'order_SP6pVlQU5Bf9cN', 'pay_SP6psqVcMaQy2L', 500000, 'credit', NULL, 'Wallet Top Up', NULL, 'Completed', '2026-03-09 05:53:01', '2026-03-09 05:53:38'),
(44, NULL, 16, NULL, NULL, 100000, 'debit', NULL, 'Withdrawl Request', 'Withdrawal Request for Rs 1000', 'Pending', '2026-03-09 05:54:01', '2026-03-09 05:54:01'),
(45, NULL, 16, 'order_SQKrGaFQwHPnIH', 'pay_SQKrRrAkHHgMdV', 2500000, 'credit', NULL, 'Wallet Top Up', NULL, 'Completed', '2026-03-12 08:15:24', '2026-03-12 08:15:49'),
(46, NULL, 13, NULL, NULL, 49400, 'debit', NULL, 'Withdrawl Request', 'Withdrawal Request for Rs 494', 'Pending', '2026-03-12 15:43:05', '2026-03-12 15:43:05'),
(47, NULL, 16, 'order_SR4CHZbsHlol91', NULL, 5000000, 'credit', NULL, 'Wallet Top Up', NULL, 'Pending', '2026-03-14 04:36:30', '2026-03-14 04:36:30'),
(48, NULL, 16, 'order_SR4CWo4FOSjXU9', NULL, 5000000, 'credit', NULL, 'Wallet Top Up', NULL, 'Pending', '2026-03-14 04:36:44', '2026-03-14 04:36:44'),
(49, NULL, 16, 'order_SR4Cg0WYMzYXi4', NULL, 5000000, 'credit', NULL, 'Wallet Top Up', NULL, 'Pending', '2026-03-14 04:36:52', '2026-03-14 04:36:52'),
(50, NULL, 16, NULL, NULL, 500000, 'debit', NULL, 'Withdrawl Request', 'Withdrawal Request for Rs 5000', 'Pending', '2026-03-14 04:39:20', '2026-03-14 04:39:20'),
(51, NULL, 16, 'order_SR4PFve2Nprh3b', NULL, 500000, 'credit', NULL, 'Wallet Top Up', NULL, 'Pending', '2026-03-14 04:48:47', '2026-03-14 04:48:47'),
(52, NULL, 16, 'order_SR4PaVz0A6vnmF', 'pay_SR4QAIkowNbBge', 500000, 'credit', NULL, 'Wallet Top Up', NULL, 'Completed', '2026-03-14 04:49:06', '2026-03-14 04:49:54'),
(53, NULL, 16, 'order_SR4QnCrqfUckHk', 'pay_SR4R5MN2t3QBVH', 1000000, 'credit', NULL, 'Wallet Top Up', NULL, 'Completed', '2026-03-14 04:50:14', '2026-03-14 04:50:47'),
(54, NULL, 16, 'order_SR4SO3MAQZZoWS', NULL, 500000, 'credit', NULL, 'Wallet Top Up', NULL, 'Pending', '2026-03-14 04:51:45', '2026-03-14 04:51:45'),
(55, NULL, 16, NULL, NULL, 500000, 'debit', NULL, 'Withdrawl Request', 'Withdrawal Request for Rs 5000', 'Pending', '2026-03-14 04:53:37', '2026-03-14 04:53:37'),
(56, NULL, 16, NULL, NULL, 50000, 'debit', NULL, 'Withdrawal Request', 'Withdrawal Request for Rs 500', 'Pending', '2026-03-19 02:49:43', '2026-03-19 02:49:43'),
(57, NULL, 16, 'order_ST5iea2RFCBUAt', NULL, 500000, 'credit', 'razorpay', 'Wallet Top Up', NULL, 'Pending', '2026-03-19 07:23:51', '2026-03-19 07:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_order` int(10) UNSIGNED NOT NULL,
  `header_footer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_page_urls` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visibility` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_headline` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breadcrumb_headline` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breadcrumb_description` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `position_order`, `header_footer_name`, `client_page_urls`, `visibility`, `page_name`, `page_headline`, `breadcrumb_headline`, `page_image`, `breadcrumb_description`, `description`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Home', 'home', 'both', 'Home', 'Home', NULL, NULL, '', '', 'Home', 'home', '&lt;p&gt;Home&lt;/p&gt;', 'active', '2025-12-05 02:36:30', '2026-03-16 23:51:00'),
(2, 2, 'Blogs', 'blogs', 'both', 'Blogs', 'Our Latest News And Blog', 'Blogs', 'images/pages/1765136751_6935d96fa9bbc.png', '&lt;p&gt;The All-In-One Platform For Digital Content Creators&lt;/p&gt;', '', 'Blogs', 'blogs', '&lt;p&gt;Blogs&lt;/p&gt;', 'active', '2025-12-05 02:36:30', '2026-03-16 23:51:53'),
(3, 3, 'Services', 'services', 'both', 'Services', 'Our Services', 'SocialFox Services', '', '&lt;p&gt;Comprehensive Solutions for Digital Content Creators&lt;/p&gt;', '&lt;p&gt;Comprehensive solutions to grow your influence and maximize your impact&lt;/p&gt;', 'Our Services', 'our services', '&lt;p&gt;Our Services&lt;/p&gt;', 'active', '2025-12-05 02:36:30', '2026-03-16 23:51:14'),
(4, 4, 'Single Service', 'single-service', 'none', 'Single Service', 'Single Service', NULL, '', '', '', 'Single Service', NULL, '', 'active', '2025-12-05 02:36:30', '2025-12-10 00:10:28'),
(5, 5, 'Pricing', 'pricing', 'header', 'Pricing', 'Brand Plans – Social Fox', 'At Social Fox, we believe in flexibility.', '', '&lt;p&gt;Choose the Perfect Plan for Your Growth&lt;/p&gt;', '&lt;p dir=&quot;ltr&quot;&gt;Brands can use our platform for free and connect with influencers independently &amp;mdash; or choose a managed plan where our team handles everything for you.&lt;/p&gt;', 'Pricing', 'Pricing', '&lt;p&gt;Pricing&lt;/p&gt;', 'active', '2025-12-05 02:36:30', '2026-03-09 23:35:21'),
(6, 6, 'About', 'about', 'both', 'About Us', 'About Us', 'About SocialFox', '', '&lt;p&gt;The All-In-One Platform For Digital Content Creators&lt;/p&gt;', '', 'About Us', 'about us', '&lt;p&gt;About Us&lt;/p&gt;', 'active', '2025-12-05 02:36:30', '2026-03-16 23:51:40'),
(7, 7, 'Contact', 'contact', 'both', 'Contact Us', 'Send Us a Message', 'Contact SocialFox', '', '&lt;p&gt;Get in Touch with Our Expert Team&lt;/p&gt;', '', 'Contact Us', 'contact us', '&lt;p&gt;Contact Us&lt;/p&gt;', 'active', '2025-12-05 02:36:30', '2026-03-16 23:51:58');

-- --------------------------------------------------------

--
-- Table structure for table `page_sections`
--

CREATE TABLE `page_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `page_id` int(10) UNSIGNED NOT NULL,
  `position_order` int(10) UNSIGNED NOT NULL,
  `default_section_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_headline` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `button_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_icon` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `more_images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_sections`
--

INSERT INTO `page_sections` (`id`, `parent_id`, `page_id`, `position_order`, `default_section_name`, `section_title`, `section_headline`, `description`, `button_name`, `button_link`, `section_icon`, `section_image`, `more_images`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 4, 1, 'single-service-section-1', NULL, 'Who Is This For?', '&lt;p dir=&quot;ltr&quot;&gt;Social Fox is perfect for:&lt;/p&gt;', NULL, NULL, NULL, NULL, NULL, 'active', '2025-12-09 06:48:05', '2026-03-11 01:13:27'),
(2, 1, 4, 1, NULL, NULL, 'Nano influencers (1k+ followers)', '', NULL, NULL, NULL, 'images/pages/sections/1765283315_693815f3565e3.jpg', NULL, 'active', '2025-12-09 06:58:35', '2026-03-11 01:26:50'),
(3, NULL, 4, 2, 'single-service-section-2', NULL, 'How It Works', '&lt;p dir=&quot;ltr&quot;&gt;Simple. Transparent. Fair.&lt;/p&gt;', NULL, NULL, NULL, NULL, NULL, 'active', '2025-12-09 06:48:05', '2026-03-11 01:26:14'),
(4, 3, 4, 1, NULL, NULL, 'Create your profile', '', NULL, NULL, NULL, NULL, NULL, 'active', '2025-12-09 07:34:42', '2026-03-11 01:18:31'),
(5, 3, 4, 2, NULL, NULL, 'Get verified through engagement check', '', NULL, NULL, NULL, NULL, NULL, 'active', '2025-12-09 07:36:07', '2026-03-11 01:22:08'),
(6, NULL, 3, 1, 'services-section-1', NULL, 'Our Process', '&lt;p&gt;Simple steps to transform your digital presence&lt;/p&gt;', NULL, NULL, NULL, NULL, NULL, 'active', '2025-12-10 00:12:17', '2025-12-10 00:12:17'),
(7, 6, 3, 1, NULL, NULL, 'Discovery', '&lt;p&gt;We analyze your current presence and understand your goals to create a personalized strategy.&lt;/p&gt;', NULL, NULL, NULL, NULL, NULL, 'active', '2025-12-10 00:13:00', '2025-12-10 00:13:00'),
(8, 6, 3, 2, NULL, NULL, 'Strategy', '&lt;p&gt;Develop a comprehensive plan tailored to your brand, audience, and business objectives.&lt;/p&gt;', NULL, NULL, NULL, NULL, NULL, 'active', '2025-12-10 00:13:21', '2025-12-10 00:13:21'),
(9, NULL, 5, 1, 'pricing-section-1', NULL, 'Pricing FAQ', '', NULL, NULL, NULL, NULL, NULL, 'active', '2025-12-10 04:05:18', '2025-12-10 04:05:18'),
(10, NULL, 6, 1, 'about-section-1', NULL, 'Who We Are', '&lt;p dir=&quot;ltr&quot;&gt;Social Fox is an AI-powered influencer marketing platform built to create a fair, transparent, and fraud-free ecosystem for small brands and emerging creators in India.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;We believe influencer marketing should not be limited to big brands with big budgets. Today, thousands of small businesses struggle to find the right influencers, and thousands of talented creators struggle to get genuine brand deals.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;We built Social Fox to change that.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;Our platform connects brands with influencers based on real audience data, smart AI matchmaking, and verified engagement insights &amp;mdash; ensuring every collaboration is authentic and result-driven.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;Unlike traditional agencies, we don&amp;rsquo;t believe in high commissions or favoritism. We operate on a simple subscription model, making influencer marketing affordable and accessible for everyone.&lt;/p&gt;', NULL, NULL, NULL, 'images/pages/sections/1765360376_693942f88e08b.jfif', NULL, 'active', '2025-12-10 04:22:56', '2026-03-09 23:31:05'),
(11, NULL, 6, 2, 'about-section-2', NULL, 'Our Vision, Mission & Commitment', '&lt;p dir=&quot;ltr&quot;&gt;At Social Fox, our vision is to build India&amp;rsquo;s most trusted and transparent influencer marketing ecosystem.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;We believe influencer marketing should not be limited to big brands, celebrity influencers, or agencies charging heavy commissions. Our goal is to democratize influencer marketing by giving small brands and emerging creators the same growth opportunities that were once reserved only for large players.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;We envision a future where every small brand can scale confidently using influencer marketing, every genuine creator can earn consistently through authentic collaborations, and fraud or fake followers no longer harm marketing budgets. Through smart technology and AI-driven systems, we aim to ensure fairness, transparency, and real results for everyone involved.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;Social Fox is not just a platform &amp;mdash; it is a movement toward ethical, data-driven, and accessible influencer marketing in India.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;Our mission is simple: to make influencer marketing accessible, honest, and profitable for small brands and emerging creators.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;We achieve this by using AI-powered matchmaking to connect the right brands with the right influencers, detecting fake followers and fake engagement before collaborations happen, and removing high commission barriers through an affordable subscription model. Beyond technology, we also provide educational resources, weekly community support, and growth-focused insights so both brands and creators can learn, improve, and succeed together.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;Social Fox exists because the influencer marketing industry has long faced serious challenges. Agencies often charge high commissions, fake engagement misleads brands into poor investments, small businesses are frequently ignored, and new creators struggle to get fair opportunities. We created Social Fox to solve these problems and build a platform where transparency, fairness, and growth always come first.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;We are committed to maintaining zero tolerance for fraud, ensuring equal opportunity for small brands, providing fair access to emerging creators, continuously innovating through AI technology, and supporting our community with the right knowledge and tools.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;Because when small brands grow and creators earn honestly &amp;mdash; everyone wins.&lt;/p&gt;', NULL, NULL, NULL, NULL, NULL, 'active', '2025-12-10 04:23:23', '2026-03-09 23:31:49'),
(12, NULL, 6, 3, 'about-section-3', NULL, 'Meet Our Top Influencers', '', NULL, NULL, NULL, NULL, NULL, 'active', '2025-12-10 04:23:59', '2025-12-10 04:23:59'),
(13, NULL, 7, 1, 'contact-section-1', NULL, 'Other Ways to Connect', '', NULL, NULL, NULL, NULL, NULL, 'active', '2025-12-10 06:52:11', '2025-12-10 06:52:11'),
(14, 13, 7, 1, NULL, NULL, 'WhatsApp', '&lt;p&gt;Quick support via WhatsApp messaging&lt;/p&gt;', NULL, NULL, '<i class=\"fab fa-whatsapp\"></i>', NULL, NULL, 'active', '2025-12-10 06:59:24', '2025-12-10 06:59:24'),
(15, 13, 7, 2, NULL, NULL, 'Telegram', '&lt;p&gt;Join our Telegram channel for updates&lt;/p&gt;', NULL, NULL, '<i class=\"fab fa-telegram\"></i>', NULL, NULL, 'active', '2025-12-10 07:00:04', '2025-12-10 07:00:04'),
(16, NULL, 7, 2, 'contact-section-2', NULL, 'Frequently Asked Questions', '', NULL, NULL, NULL, NULL, NULL, 'active', '2025-12-10 07:10:50', '2025-12-10 07:10:50'),
(17, NULL, 1, 1, 'home-section-1', NULL, 'Our Partners In Success, The Brands Behind the Stars', '', NULL, NULL, NULL, NULL, NULL, 'active', '2025-12-13 00:50:11', '2025-12-13 00:50:11'),
(18, NULL, 1, 2, 'home-section-2', NULL, 'Check by Platform', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum quis est tempore voluptatibus, laborum magnam.&lt;/p&gt;', NULL, NULL, NULL, NULL, NULL, 'active', '2025-12-13 00:53:23', '2025-12-13 00:53:23'),
(19, 18, 1, 1, NULL, NULL, 'Facebook', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;/p&gt;', NULL, NULL, '<i class=\"fab fa-facebook-f platform-icon\"></i>', 'images/pages/sections/1765609279_693d0f3f7793c.jpg', NULL, 'active', '2025-12-13 01:15:15', '2025-12-13 01:31:19'),
(20, 18, 1, 2, NULL, NULL, 'Instagram', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;/p&gt;', NULL, NULL, '<i class=\"fab fa-instagram platform-icon\"></i>', 'images/pages/sections/1765609294_693d0f4e46c0f.jpg', NULL, 'active', '2025-12-13 01:15:53', '2025-12-13 01:31:34'),
(21, 18, 1, 3, NULL, NULL, 'YouTube', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;/p&gt;', NULL, NULL, '<i class=\"fab fa-youtube platform-icon\"></i>', 'images/pages/sections/1765609312_693d0f609e292.jpg', NULL, 'active', '2025-12-13 01:16:19', '2025-12-13 01:31:52'),
(22, 18, 1, 4, NULL, NULL, 'TikTok', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;/p&gt;', NULL, NULL, '<i class=\"fab fa-tiktok platform-icon\"></i>', 'images/pages/sections/1765609342_693d0f7ecb224.jpg', NULL, 'active', '2025-12-13 01:16:47', '2025-12-13 01:32:22'),
(23, NULL, 1, 3, 'home-section-3', 'This Is Title', 'Boost Your Reach With the Power of Influencers', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.&lt;/p&gt;', 'Social Fox', NULL, NULL, 'images/pages/sections/1765612065_693d1a21b9334.png', '[\"images\\/pages\\/sections\\/1765612065_693d1a21ba8e6.png\"]', 'active', '2025-12-13 02:17:45', '2025-12-13 02:17:45'),
(24, 23, 1, 1, NULL, NULL, '25', '&lt;p&gt;&lt;span class=&quot;stat-unit&quot;&gt;M&lt;/span&gt; &lt;span class=&quot;stat-label&quot;&gt;Followers&lt;/span&gt;&lt;/p&gt;', NULL, NULL, NULL, NULL, NULL, 'active', '2025-12-13 02:25:30', '2025-12-13 02:25:30'),
(25, 23, 1, 2, NULL, NULL, '80', '&lt;p&gt;&lt;span class=&quot;stat-unit&quot;&gt;K&lt;/span&gt; &lt;span class=&quot;stat-label&quot;&gt;Engagement&lt;/span&gt;&lt;/p&gt;', NULL, NULL, NULL, NULL, NULL, 'active', '2025-12-13 02:26:04', '2025-12-13 02:26:04'),
(26, 23, 1, 3, NULL, NULL, '1000', '&lt;p&gt;&lt;span class=&quot;stat-unit&quot;&gt;+&lt;/span&gt; &lt;span class=&quot;stat-label&quot;&gt;Campaigns&lt;/span&gt;&lt;/p&gt;', NULL, NULL, NULL, NULL, NULL, 'active', '2025-12-13 02:26:37', '2025-12-13 02:26:37'),
(27, NULL, 1, 4, 'home-section-4', NULL, 'Stay Ahead of the Competition Smart Digital Marketing', '&lt;p&gt;Social Media Integration Expand your brand&#039;s reach through strategic social media marketing&lt;/p&gt;', 'Get Started', NULL, NULL, NULL, NULL, 'active', '2025-12-13 02:48:27', '2025-12-13 02:48:27'),
(28, NULL, 1, 5, 'home-section-5', NULL, 'Feature Section', '&lt;p&gt;This is feature section at Home page.&lt;/p&gt;', NULL, NULL, NULL, NULL, NULL, 'active', '2025-12-13 02:51:01', '2025-12-13 02:51:01'),
(29, 28, 1, 1, NULL, NULL, 'Maximizing Results On Any Strategies', '', NULL, NULL, '<i class=\"fas fa-chart-line\"></i>', NULL, NULL, 'active', '2025-12-13 02:51:57', '2025-12-13 02:51:57'),
(30, 28, 1, 2, NULL, NULL, 'Efficient Marketing For Real Business', '', NULL, NULL, '<i class=\"fas fa-bullhorn\"></i>', NULL, NULL, 'active', '2025-12-13 02:51:57', '2025-12-13 02:51:57'),
(31, 28, 1, 3, NULL, NULL, 'Smarter Marketing For Sustainable', '', NULL, NULL, '<i class=\"fas fa-calendar-alt\"></i>', NULL, NULL, 'active', '2025-12-13 02:51:57', '2025-12-13 02:51:57'),
(32, 28, 1, 4, NULL, NULL, 'Effective & Digital Marketing', '', NULL, NULL, '<i class=\"fas fa-rocket\"></i>', NULL, NULL, 'active', '2025-12-13 02:51:57', '2025-12-13 02:51:57'),
(33, NULL, 1, 6, 'home-section-6', NULL, 'Our Latest News And Blog', '', NULL, NULL, NULL, NULL, NULL, 'active', '2025-12-13 04:10:37', '2025-12-13 04:10:37'),
(34, NULL, 1, 7, 'home-section-7', NULL, 'Success Stories How Feedback Drives Our Results', '', NULL, NULL, NULL, NULL, NULL, 'active', '2025-12-13 04:10:57', '2025-12-13 04:10:57'),
(35, 3, 4, 3, NULL, NULL, 'Get matched with relevant brands', '', NULL, NULL, NULL, NULL, NULL, 'active', '2026-03-11 01:25:14', '2026-03-11 01:25:14'),
(36, 3, 4, 4, NULL, NULL, 'Collaborate & earn', '', NULL, NULL, NULL, NULL, NULL, 'active', '2026-03-11 01:25:33', '2026-03-11 01:25:33'),
(37, 3, 4, 5, NULL, NULL, 'Grow consistently', '', NULL, NULL, NULL, NULL, NULL, 'active', '2026-03-11 01:25:50', '2026-03-11 01:25:50'),
(38, 1, 4, 2, NULL, NULL, 'Micro influencers (5k–100k followers)', '', NULL, NULL, NULL, 'images/pages/sections/1773212406_69b112f61189b.jpg', NULL, 'active', '2026-03-11 01:28:12', '2026-03-11 01:30:06'),
(39, 1, 4, 3, NULL, NULL, 'Regional creators in India', '', NULL, NULL, NULL, 'images/pages/sections/1773212434_69b1131245040.jpg', NULL, 'active', '2026-03-11 01:28:23', '2026-03-11 01:30:34'),
(40, 1, 4, 4, NULL, NULL, 'Emerging YouTubers & Instagram creators', '', NULL, NULL, NULL, 'images/pages/sections/1773212349_69b112bd58d55.jpg', NULL, 'active', '2026-03-11 01:29:09', '2026-03-11 01:29:09'),
(41, 1, 4, 5, NULL, NULL, 'Content creators ready to earn seriously', '', NULL, NULL, NULL, 'images/pages/sections/1773212371_69b112d3d900a.jpg', NULL, 'active', '2026-03-11 01:29:31', '2026-03-11 01:29:31');

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
-- Table structure for table `payment_requests`
--

CREATE TABLE `payment_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` bigint(20) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `payout_id` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_note` text COLLATE utf8mb4_unicode_ci,
  `admin_note` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_requests`
--

INSERT INTO `payment_requests` (`id`, `user_id`, `amount`, `account_id`, `payout_id`, `user_note`, `admin_note`, `status`, `created_at`, `updated_at`) VALUES
(1, 16, 500000, 1, NULL, 'ok', '<p>644645454646446</p>', 'Rejected', '2025-12-28 06:01:36', '2026-02-13 01:30:20'),
(2, 16, 500000, 1, NULL, 'ok', NULL, 'Pending', '2025-12-28 06:04:13', '2025-12-28 06:04:13'),
(3, 16, 5000, 1, NULL, NULL, '<p>6646464</p>', 'Paid', '2025-12-28 07:41:35', '2026-02-13 01:25:30'),
(4, 16, 500000, 1, NULL, NULL, NULL, 'Pending', '2025-12-30 00:28:55', '2025-12-30 00:28:55'),
(5, 16, 500000, 1, NULL, 'testing withdrawl', NULL, 'Pending', '2026-01-09 05:12:44', '2026-01-09 05:12:44'),
(6, 16, 100000, 1, NULL, NULL, NULL, 'Pending', '2026-03-09 05:54:01', '2026-03-09 05:54:01'),
(7, 13, 49400, 2, NULL, NULL, NULL, 'Pending', '2026-03-12 15:43:05', '2026-03-12 15:43:05'),
(8, 16, 500000, 1, NULL, 'testing', NULL, 'Pending', '2026-03-14 04:39:20', '2026-03-14 04:39:20'),
(9, 16, 500000, 1, NULL, 'Testing', NULL, 'Pending', '2026-03-14 04:53:37', '2026-03-14 04:53:37'),
(11, 16, 50000, 2, NULL, 'Urgent withdrawal', NULL, 'Pending', '2026-03-19 02:49:43', '2026-03-19 02:49:43');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 16, 'android', '9148dbeb57704e781c4e1a09539daacbb28260c2d9d034862e2fd7fc294aa1f1', '[\"*\"]', NULL, NULL, '2026-02-10 02:04:34', '2026-02-10 02:04:34'),
(2, 'App\\Models\\User', 16, 'android', '871cf2283a150b84a6791faa3d113ed77636b08393b97d09f537e9da99fa0507', '[\"*\"]', NULL, NULL, '2026-02-10 07:14:45', '2026-02-10 07:14:45'),
(3, 'App\\Models\\User', 16, 'android', '85c134e69c3803866f1a9b55fe9911b907179e6eda228fdaa9577c41dc23fb9a', '[\"*\"]', NULL, NULL, '2026-02-10 07:29:56', '2026-02-10 07:29:56'),
(4, 'App\\Models\\User', 16, 'android', '6cb831fd413dffc9a4c8d2cafaf4b4667caf895fffb063f120938de94389e3ed', '[\"*\"]', NULL, NULL, '2026-02-14 03:57:51', '2026-02-14 03:57:51'),
(5, 'App\\Models\\User', 16, 'android', '8de4dcbcbb0354edf2804ef0e3f9743312376dd8a1c3d8249f0df5feb74bea46', '[\"*\"]', NULL, NULL, '2026-02-14 04:00:51', '2026-02-14 04:00:51'),
(6, 'App\\Models\\User', 23, 'android', '7624b82208631e7d5101287e7c5e4d630ea1d86f72ec0951806cf7ee06fe9bbd', '[\"*\"]', NULL, NULL, '2026-02-14 04:31:04', '2026-02-14 04:31:04'),
(7, 'App\\Models\\User', 16, 'android', '680bcfa81735583a9b04a91269c85775756e2ffb021bd35b0d3a71aaf9396b7a', '[\"*\"]', NULL, NULL, '2026-02-14 05:38:24', '2026-02-14 05:38:24'),
(8, 'App\\Models\\User', 16, 'android', '334d0660a4287655373b35e8d408e8d2a34fe109298dff878d6b26bf8eb69fcc', '[\"*\"]', NULL, NULL, '2026-02-14 09:46:38', '2026-02-14 09:46:38'),
(9, 'App\\Models\\User', 16, 'android', '18dd28c43f4c66ac9f847b15af259be1cf59eb45093ad297cc1b5b1f2bdcd844', '[\"*\"]', '2026-03-13 00:23:53', NULL, '2026-02-18 05:43:20', '2026-03-13 00:23:53'),
(10, 'App\\Models\\User', 16, 'android', 'b7dba23d5613d8f33af52083117cca9b3908e0bf35e73b0a1080be6140bfbfa8', '[\"*\"]', NULL, NULL, '2026-02-19 00:08:29', '2026-02-19 00:08:29'),
(11, 'App\\Models\\User', 16, 'android', 'bf2ee0956f1dd386caf8d9291e6561f2d4a0cf0e2ae209048e54e3b01bdeaa18', '[\"*\"]', NULL, NULL, '2026-02-19 01:53:01', '2026-02-19 01:53:01'),
(12, 'App\\Models\\User', 16, 'android', 'b9bfc600fa22d0ac7f2506b3ef9fe8d3777b902e1095d6934b36243c77c8003d', '[\"*\"]', NULL, NULL, '2026-02-19 01:53:43', '2026-02-19 01:53:43'),
(13, 'App\\Models\\User', 16, 'android', '5bd81c219da3feb46059c23b322bab8b796d50419662246441e2448007a400ed', '[\"*\"]', NULL, NULL, '2026-02-19 01:55:30', '2026-02-19 01:55:30'),
(14, 'App\\Models\\User', 16, 'android', '5f1cb31fef1c17b49a6087b5cff9f2164f039dacc1ca5bd903b3d627eb81b237', '[\"*\"]', NULL, NULL, '2026-02-19 01:55:50', '2026-02-19 01:55:50'),
(15, 'App\\Models\\User', 16, 'android', '0d6a5179c8c357a5f549f34a00f7533bf0e6ce98590a1950f950113f247b6f2a', '[\"*\"]', NULL, NULL, '2026-02-19 01:56:04', '2026-02-19 01:56:04'),
(16, 'App\\Models\\User', 16, 'android', 'd6deb0271d5f3537f8393f51281e3578290957bc8875735fb3df0fd4a0b2a78e', '[\"*\"]', NULL, NULL, '2026-02-19 01:56:33', '2026-02-19 01:56:33'),
(17, 'App\\Models\\User', 16, 'android', '25b0a7f5d6cd1f40cdaff3be5736dd101dad367abbfb6e7e824b9d112583deb9', '[\"*\"]', NULL, NULL, '2026-02-19 01:57:58', '2026-02-19 01:57:58'),
(18, 'App\\Models\\User', 16, 'android', '0af0b3906b6a65752619dee287af255ce8c35f61d345e102a16f36cd19981920', '[\"*\"]', NULL, NULL, '2026-02-19 02:07:15', '2026-02-19 02:07:15'),
(19, 'App\\Models\\User', 16, 'android', '3ef54d56f797e380039b18e2447e7d0a622599df3fc707ecebb233e9010c1f29', '[\"*\"]', NULL, NULL, '2026-02-19 02:07:57', '2026-02-19 02:07:57'),
(20, 'App\\Models\\User', 16, 'android', 'd79f09d6ec1afbc3b69f65dd6c69e09c6f68d35f3834feaa9b303f3a6e18e2b3', '[\"*\"]', NULL, NULL, '2026-02-19 02:08:19', '2026-02-19 02:08:19'),
(21, 'App\\Models\\User', 16, 'android', '43c900d2608daf1248292d44e761a7c52b0a02313fc6b49fe49c261459ef3251', '[\"*\"]', NULL, NULL, '2026-02-19 02:39:16', '2026-02-19 02:39:16'),
(22, 'App\\Models\\User', 16, 'android', '50b7bd94318daa38f83ccf46c41b949f8f14b37c52caeeedbd2bf87c5fd9c314', '[\"*\"]', NULL, NULL, '2026-02-19 02:51:22', '2026-02-19 02:51:22'),
(23, 'App\\Models\\User', 16, 'android', '0d7d6be3568c71d32cbfab425633f2dd2369bf3f55850999b4555f5e09576f34', '[\"*\"]', NULL, NULL, '2026-02-19 03:00:45', '2026-02-19 03:00:45'),
(24, 'App\\Models\\User', 16, 'android', '6a362ef90c275ca85e79451504157918fbb513508672b12c4e7cc76ef149184f', '[\"*\"]', NULL, NULL, '2026-02-19 03:01:10', '2026-02-19 03:01:10'),
(25, 'App\\Models\\User', 16, 'android', '7acba8a5680a2f2d3ca9d5358d1ac3d19340accb561a6c8a6786d1a64a3847e3', '[\"*\"]', NULL, NULL, '2026-02-19 03:02:38', '2026-02-19 03:02:38'),
(26, 'App\\Models\\User', 16, 'android', '116ad96e55d3aef15074b9ae13de8451ccffa2299d707bf3b6a7362de9cc9b7c', '[\"*\"]', NULL, NULL, '2026-02-19 05:29:23', '2026-02-19 05:29:23'),
(27, 'App\\Models\\User', 16, 'android', '8553b1b322aec1bbeaf3539a0ac60ea72b7ed54ddfb50e1e1306173a0eb2cad4', '[\"*\"]', NULL, NULL, '2026-02-19 05:40:00', '2026-02-19 05:40:00'),
(28, 'App\\Models\\User', 16, 'android', '38ed47f19e27dadbfc8a874e3ba90f5f5c131fe5816253b30c3db2cc727206f1', '[\"*\"]', NULL, NULL, '2026-02-19 05:46:17', '2026-02-19 05:46:17'),
(29, 'App\\Models\\User', 16, 'android', 'c6f190067d4141000988bf083955dd32f0b7f7ce971e1a728953f1323f8cb419', '[\"*\"]', NULL, NULL, '2026-02-19 05:46:43', '2026-02-19 05:46:43'),
(30, 'App\\Models\\User', 16, 'android', 'aa5a96d459f5546ed060920e94f93cb5cebc47e6ab73e949080d3ee2350b8940', '[\"*\"]', NULL, NULL, '2026-02-19 05:47:18', '2026-02-19 05:47:18'),
(31, 'App\\Models\\User', 16, 'android', '957c24d0840d104753ac7ca27af10054a40223c62cffefd48dbb8f188e2adc66', '[\"*\"]', NULL, NULL, '2026-02-23 06:10:09', '2026-02-23 06:10:09'),
(32, 'App\\Models\\User', 13, 'android', 'b9dbc0620fc6a9242207adaeccf4fcd45ed6fa09bec62cd2f65742e912072059', '[\"*\"]', NULL, NULL, '2026-02-23 06:10:55', '2026-02-23 06:10:55'),
(33, 'App\\Models\\User', 24, 'android', '5a77fb5e85d90bc3b01bf2600a8d642b3c111f1ad06721bd20d0e5b441ac455b', '[\"*\"]', NULL, NULL, '2026-02-24 04:50:46', '2026-02-24 04:50:46'),
(34, 'App\\Models\\User', 25, 'android', '175a6a523500e496517d6e012a7ce6c26e041b113f2cd7fda2c53d939258459e', '[\"*\"]', NULL, NULL, '2026-02-24 05:04:56', '2026-02-24 05:04:56'),
(35, 'App\\Models\\User', 26, 'android', '7147d8b4be088dc2d6e0c053975efc35e9b310c69e1b29232a94ed8c98bcf850', '[\"*\"]', NULL, NULL, '2026-02-24 05:15:11', '2026-02-24 05:15:11'),
(36, 'App\\Models\\User', 27, 'android', '5ab0474a6c00e7beedbf221bb3d9dbd87df7fc64b7c7e53002e2e4537a9a9e23', '[\"*\"]', NULL, NULL, '2026-02-24 05:30:57', '2026-02-24 05:30:57'),
(37, 'App\\Models\\User', 28, 'android', '504c93ef105548534246b09334519cdd6dfc28c5efa8e54f2bbe6fee589e75f1', '[\"*\"]', NULL, NULL, '2026-02-24 05:38:03', '2026-02-24 05:38:03'),
(38, 'App\\Models\\User', 29, 'android', '003a14e985ff59706f04154a28c944e6dc21bf58749e5eef3ff8e04940743af4', '[\"*\"]', NULL, NULL, '2026-02-24 05:41:37', '2026-02-24 05:41:37'),
(39, 'App\\Models\\User', 30, 'android', '15160e063d1d17da2f1b526d74666e317a7633f94bfd7a22b26cbfd8d6934392', '[\"*\"]', NULL, NULL, '2026-02-24 05:44:05', '2026-02-24 05:44:05'),
(40, 'App\\Models\\User', 31, 'android', '9aa2ddad37a47b85ddc73ca9a7158bb357beead254d999f4a830f40f9c298312', '[\"*\"]', NULL, NULL, '2026-02-24 06:23:42', '2026-02-24 06:23:42'),
(41, 'App\\Models\\User', 32, 'android', '070f7f6f732e19858cfb3fe96a794227f083b0a38a5cce820f108f4c824b16c4', '[\"*\"]', NULL, NULL, '2026-02-24 06:26:30', '2026-02-24 06:26:30'),
(42, 'App\\Models\\User', 13, 'android', 'f563dc4ee282ea9f47eb58a78e9df821f548700a6dff3c858d437a70bdc3aa5a', '[\"*\"]', NULL, NULL, '2026-03-02 00:53:45', '2026-03-02 00:53:45'),
(43, 'App\\Models\\User', 16, 'android', '8a4a7aae324ac0ebcdeecd11048aa2095062e98787ad9889dca53339f2812e5b', '[\"*\"]', NULL, NULL, '2026-03-02 00:59:40', '2026-03-02 00:59:40'),
(44, 'App\\Models\\User', 13, 'android', '675eb6f7a7393625fa54c5cbb28a48dc1d00020d0a479b2e4cacc4ad5accb336', '[\"*\"]', NULL, NULL, '2026-03-05 23:58:08', '2026-03-05 23:58:08'),
(45, 'App\\Models\\User', 33, 'android', 'ff6870094228ad2366a8d6a2e9dc664d8b009d2b8452b6bf1bc9a4542f923308', '[\"*\"]', NULL, NULL, '2026-03-06 00:59:41', '2026-03-06 00:59:41'),
(46, 'App\\Models\\User', 34, 'android', 'b5c89df5f5aba56fd71926177eba18567667ddd69ce6e7f47e3361a2b60175b9', '[\"*\"]', NULL, NULL, '2026-03-06 01:28:37', '2026-03-06 01:28:37'),
(47, 'App\\Models\\User', 35, 'android', '9f2ebcc819bca5796e0e4238096047d535550315c2c9b576e1728aefcbc035bf', '[\"*\"]', NULL, NULL, '2026-03-06 06:35:41', '2026-03-06 06:35:41'),
(48, 'App\\Models\\User', 36, 'android', 'c57ac72cdfd1ea16ddb25e69ca6f5f2e9774e2409305dede30c477a48b4cd9c3', '[\"*\"]', NULL, NULL, '2026-03-08 23:39:03', '2026-03-08 23:39:03'),
(49, 'App\\Models\\User', 13, 'android', '2d2cb21ffdd3d45243841c012440bbc03c487555b5b1b78e20f3d4ab35b2dece', '[\"*\"]', NULL, NULL, '2026-03-08 23:39:52', '2026-03-08 23:39:52'),
(50, 'App\\Models\\User', 16, 'android', 'fc3855478a6b9ff2e342ceb60cb83e1800f508842b3a62ed1b11433900644ddc', '[\"*\"]', NULL, NULL, '2026-03-08 23:40:57', '2026-03-08 23:40:57'),
(51, 'App\\Models\\User', 37, 'android', 'e80bb8d0d40aa01e9f599c130f377ced3100f2d5f204a0e5fdf5988fa89b7a97', '[\"*\"]', NULL, NULL, '2026-03-08 23:58:54', '2026-03-08 23:58:54'),
(52, 'App\\Models\\User', 39, 'android', '02b66da3cad73505c4f2d7d3fcfd391f863a239a1b76bb94a73f51b8bdafd170', '[\"*\"]', NULL, NULL, '2026-03-09 00:05:30', '2026-03-09 00:05:30'),
(53, 'App\\Models\\User', 40, 'android', '6accf66c20492b59b801e50522f794457df83dfe920f62f653e3e62b6fc74257', '[\"*\"]', NULL, NULL, '2026-03-09 00:10:21', '2026-03-09 00:10:21'),
(54, 'App\\Models\\User', 13, 'android', '8d70c70a7b9032c04446a69e16ec2b198d355d62085a3d754c0669a18e069ac6', '[\"*\"]', '2026-03-18 03:59:25', NULL, '2026-03-09 06:40:49', '2026-03-18 03:59:25'),
(55, 'App\\Models\\User', 13, 'android', '91aeecabceafd8d0aa090469f97332d6b7974c8377ca5cdd449a0a11d703697e', '[\"*\"]', NULL, NULL, '2026-03-11 23:10:20', '2026-03-11 23:10:20'),
(56, 'App\\Models\\User', 13, 'android', 'b560724ab4b29f559df52949ae251fc202c29a5bc4a06bfab67e9186a45696f7', '[\"*\"]', NULL, NULL, '2026-03-12 03:15:52', '2026-03-12 03:15:52'),
(57, 'App\\Models\\User', 16, 'android', 'c17dd4023f23bd7b3f6caf387c29054eceb3a972d26fcc3e5cba1e6bffa68e9c', '[\"*\"]', NULL, NULL, '2026-03-12 03:16:13', '2026-03-12 03:16:13'),
(58, 'App\\Models\\User', 16, 'android', '2f20b44d73656119e3c566a450a1c05a564aa22d2bdd4c58b81804067af5925b', '[\"*\"]', NULL, NULL, '2026-03-12 07:43:15', '2026-03-12 07:43:15'),
(59, 'App\\Models\\User', 13, 'android', '0d0a231e89b15e80c11a9b8f59476df05e4d2f25b7d8b6c1c26adc8c4855d414', '[\"*\"]', NULL, NULL, '2026-03-12 14:06:33', '2026-03-12 14:06:33'),
(60, 'App\\Models\\User', 16, 'android', 'f1eec54815ec83a6613574cfbbad742f3e7c9f4ca3e196ae024740a67deeef4f', '[\"*\"]', NULL, NULL, '2026-03-12 14:08:08', '2026-03-12 14:08:08'),
(61, 'App\\Models\\User', 13, 'android', 'a268fb5170cdf199d5cb0ff3c958cd9b17b7132c5f1a24b3a3a51eadd6e2a152', '[\"*\"]', NULL, NULL, '2026-03-13 00:12:09', '2026-03-13 00:12:09'),
(62, 'App\\Models\\User', 13, 'android', '1508395c35f39dbc1b01a3b41050e9232ab6c336a51cb99140e1ff06926e884a', '[\"*\"]', NULL, NULL, '2026-03-13 00:14:31', '2026-03-13 00:14:31'),
(63, 'App\\Models\\User', 16, 'android', 'ef8e781e4052b6036f0f459a04be7899613387cdf86f4034179d749c87e75fd1', '[\"*\"]', '2026-03-13 07:40:03', NULL, '2026-03-13 00:20:49', '2026-03-13 07:40:03'),
(64, 'App\\Models\\User', 13, 'android', 'b89e848cb9439fe9d12800e452ca8dc4f67fbdb3cd486f46c2cd6b3c063e18f6', '[\"*\"]', NULL, NULL, '2026-03-13 00:23:32', '2026-03-13 00:23:32'),
(65, 'App\\Models\\User', 13, 'android', '28a45619838e8ac0e21840ca54698ee4947ed0527e63956941c73c3f7661a1ae', '[\"*\"]', '2026-03-15 23:54:07', NULL, '2026-03-13 17:49:54', '2026-03-15 23:54:07'),
(66, 'App\\Models\\User', 16, 'android', '530d58797b70e88ea1dcc60d2390deee00474547df3d8573bc31170abc236ffa', '[\"*\"]', '2026-03-16 05:25:27', NULL, '2026-03-14 00:47:24', '2026-03-16 05:25:27'),
(67, 'App\\Models\\User', 13, 'android', '836f49c6194c5cd9a03713f748caabf18749df68636f6c2cfb07e2ef0664c0d7', '[\"*\"]', NULL, NULL, '2026-03-16 19:12:56', '2026-03-16 19:12:56'),
(68, 'App\\Models\\User', 16, 'android', '1f3a03210fe2244419d24d5c17c5fd357ba7f545d6e8da31cc6e8ccd317ca7de', '[\"*\"]', '2026-03-19 07:23:49', NULL, '2026-03-16 19:13:16', '2026-03-19 07:23:49'),
(69, 'App\\Models\\User', 16, 'android', '75f2be90c492f640fa41e2ceb80ad0213634318b9f9d2418072d4736ca942fdc', '[\"*\"]', '2026-03-19 02:52:47', NULL, '2026-03-18 23:38:25', '2026-03-19 02:52:47'),
(70, 'App\\Models\\User', 16, 'android', '00036460188bce2baa972547170643fd80a0f06eb1f2584a43f3237b3db228a2', '[\"*\"]', '2026-03-19 08:27:21', NULL, '2026-03-19 03:40:21', '2026-03-19 08:27:21'),
(71, 'App\\Models\\User', 16, 'android', 'edcbd7d19f24699b0d3b5e4b77d5c52b0e3b03b334b3358670fd83db98e7d471', '[\"*\"]', '2026-03-20 06:50:31', NULL, '2026-03-20 06:50:27', '2026-03-20 06:50:31'),
(72, 'App\\Models\\User', 16, 'android', 'e06e322faf05fbaea1cb1db377e1c5e674ccf68108a393424c2c069d24fe95a7', '[\"*\"]', '2026-03-23 04:05:48', NULL, '2026-03-22 23:56:06', '2026-03-23 04:05:48');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_category` enum('brand','influencer') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `razorpay_plan_id` varchar(1000) CHARACTER SET ucs2 COLLATE ucs2_bin DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INR',
  `billing_cycle` int(11) DEFAULT NULL,
  `plan_price_base` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_order` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `user_category`, `razorpay_plan_id`, `name`, `price`, `currency`, `billing_cycle`, `plan_price_base`, `button_name`, `position_order`, `status`, `created_at`, `updated_at`) VALUES
(10, 'influencer', 'plan_SQ35QhWuNZ7pxr', 'starter', 499.00, 'INR', 1, 'monthly', 'Choose Plan', 10, 'active', '2026-03-11 14:52:19', '2026-03-11 14:52:28'),
(11, 'influencer', 'plan_SQ36zVn1XgjbDB', 'professional', 1299.00, 'INR', 3, 'monthly', 'Choose Plan', 11, 'active', '2026-03-11 14:53:48', '2026-03-11 14:53:56'),
(12, 'influencer', 'plan_SQ37izkNQwGmio', 'enterprise', 4999.00, 'INR', NULL, 'yearly', 'Choose Plan', 12, 'active', '2026-03-11 14:54:29', '2026-03-11 14:54:36'),
(13, 'brand', 'plan_SSaDssvW60pfuh', 'professional', 6999.00, 'INR', NULL, 'monthly', 'Choose Now', 13, 'active', '2026-03-18 00:35:13', '2026-03-18 00:35:39');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `campagin_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_link` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `campagin_id`, `title`, `price`, `description`, `product_quantity`, `product_link`, `product_image`, `created_at`, `updated_at`) VALUES
(34, 39, 'test', 100.00, '100', 1, 'https://socialfox.matebiz.co/brand-create-campaign', 'products/Lb10D5024J7C3BlS4QV2neBU408n0736U69eTedk.jpg', '2026-01-05 02:29:56', '2026-01-05 02:29:56'),
(35, 40, 'test', 100.00, '100', 1, 'https://socialfox.matebiz.co/brand-create-campaign', 'products/3Hp7mrNrNPWeLoObo1E9G8kH7fwm83Vg2DIIKnu1.jpg', '2026-01-05 02:35:47', '2026-01-05 02:35:47'),
(36, 41, 'learning book', 1500.00, 'testing', 22, 'https://socialfox.matebiz.co/', 'products/s6uSnlHiu8BNSQT8c6XKvzUZThxiUzRPcnPAClqQ.jpg', '2026-01-09 05:18:23', '2026-01-09 05:18:23'),
(37, 42, 'new product', 2999.00, 'nnknkn', 100, 'https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox', 'products/ZOKiZ6zVHwLPqPrVeDyuQC7y77GFAlsC2kpi5fX1.jpg', '2026-02-13 07:11:04', '2026-02-13 07:11:04'),
(38, 43, 'new product', 2999.00, 'nnknkn', 100, 'https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox', 'products/8xYFD21FVMXwdJDWISrpcxdyWR0JoI1gc2TaoaEw.jpg', '2026-02-13 08:35:39', '2026-02-13 08:35:39'),
(39, 44, 'shoes', 125.00, 'TEST', 12, 'https://socialfox.matebiz.co/brand-create-campaign', 'products/TNX0uQbbM9bQrvWpvIgn5iwqqMWfahdUBoFiar7A.jpg', '2026-02-14 00:36:52', '2026-02-14 00:36:52'),
(48, 58, 'Protein Shake X', 1500.00, 'High-quality organic protein.', 50, 'https://example.com/product', NULL, '2026-03-12 08:42:25', '2026-03-12 08:42:25');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(52, 34, 'samples/iMujOiDwxfSWupub2og0UfVII2Bu1nYThbBB9GfY.jpg', 1, '2026-01-05 02:29:59', '2026-01-05 02:29:59'),
(53, 35, 'samples/WvSvONw2aDPMP9i8kyWScOg3ry4pcNV77QPHbyRl.jpg', 1, '2026-01-05 02:35:47', '2026-01-05 02:35:47');

-- --------------------------------------------------------

--
-- Table structure for table `quick_modules`
--

CREATE TABLE `quick_modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `position_order` int(10) UNSIGNED DEFAULT NULL,
  `roles` json NOT NULL,
  `headline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `button_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `button_link` text COLLATE utf8_unicode_ci,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quick_modules`
--

INSERT INTO `quick_modules` (`id`, `position_order`, `roles`, `headline`, `description`, `image`, `button_name`, `button_link`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '[\"influencer\"]', 'Campaigns', '&lt;p&gt;Discover and apply to new campaigns that match your niche and audience.&lt;/p&gt;', 'images/dashboard_quick_modules/1770725161_698b1f299169b.jfif', 'Manage Campaigns', 'brand-campaigns', 'active', '2026-02-10 06:36:01', '2026-02-28 11:29:47');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_order` int(10) UNSIGNED NOT NULL,
  `header_footer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` longtext COLLATE utf8mb4_unicode_ci,
  `service_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `service_highlights` longtext COLLATE utf8mb4_unicode_ci,
  `service_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breadcrumb_headline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breadcrumb_description` longtext COLLATE utf8mb4_unicode_ci,
  `breadcrumb_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci,
  `visibility` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `position_order`, `header_footer_name`, `service_title`, `service_name`, `service_url`, `short_description`, `service_icon`, `button_name`, `description`, `service_highlights`, `service_image`, `breadcrumb_headline`, `breadcrumb_description`, `breadcrumb_image`, `meta_title`, `meta_keyword`, `meta_description`, `visibility`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Influencer Marketing', 'Transform Your Influence Into Income', 'transform-your-influence-into-income', '&lt;p&gt;Connect with top brands and create authentic partnerships that align with your values and audience.&lt;/p&gt;\r\n&lt;ul class=&quot;service-features&quot;&gt;\r\n&lt;li&gt;Brand Partnership Matching&lt;/li&gt;\r\n&lt;li&gt;Campaign Strategy Development&lt;/li&gt;\r\n&lt;li&gt;Contract Negotiation&lt;/li&gt;\r\n&lt;li&gt;Performance Tracking&lt;/li&gt;\r\n&lt;/ul&gt;', '<i class=\"fas fa-bullhorn\"></i>', NULL, '&lt;p class=&quot;lead mb-4&quot;&gt;Our Influencer Marketing service is designed to connect passionate content creators with brands that share their values. We don&#039;t just facilitate partnerships &amp;ndash; we build lasting relationships that benefit both influencers and brands.&lt;/p&gt;\r\n&lt;p&gt;Whether you&#039;re a micro-influencer just starting out or a established creator looking to expand your brand partnerships, our comprehensive platform provides everything you need to succeed. From initial brand discovery to campaign execution and performance analysis, we&#039;re with you every step of the way.&lt;/p&gt;\r\n&lt;p&gt;Our advanced matching algorithm ensures you&#039;re connected with brands that align perfectly with your niche, audience demographics, and personal values. This means more authentic content, better engagement rates, and higher conversion for brands &amp;ndash; resulting in better compensation for you.&lt;/p&gt;', '&lt;ul class=&quot;list-unstyled&quot;&gt;\r\n&lt;li class=&quot;mb-3&quot;&gt;Access to 500+ premium brands&lt;/li&gt;\r\n&lt;li class=&quot;mb-3&quot;&gt;&amp;nbsp;Professional contract management&lt;/li&gt;\r\n&lt;li class=&quot;mb-3&quot;&gt;&amp;nbsp;Real-time campaign tracking&lt;/li&gt;\r\n&lt;li class=&quot;mb-3&quot;&gt;&amp;nbsp;Dedicated account manager&lt;/li&gt;\r\n&lt;li class=&quot;mb-3&quot;&gt;&amp;nbsp;Monthly strategy sessions&lt;/li&gt;\r\n&lt;li class=&quot;mb-3&quot;&gt;&amp;nbsp;Performance optimization&lt;/li&gt;\r\n&lt;li class=&quot;mb-3&quot;&gt;&amp;nbsp;Brand safety protection&lt;/li&gt;\r\n&lt;/ul&gt;', 'images/services/1765276526_6937fb6e78b6d.png', 'Transform Your Influence Into Income', '&lt;p&gt;Our Influencer Marketing service is designed to connect passionate content creators with brands that share their values.&lt;/p&gt;', 'images/services/1765276526_6937fb6e7855f.jfif', 'Transform Your Influence Into Income', 'Transform Your Influence Into Income', '&lt;p&gt;Transform Your Influence Into Income&lt;/p&gt;', 'none', 'deactive', '2025-12-09 05:05:26', '2026-03-11 01:04:34'),
(3, 2, NULL, 'Brand Deals', 'Turn Your Content Into Consistent Brand Deals', 'turn-your-content-into-consistent-brand-deals', '&lt;p dir=&quot;ltr&quot;&gt;You&amp;rsquo;ve built an audience.&lt;br&gt;You&amp;rsquo;ve earned trust.&lt;br&gt;Now it&amp;rsquo;s time to monetize it the right way.&lt;/p&gt;', '<i class=\"fas fa-bullhorn\"></i>', NULL, '&lt;p dir=&quot;ltr&quot;&gt;You&amp;rsquo;ve built an audience.&lt;br&gt;You&amp;rsquo;ve earned trust.&lt;br&gt;Now it&amp;rsquo;s time to monetize it the right way.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;At Social Fox, we help creators turn their influence into real, consistent income by connecting them with brands that actually match their audience &amp;mdash; not random collaborations that don&amp;rsquo;t convert.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;No middlemen.&lt;br&gt;No unfair commissions.&lt;br&gt;No fake promises.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;Just real opportunities.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;h4 dir=&quot;ltr&quot;&gt;Why Most Creators Struggle to Earn&lt;/h4&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;Many talented influencers face the same problems:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Brands ignore small and mid-level creators&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Payment delays and unclear terms&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Fake agencies taking high commissions&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;No guidance on pricing or negotiations&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Random brand deals that don&amp;rsquo;t match their niche&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;We built Social Fox to fix this.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;h4&gt;&lt;strong id=&quot;docs-internal-guid-922cc081-7fff-31b2-bfdd-3dcdedddf81d&quot;&gt;How Social Fox Helps You Earn&lt;/strong&gt;&lt;/h4&gt;', '&lt;ul class=&quot;list-unstyled&quot;&gt;\r\n&lt;li class=&quot;mb-3&quot;&gt;Access to 500+ premium brands&lt;/li&gt;\r\n&lt;li class=&quot;mb-3&quot;&gt;&amp;nbsp;Professional contract management&lt;/li&gt;\r\n&lt;li class=&quot;mb-3&quot;&gt;&amp;nbsp;Real-time campaign tracking&lt;/li&gt;\r\n&lt;li class=&quot;mb-3&quot;&gt;&amp;nbsp;Dedicated account manager&lt;/li&gt;\r\n&lt;li class=&quot;mb-3&quot;&gt;&amp;nbsp;Monthly strategy sessions&lt;/li&gt;\r\n&lt;li class=&quot;mb-3&quot;&gt;&amp;nbsp;Performance optimization&lt;/li&gt;\r\n&lt;li class=&quot;mb-3&quot;&gt;&amp;nbsp;Brand safety protection&lt;/li&gt;\r\n&lt;/ul&gt;', 'images/services/1773210514_69b10b9260062.png', 'Turn Your Content Into Consistent Brand Deals', '', 'images/services/1773210514_69b10b925f7ed.avif', NULL, NULL, '', 'both', 'active', '2026-03-11 00:58:34', '2026-03-17 00:07:26');

-- --------------------------------------------------------

--
-- Table structure for table `service_sections`
--

CREATE TABLE `service_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `position_order` int(10) UNSIGNED NOT NULL,
  `section_headline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `table_content` longtext COLLATE utf8mb4_unicode_ci,
  `footer_description` longtext COLLATE utf8mb4_unicode_ci,
  `section_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_sections`
--

INSERT INTO `service_sections` (`id`, `service_id`, `parent_id`, `position_order`, `section_headline`, `description`, `table_content`, `footer_description`, `section_icon`, `section_image`, `button_name`, `button_link`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 1, 'Brand Partnership Matching', '&lt;p&gt;Our AI-powered algorithm matches you with brands based on your content style, audience demographics, engagement rates, and personal preferences.&lt;/p&gt;', NULL, NULL, '<i class=\"fas fa-handshake\"></i>', NULL, NULL, NULL, 'active', '2025-12-09 10:35:26', '2025-12-09 10:35:26'),
(2, 1, 0, 2, 'Campaign Strategy Development', '&lt;p&gt;Work with our expert strategists to develop compelling campaign concepts that resonate with your audience while meeting brand objectives.&lt;/p&gt;', NULL, NULL, '<i class=\"fas fa-lightbulb\"></i>', NULL, NULL, NULL, 'active', '2025-12-09 11:04:47', '2025-12-09 11:04:47'),
(3, 3, NULL, 1, 'Smart Brand Matching', '&lt;p dir=&quot;ltr&quot;&gt;Our AI-powered system connects you with brands that align with:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Your niche&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Your audience demographics&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Your engagement quality&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Your location&lt;br&gt;&lt;br&gt;&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;This means better campaigns and higher chances of repeat collaborations.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', NULL, NULL, '<i class=\"fas fa-handshake\"></i>', NULL, NULL, NULL, 'active', '2026-03-11 06:28:34', '2026-03-11 06:28:34'),
(4, 3, NULL, 2, 'Fraud-Free & Verified Collaborations', '&lt;p dir=&quot;ltr&quot;&gt;We ensure brands on our platform are genuine.&lt;br&gt;No fake offers. No spam. No wasting your time.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;You focus on creating content &amp;mdash; we protect your credibility.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', NULL, NULL, '<i class=\"fas fa-shield-alt\"></i>', NULL, NULL, NULL, 'active', '2026-03-11 06:28:34', '2026-03-11 06:28:34'),
(5, 3, NULL, 3, 'Keep What You Earn', '&lt;p dir=&quot;ltr&quot;&gt;Unlike traditional agencies, we don&amp;rsquo;t take commissions from your deals.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;You earn what you deserve.&lt;/p&gt;', NULL, NULL, '<i class=\"fas fa-money-bill-wave\"></i>', NULL, NULL, NULL, 'active', '2026-03-11 06:28:34', '2026-03-11 06:28:34'),
(6, 3, NULL, 4, 'Learn How to Grow & Monetize', '&lt;p dir=&quot;ltr&quot;&gt;We don&amp;rsquo;t just connect you with brands &amp;mdash; we help you grow.&lt;/p&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;You&amp;rsquo;ll get access to:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Content strategy guidance&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Monetization tips&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Pricing insights&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Campaign improvement advice&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li dir=&quot;ltr&quot; aria-level=&quot;1&quot;&gt;\r\n&lt;p dir=&quot;ltr&quot; role=&quot;presentation&quot;&gt;Weekly creator giveaways (tripods, mics &amp;amp; more)&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p dir=&quot;ltr&quot;&gt;Because growth isn&amp;rsquo;t just about brand deals &amp;mdash; it&amp;rsquo;s about long-term success.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', NULL, NULL, '<i class=\"fas fa-book-open\"></i>', NULL, NULL, NULL, 'active', '2026-03-11 06:28:34', '2026-03-11 06:28:34');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0jQHEP7Bu9cS5JU8bMT0xJf2pqM4zyhyUVR1ejEt', NULL, '167.94.138.181', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSHdEZ2lKdEpQdHVCZVJIMTFLcW5qdUdSMmVjclJvSWNsb2JkM3MzaiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9zb2NpYWxmb3gubWF0ZWJpei5jbyI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774009728),
('2xKYaDWncsIATVLr7rXDzhRzaVO3giUNqJtEbabH', NULL, '57.141.6.33', 'meta-externalagent/1.1 (+https://developers.facebook.com/docs/sharing/webmasters/crawler)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMGtxWEE0R3d0MWh0dnlBeXJqS2xqaTBjVXBoSHZ0SzVqOGFnNlphTyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vc29jaWFsZm94Lm1hdGViaXouY28vbG9naW4iO3M6NToicm91dGUiO3M6NToibG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1774028913),
('5R89rXCpdkTrQMFKnByvXPFKqfCRjyUIAis52Eof', NULL, '57.141.6.70', 'meta-externalagent/1.1 (+https://developers.facebook.com/docs/sharing/webmasters/crawler)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV1VIT09hV3NIVHJwNkNpTGFua09qSm44Q2xMcFFSSUNLNjNneDB4NyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDc6Imh0dHBzOi8vc29jaWFsZm94Lm1hdGViaXouY28vdGVybS1hbmQtY29uZGl0aW9uIjtzOjU6InJvdXRlIjtzOjE4OiJ0ZXJtLmFuZC5jb25kaXRpb24iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1774019592),
('BXLEZkO9vqsKfEYd2qP8cDGfSSiT5Izu83VAeXUw', NULL, '199.45.154.113', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQjd0V1VjNGJ3SldvT081VERKQTdRZFVPY1lSQjFkbEttN0dJZExQViI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vc29jaWFsZm94Lm1hdGViaXouY28iO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1774010228),
('DSGZtw0u6ra0v7hbb4JAEg0F2cdXHSVUzNMXzBUM', NULL, '57.141.6.33', 'meta-externalagent/1.1 (+https://developers.facebook.com/docs/sharing/webmasters/crawler)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidUtTNGxXeEJxZnlUc0x6MEFYS0JSdnhmbVdRakJ3dGNKS0sycTluOCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vc29jaWFsZm94Lm1hdGViaXouY28vbG9naW4iO3M6NToicm91dGUiO3M6NToibG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1774224334),
('GlK5Axb6Himuc0fL2YrcjhWRxhpyndKmc2O4FxVG', NULL, '57.141.6.38', 'meta-externalagent/1.1 (+https://developers.facebook.com/docs/sharing/webmasters/crawler)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYmdZaWRTSUtqRTFWVDJFWHg5S1ZwNFFlU3pidTIwa2VIckNGYlBmaiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vc29jaWFsZm94Lm1hdGViaXouY28vbG9naW4iO3M6NToicm91dGUiO3M6NToibG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1774135855),
('kp4gVaRAJsRHGYaCc3rN9UD8TFVcaFsV78sS82cq', 5, '103.179.171.199', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YToxMTp7czo2OiJfdG9rZW4iO3M6NDA6IlI0QTI2OUpzWDlFTXNXcjFaOGJKWWVzZkVrUlc4ZGJUWElBbWpOZTciO3M6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjI1NDoiaHR0cHM6Ly9zb2NpYWxmb3gubWF0ZWJpei5jby9hZG1pbi9lZGl0X2ZlYXR1cmUvYnJhbmQvZXlKcGRpSTZJbEJhVEhkQ2RHVk5WMk0yV2pOMFYxTktPSFJvTjBFOVBTSXNJblpoYkhWbElqb2lVRTh2WkZoWFZrbDFaV3hGUW1ZMFprOW1WVzloZHowOUlpd2liV0ZqSWpvaU4yRXlZMkZpTmpFNFlqTmxaakF3WWprelpHWmpOelJsWkdZMVkyUXlPV1ptWVRsbE1EaGpOekZsTldVMk9UWXhNakF4TXpnNU4yTTBaR1V3TXpBNE5DSXNJblJoWnlJNklpSjkiO3M6NToicm91dGUiO3M6MTg6ImFkbWluLmVkaXQuZmVhdHVyZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6NDc6Imh0dHBzOi8vc29jaWFsZm94Lm1hdGViaXouY28vYWRtaW4vbXktZGFzaGJvYXJkIjt9czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo1O3M6OToidXNlcl9uYW1lIjtzOjY6IkFkbWluICI7czoxMDoidXNlcl9lbWFpbCI7czoyNDoid2VidGVzdGluZ2xpbmtAZ21haWwuY29tIjtzOjEzOiJwcm9maWxlX2ltYWdlIjtzOjQxOiJpbWFnZXMvYWRtaW4vMTc2NTU0NTE2MV82OTNjMTRjOTVmMzc5LnBuZyI7czoxMjoiY29tcGFueV9pY29uIjtzOjQzOiJpbWFnZXMvY29tcGFueS8xNzY1NTM3NTYwXzY5M2JmNzE4NzFhN2UuanBnIjtzOjEyOiJjb21wYW55X2xvZ28iO3M6NDM6ImltYWdlcy9jb21wYW55LzE3NjU1Mzc1NjBfNjkzYmY3MTg3MjllYi5wbmciO3M6MTI6ImNvbXBhbnlfbmFtZSI7czoxMDoiU29jaWFsIEZveCI7fQ==', 1774163573),
('MO2CSKltIPqWzSSa68kIlHoVmteCGE5ejvHXxsxE', NULL, '103.179.171.199', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN3pXcTkzWGc2TFNqZ3hFR29qbmhjV2hrd1cyZXpZOHNObUZoT2Q4MSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vc29jaWFsZm94Lm1hdGViaXouY28iO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1774163936),
('NfgBPCJ2005bXt0XW3vbmJGTy46GeDYMBUlCw8qV', NULL, '57.141.6.10', 'meta-externalagent/1.1 (+https://developers.facebook.com/docs/sharing/webmasters/crawler)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZkJaY0JWT1kxR2pXZnRMOGdwN1E1eU9hYlZrS09OcHJia09McGJMdCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6ODI6Imh0dHBzOi8vc29jaWFsZm94Lm1hdGViaXouY28vc2VydmljZS90dXJuLXlvdXItY29udGVudC1pbnRvLWNvbnNpc3RlbnQtYnJhbmQtZGVhbHMiO3M6NToicm91dGUiO3M6MTQ6InNpbmdsZS5zZXJ2aWNlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774028933),
('NZt2f8GD5wX79xHggGW60kf2Cx04ozz8o50wuIL3', NULL, '223.181.32.107', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo5OntzOjY6Il90b2tlbiI7czo0MDoidm9IdElvTzBMd2FDdTY4T3ZvclIwckw4dkp1cVpCR01ONUMzTWc4SCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vc29jaWFsZm94Lm1hdGViaXouY28vcGFzc3dvcmQvcmVxdWVzdCI7czo1OiJyb3V0ZSI7czoxNjoicGFzc3dvcmQucmVxdWVzdCI7fXM6OToidXNlcl9uYW1lIjtzOjEyOiJNdWtlc2ggS3VtYXIiO3M6MTA6InVzZXJfZW1haWwiO3M6MTY6Im11a2VzaEBnbWFpbC5jb20iO3M6MTM6InByb2ZpbGVfaW1hZ2UiO047czoxMjoiY29tcGFueV9pY29uIjtzOjQzOiJpbWFnZXMvY29tcGFueS8xNzY1NTM3NTYwXzY5M2JmNzE4NzFhN2UuanBnIjtzOjEyOiJjb21wYW55X2xvZ28iO3M6NDM6ImltYWdlcy9jb21wYW55LzE3NjU1Mzc1NjBfNjkzYmY3MTg3MjllYi5wbmciO3M6MTI6ImNvbXBhbnlfbmFtZSI7czoxMDoiU29jaWFsIEZveCI7fQ==', 1774015334),
('o9Zddz4ltSmK5zI0BdqVFm4tjTSoQAbStuPLToLa', NULL, '34.23.33.22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMnIwZ1o5RDgwWmF3OHBWSllMcU9ISnk1Ykg1Tk95NVdUSWI1dERZSSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9zb2NpYWxmb3gubWF0ZWJpei5jbyI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774170149),
('sCrGH9tVcqnc7QjN7jaYLbAEEwn17uqFq3R0KIhn', NULL, '52.0.247.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMmFYQWtDZVIxOWFlRHd4NG9DT1pmT05CZE9KeGdrNmVpd0tPaDQ0eCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9zb2NpYWxmb3gubWF0ZWJpei5jbyI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774149236),
('SeGsNXR1CMIjfzSKpb5CJAfubJbQsjzxSmlIeAsK', NULL, '104.236.75.158', 'Mozilla/5.0 (X11; Linux x86_64; rv:142.0) Gecko/20100101 Firefox/142.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV2ZFT1BycmxsRHRVUXRLRmxVb2h5aFZ4ak1kMEFWMTNFT05kUkVWUiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vc29jaWFsZm94Lm1hdGViaXouY28iO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1774171764),
('sh7QmLs2lJWACaXiI9SCTgOZ5P3Bz7uh23M6TF1k', NULL, '104.236.75.158', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNFNjZnlYRTE5YWZwRFhIVmNBbUk3cUZkWGVrOHJMOVJzTjI0QnZ5RyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9zb2NpYWxmb3gubWF0ZWJpei5jbyI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774171763),
('sR4rGtOFlUlCbxh7o58OP1tkNcaAaIOC5yZg1HiB', NULL, '204.76.203.25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOWFYb3ZBbFBrWXBjY090cEhvTnhmYm5KVVFTRjl2Njd2UmNmNTZYaCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vc29jaWFsZm94Lm1hdGViaXouY28iO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1774178184),
('vEIYygLobpwXR8oraqwCjIuLuaSNBc1Ht23G6Oje', NULL, '122.177.100.94', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRWE4NktTWGdwbHZXRk5kdkFFRXNPMjB4RnR4a3pMaUc2eDZINTdwUyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vc29jaWFsZm94Lm1hdGViaXouY28iO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1774245561);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'defihy@fxzig.com', '2026-03-20 01:46:06', '2026-03-20 01:46:06'),
(2, 'webtestinglink@gmail.com', '2026-03-20 01:51:21', '2026-03-20 01:51:21'),
(3, 'check@gmail.com', '2026-03-20 02:04:10', '2026-03-20 02:04:10'),
(4, 'webtestmail736@gmail.com', '2026-03-20 02:36:38', '2026-03-20 02:36:38'),
(5, 'info.mohitlakhera@gmail.com', '2026-03-20 04:56:56', '2026-03-20 04:56:56');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `razorpay_subscription_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'created',
  `starts_at` datetime DEFAULT NULL,
  `ends_at` datetime DEFAULT NULL,
  `trial_ends_at` datetime DEFAULT NULL,
  `canceled_at` datetime DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `plan_id`, `razorpay_subscription_id`, `status`, `starts_at`, `ends_at`, `trial_ends_at`, `canceled_at`, `payment_method`, `subscription_payment_type`, `created_at`, `updated_at`) VALUES
(35, 16, 10, 'sub_SS7dYfZAOLqAoJ', 'completed', '2026-03-18 10:24:22', '2026-03-18 10:24:22', NULL, NULL, NULL, 'recurring', '2026-03-16 20:37:25', '2026-03-18 04:54:22'),
(36, 16, 13, 'sub_SSaGnepoba48FK', 'active', '2026-03-18 06:08:26', '2026-04-17 18:30:00', NULL, NULL, 'upi', 'recurring', '2026-03-18 00:37:59', '2026-03-18 04:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `target_audiences`
--

CREATE TABLE `target_audiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `campagin_id` bigint(20) UNSIGNED NOT NULL,
  `influencer_category` json DEFAULT NULL,
  `campaign_description` text COLLATE utf8mb4_unicode_ci,
  `target_gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_age_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `target_audiences`
--

INSERT INTO `target_audiences` (`id`, `campagin_id`, `influencer_category`, `campaign_description`, `target_gender`, `target_age_group`, `created_at`, `updated_at`) VALUES
(30, 39, '[\"lifestyle\"]', 'Campagin description', 'female', '13-17', '2026-01-05 02:29:56', '2026-01-09 05:19:16'),
(31, 40, NULL, 'check', 'female', '13-17', '2026-01-05 02:35:47', '2026-01-05 02:35:47'),
(32, 43, '\"fashion,lifestyle\"', 'lm', 'male', '18-24', '2026-02-13 08:35:39', '2026-02-13 08:35:39'),
(33, 44, '[\"fashion\"]', 'TEST', 'male', '25-34', '2026-02-14 00:36:52', '2026-02-14 00:45:39'),
(41, 58, '\"Beauty,Fashion\"', NULL, 'male', '18-35', '2026-03-12 08:42:25', '2026-03-12 08:42:25');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_order` int(10) UNSIGNED NOT NULL,
  `employee_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiktok_count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `position_order`, `employee_name`, `employee_designation`, `employee_image`, `instagram_count`, `youtube_count`, `tiktok_count`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Neha Jethwani', 'Digital Content Creator', 'images/members/1774162433_69bf9201e4799.jpg', '4.1M Followers', '336K Subscribers', NULL, 'active', '2025-12-10 06:02:41', '2026-03-22 01:28:32'),
(2, 2, 'Elvish Yadav', 'Social Media Personality', 'images/members/1774162687_69bf92ff79ed7.webp', '20.1M Followers', '15.9M Subscribers', NULL, 'active', '2026-02-25 02:03:02', '2026-03-22 01:28:07'),
(3, 3, 'Ajey Nagar', 'Comedian, Gamer & Rapper', 'images/members/1774163070_69bf947e5ced9.jpg', '21.3M Followers', '45.3M Subscribers', NULL, 'active', '2026-03-22 01:34:30', '2026-03-22 01:34:30');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_order` int(10) UNSIGNED NOT NULL,
  `rating_quantity` int(10) UNSIGNED DEFAULT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `client_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_date` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `position_order`, `rating_quantity`, `client_name`, `client_designation`, `description`, `client_image`, `review_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'Athea Morela', 'CEO, Company', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.&lt;/p&gt;', 'images/testimonials/1765627694_693d572e636f6.jpg', '2025-12-13', 'active', '2025-12-13 06:38:14', '2025-12-13 06:47:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ig_access_token` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ig_page_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ig_business_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ig_token_expires_at` timestamp NULL DEFAULT NULL,
  `phone_verified` tinyint(1) DEFAULT NULL,
  `term_box_check` tinyint(1) DEFAULT NULL,
  `role` tinyint(4) DEFAULT NULL,
  `two_factor_enabled` tinyint(1) DEFAULT '0',
  `is_active` tinyint(4) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first`, `last`, `username`, `google_id`, `dob`, `phone`, `email`, `email_verified_at`, `password`, `ig_access_token`, `ig_page_id`, `ig_business_id`, `ig_token_expires_at`, `phone_verified`, `term_box_check`, `role`, `two_factor_enabled`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(13, 'Boby Gupta', 'Boby Gupta', 'Boby Gupta', '102444074175495462934', '1993-06-19', '+916392136210', 'influencer@gmail.com', '2025-12-05 01:34:37', '$2y$12$aZWycHbrrmyDQwn/mBYqIe7lwnYMCGaLhtmdwDZu.doIU59xRM7di', NULL, NULL, NULL, NULL, 1, NULL, 0, 0, 1, '6nGVIKlXVGGcIoQvxWNaGft8ObfgPmvccR8t3K002OCzJeogwXvwJO0Rp3bj', '2025-12-05 01:34:37', '2026-02-10 07:10:29'),
(16, 'webtestmail', 'webtestmail', 'webtestmail', '101502217075718104868', '1993-12-19', '+916392136208', 'webtestmail736@gmail.com', NULL, '$2y$12$6P1gcW.ffNYxV2TFkip6G.ZzsGcKoDxDFj28CFVX9ShY28i2MUycK', NULL, NULL, NULL, NULL, 1, 1, 2, 0, 1, 'lk8kM9S9Dl7L2uqQl0c4jKWqxgGswqM0omdoRHkAdr7AuxBFTkS3DJOjMhOV', '2025-12-17 13:34:05', '2026-03-17 04:54:59'),
(20, 'Kumar', 'Gaurav', 'gaurav', NULL, NULL, '8787878787', 'kumargtesting@gmail.com', NULL, '$2y$12$kqVVaGybEJcqkSrhqxfcyOSt042PwWQFOjfhme757ZXUCSxl/OLMq', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, NULL, '2026-02-10 01:39:27', '2026-02-10 01:39:27'),
(22, 'Boby Gupta', NULL, 'Boby Gupta', '102444074175495462934', NULL, NULL, 'info.bobbygupta@gmail.com', '2026-02-12 14:29:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 'D6DPS9xe9CD3DunNftP8padAnWqdWZRmHxRghig9aZYpRo5XOq2CIqtTR3jU', '2026-02-12 14:29:27', '2026-02-12 14:29:27'),
(23, 'Matebiz', 'Partner', 'brand_1771063264', NULL, NULL, '9876543210', 'brand@gmail.com', NULL, '$2y$12$A27PWyRjYYpmYZFKtjO4quVp8a6PqwB1NVHY7wXudi6S.sQY/MSOu', NULL, NULL, NULL, NULL, NULL, 1, 2, 0, 1, NULL, '2026-02-14 04:31:04', '2026-02-14 04:31:04'),
(30, 'Jane', 'Smith', 'brand_1771931645', NULL, NULL, '0987654321', 'partnerships@brand.com', NULL, '$2y$12$o.w/IkHF7.W5PZDCXqSSo.ZYre6Q6pYEwlxtLgBOw6fPSmnnr8sjK', NULL, NULL, NULL, NULL, NULL, 1, 2, 0, 0, NULL, '2026-02-24 05:44:05', '2026-02-24 05:44:05'),
(32, 'John', 'Doe', 'johndoe_influencer', NULL, NULL, '1234567890', 'john.influencer@example.com', NULL, '$2y$12$KiFGbhB1Qj6ZFK69qYAWNOPxFXC4USllvkpSU4ssamJyrmZ.fcVxW', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, NULL, '2026-02-24 06:26:30', '2026-02-24 06:26:30'),
(33, 'John', 'Doe', 'johndoe_influencer1', NULL, NULL, '9876532101', 'john.influencer1@example.com', NULL, '$2y$12$bz9a32Ltot3EQS94n7/s7OBFOjvLX7usg8uDQo2oWsokpGfP6fmFC', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, NULL, '2026-03-06 00:59:41', '2026-03-06 00:59:41'),
(34, 'Jane', 'Smith', 'brand_1772780316', NULL, NULL, '9089089089', 'test+1@brand.com', NULL, '$2y$12$GeAWbU.06JkNd2PbeAkk6uMEusE8YJe0B8krqyi7KzaYsZV0sULMm', NULL, NULL, NULL, NULL, NULL, 1, 2, 0, 0, NULL, '2026-03-06 01:28:37', '2026-03-06 01:28:37'),
(35, 'John', 'Doe', 'influencer_vik', NULL, NULL, '9879879870', 'vik@gmail.com', NULL, '$2y$12$7cLrWuqFJL.moocCGodF8.qSaFH9m1r/JqJ6dss/JDyHQLPcGdp52', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, NULL, '2026-03-06 06:35:41', '2026-03-06 06:35:41'),
(36, 'Vikrant', 'Tomar', 'brand_1773032943', NULL, NULL, '9876598765', 'testingemail@gmail.com', NULL, '$2y$12$t9PltfRmj1r0rotBAgN0CO0PB9r6mwXbadEroUz0BTvSJkzeP8HWm', NULL, NULL, NULL, NULL, NULL, 1, 2, 0, 0, NULL, '2026-03-08 23:39:03', '2026-03-08 23:39:03'),
(37, 'Vikrant', 'Tomar', 'Vikranttomar', NULL, NULL, '9876987609', 'Testvik@gmail.com', NULL, '$2y$12$XhYiCs1z48KjaIBaCZodU.0YeeQLp.p8/DtLyraIXFq9yNs4i27B2', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, NULL, '2026-03-08 23:58:54', '2026-03-08 23:58:54'),
(39, 'Vikrant', 'Tomar', 'Vik', NULL, NULL, '9876549876', 'Vik1@gmail.com', NULL, '$2y$12$Vow6nMtomj/4bX5n1bE2ROJgdx/5oM4uQEu4WgY26hoNE6hsDmc9S', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, NULL, '2026-03-09 00:05:30', '2026-03-09 00:05:30'),
(40, 'Vikrant', 'Tomar', 'brand_1773034820', NULL, NULL, '9876598760', 'testbrand@gmail.com', NULL, '$2y$12$5EXsTYMQp6W5umH48A4/DuTcVIoKcpKJpsvt/hmuL3NRgGWuFUiAK', NULL, NULL, NULL, NULL, NULL, 1, 2, 0, 0, NULL, '2026-03-09 00:10:21', '2026-03-09 00:10:21'),
(41, 'Mukesh', 'Kumar', NULL, NULL, NULL, '9876543210', 'mukesh@gmail.com', NULL, '$2y$12$mic90yizuB2gywREzWNrBOnttncJHPkYAf16dXYMfEQjdjcP0dPnS', NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, 0, NULL, '2026-03-20 07:18:29', '2026-03-20 07:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `follower_count` bigint(20) NOT NULL DEFAULT '0',
  `instagram_url` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_url` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiktok_url` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_url` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `niche` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `budget` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `company_name`, `follower_count`, `instagram_url`, `youtube_url`, `tiktok_url`, `website_url`, `image`, `niche`, `location`, `industry`, `budget`, `about`, `is_active`, `created_at`, `updated_at`) VALUES
(5, 13, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'Delhi', NULL, NULL, 'Okay', 0, '2025-12-05 01:34:37', '2026-02-10 07:10:29'),
(8, 16, 'matebiz', 0, NULL, NULL, NULL, NULL, NULL, NULL, 'Delhi', NULL, NULL, 'Test Bio', 0, '2025-12-17 13:34:05', '2026-02-19 05:46:37'),
(9, 20, NULL, 100, NULL, NULL, NULL, NULL, 'default-avatar.png', 'tech', NULL, NULL, NULL, 'Testing data', 0, '2026-02-10 01:39:27', '2026-02-10 01:39:27'),
(11, 22, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2026-02-12 14:29:27', '2026-02-12 14:29:27'),
(12, 23, 'matebiz pvt ltd', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2026-02-14 04:31:04', '2026-02-14 04:31:04'),
(19, 30, 'Acme Innovations', 0, NULL, NULL, NULL, 'https://acme-innovations.com', 'company_logos/o0S3jyfzqx8PGb0100FDYatpL8ec93LhoCOJjMWH.png', NULL, 'Delhi', 'Tech', '500_2000', NULL, 0, '2026-02-24 05:44:05', '2026-02-24 05:44:05'),
(21, 32, NULL, 5000, 'https://www.instagram.com/', 'https://www.youtube.com/', NULL, NULL, 'profile_pictures/08KGs6FRnUWdyTgddu8gL0Rh1DKYRhNbRMGG6nus.png', 'Tech', 'Delhi', NULL, NULL, 'Sharing the latest in tech and coding tips.', 0, '2026-02-24 06:26:30', '2026-02-24 06:26:30'),
(22, 33, NULL, 5000, 'https://www.instagram.com/', 'https://www.youtube.com/', NULL, NULL, 'default-avatar.png', 'Tech', 'Delhi', NULL, NULL, 'Sharing the latest in tech and coding tips.', 0, '2026-03-06 00:59:41', '2026-03-06 00:59:41'),
(23, 34, 'Acme Innovations', 0, NULL, NULL, NULL, 'https://acme-innovations.com', NULL, NULL, 'Delhi', 'Tech', '500_2000', NULL, 0, '2026-03-06 01:28:37', '2026-03-06 01:28:37'),
(24, 35, NULL, 5000, 'https://www.instagram.com/', 'https://www.youtube.com/', NULL, NULL, 'default-avatar.png', 'Tech', 'Delhi', NULL, NULL, 'Sharing the latest in tech and coding tips.', 0, '2026-03-06 06:35:41', '2026-03-06 06:35:41'),
(25, 36, 'Testing company', 0, NULL, NULL, NULL, 'https://www.westwebsite.com', 'company_logos/6y1w5MOMf7Bn9DFHAoBef6PMXRizqwxjYkFQ3Eyk.jpg', NULL, 'Delhi', 'Tech', 'Under $500', NULL, 0, '2026-03-08 23:39:03', '2026-03-08 23:39:03'),
(26, 37, NULL, 1, NULL, NULL, NULL, NULL, 'profile_pictures/rsFcHph2k4gkXYH05FlekSvroUUKNychdQwZGoQS.jpg', 'E-commerce', 'Delhi', NULL, NULL, NULL, 0, '2026-03-08 23:58:54', '2026-03-08 23:58:54'),
(27, 39, NULL, 1, NULL, NULL, NULL, NULL, 'profile_pictures/9YzzHyTtKBxvg3Y69TIgpGHcq2hCYSmiJh3aDceY.jpg', NULL, 'Delhi', NULL, NULL, NULL, 0, '2026-03-09 00:05:30', '2026-03-09 00:05:30'),
(28, 40, 'Company Name', 0, NULL, NULL, NULL, 'https://vik.com', 'company_logos/3zZEDDo1mCay2TKmvuyJvRL8ePlXOidWbs5Ldb3Z.jpg', NULL, 'Delhi', 'Tech', '$500 - $2,000', NULL, 0, '2026-03-09 00:10:21', '2026-03-09 00:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `balance` bigint(20) DEFAULT '0',
  `credit` float NOT NULL DEFAULT '0',
  `debit` float NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `balance`, `credit`, `debit`, `status`, `is_active`, `created_at`, `updated_at`) VALUES
(3, 13, 2706, 0, 0, NULL, 1, '2025-12-05 01:34:37', '2026-03-12 15:43:05'),
(6, 16, 18215, 0, 0, NULL, 1, '2025-12-17 13:34:05', '2026-03-19 02:49:43'),
(7, 20, 0, 0, 0, NULL, 1, '2026-02-10 01:39:27', '2026-02-10 01:39:27'),
(9, 22, 0, 0, 0, NULL, 1, '2026-02-12 14:29:27', '2026-02-12 14:29:27'),
(10, 23, 0, 0, 0, NULL, 1, '2026-02-14 04:31:04', '2026-02-14 04:31:04'),
(17, 30, 0, 0, 0, NULL, 1, '2026-02-24 05:44:05', '2026-02-24 05:44:05'),
(19, 32, 0, 0, 0, NULL, 1, '2026-02-24 06:26:30', '2026-02-24 06:26:30'),
(20, 33, 0, 0, 0, NULL, 1, '2026-03-06 00:59:41', '2026-03-06 00:59:41'),
(21, 34, 0, 0, 0, NULL, 1, '2026-03-06 01:28:37', '2026-03-06 01:28:37'),
(22, 35, 0, 0, 0, NULL, 1, '2026-03-06 06:35:41', '2026-03-06 06:35:41'),
(23, 36, 0, 0, 0, NULL, 1, '2026-03-08 23:39:03', '2026-03-08 23:39:03'),
(24, 37, 0, 0, 0, NULL, 1, '2026-03-08 23:58:54', '2026-03-08 23:58:54'),
(25, 39, 0, 0, 0, NULL, 1, '2026-03-09 00:05:30', '2026-03-09 00:05:30'),
(26, 40, 0, 0, 0, NULL, 1, '2026-03-09 00:10:21', '2026-03-09 00:10:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applications_influencer_id_foreign` (`influencer_id`);

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_accounts_user_id_foreign` (`user_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_sections`
--
ALTER TABLE `blog_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `campagins`
--
ALTER TABLE `campagins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campagins_user_id_foreign` (`user_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboard_features`
--
ALTER TABLE `dashboard_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliverables`
--
ALTER TABLE `deliverables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deliverables_campagin_id_foreign` (`campagin_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `features_slug_unique` (`slug`);

--
-- Indexes for table `feature_plan`
--
ALTER TABLE `feature_plan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feature_plan_plan_id_foreign` (`plan_id`),
  ADD KEY `feature_plan_feature_id_foreign` (`feature_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instagrams`
--
ALTER TABLE `instagrams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instagrams_user_id_foreign` (`user_id`);

--
-- Indexes for table `instagram_settings`
--
ALTER TABLE `instagram_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instagram_settings_instagram_id_foreign` (`instagram_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_campagin_id_foreign` (`campagin_id`),
  ADD KEY `messages_sender_id_foreign` (`sender_id`),
  ADD KEY `messages_receiver_id_foreign` (`receiver_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifactions`
--
ALTER TABLE `notifactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifactions_user_id_foreign` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_campagin_id_foreign` (`campagin_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_sections`
--
ALTER TABLE `page_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_requests`
--
ALTER TABLE `payment_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_requests_user_id_foreign` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`razorpay_plan_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_products_campagin_id_foreign` (`campagin_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `quick_modules`
--
ALTER TABLE `quick_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_sections`
--
ALTER TABLE `service_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_razorpay_subscription_id_unique` (`razorpay_subscription_id`),
  ADD KEY `subscriptions_user_id_foreign` (`user_id`),
  ADD KEY `subscriptions_plan_id_foreign` (`plan_id`);

--
-- Indexes for table `target_audiences`
--
ALTER TABLE `target_audiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `target_audiences_campagin_id_foreign` (`campagin_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallets_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `blog_sections`
--
ALTER TABLE `blog_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `campagins`
--
ALTER TABLE `campagins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dashboard_features`
--
ALTER TABLE `dashboard_features`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deliverables`
--
ALTER TABLE `deliverables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `feature_plan`
--
ALTER TABLE `feature_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `instagrams`
--
ALTER TABLE `instagrams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `instagram_settings`
--
ALTER TABLE `instagram_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `notifactions`
--
ALTER TABLE `notifactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `page_sections`
--
ALTER TABLE `page_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `payment_requests`
--
ALTER TABLE `payment_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `quick_modules`
--
ALTER TABLE `quick_modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_sections`
--
ALTER TABLE `service_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `target_audiences`
--
ALTER TABLE `target_audiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_influencer_id_foreign` FOREIGN KEY (`influencer_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD CONSTRAINT `bank_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `campagins`
--
ALTER TABLE `campagins`
  ADD CONSTRAINT `campagins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `deliverables`
--
ALTER TABLE `deliverables`
  ADD CONSTRAINT `deliverables_campagin_id_foreign` FOREIGN KEY (`campagin_id`) REFERENCES `campagins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `feature_plan`
--
ALTER TABLE `feature_plan`
  ADD CONSTRAINT `feature_plan_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`),
  ADD CONSTRAINT `feature_plan_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`);

--
-- Constraints for table `instagrams`
--
ALTER TABLE `instagrams`
  ADD CONSTRAINT `instagrams_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `instagram_settings`
--
ALTER TABLE `instagram_settings`
  ADD CONSTRAINT `instagram_settings_instagram_id_foreign` FOREIGN KEY (`instagram_id`) REFERENCES `instagrams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_campagin_id_foreign` FOREIGN KEY (`campagin_id`) REFERENCES `campagins` (`id`),
  ADD CONSTRAINT `messages_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notifactions`
--
ALTER TABLE `notifactions`
  ADD CONSTRAINT `notifactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_campagin_id_foreign` FOREIGN KEY (`campagin_id`) REFERENCES `campagins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_requests`
--
ALTER TABLE `payment_requests`
  ADD CONSTRAINT `payment_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `table_products_campagin_id_foreign` FOREIGN KEY (`campagin_id`) REFERENCES `campagins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `target_audiences`
--
ALTER TABLE `target_audiences`
  ADD CONSTRAINT `target_audiences_campagin_id_foreign` FOREIGN KEY (`campagin_id`) REFERENCES `campagins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD CONSTRAINT `user_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `wallets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
