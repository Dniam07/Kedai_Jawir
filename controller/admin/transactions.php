<?php
require "../includes/functions.php";

// SHOW DATAS //
$result = fetchTransaction();
//--------------//

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
                        <th>Transaction Id</th>
                        <th>Customer Name</th>
                        <th>Product Name </th>
                        <th>Date</th>
                        <th>Amount Items </th>
                        <th>Price</th>
                        <th>Total Price </th>
                    </tr>

                    <?php foreach ($result as $row) : ?>
                        <tr>
                            <td><?php echo $row['transaction_id']?></td>
                            <td>
                                <?php echo $row['customer_name'] ?>
                            </td>
                            <td>
                                <?php echo $row['product_name'] ?>
                            </td>
                            <td>
                                <?php echo $row['date'] ?>
                            </td>
                            <td>
                                <?php echo $row['amount_items'] ?>
                            </td>
                            <td>
                                <?php echo $row['price'] ?>
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