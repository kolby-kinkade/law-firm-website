<?php
	session_start();
	define('BASEPATH', true);
	require 'connect.php';

	$is_logged_in = !empty($_SESSION['user']) && !empty($_SESSION['id']);

	if (isset($_GET['logout'])) {
		session_unset(); // Unset all session variables
		session_destroy(); // Destroy the session
		header("Location: home_page.php"); // Redirect to home page after logout
		exit(); // Ensure no further code is executed after the redirect
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<meta charset="UTF-8" id="charset">
		<meta name="description" content="Welcome page for Reeve Basnett PLLC" id="description">
		<meta name="keywords" content="Reeve, Basnett, PLLC, Law Firm, Home" id="keywords">
		<meta name="viewport" content="width=device-width, initial-scale=1" id="viewport">
		<link rel="stylesheet" href="home_page_styling.css">
	</head>

	<body>
		<div id="content">
			<div id="logo_container">
				<a href="home_page.php">
					<img id="law_firm_logo" src="law_firm_logo.jpg" alt="Image was unable to load">
				</a>
			</div>
			<hgroup id="page_select">
				<a id="home_page" href="home_page.php" disabled>Home</a>
				<a href="info_page.php">About Us</a>
				<a href="team_page.php">Our Team</a>
				<a href="documents_page.php">Legal Documents</a>
				<a href="blog_page.php">Blog</a>
				<a href="review_page.php">Reviews</a>

				<!-- Conditionally display login or logout button -->
                <?php if ($is_logged_in): ?>
                    <a href="home_page.php?logout=true">Log Out</a>
                <?php else: ?>
                    <a href="login.php">Log In / Create Account</a>
                <?php endif; ?>
			</hgroup>
			<div id="background_container">   
				<img id ="background_img" src="home_background.jpg" alt="Image was unable to load">
				<div id="overlay_txt">
					<h1 id="company_name">Reeve Basnett PLLC</h1>
					<p>
					  With our commitment to excellence and dedication to our clients,
					  you can trust us to provide the best possible solutions for your
					  legal needs within the electronic payments field. Let us be your
					  partner in navigating the complexities of electronic payments law
					  and helping you find the best way forward.
					</p>
				</div>
		   </div>
		   
			<h2 id="practice_title">What We Do</h2>
			<p id="practices_txt">
				Our combined qualities of integrity, persistence, and desire for a positive outcome drives our Texas law firm in helping clients navigate the intricacies of the legal system in these areas: Business Litigation, Employment 				Law, Corporate Law, Electronic Payments Law and Data Privacy, and Match. 
			</p>

			<div id="practices_container">
				<div id="business_practices">
					<div id="business_img_container">
						<img id="business_img" src="business_img.jpg" alt="Image was unable to load">
					</div>
					<div id="business_txt">
						<h3 id="business_law">Business Law</h3>
						<p>
						Business Law, including business formation, and contracts.
						</p>
						<ul id="business_list">
							<li>Business Law</li>
							<li>Business Litigation</li>
							<li>Employment Law</li>
							<li>Corporate Law</li>
						</ul>
					</div>
				</div>
			
			
			
				<div id="electronic_practices">
					<div id="electronic_txt">
						<h3 id="electronic_law">Electronic Payments Law and Data Privacy</h3>
						<p>
							Payments Law and Transactions Law for buyers and sellers.
						</p>
						<ul id="electronic_list">
							<li>Electronic Payments Law and Data Privacy</li>
							<li>MATCH</li>
						</ul>
					</div>
					<div id="electronic_img_container">
						<img id="electronic_img" src="electronic_img.jpg" alt="Image was unable to load">
					</div>
				</div>
			</div>
		   
		   
			<div id="info_container">  
				<div id="info">
					<h2 id="info_title">About Reeve Basnett PLLC</h2>
					<h3 id="key_terms">Experience. Expertise. Excellence.</h3>			
					<p>
						Reeve Basnett PLLC is full service law firm with offices strategically located in Texas. Our firm works very hard to deliver the successful outcomes that our clients deserve while maintaining the highest level of professionalism and integrity. Our firm, motivated by righting injustices imposed upon its clients, looks to even the score through tenacious preparation and zealous advocacy. The needs of our client are the focus of every case. Because of its size and experience, our firm is able to adapt its representation to the individualized needs of each client and provide them with effective—and often untraditional—solutions at a reasonable rate.
					</p>          
				</div>
			   
			   
				<div class="scroll-container">
					<img src="scroll_img1.jpg" alt="Image was unable to load">
					<img src="scroll_img2.avif" alt="Image was unable to load">
					<img src="scroll_img3.jpg" alt="Image was unable to load">
					<img src="scroll_img4.jpeg" alt="Image was unable to load">
				</div>
			</div>
		   
			<div id="support_container">
				<div id="consult_img_container">
					<img id="consult_img" src="consult_img.jpg" alt="Unable to load image">
				</div>
		   
				<div id="suppoting_reasons">
					<h2 id="support_title">Why you should choose Reeve Basnett PLLC</h2>
					<h3 id="support_terms">Experience, Expertise, and Excellence</h3>
			
					<p>
						Legal cases often journey through several stages such as investigation, pleadings, discovery, trial, and appeal, but many lawsuits can be settled before going to trial.  Reeve Basnett PLLC’s many years of combined experience ensures that your case is managed in the most organized, thoughtful, timely, and cost efficient manner possible. Our client’s need is the focus of every case, and we’re able to easily adapt our representation to provide you with solid—and often untraditional—solutions.
					</p>
			
					<p>
						Call us today to ask a question or to schedule a consultation. We look forward to delivering successful outcomes to issues that affect your bottom line – and your life.
					</p>
				</div>
			</div>
		   
			<h2 id="contact_us">Contact Us</h2>
		   
			<div id="contact_info">
				<div id="address">
					<h3 id="address_head">Address</h3>
					<p>
						P.O. Box 1398 Athens, Texas 75751
					</p>
				</div>
				
				<div id="contact">
					<h3 id="contact_head">Contact</h3>
					<p>
						Tel (903) 887-0602
					</p>
					<p>
						Fax (903) 887-0941
					</p>
				</div>
				
				<div id="email">
					<h3 id="email_head">E-mail</h3>
					<table id="email_info">
						<tr>
						  <td class="name">Jay Reeve</td>
						  <td>Jay@reevebasnett.com</td>
						</tr>
						<tr>
						  <td class="name">Ashley Reeve Basnett</td>
						  <td>Ashley@reevebasnett.com</td>
						</tr>
					</table>
				</div>
				
				<div id="oper_hours">
					<h3 id="hours_head">Office Hours</h3>
					<table id="day_times">
						<tr>
						  <td>Mon - Fri</td>
						  <td>9:00 am – 5:00 pm</td>
						</tr>
						<tr>
						  <td>Saturday</td>
						  <td>Closed</td>
						</tr>
						<tr>
						  <td>Sunday</td>
						  <td>Closed</td>
						</tr>
					</table>
				</div>
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

