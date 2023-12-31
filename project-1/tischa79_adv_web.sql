-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 03, 2023 at 10:04 PM
-- Server version: 10.3.38-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 8.2.11
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tischa_pet_store`
--
-- --------------------------------------------------------
--
-- Table structure for table `pets`
--
CREATE TABLE `pets` (
  `pet_id` int(11) NOT NULL,
  `pet_name` varchar(256) NOT NULL,
  `pet_gender` varchar(256) NOT NULL,
  `pet_age` int(11) NOT NULL,
  `pet_color` varchar(256) NOT NULL,
  `breed_id` int(11) NOT NULL,
  `species_id` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;

-- --------------------------------------------------------
--
-- Table structure for table `pet_breed`
--
CREATE TABLE `pet_breed` (
  `pet_breed_id` int(11) NOT NULL,
  `pet_breed_name` varchar(256) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;

--
-- Dumping data for table `pet_breed`
--
INSERT INTO
  `pet_breed` (`pet_breed_id`, `pet_breed_name`)
VALUES
  (1, 'coclico'),
  (2, 'spanish cat'),
  (3, 'pomeranian'),
  (4, 'chihuahua');

-- --------------------------------------------------------
--
-- Table structure for table `pet_species`
--
CREATE TABLE `pet_species` (
  `pet_species_id` int(11) NOT NULL,
  `pet_species_type` varchar(256) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;

--
-- Dumping data for table `pet_species`
--
INSERT INTO
  `pet_species` (`pet_species_id`, `pet_species_type`)
VALUES
  (1, 'cat'),
  (2, 'dog'),
  (3, 'bird'),
  (4, 'monkey'),
  (5, 'rodent');

-- --------------------------------------------------------
--
-- Table structure for table `pet_toy`
--
CREATE TABLE `pet_toy` (
  `pet_toy_id` int(11) NOT NULL,
  `pet_toy_name` varchar(256) NOT NULL,
  `pet_toy_price` decimal(10, 0) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;

--
-- Dumping data for table `pet_toy`
--
INSERT INTO
  `pet_toy` (`pet_toy_id`, `pet_toy_name`, `pet_toy_price`)
VALUES
  (1, 'ball', 1),
  (2, 'mouse', 2);

--
-- Indexes for dumped tables
--
--
-- Indexes for table `pets`
--
ALTER TABLE
  `pets`
ADD
  PRIMARY KEY (`pet_id`);

--
-- Indexes for table `pet_breed`
--
ALTER TABLE
  `pet_breed`
ADD
  PRIMARY KEY (`pet_breed_id`);

--
-- Indexes for table `pet_species`
--
ALTER TABLE
  `pet_species`
ADD
  PRIMARY KEY (`pet_species_id`);

--
-- Indexes for table `pet_toy`
--
ALTER TABLE
  `pet_toy`
ADD
  PRIMARY KEY (`pet_toy_id`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE
  `pets`
MODIFY
  `pet_id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 4;

--
-- AUTO_INCREMENT for table `pet_breed`
--
ALTER TABLE
  `pet_breed`
MODIFY
  `pet_breed_id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 5;

--
-- AUTO_INCREMENT for table `pet_species`
--
ALTER TABLE
  `pet_species`
MODIFY
  `pet_species_id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 6;

--
-- AUTO_INCREMENT for table `pet_toy`
--
ALTER TABLE
  `pet_toy`
MODIFY
  `pet_toy_id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 3;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;