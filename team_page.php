<?php
	session_start();
	define('BASEPATH', true);
	require 'connect.php';

	$is_logged_in = !empty($_SESSION['user']) && !empty($_SESSION['id']);

	if (isset($_GET['logout'])) {
		session_unset(); // Unset all session variables
		session_destroy(); // Destroy the session
		header("Location: team_page.php"); // Redirect to team page after logout
		exit(); // Ensure no further code is executed after the redirect
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Our Team</title>
		<meta charset="UTF-8" id="charset">
		<meta name="description" content="Welcome page for Reeve Basnett PLLC" id="description">
		<meta name="keywords" content="Reeve, Basnett, PLLC, Law Firm, team, members" id="keywords">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" id="viewport">
        <link rel="stylesheet" href="team_page_styling.css">
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
				<a id="team_page" href="team_page.php" disabled>Our Team</a>
				<a href="documents_page.php">Legal Documents</a>
				<a href="blog_page.php">Blog</a>
				<a href="review_page.php">Reviews</a>

				<!-- Conditionally display login or logout button -->
                <?php if ($is_logged_in): ?>
                    <a href="team_page.php?logout=true">Log Out</a>
                <?php else: ?>
                    <a href="login.php">Log In / Create Account</a>
                <?php endif; ?>
			</hgroup>
			
			<div id="member_info">
				<div id="ashley_basnett_info">
					<div id="ashley_basnett_img_container">
						<img src="ashley_basnett.jpg" alt="Image was unable to load" id="ashley_basnett_img">
					</div>
					
					<div id="ashley_basnett_txt">
						<div id="ashley_basnett_contact">
							<h3>Ashley Reeve Basnett</h3>
							<div id="ashley_basnett_links">
								<i class="fa-brands fa-linkedin"></i>
								<a href="https://www.linkedin.com/in/ashley-basnett-35315b60/" target="_blank" id="ashley_linkedin">LinkedIn</a>
								<i class="fa-solid fa-envelope"></i>
								<a href="mailto:Ashley@reevebasnett.com">Email</a>
							</div>
						</div>
						<h5>Managing Member</h5>
						<p>
							Ashley Reeve Basnett is a well-rounded attorney with years of litigation,
							negotiation and contract formation experience.  Mrs. Basnett graduated cum laude from
							Texas Tech University in 2007 with a BA in Sociology and a minor in English.  Mrs. Basnett
							attended Texas Wesleyan University School of Law (now known as Texas A&M University Law School)
							and received her Juris Doctorate in 2011. 
						</p>
						<p>
							Prior to joining Reeve Basnett PLLC, Mrs. Basnett worked as prosecutor and as a civil litigation
							attorney in a private firm.  Mrs. Basnett counsels a wide range of companies in the payments and
							financial services industries, including merchants, software developers, payment processors, ISOs,
							and acquiring banks.  Mrs. Basnett also represents companies in the fast-growing solar industry. 
						</p>
						<p>
							Mrs. Basnett is experienced in crafting and negotiating referral agreements, partner agreements,
							and purchase agreements. In addition, Mrs. Basnett is a skilled trial lawyer.  Mrs. Basnett, as
							lead counsel, has received a favorable ruling in all of her jury trials.
						</p>
					</div>
				</div>
				
				
				<div id="jay_reeve_info">
					<div id="jay_reeve_img_container">
						<img src="jay_reeve.jpg" alt="Image was unable to load" id="jay_reeve_img">
					</div>
					
					<div id="jay_reeve_txt">
						<div id="jay_reeve_contact">
							<h3>Jay Reeve</h3>
							<div id="jay_reeve_links">
								<i class="fa-brands fa-linkedin"></i>
								<a href="https://www.linkedin.com/in/jay-reeve-4bbb6838/" target="_blank" id="jay_linkedin">LinkedIn</a>
								<i class="fa-solid fa-envelope"></i>
								<a href="mailto:Jay@reevebasnett.com">Email</a>
							</div>
						</div>
						<h5>Managing Member</h5>
						<p>
							Attorney Jay Reeve is focused on delivering business-oriented legal solutions to drive revenue
							for his clients. 
						</p>
						<p>
							Mr. Reeve served over nine years with Chase Paymentech, one of the world’s largest payment processors,
							as their Associate General Counsel.  During that time, he negotiated and documented the acquisition of
							numerous payment processing companies and their merchant portfolios.  His responsibilities also included
							legal oversight of all Chase Paymentech’s strategic partner relationships (ISOs, Agent Banks, Processors).
							Mr. Reeve has successfully negotiated hundreds of merchant agreements with some of the world’s largest
							companies, and crafted numerous strategic partner relationship agreements with ISOs, Agent Banks,
							Processors and VARs.
						</p>
						<p>
							A Summa Cum Laude graduate from Texas Tech University School of Law, Mr. Reeve was the Business Manager
							for the Texas Tech Law Review.  Following graduation from law school, he worked as a securities and mergers
							acquisitions attorney at Jackson Walker LLP in Dallas. 
						</p>
						<p>
							Mr. Reeve is a former committee member of the Industry Relations Committee of The Electronic Transactions
							Association, a former committee member of the Government Relations Committee of The Electronic Transactions
							Association, and was the Committee Volunteer of the Year with the ETA for 2005-2006.
						</p>
					</div>
				</div>
				
				
				<div id="roger_hart_info">
					<div id="roger_hart_img_container">
						<img src="roger_hart.jpg" alt="Image was unable to load" id="roger_hart_img">
					</div>
					<div id="roger_hart_txt">
						<div id="roger_hart_contact">
							<h3>Roger Hart</h3>
							<div id="roger_hart_links">
								<i class="fa-brands fa-linkedin"></i>
								<a href="https://www.linkedin.com/in/roger-hart-692611212/" target="_blank" id="roger_linkedin">LinkedIn</a>
							</div>
						</div>
						<h5>Of Counsel</h5>
						<p>
							Roger Hart serves as Of Counsel to the firm, working primarily on matters related to the payments
							industry and other general business matters.
						</p>
						<p>
							Mr. Hart was with Chase Paymentech for 18 years, serving as its general counsel for the last 14 of
							those years.  In that capacity he was a member of Chase Paymentech’s senior management team and was
							responsible for all business, corporate and other legal matters in which the company was involved in
							the U.S., Canada and Europe.  He has been involved in all facets of the payments business. He led the
							negotiation of several significant transactions, including major agreements with Chase Paymentech’s
							primary outside processor and the acquisition of Chase Paymentech’s Canadian processing business.
							Prior to joining Chase Paymentech, Mr. Hart worked as a financial services lawyer at both the former
							Dallas law firm of Hughes & Luce and Bank of America.
						</p>
						<p>
							Mr. Hart is a 1983 graduate of Southern Methodist University School of Law (now known as SMU Dedman
							School of Law), where he earned the prestigious Order of the Coif honor and was a member of the
							Journal of Air Law and Commerce. 
						</p>
					</div>
				</div>
				
				
				<div id="rhonda_reeve_info">
					<div id="rhonda_reeve_img_container">
						<img src="rhonda_reeve.jpg" alt="Image was unable to load" id="rhonda_reeve_img">
					</div>
					
					<div id="rhonda_reeve_txt">
						<div id="rhonda_reeve_contact">
							<h3>Rhonda Reeve, CPA</h3>
							<div id="rhonda_reeve_links">
								<i class="fa-brands fa-linkedin"></i>
								<a href="https://www.linkedin.com/company/reeve-augustine-pllc/about/" target="_blank" id="rhonda_linkedin">LinkedIn</a>
							</div>
						</div>
						<h5>Firm Administrator</h5>
						<p>
							Rhonda graduated Magnum Cum Laude in Bachelor of Business from West Texas State University in 1991.
							Following graduation, Rhonda worked as a public accountant in taxation until her retirement in 2008.
						</p>
						<p>
							Following her retirement, Jay began his own law firm. Rhonda was the head of the administrative department,
							as she is now at Reeve Basnett PLLC. Among her duties are billing, collections, accounting and tax preparation.
						</p>
					</div>
				</div>
				
				
				<div id="brittany_hopkins_info">
					<div id="brittany_hopkins_img_container">
						<img src="brittany_reeve_hopkins.jpg" alt="Image was unable to load" id="brittany_hopkins_img">
					</div>
					
					<div id="brittany_hopkins_txt">
						<div id="rhonda_reeve_contact">
							<h3>Brittany Reeve Hopkins</h3>
							<div id="brittany_hopkins_links">
								<i class="fa-brands fa-linkedin"></i>
								<a href="https://www.linkedin.com/in/brittany-hopkins-9a9713239/" target="_blank" id="brittany_linkedin">LinkedIn</a>
							</div>
						</div>
						<h5>Legal Assistant</h5>
						<p>
							Brittany is a legal assistant at the office of Reeve Basnett PLLC. She joined our firm in October 2021.
							Brittany provides assistance with setting appointments, document filings, new business formation, quarterly
							corporate record maintenance, payroll, quickbooks, and research data. Brittany graduated Frenship High School
							in 2002.
						</p>
					</div>
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


