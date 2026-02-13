-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 13 Feb 2026 pada 11.35
-- Versi server: 11.4.9-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik`
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
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'Admin', '2024-02-28 02:12:01', '2024-02-28 02:12:01'),
(2, 'user', 'User', 'User', '2024-02-28 02:12:01', '2024-02-28 02:12:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\Models\\User'),
(1, 2, 'App\\Models\\User'),
(2, 5, 'App\\Models\\User'),
(2, 6, 'App\\Models\\User'),
(2, 81, 'App\\Models\\User'),
(2, 83, 'App\\Models\\User'),
(2, 84, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` varchar(10) NOT NULL,
  `nama_ruang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user` varchar(10) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `f_name`, `email`, `nomor_telepon`, `email_verified_at`, `username`, `password`, `user`, `remember_token`, `img`) VALUES
(1, 'Admin', 'admin1@gmail.com', '', '2025-04-30 08:50:56', 'admin', '$2y$10$a5CeW7r8VeUPy2hQXI5xJuNhnPo8CWfDwJJQhauP0g1BJ/77olWh.', 'Admin', '', 'images/1815883516605523.jpeg'),
(4, 'Ahmad Muzakki', 'jasjus841@gmail.com', '0879272342', '2025-08-17 04:31:19', 'jasjus841', '$2y$12$X4cGX1XP/QkWh9c5bVOrKO8b5a68gTdscbDHNGMEn/.KUmqf/ZCui', 'User', 'geJylQ71iSHplHA6eWTk4XUJSOsSdP7v91MCHnVYCEMcM6pyuSFiOiwiBZ1E', ''),
(6, 'Mamat', 'kajeks841@gmail.com', '08161518497', '2025-11-04 17:14:45', 'mamat', '$2y$12$hnDb0KYGC0Dq6LzCHiu6qOXoSD8F8OzVmPcv4BbL7M3h2oTmabnlq', 'User', NULL, 'default-avatar.png'),
(5, 'Ahmad Rojali', 'rojali@gmail.com', '08970833227', '2025-05-23 15:16:50', 'rojali', '$2y$12$0o0UcbPaQuotlWGvgAtXceAz.fzSfuIhfOXx8XRwJ8M6pNbhRPhYS', 'User', NULL, 'default-avatar.png'),
(2, 'Fanidiya Tasya', 'admin@gmail.com', '082472332', '2025-09-20 06:17:30', 'tsy24', '$2y$12$X4cGX1XP/QkWh9c5bVOrKO8b5a68gTdscbDHNGMEn/.KUmqf/ZCui', 'Admin', 'yKhBeiCjxn4XfUe9wx7XFpggoz9LLHN2bbsMjxAJEhWuBeqqL53Wr8bi83js', 'images/1815883516605523.jpeg');

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
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indeks untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `id` (`id`);

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
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
