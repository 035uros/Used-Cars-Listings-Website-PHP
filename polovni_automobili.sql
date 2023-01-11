-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 11, 2023 at 12:42 PM
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
  `oprema` text COLLATE utf8mb4_bin NOT NULL,
  `registrovan_do` date DEFAULT NULL,
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
  `email` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `sifra` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `kontaktTelefon` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `region` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_korisnika`),
  KEY `id_tipa_korisnika` (`id_tipa_korisnika`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

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
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

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
(117, 9, 'Sierra');

-- --------------------------------------------------------

--
-- Table structure for table `oglas`
--

DROP TABLE IF EXISTS `oglas`;
CREATE TABLE IF NOT EXISTS `oglas` (
  `broj_oglasa` int(11) NOT NULL,
  `id_korisnika` int(11) NOT NULL,
  `vin_automobila` int(11) NOT NULL,
  `cena` double NOT NULL,
  `cena_fix` tinyint(1) NOT NULL,
  `zamena` tinyint(1) NOT NULL,
  `status_oglasa` tinyint(1) NOT NULL,
  `slike` text COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`broj_oglasa`),
  KEY `vin_automobila` (`vin_automobila`),
  KEY `id_korisnika` (`id_korisnika`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

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
  `id_pretrage` int(11) NOT NULL,
  `id_korisnika` int(11) NOT NULL,
  `id_model` int(11) DEFAULT NULL,
  `id_marka` int(11) DEFAULT NULL,
  `id_goriva` int(11) DEFAULT NULL,
  `godiste` year(4) DEFAULT NULL,
  `kilometraza_do` int(11) DEFAULT NULL,
  `cena_do` double DEFAULT NULL,
  `id_pogona` int(11) DEFAULT NULL,
  `id_menjaca` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pretrage`),
  KEY `id_korisnika` (`id_korisnika`),
  KEY `id_model` (`id_model`),
  KEY `id_marka` (`id_marka`),
  KEY `id_goriva` (`id_goriva`),
  KEY `id_pogona` (`id_pogona`),
  KEY `id_menjaca` (`id_menjaca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

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
  ADD CONSTRAINT `oglas_ibfk_3` FOREIGN KEY (`broj_oglasa`) REFERENCES `korisnik` (`id_korisnika`);

--
-- Constraints for table `pretraga`
--
ALTER TABLE `pretraga`
  ADD CONSTRAINT `pretraga_ibfk_2` FOREIGN KEY (`id_menjaca`) REFERENCES `menjac` (`id_menjaca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pretraga_ibfk_4` FOREIGN KEY (`id_pogona`) REFERENCES `pogon` (`id_pogona`),
  ADD CONSTRAINT `pretraga_ibfk_5` FOREIGN KEY (`id_goriva`) REFERENCES `gorivo` (`id_goriva`),
  ADD CONSTRAINT `pretraga_ibfk_6` FOREIGN KEY (`id_korisnika`) REFERENCES `korisnik` (`id_korisnika`),
  ADD CONSTRAINT `pretraga_ibfk_7` FOREIGN KEY (`id_model`) REFERENCES `model` (`id_model`),
  ADD CONSTRAINT `pretraga_ibfk_8` FOREIGN KEY (`id_marka`) REFERENCES `automobil` (`id_marke`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
