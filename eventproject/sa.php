<?php

  include("connect.php");
	include("function.php");

	$error="";

    if(isset($_POST['submit']))
	{
		$firstName=mysqli_real_escape_string($con,$_POST['fname']);
		$LastName=mysqli_real_escape_string($con,$_POST['lname']);
		$Email=mysqli_real_escape_string ($con,$_POST['Email']);
		$password=$_POST['password'];
		$passwordConfirm=$_POST['passwordConfirm'];
    $uni = mysqli_real_escape_string ($con,$_POST['University']);
    $uniName = $_POST['UniversityName'];
    $uniCity = mysqli_real_escape_string ($con,$_POST['UniversityCity']);



		if(strlen($firstName)<3)
		{
			$error="First name is too short";
		}
        else if(strlen($LastName)<3)
		{
			$error="Last name is too short";
		}
        else if(!filter_var($Email,FILTER_VALIDATE_EMAIL))
		{
			$error="Please enter valid email address";
		}
        else if(strlen($password)<8)
		{
			$error="password must be greater than 8 characters";
		}
        else if($password !== $passwordConfirm)
		{
			$error="password does not match";
		}
      else if($uni=="")
    {
      $error="university problem";
    }

		else
		{
			$password = password_hash($password, PASSWORD_DEFAULT);



					$insertQuery = "INSERT INTO users(firstName, LastName, Email, password, univeristy_id, priv) VALUES ('$firstName','$LastName','$Email','$passwordConfirm','$uni', '3')";
					if(mysqli_query($con, $insertQuery))
					{
            $sql = "INSERT INTO university(name,city, description, sa) VALUES ('$uni', '$uniCity', '$uniName', '$Email')";
            if(mysqli_query($con, $sql))
            {
              $error = "success.";
            }
					}



		}
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
        <div id="menu">
          <a href="index.php">Sign Up</a>
          <a href="login.php">Login</a>
          				<a href="sa.php">Super Admin</a>
        </div>
		    <div id="formDiv">

				<form method="POST" action="sa.php" enctype="multipart/form-data">

				<label>First Name:</label><br/>
                <input type="text" name="fname"/><br/><br/>

        <label>Last Name:</label><br/>
                <input type="text" name="lname"/><br/><br/>

        <label>Email:</label><br/>
                <input type="text" name="Email"/><br/><br/>


        <label>Password:</label><br/>
                <input type="password" name="password"/><br/><br/>

        <label>Re-enter Password:</label><br/>

                <input type="password" name="passwordConfirm"/><br/><br/>

        <lable>University Acronym:</label><br>
                  <input type="text" name="University"/></br>
                  <br>

                  <lable>Official University Name:</label><br>
                            <input type="text" name="UniversityName"/></br>
                            <br>

                            <lable>University City:</label><br>
                                      <input type="text" name="UniversityCity"/></br>
                                      <br>
                <input type="submit" class="theButtons" name="submit"/>

				</form>

		    </div>

	    </div>

	</body>




</html>
