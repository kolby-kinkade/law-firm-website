<?php
	session_start();
	define('BASEPATH', true);
	require 'connect.php';

	// Check if the user is logged in
	$is_logged_in = !empty($_SESSION['user']) && !empty($_SESSION['id']);

	// Check if the user is a client
	$is_client = isset($_SESSION['member']) && ($_SESSION['member'] == 0);

	if (isset($_GET['logout'])) {
		session_unset(); // Unset all session variables
		session_destroy(); // Destroy the session
		header("Location: review_page.php"); // Redirect to review page after logout
		exit(); // Ensure no further code is executed after the redirect
	}

	try {
		// Establish a connection to the database
		$dsn = new PDO("mysql:host = $servername; dbname=reeve_basnett_law_database", $username, $password);
		$dsn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// Prepare an SQL statement to retrieve all reviews
		$stmt = $dsn -> prepare("SELECT * FROM reviews ORDER BY time_posted DESC");
		$stmt -> execute();

		$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
	} catch (PDOException $e) {
		echo 'Error: ' . $e->getMessage();
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Reviews</title>
		<meta charset="UTF-8" id="charset">
		<meta name="description" content="Welcome page for Reeve Basnett PLLC" id="description">
		<meta name="keywords" content="Reeve, Basnett, PLLC, Law Firm, reviews" id="keywords">
		<meta name="viewport" content="width=device-width, initial-scale=1" id="viewport">
		<link rel="stylesheet" href="review_page_styling.css">
		<script src="https://kit.fontawesome.com/190ee76ddd.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
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
				<a id="review_page" href="review_page.php" disabled>Reviews</a>

				<!-- Conditionally display login or logout button -->
                <?php if ($is_logged_in): ?>
                    <a href="review_page.php?logout=true">Log Out</a>
                <?php else: ?>
                    <a href="login.php">Log In / Create Account</a>
                <?php endif; ?>
			</hgroup>
			
			<h2 id="welcome_head">Reviews From Our Clients</h2>
		
			<button id="write_review_button">Write Review</button>

			<div id="review_posts">
				<?php
					// Loop through each blog post and display it
					if (!empty($posts)) {
						foreach ($posts as $post) {
							// Display each post
                ?>
            	<div class="review_post">
                	<div class="review_head">
						<div id="star_rating_container">
							<h3>Star Rating:</h3>
							<div id="star_rating">
								<?php
									$rating = (int)$post['star_rating'];
									for ($i = 1; $i <= 5; $i++) {
										if ($i <= $rating) {
											echo '<i class="fa-solid fa-star"></i>'; // Solid Star
										} else {
											echo '<i class="fa-regular fa-star"></i>'; // Empty star
										}
									}
								?>
							</div>
						</div>
						<p id="date"><?php echo date("F j, Y", strtotime($post['time_posted'])); ?></p>
                	</div>    
                    <p class="review_txt">
						<?php echo htmlspecialchars($post['description']); ?>
                    </p>
					
					<?php
						// Find first and last names of users who posted reviews
						$userId = $post['user_id'];
						$userStmt = $dsn->prepare("SELECT first_name, last_name FROM users WHERE user_id = :user_id");
						$userStmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
						$userStmt->execute();

						$user = $userStmt->fetch(PDO::FETCH_ASSOC);
					?>

                    <h4>- <?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></h4>
                </div>
				<?php
					}
				} else {
					echo '<p style="color: white">No reviews submitted.</p>';
				}
				?>
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
        
        <script>
			// Set a flag based on the PHP session
			var isLoggedIn = <?php echo json_encode($is_logged_in); ?>;

			var isClient = <?php echo json_encode($is_client); ?>;

			// Get the button element
			var writeReviewButton = document.getElementById('write_review_button');

			// If the button exists, assign click functionality
			if (writeReviewButton) {
				writeReviewButton.addEventListener('click', function() {
					if (isLoggedIn && isClient) {
						// User is logged in, so open the window
						openWin();
					} else if (isLoggedIn && !isClient){
						// User is logged in but is NOT a client, show alert
						alert("You do not have permission to access this feature!");
					} else {
						// User is NOT logged in, show alert
						alert("You must login first!");
					}
				});
			} else {
				console.error("Button with ID 'write_review_button' not found!");  // Debugging
			}
			
			// Function to open the new window for creating a blog post
			function openWin() {
				// Use available screen width and height (removes taskbar and other UI elements)
				var screenWidth = window.screen.availWidth;
				var screenHeight = window.screen.availHeight;

				// Desired window dimensions
				var windowWidth = 1200;
				var windowHeight = 310;

				// Calculate center position
				var left = (screenWidth - windowWidth) / 2;
				var top = (screenHeight - windowHeight) / 4;

				// Ensure the position is at least 0
				left = Math.max(0, left);
				top = Math.max(0, top);

				// Open the window with the calculated position and additional options
				myWindow = window.open("post_review.php", "_blank", 
					"width=" + windowWidth + ", height=" + windowHeight + 
					", left=" + left + ", top=" + top + 
					", resizable=no");
			}
		</script>     
	</body>
</html>