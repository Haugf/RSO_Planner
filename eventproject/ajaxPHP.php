<?php

include("connect.php");
include("function.php");


  $lat=  $_GET['lat'];
  $lon= $_GET['lon'];
  $loc = $_GET['id'];

$insertQuery = "UPDATE event SET lon ='$lon' WHERE name='$loc'";
if(mysqli_query($con, $insertQuery))
{
}
$insertQuery = "UPDATE event SET lat ='$lat' WHERE name='$loc'";
if(mysqli_query($con, $insertQuery))
{
}

?>
