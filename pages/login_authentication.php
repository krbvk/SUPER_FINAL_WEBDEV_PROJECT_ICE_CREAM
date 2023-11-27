<?php
session_start();

if (isset($_GET['username']) && isset($_GET['password'])) {
    $username = $_GET['username'];
    $password = $_GET['password'];

    $conn = new mysqli("localhost", "root", "", "db_registration");
    if ($conn->connect_error) {
        die("Failed to Log In: " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("SELECT * FROM tb_registration WHERE Username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt_result = $stmt->get_result();

        if ($stmt_result->num_rows > 0) {
            $row = $stmt_result->fetch_assoc();
            $isVerified = password_verify($password, $row['password']);

            if ($isVerified) {
                $_SESSION["User_ID"] = $row["User_ID"];
                $_SESSION["username"] = $row["Username"];
                $_SESSION["isAuthenticated"] = true;

                header("Location: ../pages_main/dashboard_home.php");
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
