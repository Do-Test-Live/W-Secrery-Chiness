<?php
session_start();
$email = $_SESSION["email"];
$result = 0;
include("config/dbconfig.php");
$query = $con->query("select `id`,`c_domain_id`, `email` from `user` where `email` = '$email'");
if ($query->num_rows == 1) {
    while ($row = mysqli_fetch_assoc($query)) {
        $user_id = $row['id'];
        $domain_id = $row['c_domain_id'];
    }
}

if (isset($_POST['add_post'])) {
    $post_heading = mysqli_real_escape_string($con, $_POST['post_heading']);
    $post_description = mysqli_real_escape_string($con, $_POST['post_description']);

    $query = $con->query("INSERT INTO `chanel_post`(`blog_heading`, `blog_description`, `company_domain_id`, `user_id`) VALUES ('$post_heading','$post_description','$domain_id','$user_id')");
    if ($query) {
        $result = 1;
    } else {
        $result = 2;
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
    <meta name="description" content="Secrery">

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
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>

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

                </div>

                <?php include("include/head_right.php"); ?>
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
        <div class="mcontainer">

            <!-- create page-->
            <div class="max-w-2xl m-auto shadow-md rounded-md bg-white lg:mt-20">
                <?php
                if ($result == 1) {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congratulation!</strong> Blog has been posted successfully.
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

                <!-- form header -->
                <form action="#" method="post">
                    <div class="text-center border-b border-gray-100 py-6">
                        <h3 class="font-bold text-xl"> Post to Channel </h3>
                    </div>

                    <!-- form body -->
                    <div class="p-10 space-y-7">
                        <div class="line">
                            <input class="line__input" name="post_heading" type="text"
                                   onkeyup="this.setAttribute('value', this.value);" value="" autocomplete="off">
                            <span for="username" class="line__placeholder"> Post Heading </span>
                        </div>
                        <div class="line h-32">
                            <textarea class="line__input h-32" name="post_description" type="text"
                                      placeholder="Post Description" onkeyup="this.setAttribute('value', this.value);"
                                      value="" autocomplete="off"></textarea>
                        </div>


                    </div>

                    <!-- form footer -->
                    <div class="border-t flex justify-content-center align-items-center lg:space-x-10 p-7 bg-gray-50 rounded-b-md">
                        <button type="submit" name="add_post" class="button lg:w-1/2">
                            Post
                        </button>
                    </div>
                </form>

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
</script>

<!-- Javascript
================================================== -->
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
<script src="assets/js/tippy.all.min.js"></script>
<script src="assets/js/uikit.js"></script>
<script src="assets/js/simplebar.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/js/bootstrap-select.min.js"></script>
<script src="unpkg.com/ionicons%405.2.3/dist/ionicons.js"></script>

</body>

</html>