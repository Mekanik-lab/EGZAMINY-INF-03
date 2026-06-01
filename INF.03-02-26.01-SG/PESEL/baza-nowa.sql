-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sty 13, 2026 at 04:51 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bazar`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sklep`
--

CREATE TABLE `sklep` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(20) DEFAULT NULL,
  `wlasciciel` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `sklep`
--

INSERT INTO `sklep` (`id`, `nazwa`, `wlasciciel`) VALUES
(1, 'U Gosi', 'Małgorzata Nowak'),
(2, 'Warzywniak u Edzia', 'Edward Wiśniewski'),
(3, 'Eko-Bazar', 'Jan Kowalski');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `towar`
--

CREATE TABLE `towar` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(20) DEFAULT NULL,
  `rodzaj` varchar(10) DEFAULT NULL,
  `cena` decimal(20,2) DEFAULT NULL,
  `plik` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `towar`
--

INSERT INTO `towar` (`id`, `nazwa`, `rodzaj`, `cena`, `plik`) VALUES
(1, 'Jabłka Lobo', 'owoc', 3.50, 'jablko.png'),
(2, 'Gruszka Konferencja', 'owoc', 5.20, 'gruszka.png'),
(3, 'Banan', 'owoc', 1.80, 'banan.png'),
(4, 'Ananas', 'owoc', 2.50, 'ananas.png'),
(5, 'Sliwka', 'owoc', 3.00, 'sliwka.png'),
(6, 'Winogrono', 'owoc', 12.00, 'winogrono.png'),
(7, 'Borówka', 'owoc', 4.50, 'borowka.png'),
(8, 'Malina', 'sypkie', 6.00, 'malina.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienie`
--

CREATE TABLE `zamowienie` (
  `id` int(11) NOT NULL,
  `id_towar` int(11) DEFAULT NULL,
  `id_sklep` int(11) DEFAULT NULL,
  `liczba_kg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `zamowienie`
--

INSERT INTO `zamowienie` (`id`, `id_towar`, `id_sklep`, `liczba_kg`) VALUES
(1, 1, 1, 50),
(2, 3, 2, 100),
(3, 6, 3, 15),
(4, 4, 1, 30),
(5, 1, 3, 5);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `sklep`
--
ALTER TABLE `sklep`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `towar`
--
ALTER TABLE `towar`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zamowienie`
--
ALTER TABLE `zamowienie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_towar` (`id_towar`),
  ADD KEY `id_sklep` (`id_sklep`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sklep`
--
ALTER TABLE `sklep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `towar`
--
ALTER TABLE `towar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `zamowienie`
--
ALTER TABLE `zamowienie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `zamowienie`
--
ALTER TABLE `zamowienie`
  ADD CONSTRAINT `zamowienie_ibfk_1` FOREIGN KEY (`id_towar`) REFERENCES `towar` (`id`),
  ADD CONSTRAINT `zamowienie_ibfk_2` FOREIGN KEY (`id_sklep`) REFERENCES `sklep` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
