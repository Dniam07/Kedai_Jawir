<?php

require 'functions.php';
global $getConnect;

// ACTION FOR SUBMIT PRODUCT //

if (isset($_POST['submitProduct'])) {
    global $getConnect;
    $addProduct= addProduct();
    if ($addProduct > 0) {

        header("location:?insert-successful");
      
    } else {

        header("location:?insert-unsuccessful");
    }
    
}


// ACTION FOR DELETE PRODUCT //

$productDelete_id = isset($_GET['delete_id']) ? $_GET['delete_id'] : false;
if (isset($productDelete_id)) {
    global $getConnect;
    deleteProduct($productDelete_id);
}


//  ACTION FOR EDIT //
if (isset($_GET['edit_id'])) {

    $productEdit_id = $_GET["edit_id"];
    if ($productEdit_id > 0) {

         $getId = getDatas("SELECT * FROM products WHERE product_id = $productEdit_id")['0'];
        }
    }
    
// SESSION FOR EDIT // 
if (isset($_GET['edit_id'])) {
    $_SESSION['edit'] = true;
}

if (isset($_POST['editProduct'])) {
    $result = updateProduct();
    if ($result > 0) {
        header("location:?edit-successful");
        unset($_SESSION['edit']);
    }
}
if (isset($_GET['delete_id'])) {
    unset($_SESSION['edit']);
}






?>