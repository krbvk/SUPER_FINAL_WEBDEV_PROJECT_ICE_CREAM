<?php
session_start();

function sanitizeInput($input)
{
    return htmlspecialchars(trim($input));
}

$fullname = sanitizeInput($_POST['fullname']);
$user = sanitizeInput($_POST['username']);
$pass = sanitizeInput($_POST['password']);
$confirm_password = sanitizeInput($_POST['confirm_password']);

$url = getenv('JAWSDB_URL');
$dbparts = parse_url($url);

$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'], '/');

$hashed_password = password_hash($pass, PASSWORD_DEFAULT);
$conn = new mysqli($hostname, $username, $password, $database);
$errors = array();

if (empty($fullname)) {
    $errors[] = "Fullname is required.";
}

if (empty($user)) {
    $errors[] = "Username is required.";
}

if (empty($pass)) {
    $errors[] = "Password is required.";
} elseif (strlen($pass) < 6) {
    $errors[] = "Password must be at least 6 characters long.";
}

if ($pass !== $confirm_password) {
    $errors[] = "Passwords do not match.";
    $_SESSION['password_error'] = "Passwords do not match.";
}

if (empty($errors)) {
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO tb_registration (fullname, username, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $fullname, $user, $hashed_password);
        $execval = $stmt->execute();

        if ($execval) {
            $_SESSION['registration_success'] = true;
            header("Location: registration_success.php");
            exit();
        } else {
            $_SESSION['registration_error'] = "Error during registration";
        }

        $stmt->close();
        $conn->close();
    }
} else {
    $_SESSION['registration_error'] = "Please fix the following errors: " . implode(", ", $errors);
    header("Location: registration_error.php");
    exit();
}
