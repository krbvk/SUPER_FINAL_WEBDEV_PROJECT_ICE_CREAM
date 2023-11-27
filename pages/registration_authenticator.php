<?php
session_start();

function sanitizeInput($input)
{
    return htmlspecialchars(trim($input));
}

$fullname = sanitizeInput($_POST['fullname']);
$username = sanitizeInput($_POST['username']);
$password = sanitizeInput($_POST['password']);
$confirm_password = sanitizeInput($_POST['confirm_password']);

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$conn = new mysqli('localhost', 'root', '', 'db_registration');

$errors = array();

if (empty($fullname)) {
    $errors[] = "Fullname is required.";
}

if (empty($username)) {
    $errors[] = "Username is required.";
}

if (empty($password)) {
    $errors[] = "Password is required.";
} elseif (strlen($password) < 6) {
    $errors[] = "Password must be at least 6 characters long.";
}

if ($password !== $confirm_password) {
    $errors[] = "Passwords do not match.";
    $_SESSION['password_error'] = "Passwords do not match.";
}

if (empty($errors)) {
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO tb_registration (fullname, username, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $fullname, $username, $hashed_password);
        $execval = $stmt->execute();

        if ($execval) {
            $_SESSION['registration_success'] = true;
            header("Location: registration_success.php");
            exit();
        } else {
            $_SESSION['registration_error'] = "Error during registration. Please try again later.";
        }

        $stmt->close();
        $conn->close();
    }
} else {
    $_SESSION['registration_error'] = "Please fix the following errors: " . implode(", ", $errors);
    header("Location: registration_error.php");
    exit();
}
