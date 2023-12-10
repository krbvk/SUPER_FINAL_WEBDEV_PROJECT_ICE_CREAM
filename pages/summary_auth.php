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
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $cashAmount = isset($_GET['cashAmount']) ? floatval($_GET['cashAmount']) : 0;
        $totalAmount = isset($_GET['totalAmount']) ? floatval($_GET['totalAmount']) : 0;

        if ($cashAmount >= $totalAmount) {
            $products = [];
            $productCount = count($_GET['product']);

            for ($i = 0; $i < $productCount; $i++) {
                $productNames = $_GET['product'][$i];
                $prices = floatval($_GET['price'][$i]);
                $quantities = intval($_GET['quantity'][$i]);
                $totals = floatval($_GET['total'][$i]);

                $stmt = $conn->prepare("INSERT INTO tb_receipt (product_name, price, quantity, total) VALUES (?, ?, ?, ?)");

                if (!$stmt) {
                    die("Error preparing statement: " . $conn->error);
                }

                $stmt->bind_param('ssii', $productNames, $prices, $quantities, $totals);

                if (!$stmt->execute()) {
                    die("Error executing statement: " . $stmt->error);
                }

                $products[] = [
                    'productName' => $productNames,
                    'price' => $prices,
                    'quantity' => $quantities,
                    'total' => $totals,
                ];
            }

            include 'receipt.php';
        } else {
            echo "<p>Insufficient cash. Please enter the correct amount.</p>";
        }
    } else {
        echo "<p>Invalid request method. Please try again.</p>";
    }
} catch (Exception $e) {
    error_log("Connection failed: " . $e->getMessage(), 0);
    echo "Connection failed. Please check the logs for details.";
}
?>