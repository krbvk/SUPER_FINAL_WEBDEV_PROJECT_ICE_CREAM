<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
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
                    <center>
                        <p style="color: white;">FAILED LOG IN. Username or password is Incorrect.</p>
                        <p><a href="../pages/login.php">Try to log in again Click Here...</a></p>
                    </center>



                </div>
            </div>
        </div>
    </div>

    <?php include '../includes/footer.php'; ?>

    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
