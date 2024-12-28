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
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .cookie-consent {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.9);
            color: white;
            padding: 1rem;
            text-align: center;
            z-index: 9999;
            display: none;
        }

        .cookie-consent button {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            margin-left: 1rem;
            cursor: pointer;
            border-radius: 3px;
        }
    </style>
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
            <a href="community-cookbook.php">Community Cookbook</a>
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

    <!-- Home Page Section-->

    <section class="home" id="home">
        <div class="video-container">
            <video src="img/hzee.mp4" type="video/mp4" autoplay loop muted class="vid"></video>
        </div>

        <div class="content">
            <h1>Welcome To Food Fusion</h1>
            <p>Your one-stop shop for a wide range of ethnic cuisines. We offer a number of food categories, recipes,
                articles, and video tutorials to help you get started in the kitchen.</p>
        </div>

    </section>

    <!-- Add before footer -->
    <div class="cookie-consent" id="cookieConsent">
        <p>
            We use cookies to improve your experience. By using our site, you agree to our
            <a href="privacy-policy.php" style="color: #4CAF50;">Privacy Policy</a> and
            <a href="cookie-policy.php" style="color: #4CAF50;">Cookie Policy</a>.
        </p>
        <button onclick="acceptCookies()">Accept</button>
    </div>

    <!-- Footer -->
    <footer>
        <p>
            Food Fusion @ All Right Reserved! |
            <a href="privacy-policy.php">Privacy Policy</a> |
            <a href="cookie-policy.php">Cookie Policy</a>
        </p>
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

    <!-- Add before closing body tag -->
    <script>
        // Cookie consent functionality
        function setCookie(name, value, days) {
            let expires = "";
            if (days) {
                const date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        function getCookie(name) {
            const nameEQ = name + "=";
            const ca = document.cookie.split(';');
            for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }

        function acceptCookies() {
            setCookie('cookieConsent', 'accepted', 365);
            document.getElementById('cookieConsent').style.display = 'none';
        }

        // Show cookie consent if not previously accepted
        window.onload = function () {
            if (!getCookie('cookieConsent')) {
                document.getElementById('cookieConsent').style.display = 'block';
            }
        }
    </script>

</body>

</html>