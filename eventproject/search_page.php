<?php

include("connect.php");
include("function.php");

 //echo "hi ";
  $uni = $_REQUEST['University']; //Grab univeristy
  $eventType = $_REQUEST['eventType']; //Grab event type
  $toDate = $_REQUEST['toDate']; //Grab to date
  $fromDate = $_REQUEST['fromDate']; //Grab from date

  // echo $uni; echo "<br>";
  // echo $eventType; echo "<br>";
  // echo $toDate; echo "<br>";
  // echo $fromDate; echo "<br>";

  //Grab user uni for scope
  $useremail = $_SESSION['user'];
  echo $useremail;
  $sql = "SELECT univeristy_id from users WHERE Email = '$useremail'";
  $result = $con->query($sql);
  $unii = $result->fetch_assoc();
  $userUni = $unii['univeristy_id'];
  echo $userUni;

//If RSO is selected we need to go through membership table and hold onto every rsoID userEmail is next to
if($eventType == "rso")
  {
    $friend = array();
    $friend = greatRSOeventSearch($useremail, $con);
    $storeBoy = array();
    $grabber = array();
    $grabber2 = array();
    $eventName = array();
    $count = $smartHold =0;
    for($a=0;$a<count($friend);$a++)
    {
      $sql = "SELECT * FROM event WHERE rsoAff = '$friend[$a]' and (event_date >='$toDate' and event_date <= '$fromDate') and university_id = '$uni'";
      $result = $con->query($sql);
      while($row = $result->fetch_assoc())
      {
        $smartHold++;
        $count++;
        $grabber[$count] = $row["scope"];
        $grabber2[$count] = $row["university_id"];
        $eventName[$count] = $row["name"];
        $dateOfEvents[$count] = $row["event_date"];
        echo "hi";
      }

    }
    //Now we have an array of all RSOs the user is a member of.
    //need to save smarthold and also grab those values for the events
  }
  else {


//Go through all events that fall under search query
$sql = "SELECT * from event where type = '$eventType' and (event_date >='$toDate' and event_date <= '$fromDate') and university_id = '$uni'";
$result = $con->query($sql);

if ($result->num_rows > 0)
{
//  echo $_SESSION["user"];
  $count = $result->num_rows;
  $smartHold = $never = $result->num_rows;
  $grabber = array();
  $grabber2 = array();
  $eventName = array();
  echo "<table>";
      while($row = $result->fetch_assoc())
      {
        //echo "<tr><td> latitude: " . $row["lat"]. "</td><td> Type: " . $row["type"]. " " . "</td><td> Date: " . $row["event_date"]. "</td></tr>";
        $grabber[$count] = $row["scope"];
        $grabber2[$count] = $row["university_id"];
        $eventName[$count] = $row["name"];
        $dateOfEvents[$count] = $row["event_date"];
        $count--;
      }
  echo "</table>";
} else {
  //trigger_error('Invalid query: ' .$con->error);
  echo "0 results";
}
}
//stupid attempt
?>

<html>
<head>
<link rel='stylesheet' href='css/style.css'/>
<script async defer
  src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCDd1pOURY31WARbVFjzTx6wGQRjnqaY6s&callback=initMap'>
</script>
</head>

<body>
<div id='wrapper'>
  <div id='menu2'>
    <a href='feed.php'>Feed</a>
    <a href='search.html'>Search Event</a>
    <a href='rso.php'>RSOs</a>
    <a href='create.php'>Create Event</a>
    <a href='login.php'>Log out</a>
  </div>
  <div id='resultDiv'>
    <!--where results begin-->
  <?php
  for($i=$smartHold;$i>0;$i--) //this function runs a dynamic amount of times........
  {
    if($grabber[$i] == 'Private' && $grabber2[$i] != $userUni )
    {
      //do nothing
    }
    else {
      echo "
  <div id='result'>
  <div id='map2'></div>
  <div id='rInfo'><h2>$eventName[$i]</h2><br>$eventType<br>$dateOfEvents[$i]</div>
  <form action='eventResult.php'>
  <input type='hidden' name='myHiddenValue' value='$eventName[$i]' />
  <input type='submit' value='view' name='$eventName[$i]' class='theButtons' />
  </form>
  <br>
  <hr>";
    echo "<br>";
  }
  }
   ?>
 </div>
<!--    <div id='resultDiv'>
      <!where results begin
  <div id='result'>
  <div id='map'></div>
  hi
<br>
<hr>
  </div>
  <div id='result'>
  <div id='map'></div>
  <div id='rInfo'>hiii</div>-->
<br>
<hr>
  </div>
</div>

</script>
</body>
</html>
