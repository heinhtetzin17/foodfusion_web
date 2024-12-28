<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Educational Resources - Food Fusion</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
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

    <!-- Educational Resources Section -->
    <section class="educational-resources" id="educational-resources">
        <div class="section-header" data-aos="fade-down">
            <h1 class="heading">Educational Resources</h1>
            <p class="subtitle">Expand Your Culinary Knowledge</p>
        </div>

        <!-- Hero Section -->
        <div class="hero-section" data-aos="fade-up">
            <div class="hero-content">
                <h2>Start Your Culinary Journey</h2>
                <p>Access our comprehensive collection of cooking guides, tutorials, and professional tips to enhance your kitchen skills.</p>
                <div class="hero-stats">
                    <div class="stat-item">
                        <i class="fas fa-book-reader"></i>
                        <span>50+ Guides</span>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-video"></i>
                        <span>100+ Videos</span>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-users"></i>
                        <span>10k+ Students</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Resource Categories -->
        <div class="resource-categories" data-aos="fade-up">
            <div class="category-card">
                <i class="fas fa-utensils"></i>
                <h3>Cooking Basics</h3>
                <p>Master fundamental techniques</p>
            </div>
            <div class="category-card">
                <i class="fas fa-globe-americas"></i>
                <h3>World Cuisine</h3>
                <p>Explore international flavors</p>
            </div>
            <div class="category-card">
                <i class="fas fa-seedling"></i>
                <h3>Ingredients</h3>
                <p>Learn about ingredients</p>
            </div>
            <div class="category-card">
                <i class="fas fa-chart-line"></i>
                <h3>Advanced Skills</h3>
                <p>Level up your expertise</p>
            </div>
        </div>

        <!-- Featured Resources -->
        <div class="featured-resources" data-aos="fade-up">
            <h2 class="section-title">Featured Resources</h2>
            <div class="resources-grid">
                <div class="resource-card">
                    <div class="resource-image">
                        <img src="img/knife-skills.jpg" alt="Knife Skills">
                    </div>
                    <div class="resource-content">
                        <span class="resource-tag">Most Popular</span>
                        <h3>Essential Knife Skills</h3>
                        <p>Master the fundamental cutting techniques used by professional chefs.</p>
                        <div class="resource-meta">
                            <span><i class="fas fa-clock"></i> 7 mins</span>
                            <span><i class="fas fa-user-graduate"></i> Beginner</span>
                        </div>
                        <a href="https://www.youtube.com/watch?v=G-Fg7l7G1zw" class="resource-btn">Watch Now</a>
                    </div>
                </div>
                <!-- Add more resource cards as needed -->
            </div>
        </div>

        <!-- Learning Paths -->
        <div class="learning-paths" data-aos="fade-up">
            <h2 class="section-title">Learning Paths</h2>
            <div class="paths-grid">
                <div class="path-card">
                    <div class="path-header">
                        <i class="fas fa-hat-chef"></i>
                        <h3>Beginner's Journey</h3>
                    </div>
                    <ul class="path-steps">
                        <li><i class="fas fa-check-circle"></i> Kitchen Safety</li>
                        <li><i class="fas fa-check-circle"></i> Basic Techniques</li>
                        <li><i class="fas fa-check-circle"></i> Essential Tools</li>
                        <li><i class="fas fa-check-circle"></i> Simple Recipes</li>
                    </ul>
                    <a href="#" class="path-btn">Start Learning</a>
                </div>
                <!-- Add more path cards as needed -->
            </div>
        </div>

        <!-- Video Tutorials -->
        <div class="video-tutorials" data-aos="fade-up">
            <h2 class="section-title">Video Tutorials</h2>
            <div class="video-grid">
                <div class="video-card">
                    <div class="video-thumbnail">
                        <img src="img/knife-skills-video.j" alt="Knife Skills Tutorial">
                        <div class="play-button">
                            <i class="fas fa-play"></i>
                        </div>
                        <span class="duration">15:30</span>
                    </div>
                    <div class="video-content">
                        <h3>Professional Knife Skills</h3>
                        <p>Learn proper knife handling and cutting techniques</p>
                        <div class="video-meta">
                            <span><i class="fas fa-eye"></i> 15K views</span>
                            <span><i class="fas fa-star"></i> 4.8</span>
                        </div>
                    </div>
                </div>
                <div class="video-card">
                    <div class="video-thumbnail">
                        <img src="img/sauce-basics.jpg" alt="Sauce Making">
                        <div class="play-button">
                            <i class="fas fa-play"></i>
                        </div>
                        <span class="duration">12:45</span>
                    </div>
                    <div class="video-content">
                        <h3>Basic Sauce Making</h3>
                        <p>Master the five mother sauces of French cuisine</p>
                        <div class="video-meta">
                            <span><i class="fas fa-eye"></i> 12K views</span>
                            <span><i class="fas fa-star"></i> 4.9</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Infographics -->
        <div class="infographics" data-aos="fade-up">
            <h2 class="section-title">Helpful Infographics</h2>
            <div class="infographic-grid">
                <div class="infographic-card">
                    <img src="img/measurement-conversion.jpg" alt="Measurement Conversion Chart">
                    <div class="infographic-content">
                        <h3>Measurement Conversions</h3>
                        <p>Quick reference guide for kitchen measurements</p>
                        <a href="#" class="download-btn">
                            <i class="fas fa-download"></i> Download PDF
                        </a>
                    </div>
                </div>
                <div class="infographic-card">
                    <img src="img/cooking-times.jpg" alt="Cooking Times Chart">
                    <div class="infographic-content">
                        <h3>Cooking Times Guide</h3>
                        <p>Standard cooking times for common ingredients</p>
                        <a href="#" class="download-btn">
                            <i class="fas fa-download"></i> Download PDF
                        </a>
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