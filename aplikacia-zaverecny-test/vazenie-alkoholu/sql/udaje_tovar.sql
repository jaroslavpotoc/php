-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: localhost
-- Čas generovania: St 28.Jún 2023, 13:13
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
  `vypocet_1` decimal(10,2) GENERATED ALWAYS AS (`cela_flasa` - `prazdna_flasa`) STORED,
  `delene_1` decimal(10,2) DEFAULT NULL,
  `vaha_jednej_davky` decimal(10,4) GENERATED ALWAYS AS (`vypocet_1` / `delene_1`) STORED,
  `datum` date NOT NULL,
  `cas` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='udaje_flias';

--
-- Sťahujem dáta pre tabuľku `udaje_tovar`
--

INSERT INTO `udaje_tovar` (`id`, `ean_kod`, `nazov`, `merna_jednotka`, `cela_flasa`, `prazdna_flasa`, `delene_1`, `datum`, `cas`) VALUES
(1, '5029578000972', 'Old Jamaica Ginger Beer 0,33l', 'ks', NULL, NULL, NULL, '2023-06-27', '02:29:16'),
(2, '05449000216915', 'Cappy 0,25l', 'ks', NULL, NULL, NULL, '2023-06-27', '02:20:06'),
(3, '05449000000002', 'Coca Cola 0,2l', 'ks', NULL, NULL, NULL, '2023-06-27', '02:23:49'),
(4, '90495090', 'Fanta 0,2l ', 'ks', NULL, NULL, NULL, '2023-06-27', '02:23:53'),
(5, '05449000003003', 'Sprite 0,2l ', 'ks', NULL, NULL, NULL, '2023-06-27', '02:23:58'),
(6, '05449000015914', 'Kinley Tonic 0,25l', 'ks', NULL, NULL, NULL, '2023-06-27', '02:24:03'),
(7, '09000311061616', 'Romerquelle 0,33l', 'ks', NULL, NULL, NULL, '2023-06-27', '02:24:13'),
(8, '90399831', 'Romerquelle Lemongrass 0,33l', 'ks', NULL, NULL, NULL, '2023-06-27', '02:24:55'),
(9, '09000311050429', 'Romerquelle 0,75l', 'ks', NULL, NULL, NULL, '2023-06-27', '02:25:09'),
(10, '9002490100070', 'Red Bull 0,25l', 'ks', NULL, NULL, NULL, '2023-06-27', '02:25:35'),
(11, '8594404001326', 'Birell (Pomelo-Grep) 0° 0,33l', 'ks', NULL, NULL, NULL, '2023-06-27', '02:26:58'),
(12, '75032814', 'Corona Extra 11° 0,355l', 'ks', NULL, NULL, NULL, '2023-06-27', '02:01:28'),
(13, '05000213000588', 'Guinness Extra 10° 0,33l', 'ks', NULL, NULL, NULL, '2023-06-27', '02:27:10'),
(14, '5942070003633', 'Stella Artois 12° 0,33l', 'ks', NULL, NULL, NULL, '2023-06-27', '02:27:20'),
(15, '8593868001750', 'Stella Artois Nealko 0° 0,33l', 'ks', NULL, NULL, NULL, '2023-06-27', '02:27:24'),
(16, '8588008256411', 'Muller Thurgau - Fresh Tajna 0,75l', 'l', 1240, 500, 7.50, '2023-06-27', '02:27:29'),
(17, '8588005500838', 'Víno Rozlievané Ružové 0,75l', 'l', 1290, 550, 7.50, '2023-06-27', '02:27:34'),
(18, '8588004339118', 'Repa Winery - Pinot Pink Jeruzalem 0,75', 'l', 1163, 430, 7.50, '2023-06-27', '02:27:38'),
(19, '8586000542402', 'Víno Rozlievané Červené 0,75l', 'l', 1246, 515, 7.50, '2023-06-27', '02:27:42'),
(20, '7804330311101', 'Santa Rita - Cabernet Sauvignon 120 0,75l', 'l', 1246, 515, 7.50, '2023-06-27', '02:23:45'),
(21, '9005511030875', 'Repa Winery - Veltlínske zelené 0,75l', 'l', 1184, 452, 7.50, '2023-06-27', '02:23:16'),
(22, '8586017800311', 'Velkeer - Tri ruže 0,75l', 'l', 1220, 482, 7.50, '2023-06-27', '02:22:48'),
(23, '7804320306360', 'Karu - Merlot 2015 0,75l ', 'l', 1168, 430, 7.50, '2023-06-27', '02:19:50'),
(24, '8588007142067', 'Miluron 0,75l', 'l', 1236, 485, 7.50, '2023-06-27', '02:16:44'),
(26, '8016861168294', 'Masottina - Superiore DOCG Brut 0,75l ', 'ks', NULL, NULL, NULL, '2023-06-27', '02:22:17'),
(27, '8016861173120', 'Masottina - R.D.O. Ponente DOCG 2020 Brut 0,75l', 'ks', NULL, NULL, NULL, '2023-06-27', '02:19:39'),
(28, '8016861168386', 'Masottina - Calmaggiore DOC Treviso Extra Dry 0,75l', 'l', 1550, 794, 7.50, '2023-06-27', '01:00:18'),
(29, '8016861153870', 'Colle del Principe 0,75l  0,75l', 'l', 1366, 619, 7.50, '2023-06-26', '23:38:40'),
(30, '7312040017034', 'Absolut Vodka 1l', 'l', 1612, 662, 25.00, '2023-06-26', '22:58:59'),
(31, '7312040211012', 'Absolut Elyx 1l', 'l', 1818, 872, 25.00, '2023-06-26', '23:54:58'),
(32, '7312040090105', 'Absolut Citron 1l', 'l', 1614, 664, 25.00, '2023-06-27', '14:36:16'),
(33, '7312040151004', 'Absolut Pears 1l', 'l', 1608, 656, 25.00, '2023-06-28', '00:50:07'),
(34, '7312040020102', 'Absolut Kurant 1l', 'l', 1607, 650, 25.00, '2023-06-28', '01:15:49'),
(35, '7312040050109', 'Absolut Mandrin 1l', 'l', 1600, 645, 25.00, '2023-06-28', '01:22:12'),
(36, '7312040040100', 'Absolut Raspberri 1l', 'l', 1600, 650, 25.00, '2023-06-28', '12:34:04'),
(37, '7312040060108', 'Absolut Vanilia 1l', 'l', 1600, 647, 25.00, '2023-06-28', '12:37:17'),
(38, '7312040014040', 'Absolut 100 1l', 'l', 1585, 655, 25.00, '2023-06-28', '12:38:16'),
(39, '80480280017', 'Grey Goose 1l', '', 1786, 858, 25.00, '2023-06-28', '12:40:07'),
(40, '4603400000937', 'Russian Standard Gold 1l', 'l', 1816, 861, 25.00, '2023-06-28', '12:41:54'),
(41, '8586005331605', 'Double Cross 0,7l', 'l', 2006, 1351, 17.50, '2023-06-28', '12:42:32'),
(42, '7312040011506', 'Absolut Vodka 1,5l', 'ks', NULL, NULL, NULL, '2023-06-28', '12:43:07'),
(43, '7312040014507', 'Absolut Vodka 4,5l', 'ks', NULL, NULL, NULL, '2023-06-28', '12:43:07'),
(44, '8594005019485', 'Božkov Republica Exclusive 0,7l', 'l', 1205, 535, 17.50, '2023-06-28', '12:46:50');

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
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `udaje_tovar`
--
ALTER TABLE `udaje_tovar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
