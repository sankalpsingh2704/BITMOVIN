<!DOCTYPE html>
<html>
<head>
	<title>PHP 1</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
	<body>
		<div class="container">
			<h3>Taking a multidimensional array in php and display it in the form of table using foreach loop</h3>
			<table class="table-striped table-bordered table-hover table">
				<thead>
					<tr><th>Name</th><th>Physics</th><th>Maths</th><th>Chemistry</th><th>Total</th><th>Average</th><th>Percentage</th><th>Grade</th></tr>
				</thead>
				<tbody>
				<?php
					function grade($percent){
						if($percent >= 85)
							return "A";
						else if($percent >=60)
							return "B";
						else if($percent >= 55)
							return "C";
						else
							return "Fail";
					}
					$marks = array( 
							"Mohammad" => array(
								"physics" => 35,	    
								"maths" => 30,	    
								"chemistry" => 39	    
						),
							"Qadir" => array(
								"physics" => 30,
								"maths" => 32,
								"chemistry" => 29
						),
							"Zara" => array(
								"physics" => 31,
								"maths" => 22,
								"chemistry" => 39
						)
					);
					foreach($marks as $key=>$details)
					{
						$total = 0;
						$perc = 0;
						echo"<tr>";
						echo"<td>".$key."</td>";
						foreach($details as $k => $val)
						{
							echo "<td>".$val."</td>";
							$total += $val;
							
						}
						$perc = ($total / 120)*100;
						$avg = $total/sizeof($details);
						echo "<td>".$total."</td>";
						echo "<td>".round($avg,2) ."</td>";
						echo "<td>".round($perc, 2) ."</td>";						
						echo "<td>".grade($perc) ."</td>";
						echo"</tr>";
					}
				?>
				</tbody>
			</table>
			<pre>
				&lt;?php
					function grade($percent){
						if($percent >= 85)
							return "A";
						else if($percent >=60)
							return "B";
						else if($percent >= 55)
							return "C";
						else
							return "Fail";
					}
					$marks = array( 
							"Mohammad" => array(
								"physics" => 35,	    
								"maths" => 30,	    
								"chemistry" => 39	    
						),
							"Qadir" => array(
								"physics" => 30,
								"maths" => 32,
								"chemistry" => 29
						),
							"Zara" => array(
								"physics" => 31,
								"maths" => 22,
								"chemistry" => 39
						)
					);
					foreach($marks as $key=>$details)
					{
						$total = 0;
						$perc = 0;
						echo"&lt;tr&gt;";
						echo"&lt;td&gt;".$key."&lt;/td&gt;";
						foreach($details as $k => $val)
						{
							echo "&lt;td&gt;".$val."&lt;/td&gt;";
							$total += $val;
						}
						$perc = ($total / 120)*100;
						$avg = $total/sizeof($details);
						echo "&lt;td&gt;".$total."&lt;/td&gt;";
						echo "&lt;td&gt;".round($avg,2) ."&lt;/td&gt;";
						echo "&lt;td&gt;".round($perc, 2) ."&lt;/td&gt;";						
						echo "&lt;td&gt;".grade($perc) ."&lt;/td&gt;";
						echo"&lt;/tr&gt;";
					}
				?&gt;
			</pre>
		</div>
	</body>
</html>