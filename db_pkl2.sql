-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_pkl2
CREATE DATABASE IF NOT EXISTS `db_pkl2` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_pkl2`;

-- Dumping structure for table db_pkl2.tb_absensi
CREATE TABLE IF NOT EXISTS `tb_absensi` (
  `id_absen` int(11) NOT NULL AUTO_INCREMENT,
  `perusahaan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jam` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `siswa` varchar(110) NOT NULL,
  `jurusan` varchar(10) NOT NULL,
  `foto` varchar(1000) NOT NULL,
  PRIMARY KEY (`id_absen`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;

-- Dumping data for table db_pkl2.tb_absensi: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_absensi` DISABLE KEYS */;
INSERT INTO `tb_absensi` (`id_absen`, `perusahaan`, `alamat`, `tanggal`, `jam`, `siswa`, `jurusan`, `foto`) VALUES
	(114, 'Front End Developer', 'bandung', '2021-12-14 08:53:19', '2021-12-14 08:53:19', 'dayat', 'TI', 'image_1639446799.png'),
	(115, 'Front End Developer', 'bandung', '2021-12-14 10:31:05', '2021-12-14 10:31:05', 'rizal', 'DKV', 'image_1639452665.png');
/*!40000 ALTER TABLE `tb_absensi` ENABLE KEYS */;

-- Dumping structure for table db_pkl2.tb_absensi_manual
CREATE TABLE IF NOT EXISTS `tb_absensi_manual` (
  `id_manual` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` int(11) NOT NULL,
  `bulan` varchar(100) NOT NULL,
  `sakit` int(11) NOT NULL,
  `ijin` int(11) NOT NULL,
  `masuk` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  PRIMARY KEY (`id_manual`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table db_pkl2.tb_absensi_manual: ~6 rows (approximately)
/*!40000 ALTER TABLE `tb_absensi_manual` DISABLE KEYS */;
INSERT INTO `tb_absensi_manual` (`id_manual`, `tahun`, `bulan`, `sakit`, `ijin`, `masuk`, `id_siswa`) VALUES
	(1, 2019, 'januari', 0, 0, 29, 1),
	(2, 2019, 'Februari', 0, 0, 29, 1),
	(5, 2019, 'Maret', 0, 0, 29, 1),
	(6, 2019, 'Februari', 1, 2, 28, 6),
	(7, 2021, 'januari', 0, 2, 28, 16),
	(8, 2021, 'Februari', 18, 29, 17, 20);
/*!40000 ALTER TABLE `tb_absensi_manual` ENABLE KEYS */;

-- Dumping structure for table db_pkl2.tb_admin
CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_pkl2.tb_admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_admin` DISABLE KEYS */;
INSERT INTO `tb_admin` (`id_admin`, `nama`, `user`, `pass`, `foto`, `level`) VALUES
	(1, 'admin', 'admin', 'admin', 'man.png', 'admin');
/*!40000 ALTER TABLE `tb_admin` ENABLE KEYS */;

-- Dumping structure for table db_pkl2.tb_berk
CREATE TABLE IF NOT EXISTS `tb_berk` (
  `id_berkas` int(11) NOT NULL,
  `nama_berkas` varchar(100) NOT NULL,
  `file_berkas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_pkl2.tb_berk: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_berk` DISABLE KEYS */;
INSERT INTO `tb_berk` (`id_berkas`, `nama_berkas`, `file_berkas`) VALUES
	(1, 'Panduan Prakerin', 'tset.txt'),
	(2, 'Tata Tertib', 'Buku_SKI_kelas_XI_MAN.doc'),
	(3, 'Buku Kepo', 'BUKU_SKI_KELAS_XI_MAN_ANAYAR.docx');
/*!40000 ALTER TABLE `tb_berk` ENABLE KEYS */;

-- Dumping structure for table db_pkl2.tb_jurusan
CREATE TABLE IF NOT EXISTS `tb_jurusan` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_singkat` varchar(100) NOT NULL,
  `nama_panjang` varchar(100) NOT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table db_pkl2.tb_jurusan: ~7 rows (approximately)
/*!40000 ALTER TABLE `tb_jurusan` DISABLE KEYS */;
INSERT INTO `tb_jurusan` (`id_jurusan`, `nama_singkat`, `nama_panjang`) VALUES
	(1, 'RPL', 'Rekayasa Perangkat Lunak'),
	(2, 'TK', 'Teknik Komputer '),
	(3, 'DKV', 'Desain Komunikasi Visual'),
	(4, 'IL', 'Ilmu Komputer'),
	(5, 'SI', 'Sistem Informasi'),
	(6, 'IK', 'Ilmu Komunikasi'),
	(7, 'TI', 'Teknik Informatika');
/*!40000 ALTER TABLE `tb_jurusan` ENABLE KEYS */;

-- Dumping structure for table db_pkl2.tb_nilai
CREATE TABLE IF NOT EXISTS `tb_nilai` (
  `id_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `kerajinan` int(100) NOT NULL,
  `prestasi` int(100) NOT NULL,
  `disiplin` int(100) NOT NULL,
  `kerjasama` int(100) NOT NULL,
  `inisiatif` int(100) NOT NULL,
  `tanggung_jawab` int(100) NOT NULL,
  `ujian_prakerin` int(100) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table db_pkl2.tb_nilai: ~9 rows (approximately)
/*!40000 ALTER TABLE `tb_nilai` DISABLE KEYS */;
INSERT INTO `tb_nilai` (`id_nilai`, `kerajinan`, `prestasi`, `disiplin`, `kerjasama`, `inisiatif`, `tanggung_jawab`, `ujian_prakerin`, `id_siswa`) VALUES
	(1, 99, 90, 98, 9, 90, 90, 90, 2),
	(2, 100, 70, 70, 80, 70, 60, 50, 3),
	(3, 76, 70, 70, 7, 70, 70, 70, 4),
	(4, 20, 30, 30, 30, 7, 80, 8, 5),
	(5, 99, 9, 99, 99, 9, 9, 99, 7),
	(6, 77, 8, 8, 88, 8, 8, 8, 11),
	(7, 8, 8, 8, 8, 8, 8, 8, 18),
	(8, 9, 9, 9, 9, 9, 9, 9, 16),
	(9, 9, 9, 9, 9, 9, 9, 9, 20);
/*!40000 ALTER TABLE `tb_nilai` ENABLE KEYS */;

-- Dumping structure for table db_pkl2.tb_notif
CREATE TABLE IF NOT EXISTS `tb_notif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `id_siswa` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

-- Dumping data for table db_pkl2.tb_notif: ~19 rows (approximately)
/*!40000 ALTER TABLE `tb_notif` DISABLE KEYS */;
INSERT INTO `tb_notif` (`id`, `nama_perusahaan`, `pesan`, `id_siswa`) VALUES
	(17, 'Gojek', 'Selamat tempat pkl anda telah terkonfirmasi!', '5'),
	(22, 'Gojek', 'Maaf jurusan anda tidak sesuai yang di butuhkan perusahaan!', '12'),
	(26, '', 'kamu memiliki pesan baru', '2'),
	(35, 'Gojek', 'Selamat tempat pkl anda telah terkonfirmasi!', '18'),
	(36, 'Desain Grafis', 'Selamat tempat pkl anda telah terkonfirmasi!', '18'),
	(37, 'Desain Grafis', 'Selamat tempat pkl anda telah terkonfirmasi!', '18'),
	(38, 'Back End Developer', 'Selamat tempat pkl anda telah terkonfirmasi!', '18'),
	(39, 'Back End Developer', 'Selamat tempat pkl anda telah terkonfirmasi!', '19'),
	(40, 'Front End Developer', 'Selamat tempat pkl anda telah terkonfirmasi!', '20'),
	(41, 'Desain Grafis', 'Selamat tempat pkl anda telah terkonfirmasi!', '19'),
	(42, 'Desain Grafis', 'Selamat tempat pkl anda telah terkonfirmasi!', '19'),
	(43, 'Desain Grafis', 'Selamat tempat pkl anda telah terkonfirmasi!', '19'),
	(44, 'Desain Grafis', 'Selamat tempat pkl anda telah terkonfirmasi!', '19'),
	(45, 'Desain Grafis', 'Selamat tempat pkl anda telah terkonfirmasi!', '19'),
	(46, 'Desain Grafis', 'Selamat tempat pkl anda telah terkonfirmasi!', '19'),
	(47, 'Desain Grafis', 'Selamat tempat pkl anda telah terkonfirmasi!', '21'),
	(48, 'Front End Developer', 'Selamat tempat pkl anda telah terkonfirmasi!', '21'),
	(49, 'Back End Developer', 'Selamat tempat pkl anda telah terkonfirmasi!', '22'),
	(50, 'Back End Developer', 'Selamat tempat pkl anda telah terkonfirmasi!', '22'),
	(51, 'Back End Developer', 'Selamat tempat pkl anda telah terkonfirmasi!', '22'),
	(52, 'Desain Grafis', 'Selamat tempat pkl anda telah terkonfirmasi!', '22'),
	(53, 'Desain Grafis', 'Selamat tempat pkl anda telah terkonfirmasi!', '22');
/*!40000 ALTER TABLE `tb_notif` ENABLE KEYS */;

-- Dumping structure for table db_pkl2.tb_sementara
CREATE TABLE IF NOT EXISTS `tb_sementara` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(100) NOT NULL,
  `nama_pimpinan` varchar(100) NOT NULL,
  `nama_pembimbing` varchar(100) NOT NULL,
  `jurusan_perusahaan` varchar(100) NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `id_siswa` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table db_pkl2.tb_sementara: ~1 rows (approximately)
/*!40000 ALTER TABLE `tb_sementara` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_sementara` ENABLE KEYS */;

-- Dumping structure for table db_pkl2.tb_siswa
CREATE TABLE IF NOT EXISTS `tb_siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nis` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `jurusan` varchar(5) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `jk` enum('P','L') NOT NULL,
  `diskripsi` text NOT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Dumping data for table db_pkl2.tb_siswa: ~4 rows (approximately)
/*!40000 ALTER TABLE `tb_siswa` DISABLE KEYS */;
INSERT INTO `tb_siswa` (`id_siswa`, `nis`, `nama_siswa`, `kelas`, `jurusan`, `user`, `pass`, `foto`, `jk`, `diskripsi`) VALUES
	(19, 2147483647, 'bocil', '5', 'TI', 'bocil', '432f45b44c432414d2f97df0e5743818', 'man.png', 'L', ''),
	(20, 19650001, 'dayat', '5', 'TI', 'dayat', '7a97c0ec686fc74e54471694709b0dcf', 'man.png', 'L', 'uwuw samid'),
	(21, 19650002, 'rizal', '5', 'DKV', 'rizal', 'a0977743e1d22c4ff4d81ad0c0f5d5da', 'man.png', 'L', ''),
	(22, 19650023, 'juned', '5', 'RPL', 'juned', '25d55ad283aa400af464c76d713c07ad', 'man.png', 'L', '');
/*!40000 ALTER TABLE `tb_siswa` ENABLE KEYS */;

-- Dumping structure for table db_pkl2.tb_tempat_rekomendasi
CREATE TABLE IF NOT EXISTS `tb_tempat_rekomendasi` (
  `id_rekomendasi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(100) NOT NULL,
  `jurusan_perusahaan` varchar(100) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id_rekomendasi`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table db_pkl2.tb_tempat_rekomendasi: ~6 rows (approximately)
/*!40000 ALTER TABLE `tb_tempat_rekomendasi` DISABLE KEYS */;
INSERT INTO `tb_tempat_rekomendasi` (`id_rekomendasi`, `nama_perusahaan`, `jurusan_perusahaan`, `visi`, `misi`, `alamat`, `foto`) VALUES
	(1, 'Desain Grafis', 'DKV, TI, SI, Desain Grafis', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores sunt a distinctio libero magnam quaerat praesentium omnis. Doloremque explicabo molestias unde voluptatum, atque nesciunt voluptatibus necessitatibus a! Incidunt, porro exercitationem?', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores sunt a distinctio libero magnam quaerat praesentium omnis. Doloremque explicabo molestias unde voluptatum, atque nesciunt voluptatibus necessitatibus a! Incidunt, porro exercitationem?', 'Jakarta Pusat', 'Cuplikan_layar_dari_2019-07-01_09-15-091.png'),
	(2, 'Front End Developer', 'TI, TK, SI, IK, RPL', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores sunt a distinctio libero magnam quaerat praesentium omnis. Doloremque explicabo molestias unde voluptatum, atque nesciunt voluptatibus necessitatibus a! Incidunt, porro exercitationem?', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores sunt a distinctio libero magnam quaerat praesentium omnis. Doloremque explicabo molestias unde voluptatum, atque nesciunt voluptatibus necessitatibus a! Incidunt, porro exercitationem?', 'bandung', 'sorcecodeAdmin1.png'),
	(3, 'Back End Developer', 'TI, TK, SI, IK, RPL', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores sunt a distinctio libero magnam quaerat praesentium omnis. Doloremque explicabo molestias unde voluptatum, atque nesciunt voluptatibus necessitatibus a! Incidunt, porro exercitationem?', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores sunt a distinctio libero magnam quaerat praesentium omnis. Doloremque explicabo molestias unde voluptatum, atque nesciunt voluptatibus necessitatibus a! Incidunt, porro exercitationem?', 'sad', '091.png'),
	(4, 'Digital Marketing', 'IK,DKV,Psikologi, IB', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores sunt a distinctio libero magnam quaerat praesentium omnis. Doloremque explicabo molestias unde voluptatum, atque nesciunt voluptatibus necessitatibus a! Incidunt, porro exercitationem?', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores sunt a distinctio libero magnam quaerat praesentium omnis. Doloremque explicabo molestias unde voluptatum, atque nesciunt voluptatibus necessitatibus a! Incidunt, porro exercitationem?', 'Sukoharjo', 'gofood1.jpg'),
	(5, 'CopyWriter', 'IK,DKV,Psikologi, IB', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores sunt a distinctio libero magnam quaerat praesentium omnis. Doloremque explicabo molestias unde voluptatum, atque nesciunt voluptatibus necessitatibus a! Incidunt, porro exercitationem?', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores sunt a distinctio libero magnam quaerat praesentium omnis. Doloremque explicabo molestias unde voluptatum, atque nesciunt voluptatibus necessitatibus a! Incidunt, porro exercitationem?', 'Ban Matu', 'Cuplikan_layar_dari_2019-07-01_09-15-0911.png'),
	(6, 'aaaaaa', 'RPL, TK, SI', 'asafwewerwr', 'rwerwerwer', 'adwqeqeqwe', 'WhatsApp_Image_2021-12-11_at_07_23_092.jpeg');
/*!40000 ALTER TABLE `tb_tempat_rekomendasi` ENABLE KEYS */;

-- Dumping structure for table db_pkl2.tb_tempat_siswa
CREATE TABLE IF NOT EXISTS `tb_tempat_siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(100) NOT NULL,
  `nama_pimpinan` varchar(100) NOT NULL,
  `nama_pembimbing` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `id_siswa` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Dumping data for table db_pkl2.tb_tempat_siswa: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_tempat_siswa` DISABLE KEYS */;
INSERT INTO `tb_tempat_siswa` (`id`, `nama_perusahaan`, `nama_pimpinan`, `nama_pembimbing`, `alamat`, `id_siswa`) VALUES
	(24, 'Front End Developer', 'CV,portofolio', '', 'bandung', 20),
	(25, 'Desain Grafis', 'CV,portofolio', '', 'Jakarta Pusat', 19),
	(27, 'Front End Developer', 'CV,portofolio', '', 'bandung', 21),
	(30, 'Desain Grafis', 'CV,portofolio', '', 'Jakarta Pusat', 22);
/*!40000 ALTER TABLE `tb_tempat_siswa` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
