<!DOCTYPE html>
<html lang="en" class="bg-gray-100">

<?php
$result = 0;
include ("config/dbconfig.php");
if (isset($_POST['submit'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $key = 'Secrery';
    $Pwd_peppered = Hash_hmac("Sha256", $password, $key);
    $query = $con->query("select `password`,`status` from user where `email` = '$email'");
    if($query -> num_rows == 1){
        while($row = mysqli_fetch_assoc($query)){
            $pass = $row["password"];
            if(Password_verify($Pwd_peppered, $pass) && $row['status'] == 1){
                header("Location: index.php");
                session_start();
                $_SESSION["email"] = $email;
            }else{
                $result = 2;
            }
        }
    }else{
        $result = 1;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
    <style>
        input , .bootstrap-select.btn-group button{
            background-color: #f3f4f6  !important;
            height: 44px  !important;
            box-shadow: none  !important; 
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
    
                        <a href="index.php">
                            <h2 class="text-2xl font-semibold"> Secrery </h2>
                        </a>
    
                        <div class="capitalize flex font-semibold hidden lg:block my-2 space-x-3 text-center text-sm">
                            <a href="login.php" class="py-3 px-4 bg-purple-500 purple-500 rounded-md shadow text-white">登入</a>
                            <a href="register.php" class="px-6 py-3">按此註冊</a>
                        </div>
    
                    </div>
                </div>
            </div>
    
            <!-- Content-->
            <div>
                <div class="lg:p-12 max-w-xl lg:my-0 my-12 mx-auto p-6 space-y-">
                    <?php if ($result == 1){?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Sorry!</strong> Something Went Wrong. Please try again.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                    } elseif ($result == 2){
                        ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Sorry!</strong> Something Went Wrong.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                    }
                    ?>
                    <form class="lg:p-10 p-6 space-y-3 relative bg-white shadow-xl rounded-md" action="#" method="post">
                        <h1 class="lg:text-2xl text-xl font-semibold mb-6"> 登入 </h1>
                        <div>
                            <label class="mb-0"> 電郵名稱 </label>
                            <input type="email" name="email" placeholder="Info@example.com" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
                        </div>
                        <div>
                            <label class="mb-0"> 密碼 </label>
                            <input type="password" placeholder="******" name="password" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
                        </div>

                        <div>
                            <button type="submit" name="submit" class="bg-blue-600 font-semibold p-2 mt-5 rounded-md text-center text-white w-full">
                                Log In</button>
                        </div>
                        <p class="flex align-items-center justify-content-center">忘記密碼 <a href="forgot.php">幫助</a></p>
                    </form>
                    <p class="flex align-items-center justify-content-center">新用戶？<a href="register.php">按此註冊</a></p>
 
                </div>
            </div>
            
            <!-- Footer -->
    
            <div class="lg:mb-5 py-3 uk-link-reset">
                <div class="flex justify-content-center align-items-center lg:flex-row max-w-6xl mx-auto lg:space-y-0 space-y-3">
                    <p class="capitalize"> © copyright 2022 by Secrery</p>
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
    <script src="assets/js/tippy.all.min.js"></script>
    <script src="assets/js/uikit.js"></script>
    <script src="assets/js/simplebar.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="unpkg.com/ionicons%405.2.3/dist/ionicons.js"></script>

</body>

<!-- Mirrored from demo.foxthemes.net/socialitev2.2/login.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 12 Nov 2022 06:18:20 GMT -->
</html>