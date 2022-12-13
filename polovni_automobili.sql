-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 13, 2022 at 04:36 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE IF NOT EXISTS `korisnik` (
  `id_korisnika` int(11) NOT NULL,
  `ime` varchar(15) COLLATE utf8mb4_bin NOT NULL,
  `prezime` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `id_tipa_korisnika` int(11) NOT NULL,
  `email` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `sifra` varchar(25) COLLATE utf8mb4_bin NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

DROP TABLE IF EXISTS `model`;
CREATE TABLE IF NOT EXISTS `model` (
  `id_model` int(11) NOT NULL,
  `id_marka` int(11) NOT NULL,
  `naziv` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_model`),
  KEY `id_marka` (`id_marka`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

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
  ADD CONSTRAINT `automobil_ibfk_6` FOREIGN KEY (`id_marke`) REFERENCES `marka` (`id_marke`),
  ADD CONSTRAINT `automobil_ibfk_7` FOREIGN KEY (`id_modela`) REFERENCES `model` (`id_model`),
  ADD CONSTRAINT `automobil_ibfk_8` FOREIGN KEY (`id_broja_vrata`) REFERENCES `broj_vrata` (`id_broja_vrata`);

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
  ADD CONSTRAINT `oglas_ibfk_1` FOREIGN KEY (`id_korisnika`) REFERENCES `korisnik` (`id_korisnika`),
  ADD CONSTRAINT `oglas_ibfk_2` FOREIGN KEY (`vin_automobila`) REFERENCES `automobil` (`VIN`);

--
-- Constraints for table `pretraga`
--
ALTER TABLE `pretraga`
  ADD CONSTRAINT `pretraga_ibfk_1` FOREIGN KEY (`id_model`) REFERENCES `model` (`id_model`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pretraga_ibfk_2` FOREIGN KEY (`id_menjaca`) REFERENCES `menjac` (`id_menjaca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pretraga_ibfk_3` FOREIGN KEY (`id_marka`) REFERENCES `marka` (`id_marke`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pretraga_ibfk_4` FOREIGN KEY (`id_pogona`) REFERENCES `pogon` (`id_pogona`),
  ADD CONSTRAINT `pretraga_ibfk_5` FOREIGN KEY (`id_goriva`) REFERENCES `gorivo` (`id_goriva`),
  ADD CONSTRAINT `pretraga_ibfk_6` FOREIGN KEY (`id_korisnika`) REFERENCES `korisnik` (`id_korisnika`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
