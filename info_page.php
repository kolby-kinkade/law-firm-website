<?php
	session_start();
	define('BASEPATH', true);
	require 'connect.php';

	$is_logged_in = !empty($_SESSION['user']) && !empty($_SESSION['id']);

	if (isset($_GET['logout'])) {
		session_unset(); // Unset all session variables
		session_destroy(); // Destroy the session
		header("Location: info_page.php"); // Redirect to info page after logout
		exit(); // Ensure no further code is executed after the redirect
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>About Us</title>
		<meta charset="UTF-8" id="charset">
		<meta name="description" content="Welcome page for Reeve Basnett PLLC" id="description">
		<meta name="keywords" content="Reeve, Basnett, PLLC, Law Firm, info, about, values" id="keywords">
		<meta name="viewport" content="width=device-width, initial-scale=1" id="viewport">
		<link rel="stylesheet" href="info_page_styling.css">
		<script src="https://kit.fontawesome.com/190ee76ddd.js" crossorigin="anonymous"></script>
	</head>

	<body>
		<div id="content">
			<div id="logo_container">
				<a href="home_page.php">
					<img id="law_firm_logo" src="law_firm_logo.jpg" alt="Image was unable to load">
				</a>
			</div>
			<hgroup id="page_select">
				<a href="home_page.php" disabled>Home</a>
				<a id="info_page" href="info_page.php">About Us</a>
				<a href="team_page.php">Our Team</a>
				<a href="documents_page.php">Legal Documents</a>
				<a href="blog_page.php">Blog</a>
				<a href="review_page.php">Reviews</a>

				<!-- Conditionally display login or logout button -->
                <?php if ($is_logged_in): ?>
                    <a href="info_page.php?logout=true">Log Out</a>
                <?php else: ?>
                    <a href="login.php">Log In / Create Account</a>
                <?php endif; ?>
			</hgroup>
		
		<div id="intro_container">   
			<div id="group_img_container">
				<img id="group_img" src="group_img.avif" alt="Image was unable to load">
			</div>
        
        
			<div id="intro_txt">
				<h2>
					Solid Experience and Creative Solutions for all your electronic payments and business needs.
				</h2>
			  
				<p>
					The highly experienced attorneys of Reeve Basnett PLLC deliver a full spectrum of
					insightful, intelligent business law, civil litigation, and payments law services.
					Reeve Basnett PLLC represents individuals and businesses in legal transactions, hearings,
					arbitrations, and mediations throughout Texas. Our firm also frequently handles cases
					out-of-state and serves as local counsel for litigation in the United States District Court,
					Southern District of Texas, Eastern District of Texas and Northern District of Texas.
				</p>
			</div>
		</div> 
        <div id="practices_info">
			<h2 id="practices">What We Do</h2>
			<p id="practices_txt">
			  Our combined qualities of integrity, persistence, and desire for a positive
			  outcome drives our Texas law firm in helping clients navigate the intricacies of
			  the legal system in these areas:
			</p>
		
        
			<button class="accordion">Business Law</button>
		
			<div class="panel">
				<div class="panel_txt">
					<h5>
						We’re more than business law specialists. Reeve Basnett PLLC is part of your team that
						creates outside-the-box strategies for your company.
					</h5>
        
					<p>
						Clients seeking a business lawyer for representation in the areas of corporate law, business litigation, and employment
						disputes turn to Reeve Basnett PLLC.  Our business attorneys provide qualified experience in all facets of law as it
						pertains to companies, corporations and franchises, employment issues, and representation before local government
						entities.  Our attorneys handle all types of business law for corporate legal matters relating to the formation,
						operation, and sale of businesses in the Dallas – Ft. Worth region and across the country. Our attorneys represent
						many corporate clients for one-time transactions or projects, or for companies’ multiple requirements throughout
						the lifecycle of their businesses.
					</p>
					
					<p>
						A solid knowledge of our clients’ industry, company and goals business and objectives is the cornerstone of a great
						business attorney-client relationship and aids us in determining what makes the best business sense for each case.
						Likewise, we adhere to the importance of communication and the productive flow of information, with regular contact
						and interpretation of recent developments.
					</p>
					
					<p>
						By taking proactive measures now, you are assisting your business in avoiding surprises in court or in the conference
						room. Reeve Basnett PLLC is the business law firm that delivers the effective and capable advice for these
						comprehensive areas for you or your company:
					</p>
					
					<ul>
						<li>Business Litigation, both inside and outside the courtroom</li>
						<li>Employment Law for companies and their workers</li>
						<li>Corporate Law for solid structure and procedures in your business</li>
					</ul>
				</div>
			</div>
			
			
			<button class="accordion">Business Litigation</button>
		
			<div class="panel">
				<div class="panel_txt">
					<h5>
						Successful business litigation means representation by a qualified business
						law firm like Reeve Basnett PLLC, which can be paramount to the success of
						your case. The ultimate success in business litigation rides with the Texas
						legal team who has a solid background in substantive and procedural law. A
						record of wins is partly attributed to determining the merits of a case, and
						properly advising clients of both the risks and benefits of pursuing business
						litigation.
					</h5>
					
					<p>
						Clients witness firsthand how our business lawyers work to maintain the highest
						level of professionalism and integrity while defending a firm’s reputation and
						financial position. Ashley Basnett intelligently yet aggressively pursues business
						litigation for matters such as:
					</p>
					
					<ul>
						<li>Breach of fiduciary duty by a board member, trustee, or other counsel</li>
						<li>Business fraud and misrepresentation</li>
						<li>Contract enforcement</li>
						<li>Customer complaints</li>
						<li>Debt collection, creditor rights, and bankruptcy issues</li>
					</ul>
					
					<p>
						Reeve Basnett PLLC also provides trial and deposition support services for out of
						state counsel in addition to equipping business law clients with advice on state
						and county court practices. While successfully representing clients both during
						mediation and trial, we recognize that every legal situation is as unique as the
						facts, circumstances, and parties involved.  At the same time, we know that business
						litigation can distract you from running a successful business, so we work efficiently
						to decipher details of both sides of a case to produce a positive decision.
					</p>
				</div>
			</div>
			
			
			<button class="accordion">Employment Law</button>
			
			<div class="panel">
				<h5>
					In many ways, employment law is about relationships; and the human resources of a business are equally as important as a company’s operations and finances.
				</h5>
				
				<p>
					When trust has been compromised and questionable actions occur in the workplace, know
					that our law firm will stand beside you to resolve issues regarding employment law and
					ensure that all parties maneuver within the law. We represent individuals who may be involved in employment
					law disputes, from either a plaintiff or defendant perspective, with determination
					to preserve your income, career and reputation due to issues involving:
				</p>
				
				<ul>
					<li>Wrongful termination</li>
					<li>Employee discrimination</li>
					<li>Harassment</li>
					<li>Defamation</li>
					<li>Contract disputes and severance packages</li>
					<li>Short-term engagements, and non-compete agreements from other states</li>
					<li>Misappropriation of trade secrets</li>
					<li>Tort claims</li>
					<li>Whistle-Blower and Retaliation Claims</li>
				</ul>
				
				<p>
					The correct interpretation of labor and employment laws will ensure not only the smooth
					operation a business on a daily basis, but also the employees’ loyalty and productivity.
					With a goal of helping establish positive employee-employer relationships for our clients,
					our business law firm also works at the other end of the spectrum to help businesses guard
					against damaging employment law disputes with services such as:
				</p>
				
				<ul>
					<li>Creating and documenting hiring practices</li>
					<li>Drafting and defending employment contracts, non-compete agreements, compensation and commissions</li>
					<li>Performance evaluations and terminations</li>
					<li>Incidents involving employee misconduct and harassment</li>
				</ul>
				
				<p>
					As with the other practice specialties of Reeve Basnett PLLC, we encourage mediation
					and advocacy before courtroom litigation for employment law whenever possible. Contact
					our office for assistance or answers to questions about employment law, from either an
					employee or employer’s position.  We look forward to scheduling a consultation.
				</p>
			</div>
				
				
			<button class="accordion">Corporate Law</button>
			
			<div class="panel">
				<h5>
					Simply put, highly qualified counsel in corporate law is essential for the profitability and longevity of your company.
				</h5>
				
				<p>
					Reeve Basnett PLLC serves its clients by providing intelligent, creative counsel along
					with sound business practices that protect your interests. Our corporate law team works
					with public and private companies in a wide range of industries, and in any stage of the
					life of a company that requires legal representation – from a business’ formation to its
					purchase and sale. Service contracts between businesses, transfers of intellectual property,
					or stock transfers are all examples of transactions that are likely affected by local or
					federal laws.  A business that effectively completes its various business transactions is
					an organization that has a greater chance in avoiding future disputes. The corporate law
					attorneys of Reeve Basnett PLLC negotiate, draft, and review these business transactions and more:
				</p>
				
				<ul>
					<li>Formation of corporations, limited liability companies, and partnerships</li>
					<li>Independent contractor and sales agent agreements</li>
					<li>Internal department structuring</li>
					<li>Letters of intent</li>
					<li>Mergers, acquisitions and reorganizations</li>
					<li>Sales contracts</li>
				</ul>
				
				<p>
					Corporate law requires solid knowledge and exceptional strategies that only experienced
					corporate law firms can provide. We keep things simple, however, because we know your
					business needs concise, quick, understandable legal advice. During the instance of working
					with opposing attorneys to resolve any divergent interests, we bring great discernment
					and ethical consideration in an effort to negotiate the deal toward a successful win for
					everyone involved.  Contact our offices and tell us about your business. We look forward
					to discussing your initiatives, goals, and how we can help you grow.
				</p>
			</div>
			
			
			<button class="accordion">Electronic Payments Law and Data Privacy</button>

			<div class="panel">
				<h5>
					Payment law is more than a transaction.
				</h5>
				
				<p>
					Our attorneys have decades of combined experience counseling clients on the legal
					issues surrounding card processing and electronic commerce transactions, both
					domestically and internationally, as well as keeping clients apprised of legal and
					regulatory developments, including compliance with card vendor rules, data privacy
					and security compliance and other laws affecting the payments industry. Our attorneys
					have varied experience in all sectors of the payments industry, including:
				</p>
				
				<ul>
					<li>Merchant acquiring (including residual payment agreements)</li>
					<li>Mobile payments</li>
					<li>Cross border ecommerce transactions</li>
					<li>Card schemes and payment networks</li>
					<li>Stored value, gift cards, payroll cards and other prepaid products</li>
					<li>Health care payments</li>
					<li>B2B payments</li>
					<li>FINTECH</li>
					<li>Payment facilitator models and aggregation</li>
					<li>Merchant disputes</li>
					<li>Card brand and debit networks’ regulation compliance</li>
					<li>Governmental and other regulatory (including FTC) compliance</li>
					<li>PCI and other data security compliance issues</li>
				</ul>
				
				<p>
					Our Payments Group represents a wide variety of clients, from small and mid-size to
					Fortune 500 companies and banks in the traditional payments systems to start-ups and 
					other participants in emerging payment systems. Our attorneys’ deep industry knowledge,
					in addition to their extensive experience in the payments and financial sectors, enables
					us to be the go-to leader in payments and financial services.
				</p>
			</div>

			<button class="accordion">MATCH</button>
			
			<div class="panel">
				<p>
					Chances are, if you are reading this, you have already been placed on MATCH.
					If you have already been placed on MATCH, what do you do now?  Unfortunately,
					being placed on MATCH is very often a death sentence for a merchant.
					Reeve Basnett PLLC assists merchants in educating them about the MATCH list and
					in some circumstances, assists merchants in their efforts to be removed from the MATCH list.
				</p>
				
				<h5>
					What is the MATCH list?
				</h5>
				
				<p>
					The MATCH list, formerly known as the Terminated Merchant File (TMF), was created by
					MasterCard to assist acquiring banks in identifying enhanced or incremental risk
					information of merchants prior to entering into an agreement with a merchant.
					MATCH stands for Mastercard Alert to Control High-risk. MATCH is a mandatory system
					for Mastercard acquiring banks. Acquiring banks are required to add information about
					a merchant that is terminated by the acquiring bank due to specific circumstances set
					forth by Mastercard. Further, Mastercard acquiring banks are required to search for a
					merchant in the MATCH system prior to entering into a merchant agreement with the merchant
					to determine if that merchant has been placed on the MATCH list.
				</p>
				
				<p>
					While it appears that the original intent of the MATCH list was to simply provide acquiring
					banks with information about merchants to help determine if the acquirer should enter into
					an agreement with a merchant, it ultimately has become a black list system. If a merchant
					is on the MATCH list, most acquirers will not enter into a merchant agreement with the
					merchant regardless of the reason. If an acquirer does enter into a merchant agreement
					with a merchant on the MATCH list, the terms of the merchant agreement are adjusted to
					account for the perceived greater risk of that merchant.
				</p>
				
				<h5>
					What information is on the MATCH listing?
				</h5>
				
				<p>
					Relatively very little information is actually placed on the MATCH listing. 
					The MATCH list contains specifics concerning the merchant (including but not
					limited to the merchant name, merchant ID, business address) and the principal
					(including but not limited to the name, address and phone number); however, the
					only information concerning why a merchant is placed on MATCH is the MATCH Reason Code.
				</p>
				
				<h5>
					What are the reason codes for a MATCH listing?
				</h5>
				
				<p>
					Mastercard has set forth 14 reason codes for placing a merchant on MATCH.  The reason codes are as follows:
				</p>
				
				<table>
					<tr>
						<th>MATCH Reason Code</th>
						<th>Description</th>
					</tr>
					<tr>
						<td class="match_id">01</td>
						<td>
							Account Data Compromise – An occurrence that results directly or indirectly, in the unauthorized
							access to or disclosure of Account data.
						</td>
					</tr>
					<tr>
						<td class="match_id">02</td>
						<td>
							Common Point of Purchase (CPP) – Account data is stolen at the merchant and then used for
							fraudulent purchases at other merchant locations 
						</td>
					</tr>
					<tr>
						<td class="match_id">03</td>
						<td>
							Laundering – The merchant was engaged in laundering activity. Laundering means that the
							merchant presented to its acquirer transaction records that were not valid transactions
							for sales of goods or services between that merchant and a bona fide cardholder 
						</td>
					</tr>
					<tr>
						<td class="match_id">04</td>
						<td>
							Excessive Chargebacks – With respect to a merchant reported by a Mastercard acquirer,
							the number of Mastercard chargebacks in any single month exceeded 1% of the number of
							Mastercard sales transactions in that month, and those chargebacks totaled USD $5,000
							or more. With respect to a merchant reported by an American Express acquirer (ICA numbers
							102 through 125), the merchant exceeded the chargeback thresholds of American Express,
							as determined by American Express. 
						</td>
					</tr>
					<tr>
						<td class="match_id">05</td>
						<td>
							Excessive Fraud – The merchant effected fraudulent transactions of any type (counterfeit
							or otherwise) meeting or exceeding the following minimum reporting standard: the merchant’s
							fraud-to-sales dollar volume ratio was 8% or greater in a calendar month, and the Merchant
							effected 10 or more fraudulent transactions totaling USD $5,000 or more in that calendar month. 
						</td>
					</tr>
					<tr>
						<td class="match_id">06</td>
						<td>
							Reserved for Future Use
						</td>
					</tr>
					<tr>
						<td class="match_id">07</td>
						<td>
							Fraud Conviction – There was a criminal fraud conviction of a principal owner or partner
							of the merchant. 
						</td>
					</tr>
					<tr>
						<td class="match_id">08</td>
						<td>
							Mastercard Questionable Merchant Audit Program – The Merchant was determined to be a
							Questionable Merchant as per the criteria set forth in the Mastercard Questionable Merchant
							Audit Program
						</td>
					</tr>
					<tr>
						<td class="match_id">09</td>
						<td>
							Bankruptcy/Liquidation/Insolvency – The merchant was unable or is likely to become unable
							to discharge its financial obligations. 
						</td>
					</tr>
					<tr>
						<td class="match_id">10</td>
						<td>
							Violation of Standards – With respect to a merchant reported by a Mastercard acquirer, 
							the merchant was in violation of one or more standards that describe procedures to be
							employed by the merchant in transactions in which cards are used, including, by way of
							example and not limitation, the Standards for honoring all cards, displaying the marks,
							charges to cardholders, minimum/maximum transaction amount restrictions, and prohibited
							transactions set forth in Chapter 5 of the Mastercard Rules manual. With respect to a
							merchant reported by an American Express acquirer (ICA numbers 102 through 125), the
							merchant was in violation of one or more American Express bylaws, rules, operating regulations,
							and policies that set forth procedures to be employed by the merchant in transactions in
							which American Express cards are used. 
						</td>
					</tr>
					<tr>
						<td class="match_id">11</td>
						<td>
							Merchant Collusion – The merchant participated in fraudulent collusive activity. 
						</td>
					</tr>
					<tr>
						<td class="match_id">12</td>
						<td>
							PCI Data Security Standard Noncompliance – The merchant failed to comply with
							Payment Card Industry (PCI) Data Security Standard requirements. 
						</td>
					</tr>
					<tr>
						<td class="match_id">13</td>
						<td>
							Illegal Transactions – The merchant was engaged in illegal transactions.
						</td>
					</tr>
					<tr>
						<td class="match_id">14</td>
						<td>
							Identity Theft – The acquirer has reason to believe that the identity of the listed
							merchant or its principal owner(s) was unlawfully assumed for the purpose of
							unlawfully entering into a merchant agreement. 
						</td>
					</tr>
				</table>

				<h5>
					When is a merchant placed on MATCH?
				</h5>
				
				<p>
					The Mastercard Rules manual provides that an acquirer must place a merchant on MATCH if
					i) either the acquirer or the merchant takes action to terminate the acquiring relationship
					and at the time of such act; and ii) the acquirer has reason to believe that a condition
					described in the reason codes listed above exists. The acquirer must then add the required
					information into the MATCH system within 5 calendar days of the earlier of: i) a decision
					by the acquirer to terminate the acquiring relationship, regardless of the effective date
					of termination; or ii) receipt by the acquirer of notice by or on behalf of the merchant
					of a decision to terminate the acquiring relationship, regardless of the effective date
					of the termination.
				</p>
				
				<h5>
					How long does a MATCH listing last?
				</h5>
				
				<p>
					A MATCH listing expires after five (5) years. If a MATCH listing is as a result of Reason
					Code 12 (PCI Data Security Standard Noncompliance) the merchant can be removed from MATCH
					before the fie (5) year period upon becoming PCI compliant.
				</p>
				
				<h5>
					How can a merchant be removed from MATCH?
				</h5>
				
				<p>
					With the exception of a merchant listing for reason code 12 (Payment Card Industry Data
					Security Standard Noncompliance), the only way that a merchant can be removed from MATCH
					is if the acquirer reports to Mastercard that the acquirer added the merchant to MATCH in error.
				</p>
				
				<h5>
					What should I do if I am placed on MATCH?
				</h5>
				
				<p>
					Most merchants try to contact the acquirer that places them on MATCH to dispute such placement.
					This often time yields little to no response. Merchants placed on MATCH should contact an industry
					professional, preferably an attorney in the industry. An industry attorney likely has contacts
					that can result in negotiations about placement on MATCH. An industry attorney may be able to make
					compelling arguments to the acquirer as to the error. Further, in the event that you cannot be
					removed from MATCH, an industry attorney can assist you in negotiating a fair relationship with
					a new acquirer.
				</p>
				
				<h5>
					Is the MATCH system fair?
				</h5>
				
				<p>
					No! The MATCH system is one sided. The acquirer can place a merchant on MATCH with no prior notice
					to the merchant. There are no true checks and balances to determine whether an acquirer is rightfully
					placing a merchant on MATCH. While a merchant can appeal placement directly with MasterCard, the appeal
					process is also done behind closed doors between MasterCard and the acquirer. The MATCH system also
					faults merchants who are themselves victims. Specifically, MATCH Reason Code 14 is for a merchant that
					is the victim of identity theft. Despite the fact that the merchant is the victim, the merchant will be
					“blacklisted” in the same way that a merchant that has excessive chargebacks or a merchant that violated
					industry standards.
				</p>
				
			</div>
		</div>
        
        
        
        
			<h2 id="values">Core Values</h2>
        
			<div id="values_info">
				<div id="eperience_bullet">
					<div class="bullet">
						<div class="icon">
							<i class="fa-solid fa-network-wired"></i>   
						</div>
						<h5 id="experience">Experience</h5>
					</div>
					<p>
					We have experience in handling a variety of legal matters related to business
					law, from contract law to corporate governance.
					</p>
				</div>
				
				<div id="expertise_bullet">
					<div class="bullet">
						<div class="icon">
							<i class="fa-solid fa-briefcase"></i>
						</div>
						<h5 id="expertise">Expertise</h5>
					</div>
					<p>
					Our law firm has a wealth of expertise in Business Law, Electronic Payments Law
					and Data Privacy.
					</p>
				</div>
				
				<div id="excellence_bullet">
					<div class="bullet">
						<div class="icon">
							<i class="fa-solid fa-landmark"></i>
						</div>
						<h5 id="excellence">Excellence</h5>
					</div>
					<p>
					We are committed to providing excellent legal representation and personalized
					client service.
					</p>
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
      
		<script>

			var acc = document.getElementsByClassName("accordion");
			var i;

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



		</script>
      
      
      
	</body>
</html>