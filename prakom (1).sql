-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2019 at 05:22 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prakom`
--

-- --------------------------------------------------------

--
-- Table structure for table `detil_transaksi`
--

CREATE TABLE `detil_transaksi` (
  `id_detil` int(11) NOT NULL,
  `cv` varchar(20) NOT NULL,
  `status_pilihan` varchar(20) NOT NULL,
  `status_perusahaan` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_transaksi`
--

INSERT INTO `detil_transaksi` (`id_detil`, `cv`, `status_pilihan`, `status_perusahaan`, `tanggal`, `id_perusahaan`, `id_siswa`) VALUES
(61, 'kalpanax.jpg', '1', 'diterima', '2019-12-04', 6, 12),
(62, 'bag2.jpg', '2', 'diterima', '2019-12-05', 6, 14),
(63, 'Screenshot_2019-04-2', '2', 'diterima', '2019-12-05', 8, 16),
(64, 'Screenshot_2019-04-2', '1', 'diterima', '2019-12-05', 11, 17),
(65, 'kalpanax1.jpg', '1', 'diterima', '2019-12-06', 6, 19),
(66, 'Mixagrip4.png', '2', 'diterima', '2019-12-06', 8, 21),
(67, 'sangobion3.jpg', '1', 'diterima', '2019-12-06', 11, 20),
(68, 'kalpanax2.jpg', '1', 'diterima', '2019-12-09', 7, 22),
(69, 'bisolvon2.jpg', '1', 'diterima', '2019-12-09', 8, 23),
(70, 'bisolvon3.jpg', '1', 'diterima', '2019-12-09', 7, 24),
(71, 'bisolvon4.jpg', '1', '', '2019-12-09', 6, 25),
(72, 'bisolvon5.jpg', '2', 'diterima', '2019-12-09', 7, 26),
(73, 'bisolvon6.jpg', '1', '', '2019-12-09', 8, 27);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kat` int(11) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `kota` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kat`, `jurusan`, `kota`) VALUES
(5, 'RPL', 'MALANG'),
(6, 'TKJ', 'Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `persyaratan`
--

CREATE TABLE `persyaratan` (
  `id_persyaratan` int(11) NOT NULL,
  `cv` varchar(20) NOT NULL,
  `surat_izin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persyaratan`
--

INSERT INTO `persyaratan` (`id_persyaratan`, `cv`, `surat_izin`) VALUES
(3, 'ada', 'ada');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(20) NOT NULL,
  `gambar` text NOT NULL,
  `kuota` varchar(20) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `pilihan` varchar(50) NOT NULL,
  `id_kat` int(11) NOT NULL,
  `id_persyaratan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `gambar`, `kuota`, `deskripsi`, `pilihan`, `id_kat`, `id_persyaratan`) VALUES
(6, 'Telkom Akses', 'telkomakses.png', '26', 'Pasuruan', '1', 6, 3),
(7, 'Lintas Arta', 'lintas arta.jpeg', '3', 'Malang', '', 5, 3),
(8, 'Batavianet', 'batavianet.png', '2', 'Jakarta', '', 5, 3),
(10, 'Sekawan Media', '0.png', '29', 'Malang', '', 6, 3),
(11, 'Mitratel', 'mitratel1.jpg', '9', 'Surabaya', '', 6, 3),
(12, 'Jagoan Hosting', 'jagoan hosting.png', '4', 'Malang', '', 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `kelas` varchar(11) NOT NULL,
  `telp` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `nis`, `kelas`, `telp`, `username`, `password`) VALUES
(12, 'Mayla Zida R.I', '098765', 'XIIR5', 98765432, 'zida', 'zida'),
(13, 'Amalia Yuna Puspita', '12345', 'XIIR5', 12345678, 'amel', 'amel'),
(14, 'Nanda Safira', '12345678', 'XIIR5', 9876543, 'nanda', 'nanda'),
(15, 'Dewi Ayu Alamanda', '1234567', 'XIIR1', 987654, 'dewik', 'dewik'),
(16, 'Himmah Aulia', '1234567', 'XIIR2', 12345678, 'hima', 'hima'),
(17, 'Sherly Yuke', '123456', 'XIIR4', 98765466, 'sherly', 'sherly'),
(18, 'Amalia Yuna', '1234567', 'XIIR5', 9876543, 'amel', 'amel'),
(19, 'Yudha Dwipriatma`', '878464', 'XIIR5', 82234221, 'yudha', 'yudha'),
(20, 'enop', '98989', 'XIIR5', 833733673, 'enop', 'enop'),
(21, 'bocil', '8787', 'XIIR5', 98765488, 'bocil', 'bocil'),
(22, 'Rahma', '1234567', 'XIIR5', 98765432, 'rahma', 'rahma'),
(23, 'Maura Archika', '1234567', 'XIIR5', 987654, 'maura', 'maura'),
(24, 'Fasya', '234567', 'XIIR5', 987654, 'fasya', 'fasya'),
(25, 'a', '12345678', 'XIIR5', 9876543, 'a', 'a'),
(26, 'b', '123456789', 'XIIR5', 9876543, 'b', 'b'),
(27, 'c', '12345678', 'XIIR5', 9876543, 'c', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
(1, 'maylazida', 'mayla', '12345678', 'admin'),
(2, 'Abror', 'abror', 'abror123', 'hubin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detil_transaksi`
--
ALTER TABLE `detil_transaksi`
  ADD PRIMARY KEY (`id_detil`),
  ADD KEY `id_perusahaan` (`id_perusahaan`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indexes for table `persyaratan`
--
ALTER TABLE `persyaratan`
  ADD PRIMARY KEY (`id_persyaratan`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`),
  ADD KEY `id_kat` (`id_kat`),
  ADD KEY `id_persyaratan` (`id_persyaratan`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detil_transaksi`
--
ALTER TABLE `detil_transaksi`
  MODIFY `id_detil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `persyaratan`
--
ALTER TABLE `persyaratan`
  MODIFY `id_persyaratan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detil_transaksi`
--
ALTER TABLE `detil_transaksi`
  ADD CONSTRAINT `detil_transaksi_ibfk_1` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id_perusahaan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detil_transaksi_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD CONSTRAINT `perusahaan_ibfk_1` FOREIGN KEY (`id_persyaratan`) REFERENCES `persyaratan` (`id_persyaratan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `perusahaan_ibfk_2` FOREIGN KEY (`id_kat`) REFERENCES `kategori` (`id_kat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
