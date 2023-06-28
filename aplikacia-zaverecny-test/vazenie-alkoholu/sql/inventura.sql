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
-- Štruktúra tabuľky pre tabuľku `inventura`
--

CREATE TABLE `inventura` (
  `tovar` varchar(255) NOT NULL,
  `merna_jednotka` enum('ks','kg','l','') NOT NULL,
  `pocitatocny_stav` decimal(3,2) DEFAULT NULL,
  `prijem` decimal(3,2) DEFAULT NULL,
  `vydaj` decimal(3,2) DEFAULT NULL,
  `spolu` decimal(3,2) DEFAULT NULL,
  `cele_flase` int(11) DEFAULT NULL,
  `otvorene_flase` int(11) DEFAULT NULL,
  `konecny_stav` decimal(3,2) DEFAULT NULL,
  `predaj_podla_plu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `inventura`
--
ALTER TABLE `inventura`
  ADD UNIQUE KEY `tovar` (`tovar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
