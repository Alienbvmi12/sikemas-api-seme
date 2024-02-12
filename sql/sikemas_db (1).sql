-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2024 at 11:42 AM
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
        alamat.provinsi as provinsi,
        alamat.kota as kota,
        alamat.kecamatan as kecamatan,
        alamat.kelurahan as kelurahan,
        alamat.rw as rw,
        alamat.rt as rt,
        alamat.no_rumah as no_rumah,
        alamat.kode_pos as kode_pos 
    from 
    	users 
    left join warga on users.warga_id = warga.id 
    left join alamat on warga.alamat_id = alamat.id 
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
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `id` int(10) UNSIGNED NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `rw` int(3) NOT NULL,
  `rt` int(3) NOT NULL,
  `no_rumah` varchar(50) NOT NULL,
  `kode_pos` int(5) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`id`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `rw`, `rt`, `no_rumah`, `kode_pos`, `created_at`) VALUES
(1, 'Jawa Barat', 'Kabupaten Bandung', 'Pacet', 'Nagrak', 8, 3, 'Blok B3 no.19', 4302, '2024-02-12 02:23:41'),
(2, 'Jawa Barat', 'Kabupaten Bandung', 'Pacet', 'Nagrak', 8, 3, 'Blok B3 no.01', 4302, '2024-02-12 02:26:28'),
(3, 'Jawa Barat', 'Kabupaten Bandung', 'Pacet', 'Nagrak', 8, 3, 'Blok B2 no.02', 4302, '2024-02-12 02:26:28'),
(4, 'Jawa Barat', 'Kabupaten Bandung', 'Pacet', 'Nagrak', 8, 3, 'Blok B1 no.03', 4302, '2024-02-12 02:26:28'),
(5, 'Jawa Barat', 'Kabupaten Bandung', 'Pacet', 'Nagrak', 8, 3, 'Blok B4 no.04', 4302, '2024-02-12 02:26:28'),
(6, 'Jawa Barat', 'Kabupaten Bandung', 'Pacet', 'Nagrak', 8, 3, 'Blok B3 no.17', 4302, '2024-02-12 02:26:28'),
(7, 'Jawa Barat', 'Kabupaten Bandung', 'Pacet', 'Nagrak', 8, 3, 'Blok B2 no.20', 4302, '2024-02-12 02:26:28'),
(8, 'Jawa Barat', 'Kabupaten Bandung', 'Pacet', 'Nagrak', 8, 3, 'Blok B1 no.07', 4302, '2024-02-12 02:26:28'),
(9, 'Jawa Barat', 'Kabupaten Bandung', 'Pacet', 'Nagrak', 8, 4, 'Blok C1 no.03', 4302, '2024-02-12 02:26:28'),
(10, 'Jawa Barat', 'Kabupaten Bandung', 'Pacet', 'Nagrak', 8, 4, 'Blok C2 no.30', 4302, '2024-02-12 02:26:28'),
(11, 'Jawa Barat', 'Kabupaten Bandung', 'Pacet', 'Nagrak', 8, 4, 'Blok C3 no.01', 4302, '2024-02-12 02:27:02'),
(12, 'Jawa Barat', 'Kabupaten Bandung', 'Pacet', 'Nagrak', 8, 4, 'Blok C3 no.13', 4302, '2024-02-12 02:27:02');

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
(26, 26, '5284d46195a12d99c9021cb5c549cd9c', '2024-02-11 14:54:40', NULL);

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
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `fcm_token` varchar(255) DEFAULT NULL,
  `reset_password_token` varchar(255) DEFAULT NULL,
  `warga_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `created_at`, `updated_at`, `deleted_at`, `is_active`, `fcm_token`, `reset_password_token`, `warga_id`) VALUES
(1, 'email@example.com', 'user', '$2y$10$pN/kjcg0YQKqbRl7Yr5bXe9OMQu21mH0Z5QwI5C3RzVZqVvTkh8H.', '2024-02-09 14:45:39', NULL, NULL, 0, NULL, NULL, 2),
(24, 'editdbrkntd12@gmail.com', 'Rayhana', '$2y$10$ClhADd1jr.z6FRYGS2c/0u3TUSHgEgywD8Rumu7pjuo.cwwXHtEbK', '2024-02-10 07:45:19', '2024-02-10 04:26:13', NULL, 1, NULL, '85c10e7cff2e692c05b862ef6481f55e', 1),
(26, 'elektro1ktp@gmail.com', 'ViviD5.5', '$2y$10$f1vdG53m9ooV6qqvSjKGOOQscFr7V6iQks64Bc1JrY8tQoOb3ZmF2', '2024-02-10 10:48:25', '2024-02-11 06:00:40', NULL, 1, NULL, 'a8f964fc8a46e0fb0a7f3fcc939f508a', 1),
(27, 'rayfathur2006@gmail.com', 'Alien_bvmi12', '$2y$10$JNfkMcJc/mWG2EIkQAw5fecY9yMSRiNvxyhDpmJf51eSs4vQeQVxm', '2024-02-11 12:03:56', NULL, NULL, 1, NULL, NULL, 1);

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
  `alamat_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`id`, `nik`, `nama`, `phone`, `tempat_lahir`, `tanggal_lahir`, `kelamin`, `foto`, `kewarganegaraan`, `alamat_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1234567890123456', 'Nefertari Vivi', '08127263127', 'Alabasta', '2015-02-18', 0, 'https://th.bing.com/th/id/OIP.JujkWRpIDSXcvF6EtGMoNAHaHa?rs=1&pid=ImgDetMain', 1, 9, '2024-02-09 16:27:30', NULL, NULL),
(2, '9876543210987654', 'Trafalgar D. Water Law', '0193291238', 'North Blue', '2024-02-01', 1, 'https://th.bing.com/th/id/OIP.6vocep1638e8DtEILINSMgHaHE?rs=1&pid=ImgDetMain', 0, 4, '2024-02-09 16:27:30', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warga_id` (`warga_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD KEY `alamat_id` (`alamat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `warga`
--
ALTER TABLE `warga`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `register_ibfk_1` FOREIGN KEY (`warga_id`) REFERENCES `warga` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`warga_id`) REFERENCES `warga` (`id`);

--
-- Constraints for table `warga`
--
ALTER TABLE `warga`
  ADD CONSTRAINT `warga_ibfk_1` FOREIGN KEY (`alamat_id`) REFERENCES `alamat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
