<?php
session_start();
include("config/dbconfig.php");
$email = $_SESSION['email'];
$query = $con->query("select id, email from user where email = '$email'");
if($query-> num_rows > 0){
    while($row = mysqli_fetch_assoc($query)){
        $id = $row['id'];
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
        <div class="mcontainer">


            <div class="flex-1">
                <h2 class="text-2xl font-semibold"> Your Blogs </h2>
            </div>
            <?php
            $fetch_blog = $con->query("select * from blog where user_id = '$id' order by id desc");
            if($fetch_blog->num_rows > 0){
                while($data = mysqli_fetch_assoc($fetch_blog)){
                    ?>
                    <div class="flex md:space-x-6 space-x-4 md:py-5 py-3 relative" id="view">
                        <div class="flex-1 space-y-2">

                            <a href="edit_blog.php?id=<?php echo $data['id'];?>" class="md:text-xl font-semibold line-clamp-2"><?php echo $data["blog_heading"];?></a>
                            <p class="leading-6 pr-4 line-clamp-2 md:block hidden"><?php echo $data["blog_description"];?></p>

                            <div class="flex items-center justify-between">
                                <div class="flex space-x-3 items-center text-sm md:pt-3">
                                    <div><?php echo $data["created_at"];?></div>
                                </div>
                                <a href="edit_blog.php?id=<?php echo $data['id'];?>" class="md:flex items-center justify-center h-9 px-8 rounded-md border">Edit</a>
                            </div>

                        </div>
                    </div>
                    <?php
                }
            }else{
                ?>
                <p class="leading-6 pr-4 line-clamp-2 md:block hidden">You haven't posted anything yet.</p>
                <?php
            }
            ?>


            <div class="flex-1 mt-5">
                <h2 class="text-2xl font-semibold"> Your Posts on Company Channel </h2>
            </div>
            <?php
            $fetch_blog = $con->query("select * from chanel_post where user_id = '$id' order by id desc");
            if($fetch_blog->num_rows > 0){
                while($data = mysqli_fetch_assoc($fetch_blog)){
                    ?>
                    <div class="flex md:space-x-6 space-x-4 md:py-5 py-3 relative" id="view">
                        <div class="flex-1 space-y-2">

                            <a href="edit_channel_post.php?id=<?php echo $data['id'];?>" class="md:text-xl font-semibold line-clamp-2"><?php echo $data["blog_heading"];?></a>
                            <p class="leading-6 pr-4 line-clamp-2 md:block hidden"><?php echo $data["blog_description"];?></p>

                            <div class="flex items-center justify-between">
                                <div class="flex space-x-3 items-center text-sm md:pt-3">
                                    <div><?php echo $data["created_at"];?></div>
                                </div>
                                <a href="edit_channel_post.php?id=<?php echo $data['id'];?>" class="md:flex items-center justify-center h-9 px-8 rounded-md border">Edit</a>
                            </div>

                        </div>
                    </div>
                    <?php
                }
            }else{
                ?>
                <p class="leading-6 pr-4 line-clamp-2 md:block hidden">You haven't posted anything yet.</p>
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

    function alertCompany(){
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
<script src="assets/js/toastr.min.js"></script>
<script src="assets/js/toastr-init.js"></script>

</body>

</html>