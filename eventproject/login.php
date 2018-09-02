<?php

	include("connect.php");
	include("function.php");



	$error = " ";

	if(isset($_POST['submit']))
	{

	  $Email = mysqli_real_escape_string($con, $_POST['Email']);
	  $password = mysqli_real_escape_string($con, $_POST['password']);
		$checkBox = isset($_POST['keep']);

		if(email_exists($Email,$con))
		{
			$result = mysqli_query($con, "SELECT password FROM users WHERE Email='$Email'");
			$retrievepassword = mysqli_fetch_assoc($result);
			echo $retrievepassword['password'];
			echo $password;
			if ($password == $retrievepassword['password'])
			{
				$error="password is correct. You are logged in";
				$_SESSION["user"] = $Email;
				header("Location: feed.php");
				exit;
			}
			else
			{
				$error="Sorry, your password is incorrect";
			}

		}
		else
		{
			$error = "Email Does not exists";
		}


	}

?>



<!doctype html>

<html>

	<head>

	<title>Welcome to University Event Login Page</title>
	<meta name="description" content="DATABASE FINAL PROJECT"/>
	<link rel="stylesheet" href="css/style.css"  />

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

				<form method="POST" action="login.php">

				<label>Email:</label><br/>
				<input type="text" class="inputFields"  name="Email" required/><br/><br/>


				<label>Password:</label><br/>
				<input type="password" class="inputFields"  name="password" required/><br/><br/>

				<input type="checkbox" name="keep" />
				<label>Keep me logged in</label><br/><br/>

				<input type="submit" name="submit" class="theButtons" value="login" />



				</form>

			</div>

		</div>

	</body>

</html>
>
