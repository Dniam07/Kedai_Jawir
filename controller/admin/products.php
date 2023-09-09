<?php
require '../includes/functions.php';


// GET DATAS //
$query = "SELECT * FROM products";
$result = getData($query);

// increment number //

    $i = 1;


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOW PRODUCTS</title>
    <link rel="shortcut icon" href="../../images/logooo.png" type="image/x-icon">
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
                            <td><?= $i++ ?></td>
                            <td>
                                <?php echo $row['product_name'] ?>
                            </td>
                            <td>
                                <?php echo $row['price'] ?>
                            </td>
                        </tr>
                    
                        
                        <?php endforeach; ?>
                    </table>
            </div>
        </div>
    </div>
</body>

</html>