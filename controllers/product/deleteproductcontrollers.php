<?php 
session_start();
require_once "../../helper/dbfunction.php" ; 

$id = $_POST['id'];

deleteProduct($id);

$_SESSION['del_product'] = 'product deleted successfully';

header('Location: ../../product.php');