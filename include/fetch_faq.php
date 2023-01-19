<div>
    <?php
    if(isset($_SESSION["email"])){
        ?>
        <a href="add_faq.php?id=<?php echo $company_id?>" class="flex items-center justify-center h-10 px-6 rounded-md bg-blue-600 text-white">
            <ion-icon name="color-wand" class="text-xl"></ion-icon>
            <span> Add FAQ</span>
        </a>
        <?php
    }
    ?>
    <div class="">
        <div class="lg:mt-9">
            <ul class="uk-accordion space-y-3" uk-accordion>
                <?php
                $query = $con->query("select * from `faq` where `company_id` = '$company_id'");
                if($query->num_rows > 0){
                    while($row = mysqli_fetch_assoc($query)){
                        ?>
                        <li class="card hover:shadow-md px-6 py-4 rounded-md uk-open">
                            <a class="uk-accordion-title font-semibold text-base" href="#"><?php echo $row['question'];?> </a>
                            <div aria-hidden="false" class="uk-accordion-content mt-3">
                                <p><?php echo $row['answer'];?> </p>
                            </div>
                        </li>
                        <?php
                    }
                }else {
                    ?>
                    <p>No Faq is available. </p>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>

</div>