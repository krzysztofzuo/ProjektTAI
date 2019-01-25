-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Sty 2019, 10:36
-- Wersja serwera: 10.1.37-MariaDB
-- Wersja PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `projekttai`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `user` varchar(20) COLLATE utf8mb4_polish_ci NOT NULL,
  `pass` varchar(256) COLLATE utf8mb4_polish_ci NOT NULL,
  `imie` varchar(40) COLLATE utf8mb4_polish_ci NOT NULL,
  `nazwisko` varchar(40) COLLATE utf8mb4_polish_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_polish_ci NOT NULL,
  `miasto` varchar(40) COLLATE utf8mb4_polish_ci NOT NULL,
  `adres` varchar(40) COLLATE utf8mb4_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `user`, `pass`, `imie`, `nazwisko`, `email`, `miasto`, `adres`) VALUES
(1, 'Krzysiek', '$2y$10$MtxWwNVuIGQyEjNSMHrZqesPzL9Rc/CDHM3VzsOD4IfeHGioyC2B2', 'Krzysiek', 'Ciolek', 'k.ciolek9@gmail.com', 'Lublin', 'Tarasowa 3'),
(6, 'Tomek', '$2y$10$tSTA69aZxwAnAVGSFZipweSvEauKvYTF4Aiefb2N61orRZGkrZ3Uu', 'Tomasz', 'Kowalski', 'tomek@onet.pl', 'Lublin', 'Fiolkowa 3/4'),
(7, 'Barbara', '$2y$10$tOPvLbWH7J13mk948F8CKe7x0QqcLaYSj8j3jwHz1Mb7PxZxNzUtu', 'Barbara', 'Szymkowiak', 'barbara@gmail.com', 'Warszawa', 'Wawa 2/3'),
(8, 'Stefan', '$2y$10$Ua39brs6NUFwuybKyLbtbORmCy.vNd5zdL.zS8t3Q4HUA6PsdTFIy', 'Stefan', 'Stefanski', 'stefanski@onet.pl', 'Poznan', 'Poznanska 3/4'),
(9, 'Patryk', '$2y$10$S7wJEkL4JkIYCwsL6/XI9.SbMyE0OFPHC7kWAVVQV3x1LUZGtf/VK', 'Patryk', 'Nowak', 'patryk@gmail.com', 'Warszawa', 'Zimna 6/7'),
(10, 'Mateusz', '$2y$10$Vuw/obraPGUNQK5qeAZuqegAjCehsqTKoQV8KCbJqMxfh8.MQoXou', 'Mateusz', 'Kowalski', 'mati@onet.pl', 'Gdynia', 'Boczna 7'),
(11, 'Monika', '$2y$10$YEHik4ipkMKhWhVgdOrO/.fopJAvre79JbRaDya3ajN8Szya6Kt1u', 'Monika', 'Bartczak', 'monia@o2.pl', 'Zakopane', 'Dolna 19'),
(12, 'Tadeusz', '$2y$10$Wm39fO10yiGXfsVfnQxXTeaq5MsSmiH9PyqVimQQ/ij34DZBxtxiC', 'Tadeusz', 'Norek', 'norek@kanal.pl', 'Warszawa', 'kanalowa 7');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
