<?php
include("connect.php");
include("function.php");
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
    <div id="formDiv">
      <div class='theRSOButton'><a href='newRSO.php'>New RSO</a></div>
    </div></br></br></br>
    <div id="rsoDiv">
      <?php
      //print out RSOs in scope
        //Go through and see which univeristy username is a part of
        $useremail = $_SESSION['user'];
        $sql = "SELECT univeristy_id from users WHERE Email = '$useremail'";
        $result = $con->query($sql);
        $unii = $result->fetch_assoc();
        $uni = $unii['univeristy_id'];
        //echo $uni;
        //Print out every RSO and have a join button next to it

        $sql = "SELECT * from rso where u_id = '$uni'";
        $result = $con->query($sql);

        if ($result->num_rows > 0)
        {
          $count = $result->num_rows;
          $smartHold = $count;
          $grabber = array();
          $grabber2 = array();
        } else {
          echo "sorry no RSOs";
        }

        while($row = $result->fetch_assoc())
        {
          //echo "<tr><td> latitude: " . $row["lat"]. "</td><td> Type: " . $row["type"]. " " . "</td><td> Date: " . $row["event_date"]. "</td></tr>";
          $grabber[$count] = $row["nameRSO"];
          $grabber2[$count] = $row["RSO_id"];
          $count--;
        }
        for($i=$smartHold;$i>0;$i--)
        {
          echo "
          <div id=rsoBox>
          <div id=picHole><strong>$grabber[$i]</strong></div>
          <form action='join.php'>
          <input type='hidden' name='myHiddenValue' value='$grabber2[$i]' />
          <input type='submit' value='join' name='' class='theButtons' />
          </form>
          </div>
          ";
        }

        //When a user joins they get added to membership relation


      ?>
    </div>


  </div>
</body>
</html>
