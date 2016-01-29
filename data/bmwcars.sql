-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 29 Sty 2016, 15:57
-- Wersja serwera: 10.1.9-MariaDB
-- Wersja PHP: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Baza danych: `bmwcars`
--
CREATE DATABASE IF NOT EXISTS `bmwcars` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `bmwcars`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `samochod`
--

CREATE TABLE `samochod` (
  `id` int(11) NOT NULL,
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
  `przebieg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `samochod`
--
ALTER TABLE `samochod`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `samochod`
--
ALTER TABLE `samochod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;