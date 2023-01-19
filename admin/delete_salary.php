<?php
session_start();
include ('../config/dbconfig.php');
$id = $_GET['id'];
$query = $con->query("DELETE FROM `salary` WHERE salary_id = '$id'");
if($query){
    header("Location:salary.php");
}else{
    header("Location:salary.php");
}