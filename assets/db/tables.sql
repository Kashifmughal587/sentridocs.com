CREATE TABLE IF NOT EXISTS mortgage_leads (
        id INT AUTO_INCREMENT PRIMARY KEY,
        property_type VARCHAR(255),
        loan_type VARCHAR(255),
        mortgage_goal VARCHAR(255),
        value_property DECIMAL(10, 2),
        loan_balance DECIMAL(10, 2),
        current_interest_rate DECIMAL(4, 3),
        property_ownership VARCHAR(255),
        property_use VARCHAR(255),
        military_service BOOLEAN,
        bank_customer VARCHAR(255),
        employment_status VARCHAR(255),
        household_income VARCHAR(255),
        bankruptcy_foreclosure BOOLEAN,
        cash_out_amount DECIMAL(10, 2),
        credit_score VARCHAR(255),
        street_address VARCHAR(255),
        unit VARCHAR(255),
        zip_code VARCHAR(10),
        full_name VARCHAR(30),
        email_address VARCHAR(255),
        phone_number VARCHAR(15),
        lead_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        user_id INT NOT NULL,
    );

CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    firstname VARCHAR(50),
    lastname VARCHAR(50),
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    contact VARCHAR(20),
    status ENUM('active', 'inactive') DEFAULT 'active',
    nmls_number VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE companies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    user_nmls VARCHAR(20), 
    company_name VARCHAR(100) NOT NULL,
    company_slug VARCHAR(100) NOT NULL,
    company_email VARCHAR(100) NOT NULL,
    company_nmls VARCHAR(20),
    company_description TEXT,
    company_address VARCHAR(255),
    company_contact VARCHAR(20),
    company_logo VARCHAR(255),
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE loan_officer (
    id INT AUTO_INCREMENT PRIMARY KEY,
    company_id INT NOT NULL,
    officer_nmls VARCHAR(20),
    officer_name VARCHAR(100) NOT NULL,
    officer_slug VARCHAR(100) NOT NULL,
    officer_email VARCHAR(100) NOT NULL,
    contact VARCHAR(20),
    profile_photo VARCHAR(255),
    job_title VARCHAR(100),
    about_text TEXT,
    officer_address VARCHAR(255),
    website VARCHAR(255),
    calendly_link VARCHAR(255),
    experience INT,
    status ENUM('active', 'inactive') DEFAULT 'active',
);

CREATE TABLE license_keys (
    id INT AUTO_INCREMENT PRIMARY KEY,
    key_code VARCHAR(50) NOT NULL,
    encryption_key VARCHAR(50) NOT NULL,
    user_id INT NOT NULL,
    company_id INT NOT NULL,
    purchase_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    expiry_date DATE,
    used_count VARCHAR(10) NOT NULL DEFAULT 0,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



CREATE TABLE activity_log (
    log_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    activity_type VARCHAR(50) NOT NULL,
    activity_description TEXT,
    activity_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ip_address VARCHAR(45),
    device_info VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

$user_id = 123; // Assuming the ID of the user performing the activity
$activity_type = 'login';
$activity_description = 'User logged in successfully.';
$ip_address = $_SERVER['REMOTE_ADDR']; // Capture the user's IP address
$device_info = $_SERVER['HTTP_USER_AGENT']; // Capture the user's device information

log_activity($user_id, $activity_type, $activity_description, $ip_address, $device_info);

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `contact`, `status`, `nmls_number`, `created_at`) 
VALUES (NULL, 'johndoe', 'John', 'Doe', 'johndoe@gmail.com', '$2y$10$bzrAF8tjf1cIUCbWL.b6R.wI2cXhIGfilr7GpUmyr2/ySM8Tj5Z/a', '923001234567', 'active', '1122', current_timestamp());

INSERT INTO `companies` (`user_id`, `user_nmls`, `company_name`, `company_email`, `company_nmls`, `company_description`, `company_address`, `company_contact`, `status`, `created_at`, `updated_at`) 
VALUES ('1', '1122', 'Sentri Docs', 'sentridocs@gmail.com', '1256', 'Description', 'Sydney, Australia', '923111234567', 'inactive', current_timestamp(), current_timestamp());

ALTER TABLE companies
ADD COLUMN company_slug VARCHAR(100) NOT NULL AFTER company_name,
ADD COLUMN company_logo VARCHAR(255) AFTER company_contact,
ADD COLUMN company_fav VARCHAR(255) AFTER company_logo;

ALTER TABLE mortgage_leads
ADD COLUMN company_id INT NOT NULL;

ALTER TABLE loan_officer
ADD COLUMN calendly_link VARCHAR(255);

INSERT INTO `loan_officer` (`id`, `company_id`, `officer_nmls`, `officer_name`, `officer_slug`, `officer_email`, `contact`, `profile_photo`, `job_title`, `about_text`, `officer_address`, `website`, `experience`, `status`) VALUES (NULL, '2', '282856', 'Jeremy Willis', 'jeremy-willis', 'Jeremy@crushloans.com', '(855) 532-3767', NULL, 'Mortgage Advisor', 'Whether you’re buying, selling, refinancing, or building your dream home, you have a lot riding on your loan officer. Since market conditions and mortgage programs change frequently, you need to make sure you’re dealing with a top professional who can give you quick and accurate financial advice. As an experienced loan officer, I have the knowledge and expertise you need to explore the many financing options available.', '2455 4th Ave.\r\nSan Diego, CA 92101', 'http://www.CrushLoans.com', '4', 'active');

CREATE TABLE IF NOT EXISTS va_loan_eligibility (
    id INT AUTO_INCREMENT PRIMARY KEY,
    loan_goal VARCHAR(255), -- 'I want to buy a home' or 'I want to refinance'
    branch_of_service VARCHAR(255), -- Stores the branch of service selected by the user
    reason VARCHAR(255),
    service_type VARCHAR(255), -- Stores the selected military service type
    price_range VARCHAR(255), -- Stores the minimum value of the price range
    property_type VARCHAR(255), -- Stores the selected property type
    usage_type VARCHAR(255), -- Stores the selected usage type
    purchase_timing VARCHAR(255), -- Stores the selected timing for the purchase
    housing_status VARCHAR(255), -- Stores the user's current housing status
    credit_score VARCHAR(255), -- Stores the user's credit score range
    marital_status ENUM('Married', 'Unmarried', 'Legally Separated', 'Widowed', 'Other', 'Donot want to say!'), -- Added marital status
    annual_income ENUM('Greater than $200,000', '$150,000 - $200,000', '$100,000 - $150,000', '$75,000 - $100,000', '$50,000 - $75,000', '$30,000 - $50,000', 'Less than $30,000'), -- Added annual income range
    bankruptcy_status ENUM('Yes', 'No'), -- Added bankruptcy status
    active_account ENUM('Chase', 'Bank of America', 'Wells Fargo', 'Citibank, NA', 'US Bank', 'PNC Bank', 'Navy Federal Credit Union', 'None of the Above – Allow Manual Entry of Bank Name'), -- Added bank account status
    employment_status ENUM('Employed', 'Self Employed / 1099 Independent Contractor', 'Retired', 'Military', 'Not Employed'), -- Added employment status
    filed_for_bankruptcy ENUM('Yes', 'No'), -- Added filed for bankruptcy status
    home_location VARCHAR(255), -- Added home location (city or ZIP code)
    full_name VARCHAR(255), -- Added full name
    email_address VARCHAR(255), -- Added email address
    phone_number VARCHAR(20), -- Added phone number
    lead_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    company_id INT NOT NULL
);


CREATE TABLE IF NOT EXISTS real_estate_lead (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_needs VARCHAR(255) NOT NULL, -- Stores the user's needs
    home_location VARCHAR(255) NOT NULL, -- Stores the city or ZIP code of the home
    street_address VARCHAR(255) NOT NULL, -- Stores the street address
    unit_number VARCHAR(50), -- Stores the unit number (optional)
    home_type VARCHAR(255) NOT NULL, -- Stores the type of home the user is looking to buy
    planned_spending INT NOT NULL, -- Stores the user's planned spending on the new home
    buying_timeline ENUM('ASAP', '0-3 Months', '4-6 Months', '7-12 Months', '12+ Months') NOT NULL, -- Stores the ideal timeline for closing on the new home
    buying_process VARCHAR(255) NOT NULL, -- Stores the user's current status in the buying process
    current_home_status VARCHAR(255) NOT NULL, -- Stores the user's current home ownership status
    plan_to_sell ENUM('Yes', 'No') NOT NULL, -- Stores if the user plans to sell their current home
    credit_score VARCHAR(255) NOT NULL, -- Stores the user's credit score range
    full_name VARCHAR(255) NOT NULL, -- Stores the user's full name
    email_address VARCHAR(255) NOT NULL, -- Stores the user's email address
    phone_number VARCHAR(20) NOT NULL, -- Stores the user's phone number
    lead_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Stores the date and time of the lead
    company_id INT NOT NULL -- Associates the entry with a specific company
);

CREATE TABLE IF NOT EXISTS commercial_loan_leads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    city_zip VARCHAR(50) NOT NULL,
    property_type VARCHAR(100) NOT NULL,
    property_location VARCHAR(100) NOT NULL,
    leased_or_occupied VARCHAR(150) NOT NULL,
    estimated_value INT NOT NULL,
    desired_loan_amount INT NOT NULL,
    purpose_of_loan VARCHAR(255) NOT NULL,
    loan_type VARCHAR(150) NOT NULL,
    loan_duration VARCHAR(200) NOT NULL,
    total_down_payment VARCHAR(100) NOT NULL,
    receive_loan_in VARCHAR(100) NOT NULL,
    property_owner VARCHAR(200) NOT NULL,
    any_co_debitor ENUM('Yes','No') NOT NULL DEFAULT 'No',
    primary_borrower_state VARCHAR(100) NOT NULL,
    primary_borrower_credit_score VARCHAR(200) NOT NULL,
    primary_borrower_assets VARCHAR(500) NOT NULL,
    primary_borrower_docs VARCHAR(100) NOT NULL,
    other_docs VARCHAR(500) NOT NULL,
    full_name VARCHAR(150) NOT NULL,
    email_address VARCHAR(150) NOT NULL,
    phone_number VARCHAR(50) NOT NULL,
    company_id INT NOT NULL
);


CREATE TABLE IF NOT EXISTS loan_leads (
  Id INT AUTO_INCREMENT PRIMARY KEY,
  form_type VARCHAR(100) NOT NULL,
  home_type VARCHAR(150) NOT NULL,
  current_process VARCHAR(200) NOT NULL,
  spendings_on_home VARCHAR(150) NOT NULL,
  use_of_home VARCHAR(100) NOT NULL,
  is_first_time_purchase ENUM('Yes','No') NOT NULL DEFAULT 'Yes',
  purchasing_plane VARCHAR(100) NOT NULL,
  issue_in_buying VARCHAR(100) NOT NULL,
  ever_served_US_millitary VARCHAR(100) NOT NULL,
  down_payment VARCHAR(50) NOT NULL,
  current_savings VARCHAR(100) NOT NULL,
  employment_status VARCHAR(255) NOT NULL,
  gross_annual_income VARCHAR(100) NOT NULL,
  bankruptcy_shortsale ENUM('Yes','No') NOT NULL DEFAULT 'No',
  credit_score VARCHAR(100) NOT NULL,
  working_with_agent ENUM('Yes','No') NOT NULL DEFAULT 'Yes',
  property_location VARCHAR(50) NOT NULL,
  current_location VARCHAR(50) NOT NULL,
  full_name VARCHAR(150) NOT NULL,
  email_address VARCHAR(150) NOT NULL,
  phone_number VARCHAR(50) NOT NULL,
  company_id INT NOT NULL
);


CREATE TABLE IF NOT EXISTS mortage_lead_generation (
  id int AUTO_INCREMENT PRIMARY KEY,
  home_type varchar(150) NOT NULL,
  loan_type varchar(150) NOT NULL,
  refinance_goal varchar(255) NOT NULL,
  home_value varchar(255) NOT NULL,
  curr_loan_balance varchar(255) NOT NULL,
  interest_rate varchar(200) NOT NULL,
  curr_home_type varchar(255) NOT NULL,
  home_use varchar(255) NOT NULL,
  millitary_service varchar(200) NOT NULL,
  institute_active_account varchar(255) NOT NULL,
  employment_status varchar(200) NOT NULL,
  gross_income varchar(200) NOT NULL,
  bankruptcy_shortsale varchar(255) NOT NULL,
  curr_purchase_process varchar(255) NOT NULL,
  spending_plan varchar(255) NOT NULL,
  home_type_looking_for varchar(200) NOT NULL,
  home_use_looking varchar(255) NOT NULL,
  first_time_purchase varchar(150) NOT NULL,
  purchase_plane varchar(200) NOT NULL,
  issue_in_buying varchar(255) NOT NULL,
  down_payment varchar(200) NOT NULL,
  curr_savings varchar(255) NOT NULL,
  additional_cash int NOT NULL,
  street_address varchar(255) NOT NULL,
  curr_zipcode varchar(50) NOT NULL,
  full_name varchar(150) NOT NULL,
  email_address varchar(150) NOT NULL,
  phone_number varchar(50) NOT NULL,
  company_id INT NOT NULL
);

CREATE TABLE IF NOT EXISTS dscr (
  id int AUTO_INCREMENT PRIMARY KEY,
  loan_type varchar(100) NOT NULL,
  occupation varchar(150) NOT NULL,
  property_type varchar(200) NOT NULL,
  property_value varchar(150) NOT NULL,
  loan_amount varchar(150) NOT NULL,
  is_owner varchar(200) NOT NULL,
  loan_position varchar(255) NOT NULL,
  closing_plane varchar(200) NOT NULL,
  millitary_service varchar(150) NOT NULL,
  millitary_branch varchar(200) NOT NULL,
  employement_status varchar(255) NOT NULL,
  gross_income varchar(200) NOT NULL,
  bankruptcy_shortsale varchar(100) NOT NULL,
  credit_score varchar(200) NOT NULL,
  working_with_agent varchar(100) NOT NULL,
  property_zipcode varchar(50) NOT NULL,
  curr_zipcode varchar(50) NOT NULL,
  full_name varchar(150) NOT NULL,
  email_address varchar(200) NOT NULL,
  phone_number varchar(100) NOT NULL,
  company_id INT NOT NULL
);

CREATE TABLE IF NOT EXISTS reverse_mortage (
  id int AUTO_INCREMENT PRIMARY KEY,
  zipcode varchar(50) NOT NULL,
  curr_purchase_process varchar(255) NOT NULL,
  property_type varchar(255) NOT NULL,
  property_keep_duration varchar(150) NOT NULL,
  property_value int NOT NULL,
  curr_mortage_balance varchar(255) NOT NULL,
  reverse_for varchar(200) NOT NULL,
  first_time_purchase varchar(150) NOT NULL,
  age int NOT NULL,
  full_name varchar(150) NOT NULL,
  email_address varchar(150) NOT NULL,
  phone_number varchar(50) NOT NULL,
  company_id INT NOT NULL
);
