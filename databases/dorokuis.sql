-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Feb 2023 pada 08.31
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dorokuis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gquiz`
--

CREATE TABLE `gquiz` (
  `id` int(4) NOT NULL,
  `ncode` int(5) NOT NULL,
  `qid` int(6) NOT NULL,
  `gname` varchar(300) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `gtime` int(6) NOT NULL,
  `gscore` int(10) NOT NULL,
  `gnum` int(3) NOT NULL,
  `gquest` varchar(255) NOT NULL,
  `opa` varchar(150) NOT NULL,
  `opb` varchar(150) NOT NULL,
  `opc` varchar(150) NOT NULL,
  `opd` varchar(150) NOT NULL,
  `gans` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gquiz`
--

INSERT INTO `gquiz` (`id`, `ncode`, `qid`, `gname`, `gtime`, `gscore`, `gnum`, `gquest`, `opa`, `opb`, `opc`, `opd`, `gans`) VALUES
(2, 268116, 21417, '4 x 6 = ?', 400, 200, 1, '4 x 6 = ?', '21', '12', '48', '24', 'd'),
(3, 717171, 21417, '81 / 9 = ?', 400, 200, 2, '81 / 9 = ?', '7', '9', '27', '5', 'b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz`
--

CREATE TABLE `quiz` (
  `id` int(6) NOT NULL,
  `qid` int(6) NOT NULL,
  `author_id` int(6) NOT NULL,
  `name` varchar(64) NOT NULL,
  `option` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `quiz`
--

INSERT INTO `quiz` (`id`, `qid`, `author_id`, `name`, `option`, `type`) VALUES
(1, 21417, 293825, 'Basic Math', 'multichoice', 'mathematics'),
(3, 59411, 766818, 'Simple tab', 'multichoice', 'biology');

-- --------------------------------------------------------

--
-- Struktur dari tabel `userccount`
--

CREATE TABLE `userccount` (
  `usermail` varchar(20) NOT NULL,
  `userpass` varchar(16) NOT NULL,
  `username` varchar(25) NOT NULL,
  `id` int(8) NOT NULL,
  `u_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `userccount`
--

INSERT INTO `userccount` (`usermail`, `userpass`, `username`, `id`, `u_id`) VALUES
('rusdi@gmail.com', 'rusdi1234', 'rusdifirman', 1, 293825),
('rai@gmail.com', 'etgtgrdet54seyh', 'RaiDan', 2, 766818);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gquiz`
--
ALTER TABLE `gquiz`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `userccount`
--
ALTER TABLE `userccount`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gquiz`
--
ALTER TABLE `gquiz`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `userccount`
--
ALTER TABLE `userccount`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
