<?php
include('../config/dbconfig.php');
session_start();
$id = $_GET['id'];
$result = 0;
if (!isset($_SESSION["email"])) {
    Header("Location: login.php");
}

if (isset($_POST['update_company'])) {
    $company_name = mysqli_real_escape_string($con, $_POST['company_name']);
    $domain_name = mysqli_real_escape_string($con, $_POST['domain_name']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $experience = mysqli_real_escape_string($con, $_POST['experience']);
    $monthly_income = mysqli_real_escape_string($con, $_POST['monthly_income']);
    $working_hour = mysqli_real_escape_string($con, $_POST['working_hour']);
    $working_day = mysqli_real_escape_string($con, $_POST['working_day']);
    $location = mysqli_real_escape_string($con, $_POST['location']);

    $update_company = $con->query("UPDATE `company_domain` SET `company_name`='$company_name',`domain_name`='$domain_name',`description`='$description',`experience`='$experience',`monthly_income`='$monthly_income',`location`='$location',`working_hour`='$working_hour',`working_day`='$working_day' WHERE id='$id'");
    if($update_company){
        $result = 1;
    }else{
        $result = 2;
    }
}
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Secrery - Admin </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- Datatable -->
    <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="../../cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">

</head>
<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!--*******************
    Preloader end
********************-->

<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->
    <div class="nav-header">
        <a href="index.php" class="brand-logo">
            <h1>Secrery</h1>
        </a>

        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
    </div>
    <!--**********************************
        Nav header end
    ***********************************-->


    <!--**********************************
        Header start
    ***********************************-->
    <div class="header">
        <div class="header-content">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">
                    <div class="header-left">
                        <div class="dashboard_bar">
                            Dashboard
                        </div>
                    </div>

                    <ul class="navbar-nav header-right">
                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="javascript:;" role="button" data-toggle="dropdown">
                                <img src="images/avatar.png" width="20" alt=""/>
                                <div class="header-info">
                                    <span>Hello,<strong> Admin</strong></span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="logout.php" class="dropdown-item ai-icon">
                                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
                                         width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg>
                                    <span class="ml-2">Logout </span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
    <div class="deznav">
        <div class="deznav-scroll">
            <ul class="metismenu" id="menu">
                <li><a class="ai-icon" href="index.php" aria-expanded="false">
                        <i class="flaticon-381-networking"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li><a class="ai-icon" href="salary.php" aria-expanded="false">
                        <i class="flaticon-381-battery"></i>
                        <span class="nav-text">Salary</span>
                    </a>
                </li>
                <li><a class="ai-icon" href="industry.php" aria-expanded="false">
                        <i class="flaticon-381-box"></i>
                        <span class="nav-text">Industry</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!--**********************************
        Sidebar end
    ***********************************-->

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="form-head d-flex mb-3 mb-md-4 align-items-start">

            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php
                    if($result == 1){
                        ?>
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                            </button>
                            <strong>Success!</strong> Company Data Updated.
                        </div>
                        <?php
                    } elseif($result == 2){
                        ?>
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                            </button>
                            <strong>Success!</strong> Company Data Updated.
                        </div>
                        <?php
                    }
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Update Company Info</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-validation">
                                <?php
                                $fetch_company_date = $con->query("select * from company_domain where id = '$id'");
                                if ($fetch_company_date) {
                                    while ($company = mysqli_fetch_assoc($fetch_company_date)) {
                                        ?>
                                        <form class="form-valide" action="#" method="post">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-username">Company
                                                            Name
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" id="val-username"
                                                                   name="company_name"
                                                                   value="<?php echo $company['company_name']; ?>"
                                                                   required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-email">Company
                                                            Domain <span
                                                                    class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" id="val-email"
                                                                   name="domain_name"
                                                                   value="<?php echo $company['domain_name']; ?>"
                                                                   required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-password">Description
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <textarea class="form-control" id="val-suggestions"
                                                                      name="description" rows="5"
                                                                      required><?php echo $company['description']; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label"
                                                               for="val-confirm-password">Established Year<span
                                                                    class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control"
                                                                   id="val-confirm-password" name="experience"
                                                                   value="<?php echo $company['experience']; ?>"
                                                                   required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-skill">Monthly
                                                            Income
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control"
                                                                   id="val-confirm-password" name="monthly_income"
                                                                   value="<?php echo $company['monthly_income']; ?>"
                                                                   required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-currency">Working
                                                            Hours
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" id="val-currency"
                                                                   name="working_hour"
                                                                   value="<?php echo $company['working_hour']; ?>"
                                                                   required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-website">Working
                                                            Days
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" id="val-website"
                                                                   name="working_day"
                                                                   value="<?php echo $company['working_day']; ?>"
                                                                   required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-website">Location
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" id="val-website"
                                                                   name="location"
                                                                   value="<?php echo $company['location']; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-8 ml-auto">
                                                            <button type="submit" name="update_company"
                                                                    class="btn btn-primary">Submit
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->

    <!--**********************************
        Footer start
    ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p>Copyright © Secrery</p>
        </div>
    </div>
    <!--**********************************
        Footer end
    ***********************************-->

    <!--**********************************
       Support ticket button start
    ***********************************-->

    <!--**********************************
       Support ticket button end
    ***********************************-->


</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
<script src="vendor/global/global.min.js"></script>
<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="vendor/chart.js/Chart.bundle.min.js"></script>
<script src="js/custom.min.js"></script>
<script src="js/deznav-init.js"></script>
<script src="vendor/owl-carousel/owl.carousel.js"></script>
<!-- Datatable -->
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="js/plugins-init/datatables.init.js"></script>

<!-- Apex Chart -->
<script src="vendor/apexchart/apexchart.js"></script>

<!-- Dashboard 1 -->
<script src="js/dashboard/dashboard-1.js"></script>

</body>


</html>