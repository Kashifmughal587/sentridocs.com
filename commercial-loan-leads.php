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
    <title>Commercial Loan Leads</title>
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
    <link rel="stylesheet" href="../assets/css/com_fha_style.css">
</head>

<body>
    <div>
        <main>
            <section class="funnel-box-section-02">
                <form class="funnel-box-02" style="text-align: center;" id="cllform" action="../process_form.php" method="POST">
                    <input type="hidden" name="companyID" value="<?php echo isset($company_details['id']) ? $company_details['id'] : 'sentridocs'; ?>">
                    <input type="hidden" name="companySlug" value="<?php echo isset($company_details['company_slug']) ? $company_details['company_slug'] : 'sentridocs'; ?>">
                    <input type="hidden" name="form_type" value="commercial-loan-leads">
                    <header class="funnel-box-header-02">
                        <div class="header__logo">
                            <?php 
                                if(!empty($company_details['company_logo'])) {
                                    echo '<img class="logo_img" src="../'.$company_details['company_logo'].'" alt="Company Logo" style="max-width: 200px;">';
                                } else {
                                    echo '<img class="logo_img" src="../assets/img/logo-dark.png" alt="Company Logo" style="max-width: 200px;">';
                                }
                            ?>
                        </div>
                        <div class="funnel-box-header__info">
                            <span class="contact-number ">
                                <?php
                                    if(!empty($company_details['company_contact']))
                                    {    
                                ?>
                                    <span class="cta-phone-number"
                                        style="font-family: Montserrat;font-style: normal;font-size: 16px; font-weight: 800;color: #000;">
                                    Call Today! </span>
                                <?php
                                    echo '<a class="phone-number" href="tel:"'. $company_details['company_contact'] .' style="font-family: Montserrat;font-style: normal;font-size: 16px; font-weight: 800;color: #008CFF;">'.$company_details['company_contact'].'</a>';
                                    }
                                ?>
                            </span>
                        </div>
                    </header>
                    <fieldset class="funnel-content-section-02">
                        <div class="cta-message-wrap">
                            <div class="cta-message">
                                <h1 class="cta-message-heading" id="getfreeinsurancequotestext"><span
                                        style="font-family: Volkhov; font-size:35px; color:#32C779;line-height:1.15;">Get
                                        a Fast Commercial Real Estate Loan Quote — save time &amp; money. Let's fund
                                        your next project.</span></h1>
                                <div class="cta-description" id="getfreeratequotestext">
                                    Simply provide some information about the property and the financing you’re
                                    seeking, and we’ll provide you with the most competitive quotes available
                                    based on your specific needs. Enter your city or zip code below to get your
                                    custom quote now.
                                </div>
                            </div>
                        </div>
                        <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                            <div class="form-group-input v2 mb-5">
                                <input type="text" id="zipcode_32" name="zipcode_32" class="form-control"
                                    autocomplete="off" data-auto-focus="true" required="">
                                <label for="zipcode_32" class="input-label ">CITY OR ZIP CODE</label>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn next" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Get Started</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-02">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">What type of property is this?</h1>
                        </div>
                        <div class="checkbox-list-holder mb-4">
                            <div class="form-group-select v2 mb-5">
                                <label for="zipcode_32" class="input-label">SELECT AN OPTION</label>
                                <select class="form-select" name="property_type" aria-label="Default select example">
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Back</button>
                        <button type="button" class="btn ah-cta-btn next" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-02">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">In what state is the property located?</h1>
                        </div>
                        <div class="checkbox-list-holder mb-4">
                            <div class="form-group-select v2 mb-5">
                                <label for="zipcode_32" class="input-label">SELECT THE STATE</label>
                                <select class="form-select" name="property_location" aria-label="Default select example">
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Back</button>
                        <button type="button" class="btn ah-cta-btn next" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-02">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">Is the majority of the property occupied by the owner or leased to tenants?</h1>
                        </div>
                        <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                            <div class="form-group question__fields text-center">
                                <input id="tenants-01" class="form-field" required="" type="radio" name="menu_01"
                                    value="More than 51% of the building is owner-occupied">
                                <label for="tenants-01" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>More than 51% of the building is owner-occupied</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="tenants-02" class="form-field" required="" type="radio" name="menu_01"
                                    value="More than 51% of the building is tenant-occupied">
                                <label for="tenants-02" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>More than 51% of the building is tenant-occupied</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="tenants-03" class="form-field" required="" type="radio" name="menu_01"
                                    value="I am not sure">
                                <label for="tenants-03" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>I'm not sure</span>
                                </label>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Back</button>
                        <button type="button" class="btn ah-cta-btn next" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-02">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">What is the total estimated value of the property?</h1>
                        </div>
                        <div class="froala-prview-size question-description-text ">
                            <p><span style="font-family: Nunito; color: rgb(26, 188, 156);"
                                    class="font-family-added">(it's ok to estimate)</span></p>
                        </div>
                        <div class="cash_wrapper wrapper mb-4">
                            <div class="cash_wrapper_number v2 mb-5 text-center">0 to <span
                                    class="cash_wrapper_value v2 mb-5 text-center">0</span></div>
                            <div class="cash_range mb-4">
                                <input type="range" min="0" max="1000000" value="0" id="cash_range" class="v2" name="estimated_value" />
                            </div>
                            <div class="d-flex justify-content-between number-slider v2">
                                <span>0</span>
                                <span>$1M+</span>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Back</button>
                        <button type="button" class="btn ah-cta-btn next" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-02">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">What is your total desired loan amount?</h1>
                        </div>
                        <div class="froala-prview-size question-description-text ">
                            <p><span style="font-family: Nunito; color: rgb(26, 188, 156);"
                                    class="font-family-added">(ok to estimate)</span></p>
                        </div>
                        <div class="cash_wrapper wrapper mb-4">
                            <div class="cash_wrapper_number v2 mb-5 text-center">0 to <span
                                    class="cash_wrapper_value v2 mb-5 text-center">0</span></div>
                            <div class="cash_range mb-4">
                                <input type="range" min="0" max="1000000" value="0" id="cash_range" name="loan_amount" class="v2" />
                            </div>
                            <div class="d-flex justify-content-between number-slider v2">
                                <span>0</span>
                                <span>$1M+</span>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Back</button>
                        <button type="button" class="btn ah-cta-btn next" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-02">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">What is the purpose of this loan?</h1>
                        </div>
                        <div class="checkbox-list-holder mb-4">
                            <div class="form-group question__fields text-center">
                                <input id="purpose-loan-01" class="form-field" required="" type="radio" name="menu_02"
                                    value="Real estate purchase">
                                <label for="purpose-loan-01" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Real estate purchase</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="purpose-loan-02" class="form-field" required="" type="radio" name="menu_02"
                                    value="Real estate construction">
                                <label for="purpose-loan-02" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Real estate construction</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="purpose-loan-03" class="form-field" required="" type="radio" name="menu_02"
                                    value="Real estate refinance">
                                <label for="purpose-loan-03" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Real estate refinance</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="purpose-loan-04" class="form-field" required="" type="radio" name="menu_02"
                                    value="Cash-out">
                                <label for="purpose-loan-04" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Cash-out</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="purpose-loan-05" class="form-field" required="" type="radio" name="menu_02"
                                    value="Line of credit">
                                <label for="purpose-loan-05" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Line of credit</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="purpose-loan-06" class="form-field" required="" type="radio" name="menu_02"
                                    value="Equipment purchase or lease">
                                <label for="purpose-loan-06" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Equipment purchase or lease</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="purpose-loan-07" class="form-field" required="" type="radio" name="menu_02"
                                    value="Other">
                                <label for="purpose-loan-07" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Other</span>
                                </label>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Back</button>
                        <button type="button" class="btn ah-cta-btn next" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-02">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">What type of loan do you need?</h1>
                        </div>
                        <div class="checkbox-list-holder mb-4">
                            <div class="form-group question__fields text-center">
                                <input id="type-loan-01" class="form-field" required="" type="radio" name="menu_03"
                                    value="Bridge loan">
                                <label for="type-loan-01" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Bridge loan</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="type-loan-02" class="form-field" required="" type="radio" name="menu_03"
                                    value="Hard money loan">
                                <label for="type-loan-02" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Hard money loan</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="type-loan-03" class="form-field" required="" type="radio" name="menu_03"
                                    value="Mezzanine loan">
                                <label for="type-loan-03" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Mezzanine loan</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="type-loan-04" class="form-field" required="" type="radio" name="menu_03"
                                    value="Non-recourse loan">
                                <label for="type-loan-04" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Non-recourse loan</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="type-loan-05" class="form-field" required="" type="radio" name="menu_03"
                                    value="SBA 504 loan">
                                <label for="type-loan-05" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>SBA 504 loan</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="type-loan-06" class="form-field" required="" type="radio" name="menu_03"
                                    value="I am not sure or I'd like to discuss my options">
                                <label for="type-loan-06" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>I am not sure or I did like to discuss my options</span>
                                </label>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Back</button>
                        <button type="button" class="btn ah-cta-btn next" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-02">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">What is your desired length of the loan?</h1>
                        </div>
                        <div class="checkbox-list-holder mb-4">
                            <div class="form-group question__fields text-center">
                                <input id="loan-length-01" class="form-field" required="" type="radio" name="menu_04"
                                    value="Less than 5 years">
                                <label for="loan-length-01" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Less than 5 years</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="loan-length-02" class="form-field" required="" type="radio" name="menu_04"
                                    value="6-10 years">
                                <label for="loan-length-02" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>6-10 years</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="loan-length-03" class="form-field" required="" type="radio" name="menu_04"
                                    value="11-15 years">
                                <label for="loan-length-03" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>11-15 years</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="loan-length-04" class="form-field" required="" type="radio" name="menu_04"
                                    value="16-20 years">
                                <label for="loan-length-04" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>16-20 years</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="loan-length-05" class="form-field" required="" type="radio" name="menu_04"
                                    value="21+ years">
                                <label for="loan-length-05" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>21+ years</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="loan-length-06" class="form-field" required="" type="radio" name="menu_04"
                                    value="I am not sure or I'd like to discuss my options">
                                <label for="loan-length-06" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>I'm not sure or I'd like to discuss my options</span>
                                </label>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Back</button>
                        <button type="button" class="btn ah-cta-btn next" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-02">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">What is your total down payment?</h1>
                        </div>
                        <div class="checkbox-list-holder mb-4">
                            <div class="form-group question__fields text-center">
                                <input id="loan-downpayment-01" class="form-field" required="" type="radio" name="menu_05"
                                    value="0%">
                                <label for="loan-downpayment-01" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>0%</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="loan-downpayment-02" class="form-field" required="" type="radio" name="menu_05"
                                    value="1% - 5%">
                                <label for="loan-downpayment-02" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>1% - 5%</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="loan-downpayment-03" class="form-field" required="" type="radio" name="menu_05"
                                    value="6% - 10%">
                                <label for="loan-downpayment-03" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>6% - 10%</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="loan-downpayment-04" class="form-field" required="" type="radio" name="menu_05"
                                    value="11% - 20%">
                                <label for="loan-downpayment-04" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>11% - 20%</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="loan-downpayment-05" class="form-field" required="" type="radio" name="menu_05"
                                    value="21% - 29%">
                                <label for="loan-downpayment-05" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>21% - 29%</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="loan-downpayment-06" class="form-field" required="" type="radio" name="menu_05"
                                    value="30%+">
                                <label for="loan-downpayment-06" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>30%+</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="loan-downpayment-06" class="form-field" required="" type="radio" name="menu_05"
                                    value="I am not sure or I'd like to discuss my options">
                                <label for="loan-downpayment-06" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>I'm not sure or I'd like to discuss my options</span>
                                </label>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Back</button>
                        <button type="button" class="btn ah-cta-btn next" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-02">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">How soon do you need the loan?</h1>
                        </div>
                        <div class="checkbox-list-holder mb-4">
                            <div class="form-group question__fields text-center">
                                <input id="loan-need-01" class="form-field" required="" type="radio" name="menu_06"
                                    value="ASAP (within the next few days)">
                                <label for="loan-need-01" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>ASAP (within the next few days)</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="loan-need-02" class="form-field" required="" type="radio" name="menu_06"
                                    value="Within 1 month">
                                <label for="loan-need-02" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Within 1 month</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="loan-need-03" class="form-field" required="" type="radio" name="menu_06"
                                    value="Within 3 months">
                                <label for="loan-need-03" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Within 3 months</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="loan-need-04" class="form-field" required="" type="radio" name="menu_06"
                                    value="Within 6 months">
                                <label for="loan-need-04" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Within 6 months</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="loan-need-05" class="form-field" required="" type="radio" name="menu_06"
                                    value="Within 1 year or later">
                                <label for="loan-need-05" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Within 1 year or later</span>
                                </label>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Back</button>
                        <button type="button" class="btn ah-cta-btn next" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-02">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">Are you the owner of the property?</h1>
                        </div>
                        <div class="checkbox-list-holder mb-4">
                            <div class="form-group question__fields text-center">
                                <input id="property-owner-01" class="form-field" required="" type="radio" name="menu_07"
                                    value="Primary borrower">
                                <label for="property-owner-01" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Primary borrower</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="property-owner-02" class="form-field" required="" type="radio" name="menu_07"
                                    value="Developer">
                                <label for="property-owner-02" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Developer</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="property-owner-03" class="form-field" required="" type="radio" name="menu_07"
                                    value="Real estate broker">
                                <label for="property-owner-03" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Real estate broker</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="property-owner-04" class="form-field" required="" type="radio" name="menu_07"
                                    value="Mortgage Broker">
                                <label for="property-owner-04" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Mortgage Broker</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="property-owner-05" class="form-field" required="" type="radio" name="menu_07"
                                    value="CPA">
                                <label for="property-owner-05" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>CPA</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="property-owner-06" class="form-field" required="" type="radio" name="menu_07"
                                    value="Consultant">
                                <label for="property-owner-06" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Consultant</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="property-owner-07" class="form-field" required="" type="radio" name="menu_07"
                                    value="Employee">
                                <label for="property-owner-07" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Employee</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="property-owner-08" class="form-field" required="" type="radio" name="menu_07"
                                    value="Other">
                                <label for="property-owner-08" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Other</span>
                                </label>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Back</button>
                        <button type="button" class="btn ah-cta-btn next" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-02">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">Will you have any co-debtors for this loan?</h1>
                        </div>
                        <div class="checkbox-list-holder flex-column align-items-center mb-4">
                            <div class="form-group question__fields text-center">
                                <input id="co-debtor-01" class="form-field" required="" type="radio" name="menu_08"
                                    value="No">
                                <label for="co-debtor-01" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>No</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="co-debtor-02" class="form-field" required="" type="radio" name="menu_08"
                                    value="Yes">
                                <label for="co-debtor-02" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Yes</span>
                                </label>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Back</button>
                        <button type="button" class="btn ah-cta-btn next" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-02">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">In what state does the primary borrower live?</h1>
                        </div>
                        <div class="checkbox-list-holder mb-4">
                            <div class="form-group-select v2 mb-5">
                                <label for="zipcode_32" class="input-label">STATE BORROER LIVES</label>
                                <select class="form-select" name="primary_borrower_loc" aria-label="Default select example">
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Back</button>
                        <button type="button" class="btn ah-cta-btn next" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-02">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">What personal assets is the primary borrower willing to use as collateral?</h1>
                        </div>
                        <div class="froala-prview-size question-description-text ">
                            <p><span style="font-family: Nunito; color: rgb(26, 188, 156);"
                                    class="font-family-added">(please select all that apply)</span></p>
                        </div>
                        <div class="checkbox-list-holder mb-4">
                            <div class="form-group question__fields text-center">
                                <input id="collateral-01" class="form-field" type="checkbox" name="menu_09"
                                    value="No personal asset">
                                <label for="collateral-01" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>No personal asset</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="collateral-02" class="form-field" type="checkbox" name="menu_09"
                                    value="Personal residence(s) or other property">
                                <label for="collateral-02" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Personal residence(s) or other property</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="collateral-03" class="form-field" type="checkbox" name="menu_09"
                                    value="Cash">
                                <label for="collateral-03" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Cash</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="collateral-04" class="form-field" type="checkbox" name="menu_09"
                                    value="Inventory">
                                <label for="collateral-04" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Inventory</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="collateral-05" class="form-field" type="checkbox" name="menu_09"
                                    value="Heirlooms or collectibles">
                                <label for="collateral-05" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Heirlooms or collectibles</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="collateral-06" class="form-field" type="checkbox" name="menu_09"
                                    value="Other">
                                <label for="collateral-06" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Other</span>
                                </label>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Back</button>
                        <button type="button" class="btn ah-cta-btn next" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-02">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">What is the primary borrower's credit score?</h1>
                        </div>
                        <div class="froala-prview-size question-description-text ">
                            <p><span style="font-family: Nunito; color: rgb(26, 188, 156);"
                                    class="font-family-added">(it's OK to estimate)</span></p>
                        </div>
                        <div class="checkbox-list-holder mb-4">
                            <div class="form-group question__fields text-center">
                                <input id="credit-score-01" class="form-field" required="" type="radio" name="menu_10"
                                    value="Excellent (720+)">
                                <label for="credit-score-01" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Excellent (720+)</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="credit-score-02" class="form-field" required="" type="radio" name="menu_10"
                                    value="Good (680-719)">
                                <label for="credit-score-02" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Good (680-719)</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="credit-score-03" class="form-field" required="" type="radio" name="menu_10"
                                    value="Fair (660-679)">
                                <label for="credit-score-03" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Fair (660-679)</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="credit-score-04" class="form-field" required="" type="radio" name="menu_10"
                                    value="Below Average (620-659)">
                                <label for="credit-score-04" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Below Average (620-659)</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="credit-score-05" class="form-field" required="" type="radio" name="menu_10"
                                    value="Poor (580-619)">
                                <label for="credit-score-05" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Poor (580-619)</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="credit-score-06" class="form-field" required="" type="radio" name="menu_10"
                                    value="Bad (below 580)">
                                <label for="credit-score-06" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Bad (below 580)</span>
                                </label>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Back</button>
                        <button type="button" class="btn ah-cta-btn next" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-02">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">What documents will the primary borrower provide for this loan?</h1>
                        </div>
                        <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                            <div class="form-group question__fields text-center">
                                <input id="borrower-loan-01" class="form-field" required="" type="radio" name="menu_11"
                                    value="Full documents (tax returns)">
                                <label for="borrower-loan-01" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Full documents (tax returns)</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="borrower-loan-02" class="form-field" required="" type="radio" name="menu_11"
                                    value="Stated income (no tax returns)">
                                <label for="borrower-loan-02" class="checkbox-button v2">
                                    <span class="fake-input border-0"></span>
                                    <span>Stated income (no tax returns)</span>
                                </label>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Back</button>
                        <button type="button" class="btn ah-cta-btn next" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-02">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">What documents will the primary borrower provide for this loan?</h1>
                        </div>
                        <div class="froala-prview-size question-description-text ">
                            <p><span style="font-family: Nunito; color: rgb(26, 188, 156);"
                                    class="font-family-added">(optional — type N/A if nothing additional)</span></p>
                        </div>
                        <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                            <div class="form-group-textarea v2 mb-5">
                                <textarea class="form-control" name="other_docs" required=""></textarea>
                                <label for="answer" class="input-label ">CITY OR ZIP CODE</label>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Back</button>
                        <button type="button" class="btn ah-cta-btn next" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Get Started</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-02">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">
                                <span style="font-size: 48px; font-family: Montserrat; color: rgb(20, 28, 67);">Great News! <br>
                                You've been matched.</span></h1>
                        </div>
                        <div class="froala-prview-size question-description-text ">
                            Continue to the final steps so we can provide your personalized quote.
                        </div>
                        <p><span style="font-family: Montserrat;" class="font-family-added"><span style="color: rgb(20, 28, 67);"><strong>This service is</strong><strong>&nbsp;</strong></span><span style="color: rgb(26, 188, 156);"><strong>100% FREE</strong></span><span style="color: rgb(20, 28, 67);"><strong>&nbsp;and there is no obligation!</strong></span></span></p>
                        <div class=" mb-4">
                            
                        </div>
                        <p><span style="font-size: 16px; color: rgb(20, 28, 67);" class="font-added">(click below to continue)</span></p>
                        <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Back</button>
                        <button type="button" class="btn ah-cta-btn next" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Get Started</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-02">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">What's your full name?</h1>
                        </div>
                        <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                            <div class="form-group-input v2 mb-5">
                                <input type="text" id="name" name="name" class="form-control"
                                    autocomplete="off" data-auto-focus="true" required="">
                                <label for="name" class="input-label ">Full Name</label>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Back</button>
                        <button type="button" class="btn ah-cta-btn next" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Get Started</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-02">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">What's your email address?</h1>
                        </div>
                        <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                            <div class="form-group-input v2 mb-5">
                                <input type="email" id="email_address" name="email_address" class="form-control" autocomplete="off"
                                    data-auto-focus="true" required="">
                                <label for="email_address" class="input-label">Email Address</label>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Back</button>
                        <button type="button" class="btn ah-cta-btn next" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Get Started</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-02">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">What's your phone number?</h1>
                        </div>
                        <div class="form-group-input v2 mb-5">
							<input type="tel" id="phone_number" name="phone_number" class="form-control"
								autocomplete="off" data-auto-focus="true" placeholder="(xxx) xxx-xxxx" maxlength="14"
								required="" style="text-align: center;">
							<label for="phone_number" class="input-label">Phone number</label>
						</div>
                        <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Back</button>
                        <button type="submit"
                         class="btn ah-cta-btn next" style="font-size: 20px;pointer-events: auto;font-weight: 400 !important;font-style: normal !important;font-family: Montserrat !important;color: rgb(255, 255, 255) !important;border-color: rgb(37, 219, 128) !important;border-width: 1px !important;background: rgb(37, 219, 128) !important;border-radius: 36px !important;box-shadow: rgba(0, 0, 0, 0.2) 0px 26px 13px -10px !important;">Submit</button>
                    </fieldset>
                    <div class="mb-5">
                        <span style="font-weight:bold;color:rgba(27, 30, 31, 1.00);font-size: 14px;line-height: 1.6;">We keep your information private, safe and secure</span>
                    </div>
                    <div class="py-5 mb-5" style="border-top: 1px solid rgba(0, 0, 0, 0.08);border-bottom: 1px solid rgba(0, 0, 0, 0.08);">
                        <span style="font-family: Montserrat; color: rgb(0, 0, 0);"><strong><span style="font-size: 14px;">No login or SSN required.&nbsp;</span></strong><strong><span style="font-size: 14px;">This will <u>NOT</u> affect your credit, and it takes less than 1 minute to complete!</span></strong></span>
                    </div>
                    <div><span style="font-family: Montserrat; color: rgb(43, 205, 117);"><strong>IMPORTANT PRIVACY NOTICE:&nbsp;</strong></span><span style="font-family: Montserrat; color: rgb(0, 0, 0);"><strong>YOUR INFORMATION WILL <u>NOT</u> BE SOLD TO MULTIPLE PARTIES&nbsp;</strong></span></div>
                    <div><br><span style="font-family: Montserrat; color: rgb(0, 0, 0);">Most online mortgage shopping experiences sell the information they collect to multiple mortgage lenders, banks, and other institutions.&nbsp;</span></div>
                    <br>
                    <div><span style="font-family: Montserrat; color: rgb(0, 0, 0);">We don't. You’ll get connected with a top Crush Commercial Advisor that’s licensed in your market, and YOU can decide the next steps from there.</span></div>
                    <div class="py-5 my-5" style="border-top: 1px solid rgba(0, 0, 0, 0.08);border-bottom: 1px solid rgba(0, 0, 0, 0.08);">
                        <span style="font-size: 12px; font-family: Montserrat; color: rgb(0, 0, 0);">IMPORTANT DISCLOSURES&nbsp;</span>
                        <div><span style="font-size: 12px; font-family: Montserrat; color: rgb(0, 0, 0);">Crush Commercial Loans is a tradename of Rebel Commercial, LLC,&nbsp;</span><span style="color: rgb(44, 130, 201);"><a href="https://www.nmlsconsumeraccess.org/EntityDetails.aspx/COMPANY/1137890" target="_blank" rel="noopener noreferrer"></a></span><span style="font-size: 12px; font-family: Montserrat; color: rgb(44, 130, 201);"><a href="https://www.nmlsconsumeraccess.org/" rel="noopener noreferrer" target="_blank">NMLS #282856</a></span><span style="font-size: 12px; font-family: Montserrat; color: rgb(0, 0, 0);">&nbsp;| This website is for demo purposes only</span></div>
                    </div>
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