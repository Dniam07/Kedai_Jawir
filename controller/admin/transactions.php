<?php
require "../includes/functions.php";

// GET DATAS //

$query = "SELECT transactions.transaction_id, 
                 transactions.date,
                 transactions.amount_items, 
                 transactions.total_price,
                 products.product_name, 
                FROM products
                INNER JOIN transactions
                ON products.products_id = transactions.product_id
                ORDER BY transactions.transaction_id ASC";

$result = getData($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOW PRODUCTS</title>
    <link rel="shortcut icon" href="../../images/img-jawir.png" type="image/x-icon">
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <div class="content">
                <!-- SHOW DATA -->
                <table border="1">
                    <tr>
                        <th>No </th>
                        <th>Product Name </th>
                        <th>Price </th>
                    </tr>

                    <?php foreach ($result as $row) : ?>
                        <tr>
                            <td><?php echo $row['product_id']?></td>
                            <td>
                                <?php echo $row['product_name'] ?>
                            </td>
                            <td>
                                <?php echo $row['total_price'] ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>