<?php
//db = random_fb
session_start();

$url = getenv('JAWSDB_URL');
$dbparts = parse_url($url);

$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'],'/');
$comment = sanitizeInput($_POST['comments']);

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
// random_reviews table with column of comments
$stmt = $conn->prepare("INSERT INTO tb_feedback (comments) VALUES (?)");


if (!mysqli_query($conn, $sql)) {
    die('Error posting values: ' . mysqli_connect_error());
}
// SUCCESS
else {
    // Redirect back to the home page with errors
    header("Location: ../pages_main/dashboard_home.php");
    exit();
}