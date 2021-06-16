-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2021 at 02:46 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joco`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter_spkk`
--

CREATE TABLE `dokter_spkk` (
  `id` int(1) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `biaya_konsultasi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter_spkk`
--

INSERT INTO `dokter_spkk` (`id`, `nama_dokter`, `email`, `biaya_konsultasi`) VALUES
(8, 'dr. Kim Jun Wan', 'junwanssi@apps.yulje.ac.kr', '0 - 23.000'),
(9, 'dr. Andrea', 'andrea1004@gmail.com', 'Gratis');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id` int(11) NOT NULL,
  `jenis_konsultasi` varchar(15) NOT NULL,
  `tanggal_konsultasi` date NOT NULL,
  `dokter_pj` varchar(200) NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `catatan_konsultasi` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`id`, `jenis_konsultasi`, `tanggal_konsultasi`, `dokter_pj`, `waktu_mulai`, `waktu_selesai`, `catatan_konsultasi`) VALUES
(1, 'Dalam Jaringan', '2021-06-15', 'dr. Meitu, Sp.DV', '10:15:00', '12:40:00', 'Jangan terlalu sering mengeksfoliasi kulit'),
(5, 'Luar Jaringan', '2021-07-13', 'dr. Priyanka Chopra, Sp. DV', '12:12:00', '14:00:00', 'Kurangi konsumsi junk food'),
(7, 'Dalam Jaringan', '2021-06-02', 'dr. Fauzi, Sp. Dv.', '15:46:00', '15:48:00', 'Kurangi minum minuman bersoda');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(4) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `jenis_produk` varchar(50) NOT NULL,
  `no_bpom` int(12) NOT NULL,
  `bahan_aktif` varchar(80) NOT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `jenis_produk`, `no_bpom`, `bahan_aktif`, `keterangan`, `id_user`) VALUES
(3, 'Blurred Skin Toner', 'Exfoliating Toner', 1590551289, 'Retinoic Acid', 'Untuk usia di atas 20 tahun', 1),
(4, 'Manglingi Mask', 'Wash Off Mask', 2100328937, 'Salicylic Acid', 'Untuk kulit mudah berjerawat', 5),
(5, 'Face em', 'Physical Sunscreen', 239117122, 'Zinc Oxide, Titanium Dioxide', 'Dapat memicu tumbuhnya fungal acne', 5),
(6, 'Glessie Purifying Moisturizer', 'Moisturizer', 1340102921, 'Vitamin B3, Dimethicone, Glycolic Acid', 'Untuk kulit berminyak', 2),
(7, 'Shinind', 'Serum', 3182146, 'Centella Asiatica', 'Cocok untuk segala jenis kulit', 6),
(10, 'Sugar Candy', 'Lip balm', 81020, 'Aloe vera', 'Melembabkan bibir yang kering', 1),
(12, 'Vanilla Crush', 'BB Cream', 51029, 'Niacinamide', 'Fungal acne trigger', 3),
(19, 'Acengel', 'Facial Scrub', 2491022, 'Microbeads', 'Tidak direkomendasikan untuk kulit sensitif', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `jenis_kulit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_lengkap`, `username`, `password`, `jenis_kelamin`, `jenis_kulit`) VALUES
(1, 'Jinny Hanafi', 'jj_hanafi', 'b54b23213b3acab3a7a0fbe0cc83e236', 'Perempuan', 'Berminyak, mudah berjerawat'),
(2, 'Sullistyo Azzikry', 'tyo_azzikry12', '18515259bbf375d86190ba25e78187cb', 'Laki-laki', 'Kombinasi'),
(3, 'Violet Antonio', 'violetto2312', '5472bddea63fb6d44dfad028a9b8628b', 'Perempuan', 'Kering, Sensitif'),
(5, 'Orizuka Fitri Hermawan', 'orizukafh', '4d0c63af90741202e4e04e4ea73e9407', 'Perempuan', 'Sensitif'),
(6, 'Gita C Nomi', 'gitcaha', '0079fcb602361af76c4fd616d60f9414', 'Perempuan', 'Kering'),
(8, 'Andini Karisma Putri', 'andin_ic', '123', 'Perempuan', 'Normal'),
(9, 'Budi Domeri', 'domerioo', '123', 'Laki-laki', 'Kering');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter_spkk`
--
ALTER TABLE `dokter_spkk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_bpom` (`no_bpom`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter_spkk`
--
ALTER TABLE `dokter_spkk`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
