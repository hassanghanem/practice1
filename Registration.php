<?php

session_start();
header('location:home.php');

$conn = mysqli_connect("localhost", "root", "");
mysqli_select_db($conn, 'practice');


$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$s = "select * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $s);


$num = mysqli_num_rows($result);
$pass = password_hash($password,PASSWORD_DEFAULT);
if ($num==1) {
	header('location:index.php');
}
else {
	$reg="insert into users(username,email,password) values ('$username','$email','$pass')";
	mysqli_query($conn,$reg);
	header('location:home.php');
}
?>