-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 03, 2023 at 10:04 PM
-- Server version: 10.3.38-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 8.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tischa79_adv_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `PetID` int(11) NOT NULL,
  `PetName` varchar(256) NOT NULL,
  `PetAge` int(11) NOT NULL,
  `PetGender` varchar(256) NOT NULL,
  `PetColor` varchar(256) NOT NULL,
  `PetSpeciesID` int(11) NOT NULL,
  `PetBreedID` int(11) NOT NULL,
  `PetToyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`PetID`, `PetName`, `PetAge`, `PetGender`, `PetColor`, `PetSpeciesID`, `PetBreedID`, `PetToyID`) VALUES
(1, 'margot', 1, 'female', 'orange and black', 1, 2, 2),
(2, 'nicholas', 7, 'male', 'black', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `PetBreed`
--

CREATE TABLE `PetBreed` (
  `PetBreedID` int(11) NOT NULL,
  `PetBreedName` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `PetBreed`
--

INSERT INTO `PetBreed` (`PetBreedID`, `PetBreedName`) VALUES
(1, 'short hair black '),
(2, 'coqlicot');

-- --------------------------------------------------------

--
-- Table structure for table `PetSpecies`
--

CREATE TABLE `PetSpecies` (
  `PetSpeciesID` int(11) NOT NULL,
  `SpeciesName` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `PetSpecies`
--

INSERT INTO `PetSpecies` (`PetSpeciesID`, `SpeciesName`) VALUES
(1, 'cat');

-- --------------------------------------------------------

--
-- Table structure for table `PetToy`
--

CREATE TABLE `PetToy` (
  `PetToyID` int(11) NOT NULL,
  `PetToyName` varchar(256) NOT NULL,
  `PetToyPrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `PetToy`
--

INSERT INTO `PetToy` (`PetToyID`, `PetToyName`, `PetToyPrice`) VALUES
(1, 'mouse', 3.00),
(2, 'ball', 5.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`PetID`),
  ADD KEY `PetBreedID` (`PetBreedID`),
  ADD KEY `PetSpeciesID` (`PetSpeciesID`),
  ADD KEY `PetToyID` (`PetToyID`);

--
-- Indexes for table `PetBreed`
--
ALTER TABLE `PetBreed`
  ADD PRIMARY KEY (`PetBreedID`);

--
-- Indexes for table `PetSpecies`
--
ALTER TABLE `PetSpecies`
  ADD PRIMARY KEY (`PetSpeciesID`);

--
-- Indexes for table `PetToy`
--
ALTER TABLE `PetToy`
  ADD PRIMARY KEY (`PetToyID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `PetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `PetBreed`
--
ALTER TABLE `PetBreed`
  MODIFY `PetBreedID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `PetSpecies`
--
ALTER TABLE `PetSpecies`
  MODIFY `PetSpeciesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `PetToy`
--
ALTER TABLE `PetToy`
  MODIFY `PetToyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `PetBreedID` FOREIGN KEY (`PetBreedID`) REFERENCES `PetBreed` (`PetBreedID`),
  ADD CONSTRAINT `PetSpeciesID` FOREIGN KEY (`PetSpeciesID`) REFERENCES `PetSpecies` (`PetSpeciesID`),
  ADD CONSTRAINT `PetToyID` FOREIGN KEY (`PetToyID`) REFERENCES `PetToy` (`PetToyID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
