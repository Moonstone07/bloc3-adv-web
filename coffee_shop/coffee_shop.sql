CREATE TABLE drink_types (
    drinkTypeID INT PRIMARY KEY AUTO_INCREMENT,
    drinkType VARCHAR(256) NOT NULL,
);

INSERT INTO
    `drink_type`(`drinkTypeID`, `drinkType`)
VALUES
    ('[coffee]', '[tea]', '[hot chocolate]', '[milkshake]', '[smoothie]');

CREATE TABLE drink_temps (
    drinkTempID INT PRIMARY KEY AUTO_INCREMENT,
    drinkTemp VARCHAR(256) NOT NULL,
);

INSERT INTO
    `drink_temps`(`drinkTempID`, `drinkTemp`)
VALUES
    ('[hot]', '[cold]');

CREATE TABLE drink_sizes (
    drinkSizeID INT PRIMARY KEY AUTO_INCREMENT,
    drinkSize VARCHAR(256) NOT NULL,
);

INSERT INTO
    `drink_sizes`(`drinkSizeID`, `drinkSize`)
VALUES
    ('[small]', '[medium]', '[large]');

CREATE TABLE drink_strengths (
    drinkStrengthID INT PRIMARY KEY AUTO_INCREMENT,
    drinkStrength VARCHAR(256) NOT NULL,
);

INSERT INTO
    `drink_strengths`(`drinkStrengthID`, `drinkStrength`)
VALUES
    ('[smooth]', '[light]', '[medium]', '[strong]');