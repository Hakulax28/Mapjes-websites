-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 15 jun 2022 om 20:10
-- Serverversie: 10.4.22-MariaDB
-- PHP-versie: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eindproject`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `naam` varchar(100) NOT NULL,
  `beschrijving` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `categorie`
--

INSERT INTO `categorie` (`id`, `naam`, `beschrijving`) VALUES
(1, 'Defect', 'Er is een bepaalde onderwerp stuk.'),
(2, 'Gevonden voorwerpen', 'Iets dat iemand heeft verloren kan hier terug komen te zien.'),
(3, 'Gebouw', 'Er is een probleem in het gebouw.'),
(4, 'Incident', 'Iemand of iets gevaarlijks is gebeurt'),
(5, 'Inbraak', 'Iemand heeft in het gebouw ingebroken');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `gebruiker_id` int(11) NOT NULL,
  `bericht` text NOT NULL,
  `status` enum('verwerken','gesloten') NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `opmerking` text NOT NULL,
  `personeel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `message`
--

INSERT INTO `message` (`id`, `gebruiker_id`, `bericht`, `status`, `categorie_id`, `datum`, `opmerking`, `personeel_id`) VALUES
(2, 2, 'Een printer is defect', 'gesloten', 1, '2016-06-23', 'Een vervanging komt er aan op 28 juni', 1),
(3, 2, 'Ik ben een fles water kwijt', 'gesloten', 2, '2022-05-16', 'De fles is gevonden', 1),
(4, 3, 'Er is een bom gevonden in B312.', 'gesloten', 4, '2020-12-14', 'De incident is aangepakt', 4),
(5, 2, 'Ik ben mijn sleutel kwijt', 'gesloten', 2, '2020-12-14', 'Sleutel is gevonden', 4),
(50, 3, 'Een van de deuren zijn ingeslagen', 'verwerken', 5, '2022-05-11', '', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `voornaam` varchar(100) NOT NULL,
  `achternaam` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `wachtwoord` varchar(100) NOT NULL,
  `geboortedatum` date NOT NULL,
  `telefoonnummer` varchar(100) NOT NULL,
  `rol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `voornaam`, `achternaam`, `email`, `wachtwoord`, `geboortedatum`, `telefoonnummer`, `rol`) VALUES
(1, 'Cho', 'Lommerse', 'cho.lommerse@ziggo.nl', 'DS!Zvd2Z!*1wrRFBeL', '2001-07-28', '0656834234', 'personeel'),
(2, 'koning', 'Sda', 'koning@webmail.nl', 'dadabbaa', '1999-01-01', '065680332', 'gebruiker'),
(3, 'Ono', 'Yoko', 'lennon.john@beatles.com', 'Paulisdeath', '1976-06-10', '0548510402', 'gebruiker'),
(4, 'Jack', 'Frost', 'adam@snow.nl', 'Blizzard', '2004-02-22', '05653687286', 'personeel ');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_cat_id` (`categorie_id`),
  ADD KEY `Fk_gebr_id` (`gebruiker_id`),
  ADD KEY `Fk_pers_id` (`personeel_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `Fk_cat_id` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `Fk_gebr_id` FOREIGN KEY (`gebruiker_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `Fk_pers_id` FOREIGN KEY (`personeel_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
