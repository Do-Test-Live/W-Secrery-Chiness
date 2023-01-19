<?php

$con=mysqli_connect("localhost","root","","secrery") or die("Could not Connect My Sql");

/*$con=mysqli_connect("localhost","u727820269_secrery","cp/C6+fQ","u727820269_secrery") or die("Could not Connect My Sql");*/

//Set the session duration for 5 seconds

$duration = 10800;

//Read the request time of the user

$time = $_SERVER['REQUEST_TIME'];


//Check the user's session exist or not

if (isset($_SESSION['LAST_ACTIVITY']) &&

    ($time - $_SESSION['LAST_ACTIVITY']) > $duration) {

    //Unset the session variables

    session_unset();

    //Destroy the session

    session_destroy();

    Header("Location: login.php");

}

//Set the time of the user's last activity

$_SESSION['LAST_ACTIVITY'] = $time;