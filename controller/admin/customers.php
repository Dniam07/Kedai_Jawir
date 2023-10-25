<?php

require '../includes/actions.php';


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
    <title>SHOW CustomerS</title>
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
                            <th>Customer Name </th>
                            <th>Address </th>
                            <th>Email </th>
                            <th>Action</th>
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

                                <td>
                                    <div class="action-buttons">
                                        <a href="?delete_id=<?php echo $row['customer_id'] ?>" class="action-button delete-button" onclick="return confirm('ARE YOU SURE?')">Delete</a>
                                        <a href="?edit_id=<?php echo $row['customer_id'] ?>" class="action-button edit-button" onclick="return confirm('ARE YOU SURE?')">Edit</a>
                                    </div>
                                </td>



                            </tr>
                        <?php endforeach; ?>

                    </table>
                </div>

                <div class="content-addForm">

                    <form action="" method="post">
                        <input type="hidden" name="customer_id" id="customer_id">
                        <ul class="">

                            <li>
                                <input type="text" name="customerName" id="customerName" autocomplete="off" placeholder="Insert Customer Name" required>
                            </li>

                            <li>
                                <input type="text" name="address" id="address" autocomplete="off" placeholder="Insert Customer address" required>
                            </li>

                            <li>
                                <input type="text" name="email" id="email" autocomplete="off" placeholder="Insert customer email" required>
                            </li>

                        </ul>
                        <button type="submit" name="submitCustomer" class="submit-form">ADD</button>

                    </form>

                </div>

                <?php if (isset($_SESSION['edit'])) : ?>

                    <div class="content-editForm">

                        <form action="" method="post">
                            <ul class="form-mobil">
                                <li>
                                    <input type="text" name="edit_id" id="edit_id" value="<?= $getId['customer_id'] ?>" readonly>
                                </li>
                                <li>
                                    <input type="text" name="customerName" id="customerName" autocomplete="off" value="<?= $getId['customer_name']; ?>" required>
                                </li>

                                <li>
                                    <input type="text" name="address" id="address" autocomplete="off" value="<?= $getId['address']; ?>" required>
                                </li>
                                <li>
                                    <input type="text" name="email" id="email" autocomplete="off" value="<?= $getId['email']; ?>" required>
                                </li>

                            </ul>
                            <button type="submit" name="editCustomer" class="edit-form">Edit</button>

                        </form>


                    </div>
                <?php endif; ?>


            </div>
        </div>
    </div>
</body>

</html>