-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 04. Sep 2021 um 17:09
-- Server-Version: 10.4.20-MariaDB
-- PHP-Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `fswd13_cr13_bigevents_markuskamitz`
--
CREATE DATABASE IF NOT EXISTS `fswd13_cr13_bigevents_markuskamitz` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fswd13_cr13_bigevents_markuskamitz`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210903173150', '2021-09-03 17:32:15', 37);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `events`
--

INSERT INTO `events` (`id`, `name`, `date`, `description`, `image`, `capacity`, `email`, `phone`, `address`, `url`, `type`) VALUES
(2, 'Variations', '2021-09-03 21:47:00', 'Acrobatic  Dance Event', 'https://cdn.pixabay.com/photo/2018/02/06/14/07/balance-3134828_960_720.jpg', '100', 'admin@admin.at', '12345678', 'Hausstrasse 23 1170Wien', 'me@somewhere.at', 'Dance'),
(13, 'Jessica Someone', '2016-01-01 00:00:00', 'Jessicas greatest hits', 'https://cdn.pixabay.com/photo/2015/05/15/14/50/concert-768722_960_720.jpg', '1200', 'jessica@someone.com', '+43 699 38387777', 'Weinbertsrasse  27 1170 Vienna', 'jessica.someone.com', 'Music'),
(14, 'Yoga', '2016-01-01 00:00:00', 'Yoga with Sri Whoever', 'https://cdn.pixabay.com/photo/2018/08/14/16/15/yoga-3605913_960_720.jpg', '40', 'yoga@sri.com', '+43 699 3832222', 'Yogastrasse 1  1010 Wien', 'yoga@yogastrasse.at', 'Sport'),
(15, 'The Group', '2024-09-22 00:00:00', 'A meditative group event in a wonderful theater', 'https://cdn.pixabay.com/photo/2014/02/05/00/37/staging-258631_960_720.jpg', '30', 'meditate@vienna.com', '+43 6776 1231234', 'Nirvanastreet 1 1190 Vienna', 'meditate@nirvanastreet.net', 'Theater'),
(16, 'The Crazy One', '2023-12-29 00:00:00', '2 hours of Rock and Roll beyond your beliefs', 'https://cdn.pixabay.com/photo/2017/08/07/07/05/people-2600872_960_720.jpg', '2000', 'crazy@beyond.com', '+43 699 38383848', 'Crazystrasse 2 1010 Vienna', 'crazy.beyond.com', 'Music'),
(17, 'Mountain Jumping', '2023-09-28 00:00:00', 'Discover your new abilities', 'https://cdn.pixabay.com/photo/2016/11/14/03/38/achieve-1822503_960_720.jpg', '500', 'jumping@mountains.net', '+43 699 1111118', 'Bergstrasse 1 1120 Wien', 'jumping-overmountains.net', 'Sport'),
(19, 'The new Planets', '2025-01-01 00:00:00', 'Watch our new Planets arrive', 'https://cdn.pixabay.com/photo/2020/06/18/08/52/planet-5312560_960_720.jpg', '50000', 'new@planets.com', '+43 699 38383848', 'Neuestrasse 2 1190 Wien', 'new.planets.com', 'Space'),
(23, 'River Fight', '2021-10-01 17:30:00', 'Classic River Fight  near the Danube River', 'https://cdn.pixabay.com/photo/2016/11/14/05/26/children-1822701_960_720.jpg', '500', 'river.fight@vienna.at', '+43 699 38333849', 'Flusstrasse 2 1230 Wien', 'river-fight.com', 'Sport'),
(25, 'Snake Dance', '2025-08-10 22:00:00', 'Snake Dance Festival with exotic dance variations', 'https://cdn.pixabay.com/photo/2017/12/04/03/53/woman-2996292_960_720.jpg', '300', 'snake@dance.com', '+43 699 38383848', 'Wiener Stadthalle 1 1160  Wien', 'snake-dance.com', 'Dance'),
(26, 'Cosca', '2021-09-04 20:00:00', 'A brilliant act of modern Theatre', 'https://cdn.pixabay.com/photo/2015/01/09/17/34/opera-594592_960_720.jpg', '200', 'cosca@theatre.at', '+43 6776 12345123', 'Wartestrasse 25 1150 Wien', 'cosca.theatre.com', 'Theater'),
(27, 'Back to the Moon', '2024-06-13 05:00:00', 'Watch the Rockt start on our next Trip to the Moon', 'https://cdn.pixabay.com/photo/2012/11/28/10/35/rocket-launch-67646_960_720.jpg', '20000', 'back@moon.com', '+43 699 38384444', 'Wiesnerstrasse 2/5 1160 Wien', 'back-moon.com', 'Space'),
(28, 'The Famous One', '2016-01-01 00:00:00', 'The Famous One back in Concert', 'https://cdn.pixabay.com/photo/2014/05/21/15/18/musician-349790_960_720.jpg', '400', 'famous@one.at', '+43 699 38383848', 'Roland-Rainer-Platz 1, 1150 Wien', 'famous-one.com', 'Music'),
(29, 'Nature Dance Festival', '2022-05-02 00:00:00', 'Dance with other in pure nature', 'https://cdn.pixabay.com/photo/2020/01/21/13/23/freedom-4782870_960_720.jpg', '5000', 'nature@dance.at', '+43 699 38383111', 'Himmelstraße 115, 1190 Wien', 'nature.dance.com', 'Dance');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indizes für die Tabelle `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
