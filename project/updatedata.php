<?php
    session_start();
    $cuser = $_SESSION['user'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mob = $_POST['mob'];
	$high = $_POST['high'];
	$inter = $_POST['inter'];
	$dob = $_POST['dob'];
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$conn = mysqli_connect("localhost","root","","sankalp");
	//$query = "update students1 set sname='".$_POST['nm']."',email='".$_POST['email']."',marks=".$_POST['marks']." where sid=".$_GET['id'];
	$query = "update sankalp.student set name = '$name',email = '$email', mobile = '$mob',high='$high',inter = '$inter',dob='$dob',user='$user',password='$pass' WHERE user='$cuser'";
	
	if(mysqli_query($conn,$query)){
		header("location:index.php");
	}
	else{
		echo mysqli_error($conn);
	}
?>