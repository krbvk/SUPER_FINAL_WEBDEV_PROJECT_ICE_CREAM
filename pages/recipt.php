<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" s integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/product.css">
    <link rel="stylesheet" href="../assets/css/home.css">

    <style>
        .container_receipt {
            background-color: white;
            padding: 2rem;
            margin: 10% auto;
            border-radius: 8px;
            width: 670px;
            height: auto;
            border: 2px solid black;
        }

        .container_receipt p {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .container_receipt h2 {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <?php
    include '../includes/navbar.php';

    $cashAmount = isset($_GET['cashAmount']) ? $_GET['cashAmount'] : '';
    $totalAmount = isset($_GET['totalAmount']) ? $_GET['totalAmount'] : '';
    $productNames = isset($_GET['product']) ? $_GET['product'] : [];
    $prices = isset($_GET['price']) ? $_GET['price'] : [];
    $quantities = isset($_GET['quantity']) ? $_GET['quantity'] : [];
    $totals = isset($_GET['total']) ? $_GET['total'] : [];
    ?>

    <div class="container_receipt">
        <h1>Receipt</h1>
        <table>
            <tr>
                <td>Cash Amount inputted:&nbsp&nbsp</td>
                <td>............................................ ₱<?php echo $cashAmount; ?></td>
            </tr>
            <tr>
                <td>Total Amount:&nbsp&nbsp</td>
                <td>............................................ ₱<?php echo $totalAmount; ?></td>
            </tr>
            <?php
            // Calculate and display change only if cash is greater than total
            if ($cashAmount >= $totalAmount) {
                $changeAmount = $cashAmount - $totalAmount;
                echo '<tr>';
                echo '<td>Change Amount:&nbsp&nbsp</td>';
                echo '<td>............................................ ₱' . $changeAmount . '</td>';
                echo '</tr>';
            }
            ?>
        </table>

        <h2>Product Details:</h2>
        <table>
            <?php

            if (!empty($productNames)) {
                for ($i = 0; $i < count($productNames); $i++) {

                    echo '<tr>';
                    echo '<td>Product:</td>';
                    echo '<td> ' . $productNames[$i] . ' </td>';
                    echo '<td>&nbsp&nbsp&nbspPrice: ₱ </td>';
                    echo '<td>' . $prices[$i] . '</td>';
                    echo '<td>Quantity:&nbsp&nbsp&nbsp&nbsp</td>';
                    echo '<td>' . $quantities[$i] . '</td>';
                    echo '<td>&nbsp&nbsp&nbspTotal: </td>';
                    echo '<td>.....................₱' . $totals[$i] . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="8">No product details available.</td></tr>';
            }
            ?>
        </table>
    </div>

    <?php include '../includes/footer.php'; ?>
</body>

</html>
