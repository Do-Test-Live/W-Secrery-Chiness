<?php
include('../config/dbconfig.php');
session_start();
if (!isset($_SESSION["email"])) {
    Header("Location: login.php");
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
                <div class="col-xl-3 col-xxl-6 col-sm-6">
                    <?php
                    $company_data = $con->query("select count(id) as number from company_domain;");
                    if ($company_data) {
                        while ($number = mysqli_fetch_assoc($company_data)) {
                            $no_of_company = $number['number'];
                        }
                    }
                    ?>
                    <div class="card gradient-bx text-white bg-danger rounded">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="mb-1">Total Company</p>
                                    <div class="d-flex flex-wrap">
                                        <h2 class="fs-40 font-w600 text-white mb-0 mr-3"><?php echo $no_of_company; ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-6 col-sm-6">
                    <div class="card gradient-bx text-white bg-success rounded">
                        <?php
                        $user_data = $con->query("select count(id) as number from user;");
                        if ($user_data) {
                            while ($number = mysqli_fetch_assoc($user_data)) {
                                $no_of_user = $number['number'];
                            }
                        }
                        ?>
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="mb-1">Total User</p>
                                    <div class="d-flex flex-wrap">
                                        <h2 class="fs-40 font-w600 text-white mb-0 mr-3"><?php echo $no_of_user ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-6 col-sm-6">
                    <div class="card gradient-bx text-white bg-info rounded">
                        <?php
                        $blog_data = $con->query("select count(id) as number from blog;");
                        if ($blog_data) {
                            while ($number = mysqli_fetch_assoc($blog_data)) {
                                $no_of_blog = $number['number'];
                            }
                        }
                        ?>
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="mb-1">Total Blog</p>
                                    <div class="d-flex flex-wrap">
                                        <h2 class="fs-40 font-w600 text-white mb-0 mr-3"><?php echo $no_of_blog; ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-6 col-sm-6">
                    <div class="card gradient-bx text-white bg-secondary rounded">
                        <?php
                        $channel_data = $con->query("select count(id) as number from chanel_post;");
                        if ($channel_data) {
                            while ($number = mysqli_fetch_assoc($channel_data)) {
                                $no_of_channel = $number['number'];
                            }
                        }
                        ?>
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="mb-1">Total Channel Blog</p>
                                    <div class="d-flex flex-wrap">
                                        <h2 class="fs-40 font-w600 text-white mb-0 mr-3"><?php echo $no_of_channel; ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Company Info.</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="display">
                                    <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Company Name</th>
                                        <th>Location</th>
                                        <th>Working Hour</th>
                                        <th>Working Days</th>
                                        <th>Edit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $fetch_company = $con->query("select * from company_domain");
                                    if ($fetch_company) {
                                        $sl = 1;
                                        while ($company = mysqli_fetch_assoc($fetch_company)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $sl;?></td>
                                                <td><?php echo $company['company_name'];?></td>
                                                <td><?php echo $company['location'];?></td>
                                                <td><?php echo $company['working_hour'];?></td>
                                                <td><?php echo $company['working_day'];?></td>
                                                <td><a href="edit_company.php?id=<?php echo $company['id'];?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                                class="fa fa-pencil"></i></a></td>
                                            </tr>
                                            <?php
                                            $sl++;
                                        }
                                    }
                                    ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Company Name</th>
                                        <th>Location</th>
                                        <th>Working Hour</th>
                                        <th>Working Days</th>
                                        <th>Edit</th>
                                    </tr>
                                    </tfoot>
                                </table>
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