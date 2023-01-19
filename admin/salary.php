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
                            Salary Info
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

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Salary Info</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="display">
                                    <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>User Email</th>
                                        <th>Job Rank</th>
                                        <th>Job Title</th>
                                        <th>Annual Salary</th>
                                        <th>Annual Bonus</th>
                                        <th>Salary Year</th>
                                        <th>Year of Tenture</th>
                                        <th>Company Name</th>
                                        <th>Comments</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $fetch_salary = $con->query("SELECT * FROM salary,user WHERE salary.user_id = user.id order by salary.salary_id desc");
                                    if ($fetch_salary) {
                                        $sl = 1;
                                        while ($salary = mysqli_fetch_assoc($fetch_salary)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $sl;?></td>
                                                <td><?php echo $salary['email'];?></td>
                                                <td><?php echo $salary['job_rank'];?></td>
                                                <td><?php echo $salary['job_title'];?></td>
                                                <td><?php echo $salary['annual_salary'];?></td>
                                                <td><?php echo $salary['annual_bonas'];?></td>
                                                <td><?php echo $salary['salary_year'];?></td>
                                                <td><?php echo $salary['year_of_tenture'];?></td>
                                                <td><?php echo $salary['company'];?></td>
                                                <td><?php echo $salary['comments'];?></td>
                                                <td><a href="delete_salary.php?id=<?php echo $salary['salary_id'];?>" class="btn btn-danger shadow btn-xs sharp mr-1"><i class="fa fa-trash"></i></a></td>
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
                                        <th>User Email</th>
                                        <th>Job Rank</th>
                                        <th>Job Title</th>
                                        <th>Annual Salary</th>
                                        <th>Annual Bonus</th>
                                        <th>Salary Year</th>
                                        <th>Year of Tenture</th>
                                        <th>Company Name</th>
                                        <th>Comments</th>
                                        <th>Delete</th>
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