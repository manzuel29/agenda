-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Apr 2023 pada 15.31
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
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(125) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `email`, `password`) VALUES
(1, 'zulfan', 'mnashwa315@gmail.com', '$2y$10$uBfNQ5WsqIFsC7prAgOiJu78vxOcoryx0RhP./UEQkUwWM7oz7Yb6'),
(2, 'Leonardo', 'zulfapetarukan@gmail.com', '$2y$10$w24/s7xSdP9.Zi6Vob3v9esVDTSORNisqgqmwknHoOUY0EljdOXCS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda_pembatalan`
--

CREATE TABLE `agenda_pembatalan` (
  `no_pembatalan` int(11) NOT NULL,
  `nosurat` varchar(20) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `no_porsi` char(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `agenda_pembatalan`
--

INSERT INTO `agenda_pembatalan` (`no_pembatalan`, `nosurat`, `tanggal_surat`, `no_porsi`, `nama`, `alamat`, `status`) VALUES
(1, 'B-3/2023/20', '2023-04-21', '10010186', 'Sobar', 'Kec Watukumpul', 'BELUM'),
(2, 'B-1/2023/20', '2023-04-20', '10010190', 'Tommy', 'Kec Moga', 'CAIR'),
(3, 'B-3/2023/20', '2023-04-20', '10010195', 'Ajiz', 'Kec Comal', 'CAIR'),
(37, 'B-11232242424', '2023-04-16', '11002234', 'Muh Nashwa Zulfan Syah', 'Klareyan', 'Cair');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `agenda_pembatalan`
--
ALTER TABLE `agenda_pembatalan`
  ADD PRIMARY KEY (`no_pembatalan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `agenda_pembatalan`
--
ALTER TABLE `agenda_pembatalan`
  MODIFY `no_pembatalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
