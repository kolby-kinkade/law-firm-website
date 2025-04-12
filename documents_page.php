<?php
	session_start();
	define('BASEPATH', true);
	require 'connect.php';

	$is_logged_in = !empty($_SESSION['user']) && !empty($_SESSION['id']);
	$user_id = isset($_SESSION['id']);
	
	if (isset($_GET['logout'])) {
		session_unset(); // Unset all session variables
		session_destroy(); // Destroy the session
		header("Location: documents_page.php"); // Redirect to documents page after logout
		exit(); // Ensure no further code is executed after the redirect
	}

	$recipient_email = "";
	$ashley_basnett_email = "Ashley@reevebasnett.com";
	$jay_basnett_email = "Jay@reevebasnett.com";
	$kolby_kinkade_email = "kolby430@gmail.com";
	$mailtoLink = "";

	try {
		$dsn = new PDO("mysql:host = $servername; dbname=reeve_basnett_law_database", $username, $password);
		$dsn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		if (isset($_POST['document'], $_POST['filename'], $_POST['recipient'])) {
			$doc_type = $_POST['document'];
			$doc = $_POST['filename'];
			$recipient = $_POST['recipient'];

			// Set recipient email depending on recipient selected by user
			if ($recipient == 'ashley_basnett')
			{
				$recipient_email = $ashley_basnett_email;
			}
			if ($recipient == 'jay_reeve_basnett')
			{
				$recipient_email = $jay_basnett_email;
			}
			else if ($recipient == 'kolby_kinkade')
			{
				$recipient_email = $kolby_kinkade_email;
			}
			else
			{
				$recipient_email = "";
			}

			$stmt = $dsn -> prepare("INSERT INTO legal_docs (doc_type, doc, doc_recipient, user_id)
			VALUES(:doc_type, :doc, :recipient, :user_id)");

			$stmt -> bindParam(':doc_type', $doc_type);
			$stmt -> bindParam(':doc', $doc);
			$stmt -> bindParam(':recipient', $recipient_email);
			$stmt -> bindParam(':user_id', $user_id);
		
			if($stmt -> execute()) {
				echo '<script>alert("Submission successful");</script>';

				$userStmt = $dsn->prepare("SELECT first_name, last_name FROM users WHERE user_id = :user_id");
				$userStmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
				$userStmt->execute();

				$user = $userStmt->fetch(PDO::FETCH_ASSOC);
				
				$subject = 'Legal Document Submission';
				$body = "{$doc_type} submission for {$user['first_name']} {$user['last_name']}.";

				$encoded_subject = urlencode($subject);
    			$encoded_body = urlencode($body);

				// Replace '+' with spaces
				$encoded_subject = str_replace('+', '%20', $encoded_subject);
				$encoded_body = str_replace('+', '%20', $encoded_body); 

				// Create the mailto link
				$mailtoLink = "mailto:" . urlencode($recipient_email) .
					"?subject=" . $encoded_subject .
					"&body=" . $encoded_body;
			} else {
				echo '<script>alert("Error while submitting document.");</script>';
				$mailtoLink = "";
			}		
		}
	} catch (PDOException $e) {
		echo 'Error: ' . $e->getMessage();
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Legal Documents</title>
		<meta charset="UTF-8" id="charset">
		<meta name="description" content="Legal documents page for Reeve Basnett PLLC" id="description">
		<meta name="keywords" content="Reeve, Basnett, PLLC, Law Firm, Documents" id="keywords">
		<meta name="viewport" content="width=device-width, initial-scale=1" id="viewport">
		<link rel="stylesheet" href="documents_page_styling.css">
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
				<a id="documents_page" href="documents_page.php" disabled>Legal Documents</a>
				<a href="blog_page.php">Blog</a>
				<a href="review_page.php">Reviews</a>

				<!-- Conditionally display login or logout button -->
                <?php if ($is_logged_in): ?>
                    <a href="documents_page.php?logout=true">Log Out</a>
                <?php else: ?>
                    <a href="login.php">Log In / Create Account</a>
                <?php endif; ?>
			</hgroup>
			
			<div id="adobe_container">
				<div id="note_container">
					<h3>Note: You must install Adobe Reader 8 or higher to view and edit documents!<h3>
				</div>
				
				<div id="adobe_download">
					<a href="https://get.adobe.com/reader/" target="_blank">Adobe Reader Download</a>
				</div>
			</div>
			
			<div id="submission_container">
				<div id="instructions_container">
					<div id="instructions">
						<h2>Instructions for Submission of Legal Documents:</h2>
						<ol id="submission_instructions">
							<li>Select the specific form required from the dropdown tab.</li>
							<li>Download and complete the form.</li>
							<li>Choose the legal document being submitted.</li>
							<li>Upload the completed form.</li>
							<li>Choose who the document will be sent to.</li>
							<li>Submit the form for review.</li>
							<li>Attach completed form to email window that appears and send.</li>
						</ol>
					</div>
				</div>
				
				<form method="POST" action="documents_page.php">
					<div id="form_submission">
						<div id="document_selection">
							Document: <select name="document" id="document" required>
								<option value="" selected="selected">Select Document</option>
								<option value="boir_form">BOIR</option>
							</select>
						</div>
					
						<div id="document_upload">
							<input type="file" id="filename" name="filename" required>
						</div>
						
						<div id="recipient_selection">
							Send to: <select name="recipient" id="recipient" required>
								<option value="" selected="selected">Select Recipient</option>
								<option value="ashley_basnett">Ashley Basnett</option>
								<option value="jay_reeve_basnett">Jay Reeve Basnett</option>
								<option value="kolby_kinkade">Kolby Kinkade</option>
							</select>
						</div>
					</div>
					
					<div id="button_container">
						<input type="submit" id="submit_button" name="submit_document" value="Submit">
					</div>
				</form>
			</div>
			
			<div id="legal_documents">
				<h2 id="document_title">Document Selection:</h2>
				
				<button class="accordion">Beneficial Ownership Information Report (BOIR)</button>
				
				<div class="panel">
					<div class="panel_txt">
						<p>
							The Corporate Transparency Act requires certain types of U.S. and foreign entities to report 
							beneficial ownership information to the Financial Crimes Enforcement Network (FinCEN), a 
							bureau of the U.S. Department of the Treasury.Beneficial ownership information is information 
							about the entity, its beneficial owners, and in certain cases its company applicants.Beneficial 
							ownership information is reported to FinCEN through Beneficial Ownership Information Reports (BOIRs).
						</p>
						
						<div id="links">
							<a href="BOIR.pdf" target="_blank" download="BOIR.pdf">Download BOIR Form</a>
							
							<a href="BOIR_Filing_Instructions.pdf" target="_blank" download="BOIR_Filing_Instructions.pdf">Instructions</a>
						</div>
					</div>
				</div>
			</div>
			
			<div id="footer">
				<p>
					The information presented on this website should not be construed as formal legal advice nor the formation of a
					lawyer/client relationship. This website is designed for general information only.
				</p>
				<p>
					Copyright © 2023 Reeve Basnett PLLC. All Rights Reserved.
				</p>
			</div>
		</div>
		
		<script>
			var acc = document.getElementsByClassName("accordion");
			var i;

			// Listener for accordion
			for (i = 0; i < acc.length; i++) {
				acc[i].addEventListener("click", function() {
					this.classList.toggle("active");
					var panel = this.nextElementSibling;
					if (panel.style.maxHeight) {
					  panel.style.maxHeight = null;
					} else {
					  panel.style.maxHeight = panel.scrollHeight + "px";
					}
				});
			}

			// Set a flag based on the PHP session
			var isLoggedIn = <?php echo json_encode($is_logged_in); ?>;

			// Get the button element
			var submitDocButton = document.getElementById('submit_button');

			// If the button exists, assign click functionality
			if (submitDocButton) {
				submitDocButton.addEventListener('click', function() {
					if (!isLoggedIn) {
						// User is NOT logged in, show alert
						alert("You must login first!");
						event.preventDefault();
					}	
				});
			} else {
				console.error("Button with ID 'submit_button' not found!");  // Debugging
			}
		</script>

		<?php if ($mailtoLink) { ?>
			<!-- If the form is submitted, show the mailto link and open email client -->
			<script type="text/javascript">
				window.location.href = "<?php echo $mailtoLink; ?>";
			</script>
		<?php } ?>
	</body>
</html>