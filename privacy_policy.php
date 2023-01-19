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

            <div class="bg-white max-w-4xl mx-auto md:p-10 p-6 relative rounded-md shadow">

                <div class="md:space-y-6 space-y-4 text-gray-400 md:text-lg">

                    <div class="md:leading-8 leading-7"> Updated November 24, 2022</div>
                    <div class="font-semibold md:text-2xl text-xl text-gray-700"> Privacy Policy </div>
                    <div class="md:leading-8 leading-7"> Version 1.1, Revision 1</div>
                    <div class="md:leading-8 leading-7">At gongsecrets.com, we understand the importance of privacy and we certainly respect yours.
                        The web server does not recognize and neither does it attempt to recognize the domain or email address of each and every visitor.
                        However, IP addresses are logged for the generation of usage statistics.
                        We do not rent, sell, or share any information regarding our visitors. Exceptional disclosures: we may disclose your information if necessary to protect our legal rights. Disclosure may be required by law or if we are involved in legal proceedings.
                        We use third-party advertising companies to serve advertisements when you visit this website. These companies may use information about your visits (NOT including your name, address, email address, or telephone number) to this and other sites in order to provide advertisements on this site and other sites about goods and services that may be of interest to you. In the course of serving advertisements to this site, our third-party advertisers may place or recognize “cookies” in your browser.
                    </div>
                    <div class="md:leading-8 leading-7">
                        <ol type="1">
                            <li>Google, as a third party vendor, uses cookies to serve ads on your site.<br><br></li>
                            <li>Google’s use of the DoubleClick DART cookie enables it to serve ads to your users based on their visit to your sites and other sites on the Internet.<br><br></li>
                            <li>Users may opt out of the use of the DART cookie by visiting the Google ad and content network privacy policy.<br><br></li>
                        </ol>
                    </div>
                    <div class="md:leading-8 leading-7"> We reserve the right to edit or delete your comments at this site.</div>

                    <div class="font-semibold md:text-2xl text-2xl text-gray-700">For all non-privacy-related inquiries you can contact us at: contact@gongsecrets.com</div>

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

<!-- Mirrored from demo.foxthemes.net/socialitev2.2/forums.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 12 Nov 2022 06:15:04 GMT -->
</html>