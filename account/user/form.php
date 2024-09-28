<?php

    include 'include.php';

    $user_id = $_SESSION['user_id'];

    if (isset($_GET['form_type'])) {
        $sql = "SELECT * FROM companies WHERE user_id = '$user_id'";
        $result1 = $conn->query($sql);
        $company_details = $result1->fetch_assoc();
        if($company_details > 0) {
            $companyID = $company_details['id'];
            
                $form_type = $_GET['form_type'];
                switch($form_type){
                    case "refinance":
                        $sql = "SELECT * FROM mortgage_leads WHERE company_id = $companyID";
                        break;
                    case "va-loan-leads":
                        $sql = "SELECT * FROM va_loan_eligibility WHERE company_id = $companyID";
                        break;
                    case "real-estate-lead-generation":
                        $sql = "SELECT * FROM real_estate_lead WHERE company_id = $companyID";
                        break;
                    case "commercial-loan-leads":
                        $sql = "SELECT * FROM commercial_loan_leads WHERE company_id = $companyID";
                        break;
                    case "fha-loan-leads":
                        $sql = "SELECT * FROM loan_leads WHERE company_id = $companyID AND form_type = 'fha-loan'";
                        break;
                    case "jumbo-loan-leads":
                        $sql = "SELECT * FROM loan_leads WHERE company_id = $companyID AND form_type = 'jumbo-loan'";
                        break;
                    case "dscr":
                        $sql = "SELECT * FROM dscr WHERE company_id = $companyID";
                        break;
                    case "reverse_mortgage":
                        $sql = "SELECT * FROM reverse_mortage WHERE company_id = $companyID";
                        break;
                    case "va-loan-purchase-leads":
                        $sql = "SELECT * FROM mortage_lead_generation WHERE company_id = $companyID";
                        break;
                    default:
                        echo '<script>alert("No Record Found!");</script>';
                        echo '<script>window.location.href = "profile.php";</script>';
                        exit();
                }
            // $sql = "SELECT * FROM mortgage_leads WHERE company_id = $companyID";
            $result = $conn->query($sql);
        }else{
            echo '<script>alert("No Record Found!");</script>';
            echo '<script>window.location.href = "profile.php";</script>';
            exit();
        }
    }else{
        echo '<script>alert("Select Form from Company Page");</script>';
        echo '<script>window.location.href = "company.php";</script>';
        exit();
    }
    
?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Form</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Form Entries</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Companies</h5>

                            <!-- Table with hoverable rows -->
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Full Name</th>
                                        <th scope="col">Email Address</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>
                                                    <td>{$row['id']}</td>
                                                    <td>{$row['full_name']}</td>
                                                    <td>{$row['email_address']}</td>
                                                    <td>
                                                        <a href='entries.php?id={$row['id']}&form_type={$form_type}' class='btn btn-info'>View</a>
                                                        <form method='post' style='display:inline;'>
                                                            <input type='hidden' name='delete_entry' value='{$row['id']}'>
                                                            <button class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this entry?\")'>Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='4'>No entries found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
<?php
include 'footer.php';
?>