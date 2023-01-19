<?php
session_start();
$email = $_SESSION["email"];
$result = 0;
include("config/dbconfig.php");
$blog_id = $_GET['blog_id'];

$select_data = $con->query("select * from `user` as u,`chanel_post` as b where b.`id` = '$blog_id' and b.user_id = u.id;");
if ($select_data->num_rows == 1) {
    while ($row = mysqli_fetch_assoc($select_data)) {
        $blog_heading = $row['blog_heading'];
        $blog_description = $row['blog_description'];
        $creat_date = $row['created_at'];
        $first_name = $row['f_name'];
        $last_name = $row['l_name'];
        $blog_owner_image = $row['image'];
        $c_domain_id = $row['c_domain_id'];
        $position = $row['position'];
        $industry_id = $row['industry_id'];
    }
}


/*adding comment to any post*/
if (isset($_POST['add_comment'])) {
    $comment = mysqli_real_escape_string($con, $_POST['comment']);
    $query = $con->query("select id,email from user where email='$email'");
    if ($query->num_rows == 1) {
        while ($row = mysqli_fetch_assoc($query)) {
            $user_id = $row['id'];
        }
    }

    $insert_comment = $con->query("INSERT INTO `chanel_post_comment`(`user_id`, `blog_id`, `comment`) VALUES ('$user_id','$blog_id','$comment')");
    if ($insert_comment) {
        header("Location: blog_channel_details.php?blog_id=$blog_id");
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

            <div class="lg:flex lg:space-x-10">

                <div class="lg:w-3/4 space-y-5">

                    <div class="card">

                        <div class="p-7">

                            <h1 class="lg:text-3xl text-2xl font-semibold mb-6"> <?php echo $blog_heading; ?> </h1>

                            <div class="flex items-center space-x-3 my-4 pb-4 border-b border-gray-100">
                                <img src="assets/images/user/<?php echo $blog_owner_image; ?>" alt=""
                                     class="w-10 rounded-full">
                                <div>
                                    <div class="text-base font-semibold"> Anonymous</div>
                                    <?php
                                    $company_name_fetch = $con->query("select * from company_domain where id = '$c_domain_id'");
                                    if ($company_name_fetch) {
                                        while ($company = mysqli_fetch_assoc($company_name_fetch)) {
                                            $company_name = $company['company_name'];
                                        }
                                    }
                                    ?>
                                    <div class="text-xs"> <?php echo $position ?>, <?php echo $company_name ?> </div>


                                    <?php
                                    $fetch_industry = $con->query("select * from industry where id = '$industry_id'");
                                    if ($fetch_industry) {
                                        while ($industry = mysqli_fetch_assoc($fetch_industry)) {
                                            $industry_name = $industry['industry'];
                                        }
                                    }
                                    ?>
                                    <div class="text-xs"> <?php echo $industry_name ?></div>
                                </div>
                            </div>

                            <div class="space-y-3">
                                <p>
                                    <?php echo $blog_description; ?>
                                </p>
                            </div>

                        </div>

                    </div>

                    <?php
                    $fetch_comment = $con->query("select * from `chanel_post_comment` as b, user as u where b.blog_id = '$blog_id' and u.id = b.user_id;");
                    if ($fetch_comment->num_rows > 0) {
                        ?>
                        <h3 class="mb-8 mt-20 font-semibold text-2xl"> Reviews (<?php echo $fetch_comment->num_rows ?>
                            ) </h3>
                        <?php
                        while ($data_comment = mysqli_fetch_assoc($fetch_comment)) {
                            ?>
                            <div class="flex gap-x-4 mb-5 relative">
                                <img src="assets/images/user/<?php echo $data_comment['image']; ?>" alt=""
                                     class="rounded-full shadow w-12 h-12">
                                <div>
                                    <h4 class="text-base m-0">Anonymous</h4>
                                    <span class="text-gray-700 text-sm"><?php echo $data_comment['position']; ?>, </span>
                                    <span class="text-gray-700 text-sm"><?php
                                        $company_id = $data_comment['c_domain_id'];
                                        $comapny_name_fetch = $con->query("select * from company_domain where id='$company_id'");
                                        if($company_name_fetch){
                                            while($company_data = mysqli_fetch_assoc($comapny_name_fetch)){
                                                echo $company_data['company_name'];
                                            }
                                        }
                                        ?><br></span>
                                    <span class="text-gray-700 text-sm"><?php $date = date_create($data_comment['created_at']);
                                        echo date_format($date, "d M Y h:i:s A"); ?></span>
                                    <p class="mt-3">
                                        <?php echo $data_comment['comment']; ?>
                                    </p>

                                </div>
                            </div>
                            <?php
                        }
                    }
                    if (isset($_SESSION["email"])) {
                        ?>

                        <h3 class="mb-8 mt-20 font-semibold text-xl"> Add your comment </h3>
                        <form action="#" method="post">
                            <div class="flex space-x-4 mb-5 relative">
                                <div class="flex-1">
                                    <div class="grid md:grid-cols-2 gap-4">
                                        <div class="col-span-2">
                                        <textarea name="comment" id="" cols="30" rows="6"
                                                  class="bg-gradient-to-b from-gray-100 to-gray-100"></textarea>
                                        </div>
                                        <div class="col-span-2 flex justify-between py-4">
                                            <input type="submit" name="add_comment" value="Post Comment">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                    }
                    ?>


                </div>

                <!--random blog fetch-->
                <?php include("include/fetch_random_blog.php"); ?>

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

</body>


</html>