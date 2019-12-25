-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 31 Sie 2019, 16:30
-- Wersja serwera: 10.1.38-MariaDB
-- Wersja PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `lib2`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `assigment`
--

CREATE TABLE `assigment` (
  `id_assigment` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expire` datetime NOT NULL,
  `returned` datetime DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_book` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `author`
--

CREATE TABLE `author` (
  `id_author` int(11) NOT NULL,
  `author` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `author`
--

INSERT INTO `author` (`id_author`, `author`) VALUES
(10, 'George R.R. Martin'),
(26, 'Jim Butcher'),
(27, 'J.K. Rowling'),
(28, 'Anne Rice'),
(29, 'Harris Graysmith'),
(30, 'Adam Mickiewicz');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `book`
--

CREATE TABLE `book` (
  `id_book` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_polish_ci NOT NULL,
  `summary` text COLLATE utf8mb4_polish_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `arch` tinyint(1) DEFAULT NULL,
  `descr` text COLLATE utf8mb4_polish_ci,
  `id_author` int(11) NOT NULL,
  `id_genre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `book`
--

INSERT INTO `book` (`id_book`, `title`, `summary`, `date`, `arch`, `descr`, `id_author`, `id_genre`) VALUES
(5, 'Gra o Tron', '  O rodzie Starków', '2019-05-18 10:43:51', NULL, NULL, 10, 2),
(16, 'Zdrajca', 'O kowboju, który szuka zemsty... ', '2019-07-26 13:06:16', NULL, NULL, 26, 18),
(17, 'Harry Potter i Zakon Feniksa', ' O czarodzieju', '2019-07-26 13:08:43', NULL, NULL, 27, 19),
(18, 'Wywiad z wampirem', 'O wampirkach ', '2019-07-26 13:09:32', NULL, NULL, 28, 20),
(19, 'Milczenie owiec', 'O detektywie ', '2019-07-26 13:10:53', NULL, NULL, 29, 21),
(20, 'Dziady część III', '  Dramat opisuje wydarzenia, które nastąpiły w latach 1820-1823, chociaż główna część utworu to wypadki mające miejsce w 1823 roku.&#13;&#10;', '2019-07-26 13:11:29', NULL, NULL, 30, 22);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `genre` text COLLATE utf8mb4_polish_ci NOT NULL,
  `arch` int(11) DEFAULT NULL,
  `descr` text COLLATE utf8mb4_polish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `genre`
--

INSERT INTO `genre` (`id_genre`, `genre`, `arch`, `descr`) VALUES
(2, 'powieść', 0, 'dostępna'),
(18, 'nowela', NULL, NULL),
(19, 'fantasy', NULL, NULL),
(20, 'horror', NULL, NULL),
(21, 'kryminał', NULL, NULL),
(22, 'dramat', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL,
  `id_book` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `date`, `id_user`, `id_book`) VALUES
(70, '2019-07-24 12:48:00', 3, 5),
(72, '2019-08-31 13:53:27', 6, 18);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'user');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(124) COLLATE utf8mb4_polish_ci NOT NULL,
  `name` text COLLATE utf8mb4_polish_ci NOT NULL,
  `surname` text COLLATE utf8mb4_polish_ci NOT NULL,
  `login` text COLLATE utf8mb4_polish_ci NOT NULL,
  `password` text COLLATE utf8mb4_polish_ci NOT NULL,
  `password_repeat` text COLLATE utf8mb4_polish_ci NOT NULL,
  `id_role` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `arch` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id_user`, `email`, `name`, `surname`, `login`, `password`, `password_repeat`, `id_role`, `date`, `arch`) VALUES
(1, '', 'admin', 'admin', '', '21232f297a57a5a743894a0e4a801fc3', '', 1, '0000-00-00 00:00:00', NULL),
(2, '', 'Max', 'Nowak', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '', 1, '2019-05-18 10:19:32', NULL),
(3, '', 'Konstancja', 'Mielczarek', 'admin', '21232f297a57a5a743894a0e4a801fc3', '', 1, '2019-05-18 10:20:30', NULL),
(4, '', 'Elizabeth', 'Holmes', 'emploee', 'emploee', '', 1, '2019-05-18 10:21:34', NULL),
(5, 'konstancjam12@gmail.com', '', '', 'admin1', '21232f297a57a5a743894a0e4a801fc3', '', 1, '2019-07-23 21:41:14', NULL),
(6, 'konstancja.mielczarek@op.pl', '', '', 'admin2', '21232f297a57a5a743894a0e4a801fc3', '', 1, '2019-07-25 09:54:41', NULL),
(7, 'tomek@op.pl', 'Tomek', 'W', 'admin3', '21232f297a57a5a743894a0e4a801fc3', 'admin', 1, '2019-07-25 09:59:36', NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `assigment`
--
ALTER TABLE `assigment`
  ADD PRIMARY KEY (`id_assigment`),
  ADD UNIQUE KEY `book` (`id_book`),
  ADD UNIQUE KEY `user` (`id_user`);

--
-- Indeksy dla tabeli `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id_author`);

--
-- Indeksy dla tabeli `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id_book`),
  ADD UNIQUE KEY `author` (`id_author`),
  ADD UNIQUE KEY `genre` (`id_genre`);

--
-- Indeksy dla tabeli `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indeksy dla tabeli `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD UNIQUE KEY `user` (`id_user`),
  ADD UNIQUE KEY `book` (`id_book`);

--
-- Indeksy dla tabeli `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `rola` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `assigment`
--
ALTER TABLE `assigment`
  MODIFY `id_assigment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `author`
--
ALTER TABLE `author`
  MODIFY `id_author` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT dla tabeli `book`
--
ALTER TABLE `book`
  MODIFY `id_book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT dla tabeli `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT dla tabeli `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT dla tabeli `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `assigment`
--
ALTER TABLE `assigment`
  ADD CONSTRAINT `assigment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `assigment_ibfk_2` FOREIGN KEY (`id_book`) REFERENCES `book` (`id_book`);

--
-- Ograniczenia dla tabeli `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`),
  ADD CONSTRAINT `book_ibfk_3` FOREIGN KEY (`id_author`) REFERENCES `author` (`id_author`);

--
-- Ograniczenia dla tabeli `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_book`) REFERENCES `book` (`id_book`);

--
-- Ograniczenia dla tabeli `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `role_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `users` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
