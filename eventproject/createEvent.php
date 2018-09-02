<html>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<?php
include("connect.php");
//Used for javascript code
$eventLocation = $_POST['address'];
$eventName = $_POST['eventName'];


$useremail = $_SESSION['user'];
$sql = "SELECT nameRSO from rso WHERE adminEmail = '$useremail'";
$result = $con->query($sql);
$unii = $result->fetch_assoc();
$rsoName = $unii['nameRSO'];
echo $useremail;
echo $rsoName;


$call = "
<html>
<script>

//Delcare above to call inside of php later.
//Script using the Google Maps API to convert an address into lat and lon VALUES
function geocode()
{
  var location =  '$eventLocation'
  console.log(location);
axios.get('https://maps.googleapis.com/maps/api/geocode/json',{
params:{
  address:location,
  key:'AIzaSyCDd1pOURY31WARbVFjzTx6wGQRjnqaY6s'
}
})
.then(function(response){
      // Log full response
      console.log(response);

      // Geometry
      var latt = response.data.results[0].geometry.location.lat;
      var lngg = response.data.results[0].geometry.location.lng;

      // Output to app
      console.log(latt);
      console.log(lngg);

      //Try to save latt and lngg to database.
      $.ajax({
        url: 'ajaxPHP.php',
        type: 'GET',
        data: {lat: latt, lon: lngg, id: '$eventName'},
        success: function(data) {
          $('#result').html(data)
        }
      })


    })
    .catch(function(error){
      console.log(error);
    });
}


</script>
</html>
";

echo $call;
?>

</html>

<?php

	include("function.php");

  	$error = " ";
    $sid = $_SESSION["user"];
    //echo $sid;  confirm that we have the signed in user.
    if(isset($_POST['submit']))
  	{
      $eventType = $_POST['type'];
      $eventTime = $_POST['time'];
      $eventDate = $_POST['date'];
      $scopeType = $_POST['scope'];
      $eventNum = $_POST['Num'];
      $eventDes = $_POST['Des'];

      echo "<script>geocode();</script>";
      //echo $scopeType;
      //figure this out out the use of cookies and current logged in student info
      //$eventUni =
      if(strlen($eventName)<3)
  		{
  			$error="Event name is too short";
  		}
      else if(strlen($eventType)<3)
  		{
  			$error="Event type is too short";
  		}

    }

    //$searchUniQuery = "SELECT univeristy_id FROM users WHERE Email == '$sid'";
    $result = mysqli_query($con, "SELECT univeristy_id FROM users WHERE Email='$sid'");
    $userID = mysqli_fetch_assoc($result);
    $uniID = $userID['univeristy_id'];

    $insertQuery = "INSERT INTO event(name, type, event_time, event_date, university_id, scope, eventLocation, eventDesc, pNum, rsoAff) VALUES ('$eventName','$eventType','$eventTime','$eventDate', '$uniID', '$scopeType', '$eventLocation', '$eventDes', '$eventNum', '$rsoName')";
    if(mysqli_query($con, $insertQuery))
    {
      echo "success";

      $stringData = "<html>
      <header>
        <link rel='stylesheet' href='css/style.css'  />

      </header>
      <body>
        <div id='wrapper'>
          <div id='menu2'>
            <a href='profile.html'>Profile</a>
            <a href='search.html'>Search Event</a>
            <a href='rso.html'>RSOs</a>
            <a href='create.html'>Create Event</a>
            <a href='login.php'>Log out</a>
          </div>
          <div id='formDiv'>
          $eventName
          </div>
        </div>
      </body>
      </html>
";




    }
    else {
      echo "Error. Event name already taken. Please go back and try again.";
    }
  ?>

  <html>
  <header>
    <link rel="stylesheet" href="css/style.css"  />

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
      <span id="result"></span>
      </div>
      </div>
    </div>
  </body>
  </html>
