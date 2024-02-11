-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Feb 2024 pada 17.15
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_masyarakat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `NIK` char(16) NOT NULL,
  `Nama` varchar(35) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Telp` varchar(13) NOT NULL,
  `Level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`NIK`, `Nama`, `Username`, `Password`, `Telp`, `Level`) VALUES
('12345', 'haikal', 'kall', 'a01610228fe998f515a72dd730294d87', '09876789', 'masyarakat'),
('4567890987654', 'mustofa', 'musmus', '21c3134ee5edcb618c4f9aae358d73a7', '98765445678', 'masyarakat'),
('7555', 'deden', 'denden11', 'b59c67bf196a4758191e42f76670ceba', '9876789', 'masyarakat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `Id_pengaduan` int(11) NOT NULL,
  `Tgl_pengaduan` date NOT NULL,
  `NIK` char(16) NOT NULL,
  `Judul_laporan` varchar(50) NOT NULL,
  `Isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `Status` enum('0','proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`Id_pengaduan`, `Tgl_pengaduan`, `NIK`, `Judul_laporan`, `Isi_laporan`, `foto`, `Status`) VALUES
(50, '2024-02-11', '4567890987654', 'zaki kecepirit', 'diem doang', '465-IMG_0862.JPG', 'selesai'),
(51, '2024-02-11', '4567890987654', 'jalan buntu', 'qq', '433-20220913_090657.jpg', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `Id_petugas` int(11) NOT NULL,
  `Nama_petugas` varchar(35) NOT NULL,
  `Username` varchar(35) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Telp` varchar(13) NOT NULL,
  `Level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`Id_petugas`, `Nama_petugas`, `Username`, `Password`, `Telp`, `Level`) VALUES
(1, 'Admin1', 'Admin001', 'dcca2ed1630582435afa9d42ce361eb4', '08987656789', 'admin'),
(7, 'mamat', 'memet123', '2d00f43f07911355d4151f13925ff292', '0898556789', 'petugas'),
(8, 'pepe', 'pepe123', 'b4568df26077653eeadf29596708c94b', '09876567890', 'petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `Id_tanggapan` int(11) NOT NULL,
  `Id_pengaduan` int(11) NOT NULL,
  `Tgl_tanggapan` date NOT NULL,
  `Tanggapan` text NOT NULL,
  `Id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tanggapan`
--

INSERT INTO `tanggapan` (`Id_tanggapan`, `Id_pengaduan`, `Tgl_tanggapan`, `Tanggapan`, `Id_petugas`) VALUES
(30, 45, '2024-02-05', '', 1),
(31, 45, '2024-02-05', 'ok', 1),
(32, 45, '2024-02-05', '', 1),
(33, 45, '2024-02-05', 'ok', 1),
(34, 45, '2024-02-06', 'biasalah', 1),
(35, 45, '2024-02-06', 'biasalah', 1),
(36, 46, '2024-02-06', '', 1),
(37, 46, '2024-02-06', 'hhe', 1),
(38, 46, '2024-02-06', 'hhe', 1),
(39, 47, '2024-02-06', 'ok', 1),
(40, 48, '2024-02-11', 'yaudah lanjutkan', 1),
(41, 49, '2024-02-11', 'ok\r\n', 1),
(42, 50, '2024-02-11', 'ga kaget', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`NIK`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`Id_pengaduan`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`Id_petugas`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`Id_tanggapan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `Id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `Id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `Id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
