-- Arcadia MariaDB init script
-- Copy paste as-is.

CREATE DATABASE IF NOT EXISTS `arcadia`;
USE `arcadia`;

CREATE TABLE IF NOT EXISTS Staff(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    level enum('Vet','Mod','Admin'),
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    passwordHash VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Images(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    path VARCHAR(255) UNIQUE NOT NULL,
    uploadDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Habitat(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    image_id INT,
    FOREIGN KEY (image_id) REFERENCES Images(id)
);

CREATE TABLE IF NOT EXISTS Services(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    image_id INT,
    FOREIGN KEY (image_id) REFERENCES Images(id)
);

CREATE TABLE IF NOT EXISTS Days(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    day enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'),
    openTime TIME NOT NULL,
    closeTime TIME NOT NULL,
    isOpen BOOLEAN NOT NULL DEFAULT FALSE
);

CREATE TABLE IF NOT EXISTS Animal(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    name VARCHAR(255) NOT NULL,
    race VARCHAR(255) NOT NULL,
    habitat_id INT,
    image_id INT,
    FOREIGN KEY (habitat_id) REFERENCES Habitat(id),
    FOREIGN KEY (image_id) REFERENCES Images(id)
);

CREATE TABLE IF NOT EXISTS AnimalLog(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    animalReview TEXT NOT NULL,
    suggestedFood TEXT NOT NULL,
    suggestedFoodKilogram FLOAT NOT NULL,
    logDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    animalReviewDetail TEXT NULL,
    animal_id INT NOT NULL,
    mod_id INT NOT NULL,
    FOREIGN KEY (animal_id) REFERENCES Animal(id),
    FOREIGN KEY (mod_id) REFERENCES Staff(id)
);

CREATE TABLE IF NOT EXISTS AnimalFoodLog(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    givenFood TEXT NOT NULL,
    givenFoodKilogram FLOAT NOT NULL,
    logDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    animal_id INT NOT NULL,
    mod_id INT NOT NULL,
    FOREIGN KEY (animal_id) REFERENCES Animal(id),
    FOREIGN KEY (mod_id) REFERENCES Staff(id)
);
CREATE TABLE IF NOT EXISTS Contact(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    title VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    contactDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Review(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    status enum('Pending','Approved','Rejected') NOT NULL DEFAULT 'Pending',
    reviewDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);