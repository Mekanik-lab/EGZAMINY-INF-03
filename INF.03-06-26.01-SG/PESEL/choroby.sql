-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2026 at 06:16 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `choroby`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `choroby`
--

CREATE TABLE `choroby` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(50) DEFAULT NULL,
  `zakazna` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `choroby`
--

INSERT INTO `choroby` (`id`, `nazwa`, `zakazna`) VALUES
(1, 'angina', 'T'),
(2, 'ospa', 'T'),
(3, 'różyczka', 'T'),
(4, 'grypa', 'T'),
(5, 'jelitówka', 'T'),
(6, 'odra', 'T'),
(7, 'świnka', 'T'),
(8, 'reumatyzm', 'N'),
(9, 'cukrzyca', 'N'),
(10, 'nowotwory', 'N'),
(11, 'PTSD', 'N'),
(12, 'POCHP', 'N'),
(13, 'nosówka', 'T'),
(14, 'astma', 'N'),
(15, 'COVID-19', 'T'),
(16, 'Kavasaki', 'N');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `choroby_objawy`
--

CREATE TABLE `choroby_objawy` (
  `id_choroby` int(11) NOT NULL,
  `id_objawy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `choroby_objawy`
--

INSERT INTO `choroby_objawy` (`id_choroby`, `id_objawy`) VALUES
(1, 2),
(1, 3),
(1, 5),
(1, 14),
(2, 3),
(2, 5),
(2, 12),
(3, 3),
(3, 12),
(3, 14),
(4, 1),
(4, 3),
(4, 4),
(4, 5),
(4, 9),
(4, 10),
(4, 19),
(5, 3),
(5, 5),
(5, 6),
(5, 7),
(5, 8),
(6, 2),
(6, 3),
(6, 9),
(6, 10),
(6, 12),
(6, 27),
(7, 1),
(7, 3),
(7, 5),
(7, 14),
(8, 4),
(8, 24),
(8, 25),
(9, 5),
(9, 17),
(9, 18),
(9, 23),
(10, 5),
(10, 23),
(11, 21),
(11, 22),
(12, 5),
(12, 10),
(12, 13),
(13, 3),
(13, 6),
(13, 8),
(13, 9),
(13, 10),
(13, 11),
(14, 10),
(14, 13),
(14, 20),
(15, 1),
(15, 2),
(15, 3),
(15, 4),
(15, 5),
(15, 6),
(15, 7),
(15, 8),
(15, 9),
(15, 10),
(15, 11),
(15, 15),
(15, 16),
(16, 3),
(16, 12),
(16, 14),
(16, 26);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `objawy`
--

CREATE TABLE `objawy` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `objawy`
--

INSERT INTO `objawy` (`id`, `nazwa`) VALUES
(1, 'ból głowy'),
(2, 'ból gardła'),
(3, 'gorączka'),
(4, 'bóle stawów'),
(5, 'osłabienie'),
(6, 'mdłości'),
(7, 'rozwolnienie'),
(8, 'wymioty'),
(9, 'katar'),
(10, 'kaszel'),
(11, 'drgawki'),
(12, 'wysypka'),
(13, 'duszności'),
(14, 'powiększone węzły chłonne'),
(15, 'utrata węchu'),
(16, 'utrata smaku'),
(17, 'wzmożone pragnienie'),
(18, 'częste oddawanie moczu'),
(19, 'dreszcze'),
(20, 'ból w klatce piersiowej'),
(21, 'koszmary senne'),
(22, 'nawracające wspomnienia'),
(23, 'nagła utrata wagi'),
(24, 'obrzęk stawów'),
(25, 'sztywność poranna'),
(26, 'malinowy język'),
(27, 'łzawienie oczu');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `choroby`
--
ALTER TABLE `choroby`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `choroby_objawy`
--
ALTER TABLE `choroby_objawy`
  ADD PRIMARY KEY (`id_choroby`,`id_objawy`),
  ADD KEY `id_objawy` (`id_objawy`);

--
-- Indeksy dla tabeli `objawy`
--
ALTER TABLE `objawy`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `choroby_objawy`
--
ALTER TABLE `choroby_objawy`
  ADD CONSTRAINT `choroby_objawy_ibfk_1` FOREIGN KEY (`id_choroby`) REFERENCES `choroby` (`id`),
  ADD CONSTRAINT `choroby_objawy_ibfk_2` FOREIGN KEY (`id_objawy`) REFERENCES `objawy` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
