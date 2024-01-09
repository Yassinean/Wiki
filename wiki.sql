-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2024 at 04:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wiki`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','auteur') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'yassine', 'yassinedubraska@gmail.com', '$2y$10$1bUV/ZOmwAPv6NJGqBfhCeyYs9dTPsh3qgq43S.UT6DK.ukLYTyl.', 'admin'),
(5, 'mohammed', 'mohammed@gmail.com', '$2y$10$Nz2AJzwkr2BBnoZLAeEYfOL7bqrJf3OfZ.yUDQZK2ikT1l3CaXBhS', 'auteur'),
(6, 'mohammed', 'ghollamsimo1@gmail.com', '$2y$10$6HNCleGrzCx3CkJIOhWokuIDXnZ1d/r0Fhp4quFBBSgoDSdRA88cO', 'auteur'),
(8, 'oussama', 'znagui@gmail.com', '$2y$10$u8jfpKqxsbIb0qNcOzyL5.xI94hCL71WZ8KPS7OpLmuodpVNWUeGa', 'auteur'),
(9, 'salah', 'salahdakhamaat@gmail.com', '$2y$10$8eSYowhLmU12HTc5s8KLlOafKimO/CpWXPZafuZsYQVIZeglRgs8m', 'auteur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
