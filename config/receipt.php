<?php

function sanitizeInput($input)
{
    return htmlspecialchars(trim($input));
}

$cashAmount = sanitizeInput($_POST['comment']);
$totalAmount = sanitizeInput($_POST['comment']);
$changeAmount = sanitizeInput($_POST['comment']);
$productNames = sanitizeInput($_POST['comment']);
$quantities = sanitizeInput($_POST['comment']);
$prices = sanitizeInput($_POST['comment']);
$totals = sanitizeInput($_POST['comment']);

$url = getenv('JAWSDB_URL');
$dbparts = parse_url($url);

$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'],'/');

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO tb_receipt (cashAmount,totalAmount,changeAmount,productNames,quantities,prices,totals) VALUES (? ? ? ? ? ? ?)");
    $stmt->bind_param("iiisiii", $cashAmount, $totalAmount, $changeAmount, $productNames, $quantities, $prices, $totals);
    $stmt->close();
    $conn->close();
}
?>