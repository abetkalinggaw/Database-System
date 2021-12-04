-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2021 at 12:48 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `kodeCabang` int(5) NOT NULL,
  `namaCabang` varchar(50) NOT NULL,
  `alamatCabang` varchar(50) NOT NULL,
  `kodeManager` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`kodeCabang`, `namaCabang`, `alamatCabang`, `kodeManager`) VALUES
(1, 'BCA KCP KLATEN', 'Klaten Utara, Klaten', 1),
(2, 'Kantor Kas BCA Delanggu', 'Delanggu, Klaten', 11),
(3, 'ATM BCA Laris Klaten', 'Klaten Tengah, Klaten', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE `nasabah` (
  `kodeNasabah` int(11) NOT NULL,
  `namaNasabah` varchar(50) NOT NULL,
  `NIK` varchar(16) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `email` varchar(25) NOT NULL,
  `noHP` varchar(13) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `namaIbuKandung` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`kodeNasabah`, `namaNasabah`, `NIK`, `tanggalLahir`, `email`, `noHP`, `alamat`, `namaIbuKandung`) VALUES
(1, 'Abet Kalingga Wijaya', '331007898123', '2002-06-15', 'abet.kalingga@gmail.com', '081234567891', 'Klaten Selatan, Klaten', 'Tri Erly Martdiati'),
(7, 'Jhonny Subagyo', '12312423142135', '2015-12-31', 'Jon.Bag@gmail.com', '081234568123', 'Delanggu, Klaten', 'Susi'),
(8, 'Bambang Selamet', '3213123131231', '2000-06-01', 'Bam.bam@gmail.com', '089876543210', 'Bareng Lor, Klaten', 'Ramiyem');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `kodePegawai` int(11) NOT NULL,
  `namaPegawai` varchar(50) NOT NULL,
  `emailPegawai` varchar(50) NOT NULL,
  `kodeManager` int(11) DEFAULT NULL,
  `kodeCabang` int(5) NOT NULL,
  `jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`kodePegawai`, `namaPegawai`, `emailPegawai`, `kodeManager`, `kodeCabang`, `jabatan`) VALUES
(1, 'Ucup Sanjaya', 'ucup@gmail.com', 0, 1, 'Manager'),
(3, 'Susi Susilowati', 'susi@gmail.com', 11, 2, 'Administrasi'),
(4, 'Agung Sugeng', 'agung.geng@gmail.com', 1, 1, 'Administrasi'),
(11, 'Mamang', 'mang@gmail.com', 0, 2, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `noRekening` varchar(10) NOT NULL,
  `namaRekening` enum('TAHAPAN','TAHAPAN GOLD','TAHAPAN XPRESI','SIMPANAN PELAJAR','TAPRES','DEPOSITO') NOT NULL,
  `tipeRekening` enum('BIRU','GOLD','PLATINUM','XPRESI','KARTU KREDIT','FLAZZ') NOT NULL,
  `saldo` varchar(255) NOT NULL,
  `tandaTangan` varchar(50) NOT NULL,
  `kodeCabang` int(11) NOT NULL,
  `nomorATM` varchar(16) NOT NULL,
  `bunga` float(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`noRekening`, `namaRekening`, `tipeRekening`, `saldo`, `tandaTangan`, `kodeCabang`, `nomorATM`, `bunga`) VALUES
('100', 'TAHAPAN', 'BIRU', '10000000', 'asd', 1, '12345678910111', 2.00),
('101', 'TAHAPAN GOLD', 'GOLD', '500000000', 'asd', 1, '09876543212121', 4.00),
('102', 'TAHAPAN XPRESI', 'XPRESI', '10000000', 'asd', 1, '12345678909878', 2.00);

-- --------------------------------------------------------

--
-- Table structure for table `setuprekening`
--

CREATE TABLE `setuprekening` (
  `kodeSetup` int(11) NOT NULL,
  `kodeNasabah` int(11) NOT NULL,
  `noRekening` varchar(10) NOT NULL,
  `tanggalPembukuan` datetime NOT NULL DEFAULT current_timestamp(),
  `kodePegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setuprekening`
--

INSERT INTO `setuprekening` (`kodeSetup`, `kodeNasabah`, `noRekening`, `tanggalPembukuan`, `kodePegawai`) VALUES
(1, 1, '100', '2021-12-03 22:04:03', 11),
(2, 1, '101', '2021-12-03 22:06:54', 4),
(3, 7, '100', '2021-12-04 00:00:00', 11),
(5, 8, '102', '2021-12-04 00:00:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kodeTransaksi` int(11) NOT NULL,
  `namaTransaksi` varchar(25) NOT NULL,
  `tanggalTransaksi` datetime NOT NULL DEFAULT current_timestamp(),
  `noRekening` varchar(10) NOT NULL,
  `kodeNasabah` int(11) NOT NULL,
  `nominal` varchar(255) NOT NULL,
  `kodePegawai` int(11) NOT NULL,
  `tipeTransaksi` enum('DEBIT','KREDIT','TRANSFER','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kodeTransaksi`, `namaTransaksi`, `tanggalTransaksi`, `noRekening`, `kodeNasabah`, `nominal`, `kodePegawai`, `tipeTransaksi`) VALUES
(1, 'Setor', '2021-12-04 00:04:46', '100', 1, '10000000', 11, 'DEBIT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`kodeCabang`),
  ADD KEY `fk_kodeManager` (`kodeManager`);

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`kodeNasabah`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`kodePegawai`),
  ADD KEY `kodeCabang` (`kodeCabang`),
  ADD KEY `kodeManager_fk` (`kodeManager`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`noRekening`),
  ADD KEY `kodeCabang_fk` (`kodeCabang`);

--
-- Indexes for table `setuprekening`
--
ALTER TABLE `setuprekening`
  ADD PRIMARY KEY (`kodeSetup`),
  ADD KEY `kodeNasabah_fk2` (`kodeNasabah`),
  ADD KEY `kodePegawai_fk2` (`kodePegawai`),
  ADD KEY `noRekening_fk2` (`noRekening`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kodeTransaksi`),
  ADD KEY `kodeNasabah_fk` (`kodeNasabah`),
  ADD KEY `noRekening_fk` (`noRekening`),
  ADD KEY `kodePeg_fk` (`kodePegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `kodeCabang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `kodeNasabah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `setuprekening`
--
ALTER TABLE `setuprekening`
  MODIFY `kodeSetup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kodeTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cabang`
--
ALTER TABLE `cabang`
  ADD CONSTRAINT `fk_kodeManager` FOREIGN KEY (`kodeManager`) REFERENCES `pegawai` (`kodePegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `kodeCabang` FOREIGN KEY (`kodeCabang`) REFERENCES `cabang` (`kodeCabang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kodeManager_fk` FOREIGN KEY (`kodeManager`) REFERENCES `pegawai` (`kodePegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rekening`
--
ALTER TABLE `rekening`
  ADD CONSTRAINT `kodeCabang_fk` FOREIGN KEY (`kodeCabang`) REFERENCES `cabang` (`kodeCabang`);

--
-- Constraints for table `setuprekening`
--
ALTER TABLE `setuprekening`
  ADD CONSTRAINT `kodeNasabah_fk2` FOREIGN KEY (`kodeNasabah`) REFERENCES `nasabah` (`kodeNasabah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kodePegawai_fk2` FOREIGN KEY (`kodePegawai`) REFERENCES `pegawai` (`kodePegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `noRekening_fk2` FOREIGN KEY (`noRekening`) REFERENCES `rekening` (`noRekening`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `kodeNasabah_fk` FOREIGN KEY (`kodeNasabah`) REFERENCES `nasabah` (`kodeNasabah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kodePeg_fk` FOREIGN KEY (`kodePegawai`) REFERENCES `pegawai` (`kodePegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `noRekening_fk` FOREIGN KEY (`noRekening`) REFERENCES `rekening` (`noRekening`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
