-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 07. jan 2020 ob 11.00
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
-- Struktura tabele `transactions`
--

CREATE TABLE `transactions` (
  `id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Odloži podatke za tabelo `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `user_name`, `user_lastname`, `product`, `amount`, `currency`, `status`, `created_at`) VALUES
('ch_1FyDt4K8LlqsZnAm2kFSAzDN', '6', '', '', 'Knjiga #2', '2485', 'eur', 'succeeded', '2020-01-07 09:58:10'),
('ch_1FyDvaK8LlqsZnAmRS0E6r1U', '1', '', '', 'Knjiga #2', '2485', 'eur', 'succeeded', '2020-01-07 10:00:46'),
('ch_1FyDzKK8LlqsZnAmcHoJWlMs', 'Nejc', 'Nejc', 'Hauptman', 'Knjiga #2', '2485', 'eur', 'succeeded', '2020-01-07 10:04:37'),
('ch_1FyEeyK8LlqsZnAm7gVgUGKr', '7', 'Nejc Hauptman', 'Hauptman', 'Knjiga #3', '2585', 'eur', 'succeeded', '2020-01-07 10:47:39'),
('ch_1FyEgKK8LlqsZnAmqF7MapFK', '6', 'Nejc', 'Hauptman', 'Knjiga #4', '2685', 'eur', 'succeeded', '2020-01-07 10:49:04'),
('ch_1FyEhnK8LlqsZnAmym9CrEc4', '6', 'Nejc', 'Hauptman', 'Knjiga #4', '2685', 'eur', 'succeeded', '2020-01-07 10:50:35'),
('ch_1FyEiWK8LlqsZnAm89QEtKf5', '6', 'Nejc', 'Hauptman', 'Knjiga #4', '2685', 'eur', 'succeeded', '2020-01-07 10:51:19'),
('ch_1FyEk7K8LlqsZnAmd86wTFqe', '6', 'Nejc', 'Hauptman', 'Knjiga #4', '2685', 'eur', 'succeeded', '2020-01-07 10:52:58'),
('ch_1FyEoBK8LlqsZnAm9ujjU3Lb', '6', 'Nejc', 'Hauptman', 'Knjiga #2', '2485', 'eur', 'succeeded', '2020-01-07 10:57:10'),
('ch_1FyEpqK8LlqsZnAm6nPed42T', '6', 'Nejc', 'Hauptman', 'Knjiga #2', '2485', 'eur', 'succeeded', '2020-01-07 10:58:54'),
('ch_1FyEqFK8LlqsZnAmvsoExvEz', '6', 'Nejc', 'Hauptman', 'Knjiga #2', '2485', 'eur', 'succeeded', '2020-01-07 10:59:19'),
('ch_1FyErBK8LlqsZnAmT8vCoMLs', '7', 'Nejc Hauptman', 'Hauptman', 'Knjiga #1', '2385', 'eur', 'succeeded', '2020-01-07 11:00:16'),
('ch_1FyEWsK8LlqsZnAma2j4Rllm', '6', 'Nejc', 'Hauptman', 'Knjiga #1', '2385', 'eur', 'succeeded', '2020-01-07 10:39:18');

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
