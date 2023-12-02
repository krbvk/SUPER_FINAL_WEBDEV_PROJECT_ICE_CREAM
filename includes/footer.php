<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<footer id="footer">
    <div class="container-fluid text-center">
        <div class="row justify-content-center footer-columns">
            <div class="col-md-4 footer-column">
                <!-- Changed class to match CSS -->
                <h3>Follow Us</h3>
                <ul class="list-unstyled text-left">
                    <li>
                        <a href="https://www.facebook.com/profile.php?id=61552298251691">
                            <i class="fab fa-facebook"></i> Facebook
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/atelierdenatsu">
                            <i class="fab fa-twitter"></i> Twitter
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/your-instagram-profile">
                            <i class="fab fa-instagram"></i> Instagram
                        </a>
                    </li>
                    <!-- Other social media links -->
                </ul>
            </div>
            <div class="col-md-3 footer-column">
                <!-- Changed class to match CSS -->
                <h3>Quick Links</h3>
                <ul class="list-unstyled">
                    <li><a href="../pages/home.php">Home</a></li>
                    <li><a href="../pages/products.php">Products</a></li>
                    <!-- Other quick links -->
                </ul>
            </div>
            <div class="col-md-3 footer-column">
                <!-- Changed class to match CSS -->
                <h3>Contact Us</h3>
                <p>Email: Atelierdenatsu@gmail.com</p>
            </div>
            <div id="commentPop">
                <form id="commentForm" action="feedback.php" method="POST">
                    <button id="exit" value="x">X</button>
                    <h1>
                        Give us a review!
                    </h1>
                    <h2>Comments</h2>
                    <textarea name="comments" id="commentBox" cols="50" rows="10">
        </textarea>
                    <input id="submitBtn" type="submit" value="submit">
                </form>
            </div>
        </div>
    </div>
</footer>
