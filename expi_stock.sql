SET FOREIGN_KEY_CHECKS = 0;
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 08, 2026 at 04:08 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expi_stock`
--

--
-- Dumping data for table `access_code`
--

INSERT INTO `access_code` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(1, 1, 'XU4EI8IY', '2026-03-29 13:41:06', '2026-04-08 03:50:01');

--
-- Dumping data for table `alert_configuration`
--

INSERT INTO `alert_configuration` (`id`, `uuid`, `user_id`, `day_left`, `created_at`, `updated_at`) VALUES
(1, '848295a4-5ad5-44a2-9bef-b3c0cae7d7f6', 1, '30', '2026-03-29 13:45:37', '2026-03-29 13:45:37'),
(2, 'ca55f8df-0941-47e5-af8a-38cdaa7730d8', 1, '7', '2026-03-29 13:45:49', '2026-03-29 13:45:49'),
(3, 'a2a25234-7323-4021-8f0d-f6ea1d329e00', 1, '3', '2026-03-29 13:46:02', '2026-03-29 13:46:02');

--
-- Dumping data for table `audit_logs`
--

INSERT INTO `audit_logs` (`id`, `uuid`, `user_id`, `action`, `description`, `created_at`, `updated_at`) VALUES
(1, '58820a1a-421a-4c1f-8a2c-720f202da04a', 1, 'Login', 'Login to system', '2026-03-29 13:37:15', '2026-03-29 13:37:15'),
(2, '2f1a338d-1694-4992-b067-49c1f78e8abb', 1, 'Update', 'Update user name System Admin information', '2026-03-29 13:38:29', '2026-03-29 13:38:29'),
(3, 'e3413bcd-33ea-4702-b2f4-d7d551f0dd0e', 1, 'Login', 'Login to system', '2026-03-29 13:40:55', '2026-03-29 13:40:55'),
(4, '337a9179-fde4-419c-a654-988745f343c8', 1, 'Login', 'Login to system', '2026-03-29 13:41:26', '2026-03-29 13:41:26'),
(5, '590c8dce-cf4d-40d9-b31f-bf6150bd5340', 1, 'Create', 'Create new category name Skincare', '2026-03-29 13:41:51', '2026-03-29 13:41:51'),
(6, '3d5e657e-78ce-4b56-97ad-240f9ac4c334', 1, 'Create', 'Create new product name Sunscreen B', '2026-03-29 13:42:49', '2026-03-29 13:42:49'),
(7, '3a30000e-315b-4922-a101-944a81c29517', 1, 'Create', 'Create new batch name SB-2026-001', '2026-03-29 13:44:16', '2026-03-29 13:44:16'),
(8, '66bab139-4069-484e-8ad8-fd235a441fd3', 1, 'Create', 'Create new batch name SB-2026-002', '2026-03-29 13:44:44', '2026-03-29 13:44:44'),
(9, '3a6c7910-ae0f-4e16-b70f-b6632636ddf3', 1, 'Delete', 'Delete batch SB-2026-001 information', '2026-03-29 16:02:50', '2026-03-29 16:02:50'),
(10, '90c86735-6737-415c-b66e-f7ccd88b7a6a', 1, 'Login', 'Login to system', '2026-03-29 16:12:29', '2026-03-29 16:12:29'),
(11, '52a61f36-c692-4460-bbbb-e7fb3f3a2604', 1, 'Delete', 'Delete batch SB-2026-002 information', '2026-03-29 16:12:55', '2026-03-29 16:12:55'),
(12, '53e1357c-fa08-43e3-853a-8ca3ca234cb4', 1, 'Delete', 'Delete product Sunscreen B information', '2026-03-29 16:13:05', '2026-03-29 16:13:05'),
(13, 'acc5218a-7868-4de3-af29-36e703293054', 1, 'Login', 'Login to system', '2026-03-29 16:19:23', '2026-03-29 16:19:23'),
(14, 'a8099b0d-9331-4e52-ac05-6646364dd2d4', 1, 'Create', 'Create new category name Supplement', '2026-03-29 16:44:14', '2026-03-29 16:44:14'),
(15, 'f2b89f5a-4093-4f98-b891-4e0b8da946d4', 1, 'Create', 'Create new category name Herbal', '2026-03-29 16:44:35', '2026-03-29 16:44:35'),
(16, '2cc82036-38fa-4439-9f6b-63ddeb728d6d', 1, 'Create', 'Create new category name Self-Care', '2026-03-29 16:44:50', '2026-03-29 16:44:50'),
(17, '5c6da021-18ed-458a-a338-d0bbc1f679e8', 1, 'Create', 'Create new category name Health Food', '2026-03-29 16:45:09', '2026-03-29 16:45:09'),
(18, 'd64502dc-7187-4bce-a220-1ba25756847c', 1, 'Create', 'Create new category name Health Drink', '2026-03-29 16:45:22', '2026-03-29 16:45:22'),
(19, 'f9630fb3-6e9f-4e68-96de-81b3e33d696a', 1, 'Create', 'Create new category name Cosmetic', '2026-03-29 16:45:52', '2026-03-29 16:45:52'),
(20, 'f7c387ce-8562-47f4-bc46-c7990a310652', 1, 'Create', 'Create new category name Hair Care', '2026-03-29 16:46:09', '2026-03-29 16:46:09'),
(21, '0086ddf4-17f1-4fc2-9dba-cd0e9971d759', 1, 'Create', 'Create new product name Apple Fiber Vasia', '2026-03-29 16:48:33', '2026-03-29 16:48:33'),
(22, '2a9bbb34-f8a6-4e3d-acf1-5a92cd07e93a', 1, 'Create', 'Create new product name Orange Fiber Vasia', '2026-03-29 16:49:33', '2026-03-29 16:49:33'),
(23, '231521ea-b7d3-47e2-b70d-3989c268ce3e', 1, 'Create', 'Create new product name Super White Vasia', '2026-03-29 16:50:24', '2026-03-29 16:50:24'),
(24, 'd6231492-3caf-4d62-b995-92217879c2e7', 1, 'Create', 'Create new product name Jamu Mak Dara', '2026-03-29 16:51:20', '2026-03-29 16:51:20'),
(25, '6a34affd-f330-43af-9ffa-7e740bcc9305', 1, 'Create', 'Create new product name Gel Mandian Bidara Arab JRM', '2026-03-29 16:52:22', '2026-03-29 16:52:22'),
(26, '328f33c6-55da-42a3-84f7-f5ef197ac70c', 1, 'Create', 'Create new product name Lotion Mustajab Extreme Hot Dunia Herbs', '2026-03-29 16:53:52', '2026-03-29 16:53:52'),
(27, '39ede90d-cdd6-4e7c-83a7-979055f2b60a', 1, 'Create', 'Create new product name Sacha Inchi Mandian Shifa Herb', '2026-03-29 16:55:01', '2026-03-29 16:55:01'),
(28, '20c99074-275c-438e-bfe3-9b3c23a55af5', 1, 'Create', 'Create new product name Kismis Tok Guru JTG', '2026-03-29 16:55:54', '2026-03-29 16:55:54'),
(29, 'bd36a52f-a4a7-4691-af34-c8c0c4354811', 1, 'Create', 'Create new product name Serbuk Halia Madu AMRAN', '2026-03-29 16:57:03', '2026-03-29 16:57:03'),
(30, '1ffb8079-ed44-4368-9a7c-8ef6e6b72a5c', 1, 'Create', 'Create new product name Minsyam Olive Oil Softgel', '2026-03-29 16:58:14', '2026-03-29 16:58:14'),
(31, '817f18bb-ecfa-4fac-8298-0dbe68f364af', 1, 'Create', 'Create new product name Minsyam Black Seed Oil Capsule', '2026-03-29 16:58:59', '2026-03-29 16:58:59'),
(32, 'eb27269d-a45c-4684-bfe6-2485bb9097fe', 1, 'Create', 'Create new product name Garlic Nurich 300mg', '2026-03-29 17:00:23', '2026-03-29 17:00:23'),
(33, 'd7d08cd4-fe59-4a67-a704-4905e2fbc746', 1, 'Create', 'Create new product name CordyC+ Excel Care', '2026-03-29 17:01:07', '2026-03-29 17:01:07'),
(34, '7bb2eadd-681d-412b-a3cf-e8e5ae4952cc', 1, 'Create', 'Create new product name Berryfull Mixed Berry 20ml', '2026-03-29 17:01:55', '2026-03-29 17:01:55'),
(35, 'd2b592a4-60ed-4b1b-869b-9ab6afeecb0d', 1, 'Create', 'Create new product name Air Tonik Ginseng PETANI', '2026-03-29 17:02:37', '2026-03-29 17:02:37'),
(36, 'cc91cc55-f54f-4723-9c14-bbdeb088119c', 1, 'Create', 'Create new product name Lipstick Collagen + Madu Kelulut', '2026-03-29 17:03:17', '2026-03-29 17:03:17'),
(37, 'fb20e229-7766-4f1f-9fb3-1ed395390b64', 1, 'Create', 'Create new product name Syampu Perang Inai D\'Herbs', '2026-03-29 17:03:58', '2026-03-29 17:03:58'),
(38, '40253899-e144-468d-b36b-ba62f8df133f', 1, 'Create', 'Create new product name Tati Skincare Glowri Healing Kit', '2026-03-29 17:05:00', '2026-03-29 17:05:00'),
(39, '157149a2-81bf-4f41-81a7-ce74a6100599', 1, 'Create', 'Create new product name Wawa Sunscreen Tone-Up SPF 50+', '2026-03-29 17:05:40', '2026-03-29 17:05:40'),
(40, 'bc2b2fec-0f93-4f22-9f71-dddc0a7729ca', 1, 'Create', 'Create new product name HydraGlow Beauty Soap ASMA Dermacare', '2026-03-29 17:06:21', '2026-03-29 17:06:21'),
(41, '5f5ca5cd-ea3d-426f-bfd7-a595d4cb850d', 1, 'Create', 'Create new product name Snow Tinted Sunscreen SPF 50+ Tone Up D\'Herbs', '2026-03-29 17:07:33', '2026-03-29 17:07:33'),
(42, '092c886a-c67c-4023-a9c6-875c6c606196', 1, 'Create', 'Create new product name Powder Foundation SPF 35', '2026-03-29 17:08:18', '2026-03-29 17:08:18'),
(43, 'afaef30b-e115-4fa8-8daf-84d63886b5f4', 1, 'Create', 'Create new product name Wildan Original Milk', '2026-03-29 17:09:14', '2026-03-29 17:09:14'),
(44, '0b6c0e1b-3cef-471a-84e3-53f205654a97', 1, 'Create', 'Create new product name Kopi Senyum Manis Kurma', '2026-03-29 17:10:27', '2026-03-29 17:10:27'),
(45, '92ada7fb-2f00-4a81-b3fe-d3f1a14a62de', 1, 'Create', 'Create new product name Smart Coco A+ Fortune', '2026-03-29 17:11:46', '2026-03-29 17:11:46'),
(46, '717cee07-a922-4c89-a17c-b6c9428694e7', 1, 'Create', 'Create new product name SASABELL Sunscreen SPF 50+', '2026-03-29 17:12:45', '2026-03-29 17:12:45'),
(47, '8cd6952d-da2a-4358-8e5b-ca57dcb487db', 1, 'Create', 'Create new product name Anjo Sunscreen SPF 50+', '2026-03-29 17:13:19', '2026-03-29 17:13:19'),
(48, '64e10b54-e96d-4243-af8d-f2ca463457ce', 1, 'Create', 'Create new batch name AFV-2026-001', '2026-03-29 17:15:00', '2026-03-29 17:15:00'),
(49, 'e7472b8c-7ef1-45c4-8472-46573068e22e', 1, 'Create', 'Create new batch name OFV-2026-001', '2026-03-29 17:15:38', '2026-03-29 17:15:38'),
(50, 'be4efc78-8b29-4cc0-8ea0-1d226c92b985', 1, 'Create', 'Create new batch name SWV-2026-001', '2026-03-29 17:16:22', '2026-03-29 17:16:22'),
(51, 'f6f6bacd-a60e-4ea0-ace5-a5c00b3762d2', 1, 'Create', 'Create new batch name JMD-2026-001', '2026-03-29 17:16:52', '2026-03-29 17:16:52'),
(52, '87c7a01f-b7fb-431b-aef1-373893e7899b', 1, 'Create', 'Create new batch name GMBAJ-2026-001', '2026-03-29 17:17:29', '2026-03-29 17:17:29'),
(53, 'e45f3744-94e3-4e63-a5f2-d230ef40b946', 1, 'Create', 'Create new batch name LMEHDH-2026-001', '2026-03-29 17:17:53', '2026-03-29 17:17:53'),
(54, '735000aa-50dc-4961-845b-edfb92336b7a', 1, 'Create', 'Create new batch name SIMSH-2026-001', '2026-03-29 17:18:22', '2026-03-29 17:18:22'),
(55, 'd5a95813-f715-4b8f-a4d4-e9e750838f86', 1, 'Create', 'Create new batch name KTGJ-2026-001', '2026-03-29 17:18:52', '2026-03-29 17:18:52'),
(56, 'b417dd7c-27d3-4b10-a844-bac6858d9be1', 1, 'Create', 'Create new batch name SHMA-2026-001', '2026-03-29 17:19:21', '2026-03-29 17:19:21'),
(57, '33e231d8-a003-460e-8ce6-f9ff56d2ba81', 1, 'Create', 'Create new batch name MOOS-2026-001', '2026-03-29 17:20:01', '2026-03-29 17:20:01'),
(58, 'dcbee15b-9e97-46a8-98f0-4b9dcc6a21de', 1, 'Create', 'Create new batch name MBSOC-2026-001', '2026-03-29 17:20:33', '2026-03-29 17:20:33'),
(59, '186874b3-f050-472a-a8a0-19a64b5a1552', 1, 'Create', 'Create new batch name GN3-2026-001', '2026-03-29 17:21:12', '2026-03-29 17:21:12'),
(60, '704178f8-a01a-4f75-91e4-1325d8b5d689', 1, 'Update', 'Update batch GN3-2026-001 information', '2026-03-29 17:21:48', '2026-03-29 17:21:48'),
(61, '6f60a5ae-5dcb-4e11-9104-ee2e7b629667', 1, 'Update', 'Update batch GN3-2026-001 information', '2026-03-29 17:21:52', '2026-03-29 17:21:52'),
(62, '75353190-0ca1-4f4c-aea7-af44d8725086', 1, 'Update', 'Update batch GN3-2026-001 information', '2026-03-29 17:24:12', '2026-03-29 17:24:12'),
(63, 'ac01f3bd-331d-4e68-83ed-593cc5abb174', 1, 'Delete', 'Delete batch GN3-2026-001 information', '2026-03-29 17:24:39', '2026-03-29 17:24:39'),
(64, '46a6bdad-78a2-4157-8b45-6f7979fa6ce9', 1, 'Create', 'Create new batch name GN3-2026-001', '2026-03-29 17:25:12', '2026-03-29 17:25:12'),
(65, 'dca3c40a-244b-4e3c-88a9-7fb6676e9994', 1, 'Update', 'Update batch GN3-2026-001 information', '2026-03-29 17:25:48', '2026-03-29 17:25:48'),
(66, 'b929799e-ea56-4442-bea4-926d6ade9ce8', 1, 'Create', 'Create new batch name CEC-2026-001', '2026-03-29 17:26:48', '2026-03-29 17:26:48'),
(67, 'b69b5d4e-6ad8-453d-990f-6d38c9b97fe2', 1, 'Update', 'Update batch CEC-2026-001 information', '2026-03-29 17:26:59', '2026-03-29 17:26:59'),
(68, '299fcb0f-fd3d-4173-8a26-d62324de1d2b', 1, 'Update', 'Update batch CEC-2026-001 information', '2026-03-29 17:27:16', '2026-03-29 17:27:16'),
(69, 'dff2505a-9faf-4a2f-a1d8-f51ebfac7259', 1, 'Update', 'Update batch CEC-2026-001 information', '2026-03-29 17:27:29', '2026-03-29 17:27:29'),
(70, 'f767c2f2-12ab-4ed7-a00e-0706b581d40d', 1, 'Update', 'Update batch CEC-2026-001 information', '2026-03-29 17:28:18', '2026-03-29 17:28:18'),
(71, '1369914b-2ae8-4e6f-be2d-c587c303a7bc', 1, 'Update', 'Update batch CEC-2026-001 information', '2026-03-29 17:28:33', '2026-03-29 17:28:33'),
(72, 'adb126af-ec8a-464c-8c8e-3ad52b422684', 1, 'Update', 'Update batch CEC-2026-001 information', '2026-03-29 17:28:42', '2026-03-29 17:28:42'),
(73, 'e1e8f513-a059-407b-8b2e-1daf06e37865', 1, 'Create', 'Create new batch name BMB2-2026-001', '2026-03-29 17:29:26', '2026-03-29 17:29:26'),
(74, '9ec17b45-3aef-4ded-99ed-398c4db4bc60', 1, 'Create', 'Create new batch name ATGP-2026-001', '2026-03-29 17:30:16', '2026-03-29 17:30:16'),
(75, '82043d6e-17f4-4461-82ef-9f4c24f6c512', 1, 'Create', 'Create new batch name LC+MK-2026-001', '2026-03-29 17:30:57', '2026-03-29 17:30:57'),
(76, '90116f40-a84f-4bb0-9543-c3df4ed9ce94', 1, 'Create', 'Create new batch name SPID-2026-001', '2026-03-29 17:31:36', '2026-03-29 17:31:36'),
(77, '4230ebfc-dcec-4b85-9f44-9a09701716cf', 1, 'Create', 'Create new batch name HBSAD-2026-001', '2026-03-29 17:32:17', '2026-03-29 17:32:17'),
(78, 'f298184a-75c4-411f-aaaf-e28914e0bd56', 1, 'Create', 'Create new batch name STSS5TUD-2026-001', '2026-03-29 17:33:35', '2026-03-29 17:33:35'),
(79, '4d755749-64b2-490e-ac98-7c237b9b7826', 1, 'Create', 'Create new batch name PFS3-2026-001', '2026-03-29 17:33:59', '2026-03-29 17:33:59'),
(80, '2be714b1-b6ff-4d55-a40d-cbda238a1fad', 1, 'Create', 'Create new batch name WOM-2026-001', '2026-03-29 17:34:39', '2026-03-29 17:34:39'),
(81, '9b3ddb52-82f1-4760-9204-4706716f9b8d', 1, 'Create', 'Create new batch name KSMK-2026-001', '2026-03-29 17:35:22', '2026-03-29 17:35:22'),
(82, '6c53e7a8-4370-41cc-8858-155997bbf9cf', 1, 'Create', 'Create new batch name SCAF-2026-001', '2026-03-29 17:35:56', '2026-03-29 17:35:56'),
(83, '928d7385-3b8f-477b-8b18-f39cbf9e0b71', 1, 'Create', 'Create new batch name SSS5-2026-001', '2026-03-29 17:36:46', '2026-03-29 17:36:46'),
(84, '5d904d6c-e4f7-4485-bbeb-b2770d87f70e', 1, 'Create', 'Create new batch name ASS5-2026-001', '2026-03-29 17:37:22', '2026-03-29 17:37:22'),
(85, '047c3f9f-a3fe-4862-b59a-6906fe883e59', 1, 'Create', 'Create new user name NUREFAHUDA BINTI KHAIRULL HAFIZ', '2026-03-29 17:40:54', '2026-03-29 17:40:54'),
(86, 'd1190e84-ed12-4a95-b1c1-a930ead49c3b', 1, 'Update', 'Update user name Staff information', '2026-03-29 17:41:13', '2026-03-29 17:41:13'),
(87, 'dd323c98-7552-4e6d-b203-79dc4cc45e82', 1, 'Delete', 'Delete user name Regular Staff information', '2026-03-29 17:41:21', '2026-03-29 17:41:21'),
(88, '70d741fc-7317-4a0c-bbdb-35f873d8b82a', 1, 'Update', 'Update user name System Admin information', '2026-03-29 17:41:38', '2026-03-29 17:41:38'),
(90, '837a8ea0-8be8-4185-8b4d-18ff99b89964', 1, 'Login', 'Login to system', '2026-03-29 17:50:28', '2026-03-29 17:50:28'),
(91, 'eb59b224-7d43-4237-a90c-df0c72c25d33', 1, 'Login', 'Login to system', '2026-03-29 17:58:47', '2026-03-29 17:58:47'),
(93, '1a5af370-cc3f-4dbe-8583-62f99780e881', 1, 'Login', 'Login to system', '2026-03-29 18:28:32', '2026-03-29 18:28:32'),
(94, '89f7b376-794c-47fe-89be-50950eec6f62', 1, 'Update', 'Update user name System Admin information', '2026-03-29 18:36:16', '2026-03-29 18:36:16'),
(95, '13c40d15-0c8f-42ee-905a-210750870479', 1, 'Update', 'Update user name Staff information', '2026-03-29 18:36:31', '2026-03-29 18:36:31'),
(96, '26b60167-eba9-4d13-84ac-2d01b7d3995a', 1, 'Update', 'Update user name Staff information', '2026-03-29 18:36:40', '2026-03-29 18:36:40'),
(98, '75e299dc-5f6b-4d2c-8dbe-e5c460ecf24d', 1, 'Login', 'Login to system', '2026-03-29 23:07:59', '2026-03-29 23:07:59'),
(99, '4a0389a2-b655-4986-82f6-706e5c5d1b97', 1, 'Update', 'Update user name Staff information', '2026-03-29 23:08:53', '2026-03-29 23:08:53'),
(100, '1bb147d8-c65f-4a70-bb95-69bc4d93cf2b', 1, 'Update', 'Update user name Staff information', '2026-03-29 23:09:00', '2026-03-29 23:09:00'),
(101, '768da084-3aa3-4215-9d6a-c9f7ad5ebc8a', 1, 'Login', 'Login to system', '2026-03-29 23:15:40', '2026-03-29 23:15:40'),
(102, 'de495f9d-5878-4bf6-a3b7-510c5ec79caa', 1, 'Login', 'Login to system', '2026-03-29 23:18:52', '2026-03-29 23:18:52'),
(103, '2ef5e405-0bed-49aa-b574-c527456d65ba', 1, 'Login', 'Login to system', '2026-03-29 23:19:15', '2026-03-29 23:19:15'),
(104, 'fa65793b-1c93-41ec-abea-e4f81038cfb7', 1, 'Create', 'Create new batch name JMD-2026-002', '2026-03-29 23:20:23', '2026-03-29 23:20:23'),
(105, '06b1113e-4bc6-4df7-a5c6-e8d099c54d84', 1, 'Create', 'Create new batch name AFV-2026-002', '2026-03-29 23:21:07', '2026-03-29 23:21:07'),
(106, 'a78a25c9-ebf6-4e15-a2ed-8a75bff1c00d', 1, 'Update', 'Update batch AFV-2026-002 information', '2026-03-29 23:21:33', '2026-03-29 23:21:33'),
(107, '6a5d01fa-a537-4d56-aa59-478bffd3c0d8', 1, 'Delete', 'Delete batch AFV-2026-002 information', '2026-03-29 23:21:55', '2026-03-29 23:21:55'),
(108, 'b5697972-d859-4985-b55e-43d35ae3ea97', 1, 'Create', 'Create new category name FOOD', '2026-03-29 23:23:57', '2026-03-29 23:23:57'),
(109, 'f6438783-c2f5-4c87-b388-1006477f9caf', 1, 'Update', 'Update category food and beverange information', '2026-03-29 23:24:26', '2026-03-29 23:24:26'),
(110, 'c26c1aa9-e78f-4c3f-b087-76270fb749fd', 1, 'Update', 'Update category food and beverange information', '2026-03-29 23:24:29', '2026-03-29 23:24:29'),
(111, '1817ec13-b11e-41aa-ada4-79b5f4576e93', 1, 'Delete', 'Delete category food and beverange information', '2026-03-29 23:24:38', '2026-03-29 23:24:38'),
(112, 'aee30d22-466a-4eba-b9e9-f95bc23e22e9', 1, 'Create', 'Create new product name JAMU KAK KM', '2026-03-29 23:26:25', '2026-03-29 23:26:25'),
(113, '5b5385c5-839a-408e-a177-b7e21a03cb5e', 1, 'Update', 'Update product JAMU KAK KM information', '2026-03-29 23:26:44', '2026-03-29 23:26:44'),
(114, 'cdeec132-7c6f-4e4d-acbf-87feb0178192', 1, 'Delete', 'Delete product JAMU KAK KM information', '2026-03-29 23:26:57', '2026-03-29 23:26:57'),
(115, '011a0b2f-2703-46b8-95ef-6e80231e75ce', 1, 'Create', 'Create new user name QAMARINA', '2026-03-29 23:28:00', '2026-03-29 23:28:00'),
(116, '782866f9-97ae-4808-a346-8796a651315a', 1, 'Update', 'Update user name QAMARINA information', '2026-03-29 23:28:34', '2026-03-29 23:28:34'),
(117, '08350d6b-e6db-447f-bfae-d08d333d055b', 1, 'Delete', 'Delete user name QAMARINA information', '2026-03-29 23:28:44', '2026-03-29 23:28:44'),
(126, '36723086-a6c1-44c4-a56e-c301e6c6ad3e', 1, 'Login', 'Login to system', '2026-03-29 23:39:55', '2026-03-29 23:39:55'),
(127, '34b560f4-c7ce-4621-b6cb-e6cc85b1bff8', 1, 'Login', 'Login to system', '2026-03-30 00:53:34', '2026-03-30 00:53:34'),
(129, 'fa835901-b8cd-4278-aaca-386ea9fba1ea', 1, 'Login', 'Login to system', '2026-03-30 00:56:23', '2026-03-30 00:56:23'),
(131, '3ecc818c-bc93-4b35-8b3a-f41a46238858', 1, 'Login', 'Login to system', '2026-03-30 01:01:26', '2026-03-30 01:01:26'),
(132, '8d574d5a-b787-41f6-907f-1bd35313f18b', 1, 'Login', 'Login to system', '2026-03-30 04:14:04', '2026-03-30 04:14:04'),
(134, '9cd2f62b-d64c-428f-a0d7-b1059326df64', 1, 'Login', 'Login to system', '2026-03-30 06:39:34', '2026-03-30 06:39:34'),
(135, '922ff2ba-1476-47f6-829f-b802f3383004', 1, 'Create', 'Create new batch name AFV-2026-002', '2026-03-30 06:43:25', '2026-03-30 06:43:25'),
(136, '3bb1c853-1798-4702-81ec-7c0c3fff035a', 1, 'Update', 'Update batch AFV-2026-002 information', '2026-03-30 06:44:13', '2026-03-30 06:44:13'),
(137, '7e84b341-c8ed-4df2-99b0-ed15df735061', 1, 'Update', 'Update batch AFV-2026-002 information', '2026-03-30 06:44:36', '2026-03-30 06:44:36'),
(138, '8d517cb7-a9ee-479d-8d4a-efc24a35852b', 1, 'Delete', 'Delete batch AFV-2026-002 information', '2026-03-30 06:45:57', '2026-03-30 06:45:57'),
(139, '7c588761-9e63-4976-b219-7df0108b22a4', 1, 'Create', 'Create new category name food and beverange', '2026-03-30 06:48:53', '2026-03-30 06:48:53'),
(140, '05c7f248-37dc-4c9e-afc8-2c17041d51ab', 1, 'Update', 'Update category food information', '2026-03-30 06:49:10', '2026-03-30 06:49:10'),
(141, 'f3aa3ff3-c6c7-4686-b63a-af1302b1debf', 1, 'Delete', 'Delete category food information', '2026-03-30 06:49:23', '2026-03-30 06:49:23'),
(142, '0cc49978-2abe-46ea-8b32-16e4fc7f070f', 1, 'Create', 'Create new product name jamu KAK KM', '2026-03-30 06:51:00', '2026-03-30 06:51:00'),
(143, '5f459122-a6cc-4f21-8c35-da9e2dace15a', 1, 'Create', 'Create new user name EFA', '2026-03-30 06:52:25', '2026-03-30 06:52:25'),
(145, '3a73814c-369a-425d-ba47-b9b9ec218eeb', 1, 'Login', 'Login to system', '2026-03-30 07:02:59', '2026-03-30 07:02:59'),
(148, '40b8263d-6cdf-4208-9954-1d27bd23c723', 1, 'Login', 'Login to system', '2026-03-30 07:20:19', '2026-03-30 07:20:19'),
(150, '6b358473-36c5-4352-b3db-30522b86802f', 1, 'Login', 'Login to system', '2026-03-30 08:20:35', '2026-03-30 08:20:35'),
(151, '9a2eee22-2114-41f0-b159-888afff825ab', 1, 'Login', 'Login to system', '2026-03-31 14:14:21', '2026-03-31 14:14:21'),
(152, '193bf37b-fb01-4c96-8ae5-e367f0f5c5e7', 1, 'Login', 'Login to system', '2026-04-02 13:40:13', '2026-04-02 13:40:13'),
(153, '2ece9aec-bd86-4885-98c4-6bd45c2bcdee', 1, 'Update', 'Update batch AFV-2026-001 information', '2026-04-02 13:40:35', '2026-04-02 13:40:35'),
(154, '6ca22f57-f67c-47b9-ae8c-4bdb9e264020', 1, 'Update', 'Update batch AFV-2026-001 information', '2026-04-02 13:41:27', '2026-04-02 13:41:27'),
(155, '7adc4e29-b260-4b00-a2c5-ad3489bc890e', 1, 'Update', 'Update batch AFV-2026-001 information', '2026-04-02 13:41:44', '2026-04-02 13:41:44'),
(156, '69e095bc-a714-4229-b0e4-782086ef7e70', 1, 'Update', 'Update batch JMD-2026-001 information', '2026-04-02 13:42:33', '2026-04-02 13:42:33'),
(157, '2951f424-8a8d-4054-ae93-e7b4ae88c354', 1, 'Update', 'Update batch JMD-2026-001 information', '2026-04-02 13:42:54', '2026-04-02 13:42:54'),
(158, 'f53cdd69-852f-4e3d-9d3b-987e9b347e1e', 1, 'Update', 'Update batch JMD-2026-001 information', '2026-04-02 13:43:18', '2026-04-02 13:43:18'),
(159, '5d60243f-1100-4f27-8794-a7cef9d24314', 1, 'Update', 'Update batch JMD-2026-001 information', '2026-04-02 13:43:19', '2026-04-02 13:43:19'),
(160, '7d041973-3e38-4057-bd9c-18cb82e436e0', 1, 'Update', 'Update batch BMB2-2026-001 information', '2026-04-02 13:43:35', '2026-04-02 13:43:35'),
(161, '84019ebd-91cc-46dc-bf5f-48a7d9b2fed0', 1, 'Update', 'Update user name Staff information', '2026-04-02 13:44:46', '2026-04-02 13:44:46'),
(162, '86c774a4-62a3-46f2-a78d-cf80012f2f56', 1, 'Update', 'Update user name Staff information', '2026-04-02 13:44:58', '2026-04-02 13:44:58'),
(163, '65b068ab-5487-430a-bb3b-c4da313df408', 1, 'Update', 'Update user name System Admin information', '2026-04-02 13:49:12', '2026-04-02 13:49:12'),
(164, '9f89de66-4a1f-4a2f-bdb7-faefb7320c7e', 1, 'Login', 'Login to system', '2026-04-03 13:57:31', '2026-04-03 13:57:31'),
(165, '309b280a-b987-47e3-add5-43526b062a9c', 1, 'Update', 'Update batch MOOS-2026-001 information', '2026-04-03 14:01:14', '2026-04-03 14:01:14'),
(166, '771c0db4-c9b5-43bb-b036-06c1d1bf841d', 1, 'Update', 'Update batch WOM-2026-001 information', '2026-04-03 14:01:44', '2026-04-03 14:01:44'),
(167, '1ea56f17-8dcb-44bd-a02f-30081a46b5be', 1, 'Update', 'Update batch WOM-2026-001 information', '2026-04-03 14:02:09', '2026-04-03 14:02:09'),
(168, 'a0f864cd-932a-46c1-be3f-6d80ea3f2c34', 1, 'Update', 'Update batch SPID-2026-001 information', '2026-04-03 14:02:39', '2026-04-03 14:02:39'),
(169, '52c1c84a-01ee-462b-9b8d-48eae8985c11', 1, 'Login', 'Login to system', '2026-04-03 14:03:43', '2026-04-03 14:03:43'),
(170, '87a15ed0-c925-4953-894e-0734b72f92b2', 1, 'Login', 'Login to system', '2026-04-03 14:07:37', '2026-04-03 14:07:37'),
(172, '4c8d0da9-d600-4208-8b33-cc3f23b8cf7e', 1, 'Login', 'Login to system', '2026-04-03 14:52:42', '2026-04-03 14:52:42'),
(173, '115b634d-e3d3-4ec7-82d1-b685b6705418', 1, 'Update', 'Update user name Staff information', '2026-04-03 14:56:08', '2026-04-03 14:56:08'),
(174, '2288eeeb-a100-465f-91f3-b6183ad3a327', 1, 'Update', 'Update user name Staff information', '2026-04-03 15:11:20', '2026-04-03 15:11:20'),
(175, 'd8020e39-99c3-4d7e-bfb8-08f08534a12d', 1, 'Update', 'Update user name Staff information', '2026-04-03 15:14:56', '2026-04-03 15:14:56'),
(176, '5c725462-e2fa-4dec-9807-d67ff3f82b1a', 1, 'Update', 'Update user name Staff information', '2026-04-03 15:18:01', '2026-04-03 15:18:01'),
(177, 'd3a13302-35bd-41b5-9589-8a12444e762d', 1, 'Update', 'Update user name Staff information', '2026-04-03 15:20:57', '2026-04-03 15:20:57'),
(178, 'c66ba788-11d3-439b-aa4a-f2917f63f137', 1, 'Update', 'Update user name Staff information', '2026-04-03 15:21:08', '2026-04-03 15:21:08'),
(179, '0d155ea2-ff95-4a60-9d32-15587e60b475', 1, 'Login', 'Login to system', '2026-04-04 01:43:22', '2026-04-04 01:43:22'),
(180, '22c4ca1a-1b63-42c4-9ed8-97828089efce', 1, 'Update', 'Update batch AFV-2026-001 information', '2026-04-04 01:45:00', '2026-04-04 01:45:00'),
(181, '48113b10-cf12-450c-9e36-2b5478f26211', 1, 'Login', 'Login to system', '2026-04-05 08:51:11', '2026-04-05 08:51:11'),
(182, '0a7cb919-9bbc-42b7-94a7-62ec3a46845d', 1, 'Update', 'Update batch BMB2-2026-001 information', '2026-04-05 08:52:55', '2026-04-05 08:52:55'),
(183, '3d889c2c-af41-4388-b886-8f74dfc895b0', 1, 'Update', 'Update batch WOM-2026-001 information', '2026-04-05 08:53:14', '2026-04-05 08:53:14'),
(184, 'bd0f6f0c-81b2-4406-ae9a-a42b6190873e', 1, 'Update', 'Update batch ATGP-2026-001 information', '2026-04-05 09:10:43', '2026-04-05 09:10:43'),
(185, '94616567-f5d8-4669-a163-3d2bfdb40a45', 1, 'Update', 'Update batch GN3-2026-001 information', '2026-04-05 09:10:56', '2026-04-05 09:10:56'),
(186, '2f6fab1f-85a7-48aa-9158-4fd0054f97d6', 1, 'Update', 'Update batch GN3-2026-001 information', '2026-04-05 09:11:00', '2026-04-05 09:11:00'),
(187, '69d41941-484c-4012-9c08-264feaf86c5f', 1, 'Update', 'Update batch GN3-2026-001 information', '2026-04-05 09:11:13', '2026-04-05 09:11:13'),
(188, '5f28bd3a-4d33-4c4c-b116-921cd1f477cd', 1, 'Login', 'Login to system', '2026-04-05 09:17:48', '2026-04-05 09:17:48'),
(189, 'fc14d26c-74db-44f5-88bb-841290ccb9fd', 1, 'Login', 'Login to system', '2026-04-05 09:18:33', '2026-04-05 09:18:33'),
(190, '22ee4d6c-b7e7-453d-86ef-833de9ee0a48', 1, 'Update', 'Update user name Staff information', '2026-04-05 09:18:46', '2026-04-05 09:18:46'),
(192, '016ca067-901d-4c3e-9212-de74f1c8e6fe', 1, 'Login', 'Login to system', '2026-04-05 09:28:03', '2026-04-05 09:28:03'),
(193, '6f95671e-4f4a-4f00-b8ce-8fc41232aa2d', 1, 'Update', 'Update user name Staff information', '2026-04-05 09:38:48', '2026-04-05 09:38:48'),
(195, '1f7063ee-283f-4ef1-98d0-142e2f1fb890', 1, 'Login', 'Login to system', '2026-04-05 11:05:19', '2026-04-05 11:05:19'),
(196, 'a4b564f8-c20c-45b4-9c2a-905b5533e070', 1, 'Delete', 'Delete product jamu KAK KM information', '2026-04-05 11:07:02', '2026-04-05 11:07:02'),
(197, '8cad57f4-aef6-4163-9d44-c7f491933f3a', 1, 'Delete', 'Delete batch JMD-2026-002 information', '2026-04-05 11:07:18', '2026-04-05 11:07:18'),
(198, 'c09b3d1e-2941-4958-9a43-0605c7440fd4', 1, 'Create', 'Create new batch name JMD-2026-002', '2026-04-05 11:07:39', '2026-04-05 11:07:39'),
(199, 'b001bd29-37c2-4f0e-a00d-b59cddb792d0', 1, 'Create', 'Create new user name test', '2026-04-05 11:59:04', '2026-04-05 11:59:04'),
(200, '1f365cc0-b586-46cc-a83b-8fa324902ffd', 1, 'Delete', 'Delete user name test information', '2026-04-05 11:59:13', '2026-04-05 11:59:13'),
(201, 'c17ef65b-3598-4424-8f5d-089da10388fc', 1, 'Delete', 'Delete user name EFA information', '2026-04-05 12:03:05', '2026-04-05 12:03:05'),
(202, 'b6588403-7750-43b4-b9a4-4c93120afddf', 1, 'Delete', 'Delete user name Staff information', '2026-04-05 12:11:56', '2026-04-05 12:11:56'),
(203, '88be8ea9-2ea5-4959-8288-a884cc038952', 1, 'Create', 'Create new user name staff', '2026-04-05 12:12:13', '2026-04-05 12:12:13'),
(204, '6993110b-38b9-4f8f-97b8-0d7510fbb7bb', 7, 'Login', 'Login to system', '2026-04-05 12:37:51', '2026-04-05 12:37:51'),
(205, '6048adc0-ab9f-4b7a-a7e2-5d3c15cf52c1', 1, 'Login', 'Login to system', '2026-04-05 12:52:27', '2026-04-05 12:52:27'),
(206, 'eeebf14f-1583-4f5a-b52a-de7f43a80bd5', 1, 'Login', 'Login to system', '2026-04-05 15:39:09', '2026-04-05 15:39:09'),
(207, '17659ef7-0dcd-47e6-90bd-a80ba4e50ce5', 7, 'Login', 'Login to system', '2026-04-05 16:02:12', '2026-04-05 16:02:12'),
(208, '371a605a-f60d-4503-a12b-1b3b946171a6', 1, 'Login', 'Login to system', '2026-04-06 02:22:32', '2026-04-06 02:22:32'),
(209, 'b396b9fa-91ac-49c8-b93d-0669717a7657', 1, 'Login', 'Login to system', '2026-04-07 05:16:03', '2026-04-07 05:16:03'),
(210, '766a20a0-d7d1-48eb-9166-e1501a5952ec', 7, 'Login', 'Login to system', '2026-04-07 10:55:36', '2026-04-07 10:55:36'),
(211, '341d7b6c-da7a-49cb-996f-ae065b6f35a8', 1, 'Login', 'Login to system', '2026-04-08 03:42:28', '2026-04-08 03:42:28'),
(212, '442d036a-99bf-4d33-813e-ad67991fac71', 1, 'Create', 'Create new product name WAWA Pocket Sunkids Sunscreen for Kids (10ml x 2)', '2026-04-08 03:44:15', '2026-04-08 03:44:15'),
(213, '4257a74b-c40e-4031-a6e3-c9729d70cd95', 1, 'Update', 'Update product WAWA Pocket Sunkids Sunscreen for Kids (10ml x 2) information', '2026-04-08 03:44:47', '2026-04-08 03:44:47'),
(214, 'f8ff9e18-9e51-42d3-a7f2-6ca82cb12cd4', 1, 'Update', 'Update product WAWA Pocket Sunkids Sunscreen for Kids (10ml x 2) information', '2026-04-08 03:45:18', '2026-04-08 03:45:18'),
(215, '9776fc36-ba06-46e3-b980-7fba96bf2d19', 1, 'Create', 'Create new batch name WPSSFK(X2-2026-001', '2026-04-08 03:46:11', '2026-04-08 03:46:11'),
(216, '1782f4fb-9682-4e06-a5b0-ec66cf474e93', 1, 'Update', 'Update product WAWA Sunkids Sunscreen for Kids information', '2026-04-08 03:47:08', '2026-04-08 03:47:08'),
(217, '38a2c7c8-32cd-40c0-ac4e-6ec51ff1d65a', 1, 'Delete', 'Delete batch WPSSFK(X2-2026-001 information', '2026-04-08 03:47:20', '2026-04-08 03:47:20'),
(218, '8a1d0a8c-9747-4cdf-a593-2ddb06da3cab', 1, 'Create', 'Create new batch name WSSFK-2026-001', '2026-04-08 03:48:00', '2026-04-08 03:48:00'),
(219, 'd4ae5bce-880f-4808-a972-cd3d6f43c65c', 1, 'Create', 'Create new user name EFAHUDA', '2026-04-08 03:49:01', '2026-04-08 03:49:01'),
(220, 'a5e8a093-2ac2-429b-aea2-47f35262b787', 1, 'Create', 'Create new user name Hafiz', '2026-04-08 03:50:49', '2026-04-08 03:50:49'),
(221, '378c310a-5649-4faa-bfba-c15aeaeb8614', 1, 'Login', 'Login to system', '2026-04-08 03:54:42', '2026-04-08 03:54:42'),
(222, 'a074411f-4725-49e2-b552-5c907a5de136', 7, 'Login', 'Login to system', '2026-04-08 03:55:19', '2026-04-08 03:55:19'),
(223, '4ba96a01-efb6-4a5a-bb99-c3c3bf45d9f7', 1, 'Login', 'Login to system', '2026-04-08 03:57:18', '2026-04-08 03:57:18'),
(224, '306e241d-8bec-49b1-ad1b-18784024e486', 1, 'Delete', 'Delete user name Hafiz information', '2026-04-08 03:57:33', '2026-04-08 03:57:33'),
(225, '80b40700-eba0-4d0d-8638-29f3b2f38e61', 1, 'Update', 'Update user name EFAHUDA information', '2026-04-08 03:57:51', '2026-04-08 03:57:51'),
(226, 'cbcb32e1-e5e1-40b0-9b7a-ebb03f2809a7', 8, 'Login', 'Login to system', '2026-04-08 03:59:17', '2026-04-08 03:59:17');

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `uuid`, `product_id`, `batch_number`, `quantity`, `receive_date`, `expiry_date`, `created_by`, `created_at`, `updated_at`) VALUES
(3, '94b66e97-3643-4665-9836-0dc8ba47bbbb', 2, 'AFV-2026-001', 24, '2026-01-10', '2026-04-11', 1, '2026-03-29 17:15:00', '2026-04-04 01:45:00'),
(4, '063ec130-6c57-4c91-92af-d9c2592644fe', 3, 'OFV-2026-001', 24, '2026-01-10', '2027-12-24', 1, '2026-03-29 17:15:38', '2026-03-29 17:15:38'),
(5, '8d339018-2e1a-41d5-8e6b-fb89a81b9598', 4, 'SWV-2026-001', 18, '2026-01-10', '2028-03-01', 1, '2026-03-29 17:16:22', '2026-03-29 17:16:22'),
(6, '756b1a2e-1807-4a67-951a-bcc346eddcb4', 5, 'JMD-2026-001', 30, '2026-01-15', '2026-04-07', 1, '2026-03-29 17:16:52', '2026-04-02 13:43:18'),
(7, 'b7e2a027-957e-49ac-b555-60a8b8d85bb1', 6, 'GMBAJ-2026-001', 36, '2026-02-05', '2027-07-01', 1, '2026-03-29 17:17:29', '2026-03-29 17:17:29'),
(8, 'a312106b-eda1-451a-9934-b4994104f19a', 7, 'LMEHDH-2026-001', 24, '2026-02-08', '2028-04-01', 1, '2026-03-29 17:17:53', '2026-03-29 17:17:53'),
(9, 'c519e5b3-872a-42e1-9701-778655cfa7ec', 8, 'SIMSH-2026-001', 30, '2026-02-12', '2027-01-01', 1, '2026-03-29 17:18:22', '2026-03-29 17:18:22'),
(10, 'd96623c3-05e1-4c02-a315-d77542173b9a', 9, 'KTGJ-2026-001', 48, '2026-01-20', '2026-12-30', 1, '2026-03-29 17:18:52', '2026-03-29 17:18:52'),
(11, '223f66f9-d971-4f26-91f3-9973dcc93b0b', 10, 'SHMA-2026-001', 36, '2026-01-18', '2027-05-30', 1, '2026-03-29 17:19:21', '2026-03-29 17:19:21'),
(12, '6b7e586e-287d-406a-a744-a147b95b0a46', 11, 'MOOS-2026-001', 20, '2026-01-22', '2026-04-07', 1, '2026-03-29 17:20:01', '2026-04-03 14:01:14'),
(13, '79f15ded-4c4b-4b14-b51f-d84a208222b4', 12, 'MBSOC-2026-001', 20, '2026-01-22', '2027-09-01', 1, '2026-03-29 17:20:33', '2026-03-29 17:20:33'),
(15, 'c3cf01e5-7cc6-4054-b65d-f7ca61e6904c', 13, 'GN3-2026-001', 10, '2025-07-21', '2026-04-11', 1, '2026-03-29 17:25:12', '2026-04-05 09:11:13'),
(16, 'cd20c594-9d11-4e24-8352-53ea23cd5b46', 14, 'CEC-2026-001', 12, '2025-05-14', '2026-04-05', 1, '2026-03-29 17:26:48', '2026-03-29 17:28:42'),
(17, '2e0efcf3-2830-43a8-80f5-bbcc074bb2c0', 15, 'BMB2-2026-001', 6, '2025-02-04', '2026-04-13', 1, '2026-03-29 17:29:26', '2026-04-05 08:52:55'),
(18, 'a064339a-1676-4a8a-9a58-d94e9642ae3f', 16, 'ATGP-2026-001', 3, '2025-08-16', '2026-04-24', 1, '2026-03-29 17:30:16', '2026-04-05 09:10:43'),
(19, 'c827254f-26b5-4617-b6c0-2c0fdc29b108', 17, 'LC+MK-2026-001', 30, '2026-02-10', '2030-10-01', 1, '2026-03-29 17:30:57', '2026-03-29 17:30:57'),
(20, 'da50f416-20f6-496c-8a72-ac04041bf42a', 18, 'SPID-2026-001', 30, '2026-02-12', '2026-04-08', 1, '2026-03-29 17:31:36', '2026-04-03 14:02:39'),
(21, '3a65d45c-450b-491d-84b8-895d93086060', 21, 'HBSAD-2026-001', 48, '2026-02-20', '2028-12-01', 1, '2026-03-29 17:32:17', '2026-03-29 17:32:17'),
(22, 'ca0f70db-9dd1-4942-a031-5d4a88eb1d83', 22, 'STSS5TUD-2026-001', 24, '2026-02-12', '2028-01-12', 1, '2026-03-29 17:33:35', '2026-03-29 17:33:35'),
(23, '4ef0c457-99dd-4f27-b774-53b8ad537630', 23, 'PFS3-2026-001', 30, '2026-02-22', '2027-12-31', 1, '2026-03-29 17:33:59', '2026-03-29 17:33:59'),
(24, '28ddd547-98b7-469c-b0e9-35842c114e78', 24, 'WOM-2026-001', 2, '2025-01-02', '2026-04-14', 1, '2026-03-29 17:34:39', '2026-04-05 08:53:14'),
(25, '18999872-9532-483b-a221-e58d059e68bf', 25, 'KSMK-2026-001', 1, '2025-02-28', '2026-03-30', 1, '2026-03-29 17:35:22', '2026-03-29 17:35:22'),
(26, '9f81285d-733e-4217-9d94-6216a67d035e', 26, 'SCAF-2026-001', 48, '2026-03-08', '2027-01-31', 1, '2026-03-29 17:35:56', '2026-03-29 17:35:56'),
(27, '05cc4273-ac05-40be-a09e-2900285e7084', 27, 'SSS5-2026-001', 24, '2026-03-15', '2027-02-01', 1, '2026-03-29 17:36:46', '2026-03-29 17:36:46'),
(28, '4f506a94-ced2-4264-a43e-f0a94384ed58', 28, 'ASS5-2026-001', 1, '2025-01-09', '2026-04-04', 1, '2026-03-29 17:37:22', '2026-03-29 17:37:22'),
(33, 'be8b9413-4233-48ef-9e0b-7a14d2be4ca6', 5, 'JMD-2026-002', 70, '2026-04-05', '2028-07-05', 1, '2026-04-05 11:07:39', '2026-04-05 11:07:39'),
(35, 'f4694414-c8cc-46a6-9488-a1a5af34046a', 31, 'WSSFK-2026-001', 85, '2025-02-08', '2026-04-15', 1, '2026-04-08 03:48:00', '2026-04-08 03:48:00');

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `uuid`, `name`, `created_at`, `updated_at`) VALUES
(1, '28f6275c-70a7-4dc3-aa20-2148024977eb', 'Skincare', '2026-03-29 13:41:51', '2026-03-29 13:41:51'),
(2, '4bbd347d-c6b7-42a0-a38c-75c467b9133d', 'Supplement', '2026-03-29 16:44:14', '2026-03-29 16:44:14'),
(3, '3fc74bd4-9648-4dd3-9822-5bfb6384506c', 'Herbal', '2026-03-29 16:44:35', '2026-03-29 16:44:35'),
(4, 'faaf030d-f09e-444f-b77e-211b0b14bb3f', 'Self-Care', '2026-03-29 16:44:50', '2026-03-29 16:44:50'),
(5, '22bcd79c-5143-4a76-a7e0-f31d12b6a5da', 'Health Food', '2026-03-29 16:45:09', '2026-03-29 16:45:09'),
(6, '6f54a8e0-af00-409e-9d68-7f3cde34d7c9', 'Health Drink', '2026-03-29 16:45:22', '2026-03-29 16:45:22'),
(7, 'dba3884a-5b5c-42f7-9794-f505c84707e4', 'Cosmetic', '2026-03-29 16:45:52', '2026-03-29 16:45:52'),
(8, 'b877ab1e-c43c-419c-a971-379e0757827f', 'Hair Care', '2026-03-29 16:46:09', '2026-03-29 16:46:09');

--
-- Dumping data for table `expiry_status`
--

INSERT INTO `expiry_status` (`id`, `uuid`, `name`, `min_day`, `max_day`, `priority`, `created_at`, `updated_at`) VALUES
(9, 'a175a7a4-9742-4608-95db-01524f5f7d2b', 'Expired', -9999, 0, 1, '2026-04-04 01:42:39', '2026-04-05 09:08:31'),
(10, 'a175a7a5-ddb1-49e2-be98-4dd62b51dc90', 'Critical', 1, 3, 2, '2026-04-04 01:42:39', '2026-04-05 09:08:45'),
(11, 'a175a7a5-df53-46b3-820b-995cbd342f42', 'Warning', 4, 7, 3, '2026-04-04 01:42:39', '2026-04-05 09:09:10'),
(12, 'a175a7a5-e0cb-47ae-98a0-e70593a07738', 'Good', 8, 9999, 4, '2026-04-04 01:42:39', '2026-04-05 09:09:22');

--


--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 8);

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `uuid`, `category_id`, `name`, `brand`, `retail_price`, `supplier_name`, `supplier_contact`, `is_active`, `description`, `image`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 'ece409cb-465c-488f-9dae-a34a3461f977', 2, 'Apple Fiber Vasia', 'Vasia', '55.00', 'Vasia Resources Sdn Bhd', '03-7890 1122', 1, 'Serat epal semula jadi untuk membantu sistem penghadaman dan detoks badan.', 'products/PQRdM8qtDMYtrcXmsB4N95I3jFhzPrnAVxuKuoUg.jpg', 1, '2026-03-29 16:48:33', '2026-03-29 16:48:33'),
(3, 'e2e44a01-6725-4d9d-8101-00802fdf206c', 2, 'Orange Fiber Vasia', 'Vasia', '55.00', 'Vasia Resources Sdn Bhd', '03-7890 1122', 1, 'Serat oren semula jadi untuk membantu sistem penghadaman dan kesihatan usus', 'products/UsWneYkx0UPAwgOK40ZcvD5qpneIKSFABevTnkzN.jpg', 1, '2026-03-29 16:49:33', '2026-03-29 16:49:33'),
(4, 'f1ab4ade-69e8-40ad-9a33-ff3065da7279', 2, 'Super White Vasia', 'Vasia', '75.00', 'Vasia Resources Sdn Bhd', '03-7890 1122', 1, 'Suplemen pencerah kulit dari dalam untuk kulit lebih cerah dan sihat.', 'products/6JYIJgIX0cf660CB1MJ5GSfS7hZwQLIIj719NyPX.jpg', 1, '2026-03-29 16:50:24', '2026-03-29 16:50:24'),
(5, '8af75768-3ea8-41d5-bf0e-15fbccc9eb6f', 3, 'Jamu Mak Dara', 'Mak Dara', '45.00', 'Perniagaan Herba Mak Dara', '019-334 5566', 1, 'Jamu tradisional berasaskan herba tempatan untuk kesihatan wanita dan vitaliti.', 'products/kB1nt0fZw0YWh0z5HEGQ8Jx8pLii7wV8AwPovHkW.jpg', 1, '2026-03-29 16:51:20', '2026-03-29 16:51:20'),
(6, '7e914ec9-2fd8-467b-8f9f-b23baa9966a5', 4, 'Gel Mandian Bidara Arab JRM', 'JRM', '28.00', 'JRM Trading Enterprise', '011-2345 6789', 1, 'Gel mandi berasaskan daun bidara Arab untuk membersih dan menyegarkan kulit', 'products/gvVMvoFNI8KxE8sfoZymSj9a0JmXG1j3RVc8RoJe.jpg', 1, '2026-03-29 16:52:22', '2026-03-29 16:52:22'),
(7, 'f5088546-1b2c-407b-94b0-254467b95c48', 4, 'Lotion Mustajab Extreme Hot Dunia Herbs', 'Dunia Herbs', '38.00', 'Dunia Herbs Sdn Bhd', '03-6123 4455/duniaherbs.supply@gmail.com', 1, 'Losyen herba panas yang membantu melegakan sakit otot dan sendi.', 'products/zay4CpOACaZl6ySr5b8qIfmr4kY3OOT6sA7bfge5.jpg', 1, '2026-03-29 16:53:52', '2026-03-29 16:53:52'),
(8, 'b3b950b9-d190-432a-8bc2-10f24996895c', 4, 'Sacha Inchi Mandian Shifa Herb', 'Shifa Herb', '32.00', 'Shifa Herb Enterprise', '012-456 7890 / shifaherb@gmail.com', 1, 'Sabun/gel mandi berasaskan minyak sacha inchi yang menutrisi dan melembapkankulit.', 'products/Maw3gSmohwWMU5WLEzq0TrFkz5q7HFQcZBInTHf6.jpg', 1, '2026-03-29 16:55:01', '2026-03-29 16:55:01'),
(9, '574932a4-ae05-42cd-aa97-bc59c23f87a1', 5, 'Kismis Tok Guru JTG', 'JTG', '22.00', 'JTG Agro Sdn Bhd', '09-776 8899 / jtgagro@gmail.com', 1, 'Kismis berkualiti tinggi kaya antioksidan dan sumber tenaga semula jadi.', 'products/oeL5HKqIYcrEUEPZ1ikTOWgMV2bl66aIAzhlpIIf.jpg', 1, '2026-03-29 16:55:54', '2026-03-29 16:55:54'),
(10, '61b045d4-b296-4db5-ae6d-7e177284cd99', 6, 'Serbuk Halia Madu AMRAN', 'AMRAN', '35.00', 'Amran Herbal Trading', '013-678 9900', 1, 'Serbuk halia dicampur madu untuk menghangatkan badan, meningkatkan imunitidan melegakan masuk angin.', 'products/1rPOjL2NJLht7PiZb5WfzNr6RRw2ZuKNO4DdZMJu.jpg', 1, '2026-03-29 16:57:03', '2026-03-29 16:57:03'),
(11, 'a6dcc089-32cb-44ef-b231-50b3249ea87f', 2, 'Minsyam Olive Oil Softgel', 'Minsyam', '68.00', 'Minsyam Healthcare Sdn Bhd', '03-5544 3322 / minsyam.supply@gmail.com', 1, 'Kapsul minyak zaitun tulen untuk kesihatan jantung, sistem imun dan kulit.', 'products/U9OybgrUcxmYjTLsmWUygtbkYmDgkXBRVCa78B3A.jpg', 1, '2026-03-29 16:58:14', '2026-03-29 16:58:14'),
(12, '490ca493-32e7-44fb-8ee0-1afb04c56798', 2, 'Minsyam Black Seed Oil Capsule', 'Minsyam', '68.00', 'Minsyam Healthcare Sdn Bhd', '03-5544 3322 / minsyam.supply@gmail.com', 1, 'Kapsul minyak habbatus sauda (jintan hitam) untuk meningkatkan imuniti dankesihatan keseluruhan.', 'products/ouETJtMMxgR7igNivoAn4BXxjqENFzA8k7LZTaDC.jpg', 1, '2026-03-29 16:58:59', '2026-03-29 16:58:59'),
(13, '2cb3fc6a-6017-4c65-84a8-adb8edc5aba9', 2, 'Garlic Nurich 300mg', 'Nurich', '44.00', 'Nurich Wellness Enterprise', '016-223 4455', 1, 'Kapsul ekstrak bawang putih 300mg untuk tekanan darah, kolesterol dan sistemimun.', 'products/2pd6oN1SCpnvR6eNip6HIxoWuvZJ4y8P76EhV6hq.jpg', 1, '2026-03-29 17:00:23', '2026-03-29 17:00:23'),
(14, '2658fdbc-c2a1-48cd-89ba-0a2e0284a527', 2, 'CordyC+ Excel Care', 'Excel Care', '95.00', 'Excel Care Biotech Sdn Bhd', '03-8899 1100 / excelcare.bio@gmail.com', 1, 'Suplemen cordyceps untuk meningkatkan tenaga, stamina dan kesihatan paru-paru.', 'products/XP3vPthE2s8CUqdfx2A6Ywza7kNQgM5hoIAua7bq.jpg', 1, '2026-03-29 17:01:07', '2026-03-29 17:01:07'),
(15, '78c1e39c-cb3e-46ee-a1fa-176913d51045', 6, 'Berryfull Mixed Berry 20ml', 'Berryfull', '18.00', 'Berryfull Naturals Trading', '017-334 5678', 1, 'Minuman campuran pelbagai jenis beri kaya antioksidan untuk kecantikan dankesihatan dalaman.', 'products/ESC9ocJMrevJby2bx9eD65xouAjsSGfNaxiKbwvW.jpg', 1, '2026-03-29 17:01:55', '2026-03-29 17:01:55'),
(16, 'e892f644-955c-4928-923f-af8355da5521', 6, 'Air Tonik Ginseng PETANI', 'PETANI', '30.00', 'Petani Herbal Sdn Bhd', '04-441 2233', 1, 'Air tonik berasaskan ginseng untuk mengurangkan keletihan dan meningkatkantenaga.', 'products/NtCXiQMFF6teGA6gLIHUDzF8fDwKD9t7x1gDyXNH.jpg', 1, '2026-03-29 17:02:37', '2026-03-29 17:02:37'),
(17, 'afe03a68-7b24-4039-907c-dec1a3bbc9c7', 7, 'Lipstick Collagen + Madu Kelulut', 'Nour Cosmetics', '25.00', 'Nour Cosmetics Distributor', '011-5566 7788', 1, 'Lipstik diperkaya kolagen dan madu kelulut untuk melembapkan dan mencantikkanbibir.', 'products/36MRBtcjyozAHj6tGAozSwu40gg1bsBc9KBXoDXR.jpg', 1, '2026-03-29 17:03:17', '2026-03-29 17:03:17'),
(18, '0dea3821-dd07-4840-944a-ac49ede3c237', 8, 'Syampu Perang Inai D\'Herbs', 'D\'Herbs', '33.00', 'D\'Herbs Holdings Sdn Bhd', '03-3344 5566 / dherbs.supply@gmail.com', 1, 'Syampu berasaskan inai semula jadi untuk merawat rambut, mengurangkan gugurdan menutrisi kulit kepala.', 'products/qu15CUYvwDEZyP6cmyw1gja7JN6f9lF0ehNg2SkE.jpg', 1, '2026-03-29 17:03:58', '2026-03-29 17:03:58'),
(19, '3a70b23d-3e67-402e-bdb1-ac5ab78f75b9', 1, 'Tati Skincare Glowri Healing Kit', 'Tati Skincare', '149.00', 'Tati Skincare Official Distributor', '018-889 0011', 1, 'Set penjagaan kulit lengkap untuk menyembuh, mencerah dan melembapkan kulitwajah.', 'products/fYq71XScyY8w0Rt8bNxiZBm36n1ICdfnpxXtXJIl.jpg', 1, '2026-03-29 17:05:00', '2026-03-29 17:05:00'),
(20, 'a4d4f77c-e229-43f2-81bc-889ba3c12ee9', 1, 'Wawa Sunscreen Tone-Up SPF 50+', 'Wawa', '48.00', 'Wawa Beauty Supply', '012-990 0112', 1, 'Sunscreen pencerah tone-up SPF 50+ untuk melindungi kulit daripada cahaya UVdan mencerahkan wajah.', 'products/VIkV1Ffza3hbC6WUgbJXFvWNXXWlAlbkdyx9Z74Q.jpg', 1, '2026-03-29 17:05:40', '2026-03-29 17:05:40'),
(21, 'ad9a3a8b-152c-41fe-b37e-304d3d480d4a', 1, 'HydraGlow Beauty Soap ASMA Dermacare', 'ASMA Dermacare', '22.00', 'ASMA Dermacare Enterprise', '014-112 2334 / asmadermacare@gmail.com', 1, 'Sabun kecantikan hydra-glow untuk melembapkan, mencerah dan merawat kulit', 'products/vFoS0sQUTRlq2gVPPhfvWa5glEWR52w4iLvJ60Su.jpg', 1, '2026-03-29 17:06:21', '2026-03-29 17:06:21'),
(22, '8a43e83c-a94c-4acd-b353-578c7396d2eb', 1, 'Snow Tinted Sunscreen SPF 50+ Tone Up D\'Herbs', 'D\'Herbs', '45.00', 'D\'Herbs Holdings Sdn Bhd', '03-3344 5566 / dherbs.supply@gmail.com', 1, 'Sunscreen tinted tone-up SPF 50+ formulasi snow untuk perlindungan UV dan wajahlebih cerah.', 'products/2q3gYZsmDuLnET7GJIhPO6q5tveYCn3W68pDTDJY.jpg', 1, '2026-03-29 17:07:33', '2026-03-29 17:07:33'),
(23, '78f977db-fe6a-417a-92c8-088c552eb985', 7, 'Powder Foundation SPF 35', 'Sofea Cosmetics', '35.00', 'Sofea Cosmetics Distributor', '016-778 8990', 1, 'Bedak foundation SPF 35 untuk liputan sempurna sambil melindungi kulit daripadacahaya matahari.', 'products/xBt0X6TzmGbc9rANdf4Xvh63UYQtcvzINtI42U5T.jpg', 1, '2026-03-29 17:08:18', '2026-03-29 17:08:18'),
(24, 'ab9d9989-9f20-48e3-b243-7dfd8245c28c', 6, 'Wildan Original Milk', 'Wildan', '28.00', 'Wildan Dairy Products', '07-334 4556 / wildandairy@gmail.com', 1, 'Susu tulen berkualiti tinggi kaya nutrisi untuk kesihatan keluarga', 'products/fjBJR6QHrBfQJmV92Uzf38TFy0qhWGvYnczDUfB7.jpg', 1, '2026-03-29 17:09:14', '2026-03-29 17:09:14'),
(25, '076b97b9-0ff5-4fbb-8553-9bd0da8cd596', 6, 'Kopi Senyum Manis Kurma', 'Senyum Manis', '35.00', 'Ratu Beverage Enterprise', '010-667 7889', 1, 'Kopi berkurma manis semula jadi, sumber tenaga dan antioksidan yangmenyegarkan.', 'products/XPfrCdfLtEn1LAbm4ioKAI3k2G3HaNiyewTevCXM.jpg', 1, '2026-03-29 17:10:27', '2026-03-29 17:10:27'),
(26, '7c07706d-781b-44c5-b248-63ba8a73a062', 6, 'Smart Coco A+ Fortune', 'Fortune', '20.00', 'Fortune Agro Trading Sdn Bhd', '06-223 3445 / fortuneagro@gmail.com', 1, 'Minuman berasaskan coco dan nutrien untuk kesihatan dan kesegaran', 'products/ciVix4toidgxBSVOYP0Sw791ladhK2ya1CRYSZ4m.jpg', 1, '2026-03-29 17:11:46', '2026-03-29 17:11:46'),
(27, '116aba5a-082b-47ab-b8ee-fef555915d91', 1, 'SASABELL Sunscreen SPF 50+', 'SASABELL', '38.00', 'SASABELL Beauty Sdn Bhd', '015-334 4556', 1, 'Sunscreen SPF 50+ untuk perlindungan optimum daripada cahaya UV A dan UV B', 'products/bOg9xPTPc88oGNOTheK49q4WX9H0CuawT6ZD4U9I.jpg', 1, '2026-03-29 17:12:45', '2026-03-29 17:12:45'),
(28, '8b5668fe-7166-4730-bb2d-0e7462b751e6', 1, 'Anjo Sunscreen SPF 50+', 'Anjo', '42.00', 'Anjo Beauty Trading', '011-778 8990', 1, 'Sunscreen SPF 50+ ringan dan sesuai untuk kegunaan harian bagi melindungi kulitdaripada cahaya matahari.', 'products/jpbHYbC0InU4IvNHEJ2vR8PtKGtjiyQ9qVLsaKNM.jpg', 1, '2026-03-29 17:13:19', '2026-03-29 23:34:45'),
(31, '4b1d522e-4a4d-4825-a36f-321cdc715f67', 1, 'WAWA Sunkids Sunscreen for Kids', 'Wawa Cosmetics', '15.00', 'Wawa Beauty Supply', '03-7890 1122', 1, 'Suitable for Sensitive & Eczema-Prone Skin: Ingredients like zinc oxide and oatmeal extract are ideal for children and adults with sensitive or eczema-prone skin. Zinc oxide acts as a natural physical barrier, offering sun protection without irritation.', 'products/lBsBdm0m7rqWdbzpvCIgXKtxDLy2wzC50H9GjS3B.jpg', 1, '2026-04-08 03:44:15', '2026-04-08 03:47:08');

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2026-03-29 13:36:42', '2026-03-29 13:36:42'),
(2, 'staff', 'web', '2026-03-29 13:36:42', '2026-03-29 13:36:42');

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('KlrmWUWOVbVmkwM4CwQDESwCZ1jXhaK5Y1BDKXAT', 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidmh1aWxSS1JPZ0hBdElqYjhSVXNya3dZZmE5RmQzemVaZmdBZVFidyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6OToiZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6ODt9', 1775620757);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `name`, `email`, `email_verified_at`, `phone_number`, `position`, `username`, `password`, `remember_token`, `is_active`, `last_login_at`, `created_at`, `updated_at`) VALUES
(1, 'ed5690ee-cb31-44c8-8d83-b30beed57d23', 'System Admin', 'epahh03@gmail.com', NULL, '0197988507', 'System Administrator', 'admin', '$2y$12$9eSXgettN3FRmlxKSnq50.mXAQeIaA21eBzyiKP.d4BI7c6sF5ny2', 'uCNtR7g2qtcXrFIWax9vg8vCuT4dQILzQLyiMsLCol1YOuUYR6RqLwWNG2SV', 1, '2026-04-08 03:57:18', '2026-03-29 13:36:43', '2026-04-08 03:57:18'),
(7, '80302196-c0a8-4695-847b-b8fd4e7cf2aa', 'staff', 'kl2311015223@student.uptm.edu.my', NULL, '01163695190', 'Cashier', '01163695190', '$2y$12$67ftf5UyQUFaxF4MMQekGuFPdKhKHLLAML.uc6vaH5w5WfnjPSyye', NULL, 1, '2026-04-08 03:55:19', '2026-04-05 12:12:13', '2026-04-08 03:55:19'),
(8, 'a69ecabc-9a42-4c4b-9c08-9690af2ba455', 'EFAHUDA', 'cartoonhuda03@gmail.com', NULL, '012345678', 'stock handling', '012345678', '$2y$12$R2ajQQC8yHNTLey7ec7t9.k8ozre1d3VfzVlqqIBEDdPCo5tSu.Ty', 'gqEMeQuuYRqoWPERV5V1izKzxWONPIudOLF1wsVi4ROwG5vgeGUi22y2JQeT', 1, '2026-04-08 03:59:17', '2026-04-08 03:49:01', '2026-04-08 03:59:17');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
