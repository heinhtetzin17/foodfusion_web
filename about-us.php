<?php
session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Food Fusion</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;600&display=swap" rel="stylesheet">">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <!-- header -->
    <header>

        <a href="#" class="logo"><img src="img/logo1.jpg" alt="logo">
        </a>

        <div id="menu" class="fas fa-bars"></div>

        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="recipe-collection.php">Recipe Collection</a>
            <?php
            if (isset($_SESSION['username'])) {
                echo '<a href="community-cookbook.php">Community Cookbook</a>';
            }
            ?>
            <a href="culinary-resources.php">Culinary Resources</a>
            <a href="educational-resources.php">Educational Resources</a>
            <a href="about-us.php">About Us</a>
            <a href="contact-us.php">Contact Us</a>
            <?php
            if (isset($_SESSION['username'])) {
                echo '<div class="dropdown">
                <button class="dropbtn">
                    ' . $_SESSION['username'] . '
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="logout.php">Logout</a>
                </div>
            </div>';
            } else {
                echo '<a href="sign.php">Sign Up</a>';
            }
            ?>
        </nav>

    </header>


    <!-- About Us Section-->
    <section class="about" id="about">

        <h1>About Us</h1>

        <div class="row">

            <div class="image" data-aos="fade-right">
                <img src="img/a1.jpg" alt="">
            </div>

            <div class="content" data-aos="fade-up">
                <p>We bring the world to your plate! Our food fusion concept combines flavors from different cuisines to
                    create unique, unforgettable dishes. With fresh ingredients and a passion for innovation, we are here
                    to offer you an exciting dining experience. Come taste the magic of fusion cuisine today!
                </p>
                <div class="up"></div>
                <a href="#"><button class="btn">learn more</button></a>
            </div>


        </div>
        <h1 class="ser">Our Services</h1>
        <div class="box-container">

            <div class="box">
                <img src="img/icon/chef.svg" alt="">
                <h3>Recipe</h3>
                <p>We provide everyone with culinary tips and recipes.Our goal is to make cooking more enjoyable and
                    less stressful for you.</p>
            </div>

            <div class="box">
                <img src="img/icon/articles.svg" alt="">
                <h3>Article</h3>
                <p>We provide the ingredients for any recipe.People may simply learn the fundamentals of cooking by
                    reading our articles.Individuals will gain a great deal from reading the articles as it will improve
                    their cooking abilities.</p>
            </div>

            <div class="box">
                <img src="img/icon/review.svg" alt="">
                <h3>Review</h3>
                <p>We provide reviews of any good restaurant's food.We make an effort to remember to leave a review,
                    particularly when we are pleased with the food and service at a restaurant.</p>
            </div>

            <div class="box">
                <img src="img/icon/quality.svg" alt="">
                <h3>Premium Membership</h3>
                <p>We provide classes in live cooking.We have a premium membership.Thus, individuals can enroll in our
                    live classes to learn how to cook.</p>
            </div>

            <div class="box">
                <img src="img/icon/camera.svg" alt="">
                <h3>Food Photography</h3>
                <p>We offer restaurants food photography services.A restaurant might employ us for the photo session if
                    it wishes to showcase its featured recipe.Following the photo shoot, we feature those images in our
                    gallery section.</p>
            </div>

            <div class="box">
                <img src="img/icon/earphones.svg" alt="">
                <h3>24x7 Support</h3>
                <p>We give our esteemed users with the greatest user support available around-the-clock.As soon as
                    possible, they will get answers to their questions and receive assistance. </p>
            </div>
        </div>
    </section>



    <!-- Footer -->
    <footer>
        <p>Food Fusion @ All Right Reserved!</p>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/gallary.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 60, once: false, duration: 2000,
            useClassNames: false,
            disableMutationObserver: false,
            debounceDelay: 50,
            throttleDelay: 99,
        });
    </script>

</body>

</html>