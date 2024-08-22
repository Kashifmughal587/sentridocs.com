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
                success: function () {
                    tenantAddSuccess();
                },
                error: function (request, message, error) {
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
                success: function (res) {
                    document.getElementById("imgCaptcha").src = "data:image/jpeg;base64," + res.data['imageBase64'];
                    guid = res.data['guuid'];
                    //setCaptchaValue(res);
                },
                error: function (request, message, error) {
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
                            <li><a href="features.php">Features</a></li>
                            <li><a href="pricing.php">Pricing</a></li>
                            <li><a href="tryusforfree.php">Try us for Free</a></li>
                            <li><button href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#myModal"
                                    class="order-btn">Log in</button></li>
                            <li><button data-bs-toggle="modal" data-bs-target="#signUpModal"
                                    class="order-btn text-white active-btn" onclick="clearForm();" class="order-btn">Get
                                    Started</button></li>

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
                <li><a href="features.php">Features</a></li>
                <li><a href="pricing.php">Pricing</a></li>
                <li><a href="tryusforfree.php">Try us for Free</a></li>
                <li><button href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#myModal"
                        class="order-btn text-white">Log in</button></li>
                <li><button data-bs-toggle="modal" data-bs-target="#signUpModal" class="order-btn text-white active-btn"
                        onclick="clearForm();" class="order-btn">Get Started</button></li>
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
                        If you're a financial institution and interested in signing up with sentridocs.com to automate
                        your mortgage business, please use the button above and select "Get Started"
                        <a href="" class="pop-login" rel="noopener noreferrer"></a>
                    </p>
                </div>

                <!-- === Modal Footer === -->
                <div class="modal-footer">
                    <p>
                        If you're a borrower or loan applicant, please contact your lender for the proper login page.
                        You can't login here. You may already have an invitation and instructions sent to your email to
                        access the portal.

                        <a href="Sentridocs.com" class="pop-login" rel="noopener noreferrer"></a>

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
                            <p class="mb-0">Transform your mortgage business with Sentridocs. Let's connect and we'll
                                show you how to open the door to secure, mortgage origination automation.</p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <div class="row mt-2">
                            <div class="col-md-6 col-lg-3">
                                <div class="form-group mb-3">
                                    <label for="firstName">First Name<span>*</span></label>
                                    <input type="email" class="form-control" name="firstName"
                                        aria-describedby="emailHelp" placeholder="">
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="form-group mb-3">
                                    <label for="lastName">Last Name<span>*</span></label>
                                    <input type="email" class="form-control" name="lastName"
                                        aria-describedby="emailHelp" placeholder="">
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="form-group mb-3">
                                    <label for="emailAddress">Email Address<span>*</span></label>
                                    <input type="email" class="form-control" name="emailAddress"
                                        aria-describedby="emailHelp" placeholder="">
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="form-group mb-3">
                                    <label for="phoneNumber">Phone Number<span>*</span></label>
                                    <input type="email" class="form-control" name="phoneNumber"
                                        aria-describedby="emailHelp" placeholder="">
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="form-group mb-3">
                                    <label for="companyName">Company Name<span>*</span></label>
                                    <input type="email" class="form-control" name="companyName"
                                        aria-describedby="emailHelp" placeholder="">
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="form-group mb-3">
                                    <label for="companyNmlsId">Company NMLS ID<span>*</span></label>
                                    <input type="email" class="form-control" name="companyLicense"
                                        aria-describedby="emailHelp" placeholder="">
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <div class="form-check mb-3 marginTop">
                                    <input type="checkbox" class="form-check-input" name="agreeId" checked>
                                    <label class="form-check-label" for="agreeId">I agree to the <a href="#">consent to
                                            do Business Electronically</a></label>
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
                                    <input type="email" class="form-control mb-1" id="catpchaId"
                                        aria-describedby="emailHelp" placeholder="">
                                    <small id="emailHelp" class="error- success-">Captcha is case sensitive</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" aria-label="Close"
                            data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" aria-label="Sign Up" onclick=" onSubmit();">Sign
                            Up</button>
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
                                <h2 class="sub-banner-title mx-auto wow fadeInUp" data-wow-duration="2s">SMS Policy</h2>
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

                        <h1>Sentridocs Messaging Policy</h1>
                        <p><strong>Last Updated:</strong>&nbsp;February 27, 2024</p>
                        <p>This Messaging Policy applies to SMS, MMS, Chat, and WhatsApp messaging channels. We all
                            expect that the messages we&nbsp;<em>want</em>&nbsp;to receive will reach us, unhindered by
                            filtering or other blockers. An important step Sentridocs and our customers can take to make
                            that expectation reality is to prevent and eliminate&nbsp;<em>unwanted</em>&nbsp;messages.
                            Towards that end, we strive to work with our customers so that messages are sent with the
                            consent of the message recipient, and that those messages comply with applicable laws,
                            communications industry guidelines or standards, and measures of fairness and decency.</p>
                        <p>This principle is central to&nbsp;<a
                                href="https://sentridocs.com/businesselectronically/">Sentridocs's Acceptable Use
                                Policy.</a></p>
                        <p><strong>Sentridocs Messaging</strong></p>
                        <p>Sentridocs treats all messaging transmitted via Sentridocs&rsquo;s platform - regardless of
                            use case or phone number type (<em>e.g.,&nbsp;</em>long code, short code, or toll-free) - as
                            Application-to-Person (A2P) messaging. All A2P messages originating from Sentridocs are
                            subject to this Messaging Policy, which covers rules and /or prohibitions regarding:</p>
                        <ul>
                            <li>Consent ( &ldquo;opt-in&rdquo;);</li>
                            <li>Revocation of Consent (&ldquo;opt-out&rdquo;);</li>
                            <li>Sender Identification;</li>
                            <li>Messaging Usage;</li>
                            <li>Filtering Evasion; and</li>
                            <li>Enforcement.</li>
                        </ul>
                        <p>This policy applies to all customers who use Sentridocs&rsquo;s messaging channels. If you
                            provide your own end users or clients with the ability to send messages through Sentridocs,
                            for example as an ISV (Independent Software Vendor), you are responsible for the messaging
                            activity of these users. You must ensure that any messaging activity generated by your users
                            is in compliance with Sentridocs policies.</p>
                        <p><strong>Consent / Opt-in</strong></p>
                        <p><em>What Is Proper Consent?</em></p>
                        <p>Consent can't be bought, sold, or exchanged. For example, you can't obtain the consent of
                            message recipients by purchasing a phone list from another party.</p>
                        <p>Aside from two exceptions noted later in this section, you need to meet each of the consent
                            requirements listed below. If you are a software or platform provider using
                            Sentridocs&rsquo;s platform for messaging within your application or service, you must
                            require your customers to adhere to these same requirements when dealing with their users
                            and customers.</p>
                        <p><em>Consent Requirements</em></p>
                        <ul>
                            <li>Prior to sending the first message, you must obtain agreement from the message recipient
                                to communicate with them - this is referred to as "consent", you must make clear to the
                                individual they are agreeing to receive messages of the type you're going to send. You
                                need to keep a record of the consent, such as a copy of the document or form that the
                                message recipient signed, or a timestamp of when the customer completed a sign-up flow.
                            </li>
                        </ul>
                        <ul>
                            <li>If you do not send an initial message to that individual within a reasonable period
                                after receiving consent (or as set forth by local regulations or best practices), then
                                you will need to reconfirm consent in the first message you send to that recipient.</li>
                        </ul>
                        <ul>
                            <li>The consent applies only to you, and to the specific use or campaign that the recipient
                                has consented to. You can't treat it as blanket consent allowing you to send messages
                                from other brands or companies you may have, or additional messages about other uses or
                                campaigns.</li>
                        </ul>
                        <ul>
                            <li>Proof of opt-in consent should be retained as set forth by local regulation or best
                                practices after the end user opts out of receiving messages.</li>
                        </ul>
                        <p><em>Alternative Consent Requirements</em></p>
                        <p>While&nbsp;<strong>consent is always required</strong>&nbsp;and the consent requirements
                            noted above are generally the safest path, there are two scenarios where consent can be
                            received differently.</p>
                        <p><em>Contact initiated by an individual</em></p>
                        <p>If an individual sends a message to you, you are free to respond in an exchange with that
                            individual. For example, if an individual texts your phone number asking for your hours of
                            operation, you can respond directly to that individual, relaying your open hours. In such a
                            case, the individual&rsquo;s inbound message to you constitutes both consent and proof of
                            consent. Remember that the consent is limited only to that particular conversation. Unless
                            you obtain additional consent, don't send messages that are outside that conversation.</p>
                        <p><em>Informational content to an individual based on a prior relationship</em></p>
                        <p>You may send a message to an individual where you have a prior relationship, provided that
                            individual provided their phone number to you, and has taken some action to trigger the
                            potential communication, and has not expressed a preference
                            to&nbsp;<em>not&nbsp;</em>receive messages from you. Actions can include a button press,
                            alert setup, appointments, or order placements. Examples of acceptable messages in these
                            scenarios include appointment reminders, receipts, one-time passwords,
                            order/shipping/reservation confirmations, drivers coordinating pick up locations with
                            riders, and repair persons confirming service call times.</p>
                        <p>The message can't attempt to promote a product, convince someone to buy something, or
                            advocate for a social cause.</p>
                        <p><em>Periodic Messages and Ongoing Consent</em></p>
                        <p>If you intend to send messages to a recipient on an ongoing basis, you should confirm the
                            recipient&rsquo;s consent by offering them a clear reminder of how to unsubscribe from those
                            messages using standard opt-out language (defined below). You must also respect the message
                            recipient&rsquo;s preferences in terms of frequency of contact. You also need to proactively
                            ask individuals to reconfirm their consent as set forth by local regulations and best
                            practices.</p>
                        <p><strong>Identifying Yourself as the Sender</strong></p>
                        <p>Every message you send must clearly identify you (the party that obtained the opt-in from the
                            recipient) as the sender, except in follow-up messages of an ongoing conversation.</p>
                        <p><strong>Opt-out</strong></p>
                        <p>The initial message that you send to an individual needs to include the following language:
                            &ldquo;Reply STOP to unsubscribe,&rdquo; or the equivalent using another standard opt-out
                            keyword, such as STOPALL, UNSUBSCRIBE, CANCEL, END, and QUIT.</p>
                        <p>Individuals must have the ability to revoke consent at any time by replying with a standard
                            opt-out keyword. When an individual opts out, you may deliver one final message to confirm
                            that the opt-out has been processed, but any subsequent messages are not allowed. An
                            individual must once again provide consent before you can send any additional messages.</p>
                        <p><strong>Usage Limitations</strong></p>
                        <p><em>Content We Do Not Allow</em></p>
                        <p>The key to ensuring that messaging remains a great channel for communication and innovation
                            is preventing abusive use of messaging platforms. That means we never allow some types of
                            content on our platform, even if our customers get consent from recipients for that
                            content.&nbsp;<a href="https://sentridocs.com/businesselectronically/">Sentridocs&rsquo;s
                                Acceptable Use Policy&nbsp;</a>prohibits sending any content that is illegal, harmful,
                            unwanted, inappropriate, objectionable, confirmed to be criminal misinformation, or
                            otherwise poses a threat to the public, even if the content is permissible by law. Other
                            prohibited uses include:</p>
                        <ul>
                            <li>Anything that is illegal in the jurisdiction where the message recipient lives. Examples
                                include, but are not limited to:</li>
                            <ul>
                                <li><em>Cannabis.</em>&nbsp;Messages related to cannabis are not allowed in the United
                                    States as federal laws prohibit its sale, even though some states have legalized it.
                                    Similarly, messages related to CBD are not permissible in the United States, as
                                    certain states prohibit its sale. Sentridocs defines a cannabis message as any
                                    message which relates to the marketing or sale of a cannabis product, regardless of
                                    whether or not those messages explicitly contain cannabis terms, images, or links to
                                    cannabis websites.</li>
                                <li><em>Prescription Medication.&nbsp;</em>Offers for prescription medication that
                                    cannot legally be sold over-the-counter are prohibited in the United States.</li>
                            </ul>
                            <li>Hate speech, harassment, exploitative, abusive, or any communications that originate
                                from a hate group.</li>
                            <li>Fraudulent messages.</li>
                            <li>Malicious content, such as malware or viruses.</li>
                            <li>Any content that is designed to intentionally evade filters (see below).</li>
                        </ul>
                        <p><em>Country-Specific Rules</em></p>
                        <p>All messages should comply with the rules applicable to the country in which the message
                            recipient lives, which can be found in our&nbsp;<a
                                href="https://www.twilio.com/guidelines/sms">Country-Specific Guidelines</a>.
                            Additionally, Sentridocs has&nbsp;<a
                                href="https://www.twilio.com/en-us/legal/service-country-specific-terms">Country
                                Specific Requirements</a>&nbsp;for select countries, which you should review prior to
                            sending a message to recipients in or from those countries.</p>
                        <p><em>Age and Geographic Gating</em></p>
                        <p>If you are sending messages in any way related to alcohol, firearms, gambling, tobacco, or
                            other adult content, then more restrictions apply. In addition to obtaining consent from
                            every message recipient, you must ensure that no message recipient is younger than the legal
                            age of consent based on where the recipient is located. You also must ensure that the
                            message content complies with all applicable laws of the jurisdiction in which the message
                            recipient is located or applicable communications industry guidelines or standards.</p>
                        <p>You need to be able to provide proof that you have in place measures to ensure compliance
                            with these restrictions.</p>
                        <p><strong>Messaging Policy Violation Detection and Prevention Evasion</strong></p>
                        <p>Customers may not use Sentridocs&rsquo;s platform to evade Sentridocs&rsquo;s or a
                            telecommunications provider&rsquo;s unwanted messaging detection and prevention mechanisms.
                            Subject to&nbsp;<a href="https://sentridocs.com/privacypolicy/">Sentridocs&rsquo;s Privacy
                                Notice</a>, Sentridocs collects and monitors the content of text messages that are
                            transmitted via Sentridocs&rsquo;s platform to certain countries in order to detect spam,
                            fraudulent activity, and violations of&nbsp;<a
                                href="https://sentridocs.com/businesselectronically/">Sentridocs's Acceptable Use
                                Policy</a>. For more information on the collection and monitoring of text message
                            content in certain countries, please review&nbsp;<a
                                href="https://www.twilio.com/en-us/legal/service-country-specific-terms#country-specific-requirements">Sentridocs&rsquo;s
                                Country Specific Requirements, which are part of Sentridocs&rsquo;s Acceptable Use
                                Policy.</a></p>
                        <p>Examples of prohibited practices include:</p>
                        <ul>
                            <li>Content designed to evade detection. As noted above, we do not allow content which has
                                been specifically designed to evade detection by unwanted messaging detection and
                                prevention mechanisms. This includes intentionally misspelled words or non-standard
                                opt-out phrases which have been specifically created with the intent to evade these
                                mechanisms.</li>
                            <li>Snowshoeing. We do not permit snowshoeing, which is defined as spreading similar or
                                identical messages across many phone numbers with the intent or effect of evading
                                unwanted messaging detection and prevention mechanisms.</li>
                            <li>Simulated social engineering attacks.&nbsp;You are prohibited from transmitting messages
                                that are used for security&nbsp;testing, including simulated&nbsp;phishing&nbsp;and
                                other activities that may resemble social engineering or similar attacks.</li>
                            <li>Other practices identified and prohibited by this policy and&nbsp;<u><a
                                        href="https://sentridocs.com/businesselectronically.php">Sentridocs&rsquo;s
                                        Acceptable Use Policy.</a></u></li>
                        </ul>
                        <p><strong>How We Handle Violations</strong></p>
                        <p>When we identify a violation of these principles, where possible, we will work with customers
                            in good faith to get them back into compliance with this policy. However, to protect the
                            continued ability of all our customers to freely use messaging for legitimate purposes, we
                            reserve the right to suspend or remove access to Sentridocs&rsquo;s platform for customers
                            or customers&rsquo; end users&rsquo; that we determine are not complying with the Messaging
                            Policy, or who are not following the law in any applicable area or applicable communications
                            industry guidelines or standards, in some instances with limited notice in the case of
                            serious violations of this policy.</p>

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
                            <p>Start your free trial today and discover how the Sentridocs.com mortgage portal can
                                explode your loan volume by selling for you 24 hours per day, every day.</p>
                            <p>Close loans faster.</p>
                            <p>Make borrowers happier.</p>
                            <p>Impress referral partners.</p>

                            <ul>
                                <li>
                                    <a href="#">
                                        <img src="img/icons8-facebook-24.png">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="img/icons8-twitter-24.png">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="img/icons8-linkedin-24.png">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
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
                                    <a href="features.php">Features</a>
                                </li>
                                <li>
                                    <a href="pricing.php">Pricing</a>
                                </li>
                                <li>
                                    <a href="tryusforfree.php">Try us for free</a>
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
                                    <a href="#">Contact</a>
                                </li>
                                <li>
                                    <a href="#">Careers</a>
                                </li>
                                <li>
                                    <a href="privacypolicy.php">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="businesselectronically.php">Terms</a>
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
                                    <a href="https://www.sentridocs.com/auth/login">Sentridocs.com</a>
                                </li>
                                <li>
                                    <img src="img/icons8-location-24.png"> 4155 E Jewell Ave #601, Denver, CO 80222
                                </li>
                                <li>
                                    <img src="img/icons8-clock-24.png"> Mon - Fri 8:00 AM - 6:00 PM
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
            callback: function (box) {

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

    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
    </script>

    <script nonce="<?php echo $script_nonce; ?>">
        var onSubmit = function (token) {
            console.log('success!');
            if (grecaptcha.getResponse() != '') {
                validateForm();
                tenantAdd()
            } else {
                alert("Please check captcha.");
            }
        };



        var onloadCallback = function () {
            grecaptcha.render('html_element', {
                'sitekey': ' 6Lct-ZspAAAAAEmHXWjvEf8uUU1g0qXbuLMG1v4R',
            });
        };
    </script>
</body>

</html>