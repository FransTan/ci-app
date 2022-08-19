-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2021 at 06:27 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci-app_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pembayaran` varchar(255) NOT NULL,
  `tgl_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `user`, `pembayaran`, `tgl_bayar`) VALUES
(21, 'Kasir1 (Dewata)', 'Dana', '0000-00-00 00:00:00'),
(22, 'Kasir1 (Dewata)', 'OVO', '2021-12-26 00:00:00'),
(23, 'Kasir1 (Dewata)', 'Gopay', '2021-12-26 15:30:46'),
(24, 'Manager', 'Gopay', '2021-12-26 23:39:55'),
(25, 'Manager', 'Cash', '2021-12-26 23:56:21'),
(26, 'Manager', 'Gopay', '2021-12-27 00:06:20'),
(27, 'Manager', 'Gopay', '2021-12-27 00:10:12'),
(28, 'Budi dermawan', 'OVO', '2021-12-28 22:10:33'),
(29, 'Budi dermawan', 'Gopay', '2021-12-28 22:11:31'),
(30, 'Budi dermawan', 'Debit', '2021-12-29 10:52:10'),
(31, 'Kasir Restoran Kola', 'OVO', '2021-12-29 11:09:53'),
(32, 'Budi dermawan', 'Gopay', '2021-12-29 11:32:53');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `pilihan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `id_invoice`, `id_produk`, `nama`, `jumlah`, `harga`, `pilihan`) VALUES
(40, 21, 1, 'Nasi udang', 1, 15000, ''),
(41, 21, 15, 'Ikan Bakar', 1, 30000, ''),
(42, 21, 18, 'Coca Cola', 2, 7000, ''),
(43, 22, 1, 'Nasi udang', 1, 15000, ''),
(44, 22, 15, 'Ikan Bakar', 1, 30000, ''),
(45, 22, 18, 'Coca Cola', 2, 7000, ''),
(46, 23, 1, 'Nasi udang', 1, 15000, ''),
(47, 23, 15, 'Ikan Bakar', 1, 30000, ''),
(48, 23, 18, 'Coca Cola', 2, 7000, ''),
(49, 24, 1, 'Nasi udang', 1, 15000, ''),
(50, 25, 1, 'Nasi udang', 1, 15000, ''),
(51, 26, 1, 'Nasi udang', 1, 15000, ''),
(52, 26, 15, 'Ikan Bakar', 1, 30000, ''),
(53, 27, 18, 'Coca Cola', 1, 7000, ''),
(54, 28, 1, 'Nasi udang', 1, 15000, ''),
(55, 29, 18, 'Coca Cola', 1, 7000, ''),
(56, 30, 15, 'Ikan Bakar', 1, 30000, ''),
(57, 31, 15, 'Ikan Bakar', 2, 30000, ''),
(58, 31, 20, 'Kerang Hijau Saus Tiram', 1, 45000, ''),
(59, 32, 15, 'Ikan Bakar', 1, 30000, ''),
(60, 32, 20, 'Kerang Hijau Saus Tiram', 1, 45000, ''),
(61, 32, 12, 'Fanta', 1, 7000, ''),
(62, 32, 18, 'Coca Cola', 1, 7000, ''),
(63, 32, 16, 'Ayam Goreng', 1, 11000, ''),
(64, 32, 23, 'Bebek Goreng Sinjay', 1, 17000, ''),
(65, 32, 22, 'Nasi Putih', 2, 5000, '');

-- --------------------------------------------------------

--
-- Table structure for table `produk_access`
--

CREATE TABLE `produk_access` (
  `id` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_access`
--

INSERT INTO `produk_access` (`id`, `jenis_id`, `kategori_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `produk_jenis`
--

CREATE TABLE `produk_jenis` (
  `id` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_jenis`
--

INSERT INTO `produk_jenis` (`id`, `jenis`) VALUES
(1, 'Makanan'),
(2, 'Minuman');

-- --------------------------------------------------------

--
-- Table structure for table `produk_kategori`
--

CREATE TABLE `produk_kategori` (
  `id` int(11) NOT NULL,
  `jenis` varchar(156) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_kategori`
--

INSERT INTO `produk_kategori` (`id`, `jenis`, `kategori`) VALUES
(1, 'Makanan', 'Seafood'),
(2, 'Makanan', 'Snack'),
(3, 'Makanan', 'Nasi'),
(6, 'Minuman', 'Softdrink'),
(11, 'Makanan', 'Gorengan'),
(12, 'Minuman', 'Sehat');

-- --------------------------------------------------------

--
-- Table structure for table `produk_list`
--

CREATE TABLE `produk_list` (
  `id` int(11) NOT NULL,
  `image` varchar(256) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `produk` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_list`
--

INSERT INTO `produk_list` (`id`, `image`, `jenis`, `kategori`, `produk`, `harga`) VALUES
(1, 'nasi_goreng.jpg', 'Makanan', 'Nasi', 'Nasi Goreng', 15000),
(12, 'fanta.jpg', 'Minuman', 'Softdrink', 'Fanta', 7000),
(14, 'tahu_goreng3.jpg', 'Makanan', 'Snack', 'Tahu Goreng', 1500),
(15, 'ikan_bakar.jpg', 'Makanan', 'Seafood', 'Ikan Bakar', 30000),
(16, 'ayam_goreng.jpg', 'Makanan', 'Gorengan', 'Ayam Goreng', 11000),
(17, 'susu.jpg', 'Minuman', 'Sehat', 'Susu', 4000),
(18, 'coca_cola.jpg', 'Minuman', 'Softdrink', 'Coca Cola', 7000),
(19, 'air.jpg', 'Minuman', 'Sehat', 'Air Mineral', 4000),
(20, 'kerang_hijau.jpg', 'Makanan', 'Seafood', 'Kerang Hijau Saus Tiram', 45000),
(21, 'kentang_goreng.jpg', 'Makanan', 'Snack', 'Kentang Goreng', 10000),
(22, 'nasi_putih.jpg', 'Makanan', 'Nasi', 'Nasi Putih', 5000),
(23, 'bebek.jpg', 'Makanan', 'Gorengan', 'Bebek Goreng Sinjay', 17000);

-- --------------------------------------------------------

--
-- Table structure for table `produk_menu`
--

CREATE TABLE `produk_menu` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `produk` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_menu`
--

INSERT INTO `produk_menu` (`id`, `kategori_id`, `produk`, `harga`) VALUES
(1, 3, 'Nasi Goreng', 12000),
(2, 1, 'Mie udang', 15000),
(3, 2, 'Kentang goreng', 8000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Kasir Restoran Kola', 'fransiskus847@gmail.com', 'logo_pos.png', '$2y$10$Xtan5xhmbZNex/g2s.gWTutDaFzUwavycK9cqyRavQHGydBegywom', 2, 1, 1638793547),
(2, 'Budi dermawan', 'fransjonathan676@gmail.com', 'H4800d3af50e44350827bc5c52cb399edc.jpg', '$2y$10$/MPSClYaW5ndaXaR9gNQ6eGMiuhVufOm8CyuR71FTUxNItZ2HRFh2', 1, 1, 1638793576),
(3, 'qwer', 'pratamalutfi60@gmail.com', 'default.jpg', '$2y$10$4FFhgoL0h..BEgyr20HTT.cDzO/SVKwfh8DzuVlQb5vSmXTJUSNOy', 1, 1, 1638806583),
(4, 'admin', 'pratamalutfi@gmail.com', 'default.jpg', 'admin123', 1, 1, 0),
(5, 'Lutfi', 'pratamalutfqqwi@gmail.com', 'default.jpg', '$2y$10$ZDT.ewGuUnf7T2icSZq0Yen1vJnnMAGXPTN85IjNJRPxDPtvMVciq', 2, 1, 1638837975),
(6, 'Kasir1 (Dewata)', 'irfan0708helmi@gmail.com', 'Lunux.png', '$2y$10$pS4cx6ymN/L3mZ0UuWC.CuQCaAYRPP9jvMFg1Inw0A6G5v/A8PCI2', 1, 1, 1638928772);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(19, 1, 59),
(20, 1, 60),
(24, 5, 3),
(25, 5, 60),
(27, 2, 61),
(28, 1, 61);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(60, 'Manajemen Produk'),
(61, 'Transaksi');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Kasir'),
(5, 'Satpam');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(10, 59, 'Coba2', 'menu', 'fas fa-fw fa-folder-open', 1),
(11, 60, 'Produk', 'produk', 'fas fa-fw fa-utensils', 1),
(12, 60, 'Kategori', 'produk/kategori', 'fas fa-fw fa-list-alt', 1),
(13, 61, 'Penjualan', 'penjualan', 'fas fa-fw fa-money-check-alt', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk_access`
--
ALTER TABLE `produk_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk_jenis`
--
ALTER TABLE `produk_jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk_kategori`
--
ALTER TABLE `produk_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk_list`
--
ALTER TABLE `produk_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk_menu`
--
ALTER TABLE `produk_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `produk_access`
--
ALTER TABLE `produk_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk_jenis`
--
ALTER TABLE `produk_jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk_kategori`
--
ALTER TABLE `produk_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `produk_list`
--
ALTER TABLE `produk_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `produk_menu`
--
ALTER TABLE `produk_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
