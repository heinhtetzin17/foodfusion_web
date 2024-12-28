<?php
session_start();
include('source/config.php');

// Add error reporting for development
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Food Fusion - Community Cookbook</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <!-- header -->
    <header>
        <a href="#" class="logo"><img src="img/logo1.jpg" alt="logo"></a>
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

    <!-- Community Cookbook Section -->
    <section class="community-cookbook" id="community-cookbook">
        <h1 class="heading">Community Cookbook</h1>

        <?php if (isset($_SESSION['username'])): ?>
            <div class="add-recipe-btn" data-aos="fade-up">
                <a href="#" class="btn" onclick="showAddRecipeForm()">Share Your Recipe</a>
            </div>
        <?php endif; ?>

        <div class="recipe-grid" data-aos="fade-up">
            <!-- Recipe display grid -->
            <div class="recipes-container">
            <?php
             
                //Fetch recipes from the database
                $query = "SELECT * FROM recipes";
                $result = mysqli_query($conn, $query);
               
               

                if (!$result) {
                    // Log the error and show user-friendly message
                    error_log("MySQL Error: " . mysqli_error($conn));
                    echo '<p>Unable to fetch recipes at this time.</p>';
                } else {
                    if (mysqli_num_rows($result) > 0) {
                        while ($recipe = mysqli_fetch_assoc($result)) {
                            // Add checks for required fields
                            $image = !empty($recipe['image']) ? htmlspecialchars($recipe['image']) : 'img/default-recipe.jpg';
                            $title = htmlspecialchars($recipe['title']);
                            $author = htmlspecialchars($recipe['author']);
                            $description = htmlspecialchars($recipe['description']);
                            $category = htmlspecialchars($recipe['category']);
                            $likes = intval($recipe['likes']);
                            
                            echo '
                                <div class="recipe-card" data-aos="fade-up">
                                    <div class="recipe-image">
                                        <img src="' . $image . '" alt="' . $title . '">
                                        <div class="category-tag">' . $category . '</div>
                                    </div>
                                    <div class="recipe-content">
                                        <h3>' . $title . '</h3>
                                        <p class="author">By ' . $author . ' • ' . date('M d, Y', strtotime($recipe['date'])) . '</p>
                                        <p class="description">' . $description . '</p>
                                        <div class="recipe-footer">
                                            <span class="likes"><i class="fas fa-heart"></i> ' . $likes . '</span>
                                            <a href="#" class="view-recipe">View Recipe</a>
                                        </div>
                                    </div>
                                </div>';
                        }
                    } else {
                        echo '<p>No recipes found.</p>';
                    }
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
            </div>
        </div>

        <!-- Add Recipe Form -->
        <div id="recipe-form" class="recipe-form-overlay" style="display: none;">
            <div class="recipe-form-container">
                <h2>Share Your Recipe</h2>
                <form action="add_recipe.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Recipe Title</label>
                        <input type="text" id="title" name="title" placeholder="Enter recipe title" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Recipe Description</label>
                        <textarea id="description" name="description" placeholder="Enter recipe description including ingredients and instructions" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" name="category" required>
                            <option value="">Select Category</option>
                            <option value="Breakfast">Breakfast</option>
                            <option value="Lunch">Lunch</option>
                            <option value="Dinner">Dinner</option>
                            <option value="Dessert">Dessert</option>
                            <option value="Snacks">Snacks</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="image">Recipe Image</label>
                        <input type="file" id="image" name="image" accept="image/*" required>
                    </div>
                    
                    <div class="form-buttons">
                        <button type="submit" class="btn submit-btn">Share Recipe</button>
                        <button type="button" class="btn cancel-btn" onclick="hideAddRecipeForm()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>Food Fusion @ All Right Reserved!</p>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 60,
            once: false,
            duration: 2000,
            useClassNames: false,
            disableMutationObserver: false,
            debounceDelay: 50,
            throttleDelay: 99,
        });

        function showAddRecipeForm() {
            document.getElementById('recipe-form').style.display = 'flex';
            document.body.style.overflow = 'hidden'; // Prevent scrolling
        }

        function hideAddRecipeForm() {
            document.getElementById('recipe-form').style.display = 'none';
            document.body.style.overflow = 'auto'; // Enable scrolling
        }
    </script>
</body>

</html>