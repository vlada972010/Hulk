-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2017 at 11:17 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hulksuplementi`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `id` int(3) UNSIGNED NOT NULL,
  `ime` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `obrisano` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`id`, `ime`, `slika`, `obrisano`) VALUES
(1, 'Aminokiseline', 'amino.png', 0),
(3, 'Simulatori hormona', 'hotmoni.png', 0),
(4, 'Zastita prostate i potencija', 'prostata.png', 0),
(5, 'Kreatini', 'kreatin.png', 0),
(6, 'No reaktori', 'no reaktor.png', 0),
(7, 'Ugljeni hidrati', 'hidrati.png', 0),
(8, 'Oprema', 'oprema.png', 0),
(9, 'Proteini', 'proteini.png', 0),
(10, 'Sagorevac masti', 'sagorevac.png', 0),
(11, 'Vitamini i minerali', 'minerali.png', 0),
(12, 'Zastita zglobova i tetiva', 'zastita.png', 0),
(13, 'Korisne masti', 'masti.png', 0),
(14, 'Cokoladice i napici', 'cokolade.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `korpa`
--

CREATE TABLE `korpa` (
  `id` int(3) UNSIGNED NOT NULL,
  `idkupca` int(11) NOT NULL,
  `idproizvoda` int(11) NOT NULL,
  `kupljen` int(1) NOT NULL DEFAULT '0',
  `datumnarudzbine` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `datumkupovine` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korpa`
--

INSERT INTO `korpa` (`id`, `idkupca`, `idproizvoda`, `kupljen`, `datumnarudzbine`, `datumkupovine`) VALUES
(30, 8, 1, 1, '2017-06-24 19:52:44', '2017-06-24 19:52:47'),
(27, 2, 40, 1, '2017-06-24 10:58:55', '2017-06-24 10:58:57'),
(26, 2, 42, 1, '2017-06-24 10:58:52', '2017-06-24 10:58:58'),
(25, 2, 23, 1, '2017-06-24 10:58:50', '2017-06-24 10:58:59'),
(24, 2, 2, 1, '2017-06-24 10:58:48', '2017-06-24 10:58:59'),
(32, 2, 2, 1, '2017-06-25 23:37:54', '2017-06-25 23:37:57'),
(38, 2, 1, 1, '2017-07-08 10:18:04', '2017-07-08 10:18:14');

-- --------------------------------------------------------

--
-- Table structure for table `suplementi`
--

CREATE TABLE `suplementi` (
  `id` int(3) UNSIGNED NOT NULL,
  `naslov` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `cena` decimal(6,2) NOT NULL,
  `slika` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `kategorija` int(11) NOT NULL,
  `akcija` int(3) NOT NULL,
  `obrisano` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `suplementi`
--

INSERT INTO `suplementi` (`id`, `naslov`, `cena`, `slika`, `kategorija`, `akcija`, `obrisano`) VALUES
(1, 'Amino Hydro 32', '3300.00', 'amino.png', 1, 1, 0),
(2, 'BULGARIAN TRIBULUS 90CAP', '3200.00', 'zastita.png', 4, 1, 0),
(3, 'PROSTECARE 60C', '1500.00', 'zastita1.png', 4, 0, 0),
(4, 'SAW PALMETTO EKSTRACT 60C', '1200.00', 'zastita2.png', 4, 0, 0),
(5, 'TESTOSTRO GROW HP2 126TAB', '5490.00', 'zastita3.png', 4, 0, 0),
(23, 'ARGI-NO-300GR', '2050.00', 'no reaktor.png', 6, 0, 0),
(11, 'ARGININE FUEL 500MG 90C', '1500.00', 'simulatori.png', 3, 0, 0),
(8, 'TRIBU WITH ZMA 90C', '3300.00', 'zastita6.png', 4, 0, 0),
(9, 'TRIBULUS 500MG', '1300.00', 'zastita4.png', 4, 0, 0),
(10, 'Tribulus Fuel\r\n', '2200.00', 'zastita5.png', 4, 0, 0),
(13, 'BULGARIAN TRIBULUS 90CAP', '3200.00', 'simulatori1.png', 3, 0, 0),
(14, 'GH Stimulant Maximum\r\n', '1800.00', 'simulatori2.png', 3, 0, 0),
(15, 'L-Arginine 120kap.\r\n', '1800.00', 'simulatori3.png', 3, 0, 0),
(16, 'MELATONIN CAPS 3MG 60C.\r\n', '1400.00', 'simulatori4.png', 3, 0, 0),
(17, 'TESTO FUEL 100T.\r\n', '2490.00', 'simulatori5.png', 3, 0, 0),
(18, 'Beta K', '4900.00', 'kreatin.png', 5, 0, 0),
(19, 'C2 STRENGHT', '2700.00', 'kreatin1.png', 5, 0, 0),
(20, 'Crea Pure', '1600.00', 'kreatin3.png', 5, 0, 0),
(21, 'Core Creatine', '2900.00', 'kreatin2.png', 5, 0, 0),
(22, 'Creatine Fuel 300gr', '1300.00', 'kreatin4.png', 5, 0, 0),
(24, 'ASSAULT-14.5GR', '3050.00', 'no reaktor1.png', 6, 0, 0),
(25, 'ASSAULT-BLACK-30SER', '2050.00', 'no reaktor2.png', 6, 0, 0),
(26, 'Assault-ION3', '2050.00', 'no reaktor3.png', 6, 0, 0),
(27, 'CARBO-MAX-1KG', '3250.00', 'hidrati.png', 7, 1, 0),
(28, 'DEX-ENERGIZER-Lemon', '1250.00', 'hidrati1.png', 7, 0, 0),
(29, 'Iso-Charge-500ml', '2250.00', 'hidrati2.png', 7, 0, 0),
(30, 'ISO-DRINK-500ML', '1050.00', 'hidrati3.png', 7, 0, 0),
(31, '3H-Energizer-Bar', '900.00', 'cokolade.png', 14, 0, 0),
(32, 'FULL-PROTEIN-BAR-50GR', '1900.00', 'cokolade1.png', 14, 0, 0),
(33, 'PROTEIN-BAR-50GR', '700.00', 'cokolade2.png', 14, 0, 0),
(34, 'PROTEIN-SHAKE', '800.00', 'cokolade3.png', 14, 0, 0),
(35, 'ACETYL-L-CARNITINE-120C', '2564.00', 'sagorevac.png', 10, 0, 0),
(36, 'ACTIVE-BURN-25ML', '2345.00', 'sagorevac1.png', 10, 0, 0),
(37, 'ACTIVE-BURN-500', '1214.00', 'sagorevac2.png', 10, 0, 0),
(38, 'ACETYL-L-CARNITINE-120C', '2110.00', 'vitamini.png', 11, 0, 0),
(39, 'ALPHA-LIPOIC-ACID-100MG', '2100.00', 'vitamini1.png', 11, 1, 0),
(40, 'B-50-CAPS', '3110.00', 'vitamini2.png', 11, 0, 0),
(41, '100R-Whey', '5000.00', 'proteini.png', 9, 0, 0),
(42, '100-Whey-750g', '4500.00', 'proteini1.png', 9, 0, 0),
(43, 'CASEINE-1.8KG', '4900.00', 'proteini2.png', 9, 0, 0),
(44, 'WHEY-PROTEIN-FUEL-2.2KG', '3900.00', 'proteini3.png', 9, 0, 0),
(45, 'CORE-CLA-90C', '2509.00', 'masti.png', 13, 0, 0),
(46, 'FISH-OIL-90SG', '2909.00', 'masti1.png', 13, 0, 0),
(47, 'GREENS-SUPERFOOD-30-SERV', '2209.00', 'masti2.png', 13, 0, 0),
(48, 'Alpha-50-amino', '1500.00', 'tetive.png', 12, 0, 0),
(49, 'ELASTI-JOINT', '2600.00', 'tetive1.png', 12, 0, 0),
(50, 'Glucosamine-Chondroitin', '4500.00', 'tetive2.png', 12, 0, 0),
(51, '296-1162-thickbox', '3200.00', 'oprema.png', 8, 0, 0),
(52, '299-1168-thickbox', '1500.00', 'oprema1.png', 8, 0, 0),
(53, 'NESTO', '4200.00', 'oprema2.png', 8, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `confirmPw` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `status`, `email`, `confirmPw`) VALUES
(1, 'administrator', 'administrator', 'Administrator', 'admin@gmail.com', 'administrator'),
(2, 'pera12', '123456', 'gost', 'pera@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korpa`
--
ALTER TABLE `korpa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suplementi`
--
ALTER TABLE `suplementi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `korpa`
--
ALTER TABLE `korpa`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `suplementi`
--
ALTER TABLE `suplementi`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
