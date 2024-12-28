<?php 

include 'source/config.php';

error_reporting(0);

session_start();

if (isset($_POST['submit'])) {

	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	
	// Password validation
	$password = $_POST['password'];
	if (strlen($password) < 8 || !preg_match("/[A-Z]/", $password) || 
		!preg_match("/[a-z]/", $password) || !preg_match("/[0-9]/", $password)) {
		echo '<script>alert("Password must be at least 8 characters and contain uppercase, lowercase, and numbers.");
			  window.location.href = "sign.php";</script>';
		exit();
	}
	
	// Secure password hashing
	$password_hash = password_hash($password, PASSWORD_DEFAULT);

	$sql = "SELECT * FROM users WHERE email=?";
	$stmt = mysqli_prepare($conn, $sql);
	mysqli_stmt_bind_param($stmt, "s", $email);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);

	if (!$result->num_rows > 0) {
		$sql = "INSERT INTO users (username, email, password, failed_attempts, last_failed_attempt) 
				VALUES (?, ?, ?, 0, NULL)";
		$stmt = mysqli_prepare($conn, $sql);
		mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password_hash);
		$result = mysqli_stmt_execute($stmt);
		if ($result) {
			$username = "";
			$email = "";
			$_POST['password'] = "";
			echo '<script>alert("Wow! User Registration Completed.")
				 window.location.href = "sign.php";
				 </script>';
		}
		 else {
			echo '<script>alert("Woops! Something Went Wrong.")
				 window.location.href = "sign.php";
				 </script>';
		}
	} else {
		echo '<script>alert("Woops! Email Already Exists.")
				 window.location.href = "sign.php";
				 </script>';
	}
}

?>
