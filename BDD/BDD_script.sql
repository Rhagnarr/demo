-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 11, 2018 at 11:04 PM
-- Server version: 5.7.22-0ubuntu18.04.1
-- PHP Version: 7.2.5-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PatriMap`
--

-- --------------------------------------------------------

--
-- Table structure for table `Commentaires`
--

CREATE TABLE `Commentaires` (
  `Id_User` int(11) NOT NULL,
  `Id_Patri` int(11) NOT NULL,
  `Commentaires` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Like`
--

CREATE TABLE `Like` (
  `Id_User` int(11) NOT NULL,
  `Id_Patri` int(11) NOT NULL,
  `Like_Dislike` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Note`
--

CREATE TABLE `Note` (
  `Id_User` int(11) NOT NULL,
  `Id_Patri` int(11) NOT NULL,
  `Note` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Patrimoine`
--

CREATE TABLE `Patrimoine` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL,
  `Latitude` double NOT NULL,
  `Longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Patrimoine`
--

INSERT INTO `Patrimoine` (`Id`, `Nom`, `Description`, `Latitude`, `Longitude`) VALUES
(1, 'Tour Nessel', 'Un endroit a squats', 12.6, 52.3),
(2, 'Nom', 'Description', 12.3, 63.2);

-- --------------------------------------------------------

--
-- Table structure for table `Photos`
--

CREATE TABLE `Photos` (
  `Id` int(11) NOT NULL,
  `Id_Patri` int(11) NOT NULL,
  `Photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Utilisateur`
--

INSERT INTO `Utilisateur` (`Id`, `Nom`, `Prenom`, `Avatar`, `Email`, `Password`) VALUES
(1, 'zer', 'ezr', NULL, 'zer@zer', '3a7e7d74e2bd1472c9a950b72b1e0c63097c4f01'),
(2, 'pop', 'pop', NULL, 'pop@pop', '33b496a825e8779d8b32826c4f5e3b1496f90c22');

-- --------------------------------------------------------

--
-- Table structure for table `Visité`
--

CREATE TABLE `Visité` (
  `Id_User` int(11) NOT NULL,
  `Id_Patri` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Commentaires`
--
ALTER TABLE `Commentaires`
  ADD PRIMARY KEY (`Id_User`,`Id_Patri`);

--
-- Indexes for table `Like`
--
ALTER TABLE `Like`
  ADD PRIMARY KEY (`Id_User`,`Id_Patri`);

--
-- Indexes for table `Note`
--
ALTER TABLE `Note`
  ADD PRIMARY KEY (`Id_User`,`Id_Patri`);

--
-- Indexes for table `Patrimoine`
--
ALTER TABLE `Patrimoine`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Photos`
--
ALTER TABLE `Photos`
  ADD PRIMARY KEY (`Id`,`Id_Patri`);

--
-- Indexes for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Visité`
--
ALTER TABLE `Visité`
  ADD PRIMARY KEY (`Id_User`,`Id_Patri`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Patrimoine`
--
ALTER TABLE `Patrimoine`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
