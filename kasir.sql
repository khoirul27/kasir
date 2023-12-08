-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 08 Des 2023 pada 06.50
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `stok` int NOT NULL,
  `expired` date NOT NULL,
  `harga_jual` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `stok`, `expired`, `harga_jual`) VALUES
(1, 'B00001', 'buku', 27, '2023-11-15', 500000),
(3, 'B00002', 'pensil', 7, '2023-12-06', 100000),
(10, 'B00003', 'moush', 2, '2023-12-07', 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id_detail_pembelian` int NOT NULL,
  `kode_pembelian` varchar(30) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `jumlah` int NOT NULL,
  `harga_beli` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_detail_pembelian`, `kode_pembelian`, `kode_barang`, `jumlah`, `harga_beli`) VALUES
(1, '231205001', 'B00002', 1, 0),
(2, '231205001', 'B00001', 1, 0),
(3, '231205001', 'B00001', 1, 0),
(16, '231207001', 'B00002', 2, 200000),
(17, '231207001', 'B00002', 3, 90000),
(18, '231207002', 'B00003', 1, 1000),
(19, '231207002', 'B00002', 1, 2000),
(20, '231207003', 'B00001', 2, 20000),
(25, '231207004', 'B00001', 10, 100000),
(26, '231207004', 'B00002', 5, 20000),
(35, 'B231208006', 'B00001', 1, 0),
(36, 'B231208006', 'B00002', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail_penjualan` int NOT NULL,
  `kode_penjualan` varchar(20) NOT NULL,
  `jumlah` int NOT NULL,
  `kode_barang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail_penjualan`, `kode_penjualan`, `jumlah`, `kode_barang`) VALUES
(5, 'J231207001', 4, 'B00003'),
(6, 'J231207001', 2, 'B00002'),
(9, 'J231208002', 1, 'B00001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama_usaha` varchar(50) NOT NULL,
  `alamat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `no_telfon` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`username`, `password`, `nama_usaha`, `alamat`, `no_telfon`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'jaya sentosa', 'Jl lawu kulon', 8122);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int NOT NULL,
  `kode_pembelian` varchar(10) NOT NULL,
  `id_supplier` int NOT NULL,
  `tanggal` date NOT NULL,
  `total` int NOT NULL,
  `metode_pembayaran` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `kode_pembelian`, `id_supplier`, `tanggal`, `total`, `metode_pembayaran`) VALUES
(1, '231207001', 4, '0000-00-00', 290000, 'non Tunai'),
(2, '231207002', 4, '2023-12-07', 3000, 'tunai'),
(3, '231207003', 4, '2023-12-07', 20000, 'non Tunai'),
(4, '231207004', 3, '2023-12-07', 120000, 'Metode Pembayaran'),
(5, 'B231208005', 2, '2023-12-08', 0, 'Metode Pembayaran'),
(6, 'B231208006', 2, '2023-12-08', 0, 'tunai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjual` int NOT NULL,
  `kode_penjualan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjual`, `kode_penjualan`, `nama_pelanggan`, `tanggal`, `total`) VALUES
(1, 'J231207001', 'khoirul', '2023-12-07', 600000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `cv` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama`, `cv`) VALUES
(2, 'Doni', 'PT doni maju lancar'),
(3, 'khoirul', 'PT maju bersama'),
(4, 'Juna', 'PT ABC'),
(7, 'Edo', 'PT maju bersama');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id_detail_pembelian`);

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail_penjualan`);

--
-- Indeks untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjual`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id_detail_pembelian` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail_penjualan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjual` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
