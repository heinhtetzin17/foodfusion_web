<?php 

include 'source/config.php';

session_start();

error_reporting(0);

if (isset($_POST['submit'])) {
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = $_POST['password'];

	// Check if account is locked
	$sql = "SELECT * FROM users WHERE username=?";
	$stmt = mysqli_prepare($conn, $sql);
	mysqli_stmt_bind_param($stmt, "s", $username);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);

	if ($result->num_rows > 0) {
		$user = mysqli_fetch_assoc($result);
		
		// Check if account is locked
		if ($user['failed_attempts'] >= 5 && 
			strtotime($user['last_failed_attempt']) + (15 * 60) > time()) {
			echo '<script>alert("Account is locked. Please try again in 15 minutes.");
				  window.location.href = "sign.php";</script>';
			exit();
		}

		// Verify password
		if (password_verify($password, $user['password'])) {
			// Reset failed attempts on successful login
			$sql = "UPDATE users SET failed_attempts=0, last_failed_attempt=NULL WHERE username=?";
			$stmt = mysqli_prepare($conn, $sql);
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);

			$_SESSION['username'] = $user['username'];
			header("Location: index.php");
		} else {
			// Increment failed attempts
			$failed_attempts = $user['failed_attempts'] + 1;
			$sql = "UPDATE users SET failed_attempts=?, last_failed_attempt=NOW() WHERE username=?";
			$stmt = mysqli_prepare($conn, $sql);
			mysqli_stmt_bind_param($stmt, "is", $failed_attempts, $username);
			mysqli_stmt_execute($stmt);

			$remaining_attempts = 5 - $failed_attempts;
			echo '<script>alert("Wrong password. ' . ($remaining_attempts > 0 ? 
				 $remaining_attempts . ' attempts remaining.' : 'Account is now locked for 15 minutes.') . '");
				 window.location.href = "sign.php";</script>';
		}
	} else {
		echo '<script>alert("Username not found.");
			  window.location.href = "sign.php";</script>';
	}
}

?>