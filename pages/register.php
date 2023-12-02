<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="../assets/css/forms.css">
</head>

<body>

    <?php include '../includes/navbar.php'; ?>
    <div class="container">
        <div class="main-form">
            <div class="container_form">
                <div class="left-side">
                    <img src="../assets/images//mine.png" id="img_form" alt="Image" />
                </div>
                <div class="right-side">
                    <img src="../assets/images/sign.svg" />
                    <h2 style="color: white; text-align: center">Sign up</h2>
                    <form action="../pages/registration_authenticator.php" method="POST">
                        <label for="fullname" style="color: white">Fullname:</label>
                        <input type="text" id="fullname" name="fullname" required />
                        <label for="username" style="color: white">Username:</label>
                        <input type="text" id="username" name="username" required />
                        <label for="password" style="color: white">Password:</label>
                        <input type="password" id="password" name="password" required minlength="6" />
                        <label for="confirm_password" style="color: white">Confirm Password:</label>
                        <input type="password" id="confirm_password" name="confirm_password" required />
                        <div id="password-error" style="color: red"><?php echo isset($_SESSION['password_error']) ? $_SESSION['password_error'] : ''; ?></div>
                        <div class="checkbox">
                            <input type="checkbox" id="privacy" name="privacy" required />
                            <label for="privacy" style="color: white">I agree to the
                                <a href="../pages/dataPriv.php">data privacy terms</a>
                            </label>
                        </div>
                        <button type="submit">Sign up</button>
                        <p style="text-align: center">
                            <a href="../pages/login.php">Already have an account? Log in here</a>
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
