<?php
$company = $con->query("select company_name,employee,id from company_domain order by rand() limit 5;");
if ($company -> num_rows > 0){
    while ($company_data = mysqli_fetch_assoc($company)){
        ?>
        <li>
            <a class="hover:bg-gray-100 rounded-md p-2 -mx-2 block" href="company_details.php?id=<?php echo $company_data['id'];?>">
                <h3 class="font-medium line-clamp-2"> <?php echo $company_data['company_name'];?></h3>
                <div class="flex items-center my-auto text-xs space-x-1.5">
                    <div class="pb-1"> .</div>
                    <i class="icon-feather-users mr-2"></i>
                    <div> <?php echo $company_data['employee'];?></div>
                </div>
            </a>
        </li>
        <?php
    }
}
?>


