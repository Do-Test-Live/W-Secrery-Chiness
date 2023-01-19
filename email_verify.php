<?php
session_start();
$email = $_SESSION["email"];
$x = 0;
$result = 0;
include("config/dbconfig.php");
?>
<!DOCTYPE html>
<html lang="en" class="bg-gray-100">

<?php
$result = 0;
if (isset($_POST['verify'])) {
    $code = mysqli_real_escape_string($con, $_POST['code']);
    $query = $con->query("select `vcode`,company_email,company_vcode from user where `email` = '$email'");
    if ($query->num_rows == 1) {
        while ($row = mysqli_fetch_assoc($query)) {
            $vcode = $row["vcode"];
            $c_email = $row['company_email'];
            $company_vcode = $row['company_vcode'];
        }
        if ($vcode == $code and $c_email != null) {

            $email_to = $c_email;
            $subject = 'Verify your email.';


            $headers = "From: Secrery <signup@nftprj.com>\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            $messege = "
            <html>
                <body style='background-color: #eee; font-size: 16px;'>
                <div style='max-width: 600px; min-width: 200px; background-color: #ffffff; padding: 20px; margin: auto;'>
                
                    <p style='text-align: center;color:green;font-weight:bold'>Thank you for reaching out us!</p>
                
                    <p style='color:black;text-align: center'>
                        6 digit authentication code for your company email verification is : <strong>$company_vcode</strong>
                    </p>
                </div>
                </body>
            </html>";

            if (mail($email_to, $subject, $messege, $headers)) {
                header("Location: verify_company_email.php");
            }

        }elseif ($vcode == $code){
            $update = $con->query("update `user` set `status` = '1' where `email` = '$email'");
            if($update){
                header("Location: setpass.php");
            }
        }
    } else {
        $result = 2;
    }
}

if (isset($_POST['resend_email'])) {
    $verification_code = $con->query("select vcode,email from user where email='$email'");
    if ($verification_code) {
        while ($code = mysqli_fetch_assoc($verification_code)) {
            $ver_code = $code['vcode'];
        }
        $email_to = $email;
        $subject = 'Verify your email.';


        $headers = "From: Secrery <signup@nftprj.com>\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $messege = "
            <html>
                <body style='background-color: #eee; font-size: 16px;'>
                <div style='max-width: 600px; min-width: 200px; background-color: #ffffff; padding: 20px; margin: auto;'>
                
                    <p style='text-align: center;color:green;font-weight:bold'>Thank you for reaching out us!</p>
                
                    <p style='color:black;text-align: center'>
                        6 digit authentication code for your email verification is : <strong>$ver_code</strong>
                    </p>
                </div>
                </body>
            </html>";

        if (mail($email_to, $subject, $messege, $headers)) {
            $x = 1;
        } else {
            $x = 2;
        }
    }
}
?>
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


    <style>
        input, .bootstrap-select.btn-group button {
            background-color: #f3f4f6 !important;
            height: 44px !important;
            box-shadow: none !important;
        }

    </style>
</head>
<body>

<body class="bg-gray-100">


<div id="wrapper" class="flex flex-col justify-between h-screen">

    <!-- header-->
    <div class="bg-white py-4 shadow dark:bg-gray-800">
        <div class="max-w-6xl mx-auto">


            <div class="flex items-center lg:justify-between justify-around">

                <a href="#">
                    <h2 class="text-2xl font-semibold"> Secrery </h2>
                </a>

                <div class="capitalize flex font-semibold hidden lg:block my-2 space-x-3 text-center text-sm">
                    <a href="login.php" class="py-3 px-4">Login</a>
                    <a href="register.php" class="bg-purple-500 purple-500 px-6 py-3 rounded-md shadow text-white">Register</a>
                </div>

            </div>
        </div>
    </div>

    <!-- Content-->
    <div>
        <div class="lg:p-12 max-w-xl lg:my-0 my-12 mx-auto p-6 space-y-">
            <?php if ($result != 0) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Sorry!</strong> Something Went Wrong.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
            }
            if ($x == 1) {
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Congrts!</strong> Email is resend!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
            } elseif ($x == 2) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Sorry!</strong> Something Went Wrong.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
            }
            ?>
            <form class="lg:p-10 p-6 space-y-3 relative bg-white shadow-xl rounded-md" action="#" method="post">
                <p class="mb-6"> An email with a 6 digit code has been sent to your email. Please enter the code below
                    to verify the account. </p>

                <div>
                    <input type="text" name="code" placeholder="" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full"
                           required>
                </div>

                <div>
                    <button type="submit" name="verify"
                            class="bg-blue-600 font-semibold p-2 mt-5 rounded-md text-center text-white w-full">
                        Verify Email
                    </button>
                </div>
            </form>
            <form action="#" method="post">
                <p>Haven't got the email?</p>
                <button type="submit" name="resend_email"
                        class="bg-blue-600 font-semibold p-2 rounded-md text-center text-white w-full">
                    Resend Email
                </button>
            </form>


        </div>
    </div>

    <!-- Footer -->

    <div class="lg:mb-5 py-3 uk-link-reset">
        <div class="flex align-items-center justify-content-center justify-between lg:flex-row max-w-6xl mx-auto lg:space-y-0 space-y-3">
            <p class="capitalize"> © copyright 2022 by Secrary</p>
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
<script src="code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
<script src="assets/js/tippy.all.min.js"></script>
<script src="assets/js/uikit.js"></script>
<script src="assets/js/simplebar.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/js/bootstrap-select.min.js"></script>
<script src="unpkg.com/ionicons%405.2.3/dist/ionicons.js"></script>

</body>

<!-- Mirrored from demo.foxthemes.net/socialitev2.2/login.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 12 Nov 2022 06:18:20 GMT -->
</html>
