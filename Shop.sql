CREATE DATABASE IF NOT EXISTS shopping_cart;
USE shopping_cart;

CREATE TABLE cart_item(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    quantity INT NOT NULL
);

-- 1
INSERT INTO cart_item(name, price, quantity)
VALUES
("But bi", 5.5, 27),
("Cuc tay", 15.7, 10),
("But chi", 3.4, 15),
("Giay ghi nho", 23.6, 36),
("Hop but", 115.7, 7),
("Balo", 249.8, 1);

-- 2
SELECT * FROM cart_item;

-- 3
SELECT ci.id, ci.name, ci.price, ci.quantity
FROM cart_item ci
WHERE ci.price > 100;

-- 4
SELECT ci.id, ci.name, ci.price, ci.quantity
FROM cart_item ci
WHERE ci.quantity > 5;

-- 5
SELECT *
FROM cart_item ci
ORDER BY ci.price DESC;

-- 6 
UPDATE cart_item
SET cart_item.price = 725.8
WHERE cart_item.name LIKE "Balo";

-- 7
UPDATE cart_item
SET cart_item.quantity = 19
WHERE cart_item.name = "But chi";

-- 8 
DELETE FROM cart_item
WHERE cart_item.name LIKE "Giay ghi nho";

-- 9
SELECT ci.name, ci.price, ci.quantity, ci.price * ci.quantity AS ThanhTien
FROM cart_item ci;

-- 10
SELECT SUM(ci.price * ci.quantity)
FROM cart_item ci;