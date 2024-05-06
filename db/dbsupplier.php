<?php

$user_name = 'root';
$password = '';
$localhost = 'localhost';
$database = 'pos';

$conn = new mysqli($localhost, $user_name, $password, $database);

$sql = 'CREATE TABLE IF NOT EXISTS `supplier`(
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone FLOAT NOT NULL,
    addres TEXT NULL,
    nationalid  FLOAT null
)';
$conn->query($sql);
$conn->close();