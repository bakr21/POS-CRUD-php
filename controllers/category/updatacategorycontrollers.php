<?php
    session_start();
    require_once "../../helper/dbfunction.php" ;
// if(isset($_POST['updatedata'])){

//     $id = $_POST['update_id'];

//     $name = $_POST['name'];

//     $type = $_POST['type'];

//     updateCategory($id, $name, $type);
//     if (updateCategory($id, $name, $typ)){
//         $_SESSION['success'] = 'Category update successfully';
        
//         header('Location: ../../create-categories.php');

//     }

// }



if(isset($_POST['updatedata']))
{   
    $id = $_POST['update_id'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    updateCategory($id, $name, $type);
    // Update the category
    if(updateCategory($id, $name, $type) == false)
    {
        // Set success message
        $_SESSION['success'] = 'Category updated successfully';
    }
    else
    {
        // Set error message
        $_SESSION['error'] = 'Failed to update category';
    }
    
    // Redirect to the page where you display messages
    header('Location: ../../create-categories.php');
    exit; // Ensure script execution stops after redirection
}

