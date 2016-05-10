-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2016 at 10:10 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simobl`
--

-- --------------------------------------------------------

--
-- Table structure for table `agendas`
--

CREATE TABLE `agendas` (
  `id` int(10) UNSIGNED NOT NULL,
  `projectId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_p1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgl_p1` date DEFAULT NULL,
  `no_p2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgl_p2` date DEFAULT NULL,
  `no_p3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgl_p3` date DEFAULT NULL,
  `no_p4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgl_p4` date DEFAULT NULL,
  `no_p5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgl_p5` date DEFAULT NULL,
  `no_p6` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgl_p6` date DEFAULT NULL,
  `no_p7` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgl_p7` date DEFAULT NULL,
  `no_p8` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgl_p8` date DEFAULT NULL,
  `no_kl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgl_kl` date DEFAULT NULL,
  `last_obl` int(11) DEFAULT NULL,
  `last_kl` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `akuns`
--

CREATE TABLE `akuns` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `plain` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `activa` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `akuns`
--

INSERT INTO `akuns` (`id`, `name`, `email`, `password`, `plain`, `role`, `activa`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'nadhir', 'nadhirov@gmail.com', '$2y$10$jL6nkfH.cfLx.LWp9ifCJunVCE28MOS9hF1LomQlIh6m6uI6iN56C', 'd975xbx2', 'Admin', 'YES', 'TIHGwYhzMWxmXhoPHJ0eeasLuhDlxlP0ya0ARZjqTiEaygf7qjzgqKtCBDmb', '2016-01-17 08:27:11', '2016-01-20 03:07:10'),
(7, 'lukman', 'lukman@gmail.com', '$2y$10$nVirkMrxKkH7TzLVkFM6D.7qo2yv.yqs03TMnS3HvdfWqTWIG5xci', 'd975xbx2', 'Admin', 'YES', 'yAcQ5YKmz2b4fbdHNAgsmzW7KY9DfLhGCSEBjVqhNi3WPE3ld1TFBjijGMdG', '2016-01-17 08:32:57', '2016-02-02 00:19:11'),
(10, 'Novandha Yudyanto', 'panda16@gmail.com', '$2y$10$kntu8ThkrMTlVbfd0I5xb.NBJFBaK.zvZBUMwGHrRfGFBiWvSub4S', '1234567', 'Staff', 'YES', NULL, '2016-01-17 19:12:25', '2016-01-17 19:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `dokumens`
--

CREATE TABLE `dokumens` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_dokumen` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `posisi_dokumen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nama_file` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `file_tipe` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `file_size` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lokasi_file` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_dokumen` date NOT NULL,
  `nomor_dokumen` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jendoks`
--

CREATE TABLE `jendoks` (
  `id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `activa` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenters`
--

CREATE TABLE `jenters` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenis` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `activa` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jenters`
--

INSERT INTO `jenters` (`id`, `jenis`, `activa`, `created_at`, `updated_at`) VALUES
(1, 'E-Commerce', 'Aktif', '2016-01-17 21:07:04', '2016-01-17 21:07:04'),
(2, 'Majalah', 'Aktif', '2016-01-17 23:49:57', '2016-01-17 23:49:57');

-- --------------------------------------------------------

--
-- Table structure for table `masters`
--

CREATE TABLE `masters` (
  `id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `witel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nmr_ao` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pelanggan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat_pelanggan` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama_proj` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lingkup_pekerjaan` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `segmen` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jenis_tender` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mitra` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_mitra_pelaksana` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masa_kontrak` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mulai` date DEFAULT NULL,
  `sampai` date DEFAULT NULL,
  `delivery_layanan` date DEFAULT NULL,
  `skema_pembayaran` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nilai_sph` int(100) DEFAULT NULL,
  `nilai_negos` int(100) DEFAULT NULL,
  `total_revenue` int(100) DEFAULT NULL,
  `revenue_cpe` int(100) DEFAULT NULL,
  `beban_cpe` int(100) DEFAULT NULL,
  `margin_cpe` int(100) DEFAULT NULL,
  `prosentase` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skema_bisnis` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama_osm` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nik_osm` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jab_osm` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama_mgr_bid` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nik_mgr_bidding` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jab_bidding` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama_mgr_ebis` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jab_mgr_ebis` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama_asman_bidd_witel` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jab_asman_bid_wit` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama_am` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jab_am` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_kfs` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgl_kfs` date DEFAULT NULL,
  `progress_tr5` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `masters`
--

INSERT INTO `masters` (`id`, `witel`, `nmr_ao`, `pelanggan`, `alamat_pelanggan`, `nama_proj`, `lingkup_pekerjaan`, `segmen`, `jenis_tender`, `mitra`, `sub_mitra_pelaksana`, `masa_kontrak`, `mulai`, `sampai`, `delivery_layanan`, `skema_pembayaran`, `nilai_sph`, `nilai_negos`, `total_revenue`, `revenue_cpe`, `beban_cpe`, `margin_cpe`, `prosentase`, `skema_bisnis`, `nama_osm`, `nik_osm`, `jab_osm`, `nama_mgr_bid`, `nik_mgr_bidding`, `jab_bidding`, `nama_mgr_ebis`, `jab_mgr_ebis`, `nama_asman_bidd_witel`, `jab_asman_bid_wit`, `nama_am`, `jab_am`, `no_kfs`, `tgl_kfs`, `progress_tr5`, `created_at`, `updated_at`) VALUES
('OBL503', 'Madura', '', '', '', 'Pengadaan Fiber Optik Pemkab Madura Kecepatan 150 Mbps', '', '', 'E-Commerce', '', '', '', '2016-01-14', '2016-01-09', '1970-01-01', '', 0, 0, 0, 0, 0, 0, NULL, '', '', '', '', NULL, NULL, '', '', '', NULL, NULL, '', '', NULL, '0000-00-00', NULL, '2016-01-30 01:51:42', '2016-01-30 01:51:42'),
('OBL51', 'Madura', NULL, NULL, NULL, NULL, NULL, NULL, 'E-Commerce', NULL, NULL, NULL, '2016-01-21', '2016-01-01', '2016-01-30', NULL, 0, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, '2016-01-30 00:35:30', '2016-01-30 00:35:30'),
('OBL52', 'Madura', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-22', '2016-01-02', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-30 00:35:30', '2016-01-30 00:35:30'),
('OBL53', 'Madura', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-23', '2016-01-03', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-30 00:35:30', '2016-01-30 00:35:30'),
('OBL54', 'Madura', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-24', '2016-01-04', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-30 00:35:30', '2016-01-30 00:35:30'),
('OBL55', 'Madura', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-25', '2016-01-05', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-30 00:35:30', '2016-01-30 00:35:30'),
('OBL56', 'Madura', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-26', '2016-01-16', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-30 00:35:30', '2016-01-30 00:35:30'),
('OBL57', 'Madura', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-27', '2016-01-07', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-30 00:35:30', '2016-01-30 00:35:30'),
('OBL58', 'Madura', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-28', '2016-01-08', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-30 00:35:30', '2016-01-30 00:35:30'),
('OBL59', 'Madura', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', '1970-01-01', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-30 00:35:30', '2016-01-30 00:35:30'),
('OBL60', 'Madura', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', '1970-01-01', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-30 00:35:30', '2016-01-30 00:35:30'),
('OBL61', 'Madura', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', '1970-01-01', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-30 00:35:30', '2016-01-30 00:35:30'),
('OBL62', 'Madura', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', '1970-01-01', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-30 00:35:31', '2016-01-30 00:35:31'),
('OBL63', 'Madura', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', '1970-01-01', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-30 00:35:31', '2016-01-30 00:35:31'),
('OBL64', 'Madura', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', '1970-01-01', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-30 00:35:31', '2016-01-30 00:35:31'),
('OBL65', 'Madura', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', '1970-01-01', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-30 00:35:31', '2016-01-30 00:35:31'),
('OBL66', 'Madura', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', '1970-01-01', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-30 00:35:31', '2016-01-30 00:35:31'),
('OBL67', 'Madura', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', '1970-01-01', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-30 00:35:31', '2016-01-30 00:35:31'),
('OBL68', 'Madura', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', '1970-01-01', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-30 00:35:31', '2016-01-30 00:35:31'),
('OBL69', 'Madura', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', '1970-01-01', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-30 00:35:31', '2016-01-30 00:35:31'),
('OBL70', 'Madura', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', '1970-01-01', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-30 00:35:31', '2016-01-30 00:35:31'),
('OBL71', 'Madura', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', '1970-01-01', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-30 00:35:31', '2016-01-30 00:35:31'),
('OBL72', 'Madura', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', '1970-01-01', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-30 00:35:31', '2016-01-30 00:35:31'),
('OBL73', 'Madura', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', '1970-01-01', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-30 00:35:31', '2016-01-30 00:35:31'),
('OBL74', 'Madura', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', '1970-01-01', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-30 00:35:31', '2016-01-30 00:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_01_16_081543_create_akuns_table', 1),
('2016_01_16_081654_create_masters_table', 1),
('2016_01_16_081707_create_dokumens_table', 1),
('2016_01_16_081723_create_jenters_table', 1),
('2016_01_16_081742_create_jendoks_table', 1),
('2016_01_16_081758_create_witels_table', 1),
('2015_12_24_174638_create_users_table', 2),
('2016_01_22_074124_create_agendas_table', 3),
('2016_01_25_030616_create_uploads_table', 4),
('2016_01_28_034424_create_agendas_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(10) UNSIGNED NOT NULL,
  `nam_file` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `witels`
--

CREATE TABLE `witels` (
  `id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `witel` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `activa` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `witels`
--

INSERT INTO `witels` (`id`, `witel`, `activa`, `created_at`, `updated_at`) VALUES
('03910', 'Madura', 'Aktif', '2016-01-20 01:36:28', '2016-01-20 01:36:28'),
('BG', 'Bangil', 'Aktif', '2016-01-20 01:35:21', '2016-01-20 01:35:21'),
('GS', 'Gresik', 'Aktif', '2016-01-17 20:42:56', '2016-01-17 20:42:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendas`
--
ALTER TABLE `agendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agendas_projectid_foreign` (`projectId`);

--
-- Indexes for table `akuns`
--
ALTER TABLE `akuns`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `akuns_email_unique` (`email`);

--
-- Indexes for table `dokumens`
--
ALTER TABLE `dokumens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jendoks`
--
ALTER TABLE `jendoks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenters`
--
ALTER TABLE `jenters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masters`
--
ALTER TABLE `masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `witels`
--
ALTER TABLE `witels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agendas`
--
ALTER TABLE `agendas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `akuns`
--
ALTER TABLE `akuns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `jenters`
--
ALTER TABLE `jenters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `agendas`
--
ALTER TABLE `agendas`
  ADD CONSTRAINT `agendas_projectid_foreign` FOREIGN KEY (`projectId`) REFERENCES `masters` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
