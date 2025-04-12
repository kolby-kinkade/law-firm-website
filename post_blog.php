<?php
	session_start();
	define('BASEPATH', true);
	require 'connect.php';	

	$user_id = $_SESSION['id'];
	
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post_blog'])) {
		try {
			// Establish a connection to the database
			$dsn = new PDO("mysql:host = $servername; dbname=reeve_basnett_law_database", $username, $password);
			$dsn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$title = $_POST['blog_title'];
			$link = $_POST['blog_link'];
			$description = $_POST['description'];
			
			$date = date('Y-m-d H:i:s');
			
			// Prepare an SQL statement to write a blog post to the database
			$stmt = $dsn -> prepare("INSERT INTO blog (title, description, link, time_posted, user_id)
				VALUES(:title, :description, :link, :date, :user_id)");
			
			$stmt -> bindParam(':title', $title);
			$stmt -> bindParam(':description', $description);
			$stmt -> bindParam(':link', $link);
			$stmt -> bindParam(':date', $date);
			$stmt -> bindParam(':user_id', $user_id);
			
			if($stmt -> execute())
			{
				echo '<script>alert("Post successful"); window.close();</script>';
				exit();
				header("Location: blog_page.html"); // Redirect to the blog page
			} else {
				echo '<script>alert("Error while posting blog.");</script>';
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
		<link rel="stylesheet" href="blog_post_page_styling.css">
	</head>
	
	<body>
		<div id="content">
			<div id="post_container">
				<form method="POST" action="post_blog.php">
					<div id="input_container">
						<div id="title_container">
							<input type="text" id="blog_title" name="blog_title" class="text_input" placeholder="Enter post title...">
						</div>
						
						<div id="link_container">
							<input type="text" id="blog_link" name="blog_link" class="text_input" placeholder="Enter link...">
						</div>
						
						<div id="description_container">
							<textarea id="description" name="description"
								rows="8">Write a short description of the blog post here.
							</textarea>
						</div>
					</div>
					
					<div id="button_container">
						<input type="submit" id="post_button" name="post_blog" value="Submit">
					</div>
				</form>
			</div>
		</div>
	</body>
</html>