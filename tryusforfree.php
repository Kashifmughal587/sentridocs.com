<!DOCTYPE html>
<html lang="en">
<!-- Meta Tags -->
<meta name="description" content="Experience a comprehensive solution for automating the mortgage process with Sentridocs. Start your free 30-day trial today and streamline your loan application process. Book a demo session now!">
<meta name="keywords" content="free mortgage trial, digital mortgage application, loan automation, POS and LOS system, Sentridocs demo, online mortgage application, mortgage process automation">
<meta name="author" content="Sentridocs">
<meta name="robots" content="index, follow">
<meta property="og:title" content="Try Sentridocs for Free - Automate Your Mortgage Process">
<meta property="og:description" content="Start your 30-day free trial of Sentridocs to automate your mortgage application process. Discover how our all-in-one POS and LOS system can streamline your workflow.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://www.sentridocs.com/try-us-for-free">
<meta property="og:image" content="https://www.sentridocs.com/assets/images/try-us-for-free-hero.jpg">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Try Sentridocs for Free - Automate Your Mortgage Process">
<meta name="twitter:description" content="Experience Sentridocs' all-in-one mortgage automation solution with a free 30-day trial. Book a demo session to see how our system can enhance your loan process.">
<meta name="twitter:image" content="https://www.sentridocs.com/assets/images/try-us-for-free-hero.jpg">

<!-- Security Tags -->
<!-- <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' https://trusted-scripts.com; style-src 'self' https://trusted-styles.com;">
<meta name="referrer" content="no-referrer">
<meta http-equiv="X-Content-Type-Options" content="nosniff">
<meta http-equiv="X-Frame-Options" content="DENY">
<meta http-equiv="Strict-Transport-Security" content="max-age=31536000; includeSubDomains"> -->
<meta http-equiv="Content-Security-Policy" content="
    default-src 'self';
    script-src 'self' https://trusted.cdn.com https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://www.google.com/recaptcha/ https://www.gstatic.com 'unsafe-inline';
    style-src 'self' https://trusted.cdn.com https://fonts.googleapis.com 'unsafe-inline';
    font-src 'self' https://fonts.gstatic.com;
    img-src 'self' data:;
    connect-src 'self';
    frame-src 'self' https://www.google.com;">
	<meta http-equiv="X-Content-Type-Options" content="nosniff">
	<meta name="referrer" content="no-referrer">
	<meta http-equiv="Permissions-Policy" content="geolocation=(self), microphone=()">

<!-- Accessibility Tags -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="theme-color" content="#ffffff">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<!-- <link rel="stylesheet" href="https://www.sentridocs.com/assets/css/accessibility.css"> -->

<?php
$random_string = random_bytes(64); // Generate a random string of 128 characters (64 bytes)
$script_nonce = base64_encode($random_string);
?>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">


		<!-- ============ Title ============ -->
		<title>Sentridocs</title>
		<link rel="icon" type="image/x-icon" href="img/favicon.ico">


		<!-- ================ Custom Link ============== -->
		<link rel="stylesheet" href="css/styles.css">
		<link rel="stylesheet" href="css/features.css">
		<link rel="stylesheet" href="css/tryusforfree.css">
		<link rel="stylesheet" href="css/all.min.css">
		<link rel="stylesheet" href="css/responsive.css">
		<link rel="stylesheet" type="text/css" href="css/animate.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">


		<!-- ================ Icon ============== -->
		 <link rel="stylesheet" href="css/fontawesome/css/all.min.css" type="text/css" />


		

		<!-- ===================== Script =============== -->
		<script language="javascript" nonce="<?php echo $script_nonce; ?>">
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

							

						
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" aria-label="Close" data-bs-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary" aria-label="Sign Up" onclick="onSubmit();">Sign Up</button>
						</div>

					</div>
				</div>
			</form>
		</div>
		<!-- ================ SignUp Popup End ============== -->


		<!-- ================ Try Us Banner Section Start ============== -->
		<div class="sub-menu-section-try-us" id="feature">
			<div class="inner-hero">

				<div class="banner-conrent-area">
					<div class="container">
						<div class="row">
							<div class="col-xl-2"></div>
							<div class="col-xl-12 mx-auto">
								<div class="inner-page-heading-area">
									<h2 class="sub-banner-title mx-auto wow fadeInUp" data-wow-duration="2s">Try us for Free</h2>
								</div>
							</div>
							<div class="col-xl-2"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ================ Try Us Banner Section End ============== -->
		<div class="schedulediv schedulediv-contant">
			<center>
			<a href="https://calendly.com/sales-dmqw/30min">
				<button href="javascript:void(0)" class="schedule-btn">Book a Demo Session</button>
			</a>
			</center>
		</div>
		<!-- =================== Try Us Content Section Start ================ -->
		<div class="main-page-contant">
			<div class="main-inner-page">
				<div class="container">
					<div class="row">
					
						<div class="col-xl-4">
							<div class="page_header wow fadeInUp" data-wow-duration="2s">
								<div class="full_header_heading">
									<h2>"Sentridocs.com - A Comprehensive Solution to Automating the Mortgage process.</h2>
									<h4>Your free 30 Day trial is waiting for you.</h4>
									<center>
									<a href="https://calendly.com/sales-dmqw/30min">
										<button href="javascript:void(0)" class="schedule-btn">Book a Demo Session</button>
									</a>
									</center>
								</div>
							</div>
						</div>
						
						
						<div class="col-xl-8">
							<div class="main_content_area">
								<div class="row">
								
									<div class="col-xl-6">
										<div class="free_card wow fadeInUp" data-wow-duration="2s">
											<div class="inner_free_card">
												<div class="free_image">
													<img src="img/try-us-for-free-01.png" alt="try-us-for-free-01 photo">
												</div>
												
												<div class="free_cd_content">
													<div class="free_cd_content_inner">
														<p>Sentridocs.com's free online mortgage application has consistently offered a straightforward and secure way for borrowers to complete applications online. Now, it's even more powerful. Sentridocs.com is the all-in-one package you need. It combines the functionalities of a Point of Sale (POS) and Loan Origination System (LOS). A personal subscription allows you to control the onboarding process of new loans and to keep the borrower documentation in a submit-ready state throughout the process.</p>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									
									<div class="col-xl-6">
										<div class="free_card wow fadeInUp" data-wow-duration="2s">
											<div class="inner_free_card">
												<div class="free_image">
													<img src="img/try-us-for-free-02.png" alt="try-us-for-free-02 photo">
												</div>
												
												<div class="free_cd_content">
													<div class="free_cd_content_inner">
														<p>You can also seamlessly integrate your Sentridocs.com link into your website and social media to educate borrowers and real estate agents about the advantages of working with you. This integration helps potential clients find you more easily and apply for a mortgage 24/7. You will have a customized company homepage and custom subdomain to ensure you're well-prepared for new business opportunities.	Sentridocs.com will keep the process secure and available with enterprise-grade security, enabling leads to flow effortlessly into your pipeline and boosting your business.</p>
													</div>
												</div>
											</div>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- =================== Try Us Content Section End================ -->
		
		
		<!-- ================= Try Us Feature Item Section Start ============== -->
		<div class="main-page-contant only_sect_mt">

			<div class="main-inner-page">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 wow fadeInLeft" data-wow-duration="2s">
							<div class="points_area">
								<div class="points_inner_area">
									<h3>POS Features:</h3>
								</div>
							</div>
							
							<div class="main_points_areas">
								<ul>
									<li>
										<span>Streamlined</span> digital application process for borrowers, accessible from anywhere, anytime.
									</li>
									
									<li>
									<span>Real-time</span> notifications upon submission of applications.</li>
									
									<li>
										<span>Applications</span> can be downloaded to 3.2, 3.4 Mismo, or printed to URLA pdf.
									</li>
									
									<li>
										<span>Easy</span> integration of Sentridocs.com into your website, email signature, and social media profiles.
									</li>
									
									<li>
										<span>Quick-link</span> version for capturing basic lead information.
									</li>
									
									<li>
										<span>Needs</span> list creation in SECONDS with real time tracking and notifications to the borrower so that needs lists over Email are a thing of the past.
									</li>
									
									<li>
										<span>Collect</span> and Screen documents for quality as a loan officer before they are submitted to underwriting.
									</li>
									
									<li>
										<span>All</span> documents kept on a list as they arrive, they can be put in order and combined into one PDF, put into a Zip file, downloaded to your desktop or printed.
									</li>
									
									<li>
										<span>Images</span> and photos can instantly be converted to PDF
									</li>
									
									<li>
										<span>Chat</span> and Q&A features with your borrower help get through the documents collection with ease.
									</li>
									
									<li>
										<span>You</span> and your borrowers are notified of status changes and needs lists by Email and text messages throughout the process.
									</li>
								</ul>
							</div>
						</div>
						
						<div class="col-xl-6">
							<div class="side_images wow fadeInRight" data-wow-duration="2s">
								<div class="inner_side_img">
									<img src="img/Untitled designf.png" alt="Untitled designf photo">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ================= Try Us Feature Item Section End ============== -->
		
		
		<!-- ================ Try Subscribe Section Start ============== -->
		<div class="try-subscribe-area wow fadeInUp" data-wow-duration="2s">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="subscribe-wrap">
							<h2>Sign up with Sentridocs.com today to <br>take full  advantageof a digital, automatic loan process.</h2>
							<button class="btn try-subscribe">
									Sign Up
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ================ Try Subscribe Section End ============== -->

		
		<!-- ================ Subscribe Section Start ============== 
		<div class="one-subscribe-area wow fadeInUp" data-wow-duration="2s">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="subscribe-wrap">
							<h2>Build an Efficient, Modern Mortgage Origination Process <br>Try Sentridocs.com for Free</h2>
							<form class="newsletter-form" data-toggle="validator" novalidate="true">
								<input type="email" class="form-control" placeholder="Enter your email" name="EMAIL" required="" autocomplete="off">

								<button class="btn subscribe-btn disabled" type="submit" style="pointer-events: all; cursor: pointer;">
										Subscribe now
									</button>

								<div id="validator-newsletter" class="form-result"></div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ================ Subscribe Section End ============== -->


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

		<script nonce="<?php echo $script_nonce; ?>">
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

		<script nonce="<?php echo $script_nonce; ?>">
			$(document).ready(function() {
				$(".humbarger").click(function() {
					$(".mobile-menu").addClass("active-menu");
				});
				$(".close-menu").click(function() {
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