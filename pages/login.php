<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../assets/images/favicon-16x16.png" type="image/png">
    <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon" sizes="16x16">
    <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon" sizes="32x32">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="../assets/css/forms.css">

<body>

    <?php include '../includes/navbar.php'; ?>
    <div class="main">
        <div class="container">
            <div class="container_form">
                <div class="left-side">
                    <img src="../assets/images/log.svg" id="img_form" alt="Image" />
                </div>
                <div class="right-side">
                    <img src="../assets/images/sign.svg" />
                    <h2 style="color: white; text-align: center">Log in</h2>

                    <form method="get" action="../pages/login_authentication.php">
                        <label for="username" style="color: white">Username:</label>
                        <input type="text" id="username" name="username" required />
                        <label for="password" style="color: white">Password:</label>
                        <input type="password" id="password" name="password" required />
                        <button type="submit">Login</button>
                        <p style="text-align: center">
                            <a href="../pages/register.php">Don't have an account? sign up here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include '../includes/footer.php'; ?>

    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
