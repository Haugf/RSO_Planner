<?php

include("connect.php");
//Used for javascript code
$eventLocation = $_POST['address'];
$eventName = $_POST['eventName'];
$eventType = $_POST['type'];
$eventTime = $_POST['time'];
$eventDate = $_POST['date'];
$scopeType = $_POST['scope'];
$eventNum = $_POST['Num'];
$eventDes = $_POST['Des'];
$useremail = $_SESSION['user'];
$msg = "User: ".$useremail." Has requested to host an event with these details"." ".$eventLocation." ".$eventName." ".$eventType." ".$eventTime." ".$eventDate." ".$scopeType." ".$eventNum." ".$eventDes;
//echo $msg;
//Send $msg as an email to RSO for further review.
$sql = "SELECT univeristy_id from users WHERE Email = '$useremail'";
$result = $con->query($sql);
$unii = $result->fetch_assoc();
$assUni= $unii['univeristy_id'];

$sql = "SELECT sa from university WHERE name = '$assUni'";
$result = $con->query($sql);
$unii = $result->fetch_assoc();
$uniSA= $unii['sa'];
//echo $uniSA;

$msg = wordwrap($msg, 70);

//send mail
if(mail($uniSA, "Student Event Request", $msg))
  echo "email sent.";





 ?>

  <html>
  <header>
    <link rel="stylesheet" href="css/style.css"  />
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

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

      <div id="note">
       <strong> You are not the admin of any RSO.</strong> You can request to create an event. This information will be sent to your univeristy super admin for review before being uploaded to the site.
      </div>
      <div id="formDiv">
        <form method="POST" action="stuCreateReturn.php" enctype="multipart/form-data">

        <label>Event Name:</label><br/>
                <input type="text" name="eventName"/><br/><br/>

        <label>Type:</label><br/>
        <select class="inputFields" name="type">
          <option value="social">Social</option>
          <option value="fundrasing">Fundrasing</option>
          <option value="technical">Technical</option>
        </select><br><br>

        <label>Time:</label><br/>
                <input type="text" name="time"/><br/><br/>

        <label>Date:</label><br/>
                <input type="date" name="date"/><br/><br/>

        <label>Scope:</label><br>
                <select class="inputFields" name="scope">
                  <option value="private">Private</option>
                  <option value="public">Public</option>
                </select><br><br>
        <label>Location:</label><br/>
                <input type="text" name="address" id="address2"/><br/><br/>

        <label>Contact Number:</label><br/>
                <input type="text" name="Num" id="address2"/><br/><br/>

        <label>Short Description:</label><br/>
                <input type="text" name="Des" id="address2"/><br/><br/>


                <input type="submit" class="theButtons" name="submit"/>

        </form>
      </div>
    </div>
  </body>
  </html>
