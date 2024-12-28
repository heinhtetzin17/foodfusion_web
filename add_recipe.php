<?php
session_start();
include('source/config.php');

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: sign.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get user ID from session
    $query = "SELECT id FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $_SESSION['username']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
    $author_id = $user['id'];

    // Get form data
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $date = date('Y-m-d H:i:s');

    // Handle image upload
    $image_path = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Debug information
        error_log("File upload started");
        error_log("Upload info: " . print_r($_FILES['image'], true));

        $target_dir = "uploads/recipes/";
        
        // Create directory if it doesn't exist
        if (!file_exists($target_dir)) {
            // Set more permissive permissions for directory creation
            if (!mkdir($target_dir, 0755, true)) {
                error_log("Failed to create directory: " . $target_dir);
                $_SESSION['error_message'] = "Failed to create upload directory";
                header('Location: community-cookbook.php');
                exit();
            }
        }

        // Add debug logging for directory permissions
        error_log("Directory permissions: " . substr(sprintf('%o', fileperms($target_dir)), -4));
        
        // Check directory permissions - use less permissive permissions
        if (!is_writable($target_dir)) {
            error_log("Directory not writable: " . $target_dir);
            chmod($target_dir, 0755);  // Changed from 0777 to 0755
        }

        // Get file extension
        $file_extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');

        if (in_array($file_extension, $allowed_extensions)) {
            // Create unique filename
            $unique_filename = uniqid() . '.' . $file_extension;
            $target_file = $target_dir . $unique_filename;

            error_log("Attempting to move file to: " . $target_file);

            // Add debug logging for file upload attempt
            error_log("Upload file temp name: " . $_FILES['image']['tmp_name']);
            error_log("Target file location: " . $target_dir . $unique_filename);

            // Move uploaded file
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                $image_path = $target_file;
                error_log("File successfully uploaded to: " . $image_path);
            } else {
                $upload_error = error_get_last();
                error_log("Failed to move uploaded file. PHP Error: " . print_r($upload_error, true));
                $_SESSION['error_message'] = "Failed to upload image. Please check file permissions.";
                header('Location: community-cookbook.php');
                exit();
            }
        } else {
            $_SESSION['error_message'] = "Invalid file type. Only JPG, JPEG, PNG & GIF files are allowed.";
            header('Location: community-cookbook.php');
            exit();
        }
    } else {
        error_log("File upload error code: " . $_FILES['image']['error']);
        $_SESSION['error_message'] = "No file uploaded or upload error occurred.";
        header('Location: community-cookbook.php');
        exit();
    }

    // Insert recipe into database
    $query = "INSERT INTO recipes (title, description, category, image, author, date, likes) 
              VALUES (?, ?, ?, ?, ?, ?, 0)";
    
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssssss", $title, $description, $category, $image_path, $author_id, $date);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['success_message'] = "Recipe shared successfully!";
        header('Location: community-cookbook.php');
        exit();
    } else {
        $_SESSION['error_message'] = "Error sharing recipe: " . mysqli_error($conn);
        header('Location: community-cookbook.php');
        exit();
    }
}

// If not POST request, redirect to community cookbook
header('Location: community-cookbook.php');
exit();
?>
