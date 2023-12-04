<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Error</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="../assets/css/forms.css">
</head>

<body>

    <?php include '../includes/navbar.php'; ?>

    <div class="container">
        <div class="main-form" style="padding-bottom: 20%;">
            <div class="container_form">
                <div class="left-side">
                    <img src="../assets/images/mine.png" id="img_form" alt="Image" />
                </div>
                <div class="right-side">
                    <img src="../assets/images/sign.svg" />
                    <center>


                        <p style="color: white;"><?php echo $_SESSION['registration_error'] ?? 'Password does not match confirm password. Pls try again'; ?></p>
                        <p style="color: white;"><a href="../pages/register.php">Go back to registration page Click here...</a></p>
                    </center>

                </div>
            </div>
        </div>
    </div>


    <?php include '../includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Add your custom scripts or includes here -->

</body>

</html>
