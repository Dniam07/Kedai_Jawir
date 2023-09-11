<?php
require '../includes/functions.php';


// SHOW DATAS //
$result = fetchCustomer();
//--------------//

// increment number //
$i = 1;
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
                        <th>No </th>
                        <th>Product Name </th>
                        <th>Price </th>
                        <th>Email </th>
                    </tr>

                    <?php foreach ($result as $row) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td>
                                <?php echo $row['customer_name'] ?>
                            </td>
                            <td>
                                <?php echo $row['address'] ?>
                            </td>
                            <td>
                                <?php echo $row['email'] ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>