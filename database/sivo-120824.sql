-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 12, 2024 at 03:22 PM
-- Server version: 10.11.8-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u549415590_sivo`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahans`
--

CREATE TABLE `bahans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `stok` double(8,2) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `bahans`
--

INSERT INTO `bahans` (`id`, `nama`, `stok`, `lokasi`, `jenis`, `created_at`, `updated_at`) VALUES
(1, 'Alkohol 70%', 41000.00, '-', 'Cair', NULL, '2024-08-10 14:43:33'),
(2, 'Alkohol 96%', 21000.00, '-', 'Cair', NULL, '2024-08-10 14:44:11'),
(3, 'Alkohol 98%', 3.00, '-', 'Cair', NULL, '2024-04-08 12:47:30'),
(4, 'Amil alkohol', 1006.00, '-', 'Cair', NULL, '2024-08-12 09:59:01'),
(5, 'Amoniak', 3000.00, 'Rak Besi + Rak Besi Stok', 'Cair', NULL, '2024-08-09 09:54:45'),
(6, 'Amonium cair', 95.00, 'Rak Besi', 'Cair', NULL, '2024-03-31 13:21:15'),
(7, 'Amonium hydroxide', 4000.00, '-', 'Cair', NULL, '2024-08-09 09:55:08'),
(8, 'Amonium oxalat', 1500.00, 'Rak Besi', 'Cair', NULL, '2024-08-09 10:04:59'),
(9, 'Anisi oil', 1000.00, '-', 'Cair', NULL, '2024-08-09 18:25:42'),
(10, 'Aqua pro injeksi', 9.00, '-', 'Cair', NULL, '2024-04-05 05:45:08'),
(11, 'Aquadest', 0.00, '-', 'Cair', NULL, NULL),
(12, 'Asam Asetat 6%', 250.00, 'Rak Besi Stok', 'Cair', NULL, NULL),
(13, 'Asam asetat anhidrat', 1000.00, '-', 'Cair', NULL, '2024-08-10 15:06:37'),
(14, 'Asam asetat glasial', 2700.00, '-', 'Cair', NULL, '2024-08-12 09:55:11'),
(15, 'Asam asetik anhidrat', 0.00, '-', 'Cair', NULL, NULL),
(16, 'Asam formic (CHOOH)', 0.00, '-', 'Cair', NULL, NULL),
(17, 'Asam fosfat', 500.00, 'Rak Besi Stok', 'Cair', NULL, '2024-08-09 09:56:00'),
(18, 'Asam Nitrat', 1000.00, 'Rak Besi Stok', 'Cair', NULL, NULL),
(19, 'Asam Sitrat', 1700.00, 'Rak Besi Stok', 'Cair', NULL, NULL),
(20, 'Aseton p.a', 2000.00, 'Rak Besi Stok', 'Cair', NULL, '2024-08-09 09:56:21'),
(21, 'Aseton teknis', 100.00, 'Rak Besi Stok', 'Cair', NULL, '2024-08-09 09:56:45'),
(22, 'Benedict', 1000.00, 'Rak Besi Stok', 'Cair', NULL, '2024-08-09 09:57:08'),
(23, 'Benzalkonium', 2500.00, 'Rak Besi Stok', 'Cair', NULL, '2024-08-09 09:57:29'),
(24, 'Benzen', 2500.00, '-', 'Cair', NULL, '2024-08-12 09:56:42'),
(25, 'Ca(OH)2 40%', 1000.00, 'Rak Besi Stok', 'Cair', NULL, NULL),
(26, 'Citrate saline', 300.00, 'Rak Besi + Rak Besi Stok', 'Cair', NULL, NULL),
(27, 'Diazo B', 500.00, 'Rak Besi Stok', 'Cair', NULL, NULL),
(28, 'Dietil eter', 2000.00, '-', 'Cair', NULL, '2024-08-09 18:29:45'),
(29, 'Dragendorff', 150.00, 'Rak Besi + Rak Besi Stok', 'Cair', NULL, NULL),
(30, 'Eosin 2%', 0.00, '-', 'Cair', NULL, NULL),
(31, 'Etanol 96%', 4100.00, 'Rak Besi Stok', 'Cair', NULL, '2024-08-09 09:58:17'),
(32, 'Eter', 5000.00, '-', 'Cair', NULL, '2024-08-12 09:48:04'),
(33, 'Ethylene', 500.00, 'Rak Besi + Rak Besi Stok', 'Cair', NULL, NULL),
(34, 'Etil asetat', 12600.00, 'Rak Besi Stok', 'Cair', NULL, '2024-08-09 18:16:04'),
(35, 'Etil Eter', 800.00, 'Rak Besi Stok', 'Cair', NULL, NULL),
(36, 'Fehling A', 1500.00, 'Rak Besi Stok', 'Cair', NULL, '2024-08-09 10:00:01'),
(37, 'Fehling B', 1000.00, 'Rak Besi Stok', 'Cair', NULL, '2024-08-09 10:00:25'),
(38, 'Fenol', 2000.00, '-', 'Cair', NULL, '2024-08-09 10:00:53'),
(39, 'Formalin', 6200.00, 'Rak Besi Stok', 'Cair', NULL, '2024-08-09 10:01:25'),
(40, 'Fuchsin', 0.00, '-', 'Cair', NULL, NULL),
(41, 'Fuhsin', 0.00, '-', 'Cair', NULL, NULL),
(42, 'Gentian violet', 100.00, 'Rak Besi Stok', 'Cair', NULL, NULL),
(43, 'Giemsa', 0.00, '-', 'Cair', NULL, NULL),
(44, 'Gliserin', 3500.00, 'Rak Besi + Rak Besi Stok', 'Cair', NULL, NULL),
(45, 'Gliserin/gliserol', 20000.00, 'Rak Besi Stok', 'Cair', NULL, '2024-08-09 10:02:03'),
(46, 'H2SO4', 7500.00, 'Rak Besi Stok', 'Cair', NULL, '2024-08-09 18:19:06'),
(47, 'HCl', 1000.00, 'Rak Besi Stok', 'Cair', NULL, '2024-08-09 10:03:11'),
(48, 'Hemoglobin C', 1000.00, '-', 'Cair', NULL, '2024-08-09 18:30:17'),
(49, 'HNO3', 4000.00, 'Rak Besi Stok', 'Cair', NULL, NULL),
(50, 'I-Butanol', 1000.00, '-', 'Cair', NULL, '2024-08-09 18:26:12'),
(51, 'Isopropyl Myristate', 4600.00, 'Rak Besi Stok', 'Cair', NULL, '2024-08-12 10:23:40'),
(52, 'Karbopol', 1000.00, 'Rak Besi Stok', 'Cair', NULL, NULL),
(53, 'Kloroform', 0.00, '-', 'Cair', NULL, NULL),
(54, 'Lactophenol cotton blue', 0.00, '-', 'Cair', NULL, NULL),
(55, 'LB', 0.00, '-', 'Cair', NULL, NULL),
(56, 'Lugol', 500.00, '-', 'Cair', NULL, '2024-08-09 18:27:06'),
(57, 'Malachite green oxalate', 0.00, '-', 'Cair', NULL, NULL),
(58, 'Mayer', 100.00, '-', 'Cair', NULL, '2024-08-09 18:11:55'),
(59, 'Metanol p.a', 6000.00, '-', 'Cair', NULL, '2024-08-09 18:24:08'),
(60, 'Metanol teknis', 7500.00, 'Rak Besi Stok', 'Cair', NULL, '2024-08-09 10:04:02'),
(61, 'Metil Etil Keton', 1000.00, 'Rak Besi Stok', 'Cair', NULL, NULL),
(62, 'Metil salisilat', 3000.00, 'Rak Besi Stok', 'Cair', NULL, NULL),
(63, 'N-Heksan', 2500.00, '-', 'Cair', NULL, '2024-08-09 18:24:52'),
(64, 'NaCl fis', 1000.00, 'Rak Besi Stok', 'Cair', NULL, NULL),
(65, 'Ol. Anisi', 1000.00, 'Rak Besi Stok', 'Cair', NULL, '2024-08-09 10:04:31'),
(66, 'Ol. Arachidisi', 1000.00, 'Rak Besi Stok', 'Cair', NULL, NULL),
(67, 'Ol. Cesami', 300.00, 'Rak Besi Stok', 'Cair', NULL, '2024-08-09 17:59:42'),
(68, 'Ol. Cinnamomi', 2700.00, 'Rak Besi Stok', 'Cair', NULL, '2024-08-09 18:00:10'),
(69, 'Ol. Citrus', 1000.00, 'Rak Besi Stok', 'Cair', NULL, NULL),
(70, 'Ol. Coconut', 3500.00, 'Rak Besi Stok', 'Cair', NULL, NULL),
(71, 'Ol. Cocos', 300.00, 'Rak Besi Stok', 'Cair', NULL, '2024-08-09 18:00:44'),
(72, 'Ol. Iecoris Aseli', 5200.00, 'Rak Besi Stok', 'Cair', NULL, '2024-08-09 18:01:19'),
(73, 'Ol. Menthae', 4200.00, 'Rak Besi Stok', 'Cair', NULL, '2024-08-09 18:01:44'),
(74, 'Ol. Olivarum', 2000.00, 'Rak Besi Stok', 'Cair', NULL, NULL),
(75, 'Ol. Olive', 500.00, 'Rak Besi Stok', 'Cair', NULL, '2024-08-09 18:02:15'),
(76, 'Ol. Ricini', 200.00, 'Rak Besi Stok', 'Cair', NULL, '2024-08-09 18:02:40'),
(77, 'Ol. Rosemary', 500.00, 'Rak Besi Stok', 'Cair', NULL, NULL),
(78, 'Parafin liquid', 1500.00, 'Rak Besi + Rak Besi Stok', 'Cair', NULL, '2024-08-09 18:03:07'),
(79, 'PEG 1000', 4000.00, 'Rak Besi + Rak Besi Stok', 'Cair', NULL, NULL),
(80, 'PEG 400', 2000.00, 'Rak Besi + Rak Besi Stok', 'Cair', NULL, '2024-08-09 18:03:38'),
(81, 'PEG 600', 1000.00, 'Rak Besi + Rak Besi Stok', 'Cair', NULL, NULL),
(82, 'Potasium alum', 0.00, '-', 'Cair', NULL, NULL),
(83, 'PPC', 0.00, '-', 'Cair', NULL, NULL),
(84, 'Propilen glikol', 12000.00, 'Rak Besi + Rak Besi Stok', 'Cair', NULL, '2024-08-09 18:04:09'),
(85, 'Rees ecker', 100.00, '-', 'Cair', NULL, '2024-08-09 18:09:57'),
(86, 'SASA', 1000.00, 'Rak Besi Stok', 'Cair', NULL, NULL),
(87, 'Sirup simplex', 0.00, '-', 'Cair', NULL, NULL),
(88, 'Sorbitol', 3200.00, 'Rak Besi Stok', 'Cair', NULL, '2024-08-09 18:04:37'),
(89, 'Sorbitol 70%', 0.00, '-', 'Cair', NULL, NULL),
(90, 'Span 20', 0.00, '-', 'Cair', NULL, NULL),
(91, 'Span 80', 12500.00, 'Rak Besi + Rak Besi Stok', 'Cair', NULL, '2024-08-09 18:05:10'),
(92, 'Spiritus', 13000.00, 'Rak Besi Stok', 'Cair', NULL, '2024-08-09 18:05:43'),
(93, 'Tapol', 200.00, 'Rak Besi Stok', 'Cair', NULL, '2024-08-09 18:06:08'),
(94, 'TCA 10%', 0.00, '-', 'Cair', NULL, NULL),
(95, 'TEA', 9100.00, 'Rak Besi + Rak Besi Stok', 'Cair', NULL, '2024-08-09 18:06:45'),
(96, 'Turk', 100.00, 'Rak Besi + Rak Besi Stok', 'Cair', NULL, '2024-08-09 18:12:32'),
(97, 'Tween 60', 2000.00, '-', 'Cair', NULL, '2024-08-09 18:07:17'),
(98, 'Tween 80', 6300.00, 'Rak Besi + Rak Besi Stok', 'Cair', NULL, '2024-08-09 18:07:50'),
(99, 'Wagner', 50.00, 'Rak Besi + Rak Besi Stok', 'Cair', NULL, '2024-08-09 18:11:01'),
(100, '1-Naftol', 25.00, '-', 'Padat', NULL, '2024-08-09 18:13:31'),
(101, 'Acetanilide', 500.00, '-', 'Padat', NULL, '2024-08-09 09:17:33'),
(102, 'Adeps lanae', 3000.00, 'Rak Besi', 'Padat', NULL, '2024-08-09 09:06:54'),
(103, 'Aerosil', 1500.00, '-', 'Padat', NULL, '2024-08-09 09:07:49'),
(104, 'AgNO3', 250.00, 'Rak Besi', 'Padat', NULL, '2024-08-07 11:28:58'),
(105, 'Aluminium Potasium', 500.00, 'Rak Besi', 'Padat', NULL, NULL),
(106, 'Aluminium Powder', 0.00, '-', 'Padat', NULL, NULL),
(107, 'Ambroxol', 2000.00, '-', 'Padat', NULL, '2024-08-10 14:47:27'),
(108, 'Amilum Manihot', 740.00, 'Rak Besi + Rak Stok (Kayu Putih)', 'Padat', NULL, '2024-08-09 09:11:26'),
(109, 'Amilum Oryzae', 600.00, '-', 'Padat', NULL, '2024-08-09 09:12:07'),
(110, 'Aminofilin', 1500.00, '-', 'Padat', NULL, '2024-08-09 09:12:43'),
(111, 'Amoksilin serbuk', 900.00, 'Rak Besi', 'Padat', NULL, '2024-08-07 11:30:48'),
(112, 'Amonium asetat', 300.00, 'Rak Besi', 'Padat', NULL, '2024-08-07 11:31:19'),
(113, 'Amonium klorida', 2600.00, 'Rak Besi', 'Padat', NULL, '2024-08-09 09:14:19'),
(114, 'Amonium sulfat', 600.00, 'Rak Besi Stok', 'Padat', NULL, '2024-08-07 11:32:14'),
(115, 'Amprotab', 500.00, '-', 'Padat', NULL, '2024-08-08 10:19:16'),
(116, 'Antalgin', 200.00, 'Rak Besi', 'Padat', NULL, '2024-08-07 11:32:46'),
(117, 'Asam askorbat', 400.00, 'Rak Besi', 'Padat', NULL, '2024-08-07 11:33:19'),
(118, 'Asam benzoat', 500.00, '-', 'Padat', NULL, '2024-08-08 10:19:49'),
(119, 'Asam borat', 1700.00, '-', 'Padat', NULL, '2024-08-09 09:14:42'),
(120, 'Asam kromat', 0.00, '-', 'Padat', NULL, NULL),
(121, 'Asam Mefenamat', 1400.00, 'Rak Besi', 'Padat', NULL, '2024-08-09 09:15:10'),
(122, 'Asam Oksalat', 2000.00, '-', 'Padat', NULL, '2024-08-09 09:15:36'),
(123, 'Asam pikrat', 0.00, '-', 'Padat', NULL, NULL),
(124, 'Asam salisilat', 6450.00, '-', 'Padat', NULL, '2024-08-09 09:16:05'),
(125, 'Asam sitrat', 5100.00, '-', 'Padat', NULL, '2024-08-09 09:16:31'),
(126, 'Asam stearat', 2050.00, '-', 'Padat', NULL, '2024-08-09 09:16:56'),
(127, 'Asetosal', 2100.00, '-', 'Padat', NULL, '2024-08-09 09:17:59'),
(128, 'Aspirin', 2300.00, '-', 'Padat', NULL, '2024-08-09 09:18:35'),
(129, 'Avicel 101', 1000.00, 'Rak Besi', 'Padat', NULL, NULL),
(130, 'Avicel 102', 1500.00, 'Rak Besi', 'Padat', NULL, NULL),
(131, 'Avicel ph 102', 500.00, 'Rak Besi', 'Padat', NULL, '2024-08-07 11:38:13'),
(132, 'B12', 300.00, 'Rak Besi', 'Padat', NULL, '2024-08-08 10:21:08'),
(133, 'Barium cloride 2-hydrate', 1250.00, 'Rak Besi', 'Padat', NULL, '2024-08-09 09:19:05'),
(134, 'Benedict', 500.00, 'Rak Besi Stok', 'Padat', NULL, NULL),
(135, 'C8H8N6O6', 0.00, '-', 'Padat', NULL, NULL),
(136, 'Caffein', 1250.00, 'Rak Besi', 'Padat', NULL, '2024-08-08 10:21:40'),
(137, 'Calamin', 500.00, 'Rak Besi', 'Padat', NULL, NULL),
(138, 'Calsium Carbonate', 1500.00, '-', 'Padat', NULL, '2024-08-09 09:21:08'),
(139, 'Calsium cloride dyhidrate', 2200.00, 'Rak Besi', 'Padat', NULL, '2024-08-09 09:21:24'),
(140, 'Carbokyl Metyl Cellulosa', 0.00, '-', 'Padat', NULL, NULL),
(141, 'Carbopol', 4000.00, 'Rak Besi + Rak Stok (Kayu Putih)', 'Padat', NULL, NULL),
(142, 'Cera alba', 3500.00, '-', 'Padat', NULL, '2024-08-09 09:21:54'),
(143, 'Cera Flava', 4600.00, '-', 'Padat', NULL, '2024-08-09 09:22:13'),
(144, 'Cetil Alkohol', 3500.00, '-', 'Padat', NULL, '2024-08-09 09:22:31'),
(145, 'Champora', 3500.00, 'Rak Besi + Rak Stok (Kayu Putih)', 'Padat', NULL, '2024-08-09 09:23:00'),
(146, 'Chloramphenicol', 1500.00, '-', 'Padat', NULL, '2024-08-08 10:23:07'),
(147, 'CMC Na', 2500.00, '-', 'Padat', NULL, '2024-08-08 10:23:47'),
(148, 'Copper (II) asetat', 0.00, '-', 'Padat', NULL, NULL),
(149, 'Copper (III) Acetate M.', 0.00, '-', 'Padat', NULL, NULL),
(150, 'CuSO4', 1000.00, 'Rak Besi Stok', 'Padat', NULL, NULL),
(151, 'Dextrosa', 0.00, '-', 'Padat', NULL, NULL),
(152, 'D-Glucose anhydrous', 1250.00, '-', 'Padat', NULL, '2024-08-09 09:24:34'),
(153, 'Dinatrium EDTA', 500.00, 'Rak Besi', 'Padat', NULL, '2024-08-07 11:42:46'),
(154, 'di-Potassium hydrogen', 0.00, '-', 'Padat', NULL, NULL),
(155, 'di-Potassium hydrogen phosphat', 0.00, '-', 'Padat', NULL, NULL),
(156, 'FeCl3', 2400.00, 'Rak Besi + Rak Stok (Kayu Putih)', 'Padat', NULL, '2024-08-09 09:25:14'),
(157, 'FeNO3', 90.00, 'Rak Besi', 'Padat', NULL, NULL),
(158, 'Ferrous Sulphate', 500.00, 'Rak Besi', 'Padat', NULL, NULL),
(159, 'FeSO4', 0.00, '-', 'Padat', NULL, NULL),
(160, 'Gelatin', 2600.00, '-', 'Padat', NULL, '2024-08-09 09:26:11'),
(161, 'Gliserin Guaia', 500.00, 'Rak Besi', 'Padat', NULL, NULL),
(162, 'Glukosa', 2300.00, '-', 'Padat', NULL, '2024-08-09 09:42:24'),
(163, 'GOM', 5500.00, 'Rak Besi', 'Padat', NULL, '2024-08-09 09:43:39'),
(164, 'Hancol', 0.00, '-', 'Padat', NULL, NULL),
(165, 'HPMC', 2000.00, '-', 'Padat', NULL, '2024-08-09 09:45:34'),
(166, 'Hydrocortisone', 800.00, 'Rak Besi', 'Padat', NULL, NULL),
(167, 'Ibuprofen', 3500.00, '-', 'Padat', NULL, '2024-08-09 09:46:00'),
(168, 'Iodium', 700.00, 'Rak Besi', 'Padat', NULL, '2024-08-07 11:45:45'),
(169, 'Iron (III) Amonium Sulfate', 500.00, 'Rak Besi', 'Padat', NULL, '2024-08-09 09:46:35'),
(170, 'K2CrO4', 200.00, '-', 'Padat', NULL, '2024-08-08 10:25:24'),
(171, 'Kalium Bromat', 100.00, 'Rak Besi', 'Padat', NULL, NULL),
(172, 'Kalium dikromat', 0.00, '-', 'Padat', NULL, NULL),
(173, 'Kalium permanganat', 250.00, 'Rak Besi', 'Padat', NULL, '2024-08-07 11:46:22'),
(174, 'Karagenin', 1500.00, 'Rak Besi', 'Padat', NULL, '2024-08-09 09:47:27'),
(175, 'Karbon aktif', 2100.00, 'Rak Besi', 'Padat', NULL, '2024-08-09 09:47:46'),
(176, 'Karmin', 1000.00, 'Rak Besi', 'Padat', NULL, NULL),
(177, 'KCl', 850.00, '-', 'Padat', NULL, '2024-08-09 09:49:44'),
(178, 'KH2PO4', 500.00, '-', 'Padat', NULL, '2024-08-08 10:26:24'),
(179, 'KMnO4', 550.00, '-', 'Padat', NULL, '2024-08-09 09:50:28'),
(180, 'KOH', 500.00, '-', 'Padat', NULL, '2024-08-09 09:51:03'),
(181, 'Laktosa', 600.00, 'Rak Besi + Rak Stok (Kayu Putih)', 'Padat', NULL, '2024-08-07 11:48:20'),
(182, 'Lanolin', 4000.00, '-', 'Padat', NULL, '2024-08-09 09:53:50'),
(183, 'Lead (II) Acetat Trihydrate', 250.00, 'Rak Besi', 'Padat', NULL, NULL),
(184, 'Lead (II) Nitrat', 50.00, 'Rak Besi', 'Padat', NULL, NULL),
(185, 'Logam Al', 0.00, '-', 'Padat', NULL, NULL),
(186, 'Magnesium', 300.00, 'Rak Besi', 'Padat', NULL, NULL),
(187, 'Magnesium ribbon', 0.00, '-', 'Padat', NULL, NULL),
(188, 'Magnesium serbuk', 0.00, '-', 'Padat', NULL, NULL),
(189, 'Magnesium stearat', 5000.00, 'Rak Besi + Rak Stok (Kayu Putih)', 'Padat', NULL, '2024-08-09 09:54:23'),
(190, 'Magnesium sulfat', 100.00, '-', 'Padat', NULL, '2024-08-09 09:57:53'),
(191, 'Magnesium sulfat heptahidrat', 0.00, '-', 'Padat', NULL, NULL),
(192, 'Menthol', 1500.00, '-', 'Padat', NULL, '2024-08-08 10:26:52'),
(193, 'Mercury (II) Chloride', 0.00, '-', 'Padat', NULL, NULL),
(194, 'Mercury (II) Nitrat', 50.00, '-', 'Padat', NULL, '2024-08-09 09:58:28'),
(195, 'Methyl red', 100.00, '-', 'Padat', NULL, '2024-08-08 10:27:24'),
(196, 'Metyl morfin', 0.00, '-', 'Padat', NULL, NULL),
(197, 'Metyl paraben', 3000.00, 'Rak Besi + Rak Stok (Kayu Putih)', 'Padat', NULL, '2024-08-09 09:59:19'),
(198, 'Na Carbonate', 0.00, '-', 'Padat', NULL, NULL),
(199, 'Na CMC', 800.00, 'Rak Besi + Rak Stok (Kayu Putih)', 'Padat', NULL, '2024-08-07 11:50:16'),
(200, 'Na EDTA', 1500.00, '-', 'Padat', NULL, '2024-08-09 10:00:47'),
(201, 'Na2S2O2', 1000.00, 'Rak Besi', 'Padat', NULL, NULL),
(202, 'NaCl', 2800.00, '-', 'Padat', NULL, '2024-08-09 10:01:27'),
(203, 'NaOH', 5000.00, '-', 'Padat', NULL, '2024-08-09 10:02:57'),
(204, 'NaOH 98%', 0.00, '-', 'Padat', NULL, '2024-08-09 10:03:15'),
(205, 'Natrium tiosulfat', 1500.00, 'Rak Besi + Rak Stok (Kayu Putih)', 'Padat', NULL, '2024-08-08 10:29:40'),
(206, 'Natrium asetat', 750.00, '-', 'Padat', NULL, '2024-08-09 10:04:12'),
(207, 'Natrium Benzoat', 1000.00, 'Rak Besi + Rak Stok (Kayu Putih)', 'Padat', NULL, '2024-08-10 08:12:41'),
(208, 'Natrium bikarbonat', 1950.00, '-', 'Padat', NULL, '2024-08-10 08:13:33'),
(209, 'Natrium karbonat', 1000.00, '-', 'Padat', NULL, '2024-08-08 10:31:15'),
(210, 'Natrium lauril sulfat', 1500.00, '-', 'Padat', NULL, '2024-08-10 10:25:38'),
(211, 'Natrium nitrat', 1300.00, '-', 'Padat', NULL, '2024-08-08 10:32:18'),
(212, 'Natrium nitrit', 500.00, 'Rak Besi', 'Padat', NULL, NULL),
(213, 'Natrium oksalat', 1000.00, 'Rak Besi', 'Padat', NULL, '2024-08-07 11:53:56'),
(214, 'Natrium sub carbonate', 500.00, 'Rak Besi', 'Padat', NULL, NULL),
(215, 'Natrium sulfat', 0.00, '-', 'Padat', NULL, NULL),
(216, 'Nipagin', 4600.00, '-', 'Padat', NULL, '2024-08-10 08:14:47'),
(217, 'Nipasol', 2000.00, '-', 'Padat', NULL, '2024-08-10 08:15:34'),
(218, 'Norit', 1200.00, 'Rak Besi', 'Padat', NULL, '2024-08-08 10:33:17'),
(219, 'Ortho phosphoric acid 99%', 300.00, 'Rak Besi', 'Padat', NULL, NULL),
(220, 'p-Anisidine', 100.00, '-', 'Padat', NULL, '2024-08-08 10:33:56'),
(221, 'Parafin solid', 3000.00, '-', 'Padat', NULL, '2024-08-10 08:16:23'),
(222, 'PCT', 1000.00, '-', 'Padat', NULL, '2024-08-10 08:17:05'),
(223, 'PEG', 3000.00, 'Rak Besi + Rak Stok (Kayu Putih)', 'Padat', NULL, NULL),
(224, 'PGA', 2500.00, 'Rak Besi', 'Padat', NULL, '2024-08-10 08:18:28'),
(225, 'PGS', 1000.00, 'Rak Besi', 'Padat', NULL, NULL),
(226, 'Phenolphthalein (Indikator PP)', 100.00, '-', 'Padat', NULL, '2024-08-08 10:35:50'),
(227, 'Phloroglucinol', 110.00, 'Rak Besi', 'Padat', NULL, '2024-08-08 10:36:25'),
(228, 'Piridoksin', 770.00, 'Rak Besi', 'Padat', NULL, NULL),
(229, 'Potassium acetate', 0.00, '-', 'Padat', NULL, '2024-08-08 10:37:57'),
(230, 'Potassium bichromate', 0.00, '-', 'Padat', NULL, NULL),
(231, 'Potassium bromate', 0.00, '-', 'Padat', NULL, NULL),
(232, 'Potassium Dicromate', 100.00, 'Rak Besi', 'Padat', NULL, '2024-08-08 10:38:35'),
(233, 'Potassium dyhidrogen phosphate', 2000.00, 'Rak Besi', 'Padat', NULL, '2024-08-09 17:49:29'),
(234, 'Potassium iodida', 300.00, 'Rak Besi', 'Padat', NULL, '2024-08-09 17:50:24'),
(235, 'Povidon', 0.00, '-', 'Padat', NULL, NULL),
(236, 'Prokain HCl', 2000.00, 'Rak Besi', 'Padat', NULL, NULL),
(237, 'PVP', 500.00, '-', 'Padat', NULL, '2024-08-09 17:51:06'),
(238, 'Resorcinol', 100.00, 'Rak Besi', 'Padat', NULL, NULL),
(239, 'Saccharum Lactis', 2000.00, 'Rak Besi', 'Padat', NULL, '2024-08-09 10:17:59'),
(240, 'Sakarin', 500.00, 'Rak Besi', 'Padat', NULL, '2024-08-09 10:17:20'),
(241, 'Silica gel', 1100.00, 'Rak Besi + Rak Stok (Kayu Putih)', 'Padat', NULL, '2024-08-09 10:16:53'),
(242, 'SLS Powder', 0.00, '-', 'Padat', NULL, NULL),
(243, 'Sodium acetate anhydrous', 1000.00, 'Rak Besi', 'Padat', NULL, '2024-08-09 10:16:22'),
(244, 'Sodium carbonate', 450.00, 'Rak Besi', 'Padat', NULL, NULL),
(245, 'Sodium nitrite p.a smart lab', 500.00, 'Rak Besi', 'Padat', NULL, NULL),
(246, 'Sodium nitroprusside dihydrate', 500.00, '-', 'Padat', NULL, '2024-08-09 18:23:23'),
(247, 'Sukrosa', 2250.00, 'Rak Besi + Rak Stok (Kayu Putih)', 'Padat', NULL, NULL),
(248, 'Sulfur praeciptatum', 2500.00, 'Rak Besi + Rak Stok (Kayu Putih)', 'Padat', NULL, '2024-08-09 10:15:41'),
(249, 'Talk', 4300.00, 'Rak Besi', 'Padat', NULL, '2024-08-09 10:15:02'),
(250, 'Teophylin', 100.00, 'Rak Besi', 'Padat', NULL, NULL),
(251, 'Tetra', 0.00, '-', 'Padat', NULL, NULL),
(252, 'Tetrakain HCl', 1000.00, 'Rak Besi', 'Padat', NULL, NULL),
(253, 'Tetrasiklin', 1000.00, 'Rak Besi', 'Padat', NULL, '2024-08-09 10:14:06'),
(254, 'Tragakan', 2100.00, 'Rak Besi', 'Padat', NULL, '2024-08-09 10:13:28'),
(255, 'Urea', 500.00, '-', 'Padat', NULL, '2024-08-09 10:12:51'),
(256, 'Vanilin', 1000.00, 'Rak Besi', 'Padat', NULL, NULL),
(257, 'Vaselin', 0.00, '-', 'Padat', NULL, NULL),
(258, 'Vaselin (petrolatum) white', 0.00, '-', 'Padat', NULL, NULL),
(259, 'Vaselin album', 12000.00, '-', 'Padat', NULL, '2024-08-10 08:19:49'),
(260, 'Vaselin flavum', 12500.00, '-', 'Padat', NULL, '2024-08-10 08:20:56'),
(261, 'Vit. B6', 0.00, '-', 'Padat', NULL, NULL),
(262, 'Vit. C uncoated', 500.00, '-', 'Padat', NULL, '2024-08-09 10:09:27'),
(263, 'Zinc', 500.00, 'Rak Besi', 'Padat', NULL, '2024-08-09 10:09:59'),
(264, 'Zinc logam', 0.00, '-', 'Padat', NULL, NULL),
(265, 'Zinc okide', 200.00, 'Rak Besi', 'Padat', NULL, '2024-08-09 10:10:31'),
(266, 'Zinc sulfat', 500.00, '-', 'Padat', NULL, '2024-08-09 10:11:04'),
(267, 'ZnO', 4500.00, 'Rak Besi', 'Padat', NULL, '2024-08-10 12:56:20'),
(268, 'ZnSO4', 200.00, 'Rak Besi', 'Padat', NULL, '2024-08-10 08:24:17'),
(269, 'Amylum Tritici', 500.00, 'Rak Besi', 'Padat', NULL, NULL),
(270, 'Amylum ', 1500.00, 'Rak Besi', 'Padat', NULL, NULL),
(271, 'Ammonium Perusulphate', 1000.00, 'Rak Besi', 'Padat', NULL, NULL),
(272, 'Amylum Solami', 500.00, 'Rak Besi', 'Padat', NULL, NULL),
(273, 'Albumin', 650.00, '-', 'Padat', NULL, '2024-08-10 13:11:25'),
(274, 'Ammonium Molybolate', 100.00, 'Rak Besi', 'Padat', NULL, NULL),
(275, 'Asam Tatrat', 1000.00, 'Rak Besi', 'Padat', NULL, NULL),
(276, 'Bentonit Magma', 1000.00, 'Rak Besi', 'Padat', NULL, NULL),
(277, 'BHT', 2500.00, 'Rak Besi + Rak Stok (Kayu Putih)', 'Padat', NULL, NULL),
(278, 'Benziden', 1000.00, 'Rak Besi', 'Padat', NULL, NULL),
(279, 'Carmin', 1000.00, 'Rak Besi', 'Padat', NULL, NULL),
(280, 'Cetostearyl ', 1000.00, 'Rak Stok (Kayu Putih)', 'Padat', NULL, NULL),
(281, 'Iron (II) Chloride', 250.00, 'Rak Besi', 'Padat', NULL, NULL),
(282, 'Mangan Sulfat (MnSO4)', 1000.00, 'Rak Besi', 'Padat', NULL, NULL),
(283, 'Mercury (II) Sulfate', 50.00, 'Rak Besi', 'Padat', NULL, NULL),
(284, 'Pottasium Cromate', 1000.00, 'Rak Besi', 'Padat', NULL, NULL),
(285, 'Propylene Paraben', 1000.00, 'Rak Besi', 'Padat', NULL, NULL),
(286, 'Sodium Oxalate (Na2C2O4)', 2000.00, '-', 'Padat', NULL, '2024-08-10 10:31:33'),
(287, 'C6H6O2 Hidrokuinon', 50.00, 'Rak Besi', 'Padat', NULL, NULL),
(288, 'D-Glucose Monohydrate', 1000.00, 'Rak Besi', 'Padat', NULL, NULL),
(289, 'Maltosa', 1000.00, 'Rak Besi', 'Padat', NULL, NULL),
(290, 'Asam Silicat', 1000.00, 'Rak Besi', 'Padat', NULL, NULL),
(291, 'Lactose Broth', 500.00, 'Rak Besi Stok', 'Padat', NULL, NULL),
(292, 'EMB Agar', 500.00, 'Rak Besi Stok', 'Padat', NULL, NULL),
(293, 'BGLB', 500.00, 'Rak Besi Stok', 'Padat', NULL, NULL),
(294, 'Muller Hinton Agar', 500.00, 'Rak Besi Stok', 'Padat', NULL, NULL),
(295, 'Simon Citrate Agar', 500.00, 'Rak Besi Stok', 'Padat', NULL, NULL),
(296, 'Trypthone Soya Broth', 500.00, 'Rak Besi Stok', 'Padat', NULL, NULL),
(297, 'Nutrient Agar', 500.00, 'Rak Besi Stok', 'Padat', NULL, NULL),
(298, 'Metyl Morfin', 500.00, 'Rak Besi', 'Padat', NULL, NULL),
(299, 'Oleum Cacao', 500.00, 'Rak Besi', 'Padat', NULL, '2024-08-10 10:33:44'),
(300, 'P Amadup', 40.00, 'Rak Besi', 'Padat', NULL, NULL),
(301, 'Gum Arabicum', 1000.00, 'Rak Besi', 'Padat', NULL, NULL),
(326, '2-propanol pro analisis', 250.00, 'Rak Besi + Rak Besi Stok', 'Cair', '2024-04-22 14:55:08', '2024-04-22 14:55:08'),
(327, 'amonium molibdat pro analisis', 100.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-04-22 14:57:26', '2024-04-22 14:57:26'),
(328, 'Anilin', 100.00, 'Rak Besi + Rak Besi Stok', 'Cair', '2024-04-22 14:58:07', '2024-04-22 14:58:07'),
(329, 'asam nitrit', 500.00, 'Rak Besi + Rak Besi Stok', 'Cair', '2024-04-22 15:31:22', '2024-04-22 15:31:22'),
(330, 'asetaldehid pro analisis', 500.00, 'Rak Besi + Rak Besi Stok', 'Cair', '2024-04-22 15:32:34', '2024-04-22 15:32:34'),
(331, 'buffer salmiak', 100.00, 'Rak Besi + Rak Besi Stok', 'Cair', '2024-04-22 15:37:30', '2024-04-22 15:37:30'),
(332, 'Calsium Lactat', 1000.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-04-22 15:53:22', '2024-04-22 15:53:22'),
(333, 'DPPH (himedia)', 1.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-04-22 16:26:43', '2024-04-22 16:26:43'),
(334, 'Masker Medis', 7.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-04-22 17:14:52', '2024-04-22 17:16:45'),
(335, 'handscon', 7.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-04-22 17:15:31', '2024-04-22 17:17:57'),
(659, 'Corong Paling Kecil (10 mm)', 20.00, 'Lemari Depo I ', 'Alat', '2024-04-23 08:16:24', '2024-08-07 13:35:18'),
(660, 'Corong Kecil (25 mm)', 35.00, 'Lemari Depo I ', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(661, 'Corong Sedang (75 mm)', 30.00, 'Lemari Depo I ', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(662, 'Corong Besar ( 100 mm )', 15.00, 'Lemari Depo I ', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(663, 'Gelas Ukur 10 ML', 50.00, 'Lemari Depo I ', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(664, 'Gelas Ukur 100 ML', 30.00, 'Lemari Depo I ', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(665, 'Gelas Ukur 1000 ML', 30.00, 'Lemari Depo I ', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(666, 'Gelas Ukur 25 ML', 20.00, 'Lemari Depo I ', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(667, 'Gelas Ukur 250 ML', 20.00, 'Lemari Depo I ', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(668, 'Gelas Ukur 5 ML', 0.00, 'Lemari Depo I ', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(669, 'Gelas Ukur 50 ML', 20.00, 'Lemari Depo I ', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(670, 'Gelas Ukur 500 ML', 10.00, 'Lemari Depo I ', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(671, 'Labu Ukur 10 ML', 50.00, 'Lemari Depo I ', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(672, 'Labu Ukur 100 ML', 50.00, 'Lemari Depo I ', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(673, 'Labu Ukur 1000 ML', 20.00, 'Lemari Depo I ', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(674, 'Labu Ukur 25 ML', 30.00, 'Lemari Depo I ', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(675, 'Labu Ukur 250 ML', 10.00, 'Lemari Depo I ', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(676, 'Labu Ukur 50 ML', 20.00, 'Lemari Depo I ', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(677, 'Labu Ukur 500 ML', 10.00, 'Lemari Depo I ', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(678, 'Piknometer 10 ML', 10.00, 'Lemari Depo I ', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(679, 'Piknometer 25 ML', 20.00, 'Lemari Depo I ', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(680, 'Pipa T', 7.00, 'Lemari Depo I ', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(681, 'Pipa', 6.00, 'Lemari Depo I ', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(682, 'Labu Alas Bulat 100 ML', 5.00, 'Lemari Depo I ', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(683, 'Labu Alas Bulat 1000 ML', 5.00, 'Lemari Depo I ', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(684, 'Labu Alas Bulat 500 ML', 10.00, 'Lemari Depo I ', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(685, 'Botol infus 250 ML', 10.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(686, 'Botol infus 100 ML', 100.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(687, 'Chamber Besar ', 2.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(688, 'Chamber Kecil', 8.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(689, 'Cover Glass', 300.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(690, 'Erlenmayer 100 ML', 30.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(691, 'Erlenmayer 1000 ML', 15.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(692, 'Erlenmayer 1000 ML (Corong Pemisah)', 6.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(693, 'Erlenmayer 250 ML', 20.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(694, 'Erlenmayer 250 ML (Corong Pemisah)', 6.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(695, 'Erlenmayer 50 ML', 10.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(696, 'Erlenmayer 500 ML', 10.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(697, 'Gelas Beaker 100 ML', 50.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(698, 'Gelas Beaker 1000 ML', 20.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(699, 'Gelas Beaker 200 ML', 6.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(700, 'Gelas Beaker 250 ML', 37.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(701, 'Gelas Beaker 50 ML', 39.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(702, 'Gelas Beaker 500 ML', 33.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(703, 'Kaca Arloji Besar', 12.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(704, 'Kaca Arloji Kecil', 17.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(705, 'Kaca Arloji Sedang', 27.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(706, 'Lampu Spritus', 26.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(707, 'Objek Glass', 450.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(708, 'Prasitologi (Sample Objek Glass)', 1.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(709, 'Tabung Darah', 152.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(710, 'Tabung Durham ', 156.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(711, 'Tabung Haematokrit', 6.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(712, 'Tabung Reaksi (Paling Besar)', 80.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(713, 'Tabung Reaksi (Sedang) 50 ml', 59.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(714, 'Tabung Reaksi Panjang 100 ml', 252.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(715, 'Tabung Reaksi Pendek', 31.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(716, 'Tabung Urin', 26.00, 'Lemari Depo II', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(717, 'Buret 25 ML', 10.00, 'Lemari Depo III', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(718, 'Buret 50 ML', 15.00, 'Lemari Depo III', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(719, 'Corong Pisah 100 ML', 5.00, 'Lemari Depo III', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(720, 'Corong Pisah 125 ML', 5.00, 'Lemari Depo III', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(721, 'Corong Pisah 250 ML', 10.00, 'Lemari Depo III', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(722, 'Destilator', 7.00, 'Lemari Depo III', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(723, 'Pendingin Lebigh', 6.00, 'Lemari Depo III', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(724, 'Petri Disk Besar', 20.00, 'Lemari Depo III', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(725, 'Petri Disk Sedang', 100.00, 'Lemari Depo III', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(726, 'Pipet Ukur 1 ML', 10.00, 'Lemari Depo III', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(727, 'Pipet Ukur 10 ML', 26.00, 'Lemari Depo III', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(728, 'Pipet Ukur 2 ML', 17.00, 'Lemari Depo III', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(729, 'Pipet Ukur 5 ML', 13.00, 'Lemari Depo III', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(730, 'Pipet Volume 1 ML', 20.00, 'Lemari Depo III', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(731, 'Pipet Volume 10 ML', 20.00, 'Lemari Depo III', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(732, 'Pipet Volume 2 ML', 20.00, 'Lemari Depo III', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(733, 'Pipet Volume 25 ML', 20.00, 'Lemari Depo III', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(734, 'Pipet Volume 5 ML', 20.00, 'Lemari Depo III', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(735, 'Pipet Westegreen', 10.00, 'Lemari Depo III', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(736, 'Tabung Kondensor', 5.00, 'Lemari Depo III', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(737, 'Viscometer Oswald', 4.00, 'Lemari Depo III', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(738, 'Asbes', 34.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(739, 'Asprator + Selang', 4.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(740, 'Autopen', 2.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(741, 'Ayakan No.50', 2.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(742, 'Ball Pipet', 20.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(743, 'Batang Pengaduk', 39.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(744, 'Blue Tip', 250.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(745, 'Botol Semprot ( Besar )', 25.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(746, 'Botol Semprot (Kecil)', 25.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(747, 'Cawan 100 ML', 30.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(748, 'Cawan 250 ML', 30.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(749, 'Cawan 75 ML', 10.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(750, 'Corong Porselin', 5.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(751, 'Eppendorf (1,5 ml)', 1500.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(752, 'Flat Porselin (Tetes)', 17.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(753, 'Haemometer', 11.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(754, 'Hemocytometer', 11.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(755, 'Hydrometer', 2.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(756, 'Jangka Sorong Digital', 3.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(757, 'Jangka Sorong Manual', 4.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(758, 'Jarum Hypodermic Needles', 1.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(759, 'Jarum Suntik', 0.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(760, 'Kaca Pembesar', 8.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(761, 'Kain kasa steril', 11.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(762, 'Kaki Tiga ', 14.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(763, 'Kertas Perkamen', 11.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(764, 'Kertas saring', 1.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(765, 'Krus Tang', 4.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(766, 'Lancet', 400.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(767, 'Master Refractometer', 1.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(768, 'Micrometer Manual', 3.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(769, 'Mikropipet 0.5 - 10 UL', 5.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(770, 'Mikropipet 1 - 10 UL', 5.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(771, 'Mikropipet 5 - 50 UL', 5.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(772, 'Mikropipet 100-1000 UL', 15.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(773, 'Mikropipet 10-100 UL', 6.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(774, 'Mikropipet 1000 UL', 6.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(775, 'Mortir besar', 30.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(776, 'Mortir kecil', 15.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(777, 'Ose', 30.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(778, 'Phantom Ginjal', 1.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(779, 'Phantom Sistem Pencernaan', 1.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(780, 'Phantom Alat Reproduksi Perempuan', 1.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(781, 'Phantom Alat Reproduksi Laki-laki', 1.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(782, 'Pencetak SUPPO', 6.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(783, 'Penjepit Besi', 20.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(784, 'Penjepit Kayu', 20.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(785, 'Penyangga LED', 4.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(786, 'PH Meter', 6.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(787, 'Pipet Tetes', 144.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(788, 'Pipet Tetes Panjang', 30.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(789, 'Pipet Tetes Pendek', 50.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(790, 'Pump Pipet', 15.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(791, 'Rak Tabung Besi (Panjang)', 5.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(792, 'Rak Tabung Besi (Pendek)', 6.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(793, 'Rak Tabung Kayu', 20.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(794, 'Rak Tabung Plastik', 19.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(795, 'Spatula Plastik', 30.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(796, 'Spatula Porselin', 17.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(797, 'Sptula Besi', 25.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(798, 'Spuit (Jarum Suntik Sterill)', 200.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(799, 'Stamper', 56.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(800, 'Statif', 15.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(801, 'Stopwach', 4.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(802, 'Tempat Urine', 8.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(803, 'Tensi', 1.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(804, 'Thermometer (Digital)', 7.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(805, 'Thermometer (Manual)', 5.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(806, 'Tourniquit', 13.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(807, 'Tube Salep', 9.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(808, 'Urinenometer', 1.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(809, 'Vortex Mirex', 2.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(810, 'Wadah Urine', 50.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(811, 'Yellow Tip', 100.00, 'Lemari Depo VI', 'Alat', '2024-04-23 08:16:24', '2024-04-23 08:16:24'),
(812, 'Amilum Solani', 400.00, 'Rak Besi', 'Padat', '2024-08-10 09:07:32', '2024-08-10 09:07:32'),
(813, 'Alumunium Potassium Sulfate Dodecahydrate', 500.00, 'Rak Besi', 'Padat', '2024-08-10 09:08:46', '2024-08-10 09:08:46'),
(814, 'Butilhidroksituluena (BHT)', 2500.00, 'Rak Besi', 'Padat', '2024-08-10 09:10:01', '2024-08-10 09:10:01'),
(815, 'Amilum', 800.00, 'Rak Besi + Rak Besi Stok', 'Padat', '2024-08-10 09:12:37', '2024-08-10 09:12:37'),
(816, 'Amilum Tritici', 500.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-10 09:13:33', '2024-08-10 09:13:33'),
(817, 'Asam Tartrat', 2000.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-10 09:18:15', '2024-08-10 09:18:15'),
(818, 'Benzidin', 1000.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-10 09:19:44', '2024-08-10 09:19:44'),
(819, 'Bentonit Magma', 1000.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-10 09:20:30', '2024-08-10 09:20:30'),
(820, 'Bismuth Subnitrat', 1000.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-10 09:22:24', '2024-08-10 09:22:24'),
(821, 'Carmin', 2000.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-10 09:23:57', '2024-08-10 09:23:57'),
(822, 'Calcii Lactat', 1200.00, 'Rak Besi', 'Padat', '2024-08-10 09:25:07', '2024-08-10 09:25:07'),
(823, 'Ceto Stearyl', 1000.00, 'Rak Besi', 'Padat', '2024-08-10 09:25:58', '2024-08-10 09:25:58'),
(824, 'Ferri Nitrat', 500.00, 'Rak Besi + Rak Besi Stok', 'Padat', '2024-08-10 09:26:46', '2024-08-10 09:26:46'),
(825, 'Efedrin HCL', 1000.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-10 10:06:40', '2024-08-10 10:06:40'),
(826, 'Mangan Sufat (MnSO4)', 500.00, 'Rak Besi + Rak Besi Stok', 'Padat', '2024-08-10 10:07:58', '2024-08-10 10:07:58'),
(827, 'Iron (II) Chloride Tetrahydrate', 500.00, 'Rak Besi', 'Padat', '2024-08-10 10:08:50', '2024-08-10 10:08:50'),
(828, 'Mangan Sulfat', 250.00, 'Rak Besi + Rak Besi Stok', 'Padat', '2024-08-10 10:09:38', '2024-08-10 10:09:38'),
(829, 'Magnesium Klorida (MgCl2)', 1000.00, 'Rak Besi + Rak Besi Stok', 'Padat', '2024-08-10 10:14:53', '2024-08-10 10:14:53'),
(830, 'PEG 6000', 40000.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-10 10:28:17', '2024-08-10 10:28:17'),
(831, 'Sodium Thiosulfat (Na2S2O3)', 2000.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-10 10:29:21', '2024-08-10 10:29:21'),
(832, 'Indocol (Pewarna Orange)', 500.00, 'Rak Besi', 'Padat', '2024-08-10 10:32:56', '2024-08-10 10:32:56'),
(833, 'Propil Paraben', 1500.00, 'Rak Besi + Rak Besi Stok', 'Padat', '2024-08-10 10:43:34', '2024-08-10 10:43:34'),
(834, 'Sodium Benzoat', 1000.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-10 10:52:16', '2024-08-10 10:52:16'),
(835, 'Sodium Sulfate', 1500.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-10 10:53:22', '2024-08-10 10:53:22'),
(836, 'Potassium Chromate', 1000.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-10 10:54:03', '2024-08-10 10:54:03'),
(837, 'Sodium Oxalate', 500.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-10 10:55:25', '2024-08-10 10:55:25'),
(838, 'Potassium Thiocyanate', 250.00, 'Rak Besi', 'Padat', '2024-08-10 12:53:51', '2024-08-10 12:53:51'),
(839, 'Ammonium Molybdate', 200.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-10 13:49:47', '2024-08-10 13:49:47'),
(840, 'di-Sodium Hydrogen Phospate', 500.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-10 13:50:39', '2024-08-10 13:50:39'),
(841, 'Ammonium Perosulphate', 1000.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-10 13:51:37', '2024-08-10 13:51:37'),
(842, 'Manitol', 1000.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-10 14:17:05', '2024-08-10 14:17:05'),
(843, 'Sodium Sulfide', 2000.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-10 14:18:06', '2024-08-10 14:18:06'),
(844, 'Natrium Molybdate', 25.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-10 14:18:47', '2024-08-10 14:18:47'),
(845, 'Aniline Sulfate', 25.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-10 14:20:21', '2024-08-10 14:21:13'),
(846, 'Asam Oksalat', 1500.00, 'Rak Besi Stok', 'Cair', '2024-08-10 14:23:30', '2024-08-10 14:23:30'),
(847, 'Larutan Penyangga B', 1000.00, 'Rak Besi', 'Cair', '2024-08-10 14:24:34', '2024-08-10 14:24:34'),
(848, 'Solution Ammoniae Spiritus', 1000.00, 'Rak Besi', 'Cair', '2024-08-10 14:25:10', '2024-08-10 14:25:10'),
(849, 'Etilen Glikol', 500.00, 'Rak Besi', 'Cair', '2024-08-10 14:25:44', '2024-08-10 14:25:44'),
(850, 'Aqua Rosae', 3000.00, 'Rak Besi Stok', 'Cair', '2024-08-10 14:26:16', '2024-08-10 14:26:16'),
(851, 'Karbopol', 1000.00, 'Rak Besi', 'Cair', '2024-08-10 14:27:41', '2024-08-10 14:27:41'),
(852, 'PEG 600', 2000.00, 'Rak Besi', 'Cair', '2024-08-10 14:28:23', '2024-08-10 14:28:23'),
(853, 'PCO', 1000.00, 'Rak Besi', 'Cair', '2024-08-10 14:28:44', '2024-08-10 14:28:44'),
(854, 'Oleum citrus', 1000.00, 'Rak Besi', 'Cair', '2024-08-10 14:33:20', '2024-08-10 14:33:20'),
(855, 'Iron (II) Sulfate', 500.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-10 14:34:07', '2024-08-10 14:34:07'),
(856, 'C8H8N6O6', 100.00, 'Lemari Kayu Berpintu', 'Padat', '2024-08-10 14:34:18', '2024-08-10 14:34:18'),
(857, 'Solution Hydratis Calcii', 2000.00, 'Rak Besi', 'Cair', '2024-08-10 14:34:20', '2024-08-10 14:34:20'),
(858, 'Isopropyl Alkohol', 2000.00, 'Rak Besi', 'Cair', '2024-08-10 14:35:20', '2024-08-10 14:35:20'),
(859, 'Potato Dextrose Agar (PDA)', 500.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-10 14:35:26', '2024-08-10 14:35:26'),
(860, 'Buffer Phospat pH 8,2', 1000.00, 'Lemari Kayu Berpintu', 'Cair', '2024-08-10 14:36:43', '2024-08-10 14:36:43'),
(861, 'Metyhlen Blue', 1000.00, 'Rak Besi Stok', 'Cair', '2024-08-10 14:36:54', '2024-08-10 14:36:54'),
(862, 'NaCl 0,9% (Infus)', 6000.00, 'Rak Besi', 'Cair', '2024-08-10 14:37:53', '2024-08-10 14:37:53'),
(863, 'Reagen Hayem', 100.00, 'Rak Besi Stok', 'Cair', '2024-08-10 14:38:22', '2024-08-10 14:38:22'),
(864, 'Parafin Liquid', 5000.00, 'Rak Besi + Rak Besi Stok', 'Cair', '2024-08-10 14:39:00', '2024-08-10 14:39:00'),
(865, 'Pereaksi Biuret', 100.00, 'Rak Besi', 'Cair', '2024-08-10 14:39:39', '2024-08-10 14:39:39'),
(866, 'NH4OH', 1000.00, 'Rak Besi', 'Cair', '2024-08-10 14:40:02', '2024-08-10 14:40:02'),
(867, 'Etanol P.A', 3000.00, 'Lemari Kayu Berpintu', 'Cair', '2024-08-10 14:40:35', '2024-08-10 14:40:35'),
(868, 'Xylol', 1000.00, 'Lemari Kayu Berpintu', 'Cair', '2024-08-10 14:41:03', '2024-08-10 14:41:03'),
(869, 'NH4OH', 1000.00, 'Rak Besi', 'Cair', '2024-08-10 14:41:14', '2024-08-10 14:41:14'),
(870, 'Cyclopentanone', 250.00, 'Lemari Kayu Berpintu', 'Cair', '2024-08-10 14:41:43', '2024-08-10 14:41:43'),
(871, 'CaOH2', 1000.00, 'Rak Besi', 'Cair', '2024-08-10 14:41:57', '2024-08-10 14:41:57'),
(872, 'Reagen Molisch', 100.00, 'Rak Besi', 'Cair', '2024-08-10 14:42:13', '2024-08-10 14:42:13'),
(873, 'Reagen Pandy', 50.00, 'Rak Besi', 'Cair', '2024-08-10 14:42:42', '2024-08-10 14:42:42'),
(874, 'Reagen Schlesinger', 200.00, '-', 'Cair', '2024-08-10 14:42:48', '2024-08-12 10:07:40'),
(875, 'Reagen Millon', 200.00, 'Rak Besi', 'Cair', '2024-08-10 14:43:55', '2024-08-10 14:43:55'),
(876, 'Aquadest', 50000.00, 'Rak Besi', 'Cair', '2024-08-10 14:45:15', '2024-08-10 15:03:50'),
(877, 'Aluminium Pottasium Sulfate Dodecahydrate', 500.00, 'Rak Besi + Rak Besi Stok', 'Padat', '2024-08-10 14:45:55', '2024-08-10 14:45:55'),
(878, 'Desinfektan', 20000.00, 'Rak Besi', 'Cair', '2024-08-10 14:46:01', '2024-08-10 14:46:01'),
(879, 'Amilum', 300.00, 'Rak Besi + Rak Besi Stok', 'Padat', '2024-08-10 14:46:49', '2024-08-10 14:46:49'),
(880, 'BCB', 100.00, 'Rak Besi', 'Cair', '2024-08-10 14:47:14', '2024-08-10 14:47:14'),
(881, 'Reagen Fauchet', 100.00, 'Rak Besi', 'Cair', '2024-08-10 14:48:00', '2024-08-10 14:48:00'),
(882, 'Pyridin', 30.00, 'Rak Besi', 'Cair', '2024-08-10 14:48:41', '2024-08-10 14:48:41'),
(883, 'Butilhidroksitoluena (B.H.T)', 2000.00, 'Rak Besi + Rak Besi Stok', 'Padat', '2024-08-10 14:48:59', '2024-08-10 14:48:59'),
(884, 'Frohde', 25.00, 'Rak Besi', 'Cair', '2024-08-10 14:49:37', '2024-08-10 14:49:37'),
(885, 'Calcii Lactat', 200.00, 'Rak Besi + Rak Besi Stok', 'Padat', '2024-08-10 14:49:46', '2024-08-10 14:49:46'),
(886, 'Phenol Red', 200.00, 'Rak Besi', 'Cair', '2024-08-10 14:50:25', '2024-08-10 14:50:25'),
(887, 'Ceta Stearyl', 1000.00, 'Rak Besi + Rak Besi Stok', 'Padat', '2024-08-10 14:51:23', '2024-08-10 14:51:23'),
(888, 'Feri Nitrat', 500.00, 'Rak Besi + Rak Besi Stok', 'Padat', '2024-08-10 14:52:01', '2024-08-10 14:52:01'),
(889, 'Iron (II) Chloride Tetrahydrate', 500.00, 'Rak Besi', 'Padat', '2024-08-10 14:52:48', '2024-08-10 14:52:48'),
(890, 'Mangan Sulfat', 250.00, 'Rak Besi + Rak Besi Stok', 'Padat', '2024-08-10 14:54:00', '2024-08-10 14:54:00'),
(891, 'Na2S2O3 (Sodium Thiosulfat)', 1000.00, 'Rak Besi + Rak Besi Stok', 'Padat', '2024-08-10 14:55:32', '2024-08-10 14:55:32'),
(892, 'EBT', 25.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-10 14:56:00', '2024-08-10 14:56:00'),
(893, 'Propil Paraben', 1500.00, 'Rak Besi + Rak Besi Stok', 'Padat', '2024-08-10 14:56:51', '2024-08-10 14:56:51'),
(894, '2-Propanolol', 500.00, 'Rak Besi + Rak Besi Stok', 'Cair', '2024-08-10 14:56:56', '2024-08-10 14:56:56'),
(895, 'Formic Acid', 1000.00, 'Rak Besi + Rak Besi Stok', 'Cair', '2024-08-10 14:58:04', '2024-08-10 14:58:04'),
(896, 'Sodium Sulfat', 500.00, 'Rak Besi + Rak Besi Stok', 'Padat', '2024-08-10 14:58:48', '2024-08-10 14:58:48'),
(897, '1.10-Phenanthroline Monohydrate', 0.00, 'Rak Stok (Kayu Putih)', 'Cair', '2024-08-10 14:58:56', '2024-08-10 14:58:56'),
(898, 'Logam Zn', 100.00, 'Rak Besi + Rak Besi Stok', 'Padat', '2024-08-10 14:59:30', '2024-08-10 14:59:30'),
(899, 'Media EC Broth', 500.00, 'Rak Besi', 'Padat', '2024-08-10 15:00:12', '2024-08-10 15:00:12'),
(900, 'Reagen Bang', 100.00, 'Rak Besi + Rak Besi Stok', 'Cair', '2024-08-10 15:00:44', '2024-08-10 15:00:44'),
(901, 'Trichloroacetic', 100.00, 'Lemari Kayu Berpintu', 'Padat', '2024-08-10 15:01:08', '2024-08-10 15:01:08'),
(902, 'Phenol', 250.00, 'Lemari Kayu Berpintu', 'Padat', '2024-08-10 15:03:16', '2024-08-10 15:03:16'),
(903, 'PDA Agar', 500.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-12 08:05:34', '2024-08-12 08:05:34'),
(904, 'EMB Agar', 1000.00, '-', 'Padat', '2024-08-12 08:05:58', '2024-08-12 08:13:37'),
(905, 'Nutrient Agar (NA)', 500.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-12 08:06:50', '2024-08-12 08:06:50'),
(906, 'Nutrient Broth (NB) Agar', 500.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-12 08:07:25', '2024-08-12 08:07:25'),
(907, 'Selenith Agar', 500.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-12 08:07:50', '2024-08-12 08:07:50'),
(908, 'Simmon\'s Citrat Agar', 1000.00, '-', 'Padat', '2024-08-12 08:08:22', '2024-08-12 08:09:18'),
(909, 'MHA', 500.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-12 08:10:08', '2024-08-12 08:10:08'),
(910, 'Brillian Green Agar', 500.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-12 08:12:45', '2024-08-12 08:12:45'),
(911, 'VP-MR Medium', 500.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-12 08:13:12', '2024-08-12 08:13:12'),
(912, 'Lactose Broth Agar', 500.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-12 08:15:12', '2024-08-12 08:15:12'),
(913, 'Tryptone Soya Broth', 500.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-12 08:15:49', '2024-08-12 08:15:49'),
(914, 'Peptone Water Agar', 500.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-12 08:16:17', '2024-08-12 08:16:17'),
(915, 'SIM Agar', 500.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-12 08:16:37', '2024-08-12 08:16:37'),
(916, 'Mac Conkey Agar', 500.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-12 08:17:03', '2024-08-12 08:17:03'),
(917, 'TSIA Agar', 500.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-12 08:17:32', '2024-08-12 08:17:32'),
(918, 'TCBS Agar', 500.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-12 08:17:55', '2024-08-12 08:17:55'),
(919, 'Sabaroad Dextrose Agar (SDA)', 500.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-12 08:18:27', '2024-08-12 08:18:27');
INSERT INTO `bahans` (`id`, `nama`, `stok`, `lokasi`, `jenis`, `created_at`, `updated_at`) VALUES
(920, 'Mannitol Salt Agar (MSA)', 500.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-12 08:19:23', '2024-08-12 08:19:23'),
(921, 'Endo Agar', 500.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-12 08:19:43', '2024-08-12 08:19:43'),
(922, 'Safranin', 100.00, 'Rak Besi Stok', 'Cair', '2024-08-12 08:20:30', '2024-08-12 08:20:30'),
(923, 'Eosin', 100.00, 'Rak Besi Stok', 'Cair', '2024-08-12 08:20:53', '2024-08-12 08:20:53'),
(924, 'Asam Piruvat', 25.00, 'Rak Besi Stok', 'Cair', '2024-08-12 08:21:24', '2024-08-12 08:21:24'),
(925, 'Erlich Reagen', 50.00, 'Rak Besi Stok', 'Cair', '2024-08-12 08:22:02', '2024-08-12 08:22:02'),
(926, 'Larutan Giemsa', 200.00, 'Rak Besi Stok', 'Cair', '2024-08-12 08:22:50', '2024-08-12 08:22:50'),
(927, 'Ammonium Oksalat', 200.00, 'Rak Besi Stok', 'Cair', '2024-08-12 08:23:28', '2024-08-12 08:23:28'),
(928, 'Reagen Barfoed', 100.00, 'Rak Besi Stok', 'Cair', '2024-08-12 08:24:01', '2024-08-12 08:24:01'),
(929, 'Reagen Millon', 300.00, 'Rak Besi Stok', 'Cair', '2024-08-12 08:24:30', '2024-08-12 08:24:30'),
(930, 'Reagen Wagner', 100.00, 'Rak Besi Stok', 'Cair', '2024-08-12 08:24:56', '2024-08-12 08:24:56'),
(931, 'Reagen Biuret', 100.00, 'Rak Besi Stok', 'Cair', '2024-08-12 08:25:21', '2024-08-12 08:25:21'),
(932, 'Ammonium Iron', 50.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-12 08:26:02', '2024-08-12 08:26:02'),
(933, 'Eriochrone', 4.00, 'Rak Stok (Kayu Putih)', 'Padat', '2024-08-12 08:26:41', '2024-08-12 08:26:41'),
(934, 'Pereaksi Marquis', 100.00, 'Rak Besi Stok', 'Cair', '2024-08-12 08:27:16', '2024-08-12 08:27:16'),
(935, 'Acetaldehyde Solution', 500.00, 'Rak Besi + Rak Besi Stok', 'Cair', '2024-08-12 10:02:14', '2024-08-12 10:02:14'),
(936, 'Aceton', 1000.00, 'Rak Besi + Rak Besi Stok', 'Cair', '2024-08-12 10:04:15', '2024-08-12 10:04:15'),
(937, 'Alumunium Chloride', 500.00, 'Rak Besi', 'Padat', '2024-08-12 10:25:08', '2024-08-12 10:25:08'),
(938, 'Hidroclorida Acid Fuming 37%', 2500.00, 'Rak Besi', 'Cair', '2024-08-12 10:45:41', '2024-08-12 10:45:41'),
(939, 'MHA', 500.00, 'Rak Besi', 'Padat', '2024-08-12 10:46:05', '2024-08-12 10:46:05'),
(940, 'Nutrient Broth (NB) EXP 2026', 500.00, 'Rak Besi', 'Padat', '2024-08-12 10:47:03', '2024-08-12 10:47:03'),
(941, 'PDA Agar EXP 2026', 500.00, 'Rak Besi', 'Padat', '2024-08-12 10:47:48', '2024-08-12 10:47:48'),
(942, 'LPCB', 500.00, 'Rak Besi', 'Cair', '2024-08-12 10:48:15', '2024-08-12 10:48:15'),
(943, 'Ferric Nitrate Nanohydrate EXP 2027', 500.00, 'Rak Besi', 'Padat', '2024-08-12 10:49:03', '2024-08-12 10:49:03'),
(944, 'N-(1-Naphthyl) ethylenediamine dihydro-chloride', 25.00, 'Rak Besi', 'Padat', '2024-08-12 10:50:18', '2024-08-12 10:50:18'),
(945, 'FeCl3', 5.00, 'Lemari Kayu Berpintu', 'Padat', '2024-08-12 10:51:05', '2024-08-12 10:51:05'),
(946, 'Indikator Ferroin', 100.00, 'Rak Besi', 'Cair', '2024-08-12 10:51:41', '2024-08-12 10:51:41'),
(947, 'Buffer PBS pH 7,4 EXP 2024', 50.00, 'Rak Besi', 'Cair', '2024-08-12 10:52:27', '2024-08-12 10:52:27'),
(948, 'Larutan PBS', 200.00, 'Rak Besi Stok', 'Cair', '2024-08-12 10:53:07', '2024-08-12 10:53:07'),
(949, 'Buffer Ammonium pH 7', 10.00, 'Lemari Kayu Berpintu', 'Cair', '2024-08-12 10:53:45', '2024-08-12 10:53:45'),
(950, 'Reagen Barfoed', 80.00, 'Lemari Kayu Berpintu', 'Cair', '2024-08-12 10:56:10', '2024-08-12 10:56:10'),
(951, 'Natrium Dithionite/Sodium Dithionite', 50.00, 'Lemari Kayu Berpintu', 'Padat', '2024-08-12 10:57:09', '2024-08-12 10:57:09'),
(952, 'Methyl Red/Metil Merah EXP 2025', 100.00, 'Rak Besi', 'Cair', '2024-08-12 10:58:01', '2024-08-12 10:58:01'),
(953, 'Larutan Eosin', 200.00, 'Rak Besi', 'Cair', '2024-08-12 10:58:37', '2024-08-12 10:58:37'),
(954, 'Reagen Toluene', 200.00, 'Rak Besi', 'Cair', '2024-08-12 10:59:06', '2024-08-12 10:59:06');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kerusakans`
--

CREATE TABLE `kerusakans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `kerusakans`
--

INSERT INTO `kerusakans` (`id`, `nama`, `lokasi`, `kondisi`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nama Bahan', 'Lokasi', 'Kondisi', 'Status', '2024-04-23 08:58:45', '2024-04-23 08:58:45'),
(2, 'Oven', 'Bahan Alam', 'Putaran suhu tidak mau', 'belum  selesai', '2024-04-23 08:58:45', '2024-04-23 08:58:45'),
(3, 'Lampu Spektro T60 D2', 'Kimia Farmasi', 'mati', 'Proses pengajuan harga', '2024-04-23 08:58:45', '2024-04-23 08:58:45'),
(4, 'Lampu Spektro wavelength', 'Kimia Farmasi', 'masa pakai sudah mau habis', 'sudah terpasang', '2024-04-23 08:58:45', '2024-04-23 08:58:45'),
(5, 'Sentrifugasi', 'Kimia Farmasi', 'tidak mau berputar', 'belum  selesai', '2024-04-23 08:58:45', '2024-04-23 08:58:45'),
(6, 'Sentrifugasi', 'Kimia Farmasi', 'tidak mau berputar', 'belum  selesai', '2024-04-23 08:58:45', '2024-04-23 08:58:45'),
(7, 'Pencetak tablet', 'Teknologi Sediaan Farmasi', 'rusak pencetak', 'rusak total, perencanaan beli baru', '2024-04-23 08:58:45', '2024-04-23 08:58:45'),
(8, 'Mikroskop binokuler', 'Bahan Alam, Mikrobiologi', 'rusak pencetak', 'selesai diperbaiki', '2024-04-23 08:58:45', '2024-04-23 08:58:45'),
(9, 'Hotplate, magnetik', 'Kimia Analis', 'Tidak mau panas', 'belum  selesai', '2024-04-23 08:58:45', '2024-04-23 08:58:45'),
(10, 'Timbangam Fujistu', 'Kimia Analis', 'skala angka tidak stabil', 'sudah selesai', '2024-04-23 08:58:45', '2024-04-23 08:58:45'),
(11, 'Timbangan ohaus', 'Bahan Alam', 'Tidak mau nyala', 'belum  selesai', '2024-04-23 08:58:45', '2024-04-23 08:58:45'),
(12, 'Timbangan ohaus', 'Farmakologi', 'mati', 'sudah selesai', '2024-04-23 08:58:45', '2024-04-23 08:58:45'),
(13, 'Alat press minuman', 'Batra', 'rusak ', 'beli baru', '2024-04-23 08:58:45', '2024-04-23 08:58:45'),
(14, 'Lampu UV 366', 'Bahan Alam', 'mati', 'sudah selesai', '2024-04-23 08:58:45', '2024-04-23 08:58:45'),
(15, 'kompor listrik', 'Kimia', 'Tidak mau panas', 'rusak total, dan sudah beli baru', '2024-04-23 08:58:45', '2024-04-23 08:58:45'),
(16, 'haeting mantle', 'Bahan Alam', 'tidak mau panas', 'belum  selesai', '2024-04-23 08:58:45', '2024-04-23 08:58:45'),
(17, 'timbangan ohaus', 'Kimia', 'tulisan zero tidak mau', 'belum  selesai', '2024-04-23 08:58:45', '2024-04-23 08:58:45'),
(18, 'timbangan ohaus ', 'Bahan Alam', 'mati', 'belum  selesai', '2024-04-23 08:58:45', '2024-04-23 08:58:45'),
(19, 'Hotplate, magnetik', 'Kimia Farmasi', 'Tidak mau panas', 'belum  selesai', '2024-04-23 08:58:45', '2024-04-23 08:58:45'),
(20, 'magnetic stirer', 'Kimia', 'Tidak mau bergerak', 'belum  selesai', '2024-04-23 08:58:45', '2024-04-23 08:58:45'),
(21, 'Disolusi 1 tabung', 'Teknologi Sediaan Farmasi', 'Konsleting listrik/mati', 'belum  selesai', '2024-04-23 08:58:45', '2024-04-23 08:58:45'),
(22, 'ultraturax', 'Teknologi Sediaan Farmasi', 'Konsleting listrik/mati', 'belum  selesai', '2024-04-23 08:58:45', '2024-04-23 08:58:45'),
(23, 'ph meter', 'Teknologi Sediaan Farmasi', 'Konsleting listrik/mati', 'belum  selesai', '2024-04-23 08:58:45', '2024-04-23 08:58:45'),
(24, 'timbangan fujitsu', 'Teknologi Sediaan Farmasi', 'Konsleting listrik/mati', 'belum  selesai', '2024-04-23 08:58:45', '2024-04-23 08:58:45'),
(25, 'Timbangan sojikyo', 'Teknologi Sediaan Farmasi', 'Konsleting listrik/mati', 'belum  selesai', '2024-04-23 08:58:45', '2024-04-23 08:58:45');

-- --------------------------------------------------------

--
-- Table structure for table `lokasis`
--

CREATE TABLE `lokasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `nim` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `mahasiswas`
--

INSERT INTO `mahasiswas` (`nim`, `nama`, `prodi`, `created_at`, `updated_at`) VALUES
('∞', 'ADMIN', 'UNIVERSAL', NULL, NULL),
('4820101220001', 'GINA NAJDAH', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220002', 'SAPNA IKRIMA', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220003', 'SITI AMALIA FITRIATI', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220004', 'ROSNIDA', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220005', 'MOCH TAUFIK ADRIAN', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220006', 'NADILA AURELIA PUTRI', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220007', 'MUHAMMMAD RAFIQ', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220008', 'ATHIYAH PUTRI SALSABILLA', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220009', 'AUDEA OKTA MAHRISA', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220010', 'M. SYIFA', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220011', 'TUT ADE AYU ARI NATA', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220012', 'NOOR LIYANA', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220013', 'MELISA LOSITA', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220014', 'KHOLIFIA ANWAR', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220015', 'MUHAMMAD ABBAS MASAD', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220016', 'RIZQIA DEVI MARLITA', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220017', 'SALSABILA MAISYAH', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220018', 'MUHAMMAD ARRAZZAQ FAKHRIANTO', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220019', 'MUHAMMAD WILDAN', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220021', 'HELMA', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220022', 'PUTRI', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220023', 'AORORA VANIA XILENA FIRDHAUSI', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220024', 'IMAM RAFSANJANI', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220025', 'SITI NUR AISYAH', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220026', 'MUHAMMAD RHOTYBUL HADDAD', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220027', 'HERDITA ANGGRAINI', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220028', 'SITI NOOR ZAHRAH', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220029', 'SESILIA ANANDA PUTRI', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220030', 'M.ALIEF AL-FATIH', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220031', 'RIZKA FHATIA RAMADINA', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220032', 'DIMAS AYU TRI PUJI LESTARI', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220033', 'SHILFA NADIRA NUR MULIA', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220034', 'MUHAMMAD ADAM PRAWIRA', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220035', 'NUR NAZLA SYAIMA SABELLA', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220036', 'NAHLA FADILA', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220037', 'NUR SYAFA\'AH PUTERI FAHMI', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220038', 'MUHAMMAD MIFTAH FARID', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220039', 'AGUNG PRATAMA PUTRA', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220040', 'PUTRI ADELLIA', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220041', 'PYNKAN ALIFIA ARDYANTI', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220042', 'ZAUHAR LATIFAH', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220043', 'NADIRA AWALIA RAMADHAN', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220044', 'NISA ANGGRIANI MARDANI', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220045', 'SAUFA HALIZA', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220046', 'NADIA SALSABILA', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220047', 'QONITA', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220048', 'ALFI BARIROH', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220049', 'RUSIANA', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220050', 'LAURA FRANSISKA', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220051', 'WINDA AULIA KHUMAYROH', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220052', 'VIA AGUSTINA', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220053', 'HAIRIAH YULIANNOR', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220054', 'NUR HAKIKI', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220055', 'AZ ZAHRA RAHMI ALMUNIDA', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220056', 'SITI SHALIHAH', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220057', 'LIDYA OCTAVIA', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220058', 'BERKAH JULIATI', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220059', 'AMELIA NUR HASANAH', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220060', 'INEKE PUSPITA AMALIA', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220061', 'MUHAMMAD IHSANUL AMIEN', 'S1 FARMASI', '2024-03-29 21:17:27', '2024-03-29 21:17:27'),
('4820101220062', 'ZULFA NABELA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220063', 'HILYATUNNAJAH', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220064', 'NUR SITI KHOTIMAH', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220065', 'NAJLA AUDINA MARTA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220066', 'DHEA FEBRIANA FORTUNELA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220067', 'SITI HAJAR', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220068', 'ALYA HURIYAH', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220069', 'RIZKA NURHALIDZA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220070', 'SHANDY PUTERA ASELA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220071', 'MELLYANTI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220072', 'NABILA GADISTIA RAHMANI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220073', 'MUTIARA KHAIRANI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220074', 'SUCI NUR KUMALASARI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220075', 'TINA FITRIA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220076', 'MUHAMMAD KHAIRIL RIZAL', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220077', 'VIA AULIYANA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220078', 'ASMIATI ADILLA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220079', 'NOR DEWI PUSPA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220080', 'ANDINI ODRINANDA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220081', 'MUHAMMAD SYIBAWAIHI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220082', 'VERA HAIRUNISSA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220083', 'MUHAMMAD NOOR RAJABI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220084', 'ABDUSSAMAD SIRAJUL HUDA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220085', 'RIFQA SAHIRA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220086', 'ANNISA FITRI APRILIYANTI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220087', 'SHALEHAH HASANAH', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220088', 'SRI ELSA RAHAYU', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220089', 'MAULIDA FARISKA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220090', 'SALSABILLA INDAH APRILIANI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220091', 'MUHAMMAD MAGHZUR', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220092', 'MUHAMMAD FATHUR HAMID', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220093', 'NURMILA SHOLAWATI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220094', 'SEPTIA NINGSIH', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220095', 'NAZLA RAMADHANA LUTFIA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220096', 'MUHAMMAD NURHASAN', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220097', 'SAHRUL', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220098', 'NOOR SYFA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220099', 'SITI SALAMAH', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220100', 'FRANSISKA ANGELI MAGANGSAU', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220101', 'DINI RIYANTI AMALIA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220102', 'YOGA DANNY PRATAMA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220103', 'MUHAMMAD ANWAR SIDIQ', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220104', 'DIDIN WAHYUDI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220105', 'ALIF DAMAR ADIPA AKSARA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220106', 'MUHAMMAD FAJAR ALAMSYAH', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220107', 'NADIA FITRI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220108', 'NOR AFNAN RAHMADI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220109', 'ISMI A\'YUNIN QURROTA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220110', 'SITI FAIZA ANNISA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220111', 'ALDA KHAIRINA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220112', 'NAZWA ERDINIA NADELLA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220113', 'SAPA DINARA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220114', 'FADIA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220115', 'ABDUL HAFIZ', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220116', 'IIN AINATUL MUNAWARAH', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220117', 'AZIZAH ASALIA FAUZIN', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220118', 'MUHAMMAD HAFIDZ ASYARI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220119', 'MUHAMMAD AGUS RIYADI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220120', 'FARAH NOR AZIMA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220121', 'GUSTI RIDUAN ADITIYA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220122', 'SYED MUHAMMAD RAYAN MAHMODI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220123', 'ELMA FARINA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220124', 'AMIRA WULANDARI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220125', 'ADITYA PUTRAWAN', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220126', 'AISYAH NYDHEA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220127', 'ALYA RASHADA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220128', 'MAULIDAH', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220129', 'SINTIA SYAADAH', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220130', 'NAZWA INDREANI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220131', 'MUHAMMAD TAUFIQURRAHMAN', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220132', 'DADE RICA ANJALIKA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220133', 'LILI SYAFARINA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220134', 'NURHASYA SHABILLA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220135', 'MUHAMMAD LUTHFI AL KHAIRI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220136', 'RIZKY RAHENDRA RAMADHAN', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220137', 'NAJWAL FITRI AWALIYAH', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220138', 'YULITA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220139', 'EFRAIMEOVA AGATHA LAWIN', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220140', 'SYALAISHA ELIDA NURSAMSU', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220141', 'RONA DAMAYANTI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220142', 'NOVIANTY AMELIA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220143', 'ZIA NABELLA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220144', 'ALPIN PARIZQI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220145', 'EMMA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220146', 'ELISABET PASIONISTA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220147', 'SERLY DEA APRILIANI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220148', 'ROSITA RIZKY OKTAVIANI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220149', 'NADIATUL JANAH', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220150', 'FIRDA AZKIYA HAFIZI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220151', 'NORIL ARIFAH', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220152', 'HILMA AZIZA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220153', 'RISKA AULIYA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220154', 'NI\'MATUL AUFA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220155', 'MELDA SELVIA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220156', 'ANGGI DESINTA JOSE DA GAMA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220157', 'NASYWA ALIFA ADINDA PUTRISYAH', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220158', 'MIRSA NABIHA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220159', 'LUSY FARIANI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220160', 'MAISYARAH QURRATA A’YUN', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220161', 'ANGGI MAULANI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220162', 'RINA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220163', 'SITI MAULIDA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220164', 'FADIYA IZATI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220165', 'MUHAMMAD SAYYID NAUFAL AZHAR', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220166', 'NURVIKA INDRIA MAHARANI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220167', 'RINI ASTIATI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220168', 'MUHAMMAD FARID', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220169', 'ANNISA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220170', 'AMALIA GERANTI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220171', 'RISMA KARTIKA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220172', 'FAHMITHAWATI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220173', 'MELLIYANA RISTANTI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220174', 'AULIA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220175', 'DEWI PUTRI MUZDALIFAH', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220176', 'REYNA NURSHOFHA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220178', 'LILIS SURYATI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220179', 'RIZKY SALSABILA WIDODO PUTRI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220180', 'UMMI HABIBAH', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220181', 'SAFRILLA AL AUFA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220182', 'MUHAMMAD BASIR', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220183', 'RAHMANILLAH ANANDA MAHARANI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220184', 'MUHAMMAD NABIL MUMTAZI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220185', 'TIA RAHMADINA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220186', 'FATIMAH AZ’ZAHRA AS’SYIFA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220187', 'ALDINAR NOOR AFIFAH', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220188', 'NOVIA DINDA SAFITRI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220189', 'RUSKIA RAMADANI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220190', 'MUHAMMAD LUTHFI GIFARI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220191', 'NADYA AZAZZKY', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220192', 'FIRDA FAHMIA WULANDARI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220193', 'IHSANA NURISALMA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220194', 'GHAITSA ZAHIRA SHOFA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220195', 'REGINA DEVI VANANDA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220196', 'FATWALIA AZMI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220197', 'SHOFIA NADILA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220198', 'ELANG PUTRA NIRWANA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220199', 'AMANDA HANIFA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220200', 'FIDYA MUKARRAMATUL AGNINA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220201', 'WIFA SUROYA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220202', 'RUDYONO', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220203', 'RAUDATUL HUSNA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220204', 'NURUL MUNA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220205', 'RONA AGUSTINAWATI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820101220206', 'NAZHIFA NOOR SALMINA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220001', 'ADE HERLENA RAHMAN', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220002', 'ADITIA SAPUTRA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220003', 'AMALLUDDIN SIAGIAN', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220004', 'ANNISA RASYIDAH', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220005', 'ANNISA YUNITA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220006', 'ARDHEA REGITA CAHYANI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220007', 'AYU NURMALIA PUTRI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220008', 'AZIZA ALYANTI ANWAR', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220009', 'DESY HAVIANA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220010', 'DEWI KARMILA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220011', 'ELVITA NURWAHDINI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220012', 'ERMA RAYHANA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220013', 'EVI RASUANTI APRILLIA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220014', 'FEBRI KURNIADI RAHMAN', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220015', 'FIFI NORHIKMAH', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220016', 'FITRIA RESTINA FEBIOLA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220017', 'GITA AGUSTINA RADIA PRATIWI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220018', 'GRISELLA RAPANI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220019', 'HAJJAH AHLAM', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220020', 'HALIMATUSSA\'DIYAH', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220021', 'INDAH RAUDATUL JANNAH', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220022', 'KARINA APRILIYANTI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220023', 'KHAIRATUN NANA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220024', 'LIS APRIATI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220025', 'LUSIA VALENSKY', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220026', 'MAHRITA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220027', 'MARIATUL FITRIA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220028', 'MAULINA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220029', 'MAYA PUJI AHMAWATI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220030', 'MELISA OKTAVIANI ANJELY', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220031', 'MELLIANI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220032', 'MILA MAYDINA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220033', 'MUHAMMAD FAHRI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220034', 'MUHAMMAD RIZAL AMAMI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220035', 'MUHAMMAD TAUFIK RIDANI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220036', 'NIKEN YUFILA PUTRI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220037', 'NINA ANJELINAE', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220038', 'NIRWANA RAHMAINIE', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220039', 'NISRINA KAMILIA SARI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220040', 'NOOR HAFIPAH', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220041', 'NOVIAWATI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220042', 'NUGRAH LAILATUL MAKMURAH', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220043', 'NUKE WIDIANINGRUM', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220044', 'NUR WIDIA REZEKI AMALIA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220045', 'NURUL AULIA NASUTION', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220046', 'NURUL IZZATI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220047', 'PITRI KURNIA SAPUTRI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220048', 'PRILA RAHMATIKA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220049', 'PUTRI AFRINA HAYATIE', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220050', 'RAHMAWATI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220051', 'RAMADHANI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220052', 'RASTINA LESTARI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220053', 'RAUDATUL FITRI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220054', 'RIKA AMELIA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220055', 'RINY DWI DESEMI LIDIM', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220056', 'RISDA MARLIYANTINA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220057', 'RIZKY NOVITA RAMADHANI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220058', 'RISMA YOHALIZA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220059', 'RUMINA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220060', 'SHAFAA DHIYA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220061', 'SISKA TRI CAHYATI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220062', 'SITI NAFISAH', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220063', 'STHEFANY SUMANDANA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220064', 'SYARIFAH RIZKA AMALIA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220065', 'TRY HERDINA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220066', 'TRY RACHMADAN SARI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220067', 'VERONIKA NURAZIZAH TUMUACA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220068', 'VIVI WULANDARI OKTAPIANI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220069', 'WAFIQA NURNISA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220070', 'WINDY KUMALA STIAJI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220071', 'WINDY THERESIA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220072', 'YELLY BESTARY', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220073', 'YUSPINA SURIANI SERA', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220074', 'ZURAYIDAH', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28'),
('4820102220075', 'OKTRI WAHYU NYAI', 'S1 FARMASI', '2024-03-29 21:17:28', '2024-03-29 21:17:28');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_29_010750_create_bahans_table', 1),
(7, '2024_01_29_010750_create_bahans_table', 2),
(19, '2024_03_29_192901_create_mahasiswas_table', 3),
(20, '2024_03_31_085800_create_menus_table', 3),
(22, '2024_03_31_123615_create_transaksis_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_bahan` bigint(20) NOT NULL,
  `jumlah_ambil` varchar(255) NOT NULL,
  `jumlah_kembali` varchar(255) NOT NULL,
  `id_mahasiswa` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `id_bahan`, `jumlah_ambil`, `jumlah_kembali`, `id_mahasiswa`, `tanggal`, `keperluan`, `created_at`, `updated_at`) VALUES
(1, 4, '1', '1000', '∞', '2024-08-07 13:34:15', 'Inventaris', '2024-04-22 14:55:40', '2024-08-07 13:34:23'),
(2, 334, '3', '0', '∞', '2024-04-22 17:15:32', 'Inventaris', '2024-04-22 17:16:45', '2024-04-22 17:16:45'),
(3, 335, '3', '0', '∞', '2024-04-22 17:16:45', 'Inventaris', '2024-04-22 17:17:57', '2024-04-22 17:17:57'),
(4, 1, '50', '50', '∞', '2024-04-22 18:01:39', 'Inventaris', '2024-04-22 18:01:38', '2024-04-22 18:02:02'),
(5, 102, '500', '0', '∞', '2024-08-07 11:15:55', 'Inventaris', '2024-08-07 11:27:14', '2024-08-07 11:27:14'),
(6, 104, '60', '0', '∞', '2024-08-07 11:27:14', 'Inventaris', '2024-08-07 11:28:58', '2024-08-07 11:28:58'),
(7, 108, '5500', '0', '∞', '2024-08-07 11:28:58', 'Inventaris', '2024-08-07 11:29:31', '2024-08-07 11:29:31'),
(8, 109, '1200', '0', '∞', '2024-08-07 11:29:31', 'Inventaris', '2024-08-07 11:29:58', '2024-08-07 11:29:58'),
(9, 110, '100', '0', '∞', '2024-08-07 11:29:58', 'Inventaris', '2024-08-07 11:30:19', '2024-08-07 11:30:19'),
(10, 111, '100', '0', '∞', '2024-08-07 11:30:19', 'Inventaris', '2024-08-07 11:30:48', '2024-08-07 11:30:48'),
(11, 112, '1200', '0', '∞', '2024-08-07 11:30:48', 'Inventaris', '2024-08-07 11:31:19', '2024-08-07 11:31:19'),
(12, 113, '4600', '0', '∞', '2024-08-07 11:31:19', 'Inventaris', '2024-08-07 11:31:53', '2024-08-07 11:31:53'),
(13, 114, '100', '0', '∞', '2024-08-07 11:31:53', 'Inventaris', '2024-08-07 11:32:14', '2024-08-07 11:32:14'),
(14, 116, '50', '0', '∞', '2024-08-07 11:32:15', 'Inventaris', '2024-08-07 11:32:46', '2024-08-07 11:32:46'),
(15, 117, '1400', '0', '∞', '2024-08-07 11:32:46', 'Inventaris', '2024-08-07 11:33:19', '2024-08-07 11:33:19'),
(16, 119, '80', '0', '∞', '2024-08-07 11:33:19', 'Inventaris', '2024-08-07 11:34:00', '2024-08-07 11:34:00'),
(17, 122, '1300', '0', '∞', '2024-08-07 11:34:00', 'Inventaris', '2024-08-07 11:34:33', '2024-08-07 11:34:33'),
(18, 124, '5550', '0', '∞', '2024-08-07 11:34:33', 'Inventaris', '2024-08-07 11:35:05', '2024-08-07 11:35:05'),
(19, 125, '5700', '0', '∞', '2024-08-07 11:35:05', 'Inventaris', '2024-08-07 11:35:36', '2024-08-07 11:35:36'),
(20, 126, '3300', '0', '∞', '2024-08-07 11:35:37', 'Inventaris', '2024-08-07 11:36:02', '2024-08-07 11:36:02'),
(21, 127, '450', '0', '∞', '2024-08-07 11:36:02', 'Inventaris', '2024-08-07 11:36:56', '2024-08-07 11:36:56'),
(22, 128, '1200', '0', '∞', '2024-08-07 11:36:56', 'Inventaris', '2024-08-07 11:37:19', '2024-08-07 11:37:19'),
(23, 131, '200', '0', '∞', '2024-08-07 11:37:19', 'Inventaris', '2024-08-07 11:38:13', '2024-08-07 11:38:13'),
(24, 133, '250', '0', '∞', '2024-08-07 11:38:13', 'Inventaris', '2024-08-07 11:39:06', '2024-08-07 11:39:06'),
(25, 138, '2500', '0', '∞', '2024-08-07 11:39:06', 'Inventaris', '2024-08-07 11:40:03', '2024-08-07 11:40:03'),
(26, 139, '100', '0', '∞', '2024-08-07 11:40:04', 'Inventaris', '2024-08-07 11:40:28', '2024-08-07 11:40:28'),
(27, 142, '3850', '0', '∞', '2024-08-07 11:40:28', 'Inventaris', '2024-08-07 11:41:01', '2024-08-07 11:41:01'),
(28, 143, '5400', '0', '∞', '2024-08-07 11:41:01', 'Inventaris', '2024-08-07 11:41:33', '2024-08-07 11:41:33'),
(29, 144, '3300', '0', '∞', '2024-08-07 11:41:33', 'Inventaris', '2024-08-07 11:41:57', '2024-08-07 11:41:57'),
(30, 153, '500', '0', '∞', '2024-08-07 11:41:57', 'Inventaris', '2024-08-07 11:42:46', '2024-08-07 11:42:46'),
(31, 156, '900', '0', '∞', '2024-08-07 11:42:46', 'Inventaris', '2024-08-07 11:43:13', '2024-08-07 11:43:13'),
(32, 160, '800', '0', '∞', '2024-08-07 11:43:13', 'Inventaris', '2024-08-07 11:43:50', '2024-08-07 11:43:50'),
(33, 162, '500', '0', '∞', '2024-08-07 11:43:50', 'Inventaris', '2024-08-07 11:44:13', '2024-08-07 11:44:13'),
(34, 167, '1500', '0', '∞', '2024-08-07 11:44:13', 'Inventaris', '2024-08-07 11:45:18', '2024-08-07 11:45:18'),
(35, 168, '1250', '0', '∞', '2024-08-07 11:45:18', 'Inventaris', '2024-08-07 11:45:45', '2024-08-07 11:45:45'),
(36, 173, '450', '0', '∞', '2024-08-07 11:45:45', 'Inventaris', '2024-08-07 11:46:22', '2024-08-07 11:46:22'),
(37, 175, '1400', '0', '∞', '2024-08-07 11:46:22', 'Inventaris', '2024-08-07 11:46:59', '2024-08-07 11:46:59'),
(38, 177, '100', '0', '∞', '2024-08-07 11:47:00', 'Inventaris', '2024-08-07 11:47:23', '2024-08-07 11:47:23'),
(39, 179, '1450', '0', '∞', '2024-08-07 11:47:23', 'Inventaris', '2024-08-07 11:47:56', '2024-08-07 11:47:56'),
(40, 181, '700', '0', '∞', '2024-08-07 11:47:57', 'Inventaris', '2024-08-07 11:48:20', '2024-08-07 11:48:20'),
(41, 182, '1200', '0', '∞', '2024-08-07 11:48:20', 'Inventaris', '2024-08-07 11:48:41', '2024-08-07 11:48:41'),
(42, 189, '1500', '0', '∞', '2024-08-07 11:48:41', 'Inventaris', '2024-08-07 11:49:25', '2024-08-07 11:49:25'),
(43, 199, '900', '0', '∞', '2024-08-07 11:49:25', 'Inventaris', '2024-08-07 11:50:16', '2024-08-07 11:50:16'),
(44, 200, '500', '0', '∞', '2024-08-07 11:50:16', 'Inventaris', '2024-08-07 11:50:40', '2024-08-07 11:50:40'),
(45, 203, '1200', '0', '∞', '2024-08-07 11:50:40', 'Inventaris', '2024-08-07 11:51:07', '2024-08-07 11:51:07'),
(46, 205, '200', '0', '∞', '2024-08-07 11:51:08', 'Inventaris', '2024-08-07 11:51:36', '2024-08-07 11:51:36'),
(47, 208, '1700', '0', '∞', '2024-08-07 11:51:36', 'Inventaris', '2024-08-07 11:52:43', '2024-08-07 11:52:43'),
(48, 210, '900', '0', '∞', '2024-08-07 11:52:43', 'Inventaris', '2024-08-07 11:53:18', '2024-08-07 11:53:18'),
(49, 213, '1000', '0', '∞', '2024-08-07 11:53:18', 'Inventaris', '2024-08-07 11:53:56', '2024-08-07 11:53:56'),
(50, 216, '2000', '0', '∞', '2024-08-10 08:14:18', 'Inventaris', '2024-08-07 11:54:48', '2024-08-10 08:14:47'),
(51, 1, '0', '1', '∞', '2024-08-07 13:33:35', 'Inventaris', '2024-08-07 13:33:43', '2024-08-07 13:33:43'),
(52, 4, '1', '1', '∞', '2024-08-07 13:34:15', 'Inventaris', '2024-08-07 13:34:15', '2024-08-07 13:34:23'),
(53, 659, '1', '1', '∞', '2024-08-07 13:35:10', 'Inventaris', '2024-08-07 13:35:10', '2024-08-07 13:35:18'),
(54, 100, '0', '25', '∞', '2024-08-09 18:12:32', 'Inventaris', '2024-08-07 13:47:19', '2024-08-09 18:13:31'),
(55, 103, '0', '700', '∞', '2024-08-08 10:16:23', 'Inventaris', '2024-08-08 10:18:27', '2024-08-08 10:18:27'),
(56, 115, '0', '500', '∞', '2024-08-08 10:18:27', 'Inventaris', '2024-08-08 10:19:16', '2024-08-08 10:19:16'),
(57, 118, '0', '500', '∞', '2024-08-08 10:19:16', 'Inventaris', '2024-08-08 10:19:49', '2024-08-08 10:19:49'),
(58, 101, '0', '500', '∞', '2024-08-09 09:16:56', 'Inventaris', '2024-08-08 10:20:38', '2024-08-09 09:17:33'),
(59, 132, '0', '100', '∞', '2024-08-08 10:20:38', 'Inventaris', '2024-08-08 10:21:08', '2024-08-08 10:21:08'),
(60, 136, '0', '250', '∞', '2024-08-08 10:21:08', 'Inventaris', '2024-08-08 10:21:40', '2024-08-08 10:21:40'),
(61, 145, '0', '200', '∞', '2024-08-08 10:21:40', 'Inventaris', '2024-08-08 10:22:21', '2024-08-08 10:22:21'),
(62, 146, '0', '800', '∞', '2024-08-08 10:22:22', 'Inventaris', '2024-08-08 10:23:07', '2024-08-08 10:23:07'),
(63, 147, '0', '1800', '∞', '2024-08-08 10:23:07', 'Inventaris', '2024-08-08 10:23:47', '2024-08-08 10:23:47'),
(64, 163, '0', '1700', '∞', '2024-08-08 10:23:47', 'Inventaris', '2024-08-08 10:24:31', '2024-08-08 10:24:31'),
(65, 170, '0', '200', '∞', '2024-08-08 10:24:31', 'Inventaris', '2024-08-08 10:25:24', '2024-08-08 10:25:24'),
(66, 174, '0', '200', '∞', '2024-08-08 10:25:24', 'Inventaris', '2024-08-08 10:25:55', '2024-08-08 10:25:55'),
(67, 178, '0', '500', '∞', '2024-08-08 10:25:55', 'Inventaris', '2024-08-08 10:26:24', '2024-08-08 10:26:24'),
(68, 192, '0', '1000', '∞', '2024-08-08 10:26:24', 'Inventaris', '2024-08-08 10:26:52', '2024-08-08 10:26:52'),
(69, 195, '0', '75', '∞', '2024-08-08 10:26:52', 'Inventaris', '2024-08-08 10:27:24', '2024-08-08 10:27:24'),
(70, 197, '1200', '0', '∞', '2024-08-08 10:27:24', 'Inventaris', '2024-08-08 10:27:58', '2024-08-08 10:27:58'),
(71, 202, '0', '800', '∞', '2024-08-08 10:27:59', 'Inventaris', '2024-08-08 10:29:09', '2024-08-08 10:29:09'),
(72, 205, '0', '500', '∞', '2024-08-08 10:29:09', 'Inventaris', '2024-08-08 10:29:40', '2024-08-08 10:29:40'),
(73, 206, '0', '500', '∞', '2024-08-09 10:03:46', 'Inventaris', '2024-08-08 10:30:28', '2024-08-09 10:04:12'),
(74, 209, '0', '1000', '∞', '2024-08-08 10:30:29', 'Inventaris', '2024-08-08 10:31:15', '2024-08-08 10:31:15'),
(75, 211, '0', '750', '∞', '2024-08-08 10:31:15', 'Inventaris', '2024-08-08 10:32:18', '2024-08-08 10:32:18'),
(76, 218, '1100', '0', '∞', '2024-08-08 10:32:18', 'Inventaris', '2024-08-08 10:33:17', '2024-08-08 10:33:17'),
(77, 220, '0', '100', '∞', '2024-08-08 10:33:17', 'Inventaris', '2024-08-08 10:33:56', '2024-08-08 10:33:56'),
(78, 222, '1600', '0', '∞', '2024-08-08 10:33:56', 'Inventaris', '2024-08-08 10:35:06', '2024-08-08 10:35:06'),
(79, 226, '0', '100', '∞', '2024-08-08 10:35:08', 'Inventaris', '2024-08-08 10:35:50', '2024-08-08 10:35:50'),
(80, 227, '0', '5', '∞', '2024-08-08 10:35:50', 'Inventaris', '2024-08-08 10:36:25', '2024-08-08 10:36:25'),
(81, 229, '1000', '0', '∞', '2024-08-08 10:36:26', 'Inventaris', '2024-08-08 10:37:57', '2024-08-08 10:37:57'),
(82, 232, '650', '0', '∞', '2024-08-08 10:37:57', 'Inventaris', '2024-08-08 10:38:35', '2024-08-08 10:38:35'),
(83, 100, '993', '25', '∞', '2024-08-09 18:12:32', 'Inventaris', '2024-08-09 09:05:01', '2024-08-09 18:13:31'),
(84, 101, '500', '500', '∞', '2024-08-09 09:16:56', 'Inventaris', '2024-08-09 09:06:29', '2024-08-09 09:17:33'),
(85, 102, '500', '0', '∞', '2024-08-09 09:06:29', 'Inventaris', '2024-08-09 09:06:54', '2024-08-09 09:06:54'),
(86, 103, '0', '500', '∞', '2024-08-09 09:06:55', 'Inventaris', '2024-08-09 09:07:49', '2024-08-09 09:07:49'),
(87, 108, '0', '340', '∞', '2024-08-09 09:07:49', 'Inventaris', '2024-08-09 09:11:26', '2024-08-09 09:11:26'),
(88, 109, '0', '500', '∞', '2024-08-09 09:11:26', 'Inventaris', '2024-08-09 09:12:07', '2024-08-09 09:12:07'),
(89, 110, '0', '1000', '∞', '2024-08-09 09:12:07', 'Inventaris', '2024-08-09 09:12:43', '2024-08-09 09:12:43'),
(90, 113, '0', '1000', '∞', '2024-08-09 09:12:44', 'Inventaris', '2024-08-09 09:14:19', '2024-08-09 09:14:19'),
(91, 119, '0', '1000', '∞', '2024-08-09 09:14:19', 'Inventaris', '2024-08-09 09:14:42', '2024-08-09 09:14:42'),
(92, 121, '350', '0', '∞', '2024-08-09 09:14:42', 'Inventaris', '2024-08-09 09:15:10', '2024-08-09 09:15:10'),
(93, 122, '0', '1000', '∞', '2024-08-09 09:15:10', 'Inventaris', '2024-08-09 09:15:36', '2024-08-09 09:15:36'),
(94, 124, '0', '6000', '∞', '2024-08-09 09:15:36', 'Inventaris', '2024-08-09 09:16:05', '2024-08-09 09:16:05'),
(95, 125, '0', '4300', '∞', '2024-08-09 09:16:05', 'Inventaris', '2024-08-09 09:16:31', '2024-08-09 09:16:31'),
(96, 126, '0', '1550', '∞', '2024-08-09 09:16:32', 'Inventaris', '2024-08-09 09:16:56', '2024-08-09 09:16:56'),
(97, 127, '0', '1800', '∞', '2024-08-09 09:17:33', 'Inventaris', '2024-08-09 09:17:59', '2024-08-09 09:17:59'),
(98, 128, '0', '1500', '∞', '2024-08-09 09:17:59', 'Inventaris', '2024-08-09 09:18:35', '2024-08-09 09:18:35'),
(99, 133, '0', '500', '∞', '2024-08-09 09:18:35', 'Inventaris', '2024-08-09 09:19:05', '2024-08-09 09:19:05'),
(100, 135, '0', '0', '∞', '2024-08-09 09:19:05', 'Inventaris', '2024-08-09 09:20:41', '2024-08-09 09:20:41'),
(101, 138, '0', '1000', '∞', '2024-08-09 09:20:41', 'Inventaris', '2024-08-09 09:21:08', '2024-08-09 09:21:08'),
(102, 139, '0', '1000', '∞', '2024-08-09 09:21:08', 'Inventaris', '2024-08-09 09:21:24', '2024-08-09 09:21:24'),
(103, 142, '0', '3000', '∞', '2024-08-09 09:21:25', 'Inventaris', '2024-08-09 09:21:54', '2024-08-09 09:21:54'),
(104, 143, '0', '3000', '∞', '2024-08-09 09:21:54', 'Inventaris', '2024-08-09 09:22:13', '2024-08-09 09:22:13'),
(105, 144, '0', '3000', '∞', '2024-08-09 09:22:13', 'Inventaris', '2024-08-09 09:22:31', '2024-08-09 09:22:31'),
(106, 145, '0', '1500', '∞', '2024-08-09 09:22:31', 'Inventaris', '2024-08-09 09:23:00', '2024-08-09 09:23:00'),
(107, 152, '250', '1300', '∞', '2024-08-09 09:24:08', 'Inventaris', '2024-08-09 09:23:30', '2024-08-09 09:24:34'),
(108, 156, '0', '900', '∞', '2024-08-09 09:24:34', 'Inventaris', '2024-08-09 09:25:14', '2024-08-09 09:25:14'),
(109, 160, '0', '2000', '∞', '2024-08-09 09:25:14', 'Inventaris', '2024-08-09 09:26:11', '2024-08-09 09:26:11'),
(110, 162, '0', '2000', '∞', '2024-08-09 09:26:11', 'Inventaris', '2024-08-09 09:42:24', '2024-08-09 09:42:24'),
(111, 163, '0', '1000', '∞', '2024-08-09 09:42:24', 'Inventaris', '2024-08-09 09:43:39', '2024-08-09 09:43:39'),
(112, 165, '0', '2000', '∞', '2024-08-09 09:43:39', 'Inventaris', '2024-08-09 09:45:34', '2024-08-09 09:45:34'),
(113, 167, '0', '2500', '∞', '2024-08-09 09:45:35', 'Inventaris', '2024-08-09 09:46:00', '2024-08-09 09:46:00'),
(114, 169, '500', '0', '∞', '2024-08-09 09:46:00', 'Inventaris', '2024-08-09 09:46:35', '2024-08-09 09:46:35'),
(115, 174, '0', '500', '∞', '2024-08-09 09:46:36', 'Inventaris', '2024-08-09 09:47:27', '2024-08-09 09:47:27'),
(116, 175, '0', '1000', '∞', '2024-08-09 09:47:28', 'Inventaris', '2024-08-09 09:47:46', '2024-08-09 09:47:46'),
(117, 177, '0', '600', '∞', '2024-08-09 09:47:46', 'Inventaris', '2024-08-09 09:49:44', '2024-08-09 09:49:44'),
(118, 179, '0', '500', '∞', '2024-08-09 09:49:44', 'Inventaris', '2024-08-09 09:50:28', '2024-08-09 09:50:28'),
(119, 180, '0', '500', '∞', '2024-08-09 09:50:29', 'Inventaris', '2024-08-09 09:51:03', '2024-08-09 09:51:03'),
(120, 182, '0', '3000', '∞', '2024-08-09 09:51:03', 'Inventaris', '2024-08-09 09:53:50', '2024-08-09 09:53:50'),
(121, 2, '0', '996', '∞', '2024-08-09 09:53:12', 'Inventaris', '2024-08-09 09:53:57', '2024-08-09 09:53:57'),
(122, 1, '1427', '0', '∞', '2024-08-09 09:53:57', 'Inventaris', '2024-08-09 09:54:23', '2024-08-09 09:54:23'),
(123, 189, '0', '1000', '∞', '2024-08-09 09:53:50', 'Inventaris', '2024-08-09 09:54:23', '2024-08-09 09:54:23'),
(124, 5, '0', '101', '∞', '2024-08-09 09:54:23', 'Inventaris', '2024-08-09 09:54:45', '2024-08-09 09:54:45'),
(125, 7, '0', '2000', '∞', '2024-08-09 09:54:45', 'Inventaris', '2024-08-09 09:55:08', '2024-08-09 09:55:08'),
(126, 14, '600', '0', '∞', '2024-08-09 09:55:08', 'Inventaris', '2024-08-09 09:55:30', '2024-08-09 09:55:30'),
(127, 17, '500', '0', '∞', '2024-08-09 09:55:31', 'Inventaris', '2024-08-09 09:56:00', '2024-08-09 09:56:00'),
(128, 20, '0', '500', '∞', '2024-08-09 09:56:00', 'Inventaris', '2024-08-09 09:56:21', '2024-08-09 09:56:21'),
(129, 21, '2700', '0', '∞', '2024-08-09 09:56:22', 'Inventaris', '2024-08-09 09:56:45', '2024-08-09 09:56:45'),
(130, 22, '0', '100', '∞', '2024-08-09 09:56:45', 'Inventaris', '2024-08-09 09:57:08', '2024-08-09 09:57:08'),
(131, 23, '400', '0', '∞', '2024-08-09 09:57:08', 'Inventaris', '2024-08-09 09:57:29', '2024-08-09 09:57:29'),
(132, 190, '0', '100', '∞', '2024-08-09 09:54:24', 'Inventaris', '2024-08-09 09:57:53', '2024-08-09 09:57:53'),
(133, 31, '900', '0', '∞', '2024-08-09 09:57:30', 'Inventaris', '2024-08-09 09:58:17', '2024-08-09 09:58:17'),
(134, 194, '0', '50', '∞', '2024-08-09 09:57:53', 'Inventaris', '2024-08-09 09:58:28', '2024-08-09 09:58:28'),
(135, 32, '0', '600', '∞', '2024-08-09 09:58:17', 'Inventaris', '2024-08-09 09:58:52', '2024-08-09 09:58:52'),
(136, 197, '0', '1000', '∞', '2024-08-09 09:58:28', 'Inventaris', '2024-08-09 09:59:19', '2024-08-09 09:59:19'),
(137, 34, '0', '6650', '∞', '2024-08-09 18:13:31', 'Inventaris', '2024-08-09 09:59:38', '2024-08-09 18:16:04'),
(138, 36, '0', '200', '∞', '2024-08-09 09:59:38', 'Inventaris', '2024-08-09 10:00:01', '2024-08-09 10:00:01'),
(139, 37, '1000', '0', '∞', '2024-08-09 10:00:01', 'Inventaris', '2024-08-09 10:00:25', '2024-08-09 10:00:25'),
(140, 200, '0', '1000', '∞', '2024-08-09 09:59:19', 'Inventaris', '2024-08-09 10:00:47', '2024-08-09 10:00:47'),
(141, 38, '0', '1000', '∞', '2024-08-09 10:00:25', 'Inventaris', '2024-08-09 10:00:53', '2024-08-09 10:00:53'),
(142, 39, '800', '0', '∞', '2024-08-09 10:00:53', 'Inventaris', '2024-08-09 10:01:25', '2024-08-09 10:01:25'),
(143, 202, '0', '2000', '∞', '2024-08-09 10:00:47', 'Inventaris', '2024-08-09 10:01:27', '2024-08-09 10:01:27'),
(144, 45, '0', '5300', '∞', '2024-08-09 10:01:25', 'Inventaris', '2024-08-09 10:02:03', '2024-08-09 10:02:03'),
(145, 46, '3500', '2000', '∞', '2024-08-09 18:16:04', 'Inventaris', '2024-08-09 10:02:48', '2024-08-09 18:19:06'),
(146, 203, '0', '3000', '∞', '2024-08-09 10:01:27', 'Inventaris', '2024-08-09 10:02:57', '2024-08-09 10:02:57'),
(147, 47, '2000', '0', '∞', '2024-08-09 10:02:49', 'Inventaris', '2024-08-09 10:03:11', '2024-08-09 10:03:11'),
(148, 204, '3400', '0', '∞', '2024-08-09 10:02:57', 'Inventaris', '2024-08-09 10:03:15', '2024-08-09 10:03:15'),
(149, 51, '2200', '0', '∞', '2024-08-09 10:03:12', 'Inventaris', '2024-08-09 10:03:36', '2024-08-09 10:03:36'),
(150, 206, '0', '500', '∞', '2024-08-09 10:03:46', 'Inventaris', '2024-08-09 10:03:45', '2024-08-09 10:04:12'),
(151, 60, '0', '3500', '∞', '2024-08-09 10:03:36', 'Inventaris', '2024-08-09 10:04:02', '2024-08-09 10:04:02'),
(152, 65, '200', '0', '∞', '2024-08-09 10:04:02', 'Inventaris', '2024-08-09 10:04:31', '2024-08-09 10:04:31'),
(153, 8, '0', '500', '∞', '2024-08-09 10:04:31', 'Inventaris', '2024-08-09 10:04:59', '2024-08-09 10:04:59'),
(154, 260, '8700', '500', '∞', '2024-08-09 10:08:22', 'Inventaris', '2024-08-09 10:08:22', '2024-08-09 10:08:52'),
(155, 262, '0', '500', '∞', '2024-08-09 10:08:52', 'Inventaris', '2024-08-09 10:09:27', '2024-08-09 10:09:27'),
(156, 263, '300', '0', '∞', '2024-08-09 10:09:27', 'Inventaris', '2024-08-09 10:09:59', '2024-08-09 10:09:59'),
(157, 265, '4300', '0', '∞', '2024-08-09 10:09:59', 'Inventaris', '2024-08-09 10:10:31', '2024-08-09 10:10:31'),
(158, 266, '0', '500', '∞', '2024-08-09 10:10:31', 'Inventaris', '2024-08-09 10:11:04', '2024-08-09 10:11:04'),
(159, 259, '11200', '0', '∞', '2024-08-09 10:11:05', 'Inventaris', '2024-08-09 10:12:17', '2024-08-09 10:12:17'),
(160, 255, '0', '300', '∞', '2024-08-09 10:12:17', 'Inventaris', '2024-08-09 10:12:51', '2024-08-09 10:12:51'),
(161, 254, '0', '350', '∞', '2024-08-09 10:12:51', 'Inventaris', '2024-08-09 10:13:28', '2024-08-09 10:13:28'),
(162, 253, '500', '0', '∞', '2024-08-09 10:13:29', 'Inventaris', '2024-08-09 10:14:06', '2024-08-09 10:14:06'),
(163, 249, '4450', '0', '∞', '2024-08-09 10:14:07', 'Inventaris', '2024-08-09 10:15:02', '2024-08-09 10:15:02'),
(164, 248, '0', '800', '∞', '2024-08-09 10:15:03', 'Inventaris', '2024-08-09 10:15:41', '2024-08-09 10:15:41'),
(165, 243, '200', '0', '∞', '2024-08-09 10:15:41', 'Inventaris', '2024-08-09 10:16:22', '2024-08-09 10:16:22'),
(166, 241, '100', '0', '∞', '2024-08-09 10:16:23', 'Inventaris', '2024-08-09 10:16:53', '2024-08-09 10:16:53'),
(167, 240, '0', '100', '∞', '2024-08-09 10:16:53', 'Inventaris', '2024-08-09 10:17:20', '2024-08-09 10:17:20'),
(168, 239, '12000', '0', '∞', '2024-08-09 10:17:21', 'Inventaris', '2024-08-09 10:17:59', '2024-08-09 10:17:59'),
(169, 233, '650', '0', '∞', '2024-08-09 17:48:52', 'Inventaris', '2024-08-09 17:49:29', '2024-08-09 17:49:29'),
(170, 234, '900', '0', '∞', '2024-08-09 17:49:30', 'Inventaris', '2024-08-09 17:50:24', '2024-08-09 17:50:24'),
(171, 237, '0', '500', '∞', '2024-08-09 17:50:25', 'Inventaris', '2024-08-09 17:51:06', '2024-08-09 17:51:06'),
(172, 67, '1100', '0', '∞', '2024-08-09 17:51:06', 'Inventaris', '2024-08-09 17:59:42', '2024-08-09 17:59:42'),
(173, 68, '50', '0', '∞', '2024-08-09 17:59:42', 'Inventaris', '2024-08-09 18:00:10', '2024-08-09 18:00:10'),
(174, 71, '0', '50', '∞', '2024-08-09 18:00:11', 'Inventaris', '2024-08-09 18:00:44', '2024-08-09 18:00:44'),
(175, 72, '0', '1000', '∞', '2024-08-09 18:00:44', 'Inventaris', '2024-08-09 18:01:19', '2024-08-09 18:01:19'),
(176, 73, '0', '200', '∞', '2024-08-09 18:01:20', 'Inventaris', '2024-08-09 18:01:44', '2024-08-09 18:01:44'),
(177, 75, '250', '0', '∞', '2024-08-09 18:01:44', 'Inventaris', '2024-08-09 18:02:15', '2024-08-09 18:02:15'),
(178, 76, '1200', '0', '∞', '2024-08-09 18:02:15', 'Inventaris', '2024-08-09 18:02:40', '2024-08-09 18:02:40'),
(179, 78, '11500', '0', '∞', '2024-08-09 18:02:40', 'Inventaris', '2024-08-09 18:03:07', '2024-08-09 18:03:07'),
(180, 80, '200', '0', '∞', '2024-08-09 18:03:07', 'Inventaris', '2024-08-09 18:03:38', '2024-08-09 18:03:38'),
(181, 84, '4200', '0', '∞', '2024-08-09 18:03:39', 'Inventaris', '2024-08-09 18:04:09', '2024-08-09 18:04:09'),
(182, 88, '850', '0', '∞', '2024-08-09 18:04:10', 'Inventaris', '2024-08-09 18:04:37', '2024-08-09 18:04:37'),
(183, 91, '300', '0', '∞', '2024-08-09 18:04:37', 'Inventaris', '2024-08-09 18:05:10', '2024-08-09 18:05:10'),
(184, 92, '0', '1000', '∞', '2024-08-09 18:05:10', 'Inventaris', '2024-08-09 18:05:43', '2024-08-09 18:05:43'),
(185, 93, '300', '0', '∞', '2024-08-09 18:05:43', 'Inventaris', '2024-08-09 18:06:08', '2024-08-09 18:06:08'),
(186, 95, '400', '0', '∞', '2024-08-09 18:06:08', 'Inventaris', '2024-08-09 18:06:45', '2024-08-09 18:06:45'),
(187, 97, '0', '1000', '∞', '2024-08-09 18:06:45', 'Inventaris', '2024-08-09 18:07:17', '2024-08-09 18:07:17'),
(188, 98, '0', '600', '∞', '2024-08-09 18:07:17', 'Inventaris', '2024-08-09 18:07:50', '2024-08-09 18:07:50'),
(189, 85, '0', '100', '∞', '2024-08-09 18:07:51', 'Inventaris', '2024-08-09 18:09:57', '2024-08-09 18:09:57'),
(190, 99, '2910', '0', '∞', '2024-08-09 18:09:57', 'Inventaris', '2024-08-09 18:11:01', '2024-08-09 18:11:01'),
(191, 58, '0', '100', '∞', '2024-08-09 18:11:01', 'Inventaris', '2024-08-09 18:11:55', '2024-08-09 18:11:55'),
(192, 96, '200', '0', '∞', '2024-08-09 18:11:55', 'Inventaris', '2024-08-09 18:12:32', '2024-08-09 18:12:32'),
(193, 246, '0', '500', '∞', '2024-08-09 18:19:07', 'Inventaris', '2024-08-09 18:23:23', '2024-08-09 18:23:23'),
(194, 59, '0', '6000', '∞', '2024-08-09 18:23:23', 'Inventaris', '2024-08-09 18:24:08', '2024-08-09 18:24:08'),
(195, 63, '0', '2500', '∞', '2024-08-09 18:24:08', 'Inventaris', '2024-08-09 18:24:52', '2024-08-09 18:24:52'),
(196, 9, '0', '994', '∞', '2024-08-09 18:24:53', 'Inventaris', '2024-08-09 18:25:42', '2024-08-09 18:25:42'),
(197, 50, '0', '1000', '∞', '2024-08-09 18:25:42', 'Inventaris', '2024-08-09 18:26:12', '2024-08-09 18:26:12'),
(198, 56, '0', '500', '∞', '2024-08-09 18:26:12', 'Inventaris', '2024-08-09 18:27:06', '2024-08-09 18:27:06'),
(199, 28, '0', '2000', '∞', '2024-08-09 18:27:06', 'Inventaris', '2024-08-09 18:29:45', '2024-08-09 18:29:45'),
(200, 48, '0', '500', '∞', '2024-08-09 18:29:46', 'Inventaris', '2024-08-09 18:30:17', '2024-08-09 18:30:17'),
(201, 207, '1700', '0', '∞', '2024-08-10 08:10:58', 'Inventaris', '2024-08-10 08:12:41', '2024-08-10 08:12:41'),
(202, 208, '0', '1000', '∞', '2024-08-10 08:12:41', 'Inventaris', '2024-08-10 08:13:33', '2024-08-10 08:13:33'),
(203, 216, '2000', '4000', '∞', '2024-08-10 08:14:18', 'Inventaris', '2024-08-10 08:14:18', '2024-08-10 08:14:47'),
(204, 217, '500', '0', '∞', '2024-08-10 08:14:47', 'Inventaris', '2024-08-10 08:15:34', '2024-08-10 08:15:34'),
(205, 221, '0', '3000', '∞', '2024-08-10 08:15:34', 'Inventaris', '2024-08-10 08:16:23', '2024-08-10 08:16:23'),
(206, 222, '0', '500', '∞', '2024-08-10 08:16:23', 'Inventaris', '2024-08-10 08:17:05', '2024-08-10 08:17:05'),
(207, 224, '0', '1500', '∞', '2024-08-10 08:17:55', 'Inventaris', '2024-08-10 08:17:55', '2024-08-10 08:18:28'),
(208, 259, '0', '11000', '∞', '2024-08-10 08:18:28', 'Inventaris', '2024-08-10 08:19:49', '2024-08-10 08:19:49'),
(209, 260, '0', '10000', '∞', '2024-08-10 08:19:49', 'Inventaris', '2024-08-10 08:20:56', '2024-08-10 08:20:56'),
(210, 267, '0', '2300', '∞', '2024-08-10 12:53:51', 'Inventaris', '2024-08-10 08:22:31', '2024-08-10 12:56:20'),
(211, 268, '1700', '0', '∞', '2024-08-10 08:22:31', 'Inventaris', '2024-08-10 08:24:17', '2024-08-10 08:24:17'),
(212, 210, '0', '1000', '∞', '2024-08-10 10:14:53', 'Inventaris', '2024-08-10 10:25:38', '2024-08-10 10:25:38'),
(213, 286, '0', '1000', '∞', '2024-08-10 10:29:21', 'Inventaris', '2024-08-10 10:31:33', '2024-08-10 10:31:33'),
(214, 299, '0', '200', '∞', '2024-08-10 10:32:56', 'Inventaris', '2024-08-10 10:33:44', '2024-08-10 10:33:44'),
(215, 273, '0', '450', '∞', '2024-08-10 12:56:20', 'Inventaris', '2024-08-10 13:11:25', '2024-08-10 13:11:25'),
(216, 845, '225', '0', '∞', '2024-08-10 14:20:22', 'Inventaris', '2024-08-10 14:21:13', '2024-08-10 14:21:13'),
(217, 1, '0', '40000', '∞', '2024-08-10 14:42:48', 'Inventaris', '2024-08-10 14:43:33', '2024-08-10 14:43:33'),
(218, 2, '0', '20000', '∞', '2024-08-10 14:43:33', 'Inventaris', '2024-08-10 14:44:11', '2024-08-10 14:44:11'),
(219, 107, '0', '2000', '∞', '2024-08-10 14:44:27', 'Inventaris', '2024-08-10 14:47:27', '2024-08-10 14:47:27'),
(220, 876, '30000', '0', '∞', '2024-08-10 15:02:34', 'Inventaris', '2024-08-10 15:03:50', '2024-08-10 15:03:50'),
(221, 13, '0', '1000', '∞', '2024-08-10 15:03:17', 'Inventaris', '2024-08-10 15:06:37', '2024-08-10 15:06:37'),
(222, 908, '0', '500', '∞', '2024-08-12 08:08:22', 'Inventaris', '2024-08-12 08:09:18', '2024-08-12 08:09:18'),
(223, 904, '0', '500', '∞', '2024-08-12 08:13:12', 'Inventaris', '2024-08-12 08:13:37', '2024-08-12 08:13:37'),
(224, 32, '0', '4000', '∞', '2024-08-12 09:40:25', 'Inventaris', '2024-08-12 09:48:04', '2024-08-12 09:48:04'),
(225, 14, '0', '2500', '∞', '2024-08-12 09:48:05', 'Inventaris', '2024-08-12 09:55:11', '2024-08-12 09:55:11'),
(226, 24, '0', '2500', '∞', '2024-08-12 09:55:11', 'Inventaris', '2024-08-12 09:56:42', '2024-08-12 09:56:42'),
(227, 4, '0', '1000', '∞', '2024-08-12 09:56:42', 'Inventaris', '2024-08-12 09:59:01', '2024-08-12 09:59:01'),
(228, 874, '0', '100', '∞', '2024-08-12 10:04:15', 'Inventaris', '2024-08-12 10:07:40', '2024-08-12 10:07:40'),
(229, 51, '0', '100', '∞', '2024-08-12 10:07:40', 'Inventaris', '2024-08-12 10:23:40', '2024-08-12 10:23:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$P5/r.KGtmPGTdRwvvPJeCuqhxVqyNNW6NFz8ABPM5oksHoTWfM5EO', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahans`
--
ALTER TABLE `bahans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kerusakans`
--
ALTER TABLE `kerusakans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasis`
--
ALTER TABLE `lokasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_transaksis_mahasiswas` (`id_mahasiswa`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahans`
--
ALTER TABLE `bahans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=955;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kerusakans`
--
ALTER TABLE `kerusakans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `lokasis`
--
ALTER TABLE `lokasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `FK_transaksis_mahasiswas` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswas` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
