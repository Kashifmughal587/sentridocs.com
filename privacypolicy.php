<!DOCTYPE html>
<html lang="en">
<!-- Meta Tags -->
<meta name="description" content="Sentridocs.com is committed to protecting your privacy. Learn about the types of information we collect, how we use it, and our security measures.">
<meta name="keywords" content="privacy policy, data protection, personal information, customer privacy, data security, information collection, Sentridocs privacy">
<meta name="author" content="Sentridocs">
<meta name="robots" content="index, follow">
<meta property="og:title" content="Privacy Policy - Sentridocs">
<meta property="og:description" content="Read Sentridocs' Privacy Policy to understand how we collect, use, and protect your personal information.">
<meta property="og:type" content="article">
<meta property="og:url" content="https://www.sentridocs.com/privacy-policy">
<meta property="og:image" content="https://www.sentridocs.com/assets/images/privacy-policy-hero.jpg">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Privacy Policy - Sentridocs">
<meta name="twitter:description" content="Learn how Sentridocs protects your personal information and privacy.">
<meta name="twitter:image" content="https://www.sentridocs.com/assets/images/privacy-policy-hero.jpg">

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
		<link rel="stylesheet" href="css/style.css">
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


		<!-- ================ Banner Section Start ============== -->
		<div class="sub-menu-section-terms" id="terms">
			<div class="inner-hero">

				<div class="banner-conrent-area">
					<div class="container">
						<div class="row">
							<div class="col-xl-2"></div>
							<div class="col-xl-12 mx-auto">
								<div class="inner-page-heading-area">
									<h2 class="sub-banner-title mx-auto wow fadeInUp" data-wow-duration="2s">Privacy Policy</h2>
								</div>
							</div>
							<div class="col-xl-2"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ================ Banner Section End ============== -->


		<!-- ================ Privacy Policy Content Start ============== -->
		<div class="main-page-contant">
			<div class="main-inner-page">
				<div class="container">
					<div class="row">
						<div class="col-xl-12">

							<div class="content-item">
								<div class="inner-content-item">

									<h4>Our Commitment to Your Privacy</h4>

									<p>Sentridocs.com is committed to honoring the privacy of our customers. Our customer information is not for sale, rent, lease or trade, and we will not disclose our customer information to any third parties without consent,
										except as may be required by law.</p>

									<p>Our relationship with you is our most important asset. We understand that you have entrusted us with private financial information, and we do everything we can to maintain that trust with our customers. The following details
										our approach to privacy.</p>

									<br><br>

								</div>
							</div>


							<div class="content-item">
								<div class="inner-content-item">

									<h4>Type of Information Collected</h4>

									<p>In order to service your account, we may require any of the following information for the purpose of administering, operating, hosting, configuring, designing, maintaining and providing internal support for our Website
										and our Software Products. This includes Personal Information, Browsing Information, Customer Information, and Payment Information.</p>

									<br><br>

								</div>
							</div>


							<div class="content-item">
								<div class="inner-content-item">

									<h4>Personal Information</h4>

									<p>Personal Information includes Browsing Information or Payment Information where such information can directly or indirectly identify an individual. Browsing Information refers to information about your computer and your
										visits to this website such as your IP address, geographical location, browser type, referral source, length of visit and pages viewed. Please see the "Navigation Information" section below.</p>

									<p>Sentridocs.com may collect the following categories of personal information (“Personal Information”), which may include, among other things:</p>

									<ul class="point">
										<li>Contact information first and last name, mailing or property address, phone number, email address);</li>

										<li>Username, password, and security questions and answers;</li>

										<li>Demographic information (e.g., date of birth, gender, marital status);</li>

										<li>Social security number (SSN), and other government ID numbers;</li>

										<li>Loan account information (e.g., loan number);</li>

										<li>Bank account and credit/debit card numbers; and</li>

										<li>Other personal information needed from you to provide loan services to you.</li>

										<li>Browsing Information</li>

									</ul>

								</div>
							</div>


							<div class="content-item">
								<div class="inner-content-item">

									<p>You are free to explore the websites without providing any Personal Information about yourself. We use Browsing Information to operate and improve the websites and the Subscription Service and may also use Browsing Information
										alone or in combination with Personal Information to provide you with personalized information about Sentridocs.com.</p>

									<p>Sentridocs.com may also collect the following categories of browsing information (“Browsing Information”), which may include, among other things:</p>

									<ul class="point">

										<li>Internet Protocol (or IP) address or device ID/UDID, protocol and sequence information;</li>

										<li>Browser language and type;</li>

										<li>Domain name system requests;</li>

										<li>Browsing history, such as time spent at a domain, time and date of your visit, and number of clicks;</li>

										<li>Http headers, application client and server banners;</li>

										<li>Operating system and fingerprinting data; and</li>

										<li>Aggregated information</li>

										<li>Customer Information</li>

									</ul>

									<p>
										When servicing your account, we may require any of the following information: first and last name, job title, company name, address, billing/mailing address, e-mail address, telephone number, fax number, credit card/payment information and refer to this
										as Customer Information.</p>

									<br><br>

									<h4>Payment Information</h4>

									<p>We collect and process Payment Information from you when you subscribe to the Subscription Service, including credit card numbers and billing information.</p>

									<br><br>

									<h4>How Information is Collected</h4>

									<p>In the course of our business, we may collect Personal Information about you from the following sources:
									</p>

									<br>

									<p>
										Applications or other forms we receive from you or your authorized representative, which may include information about your assets and income and identifying information, such as name, address and SSN; the correspondence you and others send to us;<br>                                    Information we receive from you through the Website;<br> Information about your transactions with, or services performed by, us, our affiliates or nonaffiliated third parties;<br> Information we receive from your computer
										or mobile device;<br> Information we receive from our partners or service providers;<br> Information from consumer or other reporting agencies and public records maintained by governmental entities that we obtain directly
										from those entities, from our affiliates or others, such as your creditworthiness and credit history; and<br> Information we receive from other sources, as permitted by applicable laws, rules, and regulations.

									</p>

									<br><br>

									<h4>Information We Collect from Third Parties</h4>

									<p>
										From time to time, we may receive Personal Information about you from third party sources including partners with which we offer co-branded services or engage in joint marketing activities, and publicly available sources such as social media websites.
									</p>

									<p>California Consumer Privacy Act (CCPA) and the California Privacy Rights Act (CPRA) Disclosure (view) & Personal Information Request Form (view)</p>

									<p>The California Consumer Privacy Act (CCPA) and the California Privacy Rights Act (CPRA) Disclosures explain how Sentridocs.com. and its affiliates (collectively, the "Company," "we," or "us") collect[s], use[s], and disclose[s]
										personal information relating to California residents, and is provided pursuant to the California Consumer Privacy Act of 2018 ("CCPA").</p>

									<p>You may submit requests directly through the Privacy Policy Center phone number (844) 684 -1146, using the Personal Information Request Form, or via email at sales@Sentridocs.com. For more information about the CCPA click
										here.
									</p>

									<br><br>

									<h4>Use of Information Collected</h4>

									<p>Sentridocs.com uses the Customer information you supply offline or online in order to provide you with better service, products/services and to maintain your account. In the event you do not “opt out”, Sentridocs.com may
										use the provided Customer Information to alert you to product information and updates, special offers, new products and other Sentridocs.com information.</p>

									<p>Sentridocs.com does not disclose or share consumer information with third parties, other than (1) those who have contracted to interface with Sentridocs.com , (2) law enforcement or other governmental authority in connection
										with an investigation, or civil or criminal subpoenas or court orders, or (3) as otherwise set forth in this Privacy Policy. The privacy notices of those Lenders shall apply and you should refer to those privacy notices
										and/or contact your Lender or Servicer to understand how your Personal Information will be used by such Lenders or Servicers. We are not responsible or liable for the content, privacy policies, or practices of third
										parties.
									</p>

									<br><br>

									<h4>Our Commitment to Data Security</h4>

									<p>Sentridocs.com has security measures and procedural safeguards in place to protect against the loss, misuse and alteration of the information we collect that is under our control and to prevent unauthorized access, maintain
										data accuracy, and ensure the correct use of information.</p>

									<p>Sentridocs.com websites may contain links to other websites of interest. However, once you have used these links and left our site, Sentridocs.com is not responsible for the privacy practices or the content of any linked
										third-party websites. You should exercise caution and read the privacy statement applicable to the website in question.</p>

									<br><br>

									<h4>Security of your Personal Information</h4>

									<p>We use a variety of security technologies and procedures to help protect your Personal Information. We maintain physical, electronic, and procedural safeguards to protect Personal Information from unauthorized access, use
										or disclosure.</p>

									<br><br>

									<h4>Information Tracked</h4>

									<p>
										Browser Log Files. Our servers automatically log each visitor to the Website and collect and record certain browsing information about each visitor. The Browsing Information includes only generic information and reveals nothing personal about the user.

										<br> Cookies. When you visit our Website, a “cookie” may be sent to your computer. A cookie is a small piece of data that is sent to your Internet browser from a web server and stored on your computer’s hard drive.
										When you visit the Website again, the cookie allows the Website to recognize your computer. Cookies may store user preferences and other information. You can choose whether to accept cookies by changing your Internet
										browser settings, which may impair or limit some functionality of the Website Web Beacons or Tracking Pixels. Some of our web pages and electronic communications may contain images, which may or may not be visible to
										you, known as Web Beacons or Tracking Pixels (sometimes referred to as ‘clear gifs’). Web Beacons collect only limited information that includes a cookie number, time and date of a page view, and a description of the
										page on which the Web Beacon resides. Tracking pixels may also be used when a user visits a Sentridocs.com website or opens a Sentridocs.com email and is used to track certain user activities. With a tracking pixel,
										Sentridocs.com may acquire data for online marketing, web analysis or email marketing. We may also carry Web Beacons and Tracking Pixels placed by third party advertisers. Unique Identifier. We may assign you a unique
										identifier to help keep track of your future visits. We use this information to gather aggregate demographic information about our visitors, and we may use it to personalize the information you see on the Website and
										some of the electronic communications you receive from us. We keep this information for our internal use.

									</p>

									<br><br>

									<h4>Specific Product Practices</h4>

									<p>
										The following notices explain specific privacy practices with respect to certain Sentridocs.com products and services that you may use.

										<br> If you have any questions about this privacy statement, the practices of this site, or your interactions with this site or you may email sales@sentridocs.com.

										<br><br> Sentridocs.com reserves the right to revise this Privacy Policy from time to time. Updates are posted at Sentridocs.com website, www.. Sentridocs.com When Sentridocs.com posts changes to this statement, we
										will also revise the "Last Updated" date at the top of the statement. Sentridocs.com encourages you to periodically review this statement to be informed of how Sentridocs.com is helping to protect your information.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ================ Privacy Policy Content End ============== -->


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