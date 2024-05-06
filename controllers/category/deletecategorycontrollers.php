<?php
    session_start();
    require_once "../../helper/dbfunction.php" ; 

// connect to database

$id = $_POST['id'];

if (deleteCategory($id)==false){

    $_SESSION['del'] = 'Category deleted successfully';

    header('Location: ../../create-categories.php');
}
else{
$_SESSION['del'] = 'Category not deleted successfully';

header('Location: ../../create-categories.php');
}
