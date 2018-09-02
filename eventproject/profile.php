<?php

  include("connect.php");
	include("function.php");

	if(logged_in())
	{
	    echo "You are logged in";
	}
	else
	{
        echo "Unfortunately, You are failed logged in ";
	}

?>
