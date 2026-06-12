-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2026 at 12:39 AM
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
-- Database: `fenty_beauty_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `description`, `image_url`) VALUES
(1, 'Pro Filt\'r Foundation', 'Makeup', 40.00, 'Soft matte, longwear foundation with buildable medium-to-full coverage.', 'images/f1.jpg'),
(2, 'Cheeks Out Cream Blush', 'Makeup', 28.00, 'Light-as-air, non-greasy cream blush that melts into skin.', 'images/b1.avif'),
(3, 'Sun Stalk\'r Bronzer', 'Makeup', 35.00, 'Longwear, transfer-resistant powder bronzer in groundbreaking shades.', 'images/b2.jpg'),
(4, 'Icon Lip Liner', 'Makeup', 22.00, 'Creamy, long-lasting lip liner that shapes and defines with rich color.', 'images/l1.jpg'),
(5, 'Gloss Bomb Universal Lip Luminizer', 'Makeup', 21.00, 'The ultimate gotta-have-it lip gloss with explosive shine.', 'images/g1.jpg'),
(6, 'Flash Nap Eye Gel-Cream', 'Skincare', 32.00, 'Cooling gel-cream that brightens, soothes, and reduces puffiness.', 'images/e1.jpg'),
(7, 'Hydra Vizor SPF 30', 'Skincare', 38.00, '2-in-1 sunscreen-moisturizer that protects and brightens skin.', 'images/s1.jpg'),
(8, 'Plush Puddin\' Lip Treatment', 'Skincare', 22.00, 'Intensive lip mask that coats lips with moisture for a plumper look.', 'images/i1.webp\r\n'),
(9, 'Butta Drop Body Moisturizer', 'Skincare', 44.00, 'Delicious whipped oil body cream loaded with rich butters.', 'images/m1.jpg'),
(10, 'Total Cleans\'r Moisturizer', 'Skincare', 26.00, 'Deep clean, makeup-removing cleanser that doesn\'t dry skin.', 'images/k.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'Ilma', 'Terstena', 'Ilma1', 'ilma@gmail.com', '$2y$10$WkUfESRkIWCMEu3un6o2Ie2gYSV7TYnh6WHgUIHhgxCVUmFkBaBQa', '2026-06-04 23:24:59'),
(4, 'meli', 'gashi', 'meli1', 'meli@gmail.com', '$2y$10$OO9QfLyLhJTXIl8Jwv9NEOPc6oLslUGiDJv2.WTbeMnJ1gu5ay0IC', '2026-06-12 22:32:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
