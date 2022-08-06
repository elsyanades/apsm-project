-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Agu 2022 pada 06.21
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
-- Database: `db_srpekspress`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id_cust` bigint(20) UNSIGNED NOT NULL,
  `nama_cust` varchar(60) NOT NULL,
  `alamat_cust` text NOT NULL,
  `telp_cust` varchar(20) NOT NULL,
  `jabatan_cust` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id_cust`, `nama_cust`, `alamat_cust`, `telp_cust`, `jabatan_cust`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'elsyana', 'el2bn ', '1233333', 'contoh', NULL, NULL, NULL),
(2, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(3, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(7, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(8, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(9, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(11, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(12, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(13, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(14, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(15, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(16, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(17, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(18, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(19, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(20, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(21, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(22, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(23, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(24, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(25, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(26, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(27, 'contoh', 'el2', '1', 'contohels', NULL, NULL, NULL),
(28, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(29, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(30, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(31, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(32, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(33, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(34, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(35, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(36, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(37, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(38, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(39, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(40, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(43, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(45, 'contoh', 'el2', '1', 'contoh', NULL, NULL, NULL),
(46, 'els', 'el2', '12', 'contoh', NULL, NULL, NULL),
(47, 'elsy', 'contoh', '12', 'contoh', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `levels`
--

CREATE TABLE `levels` (
  `levelid` int(11) NOT NULL,
  `levelnama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `levels`
--

INSERT INTO `levels` (`levelid`, `levelnama`) VALUES
(1, 'Superuser'),
(2, 'Marketing'),
(3, 'Staff OPS'),
(4, 'Kepala OPS'),
(5, 'Monitoring CS'),
(6, 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_table`
--

CREATE TABLE `master_table` (
  `id` int(20) NOT NULL,
  `no_order` varchar(20) NOT NULL,
  `tgl_order` date NOT NULL,
  `nama_cust` varchar(60) NOT NULL,
  `kota_tujuan` varchar(20) NOT NULL,
  `nama_vendor` varchar(50) NOT NULL,
  `nama_handling` varchar(50) NOT NULL,
  `status_marketing` varchar(30) NOT NULL,
  `jenis_armada` varchar(30) NOT NULL,
  `data_armada` varchar(50) NOT NULL,
  `staf_ops` varchar(30) NOT NULL,
  `status_pickup` varchar(30) NOT NULL,
  `status_loading` varchar(30) NOT NULL,
  `nama_vendor2` varchar(50) NOT NULL,
  `status_ops` varchar(30) NOT NULL,
  `status_barang` varchar(30) NOT NULL,
  `status_surat_jalan` varchar(30) NOT NULL,
  `status_staf_ops` varchar(30) NOT NULL,
  `status_barang_ke_vendor` varchar(30) NOT NULL,
  `status_barang_handling` varchar(30) NOT NULL,
  `status_barang_sudah_diterima` varchar(30) NOT NULL,
  `update_status_ke_customer` varchar(30) NOT NULL,
  `status_surat_jalan_kembali` varchar(30) NOT NULL,
  `upload_dokumen` varchar(60) NOT NULL,
  `status_monitoring_cs` varchar(30) NOT NULL,
  `no_surat_jalan` varchar(30) NOT NULL,
  `status_pembayaran` varchar(30) NOT NULL,
  `status_admin` varchar(30) NOT NULL,
  `proses_muat` varchar(60) NOT NULL,
  `proses_bongkar` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_table`
--

INSERT INTO `master_table` (`id`, `no_order`, `tgl_order`, `nama_cust`, `kota_tujuan`, `nama_vendor`, `nama_handling`, `status_marketing`, `jenis_armada`, `data_armada`, `staf_ops`, `status_pickup`, `status_loading`, `nama_vendor2`, `status_ops`, `status_barang`, `status_surat_jalan`, `status_staf_ops`, `status_barang_ke_vendor`, `status_barang_handling`, `status_barang_sudah_diterima`, `update_status_ke_customer`, `status_surat_jalan_kembali`, `upload_dokumen`, `status_monitoring_cs`, `no_surat_jalan`, `status_pembayaran`, `status_admin`, `proses_muat`, `proses_bongkar`) VALUES
(7, 'OR01', '2022-08-04', 'els', 'contoh', 'el', 'contoh', 'elsy', 'contoh1', 'contoh', 'contoh', 'contoh', 'contoh', 'contoh', 'contoh', 'contoh', 'contoh', 'contoh', 'contoh', 'contoh', 'contoh', 'contoh', 'contoh', 'contoh', 'contoh', 'contoh', 'contoh', 'contoh', 'vghnjh', 'hbnjm'),
(8, 'OR02', '0000-00-00', 'els', 'els', 'els', 'els', 'els', 'contoh', 'contoh', 'contoh', 'contoh', 'contoh', 'contoh', 'contoh', 'contoh', 'contoh', 'contoh', 'contoh', 'contoh', 'contoh', 'contoh', 'contoh', 'contoh', 'contoh', '213456', 'contoh', 'contoh', 'vghnjh', 'hbnjm'),
(10, 'OR03', '0000-00-00', 'els', 'contoh', 'el', 'contoh', 'loading', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 'OR04', '0000-00-00', 'el', 'contoh', 'el', 'contoh', 'el', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 'OR05', '0000-00-00', 'els', 'contoh', 'el', 'els', 'loading', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, '0R06', '0000-00-00', 'el', 'contoh', 'el', 'els', 'elsy', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, '0R07', '0000-00-00', 'el', 'contoh', 'contoh', 'contoh', 'els', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nama_user` varchar(60) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `password_user` varchar(60) NOT NULL,
  `userlevelid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `username`, `email_user`, `password_user`, `userlevelid`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '$2y$10$uYLFzjkqKXKYYLU8B3/pterQCWdtZ.WnnTQ3STGziu8crspp1oSZy', 6),
(2, 'superuser', 'superuser', 'superuser@gmail.com', '$2y$10$eoVNsVrYfzmvkzMid50xSuWadq3Ef8QrP1ikN9juUnUi74M.zYHd2', 1),
(3, 'marketing', 'marketing', 'marketing@gmail.com', '$2y$10$yl1cn.p0/0DkDcbrFS03c.DcZRkFtTxxkpwct4KHYxUKT/M2lu65a', 2),
(4, 'operasional', 'operasional', 'operasional@gmail.com', '$2y$10$oWm1ous3IYPuaj9FZDjzi.IOVbf49wpT/cKswOH7TfpcpCnoQzPKy', 3),
(7, 'admin2', 'admin2', 'admin2@gmail.com', '$2a$12$nR2Tv69VxuElbh3cBBiQfua9ubdeIIaBF4lYX8Kn0OhlvGUWHlvF.', 6),
(8, 'superuser2', 'superuser2', 'superuser2@gmail.com', '$2y$10$/c9psfda2Oce.hGYe4uro.AiSxbbl.rCh/nziT298ftFZiTAb2GYK', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor`
--

CREATE TABLE `vendor` (
  `id_vendor` int(11) NOT NULL,
  `nama_vendor` varchar(30) NOT NULL,
  `alamat_vendor` varchar(50) NOT NULL,
  `telp_vendor` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `vendor`
--

INSERT INTO `vendor` (`id_vendor`, `nama_vendor`, `alamat_vendor`, `telp_vendor`) VALUES
(6, 'els', 'contohh', 56789),
(10, 'drftgsha', 'cgvjh', 321778),
(11, 'ghuj', 'jbbbhj', 45),
(12, 'elsyy', 'fhgjh', 56789),
(13, 'hjm', 'ygjh', 789),
(15, 'hvm', 'tf', 987),
(16, 'hjtrdgf', 'yttfhg', 989),
(17, 'ukjm', 'edfg', 45),
(18, 'egfh1', 'fhg', 89),
(19, 'hj2', 'ijk', 87),
(20, 'uihj3', 'tuygjh', 2435),
(21, 'contoh', 'contohh', 56789);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_cust`);

--
-- Indeks untuk tabel `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`levelid`);

--
-- Indeks untuk tabel `master_table`
--
ALTER TABLE `master_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_order` (`no_order`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `FK_level` (`userlevelid`);

--
-- Indeks untuk tabel `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id_vendor`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id_cust` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `levels`
--
ALTER TABLE `levels`
  MODIFY `levelid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `master_table`
--
ALTER TABLE `master_table`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_level` FOREIGN KEY (`userlevelid`) REFERENCES `levels` (`levelid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
