<?php

    include 'include.php';

    if (isset($_GET['form_type']) && isset($_GET['id']) && is_numeric($_GET['id'])) {
        $entry_id = $_GET['id'];
    
        $form_type = $_GET['form_type'];
        switch($form_type){
            case "refinance":
                $sql = "SELECT * FROM mortgage_leads WHERE id = $entry_id";
                break;
            case "va-loan-leads":
                $sql = "SELECT * FROM va_loan_eligibility WHERE id = $entry_id";
                break;
            case "real-estate-lead-generation":
                $sql = "SELECT * FROM real_estate_lead WHERE id = $entry_id";
                break;
            case "commercial-loan-leads":
                $sql = "SELECT * FROM commercial_loan_leads WHERE id = $entry_id";
                break;
            case "fha-loan-leads":
                $sql = "SELECT * FROM loan_leads WHERE id = $entry_id and form_type = 'fha-loan'";
                break;
            case "jumbo-loan-leads":
                $sql = "SELECT * FROM loan_leads WHERE id = $entry_id AND form_type = 'jumbo-loan'";
                break;
            case "dscr":
                $sql = "SELECT * FROM dscr WHERE id = $entry_id";
                break;
            case "reverse_mortgage":
                $sql = "SELECT * FROM reverse_mortage WHERE id = $entry_id";
                break;
            case "va-loan-purchase-leads":
                $sql = "SELECT * FROM mortage_lead_generation WHERE id = $entry_id";
                break;
            default:
                echo '<script>alert("No Record Found!");</script>';
                echo '<script>window.location.href = "profile.php";</script>';
                exit();
        }
        // $sql = "SELECT * FROM mortgage_leads WHERE id = $entry_id";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo '<script>window.location.href = "profile.php";</script>';
            exit();
        }
    }
    
    function sanitizeInput($input)
    {
        return htmlspecialchars(trim($input));
    }
?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Form Entries</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Mortage Form Entries</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <table class="table table-hover">
            <tbody>
                <?php foreach ($row as $key => $value): ?>
                    <tr>
                        <th><?php echo ucfirst(str_replace('_', ' ', $key)); ?></th>
                        <td><?php echo $value; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </main><!-- End #main -->
<?php
include 'footer.php';
?>