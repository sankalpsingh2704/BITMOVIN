<!DOCTYPE html>
<html>
<header>
<title>
Show Database
</title>
<link href="./StyleSheets/Main.css" rel="stylesheet" />
</header>
<body>
<?php
	$conn = mysqli_connect("localhost","root","","sankalp");
	//mysqli_connect(hostname,dbuser,dbpassword,dbname);

	$query = "select * from sankalp.student";

	$result = mysqli_query($conn, $query);
?>
<table border="1">
		<tr>
			<th>Student Id</th>
			<th>Student Name</th>
			<th>Email</th>
			<th>mobile</th>
			<th>10th %</th>
			<th>12th %</th>
			<th>Date of Birth</th>
			<th>User Name</th>
			<th>Password</th>
		</tr>
		<?php
	while($row = mysqli_fetch_assoc($result)){
	
		echo "<tr>";	     
		?>
	    <td> <?php echo $row['id']; ?> </td>
		<td> <?php echo $row['name']; ?> </td>
		<td> <?php echo $row['email']; ?> </td>
		<td> <?php echo $row['mobile']; ?> </td>
		<td> <?php echo $row['high']; ?> </td>
		<td> <?php echo $row['inter']; ?> </td>
		<td> <?php echo $row['dob']; ?> </td>
		<td> <?php echo $row['user']; ?> </td>
		<td> <?php echo $row['password']; ?> </td>
		
	    <?php
		echo "</tr>";
	}
	
?>	

</table>


</body>

</html>