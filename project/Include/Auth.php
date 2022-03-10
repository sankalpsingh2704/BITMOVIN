<div class="login">	
	<?php
	session_start();
	if(!empty($_SESSION['user']))
	  {		   
	   echo"<ul type=none><li><a href=\"logout.php\">Logout</a></li></ul>";
	  }
	  else
	  {
		  echo"<ul type=none><li><a href=\"LoginPage.php\">Login</a></li> / <li><a href=\"Register.php\">Register</a></li></ul>";
	  }
	  ?>	  
</div>