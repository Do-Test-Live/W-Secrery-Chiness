<?php
session_start();
include("config/dbconfig.php");
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
    <link href="assets/css/toastr.min.css" rel="stylesheet">

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
                    <form>
                        <input value="" type="text" class="form-control"
                               placeholder="Search" id="filter" autocomplete="off">
                    </form>

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
        <div class="mcontainer">

            <div class="lg:flex lg:space-x-12">

                <div class="lg:w-2/3 flex-shirink-0" id="post">


                    <div class="flex justify-between relative md:mb-4 mb-3 mt-5">
                        <div class="flex-1">
                            <h2 class="text-2xl font-semibold"> All Post </h2>
                        </div>
                    </div>

                    <ul class="card divide-y divide-gray-100 sm:m-0 -mx-5">
                        <?php
                        $feed_data = $con->query("select * from `user` as u,`blog` as b where b.user_id = u.id order by b.id desc");
                        if ($feed_data->num_rows > 0) {
                            while ($feed = mysqli_fetch_assoc($feed_data)) {
                                $blog = $feed['id'];
                                ?>
                                <li>
                                    <div class="flex items-start space-x-5 p-7">
                                        <img src="assets/images/user/<?php echo $feed['image']; ?>" alt=""
                                             class="w-12 h-12 rounded-full">
                                        <div class="flex-1">
                                            <a href="blog_detail.php?blog_id=<?php echo $feed['id']; ?>"
                                               class="text-lg font-semibold line-clamp-1 mb-1"><?php echo $feed['blog_heading']; ?> </a>
                                            <p class="leading-6 line-clamp-2 mt-3"><?php echo $feed['blog_description']; ?></p>
                                        </div>
                                        <div class="sm:flex items-center space-x-4 hidden">
                                            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"></path>
                                                <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z"></path>
                                            </svg>
                                            <?php
                                            $comment = $con->query("select COUNT(id) as number from blog_comment where blog_id = '$blog';");
                                            if ($comment) {
                                                while ($number = mysqli_fetch_assoc($comment)) {
                                                    ?>
                                                    <span class="text-xl"> <?php echo $number['number']; ?> </span>
                                                    <?php
                                                }
                                            }

                                            ?>
                                        </div>
                                    </div>
                                </li>
                                <?php
                            }
                        } else {
                            ?>
                            <p class="leading-6 line-clamp-2 mt-3 px-3">No post published yet!</p>
                            <?php
                        }
                        ?>
                    </ul>

                </div>

                <div class="lg:w-1/3 pt-5">

                    <!--<div uk-sticky="offset:100">

                        <h2 class="text-xl font-semibold mb-2"> Top Contributors </h2>
                        <p> People who started the most discussions on Talks. </p>
                        <br>
                        <ul class="space-y-3">
                            <?php
                    /*                            $select_user = $con->query("SELECT DISTINCT(id),f_name,l_name,image FROM `user` ORDER BY rand() LIMIT 5;");
                                                if ($select_user->num_rows > 0) {
                                                    while ($user = mysqli_fetch_assoc($select_user)) {
                                                        $user_id = $user['id'];
                                                        */ ?>
                                    <li>
                                        <div class="flex items-center space-x-3">
                                            <img src="assets/images/user/<?php /*echo $user['image']; */ ?>" alt=""
                                                 class="w-8 h-8 rounded-full">
                                            <a href="#" class="font-semibold"> Anonymous</a>
                                            <div class="flex items-center space-x-2">
                                                <ion-icon name="chatbubble-ellipses-outline" class="text-lg"></ion-icon>
                                                <?php
                    /*                                                $num_of_post = $con->query("select count(id) as post from blog where user_id = '$user_id'");
                                                                    if ($num_of_post) {
                                                                        while ($post = mysqli_fetch_assoc($num_of_post)) {
                                                                            */ ?>
                                                        <span> <?php /*echo $post['post']; */ ?> </span>
                                                        <?php
                    /*                                                    }
                                                                    }
                                                                    */ ?>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                    /*                                }
                                                }
                                                */ ?>
                        </ul>

                    </div>-->

                </div>

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

<script>
    $(document).ready(function () {
        $("#filter").keyup(function () {

            // Retrieve the input field text and reset the count to zero
            var filter = $(this).val(), count = 0;

            // Loop through the comment list
            $("#post ul li").each(function () {

                // If the list item does not contain the text phrase fade it out
                if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                    $(this).fadeOut();

                    // Show the list item if the phrase matches and increase the count by 1
                } else {
                    $(this).show();
                    count++;
                }
            });

            // Update the count
            var numberItems = count;
            $("#filter-count").text("Number of Filter = " + count);
        });
    });

    function alertCompany() {
        alert("Please add a company email to your profile first!");
    }
</script>

<script src="assets/js/tippy.all.min.js"></script>
<script src="assets/js/uikit.js"></script>
<script src="assets/js/simplebar.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/js/bootstrap-select.min.js"></script>
<script src="unpkg.com/ionicons%405.2.3/dist/ionicons.js"></script>
<script src="assets/js/toastr.min.js"></script>
<script src="assets/js/toastr-init.js"></script>

</body>

<!-- Mirrored from demo.foxthemes.net/socialitev2.2/forums.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 12 Nov 2022 06:15:04 GMT -->
</html>