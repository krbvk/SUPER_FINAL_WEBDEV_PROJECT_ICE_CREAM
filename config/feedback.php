<?php
//db = random_fb

$url = getenv('JAWSDB_URL');
$dbparts = parse_url($url);

$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'],'/');

$conn = new mysqli($hostname, $username, $password, $database);
if (!$conn) {
    die("Could not connect: " . mysqli_connect_error());
}
// random_reviews table with column of comments
$sql = "INSERT INTO tb_feedback VALUES

('$_POST[comments]')";

if (!mysqli_query($conn, $sql)) {
    die('Error posting values: ' . mysqli_connect_error());
}
// SUCCESS
else {
    // Redirect back to the home page with errors
    header("Location: ../pages_main/dashboard_home.php");
    exit();
}