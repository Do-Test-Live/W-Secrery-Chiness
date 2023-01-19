<?php
session_start();
include("config/dbconfig.php");
$email = $_SESSION["email"];
$result = 0;
$value = 0;
if (isset($_POST['update_info'])) {
    $nickname = mysqli_real_escape_string($con, $_POST['nickname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $position = mysqli_real_escape_string($con, $_POST['position']);
    $industry = mysqli_real_escape_string($con, $_POST['industry']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $salary = mysqli_real_escape_string($con, $_POST['salary']);
    $avatar = mysqli_real_escape_string($con, $_POST['avatar']);
    $company = mysqli_real_escape_string($con, $_POST['company']);
    $company_email = strtolower(mysqli_real_escape_string($con, $_POST['company_email']));
    /*$c_image = $_FILES['c_image']['name'];
    $c_image_temp = $_FILES['c_image']['tmp_name'];*/

    $select_sub_domain = $con->query("select id, domain_name from company_domain where id = '$company'");
    if ($select_sub_domain->num_rows == 1) {
        while ($fetch_sub_domain = mysqli_fetch_assoc($select_sub_domain)) {
            $sub_domain = $fetch_sub_domain['domain_name'];
        }
    }
    echo $cemail_last = explode("@", $company_email);
    if ($sub_domain == $cemail_last[1]) {
        /*if ($c_image_temp != "") {
            move_uploaded_file($c_image_temp, "assets/images/user/$c_image");
            $c_update = $con->query("UPDATE `user` SET `f_name`='$nickname',`l_name`='$lname',`image`='$c_image',`company_email`='$company_email',`c_domain_id`='$company',`industry`='$industry',`position`='$position',`dob`='$dob',`gender`='$gender',`salary`='$salary' WHERE `email` = '$email'");
            if ($c_update) {
                $result = 1;
            } else {
                $result = 2;
            }
        }*/
            $c_update = $con->query("UPDATE `user` SET `f_name`='$nickname',`l_name`='$lname',`image`='$avatar',`company_email`='$company_email',`c_domain_id`='$company',`industry`='$industry',`position`='$position',`dob`='$dob',`gender`='$gender',`salary`='$salary' WHERE `email` = '$email'");
            if ($c_update) {
                $result = 1;
            } else {
                $result = 2;
            }
    } else {
        $result = 3;
    }

}

if (isset($_POST['add_company'])) {
    $company_name = mysqli_real_escape_string($con, $_POST['company_name']);
    $company_domain = strtolower(mysqli_real_escape_string($con, $_POST['company_domain']));
    $company_s_domain =  $_POST['company_s_domain'];
    $subDomain = implode(",", $company_s_domain);
    $company_location = mysqli_real_escape_string($con,$_POST['company_location']);
    $salary = mysqli_real_escape_string($con,$_POST['salary']);
    $hours = mysqli_real_escape_string($con,$_POST['hours']);
    $days = mysqli_real_escape_string($con,$_POST['days']);
    $year = mysqli_real_escape_string($con,$_POST['year']);
    $verify = $con->query("select `id` from `company_domain` where `domain_name` = '$company_domain'");
    if ($verify->num_rows == 0) {
        $insert_company = $con->query("INSERT INTO `company_domain`(`company_name`, `domain_name`,`sub_domain_name`,`monthly_income`,`location`,`working_hour`,`working_day`,`experience`) 
VALUES ('".$company_name."','".$company_domain."','".$subDomain."','".$salary."','".$company_location."','".$hours."','".$days."','".$year."')");
        if ($insert_company) {
            $value = 1;
        } else {
            $value = 2;
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


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
                    if ($result == 1) {
                        ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Congratulation!</strong> Data has been updated successfully.
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
                    } elseif ($result == 3) {
                        ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Sorry!</strong> Company Name and email don't match.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                    }
                    if($value == 1){
                        ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Congrats!</strong> Company added successfully!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                    }elseif($value == 2){
                        ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Sorry!</strong> Something Went Wrong.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php

                    }
                    ?>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <h1 class="lg:text-2xl text-xl font-semibold mb-6 flex align-items-center justify-content-center"
                            style="margin-top: 20px"> Update Profile </h1>
                        <div class="grid grid-cols-2 gap-3 lg:p-6 p-4">

                            <?php
                            $query = $con->query("select * from `user` where `email` = '$email'");
                            if ($query->num_rows == 1) {
                                while ($row = mysqli_fetch_assoc($query)) {
                                    ?>
                                    <div>
                                        <label for=""> Nick Name</label>
                                        <input type="text" name="nickname" value="<?php echo $row['f_name']; ?>"
                                               class="shadow-none with-border" required>
                                    </div>
                                    <div>
                                        <label for="">ID</label>
                                        <input type="text" name="lname" value="<?php echo $row['id']; ?>" disabled
                                               class="shadow-none with-border" required>
                                    </div>
                                    <div>
                                        <label class="mb-0"> Position </label>
                                        <input type="text" name="position" value="<?php echo $row['position']; ?>"
                                               list="position"
                                               class="shadow-none with-border">
                                    </div>

                                    <div>
                                        <label class="mb-0"> Industry </label>
                                        <select class="shadow-none with-border"
                                                name="industry" required="" data-select2-id="select2-data-4-7a5n"
                                                tabindex="-1" aria-hidden="true">
                                            <?php
                                            $industry_id = $row['industry'];
                                            $fetch_industry = $con->query("select id, industry from industry where id='$industry_id'");
                                            while ($fetch = mysqli_fetch_assoc($fetch_industry)) {
                                                $id = $fetch['id'];
                                                $name = $fetch['industry'];
                                            }
                                            ?>
                                            <option value="<?php echo $id; ?>"
                                                    data-select2-id="select2-data-6-uhfj"><?php echo $name; ?>
                                            </option>
                                            <option value="" data-select2-id="select2-data-6-uhfj">Choose Your
                                                Industry
                                            </option>
                                            <?php
                                            $industry = $con->query("select * from industry");
                                            if ($industry->num_rows > 0) {
                                                while ($ind = mysqli_fetch_assoc($industry)) {
                                                    ?>
                                                    <option value="<?php echo $ind['id']; ?>"><?php echo $ind['industry']; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div>
                                        <label for=""> Date of Birth</label>
                                        <input type="date" name="dob" value="<?php echo $row['dob']; ?>"
                                               class="shadow-none with-border">
                                    </div>
                                    <div>
                                        <label class="mb-0"> Gender </label>
                                        <select class="shadow-none with-border"
                                                name="gender" required="" data-select2-id="select2-data-4-7a5n"
                                                tabindex="-1" aria-hidden="true">
                                            <option><?php echo $row['gender']; ?></option>
                                            <option value=" " data-select2-id="select2-data-6-uhfj">Choose Your
                                                Gender
                                            </option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Others</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="">Salary (Monthly)</label>
                                        <input type="number" name="salary" value="<?php echo $row['salary']; ?>"
                                               class="shadow-none with-border" required>
                                    </div>

                                    <div>
                                        <label for="">Company Name</label>
                                        <?php
                                        $c_id = $row['c_domain_id'];
                                        $fetch_company = $con->query("select * from company_domain where id = '$c_id'");
                                        if ($fetch_company) {
                                            while ($company_fetch = mysqli_fetch_assoc($fetch_company)) {
                                                $company_id = $company_fetch['id'];
                                                $company_name = $company_fetch['company_name'];
                                            }
                                        }
                                        ?>
                                        <select class="shadow-none with-border"
                                                name="company" required="" data-select2-id="select2-data-4-7a5n"
                                                tabindex="-1" aria-hidden="true">
                                            <option value="<?php echo $company_id; ?>"><?php echo $company_name; ?></option>
                                            <option value=" " data-select2-id="select2-data-6-uhfj">Choose Your
                                                Company
                                            </option>
                                            <?php
                                            $select_company = $con->query("select * from company_domain");
                                            if ($select_company) {
                                                while ($company = mysqli_fetch_assoc($select_company)) {
                                                    ?>
                                                    <option value="<?php echo $company['id']; ?>"><?php echo $company['company_name']; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <p> Can't find your Company Domain?<a href="" data-bs-toggle="modal"
                                                                              data-bs-target="#staticBackdrop">
                                                Add Company
                                            </a></p>
                                    </div>

                                    <div class="col-span-2">
                                        <label for=""> Company Email</label>
                                        <input type="email" name="company_email"
                                               value="<?php echo $row['company_email']; ?>"
                                               class="shadow-none with-border">
                                    </div>

                                    <!--<div class="col-span-2">
                                        <label for=""> Profile Image</label>
                                        <input type="file" placeholder="" name="c_image"
                                               class="shadow-none with-border">
                                    </div>-->
                                    <div class="row px-3">
                                        <div class="col-4">
                                            <input class="form-check-input" type="radio" name="avatar"
                                                   id="1" value="1.jpg">
                                            <img src="assets/images/user/1.jpg">
                                        </div>
                                        <div class="col-4">
                                            <input class="form-check-input" type="radio" name="avatar"
                                                   id="2" value="2.jpg">
                                            <img src="assets/images/user/2.jpg">
                                        </div>
                                        <div class="col-4">
                                            <input class="form-check-input" type="radio" name="avatar"
                                                   id="3" value="3.jpg">
                                            <img src="assets/images/user/3.jpg">
                                        </div>
                                    </div>
                                    <div class="row px-3">
                                        <div class="col-4">
                                            <input class="form-check-input" type="radio" name="avatar"
                                                   id="1" value="4.jpg">
                                            <img src="assets/images/user/4.jpg">
                                        </div>
                                        <div class="col-4">
                                            <input class="form-check-input" type="radio" name="avatar"
                                                   id="2" value="5.jpg">
                                            <img src="assets/images/user/5.jpg">
                                        </div>
                                        <div class="col-4">
                                            <input class="form-check-input" type="radio" name="avatar"
                                                   id="3" value="6.jpg">
                                            <img src="assets/images/user/6.jpg">
                                        </div>
                                    </div>
                                    <div class="row px-3">
                                        <div class="col-4">
                                            <input class="form-check-input" type="radio" name="avatar"
                                                   id="1" value="7.jpg">
                                            <img src="assets/images/user/7.jpg">
                                        </div>
                                        <div class="col-4">
                                            <input class="form-check-input" type="radio" name="avatar"
                                                   id="2" value="8.jpg">
                                            <img src="assets/images/user/8.jpg">
                                        </div>
                                        <div class="col-4">
                                            <input class="form-check-input" type="radio" name="avatar"
                                                   id="3" value="9.jpg">
                                            <img src="assets/images/user/9.jpg">
                                        </div>
                                    </div>
                                    <div class="row px-3">
                                        <div class="col-4">
                                            <input class="form-check-input" type="radio" name="avatar"
                                                   id="1" value="10.jpg">
                                            <img src="assets/images/user/10.jpg">
                                        </div>
                                        <div class="col-4">
                                            <input class="form-check-input" type="radio" name="avatar"
                                                   id="2" value="11.jpg">
                                            <img src="assets/images/user/11.jpg">
                                        </div>
                                        <div class="col-4">
                                            <input class="form-check-input" type="radio" name="avatar"
                                                   id="3" value="12.jpg">
                                            <img src="assets/images/user/12.jpg">
                                        </div>
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

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Company</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="lg:p-10 p-6 space-y-3 relative bg-white shadow-xl rounded-md" action="#" method="post">
                    <div>
                        <label class="mb-0"> Company Name</label>
                        <input type="text" name="company_name" placeholder="Your Company Name" required
                               class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
                    </div>
                    <div>
                        <label class="mb-0"> Company Location</label>
                        <input type="text" name="company_location" placeholder="Your Company Location" required
                               class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
                    </div>
                    <div>
                        <label class="mb-0"> Average Monthly Salary </label>
                        <input type="text" name="salary" placeholder="Average Monthly Salary" required
                               class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
                    </div>
                    <div>
                        <label class="mb-0"> Working Hours </label>
                        <input type="text" name="hours" placeholder="Working Hours" required
                               class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
                    </div>
                    <div>
                        <label class="mb-0"> Working Days </label>
                        <input type="text" name="days" placeholder="Working Days" required
                               class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
                    </div>
                    <div>
                        <label class="mb-0"> Establishment Year </label>
                        <input type="text" name="year" placeholder="Your Company Establishment Year" required
                               class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
                    </div>
                    <div>
                        <label class="mb-0"> Company Primary Domain</label>
                        <input type="text" name="company_domain" placeholder="Your Company Primary Domain" required
                               class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
                    </div>
                    <div class="row" id="row">
                        <div class="col-8">
                            <label> Company Secondary Domain</label>
                            <input type="text" name="company_s_domain[]" id="s_domain"
                                   placeholder="Your Company Secondary Domain"
                                   class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
                        </div>
                        <div class="col-4">
                            <button type="button" name="add_sub_domain"
                                    class="bg-blue-600 font-semibold p-2 mt-5 rounded-md text-center text-white w-full"
                                    id="add_sub_domain">
                                Add
                            </button>
                        </div>
                    </div>
                    <div>
                        <button type="submit" name="add_company"
                                class="bg-blue-600 font-semibold p-2 mt-5 rounded-md text-center text-white w-full">
                            Add Company
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

    function alertCompany(){
        alert("Please add a company email to your profile first!");
    }
</script>

<script type="text/javascript">

    $(document).ready(function () {
        let html = '<div class="row"> <div class="col-8"> <label> Company Secondary Domain</label> <input type="text" name="company_s_domain[]" id="s_domain" placeholder="Your Company Secondary Domain" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full"> </div> <div class="col-4"> <button type="button" name="add_sub_domain"class="bg-blue-600 font-semibold p-2 mt-5 rounded-md text-center text-white w-full" id="remove">Remove </button> </div> </div>';
        let x = 1;
        $ ("#add_sub_domain").click(function (){
            $("#row").append(html);
        });
        $ ("#row").on('click','#remove',function (){
            $(this).closest('.row').remove();
        });
    });
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