<?php

require '../includes/actions.php';


// SHOW DATAS //
$result = fetchProduct();
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
                            <th>No </th>
                            <th>Product Name </th>
                            <th>Price </th>
                            <th>Action</th>
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

                                <td>
                                    <div class="action-buttons">
                                        <a href="?delete_id=<?php echo $row['product_id'] ?>" class="action-button delete-button" onclick="return confirm('ARE YOU SURE?')">Delete</a>
                                        <a href="?edit_id=<?php echo $row['product_id'] ?>" class="action-button edit-button" onclick="return confirm('ARE YOU SURE?')">Edit</a>
                                    </div>
                                </td>



                            </tr>
                        <?php endforeach; ?>

                    </table>
                </div>

                <div class="content-addForm">

                    <form action="" method="post">
                        <input type="hidden" name="product_id" id="product_id">
                        <ul class="">

                            <li>
                                <input type="text" name="productName" id="productName" autocomplete="off" placeholder="Insert Product Name" required>
                            </li>

                            <li>
                                <input type="text" name="price" id="price" autocomplete="off" placeholder="Insert Product Price" required>
                            </li>

                        </ul>
                        <button type="submit" name="submitProduct" class="submit-form">ADD</button>

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