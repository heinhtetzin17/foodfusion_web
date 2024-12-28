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

    <!-- Culinary Resources Section-->
    <section class="gallery" id="gallery">

        <h1>Culinary Resources</h1>
        <ul>
            <li class="list active" data-filter="All">All</li>
            <li class="list" data-filter="curry">Curry</li>
            <li class="list" data-filter="steak">Steak</li>
            <li class="list" data-filter="vegan">Vegan</li>
            <li class="list" data-filter="sandwich">Sandwich</li>
            <li class="list" data-filter="cake">Cake</li>
        </ul>
        <div class="ps" data-aos="zoom-in">
            <div class="itemBox curry" data-cat="curry"><img src="img/curry1.jpg"></div>
            <div class="itemBox steak" data-cat="steak"><img src="img/steak1.jpg"></div>
            <div class="itemBox vegan" data-cat="vegan"><img src="img/vegan1.jpg"></div>
            <div class="itemBox sandwich" data-cat="sandwich"><img src="img/sandwich1.jpg"></div>
            <div class="itemBox cake" data-cat="cake"><img src="img/cake1.jpg"></div>

            <div class="itemBox curry" data-cat="curry"><img src="img/curry2.jpg"></div>
            <div class="itemBox steak" data-cat="steak"><img src="img/steak2.jpg"></div>
            <div class="itemBox vegan" data-cat="vegan"><img src="img/vegan2.jpg"></div>
            <div class="itemBox sandwich" data-cat="sandwich"><img src="img/sandwich2.jpg"></div>
            <div class="itemBox cake" data-cat="cake"><img src="img/cake2.jpg"></div>

            <div class="itemBox curry" data-cat="curry"><img src="img/curry3.jpg"></div>
            <div class="itemBox steak" data-cat="steak"><img src="img/steak3.jpg"></div>
            <div class="itemBox vegan" data-cat="vegan"><img src="img/vegan3.jpg"></div>
            <div class="itemBox sandwich" data-cat="sandwich"><img src="img/sandwich3.jpg"></div>
            <div class="itemBox cake" data-cat="cake"><img src="img/cake3.jpg"></div>

            <div class="itemBox curry" data-cat="curry"><img src="img/curry4.jpg"></div>
            <div class="itemBox steak" data-cat="steak"><img src="img/steak4.jpg"></div>
            <div class="itemBox vegan" data-cat="vegan"><img src="img/vegan4.jpg"></div>
            <div class="itemBox sandwich" data-cat="sandwich"><img src="img/sandwich4.jpg"></div>
            <div class="itemBox cake" data-cat="cake"><img src="img/cake4.jpg"></div>

            <div class="itemBox curry" data-cat="curry"><img src="img/curry5.jpg"></div>
            <div class="itemBox vegan" data-cat="vegan"><img src="img/vegan5.jpg"></div>
            <div class="itemBox vegan" data-cat="vegan"><img src="img/vegan6.jpg"></div>

            
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