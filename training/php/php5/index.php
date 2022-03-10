<!DOCTYPE html>
<html>
<head>
	<title>PHP 5</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
	<body>
		<div class="container">
			<h3>Custom Exception</h3>
			<form id="login_form" name="login_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">				
				<div class="form-group">
					<label for="name_input">Email:</label>
					<input class="form-control" type="text" id="email_input" name="email_input" />
				</div>
				<div>
					<span>
						<input class="btn-primary btn" type="submit" id="submit_btn" name="submit_btn" value="Submit" />
					</span>
				</div>
			</form>
			<?php
				class customException extends Exception
				{
					public function __construct($message, $code = 0, Exception $previous = null)
					{       
						parent::__construct($message, $code, $previous);
					}
					public function __toString()
					{
						return "It is not a valid Email Address\n";
					}
					public function errorMessage()
					{
						echo "It is not a valid Email Address\n";
					}
				}
				
				try{
						$email = "" ;
						if($_POST)
						{
							$email = $_POST["email_input"];		
							if (preg_match("/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/",$email))
							{
									
								echo "Email is correct and Validated !";
							}
							else{
									throw new customException();
							}
							
						}
						
					}
					catch (customException $e)
					{      
						$e->errorMessage();
					} 
			?>
			<pre>
				&lt;?php
				class customException extends Exception
				{
					public function __construct($message, $code = 0, Exception $previous = null)
					{       
						parent::__construct($message, $code, $previous);
					}
					public function __toString()
					{
						return "It is not a valid Email Address\n";
					}
					public function errorMessage()
					{
						echo "It is not a valid Email Address\n";
					}
				}
				
				try{
						$email = "" ;
						if($_POST)
						{
							$email = $_POST["email_input"];		
							if (preg_match("/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/",$email))
							{
									
								echo "Email is correct and Validated !";
							}
							else{
									throw new customException();
							}
						}
						
					}
					catch (customException $e)
					{      
						$e->errorMessage();
					} 
			?&gt;					
			</pre>
		</div>	
	</body>
</html>