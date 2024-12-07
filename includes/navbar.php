<header>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand">
                    <div class="logo">
                        <img src="../assets/images/logo.png" alt="Logo">
                        <span id="title">Atelier De Natsu</span>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link subActive" aria-current="page" href="../pages/home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link subActive" href="../pages/products.php">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link subActive" href="#footer">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a href="../pages/login.php" class="nav-link login-button">Log In</a>
                        </li>
                        <li class="nav-item">
                            <a href="../pages/register.php" class="nav-link login-button">Sign Up</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>

<script>
    const currentLocation = window.location.href;
    const navLinks = document.querySelectorAll("nav a");

    for (const link of navLinks) {
        if (link.href === currentLocation) {
            link.classList.add("active");
        }
    }
</script>
