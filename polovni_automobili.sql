-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 12, 2023 at 10:59 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `polovni_automobili`
--

-- --------------------------------------------------------

--
-- Table structure for table `automobil`
--

DROP TABLE IF EXISTS `automobil`;
CREATE TABLE IF NOT EXISTS `automobil` (
  `VIN` int(11) NOT NULL,
  `id_marke` int(11) NOT NULL,
  `id_modela` int(11) NOT NULL,
  `id_tip_vozila` int(11) NOT NULL,
  `godina_proizvodnje` year(4) NOT NULL,
  `kilometraza` int(11) NOT NULL,
  `id_pogona` int(11) NOT NULL,
  `id_menjaca` int(11) NOT NULL,
  `id_karoserije` int(11) NOT NULL,
  `id_goriva` int(11) NOT NULL,
  `zapremina` int(11) NOT NULL,
  `snaga` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `id_broja_vrata` int(11) NOT NULL,
  `registrovan_do` varchar(35) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`VIN`),
  KEY `id_marke` (`id_marke`),
  KEY `id_modela` (`id_modela`),
  KEY `id_tip_vozila` (`id_tip_vozila`),
  KEY `id_pogona` (`id_pogona`),
  KEY `id_menjaca` (`id_menjaca`),
  KEY `id_karoserije` (`id_karoserije`),
  KEY `id_goriva` (`id_goriva`),
  KEY `id_broja_vrata` (`id_broja_vrata`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `automobil`
--

INSERT INTO `automobil` (`VIN`, `id_marke`, `id_modela`, `id_tip_vozila`, `godina_proizvodnje`, `kilometraza`, `id_pogona`, `id_menjaca`, `id_karoserije`, `id_goriva`, `zapremina`, `snaga`, `id_broja_vrata`, `registrovan_do`) VALUES
(123, 1, 1, 1, 2021, 111, 1, 1, 2, 1, 111, '11', 1, '01, 2024'),
(1231, 1, 1, 1, 2009, 1111, 1, 1, 2, 2, 111, '11', 1, '01, 2023'),
(12314, 1, 11, 1, 2007, 1243, 1, 1, 8, 5, 1234, '23', 1, '01, 2024'),
(12423, 5, 68, 1, 2021, 12344, 3, 1, 2, 2, 123123, '12', 2, '03, 2023'),
(34234, 1, 3, 1, 2008, 12312, 1, 1, 3, 1, 123123, '231312', 1, '12, 2023'),
(185156, 9, 114, 1, 2023, 234243, 1, 1, 1, 1, 1651, '324', 1, '07, 2023'),
(122034555, 1, 5, 1, 2007, 176320, 1, 1, 3, 1, 1910, '120', 2, '11, 2023'),
(125486235, 1, 1, 1, 1996, 264312, 1, 1, 1, 2, 1268, '65', 1, '01, 2023'),
(192000187, 8, 103, 1, 2003, 248752, 1, 2, 4, 2, 2400, '170', 1, '05, 2023'),
(192200350, 8, 90, 1, 2008, 184000, 1, 1, 1, 2, 1368, '150', 2, '11, 2023'),
(1154892853, 8, 98, 1, 2006, 145000, 1, 1, 1, 2, 1398, '65', 1, '10, 2023');

-- --------------------------------------------------------

--
-- Table structure for table `broj_vrata`
--

DROP TABLE IF EXISTS `broj_vrata`;
CREATE TABLE IF NOT EXISTS `broj_vrata` (
  `id_broja_vrata` int(11) NOT NULL,
  `broj` varchar(15) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_broja_vrata`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `broj_vrata`
--

INSERT INTO `broj_vrata` (`id_broja_vrata`, `broj`) VALUES
(1, '2/3'),
(2, '4/5');

-- --------------------------------------------------------

--
-- Table structure for table `gorivo`
--

DROP TABLE IF EXISTS `gorivo`;
CREATE TABLE IF NOT EXISTS `gorivo` (
  `id_goriva` int(11) NOT NULL,
  `naziv` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_goriva`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `gorivo`
--

INSERT INTO `gorivo` (`id_goriva`, `naziv`) VALUES
(1, 'Дизел'),
(2, 'Бензин'),
(3, 'ТНГ'),
(4, 'ЦНГ'),
(5, 'Хибрид');

-- --------------------------------------------------------

--
-- Table structure for table `karoserija`
--

DROP TABLE IF EXISTS `karoserija`;
CREATE TABLE IF NOT EXISTS `karoserija` (
  `id_karoserije` int(11) NOT NULL,
  `naziv` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_karoserije`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `karoserija`
--

INSERT INTO `karoserija` (`id_karoserije`, `naziv`) VALUES
(1, 'Хечбек'),
(2, 'Караван'),
(3, 'Лимузина'),
(4, 'Купе'),
(5, 'Кабриолет'),
(6, 'Моноволумен'),
(7, 'СУВ'),
(8, 'Пикап');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE IF NOT EXISTS `korisnik` (
  `id_korisnika` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(15) COLLATE utf8mb4_bin NOT NULL,
  `prezime` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `id_tipa_korisnika` int(11) NOT NULL,
  `email` varchar(300) COLLATE utf8mb4_bin NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `sifra` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `kontaktTelefon` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `region` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_korisnika`),
  KEY `id_tipa_korisnika` (`id_tipa_korisnika`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id_korisnika`, `ime`, `prezime`, `id_tipa_korisnika`, `email`, `username`, `sifra`, `kontaktTelefon`, `region`) VALUES
(1, 'Урош', 'Милошевић', 2, 'milosevicurose14@gmail.com', 'uros', '123', '0614111002', 'Централна Србија'),
(3, 'Урош', 'Петровић', 1, 'uroskg@gmail.com', 'urospetrovic', '1234', '06512345698', 'Западна Србија'),
(5, 'Јована', 'Мићић', 2, 'jovana@gmail.com', 'jovana', '12345', '06512345698', 'Београд');

-- --------------------------------------------------------

--
-- Table structure for table `marka`
--

DROP TABLE IF EXISTS `marka`;
CREATE TABLE IF NOT EXISTS `marka` (
  `id_marke` int(11) NOT NULL,
  `naziv` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_marke`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `marka`
--

INSERT INTO `marka` (`id_marke`, `naziv`) VALUES
(1, 'Alfa Romeo'),
(2, 'Audi'),
(3, 'BMW'),
(4, 'Citroen'),
(5, 'Dacia'),
(6, 'Daewoo'),
(7, 'Ferrari'),
(8, 'Fiat'),
(9, 'Ford'),
(10, 'Honda'),
(11, 'Hyundai'),
(12, 'Jaguar'),
(13, 'Jeep'),
(14, 'Kia'),
(15, 'Lancia'),
(16, 'Land Rover'),
(17, 'Mazda'),
(18, 'Mercedes-Benz'),
(19, 'Mini'),
(20, 'Nissan'),
(21, 'Opel'),
(22, 'Peugeot'),
(23, 'Porsche'),
(24, 'Renault'),
(25, 'Saab'),
(26, 'Seat'),
(27, 'Suzuki'),
(28, 'Toyota'),
(29, 'Volkswagen'),
(30, 'Volvo'),
(31, 'Zastava'),
(32, 'Škoda');

-- --------------------------------------------------------

--
-- Table structure for table `menjac`
--

DROP TABLE IF EXISTS `menjac`;
CREATE TABLE IF NOT EXISTS `menjac` (
  `id_menjaca` int(11) NOT NULL,
  `naziv` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_menjaca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `menjac`
--

INSERT INTO `menjac` (`id_menjaca`, `naziv`) VALUES
(1, 'Мануелни'),
(2, 'Аутоматски');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

DROP TABLE IF EXISTS `model`;
CREATE TABLE IF NOT EXISTS `model` (
  `id_model` int(11) NOT NULL AUTO_INCREMENT,
  `id_marka` int(11) NOT NULL,
  `naziv` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_model`),
  KEY `id_marka` (`id_marka`)
) ENGINE=InnoDB AUTO_INCREMENT=340 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id_model`, `id_marka`, `naziv`) VALUES
(1, 1, '145'),
(2, 1, '146'),
(3, 1, '147'),
(4, 1, '156'),
(5, 1, '159'),
(6, 1, '164'),
(7, 1, '166'),
(8, 1, 'Brera'),
(9, 1, 'Giulia'),
(10, 1, 'Giulietta'),
(11, 1, 'Mito'),
(12, 1, 'GT'),
(13, 1, 'Stelvio'),
(14, 2, '80'),
(15, 2, '90'),
(16, 2, 'A1'),
(17, 2, 'A2'),
(18, 2, 'A3'),
(19, 2, 'A4'),
(20, 2, 'A5'),
(21, 2, 'A6'),
(22, 2, 'A7'),
(23, 2, 'A8'),
(24, 2, 'Q2'),
(25, 2, 'Q3'),
(26, 2, 'Q5'),
(27, 2, 'Q7'),
(28, 2, 'Q8'),
(29, 2, 'TT'),
(30, 2, 'TTS'),
(31, 3, 'Serija 1'),
(32, 3, 'Serija 2'),
(33, 3, 'Serija 3'),
(34, 3, 'Serija 4'),
(35, 3, 'Serija 5'),
(36, 3, 'Serija 6'),
(37, 3, 'Serija 7'),
(38, 3, 'Serija 8'),
(39, 3, 'Z'),
(40, 3, 'M'),
(41, 3, 'X1'),
(42, 3, 'X2'),
(43, 3, 'X3'),
(44, 3, 'X4'),
(45, 3, 'X5'),
(46, 3, 'X6'),
(47, 3, 'X7'),
(48, 3, 'X8'),
(49, 4, 'Berlingo'),
(50, 4, 'C1'),
(51, 4, 'C2'),
(52, 4, 'C3'),
(53, 4, 'C4'),
(54, 4, 'C5'),
(55, 4, 'C6'),
(56, 4, 'C7'),
(57, 4, 'C8'),
(58, 4, 'DS3'),
(59, 4, 'DS4'),
(60, 4, 'DS5'),
(61, 4, 'DS6'),
(62, 4, 'DS7'),
(63, 4, 'Nemo'),
(64, 4, 'Saxo'),
(65, 4, 'Xsara'),
(66, 4, 'Xsara Picasso'),
(67, 5, 'Dokker'),
(68, 5, 'Duster'),
(69, 5, 'Lodgy'),
(70, 5, 'Logan'),
(71, 5, 'Sandero'),
(72, 5, 'Solenza'),
(73, 5, 'Stepway'),
(74, 6, 'Kalos'),
(75, 6, 'Lacetti'),
(76, 6, 'Lanos'),
(77, 6, 'Matiz'),
(78, 6, 'Nubira'),
(79, 6, 'Tacuma'),
(80, 7, '458'),
(81, 7, 'Roma'),
(82, 8, '124'),
(83, 8, '126'),
(84, 8, '127'),
(85, 8, '500'),
(86, 8, '500C'),
(87, 8, '500L'),
(88, 8, '500X'),
(89, 8, 'Brava'),
(90, 8, 'Bravo'),
(91, 8, 'Doblo'),
(92, 8, 'Fiorino'),
(93, 8, 'Grande Punto'),
(94, 8, 'Idea'),
(95, 8, 'Marea'),
(96, 8, 'Multipla'),
(97, 8, 'Panda'),
(98, 8, 'Punto'),
(99, 8, 'Punto EVO'),
(100, 8, 'Qubo'),
(101, 8, 'Sedici'),
(102, 8, 'Seicento'),
(103, 8, 'Stilo'),
(104, 8, 'Tipo'),
(105, 8, 'Uno'),
(106, 9, 'B-Max'),
(107, 9, 'C-Max'),
(108, 9, 'Escort'),
(109, 9, 'Fiesta'),
(110, 9, 'Focus'),
(111, 9, 'Fusion'),
(112, 9, 'Ka'),
(113, 9, 'Mondeo'),
(114, 9, 'Mustang'),
(115, 9, 'Puma'),
(116, 9, 'S-Max'),
(117, 9, 'Sierra'),
(118, 10, 'Accord'),
(119, 10, 'Civic'),
(120, 10, 'CRV'),
(121, 10, 'Jazz'),
(122, 10, 'Legend'),
(123, 10, 'Prelude'),
(124, 11, 'Accent'),
(125, 11, 'Elantra'),
(126, 11, 'Getz'),
(127, 11, 'i10'),
(128, 11, 'i20'),
(129, 11, 'i30'),
(130, 11, 'ix20'),
(131, 11, 'ix35'),
(132, 11, 'ix55'),
(133, 11, 'Matrix'),
(134, 11, 'Santa Fe'),
(135, 11, 'Sonata'),
(136, 11, 'Tucson'),
(137, 12, 'Pace'),
(138, 12, 'Type'),
(139, 12, 'i30'),
(140, 12, 'XF'),
(141, 12, 'XJ'),
(142, 13, 'Cherokee'),
(143, 13, 'Compass'),
(144, 13, 'Liberty'),
(145, 13, 'Patriot'),
(146, 13, 'Renegade'),
(147, 14, 'Carens'),
(148, 14, 'Carnival'),
(149, 14, 'Ceed'),
(150, 14, 'Cerato'),
(151, 14, 'Picanto'),
(152, 14, 'Sorento'),
(153, 14, 'Sportage'),
(154, 14, 'XCeed'),
(155, 15, 'Delta'),
(156, 15, 'Flavia'),
(157, 15, 'Kappa'),
(158, 15, 'Lybra'),
(159, 15, 'Musa'),
(160, 15, 'Phedra'),
(161, 15, 'Thema'),
(162, 15, 'Thesis'),
(163, 15, 'Y'),
(164, 16, 'Defender'),
(165, 16, 'Discovery'),
(166, 16, 'Freelander'),
(167, 16, 'RangeRover'),
(168, 16, 'II'),
(169, 16, 'III'),
(170, 17, '2'),
(171, 17, '3'),
(172, 17, '5'),
(173, 17, '6'),
(174, 17, '323'),
(175, 17, '626'),
(176, 17, 'CX3'),
(177, 17, 'CX5'),
(178, 17, 'CX7'),
(179, 18, 'A klasa'),
(180, 18, 'B klasa'),
(181, 18, 'C klasa'),
(182, 18, 'E klasa'),
(183, 18, 'G klasa'),
(184, 18, 'ML klasa'),
(185, 18, 'R klasa'),
(186, 18, 'S klasa'),
(187, 19, 'Clubman'),
(188, 19, 'Cooper'),
(189, 19, 'Cooper S'),
(190, 19, 'Countryman'),
(191, 19, 'Paceman'),
(192, 19, 'One'),
(193, 20, 'Juke'),
(194, 20, 'Micra'),
(195, 20, 'Murano'),
(196, 20, 'Navara'),
(197, 20, 'Note'),
(198, 20, 'Patrol'),
(199, 20, 'Primera'),
(200, 20, 'Qashqai'),
(201, 20, 'X-Trail'),
(202, 21, 'Adam'),
(203, 21, 'Agila'),
(204, 21, 'Antara'),
(205, 21, 'Astra'),
(206, 21, 'Calibra'),
(207, 21, 'Corsa'),
(208, 21, 'Combo'),
(209, 21, 'Frontera'),
(210, 21, 'Insignia'),
(211, 21, 'Kadett'),
(212, 21, 'Meriva'),
(213, 21, 'Moka'),
(214, 21, 'Rekord'),
(215, 21, 'Vectra'),
(216, 21, 'Zafira'),
(217, 22, '106'),
(218, 22, '108'),
(219, 22, '204'),
(220, 22, '205'),
(221, 22, '206'),
(222, 22, '207'),
(223, 22, '306'),
(224, 22, '307'),
(225, 22, '308'),
(226, 22, '406'),
(227, 22, '407'),
(228, 22, '508'),
(229, 22, '607'),
(230, 22, '2008'),
(231, 22, '3008'),
(232, 22, '5008'),
(233, 22, 'Bipper'),
(234, 22, 'Expert'),
(235, 23, '911'),
(236, 23, '924'),
(237, 23, '944'),
(238, 23, 'Cayenne'),
(239, 23, 'Macan'),
(240, 23, 'Panamera'),
(241, 24, 'Captur'),
(242, 24, 'Clio'),
(243, 24, 'Espace'),
(244, 24, 'Fluence'),
(245, 24, 'Kadjar'),
(246, 24, 'Kangoo'),
(247, 24, 'Koleos'),
(248, 24, 'Laguna'),
(249, 24, 'Megan'),
(250, 24, 'Modus'),
(251, 24, 'Scenic'),
(252, 24, 'Talisman'),
(253, 25, '900'),
(254, 25, '9000'),
(255, 25, '9-3'),
(256, 25, '9-5'),
(257, 26, 'Alhambra'),
(258, 26, 'Altea'),
(259, 26, 'Cordoba'),
(260, 26, 'Ibiza'),
(261, 26, 'Leon'),
(262, 26, 'Toledo'),
(263, 27, 'Alto'),
(264, 27, 'Baleno'),
(265, 27, 'Grand Vitara'),
(266, 27, 'Ignis'),
(267, 27, 'Maruti'),
(268, 27, 'Splash'),
(269, 27, 'Swift'),
(270, 27, 'SX4'),
(271, 27, 'Vitara'),
(272, 28, 'Auris'),
(273, 28, 'Avensis'),
(274, 28, 'Aygo'),
(275, 28, 'Celica'),
(276, 28, 'Corolla'),
(277, 28, 'Hilux'),
(278, 28, 'Land Cruiser'),
(279, 28, 'Prius'),
(280, 28, 'RAV4'),
(281, 28, 'Supra'),
(282, 28, 'Verso'),
(283, 28, 'Yaris'),
(284, 29, 'Amarok'),
(285, 29, 'Bora'),
(286, 29, 'Buba'),
(287, 29, 'Caddy'),
(288, 29, 'EOS'),
(289, 29, 'Golf'),
(290, 29, 'Jetta'),
(291, 29, 'Lupo'),
(292, 29, 'Passat'),
(293, 29, 'Polo'),
(294, 29, 'Sharan'),
(295, 29, 'Tiguan'),
(296, 29, 'Touran'),
(297, 29, 'Touareg'),
(298, 29, 'Vento'),
(299, 30, '244'),
(300, 30, '340'),
(301, 30, '440'),
(302, 30, '460'),
(303, 30, '740'),
(304, 30, '760'),
(305, 30, 'C30'),
(306, 30, 'C70'),
(307, 30, 'S40'),
(308, 30, 'S60'),
(309, 30, 'S70'),
(310, 30, 'V40'),
(311, 30, 'V50'),
(312, 30, 'V60'),
(313, 30, 'S60'),
(314, 30, 'S70'),
(315, 30, 'XC40'),
(316, 30, 'XC60'),
(317, 30, 'XC70'),
(318, 30, 'XC90'),
(319, 31, '101'),
(320, 31, '128'),
(321, 31, '1300'),
(322, 31, '1500'),
(323, 31, '750'),
(324, 31, '850'),
(325, 31, 'Florida'),
(326, 31, 'Koral'),
(327, 31, 'Skala'),
(328, 31, 'Yugo'),
(329, 32, 'Citigo'),
(330, 32, 'Fabia'),
(331, 32, 'Felicia'),
(332, 32, 'Kamiq'),
(333, 32, 'Karoq'),
(334, 32, 'Octavia'),
(335, 32, 'Praktik'),
(336, 32, 'Rapid'),
(337, 32, 'Roomster'),
(338, 32, 'Superb'),
(339, 32, 'Yeti');

-- --------------------------------------------------------

--
-- Table structure for table `oglas`
--

DROP TABLE IF EXISTS `oglas`;
CREATE TABLE IF NOT EXISTS `oglas` (
  `broj_oglasa` int(11) NOT NULL,
  `naslov` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `id_korisnika` int(11) NOT NULL,
  `vin_automobila` int(11) NOT NULL,
  `cena` double NOT NULL,
  `cena_fix` tinyint(1) DEFAULT NULL,
  `zamena` tinyint(1) DEFAULT NULL,
  `status_oglasa` tinyint(1) NOT NULL,
  `slike` text COLLATE utf8mb4_bin DEFAULT NULL,
  `opis` text COLLATE utf8mb4_bin DEFAULT NULL,
  `datum` varchar(55) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`broj_oglasa`),
  KEY `vin_automobila` (`vin_automobila`),
  KEY `id_korisnika` (`id_korisnika`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `oglas`
--

INSERT INTO `oglas` (`broj_oglasa`, `naslov`, `id_korisnika`, `vin_automobila`, `cena`, `cena_fix`, `zamena`, `status_oglasa`, `slike`, `opis`, `datum`) VALUES
(59639435, '1.9 Multijet', 1, 122034555, 3750, 0, 0, 1, 'images/oglasi/59639435/63c08dc740c849.33341005.jpg;images/oglasi/59639435/63c08dc7411ec0.03858663.jpg;', 'Редовно одржаван аутомобил.', '12 01 2023'),
(312236159, 'ABARTH', 1, 192000187, 2990, 0, 0, 1, 'images/oglasi/312236159/63c08d317079b7.86971984.jpg;images/oglasi/312236159/63c08d3170c3c1.01341508.jpg;images/oglasi/312236159/63c08d3170ffc9.61108936.jpg;', 'Фантастичан аутомобил. Без замене.', '12 01 2023'),
(433867146, 'Alfa 145 NOV NOV NOV', 1, 125486235, 800, 0, 1, 1, 'images/oglasi/433867146/63bf413028b6a9.53212911.jpg;images/oglasi/433867146/63bf413028f066.11375048.jpg;images/oglasi/433867146/63bf4130292195.92778026.jpg;', NULL, '11 01 2023'),
(614198327, 'Fiat Grande Punto 1.4', 1, 1154892853, 2200, 1, 0, 1, 'images/oglasi/614198327/63bfe1c8a2aab8.94574422.jpg;images/oglasi/614198327/63bfe1c8a3e317.32624153.jpg;', 'Одличан Пунтић, као чаша. Први власник. Купљен код другара директно из фабрике Застава. Ко не верује, нек иде код портира и нека пита.', '12 01 2023'),
(1764037384, '1.4 T-jet', 1, 192200350, 4400, 1, 0, 1, 'images/oglasi/1764037384/63c08e369b36b9.85883692.jpg;images/oglasi/1764037384/63c08e369b7284.65616945.jpg;images/oglasi/1764037384/63c08e369ba5d3.66725767.jpg;', 'Комплетна сервисна историја.', '12 01 2023');

-- --------------------------------------------------------

--
-- Table structure for table `pogon`
--

DROP TABLE IF EXISTS `pogon`;
CREATE TABLE IF NOT EXISTS `pogon` (
  `id_pogona` int(11) NOT NULL,
  `naziv` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_pogona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `pogon`
--

INSERT INTO `pogon` (`id_pogona`, `naziv`) VALUES
(1, 'Предњи'),
(2, 'Задњи'),
(3, '4x4');

-- --------------------------------------------------------

--
-- Table structure for table `pretraga`
--

DROP TABLE IF EXISTS `pretraga`;
CREATE TABLE IF NOT EXISTS `pretraga` (
  `id_pretrage` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `id_korisnika` int(11) NOT NULL,
  `id_model` int(11) DEFAULT NULL,
  `id_marka` int(11) DEFAULT NULL,
  `id_goriva` int(11) DEFAULT NULL,
  `godisteod` year(4) DEFAULT NULL,
  `godistedo` year(4) DEFAULT NULL,
  `cena_do` double DEFAULT NULL,
  `id_karoserije` int(11) DEFAULT NULL,
  `region` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`id_pretrage`),
  KEY `id_korisnika` (`id_korisnika`),
  KEY `id_model` (`id_model`),
  KEY `id_marka` (`id_marka`),
  KEY `id_goriva` (`id_goriva`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `pretraga`
--

INSERT INTO `pretraga` (`id_pretrage`, `naziv`, `id_korisnika`, `id_model`, `id_marka`, `id_goriva`, `godisteod`, `godistedo`, `cena_do`, `id_karoserije`, `region`) VALUES
(13, 'ALFA', 3, 0, 1, 0, 2000, 2000, 0, 0, NULL),
(15, 'alfica', 3, 1, 1, 2, 1974, 2023, 1000, 1, 'Централна Србија'),
(17, 'Alfa Romeo', 1, 0, 1, 0, 2000, 2000, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tip_korisnika`
--

DROP TABLE IF EXISTS `tip_korisnika`;
CREATE TABLE IF NOT EXISTS `tip_korisnika` (
  `id_tipa_korisnika` int(11) NOT NULL,
  `naziv` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_tipa_korisnika`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `tip_korisnika`
--

INSERT INTO `tip_korisnika` (`id_tipa_korisnika`, `naziv`) VALUES
(1, 'Администратор'),
(2, 'Корисник');

-- --------------------------------------------------------

--
-- Table structure for table `tip_vozila`
--

DROP TABLE IF EXISTS `tip_vozila`;
CREATE TABLE IF NOT EXISTS `tip_vozila` (
  `id_tipa_vozila` int(11) NOT NULL,
  `naziv` varchar(35) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_tipa_vozila`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `tip_vozila`
--

INSERT INTO `tip_vozila` (`id_tipa_vozila`, `naziv`) VALUES
(1, 'Путничко'),
(2, 'Теретно');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `automobil`
--
ALTER TABLE `automobil`
  ADD CONSTRAINT `automobil_ibfk_1` FOREIGN KEY (`id_tip_vozila`) REFERENCES `tip_vozila` (`id_tipa_vozila`),
  ADD CONSTRAINT `automobil_ibfk_2` FOREIGN KEY (`id_karoserije`) REFERENCES `karoserija` (`id_karoserije`),
  ADD CONSTRAINT `automobil_ibfk_3` FOREIGN KEY (`id_menjaca`) REFERENCES `menjac` (`id_menjaca`),
  ADD CONSTRAINT `automobil_ibfk_4` FOREIGN KEY (`id_pogona`) REFERENCES `pogon` (`id_pogona`),
  ADD CONSTRAINT `automobil_ibfk_5` FOREIGN KEY (`id_goriva`) REFERENCES `gorivo` (`id_goriva`),
  ADD CONSTRAINT `automobil_ibfk_8` FOREIGN KEY (`id_broja_vrata`) REFERENCES `broj_vrata` (`id_broja_vrata`),
  ADD CONSTRAINT `automobil_ibfk_9` FOREIGN KEY (`id_modela`) REFERENCES `model` (`id_model`);

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`id_tipa_korisnika`) REFERENCES `tip_korisnika` (`id_tipa_korisnika`);

--
-- Constraints for table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `model_ibfk_1` FOREIGN KEY (`id_marka`) REFERENCES `marka` (`id_marke`);

--
-- Constraints for table `oglas`
--
ALTER TABLE `oglas`
  ADD CONSTRAINT `oglas_ibfk_2` FOREIGN KEY (`vin_automobila`) REFERENCES `automobil` (`VIN`),
  ADD CONSTRAINT `oglas_ibfk_3` FOREIGN KEY (`id_korisnika`) REFERENCES `korisnik` (`id_korisnika`);

--
-- Constraints for table `pretraga`
--
ALTER TABLE `pretraga`
  ADD CONSTRAINT `pretraga_ibfk_6` FOREIGN KEY (`id_korisnika`) REFERENCES `korisnik` (`id_korisnika`),
  ADD CONSTRAINT `pretraga_ibfk_8` FOREIGN KEY (`id_marka`) REFERENCES `automobil` (`id_marke`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
