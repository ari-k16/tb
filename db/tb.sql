-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25 Jan 2021 pada 07.12
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `address`
--

CREATE TABLE `address` (
  `id_address_cs` varchar(20) NOT NULL,
  `id_costumer` varchar(20) NOT NULL,
  `kota_au` varchar(50) NOT NULL,
  `provinsi_au` varchar(50) NOT NULL,
  `kodepos_au` int(11) NOT NULL,
  `desakel_au` varchar(50) NOT NULL,
  `kecamatan_au` varchar(50) NOT NULL,
  `more_au` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `address`
--

INSERT INTO `address` (`id_address_cs`, `id_costumer`, `kota_au`, `provinsi_au`, `kodepos_au`, `desakel_au`, `kecamatan_au`, `more_au`) VALUES
('AC001', 'CS001', 'Jakarta Utara ', 'DKI Jakarta ', 11730, 'Sunter ', 'cengkareng timur ', 'bla bla bla bla '),
('AC002', 'CS002', 'Jakarta Barat ', 'DKI Jakarta ', 11730, 'Cengkareng ', 'Cengkareng Timur ', 'hiya hiya hiya ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `banking`
--

CREATE TABLE `banking` (
  `id_banking` int(11) NOT NULL,
  `id_costumer` varchar(20) NOT NULL,
  `id_rekening_cs` varchar(20) NOT NULL,
  `jumlah_tf_banking` double NOT NULL,
  `tgl_tf_banking` date NOT NULL,
  `tgl_konfirmasi_banking` date NOT NULL,
  `status_banking` enum('Y','N','','') NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `banking`
--

INSERT INTO `banking` (`id_banking`, `id_costumer`, `id_rekening_cs`, `jumlah_tf_banking`, `tgl_tf_banking`, `tgl_konfirmasi_banking`, `status_banking`, `id_user`) VALUES
(1, 'CS001', 'RC001', 50000, '2020-09-08', '2020-09-08', 'Y', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `costumers`
--

CREATE TABLE `costumers` (
  `id_costumer` varchar(20) NOT NULL,
  `nama_cs` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `point_cs` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tlp_cs` varchar(20) NOT NULL,
  `id_address_cs` varchar(20) NOT NULL,
  `id_rekening_cs` varchar(20) NOT NULL,
  `status` enum('Y','N','W','') NOT NULL,
  `catatan_cs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `costumers`
--

INSERT INTO `costumers` (`id_costumer`, `nama_cs`, `username`, `password`, `point_cs`, `email`, `tlp_cs`, `id_address_cs`, `id_rekening_cs`, `status`, `catatan_cs`) VALUES
('CS001', 'Zuko', 'Zuko', '10f9ac9e62ff1573cb82e4d5543eff6d52c2bc2c', 10, 'zuko@gmail.com', '08127382712', 'AC001', 'RC001', 'Y', 'Negara api '),
('CS002', 'Katara M', 'katara', '$2y$10$WLnYdlv0OpvFGR1uchXhmuxqiC16LdVcRrZ.eWRqvICvsjaF94p5W', 20, 'katara@gmail.com', '081727182121', 'AC001', 'RC001', 'Y', 'blaa blaa blaa '),
('CS003', 'Saka', 'saka', '$2y$10$qHEV7Jr80l/MQ0sCuf8zP.nDtb4RWz/bFkf0gSrPoPaGXySp6T34G', 25, 'saka@gmail.com', '081748372812', 'AC001', 'RC001', 'Y', 'Negara Air ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id_products` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'default.jpg',
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id_products`, `name`, `price`, `image`, `description`) VALUES
('5f3de1d782b2f', 'Delima', 20000, '5f3de1d782b2f.jpg', 'Delima Manis '),
('5f3de2034ed1f', 'Jamblang', 30000, '5f3de2034ed1f.jpg', 'Jamblang bla bla bla '),
('5f3de22341d6b', 'Jambu', 10000, '5f3de22341d6b.jpg', 'Jambu bla bla bla '),
('5f4da06fcedaf', 'Pisang', 15000, '5f4da06fcedaf.jpg', 'pisang bla bla bla '),
('5f58af87cc0ea', 'Durian', 50000, '5f58af87cc0ea.jpg', 'Durian manis '),
('5f5b49de481ef', 'Kurma', 30000, '5f5b49de481ef.jpg', 'Kurma bla bla bla '),
('5f5b4a5d4b1d8', 'Manggis', 20000, '5f5b4a5d4b1d8.jpg', 'Manggis bla bla bla ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening_cs` varchar(20) NOT NULL,
  `bank_ru` varchar(50) NOT NULL,
  `an_ru` varchar(50) NOT NULL,
  `no_ru` varchar(150) NOT NULL,
  `id_costumer` varchar(50) NOT NULL,
  `status_ru` enum('Y','N','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekening`
--

INSERT INTO `rekening` (`id_rekening_cs`, `bank_ru`, `an_ru`, `no_ru`, `id_costumer`, `status_ru`) VALUES
('RC001', 'BCA', 'blu blu blu', '1234567890', 'CS001', 'Y'),
('RC002', 'Mandiri', 'bla bla bla ', '120120120120', 'CS002', 'Y'),
('RC003', 'BRI ', 'bri bri bri ', '123123123123', 'CS003', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(64) NOT NULL,
  `kode_transaksi` varchar(64) NOT NULL,
  `id_costumer` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `nama_cs` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tlp_cs` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `rekening_pembayaran` varchar(100) NOT NULL,
  `rekening_cs` varchar(100) NOT NULL,
  `bukti_bayar` varchar(255) DEFAULT 'default.jpg',
  `tgl_post` datetime NOT NULL,
  `tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `id_costumer`, `id_user`, `nama_cs`, `email`, `tlp_cs`, `alamat`, `tgl_transaksi`, `jumlah_transaksi`, `status_bayar`, `jumlah_bayar`, `rekening_pembayaran`, `rekening_cs`, `bukti_bayar`, `tgl_post`, `tgl_update`) VALUES
('5f5986e6b1a91', 'TRX001100920', 'CS001', '2', 'Zuko ', 'zuko@gmail.com', '08127382712', 'Cengkareng Timur ', '2020-09-10 08:50:00', 1, 'Lunas ', 50000, 'qwerty1234', 'asdfg1234', '5f5986e6b1a91.jpg', '2020-09-10 08:51:00', '2020-09-10 08:51:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `role` enum('admin','costumer','','') NOT NULL DEFAULT 'costumer',
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `photo` varchar(255) DEFAULT 'user_no_image.jpg',
  `creadted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `email`, `full_name`, `phone`, `role`, `last_login`, `photo`, `creadted_at`, `is_active`) VALUES
(1, 'popop', '$2y$10$Y6pUiqS.XSOvftKLmD9AsuLr9EmyKM13zJwWLHy8Gvfdvw4LmVSBW', 'ariii.kurniawan16@gmail.com', 'ari kurniawan', '085714395258', 'admin', '2021-01-24 05:33:13', 'ari_kurniawan.jpg', '2020-08-16 03:07:46', 1),
(2, 'queen', '$2y$10$JAOtLVvH4PMtk5DA5.9LzOEmXKHHWv95axIQ9Shl/rhRmteuM7H4O', 'queen@gmail.com', 'Fready ', '08128392121', 'admin', '2021-01-24 09:05:46', 'user_no_image.jpg', '2020-08-18 05:37:23', 1),
(3, 'kurniawan', '$2y$10$96f920bpK64ljTvyZW8yGOp2IXLbYs2br4KMy/B/SrJKx4GeooLKC', 'kurniawan@gmail.com', 'Kurniawan', '08138372812', 'admin', '2020-08-18 05:51:55', 'user_no_image.jpg', '2020-08-18 05:50:50', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id_address_cs`);

--
-- Indexes for table `banking`
--
ALTER TABLE `banking`
  ADD PRIMARY KEY (`id_banking`);

--
-- Indexes for table `costumers`
--
ALTER TABLE `costumers`
  ADD PRIMARY KEY (`id_costumer`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_products`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening_cs`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banking`
--
ALTER TABLE `banking`
  MODIFY `id_banking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
