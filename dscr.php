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
    <title>DSCR Loan Leads</title>
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
    <link rel="stylesheet" href="../assets/css/styler.css">
</head>

<body>
    <div>
        <main>
            <section class="funnel-box-section-07">
                <form class="funnel-box-07" style="text-align: center;" action="../process_form.php" method="POST">
                    <input type="hidden" name="companyID" value="<?php echo isset($company_details['id']) ? $company_details['id'] : 'sentridocs'; ?>">
                    <input type="hidden" name="companySlug" value="<?php echo isset($company_details['company_slug']) ? $company_details['company_slug'] : 'sentridocs'; ?>">
                    <input type="hidden" name="form_type" value="dscr">
                    <div class="header__logo-07">
                        <?php 
                            if(!empty($company_details['company_logo'])) {
                                echo '<img class="logo_img" src="../'.$company_details['company_logo'].'" alt="Company Logo" style="max-width: 200px;">';
                            } else {
                                echo '<img class="logo_img" src="../assets/img/logo-dark.png" alt="Company Logo" style="max-width: 200px;">';
                            }
                        ?>
                    </div>
                    <form class="funnel-box-06">
                        <fieldset class="funnel-content-section-07">
                            <h1 class="cta-message-heading" id="getfreeinsurancequotestext"><span
                                    style="font-family: Fjalla One; font-size:27px; color: rgba(255, 181, 69, 1.00);line-height:1;">CHECK
                                    YOUR ELIGIBILITY TODAY</span></h1>
                            <h1 data-question-title="Whether you want to buy a home or refinance, you could&nbsp;save thousands&nbsp;on your mortgage"
                                class="froala-prview-size question-heading-text ">
                                <p style="line-height: 1;font-family: Montserrat;font-size: 26px;">
                                    <strong>Whether you want to buy a home or refinance, you could&nbsp;</strong>
                                    <span style="color: rgb(58, 127, 242);"><strong>save thousands</strong></span>
                                    <strong>&nbsp;on your mortgage</strong>
                                </p>
                            </h1>
                            <div class="froala-prview-size question-description-text ">
                                <p style="line-height: 1;color: rgb(43, 205, 117); font-family: Montserrat;">
                                    <strong>Select an option below to find out what you qualify for now!</strong></p>
                            </div>

                            <div class="images-answer-section">
                                <div class="images-answer-row ">
                                    <div class="images-answer-col v3">
                                        <div class="images-answer-block">
                                            <label class="image-answer-label">
                                                <input type="radio" name="image_33" value="Purchase"
                                                    class="image-answer-checkbox" required="">
                                                <span class="selection-check"></span>
                                                <div class="image-holder" style="border-radius: 12px">
                                                    <div class="image-wrap">
                                                        <img src="https://images.lp-images1.com/images1/1/17344//pics/image_1692014045.png"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="image-answer-caption" style="color: #fff;">
                                                    Purchase
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="images-answer-col v3">
                                        <div class="images-answer-block">
                                            <label class="image-answer-label">
                                                <input type="radio" name="image_33" value="Refinance"
                                                    class="image-answer-checkbox" required="">
                                                <span class="selection-check"></span>
                                                <div class="image-holder" style="border-radius: 12px">
                                                    <div class="image-wrap">
                                                        <img src="https://images.lp-images1.com/images1/1/17344//pics/image_1693329415.png"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="image-answer-caption" style="color: #fff;">
                                                    Refinance
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="images-answer-col v3">
                                        <div class="images-answer-block">
                                            <label class="image-answer-label">
                                                <input type="radio" name="image_33" value="Cash Out"
                                                    class="image-answer-checkbox" required="">
                                                <span class="selection-check"></span>
                                                <div class="image-holder" style="border-radius: 12px">
                                                    <div class="image-wrap">
                                                        <img src="https://images.lp-images1.com/images1/1/17344//pics/image_1693329465.png"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="image-answer-caption" style="color: #fff;">
                                                    Cash Out
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Get
                                Started</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-07">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">Select the option that best describes you below:</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4">
                                <div class="form-group question__fields text-center">
                                    <input id="home-describe-01" class="form-field" required="" type="radio" name="menu_1"
                                        value="Individual Homeowner (or Homebuyer)">
                                    <label for="home-describe-01" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Individual Homeowner (or Homebuyer)</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-describe-02" class="form-field" required="" type="radio" name="menu_1"
                                        value="Self-Employed">
                                    <label for="home-describe-02" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Self-Employed</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-describe-03" class="form-field" required="" type="radio" name="menu_1"
                                        value="Real Estate Investor (US Resident)">
                                    <label for="home-describe-03" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Real Estate Investor (US Resident)</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-describe-04" class="form-field" required="" type="radio" name="menu_1"
                                        value="Real Estate Investor (non-US Resident)">
                                    <label for="home-describe-04" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Real Estate Investor (non-US Resident)</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-describe-05" class="form-field" required="" type="radio" name="menu_1"
                                        value="Broker">
                                    <label for="home-describe-05" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Broker</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-describe-06" class="form-field" required="" type="radio" name="menu_1"
                                        value="Other">
                                    <label for="home-describe-06" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Other</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-07">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What kind of property are you financing?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4">
                                <div class="form-group question__fields text-center">
                                    <input id="home-financeing-01" class="form-field" required="" type="radio"
                                        name="menu_2" value="Single Family">
                                    <label for="home-financeing-01" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Single Family</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-financeing-02" class="form-field" required="" type="radio"
                                        name="menu_2" value="Condominium">
                                    <label for="home-financeing-02" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Condominium</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-financeing-03" class="form-field" required="" type="radio"
                                        name="menu_2" value="Multi-Family: 2-4 Units">
                                    <label for="home-financeing-03" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Multi-Family: 2-4 Units</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-financeing-04" class="form-field" required="" type="radio"
                                        name="menu_2" value="Multi-Family: 5+ Units">
                                    <label for="home-financeing-04" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Multi-Family: 5+ Units</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-financeing-05" class="form-field" required="" type="radio"
                                        name="menu_2" value="Mixed-use">
                                    <label for="home-financeing-05" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Mixed-use</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-financeing-06" class="form-field" required="" type="radio"
                                        name="menu_2" value="Retail Building">
                                    <label for="home-financeing-06" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Retail Building</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-financeing-07" class="form-field" required="" type="radio"
                                        name="menu_2" value="Office Building">
                                    <label for="home-financeing-07" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Office Building</span>
                                    </label>
                                </div>
                                
                            </div>
                            <button type="button" class="btn ah-cta-btn previous"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-07">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">How much is the property worth?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4">
                                <div class="form-group-select v7 mb-5">
                                    <label for="mortgage-interest-rate" class="input-label">SELECT AN OPTIONS</label>
                                    <select id="mortgage-interest-rate" class="form-select" name="property_worth"
                                        aria-label="Default select example">
                                        <option value="Select an options">Select an options</option>
                                        <option value="$1,000,000 or more">$1,000,000 or more</option>
                                        <option value="$900,000 - $1,000,000">$900,000 - $1,000,000</option>
                                        <option value="$800,000 - $900,000">$800,000 - $900,000</option>
                                        <option value="$700,000 - $800,000">$700,000 - $800,000</option>
                                        <option value="$600,000 - $700,000">$600,000 - $700,000</option>
                                        <option value="$500,000 - $600,000">$500,000 - $600,000</option>
                                        <option value="$400,000 - $500,000">$400,000 - $500,000</option>
                                        <option value="$300,000 - $400,000">$300,000 - $400,000</option>
                                        <option value="$200,000 - $300,000">$200,000 - $300,000</option>
                                        <option value="$100,000 - $200,000">$100,000 - $200,000</option>
                                        <option value="Less than $100,000">Less than $100,000</option>
                                    </select>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-07">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What's the loan amount needed?</h1>
                            </div>
                            <div class="froala-prview-size question-description-text ">
                                <p><span style="font-family: Nunito; color: rgb(26, 188, 156);"
                                        class="font-family-added">(an estimate is fine)</span></p>
                            </div>
                            <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                                <div class="form-group-input v7 mb-5">
                                    <input type="text" id="home-value-in-numbers" name="home-value-in-numbers"
                                        class="form-control" autocomplete="off" data-auto-focus="true" required="">
                                    <label for="home-value-in-numbers" class="input-label">Estimated home value</label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-07">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">Will you be living in or occupying this home?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4">
                                <div class="form-group question__fields text-center">
                                    <input id="home-occupying-01" class="form-field" required="" type="radio"
                                        name="menu_03" value="Yes (Owner Occupied)">
                                    <label for="home-occupying-01" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Yes (Owner Occupied)</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-occupying-02" class="form-field" required="" type="radio"
                                        name="menu_03" value="No (Non-Owner Occupied)">
                                    <label for="home-occupying-02" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>No (Non-Owner Occupied)</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-07">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What position will this loan be?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4">
                                <div class="form-group question__fields text-center">
                                    <input id="home-equity-01" class="form-field" required="" type="radio"
                                        name="menu_04" value="1st (only mortgage)">
                                    <label for="home-equity-01" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>1st (only mortgage)</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-equity-02" class="form-field" required="" type="radio"
                                        name="menu_04" value="">
                                    <label for="home-equity-02" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>2nd (home-equity)</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-equity-03" class="form-field" required="" type="radio"
                                        name="menu_04" value="3rd">
                                    <label for="home-equity-03" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>2rd</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-equity-04" class="form-field" required="" type="radio"
                                        name="menu_04" value="I'm not sure">
                                    <label for="home-equity-04" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>I'm not sure</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-equity-05" class="form-field" required="" type="radio"
                                        name="menu_04" value="Other">
                                    <label for="home-equity-05" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Other</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-07">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">When are you planning to close?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4">
                                <div class="form-group question__fields text-center">
                                    <input id="home-purchase-plan-02" class="form-field" required="" type="radio" name="menu_05" value="ASAP: Found a Property / Offer Pending">
                                    <label for="home-purchase-plan-02" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>ASAP: Found a Property / Offer Pending</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-purchase-plan-03" class="form-field" required="" type="radio" name="menu_05" value="Within 30 Days">
                                    <label for="home-purchase-plan-03" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Within 30 Days</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-purchase-plan-04" class="form-field" required="" type="radio" name="menu_05" value="2 - 3 Months">
                                    <label for="home-purchase-plan-04" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>2 - 3 Months</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-purchase-plan-05" class="form-field" required="" type="radio" name="menu_05" value="3 - 6 Months">
                                    <label for="home-purchase-plan-05" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>3 - 6 Months</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-purchase-plan-06" class="form-field" required="" type="radio" name="menu_05" value="6+ Months">
                                    <label for="home-purchase-plan-06" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span> 6+ Months </span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-purchase-plan-07" class="form-field" required="" type="radio" name="menu_05" value="No Time Frame / Still Researching Options">
                                    <label for="home-purchase-plan-07" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>No Time Frame / Still Researching Options</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-07">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">Have you (or your spouse) ever served in the US military?</h1>
                            </div>
                            <div class="froala-prview-size question-description-text ">
                                <p><span style="font-family: Nunito; color: rgb(26, 188, 156);"
                                        class="font-family-added">(Select all that apply)</span></p>
                            </div>
                            <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                                <div class="form-group question__fields text-center">
                                    <input id="military-spouse-01" class="form-field" required="" type="radio" name="menu_06" value="No military service">
                                    <label for="military-spouse-01" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>No military service</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="military-spouse-02" class="form-field" required="" type="radio" name="menu_06" value="Yes, I (or my spouse) served">
                                    <label for="military-spouse-02" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Yes, I (or my spouse) served</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-07">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What's your branch of military service?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4">
                                <div class="form-group-select v7 mb-5">
                                    <label for="mortgage-interest-rate" class="input-label">SELECT AN OPTIONS</label>
                                    <select id="mortgage-interest-rate" class="form-select" name="millitary_branch"
                                        aria-label="Default select example">
                                        <option value="Select an options">Select an options</option>
                                        <option value="Army">Army</option>
                                        <option value="Marine Corps">Marine Corps</option>
                                        <option value="Navy">Navy</option>
                                        <option value="Air Force">Air Force</option>
                                        <option value="Coast Guard">Coast Guard</option>
                                        <option value="National Guard">National Guard</option>
                                        <option value="Military Spouse">Military Spouse</option>
                                        <option value="Other VA Eligibility">Other VA Eligibility</option>
                                        <option value="No Military Experience">No Military Experience</option>
                                    </select>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-07">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What's your employment status?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4">
                                <div class="form-group question__fields text-center">
                                    <input id="Employed-status" class="form-field" required="" type="radio"
                                        name="menu_7" value="Employed">
                                    <label for="Employed-status" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Employed</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="Employed-status-02" class="form-field" required="" type="radio"
                                        name="menu_7" value="Self-Employed / 1099 Independent Contractor">
                                    <label for="Employed-status-02" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Self-Employed / 1099 Independent Contractor</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="Employed-status-03" class="form-field" required="" type="radio"
                                        name="menu_7" value="Retired">
                                    <label for="Employed-status-03" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Retired</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="Employed-status-04" class="form-field" required="" type="radio"
                                        name="menu_7" value="Military">
                                    <label for="Employed-status-04" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Military</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="Employed-status-05" class="form-field" required="" type="radio"
                                        name="menu_7" value="Not Employed">
                                    <label for="Employed-status-05" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Not Employed</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-07">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What's your household gross (before taxes) annual income?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4">
                                <div class="form-group question__fields text-center">
                                    <input id="annual-tax" class="form-field" required="" type="radio" name="menu_8" value="Greater than $200,000">
                                    <label for="annual-tax" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Greater than $200,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="annual-tax-02" class="form-field" required="" type="radio" name="menu_8" value="$150,000 - $200,000">
                                    <label for="annual-tax-02" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>$150,000 - $200,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="annual-tax-03" class="form-field" required="" type="radio" name="menu_8" value="$100,000 - $150,000">
                                    <label for="annual-tax-03" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>$100,000 - $150,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="annual-tax-04" class="form-field" required="" type="radio" name="menu_8" value="$75,000 - $100,000">
                                    <label for="annual-tax-04" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>$75,000 - $100,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="annual-tax-05" class="form-field" required="" type="radio" name="menu_8" value="$50,000 - $75,000">
                                    <label for="annual-tax-05" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>$50,000 - $75,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="annual-tax-06" class="form-field" required="" type="radio" name="menu_8" value="$30,000 - $50,000">
                                    <label for="annual-tax-06" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>$30,000 - $50,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="annual-tax-07" class="form-field" required="" type="radio" name="menu_8" value="Less than $30,000">
                                    <label for="annual-tax-07" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Less than $30,000</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-07">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">Have you filed for bankruptcy, or had a short sale or foreclosure in the last 3 years?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                                <div class="form-group question__fields text-center">
                                    <input id="last-years-01" class="form-field" required="" type="radio" name="menu_9" value="Yes">
                                    <label for="last-years-01" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Yes</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="last-years-02" class="form-field" required="" type="radio" name="menu_9" value="No">
                                    <label for="last-years-02" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>No</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-07">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What's your current credit score?</h1>
                            </div>
                            <div class="froala-prview-size question-description-text ">
                                <p><span style="font-family: Nunito; color: rgb(26, 188, 156);"
                                        class="font-family-added">(an estimate is fine)</span></p>
                            </div>
                            <div class="checkbox-list-holder mb-4">
                                <div class="form-group question__fields text-center">
                                    <input id="credit-score-01" class="form-field" required="" type="radio" name="menu_10"
                                        value="Excellent (720+)">
                                    <label for="credit-score-01" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Excellent (720+)</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="credit-score-02" class="form-field" required="" type="radio" name="menu_10"
                                        value="Good (680-719)">
                                    <label for="credit-score-02" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Good (680-719)</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="credit-score-03" class="form-field" required="" type="radio" name="menu_10"
                                        value="Fair (660-679)">
                                    <label for="credit-score-03" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Fair (660-679)</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="credit-score-04" class="form-field" required="" type="radio" name="menu_10"
                                        value="Below Average (620-659)">
                                    <label for="credit-score-04" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Below Average (620-659)</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="credit-score-05" class="form-field" required="" type="radio" name="menu_10"
                                        value="Poor (580-619)">
                                    <label for="credit-score-05" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Poor (580-619)</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="credit-score-06" class="form-field" required="" type="radio" name="menu_10"
                                        value="Bad (below 580)">
                                    <label for="credit-score-06" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Bad (below 580)</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-07">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">Are you working with a real estate agent?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                                <div class="form-group question__fields text-center">
                                    <input id="state-agent-01" class="form-field" required="" type="radio" name="menu_11" value="Yes">
                                    <label for="state-agent-01" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>Yes</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="state-agent-02" class="form-field" required="" type="radio" name="menu_11" value="No">
                                    <label for="state-agent-02" class="checkbox-button v7">
                                        <span class="fake-input border-0"></span>
                                        <span>No</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-07">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">Where is the property located?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                                <div class="form-group-input v7 mb-5">
                                    <input type="text" id="city_zipcode_32" name="city_zipcode_32" class="form-control"
                                        autocomplete="off" data-auto-focus="true" required="">
                                    <label for="city_zipcode_32" class="input-label ">City or ZIP CODE</label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-07">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What's your current zip code?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                                <div class="form-group-input v7 mb-5">
                                    <input type="text" id="zipcode_32" name="zipcode_32" class="form-control"
                                        autocomplete="off" data-auto-focus="true" required="">
                                    <label for="zipcode_32" class="input-label ">ZIP CODE</label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-06">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">
                                    <span style="font-size: 48px; font-family: Montserrat; color: rgb(20, 28, 67);">Great News! <br>
                                    <span style="font-weight: 400;">You've been matched.</span></span></h1>
                            </div>
                            <p><span style="font-family: Montserrat;" class="font-family-added">Continue to the final steps so we can provide your personalized results.</span></p>
                            <p><span style="font-family: Montserrat;" class="font-family-added"><span style="color: rgb(110, 124, 129);"><strong>This service is&nbsp;</strong></span><span style="color: rgb(26, 188, 156);"><strong>100% FREE</strong></span><strong>&nbsp;and there is no obligation!</strong></span><br><br></p>
                            <div class=" mb-4">
                                
                            </div>
                            <p><span style="font-size: 16px; color: #fff" class="font-added">(click below to continue)</span></p>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-06">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What's your full name?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                                <div class="form-group-input v6 mb-5">
                                    <input type="text" id="name" name="name" class="form-control" autocomplete="off"
                                        data-auto-focus="true" required="">
                                    <label for="name" class="input-label ">Full Name</label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-06">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What's your email address?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                                <div class="form-group-input v6 mb-5">
                                    <input type="email" id="email" name="email" class="form-control" autocomplete="off"
                                        data-auto-focus="true" required="">
                                    <label for="email" class="input-label">Email Address</label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-06">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What's your phone number?</h1>
                            </div>
                            <div class="form-group-input v6 mb-5">
                                <input type="tel" id="phone_number" name="phone_number" class="form-control"
                                    autocomplete="off" data-auto-focus="true" placeholder="(xxx) xxx-xxxx"
                                    maxlength="14" required="" style="text-align: center;">
                                <label for="phone_number" class="input-label">Phone number</label>
                            </div>
                            <button type="submit" class="btn ah-cta-btn next"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Get
                                My Result</button>
                        </fieldset>
                        
                        <div class="mb-5">
                            <span
                                style="font-weight:bold;color:rgba(182, 230, 164, 1.00);font-size: 14px;line-height: 1.6;">We
                                keep your information private, safe and secure</span>
                        </div>
                        <br>
                        <div class="py-5 mb-5"
                            style="border-top: 1px solid rgba(0, 0, 0, 0.08);border-bottom: 1px solid rgba(0, 0, 0, 0.08);">
                            <div style="text-align: center;"><span
                                    style="font-family: Montserrat; color: rgb(0, 0, 0);"><strong><span
                                            style="font-size: 14px;">No login or SSN
                                            required.&nbsp;</span></strong><strong><span style="font-size: 14px;">This
                                            will <u>NOT</u> affect your credit, and it takes less than 1 minute to
                                            complete!</span></strong></span></div>
                        </div>
                        <br>
                        <br>
                        <div><span style="font-family: Montserrat; color: rgb(43, 205, 117);"><strong>IMPORTANT PRIVACY
                                    NOTICE:&nbsp;</strong></span><span
                                style="font-family: Montserrat; color: rgb(0, 0, 0);"><strong>YOUR INFORMATION WILL
                                    <u>NOT</u> BE SOLD TO MULTIPLE PARTIES&nbsp;</strong><br><br> We don't. You’ll get
                                connected with a top Crush Mortgage Advisor that’s licensed in your market, and YOU can
                                decide the next steps from there.</span></div>
                        <br>
                        <span style="font-family: Montserrat; color: rgb(0, 0, 0);">Most online mortgage shopping
                            experiences sell the information they collect to multiple mortgage lenders, banks, and other
                            institutions.&nbsp;</span>

                        <div class="py-5 mt-5"
                            style="border-top: 1px solid rgba(0, 0, 0, 0.08);border-bottom: 1px solid rgba(0, 0, 0, 0.08);">
                            <span style="font-size: 12px; font-family: Montserrat; color: rgb(0, 0, 0);">IMPORTANT
                                DISCLOSURES&nbsp; <br> Crush Mortgage Loans is a tradename of Rebel Mortgage, LLC, NMLS
                                #282856 | This website is for demo purposes only
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

                sliderEl.style.background = `linear-gradient(to right, #32cc79 ${progress}%, #fff ${progress}%)`;
            })
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const inputField = document.getElementById('home-value-in-numbers');

            // Set the initial value to "$"
            inputField.value = '$';

            // Handle the input event to only allow numbers after the "$"
            inputField.addEventListener('input', function (e) {
                let value = inputField.value;

                // Remove any non-digit characters after the "$"
                value = value.replace(/[^0-9]/g, '');

                // Keep the dollar sign at the beginning and add only numbers after
                inputField.value = `$${value}`;
            });

            // Ensure the cursor stays at the correct position (after the "$")
            inputField.addEventListener('focus', function () {
                // Set cursor position after the "$" when focused
                inputField.setSelectionRange(inputField.value.length, inputField.value.length);
            });

            // Prevent the user from deleting the "$" symbol
            inputField.addEventListener('keydown', function (e) {
                if (inputField.selectionStart === 1 && (e.key === 'Backspace' || e.key === 'Delete')) {
                    e.preventDefault(); // Prevent deleting the "$"
                }
            });
        });
    </script>
</body>

</html>