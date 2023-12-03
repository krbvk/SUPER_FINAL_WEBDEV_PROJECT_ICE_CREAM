<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" s integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/product.css">
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="../assets/css/recipt.css">
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
    <div>
        <div class="container_receipt">
            <div class="logo">
                <img src="../assets/images/logo.png" alt="Logo">
                <span id="title" style="color: black;">Atelier De Natsu</span>
            </div>
            <h1>Receipt</h1>
            <table>
                <tr>
                    <td style="font-weight: bold;">Cash Amount inputted:&nbsp&nbsp</td>
                    <td>............................................ ₱<?php echo $cashAmount; ?></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Total Amount:&nbsp&nbsp</td>
                    <td>............................................ ₱<?php echo $totalAmount; ?></td>
                </tr>
                <?php
                // Calculate and display change only if cash is greater than total
                if ($cashAmount >= $totalAmount) {
                    $changeAmount = $cashAmount - $totalAmount;
                    echo '<tr>';
                    echo '<td style="font-weight: bold;">Change Amount:&nbsp&nbsp</td>';
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
                        echo '<th style="font-weight: bold;">Product:</th>';
                        echo '<td> ' . $productNames[$i] . ' </td>';
                        echo '<th style="font-weight: bold;">&nbsp&nbsp&nbspPrice: ₱ </td>';
                        echo '<td>' . $prices[$i] . '</td>';
                        echo '<th style="font-weight: bold;">&nbsp&nbsp&nbspQuantity:&nbsp</td>';
                        echo '<td>' . $quantities[$i] . '</td>';
                        echo '<th style="font-weight: bold;">&nbsp&nbsp&nbspTotal: </td>';
                        echo '<td>.....................₱' . $totals[$i] . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="8">No product details available.</td></tr>';
                }
                ?>
            </table>
            <?php
            date_default_timezone_set('Asia/Manila');
            ?>
            <p>This serves as proof of payment as of: <?php echo date('Y-m-d H:i:s'); ?></p>
            <p>Email: Atelierdenatsu@gmail.com</p>

            <!-- <p>If you ever feel down, our ice cream is here to lift your spirits and brighten your mood during your ups and downs:></p> -->

        </div>
        <div class="button-container">
            <button onclick="printProductDetails()">Print Product Details</button>
            <button onclick="orderAgain()">Order Again</button>
        </div>
    </div>
    <script>
        function printProductDetails() {
            window.print();
        }

        function orderAgain() {
            sessionStorage.removeItem('cartItems');
            window.location.href = 'dashboard_product.php';
        }
    </script>

    <?php include '../includes/footer.php'; ?>
</body>

</html>
