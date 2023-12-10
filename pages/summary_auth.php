<?php
session_start();
$url = getenv('JAWSDB_URL');
$dbparts = parse_url($url);

$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'], '/');

$errors = array();
try {
    $conn = new mysqli($hostname, $username, $password, $database);


    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Get the parameters from the URL
        $cashAmount = isset($_GET['cashAmount']) ? floatval($_GET['cashAmount']) : 0;
        $totalAmount = isset($_GET['totalAmount']) ? floatval($_GET['totalAmount']) : 0;

        // Validate cash amount
        if ($cashAmount >= $totalAmount) {
            // Get product details from the URL
            $products = [];
            $productCount = count($_GET['product']);

            for ($i = 0; $i < $productCount; $i++) {
                $productName = $_GET['product'][$i];
                $price = floatval($_GET['price'][$i]);
                $quantity = intval($_GET['quantity'][$i]);
                $total = floatval($_GET['total'][$i]);

                // Store product information in the database
                $stmt = $conn->prepare("INSERT INTO tb_receipt (product_name, price, quantity, total) VALUES (:productName, :price, :quantity, :total)");
                $stmt->bind_param(':productName', $productName);
                $stmt->bind_param(':price', $price);
                $stmt->bind_param(':quantity', $quantity);
                $stmt->bind_param(':total', $total);
                $stmt->execute();

                // Store product information in an array    
                $products[] = [
                    'productName' => $productName,
                    'price' => $price,
                    'quantity' => $quantity,
                    'total' => $total,
                ];
            }

            include 'receipt.php';
        } else {
            echo "<p>Insufficient cash. Please enter the correct amount.</p>";
        }
    } else {
        echo "<p>Invalid request method. Please try again.</p>";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
