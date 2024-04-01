-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table depo.mahasiswas
CREATE TABLE IF NOT EXISTS `mahasiswas` (
  `nim` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prodi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table depo.mahasiswas: ~279 rows (approximately)
/*!40000 ALTER TABLE `mahasiswas` DISABLE KEYS */;
REPLACE INTO `mahasiswas` (`nim`, `nama`, `prodi`, `created_at`, `updated_at`) VALUES
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
/*!40000 ALTER TABLE `mahasiswas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;