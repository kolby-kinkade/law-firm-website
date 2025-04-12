<?php
	define('BASEPATH', true);
	require 'connect.php';
	
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_account'])) {
		try{
			// Establish a connection to the database
			$dsn = new PDO("mysql:host = $servername; dbname=reeve_basnett_law_database", $username, $password);
			$dsn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$f_name = $_POST['first_name'];
			$l_name = $_POST['last_name'];
			$email = $_POST['email'];
			$company_rel = $_POST['company_relation'];
			$member = isset($_POST['firm_relation']) && $_POST['firm_relation'] === 'Member' ? 1 : 0;
        	$client = isset($_POST['firm_relation']) && $_POST['firm_relation'] === 'Client' ? 1 : 0;
			$username = $_POST['username'];
			$pass = $_POST['password'];
			$conf_pass = $_POST['confirm_password'];
			
			//$pass = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));
			
			// Password strength validation using regex
			$pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/';
			
			// Check if the username already exists
			$stmt = $dsn -> prepare("SELECT COUNT(username) AS num FROM login WHERE username = :username");
			$stmt -> bindValue(':username', $username);
			$stmt -> execute();
			
			$row = $stmt -> fetch(PDO::FETCH_ASSOC);
			
			if(!preg_match($pattern, $pass)) {
				// Password does not meet strength requirements
				echo '<script>alert("Password should contain a minimum of 8 characters, at least one uppercase and lowercase letter, at least one number, and at least one special character!");</script>';
			} else if($pass !== $conf_pass) {
				// Password and confirm password do not match
				echo '<script>alert("Passwords do not match");</script>';
			} else if($row['num'] > 0) {
				// Username already exists
				echo '<script>alert("Username already exists");</script>';
			} else {
				// Prepare an SQL statement to insert user information into the users table
				$stmt = $dsn -> prepare("INSERT INTO users (first_name, last_name, company_affil, firm_member, firm_client, email)
					VALUES(:first_name, :last_name, :company_affil, :firm_member, :firm_client, :email)");
				
				$stmt -> bindParam(':first_name', $f_name);
				$stmt -> bindParam(':last_name', $l_name);
				$stmt -> bindParam(':company_affil', $company_rel);
				$stmt -> bindParam(':firm_member', $member);
				$stmt -> bindParam(':firm_client', $client);
				$stmt -> bindParam(':email', $email);
				
				if($stmt -> execute()) {
					// Get the last user ID inserted into the database 
					$last_user_id = $dsn -> lastInsertId();

					// Prepare an SQL statement to insert user information into the login table
					$stmt2 = $dsn -> prepare("INSERT INTO login (user_id, username, `password`)
					VALUES(:user_id, :username, :pass)");

					$stmt2->bindParam(':user_id', $last_user_id);
					$stmt2 -> bindParam(':username', $username);
					$stmt2 -> bindParam(':pass', $pass);
				
					if($stmt2 -> execute())
					{
						// Alert registration successful and redirect to login page
						echo '<script>
								alert("Registration successful");
								window.location.href = "login.php";
							</script>';
					} else {
						$error = "Error: ".$e -> getMessage();
						echo '<script>alert("'.$error.'");</script>';
					}
										
				} else {
					$error = "Error: ".$e -> getMessage();
					echo '<script>alert("'.$error.'");</script>';
				}
			}
		} catch(PDOException $e) {
			$error = "Error: ".$e -> getMessage();
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Create Account</title>
		<meta charset="UTF-8" id="charset">
		<meta name="description" content="Welcome page for Reeve Basnett PLLC" id="description">
		<meta name="keywords" content="Reeve, Basnett, PLLC, Law Firm, log in, create" id="keywords">
		<meta name="viewport" content="width=device-width, initial-scale=1" id="viewport">    
        <link rel="stylesheet" href="create_account_page_styling.css">
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
				<a href="login.php">
					<input type="button" id="login_tab" name="login_tab" value="Log In">
				</a>
			</div>
			
        	<div id="create_account_container">			  
				<form method="POST" action="create_account.php">		  			  
					<div id="input_area">
						<div id="create_account_input">
							<div class="input_row">
								<div>
									<input type="text" required id="first_name" name="first_name" value="<?php if(isset($_POST['first_name'])){ echo $_POST['first_name'];}?>" placeholder="* Enter first name...">
								</div>
								<div>
									<input type="text" required id="last_name" name="last_name" value="<?php if(isset($_POST['last_name'])){ echo $_POST['last_name'];}?>" placeholder="* Enter last name...">
								</div>
							</div>
							<div class="input_row">
								<div>
									<input type="email" required id="email" name="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];}?>" placeholder="* Enter e-mail...">
								</div>
								<div>
									<input type="text" id="company_relation" name="company_relation" value="<?php if(isset($_POST['company_relation'])){ echo $_POST['company_relation'];}?>" placeholder="Enter company or N/A...">
								</div>
							</div>
							<div class="input_row">
								<div>
									<input type="radio" required id="member" name="firm_relation" value="Member" <?php if (isset($_POST['firm_relation']) && $_POST['firm_relation'] === 'Member' ? 1 : 0) {echo 'checked="checked"';}?>>
									<label for="member" id="member_label">Member</label>
								</div>
								<div>
									<input type="radio" required id="client" name="firm_relation" value="Client" <?php if (isset($_POST['firm_relation']) && $_POST['firm_relation'] === 'Client' ? 1 : 0) {echo 'checked="checked"';}?>>
									<label for="client" id="client_label">Client</label>
								</div>
							</div>
							<div class="input_row">
								<div>
									<input type="text" required id="username" name="username" value="<?php if(isset($_POST['username'])){ echo $_POST['username'];}?>" placeholder="* Enter username...">
								</div>
								<div>
									<input type="password" required id="password" name="password" placeholder="* Enter password...">
								</div>
							</div>
							<div class="input_row">
								<input type="password" required id="confirm_password" name="confirm_password" placeholder="* Confirm password...">
							</div>
						</div>  
						<div id="create_account_button">
							<input type="submit" id="create_account" name="create_account" value="Create Account">
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