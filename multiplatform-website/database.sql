DROP DATABASE IF EXISTS shopDB;
CREATE DATABASE shopDB;

USE shopDB;

CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(64) NOT NULL,
    stock INT NOT NULL,
    price INT NOT NULL,
    filename VARCHAR(64) NOT NULL
);

CREATE TABLE purchases (
    purchase_id INT AUTO_INCREMENT PRIMARY KEY,
    purchase_cost INT NOT NULL,
    bank_number INT NOT NULL,
    user_address VARCHAR(64) NOT NULL,
    postcode VARCHAR(8) NOT NULL,
    product_id INT
);

INSERT INTO products (product_id, product_name, stock, price, filename) VALUES
(1, "product_1", 100, 800.00, "test-cover.jpg"),
(2, "product_2", 90, 1.99, "test-cover.jpg"),
(3, "product_3", 10, 2.99, "test-cover.jpg"),
(4, "product_4", 11, 5.99, "test-cover.jpg"),
(5, "product_5", 60, 10, "test-cover.jpg"),
(6, "product_6", 15, 80, "test-cover.jpg"),
(7, "product_7", 17, 500, "test-cover.jpg"),
(8, "product_8", 89, 125.99, "test-cover.jpg"),
(9, "product_9", 120, 250.99, "test-cover.jpg");