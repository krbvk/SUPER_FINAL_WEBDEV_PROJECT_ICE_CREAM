<?php
session_start();

$url = getenv('JAWSDB_URL');
$dbparts = parse_url($url);

$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'],'/');

if (isset($_GET['username']) && isset($_GET['password'])) {
    $user = $_GET['username'];
    $pass = $_GET['password'];
    
    $conn = new mysqli($hostname, $username, $password, $database);
    if ($conn->connect_error) {
        die("Failed to Log In: " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("SELECT * FROM tb_registration WHERE Username = ?");
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $stmt_result = $stmt->get_result();

        if ($stmt_result->num_rows > 0) {
            $row = $stmt_result->fetch_assoc();
            $isVerified = password_verify($pass, $row['password']);

            if ($isVerified) {
                $_SESSION["User_ID"] = $row["User_ID"];
                $_SESSION["username"] = $row["Username"];
                $_SESSION["isAuthenticated"] = true;

                header("Location: ../pages/dashboard_home.php");
                exit();
            } else {
                echo "Failed to log in";
            }
        } else {
            echo "Failed to log in";
        }

        $stmt->close();
        $conn->close();
    }
} else {
    echo "Invalid username or password";
}
