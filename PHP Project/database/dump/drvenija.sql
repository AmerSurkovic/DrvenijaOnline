-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2017 at 08:35 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drvenija`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `school` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `subject` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `year_published` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `exchange_option` int(11) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `school`, `subject`, `year_published`, `state`, `price`, `exchange_option`, `user`) VALUES
(1, 'Udzbenik', 'Srednja', 'Matematika', 1994, 0, 15, 1, 1),
(2, 'Radna sveska', 'Osnovna', 'Biologija', 2012, 0, 16, 0, 3),
(3, 'Udzbenik 2. razred', 'Osnovna', 'Moja okolina', 2015, 0, 13, 1, 3),
(30, 'Vene II', 'Srednja', 'Matematika', 1995, 0, 20, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text COLLATE utf8_slovenian_ci NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user`) VALUES
(1, 'Odlicna stranica. Samo da su malo jeftinije knjige. LP', 1),
(5, 'Popravite prodaju knjige, ne valja nista...', 33),
(6, 'Ja bih kupio ovo za 300,000KM!', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `surname` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `phone_number` varchar(15) COLLATE utf8_slovenian_ci NOT NULL,
  `location` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `phone_number`, `location`, `username`, `email`, `password`) VALUES
(1, 'Amer', 'Surkovic', '061-111-111', 'Sarajevo', 'Amer', 'amer@drvenija.ba', 'amerwt'),
(3, 'Ibro', 'Ibrica', '062-222-222', 'Brcko', 'IbricaWT', 'ibrica@test.com', 'ibrowt'),
(32, 'Mehudin', 'Mehica', '063-333-333', 'Mostar', 'Most', 'pobjednik@mostar.com', 'mehowt'),
(33, 'Igor', 'Igorovic', '061-111-111', 'Sarajevo', 'IgorWT', 'igor@igor.com', 'igorwt'),
(34, 'Izudin', 'Bajrovic', '065-555-555', 'Konjic', 'IzudinWT', 'izo@banja.com', 'izudinwt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
