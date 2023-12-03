<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/product.css">
    <link rel="stylesheet" href="../assets/css/summary.css">
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <?php include '../includes/navbar.php'; ?>
    <div class="container">
        <h1>Summary</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody class="summaryList"></tbody>
        </table>
        <div class="totalPrice"></div>
        <div class="cashInput">
            <label for="cash">Enter Cash: ₱</label>
            <input type="number" id="cash" name="cash" required>
        </div>
        <div class="buttons_prod">
            <button onclick="validatePayment()">Pay</button>
            <button onclick="cancelPayment()">Cancel</button>
        </div>
    </div>
    <?php include '../includes/footer.php'; ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            displaySummary();
        });

        function displaySummary() {
            let cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
            let summaryList = document.querySelector('.summaryList');
            let totalPrice = 0;

            cartItems.forEach((item) => {
                let newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td>${item.name}</td>
                    <td>₱${(item.price * item.quantity).toLocaleString()}</td>
                    <td>${item.quantity}</td>
                    <td><img src="../assets/images/${item.image}" class="img-fluid" alt="${item.name}" /></td>
                `;
                summaryList.appendChild(newRow);
                totalPrice += item.price * item.quantity;
            });

            let totalDiv = document.createElement('div');
            totalDiv.innerText = `Total: ₱${totalPrice.toLocaleString()}`;
            document.querySelector('.totalPrice').appendChild(totalDiv);
        }

        function validatePayment() {
            let cashInput = document.getElementById('cash');
            let cashAmount = Number(cashInput.value);

            if (isNaN(cashAmount) || cashAmount < 0) {
                alert("Please enter a valid cash amount.");
                return;
            }

            let totalAmount = getTotalAmount();

            if (cashAmount >= totalAmount) {
                let cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
                let params = cartItems.map(item => `product[]=${item.name}&price[]=${item.price}&quantity[]=${item.quantity}&total[]=${item.price * item.quantity}`).join('&');
                let redirectUrl = `dashboard_receipt.php?cashAmount=${cashAmount}&totalAmount=${totalAmount}&${params}`;
                window.location.href = redirectUrl;
            } else {
                alert("Insufficient cash. Please enter the correct amount.");
            }
        }

        function cancelPayment() {
            alert("Payment cancelled.");
            window.location.href = 'dashboard_product.php';
        }

        function getTotalAmount() {
            let totalDiv = document.querySelector('.totalPrice');
            let totalText = totalDiv.innerText;
            let totalAmount = parseFloat(totalText.replace('Total: ₱', '').replace(/,/g, ''));
            return totalAmount;
        }

        window.addEventListener('beforeunload', function() {
            sessionStorage.removeItem('cartItems');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
