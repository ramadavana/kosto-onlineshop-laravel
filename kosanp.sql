-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jan 2023 pada 12.33
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
-- Database: `kosanp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_order`
--

CREATE TABLE `detail_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_order`
--

INSERT INTO `detail_order` (`id`, `order_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2022-07-26 10:14:08', '2022-07-26 10:14:08'),
(2, 2, 3, '2022-07-26 10:33:54', '2022-07-26 10:33:54'),
(3, 3, 1, '2022-07-26 10:58:00', '2022-07-26 10:58:00'),
(4, 4, 1, '2022-07-27 00:51:27', '2022-07-27 00:51:27'),
(5, 5, 1, '2022-07-27 00:52:20', '2022-07-27 00:52:20'),
(6, 6, 1, '2022-07-27 03:20:50', '2022-07-27 03:20:50'),
(7, 7, 1, '2022-07-27 03:26:50', '2022-07-27 03:26:50'),
(8, 8, 1, '2022-07-27 05:29:51', '2022-07-27 05:29:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `products_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id`, `user_id`, `products_id`, `created_at`, `updated_at`) VALUES
(13, 2, 1, '2022-07-28 02:00:15', '2022-07-28 02:00:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_03_22_074918_create_products_tables', 1),
(5, '2020_03_22_132559_create_order_table', 1),
(6, '2020_03_22_132659_create_detail_order', 1),
(7, '2020_03_22_134342_create_status_order_table', 1),
(8, '2020_03_22_143238_add_stok_to_product', 1),
(9, '2020_03_22_150047_create_rekening_table', 1),
(10, '2020_03_23_101813_add_keterangan_to_order', 1),
(11, '2020_03_23_101848_create_keranjang_table', 1),
(12, '2020_03_24_071526_add_bukti_telepon_to_order', 1),
(13, '2020_03_24_072038_add_pesan_to_order', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` int(11) NOT NULL,
  `start_date` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diff_date` int(11) NOT NULL,
  `konfirmasi` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_order_id` bigint(20) UNSIGNED NOT NULL,
  `metode_pembayaran` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bukti_pembayaran` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id`, `invoice`, `user_id`, `subtotal`, `start_date`, `end_date`, `diff_date`, `konfirmasi`, `status_order_id`, `metode_pembayaran`, `created_at`, `updated_at`, `bukti_pembayaran`, `pesan`) VALUES
(1, 'KOS202207260513', 2, 1100000, '31-07-2022', '06-10-2022', 2, 'yes', 5, 'Transfer', '2022-07-26 10:14:08', '2022-07-26 10:32:57', 'buktibayar/JHT0jvtNaOfE8CKTOMymTnc6ChS7zHmrtUTMpW8t.jpg', NULL),
(2, 'KOS202207260533', 2, 1100000, '31-07-2022', '29-10-2022', 2, 'yes', 5, 'Bayar Ditempat', '2022-07-26 10:33:54', '2022-07-26 10:36:52', NULL, NULL),
(3, 'KOS202207260557', 2, 3300000, '31-07-2022', '31-01-2023', 6, NULL, 6, 'Transfer', '2022-07-26 10:58:00', '2022-07-26 10:59:02', NULL, NULL),
(4, 'KOS202207270751', 2, 550000, '31-07-2022', '31-08-2022', 1, 'yes', 5, 'Transfer', '2022-07-27 00:51:27', '2022-07-27 01:03:43', 'buktibayar/9KApsByLLEqxKnnKQb5SRGpLImeR1gnPL7NxNoI3.jpg', NULL),
(5, 'KOS202207270752', 2, 0, '31-07-2022', '06-08-2022', 0, NULL, 6, 'Transfer', '2022-07-27 00:52:20', '2022-07-27 00:54:13', NULL, NULL),
(6, 'KOS202207271018', 2, 2750000, '31-07-2022', '31-12-2022', 5, NULL, 6, 'Transfer', '2022-07-27 03:20:50', '2022-07-27 05:29:22', NULL, NULL),
(7, 'KOS202207271026', 2, 1100000, '31-07-2022', '01-10-2022', 2, NULL, 6, 'Transfer', '2022-07-27 03:26:50', '2022-07-27 05:29:24', NULL, NULL),
(8, 'KOS202207271229', 2, 550000, '31-07-2022', '30-09-2022', 1, 'yes', 5, 'Transfer', '2022-07-27 05:29:51', '2022-07-27 05:57:46', 'buktibayar/3G3gyOX2x96ngYMbPX988aQAygmmwUcRNbSF0U6e.jpg', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `price`, `created_at`, `updated_at`, `stok`) VALUES
(1, 'Kamar 1', 'Fasilitas kasur, lemari, kamar mandi luar 2, garasi motor', 'imageproduct/d81Wjz6VZ5wit8tgWZQgNgo4WpIw2bBX1jJWlRW2.jpg', 550000, '2022-07-26 10:08:41', '2023-01-03 04:31:52', 5),
(2, 'Kamar 2', 'Fasilitas kasur, lemari, kamar mandi luar 2, garasi motor', 'imageproduct/IVRXGjibX6WPxSk6YlK9Ao8lYIfwJHFKlt7G4SPV.jpg', 550000, '2022-07-26 10:09:16', '2023-01-03 04:32:03', 0),
(3, 'Kamar 3', 'Fasilitas kasur, lemari, kamar mandi luar 2, garasi motor', 'imageproduct/xT3OmpEnks9jXShtthPkTAPhOlFbW2hL1QgyUSgr.png', 550000, '2022-07-26 10:12:27', '2023-01-03 04:32:14', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekening`
--

CREATE TABLE `rekening` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atas_nama` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rekening` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rekening`
--

INSERT INTO `rekening` (`id`, `bank_name`, `atas_nama`, `no_rekening`, `created_at`, `updated_at`) VALUES
(1, 'BCA', 'Indra Firdaus', '7615243802', NULL, '2022-07-26 09:46:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_order`
--

CREATE TABLE `status_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `status_order`
--

INSERT INTO `status_order` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Belum Bayar', NULL, NULL),
(2, 'Perlu Di Cek', NULL, NULL),
(3, 'Telah Di Bayar', NULL, NULL),
(4, 'Pengambilan Kunci', NULL, NULL),
(5, 'Kunci telah diambil', NULL, NULL),
(6, 'Pesanan Di Batalkan', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$oV4wzJYk4z6rTLpKm47JuOSVt10LtmuP1MJ7uxp8E.U9WxRvikIxG', 'admin', NULL, NULL, NULL),
(2, 'Indra', 'indra@gmail.com', NULL, '$2y$10$aOoZE0TYzY8sOH.ueeLKgeIdr2qMGxImiOxeOz7OxEPsXimzsVb5y', 'customer', NULL, '2022-07-26 09:44:47', '2022-07-26 09:44:47');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status_order`
--
ALTER TABLE `status_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `status_order`
--
ALTER TABLE `status_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
