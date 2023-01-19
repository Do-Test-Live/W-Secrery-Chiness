<?php
$query = $con->query("select * from `company_domain` order by id desc limit 5");
if($query->num_rows > 0){
    while ($row = mysqli_fetch_assoc($query)){
        $company_domain = $row['id'];
        $c_month = date('m');
        $blog_number = $con->query("select count(id) as number, created_at from blog where month(created_at) = '$c_month' and company_domain_id = '$company_domain'");
        if($blog_number){
            while ($number = mysqli_fetch_assoc($blog_number)){
                $number_of_blog = $number['number'];
            }
        }
        ?>
        <li class="company_data">
            <div class="card">
                <div class="card-media h-28">
                    <div class="card-media-overly"></div>
                    <img src="assets/images/company/<?php echo $row['image'];?>" alt="" class="">

                    <div class="absolute bg-red-100 font-semibold px-2.5 py-1 rounded-lg text-red-500 text-xs top-2.5 left-2.5">
                        Trend
                    </div>
                </div>
                <div class="card-body">
                    <a href="company_details.php?id=<?php echo $row['id'];?>" class="font-semibold text-lg truncate"><?php echo $row['company_name'];?></a>
                    <div class="flex items-center flex-wrap space-x-1 mt-1 text-sm text-gray-500 capitalize">
                        <a href="#"> <span><?php echo $number_of_blog;?> post this month</span> </a>
                    </div>

                    <div class="flex mt-3.5 space-x-2 text-sm font-medium">
                        <a href="company_details.php?id=<?php echo $row['id'];?>"
                           class="bg-gray-200 flex flex-1 h-8 items-center justify-center rounded-md capitalize">
                            View
                        </a>
                    </div>

                </div>
            </div>
        </li>
        <?php
    }
}
?>