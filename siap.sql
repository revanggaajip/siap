-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jun 2022 pada 06.42
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siap`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` varchar(5) NOT NULL,
  `nama_akun` varchar(100) NOT NULL,
  `jenis_akun` enum('Debit','Kredit') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `nama_akun`, `jenis_akun`, `created_at`, `updated_at`) VALUES
('101', 'Kas', 'Debit', '2022-06-09 11:36:29', '2022-06-09 11:36:29'),
('102', 'Persediaan barang dagang', 'Debit', '2022-06-09 11:36:29', '2022-06-09 11:36:29'),
('103', 'Piutang usaha', 'Debit', '2022-06-09 11:36:29', '2022-06-09 11:36:29'),
('400', 'Penjualan', 'Kredit', '2022-06-09 11:36:29', '2022-06-09 11:36:29'),
('402', 'Potongan penjualan', 'Debit', '2022-06-09 11:36:29', '2022-06-09 11:36:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `angsuran`
--

CREATE TABLE `angsuran` (
  `id_angsuran` char(20) NOT NULL,
  `tanggal_angsuran` date NOT NULL,
  `id_transaksi_header` char(20) NOT NULL,
  `nomor_angsuran` int(3) NOT NULL,
  `nominal_angsuran` bigint(20) NOT NULL,
  `piutang_transaksi` bigint(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `angsuran`
--

INSERT INTO `angsuran` (`id_angsuran`, `tanggal_angsuran`, `id_transaksi_header`, `nomor_angsuran`, `nominal_angsuran`, `piutang_transaksi`, `created_at`, `updated_at`) VALUES
('ANG-20220609-1141-48', '2022-06-09', 'TRX-20220609-1140-35', 1, 200000, 0, '2022-06-09 11:41:48', '2022-06-09 11:41:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `satuan_barang` enum('Gram','KG','Drum') NOT NULL,
  `harga_barang` double NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok_barang`, `satuan_barang`, `harga_barang`, `created_at`, `updated_at`) VALUES
(1, 'Barang A', 819, 'Gram', 5000, '2022-06-09 11:37:59', '2022-06-09 11:41:32'),
(2, 'Barang B', 493, 'KG', 500000, '2022-06-09 11:40:32', '2022-06-09 11:41:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal_detail`
--

CREATE TABLE `jurnal_detail` (
  `id_jurnal_detail` bigint(20) UNSIGNED NOT NULL,
  `id_jurnal_header` char(20) NOT NULL,
  `id_akun` varchar(5) NOT NULL,
  `debit` bigint(20) NOT NULL,
  `kredit` bigint(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jurnal_detail`
--

INSERT INTO `jurnal_detail` (`id_jurnal_detail`, `id_jurnal_header`, `id_akun`, `debit`, `kredit`, `created_at`, `updated_at`) VALUES
(1, 'JU-20220609-1138-06', '101', 250000, 0, '2022-06-09 11:38:26', '2022-06-09 11:38:26'),
(2, 'JU-20220609-1138-06', '400', 0, 250000, '2022-06-09 11:38:26', '2022-06-09 11:38:26'),
(3, 'JU-20220609-1140-35', '101', 500000, 0, '2022-06-09 11:41:32', '2022-06-09 11:41:32'),
(4, 'JU-20220609-1140-35', '103', 3155000, 0, '2022-06-09 11:41:32', '2022-06-09 11:41:32'),
(5, 'JU-20220609-1140-35', '400', 0, 3655000, '2022-06-09 11:41:32', '2022-06-09 11:41:32'),
(6, 'JU-20220609-1141-48', '101', 200000, 0, '2022-06-09 11:41:48', '2022-06-09 11:41:48'),
(7, 'JU-20220609-1141-48', '103', 0, 200000, '2022-06-09 11:41:48', '2022-06-09 11:41:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal_header`
--

CREATE TABLE `jurnal_header` (
  `id_jurnal_header` char(19) NOT NULL,
  `status_posting_jurnal` enum('Posting','Belum Posting') NOT NULL,
  `tanggal_jurnal` date NOT NULL,
  `id_transaksi_header` char(20) NOT NULL,
  `keterangan_jurnal` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jurnal_header`
--

INSERT INTO `jurnal_header` (`id_jurnal_header`, `status_posting_jurnal`, `tanggal_jurnal`, `id_transaksi_header`, `keterangan_jurnal`, `created_at`, `updated_at`) VALUES
('JU-20220609-1138-06', 'Belum Posting', '2022-06-09', 'TRX-20220609-1138-06', 'Penjualan', '2022-06-09 11:38:26', '2022-06-09 11:38:26'),
('JU-20220609-1140-35', 'Belum Posting', '2022-06-09', 'TRX-20220609-1140-35', 'Penjualan Kredit', '2022-06-09 11:41:32', '2022-06-09 11:41:32'),
('JU-20220609-1141-48', 'Posting', '2022-06-09', 'TRX-20220609-1140-35', 'Angsuran', '2022-06-09 11:41:48', '2022-06-09 11:41:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2022-03-13-022011', 'App\\Database\\Migrations\\AkunTable', 'default', 'App', 1654749370, 1),
(2, '2022-03-14-164717', 'App\\Database\\Migrations\\PenggunaTable', 'default', 'App', 1654749370, 1),
(3, '2022-03-17-031459', 'App\\Database\\Migrations\\BarangTable', 'default', 'App', 1654749370, 1),
(4, '2022-03-18-171130', 'App\\Database\\Migrations\\PelangganTable', 'default', 'App', 1654749370, 1),
(5, '2022-03-20-152722', 'App\\Database\\Migrations\\TransaksiHeaderTable', 'default', 'App', 1654749370, 1),
(6, '2022-03-20-152738', 'App\\Database\\Migrations\\TransaksiDetailTable', 'default', 'App', 1654749371, 1),
(7, '2022-04-01-064244', 'App\\Database\\Migrations\\JurnalHeaderTable', 'default', 'App', 1654749371, 1),
(8, '2022-04-01-064254', 'App\\Database\\Migrations\\JurnalDetailTable', 'default', 'App', 1654749371, 1),
(9, '2022-04-02-151542', 'App\\Database\\Migrations\\AngsuranTable', 'default', 'App', 1654749371, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` bigint(20) UNSIGNED NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `no_hp_pelanggan` varchar(14) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `no_hp_pelanggan`, `alamat_pelanggan`, `created_at`, `updated_at`) VALUES
(1, 'Udin', '123456', 'Pekalongan', '2022-06-09 11:39:17', '2022-06-09 11:39:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` bigint(20) UNSIGNED NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `tanggal_lahir_pengguna` date NOT NULL,
  `username_pengguna` varchar(50) NOT NULL,
  `password_pengguna` varchar(255) NOT NULL,
  `hak_akses_pengguna` enum('Admin','Pemilik') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `tanggal_lahir_pengguna`, `username_pengguna`, `password_pengguna`, `hak_akses_pengguna`, `created_at`, `updated_at`) VALUES
(1, 'Pemilik', '2022-01-01', 'pemilik', '$2y$10$x5pVMD5ySMVF3lkdFFRM9O46VIGiyUI9xu5p/cKgROMp5ViPkRE9a', 'Pemilik', '2022-06-09 11:36:29', '2022-06-09 11:36:29'),
(2, 'Admin', '2022-01-01', 'admin', '$2y$10$V6LM90QGQVXYSdPqoQAKGOJjHirTWhbUMUDwe15YI/p8ag6fAh3Oa', 'Admin', '2022-06-09 11:36:29', '2022-06-09 11:36:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_transaksi_detail` bigint(20) UNSIGNED NOT NULL,
  `id_transaksi_header` char(20) NOT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `quantity_barang` bigint(20) NOT NULL,
  `subtotal_transaksi` bigint(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_transaksi_detail`, `id_transaksi_header`, `id_barang`, `quantity_barang`, `subtotal_transaksi`, `created_at`, `updated_at`) VALUES
(1, 'TRX-20220609-1138-06', 1, 50, 250000, '2022-06-09 11:38:26', '2022-06-09 11:38:26'),
(2, 'TRX-20220609-1140-35', 1, 31, 155000, '2022-06-09 11:41:32', '2022-06-09 11:41:32'),
(3, 'TRX-20220609-1140-35', 2, 7, 3500000, '2022-06-09 11:41:32', '2022-06-09 11:41:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_header`
--

CREATE TABLE `transaksi_header` (
  `id_transaksi_header` char(20) NOT NULL,
  `id_pelanggan` bigint(20) UNSIGNED DEFAULT NULL,
  `jenis_transaksi` enum('Tunai','Kredit') NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `tanggal_jatuh_tempo_transaksi` date DEFAULT NULL,
  `total_transaksi` bigint(20) NOT NULL,
  `piutang_transaksi` bigint(20) NOT NULL,
  `status_transaksi` enum('Lunas','Belum Lunas') NOT NULL,
  `keterangan_transaksi` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `transaksi_header`
--

INSERT INTO `transaksi_header` (`id_transaksi_header`, `id_pelanggan`, `jenis_transaksi`, `tanggal_transaksi`, `tanggal_jatuh_tempo_transaksi`, `total_transaksi`, `piutang_transaksi`, `status_transaksi`, `keterangan_transaksi`, `created_at`, `updated_at`) VALUES
('TRX-20220609-1138-06', NULL, 'Tunai', '2022-06-09', NULL, 250000, 0, 'Lunas', '', '2022-06-09 11:38:26', '2022-06-09 11:38:26'),
('TRX-20220609-1140-35', 1, 'Kredit', '2022-06-09', '2022-07-09', 3655000, 2955000, 'Belum Lunas', 'Nyoba fitur paylater', '2022-06-09 11:41:32', '2022-06-09 11:41:48');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD UNIQUE KEY `nama_akun` (`nama_akun`);

--
-- Indeks untuk tabel `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`id_angsuran`),
  ADD KEY `angsuran_id_transaksi_header_foreign` (`id_transaksi_header`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `nama_barang` (`nama_barang`);

--
-- Indeks untuk tabel `jurnal_detail`
--
ALTER TABLE `jurnal_detail`
  ADD PRIMARY KEY (`id_jurnal_detail`),
  ADD KEY `jurnal_detail_id_jurnal_header_foreign` (`id_jurnal_header`);

--
-- Indeks untuk tabel `jurnal_header`
--
ALTER TABLE `jurnal_header`
  ADD PRIMARY KEY (`id_jurnal_header`),
  ADD KEY `jurnal_header_id_transaksi_header_foreign` (`id_transaksi_header`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `username_pengguna` (`username_pengguna`);

--
-- Indeks untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_transaksi_detail`),
  ADD KEY `transaksi_detail_id_transaksi_header_foreign` (`id_transaksi_header`),
  ADD KEY `transaksi_detail_id_barang_foreign` (`id_barang`);

--
-- Indeks untuk tabel `transaksi_header`
--
ALTER TABLE `transaksi_header`
  ADD PRIMARY KEY (`id_transaksi_header`),
  ADD KEY `transaksi_header_id_pelanggan_foreign` (`id_pelanggan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jurnal_detail`
--
ALTER TABLE `jurnal_detail`
  MODIFY `id_jurnal_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_transaksi_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `angsuran`
--
ALTER TABLE `angsuran`
  ADD CONSTRAINT `angsuran_id_transaksi_header_foreign` FOREIGN KEY (`id_transaksi_header`) REFERENCES `transaksi_header` (`id_transaksi_header`);

--
-- Ketidakleluasaan untuk tabel `jurnal_detail`
--
ALTER TABLE `jurnal_detail`
  ADD CONSTRAINT `jurnal_detail_id_jurnal_header_foreign` FOREIGN KEY (`id_jurnal_header`) REFERENCES `jurnal_header` (`id_jurnal_header`);

--
-- Ketidakleluasaan untuk tabel `jurnal_header`
--
ALTER TABLE `jurnal_header`
  ADD CONSTRAINT `jurnal_header_id_transaksi_header_foreign` FOREIGN KEY (`id_transaksi_header`) REFERENCES `transaksi_header` (`id_transaksi_header`);

--
-- Ketidakleluasaan untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `transaksi_detail_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `transaksi_detail_id_transaksi_header_foreign` FOREIGN KEY (`id_transaksi_header`) REFERENCES `transaksi_header` (`id_transaksi_header`);

--
-- Ketidakleluasaan untuk tabel `transaksi_header`
--
ALTER TABLE `transaksi_header`
  ADD CONSTRAINT `transaksi_header_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
