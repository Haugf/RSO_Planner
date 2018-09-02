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

		$image=$_FILES['image']['name'];
		$tmp_image=$_FILES['image']['tmp_name'];
		$imageSize=$_FILES['image']['size'];

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
        else if($image=="")
		{
			$error="please upload your image";
		}
      else if($uni=="")
    {
      $error="university problem";
    }

		else
		{
			$password = password_hash($password, PASSWORD_DEFAULT);

				$imageExt = explode(".", $image);
				$imageExtension = $imageExt[1];

				if($imageExtension == "PNG" || $imageExtension == "png" || $imageExtension == "JPG" || $imageExtension == "jpg")
				{
					$image = rand(0, 100000).rand(0, 100000).rand(0, 100000).time().".".$imageExtension;

					$insertQuery = "INSERT INTO users(firstName, LastName, Email, password, image, univeristy_id) VALUES ('$firstName','$LastName','$Email','$passwordConfirm','$image','$uni')";
					if(mysqli_query($con, $insertQuery))
					{
						if(move_uploaded_file($tmp_image,"images/$image"))
						{
							$error = "You are successfully registered";
						}
						else
						{
							$error = "Image is not uploaded";
						}
					}
				}
				else
				{
					$error = "File must be an image";
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

				<form method="POST" action="index.php" enctype="multipart/form-data">

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
                <lable>University:</label><br>
                  <select class="inputFields" name="University">
                    <option value="UCF">University of Central Florida</option>
                    <option value="UF">Univeristy of Florida</option>
                    <option value="FAU">Florida Atlantic University</option>
                  </select><br>
                  <br>

        <label>Image:</label><br/>
                <input type="file" name="image"/><br/><br/>

                <input type="submit" class="theButtons" name="submit"/>

				</form>

		    </div>

	    </div>

	</body>




</html>
