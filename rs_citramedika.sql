-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 23, 2024 at 09:52 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rs_citramedika`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `Dokter_Id` int NOT NULL,
  `Pengguna_Id` int NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Spesialisasi` varchar(30) NOT NULL,
  `Nomor_Sip` int NOT NULL,
  `Alamat` varchar(25) NOT NULL,
  `Nomor_Telepon` varchar(12) NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `icu`
--

CREATE TABLE `icu` (
  `Kamar_ICU_Id` int NOT NULL,
  `Nomor_Kamar` int NOT NULL,
  `Kapasitas` varchar(2) NOT NULL,
  `Status_Ketersediaan` varchar(5) NOT NULL,
  `Keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `igd`
--

CREATE TABLE `igd` (
  `Kamar_IGD_Id` int NOT NULL,
  `Nomor_Kamar` int NOT NULL,
  `Kapasitas` varchar(2) NOT NULL,
  `Status_Ketersediaan` varchar(20) NOT NULL,
  `Keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kamar`
--

CREATE TABLE `jenis_kamar` (
  `Jenis_Kamar_Id` int NOT NULL,
  `Kamar_ICU_Id` int NOT NULL,
  `Kamar_IGD_Id` int NOT NULL,
  `Jumlah_Kamar` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_perawatan`
--

CREATE TABLE `jenis_perawatan` (
  `Jenis_Perawatan_Id` int NOT NULL,
  `Rawat_Jalan_Id` int NOT NULL,
  `Rawat_Inap_Id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `Obat_Id` int NOT NULL,
  `Nama` varchar(25) NOT NULL,
  `Jenis` varchar(20) NOT NULL,
  `Dosis` varchar(20) NOT NULL,
  `Indikasi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `Pasien_Id` int NOT NULL,
  `Pengguna_Id` int NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `Jenis_Kelamin` varchar(20) NOT NULL,
  `Alamat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `Pembayaran_Id` int NOT NULL,
  `Pasien_Id` int NOT NULL,
  `Tanggal_Pembayaran` date NOT NULL,
  `Total_Biaya` varchar(8) NOT NULL,
  `Cara_Pembayaran` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_dokter`
--

CREATE TABLE `pemeriksaan_dokter` (
  `Pemeriksaan_Id` int NOT NULL,
  `Dokter_Id` int NOT NULL,
  `Tenaga_Kesehatan_Id` int NOT NULL,
  `Pasien_Id` int NOT NULL,
  `Tanggal_Pemeriksaan` date NOT NULL,
  `Diagnosa` varchar(25) NOT NULL,
  `Jenis_Perawatan_Id` int NOT NULL,
  `Obat_Id` int NOT NULL,
  `Rencana_Perawatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `pengguna_id` int NOT NULL,
  `Username` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Peran` varchar(30) NOT NULL,
  `hak_akses` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rawat_inap`
--

CREATE TABLE `rawat_inap` (
  `Rawat_Inap_Id` int NOT NULL,
  `Jenis_Kamar_Id` int NOT NULL,
  `Tanggal_Masuk` date NOT NULL,
  `Tanggal_Keluar` date NOT NULL,
  `Diagnosis` int NOT NULL,
  `Biaya` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rawat_jalan`
--

CREATE TABLE `rawat_jalan` (
  `Rawat_Jalan_Id` int NOT NULL,
  `Tanggal_Kunjung` date NOT NULL,
  `Diagnosis` varchar(20) NOT NULL,
  `Biaya` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('C9jEdsIHXZTkopu6FfqXdDPAXvADEVNDTLpDWGdP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36 OPR/109.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidkxXQ21ZN2xHdmE2ZHpUZ0xSWmJmYk56cjVkVjlEeVhZMk92MlZyRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1715339783),
('CvosZSQiPL1XeoIV0uxqkdxSGsyKMdEGHDhLLndm', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36 OPR/109.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRGVvbGRnS3ZFdEpzQ0RSMW9lRG5GNllKckZ3cUJRc3NCZFR0NThTQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1715327436),
('kzWano3gStzEZQ07Sqs1xG9igjbcyMr1S1mVlwo9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36 OPR/109.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieWNsMHZxUGo3eVkyRGtPUTlKdER4MlV2ZDV2OHhPTWdWdjdBbXo0QyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1715331984),
('wkkzUIMsic8cNr0xt0Gb7BIGaBFyUwQOQ98giG2z', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36 OPR/109.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNXFBYm41d2MzaThsTWJQaWhDbzd0SXhKd0N6c2xBYlZLWmkwcTFjNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1715341905);

-- --------------------------------------------------------

--
-- Table structure for table `tenaga_kesehatan`
--

CREATE TABLE `tenaga_kesehatan` (
  `TenagaKesehatan_Id` int NOT NULL,
  `Jenis_Tenaga_Kesehatan` varchar(20) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Alamat` varchar(30) NOT NULL,
  `Nomor_Telepon` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`Dokter_Id`),
  ADD KEY `Pengguna_Id` (`Pengguna_Id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `icu`
--
ALTER TABLE `icu`
  ADD PRIMARY KEY (`Kamar_ICU_Id`);

--
-- Indexes for table `igd`
--
ALTER TABLE `igd`
  ADD PRIMARY KEY (`Kamar_IGD_Id`);

--
-- Indexes for table `jenis_kamar`
--
ALTER TABLE `jenis_kamar`
  ADD PRIMARY KEY (`Jenis_Kamar_Id`),
  ADD KEY `Kamar_ICU_Id` (`Kamar_ICU_Id`),
  ADD KEY `Kamar_IGD_Id` (`Kamar_IGD_Id`);

--
-- Indexes for table `jenis_perawatan`
--
ALTER TABLE `jenis_perawatan`
  ADD PRIMARY KEY (`Jenis_Perawatan_Id`),
  ADD KEY `Rawat_Jalan_Id` (`Rawat_Jalan_Id`),
  ADD KEY `Rawat_Inap_Id` (`Rawat_Inap_Id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`Obat_Id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`Pasien_Id`),
  ADD KEY `Pengguna_Id` (`Pengguna_Id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`Pembayaran_Id`),
  ADD KEY `Pasien_Id` (`Pasien_Id`);

--
-- Indexes for table `pemeriksaan_dokter`
--
ALTER TABLE `pemeriksaan_dokter`
  ADD PRIMARY KEY (`Pemeriksaan_Id`),
  ADD KEY `Dokter_Id` (`Dokter_Id`),
  ADD KEY `Tenaga_Kesehatan_Id` (`Tenaga_Kesehatan_Id`),
  ADD KEY `Pasien_Id` (`Pasien_Id`),
  ADD KEY `Jenis_Perawatan` (`Jenis_Perawatan_Id`),
  ADD KEY `Obat_Id` (`Obat_Id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indexes for table `rawat_inap`
--
ALTER TABLE `rawat_inap`
  ADD PRIMARY KEY (`Rawat_Inap_Id`),
  ADD KEY `Jenis_Kamar_Id` (`Jenis_Kamar_Id`);

--
-- Indexes for table `rawat_jalan`
--
ALTER TABLE `rawat_jalan`
  ADD PRIMARY KEY (`Rawat_Jalan_Id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tenaga_kesehatan`
--
ALTER TABLE `tenaga_kesehatan`
  ADD PRIMARY KEY (`TenagaKesehatan_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `Dokter_Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `icu`
--
ALTER TABLE `icu`
  MODIFY `Kamar_ICU_Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `igd`
--
ALTER TABLE `igd`
  MODIFY `Kamar_IGD_Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_kamar`
--
ALTER TABLE `jenis_kamar`
  MODIFY `Jenis_Kamar_Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_perawatan`
--
ALTER TABLE `jenis_perawatan`
  MODIFY `Jenis_Perawatan_Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `Obat_Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `Pasien_Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `Pembayaran_Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemeriksaan_dokter`
--
ALTER TABLE `pemeriksaan_dokter`
  MODIFY `Pemeriksaan_Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `pengguna_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rawat_inap`
--
ALTER TABLE `rawat_inap`
  MODIFY `Rawat_Inap_Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rawat_jalan`
--
ALTER TABLE `rawat_jalan`
  MODIFY `Rawat_Jalan_Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tenaga_kesehatan`
--
ALTER TABLE `tenaga_kesehatan`
  MODIFY `TenagaKesehatan_Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_ibfk_1` FOREIGN KEY (`Pengguna_Id`) REFERENCES `pengguna` (`pengguna_id`);

--
-- Constraints for table `jenis_kamar`
--
ALTER TABLE `jenis_kamar`
  ADD CONSTRAINT `jenis_kamar_ibfk_1` FOREIGN KEY (`Kamar_ICU_Id`) REFERENCES `icu` (`Kamar_ICU_Id`),
  ADD CONSTRAINT `jenis_kamar_ibfk_2` FOREIGN KEY (`Kamar_IGD_Id`) REFERENCES `igd` (`Kamar_IGD_Id`);

--
-- Constraints for table `jenis_perawatan`
--
ALTER TABLE `jenis_perawatan`
  ADD CONSTRAINT `jenis_perawatan_ibfk_1` FOREIGN KEY (`Rawat_Jalan_Id`) REFERENCES `rawat_jalan` (`Rawat_Jalan_Id`),
  ADD CONSTRAINT `jenis_perawatan_ibfk_2` FOREIGN KEY (`Rawat_Inap_Id`) REFERENCES `rawat_inap` (`Rawat_Inap_Id`),
  ADD CONSTRAINT `jenis_perawatan_ibfk_3` FOREIGN KEY (`Jenis_Perawatan_Id`) REFERENCES `pemeriksaan_dokter` (`Jenis_Perawatan_Id`);

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_ibfk_1` FOREIGN KEY (`Pengguna_Id`) REFERENCES `pengguna` (`pengguna_id`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`Pasien_Id`) REFERENCES `pasien` (`Pasien_Id`);

--
-- Constraints for table `pemeriksaan_dokter`
--
ALTER TABLE `pemeriksaan_dokter`
  ADD CONSTRAINT `pemeriksaan_dokter_ibfk_1` FOREIGN KEY (`Obat_Id`) REFERENCES `obat` (`Obat_Id`),
  ADD CONSTRAINT `pemeriksaan_dokter_ibfk_2` FOREIGN KEY (`Tenaga_Kesehatan_Id`) REFERENCES `tenaga_kesehatan` (`TenagaKesehatan_Id`),
  ADD CONSTRAINT `pemeriksaan_dokter_ibfk_3` FOREIGN KEY (`Dokter_Id`) REFERENCES `dokter` (`Dokter_Id`),
  ADD CONSTRAINT `pemeriksaan_dokter_ibfk_4` FOREIGN KEY (`Pasien_Id`) REFERENCES `pasien` (`Pasien_Id`),
  ADD CONSTRAINT `pemeriksaan_dokter_ibfk_5` FOREIGN KEY (`Jenis_Perawatan_Id`) REFERENCES `jenis_perawatan` (`Jenis_Perawatan_Id`);

--
-- Constraints for table `rawat_inap`
--
ALTER TABLE `rawat_inap`
  ADD CONSTRAINT `rawat_inap_ibfk_1` FOREIGN KEY (`Jenis_Kamar_Id`) REFERENCES `jenis_kamar` (`Jenis_Kamar_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
