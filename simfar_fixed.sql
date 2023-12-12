-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table simfar.golongan
CREATE TABLE IF NOT EXISTS `golongan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table simfar.golongan: ~4 rows (approximately)
INSERT INTO `golongan` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(1, 'Obat Bebas', '2023-04-07 11:33:25', '2023-04-07 11:33:25'),
	(2, 'Obat Bebas Terbatas', '2023-04-07 11:33:25', '2023-04-07 11:33:25'),
	(3, 'Obat Keras', '2023-04-07 11:33:25', '2023-04-07 11:33:25'),
	(4, 'Multivitamin', '2023-04-07 11:33:25', '2023-04-07 11:33:25');

-- Dumping structure for table simfar.instansi
CREATE TABLE IF NOT EXISTS `instansi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(16) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table simfar.instansi: ~0 rows (approximately)
INSERT INTO `instansi` (`id`, `nama`, `alamat`, `telepon`, `created_at`, `updated_at`) VALUES
	(1, 'Puskesmas Batang I', 'Jl. RE Martadinata No.145, Klidangkongsi, Proyonanggan Utara, Kec. Batang, Kabupaten Batang, Jawa Tengah 51216', '(0285) 391483', '2023-04-07 11:33:25', '2023-04-07 11:33:25');

-- Dumping structure for table simfar.jenis
CREATE TABLE IF NOT EXISTS `jenis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table simfar.jenis: ~2 rows (approximately)
INSERT INTO `jenis` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(1, 'Obat Oral', '2023-04-07 11:33:25', '2023-04-07 11:33:25'),
	(2, 'Obat Oles', '2023-04-07 11:33:25', '2023-04-07 11:33:25');

-- Dumping structure for table simfar.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table simfar.kategori: ~2 rows (approximately)
INSERT INTO `kategori` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(1, 'Generik', '2023-04-07 11:33:25', '2023-04-07 11:33:25'),
	(2, 'Non Generik', '2023-04-07 11:33:25', '2023-04-07 11:33:25');

-- Dumping structure for table simfar.kategori_non_medis
CREATE TABLE IF NOT EXISTS `kategori_non_medis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table simfar.kategori_non_medis: ~0 rows (approximately)
INSERT INTO `kategori_non_medis` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(1, 'Alat', '2023-04-16 20:05:04', '2023-04-16 20:05:04');

-- Dumping structure for table simfar.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Dumping data for table simfar.migrations: ~13 rows (approximately)
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
	(1, '2022-03-14-164717', 'App\\Database\\Migrations\\PenggunaTable', 'default', 'App', 1680841961, 1),
	(2, '2023-03-02-072500', 'App\\Database\\Migrations\\ObatTable', 'default', 'App', 1680841961, 1),
	(3, '2023-03-02-072750', 'App\\Database\\Migrations\\JenisTable', 'default', 'App', 1680841961, 1),
	(4, '2023-03-02-072757', 'App\\Database\\Migrations\\SatuanTable', 'default', 'App', 1680841961, 1),
	(5, '2023-03-02-072809', 'App\\Database\\Migrations\\KategoriTable', 'default', 'App', 1680841961, 1),
	(6, '2023-03-02-072823', 'App\\Database\\Migrations\\GolonganTable', 'default', 'App', 1680841961, 1),
	(7, '2023-03-02-073436', 'App\\Database\\Migrations\\PenjualanHeaderTable', 'default', 'App', 1680841961, 1),
	(8, '2023-03-02-073443', 'App\\Database\\Migrations\\PenjualanDetailTable', 'default', 'App', 1680841961, 1),
	(9, '2023-03-02-073803', 'App\\Database\\Migrations\\InstansiTable', 'default', 'App', 1680841961, 1),
	(10, '2023-03-08-011131', 'App\\Database\\Migrations\\RiwayatTable', 'default', 'App', 1680841961, 1),
	(11, '2023-03-09-115817', 'App\\Database\\Migrations\\PenerimaanHeaderTable', 'default', 'App', 1680841961, 1),
	(12, '2023-03-09-115825', 'App\\Database\\Migrations\\PenerimaanDetailTable', 'default', 'App', 1680841961, 1),
	(13, '2023-03-27-122331', 'App\\Database\\Migrations\\KategoriNonMedisTable', 'default', 'App', 1680841961, 1);

-- Dumping structure for table simfar.obat
CREATE TABLE IF NOT EXISTS `obat` (
  `id` char(7) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kandungan` text NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `kapasitas` varchar(20) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `golongan` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(5) NOT NULL DEFAULT 0,
  `min_stok` int(5) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table simfar.obat: ~4 rows (approximately)
INSERT INTO `obat` (`id`, `nama`, `kandungan`, `satuan`, `kapasitas`, `jenis`, `kategori`, `golongan`, `harga`, `stok`, `min_stok`, `created_at`, `updated_at`) VALUES
	('OBT-001', 'Amoxicillin', '-', 'Tablet', '50 ml', 'Obat Oral', 'Non Generik', 'Obat Keras', 5000, 645, 3, '2023-04-07 11:34:35', '2023-12-06 21:06:19'),
	('OBT-002', 'Paracetamol Inj', '-', 'Ampul', '30ml', 'Obat Oral', 'Generik', 'Obat Keras', 10000, 657, 10, '2023-04-07 11:35:24', '2023-12-06 21:06:19'),
	('OBT-003', '78', '-', 'Botol', '10ml', 'Obat Oral', 'Non Generik', 'Obat Bebas Terbatas', 1000, 60, 10, '2023-04-22 11:46:11', '2023-12-06 21:06:19'),
	('OBT-004', '789456123', '-', 'Botol', '10ml', 'Obat Oles', 'Non Generik', 'Obat Bebas Terbatas', 200, 1082, 10, '2023-04-24 08:16:30', '2023-12-06 21:06:19');

-- Dumping structure for table simfar.penerimaan_detail
CREATE TABLE IF NOT EXISTS `penerimaan_detail` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_penerimaan_header` bigint(20) NOT NULL,
  `id_obat` char(7) NOT NULL,
  `quantity` int(5) NOT NULL,
  `kadaluarsa` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- Dumping data for table simfar.penerimaan_detail: ~10 rows (approximately)
INSERT INTO `penerimaan_detail` (`id`, `id_penerimaan_header`, `id_obat`, `quantity`, `kadaluarsa`, `created_at`, `updated_at`) VALUES
	(1, 0, 'OBT-001', 12, NULL, '2023-04-16 19:58:44', '2023-04-23 14:00:44'),
	(10, 5, 'OBT-001', 17, NULL, '2023-04-24 10:12:08', '2023-04-24 11:16:52'),
	(11, 5, 'OBT-002', 60, NULL, '2023-04-24 10:12:08', '2023-04-24 10:12:08'),
	(14, 6, 'OBT-001', 700, NULL, '2023-04-25 08:23:54', '2023-04-25 08:54:08'),
	(15, 6, 'OBT-002', 500, NULL, '2023-04-25 08:23:54', '2023-04-25 08:23:54'),
	(17, 6, 'OBT-004', 1000, NULL, '2023-04-25 08:23:54', '2023-04-25 08:23:54'),
	(18, 8, 'OBT-001', 2, '2023-12-02', '2023-12-06 21:06:19', '2023-12-06 21:06:19'),
	(19, 8, 'OBT-002', 2, '2023-12-07', '2023-12-06 21:06:19', '2023-12-06 21:06:19'),
	(20, 8, 'OBT-003', 7, '2023-12-08', '2023-12-06 21:06:19', '2023-12-06 21:06:19'),
	(21, 8, 'OBT-004', 8, '2023-12-09', '2023-12-06 21:06:19', '2023-12-06 21:06:19');

-- Dumping structure for table simfar.penerimaan_header
CREATE TABLE IF NOT EXISTS `penerimaan_header` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_faktur` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `sp` varchar(100) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table simfar.penerimaan_header: ~4 rows (approximately)
INSERT INTO `penerimaan_header` (`id`, `no_faktur`, `tanggal`, `sp`, `nama_supplier`, `keterangan`, `created_at`, `updated_at`) VALUES
	(5, '8', '2023-04-24', '8', '9', NULL, '2023-04-24 10:12:08', '2023-04-24 10:12:08'),
	(6, '321321313', '2023-04-25', '32132121', '321321321', NULL, '2023-04-25 08:23:54', '2023-04-25 08:23:54'),
	(7, '', '2023-12-08', '98498984984', '77777777', NULL, '2023-12-06 20:57:08', '2023-12-06 20:57:08'),
	(8, '', '2023-12-08', '98498984984', '77777777', NULL, '2023-12-06 21:06:19', '2023-12-06 21:06:19');

-- Dumping structure for table simfar.pengguna
CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` enum('Admin','User') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table simfar.pengguna: ~2 rows (approximately)
INSERT INTO `pengguna` (`id`, `nama`, `tanggal_lahir`, `username`, `password`, `hak_akses`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '2023-01-01', 'admin', '$2y$10$UainHteUviSkwg/loXg4WuPwfKaLelK7GsHGDGjY5qnSFanfGCEAO', 'Admin', '2023-04-07 11:33:25', '2023-04-07 11:33:25'),
	(2, 'user', '2023-01-01', 'user', '$2y$10$WEHmgWSL4L3mq.W.BMu2sOKRLyNCIbmbzZiEQHepmNwGjl/rn048y', 'User', '2023-04-07 11:33:25', '2023-04-07 11:33:25');

-- Dumping structure for table simfar.penjualan_detail
CREATE TABLE IF NOT EXISTS `penjualan_detail` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_penjualan_header` char(22) NOT NULL,
  `id_obat` char(7) NOT NULL,
  `quantity` int(5) NOT NULL,
  `subtotal` bigint(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table simfar.penjualan_detail: ~2 rows (approximately)
INSERT INTO `penjualan_detail` (`id`, `id_penjualan_header`, `id_obat`, `quantity`, `subtotal`, `created_at`, `updated_at`) VALUES
	(1, 'P-20042023-001', 'OBT-001', 7, 35000, '2023-04-20 14:09:55', '2023-04-20 14:09:55'),
	(2, 'P-20042023-001', 'OBT-002', 20, 200000, '2023-04-20 14:09:55', '2023-04-20 14:09:55');

-- Dumping structure for table simfar.penjualan_header
CREATE TABLE IF NOT EXISTS `penjualan_header` (
  `id` char(22) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `total` bigint(20) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table simfar.penjualan_header: ~0 rows (approximately)
INSERT INTO `penjualan_header` (`id`, `nama`, `tanggal`, `total`, `keterangan`, `created_at`, `updated_at`) VALUES
	('P-20042023-001', 'Revangga', '2023-04-20', 235000, '-', '2023-04-20 14:09:55', '2023-04-20 14:09:55');

-- Dumping structure for table simfar.riwayat
CREATE TABLE IF NOT EXISTS `riwayat` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL,
  `stok_awal` int(5) NOT NULL,
  `stok_perubahan` int(5) NOT NULL,
  `stok_akhir` int(5) NOT NULL,
  `status` varchar(25) NOT NULL,
  `id_header` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- Dumping data for table simfar.riwayat: ~31 rows (approximately)
INSERT INTO `riwayat` (`id`, `nama`, `tanggal`, `stok_awal`, `stok_perubahan`, `stok_akhir`, `status`, `id_header`, `created_at`, `updated_at`) VALUES
	(1, 'Amoxicillin', '2023-04-07 11:35:39', 0, 50, 50, 'Stock Opname', 0, '2023-04-07 11:35:39', '2023-04-07 11:35:39'),
	(2, 'Paracetamol Inj', '2023-04-07 11:35:39', 0, 50, 50, 'Stock Opname', 0, '2023-04-07 11:35:39', '2023-04-07 11:35:39'),
	(3, 'Amoxicillin', '2023-04-16 07:58:44', 50, 350, 400, 'Penerimaan', 1, '2023-04-16 19:58:44', '2023-04-16 19:58:44'),
	(4, 'Paracetamol Inj', '2023-04-16 07:58:44', 50, 40, 90, 'Penerimaan', 2, '2023-04-16 19:58:44', '2023-04-16 19:58:44'),
	(5, 'Amoxicillin', '2023-04-20 02:09:55', 400, 7, 393, 'Penjualan', 1, '2023-04-20 14:09:55', '2023-04-20 14:09:55'),
	(6, 'Paracetamol Inj', '2023-04-20 02:09:55', 90, 20, 70, 'Penjualan', 2, '2023-04-20 14:09:55', '2023-04-20 14:09:55'),
	(7, 'Amoxicillin', '2023-04-23 03:04:20', 393, 25, 418, 'Penerimaan', 3, '2023-04-23 15:04:20', '2023-04-23 15:04:20'),
	(8, 'Paracetamol Inj', '2023-04-23 03:04:20', 70, 25, 95, 'Penerimaan', 4, '2023-04-23 15:04:20', '2023-04-23 15:04:20'),
	(9, '78', '2023-04-23 03:04:20', 0, 25, 25, 'Penerimaan', 5, '2023-04-23 15:04:20', '2023-04-23 15:04:20'),
	(10, '789456123', '2023-04-24 08:17:06', 0, 100, 100, 'Penerimaan', 6, '2023-04-24 08:17:06', '2023-04-24 08:17:06'),
	(11, '789456123', '2023-04-24 08:17:52', 100, 100, 0, 'Pembatalan Penerimaan', NULL, '2023-04-24 08:17:52', '2023-04-24 08:17:52'),
	(12, 'Amoxicillin', '2023-04-24 10:07:16', 418, 77, 495, 'Penerimaan', 7, '2023-04-24 10:07:16', '2023-04-24 10:07:16'),
	(13, 'Paracetamol Inj', '2023-04-24 10:07:16', 95, 77, 172, 'Penerimaan', 8, '2023-04-24 10:07:16', '2023-04-24 10:07:16'),
	(14, '78', '2023-04-24 10:07:16', 25, 25, 50, 'Penerimaan', 9, '2023-04-24 10:07:16', '2023-04-24 10:07:16'),
	(15, 'Amoxicillin', '2023-04-24 10:07:46', 495, 77, 418, 'Pembatalan Penerimaan', NULL, '2023-04-24 10:07:46', '2023-04-24 10:07:46'),
	(16, 'Paracetamol Inj', '2023-04-24 10:07:46', 172, 77, 95, 'Pembatalan Penerimaan', NULL, '2023-04-24 10:07:46', '2023-04-24 10:07:46'),
	(17, '78', '2023-04-24 10:07:46', 50, 25, 25, 'Pembatalan Penerimaan', NULL, '2023-04-24 10:07:46', '2023-04-24 10:07:46'),
	(18, 'Amoxicillin', '2023-04-24 10:12:08', 418, 25, 443, 'Penerimaan', 10, '2023-04-24 10:12:08', '2023-04-24 10:12:08'),
	(19, 'Paracetamol Inj', '2023-04-24 10:12:08', 95, 60, 155, 'Penerimaan', 11, '2023-04-24 10:12:08', '2023-04-24 10:12:08'),
	(20, '78', '2023-04-24 10:12:08', 25, 28, 53, 'Penerimaan', 12, '2023-04-24 10:12:08', '2023-04-24 10:12:08'),
	(21, '789456123', '2023-04-24 10:12:08', 0, 74, 74, 'Penerimaan', 13, '2023-04-24 10:12:08', '2023-04-24 10:12:08'),
	(22, 'Amoxicillin', '2023-04-25 08:23:54', 443, 700, 1143, 'Penerimaan', 14, '2023-04-25 08:23:54', '2023-04-25 08:23:54'),
	(23, 'Paracetamol Inj', '2023-04-25 08:23:54', 155, 500, 655, 'Penerimaan', 15, '2023-04-25 08:23:54', '2023-04-25 08:23:54'),
	(24, '78', '2023-04-25 08:23:54', 53, 100, 153, 'Penerimaan', 16, '2023-04-25 08:23:54', '2023-04-25 08:23:54'),
	(25, '789456123', '2023-04-25 08:23:54', 74, 1000, 1074, 'Penerimaan', 17, '2023-04-25 08:23:54', '2023-04-25 08:23:54'),
	(26, 'Amoxicillin', '2023-04-25 08:35:13', 1143, 700, 543, 'Perubahan Penerimaan', 14, '2023-04-25 08:35:13', '2023-04-25 08:35:13'),
	(27, 'Amoxicillin', '2023-04-25 08:50:41', 543, 600, 443, 'Perubahan Penerimaan', 14, '2023-04-25 08:50:41', '2023-04-25 08:50:41'),
	(28, 'Amoxicillin', '2023-04-25 08:51:53', 443, -100, 543, 'Perubahan Penerimaan', 14, '2023-04-25 08:51:53', '2023-04-25 08:51:53'),
	(29, 'Amoxicillin', '2023-04-25 08:54:08', 543, 100, 643, 'Perubahan Penerimaan', 14, '2023-04-25 08:54:08', '2023-04-25 08:54:08'),
	(30, '78', '2023-04-25 08:57:17', 153, 100, 53, 'Penghapusan Penerimaan', NULL, '2023-04-25 08:57:17', '2023-04-25 08:57:17'),
	(31, 'Amoxicillin', '2023-12-06 09:06:19', 643, 2, 645, 'Penerimaan', 18, '2023-12-06 21:06:19', '2023-12-06 21:06:19'),
	(32, 'Paracetamol Inj', '2023-12-06 09:06:19', 655, 2, 657, 'Penerimaan', 19, '2023-12-06 21:06:19', '2023-12-06 21:06:19'),
	(33, '78', '2023-12-06 09:06:19', 53, 7, 60, 'Penerimaan', 20, '2023-12-06 21:06:19', '2023-12-06 21:06:19'),
	(34, '789456123', '2023-12-06 09:06:19', 1074, 8, 1082, 'Penerimaan', 21, '2023-12-06 21:06:19', '2023-12-06 21:06:19');

-- Dumping structure for table simfar.satuan
CREATE TABLE IF NOT EXISTS `satuan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table simfar.satuan: ~5 rows (approximately)
INSERT INTO `satuan` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(1, 'Ampul', '2023-04-07 11:33:25', '2023-04-07 11:33:25'),
	(2, 'Tablet', '2023-04-07 11:33:25', '2023-04-07 11:33:25'),
	(3, 'Botol', '2023-04-07 11:33:25', '2023-04-07 11:33:25'),
	(4, 'Kapsul', '2023-04-07 11:33:25', '2023-04-07 11:33:25'),
	(5, 'PCS', '2023-04-07 11:33:25', '2023-04-07 11:33:25');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
