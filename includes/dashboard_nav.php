<?php
session_start(); // Start the session

$url = getenv('JAWSDB_URL');
$dbparts = parse_url($url);

$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'],'/');

if (isset($_GET['username'])) {
    $user = $_GET['username'];
    $conn = new mysqli($hostname, $username, $password, $database);
    if ($conn->connect_error) {
        die("User not Logged in " . $conn->connect_error);
    } else {
        $sql = "SELECT * FROM tb_registration WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['username'] = $row["username"];
    } else {
        echo "0 results";
    }
    $stmt->close();
    $conn->close();
}
} 
?>
<header>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <div class="logo">
                        <img src="../assets/images/logo.png" alt="Logo">
                        <span id="title">Atelier De Natsu</span>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li li class="nav-item">
                            <a style="color: white
                            ;">Welcome, <?php echo $_SESSION['username']; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link subActive" aria-current="page"
                                href="../pages/dashboard_home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link subActive" href="../pages/dashboard_product.php">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link subActive" href="#footer">Contact</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="dropbtn">Menu <i class="fa fa-caret-down"></i></button>
                                <div class="dropdown-content">
                                    <a href="../config/log_out.php">Log out</a>
                                </div>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<script>
// Function to handle the header's sticky behavior
function handleStickyHeader() {
    const header = document.querySelector("header");
    if (window.scrollY > header.offsetHeight) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
}

// Listen for scroll events and update the header's sticky behavior
window.addEventListener("scroll", handleStickyHeader);

// Initial call to set the initial state based on page load
handleStickyHeader();
</script>
<script>
const currentLocation = window.location.href;
const navLinks = document.querySelectorAll("nav a");

for (const link of navLinks) {
    if (link.href === currentLocation) {
        link.classList.add("active");
    }
}

function goToSummary() {
    window.location.href = "../php/purchase_summary.php";


}
</script>