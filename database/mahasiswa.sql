-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2024 at 09:09 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beasiswa_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `semester` int(11) NOT NULL,
  `ipk` decimal(3,2) NOT NULL,
  `beasiswa` varchar(50) NOT NULL,
  `berkas` varchar(255) DEFAULT NULL,
  `status_ajuan` varchar(20) DEFAULT 'Belum Diverifikasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `email`, `no_hp`, `semester`, `ipk`, `beasiswa`, `berkas`, `status_ajuan`) VALUES
(6, 'MUHAMMAD RIDWAN HIDAYAT', '20102066@ittelkom-pwt.ac.id', '082327135956', 4, 3.20, 'Akademik', 'd6f8f-04_fr.ia.02-tugas-praktik-demonstrasi_v3-esron.pdf', 'Belum Diverifikasi'),
(7, 'MUHAMMAD RIDWAN HIDAYAT', '20102066@ittelkom-pwt.ac.id', '082327135956', 4, 3.20, 'Akademik', 'd6f8f-04_fr.ia.02-tugas-praktik-demonstrasi_v3-esron.pdf', 'Belum Diverifikasi'),
(8, 'MUHAMMAD RIDWAN HIDAYAT', '20102066@ittelkom-pwt.ac.id', '082327135956', 2, 3.00, 'Akademik', 'd6f8f-04_fr.ia.02-tugas-praktik-demonstrasi_v3-esron.pdf', 'Belum Diverifikasi'),
(10, 'MUHAMMAD RIDWAN HIDAYAT', 'ridwan.hidayat996@gmail.com', '082327135956', 4, 3.20, 'Akademik', 'd6f8f-04_fr.ia.02-tugas-praktik-demonstrasi_v3-esron.pdf', 'Belum Diverifikasi'),
(11, 'MUHAMMAD RIDWAN HIDAYAT', '20102066@ittelkom-pwt.ac.id', '082327135956', 3, 3.10, 'Non-Akademik', 'd6f8f-04_fr.ia.02-tugas-praktik-demonstrasi_v3-esron.pdf', 'Belum Diverifikasi'),
(12, 'MUHAMMAD RIDWAN HIDAYAT', '20102066@ittelkom-pwt.ac.id', '082327135956', 6, 3.40, 'Non-Akademik', 'd6f8f-04_fr.ia.02-tugas-praktik-demonstrasi_v3-esron.pdf', 'Belum Diverifikasi'),
(13, 'MUHAMMAD RIDWAN HIDAYAT', 'ridwan.hidayat996@gmail.com', '082327135956', 8, 3.60, 'Akademik', 'd6f8f-04_fr.ia.02-tugas-praktik-demonstrasi_v3-esron.pdf', 'Belum Diverifikasi'),
(14, 'MUHAMMAD RIDWAN HIDAYAT', '20102066@ittelkom-pwt.ac.id', '082327135956', 8, 3.60, 'Akademik', 'd6f8f-04_fr.ia.02-tugas-praktik-demonstrasi_v3-esron.pdf', 'Belum Diverifikasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
