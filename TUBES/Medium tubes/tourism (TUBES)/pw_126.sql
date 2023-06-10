-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Bulan Mei 2023 pada 16.37
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw_126`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `budaya_indonesia`
--

CREATE TABLE `budaya_indonesia` (
  `Id` int(11) NOT NULL,
  `Nama` varchar(32) NOT NULL,
  `Berasal` varchar(32) NOT NULL,
  `Tujuan` varchar(32) NOT NULL,
  `Deskripsi` varchar(1024) NOT NULL,
  `Gambar` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `budaya_indonesia`
--

INSERT INTO `budaya_indonesia` (`Id`, `Nama`, `Berasal`, `Tujuan`, `Deskripsi`, `Gambar`) VALUES
(14, 'Bali', 'Pulau Bali, Provinsi Bali', 'Keindahan alam dan budaya', 'Bali terkenal dengan keindahan pantai, teras sawah yang indah, kebudayaan dan tradisi yang kaya, serta kuliner lezat.', 'bali.jpg'),
(15, 'Yogyakarta', 'Provinsi Daerah Istimewa', 'Kota budaya dan sejarah', 'Yogyakarta merupakan kota budaya dan sejarah dengan banyak tempat wisata seperti Candi Borobudur, Keraton Yogyakarta, dan Taman Sari.', '6458fe910f0f9.jpg'),
(16, 'Raja Ampat', 'Papua Barat, Indonesia', 'Menikmati keindahan bawah laut ', 'Raja Ampat terkenal dengan keindahan bawah lautnya yang memukau dengan berbagai spesies ikan, terumbu karang, dan biota laut lainnya.', '6458fe9c28834.jpg'),
(17, 'Komodo National Park', 'Provinsi Nusa Tenggara Timur', 'Melihat komodo dan keindahan ala', 'Komodo National Park adalah tempat yang tepat untuk melihat hewan langka Komodo serta keindahan alam bawah lautnya.', '6458feb0d2045.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(3, 'adis', '$2y$10$SprToE.E51FTTLPq6RD0CO0qLaqKdUSheezRFiC5mlbD8QXjt31Ha'),
(4, 'admin', '$2y$10$a7FgsdiFgJ1bqpXq6Gz/v.Y7g06sej8YiR2HsYXD134VHmoPdCTkK'),
(5, 'admin1', '$2y$10$Ov6tW06O4M3Nb2jsQItdSu.RtakcjrwYUQ1PvXGJiDeQ4hyEQGwpa'),
(6, 'afif', '$2y$10$PFFVAubEpR3E14OAA8qMNOHVxi.tI9R47hks0mtvYD6HxXvgdEV/2'),
(7, 'tester', '$2y$10$UywSosU9QplqqIpXZPALc.2.6BbjCAjB2ABSrnVJYzJSWwXRHJKne'),
(8, 'user', '$2y$10$VQxfL1WOnS1gH8HTUSBoPeJyQfJdJaK2NJbneOlgeuFY3XdYjgRD2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `budaya_indonesia`
--
ALTER TABLE `budaya_indonesia`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `budaya_indonesia`
--
ALTER TABLE `budaya_indonesia`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
