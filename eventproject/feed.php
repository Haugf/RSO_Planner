<!--MAY CHANGE THIS TO A FEED ISNTEAD-->
<?php

include("connect.php");
include("function.php");


//Grab user uni for scope
$useremail = $_SESSION['user'];
//echo $useremail;
$sql = "SELECT * from users WHERE Email = '$useremail'";
$result = $con->query($sql);
$unii = $result->fetch_assoc();
$userUni = $unii['univeristy_id'];
$userName = $unii['firstName'];

//Go through all events that are relevant to user
$sql = "SELECT * from event where  university_id = '$userUni'";
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

//stupid attempt
?>


<html>
<header>
  <link rel="stylesheet" href="css/style.css"  />
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDd1pOURY31WARbVFjzTx6wGQRjnqaY6s&callback=initMap">
  </script>

</header>
<body>
  <div id="wrapper">
    <div id="menu2">
      <a href="feed.php">Feed</a>
      <a href="search.html">Search Event</a>
      <a href="rso.php">RSOs</a>
      <a href="create.php">Create Event</a>
      <a href="login.php">Log out</a>
    </div>
    <div id="welcome">Welcome <?php echo $userName; echo "!";?></div>
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
    <div id='rInfo'><h2>$eventName[$i]</h2><br>$dateOfEvents[$i]</div>
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
  <!--    <div id='resu
  </div>

</body>
</html>
