<?php
    include 'include.php';

    $user_id = $_SESSION['user_id'];

    $sql = "SELECT * FROM users WHERE id = '$user_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if($row['nmls_number'] == '' || $row['contact'] == ''){
        echo '<script>alert("Please first complete your profile!");</script>';
        echo '<script>window.location.href = "profile.php";</script>';
        exit();
    }
    $sql = "SELECT * FROM companies WHERE user_id = '$user_id'";
    $result = $conn->query($sql);
    $company_details = $result->fetch_assoc();
    if($company_details < 1) {
        echo '<script>window.location.href = "createCompany.php";</script>';
        exit();
    }else{
        $company_id = $company_details['id'];
        $sql = "SELECT COUNT(*) as Total FROM license_keys WHERE company_id = '$company_id'";
        $result2 = $conn->query($sql);
        $license_count = $result2->fetch_assoc();
        if($license_count > 0) {
            $sql = "SELECT * FROM license_keys WHERE company_id = '$company_id' AND user_id = '$user_id'";
            $result3 = $conn->query($sql);
            $license_details = $result3->fetch_assoc();
        }
    }
?>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Company</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Company Details</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section profile">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Company</button>
                                </li>

                                <!-- <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                                </li> -->

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">License Key</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                    <h5 class="card-title">Company Details</h5>

                                    <div class="row">
                                        <label class="col-md-4 col-lg-3 col-form-label">Current Logo</label>
                                        <div class="col-md-8 col-lg-9">
                                            <?php 
                                                if(!empty($company_details['company_logo'])) {
                                                    echo '<img src="../../'.$company_details['company_logo'].'" alt="Company Logo" style="max-width: 200px;">';
                                                } else {
                                                    echo 'No logo uploaded.';
                                                }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-4 col-lg-3 col-form-label">Company Favicon</label>
                                        <div class="col-md-8 col-lg-9">
                                            <?php 
                                                if(!empty($company_details['company_fav'])) {
                                                    echo '<img src="../../'.$company_details['company_fav'].'" alt="Company Favicon" style="max-width: 200px;">';
                                                } else {
                                                    echo 'No icon uploaded.';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">NMLS Number</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $company_details['company_nmls'] ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Company Name</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $company_details['company_name']?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Company Email</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $company_details['company_email']?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Contact</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $company_details['company_contact']?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Address</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $company_details['company_address']?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Description</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $company_details['company_description']?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Refinance Page URL</div>
                                        <div class="col-lg-9 col-md-8"><?php echo 'https://sentridocs.com/'.$company_details['company_slug'],'/refinance.php'?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">VA Load Leads Page URL</div>
                                        <div class="col-lg-9 col-md-8"><?php echo 'https://sentridocs.com/'.$company_details['company_slug'],'/va-loan-leads.php'?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Real Estate Lead Generation Page URL</div>
                                        <div class="col-lg-9 col-md-8"><?php echo 'https://sentridocs.com/'.$company_details['company_slug'],'/real-estate-lead-generation.php'?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Commercial Loan Leads Page URL</div>
                                        <div class="col-lg-9 col-md-8"><?php echo 'https://sentridocs.com/'.$company_details['company_slug'],'/commerical-loan-leads.php'?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">FHA Loan Leads Page URL</div>
                                        <div class="col-lg-9 col-md-8"><?php echo 'https://sentridocs.com/'.$company_details['company_slug'],'/fha-loan-leads.php'?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Jumbo Loan Leads Page URL</div>
                                        <div class="col-lg-9 col-md-8"><?php echo 'https://sentridocs.com/'.$company_details['company_slug'],'/jumbo-loan-leads.php'?></div>
                                    </div>

                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <form action="createCompany.php" method="POST" action="update" enctype="multipart/form-data">
                                        <input type="hidden" name="action" value="update">
                                        <input type="hidden" name="id" id="id" value="<?php echo $company_details['id'];?>">

                                        <div class="row mb-3">
                                            <label for="companyLogo" class="col-md-4 col-lg-3 col-form-label">Company logo</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="companyLogo" type="file" class="form-control" id="companyLogo" value="<?php echo $company_details['company_logo'];?>">
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <label for="companyFav" class="col-md-4 col-lg-3 col-form-label">Company Favicon</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="companyFav" type="file" class="form-control" id="companyFav" value="<?php echo $company_details['company_fav'];?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="companyNMLS" class="col-md-4 col-lg-3 col-form-label">NMLS Number</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="companyNMLS" type="number" class="form-control" id="companyNMLS" value="<?php echo $company_details['company_nmls'];?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="companyName" class="col-md-4 col-lg-3 col-form-label">Company Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="companyName" type="text" class="form-control" id="companyName" value="<?php echo $company_details['company_name'];?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email" type="email" class="form-control" id="email" readonly value="<?php echo $company_details['company_email'];?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="contact" class="col-md-4 col-lg-3 col-form-label">Contact</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="contact" type="text" class="form-control" id="contact" value="<?php echo $company_details['company_contact'];?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="address" type="text" class="form-control" id="address" value="<?php echo $company_details['company_address'];?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="description" class="col-sm-2 col-form-label">Company Description</label>
                                            <div class="col-sm-10">
                                                <textarea name="description" id="description" class="form-control" style="height: 100px"><?php echo $company_details['company_description'];?></textarea>
                                            </div>`
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form><!-- End Profile Edit Form -->

                                </div>

                                <!-- <div class="tab-pane fade pt-3" id="profile-settings">

                                    <form>

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="changesMade" checked>
                                                    <label class="form-check-label" for="changesMade">
                                                        Changes made to your account
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="newProducts" checked>
                                                    <label class="form-check-label" for="newProducts">
                                                        Information on new products and services
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="proOffers">
                                                    <label class="form-check-label" for="proOffers">
                                                        Marketing and promo offers
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                                                    <label class="form-check-label" for="securityNotify">
                                                        Security alerts
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>

                                </div> -->

                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form method="POST" action="generateLicense.php">
                                        <?php
                                            if(isset($license_count) && $license_count['Total'] < 1){
                                                ?>
                                                    <input type="hidden" name="action" value="generateLicense">
                                                    <input type="hidden" name="company_id" value="<?php echo $company_details['id'];?>">
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary">Generate License</button>
                                                    </div>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                    <div class="row mb-3">
                                                        <label for="licenseKey" class="col-md-4 col-lg-3 col-form-label">License Key</label>
                                                        <div class="col-md-8 col-lg-9">
                                                            <input name="licenseKey" type="text" class="form-control" id="licenseKey" value="<?php echo $license_details['key_code'];?>" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="secretKey" class="col-md-4 col-lg-3 col-form-label">Secret Key</label>
                                                        <div class="col-md-8 col-lg-9">
                                                            <input name="secretKey" type="text" class="form-control" id="secretKey" value="<?php echo $license_details['encryption_key'];?>" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="usedCount" class="col-md-4 col-lg-3 col-form-label">No of Keys used</label>
                                                        <div class="col-md-8 col-lg-9">
                                                            <input name="usedCount" type="text" class="form-control" id="usedCount" value="<?php echo $license_details['used_count'];?>" readonly>
                                                        </div>
                                                    </div>
                                                <?php
                                            }
                                        ?>
                                    </form><!-- End Change Password Form -->
                                </div>
                            </div><!-- End Bordered Tabs -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
<?php
    include 'footer.php';
?>