<?php

$user_name = 'root';
$password = '';
$localhost = 'localhost';
$database = 'pos';

$conn = new mysqli($localhost, $user_name, $password, $database);

$sql = 'CREATE TABLE IF NOT EXISTS `product`(
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price FLOAT NOT NULL,
    image VARCHAR(100) NULL,
    supplier_id INT(6),
    category_id INT(6),
    FOREIGN KEY (category_id) REFERENCES categories(id),
    FOREIGN KEY (supplier_id) REFERENCES supplier(id)
)';
$conn->query($sql);
$conn->close();