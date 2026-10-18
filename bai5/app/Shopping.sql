CREATE DATABASE IF NOT EXISTS shopping_cart CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE shopping_cart;

CREATE TABLE products(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    quantity INT NOT NULL
);

CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO products(name, price, quantity)
VALUES
("But bi", 5.5, 27),
("Cuc tay", 15.7, 10),
("But chi", 3.4, 15),
("Giay ghi nho", 23.6, 36),
("Hop but", 115.7, 7),
("Balo", 249.8, 1);

INSERT INTO users(username, password)
VALUES
('admin', '');