<?php
header("Content-Security-Policy: frame-ancestors *");
?>

<!DOCTYPE html>
<html lang="en">

<!-- Basic Meta Tags -->
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- SEO Meta Tags -->
    <title>SentriDocs | Secure Mortgage and Loan Document Management</title>
    <meta name="description" content="SentriDocs provides secure, cloud-based management solutions for mortgage and loan documents. Streamline your document handling process with our advanced platform designed for the financial industry.">
    <meta name="keywords" content="mortgage documents, loan documents, secure document management, financial document storage, cloud-based solutions, document security">
    <meta name="author" content="SentriDocs">
    <link rel="canonical" href="https://www.sentridocs.com/">

    <!-- Open Graph Meta Tags (for Social Media) -->
    <meta property="og:title" content="SentriDocs | Secure Mortgage and Loan Document Management">
    <meta property="og:description" content="SentriDocs offers secure and efficient document management solutions tailored for mortgage and loan processing.">
    <meta property="og:image" content="https://www.sentridocs.com/images/og-image.jpg"> <!-- Replace with actual image URL -->
    <meta property="og:url" content="https://www.sentridocs.com/">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="SentriDocs | Secure Mortgage and Loan Document Management">
    <meta name="twitter:description" content="Explore SentriDocs for top-notch document management solutions designed specifically for mortgage and loan documents, ensuring security and compliance.">
    <meta name="twitter:image" content="https://www.sentridocs.com/images/twitter-card.jpg"> <!-- Replace with actual image URL -->

    <!-- Security Meta Tags -->
    <!-- <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' https://trusted.cdn.com; style-src 'self' https://trusted.cdn.com;">
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <meta http-equiv="X-Frame-Options" content="SAMEORIGIN">
    <meta name="referrer" content="no-referrer">
    <meta http-equiv="Permissions-Policy" content="geolocation=(self), microphone=()"> -->

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

<?php
$random_string = random_bytes(64); // Generate a random string of 128 characters (64 bytes)
$script_nonce = base64_encode($random_string);

?>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Add other meta tags if needed -->


		<!-- ============ Title ============ -->
		<title>Sentridocs</title>
		<link rel="icon" type="image/x-icon" href="img/favicon.ico">
		

		<!-- ================ Custom Link ============== -->
		
		<link
            href="css/bootstrap.min.css"
         		   rel="stylesheet"
         		   type="text/css"
        >

        <!-- Custom Stylesheets -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" type="text/css" href="css/animate.css">
        
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="css/fontawesome/css/all.min.css" type="text/css" />

 
    
    <!-- ===================== Script =============== -->
		<script nonce="<?php echo $script_nonce; ?>">
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
				alert("Your company registration request has been sent successfully,SentriDocs will be in touch.");
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
									<img src="img/logo-dark.png" class="site-logo"  alt="Sentridocs photo">
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
								<li><button  data-bs-toggle="modal" data-bs-target="#myModal" class="order-btn">Log in</button></li>
								<li><button data-bs-toggle="modal" data-bs-target="#signUpModal" class="order-btn text-white active-btn" onclick="clearForm();" >Get Started</button></li>

							</ul>
						</div>
						<a href="javascript:void(0);" class="humbarger"><img src="img/icons8-menu-bar-48.png" alt="menu" class="menubar"></a>
					</div>
					
				</div>
			</div>
		</div>
		<!-- ================ Header Part End ============== -->


		<!-- ================ Mobile Menu Start ============== -->
		<div class="mobile-menu">
			<a href="javascript:void(0);" class="close-menu"><img src="img/icons8-cross-35.png" alt="icon"></a>
			<div class="inner-menu">
				<ul class="menu">
					<li><a href="features.php"  >Features</a></li>
					<li><a href="pricing.php"  >Pricing</a></li>
					<li><a href="tryusforfree.php"  >Try us for Free</a></li>
					<li><button  data-bs-toggle="modal" data-bs-target="#myModal" class="order-btn text-white">Log in</button></li>
					<li><button data-bs-toggle="modal" data-bs-target="#signUpModal" class="order-btn text-white active-btn" onclick="clearForm();"  >Get Started</button></li>
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
							<a href="#"  class="pop-login" rel="noopener noreferrer"></a>
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
										<input type="email" id="firstName" class="form-control" name="firstName"  placeholder="">
									</div>
								</div>
								
								<div class="col-md-6 col-lg-3">
									<div class="form-group mb-3">
										<label for="lastName">Last Name<span>*</span></label>
										<input id="lastName" type="email" class="form-control" name="lastName"  placeholder="">
									</div>
								</div>
								
								<div class="col-md-6 col-lg-3">
									<div class="form-group mb-3">
										<label for="emailAddress">Email Address<span>*</span></label>
										<input id="emailAddress" type="email" class="form-control" name="emailAddress"  placeholder="">
									</div>
								</div>
								
								<div class="col-md-6 col-lg-3">
									<div class="form-group mb-3">
										<label for="phoneNumber">Phone Number<span>*</span></label>
										<input id="phoneNumber" type="email" class="form-control" name="phoneNumber"  placeholder="">
									</div>
								</div>

								<div class="col-md-6 col-lg-3">
									<div class="form-group mb-3">
										<label for="companyName">Company Name<span>*</span></label>
										<input id="companyName"  type="email" class="form-control" name="companyName"  placeholder="">
									</div>
								</div>

								<div class="col-md-6 col-lg-3">
									<div class="form-group mb-3">
										<label for="companyNmlsId">Company NMLS ID<span>*</span></label>
										<input id="companyNmlsId" type="email" class="form-control" name="companyLicense"  placeholder="">
									</div>
								</div>
								
								<div class="col-md-12 col-lg-6">
									<div class="form-check mb-3 marginTop">
										<input type="checkbox" class="form-check-input" id="agreeId" name="agreeId" checked>
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
							<button type="button" class="btn btn-primary" aria-label="Sign Up" id="submit" onclick="onSubmit();">Sign Up</button>
						</div>
						
					</div>
				</div>
			</form>
		</div>
		<!-- ================ SignUp Popup End ============== -->


		<!-- ================ Banner Section Start ============== -->
		<div class="main-hero-section" id="home">
			<div class="inner-hero">

				<div class="banner-conrent-area">
					<div class="container">
						<div class="row">
							<div class="col-xl-2"></div>
							<div class="col-xl-12 mx-auto">
								<div class="inner-banner-content-area">
									<h2 class="col-md-10 mx-auto wow fadeInUp" data-wow-duration="2s">Build an Efficient, Modern Mortgage Origination Process</h2>
									<h6 class="col-md-10 mx-auto wow fadeInUp" data-wow-duration="2s">ENJOY THE BENEFITS OF A FULLY-AUTOMATED MORTGAGE BUSINESS</h6>
								</div>
							</div>
							<div class="col-xl-2"></div>
						</div>
					</div>
				</div>
			</div>

			<div class="css-shape-bottom"></div>

		</div>
		<!-- ================ Banner Section End ============== -->


		<!-- ================ About Section Start ============== -->
		<div class="about-section m-90" id="about">
			<div class="container">

				<div class="row">
					<div class="col-xl-6">
						<div class="about-img-area wow fadeInLeft" data-wow-duration="2s">
							<div class="patern">
								<img src="img/about-pattern.png" alt="apttern">
							</div>
							<img src="img/about-left-shape.png" class="img" alt="about-left-shape photo">
							<img src="img/about-01.png" class="img place-img" alt="about-01 photo">
						</div>
					</div>

					<div class="col-xl-6 wow fadeInRight" data-wow-duration="2s">
						<div class="about-content">
							<h3>With Sentridocs.com</h3>
							<p>you'll be on the leading edge of mortgage technology with a digital URLA loan application, secure document portal, suite of productivity integrations and so much more – all for one low monthly price.<br><br> Your clients will appreciate that security is paramount with Sentridocs.com. Our state-of-the art encryption and server controls leverage the latest technology and security practices.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ================ About Section End ============== -->


		<!-- ================ Choose Section Start ============== -->
		<div class="about-section" id="choose-us">
			<div class="container">

				<div class="row mt-5 pt-5">
					<div class="col-xl-6 wow fadeInLeft" data-wow-duration="2s">
						<div class="about-content">
							<h3>A Personalized Company Page branded to look like your website.</h3>
							<p>With a link from your website, Borrowers and originators can check the status of their loan application or the documents needed to close their loan. Status updates are sent by Email, Text messages, or both. You will quickly find
								every document your borrower has sent you and can view it instantly. Gone are the days of looking through old emails searching for attachments the borrower already sent.</p>
						</div>
					</div>

					<div class="col-xl-6 wow fadeInRight" data-wow-duration="2s">
						<div class="about-img-area only-right-side">
							<div class="patern wpt">
								<img src="img/about-pattern.png" alt="apttern" class="">
							</div>
							<img src="img/about-right-shape.png" class="img wt" alt="about-right-shape photo">
							<img src="img/about-03.png" class="img place-img wtt" alt="about-03 photo">
						</div>
					</div>

				</div>

			</div>
		</div>
		<!-- ================ Choose Section End ============== -->


		<!-- ================ Blog Section Start ============== -->
		<div id="blog">
			<div class="container">
				<div class="row">
					<div class="col-md-10 mx-auto wow fadeInUp" data-wow-duration="2s">
						<div class="service-content">
							<h3 class="my-3">Good communication reassures your clients that they made the right choice. Sentridocs.com guarantees good communication by automating the process, from on-boarding your loans through the closing.</h3>
							<p>Sentridocs.com secure mortgage portal is a bank grade, secure webpage for your borrowers to apply for a loan and upload the documents you need to process their loan. Real time needs list management, you can order documents from you borrower with a few clicks. Whether it's the full initial package of documents to start their loan, or adding documents as the process unfolds, all your loans are managed from the cloud, from anywhere, 24/7.</p><br>

							<h3 class="my-3">Experience the Difference of Sentridocs.com Digital URLA</h3>

							<p>Our intuitive URLA insures the borrower has an easily understandable and stepped path to a complete application for you. You will have a complete and validated Fannie Mae compliant application on every loan. Edits can be done by you before exporting, allowing you to clean up any ambiguity before you download the file.</p><br>

							<h3 class="my-3">Build an Efficient, Modern Mortgage Origination Process</h3>

							<p>Try Sentridocs.com for Free<br><br> Start your free trial today and discover how the Sentridocs.com mortgage portal can explode your loan volume by selling for you 24 hours per day, every day.<br><br> Close loans faster.<br><br>                           
							Make borrowers happier.<br><br> Impress referral partners</p><br>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ================ Blog Section End ============== -->


		<!-- ================ Subscribe Section Start ============== -->
		<div class="one-subscribe-area wow fadeInUp" data-wow-duration="2s">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="subscribe-wrap">
							<h2>Build an Efficient, Modern Mortgage Origination Process <br>Try Sentridocs.com for Free</h2>
							<form class="newsletter-form" data-toggle="validator">
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
											<img src="img/icons8-facebook-24.png" alt="facebook">
										</a>
									</li>
									<li>
										<a href="#" >
											<img src="img/icons8-twitter-24.png" alt="twitter">
										</a>
									</li>
									<li>
										<a href="#" >
											<img src="img/icons8-linkedin-24.png" alt="linkedin">
										</a>
									</li>
									<li>
										<a href="#" >
											<img src="img/icons8-instagram-24.png" alt="instagram">
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
										<img src="img/icons8-phone-24.png" alt="phone">
										<a href="tel:+7205731200">720 573 1200</a><br>
										<a href="tel:+7205731200"></a>
									</li>
									<li>
										<img src="img/icons8-email-24.png" alt="email">
										<a href="mailto:sales at sentridocs.com">sales at sentridocs.com</a>
									</li>
									<li>
										<img src="img/icons8-globe-24.png" alt="globe">
										<a href="https://www.sentridocs.com/auth/login" >Sentridocs.com</a>
									</li>
									<li>
										<img src="img/icons8-location-24.png" alt="location"> 4155 E Jewell Ave #601, Denver, CO 80222
									</li>
									<li>
										<img src="img/icons8-clock-24.png" alt="clock">  Mon - Fri 8:00 AM - 6:00 PM
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