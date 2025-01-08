-- Arcadia PostGres init script
-- Copy paste as-is, It is assumed the database is created, blank, and deployed.

CREATE TYPE staff_level AS ENUM ('Vet', 'Mod', 'Admin');
CREATE TYPE day_of_week AS ENUM ('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
CREATE TYPE review_status AS ENUM ('Pending', 'Approved', 'Rejected');

CREATE TABLE IF NOT EXISTS Staff(
    id SERIAL PRIMARY KEY,
    level staff_level,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    passwordHash VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Images(
    id SERIAL PRIMARY KEY,  
    path TEXT UNIQUE NOT NULL,
    uploadDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Habitat(
    id SERIAL PRIMARY KEY,  
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    image_id SERIAL REFERENCES Images(id)
);

CREATE TABLE IF NOT EXISTS Services(
    id SERIAL PRIMARY KEY,  
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    image_id SERIAL REFERENCES Images(id)
);

CREATE TABLE IF NOT EXISTS Days(
    id SERIAL PRIMARY KEY,
    day day_of_week,
    openTime TIME NOT NULL,
    closeTime TIME NOT NULL,
    isOpen BOOLEAN NOT NULL DEFAULT FALSE
);

CREATE TABLE IF NOT EXISTS Animal(
    id SERIAL PRIMARY KEY,  
    name VARCHAR(255) NOT NULL,
    race VARCHAR(255) NOT NULL,
    image_id SERIAL REFERENCES Images(id),
    habitat_id SERIAL REFERENCES Habitat(id)
);

CREATE TABLE IF NOT EXISTS AnimalLog(
    id SERIAL PRIMARY KEY,  
    animalReview TEXT NOT NULL,
    suggestedFood TEXT NOT NULL,
    suggestedFoodKilogram FLOAT NOT NULL,
    logDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    animalReviewDetail TEXT NULL,
    animal_id SERIAL REFERENCES Animal(id),
    mod_id SERIAL REFERENCES Staff(id)
);

CREATE TABLE IF NOT EXISTS AnimalFoodLog(
    id SERIAL PRIMARY KEY,  
    givenFood TEXT NOT NULL,
    givenFoodKilogram FLOAT NOT NULL,
    logDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    animal_id SERIAL REFERENCES Animal(id),
    mod_id SERIAL REFERENCES Staff(id)
);

CREATE TABLE IF NOT EXISTS Contact(
    id SERIAL PRIMARY KEY,  
    title VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    contactDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Review(
    id SERIAL PRIMARY KEY,  
    status review_status NOT NULL DEFAULT 'Pending',
    reviewDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);