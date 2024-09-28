<?php
    include 'assets/db/db_connection.php';

    if(isset($_GET['company_id'])){
        $company_slug = $_GET['company_id'];

        $query = "SELECT * FROM companies WHERE company_slug = '$company_slug'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $company_details = $result->fetch_assoc();
        } else {
            echo '<script>alert("Company not found!");</script>';
            echo '<script>window.location.href = "https://sentridocs.com/";</script>';
        }

        $conn->close();
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FHA Loan Leads</title>
    <?php 
        if(!empty($company_details['company_fav'])) {
            echo '<link rel="shortcut icon" href="../'.$company_details['company_fav'].'" type="image/x-icon">"';
        }else{
            echo '<link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">"';
        }
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Volkhov:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;0&amp;display=swap"
        rel="stylesheet" type="text/css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:ital,wght@0,300;0,400;0,700;1,400;1,700" media="all">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Fjalla+One:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;0&display=swap"
        media="all">
    <link rel="stylesheet" href="../assets/css/com_fha_style.css">
</head>

<body>
    <div>
        <main>
            <section class="funnel-box-section-03">
                <form class="funnel-box-03" style="text-align: center;" action="../process_form.php" method="POST">
                    <input type="hidden" name="companyID" value="<?php echo isset($company_details['id']) ? $company_details['id'] : 'sentridocs'; ?>">
                    <input type="hidden" name="companySlug" value="<?php echo isset($company_details['company_slug']) ? $company_details['company_slug'] : 'sentridocs'; ?>">
                    <input type="hidden" name="form_type" value="fha_loan">
                    <div class="header__logo-03">
                        <?php 
                            if(!empty($company_details['company_logo'])) {
                                echo '<img class="logo_img" src="../'.$company_details['company_logo'].'" alt="Company Logo" style="max-width: 200px;">';
                            } else {
                                echo '<img class="logo_img" src="../assets/img/logo-dark.png" alt="Company Logo" style="max-width: 200px;">';
                            }
                        ?>
                    </div>
                    <form class="funnel-box-03">
                        <fieldset class="funnel-content-section-03">
                            <h1 class="cta-message-heading"><span
                                    style="font-family: Fjalla One; font-size:26px; color: rgba(255, 172, 71, 1.00);line-height:1;">CHECK
                                    YOUR FHA LOAN ELIGIBILITY NOW</span></h1>
                            <div class="question__title">
                                <h1 data-question-title="Last year, over 1 million homeowners used an FHA loan to&nbsp;buy a home with as little as 3.5% down"
                                    class="froala-prview-size question-heading-text ">
                                    <p style="line-height: 1.15;">
                                        <span style="font-size: 26px; font-family: Montserrat;" class="font-family-added font-added">
                                            <strong>
                                                <span style="color: rgb(255, 255, 255);">Last year, over 1 million homeowners used an FHA loan to&nbsp;</span>
                                            </strong>
                                            <span style="color: rgb(0, 0, 0);">
                                                <strong> buy a home with as little as 3.5% down</strong>
                                            </span>
                                        </span>
                                    </p>
                                </h1>
                                <div class="question-description-text ">
                                    <p class="text-white fw-bold">Are you looking to buy or refinance?</p>
                                </div>
                            </div>
                            <div class="images-answer-section">
                                <div class="images-answer-row ">
                                    <div class="images-answer-col v3">
                                        <div class="images-answer-block">
                                            <label class="image-answer-label">
                                                <input type="radio" name="image_33" value="Single Family Home"
                                                    class="image-answer-checkbox" required="">
                                                <span class="selection-check"></span>
                                                <div class="image-holder" style="border-radius: 12px">
                                                    <div class="image-wrap">
                                                        <img src="https://images.lp-images1.com/images1/1/17344//pics/image_1692268740.png"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="image-answer-caption" style="color: #fff;">
                                                    Single Family Home
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="images-answer-col v3">
                                        <div class="images-answer-block">
                                            <label class="image-answer-label">
                                                <input type="radio" name="image_33" value="Condominium"
                                                    class="image-answer-checkbox" required="">
                                                <span class="selection-check"></span>
                                                <div class="image-holder" style="border-radius: 12px">
                                                    <div class="image-wrap">
                                                        <img src="https://images.lp-images1.com/images1/1/17344//pics/image_1692268759.png"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="image-answer-caption" style="color: #fff;">
                                                    Condominium
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="images-answer-col v3">
                                        <div class="images-answer-block">
                                            <label class="image-answer-label">
                                                <input type="radio" name="image_33" value="Townhome"
                                                    class="image-answer-checkbox" required="">
                                                <span class="selection-check"></span>
                                                <div class="image-holder" style="border-radius: 12px">
                                                    <div class="image-wrap">
                                                        <img src="https://images.lp-images1.com/images1/1/17344//pics/image_1692268776.png"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="image-answer-caption" style="color: #fff;">
                                                    Townhome
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="images-answer-col v3">
                                        <div class="images-answer-block">
                                            <label class="image-answer-label">
                                                <input type="radio" name="image_33" value="Multi-Family Home"
                                                    class="image-answer-checkbox" required="">
                                                <span class="selection-check"></span>
                                                <div class="image-holder" style="border-radius: 12px">
                                                    <div class="image-wrap">
                                                        <img src="https://images.lp-images1.com/images1/1/17344//pics/image_1692268805.png"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="image-answer-caption" style="color: #fff;">
                                                    Multi-Family Home
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="images-answer-col v3">
                                        <div class="images-answer-block">
                                            <label class="image-answer-label">
                                                <input type="radio" name="image_33" value="Mobile / Manufactured"
                                                    class="image-answer-checkbox" required="">
                                                <span class="selection-check"></span>
                                                <div class="image-holder" style="border-radius: 12px">
                                                    <div class="image-wrap">
                                                        <img src="https://images.lp-images1.com/images1/1/17344//pics/image_1692268822.png"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="image-answer-caption" style="color: #fff;">
                                                    Mobile / Manufactured
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Get Started</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-03">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What stage of the hom purchasing process are you currently in?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                                <div class="form-group question__fields text-center">
                                    <input id="purchasing-01" class="form-field" required="" type="radio" name="menu_01" value="Simply Curious">
                                    <label for="purchasing-01" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Simply Curious</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="purchasing-02" class="form-field" required="" type="radio" name="menu_01" value="Browsing Options">
                                    <label for="purchasing-02" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Browsing Options</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="purchasing-03" class="form-field" required="" type="radio" name="menu_01" value="Actively Searching">
                                    <label for="purchasing-03" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Actively Searching</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="purchasing-04" class="form-field" required="" type="radio" name="menu_01" value="Prepared to Purchase">
                                    <label for="purchasing-04" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Prepared to Purchase</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-03">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">How much do you plan to spend on your new home?</h1>
                            </div>
                            <div class="froala-prview-size question-description-text "><p><span style="color: rgb(255, 255, 255);">(an estimate is fine)</span></p></div>
                            <div class="checkbox-list-holder mb-4">
                                <div class="form-group question__fields text-center">
                                    <input id="new-home-01" class="form-field" required="" type="radio" name="menu_02" value="$700,000 or more">
                                    <label for="new-home-01" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>$700,000 or more</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="new-home-02" class="form-field" required="" type="radio" name="menu_02" value="$700,000 or more">
                                    <label for="new-home-02" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>$700,000 or more</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="new-home-03" class="form-field" required="" type="radio" name="menu_02" value="$500,000 - $600,000">
                                    <label for="new-home-03" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>$500,000 - $600,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="new-home-04" class="form-field" required="" type="radio" name="menu_02" value="$400,000 - $500,000">
                                    <label for="new-home-04" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>$400,000 - $500,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="new-home-05" class="form-field" required="" type="radio" name="menu_02" value="$300,000 - $400,000">
                                    <label for="new-home-05" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>$300,000 - $400,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="new-home-06" class="form-field" required="" type="radio" name="menu_02" value="$200,000 - $300,000">
                                    <label for="new-home-06" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>$200,000 - $300,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="new-home-07" class="form-field" required="" type="radio" name="menu_02" value="$200,000 - $100,000">
                                    <label for="new-home-07" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>$200,000 - $100,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="new-home-07" class="form-field" required="" type="radio" name="menu_02" value="Less Than $100,000">
                                    <label for="new-home-07" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Less Than $100,000</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-03">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">How will this home be used?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                                <div class="form-group question__fields text-center">
                                    <input id="used-home-01" class="form-field" required="" type="radio" name="menu_03" value="Primary Home">
                                    <label for="used-home-01" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Primary Home</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="used-home-02" class="form-field" required="" type="radio" name="menu_03" value="Secondary / Vacation Home">
                                    <label for="used-home-02" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Secondary / Vacation Home</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="used-home-03" class="form-field" required="" type="radio" name="menu_03" value="Investment Property">
                                    <label for="used-home-03" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Investment Property</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-03">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">Is this your first time purchasing a home?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                                <div class="form-group question__fields text-center">
                                    <input id="purchasing-home-01" class="form-field" required="" type="radio" name="menu_04" value="Yes">
                                    <label for="purchasing-home-01" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Yes</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="purchasing-home-02" class="form-field" required="" type="radio" name="menu_04" value="No">
                                    <label for="purchasing-home-02" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>No</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-03">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">When are you planning to make your home purchase?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4">
                                <div class="form-group question__fields text-center">
                                    <input id="home-purchase-plan-01" class="form-field" required="" type="radio" name="menu_05" value="Immediately: Signed a Purchase Agreement">
                                    <label for="home-purchase-plan-01" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Immediately: Signed a Purchase Agreement</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-purchase-plan-02" class="form-field" required="" type="radio" name="menu_05" value="ASAP: Found a House / Offer Pending">
                                    <label for="home-purchase-plan-02" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>ASAP: Found a House / Offer Pending</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-purchase-plan-03" class="form-field" required="" type="radio" name="menu_05" value="Within 30 Days">
                                    <label for="home-purchase-plan-03" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Within 30 Days</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-purchase-plan-04" class="form-field" required="" type="radio" name="menu_05" value="2 - 3 Months">
                                    <label for="home-purchase-plan-04" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>2 - 3 Months</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-purchase-plan-04" class="form-field" required="" type="radio" name="menu_05" value="3 - 6 Months">
                                    <label for="home-purchase-plan-04" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>3 - 6 Months</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-purchase-plan-04" class="form-field" required="" type="radio" name="menu_05" value="6+ Months">
                                    <label for="home-purchase-plan-04" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span> 6+ Months </span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-purchase-plan-04" class="form-field" required="" type="radio" name="menu_05" value="No Time Frame / Still Researching Options">
                                    <label for="home-purchase-plan-04" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>No Time Frame / Still Researching Options</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-03">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What would prevent you from buying a home now?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4">
                                <div class="form-group question__fields text-center">
                                    <input id="prevent-buy-home-01" class="form-field" required="" type="radio" name="menu_06" value="My Current Lease">
                                    <label for="prevent-buy-home-01" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>My Current Lease</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="prevent-buy-home-02" class="form-field" required="" type="radio" name="menu_06" value="Housing Market">
                                    <label for="prevent-buy-home-02" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Housing Market</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="prevent-buy-home-03" class="form-field" required="" type="radio" name="menu_06" value="Wanting to Save More">
                                    <label for="prevent-buy-home-03" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Wanting to Save More</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="prevent-buy-home-04" class="form-field" required="" type="radio" name="menu_06" value="Have not Started Saving">
                                    <label for="prevent-buy-home-04" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Haven't Started Saving</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="prevent-buy-home-05" class="form-field" required="" type="radio" name="menu_06" value="High Interest Rates">
                                    <label for="prevent-buy-home-05" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>High Interest Rates</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="prevent-buy-home-06" class="form-field" required="" type="radio" name="menu_06" value="Not Ready to Commit">
                                    <label for="prevent-buy-home-06" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span> Not Ready to Commit </span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="prevent-buy-home-07" class="form-field" required="" type="radio" name="menu_06" value="Upcoming Life Event">
                                    <label for="prevent-buy-home-07" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Upcoming Life Event</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="prevent-buy-home-08" class="form-field" required="" type="radio" name="menu_06" value="Finding the Right Home">
                                    <label for="prevent-buy-home-08" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Finding the Right Home</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-03">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">Have you (or your spouse) ever served in the US military?</h1>
                            </div>
                            <div class="froala-prview-size question-description-text "><p><span style="font-size: 15px; color: rgb(255, 255, 255); font-family: Montserrat;" class="font-family-added font-added">Active-duty military and Veterans may qualify for a VA Loan with $0 down and no PMI.</span></p></div>
                            <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                                <div class="form-group question__fields text-center">
                                    <input id="military-spouse-01" class="form-field" required="" type="radio" name="menu_07" value="No military service">
                                    <label for="military-spouse-01" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>No military service</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="military-spouse-02" class="form-field" required="" type="radio" name="menu_07" value="Yes, I (or my spouse) served">
                                    <label for="military-spouse-02" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Yes, I (or my spouse) served</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-03">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">How much of a down payment would you like to make?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4">
                                <div class="form-group question__fields text-center">
                                    <input id="downpayment-01" class="form-field" required="" type="radio" name="menu_11" value="0%">
                                    <label for="downpayment-01" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>0%</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="downpayment-02" class="form-field" required="" type="radio" name="menu_11" value="3.5%">
                                    <label for="downpayment-02" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>3.5%</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="downpayment-03" class="form-field" required="" type="radio" name="menu_11" value="5%">
                                    <label for="downpayment-03" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>5%</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="downpayment-04" class="form-field" required="" type="radio" name="menu_11" value="10%">
                                    <label for="downpayment-04" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>10%</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="downpayment-05" class="form-field" required="" type="radio" name="menu_11" value="15%">
                                    <label for="downpayment-05" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>15%</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="downpayment-06" class="form-field" required="" type="radio" name="menu_11" value="20%">
                                    <label for="downpayment-06" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span> 20% </span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="downpayment-07" class="form-field" required="" type="radio" name="menu_11" value="25%">
                                    <label for="downpayment-07" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>25%</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="downpayment-08" class="form-field" required="" type="radio" name="menu_11" value="More than 25%">
                                    <label for="downpayment-08" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>More than 25%</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-03">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">How much do you currently have saved for a down payment?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4">
                                <div class="form-group question__fields text-center">
                                    <input id="current-downpayment-01" class="form-field" required="" type="radio" name="menu_12" value="0 - $20,000">
                                    <label for="current-downpayment-01" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>0 - $20,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="current-downpayment-02" class="form-field" required="" type="radio" name="menu_12" value="$20,000 - $30,000">
                                    <label for="current-downpayment-02" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>$20,000 - $30,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="current-downpayment-03" class="form-field" required="" type="radio" name="menu_12" value="$30,000 - $50,000">
                                    <label for="current-downpayment-03" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>$30,000 - $50,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="current-downpayment-04" class="form-field" required="" type="radio" name="menu_12" value="$50,000 - $75,000">
                                    <label for="current-downpayment-04" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>$50,000 - $75,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="current-downpayment-05" class="form-field" required="" type="radio" name="menu_12" value="$275,000 - $100,000">
                                    <label for="current-downpayment-05" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>$275,000 - $100,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="current-downpayment-06" class="form-field" required="" type="radio" name="menu_12" value="$100,000 - $150,000">
                                    <label for="current-downpayment-06" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span> $100,000 - $150,000 </span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="current-downpayment-07" class="form-field" required="" type="radio" name="menu_12" value="More than $150,000">
                                    <label for="current-downpayment-07" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>More than $150,000</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-03">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What's your employment status?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4">
                                <div class="form-group question__fields text-center">
                                    <input id="Employed-status" class="form-field" required="" type="radio" name="menu_08" value="Employed">
                                    <label for="Employed-status" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Employed</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="Employed-status-02" class="form-field" required="" type="radio" name="menu_08" value="Self-Employed / 1099 Independent Contractor">
                                    <label for="Employed-status-02" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Self-Employed / 1099 Independent Contractor</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="Employed-status-03" class="form-field" required="" type="radio" name="menu_08" value="Retired">
                                    <label for="Employed-status-03" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Retired</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="Employed-status-04" class="form-field" required="" type="radio" name="menu_08" value="Military">
                                    <label for="Employed-status-04" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Military</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="Employed-status-05" class="form-field" required="" type="radio" name="menu_08" value="Not Employed">
                                    <label for="Employed-status-05" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Not Employed</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-03">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What's your household gross (before taxes) annual income?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4">
                                <div class="form-group question__fields text-center">
                                    <input id="annual-tax" class="form-field" required="" type="radio" name="menu_13" value="Greater than $200,000">
                                    <label for="annual-tax" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Greater than $200,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="annual-tax-02" class="form-field" required="" type="radio" name="menu_13" value="$150,000 - $200,000">
                                    <label for="annual-tax-02" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>$150,000 - $200,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="annual-tax-03" class="form-field" required="" type="radio" name="menu_13" value="$100,000 - $150,000">
                                    <label for="annual-tax-03" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>$100,000 - $150,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="annual-tax-04" class="form-field" required="" type="radio" name="menu_13" value="$75,000 - $100,000">
                                    <label for="annual-tax-04" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>$75,000 - $100,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="annual-tax-05" class="form-field" required="" type="radio" name="menu_13" value="$50,000 - $75,000">
                                    <label for="annual-tax-05" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>$50,000 - $75,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="annual-tax-05" class="form-field" required="" type="radio" name="menu_13" value="$30,000 - $50,000">
                                    <label for="annual-tax-05" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>$30,000 - $50,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="annual-tax-05" class="form-field" required="" type="radio" name="menu_13" value="Less than $30,000">
                                    <label for="annual-tax-05" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Less than $30,000</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-03">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">Have you filed for bankruptcy, or had a short sale or foreclosure in the last 3 years?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                                <div class="form-group question__fields text-center">
                                    <input id="last-years-01" class="form-field" required="" type="radio" name="menu_14" value="Yes">
                                    <label for="last-years-01" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Yes</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="last-years-02" class="form-field" required="" type="radio" name="menu_14" value="No">
                                    <label for="last-years-02" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>No</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-03">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What's your current credit score?</h1>
                            </div>
                            <div class="froala-prview-size question-description-text ">
                                <p><span style="font-family: Nunito; color: rgb(26, 188, 156);"
                                        class="font-family-added">(an estimate is fine)</span></p>
                            </div>
                            <div class="checkbox-list-holder mb-4">
                                <div class="form-group question__fields text-center">
                                    <input id="credit-score-01" class="form-field" required="" type="radio" name="menu_15"
                                        value="Excellent (720+)">
                                    <label for="credit-score-01" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Excellent (720+)</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="credit-score-02" class="form-field" required="" type="radio" name="menu_15"
                                        value="Good (680-719)">
                                    <label for="credit-score-02" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Good (680-719)</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="credit-score-03" class="form-field" required="" type="radio" name="menu_15"
                                        value="Fair (660-679)">
                                    <label for="credit-score-03" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Fair (660-679)</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="credit-score-04" class="form-field" required="" type="radio" name="menu_15"
                                        value="Below Average (620-659)">
                                    <label for="credit-score-04" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Below Average (620-659)</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="credit-score-05" class="form-field" required="" type="radio" name="menu_15"
                                        value="Poor (580-619)">
                                    <label for="credit-score-05" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Poor (580-619)</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="credit-score-06" class="form-field" required="" type="radio" name="menu_15"
                                        value="Bad (below 580)">
                                    <label for="credit-score-06" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Bad (below 580)</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-03">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">Are you working with a real estate agent?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                                <div class="form-group question__fields text-center">
                                    <input id="state-agent-01" class="form-field" required="" type="radio" name="menu_16" value="Yes">
                                    <label for="state-agent-01" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>Yes</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="state-agent-02" class="form-field" required="" type="radio" name="menu_16" value="No">
                                    <label for="state-agent-02" class="checkbox-button v3">
                                        <span class="fake-input border-0"></span>
                                        <span>No</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-03">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">Where are you looking to buy?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                                <div class="form-group-input v3 mb-5">
                                    <input type="text" id="zipcode_32" name="zipcode_32" class="form-control"
                                        autocomplete="off" data-auto-focus="true" required="">
                                    <label for="zipcode_32" class="input-label ">CITY OR ZIP CODE</label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-03">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What's your current zip code?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                                <div class="form-group-input v3 mb-5">
                                    <input type="text" id="zipcode_curr" name="zipcode_curr" class="form-control"
                                        autocomplete="off" data-auto-focus="true" required="">
                                    <label for="zipcode_curr" class="input-label ">ZIP CODE</label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-03">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">
                                    <span style="font-size: 48px; font-family: Montserrat; color: rgb(20, 28, 67);">Great News! <br>
                                    You've been matched.</span></h1>
                            </div>
                            <div class="froala-prview-size question-description-text " style="color: #fff;">
                                Continue to the final steps so we can provide your personalized quote.
                            </div>
                            <p><span style="font-family: Montserrat;" class="font-family-added"><span style="color: #fff;"><strong>This service is</strong><strong>&nbsp;</strong></span><span style="color: rgb(26, 188, 156);"><strong>100% FREE</strong></span><span style="color: #fff;"><strong>&nbsp;and there is no obligation!</strong></span></span></p>
                            <div class=" mb-4">
                                
                            </div>
                            <p><span style="font-size: 16px; color: #fff" class="font-added">(click below to continue)</span></p>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-03">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What's your full name?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                                <div class="form-group-input v3 mb-5">
                                    <input type="text" id="name" name="name" class="form-control"
                                        autocomplete="off" data-auto-focus="true" required="">
                                    <label for="name" class="input-label ">Full Name</label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-03">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What's your email address?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                                <div class="form-group-input v3 mb-5">
                                    <input type="email" id="email_address" name="email_address" class="form-control" autocomplete="off"
                                        data-auto-focus="true" required="">
                                    <label for="email_address" class="input-label">Email Address</label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-03">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What's your phone number?</h1>
                            </div>
                            <div class="form-group-input v3 mb-5">
                                <input type="tel" id="phone_number" name="phone_number" class="form-control"
                                    autocomplete="off" data-auto-focus="true" placeholder="(xxx) xxx-xxxx" maxlength="14"
                                    required="" style="text-align: center;">
                                <label for="phone_number" class="input-label">Phone number</label>
                            </div>
                            <button type="submit" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;;;">Submit</button>
                        </fieldset>
                        <div class="mb-5">
                            <span style="font-weight:bold;color:rgba(27, 30, 31, 1.00);font-size: 14px;line-height: 1.6;">We
                                keep your information private, safe and secure</span>
                        </div>
                        <div class="py-5 mb-5"
                            style="border-top: 1px solid rgba(0, 0, 0, 0.08);border-bottom: 1px solid rgba(0, 0, 0, 0.08);">
                            <span style="font-family: Montserrat; color: #fff;"><strong><span style="font-size: 14px;">No
                                        login or SSN required.&nbsp;</span></strong><strong><span
                                        style="font-size: 14px;">This will <u>NOT</u> affect your credit, and it takes less
                                        than 1 minute to complete!</span></strong></span>
                        </div>
                        <div><span style="font-family: Montserrat; color: rgb(43, 205, 117);"><strong>IMPORTANT PRIVACY
                                    NOTICE:&nbsp;</strong></span><span
                                style="font-family: Montserrat; color: #fff;"><strong>YOUR INFORMATION WILL <u>NOT</u> BE
                                    SOLD TO MULTIPLE PARTIES&nbsp;</strong></span></div>
                        <div><br><span style="font-family: Montserrat; color: #fff;">Most online mortgage shopping
                                experiences sell the information they collect to multiple mortgage lenders, banks, and other
                                institutions.&nbsp;</span></div>
                        <br>
                        <div><span style="font-family: Montserrat; color: #fff;">We don't. You’ll get connected with a top
                                Crush Commercial Advisor that’s licensed in your market, and YOU can decide the next steps
                                from there.</span></div>
                        <div class="py-5 my-5"
                            style="border-top: 1px solid rgba(0, 0, 0, 0.08);border-bottom: 1px solid rgba(0, 0, 0, 0.08);">
                            <span style="font-size: 12px; font-family: Montserrat; color: #fff;">Crush Mortgage Loans is a
                                tradename of Rebel Mortgage, LLC, NMLS #282856 | This website is for demo purposes only
                            </span>
                        </div>
                    </form>
                </form>
            </section>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <!-- <script>
		document.addEventListener('DOMContentLoaded', function () {
			var rangeInput = document.getElementById('myRange');
			var rangeValueDisplay = document.getElementById('rangeValue');

			// Update the value display when the range input changes
			rangeInput.addEventListener('input', function () {
				rangeValueDisplay.textContent = rangeInput.value;
			});

			// Function to increase the range value
			function increaseValue() {
				if (parseInt(rangeInput.value) < parseInt(rangeInput.max)) {
					rangeInput.value = parseInt(rangeInput.value) + 1;
					rangeValueDisplay.textContent = rangeInput.value;
				}
			}

			// Function to decrease the range value
			function decreaseValue() {
				if (parseInt(rangeInput.value) > parseInt(rangeInput.min)) {
					rangeInput.value = parseInt(rangeInput.value) - 1;
					rangeValueDisplay.textContent = rangeInput.value;
				}
			}

			// Attach event listeners to buttons to increase and decrease the value
			document.getElementById('increaseButton').addEventListener('click', increaseValue);
			document.getElementById('decreaseButton').addEventListener('click', decreaseValue);
		});
	</script> -->

    <script>

        if (document.getElementById('phone_number')) {
            document.getElementById('phone_number').addEventListener('input', function (e) {
                let input = e.target.value.replace(/\D/g, '').substring(0, 10);
                let areaCode = input.substring(0, 3);
                let middle = input.substring(3, 6);
                let last = input.substring(6, 10);

                if (input.length > 6) {
                    e.target.value = `(${areaCode}) ${middle}-${last}`;
                } else if (input.length > 3) {
                    e.target.value = `(${areaCode}) ${middle}`;
                } else if (input.length > 0) {
                    e.target.value = `(${areaCode}`;
                } else {
                    e.target.value = '';
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            const nextButtons = document.querySelectorAll('.next');
            const prevButtons = document.querySelectorAll(".previous");

            // Add event listener for Previous buttons
            prevButtons.forEach(button => {
                button.addEventListener("click", function () {
                    const currentFieldset = this.parentElement;
                    const prevFieldset = currentFieldset.previousElementSibling;

                    currentFieldset.style.display = "none";
                    prevFieldset.style.display = "block";
                });
            });

            nextButtons.forEach(button => {
                button.addEventListener('click', function (e) {

                    const fieldset = button.parentNode;
                    const radioInputs = fieldset.querySelectorAll('input[type="radio"]');
                    const numberInputs = fieldset.querySelectorAll('input[type="number"]');
                    const textInputs = fieldset.querySelectorAll('input[type="text"]');
                    let isValid = true;

                    // Check if any text input field is empty
                    if (fieldset.children[1] && fieldset.children[1].children[0] && fieldset.children[1].children[0].tagName === 'INPUT') {

                        if (fieldset.children[1].children[0].value.trim() === "") {
                            alert("fill that field")
                        } else {
                            const nextFieldset = fieldset.nextElementSibling;
                            if (nextFieldset) {
                                fieldset.style.display = 'none';
                                nextFieldset.style.display = 'block';
                            }
                        }
                    } else {
                        let isChecked = false;

                        if (radioInputs.length === 0) {
                            isChecked = true;
                        }
                        // Check if at least one radio input is checked
                        radioInputs.forEach(input => {
                            if (input.checked) {
                                isChecked = true;
                            }
                        });

                        // If at least one radio input is checked, proceed to the next fieldset
                        // Otherwise, display an error message or prevent form submission
                        if (isChecked) {
                            // Proceed to the next fieldset
                            const nextFieldset = fieldset.nextElementSibling;
                            if (nextFieldset) {
                                fieldset.style.display = 'none';
                                nextFieldset.style.display = 'block';
                            }
                        } else {
                            // Display an error message or prevent form submission
                            alert('Please select an option');
                        }
                    }
                });
            });
        });

    </script>
    <script>
        const sliderEl = document.querySelector("#cash_range")
        const sliderValue = document.querySelector(".cash_wrapper_value")

        if (sliderEl) {
            sliderEl.addEventListener("input", (event) => {
                const tempSliderValue = event.target.value;

                const formattedValue = Number(tempSliderValue).toLocaleString();
                sliderValue.textContent = formattedValue;

                const progress = (tempSliderValue / sliderEl.max) * 100;

                sliderEl.style.background = `linear-gradient(to right, #2681FF ${progress}%, #fff ${progress}%)`;
            })
        }
    </script>
</body>

</html>