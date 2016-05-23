# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.5.42)
# Database: timeline
# Generation Time: 2016-05-23 10:09:47 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table akses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `akses`;

CREATE TABLE `akses` (
  `id_akses` int(11) NOT NULL AUTO_INCREMENT,
  `akses` varchar(50) NOT NULL,
  PRIMARY KEY (`id_akses`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `akses` WRITE;
/*!40000 ALTER TABLE `akses` DISABLE KEYS */;

INSERT INTO `akses` (`id_akses`, `akses`)
VALUES
	(1,'Publik'),
	(2,'Private');

/*!40000 ALTER TABLE `akses` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table artikel
# ------------------------------------------------------------

DROP TABLE IF EXISTS `artikel`;

CREATE TABLE `artikel` (
  `id_artikel` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `id_topik` int(11) NOT NULL,
  `akses` varchar(20) NOT NULL,
  `isi` longtext NOT NULL,
  `sumber` text NOT NULL,
  `create_date` date NOT NULL,
  `last_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id_artikel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `artikel` WRITE;
/*!40000 ALTER TABLE `artikel` DISABLE KEYS */;

INSERT INTO `artikel` (`id_artikel`, `username`, `judul`, `id_topik`, `akses`, `isi`, `sumber`, `create_date`, `last_update`)
VALUES
	(1,'11','hiugihicg ghghghgh',1,'1','ini isi','njsudus ini kampret SDSSDSD','1010-10-10','0000-00-00 00:00:00'),
	(3,'2','2',1,'1','inijduu;','sd;khiudh','1010-10-10','1010-10-10 00:00:00'),
	(4,'1','1',1,'1','isi','isi','1010-10-10','1010-12-12 00:00:00'),
	(7,'siliwanti','12121',1,'external','<p>sdsdsdssdsdsddsds</p>','dsds','2016-05-10','2016-05-14 21:01:00'),
	(9,'siliwanti','dsk',1,'Private','<p>dd &nbsp; &nbsp; &nbsp; &nbsp;dsds</p>','kjhkk','2016-05-10','2016-05-14 21:00:45'),
	(10,'siliwanti','ini',2,'Private','<p>masuk&nbsp;</p>','shdiashduhauds','2016-05-10',NULL),
	(11,'siliwanti','ini',2,'Private','<p>masuk&nbsp;</p>','shdiashduhauds','2016-05-10',NULL);

/*!40000 ALTER TABLE `artikel` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table file
# ------------------------------------------------------------

DROP TABLE IF EXISTS `file`;

CREATE TABLE `file` (
  `id_file` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `id_topik` int(11) NOT NULL,
  `id_akses` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL,
  `file` varchar(100) NOT NULL,
  PRIMARY KEY (`id_file`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `log`;

CREATE TABLE `log` (
  `id_log` int(50) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `activity` text NOT NULL,
  `id_data` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `id_tabel` int(11) NOT NULL,
  PRIMARY KEY (`id_log`),
  UNIQUE KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;

INSERT INTO `log` (`id_log`, `id_user`, `date`, `activity`, `id_data`, `id_artikel`, `id_tabel`)
VALUES
	(1,0,'2016-04-20 15:16:52','Update Data',0,0,0);

/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tabel
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tabel`;

CREATE TABLE `tabel` (
  `id_tabel` int(50) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama_tabel` varchar(50) NOT NULL,
  `id_header` int(11) NOT NULL,
  `id_content` int(11) NOT NULL,
  `id_akses` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL,
  `sumber` text NOT NULL,
  PRIMARY KEY (`id_tabel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table tabel_content
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tabel_content`;

CREATE TABLE `tabel_content` (
  `id_header` int(50) NOT NULL,
  `id_content` int(11) NOT NULL AUTO_INCREMENT,
  `c1` int(11) NOT NULL,
  `c2` int(11) NOT NULL,
  `c3` int(11) NOT NULL,
  `c4` int(11) NOT NULL,
  `c5` int(11) NOT NULL,
  `c6` int(11) NOT NULL,
  `c7` int(11) NOT NULL,
  `c8` int(11) NOT NULL,
  `c9` int(11) NOT NULL,
  `c10` int(11) NOT NULL,
  `c11` int(11) NOT NULL,
  `c12` int(11) NOT NULL,
  `c13` int(11) NOT NULL,
  `c14` int(11) NOT NULL,
  `c15` int(11) NOT NULL,
  PRIMARY KEY (`id_header`),
  UNIQUE KEY `id_content` (`id_content`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table tabel_header
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tabel_header`;

CREATE TABLE `tabel_header` (
  `id_header` int(50) NOT NULL AUTO_INCREMENT,
  `h1` varchar(50) NOT NULL,
  `h2` varchar(50) NOT NULL,
  `h3` varchar(50) NOT NULL,
  `h4` varchar(50) NOT NULL,
  `h5` varchar(50) NOT NULL,
  `h6` varchar(50) NOT NULL,
  `h7` varchar(50) NOT NULL,
  `h8` varchar(50) NOT NULL,
  `h9` varchar(50) NOT NULL,
  `h10` varchar(50) NOT NULL,
  `h11` varchar(50) NOT NULL,
  `h12` varchar(50) NOT NULL,
  `h13` varchar(50) NOT NULL,
  `h14` varchar(50) NOT NULL,
  `h15` varchar(50) NOT NULL,
  PRIMARY KEY (`id_header`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table topik
# ------------------------------------------------------------

DROP TABLE IF EXISTS `topik`;

CREATE TABLE `topik` (
  `id_topik` int(11) NOT NULL AUTO_INCREMENT,
  `topik` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  PRIMARY KEY (`id_topik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `topik` WRITE;
/*!40000 ALTER TABLE `topik` DISABLE KEYS */;

INSERT INTO `topik` (`id_topik`, `topik`, `icon`)
VALUES
	(1,'Pemerintahan yang Bersih dan Akuntabel','fa fa-gavel'),
	(2,'Pemerintahan yang Efektif dan Efisien','fa fa-university'),
	(3,'Peningkatan Kualitas Pelayanan Publik','fa fa-line-chart');

/*!40000 ALTER TABLE `topik` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nm_user` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `jenkel` varchar(10) NOT NULL,
  `privillege` varchar(50) NOT NULL,
  `jabatan` varchar(70) NOT NULL,
  `passw_user` varchar(32) NOT NULL,
  `foto` text NOT NULL,
  `kepegawaian` varchar(11) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id_user`, `username`, `nm_user`, `email`, `jenkel`, `privillege`, `jabatan`, `passw_user`, `foto`, `kepegawaian`)
VALUES
	(16,'agung','Agung Setiyadhi, S.Kom','agung@gmail.com','Laki-laki','superadmin','Tenaga Pendukung Administrasi','294de3557d9d00b3d2d8a1e6aab028cf','','aktif'),
	(15,'amalina','Amalina Niara Putri, S.Sos','amalina@gmail.com','Perempuan','common','-','bb0a9a9a5a0229f8de631fed1e0693a0','','aktif'),
	(9,'astuti','Astuti Budiati, SE','astuti@gmail.com','Perempuan','common','-','accc56e8022c3d25865b0680f58f3477','','aktif'),
	(2,'bustang','Dr. Bustang, Msi','bustang@gmail.com','Laki-laki','common','-','0beafe9b741b2b203dca3a33575689cb','','aktif'),
	(13,'dinidwi','Dini Dwi Kusumaningrum, S.Sos','dini@gmail.com','Perempuan','common','-','56df8c76d310762488c11b30d6e040ac','','aktif'),
	(18,'eman','Eman S','eman@gmail.com','Laki-laki','common','-','04ecff4292be7186a9fbfa186e83b87e','','aktif'),
	(5,'firdaus','Dia Firdaus, SE, ME','dia.firdaus@gmail.com','Laki-laki','common','Perencana Madya','f7da6674cea27cd772ad0d933ae93103','1170803_210114079154344_1908765166_n.jpg','aktif'),
	(3,'guspika','Dr. Guspika, MBA','guspika@gmail.com','Laki-laki','common','-','f675f38c00a40c34f82e72e33bc4c050','','aktif'),
	(17,'hidayat','Nur Hidayat','nurhidayat@gmail.com','Laki-laki','common','-','b56e12be56f6579e37a7faf7ec138142','','aktif'),
	(8,'husni','Husni Rohman S.IP','husni@gmail.com','Laki-laki','common','-','143196712ca8d8714a875522c5957a6d','','aktif'),
	(6,'irfan','Irfan, SH, MH','irfan@gmail.com','Laki-laki','common','-','24b90bc48a67ac676228385a7c71a119','','aktif'),
	(10,'kamin','M. Kamin Firdaus','kamin@gmail.com','Laki-laki','common','-','4bc1182ba9178f475c080b0af462b88d','','aktif'),
	(11,'lian','Lian Ifandri, S.IP','lian@gmail.com','Laki-laki','common','-','c0114a5be10bd8b2e1e5a3006739c499','','aktif'),
	(7,'meiriska','Kiki Meiriska R, S.IP','moriska@gmail.com','Perempuan','common','-','160da0a5a44010b6d63bcb33851ef053','','aktif'),
	(14,'pandu','Pandu Wibowo, S.IP','pandu@gmail.com','Laki-laki','common','-','8acf7115033fa7bbfebe4b9b726ab374','','aktif'),
	(4,'ridha','Dra. Ridha Hasmah, MPM','ridha@gmail.com','Perempuan','common','-','6bbd289a4a6a6972fc59169f2efc20e7','','aktif'),
	(1,'sandjaja','Drs. Sandjaja S.MPM','sandjaja@gmail.com','Laki-laki','common','-','38eaa3169903e308b0bc0b3857e5a6cf','','aktif'),
	(0,'siliwanti','Dr. Raden Siliwanti MPIA','r.siliwanti@gmail.com','Perempuan','superadmin','Direktur Utama Direktorat Aparatur Negara','4a4ed23aa52ddcba603d10914477adf6','siliwanti.jpg','aktif'),
	(12,'yusuf','Yusuf Hakim Gumilang, S.IP','yusuf@gmail.com','Laki-laki','common','-','dd2eb170076a5dec97cdbbbbff9a4405','','aktif');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
