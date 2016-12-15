-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 24 aug 2016 kl 12:39
-- Serverversion: 5.6.17
-- PHP-version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `pizza`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `ingredienser`
--

CREATE TABLE IF NOT EXISTS `ingredienser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namn` varchar(255) NOT NULL,
  `typ` enum('Grönsaker','Kött','Sås','Kryddor','Skaldjur','Annat','Ost') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumpning av Data i tabell `ingredienser`
--

INSERT INTO `ingredienser` (`id`, `namn`, `typ`) VALUES
(1, 'Tomat', 'Grönsaker'),
(2, 'Ost', 'Ost'),
(3, 'Skinka', 'Kött'),
(4, 'Ananas', 'Grönsaker'),
(5, 'Räkor', 'Skaldjur'),
(6, 'Champinjoner', 'Grönsaker'),
(7, 'Tonfisk', 'Kött'),
(8, 'Banan', 'Grönsaker'),
(9, 'Lök', 'Grönsaker'),
(10, 'Paprika', 'Grönsaker'),
(11, 'Sparris', 'Grönsaker'),
(12, 'Kronärtskocka', 'Grönsaker'),
(13, 'Oliver', 'Grönsaker'),
(14, 'Fläskfile', 'Kött'),
(15, 'Curry', 'Kryddor'),
(16, 'Kyckling', 'Kött'),
(17, 'Jordnötter', 'Annat'),
(18, 'Kebabkött', 'Kött'),
(19, 'Sås', 'Sås'),
(20, 'Köttfärssås', 'Kött'),
(21, 'Vitlök', 'Grönsaker'),
(22, 'Musslor', 'Skaldjur'),
(23, 'Pepperoni', 'Kryddor'),
(24, 'Bearnaisesås', 'Sås'),
(25, 'Färska champinjoner', 'Grönsaker'),
(26, 'Gorgonzola', 'Grönsaker'),
(27, 'Jalapeno', 'Kryddor'),
(28, 'Tacosås', 'Sås'),
(29, 'Isbergsallad', 'Grönsaker'),
(30, 'Mozzarella', 'Ost'),
(31, 'Salladsost', 'Ost'),
(32, 'Riddarost', 'Grönsaker'),
(33, 'Färska tomater', 'Grönsaker'),
(34, 'Chili', 'Kryddor'),
(35, 'Permesanost', 'Ost'),
(36, 'Ruccola', 'Grönsaker'),
(37, 'Oxfile', 'Kött'),
(38, 'Ägg', 'Annat'),
(39, 'Bacon', 'Kött'),
(40, 'Soltorkade tomater', 'Grönsaker'),
(41, 'Lufttorkad skinka', 'Kött'),
(42, 'Salami', 'Kött'),
(43, 'Rödlök', 'Grönsaker'),
(44, 'Strips', 'Annat'),
(45, 'Aubergine', 'Grönsaker'),
(46, 'Zucchini', 'Grönsaker'),
(47, 'Pepperonikorv', 'Kött'),
(48, 'Kräftstjärtar', 'Skaldjur'),
(49, 'Crabfish', 'Skaldjur');

-- --------------------------------------------------------

--
-- Tabellstruktur `ingrediens_lista`
--

CREATE TABLE IF NOT EXISTS `ingrediens_lista` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pizza` int(11) NOT NULL,
  `ingrediens` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumpning av Data i tabell `ingrediens_lista`
--

INSERT INTO `ingrediens_lista` (`id`, `pizza`, `ingrediens`) VALUES
(1, 1, 2),
(2, 1, 1),
(3, 2, 3),
(4, 2, 2),
(5, 2, 1),
(6, 3, 4),
(7, 3, 3),
(8, 3, 2),
(9, 3, 1),
(10, 4, 5),
(11, 4, 3),
(12, 4, 2),
(13, 4, 1),
(14, 5, 6),
(15, 5, 3),
(16, 5, 2),
(17, 5, 1),
(18, 6, 3),
(19, 6, 2),
(20, 6, 1),
(21, 7, 6),
(22, 7, 5),
(23, 7, 2),
(24, 7, 1),
(25, 8, 7),
(26, 8, 3),
(27, 8, 2),
(28, 8, 1),
(29, 9, 8),
(30, 9, 4),
(31, 9, 2),
(32, 9, 1),
(33, 10, 13),
(34, 10, 12),
(35, 10, 11),
(36, 10, 10),
(37, 10, 9),
(38, 10, 6),
(39, 10, 2),
(40, 10, 1),
(41, 11, 14),
(42, 11, 6),
(43, 11, 3),
(44, 11, 2),
(45, 11, 1),
(46, 12, 15),
(47, 12, 14),
(48, 12, 8),
(49, 12, 3),
(50, 12, 2),
(51, 12, 1),
(52, 13, 16),
(53, 13, 15),
(54, 13, 9),
(55, 13, 6),
(56, 13, 2),
(57, 13, 1),
(58, 14, 17),
(59, 14, 15),
(60, 14, 8),
(61, 14, 4),
(62, 14, 3),
(63, 14, 2),
(64, 14, 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `pizzerior`
--

CREATE TABLE IF NOT EXISTS `pizzerior` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `namn` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumpning av Data i tabell `pizzerior`
--

INSERT INTO `pizzerior` (`id`, `namn`) VALUES
(1, 'biblos'),
(2, 'prima'),
(3, 'evergren');

-- --------------------------------------------------------

--
-- Tabellstruktur `pizzor`
--

CREATE TABLE IF NOT EXISTS `pizzor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namn` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumpning av Data i tabell `pizzor`
--

INSERT INTO `pizzor` (`id`, `namn`) VALUES
(1, 'Margareta'),
(2, 'Vesuvio'),
(3, 'Hawaii'),
(4, 'Capri'),
(5, 'Capricciosa'),
(6, 'Calzone'),
(7, 'Blecko'),
(8, 'La Tuna'),
(9, 'Afrikana'),
(10, 'Vegetariana'),
(11, 'HV-71'),
(12, 'Tropicana'),
(13, 'Kyckling Pizza'),
(14, 'Chiquita');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
