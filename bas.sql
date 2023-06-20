-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 08:51 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bas`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikelen`
--

CREATE TABLE `artikelen` (
  `artId` int(11) NOT NULL,
  `artOmschrijving` varchar(12) NOT NULL,
  `artInkoop` decimal(5,2) DEFAULT NULL,
  `artVerkoop` decimal(5,2) DEFAULT NULL,
  `artVoorraad` int(11) NOT NULL,
  `artMinVoorraad` int(11) NOT NULL,
  `artMaxVoorraad` int(11) NOT NULL,
  `artLocatie` int(11) DEFAULT NULL,
  `levId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikelen`
--

INSERT INTO `artikelen` (`artId`, `artOmschrijving`, `artInkoop`, `artVerkoop`, `artVoorraad`, `artMinVoorraad`, `artMaxVoorraad`, `artLocatie`, `levId`) VALUES
(16, 'NFT Pepe Bee', '99.99', '199.99', 10, 3, 20, 1, 1),
(17, 'Viral Cat T-', '14.99', '29.99', 50, 5, 100, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `inkooporders`
--

CREATE TABLE `inkooporders` (
  `inkOrdId` int(11) NOT NULL,
  `levId` int(11) DEFAULT NULL,
  `artId` int(11) DEFAULT NULL,
  `inkOrdDatum` date DEFAULT NULL,
  `inkOrdBestAantal` int(11) DEFAULT NULL,
  `inkOrdStatus` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inkooporders`
--

INSERT INTO `inkooporders` (`inkOrdId`, `levId`, `artId`, `inkOrdDatum`, `inkOrdBestAantal`, `inkOrdStatus`) VALUES
(9, 51, 16, '2023-01-05', 5, 1),
(10, 52, 17, '2023-02-10', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `klanten`
--

CREATE TABLE `klanten` (
  `klantid` int(11) NOT NULL,
  `klantnaam` varchar(20) DEFAULT NULL,
  `klantEmail` varchar(30) NOT NULL,
  `klantAdres` varchar(30) NOT NULL,
  `klantPostcode` varchar(6) DEFAULT NULL,
  `klantWoonplaats` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klanten`
--

INSERT INTO `klanten` (`klantid`, `klantnaam`, `klantEmail`, `klantAdres`, `klantPostcode`, `klantWoonplaats`) VALUES
(10, 'Meme Lover', 'memelover@gmail.com', 'Meme Street 10', '1234 A', 'Amsterdam'),
(11, 'CrazyCatLady', 'catlady@hotmail.com', 'Troll Avenue 20', '5678 C', 'Rotterdam'),
(14, 'yoyo', 'iuweef@gmail.com', 'iujekrnf', '7898jj', 'ierjgnf'),
(15, 'aaa', 'aaa@gmail.com', 'aaa', 'aaaa33', 'aaaa'),
(16, 'yes', 'yes@gmail.com', 'yes', '5555uu', 'yes'),
(17, 'Hallo', 'hallo@gmail.com', 'hallostraat', '1234AB', 'ergens in rotterdam'),
(18, 'bbbbbbb', 'bbbbbb@gmail.com', 'haosdjflkh', '1234AB', 'niet');

-- --------------------------------------------------------

--
-- Table structure for table `leveranciers`
--

CREATE TABLE `leveranciers` (
  `levid` int(11) NOT NULL,
  `levnaam` varchar(15) NOT NULL,
  `levcontact` varchar(20) DEFAULT NULL,
  `levEmail` varchar(30) NOT NULL,
  `levAdres` varchar(30) DEFAULT NULL,
  `levPostcode` varchar(6) DEFAULT NULL,
  `levWoonplaats` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leveranciers`
--

INSERT INTO `leveranciers` (`levid`, `levnaam`, `levcontact`, `levEmail`, `levAdres`, `levPostcode`, `levWoonplaats`) VALUES
(51, 'Doritos Co.', 'John Doritos', 'john@doritos.com', 'MLG Street 360', '1234 A', 'Gamer City'),
(52, 'Mountain Dew In', 'Dewy Dew', 'dewy@dew.com', 'Dorito Avenue 420', '5678 C', 'Memeville'),
(53, 'Quickscope Ente', 'Barry Quickscope', 'barry@quickscope.com', 'MLG Boulevard 720', '9012 E', 'Pro Town'),
(54, '420BlazeIt Corp', 'Blaze McBlazer', 'blaze@420blazeit.com', 'MLG Lane 69', '3456 G', 'Smoke City'),
(55, 'Sunglasses Empo', 'Shady Shades', 'shady@sunglasses.com', 'MLG Plaza 360', '7890 I', 'Swagger Town'),
(56, 'Epic Gaming Gea', 'Max Gamer', 'max@gaminggear.com', 'MLG Road 42', '2345 K', 'E-Sports City'),
(57, 'NoScope Optics', 'Lenny NoScope', 'lenny@noscope.com', 'MLG Street 9001', '6789 M', 'Snipeville'),
(58, 'Sonic MLG Burge', 'Sonic Swag', 'sonic@mlgburgers.com', 'MLG Boulevard 1337', '0123 O', 'Munch City'),
(59, 'PewPew Electron', 'Pete PewPew', 'pete@pewpewelectronics.com', 'MLG Avenue 360', '4567 Q', 'Gaming District'),
(60, 'Gamer Fuel Supp', 'Frank Fuel', 'frank@gamerfuel.com', 'MLG Lane 720', '8901 S', 'Boost City'),
(61, 'Trickshot Tech', 'Trevor Trickshot', 'trevor@trickshottech.com', 'MLG Road 360', '2345 U', 'Swag Town'),
(62, 'Dank Meme Merch', 'Dan Dank', 'dan@dankmememerch.com', 'MLG Street 420', '6789 W', 'Meme City'),
(63, 'Gaming Console ', 'Gary Console', 'gary@consoleempire.com', 'MLG Boulevard 69', '0123 Y', 'Gameville'),
(64, 'Smoke Grenade S', 'Samantha Smoke', 'samantha@smokegrenade.com', 'MLG Plaza 9001', '4567 A', 'Fog City'),
(66, 'Swag Merchandis', 'Sally Swag', 'sally@swagmerch.com', 'MLG Lane 360', '2345 E', 'Swagger City'),
(67, 'Dorito Dust Co.', 'Dusty Dorito', 'dusty@doritodust.com', 'MLG Road 720', '6789 G', 'Flavor Town'),
(68, 'MLG Supply Stor', 'Marty MLG', 'marty@mlgsupply.com', 'MLG Street 360', '0123 I', 'Pro City'),
(69, 'MemeMaster Acce', 'Manny MemeMaster', 'manny@mememaster.com', 'MLG Boulevard 420', '4567 K', 'Meme District'),
(70, 'Quick Revive En', 'Quincy Revive', 'quincy@quickrevive.com', 'MLG Plaza 69', '8901 M', 'Energy City');

-- --------------------------------------------------------

--
-- Table structure for table `verkooporders`
--

CREATE TABLE `verkooporders` (
  `verkOrdId` int(11) NOT NULL,
  `klantId` int(11) DEFAULT NULL,
  `artId` int(11) DEFAULT NULL,
  `verkOrdDatum` date DEFAULT NULL,
  `verkOrdBestAantal` int(11) DEFAULT NULL,
  `verkOrdStatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verkooporders`
--

INSERT INTO `verkooporders` (`verkOrdId`, `klantId`, `artId`, `verkOrdDatum`, `verkOrdBestAantal`, `verkOrdStatus`) VALUES
(12, 14, 16, '2023-06-01', 50, 2),
(13, 16, 18, '2023-06-15', 235, 1),
(14, 12, 17, '2023-06-12', 88, 0),
(16, 10, 16, '2023-06-23', 79, 2),
(17, 10, 16, '2023-06-23', 11, 0),
(18, 18, 17, '2023-06-15', 686, 0),
(19, 10, 16, '0000-00-00', 2147483647, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikelen`
--
ALTER TABLE `artikelen`
  ADD PRIMARY KEY (`artId`),
  ADD KEY `levId` (`levId`);

--
-- Indexes for table `inkooporders`
--
ALTER TABLE `inkooporders`
  ADD PRIMARY KEY (`inkOrdId`),
  ADD KEY `levId` (`levId`),
  ADD KEY `artId` (`artId`);

--
-- Indexes for table `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`klantid`);

--
-- Indexes for table `leveranciers`
--
ALTER TABLE `leveranciers`
  ADD PRIMARY KEY (`levid`);

--
-- Indexes for table `verkooporders`
--
ALTER TABLE `verkooporders`
  ADD PRIMARY KEY (`verkOrdId`),
  ADD KEY `klantId` (`klantId`),
  ADD KEY `artId` (`artId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikelen`
--
ALTER TABLE `artikelen`
  MODIFY `artId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `inkooporders`
--
ALTER TABLE `inkooporders`
  MODIFY `inkOrdId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `klanten`
--
ALTER TABLE `klanten`
  MODIFY `klantid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `leveranciers`
--
ALTER TABLE `leveranciers`
  MODIFY `levid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `verkooporders`
--
ALTER TABLE `verkooporders`
  MODIFY `verkOrdId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
