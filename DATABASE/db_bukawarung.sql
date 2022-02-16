-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jan 2022 pada 15.45
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bukawarung`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`) VALUES
(0, 'Akhmal Novanda ', 'admin', 'da0cc0d2a8e07b7fb902836e5a415c54', '+6288299139709', 'example02@gmail.com', 'Jln Merpati 5 No 213 Kelurahan Depok Jaya,kecamatan Pancoran Mas ,kota Depok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`category_id`, `category_name`) VALUES
(21, 'laptop'),
(22, 'hp'),
(23, 'kipas'),
(24, 'Mesin cuci'),
(25, 'Ac'),
(26, 'Printer'),
(27, 'keyboard'),
(28, 'monitor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_status` tinyint(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `category_id`, `product_name`, `product_price`, `product_description`, `product_image`, `product_status`, `date_created`) VALUES
(9, 22, 'Samsung Galaxy A52', 5000000, '<p>Ram 8GB</p>\r\n\r\n<p>Internal 256GB</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'produk1641665022.jpg', 1, '2022-01-08 18:03:42'),
(11, 22, 'Samsung Galaxy A74', 4000000, '<p>Body tipis</p>\r\n\r\n<p>Ram 6GB</p>\r\n\r\n<p>Internal 128GB</p>\r\n', 'produk1641694697.jpg', 1, '2022-01-09 02:18:17'),
(12, 21, 'HP Pavilion AERO', 12000000, '<p>RAM 16GB DDR4</p>\r\n\r\n<p>SSD 512</p>\r\n\r\n<p>Processor AMD RYZEN 7 up to 4,3 GHZ</p>\r\n', 'produk1641815622.png', 1, '2022-01-09 02:20:08'),
(13, 23, 'Kipas Hyundai', 3500000, '<p>Kondisi OKE</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'produk1641902520.jpg', 1, '2022-01-11 12:02:00'),
(14, 25, 'AC LG', 2000000, '<p>Body Mulus, Color White, Nyaman, Anti bising</p>\r\n', 'produk1641902576.jpg', 1, '2022-01-11 12:02:56'),
(15, 24, 'Mesin cuci LG', 4000000, '<p>Barang Oke, suara mulus, Anti bising</p>\r\n', 'produk1641902795.jpg', 1, '2022-01-11 12:06:35'),
(16, 26, 'Printer Epson', 800000, '<p>Kondisi bagus, color black</p>\r\n', 'produk1641902837.jpg', 1, '2022-01-11 12:07:17'),
(17, 27, 'Apple Keyboard MK2A3', 800000, '<p>kondisi bagus</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'produk1641902884.jpg', 1, '2022-01-11 12:08:04'),
(18, 28, 'LG LED Monitor', 1500000, '<p>Kondisi Bagus</p>\r\n', 'produk1641902938.jpg', 1, '2022-01-11 12:08:58'),
(19, 26, 'Printer Canon', 900000, '<p>Kondisi Barang Bagus</p>\r\n', 'produk1641903004.jpg', 1, '2022-01-11 12:10:04'),
(20, 27, 'Keyboard Gaming Logitech', 500000, '<p>Kondisi Keyboard bagus</p>\r\n\r\n<p>Backlight</p>\r\n\r\n<p>Black</p>\r\n', 'produk1641903050.jpg', 0, '2022-01-11 12:10:50'),
(21, 24, 'Mesin cuci Sharp', 900000, '<p>Color white</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'produk1641903120.jpg', 1, '2022-01-11 12:12:00'),
(22, 25, 'AC LG2', 2500000, '<p>Kondisi AC bagus</p>\r\n\r\n<p>Nyaman</p>\r\n', 'produk1641903170.jpg', 1, '2022-01-11 12:12:50'),
(23, 25, 'AC LG', 800000, '<p>AC&nbsp;</p>\r\n', 'produk1642062689.jpg', 1, '2022-01-13 08:31:29');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
