<?php
session_start();
require_once "../../helper/dbfunction.php" ; 

$name = $_POST['name'];

$category = $_POST['category'];

$description = $_POST['description'];

$price = $_POST['price'];

$supplier = $_POST['supplier'];

$filename = $_FILES["file"]["name"];
$tmpName = $_FILES["file"]["tmp_name"];

$newfilename = uniqid() . "." . pathinfo($filename, PATHINFO_EXTENSION);

move_uploaded_file($tmpName, __DIR__ . "/../../img/" . $newfilename);

createProduct($name, $category, $description , $price, $supplier ,$newfilename);

$_SESSION['success_product'] = 'Product created successfully';

header('Location: ../../product.php');
