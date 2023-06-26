-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: localhost
-- Čas generovania: Po 26.Jún 2023, 23:36
-- Verzia serveru: 10.4.28-MariaDB
-- Verzia PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `vazenie_schema`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `udaje_tovar`
--

CREATE TABLE `udaje_tovar` (
  `id` int(11) NOT NULL,
  `ean_kod` varchar(14) DEFAULT NULL,
  `nazov` varchar(255) NOT NULL,
  `merna_jednotka` enum('ks','kg','l','') NOT NULL,
  `cela_flasa` int(10) DEFAULT NULL,
  `prazdna_flasa` int(10) DEFAULT NULL,
  `vaha_jednej_davky` decimal(10,4) DEFAULT NULL,
  `datum` date NOT NULL,
  `cas` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='udaje_flias';

--
-- Sťahujem dáta pre tabuľku `udaje_tovar`
--

INSERT INTO `udaje_tovar` (`id`, `ean_kod`, `nazov`, `merna_jednotka`, `cela_flasa`, `prazdna_flasa`, `vaha_jednej_davky`, `datum`, `cas`) VALUES
(1, '5029578000972', 'Old Jamaica Ginger Beer 0,33l', 'ks', NULL, NULL, NULL, '2023-06-26', '00:00:00'),
(2, '05449000216915', 'Cappy 0,25l', 'ks', NULL, NULL, NULL, '2023-06-26', '00:00:00'),
(3, '05449000000002', 'Coca Cola 0,2l', 'ks', NULL, NULL, NULL, '2023-06-26', '00:00:00'),
(4, '90495090', 'Fanta 0,2l ', 'ks', NULL, NULL, NULL, '2023-06-26', '00:00:00'),
(5, '05449000003003', 'Sprite 0,2l ', 'ks', NULL, NULL, NULL, '2023-06-26', '00:00:00'),
(6, '05449000015914', 'Kinley Tonic 0,25l', 'ks', NULL, NULL, NULL, '2023-06-26', '00:00:00'),
(7, '09000311061616', 'Romerquelle 0,33l', 'ks', NULL, NULL, NULL, '2023-06-26', '00:00:00'),
(8, '90399831', 'Romerquelle Lemongrass 0,33l', 'ks', NULL, NULL, NULL, '2023-06-26', '00:00:00'),
(9, '09000311050429', 'Romerquelle 0,75l', 'ks', NULL, NULL, NULL, '2023-06-26', '00:00:00'),
(10, '9002490100070', 'Red Bull 0,25l', 'ks', NULL, NULL, NULL, '2023-06-26', '00:00:00'),
(11, '8594404001326', 'Birell (Pomelo-Grep) 0° 0,33l', 'ks', NULL, NULL, NULL, '2023-06-26', '00:00:00'),
(12, '75032814', 'Corona Extra 11° 0,355l', 'ks', NULL, NULL, NULL, '2023-06-26', '00:00:00'),
(13, '05000213000588', 'Guinness Extra 10° 0,33l', 'ks', NULL, NULL, NULL, '2023-06-26', '00:00:00'),
(14, '5942070003633', 'Stella Artois 12° 0,33l', 'ks', NULL, NULL, NULL, '2023-06-26', '00:00:00'),
(15, '8593868001750', 'Stella Artois Nealko 0° 0,33l', 'ks', NULL, NULL, NULL, '2023-06-26', '00:00:00'),
(16, '8588008256411', 'Muller Thurgau - Fresh Tajna 0,75l', 'l', 1240, 500, 98.6667, '2023-06-26', '00:00:00'),
(17, '8588005500838', 'Víno Rozlievané Ružové 0,75l', 'l', 1290, 550, 98.6667, '2023-06-26', '00:00:00'),
(18, '8588004339118', 'Repa Winery - Pinot Pink Jeruzalem 0,75', 'l', 1163, 430, 97.7333, '2023-06-26', '00:00:00'),
(19, '8586000542402', 'Víno Rozlievané Červené 0,75l', 'l', 1246, 515, 97.4667, '2023-06-26', '00:00:00'),
(20, '7804330311101', 'Santa Rita - Cabernet Sauvignon 120 0,75l', 'l', 1246, 515, 97.4667, '2023-06-26', '00:00:00'),
(21, '9005511030875', 'Repa Winery - Veltlínske zelené 0,75l', 'l', 1184, 452, 97.6000, '2023-06-26', '00:00:00'),
(22, '8586017800311', 'Velkeer - Tri ruže 0,75l', 'l', 1220, 482, 98.4000, '2023-06-26', '00:00:00'),
(23, '7804320306360', 'Karu - Merlot 2015 0,75l ', 'l', 1168, 430, 98.4000, '2023-06-26', '00:00:00'),
(24, '8588007142067', 'Miluron 0,75l', 'l', 1236, 485, 100.1333, '2023-06-26', '00:00:00'),
(25, '8588000002399', 'Hubert - De Luxe 0,75l', 'ks', NULL, NULL, NULL, '2023-06-26', '00:00:00'),
(26, '8016861168294', 'Masottina - Superiore DOCG Brut 0,75l ', 'ks', NULL, NULL, NULL, '2023-06-26', '00:00:00'),
(27, '8016861173120', 'Masottina - R.D.O. Ponente DOCG 2020 Brut 0,75l', 'ks', NULL, NULL, NULL, '2023-06-26', '00:00:00'),
(28, '8016861168386', 'Masottina - Calmaggiore DOC Treviso Extra Dry 0,75l', 'l', 1550, 794, 100.8000, '2023-06-26', '00:00:00'),
(29, '8016861153870', 'Colle del Principe 0,75l  0,75l', 'l', 1366, 619, 99.6000, '2023-06-26', '00:00:00'),
(47, '7312040017034', 'Absolut Vodka 1l', 'l', 1612, 662, 38.0000, '2023-06-26', '22:58:59'),
(48, '7312040211012', 'Absolut Elyx 1l', 'l', 1818, 872, 37.8400, '2023-06-26', '23:33:23');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_role` enum('admin','user') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `user_role`) VALUES
(1, 'test', 'test', 'test@test.sk', 'admin'),
(2, 'user', 'user', 'user@user.sk', 'user');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `udaje_tovar`
--
ALTER TABLE `udaje_tovar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nazov` (`nazov`),
  ADD UNIQUE KEY `ean_kod` (`ean_kod`);

--
-- Indexy pre tabuľku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `udaje_tovar`
--
ALTER TABLE `udaje_tovar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pre tabuľku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
