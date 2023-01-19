<ul>
    <li><a href="index.php">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                 class="text-blue-600">
                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
            </svg>
            <span> 公眾 </span> </a>
    </li>

    <li><a href="companies.php">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                 class="text-blue-500">
                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
            </svg>
            <span> 公司 </span></a>
    </li>
</ul>

<h3 class="side-title"> 行業 </h3>

<div class="contact-list my-2 ml-1">
    <?php
    $query = $con->query("select * from `industry`");
    if ($query->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            ?>
            <a href="industry_blog.php?id=<?php echo $row['id'];?>">
                <div class="contact-avatar">
                    <img src="<?php echo $row['image'];?>" alt="">
                </div>
                <div class="contact-username"><?php echo $row['industry'];?></div>
            </a>
            <?php
        }
    }
    ?>
</div>

<div class="footer-links">
    <a href="privacy_policy.php">私隱政策</a>
    <a href="terms&conditions.php">條款及細則 </a>
</div>