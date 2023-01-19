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
            <h4>Salary Info</h4>

            <div class="mt-12">

                <table class="table uk-text-center">
                    <thead>
                    <tr>
                        <th scope="col">User Name</th>
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
                    $select_data = $con->query("select * from salary order by salary_id desc");
                    if ($select_data->num_rows > 0){
                    while ($data = mysqli_fetch_assoc($select_data)) {
                        ?>
                        <tr>
                            <td><?php
                                $user_no = $data['user_id'];
                                $select_user = $con->query("select f_name, id from user where id = '$user_no'");
                                if($select_user -> num_rows > 0){
                                    while ($datas = mysqli_fetch_assoc($select_user)){
                                        $username = $datas['f_name'];
                                    }
                                }
                                echo $username;

                                ?></td>
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