<div class="lg:w-1/4 w-full">

    <div uk-sticky="offset:100" class="uk-sticky">

        <h2 class="text-lg font-semibold mb-3"> Recently Posted </h2>
        <ul>
            <?php
            $query = $con->query("SELECT id, blog_heading,created_at FROM `blog` ORDER BY rand() LIMIT 5;");
            if ($query->num_rows > 0) {
                while ($rand_blog = mysqli_fetch_assoc($query)) {
                    ?>
                    <li>
                        <a href="blog_detail.php?blog_id=<?php echo $rand_blog['id']?>"
                           class="hover:bg-gray-100 rounded-md p-2 -mx-2 block">
                            <h3 class="font-medium line-clamp-2"> <?php echo $rand_blog['blog_heading'];?> </h3>
                            <div class="flex items-center my-auto text-xs space-x-1.5">
                                <div> <?php echo $rand_blog['created_at'];?></div>
                                <div class="pb-1"> .</div>
                                <ion-icon name="chatbox-ellipses-outline"></ion-icon>
                            </div>
                        </a>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>

    </div>


</div>