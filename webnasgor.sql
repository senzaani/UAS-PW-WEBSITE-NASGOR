-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jan 2025 pada 16.22
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webnasgor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `name`, `description`, `price`, `image`) VALUES
(1, 'Nasi goreng mawut', 'TAMBAH TOPPING', 12000.00, 'path-to-nasgor-mawut.jpg'),
(2, 'Nasi goreng spesial', 'Bisa tambah topping monnggo', 15000.00, 'path-to-nasgor-spesial.jpg'),
(3, 'Nasi Goreng Hongkong', 'TAMBAH TOPPING Sesuai request kak', 16000.00, 'path-to-nasgor-hongkong.jpg'),
(4, 'Nasi Goreng Jawa', 'TAMBAH TOPPING bisa kak sesuai request', 12000.00, 'path-to-nasgor-jawa.jpg'),
(5, 'Nasi Goreng Seafood', 'TAMBAH TOPPING sesuai request bisa kak', 20000.00, 'path-to-nasgor-seafood.jpg'),
(6, 'Es Jeruk ', 'Bisa request tanpa gula dan jeruk anget ', 5000.00, 'path-to-Es-Jeruk copy.jpg'),
(7, 'Es teh', 'bisa request tanpa gula atau sedikit gula dan teh hangat', 4000.00, 'path-to-Es-teh.jpg'),
(8, 'Air Mineral', 'Dingin dan tidak dingin', 3000.00, 'path-to-Air-Mineral copy.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
