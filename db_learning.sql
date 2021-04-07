-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2021 at 05:28 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `config_id` int(11) NOT NULL,
  `config_logo` varchar(100) NOT NULL,
  `config_sekolah` varchar(254) NOT NULL,
  `config_alamat` text NOT NULL,
  `config_kota` varchar(100) NOT NULL,
  `config_phone` varchar(14) NOT NULL,
  `config_email` varchar(100) NOT NULL,
  `config_kepsek` varchar(254) NOT NULL,
  `config_nipkepsek` varchar(50) NOT NULL,
  `config_author` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`config_id`, `config_logo`, `config_sekolah`, `config_alamat`, `config_kota`, `config_phone`, `config_email`, `config_kepsek`, `config_nipkepsek`, `config_author`) VALUES
(1, 'logo1.png', 'sman 3 kuala kapuas', 'Jl. Pemuda Km. 5,5, Selat Utara, Selat, Kapuas, Kalimantan Tengah', 'Kalimantan Tengah', '082382000703', 'sman3kapus@gmail.com', 'Dwi Haryanto', '12345678909', 'Yoshua Apridiopatra Eka Asi');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `guru_nip` varchar(50) NOT NULL,
  `guru_nama` varchar(254) NOT NULL,
  `guru_jk` enum('L','P') NOT NULL,
  `guru_tanggallahir` date NOT NULL,
  `guru_tempatlahir` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`guru_nip`, `guru_nama`, `guru_jk`, `guru_tanggallahir`, `guru_tempatlahir`) VALUES
('1234567890', 'Ahmad Mustadi', 'L', '1978-11-07', 'Bandar Lampung'),
('1234567891', 'Syaifudin', 'L', '1979-01-01', 'Lampung Utara'),
('1234567892', 'Rina Kurniawati', 'P', '1989-08-10', 'Lampung Tengah');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `jurusan_kode` varchar(10) NOT NULL,
  `jurusan_nama` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`jurusan_kode`, `jurusan_nama`) VALUES
('JUR01', 'IPA'),
('JUR02', 'IPS');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_kode` varchar(10) NOT NULL,
  `kelas_nama` varchar(254) NOT NULL,
  `kelas_jurusan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_kode`, `kelas_nama`, `kelas_jurusan`) VALUES
('KLS-01', 'X IPA', 'JUR01'),
('KLS-02', 'XI IPA', 'JUR01'),
('KLS-03', 'X IPS', 'JUR02'),
('KLS-04', 'XII IPA', 'JUR01'),
('KLS-05', 'XI IPS', 'JUR02'),
('KLS-06', 'XII IPS', 'JUR02');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `komentar_id` int(11) NOT NULL,
  `komentar_relasi` int(11) NOT NULL COMMENT 'diisi id tugas/id materi',
  `komentar_user` varchar(50) DEFAULT NULL COMMENT 'diisi nis siswa,jika kosong maka komentar dari guru',
  `komentar_isi` text NOT NULL,
  `komentar_waktu` datetime NOT NULL,
  `komentar_jenis` enum('materi','tugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`komentar_id`, `komentar_relasi`, `komentar_user`, `komentar_isi`, `komentar_waktu`, `komentar_jenis`) VALUES
(1, 5, NULL, 'test123', '2021-04-06 14:54:18', 'materi'),
(2, 5, '12346', 'testefbk;jwe', '2021-04-06 14:56:56', 'materi'),
(3, 5, '12346', 'test', '2021-04-06 14:57:16', 'materi'),
(4, 5, '12346', 'ini percobaan', '2021-04-06 15:11:50', 'materi'),
(5, 1, NULL, 'test tugas', '2021-04-06 15:36:25', 'tugas'),
(6, 1, '12346', 'test tugas 2', '2021-04-06 15:36:33', 'tugas'),
(7, 1, '12346', 'pak tugas nya dikumpul dalam format apa? terima kasih', '2021-04-06 16:09:45', 'tugas'),
(8, 1, '12345', 'oiya saya lupa pak, maaf', '2021-04-06 16:11:26', 'tugas'),
(9, 1, NULL, 'test guru', '2021-04-06 16:26:30', 'tugas'),
(10, 5, NULL, 'test materi guru', '2021-04-06 16:30:35', 'materi'),
(11, 6, NULL, 'test nateri baru', '2021-04-06 16:31:43', 'materi'),
(12, 6, NULL, 'oke lah', '2021-04-06 16:32:12', 'materi');

-- --------------------------------------------------------

--
-- Table structure for table `kumpul`
--

CREATE TABLE `kumpul` (
  `kumpul_id` int(11) NOT NULL,
  `kumpul_tugas` int(11) NOT NULL,
  `kumpul_siswa` varchar(50) NOT NULL,
  `kumpul_file` varchar(254) NOT NULL,
  `kumpul_waktu` datetime NOT NULL,
  `kumpul_nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kumpul`
--

INSERT INTO `kumpul` (`kumpul_id`, `kumpul_tugas`, `kumpul_siswa`, `kumpul_file`, `kumpul_waktu`, `kumpul_nilai`) VALUES
(3, 1, '12346', 'cahrt.jpg', '2021-04-06 16:05:05', 70),
(4, 1, '12345', 'document.pdf', '2021-04-06 16:11:48', 90);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `mapel_kode` varchar(50) NOT NULL,
  `mapel_nama` varchar(254) NOT NULL,
  `mapel_jurusan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`mapel_kode`, `mapel_nama`, `mapel_jurusan`) VALUES
('MPL-00001', 'Bahasa Indonesia', 'JUR01'),
('MPL-00002', 'Bahasa Inggris', 'JUR01'),
('MPL-00003', 'Bahasa Indonesia', 'JUR02'),
('MPL-00004', 'Bahasa Inggris', 'JUR02');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `materi_id` int(11) NOT NULL,
  `materi_mapelguru` int(11) NOT NULL,
  `materi_judul` varchar(254) NOT NULL,
  `materi_isi` longtext NOT NULL,
  `materi_file` varchar(254) DEFAULT NULL,
  `materi_waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`materi_id`, `materi_mapelguru`, `materi_judul`, `materi_isi`, `materi_file`, `materi_waktu`) VALUES
(2, 9, 'Materi testing dengan file 1', '<p>ini testing materi dengan file</p>\r\n', 'Note.txt', '2021-04-01 09:50:04'),
(3, 9, 'Materi testing dengan file 2', '<p>ini testing materi dengan file</p>\r\n', 'apbn_DANA_DESA-_ALOKASI_DAN_POTENSI_INEFEKTIVITASNYA20150129095337.pdf', '2021-04-01 09:50:09'),
(4, 9, 'Materi testing', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', NULL, '2021-04-01 10:04:15'),
(5, 7, 'Testing', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n', NULL, '2021-04-06 13:20:42'),
(6, 2, 'wer2344r43', '<p>2rf23r23r23</p>\r\n', NULL, '2021-04-06 16:31:36');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `pengumuman_id` int(11) NOT NULL,
  `pengumuman_judul` varchar(254) NOT NULL,
  `pengumuman_isi` longtext NOT NULL,
  `pengumuman_waktu` datetime NOT NULL,
  `pengumuman_img` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`pengumuman_id`, `pengumuman_judul`, `pengumuman_isi`, `pengumuman_waktu`, `pengumuman_img`) VALUES
(2, 'Pengumuman test 22', '<p>ini testing dengan gambarwefwef w3r234</p>\r\n', '2021-03-31 16:57:31', '2.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `relasi_kelassiswa`
--

CREATE TABLE `relasi_kelassiswa` (
  `kelassiswa_id` int(11) NOT NULL,
  `kelassiswa_siswa` varchar(50) NOT NULL,
  `kelassiswa_kelas` varchar(10) NOT NULL,
  `kelassiswa_tahunajaran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `relasi_kelassiswa`
--

INSERT INTO `relasi_kelassiswa` (`kelassiswa_id`, `kelassiswa_siswa`, `kelassiswa_kelas`, `kelassiswa_tahunajaran`) VALUES
(5, '12346', 'KLS-03', 'TA0001'),
(6, '12345', 'KLS-03', 'TA0001');

-- --------------------------------------------------------

--
-- Table structure for table `relasi_mapelguru`
--

CREATE TABLE `relasi_mapelguru` (
  `mapelguru_id` int(11) NOT NULL,
  `mapelguru_guru` varchar(10) NOT NULL,
  `mapelguru_mapel` varchar(10) NOT NULL,
  `mapelguru_kelas` varchar(10) NOT NULL,
  `mapelguru_tahunajaran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `relasi_mapelguru`
--

INSERT INTO `relasi_mapelguru` (`mapelguru_id`, `mapelguru_guru`, `mapelguru_mapel`, `mapelguru_kelas`, `mapelguru_tahunajaran`) VALUES
(1, '1234567890', 'MPL-00001', 'KLS-01', 'TA0001'),
(2, '1234567890', 'MPL-00002', 'KLS-01', 'TA0001'),
(7, '1234567890', 'MPL-00003', 'KLS-03', 'TA0001'),
(8, '1234567890', 'MPL-00004', 'KLS-03', 'TA0001'),
(9, '1234567892', 'MPL-00001', 'KLS-02', 'TA0001'),
(10, '1234567892', 'MPL-00002', 'KLS-02', 'TA0001'),
(11, '1234567892', 'MPL-00003', 'KLS-05', 'TA0001'),
(12, '1234567892', 'MPL-00004', 'KLS-05', 'TA0001'),
(13, '1234567891', 'MPL-00001', 'KLS-04', 'TA0001'),
(14, '1234567891', 'MPL-00002', 'KLS-04', 'TA0001'),
(15, '1234567891', 'MPL-00003', 'KLS-06', 'TA0001'),
(18, '1234567891', 'MPL-00004', 'KLS-06', 'TA0001');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `siswa_nis` varchar(50) NOT NULL,
  `siswa_nama` varchar(254) NOT NULL,
  `siswa_jk` enum('L','P') NOT NULL,
  `siswa_tanggallahir` date NOT NULL,
  `siswa_tempatlahir` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`siswa_nis`, `siswa_nama`, `siswa_jk`, `siswa_tanggallahir`, `siswa_tempatlahir`) VALUES
('12345', 'Yudi Setyawan', 'L', '1998-11-07', 'Lampung Tengah'),
('12346', 'Neprisa', 'P', '1997-11-25', 'Bandar Lampung');

-- --------------------------------------------------------

--
-- Table structure for table `tahunajaran`
--

CREATE TABLE `tahunajaran` (
  `tahunajaran_kode` varchar(10) NOT NULL,
  `tahunajaran_nama` varchar(254) NOT NULL,
  `tahunajaran_status` enum('T','F') NOT NULL COMMENT 'T = true, F = False'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahunajaran`
--

INSERT INTO `tahunajaran` (`tahunajaran_kode`, `tahunajaran_nama`, `tahunajaran_status`) VALUES
('TA0001', 'Genap 2020 / 2021', 'T'),
('TA0002', 'Ganjil 2020 / 2021', 'F'),
('TA0003', 'Ganjil 2019 / 2020', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `tugas_id` int(11) NOT NULL,
  `tugas_mapelguru` int(11) NOT NULL,
  `tugas_judul` varchar(254) NOT NULL,
  `tugas_isi` longtext NOT NULL,
  `tugas_batas` datetime NOT NULL,
  `tugas_waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`tugas_id`, `tugas_mapelguru`, `tugas_judul`, `tugas_isi`, `tugas_batas`, `tugas_waktu`) VALUES
(1, 7, 'Tugas testing', '<p>Silahkan buatwefbjwe;bvgwegbwepgwejgpwebgwjegbwelbgjweb</p>\r\n', '2021-04-08 00:00:00', '2021-04-01 10:31:02'),
(3, 7, 'Tugas testing 1', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '2021-04-08 11:39:00', '2021-04-01 11:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(254) NOT NULL,
  `user_password` varchar(254) NOT NULL,
  `user_role` enum('admin','guru','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_role`) VALUES
(1, 'administrator', '202cb962ac59075b964b07152d234b70', 'admin'),
(2, '12346', 'a3590023df66ac92ae35e3316026d17d', 'siswa'),
(3, '1234567890', 'e807f1fcf82d132f9bb018ca6738a19f', 'guru'),
(4, '1234567892', 'd893377c9d852e09874125b10a0e4f66', 'guru'),
(5, '1234567891', '0f7e44a922df352c05c5f73cb40ba115', 'guru'),
(6, '12345', '827ccb0eea8a706c4c34a16891f84e7b', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`config_id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`guru_nip`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`jurusan_kode`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_kode`),
  ADD KEY `kelas_jurusan` (`kelas_jurusan`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`komentar_id`);

--
-- Indexes for table `kumpul`
--
ALTER TABLE `kumpul`
  ADD PRIMARY KEY (`kumpul_id`),
  ADD KEY `kumpul_siswa` (`kumpul_siswa`),
  ADD KEY `kumpul_tugas` (`kumpul_tugas`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`mapel_kode`),
  ADD KEY `mapel_jurusan` (`mapel_jurusan`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`materi_id`),
  ADD KEY `materi_mapelguru` (`materi_mapelguru`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`pengumuman_id`);

--
-- Indexes for table `relasi_kelassiswa`
--
ALTER TABLE `relasi_kelassiswa`
  ADD PRIMARY KEY (`kelassiswa_id`),
  ADD KEY `kelassiswa_siswa` (`kelassiswa_siswa`),
  ADD KEY `kelassiswa_kelas` (`kelassiswa_kelas`),
  ADD KEY `kelassiswa_tahunajaran` (`kelassiswa_tahunajaran`);

--
-- Indexes for table `relasi_mapelguru`
--
ALTER TABLE `relasi_mapelguru`
  ADD PRIMARY KEY (`mapelguru_id`),
  ADD KEY `mapelguru_guru` (`mapelguru_guru`),
  ADD KEY `mapelguru_mapel` (`mapelguru_mapel`),
  ADD KEY `mapelguru_tahunajaran` (`mapelguru_tahunajaran`),
  ADD KEY `mapelguru_kelas` (`mapelguru_kelas`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`siswa_nis`);

--
-- Indexes for table `tahunajaran`
--
ALTER TABLE `tahunajaran`
  ADD PRIMARY KEY (`tahunajaran_kode`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`tugas_id`),
  ADD KEY `tugas_mapelguru` (`tugas_mapelguru`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `komentar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kumpul`
--
ALTER TABLE `kumpul`
  MODIFY `kumpul_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `materi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `pengumuman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `relasi_kelassiswa`
--
ALTER TABLE `relasi_kelassiswa`
  MODIFY `kelassiswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `relasi_mapelguru`
--
ALTER TABLE `relasi_mapelguru`
  MODIFY `mapelguru_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `tugas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`kelas_jurusan`) REFERENCES `jurusan` (`jurusan_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kumpul`
--
ALTER TABLE `kumpul`
  ADD CONSTRAINT `kumpul_ibfk_1` FOREIGN KEY (`kumpul_siswa`) REFERENCES `siswa` (`siswa_nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kumpul_ibfk_2` FOREIGN KEY (`kumpul_tugas`) REFERENCES `tugas` (`tugas_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mapel`
--
ALTER TABLE `mapel`
  ADD CONSTRAINT `mapel_ibfk_1` FOREIGN KEY (`mapel_jurusan`) REFERENCES `jurusan` (`jurusan_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`materi_mapelguru`) REFERENCES `relasi_mapelguru` (`mapelguru_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `relasi_kelassiswa`
--
ALTER TABLE `relasi_kelassiswa`
  ADD CONSTRAINT `relasi_kelassiswa_ibfk_1` FOREIGN KEY (`kelassiswa_kelas`) REFERENCES `kelas` (`kelas_kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi_kelassiswa_ibfk_2` FOREIGN KEY (`kelassiswa_siswa`) REFERENCES `siswa` (`siswa_nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi_kelassiswa_ibfk_3` FOREIGN KEY (`kelassiswa_tahunajaran`) REFERENCES `tahunajaran` (`tahunajaran_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `relasi_mapelguru`
--
ALTER TABLE `relasi_mapelguru`
  ADD CONSTRAINT `relasi_mapelguru_ibfk_1` FOREIGN KEY (`mapelguru_guru`) REFERENCES `guru` (`guru_nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi_mapelguru_ibfk_2` FOREIGN KEY (`mapelguru_mapel`) REFERENCES `mapel` (`mapel_kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi_mapelguru_ibfk_3` FOREIGN KEY (`mapelguru_tahunajaran`) REFERENCES `tahunajaran` (`tahunajaran_kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi_mapelguru_ibfk_4` FOREIGN KEY (`mapelguru_kelas`) REFERENCES `kelas` (`kelas_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_ibfk_1` FOREIGN KEY (`tugas_mapelguru`) REFERENCES `relasi_mapelguru` (`mapelguru_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
