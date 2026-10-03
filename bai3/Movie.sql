CREATE DATABASE IF NOT EXISTS movie_manager;
USE movie_manager;

CREATE TABLE movies(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    total_seats INT NOT NULL,
    available_seats INT NOT NULL
);

-- 1
INSERT INTO movies(title, price, total_seats, available_seats)
VALUES
("Avengers", 100000, 100, 80),
("Avatar", 120000, 80, 56),
("Batman", 90000, 120, 79),
("Eternals", 144000, 100, 34),
("Demiurge", 84000, 90, 87);

-- 2
SELECT * FROM movies;

-- 3
SELECT * FROM movies
WHERE movies.price > 100000;

-- 4
SELECT * FROM movies
WHERE movies.available_seats > 50;

-- 5 
SELECT * FROM movies
ORDER BY movies.price DESC;

-- 6
UPDATE movies
SET movies.available_seats = 20
WHERE movies.title = "Avengers";

-- 7
DELETE FROM movies
WHERE movies.title = "Demiurge";

-- 8
SELECT *, total_seats - available_seats AS sold_seats
FROM movies;

-- 9 
SELECT *, (total_seats - available_seats) * price AS DoanhThu
FROM movies;

-- 10
SELECT SUM((total_seats - available_seats) * price)
FROM movies;

-- 11
SELECT *
FROM movies
WHERE (total_seats - available_seats) = (SELECT MAX(total_seats - available_seats) FROM movies);
