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



    <!-- Contact Us-->
    <section class="contact" id="contact">

        <h1 class="heading">contact us</h1>

        <div class="Full">

            <div class="image" data-aos="fade-right">
                <img src="img/contact.jpg" alt="">
            </div>

            <form action="" data-aos="fade-left">

                <div class="inputBox">
                    <h3>full name</h3>
                    <input type="text" placeholder="enter your name">
                </div>

                <div class="inputBox">
                    <h3>email</h3>
                    <input type="email" placeholder="enter your email">
                </div>

                <div class="inputBox">
                    <h3>Subject</h3>
                    <input type="text" placeholder="enter subject">
                </div>

                <div class="inputBox">
                    <h3>message</h3>
                    <textarea name="" id="" cols="30" rows="10" placeholder="message"></textarea>
                </div>

                <input type="submit" value="send" class="btn">

            </form>
        </div>
        <div class="box-container">

            <div class="box">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.1114918938924!2d96.15280407539117!3d16.820824183973027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c193e941f2e067%3A0x5e54c9aa66f073eb!2sKBTC%20University-%20School%20of%20IT!5e0!3m2!1smy!2smm!4v1735236827676!5m2!1smy!2smm"
                    width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="box">
                <h3>contact details</h3>
                <p> <i class="fas fa-phone"></i>+95783877472</p>
                <p> <i class="fas fa-envelope"></i>foodfusion@gmail.com</p>
                <p> <i class="fas fa-map-marker-alt"></i>Yangon, Myanmar</p>
            </div>

            <div class="box">
                <h3>follow us</h3>
                <div class="up">
                    <a href="#" class="fab fa-youtube"></a>
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div>
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