<?php

function connectDB() {
    $user_name = 'root';
    $password = '';
    $localhost = 'localhost';
    $database = 'pos';

    $conn = new mysqli($localhost, $user_name, $password, $database);

    return $conn;

}

function createCategory($name, $type)
{
    $conn = connectDB();
    $sql = "INSERT INTO categories (name, type) VALUES ('$name', '$type');";

    $conn->query($sql);

    $conn->close();
}

function getAllCategories()
{
    $conn = connectDB();
    $sql = "SELECT * FROM categories";

    $data = $conn->query($sql); 

    $categories = $data->fetch_all(MYSQLI_ASSOC);

    $conn->close();

    return $categories;
}

function deleteCategory($id)
{
    $conn = connectDB();

    $sql = "DELETE FROM categories WHERE id = '$id'";

    $conn->query($sql);

    $conn->close();
}

function updatecategory($id , $name , $type){
    $conn = connectDB();
    $sql ="UPDATE categories SET name='$name' , type='$type' WHERE id= '$id' ";
    $conn->query($sql);
    $conn->close();
}

function createProduct($name , $category , $description , $price , $supplier , $newfilename)
{
    $conn = connectDB();
    $sql = "INSERT INTO product 
    (name,category_id ,description ,price ,supplier_id , image) 
    VALUES ('$name', '$category' , '$description', '$price' , 1 , '$newfilename');";

    $conn->query($sql);
    
    $conn->close();
}

function getAllProducts() // getAllProductsWithCategories
{
    $conn = connectDB();

    $sql = "SELECT product.*, categories.name AS category_name
    FROM product
    INNER JOIN categories ON product.category_id = categories.id
    ";

    $data = $conn->query($sql);

    $Products = $data->fetch_all(MYSQLI_ASSOC);

    $conn->close();

    return $Products;
}

function deleteProduct($id)
{
    $conn = connectDB();

    $sql = "DELETE FROM product WHERE id = $id";

    $conn->query($sql);

    $conn->close();
}

function getAllProductsTesting($category_id = null)
{
    $conn = connectDB();

    $sql = "SELECT product.*, categories.name AS category_name
    FROM product
    INNER JOIN categories ON product.category_id = categories.id
    ";


    if ($category_id) {
        $sql .= " WHERE product.category_id = $category_id";
    }

    // if (!is_null($category_id)) {
    //     $sql .= " WHERE products.category_id = $category_id";
    // }

    $data = $conn->query($sql);

    $categories = $data->fetch_all(MYSQLI_ASSOC);

    $conn->close();

    return $categories;
}



