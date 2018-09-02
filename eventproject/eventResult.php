<?php

include("connect.php");
include("function.php");

//Grab event name from pervious page
$eventName = htmlspecialchars($_GET["myHiddenValue"]);
//echo $eventName;

$sql = "SELECT * from event WHERE name = '$eventName'";
$result = $con->query($sql);
$unii = $result->fetch_assoc();
$lat = $unii['lat'];
$lon = $unii['lon'];
$eventLocation = $unii['eventLocation'];
$eventNum = $unii['pNum'];
$eventDes = $unii['eventDesc'];
$rso = $unii['rsoAff'];
$eventTime = $unii['event_time'];

//Display information for specifc event.
//Comments -- Location -- Rating -- Description -- Admin contact

echo
"
<script async defer
  src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCDd1pOURY31WARbVFjzTx6wGQRjnqaY6s&callback=initMap'>
</script>

<script>
function initMap()
{
  var options = {
  zoom:15,
  center:{lat:$lat,lng:$lon}
  }

// New map
var map = new google.maps.Map(document.getElementById('map'), options);
}


</script>";

?>

<html>
<head>
  <link rel="stylesheet" href="css/style.css"  />
  <!-- <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDd1pOURY31WARbVFjzTx6wGQRjnqaY6s&callback=initMap">
  </script> -->
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
    <div id="eventPage">
      <div id="title">
      </br>
      <h2><?php echo $eventName;?></h2>
      <?php echo  "<strong>Contact Number : </strong>" .$eventNum; echo "</br>"?>
      <?php echo "<strong>Address : </strong>" .$eventLocation; echo "</br>";echo "<strong>Host Organization :</strong> $rso </br>";echo "<strong>Event Time : </strong> $eventTime </br></br>";;echo "<strong>Desctription :</strong> </br>";?>
      <?php echo $eventDes; ?>
      </div>
    </br>
      <div id="map"></div>
      <div id="comments"></div>
      <?php// echo $eventLocation; ?>
    </div>

  </div>

</body>
</html>
