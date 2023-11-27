<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboar Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" s integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/product.css">
    <link rel="stylesheet" href="../assets/css/home.css">
    <style>
        /* Adjust the position of the minimize button */
        .minimize-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 999;
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<body>

    <?php include '../includes/dashboard_nav.php' ?>

    <!-- Review Form -->
    <div class="container mt-5">
        <form id="commentForm" class="bg-light p-4 rounded" action="../config/feedback.php" method="POST">
            <button id="exit" type="button" class="btn-close" aria-label="Close"></button>
            <h1 class="mb-4">Give us a review!</h1>
            <div class="mb-3">
                <label for="commentBox" class="form-label">Comments</label>
                <textarea class="form-control" name="comments" id="commentBox" rows="5"></textarea>
            </div>
            <button id="submitBtn" type="submit" class="btn btn-primary">Submit</button>
            <!-- Minimize Button -->
            <button id="minimizeBtn" class="btn btn-secondary minimize-btn">Review Form</button>
        </form>
    </div>

    <?php include '../includes/dashboard_footer.php'; ?>


    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const commentForm = document.getElementById("commentForm");
            const minimizeBtn = document.getElementById("minimizeBtn");

            document.getElementById("exit").addEventListener("click", function() {
                commentForm.classList.toggle("d-none");
            });

            minimizeBtn.addEventListener("click", function() {
                commentForm.classList.toggle("d-none");
            });
        });
    </script>
</body>

</html>
