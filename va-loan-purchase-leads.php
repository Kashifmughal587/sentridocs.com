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
    <title>VA Loan Purchase Leads</title>
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
            <section class="funnel-box-section-06">
                <form class="funnel-box-06" style="text-align: center;"action="../process_form.php" method="POST">
                    <input type="hidden" name="companyID" value="<?php echo isset($company_details['id']) ? $company_details['id'] : 'sentridocs'; ?>">
                    <input type="hidden" name="companySlug" value="<?php echo isset($company_details['company_slug']) ? $company_details['company_slug'] : 'sentridocs'; ?>">
                    <input type="hidden" name="form_type" value="va-loan-purchase-leads">
                    <div class="header__logo-06">
                        <?php 
                            if(!empty($company_details['company_logo'])) {
                                echo '<img class="logo_img" src="../'.$company_details['company_logo'].'" alt="Company Logo" style="max-width: 200px;">';
                            } else {
                                echo '<img class="logo_img" src="../assets/img/logo-dark.png" alt="Company Logo" style="max-width: 200px;">';
                            }
                        ?>
                    </div>
                    <form class="funnel-box-06">
                        <fieldset class="funnel-content-section-06">
                            <h1 class="cta-message-heading" id="getfreeinsurancequotestext"><span style="font-family: Fjalla One; font-size:27px; color: rgba(255, 181, 69, 1.00);line-height:1;">CHECK YOUR ELIGIBILITY TODAY</span></h1>
                            <h1 data-question-title="Whether you want to buy a home or refinance, you could&nbsp;save thousands&nbsp;on your mortgage"
                                class="froala-prview-size question-heading-text ">
                                <p style="line-height: 1;font-family: Montserrat;font-size: 26px;">
                                    <strong>Whether you want to buy a home or refinance, you could&nbsp;</strong>
                                    <span style="color: rgb(58, 127, 242);"><strong>save thousands</strong></span>
                                    <strong>&nbsp;on your mortgage</strong>
                                </p>
                            </h1>
                            <div class="froala-prview-size question-description-text ">
                                <p style="line-height: 1;color: rgb(43, 205, 117); font-family: Montserrat;"><strong>Select an option below to find out what you qualify for now!</strong></p>
                            </div>

                            <div class="images-answer-section">
                                <div class="images-answer-row ">
                                    <div class="images-answer-col v6">
                                        <div class="images-answer-block">
                                            <label class="image-answer-label">
                                                <input type="radio" name="image_33" value="Single Family Home"
                                                    class="image-answer-checkbox" required="">
                                                <span class="selection-check"></span>
                                                <div class="image-holder" style="border-radius: 12px">
                                                    <div class="image-wrap">
                                                        <img src="https://images.lp-images1.com/images1/1/17344//pics/image_1690411971.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="image-answer-caption" style="color: #fff;">
                                                    Single Family Home
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="images-answer-col v6">
                                        <div class="images-answer-block">
                                            <label class="image-answer-label">
                                                <input type="radio" name="image_33" value="Condominium"
                                                    class="image-answer-checkbox" required="">
                                                <span class="selection-check"></span>
                                                <div class="image-holder" style="border-radius: 12px">
                                                    <div class="image-wrap">
                                                        <img src="https://images.lp-images1.com/images1/1/17344//pics/image_1690460233.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="image-answer-caption" style="color: #fff;">
                                                    Condominium
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn next"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Get
                                Started</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-06">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What type of home loan are you refinancing?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4">
                                <div class="form-group question__fields text-center">
                                    <input id="home-loan-01" class="form-field" required="" type="radio" name="menu_01" value="Conventional Loan">
                                    <label for="home-loan-01" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Conventional Loan</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-loan-02" class="form-field" required="" type="radio" name="menu_01" value="VA Loan">
                                    <label for="home-loan-02" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>VA Loan</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-loan-03" class="form-field" required="" type="radio" name="menu_01" value="USDA Loan">
                                    <label for="home-loan-03" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>USDA Loan</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-loan-04" class="form-field" required="" type="radio" name="menu_01" value="">
                                    <label for="home-loan-04" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>FHA Loan</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-loan-05" class="form-field" required="" type="radio" name="menu_01" value="I don't know">
                                    <label for="home-loan-05" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>I don't know</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-06">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What's your home loan refinancing goal?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                                <div class="form-group question__fields text-center">
                                    <input id="home-loan-goal-01" class="form-field" required="" type="radio" name="menu_03" value="Take Cash Out of My Home">
                                    <label for="home-loan-goal-01" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Take Cash Out of My Home</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-loan-goal-02" class="form-field" required="" type="radio" name="menu_03" value="Pay Off Debts">
                                    <label for="home-loan-goal-02" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Pay Off Debts</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-loan-goal-03" class="form-field" required="" type="radio" name="menu_03" value="Lower My Monthly Payments">
                                    <label for="home-loan-goal-03" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Lower My Monthly Payments</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-06">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What's the value of your home?</h1>
                            </div>
                            <div class="froala-prview-size question-description-text ">
                                <p><span style="font-family: Nunito; color: rgb(26, 188, 156);"
                                        class="font-family-added">(an estimate is fine)</span></p>
                            </div>
                            <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                                <div class="form-group-input v6 mb-5">
                                    <input type="text" id="home-value-in-numbers" name="home-value-in-numbers" class="form-control" autocomplete="off" data-auto-focus="true" required="">
                                    <label for="home-value-in-numbers" class="input-label">Estimated home value</label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-06">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What's the remaining balance of your current loan?</h1>
                            </div>
                            <div class="froala-prview-size question-description-text ">
                                <p><span style="font-family: Nunito; color: rgb(26, 188, 156);"
                                        class="font-family-added">(an estimate is fine)</span></p>
                            </div>
                            <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                                <div class="form-group-input v6 mb-5">
                                    <input type="text" id="home-value-in-numbers2" name="home-value-in-numbers2" class="form-control" autocomplete="off" data-auto-focus="true" required="">
                                    <label for="home-value-in-numbers2" class="input-label">Estimated home value</label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-06">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What's your current mortgage interest rate?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4">
                                <div class="form-group-select v6 mb-5">
                                    <label for="mortgage-interest-rate" class="input-label">SELECT YOUR CURRENT RATE</label>
                                    <select name="curr_mortage" id="mortgage-interest-rate" class="form-select" aria-label="Default select example">
                                        <option value="Under 3%">Under 3%</option>
                                        <option value="3.25%">3.25%</option>
                                        <option value="3.50%">3.50%</option>
                                        <option value="3.75%">3.75%</option>
                                        <option value="4.00%">4.00%</option>
                                        <option value="4.25%">4.25%</option>
                                        <option value="4.50%">4.50%</option>
                                        <option value="4.75%">4.75%</option>
                                        <option value="5.00%">5.00%</option>
                                        <option value="5.25%">5.25%</option>
                                        <option value="5.50%">5.50%</option>
                                        <option value="5.75%">5.75%</option>
                                        <option value="6.00%">6.00%</option>
                                        <option value="6.25%">6.25%</option>
                                        <option value="6.50%">6.50%</option>
                                        <option value="6.75%">6.75%</option>
                                        <option value="7.00%">7.00%</option>
                                        <option value="7.25%">7.25%</option>
                                        <option value="7.50%">7.50%</option>
                                        <option value="7.75%">7.75%</option>
                                        <option value="8.00%">8.00%</option>
                                        <option value="I don't knoe">I don't knoe</option>
                                    </select>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-06">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What kind of home do you currently own?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4">
                                <div class="form-group question__fields text-center">
                                    <input id="home-own-01" class="form-field" required="" type="radio" name="menu_04" value="Single Family">
                                    <label for="home-own-01" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Single Family</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-own-02" class="form-field" required="" type="radio" name="menu_04" value="Condominium">
                                    <label for="home-own-02" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Condominium</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-own-03" class="form-field" required="" type="radio" name="menu_04" value="Town Home">
                                    <label for="home-own-03" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Town Home</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-own-04" class="form-field" required="" type="radio" name="menu_04" value="Multi-Family">
                                    <label for="home-own-04" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span> Multi-Family</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-own-05" class="form-field" required="" type="radio" name="menu_04" value="Mobile / Manufactured">
                                    <label for="home-own-05" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Mobile / Manufactured</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-own-06" class="form-field" required="" type="radio" name="menu_04" value="Other">
                                    <label for="home-own-06" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Other</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-06">
                            <div class="question__title">
                                <h1 class="question-heading-text text-center mb-4">
                                  How Are You Using This Home?
                                </h1>
                            </div>
                            <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                                <div class="form-group question__fields text-center">
                                    <input id="PrimaryHome" class="form-field" required="" type="radio" name="menu_5"
                                        value="Primary Home">
                                    <label for="PrimaryHome" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Primary Home</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="SecondaryVacationHome" class="form-field" required="" type="radio"
                                        name="menu_5" value="Secondary / Vacation Home">
                                    <label for="SecondaryVacationHome" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Secondary / Vacation Home</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="InvestmentProperty" class="form-field" required="" type="radio" name="menu_5"
                                        value="Investment Property">
                                    <label for="InvestmentProperty" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Investment Property</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="Other2" class="form-field" required="" type="radio" name="menu_5"
                                        value="Other">
                                    <label for="Other2" class="checkbox-button v6">
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
                        <fieldset class="funnel-content-section-06">
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
                                    <label for="military-spouse-01" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>No military service</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="military-spouse-02" class="form-field" required="" type="radio" name="menu_06" value="Yes, I (or my spouse) served">
                                    <label for="military-spouse-02" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Yes, I (or my spouse) served</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-06">
                            <div class="question__title">
                                <h1 class="question-heading-text text-center mb-4">
                                    Do you have an active account with any of these institutions?
                                </h1>
                            </div>
                            <div class="checkbox-list-holder mb-4">
                                <div class="form-group question__fields text-center">
                                    <input id="Chase" class="form-field" required="" type="radio" name="menu_6"
                                        value="Chase">
                                    <label for="Chase" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Chase</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="BankofAmerica" class="form-field" required="" type="radio" name="menu_6"
                                        value="Bank of America">
                                    <label for="BankofAmerica" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Bank of America</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="WellsFargo" class="form-field" required="" type="radio" name="menu_6"
                                        value="Wells Fargo">
                                    <label for="WellsFargo" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Wells Fargo</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="CitibankNA" class="form-field" required="" type="radio" name="menu_6"
                                        value="Citibank, NA">
                                    <label for="CitibankNA" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Citibank, NA</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="USBank" class="form-field" required="" type="radio" name="menu_6"
                                        value="US Bank">
                                    <label for="USBank" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>US Bank</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="PNCBank" class="form-field" required="" type="radio" name="menu_6"
                                        value="PNC Bank">
                                    <label for="PNCBank" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>PNC Bank</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="NavyFederalCreditUnion" class="form-field" required="" type="radio"
                                        name="menu_6" value="Navy Federal Credit Union">
                                    <label for="NavyFederalCreditUnion" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Navy Federal Credit Union</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="NoneoftheAbove" class="form-field" required="" type="radio" name="menu_6"
                                        value="None of the Above – Allow Manual Entry of Bank Name">
                                    <label for="NoneoftheAbove" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>None of the Above – Allow Manual Entry of Bank Name</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-06">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What's your employment status?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4">
                                <div class="form-group question__fields text-center">
                                    <input id="Employed-status" class="form-field" required="" type="radio" name="menu_7" value="Employed">
                                    <label for="Employed-status" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Employed</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="Employed-status-02" class="form-field" required="" type="radio" name="menu_7" value="Self-Employed / 1099 Independent Contractor">
                                    <label for="Employed-status-02" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Self-Employed / 1099 Independent Contractor</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="Employed-status-03" class="form-field" required="" type="radio" name="menu_7" value="Retired">
                                    <label for="Employed-status-03" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Retired</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="Employed-status-04" class="form-field" required="" type="radio" name="menu_7" value="Military">
                                    <label for="Employed-status-04" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Military</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="Employed-status-05" class="form-field" required="" type="radio" name="menu_7" value="Not Employed">
                                    <label for="Employed-status-05" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Not Employed</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-06">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What's your household gross (before taxes) annual income?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4">
                                <div class="form-group question__fields text-center">
                                    <input id="annual-tax" class="form-field" required="" type="radio" name="menu_8" value="Greater than $200,000">
                                    <label for="annual-tax" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Greater than $200,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="annual-tax-02" class="form-field" required="" type="radio" name="menu_8" value="$150,000 - $200,000">
                                    <label for="annual-tax-02" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>$150,000 - $200,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="annual-tax-03" class="form-field" required="" type="radio" name="menu_8" value="$100,000 - $150,000">
                                    <label for="annual-tax-03" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>$100,000 - $150,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="annual-tax-04" class="form-field" required="" type="radio" name="menu_8" value="$75,000 - $100,000">
                                    <label for="annual-tax-04" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>$75,000 - $100,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="annual-tax-05" class="form-field" required="" type="radio" name="menu_8" value="$50,000 - $75,000">
                                    <label for="annual-tax-05" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>$50,000 - $75,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="annual-tax-06" class="form-field" required="" type="radio" name="menu_8" value="$30,000 - $50,000">
                                    <label for="annual-tax-06" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>$30,000 - $50,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="annual-tax-07" class="form-field" required="" type="radio" name="menu_8" value="Less than $30,000">
                                    <label for="annual-tax-07" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Less than $30,000</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-06">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">Have you filed for bankruptcy, or had a short sale or foreclosure in the last 3 years?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                                <div class="form-group question__fields text-center">
                                    <input id="last-years-01" class="form-field" required="" type="radio" name="menu_9" value="Yes">
                                    <label for="last-years-01" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Yes</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="last-years-02" class="form-field" required="" type="radio" name="menu_9" value="No">
                                    <label for="last-years-02" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>No</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-06">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What stage of the hom purchasing process are you currently in?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                                <div class="form-group question__fields text-center">
                                    <input id="purchasing-01" class="form-field" required="" type="radio" name="menu_10" value="Simply Curious">
                                    <label for="purchasing-01" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Simply Curious</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="purchasing-02" class="form-field" required="" type="radio" name="menu_10" value="Browsing Options">
                                    <label for="purchasing-02" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Browsing Options</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="purchasing-03" class="form-field" required="" type="radio" name="menu_10" value="Actively Searching">
                                    <label for="purchasing-03" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Actively Searching</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="purchasing-04" class="form-field" required="" type="radio" name="menu_10" value="Prepared to Purchase">
                                    <label for="purchasing-04" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Prepared to Purchase</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-06">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">How much do you plan to spend on your new home?</h1>
                            </div>
                            <div class="froala-prview-size question-description-text "><p><span style="color: rgb(26, 188, 156);">(an estimate is fine)</span></p></div>
                            <div class="checkbox-list-holder mb-4">
                                <div class="form-group question__fields text-center">
                                    <input id="new-home-01" class="form-field" required="" type="radio" name="menu_11" value="$700,000 or more">
                                    <label for="new-home-01" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>$700,000 or more</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="new-home-02" class="form-field" required="" type="radio" name="menu_11" value="$600,000 - $700,000">
                                    <label for="new-home-02" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>$600,000 - $700,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="new-home-03" class="form-field" required="" type="radio" name="menu_11" value="$500,000 - $600,000">
                                    <label for="new-home-03" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>$500,000 - $600,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="new-home-04" class="form-field" required="" type="radio" name="menu_11" value="400,000 - 500,000">
                                    <label for="new-home-04" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>400,000 - 500,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="new-home-05" class="form-field" required="" type="radio" name="menu_11" value="$300,000 - $400,000">
                                    <label for="new-home-05" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>$300,000 - $400,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="new-home-06" class="form-field" required="" type="radio" name="menu_11" value="$200,000 - $300,000">
                                    <label for="new-home-06" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>$200,000 - $300,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="new-home-07" class="form-field" required="" type="radio" name="menu_11" value="$100,000 - $200,000">
                                    <label for="new-home-07" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>$100,000 - $200,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="new-home-07" class="form-field" required="" type="radio" name="menu_11" value="Less Than $100,000">
                                    <label for="new-home-07" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Less Than $100,000</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-06">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What kind of home are you looking for?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4">
                                <div class="form-group question__fields text-center">
                                    <input id="home-own-01" class="form-field" required="" type="radio" name="menu_12" value="Single Family">
                                    <label for="home-own-01" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Single Family</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-own-02" class="form-field" type="radio" name="menu_12" value="Condominium">
                                    <label for="home-own-02" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Condominium</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-own-03" class="form-field" type="radio" name="menu_12" value="Town Home">
                                    <label for="home-own-03" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Town Home</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-own-04" class="form-field" type="radio" name="menu_12" value="Multi-Family">
                                    <label for="home-own-04" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span> Multi-Family</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-own-05" class="form-field" type="radio" name="menu_12" value="Mobile / Manufactured">
                                    <label for="home-own-05" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Mobile / Manufactured</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-own-06" class="form-field" type="radio" name="menu_12" value="New Construction">
                                    <label for="home-own-06" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>New Construction</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-own-07" class="form-field" type="radio" name="menu_12" value="Buy Land and Build">
                                    <label for="home-own-07" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Buy Land and Build</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>

                        <fieldset class="funnel-content-section-06">
                            <div class="question__title">
                                <h1 class="question-heading-text text-center mb-4">
                                   How will this home be used?
                                </h1>
                            </div>
                            <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                                <div class="form-group question__fields text-center">
                                    <input id="P1" class="form-field" required="" type="radio" name="menu_13"
                                        value="Primary Home">
                                    <label for="P1" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Primary Home</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="p2" class="form-field" required="" type="radio"
                                        name="menu_13" value="Secondary / Vacation Home">
                                    <label for="p2" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Secondary / Vacation Home</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="p3" class="form-field" required="" type="radio" name="menu_13"
                                        value="Investment Property">
                                    <label for="p3" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Investment Property</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="p4" class="form-field" required="" type="radio" name="menu_13"
                                        value="Other">
                                    <label for="p4" class="checkbox-button v6">
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

                        <!-- <fieldset class="funnel-content-section-06">
                            <div class="question__title">
                                <h1 class="question-heading-text text-center mb-4">
                                    How will this home be used?
                                </h1>
                            </div>
                            <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                                <div class="form-group question__fields text-center">
                                    <input id="PrimaryHome" class="form-field" type="radio" name="menu_13"
                                        value="Primary Home">
                                    <label for="PrimaryHome" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Primary Home</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="SecondaryVacationHome" class="form-field" type="radio" name="menu_13" value="Secondary / Vacation Home">
                                    <label for="SecondaryVacationHome" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Secondary / Vacation Home</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="InvestmentProperty" class="form-field" type="radio" name="menu_13"
                                        value="Investment Property">
                                    <label for="InvestmentProperty" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Investment Property</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset> -->
                        <fieldset class="funnel-content-section-06">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">Is this your first time purchasing a home?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                                <div class="form-group question__fields text-center">
                                    <input id="purchasing-home-years-01" class="form-field" required="" type="radio" name="menu_14" value="Yes">
                                    <label for="purchasing-home-years-01" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Yes</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="purchasing-home-years-02" class="form-field" required="" type="radio" name="menu_14" value="No">
                                    <label for="purchasing-home-years-02" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>No</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-06">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">When are you planning to make your home purchase?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4">
                                <div class="form-group question__fields text-center">
                                    <input id="home-purchase-plan-01" class="form-field" required="" type="radio" name="menu_15" value="Immediately: Signed a Purchase Agreement">
                                    <label for="home-purchase-plan-01" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Immediately: Signed a Purchase Agreement</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-purchase-plan-02" class="form-field" required="" type="radio" name="menu_15" value="ASAP: Found a House / Offer Pending">
                                    <label for="home-purchase-plan-02" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>ASAP: Found a House / Offer Pending</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-purchase-plan-03" class="form-field" required="" type="radio" name="menu_15" value="Within 30 Days">
                                    <label for="home-purchase-plan-03" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Within 30 Days</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-purchase-plan-04" class="form-field" required="" type="radio" name="menu_15" value="2 - 3 Months">
                                    <label for="home-purchase-plan-04" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>2 - 3 Months</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-purchase-plan-05" class="form-field" required="" type="radio" name="menu_15" value="3 - 6 Months">
                                    <label for="home-purchase-plan-05" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>3 - 6 Months</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-purchase-plan-06" class="form-field" required="" type="radio" name="menu_15" value="6+ Months">
                                    <label for="home-purchase-plan-06" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span> 6+ Months </span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="home-purchase-plan-07" class="form-field" required="" type="radio" name="menu_15" value="No Time Frame / Still Researching Options">
                                    <label for="home-purchase-plan-07" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>No Time Frame / Still Researching Options</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-06">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What would prevent you from buying a home now?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4">
                                <div class="form-group question__fields text-center">
                                    <input id="prevent-buy-home-01" class="form-field" required="" type="radio" name="menu_16" value="My Current Lease">
                                    <label for="prevent-buy-home-01" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>My Current Lease</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="prevent-buy-home-02" class="form-field" required="" type="radio" name="menu_16" value="Housing Market">
                                    <label for="prevent-buy-home-02" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Housing Market</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="prevent-buy-home-03" class="form-field" required="" type="radio" name="menu_16" value="Wanting to Save More">
                                    <label for="prevent-buy-home-03" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Wanting to Save More</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="prevent-buy-home-04" class="form-field" required="" type="radio" name="menu_16" value="Have not Started Saving">
                                    <label for="prevent-buy-home-04" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Haven't Started Saving</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="prevent-buy-home-05" class="form-field" required="" type="radio" name="menu_16" value="High Interest Rates">
                                    <label for="prevent-buy-home-05" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>High Interest Rates</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="prevent-buy-home-06" class="form-field" required="" type="radio" name="menu_16" value="Not Ready to Commit">
                                    <label for="prevent-buy-home-06" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span> Not Ready to Commit </span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="prevent-buy-home-07" class="form-field" required="" type="radio" name="menu_16" value="Upcoming Life Event">
                                    <label for="prevent-buy-home-07" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Upcoming Life Event</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="prevent-buy-home-08" class="form-field" required="" type="radio" name="menu_16" value="Finding the Right Home">
                                    <label for="prevent-buy-home-08" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>Finding the Right Home</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-06">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">How much of a down payment would you like to make?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4">
                                <div class="form-group question__fields text-center">
                                    <input id="downpayment-01" class="form-field" required="" type="radio" name="menu_17" value="0%">
                                    <label for="downpayment-01" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>0%</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="downpayment-02" class="form-field" required="" type="radio" name="menu_17" value="3.5%">
                                    <label for="downpayment-02" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>3.5%</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="downpayment-03" class="form-field" required="" type="radio" name="menu_17" value="5%">
                                    <label for="downpayment-03" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>5%</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="downpayment-04" class="form-field" required="" type="radio" name="menu_17" value="10%">
                                    <label for="downpayment-04" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>10%</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="downpayment-05" class="form-field" required="" type="radio" name="menu_17" value="15%">
                                    <label for="downpayment-05" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>15%</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="downpayment-06" class="form-field" required="" type="radio" name="menu_17" value="20%">
                                    <label for="downpayment-06" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span> 20% </span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="downpayment-07" class="form-field" required="" type="radio" name="menu_17" value="25%">
                                    <label for="downpayment-07" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>25%</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="downpayment-08" class="form-field" required="" type="radio" name="menu_17" value="More than 25%">
                                    <label for="downpayment-08" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>More than 25%</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-06">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">How much do you currently have saved for a down payment?</h1>
                            </div>
                            <div class="froala-prview-size question-description-text ">
                                <p><span style="font-family: Nunito; color: rgb(26, 188, 156);"
                                        class="font-family-added">(an estimate is fine)</span></p>
                            </div>
                            <div class="checkbox-list-holder mb-4">
                                <div class="form-group question__fields text-center">
                                    <input id="current-downpayment-01" class="form-field" required="" type="radio" name="menu_18" value="0 - $20,000">
                                    <label for="current-downpayment-01" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>0 - $20,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="current-downpayment-02" class="form-field" required="" type="radio" name="menu_18" value="$20,000 - $30,000">
                                    <label for="current-downpayment-02" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>$20,000 - $30,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="current-downpayment-03" class="form-field" required="" type="radio" name="menu_18" value="$30,000 - $50,000">
                                    <label for="current-downpayment-03" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>$30,000 - $50,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="current-downpayment-04" class="form-field" required="" type="radio" name="menu_18" value="$50,000 - $75,000">
                                    <label for="current-downpayment-04" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>$50,000 - $75,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="current-downpayment-05" class="form-field" required="" type="radio" name="menu_18" value="$275,000 - $100,000">
                                    <label for="current-downpayment-05" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>$275,000 - $100,000</span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="current-downpayment-06" class="form-field" required="" type="radio" name="menu_18" value="$100,000 - $150,000">
                                    <label for="current-downpayment-06" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span> $100,000 - $150,000 </span>
                                    </label>
                                </div>
                                <div class="form-group question__fields text-center">
                                    <input id="current-downpayment-07" class="form-field" required="" type="radio" name="menu_18" value="More than $150,000">
                                    <label for="current-downpayment-07" class="checkbox-button v6">
                                        <span class="fake-input border-0"></span>
                                        <span>More than $150,000</span>
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-06">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">Would you like to take out additional cash?</h1>
                            </div>
                            <div class="froala-prview-size question-description-text ">
                                <p><span style="font-family: Nunito; color: rgb(26, 188, 156);"
                                        class="font-family-added">(Select all that apply)</span></p>
                            </div>
                            <div class="cash_wrapper wrapper mb-4">
                                <div class="cash_wrapper_number v6 mb-5 text-center">0 to <span
                                        class="cash_wrapper_value v6 mb-5 text-center">0</span></div>
                                <div class="cash_range mb-4">
                                    <input type="range" min="0" max="300000" value="0" name="additional_cash" id="cash_range" class="v6" />
                                </div>
                                <div class="d-flex justify-content-between number-slider v6">
                                    <span>0</span>
                                    <span>$300k+</span>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
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
                            <div class="question-preview-parent__title mb-3">
                                <div class="question__title">
                                    <h1 class="question-heading-text mb-3">What is your street address?</h1>
                                </div>
    
                                <div class="address-fields-area">
                                    <div class="form-group-input v6">
                                        <input type="text" id="zipcode_32" name="zipcode_32" class="form-control"
                                            autocomplete="off" data-auto-focus="true" required="">
                                        <label for="zipcode_32" class="input-label">ENTER YOUR ADDRESS</label>
                                    </div>
                                    <div class="form-group-input v6">
                                        <input type="text" id="zipcode_32" name="zipcode_32" class="form-control"
                                            autocomplete="off" data-auto-focus="true" required="">
                                        <label for="zipcode_32" class="input-label">UNIT #</label>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-06">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What's your current zip code?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                                <div class="form-group-input v6 mb-5">
                                    <input type="text" id="zipcode_321" name="zipcode_321" class="form-control"
                                        autocomplete="off" data-auto-focus="true" required="">
                                    <label for="zipcode_321" class="input-label ">ZIP CODE</label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn previous"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Back</button>
                            <button type="button" class="btn ah-cta-btn next"
                                style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Continue</button>
                        </fieldset>
                        <fieldset class="funnel-content-section-06">
                            <div class="question__title">
                                <h1 class="question-heading-text mb-3">What's your full name?</h1>
                            </div>
                            <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                                <div class="form-group-input v6 mb-5">
                                    <input type="text" id="name" name="name" class="form-control"
                                        autocomplete="off" data-auto-focus="true" required="">
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
                                    autocomplete="off" data-auto-focus="true" placeholder="(xxx) xxx-xxxx" maxlength="14"
                                    required="" style="text-align: center;">
                                <label for="phone_number" class="input-label">Phone number</label>
                            </div>
                            <button type="submit" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(255, 255, 255) !important; border-color: rgb(255, 130, 1) !important; border-width: 1px !important; background: rgb(255, 130, 1) !important; border-radius: 7px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 25px 13px -10px !important; pointer-events: auto;">Get My Result</button>
                        </fieldset>
                        <div class="mb-5">
                            <span
                                style="font-weight:bold;color:rgba(182, 230, 164, 1.00);font-size: 14px;line-height: 1.6;">We
                                keep your information private, safe and secure</span>
                        </div>
                        <br>
                        <div class="py-5 mb-5"
                            style="border-top: 1px solid rgba(0, 0, 0, 0.08);border-bottom: 1px solid rgba(0, 0, 0, 0.08);">
                            <div style="text-align: center;"><span style="font-family: Montserrat; color: rgb(0, 0, 0);"><strong><span style="font-size: 14px;">No login or SSN required.&nbsp;</span></strong><strong><span style="font-size: 14px;">This will <u>NOT</u> affect your credit, and it takes less than 1 minute to complete!</span></strong></span></div>
                        </div>
                        <br>
                        <br>
                        <div><span style="font-family: Montserrat; color: rgb(43, 205, 117);"><strong>IMPORTANT PRIVACY NOTICE:&nbsp;</strong></span><span style="font-family: Montserrat; color: rgb(0, 0, 0);"><strong>YOUR INFORMATION WILL <u>NOT</u> BE SOLD TO MULTIPLE PARTIES&nbsp;</strong><br><br> We don't. You’ll get connected with a top Crush Mortgage Advisor that’s licensed in your market, and YOU can decide the next steps from there.</span></div>
                        <br>
                        <span style="font-family: Montserrat; color: rgb(0, 0, 0);">Most online mortgage shopping experiences sell the information they collect to multiple mortgage lenders, banks, and other institutions.&nbsp;</span>
                       
                        <div class="py-5 mt-5"
                            style="border-top: 1px solid rgba(0, 0, 0, 0.08);border-bottom: 1px solid rgba(0, 0, 0, 0.08);">
                            <span style="font-size: 12px; font-family: Montserrat; color: rgb(0, 0, 0);">IMPORTANT DISCLOSURES&nbsp; <br> Crush Mortgage Loans is a tradename of Rebel Mortgage, LLC, NMLS #282856 | This website is for demo purposes only
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