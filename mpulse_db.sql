-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2022 at 06:13 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mpulse_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cash_outs`
--

CREATE TABLE `cash_outs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tran_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note_send` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cash_outs`
--

INSERT INTO `cash_outs` (`id`, `user_id`, `name`, `email`, `phone`, `amount`, `tran_id`, `note_send`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ken Developer', 'admin@mpulse.com', '08037250238', '1', 'WfpD9KPeZ1JCsjmR', 'ergergergarge', '2022-05-25 23:15:36', '2022-05-25 23:15:36'),
(2, 1, 'Ken Developer', 'admin@mpulse.com', '08037250238', '10', 'uTplqwXgW5bC16e8', 'ergrefreawe', '2022-05-25 23:20:07', '2022-05-25 23:20:07'),
(3, 1, 'Ken Developer', 'admin@mpulse.com', '08037250238', '10', 'K49OmvU3nhqioxCW', 'ergrefreawe', '2022-05-25 23:20:12', '2022-05-25 23:20:12'),
(4, 1, 'Ken Developer', 'admin@mpulse.com', '08037250238', '2', 'esSx0ETBwLck3nQA', 'ergrer', '2022-05-25 23:21:28', '2022-05-25 23:21:28'),
(5, 1, 'Ken Developer', 'admin@mpulse.com', '08037250238', '2', 'ctxs9RgOTYzJWFk8', 'eeree', '2022-05-25 23:24:33', '2022-05-25 23:24:33'),
(6, 1, 'Ken Developer', 'admin@mpulse.com', '08037250238', '2', 'NOEevWqClaLzP7c2', 'tgeer', '2022-05-25 23:24:41', '2022-05-25 23:24:41');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_batch_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `user_id`, `coupon_code`, `code_amount`, `code_status`, `coupon_batch_code`, `created_at`, `updated_at`) VALUES
(4, 1, '103024', '150', 'Used', 'TZ-990-BBC', '2022-05-24 02:01:22', '2022-05-24 02:01:22'),
(5, 1, '308909', '100', 'Used', 'TY-990-AVB', '2022-05-24 23:45:49', '2022-05-24 23:45:49');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_code_generates`
--

CREATE TABLE `coupon_code_generates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `partner_id` bigint(20) DEFAULT 12,
  `generate_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partner_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_use_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partn_reg_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partn_confirmdate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partn_pay_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partn_batch_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupon_code_generates`
--

INSERT INTO `coupon_code_generates` (`id`, `partner_id`, `generate_code`, `code_amount`, `partner_status`, `code_status`, `user_id`, `code_use_date`, `partn_reg_date`, `partn_confirmdate`, `partn_pay_code`, `partn_batch_code`, `created_at`, `updated_at`) VALUES
(1, 12, '308909', '100', 'Active', NULL, NULL, NULL, NULL, NULL, 'Paid', 'TY-990-AVB', NULL, NULL),
(2, 12, '103024', '150', 'Active', NULL, NULL, NULL, NULL, NULL, 'Paid', 'TZ-990-BBC', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupon_transfers`
--

CREATE TABLE `coupon_transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rec_id` bigint(20) UNSIGNED NOT NULL,
  `sender_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rec_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rec_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amt_send` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `trancode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `act_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acct_status2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupon_transfers`
--

INSERT INTO `coupon_transfers` (`id`, `user_id`, `rec_id`, `sender_email`, `sender_name`, `rec_email`, `rec_name`, `status`, `amt_send`, `created_at`, `updated_at`, `trancode`, `act_status`, `acct_status2`) VALUES
(1, 1, 2, 'admin@mpulse.com', 'Ken Developer', 'ben@gmail.com', 'Ben Done', 'Pending', 20.00, '2022-05-26 00:23:15', '2022-05-26 00:23:15', '7xEiIWvNd5RCA3zs', NULL, NULL),
(2, 1, 2, 'admin@mpulse.com', 'Ken Developer', 'ben@gmail.com', 'Ben Done', 'Active', 20.00, '2022-05-26 18:22:18', '2022-05-26 18:22:18', '4xEvTbnUdm8C0PIe', 'Debit', NULL),
(3, 1, 2, 'admin@mpulse.com', 'Ken Developer', 'ben@gmail.com', 'Ben Done', 'Active', 12.00, '2022-05-26 18:29:15', '2022-05-26 18:29:15', 'pJo4UusPrlTxf3IZ', 'Credit', NULL),
(4, 1, 2, 'admin@mpulse.com', 'Ken Developer', 'ben@gmail.com', 'Ben Done', 'Active', 12.00, '2022-05-26 18:30:13', '2022-05-26 18:30:14', 'XujKeF9PflI7SshJ', 'Credit', 'Debit'),
(5, 1, 1, 'admin@mpulse.com', 'Ken Developer', 'ben@gmail.com', 'Ben Done', 'Active', 15.00, '2022-05-26 18:30:39', '2022-05-26 18:30:39', 'XhImy2jVRP41ldeq', 'Credit', NULL),
(6, 1, 2, 'admin@mpulse.com', 'Ken Developer', 'ben@gmail.com', 'Ben Done', 'Active', 5.00, '2022-05-26 21:26:16', '2022-05-26 21:26:17', 'rNbpLXhO0gnvYaH3', 'Credit', 'Debit'),
(7, 1, 2, 'admin@mpulse.com', 'Ken Developer', 'ben@gmail.com', 'Ben Done', 'Active', 30.00, '2022-05-26 21:34:57', '2022-05-26 21:34:57', 'vVj92UuRhQZBr8Jk', 'Credit', 'Debit'),
(8, 1, 2, 'admin@mpulse.com', 'Ken Developer', 'ben@gmail.com', 'Ben Done', 'Active', 10.00, '2022-05-27 02:15:24', '2022-05-27 02:15:24', 'NAbr7fwsKHPjZ6L1', 'Credit', 'Debit'),
(9, 1, 2, 'admin@mpulse.com', 'Ken Developer', 'ben@gmail.com', 'Ben Done', 'Active', 23.00, '2022-05-27 04:38:19', '2022-05-27 04:38:19', 'nsq08V62P9pSQiU3', 'Credit', 'Debit'),
(10, 1, 2, 'admin@mpulse.com', 'Ken Developer', 'ben@gmail.com', 'Ben Done', 'Active', 11.00, '2022-05-27 04:38:27', '2022-05-27 04:38:27', '5ruHND46oPA9tR2X', 'Credit', 'Debit'),
(11, 1, 2, 'admin@mpulse.com', 'Ken Developer', 'ben@gmail.com', 'Ben Done', 'Active', 50.00, '2022-05-27 04:38:36', '2022-05-27 04:38:36', 'VBgWXm34DOuYHNFA', 'Credit', 'Debit'),
(12, 1, 2, 'admin@mpulse.com', 'Ken Developer', 'ben@gmail.com', 'Ben Done', 'Active', 15.00, '2022-05-27 04:38:51', '2022-05-27 04:38:51', 'TYodD3jIFvhSLXJ9', 'Credit', 'Debit'),
(13, 1, 2, 'admin@mpulse.com', 'Ken Developer', 'ben@gmail.com', 'Ben Done', 'Active', 10.00, '2022-05-27 04:38:58', '2022-05-27 04:38:58', 'tLwQ53kbXjrplcnh', 'Credit', 'Debit'),
(14, 1, 2, 'admin@mpulse.com', 'Ken Developer', 'ben@gmail.com', 'Ben Done', 'Active', 20.00, '2022-05-27 04:39:07', '2022-05-27 04:39:07', 'eGZcOK1TsxPh5FAV', 'Credit', 'Debit'),
(15, 1, 2, 'admin@mpulse.com', 'Ken Developer', 'ben@gmail.com', 'Ben Done', 'Active', 25.00, '2022-05-27 04:39:31', '2022-05-27 04:39:31', 'iXyRmQu3O2SKblHW', 'Credit', 'Debit');

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
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_amt` double(8,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_nature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tidcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`id`, `user_id`, `user_email`, `send_amt`, `status`, `action_nature`, `created_at`, `updated_at`, `tidcode`) VALUES
(1, 1, 'admin@mpulse.com', 5.00, 'Debit', 'Transfer', '2022-05-26 21:26:17', '2022-05-26 21:26:17', NULL),
(2, 2, 'ben@gmail.com', 5.00, 'Credit', 'Transfer', '2022-05-26 21:26:17', '2022-05-26 21:26:17', NULL),
(3, 1, 'admin@mpulse.com', 30.00, 'Debit', 'Transfer', '2022-05-26 21:34:57', '2022-05-26 21:34:57', 'An4B9zI5MWRuLejZ'),
(4, 2, 'ben@gmail.com', 30.00, 'Credit', 'Transfer', '2022-05-26 21:34:57', '2022-05-26 21:34:57', 'An4B9zI5MWRuLejZ');

-- --------------------------------------------------------

--
-- Table structure for table `history_details`
--

CREATE TABLE `history_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` bigint(20) DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_amt` double(8,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_nature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tidcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history_details`
--

INSERT INTO `history_details` (`id`, `uid`, `user_email`, `send_amt`, `status`, `action_nature`, `tidcode`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin@mpulse.com', 10.00, 'Debit', 'Transfer', 'GDXN7vu0pFoJbsxI', '2022-05-27 02:15:24', '2022-05-27 02:15:24'),
(2, 2, 'ben@gmail.com', 10.00, 'Credit', 'Transfer', 'GDXN7vu0pFoJbsxI', '2022-05-27 02:15:24', '2022-05-27 02:15:24'),
(3, 1, 'admin@mpulse.com', 23.00, 'Debit', 'Transfer', 'lkfPojibvJsQtMDn', '2022-05-27 04:38:20', '2022-05-27 04:38:20'),
(4, 2, 'ben@gmail.com', 23.00, 'Credit', 'Transfer', 'lkfPojibvJsQtMDn', '2022-05-27 04:38:20', '2022-05-27 04:38:20'),
(5, 1, 'admin@mpulse.com', 11.00, 'Debit', 'Transfer', '14q8exgB5JcKYO2m', '2022-05-27 04:38:27', '2022-05-27 04:38:27'),
(6, 2, 'ben@gmail.com', 11.00, 'Credit', 'Transfer', '14q8exgB5JcKYO2m', '2022-05-27 04:38:27', '2022-05-27 04:38:27'),
(7, 1, 'admin@mpulse.com', 50.00, 'Debit', 'Transfer', 'P9MWwBm3bvtcujJZ', '2022-05-27 04:38:37', '2022-05-27 04:38:37'),
(8, 2, 'ben@gmail.com', 50.00, 'Credit', 'Transfer', 'P9MWwBm3bvtcujJZ', '2022-05-27 04:38:37', '2022-05-27 04:38:37'),
(9, 1, 'admin@mpulse.com', 15.00, 'Debit', 'Transfer', 'uUAKMhb8y9NLkcl4', '2022-05-27 04:38:51', '2022-05-27 04:38:51'),
(10, 2, 'ben@gmail.com', 15.00, 'Credit', 'Transfer', 'uUAKMhb8y9NLkcl4', '2022-05-27 04:38:51', '2022-05-27 04:38:51'),
(11, 1, 'admin@mpulse.com', 10.00, 'Debit', 'Transfer', 'dwl5HNsAg6jrOYkJ', '2022-05-27 04:38:58', '2022-05-27 04:38:58'),
(12, 2, 'ben@gmail.com', 10.00, 'Credit', 'Transfer', 'dwl5HNsAg6jrOYkJ', '2022-05-27 04:38:59', '2022-05-27 04:38:59'),
(13, 1, 'admin@mpulse.com', 20.00, 'Debit', 'Transfer', 'TDJ3PcSgL7av8Gno', '2022-05-27 04:39:07', '2022-05-27 04:39:07'),
(14, 2, 'ben@gmail.com', 20.00, 'Credit', 'Transfer', 'TDJ3PcSgL7av8Gno', '2022-05-27 04:39:07', '2022-05-27 04:39:07'),
(15, 1, 'admin@mpulse.com', 25.00, 'Debit', 'Transfer', 'Vm0O9BvgrhAlPTU1', '2022-05-27 04:39:31', '2022-05-27 04:39:31'),
(16, 2, 'ben@gmail.com', 25.00, 'Credit', 'Transfer', 'Vm0O9BvgrhAlPTU1', '2022-05-27 04:39:31', '2022-05-27 04:39:31');

-- --------------------------------------------------------

--
-- Table structure for table `member_partners`
--

CREATE TABLE `member_partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(5, '2022_05_21_135842_create_coupons_table', 1),
(6, '2022_05_21_140552_create_coupon_code_generates_table', 1),
(7, '2022_05_21_140802_create_member_partners_table', 1),
(8, '2022_05_25_155426_create_coupon_transfers_table', 2),
(9, '2022_05_25_160949_create_cash_outs_table', 3),
(10, '2022_05_25_163810_add_trancode_to_coupon_transfers', 4),
(11, '2022_05_26_110418_add_act_status_to_coupon_transfers_table', 5),
(12, '2022_05_26_110915_add_act_status_to_coupon_transfers_table', 6),
(13, '2022_05_26_112528_add_act_status2_to_coupon_transfers_table', 7),
(14, '2022_05_26_141001_create_histories_table', 8),
(15, '2022_05_26_143202_add_tidcode_to_histories_table', 9),
(16, '2022_05_26_190340_create_history_details_table', 10),
(17, '2022_05_27_115202_create_tickets_table', 11),
(25, '2022_06_09_110457_create_settings_table', 12);

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
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `topup_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'null',
  `debit_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'null',
  `acct_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'null',
  `fa2_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'null',
  `credit_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'null',
  `update_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'null',
  `promo_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'null',
  `otp_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'null',
  `setting_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `user_id`, `topup_email`, `debit_email`, `acct_email`, `fa2_email`, `credit_email`, `update_email`, `promo_email`, `otp_email`, `setting_status`, `created_at`, `updated_at`) VALUES
(1, 2, '0', '0', '0', '0', NULL, '0', '0', '0', NULL, NULL, '2022-06-11 01:34:41'),
(2, 1, '', '', '1', '1', '', '', '', '1', NULL, '2022-06-11 16:18:54', '2022-06-11 17:27:41'),
(3, 7, 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', NULL, '2022-06-11 18:28:17', '2022-06-11 18:28:17'),
(4, 8, '', '', '', '', '', '', '', '', '', '2022-06-11 18:30:42', '2022-06-11 18:30:42'),
(5, 9, '', '', '', '', '', '', '', '', '', '2022-06-11 18:32:13', '2022-06-11 18:32:13'),
(6, 10, '', '', '', '', '', '', '', '', '', '2022-06-11 19:50:45', '2022-06-11 19:50:45');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` bigint(20) UNSIGNED NOT NULL,
  `u_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `u_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_tiltle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_tid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `uid`, `u_email`, `u_name`, `t_tiltle`, `t_subject`, `t_message`, `t_tid`, `t_status`, `t_action`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin@mpulse.com', 'Ken Developer', 'qeqwwsd', NULL, 'qwfqfqwfqw', 'NT72JHBZwa1r8vDt', 'Open Ticket', 'High', '2022-05-27 20:01:25', '2022-05-27 20:01:25'),
(2, 1, 'admin@mpulse.com', 'Ken Developer', 'Transfer', 'Invalid Coupon', 'rvwfwefewdfewf', '08cjqMYfUCFWxO2t', 'Open Ticket', 'High', '2022-05-27 20:03:00', '2022-05-27 20:03:00'),
(3, 1, 'admin@mpulse.com', 'Ken Developer', 'I Transfer', 'Account Deactivation', 'egbegegeeev', 'ru3S1hRNwXQZdyOP', 'Open Ticket', 'High', '2022-05-27 20:04:34', '2022-05-27 20:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mpcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acct_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `married_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gamount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acctno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acct_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bankname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `sex`, `state`, `location`, `address`, `username`, `dob`, `mpcode`, `acct_status`, `reg_status`, `occupation`, `married_status`, `reg_date`, `gamount`, `acctno`, `acct_name`, `bankname`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ken', 'admin@mpulse.com', NULL, '$2y$10$pv9hKvrbq9BECaRZXy8k4uloiGLDp2yFJKO2YbKXxv.9NDOVnP4vi', '08037250238', 'Male', NULL, NULL, NULL, NULL, '25/02/1990', NULL, NULL, NULL, NULL, NULL, NULL, '46301', NULL, 'Young Developer', NULL, '1654511459.jpg', NULL, '2022-05-24 01:45:27', '2022-06-06 17:30:59'),
(2, 'Ben Done', 'ben@gmail.com', NULL, '$2y$10$dXyApJlEdMXgQfRUgmlVQuN6VRKrokPGVV6ygwdudekFoDIP8y8lq', '3456780987654', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1278', NULL, NULL, NULL, NULL, NULL, '2022-05-24 17:04:14', '2022-05-27 04:39:31'),
(7, 'John Done', 'john@gmail.com', NULL, '$2y$10$QIqQCidljZTseRqdJC80xOlWRNxzeehUNfYaFa2056E0aj3couxJi', '9876567890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-11 18:28:17', '2022-06-11 18:28:17'),
(8, 'Jerry More', 'jeery@gmail.com', NULL, '$2y$10$2eZNPLd4RH8naXbnNmXIx.SrFmXIb0KmP4wbeucklSB.xnUBXQEuu', '0987667890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-11 18:30:42', '2022-06-11 18:30:42'),
(9, 'Tina Perry', 'tina@gmail.com', NULL, '$2y$10$yP5GH8QjMmTsDw.GSyqM0O8voyGRhcErMzECbp25JzZmUshM9gway', '09877890876', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-11 18:32:13', '2022-06-11 18:32:13'),
(10, 'Mike Well', 'mike@gmail.com', NULL, '$2y$10$FZwk1iADuI25LrpUfcM4l.5xkmMfkX4Ct7qGsrXptFRep7az2l96O', '909898878787', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-11 19:50:45', '2022-06-11 19:50:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cash_outs`
--
ALTER TABLE `cash_outs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupons_user_id_foreign` (`user_id`);

--
-- Indexes for table `coupon_code_generates`
--
ALTER TABLE `coupon_code_generates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_transfers`
--
ALTER TABLE `coupon_transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_details`
--
ALTER TABLE `history_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_partners`
--
ALTER TABLE `member_partners`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `cash_outs`
--
ALTER TABLE `cash_outs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coupon_code_generates`
--
ALTER TABLE `coupon_code_generates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupon_transfers`
--
ALTER TABLE `coupon_transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `history_details`
--
ALTER TABLE `history_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `member_partners`
--
ALTER TABLE `member_partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `coupons_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
