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
    <title>Reverse Mortgage Leads</title>
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
            <section class="funnel-box-section-05">
                <form class="funnel-box-05" style="text-align: center;" action="../process_form.php" method="POST">
                    <input type="hidden" name="companyID" value="<?php echo isset($company_details['id']) ? $company_details['id'] : 'sentridocs'; ?>">
                    <input type="hidden" name="companySlug" value="<?php echo isset($company_details['company_slug']) ? $company_details['company_slug'] : 'sentridocs'; ?>">
                    <input type="hidden" name="form_type" value="reverse-mortgage">
                    <header class="funnel-box-header-05">
                        <div class="header__logo-05">
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
                                    echo '<a class="phone-number" href="tel:"'. $company_details['company_contact'] .' style="font-family: Montserrat;font-style: normal;font-size: 16px; font-weight: 800;color: rgb(255, 94, 13);">'.$company_details['company_contact'].'</a>';
                                    }
                                ?>
                            </span>
                        </div>
                    </header>
                    <fieldset class="funnel-content-section-05">
                            <h1 class="cta-message-heading" id="getfreeinsurancequotestext"><span
                                    style="font-family: Fjalla One; font-size:24px; color: rgba(25, 212, 168, 1.00);line-height:1.42857;">Get
                                    a Free, No Obligation Quote in Seconds</span></h1>
                            <div class="cta-description mb-4" id="getfreeratequotestext">
                                <span
                                    style="font-family: Montserrat; font-size:35px; color: rgba(255, 255, 255, 1.00);line-height:1.42857;">Find
                                    Out if a Reverse Mortgage Is Right For You</span>
                            </div>
                            <div class="froala-prview-size question-description-text ">
                                <p style="line-height: 1.15;"><span style="font-size: 26px;"
                                        class="font-family-added font-added">Use our FREE Reverse Mortgage Calculator to
                                        see how much cash you could unlock from your home's equity today!</span></p>
                            </div>

                            <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                                <div class="form-group-input v5 mb-5">
                                    <input type="text" id="zipcode_32" name="zipcode_32" class="form-control"
                                        autocomplete="off" data-auto-focus="true" required="">
                                    <label for="zipcode_32" class="input-label ">ZIP CODE</label>
                                </div>
                            </div>
                            <button type="button" class="btn ah-cta-btn next"
                                style="font-size: 47px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(37, 47, 232) !important; border-color: rgb(255, 255, 255) !important; border-width: 1px !important; background: rgb(255, 255, 255) !important; border-radius: 50rem !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important; pointer-events: auto;">Go</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-05">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">What stage of the hom purchasing process are you currently in?</h1>
                        </div>
                        <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                            <div class="form-group question__fields text-center">
                                <input id="purchasing-01" class="form-field" required="" type="radio" name="menu_01" value="An Existing Home">
                                <label for="purchasing-01" class="checkbox-button v5">
                                    <span class="fake-input border-0"></span>
                                    <span>An Existing Home</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="purchasing-02" class="form-field" required="" type="radio" name="menu_01" value="Home Purchase">
                                <label for="purchasing-02" class="checkbox-button v5">
                                    <span class="fake-input border-0"></span>
                                    <span>Home Purchase</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="purchasing-03" class="form-field" required="" type="radio" name="menu_01" value="Refinance My Reverse Mortgage">
                                <label for="purchasing-03" class="checkbox-button v5">
                                    <span class="fake-input border-0"></span>
                                    <span>Refinance My Reverse Mortgage</span>
                                </label>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(37, 47, 232) !important; border-color: rgb(255, 255, 255) !important; border-width: 1px !important; background: rgb(255, 255, 255) !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important; pointer-events: auto;;">Back</button>
                        <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(37, 47, 232) !important; border-color: rgb(255, 255, 255) !important; border-width: 1px !important; background: rgb(255, 255, 255) !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important; pointer-events: auto;;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-05">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">Great! What type of property will be used for this reverse mortgage?</h1>
                        </div>
                        <div class="checkbox-list-holder mb-4">
                            <div class="form-group question__fields text-center">
                                <input id="reverse-mortgage-01" class="form-field" required="" type="radio" name="menu_02" value="Single Family Home">
                                <label for="reverse-mortgage-01" class="checkbox-button v5">
                                    <span class="fake-input border-0"></span>
                                    <span>Single Family Home</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="reverse-mortgage-02" class="form-field" required="" type="radio" name="menu_02" value="Multi-Family Home">
                                <label for="reverse-mortgage-02" class="checkbox-button v5">
                                    <span class="fake-input border-0"></span>
                                    <span>Multi-Family Home</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="reverse-mortgage-03" class="form-field" required="" type="radio" name="menu_02" value="Condominium">
                                <label for="reverse-mortgage-03" class="checkbox-button v5">
                                    <span class="fake-input border-0"></span>
                                    <span>Condominium</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="reverse-mortgage-04" class="form-field" required="" type="radio" name="menu_02" value="Mobile/Manufactured Home">
                                <label for="reverse-mortgage-04" class="checkbox-button v5">
                                    <span class="fake-input border-0"></span>
                                    <span>Mobile/Manufactured Home</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="reverse-mortgage-05" class="form-field" required="" type="radio" name="menu_02" value="Other">
                                <label for="reverse-mortgage-05" class="checkbox-button v5">
                                    <span class="fake-input border-0"></span>
                                    <span>Other</span>
                                </label>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous"
                            style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(37, 47, 232) !important; border-color: rgb(255, 255, 255) !important; border-width: 1px !important; background: rgb(255, 255, 255) !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important; pointer-events: auto;;">Back</button>
                        <button type="button" class="btn ah-cta-btn next"
                            style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(37, 47, 232) !important; border-color: rgb(255, 255, 255) !important; border-width: 1px !important; background: rgb(255, 255, 255) !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important; pointer-events: auto;;">Get
                            Started</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-05">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">How long will you keep this property?</h1>
                        </div>
                        <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                            <div class="form-group question__fields text-center">
                                <input id="p1" class="form-field" required="" type="radio" name="menu_04" value="Less than 5 years">
                                <label for="p1" class="checkbox-button v5">
                                    <span class="fake-input border-0"></span>
                                    <span>Less than 5 years</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="p2" class="form-field" required="" type="radio" name="menu_04" value="5-10 years">
                                <label for="p2" class="checkbox-button v5">
                                    <span class="fake-input border-0"></span>
                                    <span>5-10 years</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="p3" class="form-field" required="" type="radio" name="menu_04" value="11-20 years">
                                <label for="p3" class="checkbox-button v5">
                                    <span class="fake-input border-0"></span>
                                    <span>11-20 years</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="p4" class="form-field" required="" type="radio" name="menu_04" value="Do not plan on moving again">
                                <label for="p4" class="checkbox-button v5">
                                    <span class="fake-input border-0"></span>
                                    <span>Do not plan on moving again</span>
                                </label>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(37, 47, 232) !important; border-color: rgb(255, 255, 255) !important; border-width: 1px !important; background: rgb(255, 255, 255) !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important; pointer-events: auto;;">Back</button>
                        <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(37, 47, 232) !important; border-color: rgb(255, 255, 255) !important; border-width: 1px !important; background: rgb(255, 255, 255) !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important; pointer-events: auto;;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-05">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">Please estimate the value of the property.<h1>
                        </div>
                        <div class="cash_wrapper wrapper mb-4">
                            <div class="cash_wrapper_number v5 mb-5 text-center">0 to <span
                                    class="cash_wrapper_value v5 mb-5 text-center">0</span></div>
                            <div class="cash_range mb-4">
                                <input type="range" min="0" max="1000000" value="0" name="menu_03" id="cash_range" class="v5" />
                            </div>
                            <div class="d-flex justify-content-between number-slider v5">
                                <span>0</span>
                                <span>$1M+</span>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(37, 47, 232) !important; border-color: rgb(255, 255, 255) !important; border-width: 1px !important; background: rgb(255, 255, 255) !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important; pointer-events: auto;;">Back</button>
                        <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(37, 47, 232) !important; border-color: rgb(255, 255, 255) !important; border-width: 1px !important; background: rgb(255, 255, 255) !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important; pointer-events: auto;;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-05">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">What is your current mortgage balance?<h1>
                        </div>
                        <div class="checkbox-list-holder mb-4">
                            <div class="form-group-select v5 mb-5">
                                <label for="zipcode_32" class="input-label">Reason For Reverse Mortgage</label>
                                <select class="form-select" name="reason" aria-label="Default select example">
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(37, 47, 232) !important; border-color: rgb(255, 255, 255) !important; border-width: 1px !important; background: rgb(255, 255, 255) !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important; pointer-events: auto;;">Back</button>
                        <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(37, 47, 232) !important; border-color: rgb(255, 255, 255) !important; border-width: 1px !important; background: rgb(255, 255, 255) !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important; pointer-events: auto;;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-05">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">For whom is this reverse mortgage?</h1>
                        </div>
                        <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                            <div class="form-group question__fields text-center">
                                <input id="p-01" class="form-field" required="" type="radio" name="menu_05" value="Myself">
                                <label for="p-01" class="checkbox-button v5">
                                    <span class="fake-input border-0"></span>
                                    <span>Myself</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="p-02" class="form-field" required="" type="radio" name="menu_05" value="Parent">
                                <label for="p-02" class="checkbox-button v5">
                                    <span class="fake-input border-0"></span>
                                    <span>Parent</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="p-03" class="form-field" required="" type="radio" name="menu_05" value="Sibling">
                                <label for="p-03" class="checkbox-button v5">
                                    <span class="fake-input border-0"></span>
                                    <span>Sibling</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="p-04" class="form-field" required="" type="radio" name="menu_05" value="Friend">
                                <label for="p-04" class="checkbox-button v5">
                                    <span class="fake-input border-0"></span>
                                    <span>Friend</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="p-05" class="form-field" required="" type="radio" name="menu_05" value="Client">
                                <label for="p-05" class="checkbox-button v5">
                                    <span class="fake-input border-0"></span>
                                    <span>Client</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="p-06" class="form-field" required="" type="radio" name="menu_05" value="Other">
                                <label for="p-06" class="checkbox-button v5">
                                    <span class="fake-input border-0"></span>
                                    <span>Other</span>
                                </label>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(37, 47, 232) !important; border-color: rgb(255, 255, 255) !important; border-width: 1px !important; background: rgb(255, 255, 255) !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important; pointer-events: auto;;">Back</button>
                        <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(37, 47, 232) !important; border-color: rgb(255, 255, 255) !important; border-width: 1px !important; background: rgb(255, 255, 255) !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important; pointer-events: auto;;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-05">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">Is this your first time purchasing a home?</h1>
                        </div>
                        <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                            <div class="form-group question__fields text-center">
                                <input id="purchasing-home-01" class="form-field" required="" type="radio" name="menu_06" value="Yes">
                                <label for="purchasing-home-01" class="checkbox-button v5">
                                    <span class="fake-input border-0"></span>
                                    <span>Yes</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="purchasing-home-02" class="form-field" required="" type="radio" name="menu_06" value="No">
                                <label for="purchasing-home-02" class="checkbox-button v5">
                                    <span class="fake-input border-0"></span>
                                    <span>No</span>
                                </label>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(37, 47, 232) !important; border-color: rgb(255, 255, 255) !important; border-width: 1px !important; background: rgb(255, 255, 255) !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important; pointer-events: auto;;">Back</button>
                        <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(37, 47, 232) !important; border-color: rgb(255, 255, 255) !important; border-width: 1px !important; background: rgb(255, 255, 255) !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important; pointer-events: auto;;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-05">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">What is your age?<h1>
                        </div>
                        <div class="cash_wrapper wrapper mb-4">
                            <div class="cash_wrapper_number v5 mb-5 text-center"><span
                                    class="cash_wrapper_value v5 mb-5 text-center">63</span> years</div>
                            <div class="cash_range mb-4">
                                <input type="range" min="0" max="1000000" value="0" name="cash_range" id="cash_range" class="v5" />
                            </div>
                            <div class="d-flex justify-content-between number-slider v5">
                                <span>Under 62 years</span>
                                <span>90+ years</span>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(37, 47, 232) !important; border-color: rgb(255, 255, 255) !important; border-width: 1px !important; background: rgb(255, 255, 255) !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important; pointer-events: auto;;">Back</button>
                        <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(37, 47, 232) !important; border-color: rgb(255, 255, 255) !important; border-width: 1px !important; background: rgb(255, 255, 255) !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important; pointer-events: auto;;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-05">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">What's your full name?</h1>
                        </div>
                        <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                            <div class="form-group-input v5 mb-5">
                                <input type="text" id="name" name="name" class="form-control"
                                    autocomplete="off" data-auto-focus="true" required="">
                                <label for="name" class="input-label ">Full Name</label>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(37, 47, 232) !important; border-color: rgb(255, 255, 255) !important; border-width: 1px !important; background: rgb(255, 255, 255) !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important; pointer-events: auto;;">Back</button>
                        <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(37, 47, 232) !important; border-color: rgb(255, 255, 255) !important; border-width: 1px !important; background: rgb(255, 255, 255) !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important; pointer-events: auto;;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-05">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">What's your email address?</h1>
                        </div>
                        <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                            <div class="form-group-input v5 mb-5">
                                <input type="email" id="email" name="email" class="form-control" autocomplete="off"
                                    data-auto-focus="true" required="">
                                <label for="email" class="input-label">Email Address</label>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(37, 47, 232) !important; border-color: rgb(255, 255, 255) !important; border-width: 1px !important; background: rgb(255, 255, 255) !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important; pointer-events: auto;;">Back</button>
                        <button type="button" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(37, 47, 232) !important; border-color: rgb(255, 255, 255) !important; border-width: 1px !important; background: rgb(255, 255, 255) !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important; pointer-events: auto;;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-05">
                        <div class="question__title">
                            <h1 class="question-heading-text mb-3">What's your phone number?</h1>
                        </div>
                        <div class="form-group-input v5 mb-5">
                            <input type="tel" id="phone_number" name="phone_number" class="form-control"
                                autocomplete="off" data-auto-focus="true" placeholder="(xxx) xxx-xxxx" maxlength="14"
                                required="" style="text-align: center;">
                            <label for="phone_number" class="input-label">Phone number</label>
                        </div>
                        <button type="submit" class="btn ah-cta-btn next" style="font-size: 20px; font-weight: 800 !important; font-style: normal !important; font-family: Montserrat !important; color: rgb(37, 47, 232) !important; border-color: rgb(255, 255, 255) !important; border-width: 1px !important; background: rgb(255, 255, 255) !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important; pointer-events: auto;;">Finish</button>
                    </fieldset>
                    <div class="mb-5">
                        <span style="color:rgba(182, 230, 164, 1.00);font-size: 14px;line-height: 1.6;"><span
                                style="color:#b4bbbc">Privacy &amp; Security Guaranteed</span></span>
                    </div>
                    <div style="text-align: left;padding: 0 5%;">
                        <span style="font-family: Montserrat; font-size: 22px; color: rgb(255, 255, 255);">
                            <strong>Reverse Mortgages: The Essentials</strong>
                        </span>
                        <span style="font-family: Montserrat; font-size: 20px; color: rgb(255, 255, 255);"><br><br>A
                            reverse mortgage is a unique financial tool tailored for homeowners aged 62 and above.
                            Unlike traditional mortgages that require monthly repayments, a reverse mortgage allows
                            homeowners to convert part of their home equity into tax-free cash, monthly income, or a
                            line of credit.&nbsp;</span> <br><br>
                        <span style="font-family: Montserrat; font-size: 20px; color: rgb(255, 255, 255);">The
                            homeowner isn't required to make monthly loan repayments, and the loan is repaid when
                            the homeowner sells the home, moves out, or passes away. It's a powerful way to leverage
                            the value you've built in your home over the years.</span>
                        <br>
                        <br>
                        <span style="font-family: Montserrat; font-size: 22px; color: rgb(255, 255, 255);">
                            <strong>Reverse Mortgages: The Essentials</strong>
                        </span>
                        <br>
                        <br>
                        <ul style="list-style-type: square;">
                            <li style="color: rgb(255, 255, 255);"><span
                                    style="font-family: Montserrat; font-size: 20px;"><strong>Financial
                                        Flexibility:&nbsp;</strong>Convert your home equity into cash, supplementing
                                    your retirement income.</span><br><br></li>
                            <li style="color: rgb(255, 255, 255);"><span
                                    style="font-family: Montserrat; font-size: 20px;"><strong>No Monthly Mortgage
                                        Payments:</strong> Free up your budget and alleviate financial
                                    stress.</span><br><br></li>
                            <li style="color: rgb(255, 255, 255);"><span
                                    style="font-family: Montserrat; font-size: 20px;"><strong>Stay in Your
                                        Home:&nbsp;</strong>Enjoy your retirement years in the comfort of your home,
                                    maintaining your ownership.</span><br><br></li>
                            <li style="color: rgb(255, 255, 255);"><span
                                    style="font-family: Montserrat; font-size: 20px;"><strong>Tax-Free
                                        Proceeds:&nbsp;</strong>The funds you receive aren't considered income;
                                    thus, they're tax-free.<br></span></li>
                        </ul>
                        <br>
                        <br>
                        <hr>
                    </div>
                    <br>
                    <div style="padding: 0 5%;">
                        <div style="font-family: Montserrat; font-size: 22px; color: rgb(255, 255, 255);">
                            <strong>See If You're Eligible for a Reverse Mortgage Now!</strong>
                        </div>
                        <br>
                        <span style="font-size: 24px; font-family: Montserrat;" class="">
                            <a class="za_cta_style" href="#top"
                                style="padding: 10px 20px;display: inline-block;font-weight: 800 !important;font-style: normal !important;font-family: Montserrat !important;color: rgba(37,47,232,1) !important;border-color: rgba(255,255,255,1) !important;border-width: 1px !important;background: rgba(255,255,255,1) !important;border-radius: 36px !important;box-shadow: 0px 16px 13px -10px rgba(0, 0, 0, 0.2) !important;">Check
                                My Eligibility</a></span>
                        <br>
                        <br>
                        <div style="font-size: 16px; font-family: Montserrat;"><em><span
                                    style="color: rgb(255, 255, 255);">This takes less than 1 minute to
                                    complete!</span></em></div>
                        <br>
                    </div>
                    <div style="text-align: left;padding: 0 5%;">
                        <hr>
                        <br>
                        <span style="font-family: Montserrat; font-size: 22px; color: rgb(255, 255, 255);">
                            <strong>Considerations Before Choosing a Reverse Mortgage
                            </strong>
                        </span>
                        <br>
                        <br>
                        <ul style="list-style-type: square;">
                            <li style="color: rgb(255, 255, 255);"><span
                                    style="font-family: Montserrat; font-size: 20px;"><strong>Accruing
                                        Interest:&nbsp;</strong>As you're not making payments, interest accrues over
                                    time, which can reduce your home's equity.</span><br><br></li>
                            <li style="color: rgb(255, 255, 255);"><span
                                    style="font-family: Montserrat; font-size: 20px;"><strong>Long-term
                                        Implications:</strong> It's essential to understand how a reverse mortgage
                                    might affect your heirs or estate.</span><br><br></li>
                            <li style="color: rgb(255, 255, 255);"><span
                                    style="font-family: Montserrat; font-size: 20px;"><strong>Potential
                                        Fees:</strong> Just like traditional mortgages, there can be fees or closing
                                    costs associated with the loan.<br></span></li>
                        </ul>
                        <br>
                        <br>
                        <div><span
                                style="font-family: Montserrat; font-size: 22px; color: rgb(255, 255, 255);"><strong>Dispelling
                                    Reverse Mortgage Myths</strong></span><span
                                style="font-family: Montserrat; font-size: 20px; color: rgb(255, 255, 255);"><br><br><strong>Myth:&nbsp;</strong>The
                                lender can take your home.<br><em>Fact:&nbsp;</em>You retain the title and ownership
                                of your home. Lenders can't take your property as long as you meet the loan's
                                obligations, like maintaining the home and paying property
                                taxes.<br><br><strong>Myth:&nbsp;</strong>Your heirs will be burdened with loan
                                repayment.<br><em>Fact:&nbsp;</em>Heirs will never owe more than the home's value.
                                If the home sells for more than the owed amount, the extra funds go to the
                                heirs.<br><br></span></div>
                        <hr>
                        <br>
                    </div>
                    <div style="padding: 0 5%;">
                        <div style="font-family: Montserrat; font-size: 22px; color: rgb(255, 255, 255);">
                            <strong>See how much cash you could unlock from your home's equity with our reverse
                                mortgage calculator today!
                            </strong>
                        </div>
                        <br>
                        <span style="font-size: 24px; font-family: Montserrat;" class="">
                            <a class="za_cta_style" href="#top"
                                style="padding: 10px 20px;display: inline-block;font-weight: 800 !important;font-style: normal !important;font-family: Montserrat !important;color: rgba(37,47,232,1) !important;border-color: rgba(255,255,255,1) !important;border-width: 1px !important;background: rgba(255,255,255,1) !important;border-radius: 36px !important;box-shadow: 0px 16px 13px -10px rgba(0, 0, 0, 0.2) !important;">What
                                Can I Get?</a></span>
                        <br>
                        <br>
                        <div style="font-size: 16px; font-family: Montserrat;"><em><span
                                    style="color: rgb(255, 255, 255);">It's FREE, and there's no SSN or login
                                    required!</span></em></div>
                        <br>
                    </div>
                    <div style="text-align: left;padding: 0 5%;">
                        <span style="font-family: Montserrat; font-size: 22px; color: rgb(255, 255, 255);"><strong>FAQs
                                about Reverse Mortgages</strong></span><span
                            style="font-family: Montserrat; font-size: 20px; color: rgb(255, 255, 255);"><br><br><strong>Can
                                I lose my home under a reverse mortgage?</strong><br><u>Answer</u>: No, as long as
                            you comply with the loan terms like paying property taxes, maintaining home insurance,
                            and keeping the property in good condition.<br><br><strong>How can I use the funds from
                                a reverse mortgage?</strong><br><u>Answer</u>: There are no restrictions! You can
                            use the funds for medical expenses, home improvements, travel, or any other
                            purpose.<br><br><strong>Will a reverse mortgage affect my Social Security or Medicare
                                benefits?</strong><br><u>Answer</u>: Typically, no. However, it might impact
                            Medicaid or other state or federal assistance programs. Always consult with a financial
                            advisor.<br><br><strong>Do I need good credit for a reverse
                                mortgage?</strong><br><u>Answer</u>: Credit history is considered, but it's not the
                            sole determining factor. The focus is more on your home equity and its
                            value.<br><br><strong>What happens if the loan balance exceeds my home's
                                value?</strong><br><u>Answer</u>: You or your heirs are never obligated to pay back
                            more than the home's value. Any shortfall is covered by the FHA insurance on the
                            loan.<br><br>A reverse mortgage can be an instrumental tool in retirement planning. As
                            with any financial product, understanding its nuances and consulting with professionals
                            ensures you make the most informed choice.</span>
                        <hr>
                        <br>
                    </div>
                    <div style="padding: 0 5%;">
                        <div style="font-family: Montserrat; font-size: 22px; color: rgb(255, 255, 255);">
                            <strong>Get Your Reverse Mortgage Quote Now

                            </strong>
                        </div>
                        <br>
                        <span style="font-size: 24px; font-family: Montserrat;" class="">
                            <a class="za_cta_style" href="#top"
                                style="padding: 10px 20px;display: inline-block;font-weight: 800 !important;font-style: normal !important;font-family: Montserrat !important;color: rgba(37,47,232,1) !important;border-color: rgba(255,255,255,1) !important;border-width: 1px !important;background: rgba(255,255,255,1) !important;border-radius: 36px !important;box-shadow: 0px 16px 13px -10px rgba(0, 0, 0, 0.2) !important;">Get
                                My Quote</a></span>
                        <br>
                        <br>
                        <div style="font-size: 16px; font-family: Montserrat;"><em><span style="color: rgb(255, 255, 255);">We keep your information private, safe, and secure! </span></em></div>
                        <br>
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

                sliderEl.style.background = `linear-gradient(to right, #fff ${progress}%, #FF5E0D ${progress}%)`;
            })
        }
    </script>
</body>

</html>