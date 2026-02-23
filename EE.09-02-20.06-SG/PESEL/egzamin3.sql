-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Mar 2023, 15:55
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `egzamin3`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wycieczki`
--

CREATE TABLE `wycieczki` (
  `id` int(10) UNSIGNED NOT NULL,
  `zdjecia_id` int(10) UNSIGNED NOT NULL,
  `dataWyjazdu` date DEFAULT NULL,
  `cel` text DEFAULT NULL,
  `cena` double DEFAULT NULL,
  `dostepna` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Zrzut danych tabeli `wycieczki`
--

INSERT INTO `wycieczki` (`id`, `zdjecia_id`, `dataWyjazdu`, `cel`, `cena`, `dostepna`) VALUES
(1, 2, '2019-09-08', 'Wlochy, Wenecja', 1200, 1),
(2, 2, '2019-09-14', 'Wlochy, Wenecja', 1200, 1),
(3, 4, '2019-08-14', 'Polska, Warszawa', 640, 1),
(4, 6, '2019-08-14', 'Francja, Paryz', 1300, 1),
(5, 6, '2019-07-14', 'Francja, Paryz', 1350, 0),
(6, 6, '2019-09-14', 'Francja, Paryz', 1200, 1),
(7, 8, '2019-07-14', 'Hiszpania, Barcelona', 1500, 0),
(8, 8, '2019-08-14', 'Hiszpania, Barcelona', 1500, 0),
(9, 8, '2019-09-14', 'Hiszpania, Barcelona', 1400, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zdjecia`
--

CREATE TABLE `zdjecia` (
  `id` int(10) UNSIGNED NOT NULL,
  `nazwaPliku` text DEFAULT NULL,
  `podpis` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Zrzut danych tabeli `zdjecia`
--

INSERT INTO `zdjecia` (`id`, `nazwaPliku`, `podpis`) VALUES
(1, '1.jpg', 'Londyn'),
(2, '2.jpg', 'Wenecja'),
(3, '3.jpg', 'Berlin'),
(4, '4.jpg', 'Warszawa'),
(5, '5.jpg', 'Budapeszt'),
(6, '6.jpg', 'Paryz'),
(7, '7.jpg', 'Nowy Jork'),
(8, '8.jpg', 'Barcelona'),
(9, '9.jpg', 'Moskwa');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `wycieczki`
--
ALTER TABLE `wycieczki`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zdjecia`
--
ALTER TABLE `zdjecia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `wycieczki`
--
ALTER TABLE `wycieczki`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `zdjecia`
--
ALTER TABLE `zdjecia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
