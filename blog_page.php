<?php
	session_start();
	define('BASEPATH', true);
	require 'connect.php';

	// Check if the user is logged in
	$is_logged_in = !empty($_SESSION['user']) && !empty($_SESSION['id']);

	// Check if the user is a member
	$is_member = isset($_SESSION['member']) && ($_SESSION['member'] == 1);

	if (isset($_GET['logout'])) {
		session_unset(); // Unset all session variables
		session_destroy(); // Destroy the session
		header("Location: blog_page.php"); // Redirect to blog page after logout
		exit(); // Ensure no further code is executed after the redirect
	}

	try {
		// Establish a connection to the database
		$dsn = new PDO("mysql:host = $servername; dbname=reeve_basnett_law_database", $username, $password);
		$dsn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// Prepare an SQL statement to retrieve all blog posts
		$stmt = $dsn -> prepare("SELECT * FROM blog ORDER BY time_posted DESC");
		$stmt -> execute();

		$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
	} catch (PDOException $e) {
		echo 'Error: ' . $e->getMessage();
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Blog</title>
		<meta charset="UTF-8" id="charset">
		<meta name="description" content="Welcome page for Reeve Basnett PLLC" id="description">
		<meta name="keywords" content="Reeve, Basnett, PLLC, Law Firm, blog" id="keywords">
		<meta name="viewport" content="width=device-width, initial-scale=1" id="viewport">
		<link rel="stylesheet" href="blog_page_styling.css">
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
				<a id="blog_page" href="blog_page.php" disabled>Blog</a>
				<a href="review_page.php">Reviews</a>

				<!-- Conditionally display login or logout button -->
                <?php if ($is_logged_in): ?>
                    <a href="blog_page.php?logout=true">Log Out</a>
                <?php else: ?>
                    <a href="login.php">Log In / Create Account</a>
                <?php endif; ?>
			</hgroup>
			
			<h2 id="welcome_head">Welcome To Our Blog</h2>
			            
			<button id="write_post_button">Write Post</button>
            
            <div id="blog_posts">
				<?php
					// Loop through each blog post and display it
					if (!empty($posts)) {
						foreach ($posts as $post) {
							// Display each post
                ?>
            	<div class="blog_post">
                	<div class="blog_head">
						<h3><?php echo htmlspecialchars($post['title']); ?></h3>
						<p id="date"><?php echo date("F j, Y", strtotime($post['time_posted'])); ?></p>
                	</div>    
                    <p class="blog_txt">
						<?php echo htmlspecialchars($post['description']); ?>
                    </p>
                    <a class="blog_link" href="<?php echo htmlspecialchars($post['link']); ?>" target='_blank'>Read More</a>
                </div>
				<?php
					}
				} else {
					echo '<p style="color: white">No blog posts available.</p>';
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

			var isMember = <?php echo json_encode($is_member); ?>;

			// Get the button element
			var writePostButton = document.getElementById('write_post_button');

			// If the button exists, assign click functionality
			if (writePostButton) {
				writePostButton.addEventListener('click', function() {
					if (isLoggedIn && isMember) {
						// User is logged in, so open the window
						openWin();
					} else if (isLoggedIn && !isMember) {
						// User is logged in but is NOT a member, show alert
						alert("You do not have permission to access this feature!");
					} else {
						// User is NOT logged in, show alert
						alert("You must login first!");
					}
				});
			} else {
				console.error("Button with ID 'write_post_button' not found!");  // Debugging
			}
			
			// Function to open the new window for creating a blog post
			function openWin() {
				// Use available screen width and height (removes taskbar and other UI elements)
				var screenWidth = window.screen.availWidth;
				var screenHeight = window.screen.availHeight;

				// Desired window dimensions
				var windowWidth = 1200;
				var windowHeight = 348;

				// Calculate center position
				var left = (screenWidth -windowWidth) / 2;
				var top = (screenHeight - windowHeight) / 4;

				// Ensure the position is at least 0
				left = Math.max(0, left);
				top = Math.max(0, top);

				// Open the window with the calculated position and additional options
				myWindow = window.open("post_blog.php", "_blank", 
					"width=" + windowWidth + ", height=" + windowHeight + 
					", left=" + left + ", top=" + top + 
					", resizable=no");
			}
		</script>
	</body>
</html>