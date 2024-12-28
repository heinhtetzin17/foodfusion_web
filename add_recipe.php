<?php
session_start();
include('source/config.php');

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: sign.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $author = $_SESSION['username'];
    $date = date('Y-m-d H:i:s');

    // Handle image upload
    $target_dir = "uploads/recipes/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $image_path = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $file_extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');

        if (in_array($file_extension, $allowed_extensions)) {
            $unique_filename = uniqid() . '.' . $file_extension;
            $target_file = $target_dir . $unique_filename;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                $image_path = $target_file;
            }
        }
    }

    // Insert recipe into database
    $query = "INSERT INTO recipes (title, description, category, image, author, date, likes) 
              VALUES (?, ?, ?, ?, ?, ?, 0)";
    
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssssss", $title, $description, $category, $image_path, $author, $date);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['success_message'] = "Recipe shared successfully!";
        header('Location: community-cookbook.php');
        exit();
    } else {
        $_SESSION['error_message'] = "Error sharing recipe. Please try again.";
        header('Location: community-cookbook.php');
        exit();
    }
}
?>
