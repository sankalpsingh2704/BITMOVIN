<?php
session_start();
//print_r($_POST);
$userEmail = $_POST['user'];
$pwd = $_POST['password'];
$conn = mysqli_connect("localhost","root","","sankalp");
//$query = "select password from students1 where email = '".$_POST['userEmail']."'";
$query = "select * from student where user = '$userEmail' AND password = '$pwd'";

$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result)){
	$userData = mysqli_fetch_assoc($result);
	$_SESSION['user'] = $userData['user'];
	$_SESSION['password'] = $userData['password'];
	header("location:index.php");
	//header("location:./View/showdatabase.php");
}else{
	$_SESSION['error'] = "Invalid username / password";
	header("location:LoginPage.php");
}


?>