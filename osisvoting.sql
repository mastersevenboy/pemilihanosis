-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2019 at 01:38 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osisvoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_aturan`
--

CREATE TABLE `tb_aturan` (
  `id` int(10) NOT NULL,
  `ketentuan` text NOT NULL,
  `panduan` text NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_aturan`
--

INSERT INTO `tb_aturan` (`id`, `ketentuan`, `panduan`, `foto`) VALUES
(1, '<p><strong>KETENTUAN PEILHAN KETUA OSIS</strong></p><ul><li><strong>Pemilih</strong></li></ul><ol><li><strong>Pemilih merupakan siswa/siswi SMK Widya Karya yang masih aktif.</strong></li><li><strong>Pemilih melakuakan registrasi dan pemilihan secara sistem aplikasi pemilihan ketua OSIS.</strong></li></ol><ul><li><strong>Kandidat</strong></li></ul><ol><li><strong>Calon kandidat&nbsp;merupakan siswa/siswi SMK Widya Karya yang masih aktif.</strong></li><li><strong>Melakukan registrasi kepada panitia pemilihan ketua OSIS berupa form pendaftaran dan foto(softfile dan hard file).</strong></li><li><strong>Calon kandidat merupakan kelas XI atau XII</strong></li></ol><ul><li><strong>Hasil Pemilihan</strong></li></ul><ol><li><strong>Hasil pemilihan berdasarkan poling suara terbanyak secara voting.</strong></li><li><strong>Pemenang ditentukan oleh perolehan terbanyak, setelah diputuskan oleh panitia dan ditetapkan oleh guru pendamping OSIS.</strong></li></ol>', '<p><strong>Panduan Pemakaian Aplikasi</strong></p><ol><li><strong>Silakan melakukan registrasi sebagai pemilih isi data sesuai petujuk.</strong></li><li><strong>Jika sudah tungggu akun anda diaktifin oleh admin.</strong></li><li><strong>Jika sudah aktif ditandai dengan anda bisa masuk ke aplikasi, yaitu dengan memasukan nis dan password anda.</strong></li><li><strong>JIka anda sudah akan ada 4 menu yaitu Home, Pemilu, Hasil Pemilu dan Tentang Aplikasi.</strong></li></ol><ul><li><strong>Ketentuan Permenu</strong></li></ul><ol><li><strong>Home sebagai menu tampilan pertama anda masuk aplikasi.</strong></li><li><strong>Pemilu sebagai menu tampilan untuk melakukan pemilihan kandidat yang dilipilih dan melihat profil kandidat calon ketua OSIS.</strong></li><li><strong>Hasil Pemilu sebagai menu tampilan hasil pemenang pemilihan ketua OSIS.</strong></li><li><strong>Tentang Aplikasi sebagai menu tampilan tentang Aplikasi E-voting SMK WIKA.</strong></li></ol>', 'osis.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kandidat`
--

CREATE TABLE `tb_kandidat` (
  `id_kandidat` int(10) NOT NULL,
  `nis_kandidat` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('P','L') NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kandidat`
--

INSERT INTO `tb_kandidat` (`id_kandidat`, `nis_kandidat`, `nama`, `tempat`, `tgl_lahir`, `jk`, `kelas`, `jurusan`, `visi`, `misi`, `foto`) VALUES
(7, '12346', 'PUAS TRIAWAN', 'Banyumas', '2019-07-18', 'P', 'X', 'TKJ', '<p>bhhj</p>', '<p>jbib</p>', 'chef-with-mustache-raising-finger-up-300x3002.jpg'),
(8, '12347', 'bagas candra permana', 'Banyumas', '2019-08-03', 'L', 'XI', 'TKJ', '<p>dasdsadsa</p>', '<p>vfdsvdsv</p>', 'koki-png-6-300x2004.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_siswa`
--

CREATE TABLE `tb_master_siswa` (
  `id_siswa` int(50) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` enum('X','XI','XII') NOT NULL,
  `jurusan` enum('TKR','TKJ','TSM') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_master_siswa`
--

INSERT INTO `tb_master_siswa` (`id_siswa`, `nis`, `nama`, `kelas`, `jurusan`) VALUES
(1, '0001186446', 'Arif Junaedi Purnomo', 'X', 'TSM'),
(2, '0002246840', 'Roto Sartono', 'X', 'TSM'),
(3, '0002267151', 'Nanda Setiawan', 'X', 'TSM'),
(4, '0005147213', 'Faiz Dzikri Nur Ramadhan', 'X', 'TKR'),
(5, '0005878501', 'Adit Tiya Nur Farid', 'X', 'TKR'),
(6, '0014091592', 'Galuh Anggit Sakilamusa', 'X', 'TSM'),
(7, '0017190782', 'Jafar Sodik', 'X', 'TSM'),
(8, '0017295761', 'Widiyanti', 'X', 'TKJ'),
(9, '0017295765', 'Aditya Bayu Kurniawan', 'X', 'TSM'),
(10, '0017310700', 'Imam Fauzi Saenari', 'X', 'TKR'),
(11, '0018486961', 'Ivan Fauzi', 'X', 'TSM'),
(12, '0018517364', 'Arif Akhdiat', 'X', 'TKR'),
(13, '0018909496', 'SUTAN BINTANG RAMADHAN', 'X', 'TSM'),
(14, '0019739881', 'Alfi Syahrani Pangestu', 'X', 'TSM'),
(15, '0019840440', 'Dana Itmam  Ramadhan Widianto Putra', 'X', 'TSM'),
(16, '0020420908', 'Ade Risnanto', 'X', 'TKJ'),
(17, '0020461382', 'Riki Saputra', 'X', 'TKR'),
(18, '0020465723', 'Feri Nirsanto', 'X', 'TKR'),
(19, '0020465922', 'Fembi Dwi Prabayu', 'X', 'TKR'),
(20, '0023599395', 'Dianto', 'X', 'TSM'),
(21, '0023599402', 'Fauzan Irvandi', 'X', 'TSM'),
(22, '0023599734', 'Afrian Indra Fajara', 'X', 'TKR'),
(23, '0023734655', 'Rizky Ade Saputra', 'X', 'TKR'),
(24, '0025039830', 'Hanif Syafril Nurohman', 'X', 'TKR'),
(25, '0025312006', 'Antoni', 'X', 'TSM'),
(26, '0025698992', 'Fatul Hidayat', 'X', 'TKR'),
(27, '0025789726', 'Hilmi Fatchur Ridho', 'X', 'TKR'),
(28, '0026195900', 'Rido Agusti', 'X', 'TSM'),
(29, '0026195908', 'Amiati', 'X', 'TKJ'),
(30, '0026253464', 'Aciyen Dwi Susanto', 'X', 'TKJ'),
(31, '0027585245', 'Nur Fauzan', 'X', 'TKR'),
(32, '0027622180', 'Bagas Edo Prasetyo', 'X', 'TKR'),
(33, '0028676833', 'Farchan Pamuji', 'X', 'TKR'),
(34, '0029125398', 'Fany Aldian Syah', 'X', 'TSM'),
(35, '0030294537', 'Iron Revan Syah', 'X', 'TKR'),
(36, '0031315244', 'Evan Rizki Meilano', 'X', 'TKJ'),
(37, '0031315246', 'Veri Setiawan', 'X', 'TKJ'),
(38, '0031459336', 'Hara Tanasya Anindira', 'X', 'TKJ'),
(39, '0031477760', 'Akmal Maulana', 'X', 'TSM'),
(40, '0031478577', 'Dimas Adi Saputra', 'X', 'TKJ'),
(41, '0032165845', 'VERI SOLEHMAN', 'X', 'TSM'),
(42, '0032174237', 'Gita Leksana', 'X', 'TKR'),
(43, '0032174345', 'Ardiyan Aziz Firmansyah', 'X', 'TSM'),
(44, '0032214981', 'Ibnu Khudzaivah', 'X', 'TSM'),
(45, '0032246906', 'Farhat Alam Syah', 'X', 'TSM'),
(46, '0032270602', 'Bagus Satria Pratama', 'X', 'TSM'),
(47, '0032270622', 'Putri Agustina', 'X', 'TKJ'),
(48, '0032739204', 'Eko Nurohmat', 'X', 'TSM'),
(49, '0032739206', 'Adisti Wulan Yunika', 'X', 'TKJ'),
(50, '0032796785', 'Icha Parinduri Listianti', 'X', 'TKJ'),
(51, '0032796803', 'Tegar Setiadi', 'X', 'TSM'),
(52, '0033257649', 'Fatah Munawar', 'X', 'TKR'),
(53, '0033366290', 'Yusuf Indra Rabbani', 'X', 'TKJ'),
(54, '0036150218', 'Deri Nur Awali', 'X', 'TKR'),
(55, '0036440067', 'Arifki Adiv Ramadhan', 'X', 'TSM'),
(56, '0036647256', 'Begya Saputra', 'X', 'TSM'),
(57, '0037660875', 'Rindang Pangiuban', 'X', 'TKR'),
(58, '0037757975', 'Brembo Adam Krisdianto', 'X', 'TKR'),
(59, '0039262830', 'Wahyu Wanda Putra', 'X', 'TKJ'),
(60, '0039760942', 'Tri Adika Putra', 'X', 'TSM'),
(61, '0040151361', 'Daniel Tri Wicaksono', 'X', 'TKR'),
(62, '0048453537', 'Tegar Samiaji', 'X', 'TKJ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_panitia`
--

CREATE TABLE `tb_panitia` (
  `id_panitia` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_panitia`
--

INSERT INTO `tb_panitia` (`id_panitia`, `nama`, `status`) VALUES
(4, 'Sukarno S.Kom', 'Kesiswaan'),
(5, 'M. Lukman S.Ag', 'Kepala Sekolah'),
(6, 'PUAS TRIAWAN', 'Ketua Panitia');

-- --------------------------------------------------------

--
-- Table structure for table `tb_suara`
--

CREATE TABLE `tb_suara` (
  `id` int(10) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nis_kandidat` varchar(50) NOT NULL,
  `suara` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_suara`
--

INSERT INTO `tb_suara` (`id`, `nis`, `nis_kandidat`, `suara`) VALUES
(17, 'f190ce9ac8445d249747cab7be43f7d5', '12346', 1),
(21, '827ccb0eea8a706c4c34a16891f84e7b', '12346', 1),
(22, 'fcea920f7412b5da7be0cf42b8c93759', '12346', 1),
(23, '25d55ad283aa400af464c76d713c07ad', '12346', 1),
(24, 'a3590023df66ac92ae35e3316026d17d', '12347', 1),
(25, '885cd3f705e7249ef438240f288ea1f8', '12346', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(10) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` enum('X','XI','XII') NOT NULL,
  `jurusan` enum('TKJ','TKR','TSM') NOT NULL,
  `level` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nis`, `nama`, `kelas`, `jurusan`, `level`, `status`, `password`) VALUES
(1, 'superadmin', 'PUAS TRIAWAN', 'X', 'TKJ', 'admin', '1', '337557cf00dc968c47c2e84ce50b9830'),
(20, '12341', 'bagas', 'X', 'TKJ', 'user', '1', '843d337108bb6dc183263a38a72a7d85'),
(27, '12345', 'Puas Triawan', 'XI', 'TKJ', 'user', '1', '843d337108bb6dc183263a38a72a7d85'),
(28, '12346', 'Firman', 'XI', 'TKR', 'user', '1', '843d337108bb6dc183263a38a72a7d85'),
(29, '1234567', 'Febri Yuaniar', 'XI', 'TKJ', 'user', '1', '843d337108bb6dc183263a38a72a7d85'),
(30, '12345678', 'megian toro', 'XI', 'TKJ', 'user', '1', '843d337108bb6dc183263a38a72a7d85'),
(32, '0001186446', 'Arif Junaedi Purnomo', 'X', 'TSM', 'user', '1', '843d337108bb6dc183263a38a72a7d85'),
(33, '0002267151', 'Nanda Setiawan', 'X', 'TSM', 'user', '1', '843d337108bb6dc183263a38a72a7d85');

-- --------------------------------------------------------

--
-- Table structure for table `tb_waktu`
--

CREATE TABLE `tb_waktu` (
  `id` int(10) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_waktu`
--

INSERT INTO `tb_waktu` (`id`, `waktu`) VALUES
(94, '2019-08-27 12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `vertifikasi`
--

CREATE TABLE `vertifikasi` (
  `nis` varchar(50) NOT NULL,
  `suara` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vertifikasi`
--

INSERT INTO `vertifikasi` (`nis`, `suara`) VALUES
('0001186446', 1),
('12341', 1),
('12345', 1),
('1234567', 1),
('12345678', 1),
('12346', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_aturan`
--
ALTER TABLE `tb_aturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kandidat`
--
ALTER TABLE `tb_kandidat`
  ADD PRIMARY KEY (`id_kandidat`),
  ADD KEY `nis_kandidat` (`nis_kandidat`);

--
-- Indexes for table `tb_master_siswa`
--
ALTER TABLE `tb_master_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tb_panitia`
--
ALTER TABLE `tb_panitia`
  ADD PRIMARY KEY (`id_panitia`);

--
-- Indexes for table `tb_suara`
--
ALTER TABLE `tb_suara`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`,`suara`),
  ADD KEY `suara` (`suara`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `tb_waktu`
--
ALTER TABLE `tb_waktu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vertifikasi`
--
ALTER TABLE `vertifikasi`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `suara` (`suara`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_aturan`
--
ALTER TABLE `tb_aturan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_kandidat`
--
ALTER TABLE `tb_kandidat`
  MODIFY `id_kandidat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_master_siswa`
--
ALTER TABLE `tb_master_siswa`
  MODIFY `id_siswa` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tb_panitia`
--
ALTER TABLE `tb_panitia`
  MODIFY `id_panitia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_suara`
--
ALTER TABLE `tb_suara`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_waktu`
--
ALTER TABLE `tb_waktu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vertifikasi`
--
ALTER TABLE `vertifikasi`
  ADD CONSTRAINT `vertifikasi_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `tb_user` (`nis`),
  ADD CONSTRAINT `vertifikasi_ibfk_2` FOREIGN KEY (`suara`) REFERENCES `tb_suara` (`suara`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
