-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 12 Feb 2026 pada 15.38
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
-- Database: `db_akademik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `NIP` varchar(20) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Alamat` text DEFAULT NULL,
  `Nohp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongan`
--

CREATE TABLE `golongan` (
  `id_Gol` varchar(10) NOT NULL,
  `nama_Gol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_akademik`
--

CREATE TABLE `jadwal_akademik` (
  `id_jadwal` int(11) NOT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `Kode_mk` varchar(10) DEFAULT NULL,
  `id_ruang` varchar(10) DEFAULT NULL,
  `id_Gol` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs`
--

CREATE TABLE `krs` (
  `NIM` varchar(15) NOT NULL,
  `Kode_mk` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` varchar(15) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Alamat` text DEFAULT NULL,
  `Nohp` varchar(15) DEFAULT NULL,
  `Semester` int(11) DEFAULT NULL,
  `id_Gol` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `Kode_mk` varchar(10) NOT NULL,
  `Nama_mk` varchar(100) NOT NULL,
  `sks` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengampu`
--

CREATE TABLE `pengampu` (
  `Kode_mk` varchar(10) NOT NULL,
  `NIP` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi_akademik`
--

CREATE TABLE `presensi_akademik` (
  `id_presensi` int(11) NOT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `status_kehadiran` varchar(20) DEFAULT NULL,
  `NIM` varchar(15) DEFAULT NULL,
  `Kode_mk` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` varchar(10) NOT NULL,
  `nama_ruang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`NIP`);

--
-- Indeks untuk tabel `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_Gol`);

--
-- Indeks untuk tabel `jadwal_akademik`
--
ALTER TABLE `jadwal_akademik`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `Kode_mk` (`Kode_mk`),
  ADD KEY `id_ruang` (`id_ruang`),
  ADD KEY `id_Gol` (`id_Gol`);

--
-- Indeks untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`NIM`,`Kode_mk`),
  ADD KEY `Kode_mk` (`Kode_mk`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`),
  ADD KEY `id_Gol` (`id_Gol`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`Kode_mk`);

--
-- Indeks untuk tabel `pengampu`
--
ALTER TABLE `pengampu`
  ADD PRIMARY KEY (`Kode_mk`,`NIP`),
  ADD KEY `NIP` (`NIP`);

--
-- Indeks untuk tabel `presensi_akademik`
--
ALTER TABLE `presensi_akademik`
  ADD PRIMARY KEY (`id_presensi`),
  ADD KEY `NIM` (`NIM`),
  ADD KEY `Kode_mk` (`Kode_mk`);

--
-- Indeks untuk tabel `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal_akademik`
--
ALTER TABLE `jadwal_akademik`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `presensi_akademik`
--
ALTER TABLE `presensi_akademik`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal_akademik`
--
ALTER TABLE `jadwal_akademik`
  ADD CONSTRAINT `jadwal_akademik_ibfk_1` FOREIGN KEY (`Kode_mk`) REFERENCES `matakuliah` (`Kode_mk`),
  ADD CONSTRAINT `jadwal_akademik_ibfk_2` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`),
  ADD CONSTRAINT `jadwal_akademik_ibfk_3` FOREIGN KEY (`id_Gol`) REFERENCES `golongan` (`id_Gol`);

--
-- Ketidakleluasaan untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `krs_ibfk_1` FOREIGN KEY (`NIM`) REFERENCES `mahasiswa` (`NIM`),
  ADD CONSTRAINT `krs_ibfk_2` FOREIGN KEY (`Kode_mk`) REFERENCES `matakuliah` (`Kode_mk`);

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_Gol`) REFERENCES `golongan` (`id_Gol`);

--
-- Ketidakleluasaan untuk tabel `pengampu`
--
ALTER TABLE `pengampu`
  ADD CONSTRAINT `pengampu_ibfk_1` FOREIGN KEY (`Kode_mk`) REFERENCES `matakuliah` (`Kode_mk`),
  ADD CONSTRAINT `pengampu_ibfk_2` FOREIGN KEY (`NIP`) REFERENCES `dosen` (`NIP`);

--
-- Ketidakleluasaan untuk tabel `presensi_akademik`
--
ALTER TABLE `presensi_akademik`
  ADD CONSTRAINT `presensi_akademik_ibfk_1` FOREIGN KEY (`NIM`) REFERENCES `mahasiswa` (`NIM`),
  ADD CONSTRAINT `presensi_akademik_ibfk_2` FOREIGN KEY (`Kode_mk`) REFERENCES `matakuliah` (`Kode_mk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
