-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jul 2023 pada 12.38
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sewa_mobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_merek_mobil`
--

CREATE TABLE `tbl_merek_mobil` (
  `id_merek` int(11) NOT NULL,
  `merek` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_merek_mobil`
--

INSERT INTO `tbl_merek_mobil` (`id_merek`, `merek`) VALUES
(1, 'Toyota'),
(2, 'Honda'),
(3, 'Daihatsu'),
(4, 'Suzuki'),
(5, 'Mitsubishi'),
(6, 'Nissan'),
(7, 'Mazda'),
(8, 'Wuling'),
(9, 'Hyundai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mobil`
--

CREATE TABLE `tbl_mobil` (
  `id_mobil` int(11) NOT NULL,
  `plat_nomor` varchar(10) NOT NULL,
  `id_merek` int(11) NOT NULL,
  `id_model` int(11) NOT NULL,
  `tarif_sewa` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `status` enum('ORDER','NO-ORDER','HIST') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_mobil`
--

INSERT INTO `tbl_mobil` (`id_mobil`, `plat_nomor`, `id_merek`, `id_model`, `tarif_sewa`, `id_pengguna`, `status`) VALUES
(1, 'D1001TR', 2, 16, 210000, 1, 'NO-ORDER'),
(2, 'D2002TR', 1, 1, 220000, 1, 'NO-ORDER'),
(3, 'D3003TR', 5, 44, 300000, 1, 'NO-ORDER'),
(4, 'D4004TR', 4, 34, 260000, 1, 'NO-ORDER'),
(5, 'D5005TR', 6, 46, 260000, 1, 'NO-ORDER'),
(6, 'D6006RK', 1, 2, 26000, 2, 'NO-ORDER');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_model_mobil`
--

CREATE TABLE `tbl_model_mobil` (
  `id_model` int(11) NOT NULL,
  `model` varchar(15) NOT NULL,
  `id_merek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_model_mobil`
--

INSERT INTO `tbl_model_mobil` (`id_model`, `model`, `id_merek`) VALUES
(1, 'Agya', 1),
(2, 'Avanza', 1),
(3, 'Calya', 1),
(4, 'Camry', 1),
(5, 'Etios', 1),
(6, 'Etios Valco', 1),
(7, 'Fortuner', 1),
(8, 'Kijang Innova', 1),
(9, 'Raize', 1),
(10, 'Rush', 1),
(11, 'Sienta', 1),
(12, 'Vios', 1),
(13, 'Yaris', 1),
(14, 'BR-V', 2),
(15, 'Brio', 2),
(16, 'Brio Satya', 2),
(17, 'CR-V', 2),
(18, 'City', 2),
(19, 'Civic', 2),
(20, 'Freed', 2),
(21, 'HR-V', 2),
(22, 'Jazz', 2),
(23, 'Mobilio', 2),
(24, 'Ayla', 3),
(25, 'Gran max', 3),
(26, 'Luxio', 3),
(27, 'Sigra', 3),
(28, 'Sirion', 3),
(29, 'Terios', 3),
(30, 'Xenia', 3),
(31, 'APV', 4),
(32, 'APV Arena', 4),
(33, 'Baleno', 4),
(34, 'Ertiga', 4),
(35, 'Ignis', 4),
(36, 'Karimun Wagon R', 4),
(37, 'SX4', 4),
(38, 'Splash', 4),
(39, 'Swift', 4),
(40, 'XL7', 4),
(41, 'Mirage', 5),
(42, 'Outlander Sport', 5),
(43, 'Pajero Sport', 5),
(44, 'Xpander', 5),
(45, 'Evalia', 6),
(46, 'Grand livina', 6),
(47, 'Juke', 6),
(48, 'Livina', 6),
(49, 'March', 6),
(50, 'Serena', 6),
(51, 'X-Trail', 6),
(52, '2', 7),
(53, 'Biante', 7),
(54, 'CX-3', 7),
(55, 'CX-5', 7),
(56, 'Almaz', 8),
(57, 'Confero', 8),
(58, 'Confero S', 8),
(59, 'Cortez', 8),
(60, 'Grand Avega', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `nomor_telpon` varchar(15) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `nomor_sim` varchar(14) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id_pengguna`, `nama`, `nomor_telpon`, `alamat`, `nomor_sim`, `password`) VALUES
(1, 'Teddy A', '085222286863', 'jalan Cikoneng', '21474836471234', '962b2d2b8e72dc6771bca613d49b46fb'),
(2, 'Andrianto', '085222286868', 'Cikoneng', '12121212121212', '962b2d2b8e72dc6771bca613d49b46fb');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sewa`
--

CREATE TABLE `tbl_sewa` (
  `id_sewa` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `status` enum('ORDER','NO-ORDER') NOT NULL,
  `tarif_sewa` int(11) NOT NULL,
  `lama_sewa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_merek_mobil`
--
ALTER TABLE `tbl_merek_mobil`
  ADD PRIMARY KEY (`id_merek`);

--
-- Indeks untuk tabel `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indeks untuk tabel `tbl_model_mobil`
--
ALTER TABLE `tbl_model_mobil`
  ADD PRIMARY KEY (`id_model`);

--
-- Indeks untuk tabel `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `tbl_sewa`
--
ALTER TABLE `tbl_sewa`
  ADD PRIMARY KEY (`id_sewa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_merek_mobil`
--
ALTER TABLE `tbl_merek_mobil`
  MODIFY `id_merek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_model_mobil`
--
ALTER TABLE `tbl_model_mobil`
  MODIFY `id_model` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_sewa`
--
ALTER TABLE `tbl_sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
