-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2016 at 07:36 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `php_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `blog_slika` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `blog_text` text COLLATE utf8_unicode_ci NOT NULL,
  `blog_datum` datetime NOT NULL,
  PRIMARY KEY (`blog_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_naziv`, `blog_slika`, `blog_text`, `blog_datum`) VALUES
(1, 'Kupujte kod Dzoa', 'blog-one.jpg', '	The valid range of a timestamp is typically from Fri, 13 Dec 1901 20:45:54 GMT to Tue, 19 Jan 2038 03:14:07 GMT. (These are the dates that correspond to the minimum and maximum values for a 32-bit signed integer). However, before PHP 5.1.0 this range was limited from 01-01-1970 to 19-01-2038 on some systems (e.g. Windows).', '2016-11-09 09:28:14'),
(2, 'Kupujte kod Dzoa', 'blog-one.jpg', '	The valid range of a timestamp is typically from Fri, 13 Dec 1901 20:45:54 GMT to Tue, 19 Jan 2038 03:14:07 GMT. (These are the dates that correspond to the minimum and maximum values for a 32-bit signed integer). However, before PHP 5.1.0 this range was limited from 01-01-1970 to 19-01-2038 on some systems (e.g. Windows).', '2016-11-09 09:28:14'),
(3, 'Kupujte kod Dzoa', 'blog-one.jpg', '	The valid range of a timestamp is typically from Fri, 13 Dec 1901 20:45:54 GMT to Tue, 19 Jan 2038 03:14:07 GMT. (These are the dates that correspond to the minimum and maximum values for a 32-bit signed integer). However, before PHP 5.1.0 this range was limited from 01-01-1970 to 19-01-2038 on some systems (e.g. Windows).', '2016-11-09 09:28:14');

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE IF NOT EXISTS `kategorije` (
  `kategorije_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategorije_naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`kategorije_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`kategorije_id`, `kategorije_naziv`) VALUES
(1, 'Patike'),
(2, 'Papuče'),
(3, 'Kopačke'),
(4, 'Maice'),
(5, 'Šorcevi'),
(6, 'Trenerke'),
(7, 'Dukserice');

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

CREATE TABLE IF NOT EXISTS `komentari` (
  `komentari_id` int(11) NOT NULL AUTO_INCREMENT,
  `komentari_id_blog` int(11) NOT NULL,
  `komentari_id_korisnika` int(11) NOT NULL,
  `komentari_text` text COLLATE utf8_unicode_ci NOT NULL,
  `komentari_datum` date NOT NULL,
  `komentari_status` int(1) NOT NULL,
  PRIMARY KEY (`komentari_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `korisnici_id` int(11) NOT NULL AUTO_INCREMENT,
  `korisnici_ime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `korisnici_prezime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `korisnici_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `korisnici_sifra` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `korisnici_adresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `korisnici_telefon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`korisnici_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `partneri`
--

CREATE TABLE IF NOT EXISTS `partneri` (
  `partneri_id` int(11) NOT NULL AUTO_INCREMENT,
  `partneri_naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `partneri_datum` datetime NOT NULL,
  `partneri_slika` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `partneri_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`partneri_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `partneri`
--

INSERT INTO `partneri` (`partneri_id`, `partneri_naziv`, `partneri_datum`, `partneri_slika`, `partneri_link`) VALUES
(1, 'Djak', '2016-11-07 03:29:13', 'iframe1.png', ''),
(2, 'Djak', '2016-11-07 00:00:00', 'iframe1.png', ''),
(3, 'Djak', '2016-11-07 00:00:00', 'iframe1.png', ''),
(4, 'Djak', '2016-11-07 00:00:00', 'iframe1.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `podkategorije`
--

CREATE TABLE IF NOT EXISTS `podkategorije` (
  `podkategorije_id` int(11) NOT NULL AUTO_INCREMENT,
  `podkategorije_id_kategorije` int(11) NOT NULL,
  `podkategorije_naziv` varchar(250) NOT NULL,
  PRIMARY KEY (`podkategorije_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `podkategorije`
--

INSERT INTO `podkategorije` (`podkategorije_id`, `podkategorije_id_kategorije`, `podkategorije_naziv`) VALUES
(1, 1, 'Nike'),
(2, 1, 'Adidas'),
(3, 1, 'Reebok'),
(4, 1, 'Umbro'),
(5, 2, 'Nike');

-- --------------------------------------------------------

--
-- Table structure for table `porudzbine`
--

CREATE TABLE IF NOT EXISTS `porudzbine` (
  `porudzbine_id` int(11) NOT NULL AUTO_INCREMENT,
  `porudzbine_id_korisnika` int(11) NOT NULL,
  `porudzbine_ime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `porudzbine_prezime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `porudzbine_telefon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `porudzbine_adresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `porudzbine_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `porudzbine_ukupno` decimal(11,2) NOT NULL,
  PRIMARY KEY (`porudzbine_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE IF NOT EXISTS `proizvodi` (
  `proizvodi_id` int(11) NOT NULL AUTO_INCREMENT,
  `proizvodi_kategorije_id` int(11) NOT NULL,
  `proizvodi_podkategorije_id` int(11) NOT NULL,
  `proizvodi_naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `proizvodi_cena` decimal(11,2) NOT NULL,
  `proizvodi_opis` text COLLATE utf8_unicode_ci NOT NULL,
  `proizvodi_barkod` int(11) NOT NULL,
  `proizvodi_istaknuti` int(1) NOT NULL,
  `proizvodi_najpopularniji` int(1) NOT NULL,
  PRIMARY KEY (`proizvodi_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`proizvodi_id`, `proizvodi_kategorije_id`, `proizvodi_podkategorije_id`, `proizvodi_naziv`, `proizvodi_cena`, `proizvodi_opis`, `proizvodi_barkod`, `proizvodi_istaknuti`, `proizvodi_najpopularniji`) VALUES
(4, 1, 2, 'Addidas new ', '9852.00', '', 4564654, 1, 1),
(3, 1, 2, 'Air max 90', '15000.00', '', 54464646, 1, 0),
(5, 1, 2, 'Air max 90', '15000.00', '', 54464646, 1, 0),
(6, 2, 2, 'Air max 90', '15000.00', '', 54464646, 1, 0),
(7, 1, 2, 'Addidas new ', '9852.00', '', 4564654, 1, 1),
(8, 1, 2, 'Addidas new ', '9852.00', '', 4564654, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_slika` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_naslov` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_podnaslov` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_text` text COLLATE utf8_unicode_ci NOT NULL,
  `slider_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_slika`, `slider_naslov`, `slider_podnaslov`, `slider_text`, `slider_link`) VALUES
(1, 'girl1.jpg', 'Prodaja najnovijih modela patika', 'Super cene', 'Kupite kod nas', 'http://www.sportvision.rs/'),
(2, 'girl2.jpg', '', '', '', ''),
(3, 'girl3.jpg', 'Novi modeli', 'Adidas,Nike,Reebok', '', ''),
(4, 'girl3.jpg', 'Novi modeli', 'Adidas,Nike,Reebok', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `slike`
--

CREATE TABLE IF NOT EXISTS `slike` (
  `slike_id` int(11) NOT NULL AUTO_INCREMENT,
  `slike_id_proizvoda` int(11) NOT NULL,
  `slike_slika` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`slike_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `slike`
--

INSERT INTO `slike` (`slike_id`, `slike_id_proizvoda`, `slike_slika`) VALUES
(1, 4, 'pictures/slike/reebookpatike.jpg'),
(2, 3, 'pictures/slike/filapatike.jpg'),
(3, 5, 'pictures/slike/nikepatike.jpg'),
(4, 6, 'pictures/slike/adidaspatike.jpg'),
(5, 7, 'pictures/slike/nikepatike.jpg'),
(6, 8, 'pictures/slike/reebookpatike.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stavke_produdzbine`
--

CREATE TABLE IF NOT EXISTS `stavke_produdzbine` (
  `stavke_porudzbine_id` int(11) NOT NULL AUTO_INCREMENT,
  `stavke_porudzbine_id_porudzbine` int(11) NOT NULL,
  `stavke_porudzbine_id_proizvoda` int(11) NOT NULL,
  `stavke_porudzbine_cena` decimal(11,2) NOT NULL,
  `stavke_porudzbine_kolicina` int(11) NOT NULL,
  `stavke_porudzbine_ukupno` decimal(11,2) NOT NULL,
  PRIMARY KEY (`stavke_porudzbine_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
