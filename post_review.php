<?php
	session_start();
	define('BASEPATH', true);
	require 'connect.php';	

	$user_id = $_SESSION['id'];
	
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post_review'])) {
		try {
			// Establish a connection to the database
			$dsn = new PDO("mysql:host = $servername; dbname=reeve_basnett_law_database", $username, $password);
			$dsn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$rating = $_POST['star_rating'];
			$description = $_POST['description'];
			
			$date = date('Y-m-d H:i:s');

			if ($rating < 1 || $rating > 5) {
				echo '<script>alert("Rating must be between 1 and 5!");</script>';
			}
			else {
				// Prepare an SQL statement to write a review to the database
				$stmt = $dsn -> prepare("INSERT INTO reviews (star_rating, description, time_posted, user_id)
					VALUES(:rating, :description, :date, :user_id)");
				
				$stmt -> bindParam(':rating', $rating);
				$stmt -> bindParam(':description', $description);
				$stmt -> bindParam(':date', $date);
				$stmt -> bindParam(':user_id', $user_id);
				
				if($stmt -> execute())
				{
					echo '<script>alert("Post successful"); window.close();</script>';
					exit();
					header("Location: review_page.php"); // Redirect to the review page
				} else {
					echo '<script>alert("Error while posting blog.");</script>';
				}
			}
		} catch(PDOException $e) {
			$error = "Error: ".$e -> getMessage();
			echo '<script>alert("' . $error . '");</script>';
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>New Post</title>
		<meta charset="UTF-8" id="charset">
		<meta name="viewport" content="width=device-width, initial-scale=1" id="viewport">
		<link rel="stylesheet" href="review_post_page_styling.css">
	</head>
	
	<body>
		<div id="content">
			<div id="post_container">
				<form method="POST" action="post_review.php">
					<div id="input_container">
						<div id="rating_container">
							<input type="text" id="star_rating" name="star_rating" class="text_input" placeholder="Enter star rating from 1-5...">
						</div>
						
						<div id="description_container">
							<textarea id="description" name="description"
								rows="8">Write your review here.
							</textarea>
						</div>
					</div>
					
					<div id="button_container">
						<input type="submit" id="post_button" name="post_review" value="Submit">
					</div>
				</form>
			</div>
		</div>
	</body>
</html>