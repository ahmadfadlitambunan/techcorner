-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Des 2021 pada 04.59
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `vkey` varchar(200) NOT NULL,
  `verified` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = not verified\r\n1 = verified\r\n',
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `password`, `name`, `foto`, `level`, `vkey`, `verified`, `created_at`) VALUES
(1, 'ahmadfadlitambunan', 'ahmadfadlitambunan12@gmail.com', '$2y$10$8YGMHtaGkhR5wUrhH.nHcOEkaQ1glIotnsczb01EXhSODLao3VUU2', 'Ahmad Fadli Tambunan', '', 'admin', '3554a33ffaae3a45896d52891ecddb87', '1', '2021-12-05 13:05:21.611547'),
(2, 'aftambunan', 'ahmad.fadlitbn1253@gmail.com', '$2y$10$8BzAgYmRsyEXqoqKTCiIWOFz5PsOZOkH4ihps4YiNjhfnd8.50lMq', 'Ahmad Fadli Tambunan', '', 'member', '4bbdaecad6a739bcb27b8705050ef1db', '1', '2021-12-08 12:02:03.023568'),
(3, 'Kenzie', 'kenziefubrianto@gmail.com', '$2y$10$IYKG9CR.o2l7p2Hi9vZExuBmiC0q7P7EP6y0IuYF6jsH3Xs0TP90y', 'Kenzie', '', 'member', '0455aca6c97bac93dc9958a2c4eee836', '1', '2021-12-23 04:10:52.342573'),
(4, 'Nadya', 'ndyazhra17@gmail.com', '$2y$10$b4qcNpVg3rixdOq8jWhLLe.droFWr2QybMuR80ImBWG0FAIkIXe5S', 'Nadya', '61c51444254ec.png', 'member', 'e3e26888bf7491fe2ea0c3cc6d9878da', '1', '2021-12-23 04:12:22.034827'),
(5, 'Ferdi', 'ferdiakbarnasution@gmail.com', '$2y$10$LxN8R44t8heEWwl9KLZhSu34C0jS4KjHmoX8jN1ZUMA4AFJwnFA3K', 'Ferdi', '61c543c44e8f6.jpg', 'member', '7d8e75a38d66a1351d1dca95d538e1f0', '1', '2021-12-23 04:13:49.243382'),
(6, 'Maria', 'mariapurba003@gmail.com', '$2y$10$ROPQru7eieoZp7k/00Ncfuwn.tPM.pdDpGoRV6e84OYsZGPtAK1si', 'Maria', '', 'member', '9ea3721ea456584fd85d0102da02ca8e', '1', '2021-12-23 04:14:42.752250'),
(7, 'Arya_', 'arya.oppo95@gmail.com', '$2y$10$VDqTOulm4s5zljsUi/Yw9.xzRUfk7G8XsYN6LzuAuOPmBYhpwaAkS', 'Arya_', '', 'member', '5385e0f62ca2d6e79c82185295f329d5', '1', '2021-12-23 04:16:51.758467');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
