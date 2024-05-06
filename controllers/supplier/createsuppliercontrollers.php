<?php
session_start();
require_once "../../helper/dbfunction.php" ; 

$name = $_POST['name'];

$category = $_POST['category'];

$description = $_POST['description'];

$price = $_POST['price'];

$supplier = $_POST['supplier'];

createProduct($name, $category, $description , $price, $supplier);

$_SESSION['success'] = 'Product created successfully';

header('Location: ../../product.php');
