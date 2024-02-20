-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 04:43 PM
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
-- Database: `sikemas_db`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_alamat` (IN `q` VARCHAR(255))   BEGIN
	select 
    	alamat.id as id, 
        concat(
            alamat.no_rumah, 
            ", RT.",
            alamat.rt
        ) as alamat,
        warga.nama as nama,
        warga.id as warga_id 
    from alamat left join warga on alamat.id = warga.alamat_id
     where concat(
            alamat.no_rumah, 
            ", RT.",
            alamat.rt
        ) like q or warga.nama like q;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_balasan` (IN `ff` INT)   BEGIN
	select 
    	aspirasi.perihal as aspirasi_title,
        aspirasi.pesan as aspirasi_body,
        aspirasi.created_at as aspirasi_tanggal,
    	balasan.id as id,
        balasan.title as title,
        balasan.pesan as body,
        balasan.created_at as balasan_tanggal,
        warga.nama as name,
        admin.email as email 
     from aspirasi 
     left join balasan on aspirasi.id = balasan.aspirasi_id 
     left join admin on balasan.pengguna_id = admin.id 
     left join warga on admin.warga_id = warga.id 
     where aspirasi.user_id = ff;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_user_warga` (IN `ids` INT)   BEGIN
	select 
    	users.id as id,
        users.email as email,
        users.username as username,
        warga.id as warga_id,
        warga.nik as nik,
        warga.nama as nama,
        warga.phone as phone,
        warga.tempat_lahir as tempat_lahir,
        warga.tanggal_lahir as tanggal_lahir,
        if(warga.kelamin = 0, "perempuan", "laki-laki") as kelamin,
        warga.foto as foto,
        if(warga.kewarganegaraan = 0, "WNA", "WNI") as kewarganegaraan ,
        warga.alamat_id as alamat_id,
        warga.pekerjaan as pekerjaan,
        posisi.posisi as posisi,
        alamat.rt as rt,
        alamat.no_rumah as no_rumah,
        alamat.kode_pos as kode_pos 
    from 
    	users 
    left join warga on users.warga_id = warga.id 
    left join alamat on warga.alamat_id = alamat.id 
    left join posisi on warga.posisi_id = posisi.id 
    where users.id = ids;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_reg` (IN `emailp` VARCHAR(255), IN `usernamep` VARCHAR(255), IN `passwordp` VARCHAR(255), IN `warga_idp` VARCHAR(255), IN `email_verify_tokenp` VARCHAR(255))   BEGIN
	insert into register  
    (`email`, `username`, `password`, `warga_id`, `email_verify_token`)
    values (emailp, usernamep, passwordp, warga_idp, email_verify_tokenp);
    
    select * from register where 
    	email = emailp AND
        username = usernamep AND 
        `password` = passwordp AND 
        warga_id = warga_idp AND 
        email_verify_token = email_verify_tokenp;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `warga_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `username`, `password`, `warga_id`) VALUES
(1, 'rayhan', 'rayfathur2006@gmail.com', 'Alien_bvmi12', '$2y$10$p8HNmIdmrXOCiu5ta25alOm6mn5btWb0mdCB.Xd3De4S/fzck9VXe', 2);

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `id` int(10) UNSIGNED NOT NULL,
  `rt` int(3) NOT NULL,
  `no_rumah` varchar(50) NOT NULL,
  `kode_pos` int(5) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`id`, `rt`, `no_rumah`, `kode_pos`, `created_at`) VALUES
(1, 3, 'Blok B3 no.19', 4302, '2024-02-12 02:23:41'),
(2, 3, 'Blok B3 no.1', 4302, '2024-02-12 02:26:28'),
(3, 3, 'Blok B2 no.2', 4302, '2024-02-12 02:26:28'),
(4, 3, 'Blok B1 no.3', 4302, '2024-02-12 02:26:28'),
(5, 3, 'Blok B4 no.4', 4302, '2024-02-12 02:26:28'),
(6, 3, 'Blok B3 no.17', 4302, '2024-02-12 02:26:28'),
(7, 3, 'Blok B2 no.20', 4302, '2024-02-12 02:26:28'),
(8, 3, 'Blok B1 no.7', 4302, '2024-02-12 02:26:28'),
(9, 4, 'Blok C1 no.3', 4302, '2024-02-12 02:26:28'),
(10, 4, 'Blok C2 no.30', 4302, '2024-02-12 02:26:28'),
(11, 4, 'Blok C3 no.1', 4302, '2024-02-12 02:27:02'),
(12, 12, 'Blok C3 no.13 SSR Premium', 1231, '2024-02-12 02:27:02');

-- --------------------------------------------------------

--
-- Table structure for table `aspirasi`
--

CREATE TABLE `aspirasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `perihal` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aspirasi`
--

INSERT INTO `aspirasi` (`id`, `user_id`, `perihal`, `pesan`, `created_at`, `updated_at`) VALUES
(1, 26, 'healod', 'tesddt', '2024-02-12 15:24:44', NULL),
(2, 26, 'gjuufufut', 'xhcudfududud', '2024-02-12 15:36:27', NULL),
(4, 26, 'Halo saya ingin melapora', 'Pak rt 06 sepertinya banyak uang walau tak bekerja, apakah dia ngepet? kalo ngepet hayu atuh gebugin', '2024-02-16 11:35:26', NULL),
(5, 26, 'Aku sayang kamu', 'Aku suka sama janda sebelah sejak dulu kala', '2024-02-16 11:36:53', NULL),
(7, 26, 'healod', 'tesddt', '2024-02-16 16:55:37', NULL),
(18, 29, 'Test', 'Kaushfbsf csc sf sc cssc', '2024-02-16 17:44:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `balasan`
--

CREATE TABLE `balasan` (
  `id` int(10) UNSIGNED NOT NULL,
  `aspirasi_id` int(10) UNSIGNED NOT NULL,
  `pengguna_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `balasan`
--

INSERT INTO `balasan` (`id`, `aspirasi_id`, `pengguna_id`, `title`, `pesan`, `created_at`) VALUES
(2, 1, 1, 'Pencurian', 'qrfuirfyq3 urq3rugq3yrgq3ryq3v ry3wyevqy dvqy wdvqwdyvq ydvqwyvdqwyuqwdvq whdqwhdqwhvfvqwhfuuu uh uh ui', '2024-02-15 02:17:05'),
(4, 2, 1, 'Aselole super md5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2024-02-16 11:26:01'),
(6, 4, 1, 'Konfirmasi', 'Fix dia ngepet, ayo kita kumpulkan masa dan bersama-sama menyerbu rumah pak rt 06!!!!!     ', '2024-02-16 11:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `emergencies_log`
--

CREATE TABLE `emergencies_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `event` varchar(255) NOT NULL,
  `alamat_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emergencies_log`
--

INSERT INTO `emergencies_log` (`id`, `event`, `alamat_id`, `user_id`, `created_at`) VALUES
(2, 'Pencurian', 9, 26, '2024-02-14 15:15:06'),
(9, 'Kebakaran', 10, 26, '2024-02-15 04:06:07'),
(10, 'Kebakaran', 2, 26, '2024-02-16 11:37:16'),
(11, 'Kebakaran', 10, 26, '2024-02-16 11:37:41'),
(12, 'Pencurian', 10, 26, '2024-02-16 12:40:21'),
(13, 'Pencurian', 12, 26, '2024-02-16 12:41:19'),
(14, 'Pencurian', 12, 26, '2024-02-16 12:41:35'),
(16, 'Pencurian', 9, NULL, '2024-02-20 13:45:53'),
(17, 'Kebakaran', 9, 31, '2024-02-20 14:47:12'),
(18, 'Kebakaran', 2, 31, '2024-02-20 14:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_ronda`
--

CREATE TABLE `jadwal_ronda` (
  `id` int(10) UNSIGNED NOT NULL,
  `hari` int(10) UNSIGNED NOT NULL,
  `warga_id` int(10) UNSIGNED NOT NULL COMMENT '"1" untuk senin - "7" untuk minggu',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_ronda`
--

INSERT INTO `jadwal_ronda` (`id`, `hari`, `warga_id`, `created_at`) VALUES
(1, 1, 4, '2024-02-12 12:24:36'),
(2, 1, 3, '2024-02-12 12:24:36'),
(3, 1, 5, '2024-02-12 12:24:36'),
(4, 2, 4, '2024-02-12 12:24:36'),
(5, 2, 3, '2024-02-12 12:24:36'),
(6, 2, 1, '2024-02-12 12:24:36'),
(7, 3, 4, '2024-02-12 12:24:36'),
(8, 3, 3, '2024-02-12 12:24:36'),
(9, 3, 2, '2024-02-12 12:24:36'),
(10, 4, 4, '2024-02-12 12:24:36'),
(11, 4, 5, '2024-02-12 12:24:36'),
(12, 4, 1, '2024-02-12 12:24:36'),
(13, 5, 2, '2024-02-12 12:24:36'),
(14, 5, 1, '2024-02-12 12:24:36'),
(15, 5, 5, '2024-02-12 12:24:36'),
(16, 6, 1, '2024-02-12 12:24:36'),
(18, 6, 3, '2024-02-12 12:24:36'),
(19, 7, 3, '2024-02-12 12:24:36'),
(20, 7, 5, '2024-02-12 12:24:36'),
(21, 7, 1, '2024-02-12 12:24:36'),
(26, 6, 4, '2024-02-16 09:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `expired_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user_id`, `token`, `created_at`, `expired_at`) VALUES
(3, 24, '34934e9281086d249aa57eb1433af25f', '2024-02-10 08:45:49', NULL),
(4, 24, 'f0f3051af05a2fcc025cc181ea508c4d', '2024-02-10 10:12:51', NULL),
(11, 26, 'af155c3b2a6a29b1987c9c354bee263f', '2024-02-10 10:52:15', NULL),
(12, 26, '90ae695d7a2ff3b8aa838bda1b07eb77', '2024-02-10 10:52:40', NULL),
(13, 26, '893c4a6ada9fb5f0073817772fd99342', '2024-02-10 10:56:57', NULL),
(14, 26, '3c53fbfb1d1f71e379b8f84d6c962ab5', '2024-02-10 16:21:24', NULL),
(15, 26, '6fdd2a999d0419ad79d6892267a0668d', '2024-02-10 17:15:27', NULL),
(16, 26, 'cafd487cd2ac5ff17206facf56fa16a3', '2024-02-11 05:18:40', NULL),
(17, 24, '2e37d786f96dc87671772519f405e80f', '2024-02-11 10:41:10', NULL),
(23, 26, 'b8523ee4d16f6c2df55514871bacf8ba', '2024-02-11 12:54:18', NULL),
(25, 26, '7ae2fe174c3a3ed6db175672e4f2f0a8', '2024-02-11 14:44:35', NULL),
(26, 26, '5284d46195a12d99c9021cb5c549cd9c', '2024-02-11 14:54:40', NULL),
(29, 26, 'fc47ec1cc4b237d1c699c7593e5b600c', '2024-02-12 12:17:22', NULL),
(51, 26, '72ded909c03f98ca49d643cb8cd8ea1f', '2024-02-16 12:35:45', NULL),
(56, 26, 'fff07efb9f9cca364efffe05644ce98a', '2024-02-16 16:43:25', NULL),
(65, 29, '94888f77c08ad369bf75cf05e44759cb', '2024-02-16 17:10:28', NULL),
(66, 26, '9a13fc9ed704f18eebdd962c5887155b', '2024-02-20 13:06:02', NULL);

--
-- Triggers `login`
--
DELIMITER $$
CREATE TRIGGER `log_histori_logout` BEFORE DELETE ON `login` FOR EACH ROW BEGIN
	insert into log_history (user_id, action) values (old.user_id, 0);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `log_history_login` AFTER INSERT ON `login` FOR EACH ROW BEGIN
	insert into log_history (user_id, action) values (new.user_id, 1);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log_history`
--

CREATE TABLE `log_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `action` tinyint(1) UNSIGNED NOT NULL COMMENT '1 for login, 0 for logout',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_history`
--

INSERT INTO `log_history` (`id`, `user_id`, `action`, `created_at`) VALUES
(1, 26, 0, '2024-02-16 14:44:27'),
(6, 26, 1, '2024-02-16 16:43:25'),
(7, 26, 1, '2024-02-16 16:44:46'),
(8, 26, 0, '2024-02-16 16:44:49'),
(9, 29, 1, '2024-02-16 16:52:02'),
(10, 29, 0, '2024-02-16 16:52:43'),
(11, 29, 1, '2024-02-16 16:52:50'),
(12, 29, 0, '2024-02-16 16:56:35'),
(13, 29, 1, '2024-02-16 16:56:42'),
(14, 29, 0, '2024-02-16 16:57:31'),
(15, 29, 1, '2024-02-16 16:57:40'),
(16, 29, 0, '2024-02-16 16:59:15'),
(17, 29, 1, '2024-02-16 16:59:23'),
(18, 29, 0, '2024-02-16 16:59:52'),
(19, 29, 1, '2024-02-16 17:00:00'),
(20, 29, 0, '2024-02-16 17:00:12'),
(21, 29, 1, '2024-02-16 17:00:19'),
(22, 29, 0, '2024-02-16 17:10:20'),
(23, 29, 1, '2024-02-16 17:10:28'),
(24, 26, 1, '2024-02-20 13:06:02'),
(25, 26, 1, '2024-02-20 13:28:54'),
(26, 26, 0, '2024-02-20 13:29:05'),
(27, 26, 1, '2024-02-20 13:31:44'),
(28, 26, 0, '2024-02-20 13:31:47'),
(29, NULL, 1, '2024-02-20 13:44:36'),
(30, 24, 1, '2024-02-20 14:10:18'),
(31, 24, 0, '2024-02-20 14:10:32'),
(32, 31, 1, '2024-02-20 14:45:42'),
(33, 31, 0, '2024-02-20 14:45:47'),
(34, 31, 1, '2024-02-20 14:46:53'),
(35, 31, 0, '2024-02-20 14:49:24');

-- --------------------------------------------------------

--
-- Table structure for table `posisi`
--

CREATE TABLE `posisi` (
  `id` int(10) UNSIGNED NOT NULL,
  `posisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posisi`
--

INSERT INTO `posisi` (`id`, `posisi`) VALUES
(1, 'Warga'),
(2, 'Kepala Keluarga'),
(3, 'Ketua RT'),
(4, 'Ketua RW'),
(5, 'Sekertaris RT'),
(6, 'Bendahara RW'),
(7, 'Sekertaris RW'),
(8, 'Bendahara RT'),
(9, 'Wakil RW'),
(10, 'Wakil RT');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `warga_id` int(10) UNSIGNED DEFAULT NULL,
  `email_verify_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `email`, `username`, `password`, `warga_id`, `email_verify_token`, `created_at`) VALUES
(1, 'fenwfn', 'wejfnwfjwen', 'fwejfbwhjfb', NULL, NULL, '2024-02-10 07:21:19'),
(2, 'fenwfn', 'wejfdasnwfjwen', 'fwejfbwhjfb', NULL, NULL, '2024-02-10 07:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `fcm_token` varchar(255) DEFAULT NULL,
  `reset_password_token` varchar(255) DEFAULT NULL,
  `warga_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `created_at`, `updated_at`, `is_active`, `fcm_token`, `reset_password_token`, `warga_id`) VALUES
(1, 'email@example.com', 'user', '$2y$10$pN/kjcg0YQKqbRl7Yr5bXe9OMQu21mH0Z5QwI5C3RzVZqVvTkh8H.', '2024-02-09 14:45:39', NULL, 0, NULL, NULL, 2),
(24, 'editdbrkntd12@gmail.com', 'Rayhana', '$2y$10$CfHZDeETG2I2CKWQHbaJKuPa30McGkP/maO90peVMTLBpy2dHMzoO', '2024-02-10 07:45:19', '2024-02-20 08:10:10', 1, NULL, 'fa005556e576a69772d155a4eb4d0862', 4),
(26, 'elektro1ktp@gmail.com', 'ViviD5.5', '$2y$10$0PMafIXJ6mmBt3v5Iss6ceuLY0i80IwvDkpZWCQzwVCz.2v5N1e5K', '2024-02-10 10:48:25', '2024-02-20 07:31:36', 1, NULL, '99b7227e12dd736682d11ec137c3e528', 1),
(29, 'memen@cenah.co.id', 'memen', '$2y$10$LY1bytJe6.dlC7elOMVOoewhl1w9mFOUk/JQRy3jFtNYUB7vw6G/W', '2024-02-16 16:51:39', NULL, 1, NULL, NULL, 3),
(31, 'rayfathur2006@gmail.com', 'Al.bv', '$2y$10$14hbF3Jn4Q.UKV2f0PU/rO/0ClKEvdkYf8mCrHWPQljEo6oE12G2.', '2024-02-20 14:45:19', '2024-02-20 08:46:43', 1, NULL, '619c3825257fd4feefaba0f0361e01a0', 9);

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `id` int(10) UNSIGNED NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kelamin` tinyint(1) NOT NULL COMMENT '"0" for female, and "1" for male',
  `foto` varchar(255) NOT NULL,
  `kewarganegaraan` tinyint(1) NOT NULL COMMENT '"0" for foreigner and "1" for native',
  `pekerjaan` varchar(255) DEFAULT NULL,
  `posisi_id` int(10) UNSIGNED NOT NULL,
  `alamat_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`id`, `nik`, `nama`, `phone`, `tempat_lahir`, `tanggal_lahir`, `kelamin`, `foto`, `kewarganegaraan`, `pekerjaan`, `posisi_id`, `alamat_id`, `created_at`, `updated_at`) VALUES
(1, '1234567890123456', 'Nefertari Vivi', '08127263127', 'Alabasta', '2015-02-18', 0, 'https://th.bing.com/th/id/OIP.JujkWRpIDSXcvF6EtGMoNAHaHa?rs=1&pid=ImgDetMain', 1, 'Bounty Hunter', 1, 9, '2024-02-09 16:27:30', NULL),
(2, '9876543210987654', 'Trafalgar D. Water Law', '0193291238', 'North Blue', '2024-02-01', 1, 'https://th.bing.com/th/id/OIP.6vocep1638e8DtEILINSMgHaHE?rs=1&pid=ImgDetMain', 0, 'Swordsman', 3, 4, '2024-02-09 16:27:30', NULL),
(3, '0099627128361940', 'Nami', '0823183821', 'Bandung', '2006-09-06', 0, 'https://th.bing.com/th/id/OIP.88Z6iVh1o5Un74m_09Qi6AHaHa?rs=1&pid=ImgDetMain', 1, 'Scientist', 2, 2, '2024-02-12 11:54:37', NULL),
(4, '0039617128331340', 'Viola', '0829153821', 'Jakarta', '2006-12-06', 0, 'storage/viola-20240220025532.jpg', 1, 'Balerian', 4, 3, '2024-02-12 11:59:12', NULL),
(5, '1099627178341949', 'Roronoa Zoro', '0823183821', 'Papua', '2002-02-20', 1, 'storage/roronoa-zoro-20240216085117.jpg', 0, 'Pirates', 5, 11, '2024-02-12 11:59:12', NULL),
(9, '1122334455667788', 'Muhammad D. Rayhan Fathurrakhman', '081224018624', 'bandung', '2024-02-20', 0, 'storage/muhammad-d-rayhan-fathurrakhman-20240220023550.jpg', 1, 'Pengusaha Sukses', 1, 12, '2024-02-20 13:35:50', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `admin_ibfk_1` (`warga_id`);

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aspirasi`
--
ALTER TABLE `aspirasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `balasan`
--
ALTER TABLE `balasan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `balasan_ibfk_1` (`aspirasi_id`),
  ADD KEY `balasan_ibfk_2` (`pengguna_id`);

--
-- Indexes for table `emergencies_log`
--
ALTER TABLE `emergencies_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emergencies_log_ibfk_1` (`alamat_id`),
  ADD KEY `emergencies_log_ibfk_2` (`user_id`);

--
-- Indexes for table `jadwal_ronda`
--
ALTER TABLE `jadwal_ronda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warga_id` (`warga_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_ibfk_1` (`user_id`);

--
-- Indexes for table `log_history`
--
ALTER TABLE `log_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_history_ibfk_1` (`user_id`);

--
-- Indexes for table `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD KEY `register_ibfk_1` (`warga_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `users_ibfk_1` (`warga_id`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD KEY `posisi_id` (`posisi_id`),
  ADD KEY `warga_ibfk_1` (`alamat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `aspirasi`
--
ALTER TABLE `aspirasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `balasan`
--
ALTER TABLE `balasan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `emergencies_log`
--
ALTER TABLE `emergencies_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jadwal_ronda`
--
ALTER TABLE `jadwal_ronda`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `log_history`
--
ALTER TABLE `log_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `posisi`
--
ALTER TABLE `posisi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `warga`
--
ALTER TABLE `warga`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`warga_id`) REFERENCES `warga` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `balasan`
--
ALTER TABLE `balasan`
  ADD CONSTRAINT `balasan_ibfk_1` FOREIGN KEY (`aspirasi_id`) REFERENCES `aspirasi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `balasan_ibfk_2` FOREIGN KEY (`pengguna_id`) REFERENCES `admin` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `emergencies_log`
--
ALTER TABLE `emergencies_log`
  ADD CONSTRAINT `emergencies_log_ibfk_1` FOREIGN KEY (`alamat_id`) REFERENCES `alamat` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `emergencies_log_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `jadwal_ronda`
--
ALTER TABLE `jadwal_ronda`
  ADD CONSTRAINT `jadwal_ronda_ibfk_1` FOREIGN KEY (`warga_id`) REFERENCES `warga` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `log_history`
--
ALTER TABLE `log_history`
  ADD CONSTRAINT `log_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `register_ibfk_1` FOREIGN KEY (`warga_id`) REFERENCES `warga` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`warga_id`) REFERENCES `warga` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `warga`
--
ALTER TABLE `warga`
  ADD CONSTRAINT `warga_ibfk_1` FOREIGN KEY (`alamat_id`) REFERENCES `alamat` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `warga_ibfk_2` FOREIGN KEY (`posisi_id`) REFERENCES `posisi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
