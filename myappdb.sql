-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2023 at 11:45 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myappdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `br_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commonfeecollection`
--

CREATE TABLE `commonfeecollection` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Receipt` double(8,2) NOT NULL,
  `ReceiptReverse` double(8,2) NOT NULL,
  `Payment` double(8,2) NOT NULL,
  `PaymentReverse` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commonfeecollection`
--

INSERT INTO `commonfeecollection` (`id`, `Receipt`, `ReceiptReverse`, `Payment`, `PaymentReverse`, `created_at`, `updated_at`) VALUES
(1, 100.20, 100.20, 100.20, 1245.22, '2022-10-22 09:37:34', '2022-10-22 09:37:34'),
(2, 100.20, 100.20, 100.20, 1245.22, '2022-10-22 09:37:34', '2022-10-22 09:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `commonfeecollectionheadwise`
--

CREATE TABLE `commonfeecollectionheadwise` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `moduleId` int(11) NOT NULL,
  `receiptId` int(11) NOT NULL,
  `brid` int(11) NOT NULL,
  `headId` int(11) NOT NULL,
  `headType` int(11) NOT NULL,
  `headName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `amountPay` double(8,2) NOT NULL,
  `ddNo` int(11) NOT NULL,
  `ddDate` date NOT NULL,
  `ddBank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clientBank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `displayReceiptNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entryMode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `challanRefId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adjustRefId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dueRefId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `entrymode`
--

CREATE TABLE `entrymode` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Entrymode_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `crdr` enum('C','D') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'D',
  `entrymodeno` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feecategory`
--

CREATE TABLE `feecategory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `feecategory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_created` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `fee_code` int(11) NOT NULL,
  `tr_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feecollectiontypes`
--

CREATE TABLE `feecollectiontypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `collectionhead` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `collectiondesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `br_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feetypes`
--

CREATE TABLE `feetypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fee_category` int(11) NOT NULL,
  `f_name` int(11) NOT NULL,
  `Collection_id` int(11) NOT NULL,
  `br_id` int(11) NOT NULL,
  `Seq_id` int(11) NOT NULL,
  `Fee_type_ledger` int(11) NOT NULL,
  `Fee_headtype` int(11) NOT NULL,
  `inactive` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `isRefundable` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `isScholarship` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `sequenceNo` int(11) NOT NULL,
  `feeTypeName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feeTypeNameTally` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `financialtrandetail`
--

CREATE TABLE `financialtrandetail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `financialTransId` bigint(20) UNSIGNED NOT NULL,
  `moduleId` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `headId` int(11) NOT NULL,
  `crdr` enum('C','D') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'C',
  `tranRefId` int(11) NOT NULL,
  `oldTranId` int(11) NOT NULL,
  `isTaxable` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `financial_tran`
--

CREATE TABLE `financial_tran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `moduleId` int(11) NOT NULL,
  `tranId` int(11) NOT NULL,
  `admnNo` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `crdr` double(8,2) NOT NULL,
  `accountType` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `acadYear` double(8,2) NOT NULL,
  `TypeofConcession` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `isChalan` double(8,2) NOT NULL,
  `chalanNo` double(8,2) NOT NULL,
  `chalanGenBy` double(8,2) NOT NULL,
  `tranType` double(8,2) NOT NULL,
  `tranOnBank` double(8,2) NOT NULL,
  `tranRefNo` double(8,2) NOT NULL,
  `tranRefDate` double(8,2) NOT NULL,
  `inactive` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `paymentRecBy` double(8,2) NOT NULL,
  `isPaymentRec` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `isPaymentAuthorized` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `payAuthorizedBy` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `isReconciled` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `Remark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `memberClassId` int(11) NOT NULL,
  `feeCategory` int(11) NOT NULL,
  `memberStatus` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `erpSync` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `entryMode` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `adjustFrom` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `adjustReceiptNo` int(11) NOT NULL,
  `adjustAmount` double(8,2) NOT NULL,
  `installmentNo` int(11) NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdBy` int(11) NOT NULL,
  `isIndividualAlter` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `miscdueId` int(11) NOT NULL,
  `displayInvoiceNo` int(11) NOT NULL,
  `voucherNo` int(11) NOT NULL,
  `invoiceAgainstAdmNo` int(11) NOT NULL,
  `invoiceAgainstInvoice` double(8,2) NOT NULL,
  `customerCurrency` enum('INR','USD') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INR',
  `customerCurrencyRate` double(8,2) NOT NULL,
  `bseAmount` double(8,2) NOT NULL,
  `dueRefNo` double(8,2) NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hostelId` int(11) NOT NULL,
  `hostelJoinDate` date NOT NULL,
  `routeId` int(11) NOT NULL,
  `trpJoindate` date NOT NULL,
  `brid` int(11) NOT NULL,
  `manuallyCreated` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `session` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(210, '2014_10_12_000000_create_users_table', 1),
(211, '2014_10_12_100000_create_password_resets_table', 1),
(212, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(213, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(214, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(215, '2016_06_01_000004_create_oauth_clients_table', 1),
(216, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(217, '2022_09_30_025309_create_category_table', 1),
(218, '2022_09_30_025406_create_articles_table', 1),
(219, '2022_09_30_070212_create_employees_table', 1),
(220, '2022_10_10_053101_create_posts_table', 1),
(221, '2022_10_21_080008_create_branches_table', 1),
(222, '2022_10_21_080032_create_feecategory_table', 1),
(223, '2022_10_21_080053_create_feecollectiontypes_table', 1),
(224, '2022_10_21_080113_create_feetypes_table', 1),
(225, '2022_10_21_080134_create_entrymode_table', 1),
(226, '2022_10_21_080146_create_module_table', 1),
(227, '2022_10_21_080210_create_financialtran_table', 1),
(228, '2022_10_21_080231_create_financialtrandetail_table', 1),
(229, '2022_10_21_080247_create_commonfeecollection_table', 1),
(230, '2022_10_21_080305_create_commonfeecollectionheadwise_table', 1),
(231, '2022_10_22_141346_create_jobs_table', 2),
(232, '2022_10_22_141356_create_failed_jobs_table', 2),
(233, '2022_10_22_161447_create_contacts_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ModuleID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_delete` int(11) NOT NULL DEFAULT 1,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `CustomerID` int(11) NOT NULL,
  `CustomerName` varchar(250) NOT NULL,
  `Gender` varchar(30) NOT NULL,
  `Address` text NOT NULL,
  `City` varchar(250) NOT NULL,
  `PostalCode` varchar(30) NOT NULL,
  `Country` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`CustomerID`, `CustomerName`, `Gender`, `Address`, `City`, `PostalCode`, `Country`) VALUES
(155, 'Laxman', 'Male', 'KArnal', 'Karnal', '132001', 'India'),
(156, 'Laxman', 'Male', 'KArnal', 'Karnal', '132001', 'India'),
(157, 'Laxman', 'Male', 'KArnal', 'Karnal', '132001', 'India');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'name', 'email', NULL, 'password', NULL, '2022-10-22 10:21:03', '2022-10-22 10:21:03'),
(5, 'abc', 'abc@gmail.com', NULL, '123456', NULL, '2022-10-22 10:21:03', '2022-10-22 10:21:03'),
(6, 'xys', 'sadflkjasfd@gmail.com', NULL, '123456', NULL, '2022-10-22 10:21:03', '2022-10-22 10:21:03'),
(7, 'aa', 'lkj@gmail.com', NULL, '123456', NULL, '2022-10-22 10:21:03', '2022-10-22 10:21:03'),
(8, 'vv', 'ee@gmail.com', NULL, '123456', NULL, '2022-10-22 10:21:03', '2022-10-22 10:21:03'),
(9, 'cc', 'cc@gmail.cm', NULL, '123456', NULL, '2022-10-22 10:21:03', '2022-10-22 10:21:03'),
(10, 'dd', 'dd@gmail.com', NULL, '123456', NULL, '2022-10-22 10:21:03', '2022-10-22 10:21:03'),
(11, 'ee', 'eed@gmail.com', NULL, '123456', NULL, '2022-10-22 10:21:03', '2022-10-22 10:21:03'),
(12, 'dd', 'afas@gmail.com', NULL, '123456', NULL, '2022-10-22 10:21:03', '2022-10-22 10:21:03'),
(13, 'ff', 'lokd@gmail.com', NULL, '123456', NULL, '2022-10-22 10:21:03', '2022-10-22 10:21:03'),
(14, 'sandeep@gmail.com', 'sandeep@gmail.com', NULL, '$2y$10$TIVIY1qHweKK11SGQH3/yeqKzXxam7ZhifiOX4567HdeQDDd2TXD6', NULL, '2022-11-07 04:29:14', '2022-11-07 04:29:14'),
(15, 'developer', 'developer@gmail.com', NULL, '$2y$10$krdK3wey5ZjduKv4Ny7Uoel1ot6gE6XzezV80QbYv9L9eDMzkwoL6', NULL, '2022-11-07 04:56:28', '2022-11-07 04:56:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_category_id_foreign` (`category_id`),
  ADD KEY `articles_user_id_foreign` (`user_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commonfeecollection`
--
ALTER TABLE `commonfeecollection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commonfeecollectionheadwise`
--
ALTER TABLE `commonfeecollectionheadwise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entrymode`
--
ALTER TABLE `entrymode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feecategory`
--
ALTER TABLE `feecategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feecollectiontypes`
--
ALTER TABLE `feecollectiontypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feetypes`
--
ALTER TABLE `feetypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financialtrandetail`
--
ALTER TABLE `financialtrandetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `financialtrandetail_financialtransid_foreign` (`financialTransId`);

--
-- Indexes for table `financial_tran`
--
ALTER TABLE `financial_tran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`CustomerID`);

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
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commonfeecollection`
--
ALTER TABLE `commonfeecollection`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `commonfeecollectionheadwise`
--
ALTER TABLE `commonfeecollectionheadwise`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `entrymode`
--
ALTER TABLE `entrymode`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feecategory`
--
ALTER TABLE `feecategory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feecollectiontypes`
--
ALTER TABLE `feecollectiontypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feetypes`
--
ALTER TABLE `feetypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financialtrandetail`
--
ALTER TABLE `financialtrandetail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financial_tran`
--
ALTER TABLE `financial_tran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `financialtrandetail`
--
ALTER TABLE `financialtrandetail`
  ADD CONSTRAINT `financialtrandetail_financialtransid_foreign` FOREIGN KEY (`financialTransId`) REFERENCES `financial_tran` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
