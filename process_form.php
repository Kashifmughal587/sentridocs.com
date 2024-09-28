<?php
    try {
        require 'assets/fpdf/fpdf.php';
        require 'assets/db/db_connection.php';
        require 'assets/vendor/autoload.php';

        // use PHPMailer\PHPMailer\PHPMailer;
        // use PHPMailer\PHPMailer\Exception;

        function generatePDF($data) {
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 16);

            $pdf->Cell(0, 10, 'Lead Generation Form', 0, 1, 'C');
            $pdf->Ln(10);

            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(40, 10, 'Field', 1);
            $pdf->Cell(100, 10, 'Value', 1);
            $pdf->Ln();

            $pdf->SetFont('Arial', '', 12);
            foreach ($data as $key => $value) {
                $pdf->Cell(40, 10, ucfirst(str_replace('_', ' ', $key)), 1);
                $pdf->Cell(100, 10, $value, 1);
                $pdf->Ln();
            }

            $pdf_path = 'submission.pdf';
            if (file_exists($pdf_path)) {
                unlink($pdf_path);
            }
            $pdf->Output($pdf_path, 'F');
        }

        function insertFormData($data, $form_type) {
            global $conn;

            $columns = implode(", ", array_keys($data));
            $values = "'" . implode("', '", $data) . "'";

            // echo "Hello 2";
            // echo "<pre>";
            // print_r($data);
            // print_r($columns);
            // print_r($values);
            // echo "</pre>";
            // die();

            switch($form_type){
                case "refinance":
                    $sql = "INSERT INTO mortgage_leads ($columns) VALUES ($values)";
                    break;
                case "va-loan-leads":
                    $sql = "INSERT INTO va_loan_eligibility ($columns) VALUES ($values)";
                    break;
                case "real-estate-lead":
                    $sql = "INSERT INTO real_estate_lead ($columns) VALUES ($values)";
                    break;
                case "commercial-loan-leads":
                    $sql = "INSERT INTO commercial_loan_leads ($columns) VALUES ($values)";
                    break;
                case 'fha_loan':
                case 'jumbo-loan':
                    $sql = "INSERT INTO loan_leads ($columns) VALUES ($values)";
                    break;
                case 'reverse-mortgage':
                    $sql = "INSERT INTO reverse_mortage ($columns) VALUES ($values)";
                    break;
                case 'dscr':
                    $sql = "INSERT INTO dscr ($columns) VALUES ($values)";
                    break;
                case 'va-loan-purchase-leads':
                    $sql = "INSERT INTO mortage_lead_generation ($columns) VALUES ($values)";
                    break;      
                default:
                    throw new Exception("Invalid form type");
            }

            // echo $sql;
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // die();
            if ($conn->query($sql) === TRUE) {
                return;
            } else {
                throw new Exception("Error inserting data into database: " . $conn->error);
                // echo $conn->error;
                // echo "<pre>";
                // print_r($data);
                // echo "</pre>";
                // die();
            }
            

        }

        function sanitizeInput($input)
        {
            return htmlspecialchars(trim($input));
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            switch($_POST['form_type']){
                case 'refinance':
                    $full_name                  = sanitizeInput($_POST['full_name']);
                    $email_address              = sanitizeInput($_POST['email_address']);
                    $phone_number               = sanitizeInput($_POST['phone_number']);
                    $street_address             = sanitizeInput($_POST['street_address']);
                    $unit                       = sanitizeInput($_POST['unit']);
                    $zip_code                   = sanitizeInput($_POST['zip_code']);

                    $property_type              = sanitizeInput($_POST['property_type']);
                    $loan_type                  = sanitizeInput($_POST['loan_type']);
                    $mortgage_goal              = sanitizeInput($_POST['mortgage_goal']);
                    $value_property             = sanitizeInput($_POST['value_property']);
                    $loan_balance               = sanitizeInput($_POST['loan_balance']);
                    $current_interest_rate      = sanitizeInput($_POST['current_interest_rate']);
                    $property_ownership         = sanitizeInput($_POST['property_ownership']);
                    $property_use               = sanitizeInput($_POST['property_use']);
                    $military_service           = isset($_POST['military_service']) ? 1 : 0;

                    $bank_customer_options = [
                        '1' => 'Chase', 
                        '2' => 'Bank of America', 
                        '3' => 'Wells Fargo', 
                        '4' => 'Citibank, NA', 
                        '5' => 'US Bank', 
                        '6' => 'PNC Bank', 
                        '7' => 'Navy Federal Credit Union'
                    ];
                    
                    $selected_bank_customers = [];
                    
                    foreach ($bank_customer_options as $key => $option) {
                        $checkboxName = 'bank_customer_' . $key;
                    
                        if (isset($_POST[$checkboxName])) {
                            $selected_bank_customers[] = sanitizeInput($option);
                        }
                    }
                    
                    $bank_customer = implode(', ', $selected_bank_customers);
                    
                    if (isset($_POST['bank_customer_none'])) {
                        $noneOfTheAbove = sanitizeInput('None of the Above');
                        $bank_customer .= $bank_customer ? ", $noneOfTheAbove" : $noneOfTheAbove;
                    }
                    

                    $employment_status          = sanitizeInput($_POST['employment_status']);
                    $household_income           = sanitizeInput($_POST['household_income']);
                    $bankruptcy_foreclosure     = isset($_POST['bankruptcy_foreclosure']) ? 1 : 0;
                    $cash_out_amount            = sanitizeInput($_POST['cash_out_amount']);
                    $credit_score               = sanitizeInput($_POST['credit_score']);
                    $companyID                  = sanitizeInput($_POST['companyID']);
                    if ($companyID == 'sentridocs'){
                        $companyID == 0;
                    }
                    $companySlug                = sanitizeInput($_POST['companySlug']);

                    $formData = [
                        'full_name'                 => $full_name,
                        'email_address'             => $email_address,
                        'phone_number'              => $phone_number,
                        'street_address'            => $street_address,
                        'unit'                      => $unit,
                        'zip_code'                  => $zip_code,

                        'property_type'             => $property_type,
                        'loan_type'                 => $loan_type,
                        'mortgage_goal'             => $mortgage_goal,
                        'value_property'            => $value_property,
                        'loan_balance'              => $loan_balance,
                        'current_interest_rate'     => $current_interest_rate,
                        'property_ownership'        => $property_ownership,
                        'property_use'              => $property_use,
                        'military_service'          => $military_service,
                        'bank_customer'             => $bank_customer,
                        'employment_status'         => $employment_status,
                        'household_income'          => $household_income,
                        'bankruptcy_foreclosure'    => $bankruptcy_foreclosure,
                        'cash_out_amount'           => $cash_out_amount,
                        'credit_score'              => $credit_score,
                        'company_id'                => $companyID
                    ];
                    break;
                case 'va-loan-leads':

                    $full_name              = sanitizeInput($_POST['full_name']);
                    $email_address          = sanitizeInput($_POST['email']);
                    $phone_number           = sanitizeInput($_POST['phone_number']);

                    $companySlug            = sanitizeInput($_POST['companySlug']);
                    
                    $loan_goal              = sanitizeInput($_POST['loan_goal']);
                    $branch_of_service      = sanitizeInput($_POST['branch_of_service']);
                    $reason                 = sanitizeInput($_POST['reason']);
                    $service_type           = sanitizeInput($_POST['service_type']);
                    $price_range            = sanitizeInput($_POST['price_range']);
                    $property_type          = sanitizeInput($_POST['property_type']);
                    $usage_type             = sanitizeInput($_POST['usage_type']);
                    $purchase_timing        = sanitizeInput($_POST['purchase_timing']);
                    $housing_status         = sanitizeInput($_POST['housing_status']);
                    $credit_score           = sanitizeInput($_POST['credit_score']);
                    $marital_status         = sanitizeInput($_POST['marital_status']);
                    $annual_income          = sanitizeInput($_POST['annual_income']);
                    $bankruptcy_status      = sanitizeInput($_POST['bankruptcy_status']);
                    
                    $bank_customer_options = [
                        '1' => 'Chase', 
                        '2' => 'Bank of America', 
                        '3' => 'Wells Fargo', 
                        '4' => 'Citibank, NA', 
                        '5' => 'US Bank', 
                        '6' => 'PNC Bank', 
                        '7' => 'Navy Federal Credit Union'
                    ];
                    
                    $selected_bank_customers = [];
                    
                    foreach ($bank_customer_options as $key => $option) {
                        $checkboxName = 'bank_customer_' . $key;
                    
                        if (isset($_POST[$checkboxName])) {
                            $selected_bank_customers[] = sanitizeInput($option);
                        }
                    }
                    
                    $active_account = implode(', ', $selected_bank_customers);
                    
                    if (isset($_POST['bank_customer_none'])) {
                        $noneOfTheAbove = sanitizeInput('None of the Above – Allow Manual Entry of Bank Name');
                        $active_account .= $active_account ? ", $noneOfTheAbove" : $noneOfTheAbove;
                    }
                
                    $employment_status      = sanitizeInput($_POST['employment_status']);
                    $filed_for_bankruptcy   = isset($_POST['filed_for_bankruptcy']) ? 'Yes' : 'No';
                    $home_location          = sanitizeInput($_POST['home_location']);
                    $company_id             = sanitizeInput($_POST['companyID']);
                    
                    if ($company_id == 'sentridocs'){
                        $company_id = 0;
                    }
                
                    $formData = [
                        'full_name'                 => $full_name,
                        'email_address'                     => $email_address,
                        'phone_number'              => $phone_number,
                        'loan_goal'                 => $loan_goal,
                        'branch_of_service'         => $branch_of_service,
                        'reason'                    => $reason,
                        'service_type'              => $service_type,
                        'price_range'               => $price_range,
                        'property_type'             => $property_type,
                        'usage_type'                => $usage_type,
                        'purchase_timing'           => $purchase_timing,
                        'housing_status'            => $housing_status,
                        'credit_score'              => $credit_score,
                        'marital_status'            => $marital_status,
                        'annual_income'             => $annual_income,
                        'bankruptcy_status'         => $bankruptcy_status,
                        'active_account'            => $active_account,
                        'employment_status'         => $employment_status,
                        'filed_for_bankruptcy'      => $filed_for_bankruptcy,
                        'home_location'             => $home_location,
                        'company_id'                => $company_id
                    ];
                    break;

                case 'real-estate-lead':

                    $full_name             = sanitizeInput($_POST['full_name']);
                    $email_address                 = sanitizeInput($_POST['email_address']);
                    $phone_number          = sanitizeInput($_POST['phone_number']);

                    $companySlug                = sanitizeInput($_POST['companySlug']);
                    
                    $user_needs            = sanitizeInput($_POST['user_needs']);
                    $home_location         = sanitizeInput($_POST['home_location']);
                    $street_address        = sanitizeInput($_POST['street_address']);
                    $unit_number           = sanitizeInput($_POST['unit_number']);
                    $home_type             = sanitizeInput($_POST['home_type']);
                    $planned_spending      = (int)sanitizeInput($_POST['planned_spending']);
                    $buying_timeline       = sanitizeInput($_POST['buying_timeline']);
                    $buying_process        = sanitizeInput($_POST['buying_process']);
                    $current_home_status   = sanitizeInput($_POST['current_home_status']);
                    $plan_to_sell          = sanitizeInput($_POST['plan_to_sell']);
                    $credit_score          = sanitizeInput($_POST['credit_score']);
                    $company_id            = sanitizeInput($_POST['companyID']);
                    
                    if ($company_id == 'sentridocs'){
                        $company_id = 0;
                    }
                
                    $formData = [
                        'full_name'            => $full_name,
                        'email_address'        => $email_address,
                        'phone_number'         => $phone_number,
                        'user_needs'           => $user_needs,
                        'home_location'        => $home_location,
                        'street_address'       => $street_address,
                        'unit_number'          => $unit_number,
                        'home_type'            => $home_type,
                        'planned_spending'     => $planned_spending,
                        'buying_timeline'      => $buying_timeline,
                        'buying_process'       => $buying_process,
                        'current_home_status'  => $current_home_status,
                        'plan_to_sell'         => $plan_to_sell,
                        'credit_score'         => $credit_score,
                        'company_id'           => $company_id
                    ];
                    break;

                case 'commercial-loan-leads':

                    $companySlug                = sanitizeInput($_POST['companySlug']);
                    $zip_code                   = sanitizeInput($_POST['zipcode_32']);
                    $property_type              = sanitizeInput($_POST['property_type']);
                    $property_location          = sanitizeInput($_POST['property_location']);
                    $leased_or_occupied         = sanitizeInput($_POST['menu_01']);
                    $estimated_value            = (int)sanitizeInput($_POST['estimated_value']);
                    $loan_amount                = (int)sanitizeInput($_POST['loan_amount']);
                    $loan_purpose               = sanitizeInput($_POST['menu_02']);
                    $loan_type                  = sanitizeInput($_POST['menu_03']);
                    $loan_duration              = sanitizeInput($_POST['menu_04']);
                    $down_payment               = sanitizeInput($_POST['menu_05']);
                    $receive_loan_duration      = sanitizeInput($_POST['menu_06']);
                    $property_owner             = sanitizeInput($_POST['menu_07']);
                    $any_co_debitor             = sanitizeInput($_POST['menu_08']);
                    $primary_borrower_state     = sanitizeInput($_POST['primary_borrower_loc']);
                    $primary_borrower_credit    = sanitizeInput($_POST['menu_10']);
                    $primary_borrower_docs      = sanitizeInput($_POST['menu_11']);
                    $other_docs                 = sanitizeInput($_POST['other_docs']);
                    $full_name                  = sanitizeInput($_POST['name']);
                    $email_address              = sanitizeInput($_POST['email_address']);
                    $phone_number               = sanitizeInput($_POST['phone_number']);
                    $companyID                  = sanitizeInput($_POST['companyID']);
                    if ($companyID == 'sentridocs'){
                        $companyID == 0;
                    }

                    if (isset($_POST['menu_09']) && is_array($_POST['menu_09'])) {
                        $primary_borrower_assets = implode(', ', $_POST['menu_09']);
                    }else{
                        $primary_borrower_assets    = sanitizeInput($_POST['menu_09']);
                    }

                    $formData = [
                        'city_zip'                       => $zip_code,
                        'property_type'                  => $property_type,
                        'property_location'              => $property_location,
                        'leased_or_occupied'             => $leased_or_occupied,
                        'estimated_value'                => $estimated_value,
                        'desired_loan_amount'            => $loan_amount,
                        'purpose_of_loan'                => $loan_purpose,
                        'loan_type'                      => $loan_type,
                        'loan_duration'                  => $loan_duration,
                        'total_down_payment'             => $down_payment,
                        'receive_loan_in'                => $receive_loan_duration,
                        'property_owner'                 => $property_owner,
                        'any_co_debitor'                 => $any_co_debitor,
                        'primary_borrower_state'         => $primary_borrower_state,
                        'primary_borrower_credit_score'  => $primary_borrower_credit,
                        'primary_borrower_assets'        => $primary_borrower_assets,
                        'primary_borrower_docs'          => $primary_borrower_docs,
                        'other_docs'                     => $other_docs,
                        'full_name'                      => $full_name,
                        'email_address'                  => $email_address,
                        'phone_number'                   => $phone_number,
                        'company_id'                     => $companyID
                    ];
                    break;
                
                case 'fha_loan':

                    $companySlug              = sanitizeInput($_POST['companySlug']);
                    $form_type                = sanitizeInput('fha-loan');
                    $property_type            = sanitizeInput($_POST['image_33']);
                    $process_stage            = sanitizeInput($_POST['menu_01']);
                    $plan_to_spend            = sanitizeInput($_POST['menu_02']);
                    $purpose_of_home          = sanitizeInput($_POST['menu_03']);
                    $is_first_time            = sanitizeInput($_POST['menu_04']);
                    $planning_time            = sanitizeInput($_POST['menu_05']);
                    $prevention               = sanitizeInput($_POST['menu_06']);
                    $military_service         = sanitizeInput($_POST['menu_07']);
                    $down_payment             = sanitizeInput($_POST['menu_11']);
                    $current_savings          = sanitizeInput($_POST['menu_12']);
                    $employment_status        = sanitizeInput($_POST['menu_08']);
                    $gross_annual_income      = sanitizeInput($_POST['menu_13']);
                    $bankruptcy_foreclosure   = sanitizeInput($_POST['menu_14']);
                    $current_credit_score     = sanitizeInput($_POST['menu_15']);
                    $working_with_agent       = sanitizeInput($_POST['menu_16']);
                    $zip_code                 = sanitizeInput($_POST['zipcode_32']);
                    $curr_zip_code            = sanitizeInput($_POST['zipcode_curr']);
                    $full_name                = sanitizeInput($_POST['name']);
                    $email_address            = sanitizeInput($_POST['email_address']);
                    $phone_number             = sanitizeInput($_POST['phone_number']);
                    $companyID                  = sanitizeInput($_POST['companyID']);
                    if ($companyID == 'sentridocs'){
                        $companyID == 0;
                    }

                    $formData = [
                        'form_type'                => $form_type,
                        'home_type'                => $property_type,
                        'current_process'          => $process_stage,
                        'spendings_on_home'        => $plan_to_spend,
                        'use_of_home'              => $purpose_of_home,
                        'is_first_time_purchase'   => $is_first_time,
                        'purchasing_plane'         => $planning_time,
                        'issue_in_buying'          => $prevention,
                        'ever_served_US_millitary' => $military_service,
                        'down_payment'             => $down_payment,
                        'current_savings'          => $current_savings,
                        'employment_status'        => $employment_status,
                        'gross_annual_income'      => $gross_annual_income,
                        'bankruptcy_shortsale'     => $bankruptcy_foreclosure,
                        'credit_score'             => $current_credit_score,
                        'working_with_agent'       => $working_with_agent,
                        'property_location'        => $zip_code,
                        'current_location'         => $curr_zip_code,
                        'full_name'                => $full_name,
                        'email_address'            => $email_address,
                        'phone_number'             => $phone_number,
                        'company_id'               => $companyID
                    ];
                    break;

                case 'jumbo-loan':

                    $companySlug               = sanitizeInput($_POST['companySlug']);
                    $form_type                = sanitizeInput('jumbo-loan');
                    $property_type            = sanitizeInput($_POST['image_33']);
                    $process_stage            = sanitizeInput($_POST['menu_01']);
                    $plan_to_spend            = sanitizeInput($_POST['menu_02']);
                    $purpose_of_home          = sanitizeInput($_POST['menu_03']);
                    $is_first_time            = sanitizeInput($_POST['menu_04']);
                    $planning_time            = sanitizeInput($_POST['menu_05']);
                    $prevention               = sanitizeInput($_POST['menu_06']);
                    $military_service         = sanitizeInput($_POST['menu_07']);
                    $down_payment             = sanitizeInput($_POST['menu_11']);
                    $current_savings          = sanitizeInput($_POST['menu_12']);
                    $employment_status        = sanitizeInput($_POST['menu_08']);
                    $gross_annual_income      = sanitizeInput($_POST['menu_13']);
                    $bankruptcy_foreclosure   = sanitizeInput($_POST['menu_14']);
                    $current_credit_score     = sanitizeInput($_POST['menu_15']);
                    $working_with_agent       = sanitizeInput($_POST['menu_16']);
                    $zip_code                 = sanitizeInput($_POST['zipcode_32']);
                    $curr_zip_code            = sanitizeInput($_POST['zipcode_curr']);
                    $full_name                = sanitizeInput($_POST['name']);
                    $email_address            = sanitizeInput($_POST['email_address']);
                    $phone_number             = sanitizeInput($_POST['phone_number']);
                    $companyID                  = sanitizeInput($_POST['companyID']);
                    if ($companyID == 'sentridocs'){
                        $companyID == 0;
                    }

                    $formData = [
                        'form_type'                => $form_type,
                        'home_type'                => $property_type,
                        'current_process'          => $process_stage,
                        'spendings_on_home'        => $plan_to_spend,
                        'use_of_home'              => $purpose_of_home,
                        'is_first_time_purchase'   => $is_first_time,
                        'purchasing_plane'         => $planning_time,
                        'issue_in_buying'          => $prevention,
                        'ever_served_US_millitary' => $military_service,
                        'down_payment'             => $down_payment,
                        'current_savings'          => $current_savings,
                        'employment_status'        => $employment_status,
                        'gross_annual_income'      => $gross_annual_income,
                        'bankruptcy_shortsale'     => $bankruptcy_foreclosure,
                        'credit_score'             => $current_credit_score,
                        'working_with_agent'       => $working_with_agent,
                        'property_location'        => $zip_code,
                        'current_location'         => $curr_zip_code,
                        'full_name'                => $full_name,
                        'email_address'            => $email_address,
                        'phone_number'             => $phone_number,
                        'company_id'               => $companyID
                    ];
                    break;
                
                case 'reverse-mortgage':

                    $companySlug          = sanitizeInput($_POST['companySlug']);

                    $zip_code             = sanitizeInput($_POST['zipcode_32']);
                    $curr_process         = sanitizeInput($_POST['menu_01']);
                    $property_type        = sanitizeInput($_POST['menu_02']);
                    $property_duration    = sanitizeInput($_POST['menu_04']);
                    $property_value       = (int)sanitizeInput($_POST['menu_03']);
                    $curr_mortage         = sanitizeInput($_POST['reason']);
                    $reverse_for          = sanitizeInput($_POST['menu_05']);
                    $first_time_purchase  = sanitizeInput($_POST['menu_06']);
                    $age                  = (int)sanitizeInput($_POST['cash_range']);
                    $full_name            = sanitizeInput($_POST['name']);
                    $email_address        = sanitizeInput($_POST['email']);
                    $phone_number         = sanitizeInput($_POST['phone_number']);
                    $companyID                  = sanitizeInput($_POST['companyID']);
                    if ($companyID == 'sentridocs'){
                        $companyID == 0;
                    }

                    $formData = [
                        'zipcode'                => $zip_code,
                        'curr_purchase_process'  => $curr_process,
                        'property_type'          => $property_type,
                        'property_keep_duration' => $property_duration,
                        'property_value'         => $property_value,
                        'curr_mortage_balance'   => $curr_mortage,
                        'reverse_for'            => $reverse_for,
                        'first_time_purchase'    => $first_time_purchase,
                        'age'                    => $age,
                        'full_name'              => $full_name,
                        'email_address'          => $email_address,
                        'phone_number'           => $phone_number,
                        'company_id'             => $companyID
                    ];
                    break;

                case 'dscr':

                    $companySlug              = sanitizeInput($_POST['companySlug']);
                    $loan_type                = sanitizeInput($_POST['image_33']);
                    $occupation               = sanitizeInput($_POST['menu_1']);
                    $property_type            = sanitizeInput($_POST['menu_2']);
                    $property_value           = sanitizeInput($_POST['property_worth']);
                    $loan_amount              = sanitizeInput($_POST['home-value-in-numbers']);
                    $owner                    = sanitizeInput($_POST['menu_03']);
                    $position                 = sanitizeInput($_POST['menu_04']);
                    $closing_plane            = sanitizeInput($_POST['menu_05']);
                    $military_service         = sanitizeInput($_POST['menu_06']);
                    $millitary_branch         = sanitizeInput($_POST['millitary_branch']);
                    $employment_status        = sanitizeInput($_POST['menu_7']);
                    $gross_annual_income      = sanitizeInput($_POST['menu_8']);
                    $bankruptcy_foreclosure   = sanitizeInput($_POST['menu_9']);
                    $current_credit_score     = sanitizeInput($_POST['menu_10']);
                    $working_with_agent       = sanitizeInput($_POST['menu_11']);
                    $property_zip_code        = sanitizeInput($_POST['city_zipcode_32']);
                    $curr_zip_code            = sanitizeInput($_POST['zipcode_32']);
                    $full_name                = sanitizeInput($_POST['name']);
                    $email_address            = sanitizeInput($_POST['email']);
                    $phone_number             = sanitizeInput($_POST['phone_number']);
                    $companyID                  = sanitizeInput($_POST['companyID']);
                    if ($companyID == 'sentridocs'){
                        $companyID == 0;
                    }

                    $formData = [
                        'loan_type'            => $loan_type,
                        'occupation'           => $occupation,
                        'property_type'        => $property_type,
                        'property_value'       => $property_value,
                        'loan_amount'          => $loan_amount,
                        'is_owner'             => $owner,
                        'loan_position'        => $position,
                        'closing_plane'        => $closing_plane,
                        'millitary_service'    => $military_service,
                        'millitary_branch'     => $millitary_branch,
                        'employement_status'   => $employment_status,
                        'gross_income'         => $gross_annual_income,
                        'bankruptcy_shortsale' => $bankruptcy_foreclosure,
                        'credit_score'         => $current_credit_score,
                        'working_with_agent'   => $working_with_agent,
                        'property_zipcode'     => $property_zip_code,
                        'curr_zipcode'         => $curr_zip_code,
                        'full_name'            => $full_name,
                        'email_address'        => $email_address,
                        'phone_number'         => $phone_number,
                        'company_id'           => $companyID
                    ];
                    break;

                case 'va-loan-purchase-leads':
                    $companySlug               = sanitizeInput($_POST['companySlug']);
                    $home_type                 = sanitizeInput($_POST['image_33']);
                    $loan_type                 = sanitizeInput($_POST['menu_01']);
                    $refinance_goal            = sanitizeInput($_POST['menu_03']);
                    $home_value                = sanitizeInput($_POST['home-value-in-numbers']);
                    $curr_loan_balance         = sanitizeInput($_POST['home-value-in-numbers2']);
                    $interest_rate             = sanitizeInput($_POST['curr_mortage']);
                    $curr_home_type            = sanitizeInput($_POST['menu_04']);
                    $home_use                  = sanitizeInput($_POST['menu_5']);
                    $millitary_service         = sanitizeInput($_POST['menu_06']);
                    $institute_active_account  = sanitizeInput($_POST['menu_6']);
                    $employment_status         = sanitizeInput($_POST['menu_7']);
                    $gross_income              = sanitizeInput($_POST['menu_8']);
                    $bankruptcy_shortsale      = sanitizeInput($_POST['menu_9']);
                    $curr_purchase_process     = sanitizeInput($_POST['menu_10']);
                    $spending_plan             = sanitizeInput($_POST['menu_11']);
                    $home_type_looking_for     = sanitizeInput($_POST['menu_12']);
                    $home_use_looking          = sanitizeInput($_POST['menu_13']);
                    $first_time_purchase       = sanitizeInput($_POST['menu_14']);
                    $purchase_plane            = sanitizeInput($_POST['menu_15']);
                    $issue_in_buying           = sanitizeInput($_POST['menu_16']);
                    $down_payment              = sanitizeInput($_POST['menu_17']);
                    $curr_savings              = sanitizeInput($_POST['menu_18']);
                    $additional_cash           = (int)sanitizeInput($_POST['additional_cash']);
                    $street_address            = sanitizeInput($_POST['zipcode_32']);
                    $curr_zipcode              = sanitizeInput($_POST['zipcode_321']);
                    $full_name                 = sanitizeInput($_POST['name']);
                    $email_address             = sanitizeInput($_POST['email']);
                    $phone_number              = sanitizeInput($_POST['phone_number']);
                    $companyID                  = sanitizeInput($_POST['companyID']);
                    if ($companyID == 'sentridocs'){
                        $companyID == 0;
                    }

                    $formData = [
                        'home_type'                 => $home_type,
                        'loan_type'                 => $loan_type,
                        'refinance_goal'            => $refinance_goal,
                        'home_value'                => $home_value,
                        'curr_loan_balance'         => $curr_loan_balance,
                        'interest_rate'             => $interest_rate,
                        'curr_home_type'            => $curr_home_type,
                        'home_use'                  => $home_use,
                        'millitary_service'         => $millitary_service,
                        'institute_active_account'  => $institute_active_account,
                        'employment_status'         => $employment_status,
                        'gross_income'              => $gross_income,
                        'bankruptcy_shortsale'      => $bankruptcy_shortsale,
                        'curr_purchase_process'     => $curr_purchase_process,
                        'spending_plan'             => $spending_plan,
                        'home_type_looking_for'     => $home_type_looking_for,
                        'home_use_looking'          => $home_use_looking,
                        'first_time_purchase'       => $first_time_purchase,
                        'purchase_plane'            => $purchase_plane,
                        'issue_in_buying'           => $issue_in_buying,
                        'down_payment'              => $down_payment,
                        'curr_savings'              => $curr_savings,
                        'additional_cash'           => $additional_cash,
                        'street_address'            => $street_address,
                        'curr_zipcode'              => $curr_zipcode,
                        'full_name'                 => $full_name,
                        'email_address'             => $email_address,
                        'phone_number'              => $phone_number,
                        'company_id'                => $companyID
                    ];
                    break;

                default:
                    throw new Exception("Invalid form type");
            }

            // echo "<pre>";
            // print_r($formData);
            // echo "</pre>";
            // die();

            insertFormData($formData, $_POST['form_type']);           
            // generatePDF($formData);

            echo '<script>
                alert("Form Submitted Successfully");
                window.location.href = "https://sentridocs.com/' . htmlspecialchars($companySlug, ENT_QUOTES, 'UTF-8') . '/loan-officer.php";
            </script>';

        }
    }catch (Exception $e) {
        echo ("Error: " . $e->getMessage());
        echo '<script>';
        echo 'alert("An error occurred while processing your request. Please try again later."'+ $e->getMessage() +');';
        echo 'window.location.href = "https://sentridocs.com/' . $companySlug . '/loan-officer.php";';
        echo '</script>';
    }
    // generatePDF($formData);
    // $mail = new PHPMailer(true);
    // try {

    //     $mail->isSMTP();
    //     $mail->Host = $smtpHost;
    //     $mail->SMTPAuth = $smtpAuth;
    //     $mail->Username = $smtpUsername;
    //     $mail->Password = $smtpPassword;
    //     $mail->SMTPSecure = $smtpSecure;
    //     $mail->Port = $smtpPort;

    //     $mail->setFrom('sender@example.com', 'Sender Name');
    //     $mail->addAddress('receiver@example.com', 'Recipient Name');

    //     $pdf_path = 'submission.pdf';
    //     $mail->addAttachment($pdf_path);

    //     $mail->isHTML(true);
    //     $mail->Subject = 'Lead Generation Form Attachment';
    //     $mail->Body = 'Please find the attached PDF for the form submission.';

    //     $mail->send();
    //     echo '<script>';
    //     echo 'alert("Form Submitted Successfully");';
    //     echo 'window.location.href = "https.sentridocs.com/' . $companySlug . '/loan-officer.php";';
    //     echo '</script>';
        
    // } catch (Exception $e) {
        // echo 'Error in sending email: ' . $mail->ErrorInfo;
    // }

$conn->close();
?>
