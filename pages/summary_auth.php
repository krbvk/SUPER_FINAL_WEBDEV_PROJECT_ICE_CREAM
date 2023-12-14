<?php
session_start();

$url = getenv('JAWSDB_URL');
$dbparts = parse_url($url);

$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'], '/');

$errors = [];

try {
    $conn = new mysqli($hostname, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['cashAmount'], $_GET['totalAmount'], $_GET['product'])) {
            $cashAmount = floatval($_GET['cashAmount']);
            $totalAmount = floatval($_GET['totalAmount']);

            if ($cashAmount >= $totalAmount) {
                $products = [];
                $stmt = $conn->prepare("INSERT INTO tb_receipt (product_name, price, quantity, total) VALUES (?, ?, ?, ?)");

                if (!$stmt) {
                    die("Error preparing statement: " . $conn->error);
                }

                $stmt->bind_param('sddd', $productName, $price, $quantity, $total);

                // Loop through products and execute the statement
                foreach ($_POST['product_name'] as $index => $productName) {
                    $price = floatval($_GET['price'][$index]);
                    $quantity = intval($_GET['quantity'][$index]);  
                    $total = floatval($_GET['total'][$index]);

                    if (!$stmt->execute()) {
                        die("Error executing statement: " . $stmt->error);
                    }

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
            echo "<p>Invalid parameters in the GET request. Please try again.</p>";
        }
    } else {
        echo "<p>Invalid request method. Please try again.</p>";
    }
} catch (Exception $e) {
    error_log("Connection failed: " . $e->getMessage(), 0);
    echo "Connection failed. Please check the logs for details.";
}