<?php
session_start();
$email = $_SESSION["email"];
include ("config/dbconfig.php");
$query = $con->query("select `c_domain_id` from `user` where `email` = '$email'");
if($query->num_rows == 1){
    while($row = mysqli_fetch_assoc($query)){
        $company_id = $row['c_domain_id'];
    }
}
$result = 0;
if (isset($_POST['update_info'])){
    $c_location = mysqli_real_escape_string($con, $_POST['c_location']);
    $experience = mysqli_real_escape_string($con, $_POST['experience']);
    $working_hours = mysqli_real_escape_string($con, $_POST['working_hours']);
    $working_days = mysqli_real_escape_string($con, $_POST['working_days']);
    $salary = mysqli_real_escape_string($con, $_POST['salary']);
    $hours = mysqli_real_escape_string($con, $_POST['hours']);
    $promotion = mysqli_real_escape_string($con, $_POST['promotion']);
    $happiness = mysqli_real_escape_string($con, $_POST['happiness']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $monthly_income = mysqli_real_escape_string($con, $_POST['monthly_income']);
    $employee = mysqli_real_escape_string($con, $_POST['employee']);
    $c_image = $_FILES['c_image']['name'];
    $c_image_temp=$_FILES['c_image']['tmp_name'];

    if($c_image_temp != "")
    {
        move_uploaded_file($c_image_temp , "assets/images/company/$c_image");
        $c_update=$con->query("UPDATE `company_domain` SET `description`='$description',`salary`='$salary',`hours`='$hours',
                            `promotion`='$promotion',`happiness`='$happiness',`experience`='$experience',`monthly_income`='$monthly_income',`location`='$c_location',`working_hour`='$working_hours',`working_day`='$working_days',
                            `image`='$c_image',`employee`='$employee' WHERE `id` = '$company_id'");
        if($c_update){
            $result = 1;
        }else{
            $result = 2;
        }
    }else
    {
        $c_update=$con->query("UPDATE `company_domain` SET `description`='$description',`salary`='$salary',`hours`='$hours',
                            `promotion`='$promotion',`happiness`='$happiness',`experience`='$experience',`monthly_income`='$monthly_income',`location`='$c_location',`working_hour`='$working_hours',`working_day`='$working_days',`employee`='$employee' WHERE `id` = '$company_id'");
        if($c_update){
            $result = 1;
        }else{
            $result = 2;
        }
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
            <div class="grid lg:grid-cols-3 mt-12 gap-8">
                <div class="bg-white rounded-md lg:shadow-md shadow col-span-2 lg:mx-16">
                    <?php
                    if ($result == 1){
                        ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Congratulation!</strong> Company information updated successfully.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                    }elseif ($result == 2){
                        ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Sorry!</strong> Something went wrong!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                    }
                    ?>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <h1 class="lg:text-2xl text-xl font-semibold mb-6 flex align-items-center justify-content-center" style="margin-top: 20px"> Provide Feedback for Company </h1>
                        <div class="grid lg:p-6 p-4">

                            <?php
                            $query = $con->query("select * from `company_domain` where `id` = '$company_id'");
                            if($query->num_rows > 0){
                                while($row = mysqli_fetch_assoc($query)){
                                    ?>
                                    <div>
                                        <label for="">Location of Company (Ex: Road, State, City)</label>
                                        <input type="text" name="c_location" value="<?php echo $row['location'];?>" class="shadow-none with-border" required>
                                    </div>
                                    <div>
                                        <label for="">No. of Employee</label>
                                        <input type="text" name="employee" value="<?php echo $row['employee'];?>" class="shadow-none with-border" required>
                                    </div>
                                    <div>
                                        <label for=""> Years of Experience</label>
                                        <input type="text" name="experience" value="<?php echo $row['experience'];?>" class="shadow-none with-border" required>
                                    </div>
                                    <div>
                                        <label for=""> Approximate Monthly Income </label>
                                        <input type="text" name="monthly_income" value="<?php echo $row['monthly_income'];?>" class="shadow-none with-border" required>
                                    </div>
                                    <div>
                                        <label for="">Working Hours (Ex: 9am to 5pm)</label>
                                        <input type="text" name="working_hours" value="<?php echo $row['working_hour'];?>" class="shadow-none with-border" required>
                                    </div>
                                    <div>
                                        <label for="">Working Days (Per Week)</label>
                                        <input type="text" name="working_days" value="<?php echo $row['working_day'];?>" class="shadow-none with-border" required>
                                    </div>
                                    <div>
                                        <label for="">Rate Income/Salary (Between 1 to 10)</label>
                                        <input type="number" name="salary" value="<?php echo $row['salary'];?>" class="shadow-none with-border" required>
                                    </div>
                                    <div>
                                        <label for="">Rate Working Hours (Between 1 to 10)</label>
                                        <input type="number" name="hours" value="<?php echo $row['hours'];?>" class="shadow-none with-border" required>
                                    </div>
                                    <div>
                                        <label for="">Rate Promotion Prospect (Between 1 to 10)</label>
                                        <input type="number" name="promotion" value="<?php echo $row['promotion'];?>" class="shadow-none with-border" required>
                                    </div>
                                    <div>
                                        <label for="">Overall Satisfaction (Between 1 to 10)</label>
                                        <input type="number" name="happiness" value="<?php echo $row['happiness'];?>" class="shadow-none with-border" required>
                                    </div>
                                    <div>
                                        <label for="">Add Company Cover</label>
                                        <input type="file" name="c_image" class="shadow-none with-border">
                                    </div>
                                    <div>
                                        <label for="">Write Company Description</label>
                                        <input type="text" name="description" value="<?php echo $row['description'];?>" class="shadow-none with-border" required>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="bg-gray-10 p-6 pt-0 flex justify-end space-x-3">
                            <button class="p-2 px-4 rounded bg-gray-50 text-red-500"> Cancel</button>
                            <button type="submit" name="update_info" class="button bg-blue-700"> Save</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>

</div>


<!-- open chat box -->
<div uk-toggle="target: #offcanvas-chat" class="start-chat">
    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
    </svg>
</div>

<div id="offcanvas-chat" uk-offcanvas="flip: true; overlay: true">
    <div class="uk-offcanvas-bar bg-white p-0 w-full lg:w-80 shadow-2xl">


        <div class="relative pt-5 px-4">

            <h3 class="text-2xl font-bold mb-2"> Chats </h3>

            <div class="absolute right-3 top-4 flex items-center space-x-2">

                <button class="uk-offcanvas-close  px-2 -mt-1 relative rounded-full inset-0 lg:hidden blcok"
                        type="button" uk-close></button>

                <a href="#" uk-toggle="target: #search;animation: uk-animation-slide-top-small">
                    <ion-icon name="search" class="text-xl hover:bg-gray-100 p-1 rounded-full"></ion-icon>
                </a>
                <a href="#">
                    <ion-icon name="settings-outline" class="text-xl hover:bg-gray-100 p-1 rounded-full"></ion-icon>
                </a>
                <a href="#">
                    <ion-icon name="ellipsis-vertical" class="text-xl hover:bg-gray-100 p-1 rounded-full"></ion-icon>
                </a>
                <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden border border-gray-100 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700"
                     uk-drop="mode: click;pos: bottom-right;animation: uk-animation-slide-bottom-small; offset:5">
                    <ul class="space-y-1">
                        <li>
                            <a href="#"
                               class="flex items-center px-3 py-2 hover:bg-gray-100 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                <ion-icon name="checkbox-outline" class="pr-2 text-xl"></ion-icon>
                                Mark all as read
                            </a>
                        </li>
                        <li>
                            <a href="#"
                               class="flex items-center px-3 py-2 hover:bg-gray-100 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                <ion-icon name="settings-outline" class="pr-2 text-xl"></ion-icon>
                                Chat setting
                            </a>
                        </li>
                        <li>
                            <a href="#"
                               class="flex items-center px-3 py-2 hover:bg-gray-100 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                <ion-icon name="notifications-off-outline" class="pr-2 text-lg"></ion-icon>
                                Disable notifications
                            </a>
                        </li>
                        <li>
                            <a href="#"
                               class="flex items-center px-3 py-2 hover:bg-gray-100 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                <ion-icon name="star-outline" class="pr-2 text-xl"></ion-icon>
                                Create a group chat
                            </a>
                        </li>
                    </ul>
                </div>


            </div>


        </div>

        <div class="absolute bg-white z-10 w-full -mt-5 lg:-mt-2 transform translate-y-1.5 py-2 border-b items-center flex"
             id="search" hidden>
            <input type="text" placeholder="Search.." class="flex-1">
            <ion-icon name="close-outline" class="text-2xl hover:bg-gray-100 p-1 rounded-full mr-4 cursor-pointer"
                      uk-toggle="target: #search;animation: uk-animation-slide-top-small"></ion-icon>
        </div>

        <nav class="responsive-nav border-b extanded mb-2 -mt-2">
            <ul uk-switcher="connect: #chats-tab; animation: uk-animation-fade">
                <li class="uk-active"><a class="active" href="#0"> Friends </a></li>
                <li><a href="#0">Groups <span> 10 </span> </a></li>
            </ul>
        </nav>

        <div class="contact-list px-2 uk-switcher" id="chats-tab">

            <div class="p-1">
                <a href="chats-friend.html">
                    <div class="contact-avatar">
                        <img src="assets/images/avatars/avatar-7.jpg" alt="">
                    </div>
                    <div class="contact-username"> Alex Dolgove</div>
                </a>
                <a href="chats-friend.html">
                    <div class="contact-avatar">
                        <img src="assets/images/avatars/avatar-8.jpg" alt="">
                        <span class="user_status status_online"></span>
                    </div>
                    <div class="contact-username"> Dennis Han</div>
                </a>
                <a href="chats-friend.html">
                    <div class="contact-avatar">
                        <img src="assets/images/avatars/avatar-2.jpg" alt="">
                        <span class="user_status"></span>
                    </div>
                    <div class="contact-username"> Erica Jones</div>
                </a>
                <a href="chats-friend.html">
                    <div class="contact-avatar">
                        <img src="assets/images/avatars/avatar-3.jpg" alt="">
                    </div>
                    <div class="contact-username">Stella Johnson</div>
                </a>

                <a href="chats-friend.html">
                    <div class="contact-avatar">
                        <img src="assets/images/avatars/avatar-5.jpg" alt="">
                    </div>
                    <div class="contact-username">Adrian Mohani</div>
                </a>
                <a href="chats-friend.html">
                    <div class="contact-avatar">
                        <img src="assets/images/avatars/avatar-6.jpg" alt="">
                    </div>
                    <div class="contact-username"> Jonathan Madano</div>
                </a>
                <a href="chats-friend.html">
                    <div class="contact-avatar">
                        <img src="assets/images/avatars/avatar-2.jpg" alt="">
                        <span class="user_status"></span>
                    </div>
                    <div class="contact-username"> Erica Jones</div>
                </a>
                <a href="chats-friend.html">
                    <div class="contact-avatar">
                        <img src="assets/images/avatars/avatar-1.jpg" alt="">
                        <span class="user_status status_online"></span>
                    </div>
                    <div class="contact-username"> Dennis Han</div>
                </a>


            </div>
            <div class="p-1">
                <a href="chats-group.html">
                    <div class="contact-avatar">
                        <img src="assets/images/avatars/avatar-7.jpg" alt="">
                    </div>
                    <div class="contact-username"> Alex Dolgove</div>
                </a>
                <a href="chats-group.html">
                    <div class="contact-avatar">
                        <img src="assets/images/avatars/avatar-8.jpg" alt="">
                        <span class="user_status status_online"></span>
                    </div>
                    <div class="contact-username"> Dennis Han</div>
                </a>
                <a href="chats-group.html">
                    <div class="contact-avatar">
                        <img src="assets/images/avatars/avatar-2.jpg" alt="">
                        <span class="user_status"></span>
                    </div>
                    <div class="contact-username"> Erica Jones</div>
                </a>
                <a href="chats-group.html">
                    <div class="contact-avatar">
                        <img src="assets/images/avatars/avatar-3.jpg" alt="">
                    </div>
                    <div class="contact-username">Stella Johnson</div>
                </a>

                <a href="chats-group.html">
                    <div class="contact-avatar">
                        <img src="assets/images/avatars/avatar-5.jpg" alt="">
                    </div>
                    <div class="contact-username">Adrian Mohani</div>
                </a>
                <a href="chats-group.html">
                    <div class="contact-avatar">
                        <img src="assets/images/avatars/avatar-6.jpg" alt="">
                    </div>
                    <div class="contact-username"> Jonathan Madano</div>
                </a>
                <a href="chats-group.html">
                    <div class="contact-avatar">
                        <img src="assets/images/avatars/avatar-2.jpg" alt="">
                        <span class="user_status"></span>
                    </div>
                    <div class="contact-username"> Erica Jones</div>
                </a>
                <a href="chats-group.html">
                    <div class="contact-avatar">
                        <img src="assets/images/avatars/avatar-1.jpg" alt="">
                        <span class="user_status status_online"></span>
                    </div>
                    <div class="contact-username"> Dennis Han</div>
                </a>


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
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
<script src="assets/js/tippy.all.min.js"></script>
<script src="assets/js/uikit.js"></script>
<script src="assets/js/simplebar.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/js/bootstrap-select.min.js"></script>
<script src="unpkg.com/ionicons%405.2.3/dist/ionicons.js"></script>

</body>

</html>
