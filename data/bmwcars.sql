-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Sty 2016, 08:12
-- Wersja serwera: 10.1.9-MariaDB
-- Wersja PHP: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `bmwcars`
--
CREATE DATABASE IF NOT EXISTS `bmwcars` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `bmwcars`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `samochod`
--

CREATE TABLE IF NOT EXISTS `samochod` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `rocznik` year(4) NOT NULL,
  `pojemnosc` int(11) NOT NULL,
  `cena` decimal(10,2) NOT NULL,
  `zdjecie1` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `zdjecie2` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `zdjecie3` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `zdjecie4` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `miniatura` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `opis` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
