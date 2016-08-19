-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Machine: localhost:8889
-- Gegenereerd op: 19 aug 2016 om 11:39
-- Serverversie: 5.5.38
-- PHP-versie: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Databank: `todo_app`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `taken`
--

CREATE TABLE `taken` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `deadline` date NOT NULL,
  `werkuren` int(11) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `beschrijving` varchar(500) NOT NULL,
  `project` varchar(255) NOT NULL,
  `done` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `taken`
--

INSERT INTO `taken` (`id`, `title`, `deadline`, `werkuren`, `created_by`, `beschrijving`, `project`, `done`) VALUES
(1, 'Email Clients', '2016-08-31', 2, 'Weichie', 'Email de klanten om te zeggen dat je met vakantie bent en wanneer je opnieuw beschikbaar bent.', 'Freelance Stuff', 0),
(2, 'Herexamen PHP', '2016-08-19', 25, 'Weichie', 'Examentaak PHP', 'PHP', 1),
(3, 'Examen CMS 2', '2016-08-17', 15, 'Glenny', 'Examentaak CMS 2', 'School', 1),
(4, 'having fun', '2016-07-14', 100, 'Glenny', 'vakantie!', 'School', 0),
(5, 'Vak met werkuren', '2016-08-03', 1, 'Glenny', 'Een vak met werkuren om te testen', 'School', 1),
(6, 'werkuren explosie', '2016-08-07', 15, 'Weichie', 'veel werkuren (test)', 'PHP', 1),
(7, 'test taak', '2016-08-23', 3, 'Weichie', 'Een test taakje', 'Webtech', 1),
(8, 'herexamen Project Management', '2016-08-30', 6, 'Benny', 'De taak voor het herexamen project management opnieuw maken.', 'Freelance Stuff', 0),
(9, 'Telefoongesprek', '2016-09-27', 2, 'Tommy', 'Voer een telefoonconversatie in het frans', 'Frans', 0),
(10, 'Test taak 5', '2016-08-02', 10, 'Weichie', 'Test taak om te controleren', 'Webtech', 1);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `taken`
--
ALTER TABLE `taken`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `taken`
--
ALTER TABLE `taken`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;