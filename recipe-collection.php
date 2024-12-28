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


    <!-- Recipe Section-->

    <section class="recipe" id="recipe">
        <div class="recipe-header">
            <h1 class="heading">Recipe Collections</h1>
            <div class="recipe-filters">
                <button class="filter-btn active" data-filter="all">All</button>
                <button class="filter-btn" data-filter="asian">Asian</button>
                <button class="filter-btn" data-filter="western">Western</button>
                <button class="filter-btn" data-filter="soup">Soups</button>
            </div>
        </div>

        <div class="box-container">
            <div class="box" data-aos="fade-up" data-category="asian">
                <div class="recipe-card">
                    <div class="recipe-image">
                        <img src="img/p1.jpg" alt="Bean Noddle">
                        <div class="recipe-overlay">
                            <span class="recipe-category">Asian</span>
                            <div class="recipe-stats">
                                <span><i class="far fa-clock"></i> 30 mins</span>
                                <span><i class="fas fa-fire"></i> Medium</span>
                            </div>
                        </div>
                    </div>
                    <div class="recipe-content">
                        <h3>Bean Noddle</h3>
                        <p class="recipe-description">A delicious Asian noodle dish with rich black bean sauce.</p>
                        <div class="recipe-actions">
                            <a href="https://greatcurryrecipes.net/2024/01/11/black-bean-noodles/" class="recipe-btn">
                                <i class="far fa-newspaper"></i> Recipe
                            </a>
                            <a href="https://www.youtube.com/watch?v=DCUcVG2sHt0" class="recipe-btn">
                                <i class="fab fa-youtube"></i> Watch
                            </a>
                            <button class="recipe-btn favorite">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box" data-aos="fade-up" data-category="western">
                <div class="recipe-card">
                    <div class="recipe-image">
                        <img src="img/p2.jpg" alt="Corn Dog">
                        <div class="recipe-overlay">
                            <span class="recipe-category">Western</span>
                            <div class="recipe-stats">
                                <span><i class="far fa-clock"></i> 20 mins</span>
                                <span><i class="fas fa-fire"></i> Easy</span>
                            </div>
                        </div>
                    </div>
                    <div class="recipe-content">
                        <h3>Corn Dog</h3>
                        <p class="recipe-description">A classic American corn dog with a crispy exterior and soft
                            interior.</p>
                        <div class="recipe-actions">
                            <a href="https://www.fifteenspatulas.com/homemade-corn-dogs/" class="recipe-btn">
                                <i class="far fa-newspaper"></i> Recipe
                            </a>
                            <a href="https://www.youtube.com/watch?v=imi8YDvyWn0" class="recipe-btn">
                                <i class="fab fa-youtube"></i> Watch
                            </a>
                            <button class="recipe-btn favorite">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box" data-aos="fade-up" data-category="soup">
                <div class="recipe-card">
                    <div class="recipe-image">
                        <img src="img/p3.jpg" alt="Potato Soup">
                        <div class="recipe-overlay">
                            <span class="recipe-category">Soups</span>
                            <div class="recipe-stats">
                                <span><i class="far fa-clock"></i> 45 mins</span>
                                <span><i class="fas fa-fire"></i> Medium</span>
                            </div>
                        </div>
                    </div>
                    <div class="recipe-content">
                        <h3>Potato Soup</h3>
                        <p class="recipe-description">A creamy potato soup with a rich and savory flavor.</p>
                        <div class="recipe-actions">
                            <a href="https://sugarspunrun.com/creamy-potato-soup-recipe/" class="recipe-btn">
                                <i class="far fa-newspaper"></i> Recipe
                            </a>
                            <a href="https://www.youtube.com/watch?v=7og3ZBs81AU" class="recipe-btn">
                                <i class="fab fa-youtube"></i> Watch
                            </a>
                            <button class="recipe-btn favorite">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box" data-aos="fade-up" data-category="asian">
                <div class="recipe-card">
                    <div class="recipe-image">
                        <img src="img/p4.jpg" alt="Tteokbokki">
                        <div class="recipe-overlay">
                            <span class="recipe-category">Asian</span>
                            <div class="recipe-stats">
                                <span><i class="far fa-clock"></i> 20 mins</span>
                                <span><i class="fas fa-fire"></i> Easy</span>
                            </div>
                        </div>
                    </div>
                    <div class="recipe-content">
                        <h3>Tteokbokki</h3>
                        <p class="recipe-description">A spicy Korean rice cake dish with a sweet and savory flavor.</p>
                        <div class="recipe-actions">
                            <a href="https://mykoreankitchen.com/tteokbokki-spicy-rice-cakes/" class="recipe-btn">
                                <i class="far fa-newspaper"></i> Recipe
                            </a>
                            <a href="https://www.youtube.com/watch?v=TA3Uo3a9674" class="recipe-btn">
                                <i class="fab fa-youtube"></i> Watch
                            </a>
                            <button class="recipe-btn favorite">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box" data-aos="fade-up" data-category="western">
                <div class="recipe-card">
                    <div class="recipe-image">
                        <img src="img/p5.jpg" alt="Pasta">
                        <div class="recipe-overlay">
                            <span class="recipe-category">Western</span>
                            <div class="recipe-stats">
                                <span><i class="far fa-clock"></i> 30 mins</span>
                                <span><i class="fas fa-fire"></i> Medium</span>
                            </div>
                        </div>
                    </div>
                    <div class="recipe-content">
                        <h3>Pasta</h3>
                        <p class="recipe-description">A creamy pasta dish with sardines, olives, and garlicky
                            breadcrumbs.</p>
                        <div class="recipe-actions">
                            <a href="https://www.kitchenstories.com/en/recipes/sardine-pasta-with-olives-and-garlicky-breadcrumbss"
                                class="recipe-btn">
                                <i class="far fa-newspaper"></i> Recipe
                            </a>
                            <a href="https://www.youtube.com/watch?v=EnXb1u9UoBU" class="recipe-btn">
                                <i class="fab fa-youtube"></i> Watch
                            </a>
                            <button class="recipe-btn favorite">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box" data-aos="fade-up" data-category="asian">
                <div class="recipe-card">
                    <div class="recipe-image">
                        <img src="img/p6.jpg" alt="Ma La Xiang Guo">
                        <div class="recipe-overlay">
                            <span class="recipe-category">Asian</span>
                            <div class="recipe-stats">
                                <span><i class="far fa-clock"></i> 45 mins</span>
                                <span><i class="fas fa-fire"></i> Medium</span>
                            </div>
                        </div>
                    </div>
                    <div class="recipe-content">
                        <h3>Ma La Xiang Guo</h3>
                        <p class="recipe-description">A spicy Chinese pork dish with a rich and savory flavor.</p>
                        <div class="recipe-actions">
                            <a href="https://thewoksoflife.com/ma-la-xiang-guo/" class="recipe-btn">
                                <i class="far fa-newspaper"></i> Recipe
                            </a>
                            <a href="https://www.youtube.com/watch?v=V8dhQQYvWR0" class="recipe-btn">
                                <i class="fab fa-youtube"></i> Watch
                            </a>
                            <button class="recipe-btn favorite">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
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