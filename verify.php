<?php
session_start();
header('location:index.html');
$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, 'practice');

if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email= strip_tags(mysqli_real_escape_string($con,trim($email)));
    $password= strip_tags(mysqli_real_escape_string($con,trim($password)));


    $query = "select * FROM users WHERE email ='".$email."'";
    $tb1 = mysqli_query($con,$query);
    if(mysqli_num_rows($tb1) > 0){

        $row = mysqli_fetch_array($tb1);
        $password_hash = $row['password'];
        if(Password_verify($password,$password_hash)){
            header('location:home.php');
        }
        else {
            	echo '<script>alert("ERROR Please Register then login!!")</script>';
                header('location:index.html');
        }
    }
}
?>