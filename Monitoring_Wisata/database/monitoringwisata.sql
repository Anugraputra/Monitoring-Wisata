-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jul 2022 pada 12.09
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoringwisata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `icon`
--

CREATE TABLE `icon` (
  `id_tipe` int(11) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `icon`
--

INSERT INTO `icon` (`id_tipe`, `tipe`, `image_path`) VALUES
(1, 'Resto', 'assets/icon_maps/icons8-restaurant.png'),
(2, 'Gunung', 'assets/icon_maps/icons8-mountains.png'),
(3, 'Danau', 'assets/icon_maps/icons8-lake.png'),
(4, 'Bangunan Sejarah', 'assets/icon_maps/icons8-building.png'),
(5, 'Mall', 'assets/icon_maps/icons8-shopping-mall.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'anugra', '$2y$10$bgroZyRPHMOee9yV3AzYcOAQm0FCd7Ud7YMwsmt.d6/FlzmGGotIO'),
(2, 'putra', '$2y$10$7n8ICW9Z4GcOE1.e503NpudV0A0zPy2Cxqfr1RTj8dCl5aNXH/KQa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `gambar` varchar(64) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `latitude` varchar(64) NOT NULL,
  `longtitude` varchar(64) NOT NULL,
  `ket` varchar(64) NOT NULL,
  `id_tipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`id`, `nama`, `gambar`, `alamat`, `latitude`, `longtitude`, `ket`, `id_tipe`) VALUES
(20, 'Gunung Walu', '', 'Area Hutan, Gondosuli, Kec. Tawangmangu, Kabupaten Karanganyar, Jawa Tengah', '-7.6274995', '111.176657', 'Gunung', 2),
(21, 'Beachwalk Shopping Center', 'Beachwalk.jpg', 'Jl. Pantai Kuta, Kuta, Kec. Kuta, Kabupaten Badung, Bali 80361', '-8.7356207', '115.1397459', 'Mall', 5),
(22, 'Monumen Bajra Sandhi', 'MonumenBajraSandhiRenon.jpeg', 'Jl. Raya Puputan No.142, Panjer, Denpasar Selatan, Kota Denpasar, Bali 80234', '-8.6717295', '115.2317133', 'Bangunan Sejarah', 4),
(23, 'Danau Linting', 'danaulinting.jpg', 'Rumah Rih, Kec. Sinembah Tj. Muda Hulu, Kabupaten Deli Serdang, Sumatera Utara', '3.2295876,98', '98.7235657', 'Danau', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `icon`
--
ALTER TABLE `icon`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
