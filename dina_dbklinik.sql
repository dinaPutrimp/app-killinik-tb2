-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2020 at 12:45 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dina_dbklinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `id_antrian` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `tgl_berobat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`id_antrian`, `id_pasien`, `id_dokter`, `tgl_berobat`) VALUES
(4, 2, 1, '2020-12-03'),
(10, 3, 2, '2020-12-01'),
(12, 4, 2, '2020-12-01'),
(13, 6, 2, '2020-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `daftarpasien`
--

CREATE TABLE `daftarpasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftarpasien`
--

INSERT INTO `daftarpasien` (`id_pasien`, `nama_pasien`, `tgl_lahir`, `jenis_kelamin`, `no_hp`, `alamat`) VALUES
(2, 'Andi Rahajeng M', '1992-07-17', 'L', '0897526275', 'Bekasi Barat'),
(3, 'Pratiwi Dewi', '1996-01-01', 'P', '0815427383262', 'Tambun Selatan'),
(4, 'Jevan Haryanto', '1994-02-19', 'L', '085737234116', 'Kota Bekasi'),
(6, 'Muhammad Azam', '1994-07-07', 'L', '085673244176', 'Jalan mawar no 41, Margahayu jaya, Bekasi Timur');

-- --------------------------------------------------------

--
-- Table structure for table `data_dokter`
--

CREATE TABLE `data_dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `tarif_konsul` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_dokter`
--

INSERT INTO `data_dokter` (`id_dokter`, `nama_dokter`, `nip`, `jk`, `tarif_konsul`) VALUES
(1, 'dr. Ahmad Maulana', '88871635627', 'L', 85000),
(2, 'dr. Joshua Suhandi', '83932992718', 'L', 85000),
(4, 'dr. Andre Atmaja', '88992927252', 'L', 85000),
(5, 'dr. Elise Subagyo', '8382992183', 'P', 85000);

-- --------------------------------------------------------

--
-- Table structure for table `data_obat`
--

CREATE TABLE `data_obat` (
  `id_obat` int(11) NOT NULL,
  `no_obat` varchar(20) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `harga_obat` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_obat`
--

INSERT INTO `data_obat` (`id_obat`, `no_obat`, `nama_obat`, `harga_obat`) VALUES
(2, '3330001', 'Paracetamol', 3500),
(3, '3330002', 'Alkohol 70%', 11100),
(4, '3330003', 'Kasa Gulung', 2000),
(5, '3330004', 'Infus', 55000),
(6, '3330005', 'Albothyl', 30000),
(7, '3330006', 'Ambroxol', 286);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_bayar` int(11) NOT NULL,
  `id_resep` int(11) NOT NULL,
  `qty` int(5) NOT NULL,
  `total` int(20) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `id_rm` int(11) NOT NULL,
  `no_rm` int(11) NOT NULL,
  `tgl_berobat` date NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `riwayat_alergi` varchar(50) NOT NULL,
  `td` varchar(20) NOT NULL,
  `nadi` varchar(10) NOT NULL,
  `suhu` varchar(10) NOT NULL,
  `tb` varchar(10) NOT NULL,
  `bb` varchar(15) NOT NULL,
  `keluhan` varchar(50) NOT NULL,
  `diagnosis` varchar(50) NOT NULL,
  `anjuran` enum('Rawat Jalan','Rawat Inap','Rujuk','Istirahat dirumah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`id_rm`, `no_rm`, `tgl_berobat`, `id_pasien`, `id_dokter`, `riwayat_alergi`, `td`, `nadi`, `suhu`, `tb`, `bb`, `keluhan`, `diagnosis`, `anjuran`) VALUES
(19, 1, '2020-12-02', 2, 1, 'Antibiotik', '90/110', '120', '39', '180', '70', 'Pusing, Mimisan', 'Kelelahan', 'Istirahat dirumah'),
(21, 2, '2020-12-02', 3, 5, 'Kacang', '90/110', '120', '39', '180', '70', 'Pusing, Mual, Muntah, Dehidrasi', 'Typhus', 'Rawat Inap'),
(22, 3, '2020-12-05', 6, 2, 'Coklat', '90/110', '100', '38', '55', '165', 'Demam, Hidung berair', 'Demam', 'Istirahat dirumah');

-- --------------------------------------------------------

--
-- Table structure for table `resep_obat`
--

CREATE TABLE `resep_obat` (
  `id_resep` int(11) NOT NULL,
  `id_rm` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `qty` int(10) NOT NULL,
  `total` int(20) NOT NULL,
  `metode` varchar(20) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resep_obat`
--

INSERT INTO `resep_obat` (`id_resep`, `id_rm`, `id_obat`, `qty`, `total`, `metode`, `keterangan`) VALUES
(8, 19, 2, 8, 28000, 'Cash', 'dibayarkan'),
(9, 19, 4, 12, 24000, 'Cash', 'dibayarkan'),
(18, 21, 2, 6, 21000, 'Cash', 'dibayarkan'),
(19, 22, 2, 12, 42000, 'Cash', 'dibayarkan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `password`) VALUES
(3, 'Erik', 'erik@gmail.com', '$2y$10$f4uS/9VmwjHCDsmDDDb9Nef1SMe46pzU7Pd27350xxasrXuE86V1O'),
(4, 'Dina', 'dinaputri498@gmail.com', '$2y$10$GaXAaUywt2YuW49sv9Ae7epLlcrc5FLSfvXlNGOS5..TjAgncjZsK'),
(5, 'Jani', 'jani@gmail.com', '$2y$10$gEILNqnbYqpewDOfTwD1buObjcVImq9ovFZZgIlWUvghubdQ0sVQa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id_antrian`),
  ADD KEY `fk_dokter1` (`id_dokter`),
  ADD KEY `fk_pasien1` (`id_pasien`);

--
-- Indexes for table `daftarpasien`
--
ALTER TABLE `daftarpasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `data_dokter`
--
ALTER TABLE `data_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `data_obat`
--
ALTER TABLE `data_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `fk_resep` (`id_resep`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id_rm`) USING BTREE,
  ADD KEY `fk_dokter` (`id_dokter`),
  ADD KEY `fk_pasien` (`id_pasien`);

--
-- Indexes for table `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `fk_obat` (`id_obat`),
  ADD KEY `fk_rm` (`id_rm`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `daftarpasien`
--
ALTER TABLE `daftarpasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_dokter`
--
ALTER TABLE `data_dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_obat`
--
ALTER TABLE `data_obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id_rm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `resep_obat`
--
ALTER TABLE `resep_obat`
  MODIFY `id_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `antrian`
--
ALTER TABLE `antrian`
  ADD CONSTRAINT `fk_dokter1` FOREIGN KEY (`id_dokter`) REFERENCES `data_dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pasien1` FOREIGN KEY (`id_pasien`) REFERENCES `daftarpasien` (`id_pasien`) ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_resep` FOREIGN KEY (`id_resep`) REFERENCES `resep_obat` (`id_resep`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD CONSTRAINT `fk_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `data_dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `daftarpasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD CONSTRAINT `fk_obat` FOREIGN KEY (`id_obat`) REFERENCES `data_obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rm` FOREIGN KEY (`id_rm`) REFERENCES `rekam_medis` (`id_rm`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
