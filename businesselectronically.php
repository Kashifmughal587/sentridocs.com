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
									<h2 class="sub-banner-title mx-auto wow fadeInUp" data-wow-duration="2s">Terms</h2>
								</div>
							</div>
							<div class="col-xl-2"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ================ Banner Section End ============== -->


		<!-- ================ Business Electronically Content Start ============== -->
		<div class="main-page-contant">
			<div class="main-inner-page">
				<div class="container">
					<div class="row">
						<div class="col-xl-12">

							<div class="content-item">
								<div class="inner-content-item">
									<h4>Your Consent To Do Business Electronically</h4>

									<p>
										The loan for which you are applying involves various disclosures, records, and documents ("Loan Documents"), including this consent to do business electronically. The purpose of this Agreement is to obtain Your consent to receive certain Loan Documents from Us in electronic form rather than in paper form. With Your consent, in addition to acknowledging and agreeing, You will also be able to sign and authorize these Loan Documents electronically.
									</p>

									<p>
										Before We can engage in this transaction electronically, it is important that You understand Your rights and responsibilities. Please read the following and affirm Your “consent to conduct business with Us electronically”. For purposes of this Agreement,
										"Consent To Do Business Electronically" means the Loan Documents related to this transaction that are provided electronically, "You" and "Your" mean the borrower(s) under the applicable loan to which such Loan Documents apply, and "We", "Our" and "Us" mean the applicable mortgage broker(s), loan processor(s), or mortgage banker(s) with whom You are transacting business for such loan(s).
									</p>

									<br><br>
								</div>
							</div>

							<div class="content-item">
								<div class="inner-content-item">

									<h4>Your Consent</h4>

									<ul class="point">

										<li>Your consent to participate in this transaction electronically will apply to all Loan Documents for the applicable loans for which You are applying. If you provide Your consent by checking the "I agree to consent..." checkbox at the bottom of the page, We will conduct this transaction electronically, instead of providing You with the Loan Documents in paper form. </li>

										<li>If a document related to your loan is not available in electronic form, a paper copy will be provided to You free of charge.</li>

										<li>Conducting this transaction electronically is an option. If you choose not to accept receipt of “Consent To Do Business Electronically”, paper Loan Documents will be mailed to You by your lender or mortgage broker, “loan originator”.</li>

										<li>If you do not consent to receive these Loan Documents electronically, you will be provided with copies of the Loan Documents in paper form. Additionally: You will not be required to pay a fee for receiving paper copies of the Loan Documents.</li>

									</ul>

									<br><br>

								</div>
							</div>

							<div class="content-item">
								<div class="inner-content-item">
									<h4>Withdrawal of Consent </h4>

									<ul class="point">
										<li>You have the right to withdraw Your consent at any time. By declining or revoking your consent to receive “Consent to Do Business Electronically”, we will provide you with the Loan Documents in paper form.</li>

										<li>If you originally consent to receive Consent to Do Business Electronically, but later decide to withdraw your consent, you can do so by notifying us via telephone or mail.</li>

										<li>If you originally consent to receive “Consent to Do Business Electronically”, but later withdraw your consent: You will not be required to pay a fee for withdrawing consent and receiving paper copies of the Loan Documents.</li>
									</ul>

									<br><br>

								</div>
							</div>

							<div class="content-item">
								<div class="inner-content-item">

									<h4>Obtaining Paper Copies</h4>
									<ul class="point">
										<li>After your consent is given, you may request from us paper copies of your Loan Documents. Please send this request to Us via telephone or mail.</li>

										<li>If you request paper copies of the Loan Documents: You will not be required to pay a fee for receiving paper copies of the Loan Documents.</li>

									</ul>

									<br><br>

									<h4>System Requirements</h4>

									<ul class="point">

										<li>In order to receive Consent To Do Business Electronically, You must have a computer with Internet access and an Internet email account and address; an Internet browser using 128-bit encryption or higher, Adobe Acrobat 7.0 or higher, SSL encryption, and access to a printer or the ability to download information in order to keep copies of Your Consent To Do Business Electronically for Your records.</li>

										<li>If the software or hardware requirements change in the future, and You are unable to continue receiving Consent To Do Business Electronically, paper copies of such Loan Documents will be mailed to You once You notify Us that You are no longer able to access the Consent To Do Business Electronically because of the changed requirements. We will use commercially reasonable efforts to notify You before such requirements change. If You choose to withdraw Your consent upon notification of the change, You will be able to do so without penalty. </li>

									</ul>

									<br><br>

									<h4>How We Can Reach You</h4>

									<ul class="point">

										<li>You must promptly notify Us if there is a change in Your email address, Phone number for SMS or in other information needed to contact You electronically. You can contact Us via telephone or mail.</li>

										<li>We will not assume liability for non-receipt of notification of the availability of Consent To Do Business Electronically in the event Your email address on file is invalid; Your email or Internet service provider filters the notification as "spam" or "junk mail"; there is a malfunction in Your computer, browser, Internet service and/or software; or for other reasons beyond Our control.</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ================ Business Electronically Content End ============== -->


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