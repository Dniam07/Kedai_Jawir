<?php

require 'connect.php';
$conn = new myConnection();
$getConnect = $conn->getConnection();
//END CONNECTION
function getDatas($query)
{
    global $getConnect;
    $result = mysqli_query($getConnect, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}



// FUNCTION CRUD PRODUCT //
function fetchProduct()
{
    global $getConnect;
    $query = "SELECT * FROM products";
    $result = mysqli_query($getConnect, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function addProduct()
{
    global $getConnect;
    $productName = htmlspecialchars($_POST['productName']);
    $price = htmlspecialchars($_POST['price']);
    
    $query = "INSERT INTO products VALUES (null,'$productName', '$price')";
    $result = mysqli_query($getConnect, $query);
    return $result;
}

function deleteProduct($Delete_id)
{
    global $getConnect;
    $query = "DELETE FROM products WHERE product_id= '$Delete_id'";
    $result = mysqli_query($getConnect, $query);
    return mysqli_affected_rows($getConnect);
}
function updateProduct(){
    global $getConnect;
    $productName = htmlspecialchars($_POST['productName']);
    $price = htmlspecialchars($_POST['price']);
    $edit_id = $_POST['edit_id'];
    
    $query = "UPDATE products SET
          product_name = '$productName',
          price = '$price'
          WHERE product_id = $edit_id";


$result = mysqli_query($getConnect, $query);
    return $result;
}
// ============================================= //


// FUNCTION CRUD CUSTOMER //
function fetchCustomer()
{
    global $getConnect;
    $query = "SELECT * FROM customers";
    $result = mysqli_query($getConnect, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function addCustomer()
{
    global $getConnect;
    $customerName = htmlspecialchars($_POST['customerName']);
    $address = htmlspecialchars($_POST['address']);
    $email = htmlspecialchars($_POST['email']);
    
    $query = "INSERT INTO customers VALUES (null,'$customerName', '$address', '$email')";
    $result = mysqli_query($getConnect, $query);
    return $result;
}

function deleteCustomer($Delete_id)
{
    global $getConnect;
    $query = "DELETE FROM customers WHERE customer_id= '$Delete_id'";
    $result = mysqli_query($getConnect, $query);
    return mysqli_affected_rows($getConnect);
}

function updateCustomer()
{
    global $getConnect;
    $customerName = htmlspecialchars($_POST['customerName']);
    $address = htmlspecialchars($_POST['address']);
    $email = htmlspecialchars($_POST['email']);
    $edit_id = $_POST['edit_id'];
    $query = "UPDATE customers SET
          customer_name = '$customerName',
          address = '$address',
          email = '$email'
          WHERE customer_id = $edit_id";


$result = mysqli_query($getConnect, $query);
return $result;
}

// ============================================= //

// FUNCTION CRUD TRANSACTIONS //
function fetchTransaction()
{
    global $getConnect;
    $query = "SELECT transactions.transaction_id, 
            customers.customer_name, 
            products.product_name, 
            transactions.date, 
            transactions.amount_items, 
            products.price, 
            transactions.total_price
            FROM customers 
            INNER JOIN transactions ON customers.customer_id = transactions.customer_id
            INNER JOIN products ON products.product_id = transactions.product_id
            ORDER BY transactions.transaction_id DESC";

$result = mysqli_query($getConnect, $query);
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}
return $rows;
}

function addTransaction()
{
    global $getConnect;

    $product_id = $_POST['product_id'];
    $customer_id = $_POST['customer_id'];
    // Ambil tanggal saat ini
    $currentDate = date('Y-m-d');
    $amount_items = $_POST['amount_items'];

    $getData = getDatas("SELECT price FROM products WHERE product_id = '$product_id'");
    foreach ($getData as $row) {
        $price = $row['price'];
        $total_price = $amount_items * $row['price'];
        
        $query = "INSERT INTO transactions 
        VALUES (null, '$product_id', '$customer_id', '$currentDate', '$amount_items', '$total_price')";
        
        $result = mysqli_query($getConnect, $query);
        return $result;
    }
}



//============================================== //
?>