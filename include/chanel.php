<div>
    <div class="md:flex md:space-x-14 mt-5 pt-4">
        <ul class="card divide-y divide-gray-100 sm:m-0 -mx-5">
            <?php
            $query = $con->query("select * from `user` as u,`chanel_post` as c where c.`company_domain_id` = '$company_id' and c.user_id = u.id;");
            if($query->num_rows > 0){
                while($row = mysqli_fetch_assoc($query)){
                    ?>
                    <li>
                        <div class="flex items-start space-x-5 p-7">
                            <img src="assets/images/user/<?php echo $row['image'];?>" alt=""
                                 class="w-12 h-12 rounded-full">
                            <div class="flex-1">
                                <a href="blog_channel_details.php?blog_id=<?php echo $row['id'];?>"
                                   class="text-lg font-semibold line-clamp-1 mb-1"> <?php echo $row['blog_heading'];?> </a>
                                <p class="text-sm text-gray-400 mb-2"><span
                                        data-href="%40 .html"> </span>
                                    Anonymous</span> </p>
                                <p class="leading-6 line-clamp-2 mt-3"><?php echo $row['blog_description'];?></p>
                            </div>
                        </div>
                    </li>
                    <?php
                }
            }else{
                ?>
                <p class="px-3">No Blog Posted Yet!</p>
                <?php
            }
            ?>
        </ul>
    </div>
</div>