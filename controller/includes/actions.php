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


// ACTION FOR DELETE //

$Delete_id = isset($_GET['delete_id']) ? $_GET['delete_id'] : false;
if (isset($Delete_id)) {
    global $getConnect;
    deleteProduct($Delete_id);
}

$Delete_id = isset($_GET['delete_id']) ? $_GET['delete_id'] : false;
if (isset($Delete_id)) {
    global $getConnect;
    deleteCustomer($Delete_id);
}


//  ACTION FOR EDIT PRODUCT//
if (isset($_GET['edit_id'])) {

    $productEdit_id = $_GET["edit_id"];
    if ($productEdit_id > 0) {

         $getId = getDatas("SELECT * FROM products WHERE product_id = $productEdit_id")['0'];
        }
    }
    
// SESSION FOR EDIT PRODUCT // 
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

// ACTION FOR SUBMIT CUSTOMER //

if (isset($_POST['submitCustomer'])) {
    global $getConnect;
    $addCustomer = addCustomer();
    if ($addCustomer > 0) {

        header("location:?insert-successful");
    } else {

        header("location:?insert-unsuccessful");
    }
}


// ACTION FOR EDIT CUSTOMER //

if (isset($_GET['edit_id'])) {

    $customerEdit_id = $_GET["edit_id"];
    if ($customerEdit_id > 0) {

        $getId = getDatas("SELECT * FROM customers WHERE customer_id = $customerEdit_id")['0'];
    }
}

// SESSION FOR EDIT CUSTOMER // 
if (isset($_GET['edit_id'])) {
    $_SESSION['edit'] = true;
}

if (isset($_POST['editCustomer'])) {
    $result = updateCustomer();
    if ($result > 0) {
        header("location:?edit-successful");
        unset($_SESSION['edit']);
    }
}
if (isset($_GET['delete_id'])) {
    unset($_SESSION['edit']);
}


// ACTION FOR INSERT TRANSACTION //

if (isset($_POST['submitTransaction'])) {
    global $getConnect;
    if (addTransaction() > 0) {

        header("location:?insert-successful");
    } else {

        header("location:?insert-unsuccessful");
    }
}


?>