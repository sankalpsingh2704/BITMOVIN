<!DOCTYPE html>
<html>
<head>
	<title>PHP 4</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="../jquery.min.js"></script>
	<script src="script.js"></script>
</head>
	<body>
		<div class="container">
			<h3>Creating a session from the question 2 which expire after 3 minutes</h3>
			<div class="login_section">
			<?php
				session_start();
				if($_POST)
				{
					$email = $_POST["email_input"];
					$password = $_POST["password_input"];
					foreach($_SESSION["email"] as $key => $val)
					{
						if($_SESSION["email"][$key] == $email && $_SESSION["password"][$key] == $password)
						{
							$_SESSION["login"] = time();
						}
					}
				}
				if(isset($_SESSION["login"]))
				{
					if(!logout("login"))
					{
						echo "You are logged in for 3 minutes !";	
					}
					else
					{
						include("loginform.php");
					}
				}
				else
					include("loginform.php");
		
				function logout($field)
				{
					$t = time();
					$login_time = $_SESSION[$field];
					$diff = $t - $login_time;
					if ($diff > 180 || !isset($login_time))
					{          
						unset($_SESSION["login"]);
						return true;
					}
					else{
						return false;
					}
				}				
			?>
		</div>
		<div>
			<span>
				<a href="logout.php" class="btn btn-primary">Logout</a>
			</span>
			<span>
				<input type="button" id="redirect_pre" name="redirect_pre" class="btn btn-primary" value="Assignment 2" />
			</span>
		</div>
		<pre>
			&lt;?php
				session_start();
				if($_POST)
				{
					$email = $_POST["email_input"];
					$password = $_POST["password_input"];
					foreach($_SESSION["email"] as $key => $val)
					{
						if($_SESSION["email"][$key] == $email && $_SESSION["password"][$key] == $password)
						{
							$_SESSION["login"] = time();
						}
					}
				}
				if(isset($_SESSION["login"]))
				{
					if(!logout("login"))
					{
						echo "You are logged in for 3 minutes !";	
					}
					else
					{
						include("loginform.php");
					}
				}
				else
					include("loginform.php");
		
				function logout($field)
				{
					$t = time();
					$login_time = $_SESSION[$field];
					$diff = $t - $login_time;
					if ($diff > 180 || !isset($login_time))
					{          
						unset($_SESSION["login"]);
						return true;
					}
					else{
						return false;
					}
				}				
			?&gt;  
		</pre>
		<pre>
			Logout:
			&lt;?php
				session_start();
				unset($_SESSION["login"]);
				header("location:index.php");
			?&gt;
		</pre>
		</div>	
	</body>
</html>