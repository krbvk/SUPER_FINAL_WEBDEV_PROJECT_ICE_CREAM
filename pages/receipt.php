<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../assets/images/favicon-16x16.png" type="image/png">
    <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon" sizes="16x16">
    <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon" sizes="32x32">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" s integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/product.css">
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="../assets/css/recipt.css">
</head>

<body>
    <?php
    include '../includes/navbar.php';
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
                    <td>............................................ ₱<?php echo number_format((float)$cashAmount, 2); ?></td>

                </tr>
                <tr>
                    <td style="font-weight: bold;">Total Amount:&nbsp&nbsp</td>
                    <td>............................................ ₱<?php echo number_format((float)$totalAmount, 2); ?></td>
                </tr>
                <?php
                // Calculate and display change only if cash is greater than total
                if (floatval($cashAmount) >= floatval($totalAmount)) {
                    $changeAmount = floatval($cashAmount) - floatval($totalAmount);
                    echo '<tr>';
                    echo '<td style="font-weight: bold;">Change Amount:&nbsp&nbsp</td>';
                    echo '<td>............................................ ₱' . number_format($changeAmount, 2) . '</td>';
                    echo '</tr>';
                }
                ?>
            </table>

            <h2>Product Details:</h2>
            <table>
                <?php

                if (count($productNames) === count($prices) && count($prices) === count($quantities) && count($quantities) === count($totals)) {
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
                    echo '<tr><td colspan="8">Error: Inconsistent data. Please try again.</td></tr>';
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
            window.location.href = '../pages/products.php';
        }
    </script>

    <?php include '../includes/footer.php'; ?>
</body>

</html>
