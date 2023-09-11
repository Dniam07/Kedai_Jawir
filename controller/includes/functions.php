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


?>