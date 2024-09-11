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
                default:
                    throw new Exception("Invalid form type");
            }

            if ($conn->query($sql) === TRUE) {
                return;
            } else {
                throw new Exception("Error inserting data into database: " . $conn->error);
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
                    $email_address                  = sanitizeInput($_POST['email_address']);
                    $phone_number           = sanitizeInput($_POST['phone_number']);

                    $companySlug                = sanitizeInput($_POST['companySlug']);
                    
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
                default:
                    throw new Exception("Invalid form type");
            }

            insertFormData($formData, $_POST['form_type']);           
            // generatePDF($formData);

            echo '<script>
                alert("Form Submitted Successfully");
                window.location.href = "https://sentridocs.com/' . htmlspecialchars($companySlug, ENT_QUOTES, 'UTF-8') . '/loan-officer.php";
            </script>';

        }
    }catch (Exception $e) {
        error_log("Error: " . $e->getMessage());
        echo '<script>';
        echo 'alert("An error occurred while processing your request. Please try again later.");';
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
