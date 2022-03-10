<!DOCTYPE html>
<html>
<head>
	<title>PHP 3</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="../jquery.min.js"></script>
	<script src="script.js"></script>
</head>
	<body>
		<div class="container">
			<h4>Taking array from question 2 in which email id’s are listed, using string function separate the user name and domain name, then print it in the form of table.</h4>
			<table class="table-striped table-bordered table-hover table">
				<thead>
					<tr>
						<th>User Name</th><th>Domain</th>
					</tr>
				</thead>
				<tbody>
					<?php
						session_start();
						for($i = 0; $i < sizeof($_SESSION["email"]); $i++)
						{
							$broken = explode("@",$_SESSION["email"][$i]);
							echo "<tr><td>".$broken[0]."</td><td>".$broken[1]."</td></tr>";
						}
					?>
				</tbody>
			</table>
			<pre>		
					&lt;?php
						session_start();
						for($i = 0; $i < sizeof($_SESSION["email"]); $i++)
						{
							$broken = explode("@",$_SESSION["email"][$i]);
							echo "&lt;tr&gt;&lt;td&gt;".$broken[0]."&lt;/td&gt;&lt;td&gt;".$broken[1]."&lt;/td&gt;&lt;/tr&gt;";
						}
					?&gt;
			</pre>
			<div>
				<span>
					<input type="button" id="redirect2_btn" name="redirect2_btn" class="btn btn-primary" value="Assignment 2" />
				</span>
				<span>
					<input type="button" id="redirect4_btn" name="redirect4_btn" class="btn btn-primary" value="Assignment 4" />
				</span>
			</div>
		</div>
	</body>
</html>