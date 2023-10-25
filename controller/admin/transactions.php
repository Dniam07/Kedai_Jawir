<?php

require '../includes/actions.php';


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
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <div class="content">
                <div class="content-table">

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
                            <th>Action </th>
                        </tr>

                        <?php foreach ($result as $row) : ?>
                            <tr>
                                <td><?php echo $row['transaction_id'] ?></td>
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
                                <td>
                                    <div class="action-buttons">
                                        <a href="?delete_id=<?php echo $row['transaction_id'] ?>" class="action-button delete-button" onclick="return confirm('ARE YOU SURE?')">Delete</a>
                                        <a href="?edit_id=<?php echo $row['transaction_id'] ?>" class="action-button edit-button" onclick="return confirm('ARE YOU SURE?')">Edit</a>
                                    </div>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </table>
                </div>

                <div class="content-addForm">

                    <form action="" method="post">
                        <input type="hidden" name="transaction_id" id="transaction_id" value="<?= $transaction_id ?>">
                        <ul class="">
                            <li>
                                <label for="">Insert Customer Name :</label><br>
                                <select name="customer_id">
                                    <option disabled selected>Select Customer :</option>
                                    <?php foreach (fetchCustomer() as $customer) : ?>
                                        <option value="<?= $customer['customer_id']; ?>"><?= $customer['customer_name']; ?></option>
                                    <?php endforeach; ?>
                                </select><br>
                            </li>
                            <li>
                                <label for="">Insert Product Name :</label><br>
                                <select name="product_id">
                                    <option disabled selected>Select Product :</option>
                                    <?php foreach (fetchProduct() as $product) : ?>
                                        <option value="<?= $product['product_id']; ?>"><?= $product['product_name']; ?></option>
                                    <?php endforeach; ?>
                                </select><br>
                            </li>

                            
                            <li>
                                <input type="text" name="amount_items" id="amount_items" autocomplete="off" placeholder="Insert Amount Items" required>
                            </li>
                        </ul>
                        <button type="submit" name="submitTransaction" class="submit-form">Tambah Data</button>
                    </form>

                </div>

                <?php if (isset($_SESSION['edit'])) : ?>

                    <div class="content-editForm">

                        <form action="" method="post">
                            <ul class="form-mobil">
                                <li>
                                    <input type="text" name="edit_id" id="edit_id" value="<?= $getId['product_id'] ?>" readonly>
                                </li>
                                <li>
                                    <input type="text" name="productName" id="productName" autocomplete="off" value="<?= $getId['product_name']; ?>" required>
                                </li>

                                <li>
                                    <input type="text" name="price" id="price" autocomplete="off" value="<?= $getId['price']; ?>" required>
                                </li>

                            </ul>
                            <button type="submit" name="editProduct" class="edit-form">Edit</button>

                        </form>


                    </div>
                <?php endif; ?>


            </div>
        </div>
    </div>
</body>

</html>