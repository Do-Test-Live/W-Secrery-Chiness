<?php
session_start();
include ('../config/dbconfig.php');
$id = $_GET['id'];
$query = $con->query("DELETE FROM `industry` WHERE id='$id'");
if($query){
    header("Location:industry.php");
}else{
    header("Location:industry.php");
}