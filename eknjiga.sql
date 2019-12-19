-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 19. dec 2019 ob 10.29
-- Različica strežnika: 10.4.6-MariaDB
-- Različica PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `eknjiga`
--

-- --------------------------------------------------------

--
-- Struktura tabele `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Odloži podatke za tabelo `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `created_at`) VALUES
(32, 5, 'yxcvb', 'yxcvb', '2019-12-17 09:21:56'),
(33, 5, 'yxcvb', 'asdvb', '2019-12-17 20:42:08'),
(34, 5, 'sacdyf', 'sdf', '2019-12-17 20:47:49'),
(35, 5, 'hec', '12324124', '2019-12-19 10:08:57');

-- --------------------------------------------------------

--
-- Struktura tabele `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Odloži podatke za tabelo `products`
--

INSERT INTO `products` (`id`, `user_id`, `title`, `price`, `body`) VALUES
(5, 5, 'MacBookPro', 1999, 'ÄŒe maÅ¡ preveÄ keÅ¡a, kupi'),
(6, 5, 'Huawei P30', 499, 'NajboljÅ¡i telefon na svetu'),
(8, 5, 'Huawei P30 PRO', 799, 'KUPI TO :)');

-- --------------------------------------------------------

--
-- Struktura tabele `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Odloži podatke za tabelo `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `created_at`) VALUES
(5, 'Admin', 'admin', 'admin@eknjiga.si', '$2y$10$pzyVvwOoSoeis7CTmNqJCuFNCOkDnoIxUKXFwzOkBTGEtHzoIv5DG', '2019-12-17 09:20:09'),
(6, 'Nejc', 'Hauptman', 'nejchauptman9@gmail.com', '$2y$10$Acs7J.5xyJzmb6aMMCMW5.AIsJWu.6e21UFeiTIQ8vRw39snfhkb.', '2019-12-17 09:26:11');

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT tabele `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
