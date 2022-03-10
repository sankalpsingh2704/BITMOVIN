<!DOCTYPE html>
<html>
<head>
	<title>PHP 9</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
	<body>
		<div class="container">
			<h3>PHP Calculator</h3>
			<form id="user_form" name="user_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
				<div class="form-group">
					<label for="first_number">First Number:</label>
					<input class="form-control" min="-1000000" max="1000000" value="0" type="number" id="first_number" name="first_number" />
				</div>
				<div class="form-group" >
					<label for="operation_select">Operation:</label>
					<select class="form-control" id="operation_select" name="operation_select">
						<option value="0">+ Summation</option>
						<option value="1">- Subtraction</option>
						<option value="2">x Multiplication</option>
						<option value="3">/ Division</option>
					</select>
				</div>
				<div class="form-group">
					<label for="second_number">Second Number:</label>
					<input class="form-control" min="-1000000" max="1000000" value="0" type="number" id="second_number" name="second_number" />
				</div>
				<div>
					<span>
						<input class="btn-primary btn" type="submit" id="submit_btn" name="submit_btn" value="Calculate" />
					</span>
				</div>
				<?php
					class calculator
					{
						public function __construct()
						{
						}
						public function add($first,$second)
						{
							return $first + $second;
						}
						public function subtract($first,$second)
						{
							return $first - $second;
						}
						public function multiply($first,$second)
						{
							return $first * $second;
						}
						public function divide($first,$second)
						{
							return $first / $second;
						}
					}
					$result = 0;
					try{
					
						if($_POST)
						{
							$first = $_POST["first_number"];
							$second = $_POST["second_number"];
							$operation = $_POST["operation_select"];
							$calculate = new calculator();
							switch($operation)
							{
								case 0: $result = $calculate->add($first,$second);
										break;
								case 1: $result = $calculate->subtract($first,$second);
									break;
								case 2: $result = $calculate->multiply($first,$second);
										break;
								case 3: if($second == 0)
										{
											$result = "NAN";
											throw new Exception("Cannot Divide by Zero !");
										}
										$result = $calculate->divide($first,$second);
										break;
								default: $result = 0;
										break;
							}
						}
					}
					catch(Exception $e)
					{
						echo $e->getMessage();
					}				
				?>
				<div>
				
					<?php
						if($_POST && $result != "NAN")
							echo "Output:".$result;
					?>
				
				</div>
				<div>
					<pre>
						&lt;?php
						class calculator
						{
							public function __construct()
							{
							}
							public function add($first,$second)
							{
								return $first + $second;
							}
							public function subtract($first,$second)
							{
								return $first - $second;
							}
							public function multiply($first,$second)
							{
								return $first * $second;
							}
							public function divide($first,$second)
							{
								return $first / $second;
							}
						}
						$result = 0;
						try{
					
							if($_POST)
							{
								$first = $_POST["first_number"];
								$second = $_POST["second_number"];
								$operation = $_POST["operation_select"];
								$calculate = new calculator();
								switch($operation)
								{
									case 0: $result = $calculate->add($first,$second);
											break;
									case 1: $result = $calculate->subtract($first,$second);
										break;
									case 2: $result = $calculate->multiply($first,$second);
											break;
									case 3: if($second == 0)
											{
												$result = "NAN";
												throw new Exception("Cannot Divide by Zero !");
											}
											$result = $calculate->divide($first,$second);
											break;
									default: $result = 0;
											break;
								}
							}
						}
						catch(Exception $e)
						{
							echo $e->getMessage();
						}				
					?&gt;						
					</pre>
					<pre>
						&lt;?php
						if($_POST && $result != "NAN")
							echo "Output:".$result;
						?&gt;
					</pre>
				</div>
			</form>
		</div>
	</body>
</html>