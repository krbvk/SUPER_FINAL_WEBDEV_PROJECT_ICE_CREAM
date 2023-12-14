<?php
$url = getenv('JAWSDB_URL');
$dbparts = parse_url($url);

$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'], '/');

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
                $conn->autocommit(FALSE); // Start transaction

                $stmt = $conn->prepare("INSERT INTO tbl_receipt (product_name, price, quantity, total) VALUES (?, ?, ?, ?)");

                if (!$stmt) {
                    die("Error preparing statement: " . $conn->error);
                }

                $stmt->bind_param('sddd', $productName, $price, $quantity, $total);

                foreach ($_GET['product'] as $index => $productName) {
                    $price = floatval($_GET['price'][$index]);
                    $quantity = intval($_GET['quantity'][$index]);
                    $total = floatval($_GET['total'][$index]);

                    if (!$stmt->execute()) {
                        $conn->rollback(); // Rollback in case of failure
                        die("Error executing statement: " . $stmt->error);
                    }
                }

                $conn->commit(); // Commit the transaction

                $productNames = $_GET['product'];
                $prices = $_GET['price'];
                $quantities = $_GET['quantity'];
                $totals = $_GET['total'];

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
    $conn->rollback(); // Rollback in case of exception
    error_log("Connection failed: " . $e->getMessage(), 0);
    echo "Connection failed. Please check the logs for details.";
} finally {
    $conn->close(); // Close the database connection
}
