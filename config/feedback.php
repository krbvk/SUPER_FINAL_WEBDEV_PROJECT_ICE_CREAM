<?php

session_start();

$url = getenv('JAWSDB_URL');
$dbparts = parse_url($url);

$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'],'/');
$comments = sanitizeInput($_POST['comments']);

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO tb_feedback (comments) VALUES (?)");
    $stmt->bind_param("s", $comments);
    $execval = $stmt->execute();

    if ($execval){
        $_SESSION['feedback'] = true;
        header("Location: ../pages/dashboard_home.php");
        exit();
    } else {
        die('Error posting values: ');
    }
    $stmt->close();
    $conn->close();
}

