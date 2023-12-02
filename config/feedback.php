<?php
//db = random_fb
$conn = mysqli_connect("localhost", "root", "", "db_regist");
if (!$conn) {
    die("Could not connect: " . mysqli_connect_error());
}

mysqli_select_db($conn, "db_review");


// random_reviews table with column of comments
$sql = "INSERT INTO random_reviews VALUES

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
