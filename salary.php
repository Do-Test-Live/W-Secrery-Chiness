<?php
session_start();
include("config/dbconfig.php");
$email = $_SESSION["email"];
$result = 0;
$select_user = $con->query("select id,email from user where email='$email'");
if ($select_user) {
    while ($user = mysqli_fetch_assoc($select_user)) {
        $user_id = $user['id'];
    }
}
if (isset($_POST['salary'])) {
    $job_rank = mysqli_real_escape_string($con, $_POST['job_rank']);
    $job_title = mysqli_real_escape_string($con, $_POST['job_title']);
    $annual_salary = mysqli_real_escape_string($con, $_POST['annual_salary']);
    $annual_bonus = mysqli_real_escape_string($con, $_POST['annual_bonus']);
    $salary_year = mysqli_real_escape_string($con, $_POST['salary_year']);
    $year_of_tenture = mysqli_real_escape_string($con, $_POST['year_of_tenture']);
    $comments = mysqli_real_escape_string($con, $_POST['comments']);
    $company = mysqli_real_escape_string($con, $_POST['company']);

    $insert_query = $con->query("INSERT INTO `salary`(`user_id`, `job_rank`, `job_title`, `annual_salary`, `annual_bonas`, `salary_year`, `year_of_tenture`, `comments`,`company`) 
VALUES ('$user_id','$job_rank','$job_title','$annual_salary','$annual_bonus','$salary_year','$year_of_tenture','$comments','$company')");
    if ($insert_query) {
        $result = 1;
    } else {
        $result = 2;
    }
}
/*if (isset($_POST['salary_update'])) {
    $job_rank = mysqli_real_escape_string($con, $_POST['job_rank']);
    $job_title = mysqli_real_escape_string($con, $_POST['job_title']);
    $annual_salary = mysqli_real_escape_string($con, $_POST['annual_salary']);
    $annual_bonus = mysqli_real_escape_string($con, $_POST['annual_bonus']);
    $salary_year = mysqli_real_escape_string($con, $_POST['salary_year']);
    $year_of_tenture = mysqli_real_escape_string($con, $_POST['year_of_tenture']);
    $comments = mysqli_real_escape_string($con, $_POST['comments']);
    $company = mysqli_real_escape_string($con, $_POST['company']);

    $update_query = $con->query("UPDATE `salary` SET `job_rank`='$job_rank',`job_title`='$job_title',`annual_salary`='$annual_salary',`annual_bonas`='$annual_bonus',`salary_year`='$salary_year',`year_of_tenture`='$year_of_tenture',`comments`='$comments',`company`='$company' WHERE user_id = '$user_id'");
    if ($update_query) {
        $result = 1;
    } else {
        $result = 2;
    }
}*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="assets/images/favicon.png" rel="icon" type="image/png">

    <!-- Basic Page Needs
        ================================================== -->
    <title>Secrery</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Socialite is - Professional A unique and beautiful collection of UI elements">

    <!-- icons
    ================================================== -->
    <link rel="stylesheet" href="assets/css/icons.css">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="assets/css/uikit.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="unpkg.com/tailwindcss%402.2.19/dist/tailwind.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>


</head>
<body>


<div id="wrapper">

    <!-- Header -->
    <header>
        <div class="header_wrap">
            <div class="header_inner mcontainer">
                <div class="left_side">
                        <span class="slide_menu" uk-toggle="target: #wrapper ; cls: is-collapse is-active">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path
                                        d="M3 4h18v2H3V4zm0 7h12v2H3v-2zm0 7h18v2H3v-2z"
                                        fill="currentColor"></path></svg>
                        </span>
                    <div id="logo">
                        <a href="#">
                            <span>Secrery</span>
                            <!--<img src="assets/images/logo.png" alt="">
                            <img src="assets/images/logo-mobile.png" class="logo_mobile" alt="">-->
                        </a>
                    </div>
                </div>

                <!-- search icon for mobile -->
                <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"></div>
                <div class="header_search"><i class="uil-search-alt"></i>
                    <input value="" type="text" class="form-control"
                           placeholder="Search" autocomplete="off">
                    <!-- -->
                </div>
                <?php
                include("include/head_right.php");
                ?>
            </div>
        </div>
    </header>

    <!-- sidebar -->
    <div class="sidebar">

        <div class="sidebar_inner" data-simplebar>

            <!--industry section starts-->
            <?php include("include/industry_menu.php"); ?>
            <!--industry section ends-->

        </div>

        <!-- sidebar overly for mobile -->
        <div class="side_overly" uk-toggle="target: #wrapper ; cls: is-collapse is-active"></div>

    </div>

    <!-- Main Contents -->
    <div class="main_content">
        <div class="mx-5 mt-5">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add/Update Salary Info
            </button>

            <div class="mt-12">

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Salary info.</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php
                                $query = $con->query("select * from salary where user_id = '$user_id'");
                                if($query-> num_rows > 0){
                                    while ($salary_data = mysqli_fetch_assoc($query)){
                                       $job_rank = $salary_data['job_rank'];
                                       $job_title = $salary_data['job_title'];
                                       $annual_salary = $salary_data['annual_salary'];
                                       $annual_bonas = $salary_data['annual_bonas'];
                                       $salary_year = $salary_data['salary_year'];
                                       $year_of_tenture = $salary_data['year_of_tenture'];
                                       $company = $salary_data['company'];
                                       $comments = $salary_data['comments'];
                                    }
                                        ?>
                                        <form action="#" method="post">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Job Rank</label>
                                                        <input type="text" name="job_rank" class="form-control"
                                                               value="<?php echo $job_rank;?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Job Title</label>
                                                        <input type="text" name="job_title" class="form-control"
                                                               value="<?php echo $job_title;?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Annual Salary</label>
                                                        <input type="text" name="annual_salary" class="form-control"
                                                               value="<?php echo $annual_salary;?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Annual
                                                            Bonus</label>
                                                        <input type="text" name="annual_bonus" class="form-control"
                                                               value="<?php echo $annual_bonas;?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Salary Year</label>
                                                        <input type="text" name="salary_year" class="form-control"
                                                               value="<?php echo $salary_year;?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Year of
                                                            Tenture</label>
                                                        <input type="text" name="year_of_tenture" class="form-control"
                                                               value="<?php echo $year_of_tenture;?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Name of the
                                                    Company</label>
                                                <input type="text" name="company" class="form-control"
                                                       value="<?php echo $company;?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">Comments</label>
                                                <textarea class="form-control" name="comments" rows="3"><?php echo $comments;?></textarea>
                                            </div>

                                            <button type="submit" name="salary" class="btn btn-primary">Submit</button>
                                        </form>

                                    <?php
                                } else{
                                    ?>
                                    <form action="#" method="post">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Job Rank</label>
                                                    <input type="text" name="job_rank" class="form-control"
                                                           placeholder="Job Rank" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Job Title</label>
                                                    <input type="text" name="job_title" class="form-control"
                                                           placeholder="Job Title" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Annual Salary</label>
                                                    <input type="text" name="annual_salary" class="form-control"
                                                           placeholder="Annual Salary" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Annual
                                                        Bonus</label>
                                                    <input type="text" name="annual_bonus" class="form-control"
                                                           placeholder="Annual Bonus" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Salary Year</label>
                                                    <input type="text" name="salary_year" class="form-control"
                                                           placeholder="Salary Year" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Year of
                                                        Tenture</label>
                                                    <input type="text" name="year_of_tenture" class="form-control"
                                                           placeholder="Year of Tenture" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Name of the
                                                Company</label>
                                            <input type="text" name="company" class="form-control"
                                                   placeholder="Name of the Company" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Comments</label>
                                            <textarea class="form-control" name="comments" rows="3"></textarea>
                                        </div>

                                        <button type="submit" name="salary" class="btn btn-primary">Submit</button>
                                    </form>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if ($result == 1) {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congratulation!</strong> Data has been added successfully.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                } elseif ($result == 2) {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Sorry!</strong> Something went wrong!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                }
                ?>
                <table class="table uk-text-center">
                    <thead>
                    <tr>
                        <th scope="col">Job Rank</th>
                        <th scope="col">Job Title</th>
                        <th scope="col">Annual Salary</th>
                        <th scope="col">Annual Bonus</th>
                        <th scope="col">Salary Year</th>
                        <th scope="col">Year of Tenture</th>
                        <th scope="col">Company</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $select_user = $con->query("select id,email from user where email='$email'");
                    if ($select_user) {
                        while ($user = mysqli_fetch_assoc($select_user)) {
                            $user_id = $user['id'];
                        }
                    }
                    $select_data = $con->query("select * from salary where user_id = '$user_id' order by salary_id desc");
                    if ($select_data->num_rows > 0){
                    while ($data = mysqli_fetch_assoc($select_data)) {
                        ?>
                        <tr>
                            <td><?php echo $data['job_rank']; ?></td>
                            <td><?php echo $data['job_title']; ?></td>
                            <td><?php echo $data['annual_salary']; ?></td>
                            <td><?php echo $data['annual_bonas']; ?></td>
                            <td><?php echo $data['salary_year']; ?></td>
                            <td><?php echo $data['year_of_tenture']; ?></td>
                            <td><?php echo $data['company']; ?></td>
                        </tr>
                        <?php
                    } ?>
                    </tbody>
                </table>
            <?php
            } else {
                ?>
                <p>Nothing added here!</p>
                <?php
            }
            ?>

            </div>
        </div>
    </div>

</div>


<!-- For Night mode -->
<script>
    (function (window, document, undefined) {
        'use strict';
        if (!('localStorage' in window)) return;
        var nightMode = localStorage.getItem('gmtNightMode');
        if (nightMode) {
            document.documentElement.className += ' night-mode';
        }
    })(window, document);

    (function (window, document, undefined) {

        'use strict';

        // Feature test
        if (!('localStorage' in window)) return;

        // Get our newly insert toggle
        var nightMode = document.querySelector('#night-mode');
        if (!nightMode) return;

        // When clicked, toggle night mode on or off
        nightMode.addEventListener('click', function (event) {
            event.preventDefault();
            document.documentElement.classList.toggle('dark');
            if (document.documentElement.classList.contains('dark')) {
                localStorage.setItem('gmtNightMode', true);
                return;
            }
            localStorage.removeItem('gmtNightMode');
        }, false);

    })(window, document);

    function alertCompany() {
        alert("Please add a company email to your profile first!");
    }
</script>

<!-- Javascript
================================================== -->

<script src="assets/js/tippy.all.min.js"></script>
<script src="assets/js/uikit.js"></script>
<script src="assets/js/simplebar.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/js/bootstrap-select.min.js"></script>
<script src="unpkg.com/ionicons%405.2.3/dist/ionicons.js"></script>

</body>

</html>