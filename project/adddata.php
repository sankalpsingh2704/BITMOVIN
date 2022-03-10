<?php
	$conn = mysqli_connect("localhost","root","","sankalp");
	$query = "INSERT INTO sankalp.student(name,email,mobile,high,inter,dob,user,password) VALUES('".$_POST['name']."','".$_POST['email']."','".$_POST['mob']."','".$_POST['high']."','".$_POST['inter']."','".$_POST['dob']."','".$_POST['user']."','".$_POST['pass']."')";
	//echo $query;
	if(mysqli_query($conn,$query)){
		header("location:index.php");
	}else{
		echo mysqli_error($conn);
	}
?>