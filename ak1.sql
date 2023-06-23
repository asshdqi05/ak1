-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 27, 2022 at 01:37 AM
-- Server version: 5.7.19
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ak1`
--

-- --------------------------------------------------------

--
-- Table structure for table `berkas_pencaker`
--

CREATE TABLE `berkas_pencaker` (
  `id` int(11) NOT NULL,
  `id_pencaker` int(11) NOT NULL,
  `pas_foto` varchar(255) DEFAULT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  `ijazah` varchar(255) DEFAULT NULL,
  `vaksin` varchar(255) DEFAULT NULL,
  `status_pas_photo` varchar(20) DEFAULT NULL,
  `status_ktp` varchar(20) DEFAULT NULL,
  `status_ijazah` varchar(20) DEFAULT NULL,
  `status_vaksin` varchar(20) DEFAULT NULL,
  `ctt_tolak_pas_photo` varchar(255) DEFAULT NULL,
  `ctt_tolak_ktp` varchar(255) DEFAULT NULL,
  `ctt_tolak_ijazah` varchar(255) DEFAULT NULL,
  `ctt_tolak_vaksin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pekerjaan`
--

CREATE TABLE `detail_pekerjaan` (
  `id` int(11) NOT NULL,
  `id_pencaker` int(11) DEFAULT NULL,
  `nama_pekerjaan` varchar(255) DEFAULT NULL,
  `nama_perusahaan` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` int(11) NOT NULL,
  `nama_kecamatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama_kecamatan`) VALUES
(1, 'SILAUT'),
(2, 'LUNANG'),
(3, 'BASA AMPEK BALAI TAPAN	'),
(4, 'RANAH AMPEK HULU TAPAN	'),
(5, 'PANCUNG SOAL	'),
(6, 'AIRPURA	'),
(7, 'LINGGO SARI BAGANTI	'),
(8, 'RANAH PESISIR	'),
(9, 'LENGAYANG	'),
(10, 'SUTERA	'),
(11, 'BATANG KAPAS	'),
(12, 'IV JURAI	'),
(14, 'BAYANG'),
(15, 'IV NAGARI BAYANG UTARA	'),
(16, 'KOTO XI TARUSAN	');

-- --------------------------------------------------------

--
-- Table structure for table `level_user`
--

CREATE TABLE `level_user` (
  `id` int(11) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_user`
--

INSERT INTO `level_user` (`id`, `level`) VALUES
(1, 'Admin'),
(2, 'Petugas'),
(3, 'Pimpinan');

-- --------------------------------------------------------

--
-- Table structure for table `nagari`
--

CREATE TABLE `nagari` (
  `id` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `nama_nagari` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nagari`
--

INSERT INTO `nagari` (`id`, `id_kecamatan`, `nama_nagari`) VALUES
(1, 1, 'SILAUT'),
(2, 1, 'SAMBUNGO'),
(3, 1, 'AIR HITAM'),
(4, 1, 'LUBUK BUNTA'),
(5, 1, 'DURIAN SERIBU'),
(6, 1, 'PASIR BINJAI'),
(7, 1, 'TALANG BINJAI'),
(8, 1, 'SUNGAI SARIK'),
(9, 1, 'SUNGAI PULAI'),
(10, 1, 'SUNGAI SIRAH'),
(11, 2, 'LUNANG'),
(12, 2, 'LUNANG SELATAN'),
(13, 2, 'LUNANG UTARA'),
(14, 2, 'LUNANG BARAT'),
(15, 2, 'SINDANG LUNANG'),
(16, 2, 'LUNANG SATU'),
(17, 2, 'LUNANG TENGAH'),
(18, 2, 'PONDOK PARIAN LUNANG'),
(19, 2, 'LUNANG DUA'),
(20, 2, 'LUNANG TIGA'),
(21, 3, 'TAPAN'),
(22, 3, 'BATANG ARAH TAPAN'),
(23, 3, 'PASAR TAPAN'),
(24, 3, 'AMPANG TULAK TAPAN'),
(25, 3, 'KOTO ANAU TAPAN'),
(26, 3, 'DUSUN BARU TAPAN'),
(27, 3, 'TANJUNG PONDOK TAPAN'),
(28, 3, 'BATANG BETUNG TAPAN'),
(29, 3, 'RIAK DANAU TAPAN'),
(30, 3, 'BUKIT BUAI TAPAN'),
(31, 4, 'KUBU TAPAN'),
(32, 4, 'TALANG KOTO PULAI TAPAN'),
(33, 4, 'BINJAI TAPAN'),
(34, 4, 'SUNGAI GAMBIR SAKO TAPAN'),
(35, 4, 'SIMPANG GUNUNG TAPAN'),
(36, 4, 'KAMPUNG TENGAH TAPAN'),
(37, 4, 'SUNGAI PINANG TAPAN'),
(38, 4, 'TEBING TINGGI TAPAN'),
(39, 4, 'TALANG BALARIK TAPAN'),
(40, 4, 'LIMAU PURUT TAPAN'),
(41, 5, 'INDERAPURA'),
(42, 5, 'MUARO SAKAI INDERAPURA'),
(43, 5, 'INDERAPURA BARAT'),
(44, 5, 'TIGO SEPAKAT INDERAPURA'),
(45, 5, 'INDERAPURA SELATAN'),
(46, 5, 'KUDO-KUDO INDERAPURA'),
(47, 5, 'SIMPANG LAMA INDERAPURA'),
(48, 5, 'TLUK AMPLU INDRAPURA'),
(49, 5, 'INDERAPURA TENGAH'),
(50, 5, 'TIGO SUNGAI INDERAPURA'),
(51, 6, 'INDERAPURA TIMUR'),
(52, 6, 'INDERAPURA UTARA'),
(53, 6, 'PULAU RAJO INDERAPURA'),
(54, 6, 'TLUK KUALO INDERAPURA'),
(55, 6, 'PALOKAN INDERAPURA'),
(56, 6, 'TANAH BAKALI INDERAPURA'),
(57, 6, 'LALANG PANJANG INDERAPURA'),
(58, 6, 'DAMAR LAPAN BATANG INDERAPURA'),
(59, 6, 'MUARA INDERAPURA'),
(60, 6, 'LALANG PANJANG INDERAPURA'),
(61, 7, 'AIE HAJI'),
(62, 7, 'PUNGGASAN'),
(63, 7, 'PUNGGASAN TIMUR'),
(64, 7, 'PADANG XI PUNGGASAN'),
(65, 7, 'LAGAN MUDIK PUNGGASAN'),
(66, 7, 'LAGAN HILIR PUNGGASAN'),
(67, 7, 'PUNGGASAN UTARA'),
(68, 7, 'MUARA GADANG AIR HAJI'),
(69, 7, 'AIR HAJI BARAT'),
(70, 7, 'PASAR BUKIT AIR HAJI'),
(71, 7, 'SUNGAI SIRAH AIR HAJI'),
(72, 7, 'RANTAU SIMALENANG AIR HAJI'),
(73, 7, 'AIR HAJI TENGAH'),
(74, 7, 'PASAR LAMA MUARA AIR HAJI'),
(75, 7, 'AIR HAJI TENGGARA'),
(76, 7, 'MUARA KANDIS PUNGGASAN'),
(77, 8, 'SUNGAI TUNU'),
(78, 8, 'PALANGAI'),
(79, 8, 'SUNGAI TUNU BARAT'),
(80, 8, 'SUNGAI TUNU UTARA'),
(81, 8, 'NYIUR MELAMBAI PELANGAI'),
(82, 8, 'PELANGAI KACIAK'),
(83, 8, 'PELANGAI GADANG'),
(84, 8, 'KOTO VIII PELANGAI'),
(85, 8, 'PASIA PELANGAI'),
(86, 8, 'SUNGAI LIKU PELANGAI'),
(87, 9, 'LAKITAN'),
(88, 9, 'KAMBANG'),
(89, 9, 'LAKITAN SELATAN'),
(90, 9, 'LAKITAN TENGAH'),
(91, 9, 'LAKITAN TIMUR'),
(92, 9, 'LAKITAN UTARA'),
(93, 9, 'KAMBANG BARAT'),
(94, 9, 'KAMBANG UTARA'),
(95, 9, 'KAMBANG TIMUR'),
(96, 10, 'AMPING PARAK'),
(97, 10, 'SURANTIH'),
(98, 10, 'TARATAK'),
(99, 10, 'AMPING PARAK TIMUR'),
(100, 10, 'AUR DURI SURANTIH'),
(101, 10, 'RAWANG GUNUNG MALELO SURANTIH'),
(102, 10, 'KOTO NAN TIGO SELATAN SURANTIH'),
(103, 10, 'KOTO NAN TIGO UTARA SURANTIH'),
(104, 10, 'GANTIANG MUDIAK SELATAN SURANTIH'),
(105, 10, 'GANTIANG MUDIAK UTARA SURANTIH'),
(106, 10, 'LANSANO TARATAK'),
(107, 10, 'KOTO TARATAK'),
(108, 11, 'IV KOTO HILIE'),
(109, 11, 'IV KOTO MUDIEK'),
(110, 11, 'TALUK'),
(111, 11, 'KOTO NAN TIGO IV KOTO HILIE'),
(112, 11, 'KOTO NAN DUO IV KOTO HILIE'),
(113, 11, 'SUNGAI NYALO IV KOTO MUDIEK'),
(114, 11, 'TUIK IV KOTO MUDIEK'),
(115, 11, 'TARATAK TEMPATIH IV KOTO MUDIEK'),
(116, 11, 'TALUK TIGO SAKATO'),
(117, 12, 'SALIDO'),
(118, 12, 'PAINAN'),
(119, 12, 'LUMPO'),
(120, 12, 'TAMBANG'),
(121, 12, 'BUNGO PASANG SALIDO'),
(122, 12, 'SAGO SALIDO'),
(123, 12, 'PAINAN SELATAN PAINAN'),
(124, 12, 'PAINAN TIMUR PAINAN'),
(125, 12, 'BUKIK KACIAK LUMPO'),
(126, 12, 'SUNGAI SARIAK LUMPO'),
(127, 12, 'SUNGAI GAYO LUMPO'),
(128, 12, 'GUNUNG BUNGKUAK LUMPO'),
(129, 12, 'AMPANG TAREH LUMPO'),
(130, 12, 'AMPUAN LUMPO'),
(131, 12, 'BALAI SINAYAN LUMPO'),
(132, 12, 'TARATAK TANGAH LUMPO'),
(133, 12, 'BATU KUNIK LUMPO'),
(134, 12, 'LIMAU GADANG LUMPO'),
(135, 12, 'KOTO RAWANG'),
(136, 12, 'SALIDO SARI BULAN'),
(137, 14, 'PASAR BARU'),
(138, 14, 'TALAOK'),
(139, 14, 'KOTO BARAPAK'),
(140, 14, 'GURUN PANJANG'),
(141, 14, 'API-API PASAR BARU'),
(142, 14, 'TANJUNG DURIAN PASAR BARU'),
(143, 14, 'ASAM KAMBA PASAR BARU'),
(144, 14, 'SAWAH LAWEH PASAR BARU'),
(145, 14, 'KAPEH PANJI JAYA TALAOK'),
(146, 14, 'AUR BEGALUNG TALAOK'),
(147, 14, 'KAPELGAM KOTO BARAPAK'),
(148, 14, 'KAPUJAN KOTO BARAPAK'),
(149, 14, 'KOTO BARU KOTO BARAPAK'),
(150, 14, 'KUBANG KOTO BARAPAK'),
(151, 14, 'GURUN PANJANG SELATAN'),
(152, 14, 'GURUN PANJANG UTARA'),
(153, 14, 'GURUN PANJANG BARAT'),
(154, 15, 'PULUIK PULUIK'),
(155, 15, 'KOTO RANAH'),
(156, 15, 'MUARO AIE'),
(157, 15, 'PANCUANG TABA'),
(158, 15, 'PULUIK PULUIK SELATAN'),
(159, 15, 'LIMAU GADANG PANCUNG TABA'),
(160, 16, 'KAPUH'),
(161, 16, 'AMPANG PULAI'),
(162, 16, 'NANGGALO'),
(163, 16, 'BATU HAMPAR'),
(164, 16, 'DUKU'),
(165, 16, 'BARUNG BARUNG BALANTAI'),
(166, 15, 'SUNGAI PINANG'),
(167, 16, 'SIGUNTUR'),
(168, 16, 'TARATAK SUNGAI LUNDANG'),
(169, 16, 'KAPUH UTARA'),
(170, 16, 'MANDEH'),
(171, 16, 'BARUNG BARUNG BALANTAI SELATAN'),
(172, 16, 'JINANG KAMPUNG PANSUR AMPANG PULAI'),
(173, 16, 'PULAU KARAM AMPANG PULAI'),
(174, 16, 'CEROCOK ANAU AMPANG PULAI'),
(175, 16, 'SUNGAI NYALO MUDIAK AIE'),
(176, 16, 'SETARA NANGGALO'),
(177, 16, 'BATU HAMPAR SELATAN'),
(178, 16, 'DUKU UTARA'),
(179, 16, 'BARUNG-BARUNG BALANTAI TIMUR'),
(180, 16, 'SIGUNTUR TUA'),
(181, 16, 'KAMPUNG BARU KORONG NAN AMPEK'),
(182, 16, 'BARUNG-BARUNG BALANTAI TENGAH');

-- --------------------------------------------------------

--
-- Table structure for table `pencaker`
--

CREATE TABLE `pencaker` (
  `id` int(11) NOT NULL,
  `nik` char(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `status_perkawinan` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `nagari` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `flag` int(11) NOT NULL COMMENT '1 = biodata belum lengkap\r\n2 = biodata lengkap & berkas belum lengkap\r\n3 = semua lengkap',
  `status_kerja` varchar(255) DEFAULT NULL,
  `tanggal_daftar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_ak1`
--

CREATE TABLE `pengajuan_ak1` (
  `id` int(11) NOT NULL,
  `id_pencaker` int(11) NOT NULL,
  `no_pendaftaran` varchar(255) DEFAULT NULL,
  `berlaku_awal` date DEFAULT NULL,
  `berlaku_akhir` date DEFAULT NULL,
  `tipe` int(11) DEFAULT NULL COMMENT '1 = buat baru\r\n2 = perpanjang',
  `status` int(11) DEFAULT NULL COMMENT '1 = Verifikasi Berkas.\r\n2 = Di setujui petugas.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_user`, `username`, `password`, `level`) VALUES
(1, 'Niken', 'admin', '$2y$10$bSY2GcgMGp3.F39dK73OneeXKBUe8WOJOEJo4znh2ggQ.JUoAoJ.S', 1),
(2, 'Ijep', 'petugas', '$2y$10$4krYYDtucNU4NfDvQqKMT.ORoUTESB/lyHhtYIoYtiVk9isNVA4Xe', 2),
(3, 'Kadis', 'pimpinan', '$2y$10$2Bil0JYoafIIpy6TFv5/yeHx.pdRJ1PGzQkoKStBsMdoyB0cCFL/S', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas_pencaker`
--
ALTER TABLE `berkas_pencaker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_pekerjaan`
--
ALTER TABLE `detail_pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_user`
--
ALTER TABLE `level_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nagari`
--
ALTER TABLE `nagari`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pencaker`
--
ALTER TABLE `pencaker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan_ak1`
--
ALTER TABLE `pengajuan_ak1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berkas_pencaker`
--
ALTER TABLE `berkas_pencaker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_pekerjaan`
--
ALTER TABLE `detail_pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `nagari`
--
ALTER TABLE `nagari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `pencaker`
--
ALTER TABLE `pencaker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengajuan_ak1`
--
ALTER TABLE `pengajuan_ak1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
