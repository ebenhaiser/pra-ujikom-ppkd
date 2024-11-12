-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2024 at 09:21 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `angkatan3_pra_ujikom`
--

-- --------------------------------------------------------

--
-- Table structure for table `gelombang`
--

CREATE TABLE `gelombang` (
  `id` int(11) NOT NULL,
  `nama_gelombang` varchar(50) NOT NULL,
  `aktif` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gelombang`
--

INSERT INTO `gelombang` (`id`, `nama_gelombang`, `aktif`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Gelombang 1', 0, '2024-11-11 06:27:47', '2024-11-12 07:52:07', 0),
(2, 'Gelombang 2', 0, '2024-11-11 06:54:57', '2024-11-12 07:52:10', 0),
(3, 'Gelombang 3', 0, '2024-11-11 06:55:07', '2024-11-12 07:52:00', 0),
(4, 'Gelombang 4', 1, '2024-11-11 06:55:14', '2024-11-12 07:52:03', 0),
(5, 'Gelombang 5', 0, '2024-11-12 07:48:45', '2024-11-12 07:48:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama_jurusan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Operator Komputer', '2024-11-11 06:14:28', '2024-11-11 06:14:28', 0),
(2, 'Bahasa Inggris', '2024-11-11 06:14:54', '2024-11-11 06:14:54', 0),
(3, 'Desain Grafis', '2024-11-11 06:14:58', '2024-11-11 06:14:58', 0),
(4, 'Tata Boga', '2024-11-11 06:15:05', '2024-11-11 06:15:05', 0),
(5, 'Tata Busana', '2024-11-11 06:15:09', '2024-11-11 06:15:09', 0),
(6, 'Tata Graha', '2024-11-11 06:15:12', '2024-11-11 06:15:12', 0),
(7, 'Teknik Pendingin', '2024-11-11 06:15:36', '2024-11-11 06:15:36', 0),
(8, 'Teknik Komputer', '2024-11-11 06:15:40', '2024-11-11 06:15:40', 0),
(9, 'Otomotif Sepeda Motor', '2024-11-11 06:15:47', '2024-11-11 06:15:47', 0),
(10, 'Jaringan Komputer', '2024-11-11 06:15:50', '2024-11-11 06:15:50', 0),
(11, 'Barista', '2024-11-11 06:15:53', '2024-11-11 06:15:53', 0),
(12, 'Bahasa Korea', '2024-11-11 06:16:18', '2024-11-11 06:16:18', 0),
(13, ' Makeup Artist', '2024-11-11 06:16:22', '2024-11-11 06:16:22', 0),
(14, 'Video Editor', '2024-11-11 06:16:25', '2024-11-11 06:16:25', 0),
(15, 'Content Creator', '2024-11-11 06:16:43', '2024-11-11 06:16:43', 0),
(16, 'Web Programming', '2024-11-11 06:16:49', '2024-11-11 06:16:49', 0),
(17, 'tess12', '2024-11-12 07:49:27', '2024-11-12 07:49:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `nama_level` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `nama_level`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin Pelatihan', '2024-11-11 02:11:05', '2024-11-11 02:11:05', 0),
(2, 'PIC Jurusan', '2024-11-11 02:11:05', '2024-11-11 02:11:05', 0),
(3, 'Administrator', '2024-11-11 02:11:24', '2024-11-11 02:11:24', 0),
(4, 'tes123', '2024-11-12 07:48:13', '2024-11-12 07:48:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `peserta_pelatihan`
--

CREATE TABLE `peserta_pelatihan` (
  `id` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_gelombang` int(11) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `kartu_keluarga` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `pendidikan_terakhir` varchar(50) DEFAULT NULL,
  `nama_sekolah` varchar(50) DEFAULT NULL,
  `kejuruan` varchar(50) DEFAULT NULL,
  `nomor_hp` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `aktivitas_saat_ini` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `photo` varchar(50) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `deleted_at` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peserta_pelatihan`
--

INSERT INTO `peserta_pelatihan` (`id`, `id_jurusan`, `id_gelombang`, `nama_lengkap`, `nik`, `kartu_keluarga`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `pendidikan_terakhir`, `nama_sekolah`, `kejuruan`, `nomor_hp`, `email`, `aktivitas_saat_ini`, `status`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 0, 'tes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 1),
(2, 16, 2, 'rwerew', '234342343', '234234', 'Laki-laki', '23423423', '2024-10-28', '432423', '23423423', '23423423', '234324', 'gantengs@gmail.com', '234567', 0, '', 0, 0, 0),
(3, 15, 3, 'Sugiono', '123456', '21345678', 'Laki-laki', 'Tokyo', '2024-11-05', 'S3 Senam', 'Univ TokTok', 'Senam', '0987654', 'sugiono@gmail.com', 'rebahan', 2, 'foto_peserta123456.jpeg', 0, 0, 0),
(4, 3, 4, 'sugiono', '123456', '2134567876543', 'Perempuan', 'Tokyo', '2024-11-05', 'S3 Senam', 'Univ TokTok', 'Senam', '098765', 'sugiono@gmail.com', 'rebahan', 0, 'fotoPeserta123456.jpeg', 0, 0, 0),
(5, 15, 4, 'Mbak Miya', '456456456', '456456456', 'Laki-laki', 'Lebanon', '2024-11-04', 'S3 Senam', 'Univ TokTok', 'Senam', '098890098908', 'mbak.miya@gmail.com', 'rebahan', 2, 'fotoPeserta456456456.jpeg', 0, 0, 0),
(6, 4, 3, 'Mbak Miya', '456456456', '456456456', 'Perempuan', 'Lebanon', '2024-11-04', 'S3 Senam', 'Univ TokTok', 'Senam', '987654323456', 'mbak.miya@gmail.com', 'rebahan', 2, 'fotoPeserta456456456.jpeg', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_level`, `id_jurusan`, `nama_lengkap`, `email`, `password`, `created at`, `updated at`, `deleted_at`) VALUES
(1, 3, 0, 'Administrator', 'administrator@gmail.com', '12345678', '2024-11-11 02:30:45', '2024-11-12 01:27:37', 0),
(4, 1, 0, 'Admin Aplikasi', 'admin.aplikasi@gmail.com', '12345678', '2024-11-11 07:40:43', '2024-11-12 01:58:59', 0),
(5, 2, 16, 'PIC Jurusan Web Programming', 'pic.jurusan.16@gmail.com', '12345678', '2024-11-12 01:28:54', '2024-11-12 03:03:02', 0),
(6, 2, 15, 'PIC Jurusan Content Creator', 'pic.jurusan.15@gmail.com', '12345678', '2024-11-12 02:20:00', '2024-11-12 02:20:00', 0),
(7, 2, 1, 'PIC Jurusan Operator Komputer', 'pic.jurusan.01@gmail.com', '12345678', '2024-11-12 03:06:41', '2024-11-12 03:06:41', 0),
(8, 2, 4, 'TEst', 'eren@gmail.com', '12345678', '2024-11-12 04:28:52', '2024-11-12 04:29:10', 1),
(9, 2, 4, 'PIC Jurusan Tata Boga', 'pic.jurusan.4@gmail.com', '12345678', '2024-11-12 05:02:14', '2024-11-12 05:02:14', 0),
(10, 3, 0, 'fsdfsddfsf', 'mnasds@dfsfsdf', '12345678', '2024-11-12 05:05:55', '2024-11-12 05:06:08', 1),
(11, 2, 16, 'Reza123', 'reza@gmail.com', '12345678', '2024-11-12 07:44:38', '2024-11-12 07:44:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_jurusan`
--

CREATE TABLE `user_jurusan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gelombang`
--
ALTER TABLE `gelombang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta_pelatihan`
--
ALTER TABLE `peserta_pelatihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_jurusan`
--
ALTER TABLE `user_jurusan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gelombang`
--
ALTER TABLE `gelombang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peserta_pelatihan`
--
ALTER TABLE `peserta_pelatihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_jurusan`
--
ALTER TABLE `user_jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
