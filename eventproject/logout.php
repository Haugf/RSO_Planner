<?php
	
	SESSION_start();
	SESSION_destroy();
	setcookie("Email",'',time()-3600);
	header("location: login.php");

?>