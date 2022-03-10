<!DOCTYPE html>
<html>
<head>
	<title>PHP 2</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="../jquery.min.js"></script>
	<script src="script.js"></script>
</head>
	<body>
		<div class="container">
			<h3>Created a form and submit the data of the form in the form of array</h3>
			<?php
				session_start();
				$country['in'] = "India";
				$country['us'] = "USA";
				$country['pk'] = "Pakistan";
				$country['sr'] = "Sri Lanka";				
			?>
			<form id="user_form" name="user_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
				<div class="form-group">
					<label for="name_input">Name:</label>
					<input class="form-control" type="text" id="name_input" name="name_input" />
				</div>
				<div class="form-group">
					<label for="name_input">Email:</label>
					<input class="form-control" type="email" id="email_input" name="email_input" />
				</div>
				<div class="form-group">
					<label for="password_input">Password:</label>
					<input class="form-control" type="password" id="password_input" name="password_input" />
				</div>
				<div class="form-group" >
					<label for="gender_select">Gender:</label>
					<select class="form-control" id="gender_select" name="gender_select">
						<option value="Male">Male</option>
						<option value="Female" >Female</option>
						<option value="Other" >Other</option>
					</select>
				</div>
				<div class="form-group" >
					<label for="address_input">Address:</label>
					<input class="form-control" type="text" id="address_input" name="address_input" />
				</div>
				<div class="form-group" >
					<label for="country_select">Country:</label>
					<select class="form-control" id="country_select" name="country_select">
						<?php 
							foreach($country as $key => $val)
								echo "<option value='".$val."' >".$val."</option>";
						?>
					</select>
				</div>
				<div>
					<span>
						<input class="btn-primary btn" type="submit" id="submit_btn" name="submit_btn" value="Submit" />
					</span>
					<span>
						<input class="btn-primary btn" type="button" id="destroy_btn" name="destroy_btn" value="Reset" />
					</span>
					<span>
						<input class="btn-primary btn" type="button" id="redirect_btn" name="redirect_btn" value="Assignment 3" />
					</span>
				</div>
				<div>
					<table class="table-striped table-bordered table-hover table">
					<?php
					
							$name = array(); 
							$email = array();
							$password = array();
							$gender = array();
							$address = array();
							$country = array();
							if(isset($_SESSION) && !empty($_SESSION))
							{
								$name = $_SESSION["name"];
								$email = $_SESSION["email"];
								$password = $_SESSION["password"];
								$gender = $_SESSION["gender"];
								$address = $_SESSION["address"];
								$country = $_SESSION["country"];
							}
							if($_POST)
							{							
								echo "<thead><tr><th>Name</th><th>Email</th><th>Password</th><th>Gender</th><th>Address</th><th>Country</th></tr></thead>";
								
								array_push($name,$_POST["name_input"]);
								$_SESSION["name"] = $name;
								
								array_push($email,$_POST["email_input"]);
								$_SESSION["email"] = $email;
								
								array_push($password,$_POST["password_input"]);
								$_SESSION["password"] = $password;
								
								array_push($gender,$_POST["gender_select"]);
								$_SESSION["gender"] = $gender;
								
								array_push($address,$_POST["address_input"]);
								$_SESSION["address"] = $address;
								
								array_push($country,$_POST["country_select"]);
								$_SESSION["country"] = $country;
								
							}
							echo "<tbody>";
							foreach($_SESSION["name"] as $key => $val)
							{
								echo "<tr>";
								echo "<td>".$_SESSION["name"][$key] ."</td>";
								echo "<td>".$_SESSION["email"][$key] ."</td>";
								echo "<td>".$_SESSION["password"][$key] ."</td>";
								echo "<td>".$_SESSION["gender"][$key] ."</td>";
								echo "<td>".$_SESSION["address"][$key] ."</td>";
								echo "<td>".$_SESSION["country"][$key] ."</td>";
								echo "</tr>";
							}	
						?>
						</tbody>
					</table>
					<pre>
						&lt;?php
							session_start();
							$country['in'] = "India";
							$country['us'] = "USA";
							$country['pk'] = "Pakistan";
							$country['sr'] = "Sri Lanka";				
						?&gt;
					</pre>
					<pre>
						&lt;select class="form-control" id="country_select" name="country_select"&gt;
						&lt;?php 
							foreach($country as $key => $val)
								echo "&lt;option value='".$val."' &gt;".$val."&lt;/option&gt;";
						?&gt;
						&lt;/select&gt;
					</pre>
					<pre>
						&lt;?php
							$name = array(); 
							$email = array();
							$password = array();
							$gender = array();
							$address = array();
							$country = array();
							if(isset($_SESSION) && !empty($_SESSION))
							{
								$name = $_SESSION["name"];
								$email = $_SESSION["email"];
								$password = $_SESSION["password"];
								$gender = $_SESSION["gender"];
								$address = $_SESSION["address"];
								$country = $_SESSION["country"];
							}
							if($_POST)
							{						
								echo "&lt;thead&gt;&lt;tr&gt;&lt;th&gt;Name&lt;/th&gt;&lt;th&gt;Email&lt;/th&gt;&lt;th&gt;Password&lt;/th&gt;&lt;th&gt;Gender&lt;/th&gt;&lt;th&gt;Address&lt;/th&gt;&lt;th&gt;Country&lt;/th&gt;&lt;/tr&gt;&lt;/thead&gt;";
								array_push($name,$_POST["name_input"]);
								$_SESSION["name"] = $name;
								
								array_push($email,$_POST["email_input"]);
								$_SESSION["email"] = $email;
								
								array_push($password,$_POST["password_input"]);
								$_SESSION["password"] = $password;
								
								array_push($gender,$_POST["gender_select"]);
								$_SESSION["gender"] = $gender;
								
								array_push($address,$_POST["address_input"]);
								$_SESSION["address"] = $address;
								
								array_push($country,$_POST["country_select"]);
								$_SESSION["country"] = $country;
								
							}
							foreach($_SESSION["name"] as $key => $val)
							{
								echo "&lt;tr&gt;";
								echo "&lt;td&gt;".$_SESSION["name"][$key] ."&lt;/td&gt;";
								echo "&lt;td&gt;".$_SESSION["email"][$key] ."&lt;/td&gt;";
								echo "&lt;td&gt;".$_SESSION["password"][$key] ."&lt;/td&gt;";
								echo "&lt;td&gt;".$_SESSION["gender"][$key] ."&lt;/td&gt;";
								echo "&lt;td&gt;".$_SESSION["address"][$key] ."&lt;/td&gt;";
								echo "&lt;td&gt;".$_SESSION["country"][$key] ."&lt;/td&gt;";
								echo "&lt;/tr&gt;";
							}	
						?&gt;
					</pre>
				</div>
			</form>
		</div>
	</body>
</html>