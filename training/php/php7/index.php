<!DOCTYPE html>
<html>
<head>
	<title>PHP 7</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
	<body>
		<div class="container">
			<h4>Chain manipulation (when first select box changed then next select box value should change according to the selection of previous select box).</h4>
			<form id="login_form" name="login_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">	
				<?php
				
					$country = array("US","India");
					$states = array("US" => array("California","Florida"),"India" => array("Uttar Pradesh","Madhya Pradesh","Rajasthan"));
					$cities = array("California" => array("Los Angeles","San Francisco","Oakland"),"Florida" => array("Miami","Jacksonville","St. Petersburg"),
									"Uttar Pradesh" => array("Allahabad","Kanpur","Lucknow"),"Madhya Pradesh" => array("Bhopal","Jabalpur","Indore"),
									"Rajasthan" => array("Jaipur","Kota","Mount Abu"));
					$statelist = array();
					$citylist = array();
					$countryselect = "";
					$stateselect = "";
					$selectedcountry = array();
					$selectedstate = array();
					if($_POST)
					{
						$countryselect = $_POST["country_select"];
						$stateselect = $_POST["state_select"];
						if($countryselect)
						{
							$statelist = $states[$countryselect];
							$selectedcountry = selectedstate($country,$countryselect);
						}
						if($stateselect)
						{
							$selectedstate = selectedstate($states[$countryselect],$stateselect);
							$match = check($states[$countryselect],$stateselect);
							if($match == "Matched")
								$citylist = $cities[$stateselect];
							
						}
					}
					function check($arrayelement,$countryselect)
					{
						$found = "Not";
						for($i = 0 ;$i < sizeof($arrayelement); $i++ )
						{
							if($arrayelement[$i] == $countryselect)
								$found = "Matched";
							
						}
						return $found;
					}
					function selectedstate($arrayelement,$countryselect)
					{
						$selectedarray = array();
						for($i = 0 ;$i < sizeof($arrayelement); $i++ )
						{
							if($arrayelement[$i] == $countryselect)
								array_push($selectedarray,'selected ="selected"');
							else
								array_push($selectedarray,'');			
						}
						return $selectedarray;
					}
				?>
				<div class="form-group">
					<label for="country_select">Country:</label>
					<select class="form-control" id="country_select" name="country_select" onchange="this.form.submit();">
						<option>Select Country</option>
						<?php 
							for($i = 0; $i < sizeof($country); $i++)
							{
								echo '<option value="'.$country[$i].'"'.$selectedcountry[$i].'>'.$country[$i].'</option>';
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="state_select">State:</label>
					<select class="form-control" id="state_select" name="state_select" onchange="this.form.submit();">
						<option>Select State</option>
						<?php 
							for($i = 0; $i < sizeof($states[$countryselect]); $i++)
							{
								echo '<option value="'.$states[$countryselect][$i].'"'.$selectedstate[$i].'>'.$states[$countryselect][$i].'</option>';
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="city_select">City:</label>
					<select class="form-control" id="city_select" name="city_select">
						<option>Select City</option>
						<?php
							foreach($citylist as $val)
							{
								echo '<option value="'.$val.'">'.$val.'</option>';
							}
						?>
					</select>
				</div>
			</form>
			<pre>
				&lt;?php
					$country = array("US","India");
					$states = array("US" => array("California","Florida"),"India" => array("Uttar Pradesh","Madhya Pradesh","Rajasthan"));
					$cities = array("California" => array("Los Angeles","San Francisco","Oakland"),"Florida" => array("Miami","Jacksonville","St. Petersburg"),
									"Uttar Pradesh" => array("Allahabad","Kanpur","Lucknow"),"Madhya Pradesh" => array("Bhopal","Jabalpur","Indore"),
									"Rajasthan" => array("Jaipur","Kota","Mount Abu"));
					$statelist = array();
					$citylist = array();
					$countryselect = "";
					$stateselect = "";
					$selectedcountry = array();
					$selectedstate = array();
					if($_POST)
					{
						$countryselect = $_POST["country_select"];
						$stateselect = $_POST["state_select"];
						if($countryselect)
						{
							$statelist = $states[$countryselect];
							$selectedcountry = selectedstate($country,$countryselect);
						}
						if($stateselect)
						{
							$selectedstate = selectedstate($states[$countryselect],$stateselect);
							$match = check($states[$countryselect],$stateselect);
							if($match == "Matched")
								$citylist = $cities[$stateselect];
							
						}
					}
					function check($arrayelement,$countryselect)
					{
						$found = "Not";
						for($i = 0 ;$i < sizeof($arrayelement); $i++ )
						{
							if($arrayelement[$i] == $countryselect)
								$found = "Matched";
							
						}
						return $found;
					}
					function selectedstate($arrayelement,$countryselect)
					{
						$selectedarray = array();
						for($i = 0 ;$i < sizeof($arrayelement); $i++ )
						{
							if($arrayelement[$i] == $countryselect)
								array_push($selectedarray,'selected ="selected"');
							else
								array_push($selectedarray,'');			
						}
						return $selectedarray;
					}
			?&gt;
			</pre>
			<pre>
				&lt;?php 
					for($i = 0; $i < sizeof($country); $i++)
					{
						echo '&lt;option value="'.$country[$i].'"'.$selectedcountry[$i].'&gt;'.$country[$i].'&lt;/option&gt;';
					}
				?&gt;
			</pre>
			<pre>
				&lt;?php 
					for($i = 0; $i < sizeof($states[$countryselect]); $i++)
					{
						echo '&lt;option value="'.$states[$countryselect][$i].'"'.$selectedstate[$i].'&gt;'.$states[$countryselect][$i].'&lt;/option&gt;';
					}
				?&gt;
			</pre>
			<pre>
				&lt;?php
					foreach($citylist as $val)
					{
							echo '&lt;option value="'.$val.'"&gt;'.$val.'&lt;/option&gt;';
					}
				?&gt;			
			</pre>
		</div>	
	</body>
</html>