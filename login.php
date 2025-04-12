<?php
	session_start();
	define('BASEPATH', true);
	require 'connect.php';
	
	$_SESSION['user'] = '';
	$_SESSION['id'] = '';
	$_SESSION['member'] = '';
	$_SESSION['fname'] = '';
	$_SESSION['lname'] = '';
	
	if(isset($_POST['login'])) {
		try {
			// Establish a connection to the database
			$conn = new PDO("mysql:host = $servername; dbname=reeve_basnett_law_database", $username, $password);
			$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$user_login = !empty($_POST['username']) ? ($_POST['username']) :null;
			$password_attempt = !empty($_POST['password']) ? ($_POST['password']) :null;

			// Prepare an SQL statement to get login credentials
			$stmt = $conn -> prepare("SELECT user_id, username, `password` FROM login WHERE username = :username");
			$stmt->bindParam(':username', $user_login);
			$stmt -> execute();
			
			$user = $stmt -> fetch(PDO::FETCH_ASSOC);
			
			if($user === false) {
				echo '<script>alert("Invalid username or password")</script>';
			} else {
				//$password_valid = password_verify($password_attempt, $user['password']);
				$stored_password = $user['password'];

				//echo 'Stored hash: ' . $user['password'];  // Output the stored hash
				//echo 'Input hash: ' . password_hash($password_attempt, PASSWORD_BCRYPT);  // Output a hash of the input password

				if($password_attempt === $stored_password) { //if($password_valid) {
					// Prepare an SQL statement to retrieve user information
					$stmt2 = $conn -> prepare("SELECT * FROM users WHERE user_id = :user_id");
					$stmt2 -> bindParam(':user_id', $user['user_id']);
					$stmt2 -> execute();

					$user_info = $stmt2 -> fetch(PDO::FETCH_ASSOC);
						
					$_SESSION['user'] = $user_login;
					$_SESSION['id'] = $user['user_id'];
					$_SESSION['member'] = $user_info['firm_member'];
					$_SESSION['fname'] = $user_info['first_name'];
					$_SESSION['lname'] = $user_info['last_name'];

					// Alert successful login and redirect to home page
					echo '<script>
							alert("You have logged in!")
							window.location.href = "home_page.php";
						</script>';
					exit;
				} else {
					echo '<script>alert("Invalid username or password")</script>';
				}
			}
		} catch(PDOException $e) {
			echo "Connection failed: " . $e -> getMessage();
		}
	}

	$conn = null;
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Log In</title>
		<meta charset="UTF-8" id="charset">
		<meta name="description" content="Welcome page for Reeve Basnett PLLC" id="description">
		<meta name="keywords" content="Reeve, Basnett, PLLC, Law Firm, log in, create" id="keywords">
		<meta name="viewport" content="width=device-width, initial-scale=1" id="viewport">    
        <link rel="stylesheet" href="login_page_styling.css">
	</head>

	<body>
		<div id="content">
			<div id="logo_container">
				<a href="home_page.php">
					<img id="law_firm_logo" src="law_firm_logo.jpg" alt="Image was unable to load">
				</a>
			</div>
			<hgroup id="page_select">
				<a href="home_page.php">Home</a>
				<a href="info_page.php">About Us</a>
				<a href="team_page.php">Our Team</a>
				<a href="documents_page.php">Legal Documents</a>
				<a href="blog_page.php">Blog</a>
				<a href="review_page.php">Reviews</a>
				<a id="login_create_account_page" href="login.php" disabled>Log In / Create Account</a>
			</hgroup>
			
         	<div id="account_page_selector">  
              <a href="create_account.php">
                  <input type="button" id="create_account_tab" name="create_account_tab" value="Create Account">
              </a>
			</div>
        	<div id="login_container">
				<form method="POST" action="login.php">
					<div id="input_area">
						<div id="login_input">
							<input type="text" required id="username" name="username" placeholder="Enter username...">

							<input type="password" required id="password" name="password" placeholder="Enter password...">
						</div> 
						
						<div id="login_button">
							<input type="submit" id="login" name="login" value="Log In">
						</div>
					</div>
				</form>
          </div>
          <div id="footer">
				<p>
					The information presented on this website should not be construed as formal legal advice nor the formation of a lawyer/client relationship. This website is designed for general information only.
				</p>
				<p>
					Copyright © 2023 Reeve Basnett PLLC. All Rights Reserved.
				</p>
			</div>
        </div>
	</body>
</html>
