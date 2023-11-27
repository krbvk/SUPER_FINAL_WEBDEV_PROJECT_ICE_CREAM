<?php
session_start();

if (!isset($_SESSION['cartItems']) || !isset($_SESSION['totalPrice'])) {

    header('Location: summary.php');
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
    <title>Flavors</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/product.css">
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <?php include '../includes/navbar.php'; ?>

    <div class="container p-2">
        <div class="product-header">
            <h1>Flavors</h1>
            <div class="shopping">
                <img src="../assets/images/shopping.svg" />
                <span class="quantity">0</span>
            </div>
        </div>
        <div class="list"></div>
    </div>

    <div class="card">
        <h1>Shopping Cart</h1>
        <ul class="listCard"></ul>
        <div class="checkOut">
            <div class="total">0</div>
            <div class="closeShopping">Close</div>
        </div>
        <button onclick="goToSummary()">Go to Summary</button>
    </div>

    <?php include '../includes/footer.php'; ?>

    <script>
        function displayProducts(products) {
            let productList = document.querySelector('.list');
            productList.innerHTML = ""; // Clear previous content

            products.forEach((product, index) => {
                let newDiv = document.createElement('div');
                newDiv.classList.add('item');
                newDiv.innerHTML = `
                    <img src="../assets/images/${product.image}" style="width: 300px; height: 300px;">
                    <div class="title">${product.name}</div>
                    <div class="price">&#8369;${product.price.toLocaleString()}</div>
                    <button onclick="addToCart(${index})">Add To Cart</button>`;
                productList.appendChild(newDiv);
            });
        }

        listCards.forEach((value, key) => {
            totalPrice += value.price * value.quantity;
            count += value.quantity;

            if (value != null) {
                const newDiv = document.createElement('li');
                newDiv.innerHTML = `
                    <div>
                        <img src="../assets/images/${value.image}" />
                    </div>
                    <div>${value.name}</div>
                    <div>₱${(value.price * value.quantity).toLocaleString()}</div>
                    <div>
                        <button onclick="changeQuantity(${key}, ${value.quantity - 1})">-</button>
                        <div class="count">${value.quantity}</div>
                        <button onclick="changeQuantity(${key}, ${value.quantity + 1})">+</button>
                    </div>`;
                document.querySelector('.listCard').appendChild(newDiv);
            }
        });

        function goToSummary() {
            // Use session storage to pass data to summary.php
            sessionStorage.setItem('cartItems', JSON.stringify(listCards));
            sessionStorage.setItem('totalPrice', totalPrice);

            // Redirect to summary.php
            window.location.href = 'summary.php';
        }
    </script>

    <script src="../assets/js/product.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
