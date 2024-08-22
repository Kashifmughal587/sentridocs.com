<!DOCTYPE html>
<html lang="en">

	<head>
		<?php
$random_string = random_bytes(64); // Generate a random string of 128 characters (64 bytes)
$script_nonce = base64_encode($random_string);

?>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">


		<!-- ============ Title ============ -->
		<title>Sentridocs</title>
		<link rel="icon" type="image/x-icon" href="img/favicon.ico">
		

		<!-- ================ Custom Link ============== -->
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/all.min.css">
		<link rel="stylesheet" href="css/responsive.css">
		<link rel="stylesheet" type="text/css" href="css/animate.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">

		
		<!-- ================ Icon ============== -->
		 <link rel="stylesheet" href="css/fontawesome/css/all.min.css" type="text/css" />
		
		
		
		<!-- ===================== Script =============== -->
		<script language="javascript"  nonce="<?php echo $script_nonce; ?>">
			var guid = "";
			var isValid = true;
			var tenantObject = {
				masterItemName: "",
				data: "",
				index: 0,
				offSet: 0,
				totalCount: 0,
				filterValue: "",
				filterField: "",
				valueFilter: "",
				searchValue: "",
				sortOrder: "",
				sortBy: "",
				requestType: "",
				isDeleted: false,
				Id: 0,
				search: ""
			}

			function handleException(request, message, error) {
				var msg = "";
				msg += "Code: " + request.status + "\n";
				msg += "Text: " + request.statusText + "\n";
				if (request.responseJSON != null) {
					msg += "Message" + request.responseJSON.Message + "\n";
				}
				alert(msg);
			}

			function clearForm() {
				$("#catpchaId").val("");
				$('[name="firstName"]').val("");
				$('[name="lastName"]').val("");
				$('[name="emailAddress"]').val("");
				$('[name="phoneNumber"]').val("");
				$('[name="companyName"]').val("");
				$('[name="companyLicense"]').val("");

			}

			function validateForm() {

				if ($('[name="firstName"]').val() == "") {
					alert("Please enter First Name.");
					isValid = false;
				} else {
					isValid = true;
				}
				if ($('[name="lastName"]').val() == "") {
					alert("Please enter Last Name.");
					isValid = false;
				} else {
					isValid = true;
				}
				if ($('[name="emailAddress"]').val() == "") {
					alert("Please enter email address.");
					isValid = false;
				} else {
					isValid = true;
				}
				if ($('[name="phoneNumber"]').val() == "") {
					alert("Please enter Phone Number.");
					isValid = false;
				} else {
					isValid = true;
				}
				if ($('[name="companyName"]').val() == "") {
					alert("Please enter Compnay Name.");
					isValid = false;
				}
				if ($('[name="companyLicense"]').val() == "") {
					alert("Please enter Compnay NMLS ID.");
					isValid = false;
				} else {
					isValid = true;
				}
			

			}

			function tenantAdd() {
				if (!isValid)
					return false;

				const form = document.getElementById('tenantRegForm');
				const formData = new FormData(form);
				const jsonObject = Object.fromEntries(formData);
				const jsonString = JSON.stringify(jsonObject);
				//tenantObject = new tenantObject();
				tenantObject.data = jsonString;
				tenantObject.searchValue = guid;
				tenantObject.filterValue = $("#catpchaId").val();
				//console.log(JSON.stringify(tenantObject));
				// alert(tenantObject.filterValue);
				$.ajax({
					url: "https://mortgageapi20230310081929.azurewebsites.net/api/tenant/create",
					type: 'POST',
					contentType: "application/json;charset=utf-8",
					data: JSON.stringify(tenantObject),
					success: function() {
						tenantAddSuccess();
					},
					error: function(request, message, error) {
						handleException(request, message, error);
					}
				});
			}

			function tenantAddSuccess() {
				alert("Your company registration request has been send successfully,SentriDocs admin will contact you soon.");
			}

			function getCaptcha() {
				$.ajax({
					url: 'https://mortgageapi20230310081929.azurewebsites.net/api/tenant/getcaptcha?guuid=0', // + guid,
					type: 'GET',
					dataType: 'json',
					success: function(res) {
						document.getElementById("imgCaptcha").src = "data:image/jpeg;base64," + res.data['imageBase64'];
						guid = res.data['guuid'];
						//setCaptchaValue(res);
					},
					error: function(request, message, error) {
						handleException(request, message, error);
					}
				});
			}
			//setCaptchaValue(res)
			//{
			//    imgbaseString = res.data['imageBase64'];
			//    guid = res.data['guuid'];
			//    alert(guid);
			//}

			//function getCaptchaImagePath() {
			//    return "data:image/jpeg;base64," + imgbaseString;
			//}
		</script>
		
		
	</head>
	

	<body>
	
		<!-- ================ Header Part Start ============== -->
		<div class="header-area">
			<div class="container">
				<div class="row">
					<div class="col-xl-4 col-6">
						<a href="index.php">
							<div class="logo-section">
								<div class="logo">
									<img src="img/logo-dark.png" class="site-logo" alt="Sentridocs photo">
								</div>
							</div>
						</a>
					</div>
					
					<div class="col-xl-8 col-6">
						<div class="main-menu">
							<ul class="menu">
								<li><a href="features.php"  >Features</a></li>
								<li><a href="pricing.php"  >Pricing</a></li>
								<li><a href="tryusforfree.php"  >Try us for Free</a></li>
								<li><button href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#myModal" class="order-btn">Log in</button></li>
								<li><button data-bs-toggle="modal" data-bs-target="#signUpModal" class="order-btn text-white active-btn" onclick="clearForm();"  class="order-btn">Get Started</button></li>

							</ul>
						</div>
						<a href="javascript:void(0);" class="humbarger"><i class="fa-solid fa-bars"></i></a>
					</div>
					
				</div>
			</div>
		</div>
		<!-- ================ Header Part End ============== -->


		<!-- ================ Mobile Menu Start ============== -->
		<div class="mobile-menu">
			<a href="javascript:void(0);" class="close-menu"><img src="img/icons8-cross-35 (1).png"></a>
			<div class="inner-menu">
				<ul class="menu">
					<li><a href="features.php"  >Features</a></li>
					<li><a href="pricing.php"  >Pricing</a></li>
					<li><a href="tryusforfree.php"  >Try us for Free</a></li>
					<li><button href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#myModal" class="order-btn text-white">Log in</button></li>
					<li><button data-bs-toggle="modal" data-bs-target="#signUpModal" class="order-btn text-white active-btn" onclick="clearForm();"  class="order-btn">Get Started</button></li>
				</ul>
			</div>
		</div>
		<!-- ================ Mobile Menu End ============== -->

		
		<!-- ================ LogIn Popup Start ============== -->
		<div class="modal fade" id="myModal">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content">
					<!-- === Modal Header == -->
					<div class="modal-header">
						<h4 class="modal-title">LogIn</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>

					</div>

					<!-- === Modal Body === -->
					<div class="modal-body">
						<p>
							If you're a financial institution and interested in signing up with sentridocs.com to automate your mortgage business, please use the button above and select "Get Started"
							<a href=""  class="pop-login" rel="noopener noreferrer"></a>
						</p>
					</div>

					<!-- === Modal Footer === -->
					<div class="modal-footer">
						<p>
							If you're a borrower or loan applicant, please contact your lender for the proper login page. You can't login here. You may already have an invitation and instructions sent to your email to access the portal. 

							<a href="Sentridocs.com"  class="pop-login" rel="noopener noreferrer"></a>

						</p>
					</div>

				</div>
			</div>
		</div>
		<!-- ================ LogIn Popup End ============== -->
		
		
		<!-- ================ SignUp Popup Start ============== -->
		<div class="modal fade" id="signUpModal" aria-hidden="true" aria-labelledby="signUpModalLabel" tabindex="-1">
			<form id="tenantRegForm">
				<div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable custom-modal">
					<div class="modal-content">
						<div class="modal-header">
							<div class="">
								<h2 class="modal-title" id="signUpModalLabel">Get Started with Sentridocs.</h2>
								<p class="mb-0">Transform your mortgage business with Sentridocs. Let's connect and we'll show you how to open the door to secure, mortgage origination automation.</p>
							</div>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>

						<div class="modal-body">

							<div class="row mt-2">
								<div class="col-md-6 col-lg-3">
									<div class="form-group mb-3">
										<label for="firstName">First Name<span>*</span></label>
										<input type="email" class="form-control" name="firstName" aria-describedby="emailHelp" placeholder="">
									</div>
								</div>
								
								<div class="col-md-6 col-lg-3">
									<div class="form-group mb-3">
										<label for="lastName">Last Name<span>*</span></label>
										<input type="email" class="form-control" name="lastName" aria-describedby="emailHelp" placeholder="">
									</div>
								</div>
								
								<div class="col-md-6 col-lg-3">
									<div class="form-group mb-3">
										<label for="emailAddress">Email Address<span>*</span></label>
										<input type="email" class="form-control" name="emailAddress" aria-describedby="emailHelp" placeholder="">
									</div>
								</div>
								
								<div class="col-md-6 col-lg-3">
									<div class="form-group mb-3">
										<label for="phoneNumber">Phone Number<span>*</span></label>
										<input type="email" class="form-control" name="phoneNumber" aria-describedby="emailHelp" placeholder="">
									</div>
								</div>

								<div class="col-md-6 col-lg-3">
									<div class="form-group mb-3">
										<label for="companyName">Company Name<span>*</span></label>
										<input type="email" class="form-control" name="companyName" aria-describedby="emailHelp" placeholder="">
									</div>
								</div>

								<div class="col-md-6 col-lg-3">
									<div class="form-group mb-3">
										<label for="companyNmlsId">Company NMLS ID<span>*</span></label>
										<input type="email" class="form-control" name="companyLicense" aria-describedby="emailHelp" placeholder="">
									</div>
								</div>
								
								<div class="col-md-12 col-lg-6">
									<div class="form-check mb-3 marginTop">
										<input type="checkbox" class="form-check-input" name="agreeId" checked>
										<label class="form-check-label" for="agreeId">I agree to the <a href="#">consent to do Business Electronically</a></label>
									</div>
								</div>
									<div id="html_element"></div>
							</div>

							<div class="">
								<h3>
									Are you a borrower?
								</h3>
								<p>Please contact your lender to get started with your loan with Sentridocs.</p>
							</div>
							
							
							<div class="row">
								<div class="col-md-6 col-lg-3">
									<div class="form-group">
										<label for="catpchaId">Captcha<span>*</span></label>
										<input type="email" class="form-control mb-1" id="catpchaId" aria-describedby="emailHelp" placeholder="">
										<small id="emailHelp" class="error- success-">Captcha is case sensitive</small>
									</div>
								</div>
							</div>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" aria-label="Close" data-bs-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary" aria-label="Sign Up" onclick=" onSubmit();">Sign Up</button>
						</div>
						
					</div>
				</div>
			</form>
		</div>
		<!-- ================ SignUp Popup End ============== -->

		
		<!-- ================ Banner Section Start ============== -->
		<div class="sub-menu-section" id="home">
			<div class="inner-hero">
				<div class="banner-conrent-area">
					<div class="container">
						<div class="row">
							<div class="col-xl-2"></div>
							<div class="col-xl-12 mx-auto">
								<div class="inner-page-heading-area">
									<h2 class="sub-banner-title mx-auto wow fadeInUp" data-wow-duration="2s">Terms Of Use</h2>
								</div>
							</div>
							<div class="col-xl-2"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ================ Banner Section End ============== -->


		<!-- ================ Main Content Start ============== -->
		<div class="main-page-contant">
			<div class="main-inner-page">
				<div class="container">
					<div class="row">
						<div class="col-xl-12">

                        <h1>Sentridocs Terms of Use</h1>
<p><strong>Effective Date:</strong> May 1, 2021</p>
<h2>I. General</h2>
<p>These Terms of Use apply to you when you view, access, or otherwise use the website located at www.sentridocs.com (the "Website"). The Website is owned by Sentridocs, Inc. (together with its affiliates, the "Company"), with offices at 110 16th Street, Suite 1460, Denver, CO 80202. For the purposes of these Terms of Use, the terms "we," "us," and "our" refer to the Company, and "you" or "your" refer to a user of this Website.</p>
<p>These Terms of Use ("Terms") govern your use of the Website but do not authorize you to access or use the Company’s proprietary mortgage industry solutions and/or software (the "Company Services").</p>
<p>The Website may contain links to login pages for the Company Services, which are provided subject to separate license agreements with the Company’s customers (the "Customer Agreements"). Users who are authorized to access the Company Services pursuant to a Customer Agreement must first create a user account and are permitted to access the Company Services only in compliance with the applicable Customer Agreement or additional terms which may be set forth on such pages.</p>
<p>All site visitors are subject to these Terms and must be over the age of 18. By accessing or using the Website, you acknowledge that you are over 18 years of age and that you have read, understand, and agree without limitation or qualification to be bound by these Terms. If you do not agree with these Terms or are not over the age of 18, you do not have the right to access or otherwise use the Website and, accordingly, you should not do so. The Company may modify these Terms from time to time without notice. Your continued use of the Website after any changes to these Terms will be deemed your acceptance of those changes.</p>
<h2>II. Privacy Policy</h2>
<p>In addition to these Terms, your use of and access to the Website are also subject to our Privacy Policy, which is incorporated by reference herein. Our Privacy Policy contains additional terms relating to our potential collection, use, and disclosure of your personal information as a site visitor. You agree that you have read, agreed to, and understand the Company’s complete Privacy Policy.</p>
<h2>III. Use of the Website and Website Content</h2>
<h3>Your Right to Use the Website</h3>
<p>Subject to these Terms, and excluding access to the Company Services, we grant you a nonexclusive, nontransferable, nonsublicensable, revocable, limited right to access and display the Website, copyrighted text, software, music, videos, graphics, photos, interactive features, logos, trademarks, and other proprietary materials and information provided hereon (collectively, "Website Content"), subject to the following limitations:</p>
<ul>
<li>Your use of the Website is conditioned upon your prior acceptance of these Terms;</li>
<li>You agree not to distribute in any medium any part of the Website or Website Content without our prior written consent;</li>
<li>You agree not to alter or modify any portion of the Website or Website Content;</li>
<li>You agree not to copy, reproduce, distribute, display portions of, or link to this Website or any Website Content contained hereon for commercial purposes without our prior express written consent (including, but not limited to, the sale of advertising on the Website, or the use of the Website to generate advertising or subscription revenue);</li>
<li>You agree to use the Website and the Website Content only for lawful, personal, and informational purposes, and you agree that you will not use the Website in any manner which violates any applicable local, state, national, or international law;</li>
<li>The Company reserves the right to suspend or discontinue access to all or any portion of the Website at any time.</li>
</ul>
<h3>Ownership and Copyright Protection</h3>
<p>The Website and all Website Content contained thereon are protected by copyright as a collective work under United States copyright laws and are owned or controlled by, or licensed to, the Company or the party listed as the provider of the applicable Website Content. Except as expressly stated in these Terms, the Website and all Website Content (including without limitation all look and feel) are owned by or licensed to the Company to the fullest extent permitted by applicable laws. The Website and all Website Content are provided "as is" solely for your personal use and informational purposes. In accessing and displaying any Website Content in accordance with the limited rights granted under these Terms, you agree to abide by all copyright, trademark, and other notices contained in such Website Content, or if none, to abide by the following copyright and trademark notice with respect to such Website Content: © 2021 Sentridocs, Inc. The Company logo and all associated trademarks and logos used herein are trademarks of the Company. Other company and product names, logos, and trademarks used herein are the property of their respective owners. All rights reserved.</p>
<h3>Trademarks</h3>
<p>© 2021 Sentridocs, Inc. Sentridocs® and the Company logo are trademarks or service marks of the Company appearing herein and are the property of the Company or its subsidiaries or affiliates. All rights reserved. Other company and product names may be trademarks or copyrights of their respective owners.</p>
<h3>Linked Sites</h3>
<p>Links may appear on the Website to third-party website(s) which are not owned or operated by the Company ("Linked Sites"). These links are provided solely as a courtesy to our Website visitors. The Company reserves the right to add, change, decline, or remove any link at any time. Each Linked Site may have an individual privacy policy and/or terms of use which govern your use of and access to such Linked Site, and we recommend that you review the policies applicable to these sites prior to your use of such Linked Site. The Company is not responsible for and does not endorse or warrant any materials, information, goods, or services available through Linked Sites or the privacy or other practices of such Linked Sites.</p>
<h2>IV. Disclaimer of Warranty, Limitation of Liability, and Indemnification</h2>
<h3>Disclaimer of Warranty</h3>
<p>USE OF THE WEBSITE IS AT YOUR OWN RISK. ALL WEBSITE MATERIALS ARE PROVIDED "AS IS", WITH NO WARRANTIES OR GUARANTEES WHATSOEVER. THE COMPANY EXPRESSLY DISCLAIMS TO THE FULLEST EXTENT PERMITTED BY LAW ALL EXPRESS, IMPLIED, STATUTORY, AND OTHER WARRANTIES, GUARANTEES, OR REPRESENTATIONS, INCLUDING, WITHOUT LIMITATION, THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, AND NON-INFRINGEMENT OF PROPRIETARY AND INTELLECTUAL PROPERTY RIGHTS. WITHOUT LIMITATION, THE COMPANY MAKES NO WARRANTY OR GUARANTEE THAT THE WEBSITE OR ANY MATERIALS WILL BE UNINTERRUPTED, TIMELY, SECURE, OR ERROR-FREE. THESE EXCLUSIONS OF WARRANTIES WILL APPLY TO YOU TO THE FULLEST EXTENT ALLOWED BY LAW.</p>
<h3>Limitation of Liability</h3>
<p>IN NO EVENT WILL THE COMPANY BE LIABLE TO ANY PARTY FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, PUNITIVE, OR CONSEQUENTIAL DAMAGES OF ANY TYPE WHATSOEVER RELATED TO OR ARISING FROM THE WEBSITE OR USE OF THE MATERIALS, OR OF ANY SITE OR RESOURCE LINKED TO, REFERENCED, OR ACCESSED THROUGH THE WEBSITE. THIS EXCLUSION AND WAIVER OF LIABILITY INCLUDES, WITHOUT LIMITATION, ANY LOST PROFITS, BUSINESS INTERRUPTION, LOST SAVINGS, OR LOSS OF DATA, EVEN IF THE COMPANY IS EXPRESSLY ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. THIS EXCLUSION AND WAIVER OF LIABILITY APPLIES TO ALL CAUSES OF ACTION, NO MATTER THE LEGAL THEORIES, AND WILL APPLY TO THE FULLEST EXTENT PERMISSIBLE BY LAW.</p>
<h3>Indemnification</h3>
<p>You agree to defend, indemnify, and hold the Company harmless from and against any liability, loss, damages, or costs, including reasonable attorneys’ fees, resulting from any third-party claim, action, or demand based on or arising out of: (i) your use of or access to the Website or products or services hosted thereon; (ii) your violation of any third-party proprietary or other rights; (iii) your breach of these Terms of Use; or (iv) your use of software robots, spiders, crawlers, or similar data gathering and extraction tools, or any other action you take that imposes an unreasonable burden or load on the Company’s infrastructure. You shall not settle any such claim, action, or demand unless such settlement completely and forever releases the Company from all liability with respect to such claim or unless the Company consents to such settlement in writing (which consent shall not be unreasonably withheld).</p>
<h2>V. Governing Law</h2>
<p>Except where otherwise required by law, any legal matter arising from these Terms shall be governed by the laws of the State of Colorado without regard to its conflict of laws provisions and you agree to submit to the jurisdiction of the courts of Denver County, Colorado. You acknowledge that the Company may apply for injunctive remedies in any jurisdiction. There are no third-party beneficiary rights under these Terms.</p>
<h2>VI. Miscellaneous</h2>
<!-- <h3>Suggestions and Feedback</h3> -->
<p>Suggestions and Feedback. The Company welcomes feedback or inquiries about our products. If you elect to provide any feedback or comments of any nature to the Company, all such feedback and comments shall be the sole and exclusive property of the Company, and the Company shall have the right to use such feedback in any manner and for any purpose in the Company's discretion without remuneration, compensation, or attribution to you, provided that the Company is under no obligation to use such feedback.</p>
<p>Interpretation, Assignment, and Entire Agreement. These Terms, together with our Privacy Policy, form the complete and exclusive agreement between you and the Company relating to the Website. If you also use any Company Services, you agree to be bound by the terms of the Customer Agreement. In the event of a conflict between these Terms and the Customer Agreement, the Customer Agreement shall take precedence.</p>
<p>These Terms, and any rights and licenses granted hereunder, may not be transferred or assigned by you, but may be assigned by the Company without restriction. If any provision of these Terms of Use shall be unlawful, void, or for any reason unenforceable, then that provision shall be deemed severable from these Terms of Use and shall not affect the validity and enforceability of any remaining provisions.</p>
<h3>Contact Us</h3>
<p>If you have any questions, comments, or concerns regarding these Terms of Use and/or the Website, please send an email to: LegalDepartment@sentridocs.com. Please note that communications made through e-mail or the Website's messaging systems shall not be deemed to constitute legal notice to the Company or any of its officers, employees, agents, or representatives. You may provide legal notice to the Company in writing by first-class mail, return receipt requested, or national overnight courier, at:</p>
<p>Attn: Legal Department,<br>
Sentridocs, Inc,<br>
110 16th Street, Suite 1460,<br>
Denver, CO 80202.</p>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ================ Main Content End ============== -->


		<!-- ================ Footer Section Start ============== -->
		<footer class="one-footer-area pt-100 wow fadeInUp" data-wow-duration="2s">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-lg-3">
						<div class="footer-item">
							<div class="footer-logo">
								<a href="index.php">
									<img src="img/logo-light.png" alt="Logo">
								</a>
								<p>Start your free trial today and discover how the Sentridocs.com mortgage portal can explode your loan volume by selling for you 24 hours per day, every day.</p>
								<p>Close loans faster.</p>
								<p>Make borrowers happier.</p>
								<p>Impress referral partners.</p>

								<ul>
									<li>
										<a href="#" >
											<img src="img/icons8-facebook-24.png">
										</a>
									</li>
									<li>
										<a href="#" >
											<img src="img/icons8-twitter-24.png">
										</a>
									</li>
									<li>
										<a href="#" >
											<img src="img/icons8-linkedin-24.png">
										</a>
									</li>
									<li>
										<a href="#" >
											<img src="img/icons8-instagram-24.png">
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>


					<div class="col-sm-6 col-lg-3">
						<div class="footer-item">
							<div class="footer-quick">
								<h3>Quick Links</h3>
								<ul>
									<li>
										<a href="features.php" >Features</a>
									</li>
									<li>
										<a href="pricing.php" >Pricing</a>
									</li>
									<li>
										<a href="tryusforfree.php" >Try us for free</a>
									</li>
								</ul>
							</div>
						</div>
					</div>


					<div class="col-sm-6 col-lg-3">
						<div class="footer-item">
							<div class="footer-quick">
								<h3>About Us</h3>
								<ul>
									<li>
										<a href="#" >Contact</a>
									</li>
									<li>
										<a href="#" >Careers</a>
									</li>
									<li>
										<a href="privacypolicy.php" >Privacy Policy</a>
									</li>
									<li>
										<a href="businesselectronically.php" >Terms</a>
									</li>
									<li>
										<a href="termsofuse.php">Terms Of Use</a>
									</li>
									<li>
										<a href="smspolicy.php">SMS Policy</a>
									</li>
								</ul>
							</div>
						</div>
					</div>


					<div class="col-sm-6 col-lg-3">
						<div class="footer-item">
							<div class="footer-address">
								<h3>Address</h3>
								<ul>
									<li>
										<img src="img/icons8-phone-24.png">
										<a href="tel:+7205731200">720 573 1200</a><br>
										<a href="tel:+7205731200"></a>
									</li>
									<!-- <li>
										<img src="img/icons8-email-24.png">
										<a href="mailto:sales at sentridocs.com">sales at sentridocs.com</a>
									</li> -->
									<li>
										<img src="img/icons8-globe-24.png">
										<a href="https://www.sentridocs.com/auth/login" >Sentridocs.com</a>
									</li>
									<li>
										<img src="img/icons8-location-24.png"> 4155 E Jewell Ave #601, Denver, CO 80222
									</li>
									<li>
										<img src="img/icons8-clock-24.png">  Mon - Fri 8:00 AM - 6:00 PM
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="copyright-area">
					<div class="row align-items-center">
						<div class="col-lg-12">
							<div class="copyright-item">
								<p>&copy;2023 All Rights Reserved by <a href="index.php">Sentridocs.com</a></p>
							</div>
						</div>

					</div>
				</div>
			</div>
		</footer>
		<!-- ================ Footer Section End ============== -->


		<!-- ================ Script ============== -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="js/wow.min.js"></script>

		<script  nonce="<?php echo $script_nonce; ?>">
			var wow = new WOW({
				boxClass: 'wow',
				animateClass: 'animated',
				offset: 0,
				mobile: true,
				live: true,
				callback: function(box) {

				},
				scrollContainer: null
			});
			wow.init();
		</script>
		<script  nonce="<?php echo $script_nonce; ?>">
			 $(document).ready(function () {
				$(".humbarger").click(function () {
					$(".mobile-menu").addClass("active-menu");
				});
				$(".close-menu").click(function () {
					$(".mobile-menu").removeClass("active-menu");
				});
				clearForm();
			
			});
		</script>

	<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script>

     <script nonce="<?php echo $script_nonce; ?>">
        var onSubmit = function(token) {
          console.log('success!');
          if(grecaptcha.getResponse() != ''){
         validateForm(); 
          tenantAdd()
      }else{
      	alert("Please check captcha.");
      }
        };

      

        var onloadCallback = function() {
        grecaptcha.render('html_element', {
          'sitekey' : ' 6Lct-ZspAAAAAEmHXWjvEf8uUU1g0qXbuLMG1v4R',
        });
      };
    </script>
	</body>

</html>