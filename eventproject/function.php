<?php


	function email_exists($Email,$con)
	{
		$result=mysqli_query($con,"SELECT id FROM users Where Email='$Email'");

		if(mysqli_num_rows($result)==1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function logged_in()
	{
		if(isset($_SESSION['Email']))
		{
			return true;
		}
		else
		{
			return false;
		}
	}



  function greatRSOeventSearch($useremail, $con)
  {
    $sql = "SELECT DISTINCT * FROM membership WHERE email = '$useremail'";
    $result = $con->query($sql);

    if($result->num_rows >0)
    {
      $count = 0;
      $rsoIDGrabber = array();
      while($row = $result->fetch_assoc())
      {
        $rsoIDGrabber[$count] = $row["rsoID"];
        $count++;
      }

      $friend = array();
      //Go and find RSO names that associate with RSO ids we just got
      for($i=0;$i<$count;$i++)
      {
        $sql = "SELECT * FROM rso WHERE RSO_id = '$rsoIDGrabber[$i]'";
        $result = $con->query($sql);
        while($row = $result->fetch_assoc())
        //trigger_error('Invalid query: ' .$con->error);
        $friend[$i]= $row["nameRSO"];
      }


    } else {
      echo "O events being hosted by RSO";
    }




    return $friend;

  }
?>
