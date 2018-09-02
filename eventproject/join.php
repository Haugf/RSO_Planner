<?php

include("connect.php");
include("function.php");

$rsoId = htmlspecialchars($_GET["myHiddenValue"]);
$email = $_SESSION['user'];
//echo $email;
//make sure they aren't already in this rso although i guess it doesn't matter....

//insert that id and the users email into the membership table
$sql = "INSERT INTO membership(rsoID, email) values('$rsoId', '$email')";
if(mysqli_query($con, $sql))
{
  //echo "success";
} else {
  echo ":()";
}

header("Location: rso.php");

?>
