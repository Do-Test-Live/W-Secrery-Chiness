<div class="right_side">

    <div class="header_widgets">

        <a href="all_salary.php" class="is_icon" uk-tooltip="title: View All Salary Data" title="" aria-expanded="false">
            <img src="assets/images/icons/salary-1.png" style="width: 25px;">
        </a>
        <a href="index.php" class="is_icon" uk-tooltip="title: Public" title="" aria-expanded="false">
            <img src="assets/images/icons/post-1.png" style="width: 25px;">
        </a>
        <a href="companies.php" class="is_icon" uk-tooltip="title: Company" title="" aria-expanded="false">
            <img src="assets/images/icons/Company.png" style="width: 25px;">
        </a>

        <?php
        if (isset($_SESSION["email"])) {
            $email = $_SESSION["email"];
            $query = $con->query("select `f_name`, `l_name`,`image`,`c_domain_id` from `user` where `email` = '$email'");
            if ($query->num_rows == 1) {
                while ($row = mysqli_fetch_assoc($query)) {
                    $fname = $row['f_name'];
                    $lname = $row['l_name'];
                    $image = $row['image'];
                    $c_domain_id = $row['c_domain_id'];
                }
            }
            ?>

            <?php
            if ($c_domain_id != 0) {
                ?>
                <a href="add_post_channel.php" class="is_icon" uk-tooltip="title: Add Post to Company Channel" title=""
                   aria-expanded="false">
                    <img src="assets/images/icons/post-2.png" style="width: 25px;">
                </a>
                <?php
            }
            ?>
            <?php
            if ($c_domain_id != 0) {
                ?>
                <a href="add_post.php" class="is_icon" uk-tooltip="title: Add Post" title="" aria-expanded="false">
                    <img src="assets/images/icons/post-3.png" style="width: 25px;  margin-right: 10px;">
                </a>
                <?php
            } else {
                ?>
                <a href="#" onclick="alertCompany();" class="is_icon" uk-tooltip="title: Add Post" title=""
                   aria-expanded="false">
                    <img src="assets/images/icons/post-3.png" style="width: 25px;  margin-right: 10px;">
                </a>
                <?php
            }
            ?>
            <a href="#">
                <img src="assets/images/user/<?php echo $image; ?>" class="is_avatar" alt="">
            </a>
            <div uk-drop="mode: click;offset:5" class="header_dropdown profile_dropdown">

                <a href="#" class="user">
                    <div class="user_avatar">
                        <img src="assets/images/user/<?php echo $image; ?>" alt="">
                    </div>
                    <div class="user_name">
                        <div> <?php echo $fname ?><?php echo $lname ?></div>
                        <span>@<?php echo $lname ?></span>
                    </div>
                </a>
                <hr>
                <a href="profile.php">
                    <img src="assets/images/icons/history.png" style="width: 25px;  margin-right: 10px;">
                    Post History
                </a>
                <a href="salary.php">
                    <img src="assets/images/icons/salary-2.png" style="width: 25px;  margin-right: 10px;">
                    Add Salary Details
                </a>
                <a href="edit_profile.php">
                    <img src="assets/images/icons/user-group.png" style="width: 25px;  margin-right: 10px;">
                    Profile
                </a>
                <!--<a href="company_update.php">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M352 320c88.4 0 160-71.6 160-160c0-15.3-2.2-30.1-6.2-44.2c-3.1-10.8-16.4-13.2-24.3-5.3l-76.8 76.8c-3 3-7.1 4.7-11.3 4.7H336c-8.8 0-16-7.2-16-16V118.6c0-4.2 1.7-8.3 4.7-11.3l76.8-76.8c7.9-7.9 5.4-21.2-5.3-24.3C382.1 2.2 367.3 0 352 0C263.6 0 192 71.6 192 160c0 19.1 3.4 37.5 9.5 54.5L19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L297.5 310.5c17 6.2 35.4 9.5 54.5 9.5zM80 456c-13.3 0-24-10.7-24-24s10.7-24 24-24s24 10.7 24 24s-10.7 24-24 24z"/>
                    </svg>
                    Update Company Info
                </a>-->
                <a href="logout.php">
                    <img src="assets/images/icons/logout.png" style="width: 25px; margin-right: 10px;">
                    Log Out
                </a>


            </div>

            <?php

        } else {
            ?>
            <a href="#">
                <img src="assets/images/avatars/images.png" class="is_avatar" alt="">
            </a>
            <div uk-drop="mode: click;offset:5" class="header_dropdown profile_dropdown">
                <a href="login.php">
                    <img src="assets/images/icons/login.png" style="width: 25px;  margin-right: 10px;">
                    Sign In
                </a>


            </div>
            <?php
        }
        ?>

    </div>

</div>