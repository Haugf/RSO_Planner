<?php

  include("connect.php");
	include("function.php");

	$error="";

    if(isset($_POST['submit']))
	{
		$firstName=mysqli_real_escape_string($con,$_POST['fname']);
		$Email=mysqli_real_escape_string ($con,$_POST['Email1']);
    $Email1=mysqli_real_escape_string ($con,$_POST['Email2']);
    $Email2=mysqli_real_escape_string ($con,$_POST['Email3']);
    $Email3=mysqli_real_escape_string ($con,$_POST['Email4']);
    $Email4=mysqli_real_escape_string ($con,$_POST['Email5']);
		$adm=$_POST['radio'];
    $ha = "Email".$adm;
    //ha captures the email address a user has chosen to be the admin.
    $admin = mysqli_real_escape_string ($con,$_POST["$ha"]);
    //echo $admin;
		$rsoDes=$_POST['rsoDes'];

//If i ever have time to include images....
		// $image=$_FILES['image']['name'];
		// $tmp_image=$_FILES['image']['tmp_name'];
		// $imageSize=$_FILES['image']['size'];

		if(strlen($firstName)<3)
		{
			$error="Name is too short";
		}
        else if(!filter_var($Email,FILTER_VALIDATE_EMAIL))
		{
			$error="Please enter valid email address";
		}
    else if(!filter_var($Email1,FILTER_VALIDATE_EMAIL))
{
  $error="Please enter valid email address";
}
else if(!filter_var($Email2,FILTER_VALIDATE_EMAIL))
{
$error="Please enter valid email address";
}
else if(!filter_var($Email3,FILTER_VALIDATE_EMAIL))
{
$error="Please enter valid email address";
}
else if(!filter_var($Email4,FILTER_VALIDATE_EMAIL))
{
$error="Please enter valid email address";
}
        else if(strlen($adm)<1)
		{
			$error="Admin not entered";
		}


//Grab university that this is all being made under.
$useremail = $_SESSION['user'];
$sql = "SELECT univeristy_id from users WHERE Email = '$useremail'";
$result = $con->query($sql);
$unii = $result->fetch_assoc();
$userUni = $unii['univeristy_id'];

echo $userUni;


//Insert RSO value into RSO table and update user priv
  $sql = "INSERT INTO rso(nameRSO, adminEmail, u_id, rsoDes) VALUES ('$firstName', '$admin', '$userUni', '$rsoDes')";
  if(mysqli_query($con, $sql))
  {
    //echo "success";
  } else {
    echo ":()";
  }

  $sql = "SELECT RSO_id from rso WHERE adminEmail = '$admin' and nameRSO = '$firstName'";
  $result = $con->query($sql);
  $grab = $result->fetch_assoc();
  $rid = $grab['RSO_id'];
//Update valule so that user is now admin of RSO
  $sql = "UPDATE users SET priv = 2 WHERE Email = '$admin'";
  if(mysqli_query($con, $sql))
  {
    //echo "success";
  } else {
    echo ":()";
  }

  //------------------------------------------------
//Add all five students as members into that rso
  $sql = "INSERT INTO membership(rsoID, email) values('$rid', '$Email')";
  if(mysqli_query($con, $sql))
  {
    //echo "success";
  } else {
    echo ":()";
  }
  $sql = "INSERT INTO membership(rsoID, email) values('$rid', '$Email1')";
  if(mysqli_query($con, $sql))
  {
    //echo "success";
  } else {
    echo ":()";
  }
  $sql = "INSERT INTO membership(rsoID, email) values('$rid', '$Email2')";
  if(mysqli_query($con, $sql))
  {
    //echo "success";
  } else {
    echo ":()";
  }
  $sql = "INSERT INTO membership(rsoID, email) values('$rid', '$Email3')";
  if(mysqli_query($con, $sql))
  {
    //echo "success";
  } else {
    echo ":()";
  }
  $sql = "INSERT INTO membership(rsoID, email) values('$rid', '$Email4')";
  if(mysqli_query($con, $sql))
  {
    //echo "success";
  } else {
    echo ":()";
  }

    //     else if($image=="")
		// {
		// 	$error="please upload your image";
		// }
    //   else if($uni=="")
    // {
    //   $error="university problem";
    // }

		// else
		// {
		// 	$password = password_hash($password, PASSWORD_DEFAULT);
    //
		// 		$imageExt = explode(".", $image);
		// 		$imageExtension = $imageExt[1];
    //
		// 		if($imageExtension == "PNG" || $imageExtension == "png" || $imageExtension == "JPG" || $imageExtension == "jpg")
		// 		{
		// 			$image = rand(0, 100000).rand(0, 100000).rand(0, 100000).time().".".$imageExtension;
    //
		// 			$insertQuery = "INSERT INTO users(firstName, LastName, Email, password, image, univeristy_id) VALUES ('$firstName','$LastName','$Email','$passwordConfirm','$image','$uni')";
		// 			if(mysqli_query($con, $insertQuery))
		// 			{
		// 				if(move_uploaded_file($tmp_image,"images/$image"))
		// 				{
		// 					$error = "You are successfully registered";
		// 				}
		// 				else
		// 				{
		// 					$error = "Image is not uploaded";
		// 				}
		// 			}
		// 		}
		// 		else
		// 		{
		// 			$error = "File must be an image";
		// 		}
    //
		// }
    }


?>



<!doctype html>

<html>
    <head>

	    <title> Welcome to University Events Page </title>
	    <link rel="stylesheet" href="css/style.css" />
	</head>

	<body>

    <div id="error" style=" <?php  if($error !=""){ ?>  display:block; <?php } ?> "><?php echo $error; ?></div>

	    <div id="wrapper">
        <div id="menu2">
          <a href="feed.php">Feed</a>
          <a href="search.html">Search Event</a>
          <a href="rso.php">RSOs</a>
          <a href="create.php">Create Event</a>
          <a href="login.php">Log out</a>
        </div>
		    <div id="formDiv">

				<form method="POST" action="newRSO.php" enctype="multipart/form-data">

				<label>Organization Name:</label><br/>
                <input type="text" name="fname"/><br/><br/>

        <label>Email:</label><br/>
              1.  <input type="text" name="Email1"/><br/><br/>
              2.  <input type="text" name="Email2"/><br/><br/>
              3.  <input type="text" name="Email3"/><br/><br/>
              4.  <input type="text" name="Email4"/><br/><br/>
              5.  <input type="text" name="Email5"/><br/><br/>

</br>
        <label>Select Admin:</label><br/>
                <input type="radio" name="radio" value="1">1
                <input type="radio" name="radio" value="2">2
                <input type="radio" name="radio" value="3">3
                <input type="radio" name="radio" value="4">4
                <input type="radio" name="radio" value="5">5

</br></br>
        <label>RSO Description:</label><br/>

                <input type="text" name="rsoDes"/><br/><br/>

        <label>Image:</l<abel><br/>
                <input type="file" name="image"/><br/><br/>

                <input type="submit" class="theButtons" name="submit"/>

				</form>

		    </div>

	    </div>

	</body>




</html>
