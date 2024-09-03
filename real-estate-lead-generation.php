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
    <title>Real Estate Lead Generation Form</title>
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
    <link rel="stylesheet" href="../assets/css/restyle.css">
</head>

<body>
    <div>
        <main>
            <section class="funnel-box-section-01">
                <video class="background-video-01" width="100%" height="auto" autoplay muted playsinline loop>
                    <source
                        src="https://res.cloudinary.com/luxuryp/videos/f_auto:video,q_auto/qiw2umbyrkjxqi4jhuri/websitevidfinal_2_2.mp4"
                        type="video/mp4">
                </video>

                <form class="funnel-box-01" style="text-align: center;" id="va-loan-form" action="../process_form.php" method="POST">
					<input type="hidden" name="companyID" value="<?php echo isset($company_details['id']) ? $company_details['id'] : 'sentridocs'; ?>">
                    <input type="hidden" name="companySlug" value="<?php echo isset($company_details['company_slug']) ? $company_details['company_slug'] : 'sentridocs'; ?>">
					<input type="hidden" name="form_type" value="real-estate-lead">
                    <div class="header__logo-01">
                        <?php 
                            if(!empty($company_details['company_logo'])) {
                                echo '<img class="logo_img" src="../'.$company_details['company_logo'].'" alt="rebel IQ">';
                            } else {
                                echo '<img class="logo_img" src="../assets/img/logo-dark.png" alt="Company Logo" style="max-width: 200px;">';
                            }
                        ?>
                    </div>
                    <fieldset class="funnel-content-section-01">
                        <h1 class="cta-message-heading" id="getfreeinsurancequotestext"><span
                                style="font-family: Montserrat; font-size: 66px; color: rgb(255, 255, 255); line-height: 1;font-weight: 400;">BUYING
                                &amp; SELLING HAS NEVER BEEN SO CONVENIENT</span></h1>
                        <div class="cta-description" id="getfreeratequotestext" style="margin-bottom: 24px;">
                            <span
                                style="font-family: Nunito; font-size: 24px; color: rgb(0, 179, 255); line-height: 1.5;">Now,
                                everything you need to successfully buy or sell your San Diego home is on one platform.
                                Just answer a few quick questions to see how we can help you.</span>
                        </div>
                        <div class="question-preview-parent__title">
                            <h1 data-question-title="Which of these best describes your needs?"
                                class="froala-prview-size question-heading-text ">
                                <p><span style="color: rgb(255, 255, 255);"><span
                                            style="font-family: Nunito; font-size: 24px;"
                                            class="font-family-added font-added">Which of these best describes your
                                            needs?</span></span></p>
                                <p><br></p>
                            </h1>
                        </div>
                        <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                            <div class="form-group question__fields text-center">
                                <input id="buying_field" class="form-field" required="" type="radio" name="user_needs"
                                    value="I'm Buying">
                                <label for="buying_field" class="checkbox-button v1">
                                    <span class="fake-input border-0"></span>
                                    <span>I'm Buying</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="selling_field" class="form-field" required="" type="radio" name="user_needs"
                                    value="I'm Selling">
                                <label for="selling_field" class="checkbox-button v1">
                                    <span class="fake-input border-0"></span>
                                    <span>I'm Selling</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="buying_selling" class="form-field" required="" type="radio" name="user_needs"
                                    value="I'm Buying & Selling">
                                <label for="buying_selling" class="checkbox-button v1">
                                    <span class="fake-input border-0"></span>
                                    <span>I'm Buying & Selling</span>
                                </label>
                            </div>
                        </div>
                        <!-- <button type="button" class="btn ah-cta-btn previous"
                            style="font-size: 20px; font-weight: 800 !important; font-family: Nunito; color: #000 !important; border-color: #fff !important; border-width: 1px !important; background: #fff !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important;margin: 0 5px;">Back</button> -->
                        <button type="button" class="btn ah-cta-btn next"
                            style="font-size: 20px; font-weight: 800 !important; font-family: Nunito; color: #000 !important; border-color: #fff !important; border-width: 1px !important; background: #fff !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important;margin: 0 5px;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-01">
                        <div class="question-preview-parent__title">
                            <h1 class="froala-prview-size question-heading-text ">
                                <p style="line-height: 1;"><span style="font-family: Montserrat;"
                                        class="font-family-added">What is the city or zip code of the home you are
                                        looking to sell?</span></p>
                            </h1>
                        </div>
                        <div class="froala-prview-size question-description-text ">
                            <p style="line-height: 1;"><span style="font-family: Nunito;" class="font-family-added">In
                                    many areas, our exclusive investors are able to make you an offer directly.</span>
                            </p>
                        </div>
                        <div class="form-group-input v1 mb-5">
                            <input type="text" id="home_location" name="home_location" class="form-control" autocomplete="off"
                                data-auto-focus="true" required="">
                            <label for="home_location" class="input-label">CITY OR ZIP CODE</label>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous"
                            style="font-size: 20px; font-weight: 800 !important; font-family: Nunito; color: #000 !important; border-color: #fff !important; border-width: 1px !important; background: #fff !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important;margin: 0 5px;">Back</button>
                        <button type="button" class="btn ah-cta-btn next"
                            style="font-size: 20px; font-weight: 800 !important; font-family: Nunito; color: #000 !important; border-color: #fff !important; border-width: 1px !important; background: #fff !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important;margin: 0 5px;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-01">
                        <div class="question-preview-parent__title mb-3">
                            <h1 data-question-title="What is your street address?" class="froala-prview-size question-heading-text ">
                                <p><span style="font-family: Montserrat;" class="font-family-added">What is your street
                                        address?</span></p>
                            </h1>
                            <div class="address-fields-area">
                                <div class="form-group-input v1">
                                    <input type="text" id="street_address" name="street_address" class="form-control" autocomplete="off" data-auto-focus="true" required="">
                                    <label for="street_address" class="input-label">ENTER YOUR ADDRESS</label>
                                </div>
                                <div class="form-group-input v1">
                                    <input type="text" id="unit_number" name="unit_number" class="form-control" autocomplete="off" data-auto-focus="true" required="">
                                    <label for="unit_number" class="input-label">UNIT #</label>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous"
                            style="font-size: 20px; font-weight: 800 !important; font-family: Nunito; color: #000 !important; border-color: #fff !important; border-width: 1px !important; background: #fff !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important;margin: 0 5px;">Back</button>
                        <button type="button" class="btn ah-cta-btn next"
                            style="font-size: 20px; font-weight: 800 !important; font-family: Nunito; color: #000 !important; border-color: #fff !important; border-width: 1px !important; background: #fff !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important;margin: 0 5px;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-01">
                        <div class="question__title">
                            <h1 class="question-heading-text text-center text-white mb-4">
                                <strong>What type of home are you looking to buy?</strong>
                            </h1>
                        </div>
                        <div class="checkbox-list-holder mb-4">
                            <div class="form-group question__fields text-center">
                                <input id="SingleFamilyHome" class="form-field" required="" type="radio" name="home_type"
                                    value="Single Family Home">
                                <label for="SingleFamilyHome" class="checkbox-button v1">
                                    <span class="fake-input border-0"></span>
                                    <span>Single Family Home</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="TownHome" class="form-field" required="" type="radio" name="home_type"
                                    value="Town Home">
                                <label for="TownHome" class="checkbox-button v1">
                                    <span class="fake-input border-0"></span>
                                    <span>Town Home</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="Mobile/Manufactured" class="form-field" required="" type="radio" name="home_type" value="Mobile/Manufactured">
                                <label for="Mobile/Manufactured" class="checkbox-button v1">
                                    <span class="fake-input border-0"></span>
                                    <span>Mobile/Manufactured</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="Condominium" class="form-field" required="" type="radio" name="home_type"
                                    value="Condominium">
                                <label for="Condominium" class="checkbox-button v1">
                                    <span class="fake-input border-0"></span>
                                    <span>Condominium</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="Land" class="form-field" required="" type="radio" name="home_type" value="Land">
                                <label for="Land" class="checkbox-button v1">
                                    <span class="fake-input border-0"></span>
                                    <span>Land</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="OtherForLand" class="form-field" required="" type="radio" name="home_type"
                                    value="OtherLand">
                                <label for="OtherForLand" class="checkbox-button v1">
                                    <span class="fake-input border-0"></span>
                                    <span>Other</span>
                                </label>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous"
                            style="font-size: 20px; font-weight: 800 !important; font-family: Nunito; color: #000 !important; border-color: #fff !important; border-width: 1px !important; background: #fff !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important;margin: 0 5px;">Back</button>
                        <button type="button" class="btn ah-cta-btn next"
                            style="font-size: 20px; font-weight: 800 !important; font-family: Nunito; color: #000 !important; border-color: #fff !important; border-width: 1px !important; background: #fff !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important;margin: 0 5px;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-01">
                        <div class="question-preview-parent__title">
                            <h1 data-question-title="How much do you plan to spend on your new home?"
                                class="froala-prview-size question-heading-text ">
                                <p style="line-height: 1;"><span style="font-family: Montserrat;"
                                        class="font-family-added">How much do you plan to spend on your new home?</span>
                                </p>
                            </h1>
                        </div>
                        <div class="froala-prview-size question-description-text ">
                            <p><span style="font-family: Nunito; color: rgb(26, 188, 156);"
                                    class="font-family-added">(it's ok to estimate)</span></p>
                        </div>

                        <div class="cash_wrapper wrapper mb-4">
                            <div class="cash_wrapper_number v1 mb-5 text-center">0 to <span
                                    class="cash_wrapper_value v1 mb-5 text-center">0</span></div>
                            <div class="cash_range mb-4">
                                <input type="range" name="planned_spending" min="0" max="1000000" value="0" id="cash_range" />
                            </div>
                            <div class="d-flex justify-content-between number-slider v1">
                                <span>0</span>
                                <span>$1M+</span>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous"
                            style="font-size: 20px; font-weight: 800 !important; font-family: Nunito; color: #000 !important; border-color: #fff !important; border-width: 1px !important; background: #fff !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important;margin: 0 5px;">Back</button>
                        <button type="button" class="btn ah-cta-btn next"
                            style="font-size: 20px; font-weight: 800 !important; font-family: Nunito; color: #000 !important; border-color: #fff !important; border-width: 1px !important; background: #fff !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important;margin: 0 5px;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-01">
                        <div class="question-preview-parent__title">
                            <h1 data-question-title="When do you plan to buy?"
                                class="froala-prview-size question-heading-text ">
                                <span style="font-family: Montserrat;" class="font-family-added">When do you plan to
                                    buy?</span>
                            </h1>
                        </div>
                        <div class="froala-prview-size question-description-text "><span style="font-family: Nunito;"
                                class="font-family-added">Please tell us your ideal timeline for closing on your new
                                home.</span></div>
                        <div class="checkbox-list-holder mb-4">
                            <div class="form-group question__fields text-center">
                                <input id="ASAP-01" class="form-field" required="" type="radio" name="buying_timeline"
                                    value="ASAP">
                                <label for="ASAP-01" class="checkbox-button v1">
                                    <span class="fake-input border-0"></span>
                                    <span>ASAP</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="30Months" class="form-field" required="" type="radio" name="buying_timeline"
                                    value="0-3 Months">
                                <label for="30Months" class="checkbox-button v1">
                                    <span class="fake-input border-0"></span>
                                    <span>0-3 Months</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="4-6Months" class="form-field" required="" type="radio" name="buying_timeline"
                                    value="4-6 Months">
                                <label for="4-6Months" class="checkbox-button v1">
                                    <span class="fake-input border-0"></span>
                                    <span>4-6 Months</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="7-12Months" class="form-field" required="" type="radio" name="buying_timeline"
                                    value="7-12 Months">
                                <label for="7-12Months" class="checkbox-button v1">
                                    <span class="fake-input border-0"></span>
                                    <span>7-12 Months</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="12Months+" class="form-field" required="" type="radio" name="buying_timeline"
                                    value="12+ Months">
                                <label for="12Months+" class="checkbox-button v1">
                                    <span class="fake-input border-0"></span>
                                    <span>12+ Months</span>
                                </label>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous"
                            style="font-size: 20px; font-weight: 800 !important; font-family: Nunito; color: #000 !important; border-color: #fff !important; border-width: 1px !important; background: #fff !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important;margin: 0 5px;">Back</button>
                        <button type="button" class="btn ah-cta-btn next"
                            style="font-size: 20px; font-weight: 800 !important; font-family: Nunito; color: #000 !important; border-color: #fff !important; border-width: 1px !important; background: #fff !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important;margin: 0 5px;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-01">
                        <div class="question-preview-parent__title">
                            <h1 data-question-title="Where are you in the buying process?"
                                class="froala-prview-size question-heading-text "><span style="font-family: Montserrat;"
                                    class="font-family-added">Where are you in the buying process?</span></h1>
                        </div>
                        <div class="froala-prview-size question-description-text "><span
                                style="font-family: Nunito; color: rgb(26, 188, 156);" class="font-family-added">(please
                                check all that apply)</span></div>
                        <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                            <div class="form-group question__fields text-center">
                                <input id="buying-process-01" class="form-field" required="" type="radio" name="buying_process"
                                    value="I’ve already hired an agent">
                                <label for="buying-process-01" class="checkbox-button v1">
                                    <span class="fake-input border-0"></span>
                                    <span>I’ve already hired an agent</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="buying-process-02" class="form-field" required="" type="radio" name="buying_process"
                                    value="I’m already approved for a home loan">
                                <label for="buying-process-02" class="checkbox-button v1">
                                    <span class="fake-input border-0"></span>
                                    <span>I’m already approved for a home loan</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="buying-process-03" class="form-field" required="" type="radio" name="buying_process"
                                    value="I’m already making offers">
                                <label for="buying-process-03" class="checkbox-button v1">
                                    <span class="fake-input border-0"></span>
                                    <span>I’m already making offers</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="buying-process-04" class="form-field" required="" type="radio" name="buying_process"
                                    value="None of the above">
                                <label for="buying-process-04" class="checkbox-button v1">
                                    <span class="fake-input border-0"></span>
                                    <span>None of the above</span>
                                </label>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous"
                            style="font-size: 20px; font-weight: 800 !important; font-family: Nunito; color: #000 !important; border-color: #fff !important; border-width: 1px !important; background: #fff !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important;margin: 0 5px;">Back</button>
                        <button type="button" class="btn ah-cta-btn next"
                            style="font-size: 20px; font-weight: 800 !important; font-family: Nunito; color: #000 !important; border-color: #fff !important; border-width: 1px !important; background: #fff !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important;margin: 0 5px;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-01">
                        <div class="question-preview-parent__title">
                            <h1 data-question-title="Where are you in the buying process?"
                                class="froala-prview-size question-heading-text "><span style="font-family: Montserrat;"
                                    class="font-family-added">Do you currently own a home? </span></h1>
                        </div>
                        <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                            <div class="form-group question__fields text-center">
                                <input id="own-home-01" class="form-field" required="" type="radio" name="current_home_status"
                                    value="Yes, I currently own a home">
                                <label for="own-home-01" class="checkbox-button v1">
                                    <span class="fake-input border-0"></span>
                                    <span>Yes, I currently own a home</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="own-home-02" class="form-field" required="" type="radio" name="current_home_status"
                                    value="No, I am currently renting">
                                <label for="own-home-02" class="checkbox-button v1">
                                    <span class="fake-input border-0"></span>
                                    <span>No, I am currently renting</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="own-home-03" class="form-field" required="" type="radio" name="current_home_status"
                                    value="No, I have other living arrangements">
                                <label for="own-home-03" class="checkbox-button v1">
                                    <span class="fake-input border-0"></span>
                                    <span>No, I have other living arrangements</span>
                                </label>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous"
                            style="font-size: 20px; font-weight: 800 !important; font-family: Nunito; color: #000 !important; border-color: #fff !important; border-width: 1px !important; background: #fff !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important;margin: 0 5px;">Back</button>
                        <button type="button" class="btn ah-cta-btn next"
                            style="font-size: 20px; font-weight: 800 !important; font-family: Nunito; color: #000 !important; border-color: #fff !important; border-width: 1px !important; background: #fff !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important;margin: 0 5px;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-01">
                        <div class="question-preview-parent__title">
                            <h1 data-question-title="Where are you in the buying process?"
                                class="froala-prview-size question-heading-text "><span style="font-family: Montserrat;"
                                    class="font-family-added">Do you plan to sell your current home?</span></h1>
                        </div>
                        <div class="froala-prview-size question-description-text "><span style="font-family: Nunito;"
                                class="font-family-added">We have a great way to help you seamlessly buy and sell at the
                                same time.</span></div>
                        <div class="checkbox-list-holder mb-4 flex-column align-items-center">
                            <div class="form-group question__fields text-center">
                                <input id="current-home-01" class="form-field" required="" type="radio" name="plan_to_sell"
                                    value="Yes">
                                <label for="current-home-01" class="checkbox-button v1">
                                    <span class="fake-input border-0"></span>
                                    <span>Yes</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="current-home-02" class="form-field" required="" type="radio" name="plan_to_sell"
                                    value="No">
                                <label for="current-home-02" class="checkbox-button v1">
                                    <span class="fake-input border-0"></span>
                                    <span>No</span>
                                </label>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous"
                            style="font-size: 20px; font-weight: 800 !important; font-family: Nunito; color: #000 !important; border-color: #fff !important; border-width: 1px !important; background: #fff !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important;margin: 0 5px;">Back</button>
                        <button type="button" class="btn ah-cta-btn next"
                            style="font-size: 20px; font-weight: 800 !important; font-family: Nunito; color: #000 !important; border-color: #fff !important; border-width: 1px !important; background: #fff !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important;margin: 0 5px;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-01">
                        <div class="question-preview-parent__title">
                            <h1 data-question-title="What is your current credit score?"
                                class="froala-prview-size question-heading-text "><span style="font-family: Montserrat;"
                                    class="font-family-added">What is your current credit score?</span></h1>
                        </div>
                        <div class="froala-prview-size question-description-text "><span
                                style="color: rgb(26, 188, 156); font-family: Nunito;" class="font-family-added">(it's
                                ok to estimate)</span></div>
                        <div class="checkbox-list-holder mb-4">
                            <div class="form-group question__fields text-center">
                                <input id="Excellent720+" class="form-field" required="" type="radio" name="credit_score"
                                    value="Excellent (720+)">
                                <label for="Excellent720+" class="checkbox-button v1">
                                    <span class="fake-input border-0"></span>
                                    <span>Excellent (720+)</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="Good" class="form-field" required="" type="radio" name="credit_score"
                                    value="Good (680-719)">
                                <label for="Good" class="checkbox-button v1">
                                    <span class="fake-input border-0"></span>
                                    <span>Good (680-719)</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="Fair" class="form-field" required="" type="radio" name="credit_score"
                                    value="Fair (640-679)">
                                <label for="Fair" class="checkbox-button v1">
                                    <span class="fake-input border-0"></span>
                                    <span>Fair (640-679)</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="BelowAverage" class="form-field" required="" type="radio" name="credit_score"
                                    value="Below Average (620-639)">
                                <label for="BelowAverage" class="checkbox-button v1">
                                    <span class="fake-input border-0"></span>
                                    <span>Below Average (620-639)</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="Poor" class="form-field" required="" type="radio" name="credit_score"
                                    value="Poor (Below 620)">
                                <label for="Poor" class="checkbox-button v1">
                                    <span class="fake-input border-0"></span>
                                    <span>Poor (Below 620)</span>
                                </label>
                            </div>
                            <div class="form-group question__fields text-center">
                                <input id="I_dont_Know" class="form-field" required="" type="radio" name="credit_score"
                                    value="I don't Know">
                                <label for="I_dont_Know" class="checkbox-button v1">
                                    <span class="fake-input border-0"></span>
                                    <span>I don't Know</span>
                                </label>
                            </div>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous"
                            style="font-size: 20px; font-weight: 800 !important; font-family: Nunito; color: #000 !important; border-color: #fff !important; border-width: 1px !important; background: #fff !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important;margin: 0 5px;">Back</button>
                        <button type="button" class="btn ah-cta-btn next"
                            style="font-size: 20px; font-weight: 800 !important; font-family: Nunito; color: #000 !important; border-color: #fff !important; border-width: 1px !important; background: #fff !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important;margin: 0 5px;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-01">
                        <div class="question-preview-parent__title">
                            <h1 data-question-title="What's your full name?"
                                class="froala-prview-size question-heading-text ">What's your full name?</h1>
                        </div>
                        <div class="form-group-input v1 mb-5">
                            <input type="text" id="name" name="full_name" class="form-control" autocomplete="off"
                                data-auto-focus="true" required="">
                            <label for="full_name" class="input-label">Full Name</label>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous"
                            style="font-size: 20px; font-weight: 800 !important; font-family: Nunito; color: #000 !important; border-color: #fff !important; border-width: 1px !important; background: #fff !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important;margin: 0 5px;">Back</button>
                        <button type="button" class="btn ah-cta-btn next"
                            style="font-size: 20px; font-weight: 800 !important; font-family: Nunito; color: #000 !important; border-color: #fff !important; border-width: 1px !important; background: #fff !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important;margin: 0 5px;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-01">
                        <div class="question__title">
                            <h1 class="question-heading-text text-center text-white mb-4">
                                <strong>What's your email address?</strong>
                            </h1>
                        </div>
                        <div class="form-group-input v1 mb-5">
                            <input type="email" id="email" name="email_address" class="form-control" autocomplete="off"
                                data-auto-focus="true" required="">
                            <label for="email_address" class="input-label">Email Address</label>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous"
                            style="font-size: 20px; font-weight: 800 !important; font-family: Nunito; color: #000 !important; border-color: #fff !important; border-width: 1px !important; background: #fff !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important;margin: 0 5px;">Back</button>
                        <button type="button" class="btn ah-cta-btn next"
                            style="font-size: 20px; font-weight: 800 !important; font-family: Nunito; color: #000 !important; border-color: #fff !important; border-width: 1px !important; background: #fff !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important;margin: 0 5px;">Continue</button>
                    </fieldset>
                    <fieldset class="funnel-content-section-01">
                        <div class="question-preview-parent__title">
                            <h1 data-question-title="What's your full name?"
                                class="froala-prview-size question-heading-text ">What's your full name?</h1>
                        </div>
                        <div class="form-group-input v1 mb-5">
                            <input type="tel" id="phone_number" name="phone_number" class="form-control"
                                autocomplete="off" data-auto-focus="true" placeholder="(xxx) xxx-xxxx" maxlength="14"
                                required="" style="text-align: center;">
                            <label for="phone_number" class="input-label">Phone number</label>
                        </div>
                        <button type="button" class="btn ah-cta-btn previous"
                            style="font-size: 20px; font-weight: 800 !important; font-family: Nunito; color: #000 !important; border-color: #fff !important; border-width: 1px !important; background: #fff !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important;margin: 0 5px;">Back</button>
                        <button type="submit" class="btn ah-cta-btn next"
                            style="font-size: 20px; font-weight: 800 !important; font-family: Nunito; color: #000 !important; border-color: #fff !important; border-width: 1px !important; background: #fff !important; border-radius: 36px !important; box-shadow: rgba(0, 0, 0, 0.2) 0px 16px 13px -10px !important;margin: 0 5px;">I'm
                            Finished</button>
                    </fieldset>
                    <span style="color:rgba(240, 240, 240, 1.00);font-size: 14px;line-height: 1.6;">We keep your
                        information private, safe, and secure</span>
                    <div class="footer__info primary-footer-area" style="padding-top: 80px;margin-bottom: 10px;">
                        <ul class="footer-links" style="font-size: 15px;line-height: 19px;display: flex;justify-content: center;list-style-type: none;padding: 0;gap: 20px;">
                            <li style="border-color: rgba(209, 209, 209, 1.00)"><a class="bottomlinksmodal"
                                    style="color: rgba(209, 209, 209, 1.00)" title=" Privacy Policy"href="#">
                                    Privacy Policy</a></li>
                                    <li style="color: rgba(209, 209, 209, 1.00);">|</li>
                            <li style="border-color: rgba(209, 209, 209, 1.00)"><a class="bottomlinksmodal"
                                    style="color: rgba(209, 209, 209, 1.00)" title="Terms of Use" href="#">Terms of
                                    Use</a></li>
                        </ul>
                    </div>
                    <ul class="footer-links" style="font-size: 15px;line-height: 19px;display: flex;list-style-type: none;padding: 0 40px 20px;gap: 20px;">
                        <li style="color: rgba(209, 209, 209, 1.00);">© 2023 Compass Real Estate of San Diego</li>
                    </ul>
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

                sliderEl.style.background = `linear-gradient(to right, #fff ${progress}%, #00101c ${progress}%)`;
            })
        }
    </script>
</body>

</html>