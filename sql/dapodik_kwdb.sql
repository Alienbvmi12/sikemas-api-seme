-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: dapodik_kwdb
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `a_institusi`
--

DROP TABLE IF EXISTS `a_institusi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `a_institusi` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `utype` enum('institute','lembaga','yayasan','sekolah','universitas') DEFAULT NULL,
  `jenjang` int(1) unsigned DEFAULT NULL COMMENT '1.pg,2tk,3sd,4smp,5sma,6d3,7s1,8s2,9s3',
  `kode` varchar(8) DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat1` varchar(78) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat2` varchar(78) DEFAULT NULL,
  `kelurahan` varchar(128) DEFAULT NULL,
  `kecamatan` varchar(128) DEFAULT NULL,
  `kabkota` varchar(78) DEFAULT NULL COMMENT 'kabupaten kota',
  `provinsi` varchar(78) DEFAULT NULL,
  `negara` varchar(78) DEFAULT NULL,
  `kodepos` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telp` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `is_active` int(1) unsigned NOT NULL DEFAULT 1,
  `a_institusi_id` int(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_jenjang` (`jenjang`),
  KEY `is_active` (`is_active`),
  KEY `utype` (`utype`),
  KEY `parent_a_institusi_id` (`a_institusi_id`),
  KEY `kode` (`kode`),
  CONSTRAINT `a_institusi_ibfk_1` FOREIGN KEY (`a_institusi_id`) REFERENCES `a_institusi` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='Institute atau lembaga';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `a_institusi`
--

LOCK TABLES `a_institusi` WRITE;
/*!40000 ALTER TABLE `a_institusi` DISABLE KEYS */;
INSERT INTO `a_institusi` VALUES (1,'yayasan',0,NULL,'Yayasan Miftahul Huda II','Ciamis',NULL,NULL,NULL,NULL,NULL,NULL,'1111','89633060648','2023-07-17 13:45:37',NULL,NULL,NULL,1,NULL),(2,'sekolah',3,NULL,'SD Miftahul Huda II','-',NULL,NULL,NULL,NULL,NULL,NULL,'','1111111','2023-07-17 13:47:41',NULL,NULL,NULL,1,1),(3,'sekolah',4,NULL,'SMP Miftahul Huda II','-',NULL,NULL,NULL,NULL,NULL,NULL,'','1111111','2023-07-17 13:47:41',NULL,NULL,NULL,1,1),(4,'sekolah',5,NULL,'SMA Miftahul Huda II','-',NULL,NULL,NULL,NULL,NULL,NULL,'','1111111','2023-07-17 13:47:41',NULL,NULL,NULL,1,1),(5,'yayasan',0,NULL,'Yayasan Winaya','Kutawaringin',NULL,NULL,NULL,NULL,NULL,NULL,'1111','89633060648','2023-07-17 13:45:37',NULL,NULL,NULL,1,NULL),(6,'sekolah',2,NULL,'TK Nuri','-',NULL,NULL,NULL,NULL,NULL,NULL,'','1111111','2023-07-17 13:47:41',NULL,NULL,NULL,1,1);
/*!40000 ALTER TABLE `a_institusi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `a_jabatan`
--

DROP TABLE IF EXISTS `a_jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `a_jabatan` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(78) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_deleted` int(1) unsigned NOT NULL DEFAULT 0,
  `is_active` int(1) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `is_deleted` (`is_deleted`),
  KEY `is_active` (`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `a_jabatan`
--

LOCK TABLES `a_jabatan` WRITE;
/*!40000 ALTER TABLE `a_jabatan` DISABLE KEYS */;
INSERT INTO `a_jabatan` VALUES (1,'Kepala Sekolah',0,1),(2,'Operator',0,1),(3,'Guru Mata Pelajaran',0,1);
/*!40000 ALTER TABLE `a_jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `a_matapelajaran`
--

DROP TABLE IF EXISTS `a_matapelajaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `a_matapelajaran` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(78) NOT NULL,
  `is_active` int(1) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `idx_is_active` (`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `a_matapelajaran`
--

LOCK TABLES `a_matapelajaran` WRITE;
/*!40000 ALTER TABLE `a_matapelajaran` DISABLE KEYS */;
INSERT INTO `a_matapelajaran` VALUES (1,'IPA',1),(2,'Penjaskes',1),(3,'IPS',1),(4,'Kimia',1),(5,'Biologi',1),(6,'TIK',1),(7,'Matematika',1),(8,'Fisika',1),(9,'Sosiologi',1),(10,'Sejarah',1),(11,'Ekonomi',1);
/*!40000 ALTER TABLE `a_matapelajaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `a_modules`
--

DROP TABLE IF EXISTS `a_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `a_modules` (
  `identifier` varchar(78) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) DEFAULT '',
  `level` int(1) NOT NULL DEFAULT 0 COMMENT 'depth level of menu, 0 mean outer 3 deeper submenu',
  `has_submenu` int(1) NOT NULL DEFAULT 0 COMMENT '1 mempunyai submenu, 2 tidak mempunyai submenu',
  `children_identifier` varchar(255) DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `is_default` enum('allowed','denied') NOT NULL DEFAULT 'denied',
  `is_visible` int(1) NOT NULL DEFAULT 1,
  `priority` int(3) NOT NULL DEFAULT 0 COMMENT '0 mean higher 999 lower',
  `fa_icon` varchar(255) NOT NULL DEFAULT 'fa fa-home' COMMENT 'font-awesome icon on menu',
  `utype` varchar(48) NOT NULL DEFAULT 'internal' COMMENT 'type module : internal, external',
  PRIMARY KEY (`identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='collection of modules that existing in systems';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `a_modules`
--

LOCK TABLES `a_modules` WRITE;
/*!40000 ALTER TABLE `a_modules` DISABLE KEYS */;
INSERT INTO `a_modules` VALUES ('dashboard','Dashboard','',0,0,NULL,1,'allowed',1,0,'fa fa-home','internal');
/*!40000 ALTER TABLE `a_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `a_pengguna`
--

DROP TABLE IF EXISTS `a_pengguna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `a_pengguna` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `is_active` int(1) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `email` (`email`),
  KEY `is_active` (`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `a_pengguna`
--

LOCK TABLES `a_pengguna` WRITE;
/*!40000 ALTER TABLE `a_pengguna` DISABLE KEYS */;
INSERT INTO `a_pengguna` VALUES (1,'drosanda','drosanda@outlook.co.id','Daeng R','e10adc3949ba59abbe56e057f20f883e',NULL,1);
/*!40000 ALTER TABLE `a_pengguna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `a_pengguna_jabatan`
--

DROP TABLE IF EXISTS `a_pengguna_jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `a_pengguna_jabatan` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `a_jabatan_id` int(4) unsigned DEFAULT NULL,
  `a_pengguna_id` int(5) unsigned DEFAULT NULL,
  `is_active` int(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `a_jabatan_id` (`a_jabatan_id`,`a_pengguna_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `a_pengguna_jabatan`
--

LOCK TABLES `a_pengguna_jabatan` WRITE;
/*!40000 ALTER TABLE `a_pengguna_jabatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `a_pengguna_jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `a_pengguna_module`
--

DROP TABLE IF EXISTS `a_pengguna_module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `a_pengguna_module` (
  `a_modules_identifier` varchar(78) NOT NULL,
  `a_pengguna_id` int(5) unsigned NOT NULL,
  `id` int(6) unsigned NOT NULL,
  `rule` enum('allowed','disallowed','allowed_except','disallowed_except') NOT NULL,
  `tmp_active` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`a_modules_identifier`,`a_pengguna_id`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `a_pengguna_module`
--

LOCK TABLES `a_pengguna_module` WRITE;
/*!40000 ALTER TABLE `a_pengguna_module` DISABLE KEYS */;
/*!40000 ALTER TABLE `a_pengguna_module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `a_tahunajaran`
--

DROP TABLE IF EXISTS `a_tahunajaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `a_tahunajaran` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(9) NOT NULL,
  `is_deleted` int(1) unsigned NOT NULL DEFAULT 0,
  `is_active` int(1) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `nama` (`nama`),
  KEY `idx_is_active` (`is_active`),
  KEY `is_deleted` (`is_deleted`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tahun Ajaran';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `a_tahunajaran`
--

LOCK TABLES `a_tahunajaran` WRITE;
/*!40000 ALTER TABLE `a_tahunajaran` DISABLE KEYS */;
INSERT INTO `a_tahunajaran` VALUES (1,'2022/2023',0,0),(2,'2023/2024',0,1);
/*!40000 ALTER TABLE `a_tahunajaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `b_biaya`
--

DROP TABLE IF EXISTS `b_biaya`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `b_biaya` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `a_tahunajaran_id` int(5) unsigned DEFAULT NULL,
  `a_institusi_id` int(5) unsigned DEFAULT NULL,
  `nominal` decimal(18,0) NOT NULL DEFAULT 0 COMMENT 'nominal biaya',
  `is_active` int(1) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `fk_a_institusi_id` (`a_institusi_id`),
  KEY `idx_is_active` (`is_active`),
  KEY `fk_a_tahunajaran_id` (`a_tahunajaran_id`),
  CONSTRAINT `b_biaya_ibfk_1` FOREIGN KEY (`a_institusi_id`) REFERENCES `a_institusi` (`id`),
  CONSTRAINT `b_biaya_ibfk_2` FOREIGN KEY (`a_tahunajaran_id`) REFERENCES `a_tahunajaran` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `b_biaya`
--

LOCK TABLES `b_biaya` WRITE;
/*!40000 ALTER TABLE `b_biaya` DISABLE KEYS */;
INSERT INTO `b_biaya` VALUES (1,2,2,2885000,1),(2,2,3,3300000,1),(3,2,6,1100000,1),(7,1,2,2885000,1);
/*!40000 ALTER TABLE `b_biaya` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `b_biaya_rincian`
--

DROP TABLE IF EXISTS `b_biaya_rincian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `b_biaya_rincian` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `b_biaya_id` int(5) unsigned DEFAULT NULL,
  `nama` varchar(78) DEFAULT NULL,
  `nominal` decimal(18,0) NOT NULL DEFAULT 0,
  `urutan` int(2) unsigned NOT NULL DEFAULT 0,
  `is_kategori` int(1) NOT NULL DEFAULT 0 COMMENT 'kaegori rincian biaya, 1 = tidak memunculkan harga',
  `is_active` int(1) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `fk_b_biaya_id` (`b_biaya_id`),
  KEY `idx_is_active` (`is_active`),
  KEY `idx_is_kategori` (`is_kategori`),
  CONSTRAINT `b_biaya_rincian_ibfk_1` FOREIGN KEY (`b_biaya_id`) REFERENCES `b_biaya` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `b_biaya_rincian`
--

LOCK TABLES `b_biaya_rincian` WRITE;
/*!40000 ALTER TABLE `b_biaya_rincian` DISABLE KEYS */;
INSERT INTO `b_biaya_rincian` VALUES (1,1,'Administrasi Pesantren',0,1,1,1),(2,1,'Pendaftaran dan Pemberkasan',250000,2,0,1),(3,1,'Infaq Bangunan',250000,3,0,1),(4,1,'Syahriyyah Pesantren',250000,4,0,1),(5,1,'Administrasi Sekolah',0,5,1,1),(6,1,'Pendaftaran Sekolah',0,6,0,1),(7,1,'Infaq bangunan',0,7,0,1),(8,1,'Syahriyyah (SPP Bulanan)',130000,8,0,1),(9,1,'Kas akhir tahun',0,9,0,1),(10,1,'Administrasi Perlengkapan Asrama',0,10,1,1),(11,1,'Lemari',350000,11,0,1),(12,1,'Seragam',15750000,12,0,1),(13,1,'Pendidikan + Kitab',80000,13,0,1),(14,2,'Administrasi Pesantren',0,1,1,1),(15,2,'Pendaftaran dan Pemberkasan',250000,2,0,1),(16,2,'Infaq Bangunan',250000,3,0,1),(17,2,'Syahriyyah Pesantren',250000,4,0,1),(18,2,'Administrasi Sekolah',0,5,1,1),(19,2,'Pendaftaran Sekolah',150000,6,0,1),(20,2,'Infaq bangunan',250000,7,0,1),(21,1,'Syahriyyah (SPP Bulanan)',200000,8,0,1),(22,1,'Kas akhir tahun',500000,9,0,1),(23,1,'Administrasi Perlengkapan Asrama',0,10,1,1),(24,1,'Lemari',600000,11,0,1),(25,1,'Seragam',600000,12,0,1),(26,1,'Pendidikan + Kitab',250000,13,0,1);
/*!40000 ALTER TABLE `b_biaya_rincian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `b_kelasrombel`
--

DROP TABLE IF EXISTS `b_kelasrombel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `b_kelasrombel` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `a_institusi_id` int(5) unsigned DEFAULT NULL,
  `jenjang_kelas` int(1) DEFAULT NULL,
  `nama` varchar(78) NOT NULL,
  `konsentrasi` varchar(9) DEFAULT NULL COMMENT 'jurusan / konsentrasi',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `is_deleted` int(1) unsigned DEFAULT 0,
  `is_active` int(1) unsigned DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `fk_a_institute_id` (`a_institusi_id`),
  KEY `idx_is_active` (`is_active`),
  KEY `idx_is_deleted` (`is_deleted`),
  KEY `jenjang_kelas` (`jenjang_kelas`),
  KEY `konsentrasi` (`konsentrasi`),
  CONSTRAINT `b_kelasrombel_ibfk_1` FOREIGN KEY (`a_institusi_id`) REFERENCES `a_institusi` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='tabel kelas dan rombongan belajar';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `b_kelasrombel`
--

LOCK TABLES `b_kelasrombel` WRITE;
/*!40000 ALTER TABLE `b_kelasrombel` DISABLE KEYS */;
INSERT INTO `b_kelasrombel` VALUES (1,2,1,'Kelas 1 A',NULL,'2023-07-17 13:50:58',NULL,NULL,0,1),(2,2,1,'Kelas 1 B',NULL,'2023-07-17 13:50:58',NULL,NULL,0,1),(3,2,2,'Kelas 2',NULL,'2023-07-17 13:50:58',NULL,NULL,0,1),(4,2,3,'Kelas 3',NULL,'2023-07-17 13:50:58',NULL,NULL,0,1),(5,2,4,'Kelas 4',NULL,'2023-07-17 13:50:58',NULL,NULL,0,1),(6,2,5,'Kelas 5',NULL,'2023-07-17 13:50:58',NULL,NULL,0,1),(7,2,6,'Kelas 6',NULL,'2023-07-17 13:50:58',NULL,NULL,0,1),(8,3,7,'Kelas 7 A',NULL,'2023-07-17 13:50:58',NULL,NULL,0,1),(9,3,1,'Kelas 7 B',NULL,'2023-07-17 13:50:58',NULL,NULL,0,1),(10,3,7,'Kelas 7 C',NULL,'2023-07-17 13:50:58',NULL,NULL,0,1),(11,3,8,'Kelas 8 A',NULL,'2023-07-17 13:50:58',NULL,NULL,0,1),(12,3,8,'Kelas 8 B',NULL,'2023-07-17 13:50:58',NULL,NULL,0,1),(13,3,9,'Kelas 9 A',NULL,'2023-07-17 13:50:58',NULL,NULL,0,1),(14,3,9,'Kelas 9 B',NULL,'2023-07-17 13:50:58',NULL,NULL,0,1),(15,6,0,'Kelas 0 Kecil',NULL,'2023-07-17 13:50:58',NULL,NULL,0,1),(16,6,0,'Kelas 0 Besar',NULL,'2023-07-17 13:50:58',NULL,NULL,0,1);
/*!40000 ALTER TABLE `b_kelasrombel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `b_user`
--

DROP TABLE IF EXISTS `b_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `b_user` (
  `id` int(7) unsigned NOT NULL AUTO_INCREMENT,
  `a_institusi_id_owner` int(5) unsigned DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fnama` varchar(255) NOT NULL DEFAULT '',
  `lnama` varchar(255) DEFAULT NULL,
  `kelamin` int(1) unsigned DEFAULT NULL COMMENT '1 laki-laki 0 perempuan',
  `telp` varchar(24) DEFAULT NULL,
  `birth_place` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '-' COMMENT 'tempat lahir',
  `birth_date` date DEFAULT NULL COMMENT 'tanggal lahir',
  `created_at` datetime NOT NULL COMMENT 'tanggal pembuatan',
  `active_date` date DEFAULT NULL COMMENT 'tanggal aktifasi',
  `expire_date` date DEFAULT NULL COMMENT 'tanggal berakhir membership',
  `umur` int(3) unsigned DEFAULT NULL,
  `pekerjaan` varchar(78) NOT NULL DEFAULT '-',
  `api_reg_date` date DEFAULT NULL,
  `api_reg_token` varchar(48) NOT NULL DEFAULT '',
  `api_web_date` date DEFAULT NULL,
  `api_web_token` varchar(24) DEFAULT NULL,
  `api_mobile_date` date DEFAULT NULL,
  `api_mobile_token` varchar(24) DEFAULT NULL,
  `fcm_token` varchar(255) NOT NULL DEFAULT '',
  `device` varchar(24) NOT NULL DEFAULT 'web',
  `foto` varchar(255) NOT NULL DEFAULT '',
  `is_agree` int(1) unsigned NOT NULL DEFAULT 0,
  `is_mentor` int(1) unsigned NOT NULL DEFAULT 0,
  `is_confirmed` int(1) unsigned NOT NULL DEFAULT 0 COMMENT '1 ya, 0 belum konfirmasi, flag setelah konfirmasi',
  `is_active` int(1) unsigned NOT NULL DEFAULT 1,
  `b_user_id_pendaftar` int(7) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bu_email_idx` (`email`) USING BTREE,
  KEY `idx_api_web_token` (`api_web_token`) USING BTREE,
  KEY `fk_a_institusi_id_owner` (`a_institusi_id_owner`),
  KEY `is_active` (`is_active`),
  KEY `b_user_id_pendaftar` (`b_user_id_pendaftar`),
  CONSTRAINT `b_user_ibfk_1` FOREIGN KEY (`a_institusi_id_owner`) REFERENCES `a_institusi` (`id`),
  CONSTRAINT `b_user_ibfk_2` FOREIGN KEY (`b_user_id_pendaftar`) REFERENCES `b_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='tabel pengguna, bisa member atau user vendor,';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `b_user`
--

LOCK TABLES `b_user` WRITE;
/*!40000 ALTER TABLE `b_user` DISABLE KEYS */;
INSERT INTO `b_user` VALUES (1,1,'memen@cenah.co.id','e10adc3949ba59abbe56e057f20f883e','Memen',NULL,1,'089633060648','Bandung','1988-12-12','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(2,NULL,'guru.sd.kelas.1@cenah.co.id','e10adc3949ba59abbe56e057f20f883e','GuruSD kelas 1',NULL,0,'','Bandung','1988-12-12','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(3,5,'gunandi@tknuri.net','e10adc3949ba59abbe56e057f20f883e','Gunandi',NULL,1,'','Bandung','1988-12-12','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(4,NULL,'pipih.sopiah@tknuri.net','e10adc3949ba59abbe56e057f20f883e','Pipih Sopiah',NULL,0,'','Bandung','1988-12-12','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(5,NULL,'adhitya@tknuri.net','e10adc3949ba59abbe56e057f20f883e','Adhitya Perdana',NULL,1,'','Bandung','1988-12-12','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(6,NULL,'andi@tknuri.net','e10adc3949ba59abbe56e057f20f883e','Andi Insanudin',NULL,1,'','Bandung','1988-12-12','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(7,NULL,'andika@tknuri.net','e10adc3949ba59abbe56e057f20f883e','Andika Rizki Rohandi',NULL,1,'','Bandung','1988-12-12','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(8,NULL,'pradikto@tknuri.net','e10adc3949ba59abbe56e057f20f883e','Pradikto Tri Wardhana',NULL,1,'','Bandung','1988-12-12','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(9,NULL,'meilia@tknuri.net','e10adc3949ba59abbe56e057f20f883e','Meilia Rachmawati',NULL,0,'','Bandung','1988-12-12','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(10,NULL,'turini@tknuri.net','e10adc3949ba59abbe56e057f20f883e','Turini Nidinda',NULL,0,'','Bandung','1988-12-12','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(11,NULL,'cindy@tknuri.net','e10adc3949ba59abbe56e057f20f883e','Cindy Verhanaz',NULL,0,'','Bandung','1988-12-12','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,45),(12,NULL,'adri@tknuri.net','e10adc3949ba59abbe56e057f20f883e','Adry Rahardinata',NULL,1,'','Bandung','1988-12-12','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(13,NULL,'septian@siswa.smp.miftahulhuda2.com','e10adc3949ba59abbe56e057f20f883e','Septian irianto',NULL,1,'','Mojokerto','2018-12-12','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(14,NULL,'bagja@tknuri.net','e10adc3949ba59abbe56e057f20f883e','Bagja Gumelar',NULL,1,'','Bandung','1988-12-12','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(15,NULL,'anissa.mung@tknuri.net','e10adc3949ba59abbe56e057f20f883e','Anissa Munggaran',NULL,0,'','Bandung','1988-12-12','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(16,NULL,'neneng@tknuri.net','e10adc3949ba59abbe56e057f20f883e','Neneng',NULL,0,'','Bandung','1988-12-12','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(17,NULL,'hetty@tknuri.net','e10adc3949ba59abbe56e057f20f883e','Hetty',NULL,0,'','Bandung','1988-12-12','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(18,NULL,'neni@tknuri.net','e10adc3949ba59abbe56e057f20f883e','Neni',NULL,0,'','Bandung','1988-12-12','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(19,NULL,'zainudin@smp.miftahulhuda2.com','e10adc3949ba59abbe56e057f20f883e','Zainudin',NULL,1,'','Bandung','1988-12-12','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(20,NULL,'aan.solihin@smp.miftahulhuda2.com','e10adc3949ba59abbe56e057f20f883e','Aan Solihin',NULL,1,'','Bandung','1988-12-12','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(21,NULL,'saepurrochman@smp.miftahulhuda2.com','e10adc3949ba59abbe56e057f20f883e','Saepurrochman',NULL,1,'','Bandung','1988-12-12','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(22,NULL,'annisa.pratiwis@smp.miftahulhuda2.com','e10adc3949ba59abbe56e057f20f883e','Annisa Pratiwi S',NULL,0,'','Bandung','1988-12-12','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(23,NULL,'ade.hudyah@smp.miftahulhuda2.com','e10adc3949ba59abbe56e057f20f883e','Ade Hudhyah',NULL,1,'','Bandung','1988-12-12','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(24,NULL,'kumala.sari@smp.miftahulhuda2.com','e10adc3949ba59abbe56e057f20f883e','Kumala Sari',NULL,0,'','Bandung','1988-12-12','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(25,NULL,'Nyai.Nenden@smp.miftahulhuda2.com','e10adc3949ba59abbe56e057f20f883e','Nyai Nenden',NULL,0,'','Majalengka','1992-12-12','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(26,NULL,'adele@siswa.smp.miftahulhuda2.com','e10adc3949ba59abbe56e057f20f883e','Adele Vance',NULL,0,'','Ciamis','2019-01-03','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(27,NULL,'tommy@siswa.smp.miftahulhuda2.com','e10adc3949ba59abbe56e057f20f883e','Tommy Jamaika',NULL,1,'','Cirebon','2018-11-23','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(28,NULL,'Syifa@siswa.smp.miftahulhuda2.com','e10adc3949ba59abbe56e057f20f883e','Syifa Assyifa',NULL,0,'','Jakarta','2019-03-13','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(29,NULL,'Bambang@siswa.smp.miftahulhuda2.com','e10adc3949ba59abbe56e057f20f883e','Bambang Prakoso',NULL,1,'','Jakarta','2019-02-09','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(30,NULL,'Bambang2@siswa.smp.miftahulhuda2.com','e10adc3949ba59abbe56e057f20f883e','Bambang Pamungkas',NULL,1,'','Tasikmalaya','2019-02-08','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(31,NULL,'Heru@siswa.smp.miftahulhuda2.com','e10adc3949ba59abbe56e057f20f883e','Heru Awaludin',NULL,1,'','Garut','2019-02-07','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(32,NULL,'july.januari@siswa.smp.miftahulhuda2.com','e10adc3949ba59abbe56e057f20f883e','July Januari',NULL,1,'','Serang','2019-01-02','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(33,NULL,'Kiki.syarmila@siswa.smp.miftahulhuda2.com','e10adc3949ba59abbe56e057f20f883e','Kiki Syarmila',NULL,0,'','Lampung','2019-01-03','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(34,NULL,'muhammad.nur.akhirun@siswa.smp.miftahulhuda2.com','e10adc3949ba59abbe56e057f20f883e','Muhammad Nur Akhirun',NULL,1,'','Bulukumba','2018-12-30','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(35,NULL,'dewi.nur@siswa.smp.miftahulhuda2.com','e10adc3949ba59abbe56e057f20f883e','Dewi Nur Syiam',NULL,0,'','Siborongborong','2018-12-29','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(36,NULL,'christine@siswa.smp.miftahulhuda2.com','e10adc3949ba59abbe56e057f20f883e','Christine Pandjaitan',NULL,0,'','Medan','2018-12-28','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(37,NULL,'mela.karitiwi@siswa.smp.miftahulhuda2.com','e10adc3949ba59abbe56e057f20f883e','Mela Kartiwi',NULL,0,'','Payakumbuah','2018-12-27','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(38,NULL,'shinta.jamaludin@siswa.smp.miftahulhuda2.com','e10adc3949ba59abbe56e057f20f883e','Shinta Jamaludin',NULL,0,'','Badung','2018-12-26','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(39,NULL,'harun@siswa.smp.miftahulhuda2.com','e10adc3949ba59abbe56e057f20f883e','Harun bin ismat',NULL,1,'','Makassar','2018-12-25','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(40,NULL,'cecep@siswa.smp.miftahulhuda2.com','e10adc3949ba59abbe56e057f20f883e','Cecep Suhendar',NULL,1,'','Majalengka','2019-07-23','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(41,NULL,'rafi@siswa.smp.miftahulhuda2.com','e10adc3949ba59abbe56e057f20f883e','Rafi Muhammad',NULL,1,'','Cilacap','2019-06-24','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(42,NULL,'dicky@siswa.smp.miftahulhuda2.com','e10adc3949ba59abbe56e057f20f883e','Dikcy Alkahfi',NULL,1,'','Serang','2019-05-21','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(43,NULL,'farhan@siswa.smp.miftahulhuda2.com','e10adc3949ba59abbe56e057f20f883e','Farhan Imron',NULL,1,'','Banyuwangi','2019-08-19','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(44,NULL,'emilia@siswa.smp.miftahulhuda2.com','e10adc3949ba59abbe56e057f20f883e','Emilia Pertiwi',NULL,0,'','Surakarta','2019-06-20','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',0,0,0,1,NULL),(45,NULL,'natasha.wilona@gmail.com','e10adc3949ba59abbe56e057f20f883e','Natasha Wilona',NULL,0,'','Den haag','1991-06-20','2023-07-17 13:43:23',NULL,NULL,20,'-',NULL,'',NULL,NULL,NULL,NULL,'','web','',1,0,0,1,NULL);
/*!40000 ALTER TABLE `b_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `b_user_alamat`
--

DROP TABLE IF EXISTS `b_user_alamat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `b_user_alamat` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `b_user_id` int(7) unsigned NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat1` varchar(78) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat2` varchar(78) DEFAULT NULL,
  `kelurahan` varchar(128) DEFAULT NULL,
  `kecamatan` varchar(128) DEFAULT NULL,
  `kabkota` varchar(78) DEFAULT NULL COMMENT 'kabupaten kota',
  `provinsi` varchar(78) DEFAULT NULL,
  `negara` varchar(78) DEFAULT NULL,
  `kodepos` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telp` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `is_default` int(1) unsigned NOT NULL DEFAULT 1,
  `is_active` int(1) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `fk_b_user_id` (`b_user_id`),
  KEY `idx_is_default` (`is_default`),
  KEY `is_active` (`is_active`),
  CONSTRAINT `b_user_alamat_ibfk_1` FOREIGN KEY (`b_user_id`) REFERENCES `b_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='Institute atau lembaga';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `b_user_alamat`
--

LOCK TABLES `b_user_alamat` WRITE;
/*!40000 ALTER TABLE `b_user_alamat` DISABLE KEYS */;
/*!40000 ALTER TABLE `b_user_alamat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `b_user_invoice`
--

DROP TABLE IF EXISTS `b_user_invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `b_user_invoice` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `a_pengguna_id` int(5) DEFAULT NULL,
  `b_user_id` int(7) unsigned DEFAULT NULL,
  `b_user_id_siswa` int(7) unsigned DEFAULT NULL,
  `a_institusi_id` int(5) unsigned DEFAULT NULL,
  `b_biaya_id` int(5) unsigned DEFAULT NULL,
  `jenjang_kelas` int(1) unsigned DEFAULT NULL,
  `kode` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `confirm_date` datetime DEFAULT NULL COMMENT 'tanggal waktu konfirmasi pembayaran',
  `confirm_info` text DEFAULT NULL COMMENT 'informasi konfirmasi pembayaran',
  `paid_at` datetime DEFAULT NULL,
  `sub_total` decimal(18,0) NOT NULL,
  `diskon` decimal(18,0) NOT NULL,
  `total` decimal(18,0) NOT NULL,
  `is_bayar` int(1) unsigned NOT NULL DEFAULT 0,
  `is_batal` int(1) unsigned NOT NULL DEFAULT 0,
  `is_deleted` int(1) unsigned NOT NULL DEFAULT 0,
  `is_active` int(1) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `b_user_id` (`b_user_id`),
  KEY `a_institusi_id` (`a_institusi_id`),
  KEY `is_active` (`is_active`),
  KEY `is_deleted` (`is_deleted`),
  KEY `is_bayar` (`is_bayar`),
  KEY `is_batal` (`is_batal`),
  KEY `a_pengguna_id` (`a_pengguna_id`),
  KEY `b_user_id_siswa` (`b_user_id_siswa`),
  KEY `b_biaya_id` (`b_biaya_id`),
  KEY `kode` (`kode`),
  CONSTRAINT `b_user_invoice_ibfk_1` FOREIGN KEY (`a_institusi_id`) REFERENCES `a_institusi` (`id`),
  CONSTRAINT `b_user_invoice_ibfk_2` FOREIGN KEY (`b_user_id`) REFERENCES `b_user` (`id`),
  CONSTRAINT `b_user_invoice_ibfk_3` FOREIGN KEY (`b_user_id_siswa`) REFERENCES `b_user` (`id`),
  CONSTRAINT `b_user_invoice_ibfk_4` FOREIGN KEY (`b_biaya_id`) REFERENCES `b_biaya` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `b_user_invoice`
--

LOCK TABLES `b_user_invoice` WRITE;
/*!40000 ALTER TABLE `b_user_invoice` DISABLE KEYS */;
INSERT INTO `b_user_invoice` VALUES (1,NULL,5,5,6,3,0,'YPSW23071700001','2023-07-17 23:38:53',NULL,NULL,'2023-07-27',NULL,NULL,NULL,1000000,0,1000000,0,0,0,1),(2,NULL,6,6,6,3,0,'YPSW23071700002','2023-07-17 23:38:53',NULL,NULL,'2023-07-27',NULL,NULL,'2023-07-17 23:44:01',1000000,0,1000000,1,0,0,1),(3,NULL,7,7,6,3,0,'YPSW23071700003','2023-07-17 23:38:53',NULL,NULL,'2023-07-27',NULL,NULL,NULL,1000000,0,1000000,0,1,0,1),(4,NULL,7,7,6,3,0,'YPSW23071700003','2023-07-17 23:44:49',NULL,NULL,'2023-07-27',NULL,NULL,'2023-07-17 23:44:56',500000,0,500000,1,0,0,1),(5,NULL,8,8,6,3,0,'YPSW23071700001','2023-07-17 23:38:53',NULL,NULL,'2023-07-27',NULL,NULL,NULL,1000000,0,1000000,0,0,0,1),(6,NULL,45,11,6,3,0,'YPSW23071700001','2023-07-17 23:38:53',NULL,NULL,'2023-07-27',NULL,NULL,'2023-07-18 00:27:39',1000000,0,1000000,1,0,0,1),(7,NULL,9,9,6,3,0,'YPSW23071700007','2023-07-18 00:28:25',NULL,NULL,'2023-07-27',NULL,NULL,NULL,1000000,0,1000000,0,0,0,1),(8,NULL,10,10,6,3,0,'YPSW23071700007','2023-07-18 00:28:25',NULL,NULL,'2023-07-27',NULL,NULL,NULL,1000000,0,1000000,0,0,0,1),(9,NULL,12,12,6,3,0,'YPSW23071700007','2023-07-18 00:28:25',NULL,NULL,'2023-07-27',NULL,NULL,NULL,1000000,0,1000000,0,0,0,1),(10,NULL,14,14,6,3,0,'YPSW23071700007','2023-07-18 00:28:25',NULL,NULL,'2023-07-27',NULL,NULL,NULL,1000000,0,1000000,0,0,0,1),(11,NULL,13,13,2,7,1,'MFHDII23071700007','2022-07-18 00:28:25',NULL,NULL,'2022-07-27',NULL,NULL,'2022-07-18 00:31:01',1000000,0,1000000,1,0,0,1);
/*!40000 ALTER TABLE `b_user_invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `c_gurutendik`
--

DROP TABLE IF EXISTS `c_gurutendik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `c_gurutendik` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `b_user_id` int(7) unsigned DEFAULT NULL,
  `a_institusi_id` int(5) unsigned DEFAULT NULL,
  `utype` enum('guru','dosen','staf','lainnya') DEFAULT 'lainnya',
  `kode` varchar(16) DEFAULT NULL,
  `nip` varchar(32) DEFAULT NULL,
  `nuptk` varchar(32) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `is_active` int(1) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_unq_kode_gtk` (`kode`),
  KEY `b_user_id` (`b_user_id`),
  KEY `idx_is_active` (`is_active`),
  KEY `idx_gtk_utype` (`utype`),
  KEY `a_institusi_id_penempatan` (`a_institusi_id`),
  CONSTRAINT `c_gurutendik_ibfk_1` FOREIGN KEY (`a_institusi_id`) REFERENCES `a_institusi` (`id`),
  CONSTRAINT `c_gurutendik_ibfk_2` FOREIGN KEY (`b_user_id`) REFERENCES `b_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Guru dan Tenaga Pendidik';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `c_gurutendik`
--

LOCK TABLES `c_gurutendik` WRITE;
/*!40000 ALTER TABLE `c_gurutendik` DISABLE KEYS */;
INSERT INTO `c_gurutendik` VALUES (1,2,2,'guru','GTYSD0001','1989072820180101001','1989072820180101001','2023-07-17 14:34:52',NULL,NULL,1),(2,4,6,'guru','YPSW0001',NULL,'1979072820180101003','2023-07-17 14:34:52',NULL,NULL,1),(3,16,6,'guru','YPSW0002',NULL,'1979072820180101001','2023-07-17 14:34:52',NULL,NULL,1),(4,17,6,'guru','YPSW0003',NULL,'1979072820180101002','2023-07-17 14:34:52',NULL,NULL,1),(6,18,6,'guru','YPSW0004',NULL,NULL,'2023-07-17 14:34:52',NULL,NULL,1),(7,19,2,'guru','GTYSD0002',NULL,'1979072820180101001','2023-07-17 14:34:52',NULL,NULL,1),(8,20,2,'guru','GTYSD0003',NULL,NULL,'2023-07-17 21:03:50',NULL,NULL,1),(9,21,2,'guru','GTYSD0004',NULL,NULL,'2023-07-17 21:03:50',NULL,NULL,1),(10,22,2,'guru','GTYSD0005',NULL,NULL,'2023-07-17 21:03:50',NULL,NULL,1),(11,23,2,'guru','GTYSD0006',NULL,NULL,'2023-07-17 21:03:50',NULL,NULL,1),(12,24,2,'guru','GTYSD0007',NULL,NULL,'2023-07-17 21:03:50',NULL,NULL,1),(13,25,2,'guru','GTYSD0008',NULL,NULL,'2023-07-17 21:03:50',NULL,NULL,1);
/*!40000 ALTER TABLE `c_gurutendik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `c_gurutendik_jabatan`
--

DROP TABLE IF EXISTS `c_gurutendik_jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `c_gurutendik_jabatan` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `a_institusi_id` int(5) unsigned DEFAULT NULL,
  `c_gurutendik_id` int(5) unsigned DEFAULT NULL,
  `a_jabatan_id` int(3) unsigned NOT NULL,
  `a_matapelajaran_id` int(3) unsigned DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `is_active` int(1) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `idx_is_active` (`is_active`),
  KEY `b_matapelajaran_id` (`a_matapelajaran_id`),
  KEY `a_institusi_id` (`a_institusi_id`),
  KEY `c_gurutendik_id` (`c_gurutendik_id`),
  KEY `a_jabatan_id` (`a_jabatan_id`),
  CONSTRAINT `c_gurutendik_jabatan_ibfk_1` FOREIGN KEY (`a_jabatan_id`) REFERENCES `a_jabatan` (`id`),
  CONSTRAINT `c_gurutendik_jabatan_ibfk_2` FOREIGN KEY (`a_matapelajaran_id`) REFERENCES `a_matapelajaran` (`id`),
  CONSTRAINT `c_gurutendik_jabatan_ibfk_3` FOREIGN KEY (`a_institusi_id`) REFERENCES `a_institusi` (`id`),
  CONSTRAINT `c_gurutendik_jabatan_ibfk_4` FOREIGN KEY (`c_gurutendik_id`) REFERENCES `c_gurutendik` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `c_gurutendik_jabatan`
--

LOCK TABLES `c_gurutendik_jabatan` WRITE;
/*!40000 ALTER TABLE `c_gurutendik_jabatan` DISABLE KEYS */;
INSERT INTO `c_gurutendik_jabatan` VALUES (1,6,6,2,NULL,'2023-07-17 20:49:49',NULL,NULL,1),(2,6,2,1,NULL,'2023-07-17 20:49:49',NULL,NULL,1),(3,2,8,1,NULL,'2023-07-17 20:49:49',NULL,NULL,1);
/*!40000 ALTER TABLE `c_gurutendik_jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `c_siswa`
--

DROP TABLE IF EXISTS `c_siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `c_siswa` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `a_institusi_id` int(5) unsigned DEFAULT NULL,
  `b_user_id` int(7) unsigned NOT NULL,
  `b_user_id_wali` int(5) unsigned DEFAULT NULL COMMENT 'ID user wali siswa',
  `nomor_induk` varchar(32) NOT NULL,
  `nisn` varchar(32) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `tahun_masuk` int(4) unsigned DEFAULT NULL,
  `tahun_keluar` int(4) unsigned DEFAULT NULL,
  `is_deleted` int(1) unsigned NOT NULL DEFAULT 0,
  `is_active` int(1) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `b_user_id` (`b_user_id`),
  KEY `idx_is_active` (`is_active`),
  KEY `idx_is_deleted` (`is_deleted`),
  KEY `fk_a_institusi_id` (`a_institusi_id`),
  KEY `b_user_id_wali` (`b_user_id_wali`),
  CONSTRAINT `c_siswa_ibfk_1` FOREIGN KEY (`b_user_id_wali`) REFERENCES `b_user` (`id`),
  CONSTRAINT `c_siswa_ibfk_2` FOREIGN KEY (`a_institusi_id`) REFERENCES `a_institusi` (`id`),
  CONSTRAINT `c_siswa_ibfk_3` FOREIGN KEY (`b_user_id`) REFERENCES `b_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `c_siswa`
--

LOCK TABLES `c_siswa` WRITE;
/*!40000 ALTER TABLE `c_siswa` DISABLE KEYS */;
INSERT INTO `c_siswa` VALUES (1,6,5,NULL,'','','2023-07-17 20:09:08',NULL,NULL,2023,NULL,0,1),(2,6,11,NULL,'','','2023-07-17 20:09:11',NULL,NULL,2023,NULL,0,1),(3,6,6,NULL,'','','2023-07-17 20:09:13',NULL,NULL,2023,NULL,0,1),(4,6,12,NULL,'','','2023-07-17 20:09:13',NULL,NULL,2023,NULL,0,1),(5,6,7,NULL,'','','2023-07-17 20:09:13',NULL,NULL,2023,NULL,0,1),(6,6,8,NULL,'','','2023-07-17 20:09:13',NULL,NULL,2023,NULL,0,1),(7,6,9,NULL,'','','2023-07-17 20:09:13',NULL,NULL,2023,NULL,0,1),(8,6,10,NULL,'','','2023-07-17 20:09:13',NULL,NULL,2023,NULL,0,1),(9,6,14,NULL,'','','2023-07-17 20:09:13',NULL,NULL,2023,NULL,0,1),(10,6,15,NULL,'','','2023-07-17 20:09:13',NULL,NULL,2023,NULL,0,1),(11,2,13,NULL,'','','2023-07-17 20:09:13',NULL,NULL,2022,NULL,0,1),(12,6,26,NULL,'','','2023-07-17 21:29:11',NULL,NULL,2023,NULL,0,1),(13,6,27,NULL,'','','2023-07-17 21:29:11',NULL,NULL,2023,NULL,0,1),(14,6,28,NULL,'','','2023-07-17 21:31:08',NULL,NULL,2023,NULL,0,1),(15,6,29,NULL,'','','2023-07-17 21:31:11',NULL,NULL,2023,NULL,0,1),(16,6,30,NULL,'','','2023-07-17 21:31:14',NULL,NULL,2023,NULL,0,1),(17,6,31,NULL,'','','2023-07-17 21:31:57',NULL,NULL,2023,NULL,0,1),(18,6,32,NULL,'','','2023-07-17 21:31:57',NULL,NULL,2023,NULL,0,1),(19,6,33,NULL,'','','2023-07-17 21:33:49',NULL,NULL,2023,NULL,0,1),(20,6,34,NULL,'','','2023-07-17 21:33:49',NULL,NULL,2023,NULL,0,1),(21,6,35,NULL,'','','2023-07-17 21:33:49',NULL,NULL,2023,NULL,0,1),(22,6,36,NULL,'','','2023-07-17 21:34:51',NULL,NULL,2023,NULL,0,1),(23,6,37,NULL,'','','2023-07-17 21:34:54',NULL,NULL,2023,NULL,0,1),(24,6,38,NULL,'','','2023-07-17 21:36:07',NULL,NULL,2023,NULL,0,1),(25,6,39,NULL,'','','2023-07-17 21:36:10',NULL,NULL,2023,NULL,0,1),(26,6,40,NULL,'','','2023-07-17 21:36:10',NULL,NULL,2023,NULL,0,1),(27,6,41,NULL,'','','2023-07-17 21:36:10',NULL,NULL,2023,NULL,0,1),(28,6,42,NULL,'','','2023-07-17 21:36:10',NULL,NULL,2023,NULL,0,1),(29,6,43,NULL,'','','2023-07-17 21:36:10',NULL,NULL,2023,NULL,0,1),(30,6,44,NULL,'','','2023-07-17 21:36:10',NULL,NULL,2023,NULL,0,1);
/*!40000 ALTER TABLE `c_siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `d_kelas`
--

DROP TABLE IF EXISTS `d_kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `d_kelas` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `a_tahunajaran_id` int(5) unsigned DEFAULT NULL,
  `a_institusi_id` int(5) unsigned NOT NULL,
  `b_kelasrombel_id` int(3) unsigned NOT NULL,
  `c_gurutendik_id_walikelas` int(7) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `is_deleted` int(1) unsigned NOT NULL DEFAULT 0,
  `is_active` int(1) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `fk_a_institusi_id` (`a_institusi_id`),
  KEY `fk_b_kelasrombel_id` (`b_kelasrombel_id`),
  KEY `c_gurutendik_id_wali` (`c_gurutendik_id_walikelas`),
  KEY `idx_is_active` (`is_active`),
  KEY `idx_is_deleted` (`is_deleted`),
  KEY `fk_a_tahunajaran_id` (`a_tahunajaran_id`),
  CONSTRAINT `d_kelas_ibfk_1` FOREIGN KEY (`b_kelasrombel_id`) REFERENCES `b_kelasrombel` (`id`),
  CONSTRAINT `d_kelas_ibfk_2` FOREIGN KEY (`c_gurutendik_id_walikelas`) REFERENCES `c_gurutendik` (`id`),
  CONSTRAINT `fk_a_institusi_id` FOREIGN KEY (`a_institusi_id`) REFERENCES `a_institusi` (`id`),
  CONSTRAINT `fk_a_tahunajaran_id` FOREIGN KEY (`a_tahunajaran_id`) REFERENCES `a_tahunajaran` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `d_kelas`
--

LOCK TABLES `d_kelas` WRITE;
/*!40000 ALTER TABLE `d_kelas` DISABLE KEYS */;
INSERT INTO `d_kelas` VALUES (1,2,6,15,2,'2023-07-17 20:02:53',NULL,NULL,0,1),(2,2,6,16,3,'2023-07-17 20:02:53',NULL,NULL,0,1),(3,1,2,1,7,'2023-07-17 20:02:53',NULL,NULL,0,1),(4,2,2,3,7,'2023-07-17 20:02:53',NULL,NULL,0,1),(5,1,2,2,8,'2023-07-17 20:02:53',NULL,NULL,0,1),(6,1,2,3,9,'2023-07-17 20:02:53',NULL,NULL,0,1),(7,1,2,4,10,'2023-07-17 20:02:53',NULL,NULL,0,1),(8,1,2,5,11,'2023-07-17 20:02:53',NULL,NULL,0,1),(9,1,2,6,12,'2023-07-17 20:02:53',NULL,NULL,0,1),(10,1,2,7,13,'2023-07-17 20:02:53',NULL,NULL,0,1),(11,2,2,1,8,'2023-07-17 20:02:53',NULL,NULL,0,1),(12,2,2,2,9,'2023-07-17 20:02:53',NULL,NULL,0,1),(13,2,2,4,10,'2023-07-17 20:02:53',NULL,NULL,0,1),(14,2,2,5,11,'2023-07-17 20:02:53',NULL,NULL,0,1),(15,2,2,6,12,'2023-07-17 20:02:53',NULL,NULL,0,1),(16,2,2,7,13,'2023-07-17 20:02:53',NULL,NULL,0,1);
/*!40000 ALTER TABLE `d_kelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `d_kelas_siswa`
--

DROP TABLE IF EXISTS `d_kelas_siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `d_kelas_siswa` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `d_kelas_id` int(8) unsigned DEFAULT NULL,
  `c_siswa_id` int(6) unsigned DEFAULT NULL,
  `is_deleted` int(1) unsigned NOT NULL DEFAULT 0,
  `is_active` int(1) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `idx_is_active` (`is_active`),
  KEY `idx_is_deleted` (`is_deleted`),
  KEY `d_kelas_id` (`d_kelas_id`),
  KEY `c_siswa_id` (`c_siswa_id`),
  CONSTRAINT `fk_c_siswa_id` FOREIGN KEY (`c_siswa_id`) REFERENCES `c_siswa` (`id`),
  CONSTRAINT `fk_d_kelas_id` FOREIGN KEY (`d_kelas_id`) REFERENCES `d_kelas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `d_kelas_siswa`
--

LOCK TABLES `d_kelas_siswa` WRITE;
/*!40000 ALTER TABLE `d_kelas_siswa` DISABLE KEYS */;
INSERT INTO `d_kelas_siswa` VALUES (1,1,1,0,1),(2,1,2,0,1),(3,1,3,0,1),(4,1,4,0,1),(5,2,5,0,1),(6,2,6,0,1),(7,2,7,0,1),(8,2,8,0,1),(9,1,9,0,1),(10,2,10,0,1),(11,3,11,0,1),(12,4,11,0,1),(13,3,12,0,1),(14,3,13,0,1),(15,5,14,0,1),(16,5,15,0,1),(17,6,16,0,1),(18,6,17,0,1),(19,7,18,0,1),(20,7,19,0,1),(21,8,20,0,1),(22,8,21,0,1),(23,9,22,0,1),(24,9,23,0,1),(25,10,24,0,1),(26,10,25,0,1),(27,11,26,0,1),(28,12,27,0,1),(29,11,28,0,1),(30,12,29,0,1),(31,11,30,0,1),(32,16,22,0,1),(33,16,23,0,1),(34,15,20,0,1),(35,15,21,0,1),(36,13,18,0,1),(37,14,19,0,1),(38,13,16,0,1),(39,13,17,0,1),(40,12,12,0,1),(41,12,13,0,1),(42,12,14,0,1),(43,11,15,0,1);
/*!40000 ALTER TABLE `d_kelas_siswa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-18  2:43:21