<!-- creating parent table -->

CREATE TABLE `tischa79_adv_web`.`pet` (`PetID` INT NOT NULL AUTO_INCREMENT , `PetName` VARCHAR(256) NOT NULL , `PetAge` INT NOT NULL , `PetGender` VARCHAR(256) NOT NULL , `PetColor` VARCHAR(256) NOT NULL , `PetSpeciesID` INT NOT NULL , `PetBreedID` INT NOT NULL , `PetToyID` INT NOT NULL , PRIMARY KEY (`PetID`)) ENGINE = InnoDB;


<!-- creating children tables -->

CREATE TABLE `tischa79_adv_web`.`PetSpecies` (`PetSpeciesID` INT NOT NULL AUTO_INCREMENT , `SpeciesName` VARCHAR(256) NOT NULL , PRIMARY KEY (`SpeciesID`)) ENGINE = InnoDB;

CREATE TABLE `tischa79_adv_web`.`PetBreed` (`PetBreedID` INT NOT NULL AUTO_INCREMENT , `PetBreedName` VARCHAR(256) NOT NULL , `PetSpeciesID` INT NOT NULL , PRIMARY KEY (`PetBreedID`)) ENGINE = InnoDB;

CREATE TABLE `tischa79_adv_web`.`PetToy` (`PetToyID` INT NOT NULL AUTO_INCREMENT , `PetToyName` VARCHAR(256) NOT NULL , `PetSpeciesID` INT NOT NULL , `PetToyPrice` DECIMAL(10,2) NOT NULL, PRIMARY KEY (`PetToyID`)) ENGINE = InnoDB;

<!-- creating foreign keys for parent table -->

ALTER TABLE `pet` ADD CONSTRAINT `PetBreedID` FOREIGN KEY (`PetBreedID`) REFERENCES `PetBreed`(`PetBreedID`) ON DELETE RESTRICT ON UPDATE RESTRICT; ALTER TABLE `pet` ADD CONSTRAINT `PetSpeciesID` FOREIGN KEY (`PetSpeciesID`) REFERENCES `PetSpecies`(`PetSpeciesID`) ON DELETE RESTRICT ON UPDATE RESTRICT; ALTER TABLE `pet` ADD CONSTRAINT `PetToyID` FOREIGN KEY (`PetToyID`) REFERENCES `PetToy`(`PetToyID`) ON DELETE RESTRICT ON UPDATE RESTRICT;


<!-- inserting information into the tables -->

INSERT INTO `PetBreed` (`PetBreedID`, `PetBreedName`) VALUES (NULL, 'short hair black '), (NULL, 'coqlicot')

INSERT INTO `PetSpecies` (`PetSpeciesID`, `SpeciesName`) VALUES (NULL, 'cat'), (NULL, 'cat')

INSERT INTO `PetToy` (`PetToyID`, `PetToyName`, `PetToyPrice`) VALUES (NULL, 'mouse', '3.00'), (NULL, 'ball', '5.00')

<!-- inserting info in the parent table -->

INSERT INTO `pet` (`PetID`, `PetName`, `PetAge`, `PetGender`, `PetColor`, `PetSpeciesID`, `PetBreedID`, `PetToyID`) VALUES (NULL, 'margot', '1', 'female', 'orange and black', '1', '2', '2'), (NULL, 'nicholas', '7', 'male', 'black', '1', '1', '1')



<!-- JOINNING tables -->
SELECT * FROM `pet` NATURAL JOIN PetBreed NATURAL JOIN PetSpecies NATURAL JOIN PetToy;









ALTER TABLE `PetBreed` ADD CONSTRAINT `PetSpeciesID` FOREIGN KEY (`PetSpeciesID`) REFERENCES `PetSpecies`(`PetSpeciesID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
<!-- Why did i get an error when trying to add the PetSpeciesID as a foreign key -->