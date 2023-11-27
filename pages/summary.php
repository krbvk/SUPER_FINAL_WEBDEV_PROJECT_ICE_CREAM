<?php
session_start();

// Check if the session variables are set
if (!isset($_SESSION['cartItems']) || !isset($_SESSION['totalPrice'])) {
    // Handle the case where the session variables are not set
    // For example, you could redirect the user to the shopping page
    header('Location: shopping.php');
    exit();
}

$cartItems = json_decode($_SESSION['cartItems'], true);
$totalPrice = $_SESSION['totalPrice'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" s integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/product.css">
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 1000px;
            margin: 10% auto;
            padding: 5%;
            background-color: #453e3b;
            color: white;
        }

        .container h1 {
            color: #e8bc0e;
        }

        .summaryList {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .summaryList li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .summaryList img {
            width: 100px;
            height: auto;
            margin-left: 10px;
        }

        .totalPrice {
            text-align: center;
            font-size: 18px;
            margin-top: 20px;
        }

        .cashInput {
            text-align: center;
            margin-top: 10px;
        }

        /* Updated styling for the buttons */
        .buttons_prod {
            text-align: center;
            margin-top: 20px;
        }

        .buttons_prod button {
            margin: 0 10px;
            padding: 10px 20px;
            /* Adjust padding for button size */
            font-size: 16px;
            /* Adjust font size */
            background-color: #e8bc0e;
            /* Button background color */
            color: #453e3b;
            /* Button text color */
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Hover effect for buttons */
        .buttons_prod button:hover {
            background-color: #ffd700;
            /* Change background color on hover */
            color: #453e3b;
        }
    </style>
</head>

<body>
    <?php include '../includes/navbar.php'; ?>

    <div class="container p-2">
        <h1>Summary</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cartItems as $item) : ?>
                    <tr>
                        <td><?= $item['name']; ?></td>
                        <td><?= $item['quantity']; ?></td>
                        <td>₱<?= number_format($item['price'] * $item['quantity'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="total">Total Amount: ₱<?= number_format($totalPrice, 2); ?></div>
    </div>

    <?php include '../includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
